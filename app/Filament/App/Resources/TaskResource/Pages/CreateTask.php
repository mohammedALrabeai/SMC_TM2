<?php

namespace App\Filament\App\Resources\TaskResource\Pages;

use App\Models\Emp;
use App\Models\User;
use Filament\Actions;
use App\Models\Project;
use App\Models\TaskStatus;
use App\Services\WhatsAppService;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\App\Resources\TaskResource;
use Illuminate\Validation\ValidationException;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {


        if ($data['project_id'] == null) {
            Notification::make()
                ->title('يرجى تحديد المشروع')
                ->danger()
                ->send();

            throw ValidationException::withMessages([
                'project_id' => 'يرجى تحديد المشروع.',
            ]);
        }
        $project = Project::where('id', $data['project_id'])->first();
        $whatsapp_group_id = $project->whatsapp_group_id;
        $phone_main = Emp::where('id', $data['receiver_id'])->first()->phone;
        $data['sender_id'] = auth()->guard('emp')->id();
        $reciver = Emp::where('id', $data['receiver_id'])->first()->name;
        $sender = Emp::where('id', $data['sender_id'])->first()->name;
        // $auth = '40703bb7812b727ec01c24f2da518c407342559c';
        $auth = User::find(auth()->guard('emp')->user()->user_id)->w_api_token;

        // $profileId = 'aedd0dc2-8453';
        $profileId = User::find(auth()->guard('emp')->user()->user_id)->w_api_profile_id;
        $phone = $phone_main . '@c.us';
        // $message = 'test message';
        $emp = auth()->guard('emp')->user()->name;
        $time_in_minutes = $data['time_in_minutes'];
        $title = $data['title'];
        $des = $data['description'];
        $des= preg_replace("/\r\n|\r|\n/", ' \\n ', $des);

// dd(User::find(auth()->guard('emp')->user()->user_id)->w_api_profile_id);
        // $message="تم تعديل المهمة رقم $i الى الحالة $status من قبل $emp";
        $message = "مهمة جديدة بعنوان: $title \\nمسند المهمة: $sender \\n مستلم المهمة: $reciver \\n وصف المهمة: $des \\n الزمن اللازم: $time_in_minutes دقيقة";
        if (User::find(auth()->guard('emp')->user()->user_id)->enable_whatsapp_notifications) {
            if (User::find(auth()->guard('emp')->user()->user_id)->enable_employee_notifications) {
                $response = WhatsAppService::send_with_wapi($auth, $profileId, $phone, $message);
            }
            if (User::find(auth()->guard('emp')->user()->user_id)->work_group != null && User::find(auth()->guard('emp')->user()->user_id)->work_group != '') {
                $genral_group = User::find(auth()->guard('emp')->user()->user_id)->work_group;
                $response = WhatsAppService::send_with_wapi($auth, $profileId, $genral_group, $message);
            }

            if ($data['send_to_group'] && User::find(auth()->guard('emp')->user()->user_id)->enable_group_notifications) {
                if ($whatsapp_group_id != null && $whatsapp_group_id != '') {
                    $response2 = WhatsAppService::send_with_wapi($auth, $profileId, $whatsapp_group_id, $message);
                }
            } else {
            }
        }



        // $url = 'https://script.google.com/macros/s/AKfycbzTchdeZGJhAoVnZHCR-plNrKMrz_GVeMfbuUEV3zojqAGjwAic6LZC9tsYC4YWQa4Qyw/exec';
        $url =  Emp::where('id', $data['receiver_id'])->first()->post_url;
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
