<?php

namespace App\Livewire\Admin\Others\Activitylog;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Spatie\Activitylog\Models\Activity;

#[Title("Informasi HRD")]
#[Layout('layouts.dashboard')]
class Addinfo extends Component
{
    public Activity $addinfo;


    public function render()
    {
        return view('livewire.admin.others.activitylog.addinfo');
    }
}
