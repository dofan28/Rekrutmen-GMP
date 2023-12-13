<?php

namespace App\Livewire\Admin\Others\Activitylog;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Spatie\Activitylog\Models\Activity;

#[Title("Informasi Subjek")]
#[Layout('layouts.dashboard')]
class Subject extends Component
{
    public Activity $subject;

    public function render()
    {
        return view('livewire.admin.others.activitylog.subject');
    }
}
