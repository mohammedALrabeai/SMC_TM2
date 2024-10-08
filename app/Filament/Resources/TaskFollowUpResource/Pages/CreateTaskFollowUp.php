<?php

namespace App\Filament\Resources\TaskFollowUpResource\Pages;

use App\Filament\Resources\TaskFollowUpResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTaskFollowUp extends CreateRecord
{
    protected static string $resource = TaskFollowUpResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
