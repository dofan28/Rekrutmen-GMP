<?php

namespace App\Livewire\Hrd\Jobs;

use App\Models\Job;
use Livewire\Component;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title("Mengelola Lowongan")]
#[Layout('layouts.dashboard')]
class Index extends Component
{

    public $search;

    public function delete($id){
        // delete data job, sesuai dengan params
        Job::destroy($id);

        // delete data application, sesuai dengan params
        Application::where('job_id', $id)->delete();

        return back()->with('success', 'Lowongan telah dihapus!');
    }

    public function open($id){
        $hrd = Auth::user();
        if ($hrd->hrddata->is_recruitment_staff === 0) {
            $this->authorize('jobStatus', Job::find($id));
        }
        Job::find($id)->update(['status' => 1]);

        return back()->with('success', 'Lowongan telah dibuka!');
    }

    public function close($id){
        $hrd = Auth::user();
        if ($hrd->hrddata->is_recruitment_staff === 0) {
            $this->authorize('jobStatus', Job::find($id));
        }
        Job::find($id)->update(['status' => 0]);

        return back()->with('success', 'Lowongan telah ditutup!');
    }

    public function waiting($id){
        $hrd = Auth::user();
        if ($hrd->hrddata->is_recruitment_staff === 0) {
            $this->authorize('jobStatus', Job::find($id));
        }
        Job::find($id)->update(['status' => -1, 'confirm' => null]);

        return back()->with('success', 'Tunggu konfirmasi buka lowongan dari Staff Recruitment.');
    }

    public function render()
    {
        $hrd = Auth::user();
        $query = Job::query();

        if ($hrd->hrddata->is_recruitment_staff == 1) {
            $query->where('confirm', '1');
        } else {
            $query->where('hrd_id', $hrd->hrddata->id);
        }

        if ($this->search) {
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
                });
            });
        }

        $jobs = $query->get();

        return view('livewire.hrd.jobs.index', [
            'hrd' => $hrd,
            'jobs' => $jobs,
        ]);
    }

}
