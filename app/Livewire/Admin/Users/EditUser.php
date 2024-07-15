<?php

namespace App\Livewire\Admin\Users;

use App\Http\Controllers\Services\Services;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditUser extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $user = null;

    public $name = '';
    public $phone = "";
    public $email = "";
    public $photo = "";
    public $password = "";
    public $account_type = '';
    public $account_status = '';
    public $permissions = [];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        // $this->photo = $user->photo;
        $this->account_type = $user->account_type;
        $this->account_status = $user->account_status;
        $this->permissions = $user->permissions;
    }

    #[Title('لوحة التحكم - تعديل المستخدم'), Layout('layouts.admin.app')]
    public function render()
    {
        return view('livewire.admin.users.edit-user');
    }

    private function setService()
    {
        return Services::createInstance("UserService") ?? new Services();
    }

    public function editUser()
    {
        $service = $this->setService();

        $user = auth()->user();

        $account_type = $this->account_type;

        if ($user->account_type == "company") {
            $account_type = "employee";
        }

        $data = [
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "photo" => $this->photo,
            "password" => $this->password,
            "account_type" => $account_type,
            "account_status" => $this->account_status,
            "permissions" => json_encode($this->permissions),
        ];

        $rules = $service->rules($this->user->id);
        $messages = $service->messages();
        unset($rules["password"]);
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('edit-new-user-errors', $errors);
            $this->alertMessage('يرجى التأكد من البيانات', 'error');
            return false;
        }

        $result = $service->update($data, $this->user->id);

        if ($result) {
            return redirect()->route('admin.users.users');
        }
        $this->alertMessage('حدث خطأ اثناء تحديث البيانات', 'error');
        return false;
    }

    public function alertMessage($message, $type)
    {
        $this->alert($type, '', [
            'toast' => true,
            'position' => 'top-start',
            'timer' => 3000,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
}
