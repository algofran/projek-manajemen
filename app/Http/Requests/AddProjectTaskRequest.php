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
            'project_id.required' => 'Project ID is required',
            'project_id.integer' => 'Project ID must be an integer',
            'project_id.exists' => 'The selected project ID is invalid',
            'task.required' => 'Task is required',
            'task.string' => 'Task must be a string',
            'task.max' => 'Task may not be greater than 200 characters',
            'description.required' => 'Description is required',
            'description.string' => 'Description must be a string',
            'status.required' => 'Status is required',
            'status.integer' => 'Status must be an integer',
            'status.in' => 'Status must be 0, 1, or 2',
            'date_created.date' => 'Date Created must be a valid date',
            'due_date.date' => 'Due Date must be a valid date',
            'due_date.after_or_equal' => 'Due Date must be a date after or equal to Date Created',
            'user_id.required' => 'User ID is required',
            'user_id.exists' => 'The selected user ID is invalid',
        ];
    }
}
