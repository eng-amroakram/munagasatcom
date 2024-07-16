<?php

namespace App\Livewire;

use Livewire\Component;

class PageHeader extends Component
{
    public $title = '';
    public $label = '';
    public $model = '';
    public $perm = '';

    public function mount($title, $label, $model, $perm)
    {
        $this->title = $title;
        $this->label = $label;
        $this->model = $model;
        $this->perm = $perm;
    }

    public function render()
    {
        return view('livewire.page-header');
    }
}
