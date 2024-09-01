<?php
namespace App\Filament\App\Resources;

use App\Models\Campaign;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;
use App\Filament\App\Resources\CampaignResource\Pages;


class CampaignResource extends Resource
{
    protected static ?string $model = Campaign::class;
    protected static ?string $navigationGroup = 'Projects Management';
    protected static ?int $navigationSort = 6;

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Campaign Name')
                    ->required(),
                Select::make('project_id')
                    ->relationship('emp_project', 'name')
                    ->required()
                    ->label('Project'),
                // Select::make('emp_id')
                //     ->relationship('emp', 'name')
                //     ->required()
                //     ->label('Employee'),
                TextInput::make('campaign_type')
                    ->label('Campaign Type')
                    ->required(),
                Select::make('platform')
                    ->options([
                        'facebook' => 'Facebook',
                        'instagram' => 'Instagram',
                        'tiktok' => 'TikTok',
                        // Add more platforms as needed
                    ])
                    ->required()
                    ->label('Platform'),
                TextInput::make('daily_spend')
                    ->label('Daily Spend')
                    ->numeric()
                    ->required(),
                TextInput::make('landing_page_url')
                    ->label('Landing Page URL')
                    ->url()
                    ->nullable(),
                TextInput::make('sheet_url')
                    ->label('Sheet URL')
                    ->url()
                    ->nullable(),
                TextInput::make('area')
                    ->label('Area')
                    ->required(),
                TextInput::make('location_url')
                    ->label('Location URL')
                    ->url()
                    ->required(),
                TextInput::make('creatives_url')
                    ->label('Creatives URL')
                    ->url()
                    ->required(),
                DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required(),
                DatePicker::make('end_date')
                    ->label('End Date')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Campaign Name')->sortable()->searchable(),
                TextColumn::make('project.name')->label('Project')->sortable()->searchable(),
                TextColumn::make('employee.name')->label('Employee')->sortable()->searchable(),
                TextColumn::make('campaign_type')->label('Campaign Type')->sortable(),
                TextColumn::make('daily_spend')->label('Daily Spend')->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                ->label('Start Date')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('end_date')
                ->label('End Date')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Add any filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    public static function getPages(): array
{
    return [
        'index' => Pages\ListCampaigns::route('/'),
        'create' => Pages\CreateCampaign::route('/create'),
        'edit' => Pages\EditCampaign::route('/{record}/edit'),
        // 'view' => Pages\ViewProjectPlan::route('/{record}'),
    ];
}
}
