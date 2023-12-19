<?php

namespace App\Livewire\Landing\Job;

use App\Models\Job;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Redirect;

#[Title("Rekrutmen PT. Graha Mutu Persada - Detail Lowongan Pekerjaan")] //ganti suapaya dinamis
#[Layout('layouts.landing')]
class Show extends Component
{
    public $job;
    public $jobEducation;

    public function mount(Job $job)
    {

        // Periksa apakah pekerjaan aktif (status = 1)
        if ($job && $job->status === 1) {
            $this->job = $job;
            $this->jobEducation = \App\Models\JobEducation::find($job->jobeducation_id)->name;
        } else {
            return Redirect::to('/'); // Atau alamat lain sesuai kebutuhan
        }
    }
    public function render()
    {
        return view('livewire.landing.job.show', [
            'job' => $this->job,
            'jobeducation' => $this->jobEducation,
        ]);
    }
}
