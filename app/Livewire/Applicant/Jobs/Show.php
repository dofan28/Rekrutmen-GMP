<?php

namespace App\Livewire\Applicant\Jobs;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[\Livewire\Attributes\Layout('layouts.dashboard')]
#[Title("Detail Lowongan")]
class Show extends Component
{
    public $job;

    public function mount($id){
        $this->job = Job::find($id);
    }

    public function render()
    {
        return view('livewire.applicant.jobs.show',[
            ]);
    }
}
