<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDokumenIntituteRequest extends FormRequest
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
            // 'id_dokumen' => 'required|exists:institute_list_dokumens,id',
            'file_path' => 'required|file|mimes:pdf|max:2048',
            'license' => 'required|string|in:Public Domain,Private Domain,Permissive Domain',
        ];
    }

    public function messages()
    {
        return [
            // 'id_dokumen.required' => 'ID dokumen diperlukan',
            // 'id_dokumen.exists' => 'ID dokumen tidak valid',
            'file_path.required' => 'Lampiran diperlukan',
            'file_path.file' => 'Lampiran harus berupa file',
            'file_path.mimes' => 'Lampiran harus berupa file PDF',
            'file_path.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'license.required' => 'Lisensi diperlukan',
            'license.string' => 'Lisensi harus berupa teks',
            'license.in' => 'Lisensi tidak valid',
        ];
    }
}
