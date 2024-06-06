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
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($year = null)
    {
        // Tahun button filter All
        $tahun = $year;
        // Tahun button filter All

        // Dashboard Total Keseluruhan Project
        $totalprojek = $this->applyYearFilter(ProjectList::query(), 'start_date', $tahun)->count() + $this->applyYearFilter(InstituteProyeks::query(), 'start_date', $tahun)->count();
        $pending = $this->applyYearFilter(ProjectList::query()->where('status', 1), 'start_date', $tahun)->count() + $this->applyYearFilter(InstituteProyeks::query()->where('status', 0), 'start_date', $tahun)->count();
        $onprogress = $this->applyYearFilter(ProjectList::query()->where('status', 2), 'start_date', $tahun)->count() + $this->applyYearFilter(InstituteProyeks::query()->where('status', 1), 'start_date', $tahun)->count();
        $finish = $this->applyYearFilter(ProjectList::query()->where('status', 3), 'start_date', $tahun)->count() + $this->applyYearFilter(InstituteProyeks::query()->where('status', 2), 'start_date', $tahun)->count();
        // Dashboard Total Keseluruhan Project

        // Progress Activity
        $pendingserpo = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 2)->where('status', 0), 'start_date', $tahun)->count();
        $progressserpo = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 2)->where('status', 1), 'start_date', $tahun)->count();
        $finishserpo = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 2)->where('status', 2), 'start_date', $tahun)->count();

        $pendingiconnet = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 1)->where('status', 0), 'start_date', $tahun)->count();
        $progressiconnet = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 1)->where('status', 1), 'start_date', $tahun)->count();
        $finishiconnet = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 1)->where('status', 2), 'start_date', $tahun)->count();

        $pendingtelkom = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 3)->where('status', 0), 'start_date', $tahun)->count();
        $progresstelkom = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 3)->where('status', 1), 'start_date', $tahun)->count();
        $finishtelkom = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 3)->where('status', 2), 'start_date', $tahun)->count();
        // Progress Activity

        // Dashboard Total Keuangan Tiap Project
        $pendingonhold = $this->applyYearFilter(ProjectList::query()->where('payment_status', 1), 'start_date', $tahun)->sum('payment') + $this->applyYearFilter(InstituteProyeks::query()->where('status', 1), 'start_date', $tahun)->sum('tagihan');
        $jumlahyangSudahTerbayar = $this->applyYearFilter(ProjectList::query()->where('payment_status', 3), 'start_date', $tahun)->sum('payment') + $this->applyYearFilter(InstituteProyeks::query()->where('status', 2), 'start_date', $tahun)->sum('tagihan') + $this->applyYearFilter(Sales::query()->where('status', 1), 'tgl', $tahun)->sum('jual');
        $jumlahYangBelumTerbayar = $this->applyYearFilter(ProjectList::query()->where('payment_status', 1), 'start_date', $tahun)->sum('payment') + $this->applyYearFilter(InstituteProyeks::query()->where('status', 0), 'start_date', $tahun)->sum('tagihan') + $this->applyYearFilter(Sales::query()->where('status', 0), 'tgl', $tahun)->sum('jual');
        $totalProjectExpense = $this->applyYearFilter(ProjectAktivitis::query(), 'date', $tahun)->sum('cost') + $this->applyYearFilter(InstitutePengeluaran::query(), 'date', $tahun)->sum('cost') + $this->applyYearFilter(Sales::query(), 'tgl', $tahun)->sum('beli');
        $grossProjectProfit = $this->applyYearFilter(ProjectList::query()->where('payment_status', 1), 'start_date', $tahun)->sum('payment') + $this->applyYearFilter(ProjectList::query()->where('payment_status', 3), 'start_date', $tahun)->sum('payment') + $this->applyYearFilter(ProjectList::query()->where('payment_status', 1), 'start_date', $tahun)->sum('payment') - $this->applyYearFilter(InstituteProyeks::query()->where('status', 0), 'start_date', $tahun)->sum('tagihan') + $this->applyYearFilter(InstituteProyeks::query()->where('status', 2), 'start_date', $tahun)->sum('tagihan') + $this->applyYearFilter(InstitutePengeluaran::query(), 'date', $tahun)->sum('cost') - $this->applyYearFilter(Sales::query()->where('status', 1), 'tgl', $tahun)->sum('jual') + $this->applyYearFilter(Sales::query()->where('status', 0), 'tgl', $tahun)->sum('jual') + $this->applyYearFilter(Sales::query(), 'tgl', $tahun)->sum('jual');

        $Pengeluaran = ProjectAktivitis::sum('cost') + InstitutePengeluaran::sum('cost') + Sales::sum('beli');
        $Pendapatan = ProjectList::sum('payment') + InstituteProyeks::sum('tagihan') + Sales::sum('jual');
        $pendapatanbersih = $Pendapatan - $Pengeluaran;
        $bulan = 12;

        $databulan = [];

        // Pendapatan
        $dataTotalPendapatan = [];

        for ($i = 1; $i <= $bulan; $i++) {
            $dataTotalPendapatanTelkom[] = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 3)->whereMonth('start_date', $i), 'start_date', $tahun)->sum('tagihan');
            $dataTotalPendapatanSerpo[] = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 2)->whereMonth('start_date', $i), 'start_date', $tahun)->sum('tagihan');
            $dataTotalPendapatanIconnet[] = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 1)->whereMonth('start_date', $i), 'start_date', $tahun)->sum('tagihan');

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

        // Pengeluaran
        $dataTotalPendapatan = [];

        for ($i = 1; $i <= $bulan; $i++) {
            $dataPengeluaranTelkom = $this->applyYearFilter(
                InstituteProyeks::withSum('InstitutePengeluaran', 'cost')
                    ->where('id_inst', 3)
                    ->whereMonth('start_date', $i),
                'start_date',
                $tahun
            )->get()->sum('institute_pengeluaran_sum_cost');
            $dataTotalPengeluaranTelkom[] = $dataPengeluaranTelkom ?: 0;

            $dataPengeluaranSerpo = $this->applyYearFilter(
                InstituteProyeks::withSum('InstitutePengeluaran', 'cost')
                    ->where('id_inst', 2)
                    ->whereMonth('start_date', $i),
                'start_date',
                $tahun
            )->get()->sum('institute_pengeluaran_sum_cost');

            $dataTotalPengeluaranSerpo[] = $dataPengeluaranSerpo ?: 0;

            $dataPengeluaranIconnet = $this->applyYearFilter(
                InstituteProyeks::withSum('InstitutePengeluaran', 'cost')
                    ->where('id_inst', 1)
                    ->whereMonth('start_date', $i),
                'start_date',
                $tahun
            )->get()->sum('institute_pengeluaran_sum_cost');

            $dataTotalPengeluaranIconnet[] = $dataPengeluaranIconnet ?: 0;


            $databulan[] = $this->ubahAngkaToBulan($i);
        }

        // Penyimpanan data total pendapatan dalam array $data
        $data['dataTotalPengeluaranTelkom'] = $dataTotalPengeluaranTelkom;
        $data['dataTotalPengeluaranSerpo'] = $dataTotalPengeluaranSerpo;
        $data['dataTotalPengeluaranIconnet'] = $dataTotalPengeluaranIconnet;
        $data['databulan'] = $databulan;

        // Konversi data ke format JSON
        $dataTotalPengeluaranTelkomJson = json_encode($data['dataTotalPengeluaranTelkom']);
        $dataTotalPengeluaranSerpoJson = json_encode($data['dataTotalPengeluaranSerpo']);
        $dataTotalPengeluaranIconnetJson = json_encode($data['dataTotalPengeluaranIconnet']);
        // dd($dataTotalPengeluaranSerpoJson);

        // Rendering view
        return view('admin.home', compact(
            'totalprojek',
            'pending',
            'onprogress',
            'finish',
            'pendingonhold',
            'jumlahyangSudahTerbayar',
            'jumlahYangBelumTerbayar',
            'totalProjectExpense',
            'grossProjectProfit',
            'Pendapatan',
            'Pengeluaran',
            'data',
            'dataTotalPendapatanTelkomJson',
            'dataTotalPendapatanSerpoJson',
            'dataTotalPendapatanIconnetJson',
            'dataTotalPengeluaranTelkomJson',
            'dataTotalPengeluaranSerpoJson',
            'dataTotalPengeluaranIconnetJson',
            'databulanJson',
            'tahun',
            'pendingserpo',
            'progressserpo',
            'finishserpo',
            'pendingiconnet',
            'progressiconnet',
            'finishiconnet',
            'pendingtelkom',
            'progresstelkom',
            'finishtelkom'
        ));
    }

    private function applyYearFilter($query, $column, $year)
    {
        if ($year) {
            return $query->whereYear($column, $year);
        }
        return $query;
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
            '11' => 'November',
            '12' => 'Desember',
        ];
        return $bulanArray[$bulanAngka];
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
