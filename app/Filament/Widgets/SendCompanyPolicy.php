<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\Widget;
use App\Services\WhatsAppService;
use Filament\Notifications\Notification;

class SendCompanyPolicy extends Widget
{
    protected static string $view = 'filament.widgets.send-company-policy';

    // Add any other data or logic you need here

    public function sendCompanyPolicy(): ?string
    {
        $emp =  auth()->user();  // جلب المستخدم الحالي
        // $company_policy = $emp->company_policy;
        $company_policy = "test";

        $auth = $emp->w_api_token;

        // $profileId = 'aedd0dc2-8453';
        $profileId = $emp->w_api_profile_id;


        if ($emp->work_group != null && $emp->work_group != '') {
            $genral_group = $emp->work_group;
            $response = WhatsAppService::send_with_wapi($auth, $profileId, $genral_group, $company_policy);

            // Check if the response was successful
            if ($response) {
                // Show a success notification using Filament Notifications
                Notification::make()
                    ->title('Success')
                    ->body('The company policy was sent successfully.')
                    ->success()
                    ->send();
            } else {
                // Show an error notification
                Notification::make()
                    ->title('Error')
                    ->body('Failed to send the company policy.')
                    ->danger()
                    ->send();
            }
        } else {
            // If no work group is set, show a warning notification
            Notification::make()
                ->title('Warning')
                ->body('No work group found for this user.')
                ->warning()
                ->send();
        }



        return "";
    }
}
