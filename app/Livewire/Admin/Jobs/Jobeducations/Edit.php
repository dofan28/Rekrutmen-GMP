<?php

namespace App\Livewire\Admin\Jobs\Jobeducations;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Models\JobEducation;

#[Title("Edit Data Pendidikan Lowongan | Admin - PT. Graha Mutu Persada")]
#[Layout('layouts.dashboard')]
class Edit extends Component
{
    public $jobeducation;
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
            'email.unique' => 'Jenjang pendidikan sudah ada.',
        ];
    }

    public function mount(JobEducation $jobeducation){
        $this->jobeducation = $jobeducation;

        $this->fill(
            $jobeducation->only('name'),
        );
    }

    public function update(){
        $validatedData = $this->validate();

        JobEducation::where('id', $this->jobeducation->id)->update($validatedData);
        return redirect('/admin/jobeducations')->with('success', 'Data pendidikan berhasil diubah.');
    }
    public function render()
    {
        return view('livewire.admin.jobs.jobeducations.edit');
    }
}
