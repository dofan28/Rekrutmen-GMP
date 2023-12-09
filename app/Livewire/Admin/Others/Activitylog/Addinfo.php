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
    public $addinfo;

    public function mount($id)
    {
        $this->addinfo = Activity::find($id);
    }

    public function render()
    {
        return view('livewire.admin.others.activitylog.addinfo',[
            'addinfo' => $this->addinfo
        ]);
    }
}
