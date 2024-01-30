<?php

namespace App\Livewire\Jobs;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Lowongan Pekerjaan di Cabang Perusahaan | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.main')]
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
        return view('livewire.jobs.jobcompany');
    }
}
