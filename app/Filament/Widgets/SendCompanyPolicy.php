<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\Widget;
use App\Services\WhatsAppService;
use Filament\Notifications\Notification;
use Livewire\Component;

class SendCompanyPolicy extends Widget
{
    protected static string $view = 'filament.widgets.send-company-policy';


    // protected $listeners = ['sendCompanyPolicy'];  // Adding a listener for Livewire

    // public function confirmSendPolicy()
    // {
    //     // Dispatch a browser event to trigger SweetAlert confirmation dialog
    //     $this->dispatchBrowserEvent('show-confirmation');
    // }



    public function sendCompanyPolicy(): ?string
    {
        $emp = auth()->user();  // Get the current user
        // $company_policy = "test";  // Example company policy content
        $company_policy = $emp->company_policy;
        $company_policy= preg_replace('/\r\n|\r|\n/', " \\n ",$company_policy);

        // $company_policy = str_replace("\n", "\\n", $company_policy);
        // dd($company_policy);
        $auth = $emp->w_api_token;
        $profileId = $emp->w_api_profile_id;

        if ($emp->work_group != null && $emp->work_group != '') {
            $genral_group = $emp->work_group;
            $response = WhatsAppService::send_with_wapi($auth, $profileId, $genral_group, $company_policy);
// dd($response);
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


