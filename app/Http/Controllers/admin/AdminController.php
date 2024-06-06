<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\InstitutePengeluaran;
use App\Models\InstituteProyeks;
use App\Models\ProjectAktivitis;
use App\Models\ProjectList;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalprojek = ProjectList::count() + InstituteProyeks::count();
        $pending = ProjectList::where('status', 1)->count() + InstituteProyeks::where('status', 0)->count();
        $onprogress = ProjectList::where('status', 2)->count() + InstituteProyeks::where('status', 1)->count();
        $finish = ProjectList::where('status', 3)->count() + InstituteProyeks::where('status', 2)->count();

        $pendingonhold = ProjectList::where('payment_status', 1)->sum('payment') + InstituteProyeks::where('status', 1)->sum('tagihan'); // Ganti 'nilai' dengan nama kolom yang ingin dijumlahkan
        $jumlahyangSudahTerbayar = ProjectList::where('payment_status', 3)->sum('payment') + InstituteProyeks::where('status', 3)->sum('tagihan') + Sales::where('status', 1)->sum('jual');
        $jumlahYangBelumTerbayar = ProjectList::where('payment_status', 1)->sum('payment') + InstituteProyeks::where('status', 1)->sum('tagihan') + Sales::where('status', 0)->sum('jual');
        $totalProjectExpense = ProjectAktivitis::sum('cost') + InstitutePengeluaran::sum('cost')  + Sales::sum('beli');
        $grossProjectProfit = ProjectList::where('payment_status', 3)->sum('payment') + ProjectList::where('payment_status', 1)->sum('payment') + ProjectList::where('payment_status', 1)->sum('payment') - InstituteProyeks::where('status', 1)->sum('tagihan') + InstituteProyeks::where('status', 3)->sum('tagihan') + InstitutePengeluaran::sum('cost') - Sales::where('status', 1)->sum('jual') + Sales::where('status', 0)->sum('jual') + Sales::sum('jual');

        $Pengeluaran =  ProjectAktivitis::sum('cost') + InstitutePengeluaran::sum('cost')  + Sales::sum('beli');
        $Pendapatan = ProjectList::sum('payment') + InstituteProyeks::sum('tagihan') + Sales::sum('jual');
        $pendapatanbersih = $Pendapatan - $Pengeluaran;


        $tahun = 2020;
        $bulan = 12;
        $databulan = [];
        $dataTotalPendapatan = [];

        for ($i = 1; $i <= $bulan; $i++) {
            $dataTotalPendapatanTelkom[] = InstituteProyeks::where('id_inst', 3)
                ->whereYear('start_date', $tahun)
                ->whereMonth('start_date', $i)
                ->sum('tagihan');

            $dataTotalPendapatanSerpo[] = InstituteProyeks::where('id_inst', 2)
                ->whereYear('start_date', $tahun)
                ->whereMonth('start_date', $i)
                ->sum('tagihan');

            $dataTotalPendapatanIconnet[] = InstituteProyeks::where('id_inst', 1)
                ->whereYear('start_date', $tahun)
                ->whereMonth('start_date', $i)
                ->sum('tagihan');

            $databulan[] = $this->ubahAngkaToBulan($i);
        }

        // Penyimpanan data total pendapatan dalam array $data
        $data['dataTotalPendapatanTelkom'] = $dataTotalPendapatanTelkom;
        $data['dataTotalPendapatanSerpo'] = $dataTotalPendapatanSerpo;
        $data['dataTotalPendapatanIconnet'] = $dataTotalPendapatanIconnet;
        $data['databulan'] = $databulan;

        // Konversi data ke format JSON
        $dataTotalPendapatanTelkomJson = json_encode($data['dataTotalPendapatanTelkom']);
        $dataTotalPendapatanSerpoJson = json_encode($data['dataTotalPendapatanSerpo']);
        $dataTotalPendapatanIconnetJson = json_encode($data['dataTotalPendapatanIconnet']);
        $databulanJson = json_encode($data['databulan']);

        // Rendering view
        return view('admin.home', compact('totalprojek', 'pending', 'onprogress', 'finish', 'pendingonhold', 'jumlahyangSudahTerbayar', 'jumlahYangBelumTerbayar', 'totalProjectExpense', 'grossProjectProfit', 'Pendapatan', 'Pengeluaran', 'data', 'dataTotalPendapatanTelkomJson', 'dataTotalPendapatanSerpoJson', 'dataTotalPendapatanIconnetJson', 'databulanJson', 'tahun'));
    }

    public function ubahAngkaToBulan($bulanAngka)
    {
        $bulanArray = [
            '0' => '', '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'Novemebr',
            '12' => 'Desember',
        ];
        return $bulanArray[$bulanAngka + 0];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
