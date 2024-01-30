<?php

namespace App\Livewire\Admin\Jobs\Jobcompanies;

use App\Models\JobCompany;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Buat Data Perusahaan Lowongan | Admin - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class Create extends Component
{
    public $name;
    public $address;
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama perusahaan harus diisi.',
            'name.string' => 'Nama perusahaan harus berupa teks.',
            'name.max' => 'Nama perusahaan tidak boleh lebih dari 255 karakter.',
            'address.required' => 'Alamat perusahaan harus diisi.',
            'address.string' => 'Alamat perusahaan harus berupa teks.',
            'address.max' => 'Alamat perusahaan tidak boleh lebih dari 255 karakter.',
        ];
    }
    public function save(){
        $validatedData = $this->validate();

        JobCompany::create($validatedData);
        return redirect('/admin/jobcompanies')->with('success', 'Data perusahaan berhasil dibuat.');
    }

    public function render()
    {
        return view('livewire.admin.jobs.jobcompanies.create');
    }
}
