<?php

namespace App\Http\Controllers\rekapdata;

use App\Http\Controllers\Controller;
use App\Models\InstituteList;
use App\Models\InstituteMitra;
use App\Models\InstitutePengeluaran;
use App\Models\InstituteProyeks;
use App\Models\ProjectAktivitis;
use App\Models\ProjectList;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapController extends Controller
{
    public function Pendapatan(Request $request) {
        $i = 1;
        $dataFilter = $request->input('data');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $paket_tag = [
            "Tidak Menggunakan Paket",
            "Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 1 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Konawe - Serpo SBU Sulawesi & IBT 2022-2025"
        ];

        // Query berdasarkan filter
        if ($dataFilter) {
            if ($dataFilter === 'projek') {
                $query = ProjectList::query();
            } else {
                $query = InstituteProyeks::where('id_inst', $dataFilter);
            }
        } else {
            $query = ProjectList::query();
        }

        // Filter berdasarkan tanggal
        if ($startDate && $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate]);
        }

        $pendapatan = $query->orderBy('start_date')->get();
        $mitra = InstituteMitra::orderBy('mitra')->get();

        return view('rekapdata.rekappendapatan', compact('mitra', 'i', 'pendapatan', 'startDate', 'endDate', 'dataFilter', 'paket_tag'));
    }

    public function Pengeluaran(Request $request) {
        $i = 1;
        $dataFilter = $request->input('data');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        
        // Query berdasarkan filter
        if ($dataFilter) {
            if ($dataFilter === 'projek') {
                $query = ProjectAktivitis::query();
            } else {
                $query = InstitutePengeluaran::where('id_inst', $dataFilter);
            }
        } else {
            $query = ProjectAktivitis::query();
        }

        // Filter berdasarkan tanggal
        if ($startDate && $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }

        $pengeluaran = $query->orderBy('date')->get();
        $mitra = InstituteMitra::orderBy('mitra')->get();

        return view('rekapdata.rekappengeluaran', compact('mitra', 'i', 'pengeluaran', 'startDate', 'endDate', 'dataFilter'));
    }

    public function menu() {
        return view('rekapdata.menurekap');
    }


    public function downloadExcelPengeluaran(Request $request)
{
    $dataFilter = $request->input('data');
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Initialize query
    if ($dataFilter) {
        if ($dataFilter === 'projek') {
            $query = ProjectAktivitis::query();
        } else {
            $query = InstitutePengeluaran::where('id_inst', $dataFilter);
        }
    } else {
        $query = InstitutePengeluaran::query();
    }

    // Apply date filter
    if ($startDate && $endDate) {
        $query->whereBetween('date', [$startDate, $endDate]);
    }

    $pengeluaran = $query->orderBy('date')->get();

    return Excel::download(new class($pengeluaran, $startDate, $endDate, $dataFilter) implements FromView
    {
        protected $pengeluaran;
        protected $startDate;
        protected $endDate;
        protected $dataFilter;

        public function __construct($pengeluaran, $startDate, $endDate, $dataFilter)
        {
            $this->pengeluaran = $pengeluaran;
            $this->startDate = $startDate;
            $this->endDate = $endDate;
            $this->dataFilter = $dataFilter;
        }

        public function view(): View
        {
            return view('rekapdata.cetakrekappengeluaran', [
                'pengeluaran' => $this->pengeluaran,
                'startDate' => $this->startDate,
                'endDate' => $this->endDate,
                'dataFilter' => $this->dataFilter
            ]);
        }
    }, 'rekap_pengeluaran.xlsx');
}

public function downloadExcelPendapatan(Request $request)
{
    $dataFilter = $request->input('data');
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    $query = ProjectList::query();

    if ($dataFilter) {
        if ($dataFilter === 'projek') {
            $query = ProjectList::query();
        } else {
            $query = InstituteProyeks::where('id_inst', $dataFilter);
        }
    } else {
        $query = ProjectList::query();
    }

    // Filter berdasarkan tanggal
    if ($startDate && $endDate) {
        $query->whereBetween('start_date', [$startDate, $endDate]);
    }

    $pendapatan = $query->orderBy('start_date')->get();

    return Excel::download(new class($pendapatan, $startDate, $endDate, $dataFilter) implements FromView {
        protected $pendapatan;
        protected $startDate;
        protected $endDate;
        protected $dataFilter;

        public function __construct($pendapatan, $startDate, $endDate,  $dataFilter)
        {
            $this->pendapatan = $pendapatan;
            $this->startDate = $startDate;
            $this->endDate = $endDate;
            $this->dataFilter = $dataFilter;
        }

        public function view(): View
        {
            return view('rekapdata.cetakrekappendapatan', [
                'pendapatan' => $this->pendapatan,
                'startDate' => $this->startDate,
                'endDate' => $this->endDate,
                'dataFilter' => $this->dataFilter,
                'paket_tag' => [
                    0 => "Tidak Menggunakan Paket",
                    1 => "Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025",
                    2 => "Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025",
                    3 => "Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025",
                    4 => "Papua 1 - Serpo SBU Sulawesi & IBT 2022-2025",
                    5 => "Papua 2 - Serpo SBU Sulawesi & IBT 2022-2025",
                    6 => "Konawe - Serpo SBU Sulawesi & IBT 2022-2025"
                ],
            ]);
        }
    }, 'rekap_pendapatan.xlsx');
}

}
