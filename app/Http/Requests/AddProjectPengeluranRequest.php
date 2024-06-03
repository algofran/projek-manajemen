<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProjectPengeluranRequest extends FormRequest
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
            'project_id' => 'required|integer',
            'subject' => 'required|string|max:200',
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'cost' => 'required|numeric',
            'comment' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'project_id.required' => 'Project ID wajib diisi.',
            'subject.required' => 'Subjek wajib diisi.',
            'user_id.required' => 'Pengguna wajib dipilih.',
            'date.required' => 'Tanggal wajib diisi.',
            'cost.required' => 'Biaya wajib diisi.',
            'comment.required' => 'Komentar wajib diisi.',
        ];
    }
}
