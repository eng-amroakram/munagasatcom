<?php

namespace App\Livewire\Web\Tenders;

use App\Http\Controllers\Services\Services;
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
    public $pagination = 3;
    public $sort_field = 'id';
    public $sort_direction = 'asc'; // desc

    public $filters = [];
    public $search_status = ["active"];

    #[Layout('layouts.web.app'), Title('مناقصاتكم - المناقصات')]
    public function render()
    {
        $this->filters["search"] = $this->search;
        $this->filters["status"] = $this->search_status;

        $service = $this->setService();
        $tenders = $service->data($this->filters, $this->sort_field, $this->sort_direction, $this->pagination);

        return view('livewire.web.tenders.tenders', [
            'tenders' => $tenders
        ]);
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
}
