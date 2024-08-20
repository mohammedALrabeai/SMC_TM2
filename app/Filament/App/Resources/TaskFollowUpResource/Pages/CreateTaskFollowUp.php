<?php

namespace App\Filament\App\Resources\TaskFollowUpResource\Pages;

use Filament\Actions;
use App\Services\WhatsAppService;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\App\Resources\TaskFollowUpResource;

class CreateTaskFollowUp extends CreateRecord
{
    protected static string $resource = TaskFollowUpResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
{
// dd( auth()->guard('emp'));
//     $data['emp_id'] = auth()->guard('emp')->id();

//     $phone_main = '966571718153';
// $auth = '40703bb7812b727ec01c24f2da518c407342559c';
// $profileId = 'aedd0dc2-8453';
// $phone = $phone_main.'@c.us';
// $message = 'test message';

// $response = WhatsAppService::send_with_wapi($auth, $profileId, $phone, $message);

    return $data;
}

}
