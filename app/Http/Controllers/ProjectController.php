<?php

namespace App\Http\Controllers;

use App\Models\ProjectList;
use App\Models\TaskLists;
use App\Models\User;
use App\Models\UserEmploye;
use App\Models\UserProductivity;
use Illuminate\Http\Request;

class ProjectController extends Controller
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

        if (isset($request->status)) {
            $projects = ProjectList::where('status', $request->status)->orderByDesc('end_date')->get();
        } else {
            $projects = ProjectList::whereYear('end_date', date('Y'))->orderByDesc('end_date')->get();
        }

        foreach ($projects as $project) {
            $tprog = TaskLists::where('project_id', $project->id)->count();
            $cprog = TaskLists::where('project_id', $project->id)->where('status', 3)->count();
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

        return view('project.lists', compact('i', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function inputprojek()
    {
        $employees = UserEmploye::where('type', '>', 0)->orderBy('firstname')->get();
        $managers = UserEmploye::where('type', 1)->orderBy('firstname')->get();
        return view('project.add', [
            'employees' => $employees,
            'managers' => $managers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'po_number' => 'nullable|string|max:255',
            'manager_id' => 'nullable|integer',
            'invoice' => 'nullable|string|max:255',
            'invoice_date' => 'nullable|date',
            'pembayaran' => 'nullable|string|max:255',
            'vendor' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'user_ids' => 'nullable|array',
            'user_ids.*' => 'integer',
            'payment_status' => 'nullable|integer',
            'status' => 'nullable|integer',
            'fakturpajak' => 'nullable|string|max:255',
            'fp_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $userIds = $request->input('user_ids');
        $userIdsString = implode(',', $userIds); // Mengonversi array menjadi string

        // Buat objek Project baru
        $project = new ProjectList([
            'name' => $request->input('name'),
            'po_number' => $request->input('po_number'),
            'manager_id' => $request->input('manager_id'),
            'user_ids' => $userIdsString,
            'invoice' => $request->input('invoice'),
            'inv_date' => $request->input('invoice_date'),
            'pembayaran' => $request->input('pembayaran'),
            'vendor' => $request->input('vendor'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'payment_status' => $request->input('payment_status'),
            'status' => $request->input('status'),
            'fakturpajak' => $request->input('fakturpajak'),
            'fp_date' => $request->input('fp_date'),
            'description' => $request->input('description'),
        ]);

        // Simpan proyek
        $project->save();

        // Redirect ke halaman yang sesuai atau beri respons JSON
        return redirect()->route('project.store')->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $i = 1;
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];
        $tag = ["", "PT. PLN (PERSERO)", "PT. INDONESIA COMNET PLUS", "TELKOM AKSES", "RSWS/PEMDA/LAIN2"];
        $vendor_tag = ["", "PT. VISDAT TEKNIK UTAMA", "PT. CORDOVA BERKAH NUSATAMA", "CV. VISDAT TEKNIK UTAMA", "CV. VISUAL DATA KOMPUTER"];
        $subjectOptions = ["Biaya Operasional", "Biaya Material", "Biaya Tools", "Biaya Gaji/Fee", "Biaya Lainnya"];


        $project = ProjectList::findOrFail($id);
        $tasks = TaskLists::where('project_id', $id)->orderBy('id', 'asc')->get();
        $activities = UserProductivity::where('project_id', $id)->orderBy('date', 'desc')->get();

        $totalTasks = $tasks->count();
        $completedTasks = $tasks->where('status', 3)->count();
        $progress = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;

        $manager = UserEmploye::findOrFail($project->manager_id);
        $employees = UserEmploye::where('type', '>', 0)->get();
        $totalExpense = UserProductivity::where('project_id', $id)->sum('cost');

        $tprog = TaskLists::where('project_id', $project->id)->count();
        $cprog = TaskLists::where('project_id', $project->id)->where('status', 3)->count();
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
            $task->user = UserEmploye::findOrFail($task->user_id);
        }
        foreach ($activities as $activiti) {
            $activiti->user = UserEmploye::findOrFail($activiti->user_id);
        }

        $data = compact('end_date', 'project', 'tasks', 'activities', 'progress', 'manager', 'totalExpense', 'employees', 'subjectOptions');

        // return $data;
        return view('project.detail', compact('end_date', 'project', 'tasks', 'activities', 'progress', 'manager', 'totalExpense', 'employees', 'subjectOptions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = ProjectList::findOrFail($id);
        $managers = UserEmploye::where('type', 1)->orderBy('username')->get();
        $employees = UserEmploye::where('type', 2)->orderBy('username')->get();

        return view('project.edit', compact('project', 'managers', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $project = ProjectList::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'po_number' => 'nullable|string|max:255',
            'manager_id' => 'nullable|integer',
            'invoice' => 'nullable|string|max:255',
            'invoice_date' => 'nullable|date',
            'pembayaran' => 'nullable|string|max:255',
            'vendor' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'user_ids' => 'nullable|array',
            'user_ids.*' => 'integer',
            'payment_status' => 'nullable|integer',
            'status' => 'nullable|integer',
            'fakturpajak' => 'nullable|string|max:255',
            'fp_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        // Mengonversi array user_ids menjadi string
        $userIds = $request->input('user_ids');
        $userIdsString = implode(',', $userIds);

        // Update atribut proyek yang ada
        $project->update([
            'name' => $request->input('name'),
            'po_number' => $request->input('po_number'),
            'manager_id' => $request->input('manager_id'),
            'user_ids' => $userIdsString,
            'invoice' => $request->input('invoice'),
            'invoice_date' => $request->input('invoice_date'),
            'pembayaran' => $request->input('pembayaran'),
            'vendor' => $request->input('vendor'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'payment_status' => $request->input('payment_status'),
            'status' => $request->input('status'),
            'fakturpajak' => $request->input('fakturpajak'),
            'fp_date' => $request->input('fp_date'),
            'description' => $request->input('description'),
        ]);

        // Redirect ke halaman yang sesuai atau beri respons JSON
        return redirect()->route('project.lists')->with('success', 'Project updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = ProjectList::findOrFail($id);

        // Hapus proyek
        $project->delete();

        // Redirect ke halaman yang sesuai atau beri respons JSON
        return redirect()->route('project.lists')->with('success', 'Project deleted successfully!');
    }
}
