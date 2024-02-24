<?php

namespace App\Livewire\Applicant\Profile\WorkExperience;

use App\Models\ApplicantWorkExperience;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title("Pengalaman Kerja Saya | Rekrutmen PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $company;
    public $position;
    public $last_salary;
    public $job_description;
    public $start_date;
    public $end_date;

    public function rules(): array
    {
        return [
            'company' => ['required', 'string'],
            'position' => ['required', 'string'],
            'last_salary' => ['required', 'numeric', 'between:0.01,99999999.99'],
            'job_description' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ];
    }

    public function messages()
    {
        return [
            'company.required' => 'Nama perusahaan harus diisi.',
            'company.string' => 'Nama perusahaan harus berupa teks.',

            'position.required' => 'Posisi harus diisi.',
            'position.string' => 'Posisi harus berupa teks.',

            'last_salary.required' => 'Gaji terakhir harus diisi.',
            'last_salary.numeric' => 'Gaji terakhir harus berupa angka.',
            'last_salary.between' => 'Kolom gaji terakhir harus antara :min dan :max.',

            'job_description.required' => 'Deskripsi pekerjaan harus diisi.',
            'job_description.string' => 'Deskripsi pekerjaan harus berupa teks.',

            'start_date.required' => 'Tanggal mulai harus diisi.',
            'start_date.date' => 'Tanggal mulai harus berformat tanggal yang valid.',

            'end_date.date' => 'Tanggal selesai harus berformat tanggal yang valid.',
            'end_date.after_or_equal' => 'Tanggal selesai harus lebih besar atau sama dengan tanggal mulai.',
        ];
    }

    public function save(){
        $validatedData = $this->validate();

        $applicant = Auth::user();

        $validatedData['user_id'] = $applicant->id;

        ApplicantWorkExperience::create($validatedData);

        session('success', 'Data pengalaman kerja berhasil disimpan.');
    }

    public function delete($id)
    {
        $workexperience = ApplicantWorkExperience::find($id);
        $workexperience->delete();

        session()->flash('success', 'Data pengalaman kerja berhasil dihapus.');

        $this->redirect('/applicant/profile/workexperiences');
    }
    public function render()
    {
        return view('livewire.applicant.profile.work-experience.index');
    }
}
