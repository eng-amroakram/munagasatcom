<?php

namespace App\Livewire\Admin\Centers;

use App\Http\Controllers\Services\Services;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Centers extends Component
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
    public $search_status = "";

    public $name = "";
    public $city_id = "";
    public $sector_id = 1;
    public $services = [];
    public $address = "";
    public $status = "inactive";

    public $logo = "";
    public $profile = "";

    public $telephone = "";
    public $mobile = "";
    public $email = "";
    public $facebook = "";
    public $linkedin = "";
    public $twitter = "";


    #[Title('لوحة التحكم - مراكز الاعمال'), Layout('layouts.admin.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;
        $this->filters["status"] = $this->search_status;

        $service = $this->setService();
        $centers = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.admin.centers.centers', [
            'centers' => $centers
        ]);
    }

    private function setService()
    {
        return Services::createInstance("CenterService") ?? new Services();
    }

    public function changeStatus($id)
    {
        $service = $this->setService();
        $result = $service->changeStatus($id);

        if ($result) {
            $this->alertMessage("تم تعديل حالة المركز بنجاح", 'success');
            return true;
        }

        $this->alertMessage("حدث خطأ يرجى المحاولة مرة اخرى", 'error');
        return false;
    }

    public function delete($id)
    {
        $service = $this->setService();
        $result = $service->delete($id);
        if ($result) {
            $this->alertMessage("تم حذف المركز بنجاح", 'success');
            return true;
        }
        $this->alertMessage("حدث خطأ يرجى المحاولة مرة اخرى", 'error');
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

    public function addCenter()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "user_id" => auth()->id(),
            "city_id" => $this->city_id,
            "sector_id" => $this->sector_id,
            "services" => json_encode($this->services),
            "address" => $this->address,
            "logo" => $this->logo,
            "profile" => $this->profile,
            "telephone" => $this->telephone,
            "mobile" => $this->mobile,
            "email" => $this->email,
            "facebook" => $this->facebook,
            "linkedin" => $this->linkedin,
            "twitter" => $this->twitter,
            "status" => $this->status
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

    public function updated($input, $value)
    {
        if ($input == "sector_id") {
            $this->dispatch('setSelectServices', sector_services($value));
        }
    }
}
