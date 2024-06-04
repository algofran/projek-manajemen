<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPenjualanRequest extends FormRequest
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
            'tgl' => 'required|date',
            'pembeli' => 'required|string|max:150',
            'keterangan' => 'required|string',
            'beli' => 'required|numeric',
            'jual' => 'required|numeric',
            'user' => 'required|exists:users,id',
            'status' => 'required|in:0,1',
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
            'tgl.required' => 'Tanggal wajib diisi.',
            'tgl.date' => 'Tanggal harus berupa format tanggal yang valid.',
            'pembeli.required' => 'Nama Pembeli wajib diisi.',
            'pembeli.string' => 'Nama Pembeli harus berupa teks.',
            'pembeli.max' => 'Nama Pembeli tidak boleh lebih dari :max karakter.',
            'keterangan.required' => 'Keterangan wajib diisi.',
            'keterangan.string' => 'Keterangan harus berupa teks.',
            'beli.required' => 'Harga Pembelian wajib diisi.',
            'beli.numeric' => 'Harga Pembelian harus berupa angka.',
            'jual.required' => 'Harga Penjualan wajib diisi.',
            'jual.numeric' => 'Harga Penjualan harus berupa angka.',
            'user.required' => 'Nama Pengguna wajib diisi.',
            'user.exists' => 'Nama Pengguna harus berupa pengguna yang valid.',
            'status.required' => 'Status Pembayaran wajib diisi.',
            'status.in' => 'Status Pembayaran harus bernilai 0 atau 1.',
        ];
    }
}
