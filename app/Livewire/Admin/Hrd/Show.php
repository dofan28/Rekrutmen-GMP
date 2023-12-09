<?php

namespace App\Livewire\Admin\Hrd;

use App\Models\Hrd;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Detail HRD')]
#[Layout('layouts.dashboard')]
class Show extends Component
{
    public $hrd;
    
    public function mount($id){
        $this->hrd = Hrd::find($id);
    }
    public function render()
    {
        return view('livewire.admin.hrd.show');
    }
}
