<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPerusahaanRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'institute' => 'required|integer',
            'alamat' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'institute.required' => 'Mitra wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 50 karakter.',
        ];
    }
}
