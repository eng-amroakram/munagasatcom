<?php

namespace App\Livewire\Admin\Tenders;

use App\Http\Controllers\Services\Services;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Tenders extends Component
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
    public $code = "";
    public $reference_code = "";
    public $purpose = "";
    public $tender_type_id = "";
    public $government_broker_id = "";
    public $cities = [];
    public $activities = [];
    public $tags = [];

    public $bid_book = "";
    public $actual_bid_book_price = "";
    public $bid_book_download_price = "";
    public $additional_instructions_file = "";

    public $submission_location = "";
    public $envelope_opening_location = "";
    public $execution_location = "";
    public $adding_date = "";
    public $last_inquiry_date = "";
    public $last_submission_date = "";
    public $envelope_opening_date_time = "";
    public $news = "";

    public $bid_bond = "";
    public $bid_bond_address = "";
    public $construction_work = "";
    public $maintenance_work = "";

    public $status = "active";

    public $tender_id = "";

    #[Title('لوحة التحكم - المناقصات'), Layout('layouts.admin.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;
        $this->filters["status"] = $this->search_status;

        $service = $this->setService();
        $tenders = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.admin.tenders.tenders', [
            "tenders" => $tenders
        ]);
    }

    private function setService()
    {
        return Services::createInstance("TenderService") ?? new Services();
    }

    public function changeStatus($id)
    {
        $service = $this->setService();
        $result = $service->changeStatus($id);
        if ($result) {
            $this->alertMessage("تم تعديل حالة المناقصة بنجاح", 'success');
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
            $this->alertMessage("تم حذف المناقصة بنجاح", 'success');
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

    public function addTender()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "status" => $this->status,
            "code" => $this->code,
            "reference_code" => $this->reference_code,
            "purpose" => $this->purpose,
            "tender_type_id" => $this->tender_type_id,
            "government_broker_id" => $this->government_broker_id,
            "cities" => $this->cities,
            "activities" => $this->activities,
            "tags" => $this->tags,
            "bid_book" => $this->bid_book,
            "actual_bid_book_price" => $this->actual_bid_book_price,
            "bid_book_download_price" => $this->bid_book_download_price,
            "additional_instructions_file" => $this->additional_instructions_file,
            "submission_location" => $this->submission_location,
            "envelope_opening_location" => $this->envelope_opening_location,
            "execution_location" => $this->execution_location,
            "adding_date" => $this->adding_date,
            "last_inquiry_date" => $this->last_inquiry_date,
            "last_submission_date" => $this->last_submission_date,
            "envelope_opening_date_time" => $this->envelope_opening_date_time,
            "news" => $this->news,
            "bid_bond" => $this->bid_bond,
            "bid_bond_address" => $this->bid_bond_address,
            "construction_work" => $this->construction_work,
            "maintenance_work" => $this->maintenance_work,
        ];

        $rules = $service->rules();
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-new-tender-errors', $errors);
            $this->alertMessage('يرجى التأكد من إدخال البيانات', 'error');
            return false;
        }

        $tender = $service->store($data);

        if ($tender) {
            $this->alertMessage('تم تسجيل بيانات المناقصة بنجاح', 'success');
            $this->dispatch('process-has-been-done');
            $this->reset();
            return true;
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل بيانات المناقصة', 'error');
        return false;
    }
}
