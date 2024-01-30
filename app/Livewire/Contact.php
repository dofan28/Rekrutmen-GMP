<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Hubungi Kami | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.main')]
class Contact extends Component
{
    public function render()
    {
        return view('livewire.contact');
    }
}
