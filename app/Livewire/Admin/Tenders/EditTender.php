<?php

namespace App\Livewire\Admin\Tenders;

use App\Http\Controllers\Services\Services;
use App\Models\Tender;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditTender extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $tender = null;

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


    public function mount(Tender $tender)
    {
        $this->tender = $tender;
        $this->name = $tender->name;
        $this->code = $tender->code;
        $this->reference_code = $tender->reference_code;
        $this->purpose = $tender->purpose;
        $this->tender_type_id = $tender->tender_type_id;
        $this->government_broker_id = $tender->government_broker_id;
        $this->cities = $tender->cities;
        $this->activities = $tender->activities;
        $this->tags = $tender->tags;
        $this->bid_book = $tender->bid_book;
        $this->actual_bid_book_price = $tender->actual_bid_book_price;
        $this->bid_book_download_price = $tender->bid_book_download_price;
        $this->additional_instructions_file = $tender->additional_instructions_file;
        $this->submission_location = $tender->submission_location;
        $this->envelope_opening_location = $tender->envelope_opening_location;
        $this->execution_location = $tender->execution_location;
        $this->adding_date = $tender->adding_date->format("Y-m-d");
        $this->last_inquiry_date = $tender->last_inquiry_date->format("Y-m-d");
        $this->last_submission_date = $tender->last_submission_date->format("Y-m-d");
        $this->envelope_opening_date_time = $tender->envelope_opening_date_time->format("Y-m-d");
        $this->news = $tender->news;
        $this->bid_bond = $tender->bid_bond;
        $this->bid_bond_address = $tender->bid_bond_address;
        $this->construction_work = $tender->construction_work;
        $this->maintenance_work = $tender->maintenance_work;
    }

    #[Title('لوحة التحكم - تعديل المناقصة'), Layout('layouts.admin.app')]
    public function render()
    {
        return view('livewire.admin.tenders.edit-tender');
    }

    private function setService()
    {
        return Services::createInstance("TenderService") ?? new Services();
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

    public function editTender()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
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
            "status" => $this->status,
        ];

        $rules = $service->rules($this->tender->id);
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('edit-new-tender-errors', $errors);
            $this->alertMessage('يرجى التأكد من البيانات', 'error');
            return false;
        }

        $result = $service->update($data, $this->tender->id);

        if ($result) {
            return redirect()->route('admin.tenders.edit', $this->tender->id);
        }
        $this->alertMessage('حدث خطأ اثناء تحديث البيانات', 'error');
        return false;
    }
}
