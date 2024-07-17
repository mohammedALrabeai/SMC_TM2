<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;





class EmpLogin extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::guard('emp')->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('filament.pages.dashboard');
        }

        $this->addError('email', trans('auth.failed'));
    }

    public function render()
    {
        return view('livewire.emp-login');
    }
}
