<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantProfileOrganizationalExperienceRequest extends FormRequest
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
            'organizational_name' => ['required', 'string'], 
            'position' => ['required', 'string'], 
            'organizational_description' => ['required', 'string'], // Gunakan tipe data 'string' untuk deskripsi
        ];
    }
    
    public function messages()
    {
        return [
            'organizational_name.required' => 'Nama organisasi harus diisi.',
            'organizational_name.string' => 'Nama organisasi harus berupa teks.',
    
            'position.required' => 'Posisi harus diisi.',
            'position.string' => 'Posisi harus berupa teks.',
    
            'organizational_description.required' => 'Deskripsi organisasi harus diisi.',
            'organizational_description.string' => 'Deskripsi organisasi harus berupa teks.',
        ];
    }
}
