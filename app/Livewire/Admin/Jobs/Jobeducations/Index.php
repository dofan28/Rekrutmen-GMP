<?php

namespace App\Livewire\Admin\Jobs\Jobeducations;

use App\Models\JobEducation;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Data Pendidikan")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $search;

    public function delete($id){
        JobEducation::destroy($id);

        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function render()
    {
        $jobeducations = JobEducation::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.admin.jobs.jobeducations.index', [
            'jobeducations' => $jobeducations
        ]);
    }
}
