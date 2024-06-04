<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProjectTaskRequest extends FormRequest
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
            'project_id' => 'required|integer|exists:projects,id',
            'task' => 'required|string|max:200',
            'description' => 'required|string',
            'status' => 'required|integer|in:0,1,2', // Assuming status can be 0, 1, or 2
            'date_created' => 'nullable|date',
            'due_date' => 'nullable|date|after_or_equal:date_created',
            'user_id' => 'required|exists:users,id',
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
            'project_id.required' => 'ID proyek wajib diisi',
            'project_id.integer' => 'ID proyek harus berupa angka',
            'project_id.exists' => 'ID proyek yang dipilih tidak valid',
            'task.required' => 'Tugas wajib diisi',
            'task.string' => 'Tugas harus berupa teks',
            'task.max' => 'Tugas tidak boleh lebih dari 200 karakter',
            'description.required' => 'Deskripsi wajib diisi',
            'description.string' => 'Deskripsi harus berupa teks',
            'status.required' => 'Status wajib diisi',
            'status.integer' => 'Status harus berupa angka',
            'status.in' => 'Status harus bernilai 0, 1, atau 2',
            'date_created.date' => 'Tanggal dibuat harus berupa tanggal yang valid',
            'due_date.date' => 'Tanggal jatuh tempo harus berupa tanggal yang valid',
            'due_date.after_or_equal' => 'Tanggal jatuh tempo harus setelah atau sama dengan tanggal dibuat',
            'user_id.required' => 'ID pengguna wajib diisi',
            'user_id.exists' => 'ID pengguna yang dipilih tidak valid',
        ];
    }
}
