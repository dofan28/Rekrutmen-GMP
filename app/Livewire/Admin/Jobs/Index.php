<?php

namespace App\Livewire\Admin\Jobs;

use App\Models\Job;
use Livewire\Component;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Data Lowongan | Admin - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $search;

    public function delete($id){
        Job::destroy($id);
        Application::where('job_id', $id)->delete();

        session()->flash('success', 'Data lowongan kerja berhasil dihapus.');

        $this->redirect('/admin/jobs');
    }
    public function render()
    {
        $jobs = Job::when($this->search, function ($query) {
            $query->where(function ($subQuery) {
                $subQuery->where('position', 'like', '%' . $this->search . '%')
                    ->orWhere('jobdesk', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })->orWhereHas('jobcompany', function ($companyQuery) {
                $companyQuery->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            })->orWhereHas('jobeducation', function ($educationQuery) {
                $educationQuery->where('name', 'like', '%' . $this->search . '%');
            });
        })->get();

        return view('livewire.admin.jobs.index',[
            'jobs' => $jobs
        ]);
    }
}
