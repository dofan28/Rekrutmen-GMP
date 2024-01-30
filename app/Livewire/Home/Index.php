<?php

namespace App\Livewire\Home;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.main')]
class Index extends Component
{
    public $jobs;
    public $jobcompanies;

    public function mount()
    {
        // Mengambil data pekerjaan (jobs) dengan status 1 dan data kolom deleted_at yang bernilai null
        $this->jobs = Job::where("status", 1)->latest()->limit(4)->get();

        // Mengambil semua data perusahaan pekerjaan (job companies) dan data kolom deleted_at yang bernilai null
        $this->jobcompanies = \App\Models\JobCompany::all();
    }

    public function render()
    {
        return view('livewire.home.index', [
            "jobs" => $this->jobs,
            "jobcompanies" => $this->jobcompanies,
        ]);
    }
}
