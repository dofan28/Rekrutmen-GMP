<?php

namespace App\Livewire\Landing\Job;

use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Rekrutmen PT. Graha Mutu Persada - Lowongan Pekerjaan")]
#[Layout('layouts.landing')]
class JobCompany extends Component
{
    public $jobcompany;
    public $search;

    public function mount($id)
    {
        $this->jobcompany = \App\Models\JobCompany::where('id', $id)
            ->when($this->search, function ($query) {
                $query->where('position', 'like', '%' . $this->search . '%')
                    ->orWhere('jobdesk', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhereHas('jobcompany', function ($companyQuery) {
                        $companyQuery->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('address', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('jobeducation', function ($educationQuery) {
                        $educationQuery->where('name', 'like', '%' . $this->search . '%');
                    });
            })
            ->first();
    }
    
    public function render()
    {
        return view('livewire.landing.job.job-company',[
            'jobcompany' => $this->jobcompany,
        ]);
    }
}
