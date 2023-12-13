<?php

namespace App\Livewire\Admin\Jobs;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Detail Lowongan")]
#[Layout('layouts.dashboard')]
class Show extends Component
{
    public Job $job;

    public function render()
    {
        return view('livewire.admin.jobs.show');
    }
}
