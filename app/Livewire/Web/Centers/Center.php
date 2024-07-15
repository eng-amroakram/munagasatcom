<?php

namespace App\Livewire\Web\Centers;

use App\Models\Center as ModelsCenter;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Center extends Component
{
    use LivewireAlert;

    public $center;

    #Inputs
    public $name = "";
    public $email = "";
    public $message = "";

    public function mount(ModelsCenter $center)
    {
        $this->center = $center;
    }

    #[Layout('layouts.web.app'), Title('مناقصاتكم - تفاصيل المركز')]
    public function render()
    {
        return view('livewire.web.centers.center');
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

    public function submit()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "email" => $this->email,
            "message" => $this->message
        ];

        $rules = $service->rules();
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-new-center-errors', $errors);
            $this->alertMessage('يرجى التأكد من إدخال البيانات', 'error');
            return false;
        }

        $center = $service->store($data);

        if ($center) {
            $this->alertMessage('تم تسجيل البيانات بنجاح', 'success');
            $this->dispatch('process-has-been-done');
            $this->reset();
            return true;
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل بياناتك', 'error');
        return false;
    }
}
