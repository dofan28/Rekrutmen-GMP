<?php

namespace App\Livewire\Applicant\Profile\SecuritySettings\ChangePassword;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


#[Title('Ganti Kata Sandi | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.dashboard')]
class Edit extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function rules(): array
    {
        return [
            'current_password'  => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Password saat ini wajib diisi.',
            'password.required' => 'Password baru wajib diisi.',
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
            'password.min' => 'Password baru harus memiliki minimal :min karakter.',
            'password_confirmation.required' => 'Konfirmasi password baru wajib diisi.',
        ];
    }

    public function update()
    {
        $this->validate();

        $applicant = User::find(Auth::user()->id);

        if (Hash::check($this->current_password, $applicant->password)) {
            $applicant->password = Hash::make($this->password);
            $applicant->save();
            return back()->with('success', 'Password berhasil diubah.');
        } else {
            return back()->with('error', 'Password saat ini salah.');
        }
    }

    public function render()
    {
        return view('livewire.applicant.profile.security-settings.change-password.edit');
    }
}
