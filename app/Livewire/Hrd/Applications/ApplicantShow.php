<?php

namespace App\Livewire\Hrd\Applications;

use Livewire\Component;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Detail Data Pelamar | HRD - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class ApplicantShow extends Component
{
    public Application $application;

    public function render()
    {
        return view('livewire.hrd.applications.applicant-show');
    }
}
