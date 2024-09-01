<?php

namespace App\Filament\Pages;

use session;
use Filament\Pages\Page;
use Forms\Components\Spacer;
use Faker\Provider\ar_EG\Text;
use Laravel\Prompts\TextPrompt;
use Illuminate\Mail\TextMessage;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Placeholder;

class Setting extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static string $view = 'filament.pages.setting';
    protected static ?string $navigationLabel = 'Settings';
    protected static ?string $navigationGroup = 'public';

    public $name;
    public $phone;
    public $enable_whatsapp_notifications;
    public $enable_group_notifications;
    public $enable_employee_notifications;
    public $w_api_profile_id;
    public $w_api_token;
    public $work_group;

    protected function getFormSchema(): array
    {
        $user = auth()->user();

        return [
            TextInput::make('name')
                ->label('User Name')
                ->required()
                ->default($user->name),

            TextInput::make('phone')
                ->label('Phone Number')
                // ->required()
                ->tel()
                ->placeholder('Enter your phone number')
                ->prefixIcon('heroicon-o-phone')
                ->default($user->phone),
                TextInput::make('w_api_profile_id')
                ->label('whatsapp api profile id')
                // ->required()
                ->default($user->w_api_profile_id),
                TextInput::make('w_api_token')
                ->label('whatsapp api token')
                // ->required()
                ->default($user->w_api_token),
                TextInput::make('work_group')
            ->label('general work group')
            // ->required()
            ->default($this->work_group),


            Toggle::make('enable_whatsapp_notifications')
            ->label('Activate sending notifications to WhatsApp')
            ->default($user->enable_whatsapp_notifications==1 ?1: 0),

        Toggle::make('enable_group_notifications')
            ->label('Activate sending notifications to the customer group')
            ->default($user->enable_group_notifications==1 ?1: 0),

        Toggle::make('enable_employee_notifications')
            ->label("Activate sending notifications to the employee's WhatsApp")
            ->default($user->enable_employee_notifications ==1 ?1: 0),


                Placeholder::make(' ')
                ->content(' ')
                ->columnSpan('full')
        ];
    }
    public function mount()
{
    $user = auth()->user();

    $this->name = $user->name;
    $this->phone = $user->phone;
    $this->enable_whatsapp_notifications = $user->enable_whatsapp_notifications==1? 1:0 ;
    $this->enable_group_notifications = $user->enable_group_notifications==1? 1:0 ;
    $this->enable_employee_notifications = $user->enable_employee_notifications==1? 1:0 ;
    $this->w_api_token = $user->w_api_token;
    $this->w_api_profile_id = $user->w_api_profile_id;
    $this->work_group = $user->work_group;
}

    public function saveProfile()
    {
        $data = $this->form->getState();
// dd($data);
        // تحديث بيانات المستخدم
        auth()->user()->update([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'w_api_profile_id' => $data['w_api_profile_id'],
            'w_api_token' => $data['w_api_token'],
            'work_group' => $data['work_group'],
            'enable_whatsapp_notifications' => ($data['enable_whatsapp_notifications']),
            'enable_group_notifications' =>($data['enable_group_notifications']),
            'enable_employee_notifications' => ($data['enable_employee_notifications']),
        ]);

        // $this->notify('success', 'تم تحديث البروفايل بنجاح!');
        Notification::make()
        ->title('User Profile Updated!')
        ->success()
        ->send();

    // إعادة التوجيه إلى الصفحة الرئيسية للـ Filament
    return redirect('/admin/setting');
    }

    protected function getActions(): array
    {
        return [];
    }
}
