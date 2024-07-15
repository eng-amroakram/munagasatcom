<?php

namespace App\Livewire\Web\Opportunities;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Opportunities extends Component
{
    #[Layout('layouts.web.app'), Title('مناقصاتكم - الفرص الاستثمارية')]
    public function render()
    {
        return view('livewire.web.opportunities.opportunities');
    }
}
