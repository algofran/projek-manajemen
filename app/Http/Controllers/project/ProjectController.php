<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Models\ProjectAktivitis;
use App\Models\ProjectList;
use App\Models\ProjectTask;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function menu()
    {
        return view('project.menu');
    }

    public function index(Request $request)
    {
        $i = 1;
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];
        $tag = ["", "PT. PLN (PERSERO)", "PT. INDONESIA COMNET PLUS", "TELKOM AKSES", "RSWS/PEMDA/LAIN2"];
        $vendor_tag = ["", "PT. VISDAT TEKNIK UTAMA", "PT. CORDOVA BERKAH NUSATAMA", "CV. VISDAT TEKNIK UTAMA", "CV. VISUAL DATA KOMPUTER"];

        $managers = User::where('type', 2)->orderBy('firstname')->get();

        $status = $request->query('status');

        if ($status) {
            $projects = ProjectList::where('status', $status)
                ->orderByDesc('end_date')
                ->get();
        } else {
            $projects = ProjectList::orderByDesc('end_date')->get();
            $status = 'null';
        }


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

        return view('project.lists', compact('i', 'projects', 'managers', 'status'));
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
    public function show($id)
    {
        $i = 1;
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];
        $tag = ["", "PT. PLN (PERSERO)", "PT. INDONESIA COMNET PLUS", "TELKOM AKSES", "RSWS/PEMDA/LAIN2"];
        $vendor_tag = ["", "PT. VISDAT TEKNIK UTAMA", "PT. CORDOVA BERKAH NUSATAMA", "CV. VISDAT TEKNIK UTAMA", "CV. VISUAL DATA KOMPUTER"];
        $subjectOptions = ["Biaya Operasional", "Biaya Material", "Biaya Tools", "Biaya Gaji/Fee", "Biaya Lainnya"];
        $project = ProjectList::findOrFail($id);
        $tasks = ProjectTask::where('project_id', $id)->orderBy('id', 'asc')->get();
        $activities = ProjectAktivitis::where('project_id', $id)->orderBy('date', 'desc')->get();

        $totalTasks = $tasks->count();
        $completedTasks = $tasks->where('status', 3)->count();
        $progress = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;

        $manager = User::findOrFail($project->user_id);
        $employees = User::where('type', '>', 0)->get();
        $totalExpense = ProjectAktivitis::where('project_id', $id)->sum('cost');

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
        $end_date = $project->end_date;

        // Ambil pengguna terkait setiap tugas secara terpisah
        foreach ($tasks as $task) {
            $task->user = User::findOrFail($task->user_id);
        }
        foreach ($activities as $activiti) {
            $activiti->user = User::findOrFail($activiti->user_id);
        }

        // return $data;
        return view('project.detail', compact('end_date', 'project', 'tasks', 'activities', 'progress', 'manager', 'totalExpense', 'employees', 'subjectOptions'));
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
