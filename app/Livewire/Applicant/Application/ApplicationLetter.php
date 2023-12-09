<?php

namespace App\Livewire\Applicant\Application;

use Livewire\Component;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Surat Lamaran Saya")]
#[Layout('layouts.dashboard')]
class ApplicationLetter extends Component
{
    public $application;
    public function mount($id){
        $this->application = Application::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.applicant.application.application-letter');
    }
}
