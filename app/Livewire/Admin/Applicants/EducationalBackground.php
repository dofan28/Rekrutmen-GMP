<?php

namespace App\Livewire\Admin\Applicants;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\ApplicantEducationalBackground;

#[Title("Pelamar - Detail Riwayat Pendidikan")]
#[Layout('layouts.dashboard')]
class EducationalBackground extends Component
{

    public $educationalbackgrounds;

    public function mount(User $applicant){
        $this->educationalbackgrounds = $applicant->educationalbackground;
    }
    public function render()
    {
        return view('livewire.admin.applicants.educational-background');
    }
}
