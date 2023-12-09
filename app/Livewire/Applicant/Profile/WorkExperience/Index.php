<?php

namespace App\Livewire\Applicant\Profile\WorkExperience;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Data Pribadi")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.applicant.profile.work-experience.index');
    }
}
