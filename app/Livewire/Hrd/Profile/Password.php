<?php

namespace App\Livewire\Hrd\Profile;

use App\Models\Hrd;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordRequest;

#[Title("Ganti Password")]
#[Layout('layouts.dashboard')]
class Password extends Component
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
    public function update(){
        $this->validate();

        $hrd = Hrd::find(Auth::guard('hrd')->user()->id);

        if (Hash::check($this->current_password, $hrd->password)) {
            $hrd->password = Hash::make($this->password);
            $hrd->save();
            return back()->with('success', 'Password berhasil diubah.');
        } else {
            return back()->with('error', 'Password saat ini salah.');
        }
    }

    public function render()
    {
        return view('livewire.hrd.profile.password');
    }

}
