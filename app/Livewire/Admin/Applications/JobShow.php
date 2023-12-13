<?php

namespace App\Livewire\Admin\Applications;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Detail Lowongan")]
#[Layout('layouts.dashboard')]
class JobShow extends Component
{
    public Job $job;

    public function render()
    {
        return view('livewire.admin.applications.job-show');
    }
}
