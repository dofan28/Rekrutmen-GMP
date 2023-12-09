<?php

namespace App\Livewire\Admin\Others\Activitylog;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Spatie\Activitylog\Models\Activity;

#[Title("Informasi Peran")]
#[Layout('layouts.dashboard')]
class Role extends Component
{
    public $role;

    public function mount($id)
    {
        $this->role = Activity::find($id);
    }
    public function render()
    {
        return view('livewire.admin.others.activitylog.role', [
            'role' => $this->role
        ]);
    }
}
