<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Pertanyaan Umum | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.landing')]
class Faq extends Component
{
    public function render()
    {
        return view('livewire.faq');
    }
}