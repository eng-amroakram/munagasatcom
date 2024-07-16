<?php

namespace App\Livewire\Admin\Opportunities;

use App\Http\Controllers\Services\Services;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Opportunities extends Component
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

    #[Title('لوحة التحكم - الفرص الاستثمارية'), Layout('layouts.admin.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;
        $this->filters["status"] = $this->search_status;

        $service = $this->setService();
        $opportunities = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.admin.opportunities.opportunities', [
            'opportunities' => $opportunities
        ]);
    }

    private function setService()
    {
        return Services::createInstance("OpportunityService") ?? new Services();
    }

    public function addOpportunity()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "user_id" => auth()->id(),
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
            "status" => $this->status
        ];

        $rules = $service->rules();
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-new-opportunity-errors', $errors);
            $this->alertMessage('يرجى التأكد من إدخال البيانات', 'error');
            return false;
        }

        $opportunity = $service->store($data);

        if ($opportunity) {
            $this->alertMessage('تم تسجيل البيانات بنجاح', 'success');
            $this->dispatch('process-has-been-done');
            return redirect()->route('admin.opportunities.index');
            return true;
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل بياناتك', 'error');
        return false;
    }

    public function changeStatus($id)
    {
        $service = $this->setService();
        $result = $service->changeStatus($id);
        if ($result) {
            $this->alertMessage("تم تعديل حالة الملاحظة بنجاح", 'success');
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
            $this->alertMessage("تم حذف الملاحظة بنجاح", 'success');
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
}
