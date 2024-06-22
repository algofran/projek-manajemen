<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMitraRequest extends FormRequest
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
            'id_inst' => 'required|exists:institute_lists,id',
            'mitra' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'id_inst.required' => 'Id Institute wajib diisi.',
            'id_inst.exists' => 'Id Institute tidak valid.',
            'mitra.required' => 'Mitra wajib diisi.',
            'keterangan.max' => 'Keterangan tidak boleh lebih dari 50 karakter.',
        ];
    }
}
