<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('project_id')
                //     ->required()
                //     ->numeric(),
                       Forms\Components\Select::make('project_id')
                    ->relationship('user_project', 'name'),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                // Forms\Components\TextInput::make('sender_id')
                //     ->required()
                //     ->numeric(),
                    Forms\Components\Select::make('sender_id')
                    ->relationship('task_emp', 'name'),
                // Forms\Components\TextInput::make('receiver_id')
                //     ->required()
                //     ->numeric(),
                    Forms\Components\Select::make('receiver_id')
                    ->relationship('task_emp', 'name'),
                Forms\Components\TextInput::make('time_in_minutes')
                    ->numeric()
                    ->default(null),
                // Forms\Components\DateTimePicker::make('start_date'),
                Forms\Components\Toggle::make('is_recurring')
                    ->required(),
                Forms\Components\TextInput::make('recurrence_interval_days')
                    ->numeric()
                    ->default(null),
                // Forms\Components\DateTimePicker::make('next_occurrence'),
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if(auth()->user()->type=="super admin"){
            return parent::getEloquentQuery();
        }
        return parent::getEloquentQuery();
        // ->join('projects', 'tasks.project_id', '=', 'projects.id')
        // ->where('projects.user_id', auth()->user()->id)
        // ->select('tasks.*');
    }

}
