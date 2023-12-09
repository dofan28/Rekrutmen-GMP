<?php

namespace App\Livewire\Applicant\Application;

use App\Models\Job;
use Livewire\Component;
use App\Models\Application;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title("Ajukan Lamaran")]
#[Layout('layouts.dashboard')]
class Create extends Component
{
    use WithFileUploads;

    public $job;
    public $job_id;
    public $cv;
    public $applicant_letter;

    public function rules()
    {
        return [
            'job_id' => ['required', 'exists:jobs,id', Rule::unique('applications')->where(function ($query) {
                return $query->where('job_id', $this->job_id)->where('user_id', Auth::user()->id);
            })],
            'cv' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
            'applicant_letter' => ['nullable', 'string', 'max:1000'],
        ];
    }
    public function messages()
    {
        return [
            'job_id.required' => 'Pilih pekerjaan yang ingin Anda lamar.',
            'job_id.exists' => 'Pekerjaan yang dipilih tidak valid.',
            'job_id.unique' => 'Anda sudah melamar pekerjaan ini sebelumnya.',

            'cv.file' => 'Unggah CV Anda.',
            'cv.mimes' => 'CV harus berformat PDF, DOC, atau DOCX.',
            'cv.max' => 'Ukuran CV tidak boleh melebihi 2 MB.',

            'applicant_letter.string' => 'Surat lamaran harus berupa teks.',
            'applicant_letter.max' => 'Surat lamaran tidak boleh melebihi 1000 karakter.',
        ];
    }

    public function mount($id)
    {
        $this->job = Job::find($id);
        $this->job_id = $this->job->id;
    }
    public function create()
    {
        $validatedData = $this->validate();

        $applicant = Auth::user();

        $validatedData['user_id'] = $applicant->id;

        if ($this->cv) {
            $validatedData['cv'] = $this->cv->store('documents/applicant/cv');
        }

        $validatedData['status'] = -1;
        $validatedData['confirm'] = 0;
        $validatedData['company_letter'] = '';

        Application::create($validatedData);

        return redirect('/applicant/application')->with('success', 'Lamaran Anda berhasil dikirim!');
    }

    public function render()
    {
        return view('livewire.applicant.application.create');
    }
}
