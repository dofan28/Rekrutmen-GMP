<?php

namespace App\Livewire\Hrd\Profile\SecuritySettings\ChangeEmail;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title('Ubah Alamat Email | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.dashboard')]
class Edit extends Component
{
    public $email;

    public function rules()
    {
        return [
            'email' => ['required', 'email', 'unique:users'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
        ];
    }


    public function update()
    {
        $validatedData = $this->validate();

        $hrd = Auth::user();
        $hrd->email = $validatedData['email'];
        $hrd->save();

        return back()->with('success', 'Email berhasil diubah.');
    }
    public function render()
    {
        return view('livewire.hrd.profile.security-settings.change-email.edit');
    }
}
