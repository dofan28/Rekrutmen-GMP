<?php

namespace App\Livewire\Admin\Dashboard;

use App\Models\Hrd;
use App\Models\Job;
use App\Models\User;
use Livewire\Component;
use App\Models\Applicant;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Dashboard")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public function render()
    {
        $applicants = User::where('role', 'applicant');
        $jobs = Job::all();
        $applications = Application::all();
        $hrds = User::where('role', 'hrd');
        return view('livewire.admin.dashboard.index',[
            'applicants' => $applicants,
            'jobs' => $jobs,
            'applications' => $applications,
            'hrds' => $hrds
        ]);
    }
}
