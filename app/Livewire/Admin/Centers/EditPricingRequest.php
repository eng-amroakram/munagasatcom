<?php

namespace App\Livewire\Admin\Centers;

use App\Http\Controllers\Services\Services;
use App\Models\PricingRequest;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPricingRequest extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $pricing_request = null;

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

    public function mount(PricingRequest $pricing_request)
    {
        $this->pricing_request = $pricing_request;

        #Setting Data
        $this->name = $pricing_request->name;
        $this->info = $pricing_request->info;
        $this->file_pricing_request = $pricing_request->file_pricing_request;
        $this->duration = $pricing_request->duration;
        $this->deadline_submitting_offers = $pricing_request->deadline_submitting_offers?->format("Y-m-d");
        $this->closing_date = $pricing_request->closing_date?->format("Y-m-d");
        $this->question = $pricing_request->question;
        $this->email = $pricing_request->email;
        $this->phone = $pricing_request->phone;
        $this->is_visit = $pricing_request->is_visit;
        $this->is_sample = $pricing_request->is_sample;
        $this->sector_id = $pricing_request->sector_id;
        $this->services = $pricing_request->services;
    }

    #[Title('لوحة التحكم - تعديل التسعيرة'), Layout('layouts.admin.app')]
    public function render()
    {
        return view('livewire.admin.centers.edit-pricing-request');
    }

    private function setService()
    {
        return Services::createInstance("PricingRequestService") ?? new Services();
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

    public function editPricingRequest()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
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
        ];

        $rules = $service->rules($this->pricing_request->id);
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('edit-pricing-request-errors', $errors);
            $this->alertMessage('يرجى التأكد من البيانات', 'error');
            return false;
        }

        $result = $service->update($data, $this->pricing_request->id);

        if ($result) {
            return redirect()->route('admin.centers.pricing-requests');
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
}
