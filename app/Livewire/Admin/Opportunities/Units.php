<?php

namespace App\Livewire\Admin\Opportunities;

use App\Http\Controllers\Services\Services;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Units extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    protected $service = null;

    public $search = "";
    public $pagination = 10;
    public $sort_field = 'id';
    public $sort_direction = 'asc'; // desc

    public $filters = [];
    public $search_status = "";

    public $name = "";
    public $unit = '';
    public $amount = '';
    public $status = "active";

    public $unit_id = "";

    #[Title('لوحة التحكم - وحدات القياس'), Layout('layouts.admin.app')]
    public function render()
    {
        $this->filters["search"] = $this->search;
        $this->filters["status"] = $this->search_status;

        $service = $this->setService();
        $units = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.admin.opportunities.units', [
            'units' => $units
        ]);
    }

    private function setService()
    {
        return Services::createInstance("UnitService") ?? new Services();
    }

    public function changeStatus($id)
    {
        $service = $this->setService();
        $result = $service->changeStatus($id);
        if ($result) {
            $this->alertMessage("تم تعديل حالة الوحدة بنجاح", 'success');
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
            $this->alertMessage("تم حذف الوحدة بنجاح", 'success');
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

    public function addUnit()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "unit" => $this->unit,
            "amount" => $this->amount,
            "status" => $this->status,
        ];

        $rules = $service->rules();
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-new-unit-errors', $errors);
            $this->alertMessage('يرجى التأكد من إدخال البيانات', 'error');
            return false;
        }

        $unit = $service->store($data);


        if ($unit) {
            $this->alertMessage('تم تسجيل البيانات بنجاح', 'success');
            $this->dispatch('process-has-been-done');
            return redirect()->route('admin.opportunities.units');
            return true;
        }

        $this->alertMessage('حدث خطأ اثناء تسجيل بياناتك', 'error');
        return false;
    }

    public function updateUnit()
    {
        $service = $this->setService();

        $data = [
            "name" => $this->name,
            "unit" => $this->unit,
            "amount" => $this->amount,
            "status" => $this->status,
        ];

        $rules = $service->rules($this->unit_id);
        $messages = $service->messages();
        $validator = Validator::make($data, $rules, $messages);
        $errors = array_map(fn ($value) => $value[0], $validator->errors()->toArray());

        if (count($errors)) {
            $this->dispatch('create-new-unit-errors', $errors);
            $this->alertMessage('يرجى التأكد من البيانات', 'error');
            return false;
        }

        $result = $service->update($data, $this->unit_id);

        if ($result) {
            $this->alertMessage('تم تحديث البيانات بنجاح', 'success');
            $this->dispatch('process-has-been-done');
            return redirect()->route('admin.opportunities.units');
            return true;
        }

        $this->alertMessage('حدث خطأ اثناء تحديث البيانات', 'error');
        return false;
    }

    public function edit($id)
    {
        $service = $this->setService();
        $unit = $service->model($id);
        $this->unit_id = $id;

        $this->name = $unit->name;
        $this->unit = $unit->unit;
        $this->amount = $unit->amount;
        $this->status = $unit->status;

        $this->dispatch('set-unit-unit', ["unit" => $unit->unit]);
    }

    public function resetting()
    {
        $this->reset();
    }
}
