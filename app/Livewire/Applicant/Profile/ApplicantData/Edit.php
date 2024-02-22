<?php

namespace App\Livewire\Applicant\Profile\ApplicantData;

use Livewire\Component;
use App\Models\ApplicantData;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

#[Title('Ubah Data Pribadi Saya | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.dashboard')]
class Edit extends Component
{
    use WithFileUploads;

    public $applicantdata;
    public $ktp_number;
    public $full_name;
    public $place_of_birth;
    public $date_of_birth;
    public $gender;
    public $marital_status;
    public $photo;

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

            'marital_status.required' => 'Status perkawinan harus diisi.',
            'marital_status.in' => 'Status perkawinan harus Belum Kawin, Kawin, Cerai Hidup, atau Cerai Mati.',

            'photo.image' => 'Foto harus berupa gambar.',
            'photo.mimes' => 'Foto harus berformat jpeg, png, atau jpg.',
            'photo.max' => 'Ukuran foto tidak boleh melebihi 2 MB.',
        ];
    }

    public function mount(ApplicantData $applicantdata)
    {
        $this-> $applicantdata = $applicantdata;

        $this->fill($applicantdata->only('ktp_number', 'full_name', 'place_of_birth', 'date_of_birth', 'gender', 'marital_status'),);
    }

    public function update()
    {
        $validatedData = $this->validate();

        $applicant = Auth::user();

        $validatedData['user_id'] = $applicant->id;

        $applicantdata = $this->applicantdata;

        if ($this->photo) {
            if ($applicantdata->photo) {
                Storage::delete($applicantdata->image);
            }
            $validatedData['photo'] = $this->photo->store('images/applicant/profile');
        }

        $applicantdata->update($validatedData);

        session()->flash('success', 'Data pribadi berhasil diubah.');
        $this->redirect('/applicant/profile/applicantdata');
    }

    public function render()
    {
        return view('livewire.applicant.profile.applicant-data.edit');
    }
}
