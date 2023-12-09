<?php

namespace App\Livewire\Applicant\Application;

use App\Models\Job;
use Livewire\Component;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title("Lamaran Saya")]
#[Layout('layouts.dashboard')]
class Index extends Component
{

    public $search;

    public function render()
    {
        $applicant = Auth::user();
        $jobs = Job::where("status", 1)->get();
        $applications = Application::where('user_id', $applicant->id)
        ->when($this->search, function ($query) {
            $query->where(function ($subQuery) {
                $subQuery->where('applicant_letter', 'like', '%' . $this->search . '%')->orWhere('company_letter', 'like', '%' . $this->search . '%' )
                    ->orWhereHas('job', function ($jobQuery) {
                        $jobQuery->where(function ($subJobQuery) {
                            $subJobQuery->where('position', 'like', '%' . $this->search . '%')
                                ->orWhere('jobdesk', 'like', '%' . $this->search . '%')
                                ->orWhere('description', 'like', '%' . $this->search . '%')
                                ->orWhereHas('jobcompany', function ($companyQuery) {
                                    $companyQuery->where('name', 'like', '%' . $this->search . '%')
                                        ->orWhere('address', 'like', '%' . $this->search . '%');
                                })
                                ->orWhereHas('jobeducation', function ($educationQuery) {
                                    $educationQuery->where('name', 'like', '%' . $this->search . '%');
                                });
                        });
                    });
            });
        })
        ->latest()
        ->get();


        return view('livewire.applicant.application.index', [
            'applicant' => $applicant,
            'jobs' => $jobs,
            'applications' => $applications,
        ]);
    }
}
