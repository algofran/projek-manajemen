<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDokumenRequest extends FormRequest
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
            'id_dokumen' => 'required|exists:list_dokumen_projeks,id',
            'file_path' => 'required|file|mimes:pdf|max:2048',
            'license' => 'required|string|in:Public Domain,Private Domain,Permissive Domain',
        ];
    }

    public function messages()
    {
        return [
            'id_dokumen.required' => 'Dokumen ID diperlukan',
            'id_dokumen.exists' => 'Dokumen ID tidak valid',
            'file_path.required' => 'File attachment diperlukan',
            'file_path.file' => 'File harus berupa file',
            'file_path.mimes' => 'File harus berupa PDF',
            'file_path.max' => 'File tidak boleh lebih dari 2MB',
            'license.required' => 'License diperlukan',
            'license.string' => 'License harus berupa string',
            'license.in' => 'License tidak valid',
        ];
    }
}
