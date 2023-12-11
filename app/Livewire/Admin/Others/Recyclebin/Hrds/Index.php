<?php

namespace App\Livewire\Admin\Others\Recyclebin\Hrds;

use App\Models\Hrd;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Tempat Sampah | HRD")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $search;

    public function render()
    {
        $hrds = User::where('role', 'hrd')->when($this->search, function ($query) {
            $query->where('username', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%')->orWhereHas('hrd_data', function ($hrddataQuery) {
                $hrddataQuery->where('full_name', 'like', '%' . $this->search . '%')->orWhere('hrd_position', 'like', '%' . $this->search . '%');
            });
        })->onlyTrashed()
            ->get();


        return view('livewire.admin.others.recyclebin.hrds.index', [
            'hrds' => $hrds
        ]);
    }
}
