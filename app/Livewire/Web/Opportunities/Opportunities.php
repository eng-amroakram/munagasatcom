<?php

namespace App\Livewire\Web\Opportunities;

use App\Http\Controllers\Services\Services;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Opportunities extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    protected $service = null;

    public $search = "";
    public $pagination = 3;
    public $sort_field = 'id';
    public $sort_direction = 'asc'; // desc

    public $filters = [];
    public $search_status = ["active"];

    private function setService()
    {
        return Services::createInstance("OpportunityService") ?? new Services();
    }

    #[Layout('layouts.web.app'), Title('مناقصاتكم - الفرص الاستثمارية')]
    public function render()
    {
        $this->filters["search"] = $this->search;
        $this->filters["status"] = $this->search_status;

        $service = $this->setService();
        $opportunities = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.web.opportunities.opportunities', [
            'opportunities' => $opportunities
        ]);
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
