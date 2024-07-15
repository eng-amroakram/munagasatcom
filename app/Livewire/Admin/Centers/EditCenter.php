<?php

namespace App\Livewire\Admin\Centers;

use App\Http\Controllers\Services\Services;
use App\Models\Center;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCenter extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $center = null;
    public $center_id = "";

    public $name = "";
    public $address = "";
    public $city_id = "";
    public $sector_id = "";
    public $services = [];

    public $email = "";
    public $mobile = "";
    public $telephone = "";
    public $facebook = "";
    public $twitter = "";
    public $linkedin = "";

    public $logo = "";
    public $profile = "";

    public function mount(Center $center)
    {
        $this->center = $center;

        $this->name = $center->name;
        $this->address = $center->address;
        $this->city_id = $center->city_id;
        $this->sector_id = $center->sector_id;
        $this->services = $center->services;

        $this->email = $center->email;
        $this->mobile = $center->mobile;
        $this->telephone = $center->telephone;
        $this->facebook = $center->facebook;
        $this->twitter = $center->twitter;
        $this->linkedin = $center->linkedin;

        $this->logo = $center->logo;
        $this->profile = $center->profile;

        $this->center_id = $center->id;
    }

    #[Title('لوحة التحكم - تعديل المركز'), Layout('layouts.admin.app')]
    public function render()
    {
        return view('livewire.admin.centers.edit-center');
    }

    private function setService()
    {
        return Services::createInstance("CenterService") ?? new Services();
    }

    public function editCenter()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "address" => $this->address,
            "city_id" => $this->city_id,
            "sector_id" => $this->sector_id,
            "services" => $this->services,
            "email" => $this->email,
            "mobile" => $this->mobile,
            "telephone" => $this->telephone,
            "facebook" => $this->facebook,
            "twitter" => $this->twitter,
            "linkedin" => $this->linkedin,
            "logo" => $this->logo,
            "profile" => $this->profile,
        ];

        $rules = $service->rules($this->center->id);
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('edit-center-errors', $errors);
            $this->alertMessage('يرجى التأكد من البيانات', 'error');
            return false;
        }

        $data['services'] = json_encode($this->services);
        $result = $service->update($data, $this->center->id);

        if ($result) {
            return redirect()->route('admin.centers.edit', $this->center->id);
        }
        $this->alertMessage('حدث خطأ اثناء تحديث البيانات', 'error');
        return false;
    }

    public function updated($input, $value)
    {
        if ($input == "sector_id") {
            $this->dispatch('setSelectServices', sector_services($value));
            $this->services = "";
        }
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
