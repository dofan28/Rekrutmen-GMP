<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HRDProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:hrds,email,' . $this->user()->id, 'unique:applicants,email', 'unique:admins,email', 'max:255',],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Nama lengkap harus diisi.',
            'full_name.string' => 'Nama lengkap harus berupa teks.',
            'full_name.max' => 'Nama lengkap tidak boleh lebih dari :max karakter.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.max' => 'Email tidak boleh lebih dari :max karakter.',
            'email.unique' => 'Email sudah digunakan.',
            'hrd_position.required' => 'Posisi HRD harus diisi.',
            'hrd_position.string' => 'Posisi HRD harus berupa teks.',
            'hrd_position.max' => 'Posisi HRD tidak boleh lebih dari :max karakter.',
            'photo.image' => 'Foto harus berupa gambar.',
            'photo.mimes' => 'Foto harus berformat jpeg, png, atau jpg.',
            'photo.max' => 'Ukuran foto tidak boleh lebih dari :max kilobita.',
        ];
    }
}
