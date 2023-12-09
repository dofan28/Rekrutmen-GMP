<?php

namespace App\Livewire\Hrd\Jobs\PublishManage;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Informasi Lowongan")]
#[Layout('layouts.dashboard')]
class JobInfo extends Component
{
    public $job;
    public function mount($id){
        $this->job = Job::find($id);
    }

    public function render()
    {
        return view('livewire.hrd.jobs.publish-manage.job-info');
    }
}
