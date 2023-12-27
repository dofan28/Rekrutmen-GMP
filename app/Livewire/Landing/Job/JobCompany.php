<?php

namespace App\Livewire\Landing\Job;

use App\Models\Job;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Rekrutmen PT. Graha Mutu Persada - Lowongan Pekerjaan")]
#[Layout('layouts.landing')]
class JobCompany extends Component
{
    public $jobcompany;
    public $jobs;
    public $search;

    public function mount(\App\Models\JobCompany $jobcompany)
    {
        $this->jobs = Job::where('jobcompany_id', $jobcompany->id)
                    ->where('status', 1) // Filter status 1
                    ->when($this->search, function ($query, $search) {
                        $query->where(function ($subQuery) use ($search) {
                            $subQuery->where('position', 'like', '%' . $search . '%')
                                ->orWhere('jobdesk', 'like', '%' . $search . '%')
                                ->orWhere('description', 'like', '%' . $search . '%');
                        })->orWhereHas('jobcompany', function ($companyQuery) use ($search) {
                            $companyQuery->where('name', 'like', '%' . $search . '%')
                                ->orWhere('address', 'like', '%' . $search . '%');
                        })->orWhereHas('jobeducation', function ($educationQuery) use ($search) {
                            $educationQuery->where('name', 'like', '%' . $search . '%');
                        });
                    })->get();

    $this->jobcompany = $jobcompany;

    }

    public function render()
    {
        return view('livewire.landing.job.job-company');
    }
}
