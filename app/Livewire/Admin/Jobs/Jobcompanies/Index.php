<?php

namespace App\Livewire\Admin\Jobs\Jobcompanies;

use App\Models\JobCompany;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Data Perusahaan")]
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
        ->get();

        return view('livewire.admin.jobs.jobcompanies.index',[
            'jobcompanies' => $jobcompanies
        ]);
    }
}
