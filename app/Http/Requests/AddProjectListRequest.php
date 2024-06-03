<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProjectListRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'po_number' => 'required|string|max:255',
            'user_id' => 'required',
            'invoice' => 'nullable|string|max:255',
            'invoice_date' => 'nullable|date',
            'pembayaran' => 'nullable|string|max:255',
            'bank' => 'nullable|string',
            'vendor' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'user_ids' => 'required|array',
            'user_ids.*' => 'required|integer',
            'payment_status' => 'nullable|integer',
            'payment' => 'required|integer',
            'status' => 'nullable|integer',
            'fakturpajak' => 'nullable|string|max:255',
            'fp_date' => 'nullable|date',
            'description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama project harus diisi.',
            'name.string' => 'Nama project harus berupa string.',
            'name.max' => 'Nama project maksimal 255 karakter.',
            'po_number.required' => 'Nama No.Kontak/PO Project: harus diisi.',
            'po_number.string' => 'No. Kontak/PO Project harus berupa string.',
            'po_number.max' => 'No. Kontak/PO Project maksimal 255 karakter.',
            'user_id.required' => 'Project Manager harus di isi.',
            'invoice.string' => 'No. Invoice harus berupa string.',
            'invoice.max' => 'No. Invoice maksimal 255 karakter.',
            'invoice_date.date' => 'Tgl. Invoice harus berupa tanggal.',
            'pembayaran.string' => 'Pembayaran harus berupa string.',
            'pembayaran.max' => 'Pembayaran maksimal 255 karakter.',
            'vendor.string' => 'Vendor harus berupa string.',
            'vendor.max' => 'Vendor maksimal 255 karakter.',
            'start_date.required' => 'Tanggal mulai harus di isi.',
            'end_date.required' => 'Tanggal selesai harus di isi.',
            'start_date.date' => 'Tanggal mulai harus berupa tanggal.',
            'end_date.date' => 'Tanggal selesai harus berupa tanggal.',
            'user_ids.required' => 'Team Members harus dipilih.',
            'user_ids.array' => 'Team Members harus berupa array.',
            'user_ids.*.required' => 'Setiap anggota tim harus berupa integer.',
            'user_ids.*.integer' => 'Setiap anggota tim harus berupa integer.',
            'payment_status.integer' => 'Status pembayaran harus berupa integer.',
            'payment.integer' => 'Status pembayaran harus berupa integer.',
            'payment.required' => 'Status pembayaran harus di isi.',
            'status.integer' => 'Status project harus berupa integer.',
            'fakturpajak.string' => 'No. Faktur Pajak harus berupa string.',
            'fakturpajak.max' => 'No. Faktur Pajak maksimal 255 karakter.',
            'fp_date.date' => 'Tgl. Faktur Pajak harus berupa tanggal.',
            'description.string' => 'Keterangan harus berupa string.',
            'description.required' => 'Keterangan harus di isi.',
        ];
    }
}
