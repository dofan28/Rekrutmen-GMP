<?php

namespace App\Livewire\Hrd\Applications;

use Livewire\Component;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

#[Title("Mengelolah Lamaran")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    use WithPagination;

    public function reject($id){
        // $this->authorize("hrdAcceptReject", Application::find($id));

        Application::find($id)->update(["status" => 0]);

        return back()->with('success', 'Lamaran telah ditolak!');

    }
    public function render()
    {
        $applications = Application::whereHas("job", function ($query) {
            $query->where("hrd_id", Auth::user()->hrddata->id);
        })->get();
        return view('livewire.hrd.applications.index',[
            'applications' => $applications,
        ]);
    }
}
