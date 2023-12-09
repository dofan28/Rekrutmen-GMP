<?php

namespace App\Livewire\Admin\Hrd;

use App\Models\Hrd;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Data HRD')]
#[Layout('layouts.dashboard')]
class Index extends Component
{
    public $search;

    public $hrd_position;
    public $hrd_position_text;
    public $inputLainnya;

    public function rules(): array
    {
        return [
            'hrd_position' => ['required', 'string', 'max:255'],
            'hrd_position_text' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'hrd_position.required' => 'Posisi HRD harus diisi.',
            'hrd_position.string' => 'Posisi HRD harus berupa teks.',
            'hrd_position.max' => 'Posisi HRD tidak boleh lebih dari :max karakter.',
            'hrd_position_text.required' => 'Posisi HRD harus diisi.',
            'hrd_position_text.string' => 'Posisi HRD harus berupa teks.',
            'hrd_position_text.max' => 'Posisi HRD tidak boleh lebih dari :max karakter.',
        ];
    }
    public function updateHRDPosition($hrdId)
    {
        // Validasi data dari permintaan menggunakan Form Request
        $validatedData = $this->validate();

        if ($validatedData['hrd_position'] === 'lainnya') {
            $validatedData['hrd_position'] = $validatedData['hrd_position_text'];
        }

        // Jika hrd_position adalah "Staff Recruitment", atur flag is_recruitment_staff menjadi 1
        if ($validatedData['hrd_position'] == 'Staff Recruitment') {
            $validatedData['is_recruitment_staff'] = 1;
        }else{
            $validatedData['is_recruitment_staff'] = 0;

        }

        $hrd = User::find($hrdId);

        $hrd->update($validatedData);


        session()->flash('success', 'Posisi HRD berhasil diperbarui.');
    }

    public function render()
    {
        $hrds = User::query()
        ->where('full_name', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%')->orWhere('hrd_position', 'like', '%' . $this->search . '%')
        ->get();
        return view('livewire.admin.hrd.index', [
            'hrds' => $hrds
        ]);
    }
}