<?php

namespace App\Livewire\Admin\Others\Recyclebin;

use App\Models\Hrd;
use App\Models\Job;
use Livewire\Component;
use App\Models\Applicant;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Tempat Sampah")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public function render()
    {
        $applicants = Applicant::onlyTrashed()->get();
        $jobs = Job::onlyTrashed()->get();
        $applications = Application::onlyTrashed()->get();
        $hrds = Hrd::onlyTrashed()->get();
        return view('livewire.admin.others.recyclebin.index',[
            'applicants' => $applicants,
            'jobs' => $jobs,
            'applications' => $applications,
            'hrds' => $hrds
        ]);
    }
}
