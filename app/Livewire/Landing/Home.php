<?php

namespace App\Livewire\Landing;

use Livewire\Component;
use App\Models\Job;

#[\Livewire\Attributes\Layout('layouts.landing')]
class Home extends Component
{
    public $jobs;
    public $jobcompanies;

    public function mount()
    {
        // Mengambil data pekerjaan (jobs) dengan status 1 dan data kolom deleted_at yang bernilai null
        $this->jobs = Job::where("status", 1)->get();
    
        // Mengambil semua data perusahaan pekerjaan (job companies) dan data kolom deleted_at yang bernilai null
        $this->jobcompanies = \App\Models\JobCompany::all();
    }

    public function render()
    {
        return view('livewire.landing.home', [
            "jobs" => $this->jobs,
            "jobcompanies" => $this->jobcompanies,
        ]);
    }
}
