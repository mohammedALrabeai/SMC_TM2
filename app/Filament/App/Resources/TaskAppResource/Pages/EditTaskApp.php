<?php

namespace App\Filament\App\Resources\TaskAppResource\Pages;

use App\Filament\App\Resources\TaskAppResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTaskApp extends EditRecord
{
    protected static string $resource = TaskAppResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
