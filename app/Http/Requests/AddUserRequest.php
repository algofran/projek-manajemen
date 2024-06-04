<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:255',
            // 'type' => 'required|in:0,1,2',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'firstname.required' => 'Nama depan diperlukan',
            'lastname.required' => 'Nama belakang diperlukan',
            'username.required' => 'Nama pengguna diperlukan',
            'username.unique' => 'Nama pengguna sudah digunakan',
            'email.required' => 'Alamat email diperlukan',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Alamat email sudah digunakan',
            'password.required' => 'Kata sandi diperlukan',
            'password.min' => 'Kata sandi minimal harus 8:min karakter',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok',
            'phone.required' => 'Nomor telepon diperlukan',
            // 'type.required' => 'Tipe pengguna diperlukan',
            // 'type.in' => 'Tipe pengguna tidak valid',
        ];
    }
}
