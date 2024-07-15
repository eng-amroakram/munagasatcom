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

class PricingRequests extends Component
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
    public $info = "";
    public $file_pricing_request = "";
    public $duration = "";
    public $deadline_submitting_offers = "";
    public $closing_date = "";
    public $question = "";
    public $email = "";
    public $phone = "";
    public $is_visit = "";
    public $is_sample = "";
    public $sector_id = "";
    public $services = [];

    #[Title('لوحة التحكم - طلبات التسعير'), Layout('layouts.admin.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;
        $this->filters["status"] = $this->search_status;

        $service = $this->setService();
        $pricing_requests = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.admin.centers.pricing-requests', [
            'pricing_requests' => $pricing_requests
        ]);
    }

    private function setService()
    {
        return Services::createInstance("PricingRequestService") ?? new Services();
    }

    public function changeStatus($id)
    {
        $service = $this->setService();
        $result = $service->changeStatus($id);

        if ($result) {
            $this->alertMessage("تم تعديل حالة الطلب بنجاح", 'success');
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
            $this->alertMessage("تم حذف الطلب بنجاح", 'success');
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

    public function addPricingRequest()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "user_id" => auth()->id(),
            "info" => $this->info,
            "file_pricing_request" => $this->file_pricing_request,
            "duration" => $this->duration,
            "deadline_submitting_offers" => $this->deadline_submitting_offers,
            "closing_date" => $this->closing_date,
            "question" => $this->question,
            "email" => $this->email,
            "phone" => $this->phone,
            "is_visit" => $this->is_visit,
            "is_sample" => $this->is_sample,
            "sector_id" => $this->sector_id,
            "services" => $this->services,
            "status" => "active"
        ];
        $rules = $service->rules();
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-new-pricing-request-errors', $errors);
            $this->alertMessage('يرجى التأكد من إدخال البيانات', 'error');
            return false;
        }

        $pricing_request = $service->store($data);

        if ($pricing_request) {
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
