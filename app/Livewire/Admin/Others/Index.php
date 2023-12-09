<?php

namespace App\Livewire\Admin\Others;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Lainnya")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.others.index');
    }
}
