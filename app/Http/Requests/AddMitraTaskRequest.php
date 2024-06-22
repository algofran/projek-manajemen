<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMitraTaskRequest extends FormRequest
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
            'project_id' => 'required',
            'task' => 'required|string|max:200',
            'user_id' => 'required',
            'date_created' => 'required|date',
            'due_date' => 'required|date|after_or_equal:date_created',
            'status' => 'required|in:0,1,2',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'project_id.required' => 'ID Proyek wajib diisi.',
            'task.required' => 'Nama tugas wajib diisi.',
            'task.max' => 'Nama tugas tidak boleh lebih dari 200 karakter.',
            'user_id.required' => 'Penanggung jawab wajib diisi.',
            'date_created.required' => 'Tanggal mulai pelaksanaan wajib diisi.',
            'date_created.date' => 'Tanggal mulai pelaksanaan harus berupa format tanggal yang valid.',
            'due_date.required' => 'Tanggal jatuh tempo pelaksanaan wajib diisi.',
            'due_date.date' => 'Tanggal jatuh tempo pelaksanaan harus berupa format tanggal yang valid.',
            'due_date.after_or_equal' => 'Tanggal jatuh tempo pelaksanaan harus setelah atau sama dengan tanggal mulai pelaksanaan.',
            'status.required' => 'Status proyek wajib diisi.',
            'status.in' => 'Status proyek tidak valid.',
            'description.required' => 'Keterangan wajib diisi.',
        ];
    }
}
