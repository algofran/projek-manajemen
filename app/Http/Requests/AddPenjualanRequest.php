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
            'tgl.required' => 'Tanggal is required.',
            'tgl.date' => 'Tanggal must be a valid date format.',
            'pembeli.required' => 'Nama Pembeli is required.',
            'pembeli.string' => 'Nama Pembeli must be a string.',
            'pembeli.max' => 'Nama Pembeli may not be greater than :max characters.',
            'keterangan.required' => 'Keterangan is required.',
            'keterangan.string' => 'Keterangan must be a string.',
            'beli.required' => 'Harga Pembelian is required.',
            'beli.numeric' => 'Harga Pembelian must be a number.',
            'jual.required' => 'Harga Penjualan is required.',
            'jual.numeric' => 'Harga Penjualan must be a number.',
            'user.required' => 'Nama Pengguna is required.',
            'user.exists' => 'Nama Pengguna must be a valid user.',
            'status.required' => 'Status Pembayaran is required.',
            'status.in' => 'Status Pembayaran must be either 0 or 1.',
        ];
    }
}
