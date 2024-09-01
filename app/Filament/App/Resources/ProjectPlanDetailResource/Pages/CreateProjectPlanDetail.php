<?php

namespace App\Filament\App\Resources\ProjectPlanDetailResource\Pages;

use App\Filament\App\Resources\ProjectPlanDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProjectPlanDetail extends CreateRecord
{
    protected static string $resource = ProjectPlanDetailResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['emp_id'] = auth()->guard('emp')->id();
        $data['platform'] = implode(',', $data['platform']);

        return $data;
    }
}
