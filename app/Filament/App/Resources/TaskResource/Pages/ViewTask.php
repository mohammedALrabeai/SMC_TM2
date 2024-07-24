<?php

namespace App\Filament\App\Resources\TaskResource\Pages;

use Filament\Forms;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\ViewRecord;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\App\Resources\TaskResource;
use Filament\Forms\Components\DateTimePicker;

class ViewTask extends ViewRecord
{
    protected static string $resource = TaskResource::class;

    protected function getHeaderWidgets(): array
    {
        return [

            // Add any header widgets if needed
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('title')
                ->label('Title')
                ->disabled(),
            Forms\Components\Textarea::make('description')
                ->label('Description')
                ->disabled(),
            Forms\Components\TextInput::make('sender.name')
                ->label('Sender Name')
                ->disabled(),
            Forms\Components\TextInput::make('receiver.name')
                ->label('Receiver Name')
                ->disabled(),
            Forms\Components\TextInput::make('time_in_minutes')
                ->label('Time in Minutes')
                ->disabled(),
            Forms\Components\Toggle::make('is_recurring')
                ->label('Is Recurring')
                ->disabled(),
            Forms\Components\TextInput::make('recurrence_interval_days')
                ->label('Recurrence Interval (Days)')
                ->disabled(),
            Forms\Components\DateTimePicker::make('start_date')
                ->label('Start Date')
                ->disabled(),
            Forms\Components\DateTimePicker::make('created_at')
                ->label('Created At')
                ->disabled(),
            Forms\Components\DateTimePicker::make('updated_at')
                ->label('Updated At')
                ->disabled(),
        ];
    }
    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
}
