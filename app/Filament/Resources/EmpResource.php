<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmpResource\Pages;
use App\Filament\Resources\EmpResource\RelationManagers;
use App\Models\Emp;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmpResource extends Resource
{
    protected static ?string $model = Emp::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';


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
                ->required()
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
    ->options([
       "1" => 'Saturday',
       "2"=> 'Sunday',
       "3" => 'Monday',
       "4" => 'Tuesday',
       "5" => 'Wednesday',
       "6" => 'Thursday',
       "7" => 'Friday',
    ])
    ->multiple()
    ->default([ 7]),
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
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ])
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
