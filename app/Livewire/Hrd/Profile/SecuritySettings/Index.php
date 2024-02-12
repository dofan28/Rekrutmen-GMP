<?php

namespace App\Livewire\Hrd\Profile\SecuritySettings;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


#[Title("Pengaturan Keamanan | HRD - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.hrd.profile.security-settings.index');
    }
}
