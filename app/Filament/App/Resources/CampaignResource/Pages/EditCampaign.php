<?php

namespace App\Filament\App\Resources\CampaignResource\Pages;

use App\Filament\App\Resources\CampaignResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCampaign extends EditRecord
{
    protected static string $resource = CampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // هذه الدالة تسمح لك بالتعامل مع البيانات قبل الحفظ
    protected function mutateFormDataBeforeSave(array $data): array
    {

        // dd($data);
        // استلام المتغير send_to_group هنا
        if (isset($data['send_to_group'])) {
            $sendToGroup = $data['send_to_group'];

            // يمكنك استخدام هذا المتغير حسب الحاجة
            // على سبيل المثال: إذا كان true أو false، قم بتنفيذ منطق معين
            if ($sendToGroup) {
                $project = Project::where('id', $data['project_id'])->first();
                $whatsapp_group_id = $project->whatsapp_group_id;


                $auth = User::find(auth()->guard('emp')->user()->user_id)->w_api_token;
                $profileId = User::find(auth()->guard('emp')->user()->user_id)->w_api_profile_id;

                $message = "رسالة تعديل حملة: title \\n  jjjjjj: ";


                if ($data['send_to_group'] && User::find(auth()->guard('emp')->user()->user_id)->enable_group_notifications) {
                    if ($whatsapp_group_id != null && $whatsapp_group_id != '') {
                        $response2 = WhatsAppService::send_with_wapi($auth, $profileId, $whatsapp_group_id, $message);
                    }
                }
               
            } else {
                // منطق في حالة عدم التفعيل
            }
        }

        return $data;
    }
}
