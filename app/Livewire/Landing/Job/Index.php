<?php

namespace App\Livewire\Landing\Job;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Rekrutmen PT. Graha Mutu Persada - Lowongan Pekerjaan")]
#[Layout('layouts.landing')]
class Index extends Component
{
    public $search;

    public function render()
    {
        $jobs = Job::where('status', 1)
            ->when($this->search, function ($query) {
                $query->where('position', 'like', '%' . $this->search . '%') ->orWhere('jobdesk', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhereHas('jobcompany', function ($companyQuery) {
                        $companyQuery->where('name', 'like', '%' . $this->search . '%')->orWhere('address', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('jobeducation', function ($educationQuery) {
                        $educationQuery->where('name', 'like', '%' . $this->search . '%');
                    });
            })->get();

        return view('livewire.landing.job.index', [
            'jobs' => $jobs,
        ]);
    }
}
