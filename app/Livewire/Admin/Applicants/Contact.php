<?php

namespace App\Livewire\Admin\Applicants;

use App\Models\ApplicantContact;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Pelamar - Detail Kontak")]
#[Layout('layouts.dashboard')]
class Contact extends Component
{
   public ApplicantContact $applicantcontact;

    public function render()
    {
        return view('livewire.admin.applicants.contact');
    }
}
