<?php

namespace App\Filament\App\Widgets;

use Filament\Widgets\Widget;

class OpenLinkWidget extends Widget
{
    protected static string $view = 'filament.app.widgets.open-link-widget';
    // protected static string $view = 'filament.widgets.open-link-widget';

    // إذا كنت بحاجة إلى التحكم في الموقع داخل لوحة القيادة
    protected static ?int $sort = 1; // ترتيب ظهور الـ Widget

    public function getSheetApiUrl(): ?string
    {
       
        $emp =  auth()->guard('emp')->user(); // جلب المستخدم الحالي
        return $emp ? $emp->sheet_api_url : null; // جلب الرابط إذا كان موجوداً
    }
}
