<?php

namespace App\Livewire\Hrd\Applications;

use Livewire\Component;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Surat Lamaran | HRD - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class Letter extends Component
{
    public $application;
    
    public function mount($id){
        $this->application = Application::find($id);
    }

    public function render()
    {
        return view('livewire.hrd.applications.letter');
    }
}
