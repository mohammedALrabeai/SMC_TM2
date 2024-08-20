<?php

namespace App\Filament\App\Resources\ProjectAttachmentResource\Pages;

use App\Filament\App\Resources\ProjectAttachmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProjectAttachment extends CreateRecord
{
    protected static string $resource = ProjectAttachmentResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
       
        $data['emp_id'] = auth()->guard('emp')->id();

        return $data;
    }
}
