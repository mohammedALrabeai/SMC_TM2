<?php

namespace App\Filament\Resources;

use App\Models\Emp;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Exports\EmpsExport;
use Filament\Resources\Resource;
use App\Services\WhatsAppService;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\BulkAction;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EmpResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EmpResource\RelationManagers;

class EmpResource extends Resource
{
    protected static ?string $model = Emp::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 0;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('user_id')
                //     ->required()
                //     ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),

                    Forms\Components\TextInput::make('sheet_api_url')
                    ->label('Google Sheet URL'),
                    Forms\Components\TextInput::make('post_url'),
                // Forms\Components\DateTimePicker::make('email_verified_at'),
                // Forms\Components\TextInput::make('password')
                //     ->password()
                //     ->required()
                //     ->dehydrated(false)
                //     ->maxLength(255),
                Forms\Components\TextInput::make('password')
                // ->required()
                ->dehydrated(true)
                ->password()
                ->label('Password')
                ->dehydrateStateUsing(fn ($state) => \Hash::make($state)),

                Forms\Components\TextInput::make('phone')
                    ->numeric()
                    ->maxLength(15)
                    ->default(null),

                Forms\Components\TextInput::make('number_of_hours_per_day')
                    ->required()
                    ->numeric()
                    ->default(8),
                // Forms\Components\TextInput::make('day_off')
                //     ->required(),
                //add ldj
                Forms\Components\Select::make('day_off')
                ->options(WhatsAppService::getDaysOptions())
                ->multiple()
                ->default([7]) // القيمة الافتراضية في حالة الإنشاء
                ->afterStateHydrated(function ($component, $state) {
                    // هنا نعرض القيم المخزنة سابقًا عند التعديل
                    $component->state(json_decode($state, true)); // تأكد من أن القيم مخزنة كـ JSON
                })

                ,
  Forms\Components\Toggle::make('is_admin')
  ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable(),
                    // Tables\Columns\TextColumn::make('user_id')
                    // ->numeric()
                    // ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number_of_hours_per_day')
                    ->numeric()
                    ->sortable(),
                    Tables\Columns\IconColumn::make('is_admin')
                    ->boolean(),
                Tables\Columns\TextColumn::make('day_off'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                BulkAction::make('export')
                ->label('Export to Excel')
                // ->icon('heroicon-o-document-download')
                ->action(function (Collection $records) {
                    if ($records->isEmpty()) {
                        Notification::make()
                            ->title('No records selected!')
                            ->danger()
                            ->send();
                        return;
                    }

                    // تحويل السجلات المختارة إلى array للتصدير
                    return Excel::download(new EmpsExport($records), 'emps.xlsx');
                }),
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            ])
            ;
    }

    public static function getRelations(): array
    {
        return [

            RelationManagers\ReceivedTasksRelationManager::class,
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmps::route('/'),
            'create' => Pages\CreateEmp::route('/create'),
            'edit' => Pages\EditEmp::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        if(auth()->user()->type=="super admin"){
            return parent::getEloquentQuery();
        }
        return parent::getEloquentQuery()->where('user_id', auth()->user()->id);
    }
}
