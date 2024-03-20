<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $i = 1;
        $pay = ["Belum Bayar", "Sudah Terbayar"];
        $sales = Sales::orderBy('tgl', 'desc')->get();

        return view('Penjualan.lists_penjualan', compact('i', 'pay', 'sales'));
    }
}
