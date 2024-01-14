<?php

namespace App\Livewire\Applicant\Application;

use Livewire\Component;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Detail Lamaran Lowongan Kerja Saya | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.dashboard')]
class Show extends Component
{
    public Application $application;

    public function render()
    {
        return view('livewire.applicant.application.show');
    }
}
