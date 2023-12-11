<?php

namespace App\Livewire\Admin\Others\Recyclebin;

use App\Models\Hrd;
use App\Models\Job;
use App\Models\User;
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
        $applicants = User::where('role', 'applicant')->onlyTrashed()->get();
        $jobs = Job::onlyTrashed()->get();
        $applications = Application::onlyTrashed()->get();
        $hrds = User::where('role', 'hrd')->onlyTrashed()->get();
        return view('livewire.admin.others.recyclebin.index',[
            'applicants' => $applicants,
            'jobs' => $jobs,
            'applications' => $applications,
            'hrds' => $hrds
        ]);
    }
}
