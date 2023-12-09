<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'current_password'  => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required']
        ];
    }

    public function messages()
{
    return [
        'current_password.required' => 'Password saat ini wajib diisi.',
        'password.required' => 'Password baru wajib diisi.',
        'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        'password.min' => 'Password baru harus memiliki minimal :min karakter.',
        'password_confirmation.required' => 'Konfirmasi password baru wajib diisi.',
    ];
}

}
