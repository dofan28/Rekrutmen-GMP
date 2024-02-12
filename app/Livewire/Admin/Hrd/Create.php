<?php

namespace App\Livewire\Admin\Hrd;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;

#[Title("Buat Data Akun HRD | Admin - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class Create extends Component
{
    use WithFileUploads;

    public $username;
    public $email;
    public $password;
    public $passwordConfirmation;
    public $full_name;
    public $hrd_position;
    public $hrd_position_text;
    public $photo;


    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'min:4', 'unique:users', 'regex:/^\S*$/'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'same:passwordConfirmation'],
            'hrd_position' => ['required', 'string', 'max:255'],
            'hrd_position_text' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'username.required' => 'Nama pengguna harus diisi.',
            'username.string' => 'Nama pengguna harus berupa teks.',
            'username.min' => 'Nama pengguna minimal 4 karakter',
            'username.unique' => 'Nama pengguna sudah digunakan.',
            'username.regex' => 'Nama pengguna tidak boleh mengandung spasi.',

            'full_name.required' => 'Nama lengkap harus diisi.',
            'full_name.string' => 'Nama lengkap harus berupa teks.',
            'full_name.max' => 'Nama lengkap tidak boleh lebih dari :max karakter.',

            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.max' => 'Alamat email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Alamat email ini sudah digunakan.',

            'password.required' => 'Kata sandi harus diisi.',
            'password.string' => 'Kata sandi harus berupa teks.',
            'password.same' => 'Konfirmasi kata sandi tidak cocok.',
            'password.min' => 'Kata sandi minimal harus :min karakter.',

            'hrd_position.required' => 'Posisi HRD harus diisi.',
            'hrd_position.string' => 'Posisi HRD harus berupa teks.',
            'hrd_position.max' => 'Posisi HRD tidak boleh lebih dari :max karakter.',

            'hrd_position_text.required' => 'Posisi HRD harus diisi.',
            'hrd_position_text.string' => 'Posisi HRD harus berupa teks.',
            'hrd_position_text.max' => 'Posisi HRD tidak boleh lebih dari :max karakter.',

            'photo.image' => 'Foto harus berupa gambar.',
            'photo.mimes' => 'Foto harus berformat jpeg, png, atau jpg.',
            'photo.max' => 'Ukuran foto tidak boleh lebih dari :max kilobita.',
        ];
    }



    public function save()
    {
        DB::transaction(function () {
            $validatedData = $this->validate();

            $validatedData['password'] = bcrypt($validatedData['password']);
            $validatedData['role'] = 'hrd';

            $hrd = [
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'role' => $validatedData['role']
            ];

            $hrdData = [
                'full_name' => $validatedData['full_name'],
                'hrd_position' => $validatedData['hrd_position'],
            ];

            if ($validatedData['hrd_position'] == 'Staff Recruitment') {
                $hrdData['is_recruitment_staff'] = 1;
            }

            if ($this->photo) {
                $hrdData['photo'] = $this->photo->storePublicly('images/applicant/profile');
            }

            DB::transaction(function () use ($hrd, $hrdData) {
                $user = User::create($hrd);
                $user->hrddata()->create($hrdData);

                session()->flash('success', 'Data akun HRD berhasil dibuat.');

                $this->redirect('/admin/hrds');
                // return redirect('/admin/hrds')->with('success', 'Data HRD berhasil ditambahkan!');
            });
        });
    }


    public function render()
    {
        return view('livewire.admin.hrd.create');
    }
}
