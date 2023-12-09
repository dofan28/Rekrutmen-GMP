<?php

namespace App\Livewire\Hrd\Profile;

use App\Models\Hrd;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

#[Title("Profile Saya")]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    use WithFileUploads;

    public $photo;
    public $full_name;
    public $email;

    public function rules(): array
    {
        $hrd = Auth::guard('hrd')->user();

        return [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('hrds', 'email')->ignore($hrd->id),
                Rule::unique('applicants', 'email'),
                Rule::unique('admins', 'email'),
            ],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Nama lengkap harus diisi.',
            'full_name.string' => 'Nama lengkap harus berupa teks.',
            'full_name.max' => 'Nama lengkap tidak boleh lebih dari :max karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.max' => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Email sudah digunakan.',
            'photo.image' => 'Foto harus berupa gambar.',
            'photo.mimes' => 'Foto harus berformat jpeg, png, atau jpg.',
            'photo.max' => 'Ukuran foto tidak boleh lebih dari :max kilobita.',
        ];
    }

    public function mount(){
        $hrd = Auth::guard('hrd')->user();
        $this->full_name = $hrd->full_name;
        $this->email = $hrd->email;
    }

    public function update(){
        $validatedData = $this->validate();

        $hrd = Auth::guard('hrd')->user();

        if($this->photo){
            $currentPhoto = $hrd->photo;
            if($currentPhoto !== NULL){
                Storage::delete($currentPhoto);
            }
            $validatedData['photo'] = $this->photo->store('images/hrd/profile');
        }

        Hrd::where('id', $hrd->id)->update($validatedData);
        return back()->with('success', 'Profil telah diperbaruhi!');
    }

    public function render()
    {
        return view('livewire.hrd.profile.index');
    }
}
