<?php

namespace App\Filament\Resources\EmpResource\Pages;

use App\Filament\Resources\EmpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmp extends EditRecord
{
    protected static string $resource = EmpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
