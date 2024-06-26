<?php

namespace App\Http\Controllers;

use App\Models\InstitutePengeluaran;
use App\Models\InstituteProyek;
use App\Models\InstituteTugas;
use App\Models\UserEmploye;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\View\View;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Cache;



class KeuanganController extends Controller
{

    public function index(Request $request, string $id)
    {
        $i = 1;
        $stat = ["Pending", "On-Progress", "Complete"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];
        $paket_tag = [
            "Tidak Menggunakan Paket",
            "Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 1 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Konawe - Serpo SBU Sulawesi & IBT 2022-2025"
        ];
        if ($request->has('status')) {
            $projects = InstituteProyek::where('id_inst', $id)->where('status', $request->status)->get();
        } else {
            $projects = InstituteProyek::where('id_inst', $id)->get();
        }
        // dd($projects);

        foreach ($projects as $project) {
            $tprog = InstituteTugas::where('id_inst', $project->id)->count();
            $cprog = InstituteTugas::where('id_inst', $project->id)->where('status', 3)->count();
            $prog = $tprog > 0 ? ($cprog / $tprog) * 100 : 0;
            $prog = $prog > 0 ? number_format($prog, 2) : $prog;
            $project->prog = $prog; // Tambahkan progres ke objek proyek
        }

        return view('perusahaan.list_keuangan', compact('projects', 'stat', 'pay', 'paket_tag', 'i'));
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
    public function show(Request $request, string $id)
    {
        $project = InstituteProyek::findOrFail($id);
        $manager = UserEmploye::findOrFail($project->manager_id);
        $type = $request->query('type');
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];

        if ($type) {
            $tasks = InstitutePengeluaran::where('id_inst', $project->id)
                ->where('subject', $type)
                ->orderBy('date', 'asc')
                ->get();
        } else {
            $tasks = InstitutePengeluaran::where('id_inst', $project->id)
                ->orderBy('date', 'asc')
                ->get();
            $type = 'null';
        }


        return view('perusahaan.detail_keuangan', compact('project', 'manager', 'tasks', 'stat', 'pay', 'type'));
    }

    public function downloadPDF(Request $request, string $id, string $type)
    {
        // $cacheKey = 'pdf_' . $id;
        // $cachedPdf = Cache::get($cacheKey);

        // if ($cachedPdf) {
        //     return response()->streamDownload(function () use ($cachedPdf) {
        //         echo $cachedPdf;
        //     }, 'Detail_Laporan_Keuangan.pdf');
        // }



        $project = InstituteProyek::findOrFail($id);
        $manager = UserEmploye::findOrFail($project->manager_id);

        if ($type == 'null') {
            $tasks = InstitutePengeluaran::where('id_inst', $project->id)
                ->orderBy('date', 'asc')
                ->get();
        } else {
            $tasks = InstitutePengeluaran::where('id_inst', $project->id)
                ->where('subject', $type)
                ->orderBy('date', 'asc')
                ->get();
        }

        // Render view to HTML
        $html = view('perusahaan.cetak_keuangan', compact('project', 'manager', 'tasks'))->render();

        // Create new mPDF instance
        $mpdf = new Mpdf();

        // Write HTML content to PDF
        $mpdf->WriteHTML($html);

        $mpdf->Output();

        // Get the PDF content
        // $pdfContent = $mpdf->Output('', 'S');

        // // Store PDF content in cache
        // Cache::put($cacheKey, $pdfContent, now()->addHours(1));

        // // Output the PDF as a file (force download)
        // return response()->streamDownload(function () use ($pdfContent) {
        //     echo $pdfContent;
        // }, 'Detail_Laporan_Keuangan.pdf');
    }
    public function downloadExel(Request $request, string $id, string $type)
    {

        $project = InstituteProyek::findOrFail($id);
        $manager = UserEmploye::findOrFail($project->manager_id);

        if ($type == 'null') {
            $tasks = InstitutePengeluaran::where('id_inst', $project->id)
                ->orderBy('date', 'asc')
                ->get();
        } else {
            $tasks = InstitutePengeluaran::where('id_inst', $project->id)
                ->where('subject', $type)
                ->orderBy('date', 'asc')
                ->get();
        }

        return Excel::download(new class($project, $manager, $tasks) implements \Maatwebsite\Excel\Concerns\FromView
        {
            protected $project;
            protected $manager;
            protected $tasks;

            public function __construct($project, $manager, $tasks)
            {
                $this->project = $project;
                $this->manager = $manager;
                $this->tasks = $tasks;
            }

            public function view(): View
            {
                return view('perusahaan.cetak_keuangan', [
                    'project' => $this->project,
                    'manager' => $this->manager,
                    'tasks' => $this->tasks
                ]);
            }
        }, 'project_data.xlsx');
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
