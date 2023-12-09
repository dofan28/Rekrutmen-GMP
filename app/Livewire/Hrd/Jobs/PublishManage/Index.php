<?php

namespace App\Livewire\Hrd\Jobs\PublishManage;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Pengajuan Lowongan Baru")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $jobs;

    public function mount(){
        $this->jobs = Job::where('status', -1)->get();
    }

    public function render()
    {
        return view('livewire.hrd.jobs.publish-manage.index');
    }
}
