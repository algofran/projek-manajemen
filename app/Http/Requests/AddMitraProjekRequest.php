<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMitraProjekRequest extends FormRequest
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
            'id_inst' => 'required|exists:institute_mitras,id',
            'periode' => 'required|string|max:20',
            'paket' => 'required|integer',
            'sektor' => 'required|string|max:45',
            'keterangan' => 'required|string|max:45',
            'PA' => 'required|integer',
            'target' => 'nullable|integer',
            'tagihan' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'status' => 'required|integer',
            'payment' => 'required|integer',
            'bank' => 'required|string',
            'manager_id' => 'required|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'id_inst.required' => 'Id Institute wajib diisi.',
            'id_inst.exists' => 'Id Institute tidak valid.',
            'periode.required' => 'Periode wajib diisi.',
            'paket.required' => 'Paket wajib diisi.',
            'sektor.required' => 'Sektor wajib diisi.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'PA.required' => 'Jumlah PA wajib diisi.',
            'tagihan.required' => 'Tagihan wajib diisi.',
            'tagihan.numeric' => 'Tagihan harus berupa angka.',
            'start_date.required' => 'Start Date wajib diisi.',
            'start_date.date' => 'Format tanggal tidak valid.',
            'status.required' => 'Status wajib diisi.',
            'payment.required' => 'Status pembayaran wajib diisi.',
            'bank.required' => 'Bank wajib diisi.',
            'manager_id.required' => 'Manager wajib dipilih.',
            'manager_id.exists' => 'Manager tidak valid.',
        ];
    }
}
