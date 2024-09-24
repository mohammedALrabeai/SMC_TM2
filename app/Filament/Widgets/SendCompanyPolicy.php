<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\Widget;

class SendCompanyPolicy extends Widget
{
    protected static string $view = 'filament.widgets.send-company-policy';

    // Add any other data or logic you need here

    public function sendCompanyPolicy(): ?string
    {
        $emp =  auth()->user();  // جلب المستخدم الحالي
        $company_policy = $emp->company_policy;

        dd($company_policy);


        return "";
    }
}
