<?php

namespace App\Livewire\Applicant\Profile\Contact;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Landing\Contact;
use App\Models\ApplicantContact;

#[Title('Kontak Saya | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $street;
    public $subdistrict;
    public $city;
    public $province;
    public $postal_code;
    public $email;
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
            'email' => ['required', 'email', 'max:255',  Rule::unique('applicant_contacts', 'email')->ignore($applicant->id)],
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

        'email.required' => 'Alamat email harus diisi.',
        'email.email' => 'Alamat email harus berupa alamat email yang valid.',
        'email.max' => 'Alamat email tidak boleh melebihi 255 karakter.',
        'email.unique' => 'Alamat email telah digunakan oleh pengguna lain.',

        'phone.required' => 'Nomor telepon harus diisi.',
        'phone.string' => 'Nomor telepon harus berupa teks.',
        'phone.max' => 'Nomor telepon tidak boleh melebihi 20 karakter.',
    ];
}

public function mount()
{
    $applicant = Auth::user();
    if ($applicant->contact) {
        $this->fill(
            $applicant->contact->only('street', 'subdistrict', 'city', 'province', 'postal_code', 'email', 'phone', 'linkedin', 'facebook', 'instagram'),
        );
    }


}

public function save(){
    $validatedData = $this->validate();

    $applicant = Auth::user();

    $validatedData['user_id'] = $applicant->id;

    if ($applicant->contact) {
        $applicant->contact->update($validatedData);
    } else {
        ApplicantContact::create($validatedData);
    }

    session()->flash('success', 'Data berhasil disimpan!');
}

    public function render()
    {
        return view('livewire.applicant.profile.contact.index');
    }
}
