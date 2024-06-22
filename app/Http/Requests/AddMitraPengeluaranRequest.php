<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMitraPengeluaranRequest extends FormRequest
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
            'project_id' => 'required', // Tambahkan aturan validasi sesuai kebutuhan Anda
            'id_inst' => 'required', // Tambahkan aturan validasi sesuai kebutuhan Anda
            'subject' => 'required',
            'user_id' => 'required',
            'date' => 'required|date',
            'cost' => 'required|numeric',
            'comment' => 'required',
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
            'project_id.required' => 'ID Proyek wajib diisi.',
            'subject.required' => 'Subjek wajib diisi.',
            'user_id.required' => 'ID Pengguna wajib diisi.',
            'date.required' => 'Tanggal wajib diisi.',
            'date.date' => 'Tanggal harus berupa format tanggal yang valid.',
            'cost.required' => 'Biaya wajib diisi.',
            'cost.numeric' => 'Biaya harus berupa angka.',
            'comment.required' => 'Komentar wajib diisi.',
        ];
    }
}
