<?php

namespace App\Livewire\Web\Centers;

use App\Http\Controllers\Services\Services;
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
    public $pagination = 3;
    public $sort_field = 'id';
    public $sort_direction = 'asc'; // desc

    public $filters = [];
    public $search_status = ["active"];

    private function setService()
    {
        return Services::createInstance("CenterService") ?? new Services();
    }

    #[Layout('layouts.web.app'), Title('مناقصاتكم - مراكز الاعمال')]
    public function render()
    {
        $this->filters["search"] = $this->search;
        $this->filters["status"] = $this->search_status;

        $service = $this->setService();
        $centers = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.web.centers.centers', [
            'centers' => $centers
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
