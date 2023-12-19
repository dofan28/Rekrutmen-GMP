<?php

namespace App\Livewire\Admin\Others\Recyclebin\Jobs\Jobcompanies;

use Livewire\Component;
use App\Models\JobCompany;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Tempat Sampah | Perusahaan")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $search;

    public function render()
    {
        $jobcompanies = JobCompany::query()
            ->onlyTrashed()
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            })
            ->get();



        return view('livewire.admin.others.recyclebin.jobs.jobcompanies.index', [
            'jobcompanies' => $jobcompanies
        ]);
    }
}
