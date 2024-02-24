<?php

namespace App\Livewire\Applicant\Profile\OrganizationalExperience;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\ApplicantOrganizationalExperience;

#[Title("Tambahkan Pengalamanan Organisasi Saya | Rekrutmen PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class Create extends Component
{
    public $organizational_name;
    public $position;
    public $organizational_description;

    public function rules(): array
    {
        return [
            'organizational_name' => ['required', 'string'],
            'position' => ['required', 'string'],
            'organizational_description' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'organizational_name.required' => 'Nama organisasi harus diisi.',
            'organizational_name.string' => 'Nama organisasi harus berupa teks.',

            'position.required' => 'Posisi harus diisi.',
            'position.string' => 'Posisi harus berupa teks.',

            'organizational_description.required' => 'Deskripsi organisasi harus diisi.',
            'organizational_description.string' => 'Deskripsi organisasi harus berupa teks.',
        ];
    }

    public function save()
    {
        $validatedData = $this->validate();

        $applicant = Auth::user();

        $validatedData['user_id'] = $applicant->id;

        ApplicantOrganizationalExperience::create($validatedData);

        session()->flash('success', 'Data pengalaman organisasi berhasil ditambahkan.');

        $this->redirect('/applicant/profile/organizationalexperiences');
    }

    public function render()
    {
        return view('livewire.applicant.profile.organizational-experience.create');
    }
}
