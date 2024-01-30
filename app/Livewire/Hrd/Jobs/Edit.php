<?php

namespace App\Livewire\Hrd\Jobs;

use App\Models\Job;
use Livewire\Component;
use App\Models\JobCompany;
use App\Models\JobEducation;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Http\Requests\HRDJobRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


#[Title("Ubah Lowongan Kerja | HRD - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class Edit extends Component
{
    use WithFileUploads;

    public $job;
    public $hrd;
    public $jobcompany_id;
    public $jobeducation_id;
    public $position;
    public $jobdesk;
    public $description;
    public $image;


    public function rules()
    {
        return [
            'jobcompany_id' => ['required', 'exists:job_companies,id'],
            'jobeducation_id' => ['required', 'exists:job_educations,id'],
            'position' => ['required', 'string', 'max:255'],
            'jobdesk' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
                'sometimes',
            ],
        ];
    }

    public function messages()
    {
        return [
            'jobcompany_id.required' => 'Perusahaan harus diisi.',
            'jobcompany_id.exists' => 'Perusahaan yang dipilih tidak valid.',

            'jobeducation_id.required' => 'Pendidikan harus diisi.',
            'jobeducation_id.exists' => 'Pendidikan yang dipilih tidak valid.',

            'position.required' => 'Posisi harus diisi.',
            'position.string' => 'Posisi harus berupa teks.',
            'position.max' => 'Posisi tidak boleh lebih dari :max karakter.',

            'jobdesk.required' => 'Jobdesk pekerjaan harus diisi.',
            'jobdesk.string' => 'Jobdesk pekerjaan harus berupa teks.',

            'description.required' => 'Deskripsi pekerjaan harus diisi.',
            'description.string' => 'Deskripsi pekerjaan harus berupa teks.',

            'image.image' => 'Gambar harus berupa gambar.',
            'image.mimes' => 'Gambar harus berformat jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari :max kilobita.',
        ];
    }

    public function mount(Job $job)
    {
        $hrd = Auth::user();
        if ($hrd->hrddata->is_recruitment_staff === 0) {
            $this->authorize('edit', $job);
        }

        $this->job = $job;
        $this->fill(
            $job->only('position', 'jobcompany_id', 'jobeducation_id', 'jobdesk', 'description'),
        );
    }

    public function update()
    {
        $validatedData = $this->validate();

        $job = $this->job;

        if ($this->image) {
            if ($job->image) {
                Storage::delete($job->image);
            }
            $validatedData['image'] = $this->image->store("images/hrd/jobs");
        }

        $job->update($validatedData);
        return redirect('/hrd/jobs')->with('success', 'Lowongan telah diubah!');
    }

    public function render()
    {
        $jobcompanies = JobCompany::all();
        $jobeducations = JobEducation::all();
        return view('livewire.hrd.jobs.edit', [
            'jobcompanies' => $jobcompanies,
            'jobeducations' => $jobeducations
        ]);
    }
}
