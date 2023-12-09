<?php

namespace App\Livewire\Admin\Others\Recyclebin\Jobs\Jobcompanies;

use App\Livewire\Landing\Job\JobCompany;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Surat Lamaran Saya")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $search;

    public function render()
    {
        $jobcompanies = JobCompany::query()
        ->where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('address', 'like', '%' . $this->search . '%');
        })
        ->onlyTrashed()->get();
        return view('livewire.admin.others.recyclebin.jobs.jobcompanies.index',[
            'jobcompanies' => $jobcompanies
        ]);
    }
}
