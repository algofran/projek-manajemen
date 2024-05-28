<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Models\ProjectAktivitis;
use App\Models\ProjectList;
use App\Models\ProjectTask;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\View\View;
use Mpdf\Mpdf;

class KeuanganProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $i = 1;
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];
        $tag = ["", "PT. PLN (PERSERO)", "PT. INDONESIA COMNET PLUS", "TELKOM AKSES", "RSWS/PEMDA/LAIN2"];
        $vendor_tag = ["", "PT. VISDAT TEKNIK UTAMA", "PT. CORDOVA BERKAH NUSATAMA", "CV. VISDAT TEKNIK UTAMA", "CV. VISUAL DATA KOMPUTER"];

        if ($request->has('status')) {
            $projects = ProjectList::where('status', $request->status)->get();
        } else {
            $projects = ProjectList::get();
        }
        // dd($projects);

        foreach ($projects as $project) {
            $tprog = ProjectTask::where('project_id', $project->id)->count();
            $cprog = ProjectTask::where('project_id', $project->id)->where('status', 3)->count();
            $prog = $tprog > 0 ? ($cprog / $tprog) * 100 : 0;
            $prog = $prog > 0 ? number_format($prog, 2) : $prog;

            $status = $stat[$project->status];
            $paymentStatus = $pay[$project->payment_status];

            $project->progress = $prog;
            $project->status_label = $status;
            $project->payment_label = $paymentStatus;
            $project->tag = $tag[$project->pembayaran];
            $project->vendor_tag = $vendor_tag[$project->vendor];
        }
        // dd($projects);

        return view('project.laporan_keuangan', compact('projects', 'i', 'stat'));
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
        $i = 1;
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];
        $tag = ["", "PT. PLN (PERSERO)", "PT. INDONESIA COMNET PLUS", "TELKOM AKSES", "RSWS/PEMDA/LAIN2"];
        $vendor_tag = ["", "PT. VISDAT TEKNIK UTAMA", "PT. CORDOVA BERKAH NUSATAMA", "CV. VISDAT TEKNIK UTAMA", "CV. VISUAL DATA KOMPUTER"];
        $type = $request->query('type');
        $project = ProjectList::findOrFail($id);
        $manager = User::findOrFail($project->user_id);

        if ($type) {
            $tasks = ProjectAktivitis::where('project_id', $project->id)
                ->where('subject', $type)
                ->orderBy('date', 'asc')
                ->get();
        } else {
            $tasks = ProjectAktivitis::where('project_id', $project->id)
                ->get();
            $type = 'null';
        }
        foreach ($project as $projects) {
            $tprog = ProjectTask::where('project_id', $id)->count();
            $cprog = ProjectTask::where('project_id', $id)->where('status', 3)->count();
            $prog = $tprog > 0 ? ($cprog / $tprog) * 100 : 0;
            $prog = $prog > 0 ? number_format($prog, 2) : $prog;

            $status = $stat[$project->status];
            $paymentStatus = $pay[$project->payment_status];

            $project->progress = $prog;
            $project->status_label = $status;
            $project->payment_label = $paymentStatus;
            $project->tag = $tag[$project->pembayaran];
            $project->vendor_tag = $vendor_tag[$project->vendor];
        }
        // dd($type);
        // dd($project);
        return view('project.detail_keuangan', compact('project', 'manager', 'tasks', 'type'));
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



        $project = ProjectList::findOrFail($id);
        $manager = User::findOrFail($project->user_id);

        if ($type == 'null') {
            $tasks = ProjectAktivitis::where('project_id', $project->id)
                ->get();
        } else {
            $tasks = ProjectAktivitis::where('project_id', $project->id)
                ->where('subject', $type)
                ->orderBy('date', 'asc')
                ->get();
        }

        // Render view to HTML
        $html = view('project.cetak_keuangan', compact('project', 'manager', 'tasks'))->render();

        // Create new mPDF instance
        $mpdf = new Mpdf();

        // Write HTML content to PDF
        $mpdf->WriteHTML($html);

        $mpdf->Output();
        // response()->streamDownload('Detail_Laporan_Keuangan.pdf');

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
        $project = ProjectList::findOrFail($id);
        $manager = User::findOrFail($project->user_id);

        if ($type == 'null') {
            $tasks = ProjectAktivitis::where('project_id', $project->id)->get();
        } else {
            $tasks = ProjectAktivitis::where('project_id', $project->id)
                ->where('subject', $type)
                ->orderBy('date', 'asc')
                ->get();
        }

        // Menggunakan fungsi dari Maatwebsite Excel untuk mengunduh file
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
                return view('project.cetak_keuangan', [
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
