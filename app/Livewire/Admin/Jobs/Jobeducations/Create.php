<?php

namespace App\Livewire\Admin\Jobs\Jobeducations;

use App\Http\Requests\AdminJobEducationRequest;
use App\Models\JobEducation;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title("Buat Data Pendidikan")]
#[Layout('layouts.dashboard')]
class Create extends Component
{

    public $name;

    public function rules()
    {
        return [
            'name' => ['required', 'unique:job_educations']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Jenjang pendidikan harus diisi.',
            'name.unique' => 'Jenjang pendidikan sudah ada.',
        ];
    }

    public function create(){
        $validatedData = $this->validate();

        JobEducation::create($validatedData);

        return redirect('/admin/jobeducations')->with('success', 'Data pendidikan berhasil ditambahkan!');
    }
    public function render()
    {
        return view('livewire.admin.jobs.jobeducations.create');
    }
}
