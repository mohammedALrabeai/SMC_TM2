<?php

namespace App\Filament\App\Resources\TaskFollowUpResource\Pages;

use App\Filament\App\Resources\TaskFollowUpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTaskFollowUp extends EditRecord
{
    protected static string $resource = TaskFollowUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
