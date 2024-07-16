<?php

namespace App\Livewire\Admin\Opportunities;

use App\Http\Controllers\Services\Services;
use App\Models\Opportunity;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditOpportunity extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $opportunity = null;
    public $opportunity_id = "";

    public $name = "";
    public $closing_date = "";
    public $sector_id = [];
    public $notes = [];
    public $cities = [];
    public $address = "";
    public $method = "pdf_file";
    public $file_opportunity = "";
    public $units = [];
    public $manager = "";
    public $phone = "";
    public $email = "";
    public $status = "active";

    public function mount(Opportunity $opportunity)
    {
        $this->opportunity = $opportunity;
        $this->opportunity_id = $opportunity->id;

        $this->name = $opportunity->name;
        $this->closing_date = $opportunity->closing_date?->format("Y-m-d");
        $this->sector_id = $opportunity->sector_id;
        $this->notes = $opportunity->notes;
        $this->cities = $opportunity->cities;
        $this->address = $opportunity->address;
        $this->method = $opportunity->method;
        $this->file_opportunity = $opportunity->file_opportunity;
        $this->units = $opportunity->units;
        $this->manager = $opportunity->manager;
        $this->phone = $opportunity->phone;
        $this->email = $opportunity->email;
        $this->status = $opportunity->status;
    }

    #[Title('لوحة التحكم - تعديل الفرصة'), Layout('layouts.admin.app')]
    public function render()
    {
        return view('livewire.admin.opportunities.edit-opportunity');
    }

    private function setService()
    {
        return Services::createInstance("OpportunityService") ?? new Services();
    }

    public function editOpportunity()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "closing_date" => $this->closing_date,
            "sector_id" => $this->sector_id,
            "notes" => $this->notes,
            "cities" => $this->cities,
            "address" => $this->address,
            "method" => $this->method,
            "file_opportunity" => $this->file_opportunity,
            "units" => $this->units,
            "manager" => $this->manager,
            "phone" => $this->phone,
            "email" => $this->email,
            "status" => $this->status,
        ];

        $rules = $service->rules($this->opportunity->id);
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('edit-opportunity-errors', $errors);
            $this->alertMessage('يرجى التأكد من البيانات', 'error');
            return false;
        }

        $result = $service->update($data, $this->opportunity->id);

        if ($result) {
            return redirect()->route('admin.opportunities.edit', $this->opportunity->id);
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
