<?php

namespace App\Filament\App\Resources\ProjectPlanDetailResource\Pages;

use App\Filament\App\Resources\ProjectPlanDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProjectPlanDetail extends EditRecord
{
    protected static string $resource = ProjectPlanDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
