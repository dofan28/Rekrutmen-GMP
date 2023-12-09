<?php

namespace App\Livewire\Hrd\Applications;

use Livewire\Component;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title("Terima Lamaran")]
#[Layout('layouts.dashboard')]
class Accept extends Component
{
    public $application;
    public $company_letter;

    public function mount($id)
    {
        $this->authorize("hrdAcceptReject", Application::find($id));

        $this->application = Application::find($id);
    }

    public function accept()
    {
        $this->validate([
            'company_letter' => 'required',
        ]);

        Application::find($this->application->id)->update([
            "status" => 1,
            "company_letter" => $this->company_letter,
        ]);

        session()->flash('success', 'Lamaran telah diterima!');

        return redirect("/hrd/applications");
    }

    public function render()
    {
        $profile = Auth::guard("hrd")->user()->name;
        return view('livewire.hrd.applications.accept', [
            'profile' => $profile
        ]);
    }
}
