<?php

namespace App\Livewire\Admin\Applicants;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\ApplicantWorkExperience;

#[Title("Detail Pengalaman Kerja Pelamar | Admin - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class WorkExperience extends Component
{
    public $workexperiences;

    public function mount(User $applicant){
        $this->workexperiences = $applicant->workexperience;
    }
    public function render()
    {
        return view('livewire.admin.applicants.work-experience');
    }
}
