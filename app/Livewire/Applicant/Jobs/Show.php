<?php

namespace App\Livewire\Applicant\Jobs;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[\Livewire\Attributes\Layout('layouts.dashboard')]
#[Title('Detail Lowongan Kerja | Rekrutmen PT. Graha Mutu Persada')]
class Show extends Component
{
    public Job $job;

    public function render()
    {
        return view('livewire.applicant.jobs.show');
    }
}
