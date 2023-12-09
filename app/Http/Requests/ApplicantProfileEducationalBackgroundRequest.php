<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantProfileEducationalBackgroundRequest extends FormRequest
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
            'institution' => ['required', 'string'],
            'major' => ['required', 'string'],
            'title' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'], // Jika ada, pastikan lebih besar atau sama dengan start_date
        ];
    }
    public function messages()
{
    return [
        'institution.required' => 'Nama institusi wajib diisi.',
        'institution.string' => 'Nama institusi harus berupa teks.',

        'major.required' => 'Jurusan wajib diisi.',
        'major.string' => 'Jurusan harus berupa teks.',

        'title.required' => 'Gelar wajib diisi.',
        'title.string' => 'Gelar harus berupa teks.',

        'start_date.required' => 'Tanggal mulai wajib diisi.',
        'start_date.date' => 'Tanggal mulai harus berformat tanggal yang valid.',

        'end_date.date' => 'Tanggal selesai harus berformat tanggal yang valid.',
        'end_date.after_or_equal' => 'Tanggal selesai harus lebih besar atau sama dengan tanggal mulai.',
    ];
}
}
