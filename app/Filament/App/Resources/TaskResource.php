<?php

namespace App\Filament\App\Resources;

use Filament\Forms;
use App\Models\Task;
use App\Models\User;
use Filament\Tables;
use App\Models\Project;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Infolists;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\App\Resources\TaskResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\App\Resources\TaskResource\RelationManagers\TaskFollowUpsRelationManager;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationIcon = 'heroicon-o-check-circle';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        $userId = auth()->guard('emp')->user()->user_id;
        return $form
            ->schema([
                Forms\Components\Select::make('project_id')
                    ->relationship('emp_project', 'name'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\Select::make('sender_id')
                    ->relationship('task_emp_app', 'name')
                    ->required()
                    ->label('Sender Name'),
                Forms\Components\Select::make('receiver_id')
                    ->relationship('task_emp_app', 'name')
                    ->required()
                    ->label('Receiver Name'),
                Forms\Components\TextInput::make('time_in_minutes')
                    ->numeric()
                    ->default(null),
                    Forms\Components\Select::make('parent_id')
                    ->label('Parent Task')
                    ->options(function () use ($userId) {
                        return Task::whereHas('project', function (Builder $query) use ($userId) {
                            $query->where('user_id', $userId);
                        })->pluck('title', 'id');
                    }),
                Forms\Components\Toggle::make('is_recurring')
                    ->required(),
                Forms\Components\TextInput::make('recurrence_interval_days')
                    ->numeric()
                    ->default(null),
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('title'),
                Infolists\Components\TextEntry::make('description')
                    ->columnSpan('full'),
                Infolists\Components\TextEntry::make('sender_id'),
                Infolists\Components\TextEntry::make('receiver_id'),
                Infolists\Components\TextEntry::make('time_in_minutes')
                    ->numeric(),
                Infolists\Components\TextEntry::make('start_date')
                    ->dateTime(),
                Infolists\Components\IconEntry::make('is_recurring'),
                Infolists\Components\TextEntry::make('recurrence_interval_days')
                    ->numeric(),
                Infolists\Components\TextEntry::make('next_occurrence')
                    ->dateTime(),
                Infolists\Components\TextEntry::make('parentTask.title'),

                Infolists\Components\TextEntry::make('created_at')
                    ->dateTime(),
                Infolists\Components\TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('projectOwner.name')
                ->label('User Name')
                ->sortable(),
            Tables\Columns\TextColumn::make('title')
                ->searchable(),
            Tables\Columns\TextColumn::make('sender.name')
                ->label('Sender Name') // Optional label
                ->sortable(),
            Tables\Columns\TextColumn::make('receiver.name')
                ->label('Receiver Name') // Optional label
                ->sortable(),
                Tables\Columns\TextColumn::make('lastFollowUp.taskStatus.name')
                ->label('Last Follow Up') // Optional label
                ->sortable(),
            // Tables\Columns\TextColumn::make('sender_id')
            // ->relationship('task_emp', 'name')
            //     ->sortable(),
            // Tables\Columns\TextColumn::make('receiver_id')
            //     ->numeric()
            //     ->sortable(),
            Tables\Columns\TextColumn::make('time_in_minutes')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('start_date')
                ->dateTime()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\IconColumn::make('is_recurring')
                ->boolean(),
            Tables\Columns\TextColumn::make('recurrence_interval_days')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('next_occurrence')
                ->dateTime()
                ->sortable(),
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
                Filter::make('مهامي')
                    ->label('مهامي')
                    ->query(function (Builder $query): Builder {
                        $userId = auth()->id();
                        return $query->where(function($q) use ($userId) {
                            $q->where('sender_id', $userId)
                              ->orWhere('receiver_id', $userId);
                        });
                    }),

            ],layout: FiltersLayout::AboveContentCollapsible)
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            TaskFollowUpsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
            'view' => Pages\ViewTask::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        $userId = auth()->guard('emp')->user()->user_id;

        return parent::getEloquentQuery()
            ->whereHas('user_project_app', function (Builder $query) use ($userId) {
                $query->where('user_id', $userId);
            });
    }
}
