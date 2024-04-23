<?php

namespace App\Http\Controllers;

use App\Models\InstitutePengeluaran;
use App\Models\InstituteProyek;
use App\Models\InstituteTagihan;
use App\Models\InstituteTugas;
use App\Models\MitraIntitute;
use App\Models\TaskLists;
use App\Models\UserEmploye;
use App\Models\UserProductivity;
use Illuminate\Http\Request;

class InstituteProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $i = 1;
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];
        $tag = ["", "PT. PLN (PERSERO)", "PT. INDONESIA COMNET PLUS", "TELKOM AKSES", "RSWS/PEMDA/LAIN2"];
        $vendor_tag = ["", "PT. VISDAT TEKNIK UTAMA", "PT. CORDOVA BERKAH NUSATAMA", "CV. VISDAT TEKNIK UTAMA", "CV. VISUAL DATA KOMPUTER"];
        $subjectOptions = ["Biaya Operasional", "Biaya Material", "Biaya Tools", "Biaya Gaji/Fee", "Biaya Lainnya"];

        $project = InstituteProyek::findOrFail($id);
        $id_inst = $project->id_inst;
        $name = $project->keterangan;
        $paket_tag = [
            $name,
            "Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 1 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Konawe - Serpo SBU Sulawesi & IBT 2022-2025"
        ];
        $mitra = MitraIntitute::where('id', $id_inst)->pluck('mitra')->first();
        $activities = InstitutePengeluaran::where('id_inst', $id)->orderBy('date', 'desc')->get();


        $project = InstituteProyek::findOrFail($id);
        $tasks = InstituteTugas::where('id_inst', $id)->orderBy('id', 'asc')->get();
        $totalTasks = $tasks->count();
        $completedTasks = $tasks->where('status', 3)->count();
        $progress = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;

        $manager = UserEmploye::findOrFail($project->manager_id);
        $employees = UserEmploye::where('type', '>', 0)->get();
        $totalExpense = InstitutePengeluaran::where('id_inst', $id)->sum('cost');


        $tprog = InstituteTugas::where('id_inst', $project->id)->count();
        $cprog = InstituteTugas::where('id_inst', $project->id)->where('status', 3)->count();
        $prog = $tprog > 0 ? ($cprog / $tprog) * 100 : 0;
        $prog = $prog > 0 ? number_format($prog, 2) : $prog;


        $status = $stat[$project->status];
        $project->status_label = $status;
        $project->progress = $prog;
        $paymentStatus = $pay[$project->payment];
        $project->payment_label = $paymentStatus;

        $end_date = $project->end_date;


        // Ambil pengguna terkait setiap tugas secara terpisah
        foreach ($tasks as $task) {
            $task->user = UserEmploye::findOrFail($task->user_id);
        }
        foreach ($activities as $activiti) {
            $activiti->user = UserEmploye::findOrFail($activiti->user_id);
        }

        $data = compact('end_date', 'project', 'tasks', 'activities', 'progress', 'manager', 'totalExpense', 'employees', 'subjectOptions');

        // return $data;
        return view('perusahaan.detail_proyek', ['id' => $id], compact('project', 'end_date', 'project', 'tasks', 'activities', 'progress', 'manager', 'totalExpense', 'employees', 'subjectOptions', 'mitra', 'paket_tag'));
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
    public function show(InstituteProyek $instituteProyek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InstituteProyek $instituteProyek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InstituteProyek $instituteProyek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstituteProyek $instituteProyek)
    {
        //
    }
}
