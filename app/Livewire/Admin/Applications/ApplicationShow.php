<?php

namespace App\Livewire\Admin\Applications;

use Livewire\Component;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Detail Lamaran | Admin - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class ApplicationShow extends Component
{
    public Application $application;

    public function render()
    {
        return view('livewire.admin.applications.application-show');
    }
}
