<?php

namespace App\Livewire\Admin\Opportunities;

use App\Http\Controllers\Services\Services;
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
    public $opportunity_notes = [];
    public $cities = [];
    public $address = "";
    public $method = "";
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
            "opportunity_notes" => $this->opportunity_notes,
            "cities" => $this->cities,
            "address" => $this->address,
            "method" => $this->method,
            "manager" => $this->manager,
            "phone" => $this->phone,
            "email" => $this->email,
            "status" => $this->status
        ];

        dd($data);
    }
}
