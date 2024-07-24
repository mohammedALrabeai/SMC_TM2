<?php

namespace App\Filament\App\Resources\TaskFollowUpResource\Pages;

use App\Filament\App\Resources\TaskFollowUpResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTaskFollowUp extends CreateRecord
{
    protected static string $resource = TaskFollowUpResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
{
dd( auth()->guard('emp'));
    $data['emp_id'] = auth()->guard('emp')->id();

    return $data;
}
}
