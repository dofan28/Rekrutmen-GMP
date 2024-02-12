<?php

namespace App\Livewire\Applicant\Profile\Contact;

use App\Models\ApplicantContact;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;


#[Title('Kontak Saya | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.dashboard')]
class Edit extends Component
{
    public $applicantcontact;
    public $street;
    public $subdistrict;
    public $city;
    public $province;
    public $postal_code;
    public $phone;
    public $linkedin;
    public $instagram;
    public $facebook;


    public function rules(): array
    {
        $applicant = Auth::user();
        return [
            'street' => ['required', 'string', 'max:255'],
            'subdistrict' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'numeric'],
            'phone' => ['required', 'string', 'max:20'],
            'linkedin' => ['nullable'],
            'instagram' => ['nullable'],
            'facebook' => ['nullable']
        ];
    }

    public function messages()
    {
        return [
            'street.required' => 'Alamat jalan harus diisi.',
            'street.string' => 'Alamat jalan harus berupa teks.',
            'street.max' => 'Alamat jalan tidak boleh melebihi 255 karakter.',

            'subdistrict.required' => 'Desa/Kecamatan harus diisi.',
            'subdistrict.string' => 'Kecamatan harus berupa teks.',
            'subdistrict.max' => 'Kecamatan tidak boleh melebihi 255 karakter.',

            'city.required' => 'Kota/Kabupaten harus diisi.',
            'city.string' => 'Kota/Kabupaten harus berupa teks.',
            'city.max' => 'Kota/Kabupaten tidak boleh melebihi 255 karakter.',

            'province.required' => 'Provinsi harus diisi.',
            'province.string' => 'Provinsi harus berupa teks.',
            'province.max' => 'Provinsi tidak boleh melebihi 255 karakter.',

            'postal_code.required' => 'Kode pos harus diisi.',
            'postal_code.numeric' => 'Kode pos harus berupa angka.',

            'phone.required' => 'Nomor telepon harus diisi.',
            'phone.string' => 'Nomor telepon harus berupa teks.',
            'phone.max' => 'Nomor telepon tidak boleh melebihi 20 karakter.',
        ];
    }
    public function mount(ApplicantContact $applicantcontact)
    {
        $this-> $applicantcontact = $applicantcontact;

        $this->fill($applicantcontact->only('street', 'subdistrict', 'city', 'province', 'postal_code', 'email', 'phone', 'linkedin', 'facebook', 'instagram'),);
    }


    public function update(){
        $validatedData = $this->validate();

        $applicant = Auth::user();

        $validatedData['user_id'] = $applicant->id;

        $applicantcontact = $this->applicantcontact;

        $applicantcontact->update($validatedData);

        session()->flash('success', 'Data berhasil diubah.');

        $this->redirect('/applicant/profile/contact');

    }
    public function render()
    {
        return view('livewire.applicant.profile.contact.edit');
    }
}
