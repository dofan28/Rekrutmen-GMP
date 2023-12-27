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

    public $search;

    public function agree($id)
    {
        Job::find($id)->update(["status" => 1, "confirm" => 1]);

        return back()->with(
            "success",
            "Lowongan diterima."
        );
    }

    public function disagree($id)
    {
        Job::find($id)->update(["status" => 0, 'confirm' => 0]);

        return back()->with(
            "success",
            "Lowongan ditolak."
        );
    }
    public function render()
    {
        $jobs = Job::where('status', -1)->when($this->search, function ($query) {
            $query->where(function ($subQuery) {
                $subQuery->where(function ($subSubQuery) {
                    $subSubQuery->where('position', 'like', '%' . $this->search . '%')
                        ->orWhere('jobdesk', 'like', '%' . $this->search . '%')
                        ->orWhere('description', 'like', '%' . $this->search . '%');
                })->orWhereHas('jobcompany', function ($companyQuery) {
                    $companyQuery->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('address', 'like', '%' . $this->search . '%');
                })->orWhereHas('jobeducation', function ($educationQuery) {
                    $educationQuery->where('name', 'like', '%' . $this->search . '%');
                })->orWhereHas('hrddata', function ($hrddataQuery) {
                    $hrddataQuery->where(function ($hrdSubQuery) {
                        $hrdSubQuery->where('full_name', 'like', '%' . $this->search . '%')
                            ->orWhere('hrd_position', 'like', '%' . $this->search . '%');
                    });
                });
            });
        })->get();



        return view('livewire.hrd.jobs.publish-manage.index', [
            'jobs' => $jobs
        ]);
    }
}
