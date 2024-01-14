<?php

namespace App\Livewire\Applicant\Profile\EducationalBackground;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\ApplicantEducationalBackground;

#[Title('Riwayat Pendidikan Saya | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $institution;
    public $major;
    public $title;
    public $start_date;
    public $end_date;
    public function rules(): array
    {
        return [
            'institution' => ['required', 'string'],
            'major' => ['required', 'string'],
            'title' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'], // Jika ada, pastikan lebih besar atau sama dengan start_date
        ];
    }

    public function messages()
    {
        return [
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

    public function mount()
    {
        $educationalbackgrounds = Auth::guard('applicant')->user()->educationalbackground;

        if ($educationalbackgrounds) {
            foreach ($educationalbackgrounds as $key => $value) {
                $this->institution[$key] = $value->institution;
                $this->major[$key] = $value->major;
                $this->title[$key] = $value->title;
                $this->start_date[$key] = $value->start_date;
                $this->end_date[$key] = $value->end_date;
            }
        }
    }

    public function store()
    {
        $validatedData = $this->validate();

        // Dapatkan pengguna yang saat ini diotentikasi pada guard 'applicant'
        $applicant = Auth::guard('applicant')->user();

        // Tambahkan 'applicant_id' ke data yang telah divalidasi
        $validatedData['applicant_id'] = $applicant->id;

        ApplicantEducationalBackground::create($validatedData);

        session()->flash('success', 'Data berhasil disimpan.');
    }

    public function update($id, $index)
    {

        $validatedData = $this->validate([
            "institution.{$index}" => ['required', 'string'],
            "major.{$index}" => ['required', 'string'],
            "title.{$index}" => ['required', 'string'],
            "start_date.{$index}" => ['required', 'date'],
            "end_date.{$index}" => ['nullable', 'date', 'after_or_equal:start_date'],
        ], [
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
        ]);

        $validatedData['institution'] = $validatedData["institution"][$index];
        $validatedData['major'] = $validatedData["major"][$index];
        $validatedData['title'] = $validatedData["title"][$index];
        $validatedData['start_date'] = $validatedData["start_date"][$index];
        $validatedData['end_date'] = $validatedData["end_date"][$index];

        // Dapatkan pengguna yang saat ini diotentikasi pada guard 'applicant'
        $applicant = Auth::guard('applicant')->user();

        // Perbarui data ApplicantEducationalBackground yang sesuai dengan 'applicant_id' yang cocok dengan $id dan 'id' sama dengan $id
        ApplicantEducationalBackground::where('applicant_id', $applicant->id)->where('id', $id)->update($validatedData);

        // Kembalikan pengguna ke halaman sebelumnya dengan pesan sukses
        session()->flash('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $educationalBackground = ApplicantEducationalBackground::find($id);
        $educationalBackground->delete();

        session()->flash('success', 'Data berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.applicant.profile.educational-background.index', [
            'educationalbackgrounds' => Auth::guard('applicant')->user()->educationalbackground
        ]);
    }
}
