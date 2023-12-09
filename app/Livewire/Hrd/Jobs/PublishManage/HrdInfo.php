<?php

namespace App\Livewire\Hrd\Jobs\PublishManage;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Informasi HRD")]
#[Layout('layouts.dashboard')]
class HrdInfo extends Component
{
    public $job;
    public $hrd;

    public function mount($id){
        $this->job = Job::find($id);
        $this->hrd = $this->job->hrd;
    }

    public function render()
    {
        return view('livewire.hrd.jobs.publish-manage.hrd-info');
    }
}
