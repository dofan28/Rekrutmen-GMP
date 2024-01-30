<?php

namespace App\Livewire\Admin\Applicants;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Detail Pengalaman Organisasi Pelamar | Admin - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class OrganizationalExperience extends Component
{
    public $organizationalexperiences;

    public function mount(User $applicant){
        $this->organizationalexperiences = $applicant->organizationalexperience;
    }

    public function render()
    {
        return view('livewire.admin.applicants.organizational-experience');
    }
}
