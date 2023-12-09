<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantProfileWorkExperienceRequest extends FormRequest
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
            'company' => ['required', 'string'], 
            'position' => ['required', 'string'],
            'last_salary' => ['required', 'numeric', 'between:0.01,99999999.99'], // Aturan validasi untuk 'last_salary'
            'job_description' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ];
    }
    
    public function messages()
{
    return [
        'company.required' => 'Nama perusahaan harus diisi.',
        'company.string' => 'Nama perusahaan harus berupa teks.',

        'position.required' => 'Posisi harus diisi.',
        'position.string' => 'Posisi harus berupa teks.',

        'last_salary.required' => 'Gaji terakhir harus diisi.',
        'last_salary.numeric' => 'Gaji terakhir harus berupa angka.',
        'last_salary.between' => 'Kolom gaji terakhir harus antara :min dan :max.',

        'job_description.required' => 'Deskripsi pekerjaan harus diisi.',
        'job_description.string' => 'Deskripsi pekerjaan harus berupa teks.',

        'start_date.required' => 'Tanggal mulai harus diisi.',
        'start_date.date' => 'Tanggal mulai harus berformat tanggal yang valid.',

        'end_date.date' => 'Tanggal selesai harus berformat tanggal yang valid.',
        'end_date.after_or_equal' => 'Tanggal selesai harus lebih besar atau sama dengan tanggal mulai.',
    ];
}
}
