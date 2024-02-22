<?php

namespace App\Livewire\Applicant\Application;

use Livewire\Component;
use App\Models\Application;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Surat Balasan Perusahaan | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.dashboard')]
class CompanyReply extends Component
{
    public Application $application;
    
    public function render()
    {
        return view('livewire.applicant.application.company-reply');
    }
}
