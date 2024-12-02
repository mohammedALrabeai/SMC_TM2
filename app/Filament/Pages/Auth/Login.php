<?php
namespace App\Filament\Pages\Auth;

use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Forms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{
    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('email')
                ->label(__('Email'))
                ->email()
                ->required()
                ->autocomplete('email'),

            Forms\Components\TextInput::make('password')
                ->label(__('Password'))
                ->password()
                ->required()
                ->autocomplete('current-password'),

            Forms\Components\Checkbox::make('remember')
                ->label(__('Remember Me')),
        ];
    }

    public function authenticate(): ?LoginResponse
    {
        logger('Authenticating user...');
        
        $data = $this->form->getState();
        logger('Email entered: ' . $data['email']);
        logger('Password entered: ' . $data['password']);
    
        // الحصول على جميع الموظفين بنفس البريد الإلكتروني
        $emps = \App\Models\Emp::where('email', $data['email'])->get();
        logger('Matching employees count: ' . $emps->count());
    
        // التحقق من كل سجل
        foreach ($emps as $emp) {
            logger('Checking employee ID: ' . $emp->id);
            logger('Stored password hash: ' . $emp->password);
    
            // تحقق كلمة المرور
            if (Hash::check($data['password'], $emp->password)) {
                logger('Password matched for employee ID: ' . $emp->id);
                
                // تسجيل الدخول
                Auth::guard('emp')->login($emp, $data['remember'] ?? false);
                logger('Login successful for employee ID: ' . $emp->id);
    
                return app(LoginResponse::class);
            } else {
                logger('Password mismatch for employee ID: ' . $emp->id);
            }
        }
    
        // إذا لم يتم العثور على أي تطابق
        logger('Authentication failed: No matching employee found.');
        throw ValidationException::withMessages([
            'email' => __('Invalid email or password.'),
        ]);
    }
    
    public function getHeading(): string
    {
        return __('Welcome Back!');
    }
}
