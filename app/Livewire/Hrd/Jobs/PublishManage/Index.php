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


    public function agree($id){
        Job::find($id)->update(["status" => 1, "confirm" => 1]);

        return back()->with(
            "success",
            "Lowongan diterima."
        );
    }

    public function disagree($id){
        Job::find($id)->update(["status" => 0, 'confirm' => 0]);

        return back()->with(
            "success",
            "Lowongan ditolak."
        );
    }
    public function render()
    {
        $jobs = Job::where('status', -1)->get();
        return view('livewire.hrd.jobs.publish-manage.index', [
            'jobs' => $jobs
        ]);
    }
}
