<?php

namespace App\Livewire\Admin\Others\Recyclebin\Jobs\Jobeducations;

use App\Models\JobEducation;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public function render()
    {
        $jobeducations = JobEducation::query()
        ->where('name', 'like', '%' . $this->search . '%')
        ->onlyTrashed()->get();
        return view('livewire.admin.others.recyclebin.jobs.jobeducations.index', [
            'jobeducations' => $jobeducations
        ]);
    }
}
