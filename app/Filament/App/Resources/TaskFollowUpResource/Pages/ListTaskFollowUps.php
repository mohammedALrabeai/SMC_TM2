<?php

namespace App\Filament\App\Resources\TaskFollowUpResource\Pages;

use App\Filament\App\Resources\TaskFollowUpResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTaskFollowUps extends ListRecords
{
    protected static string $resource = TaskFollowUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
