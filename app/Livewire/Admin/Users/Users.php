<?php

namespace App\Livewire\Admin\Users;

use App\Http\Controllers\Services\Services;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    protected $service = null;

    public $search = "";
    public $pagination = 10;
    public $sort_field = 'id';
    public $sort_direction = 'asc'; // desc

    public $filters = [];
    public $search_account_type = null;
    public $search_account_status = null;

    public $name = "";
    public $email = "";
    public $phone = "";
    public $photo = "";
    public $password = "";
    public $account_type = "employee";
    public $account_status = "active";
    public $permissions = [];

    private function setService()
    {
        return Services::createInstance("UserService") ?? new Services();
    }

    #[Title('لوحة التحكم - الأعضاء'), Layout('layouts.admin.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;
        $this->filters["account_type"] = $this->search_account_type;
        $this->filters["account_status"] = $this->search_account_status;

        $service = $this->setService();
        $users = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.admin.users.users', [
            'users_models' => $users
        ]);
    }

    public function changeAccountStatus($id)
    {
        $service = $this->setService();
        $message = $service->changeAccountStatus($id);
        if ($message) {
            $this->alertMessage($message, 'success');
        } else {
            $this->alertMessage("حدث خطأ يرجى المحاولة مرة اخرى", 'error');
        }
    }

    public function delete($id)
    {
        $service = $this->setService();
        $message = $service->delete($id);
        $this->alertMessage($message, 'success');
    }

    public function show($id)
    {
        dd($id);
    }

    public function addUser()
    {
        $service = $this->setService();
        $user = auth()->user();

        $account_type = $this->account_type;

        if ($user->account_type == "company") {
            $account_type = "employee";
        }

        $data = [
            "user_owner_id" => auth()->id(),
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "photo" => $this->photo,
            "password" => $this->password,
            "account_type" => $account_type,
            "account_status" => $this->account_status,
            "permissions" => json_encode($this->permissions)
        ];
        $rules = $service->rules();
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-new-user-errors', $errors);
            $this->alertMessage('يرجى التأكد من إدخال البيانات', 'error');
            return false;
        }

        $user = $service->store($data);

        if ($user) {
            $this->alertMessage('تم تسجيل البيانات بنجاح', 'success');
            $this->dispatch('process-has-been-done');
            $this->reset();
            return true;
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل بياناتك', 'error');
        return false;
    }

    public function exportUsers()
    {
        dd(65);
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

    public function updated($input, $value)
    {
    }
}
