<?php

namespace App\Livewire\Admin\Hrd;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;

#[Title("Buat Data HRD")]
#[Layout('layouts.dashboard')]
class Create extends Component
{
    use WithFileUploads;

    public $full_name;
    public $email;
    public $password;
    public $hrd_position;
    public $hrd_position_text;
    public $photo;
    public $password_confirmation;


    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('hrds'),
                Rule::unique('applicants'),
                Rule::unique('admins'),
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'hrd_position' => ['required', 'string', 'max:255'],
            'hrd_position_text' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Nama lengkap harus diisi.',
            'full_name.string' => 'Nama lengkap harus berupa teks.',
            'full_name.max' => 'Nama lengkap tidak boleh lebih dari :max karakter.',
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'email.max' => 'Alamat email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Alamat email ini sudah digunakan.',
            'password.required' => 'Kata sandi harus diisi.',
            'password.string' => 'Kata sandi harus berupa teks.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
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


    public function create()
    {
        // Validasi data dari permintaan menggunakan Form Request
        $validatedData = $this->validate();

        // Enkripsi kata sandi HRD
        $validatedData['password'] = bcrypt($validatedData['password']);

        if ($validatedData['hrd_position'] === 'lainnya') {
            $validatedData['hrd_position'] = $validatedData['hrd_position_text'];
        }

        // Jika hrd_position adalah "Staff Recruitment", atur flag is_recruitment_staff menjadi 1
        if ($validatedData['hrd_position'] == 'Staff Recruitment') {
            $validatedData['is_recruitment_staff'] = 1;
        }

        // Jika ada foto yang diunggah, simpan foto ke direktori yang sesuai
        if ($this->photo) {
            $photoPath = $this->photo->store("images/hrd/profile");
            $validatedData["photo"] = $photoPath;
        }


    // Buat entitas User dengan data yang divalidasi
         $user = User::create($validatedData);

        // Buat entitas HrdData terkait dengan user yang telah dibuat
        $user->hrdata()->create($validatedData);

        // Redirect pengguna kembali ke halaman HRD dengan pesan sukses
        return redirect('/admin/hrds')->with('success', 'Data HRD berhasil ditambahkan!');
    }
    public function render()
    {
        return view('livewire.admin.hrd.create');
    }
}
