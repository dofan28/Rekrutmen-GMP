<?php

namespace App\Livewire\Applicant\Profile\ApplicantData;

use Livewire\Component;
use App\Models\ApplicantData;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;


#[Title("Data Pribadi")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    use WithFileUploads;

    public $photo;
    public $ktp_number;
    public $full_name;
    public $place_of_birth;
    public $date_of_birth;
    public $gender;
    public $marital_status;

    public function rules(): array
    {
        $applicant = Auth::user();
        return [
            'ktp_number' => ['required', Rule::unique('applicant_data', 'ktp_number')->ignore($applicant->id), 'digits:16',],
            'full_name' => ['required', 'string', 'max:255'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'gender' => ['required', 'in:Pria,Perempuan'],
            'marital_status' => ['required', 'in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }


    public function messages(): array
    {
        return [
            'ktp_number.required' => 'Nomor KTP harus diisi.',
            'ktp_number.unique' => 'Nomor KTP telah digunakan oleh pengguna lain.',
            'ktp_number.digits' => 'Nomor KTP harus terdiri dari 16 digit angka.',

            'full_name.required' => 'Nama lengkap harus diisi.',
            'full_name.string' => 'Nama lengkap harus berupa teks.',
            'full_name.max' => 'Nama lengkap tidak boleh melebihi 255 karakter.',

            'place_of_birth.required' => 'Tempat lahir harus diisi.',
            'place_of_birth.string' => 'Tempat lahir harus berupa teks.',
            'place_of_birth.max' => 'Tempat lahir tidak boleh melebihi 255 karakter.',

            'date_of_birth.required' => 'Tanggal lahir harus diisi.',
            'date_of_birth.date' => 'Tanggal lahir harus berformat tanggal yang valid.',
            'date_of_birth.before' => 'Tanggal lahir harus sebelum hari ini.',

            'gender.required' => 'Jenis kelamin harus diisi.',
            'gender.in' => 'Jenis kelamin harus Pria atau Perempuan.',

            'marital_status.required' => 'Status pernikahan harus diisi.',
            'marital_status.in' => 'Status pernikahan harus Belum Kawin, Kawin, Cerai Hidup, atau Cerai Mati.',

            'photo.image' => 'Foto harus berupa gambar.',
            'photo.mimes' => 'Foto harus berformat jpeg, png, atau jpg.',
            'photo.max' => 'Ukuran foto tidak boleh melebihi 2 MB.',
        ];
    }
    public function mount()
    {
        $applicant = Auth::user();
        if ($applicant->applicantdata) {
            $this->ktp_number = $applicant->applicantdata->ktp_number;
            $this->full_name = $applicant->applicantdata->full_name;
            $this->place_of_birth = $applicant->applicantdata->place_of_birth;
            $this->date_of_birth = $applicant->applicantdata->date_of_birth;
            $this->gender = $applicant->applicantdata->gender;
            $this->marital_status = $applicant->applicantdata->marital_status;
        }
    }

    public function save()
    {
        $validatedData = $this->validate();

        $applicant = Auth::user();

        $validatedData['applicant_id'] = $applicant->id;


        if ($this->photo) {
            $validatedData['photo'] = $this->photo->store('images/applicant/profile');
        }

        if ($applicant->applicantdata) {
            $applicant->applicantdata->update($validatedData);
        } else {
            ApplicantData::create($validatedData);
        }

        session()->flash('success', 'Data berhasil disimpan!');
    }
    public function render()
    {
        return view('livewire.applicant.profile.applicant-data.index');
    }
}
