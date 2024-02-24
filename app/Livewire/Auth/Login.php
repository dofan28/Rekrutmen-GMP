<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Spatie\Activitylog\Facades\CauserResolver;


#[Layout('layouts.main')]
#[Title('Masuk | Rekrutmen PT. Graha Mutu Persada')]
class Login extends Component
{
    public $email;

    public $password;

    public $remember = false;

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Format alamat email tidak valid.',

            'password.required' => 'Kata sandi harus diisi.',
        ];
    }

    public function authenticate()
    {
        $validatedData = $this->validate();


        if (Auth::attempt($validatedData)) {
            $user = Auth::user();
            CauserResolver::setCauser($user);
            if ($user->role == 'applicant') {
                Session::regenerate();

                activity('Log Masuk')->event('Masuk')->log('Pelamar berhasil masuk.');

                return Redirect::intended('/applicant/application');
            } elseif ($user->role == 'hrd') {
                Session::regenerate();

                activity('Log Masuk')->event('Masuk')->log('HRD berhasil masuk.');

                return Redirect::intended('/hrd/applications');
            } elseif ($user->role == 'admin') {
                Session::regenerate();

                activity('Log Masuk')->event('Masuk')->log('Admin berhasil masuk.');
                
                return Redirect::intended('/admin/dashboard');
            }
        }
        // elseif (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            activity('Log Masuk Gagal')->event('Masuk Gagal')->log('Upaya masuk gagal.');

            // $this->addError('email', trans('auth.failed'));

            return back()->with('error', 'Email atau kata sandi salah.');
        // }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
