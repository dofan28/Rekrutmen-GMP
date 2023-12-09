<?php

namespace App\Livewire\Hrd\Applications;

use Livewire\Component;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Detail Data Pelamar")]
#[Layout('layouts.dashboard')]
class ApplicantShow extends Component
{
    public $application;
    
    public function mount($id){
        $this->application = Application::find($id);
    }
    
    public function render()
    {
        return view('livewire.hrd.applications.applicant-show');
    }
}
