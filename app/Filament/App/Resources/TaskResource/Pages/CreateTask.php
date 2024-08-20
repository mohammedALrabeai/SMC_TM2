<?php

namespace App\Filament\App\Resources\TaskResource\Pages;

use App\Models\Emp;
use Filament\Actions;
use App\Models\TaskStatus;
use App\Services\WhatsAppService;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\App\Resources\TaskResource;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $phone_main = Emp::where('id', $data['receiver_id'])->first()->phone;
        $data['sender_id'] = auth()->guard('emp')->id();
        $reciver = Emp::where('id', $data['receiver_id'])->first()->name;
        $sender = Emp::where('id', $data['sender_id'])->first()->name;
        $auth = '40703bb7812b727ec01c24f2da518c407342559c';
        $profileId = 'aedd0dc2-8453';
        $phone = $phone_main . '@c.us';
        // $message = 'test message';
        $emp = auth()->guard('emp')->user()->name;
        $time_in_minutes = $data['time_in_minutes'];
        $title = $data['title'];
        $des = $data['description'];

        // $message="تم تعديل المهمة رقم $i الى الحالة $status من قبل $emp";
        $message = "مهمة جديدة بعنوان: $title \\nمسند المهمة: $sender \\n مستلم المهمة: $reciver \\n وصف المهمة: $des \\n الزمن اللازم: $time_in_minutes دقيقة";

        $response = WhatsAppService::send_with_wapi($auth, $profileId, $phone, $message);

        // $url = 'https://script.google.com/macros/s/AKfycbzTchdeZGJhAoVnZHCR-plNrKMrz_GVeMfbuUEV3zojqAGjwAic6LZC9tsYC4YWQa4Qyw/exec';
        $url=  Emp::where('id', $data['receiver_id'])->first()->post_url;
        $data_temp = array(
            'date_and_time' => date('Y/m/d H:i:s'),
            'name' => $title,
            'des' => $des,
            'task_sender_name' => $sender,
            'emp_name' => $reciver,
            'time' => $time_in_minutes,
            'معلومات تنفيذ المهمة' => ''
        );

        $response = WhatsAppService::sendPostRequest($url, $data_temp);

        // dd($response);
        return $data;
    }
}
