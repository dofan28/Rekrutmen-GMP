<?php

namespace App\Livewire\Admin\Applications;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Detail Pelamar | Admin - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class ApplicantShow extends Component
{
    public User $applicant;

    public function render()
    {
        return view('livewire.admin.applications.applicant-show');
    }
}
