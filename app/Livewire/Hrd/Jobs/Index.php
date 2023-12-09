<?php

namespace App\Livewire\Hrd\Jobs;

use Livewire\Component;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Mengelolah Lowongan")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public function render()
    {
        $hrd = Auth::guard('hrd')->user();

        if ($hrd->is_recruitment_staff == 1) {
            $jobs = Job::where('confirm', '1')->get();
        } else {
            $jobs = Job::where('hrd_id',$hrd->id)->get();
        }
        return view('livewire.hrd.jobs.index',[
            'hrd' => $hrd,
            'jobs' => $jobs,
        ]);
    }
}
