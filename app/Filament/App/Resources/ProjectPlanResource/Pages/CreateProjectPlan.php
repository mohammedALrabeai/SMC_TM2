<?php

namespace App\Filament\App\Resources\ProjectPlanResource\Pages;

use App\Filament\App\Resources\ProjectPlanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProjectPlan extends CreateRecord
{
    protected static string $resource = ProjectPlanResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Created';
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Saved';
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
$data['emp_id'] = auth()->guard('emp')->id();
        return $data;
    }

}
