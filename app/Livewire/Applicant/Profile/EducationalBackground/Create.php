<?php

namespace App\Livewire\Applicant\Profile\EducationalBackground;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\ApplicantEducationalBackground;

#[Title('Tambahkan Riwayat Pendidikan | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.dashboard')]
class Create extends Component
{
    public $level;
    public $institution;
    public $major;
    public $title;
    public $start_date;
    public $end_date;

    public function rules(): array
    {
        return [
            'level' => ['required', 'string'],
            'institution' => ['required', 'string'],
            'major' => ['required', 'string'],
            'title' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ];
    }

    public function messages()
    {
        return [
            'level.required' => 'Jenjang pendidikan harus diisi.',
            'level.string' => 'Jenjang pendidikan harus berupa teks.',

            'institution.required' => 'Institusi harus diisi.',
            'institution.string' => 'Institusi harus berupa teks.',

            'major.required' => 'Jurusan harus diisi.',
            'major.string' => 'Jurusan harus berupa teks.',

            'title.required' => 'Gelar harus diisi.',
            'title.string' => 'Gelar harus berupa teks.',

            'start_date.required' => 'Tanggal mulai harus diisi.',
            'start_date.date' => 'Tanggal mulai harus berformat tanggal yang valid.',

            'end_date.date' => 'Tanggal selesai harus berformat tanggal yang valid.',
            'end_date.after_or_equal' => 'Tanggal selesai harus lebih besar atau sama dengan tanggal mulai.',
        ];
    }

    public function save()
    {
        $validatedData = $this->validate();

        $applicant = Auth::user();

        $validatedData['user_id'] = $applicant->id;

        ApplicantEducationalBackground::create($validatedData);

        session()->flash('success', 'Data riwayat pendidikan berhasil ditambahkan.');

        $this->redirect('/applicant/profile/educationalbackgrounds');
    }

    public function render()
    {
        return view('livewire.applicant.profile.educational-background.create');
    }
}
