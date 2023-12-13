<?php

namespace App\Livewire\Admin\Jobs\Jobcompanies;

use Livewire\Component;
use App\Models\JobCompany;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Ubah Data Perusahaan")]
#[Layout('layouts.dashboard')]
class Edit extends Component
{
    public $jobcompany;
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

    public function mount(JobCompany $jobcompany){
        $this->jobcompany = $jobcompany;

        $this->fill(
            $jobcompany->only('name', 'address'),
        );

    }

    public function update(){
        $validatedData = $this->validate();

        JobCompany::where('id', $this->jobcompany->id)->update($validatedData);

        return redirect('/admin/jobcompanies')->with('success', 'Data perusahaan berhasil diubah.');
    }


    public function render()
    {
        return view('livewire.admin.jobs.jobcompanies.edit');
    }
}
