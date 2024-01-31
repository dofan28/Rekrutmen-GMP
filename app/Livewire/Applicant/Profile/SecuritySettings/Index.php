<?php

namespace App\Livewire\Applicant\Profile\SecuritySettings;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Pengaturan Keamanan | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.applicant.profile.security-settings.index');
    }
}
