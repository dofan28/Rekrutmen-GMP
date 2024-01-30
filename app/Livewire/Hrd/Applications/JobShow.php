<?php

namespace App\Livewire\Hrd\Applications;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Detail Lowongan Kerja | HRD - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class JobShow extends Component
{
    public Job $job;

    public function render()
    {
        return view('livewire.hrd.applications.job-show');
    }
}
