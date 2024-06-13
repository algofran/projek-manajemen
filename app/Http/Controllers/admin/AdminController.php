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
    public function index($year = null, $month = null)
{
    $tahun = $year;
    $bulan = $month;

    // Dashboard Total Keseluruhan Project
    $totalprojek = $this->applyYearMonthFilter(ProjectList::query(), 'start_date', $tahun, $bulan)->count();
    $pending = $this->applyYearMonthFilter(ProjectList::query()->where('status', 1), 'start_date', $tahun, $bulan)->count();
    $onprogress = $this->applyYearMonthFilter(ProjectList::query()->where('status', 2), 'start_date', $tahun, $bulan)->count();
    $finish = $this->applyYearMonthFilter(ProjectList::query()->where('status', 3), 'start_date', $tahun, $bulan)->count();

    // Progress Activity
    $pendingIconplus = $this->applyYearMonthFilter(InstituteProyeks::query()->where('id_inst', 2)->where('status', 0), 'start_date', $tahun, $bulan)->count() +
                       $this->applyYearMonthFilter(InstituteProyeks::query()->where('id_inst', 1)->where('status', 0), 'start_date', $tahun, $bulan)->count();
    $progressIconplus = $this->applyYearMonthFilter(InstituteProyeks::query()->where('id_inst', 2)->where('status', 1), 'start_date', $tahun, $bulan)->count() +
                        $this->applyYearMonthFilter(InstituteProyeks::query()->where('id_inst', 1)->where('status', 1), 'start_date', $tahun, $bulan)->count();
    $finishIconplus = $this->applyYearMonthFilter(InstituteProyeks::query()->where('id_inst', 2)->where('status', 2), 'start_date', $tahun, $bulan)->count() +
                      $this->applyYearMonthFilter(InstituteProyeks::query()->where('id_inst', 1)->where('status', 2), 'start_date', $tahun, $bulan)->count();

    $pendingtelkom = $this->applyYearMonthFilter(InstituteProyeks::query()->where('id_inst', 3)->where('status', 0), 'start_date', $tahun, $bulan)->count();
    $progresstelkom = $this->applyYearMonthFilter(InstituteProyeks::query()->where('id_inst', 3)->where('status', 1), 'start_date', $tahun, $bulan)->count();
    $finishtelkom = $this->applyYearMonthFilter(InstituteProyeks::query()->where('id_inst', 3)->where('status', 2), 'start_date', $tahun, $bulan)->count();

    // Dashboard Total Keuangan Tiap Project
    $pendingonhold = $this->applyYearMonthFilter(ProjectList::query()->where('payment_status', 1), 'start_date', $tahun, $bulan)->sum('payment') +
                     $this->applyYearMonthFilter(InstituteProyeks::query()->where('status', 1), 'start_date', $tahun, $bulan)->sum('tagihan');
    $jumlahyangSudahTerbayar = $this->applyYearMonthFilter(ProjectList::query()->where('payment_status', 3), 'start_date', $tahun, $bulan)->sum('payment') +
                               $this->applyYearMonthFilter(InstituteProyeks::query()->where('status', 2), 'start_date', $tahun, $bulan)->sum('tagihan') +
                               $this->applyYearMonthFilter(Sales::query()->where('status', 1), 'tgl', $tahun, $bulan)->sum('jual');
    $jumlahYangBelumTerbayar = $this->applyYearMonthFilter(ProjectList::query()->where('payment_status', 1), 'start_date', $tahun, $bulan)->sum('payment') +
                               $this->applyYearMonthFilter(InstituteProyeks::query()->where('status', 0), 'start_date', $tahun, $bulan)->sum('tagihan') +
                               $this->applyYearMonthFilter(Sales::query()->where('status', 0), 'tgl', $tahun, $bulan)->sum('jual');
    $totalProjectExpense = $this->applyYearMonthFilter(ProjectAktivitis::query(), 'date', $tahun, $bulan)->sum('cost') +
                           $this->applyYearMonthFilter(InstitutePengeluaran::query(), 'date', $tahun, $bulan)->sum('cost') +
                           $this->applyYearMonthFilter(Sales::query(), 'tgl', $tahun, $bulan)->sum('beli');
    $grossProjectProfit = $jumlahyangSudahTerbayar - $totalProjectExpense;

    $Pengeluaran = ProjectAktivitis::sum('cost') + InstitutePengeluaran::sum('cost') + Sales::sum('beli');
    $Pendapatan = ProjectList::sum('payment') + InstituteProyeks::sum('tagihan') + Sales::sum('jual');
    $pendapatanbersih = $Pendapatan - $Pengeluaran;

    // Inisialisasi array kosong
    $dataTotalPendapatanTelkom = [];
    $dataTotalPendapatanIcon = [];
    $dataTotalPendapatanpln = [];
    $dataTotalPengeluaranTelkom = [];
    $dataTotalPengeluaranIcon = [];
    $dataTotalPengeluaranpln = [];
    $databulan = [];

    for ($i = 1; $i <= 12; $i++) {
        $dataTotalPendapatanTelkom[] = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 3)->whereMonth('start_date', $i), 'start_date', $tahun)->sum('tagihan');
        $dataTotalPendapatanIcon[] = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', [1, 2])->whereMonth('start_date', $i), 'start_date', $tahun)->sum('tagihan');
        $dataTotalPendapatanpln[] = $this->applyYearFilter(InstituteProyeks::query()->where('id_inst', 4)->whereMonth('start_date', $i), 'start_date', $tahun)->sum('tagihan');

        $dataPengeluaranTelkom = $this->applyYearFilter(
            InstituteProyeks::withSum('InstitutePengeluaran', 'cost')
                ->where('id_inst', 3)
                ->whereMonth('start_date', $i),
            'start_date',
            $tahun
        )->get()->sum('institute_pengeluaran_sum_cost');
        $dataTotalPengeluaranTelkom[] = $dataPengeluaranTelkom ?: 0;

        $dataPengeluaranpln = $this->applyYearFilter(
            InstituteProyeks::withSum('InstitutePengeluaran', 'cost')
                ->where('id_inst', 4)
                ->whereMonth('start_date', $i),
            'start_date',
            $tahun
        )->get()->sum('institute_pengeluaran_sum_cost');
        $dataTotalPengeluaranpln[] = $dataPengeluaranpln ?: 0;

        $dataPengeluaranIcon = $this->applyYearFilter(
            InstituteProyeks::withSum('InstitutePengeluaran', 'cost')
                ->where('id_inst', [1, 2])
                ->whereMonth('start_date', $i),
            'start_date',
            $tahun
        )->get()->sum('institute_pengeluaran_sum_cost');
        $dataTotalPengeluaranIcon[] = $dataPengeluaranIcon ?: 0;

        $databulan[] = $this->ubahAngkaToBulan($i);
    }

    // Penyimpanan data total pendapatan dan pengeluaran dalam array $data
    $data = [
        'dataTotalPendapatanTelkom' => $dataTotalPendapatanTelkom,
        'dataTotalPendapatanIcon' => $dataTotalPendapatanIcon,
        'dataTotalPendapatanpln' => $dataTotalPendapatanpln,
        'dataTotalPengeluaranTelkom' => $dataTotalPengeluaranTelkom,
        'dataTotalPengeluaranpln' => $dataTotalPengeluaranpln,
        'dataTotalPengeluaranIcon' => $dataTotalPengeluaranIcon,
        'databulan' => $databulan,
    ];

    //
        // Konversi data ke format JSON
        $dataTotalPendapatanTelkomJson = json_encode($data['dataTotalPendapatanTelkom']);
        $dataTotalPendapatanIconJson = json_encode($data['dataTotalPendapatanIcon']);
        $dataTotalPendapatanplnJson = json_encode($data['dataTotalPendapatanpln']);
        $dataTotalPengeluaranTelkomJson = json_encode($data['dataTotalPengeluaranTelkom']);
        $dataTotalPengeluaranIconJson = json_encode($data['dataTotalPengeluaranIcon']);
        $dataTotalPengeluaranplnJson = json_encode($data['dataTotalPengeluaranpln']);
        $databulanJson = json_encode($data['databulan']);
    
        // Menyertakan data JSON pada tampilan
        return view('admin.home', compact(
            'databulanJson',
            'dataTotalPendapatanTelkomJson',
            'dataTotalPendapatanIconJson',
            'dataTotalPendapatanplnJson',
            'dataTotalPengeluaranTelkomJson',
            'dataTotalPengeluaranIconJson',
            'dataTotalPengeluaranplnJson',
            'totalprojek',
            'pending',
            'onprogress',
            'finish',
            'pendingIconplus',
            'progressIconplus',
            'finishIconplus',
            'pendingtelkom',
            'progresstelkom',
            'finishtelkom',
            'pendingonhold',
            'jumlahyangSudahTerbayar',
            'jumlahYangBelumTerbayar',
            'totalProjectExpense',
            'grossProjectProfit',
            'pendapatanbersih',
            'tahun',
            'bulan'
        ));
    }
    

    private function applyYearMonthFilter($query, $column, $year, $month)
    {
        if ($year) {
            $query->whereYear($column, $year);
        }
        if ($month) {
            $query->whereMonth($column, $month);
        }
        return $query;
    }

    private function applyYearFilter($query, $column, $year)
    {
        if ($year) {
            $query->whereYear($column, $year);
        }
        return $query;
    }

    private function ubahAngkaToBulan($angka)
    {
        $bulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        ];

        return $bulan[$angka] ?? null;
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
