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
            'project_id.required' => 'Project ID is required.',
            'task.required' => 'Task name is required.',
            'task.max' => 'Task name may not be greater than 200 characters.',
            'user_id.required' => 'Penanggung jawab is required.',
            'date_created.required' => 'Jadwal Pelaksana start date is required.',
            'date_created.date' => 'Jadwal Pelaksana start date must be a valid date format.',
            'due_date.required' => 'Jadwal Pelaksana due date is required.',
            'due_date.date' => 'Jadwal Pelaksana due date must be a valid date format.',
            'due_date.after_or_equal' => 'Jadwal Pelaksana due date must be after or equal to start date.',
            'status.required' => 'Project status is required.',
            'status.in' => 'Invalid project status.',
            'description.required' => 'Keterangan is required.',
        ];
    }
}
