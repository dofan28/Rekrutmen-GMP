<?php

namespace App\Livewire\Hrd\Jobs;

use App\Models\Job;
use Livewire\Component;
use App\Models\JobEducation;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Detail Lowongan")]
#[Layout('layouts.dashboard')]
class Show extends Component
{
    public $job;
    public $jobeducation;

    public function mount($id)
    {
        $this->job = Job::find($id);
        $this->jobeducation = JobEducation::find(Job::find($id)->jobeducation_id)->name;
    }

    public function render()
    {
        return view('livewire.hrd.jobs.show');
    }
}
