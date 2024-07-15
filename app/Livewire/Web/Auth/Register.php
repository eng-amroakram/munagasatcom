<?php

namespace App\Livewire\Web\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Register extends Component
{
    use LivewireAlert;

    public $name = "";
    public $email = "";
    public $phone = "";
    public $password = "";
    public $password_confirmation = "";
    public $form_type = "person";

    #[Layout('layouts.web.app'), Title('مناقصاتكم - حساب جديد')]
    public function render()
    {
        return view('livewire.web.auth.register');
    }

    #[On('submitting-web-register-data')]
    public function submit()
    {
        $data = [
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "password" => $this->password,
            "password_confirmation" => $this->password_confirmation
        ];

        $rules = [
            'name' => ['required', 'string'],
            'email' => ['unique:users,email', 'required', 'email'],
            'phone' => ['unique:users,phone', 'required'],
            'password' => ['required', 'confirmed'],
        ];

        $messages = [
            'name.required' => "هذا الحقل مطلوب",
            'email.required' => "هذا الحقل مطلوب",
            'email.unique' => "البريد الالكتروني مستخدما مسبقا",
            'phone.unique' => "رقم الهاتف مستخدما مسبقا",
            'phone.required' => "هذا الحقل مطلوب",
            'password.required' => "هذا الحقل مطلوب",
            'password.confirmed' => "كلمة السر غير متطابقة",
        ];

        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('web-registration-form-errors', $errors);
            return false;
        }

        $permissions = $this->form_type == "company" ? config('users.permissions.company') : config('users.permissions.person');

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'account_type' => $this->form_type,
            'account_status' => 'inactive',
            'permissions'  =>  json_encode($permissions),
            'password' => Hash::make($data['password']),
        ]);

        if ($user) {
            Auth::login($user);
            return redirect()->route('index');
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل بياناتك يرجى المحاولة مرة اخرى', 'error');
        return false;
    }

    public function alertMessage($message, $type)
    {
        $this->alert($type, '', [
            'toast' => true,
            'position' => 'top-end',
            'timer' => 3000,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
}
