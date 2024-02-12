<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

#[Title('Buat Akun | Rekrutmen PT. Graha Mutu Persada')]
#[Layout('layouts.main')]
class Register extends Component
{

        /** @var string */
        public $username;

    /** @var string */
    public $email;

    /** @var string */
    public $password;

    /** @var string */
    public $passwordConfirmation;

    public function rules()
    {
        return [
            'username' => ['required', 'string', 'min:4', 'unique:users', 'regex:/^\S*$/'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Nama pengguna harus diisi.',
            'username.string' => 'Nama pengguna harus berupa teks.',
            'username.min' => 'Nama pengguna minimal 4 karakter',
            'username.unique' => 'Nama pengguna sudah digunakan.',
            'username.regex' => 'Nama pengguna tidak boleh mengandung spasi.',

            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah digunakan.',

            'password.required' => 'Kata sandi harus diisi.',
            'password.same' => 'Konfirmasi kata sandi tidak cocok.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
        ];
    }

    public function register()
    {
        $validatedData = $this->validate();

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        event(new Registered($user));

        Auth::login($user, true);

        activity('Log Daftar')->performedOn($user)->event('Daftar')->log(':causer.email berhasil mendaftar.');

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
