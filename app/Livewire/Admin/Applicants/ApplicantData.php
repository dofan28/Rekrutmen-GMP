<?php

namespace App\Livewire\Admin\Applicants;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Pelamar - Detail Data Pribadi")]
#[Layout('layouts.dashboard')]
class ApplicantData extends Component
{
    public \App\Models\ApplicantData $applicantdata;


    public function render()
    {
        return view('livewire.admin.applicants.applicant-data');
    }
}
