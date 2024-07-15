<?php

namespace App\Livewire\Web\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{
    public $email = "";
    public $password = "";

    #[Layout('layouts.web.app'), Title('مناقصاتكم - تسجيل الدخول')]
    public function render()
    {
        return view('livewire.web.auth.login');
    }

    #[On('submitting-web-login-data')]
    public function submit()
    {
        $user = User::where('email', $this->email)
            ->whereIn("account_type", ['person', 'company'])
            ->first();

        if ($user) {
            if (Hash::check($this->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('index');
            }

            $this->dispatch('web-db-login-validation', ["password" => "تأكد من كلمة المرور!"]);
            return "";
        }

        $this->dispatch('web-db-login-validation', ["email" => "تأكد من الايميل لو سمحت !"]);
        return "";
    }
}
