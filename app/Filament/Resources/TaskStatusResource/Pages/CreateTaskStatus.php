<?php

namespace App\Filament\Resources\TaskStatusResource\Pages;

use App\Filament\Resources\TaskStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTaskStatus extends CreateRecord
{
    protected static string $resource = TaskStatusResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();


        return $data;
    }
}
