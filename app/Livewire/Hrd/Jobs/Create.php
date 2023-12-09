<?php

namespace App\Livewire\Hrd\Jobs;

use App\Models\Job;
use Livewire\Component;
use App\Models\JobCompany;
use App\Models\JobEducation;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

#[Title("Buat Lowongan")]
#[Layout('layouts.dashboard')]
class Create extends Component
{
    use WithFileUploads;

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
    
    public function create()
    {
        $validatedData = $this->validate();

        $hrd = Auth::guard('hrd')->user();
        $validatedData['hrd_id'] = $hrd->id;

        // Atur status pekerjaan ke 1 (menggambarkan bahwa pekerjaan telah dipublikasikan)
        if ($hrd->is_recruitment_staff == 1) {
            $validatedData['status'] = 1; // Di publish
            $validatedData['confirm'] = 1;
        } else {
            $validatedData['status'] = -1; // Menunggu
        }

        // Periksa apakah ada file gambar yang diunggah
        if ($this->image) {
            // Simpan file gambar yang diunggah ke direktori yang sesuai
            $validatedData["image"] = $this->image->store("images/hrd/jobs");
        }

        // Buat entitas pekerjaan (Job) dengan data yang telah divalidasi
        Job::create($validatedData);

        if ($hrd->is_recruitment_staff == 1) {
            // Alihkan pengguna ke halaman pekerjaan HRD dengan pesan sukses
            return redirect('/hrd/jobs')->with('success', 'Lowongan berhasil dipublikasi');
        } else {
            return redirect('/hrd/jobs')->with('success', 'Lowongan menunggu konfirmasi Staff Recruitment');
        }
    }
    public function render()
    {
        $jobeducations = JobEducation::all();
        $jobcompanies = JobCompany::all();
        return view('livewire.hrd.jobs.create', [
            'jobcompanies' => $jobcompanies,
            'jobeducations' => $jobeducations
        ]);
    }
}
