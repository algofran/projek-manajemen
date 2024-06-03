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
            'project_id.required' => 'Project ID is required.',
            'subject.required' => 'Subject is required.',
            'user_id.required' => 'User ID is required.',
            'date.required' => 'Date is required.',
            'date.date' => 'Date must be a valid date format.',
            'cost.required' => 'Cost is required.',
            'cost.numeric' => 'Cost must be a number.',
            'comment.required' => 'Comment is required.',
        ];
    }
}
