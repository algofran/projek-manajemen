<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddLaporanRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'deskripsi' => 'required|string|max:255',
            'tahun' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Author diperlukan',
            'user_id.exists' => 'Author tidak valid',
            'deskripsi.required' => 'Deskripsi diperlukan',
            'tahun.required' => 'Tahun diperlukan',
            'tahun.digits' => 'Tahun harus terdiri dari 4 digit',
            'tahun.integer' => 'Tahun harus berupa angka',
            'tahun.min' => 'Tahun tidak boleh kurang dari 1900',
            'tahun.max' => 'Tahun tidak boleh lebih dari tahun sekarang',
        ];
    }
}
