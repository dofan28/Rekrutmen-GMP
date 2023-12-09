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

    public function render()
    {
        $applications = Application::whereHas("job", function ($query) {
            $query->where("hrd_id", Auth::guard("hrd")->user()->id);
        })->get();
        $hrd = Auth::guard("hrd")->user();
        return view('livewire.hrd.applications.index',[
            'applications' => $applications,
            'hrd' => $hrd
        ]);
    }
}