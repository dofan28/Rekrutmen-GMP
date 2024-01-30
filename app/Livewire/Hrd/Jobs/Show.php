<?php

namespace App\Livewire\Hrd\Jobs;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Detail Lowongan Kerja | HRD - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class Show extends Component
{
    public Job $job;

    public function render()
    {
        return view('livewire.hrd.jobs.show');
    }
}
