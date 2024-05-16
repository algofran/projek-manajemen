<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\UserEmploye;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\View\View;

class PenjualanController extends Controller
{
    public function index(Request $request)
    {
        $i = 1;
        $pay = ["Belum Terbayar", "Sudah Terbayar"];
        $sales = Sales::orderBy('tgl', 'desc')->get();

        $tgl = $request->input('tgl');
        $pembeli = $request->input('pembeli');
        $keterangan = $request->input('keterangan');
        $beli = $request->input('beli');
        $jual = $request->input('jual');
        $status = $request->input('status');
        $employees = UserEmploye::where('type', '>', 0)->orderBy('firstname')->get();


        return view('Penjualan.lists_penjualan', compact('i', 'pay', 'sales', 'employees', 'tgl', 'pembeli', 'keterangan', 'beli', 'jual', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl' => 'nullable|date',
            'pembeli' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'beli' => 'nullable|numeric',
            'jual' => 'nullable|numeric',
            'status' => 'nullable|integer',
            'user' => 'nullable|integer',
        ]);

        $penjualan = new Sales([
            'tgl' => $request->input('tgl'),
            'pembeli' => $request->input('pembeli'),
            'keterangan' => $request->input('keterangan'),
            'beli' =>  $request->input('beli'),
            'jual' => $request->input('jual'),
            'status' => $request->input('status'),
            'user' => $request->input('user'),
        ]);

        if ($penjualan->save()) {
            return redirect()->route('list_penjualan')->with('success', 'penjualan berhasil dibuat!');
        } else {
            $errorMessage = 'Gagal membuat penjualan. Silakan coba lagi.';
            return redirect()->route('list_penjualan')->with('error', $errorMessage)->withInput($request->except('password', 'password_confirmation'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tgl' => 'nullable|date',
            'pembeli' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'beli' => 'nullable|numeric',
            'jual' => 'nullable|numeric',
            'status' => 'nullable|integer',
            'user' => 'nullable|integer',
        ]);

        $penjualan = Sales::findOrFail($id);
        $penjualan->update([
            'tgl' => $request->input('tgl'),
            'pembeli' => $request->input('pembeli'),
            'keterangan' => $request->input('keterangan'),
            'beli' =>  $request->input('beli'),
            'jual' => $request->input('jual'),
            'status' => $request->input('status'),
            'user' => $request->input('user'),
        ]);

        return redirect()->route('list_penjualan')->with('success', 'Telkom Akses berhasil diperbarui!');
    }

    public function downloadExel()
    {
        $i = 1;
        $pay = ["Belum Bayar", "Sudah Terbayar"];
        $sales = Sales::orderBy('tgl', 'desc')->get();
        // Menggunakan fungsi dari Maatwebsite Excel untuk mengunduh file

        $employees = UserEmploye::where('type', '>', 0)->orderBy('firstname')->get();

        return Excel::download(new class($i, $pay, $sales, $employees) implements \Maatwebsite\Excel\Concerns\FromView
        {
            protected $i;
            protected $pay;
            protected $sales;
            protected $employees;

            public function __construct($i, $pay, $sales, $employees)
            {
                $this->i = $i;
                $this->pay = $pay;
                $this->sales = $sales;
                $this->employees = $employees;
            }

            public function view(): View
            {
                return view('penjualan.cetak_keuangan', [
                    'i' => $this->i,
                    'pay' => $this->pay,
                    'sales' => $this->sales,
                    'employees' => $this->employees
                ]);
            }
        }, 'penjualan_data.xlsx');
    }

    public function destroy(string $id)
    {
        $penjualan = Sales::findOrFail($id);

        $penjualan->delete();

        return redirect()->route('list_penjualan')->with('success', 'telkom deleted successfully!');
    }
}
