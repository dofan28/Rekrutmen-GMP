<?php

namespace App\Livewire\Admin\Others\Recyclebin\Jobs\Jobeducations;

use Livewire\Component;
use App\Models\JobEducation;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Tempat Sampah | Pendidikan")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $search;
    public function render()
    {
        $jobeducations = JobEducation::query()
            ->onlyTrashed()
            ->where('name', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.admin.others.recyclebin.jobs.jobeducations.index', [
            'jobeducations' => $jobeducations
        ]);
    }
}
