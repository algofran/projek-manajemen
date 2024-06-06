<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProjectListRequest;
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
        $stat = ["", "Pending", "On-Progress", "Finish"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];
        $tag = ["", "PT. PLN (PERSERO)", "PT. INDONESIA COMNET PLUS", "TELKOM AKSES", "RSWS/PEMDA/LAIN2"];
        $vendor_tag = ["", "PT. VISDAT TEKNIK UTAMA", "PT. CORDOVA BERKAH NUSATAMA", "CV. VISDAT TEKNIK UTAMA", "CV. VISUAL DATA KOMPUTER"];

        $managers = User::where('type', 1)->orderBy('firstname')->get();

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
     * Display the specified resource.
     */
    public function show($id)
    {
        $i = 1;
        $stat = ["", "Pending", "On-Progress", "Finish"];
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

    public function inputprojek()
    {
        $employees = User::where('type', '>', 0)->orderBy('firstname')->get();
        $managers = User::where('type', 1)->orderBy('firstname')->get();
        return view('project.add', [
            'employees' => $employees,
            'managers' => $managers,
        ]);
    }

    public function store(AddProjectListRequest $request)
    {
        // Mengambil data yang telah diverifikasi
        $validatedData = $request->validated();

        // Mengonversi array user_ids menjadi string
        $userIds = $request->input('user_ids');
        $userIdsString = is_array($userIds) ? implode(',', $userIds) : null; // Mengonversi array menjadi string

        // Buat objek Project baru
        $project = new ProjectList([
            'name' => $validatedData['name'],
            'po_number' => $validatedData['po_number'],
            'user_id' => $validatedData['user_id'],
            'user_ids' => $userIdsString,
            'invoice' => $validatedData['invoice'],
            'inv_date' => $validatedData['invoice_date'],
            'pembayaran' => $validatedData['pembayaran'],
            'vendor' => $validatedData['vendor'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'payment_status' => $validatedData['payment_status'],
            'payment' => $validatedData['payment'],
            'bank' => $validatedData['bank'],
            'status' => $validatedData['status'],
            'fakturpajak' => $validatedData['fakturpajak'],
            'fp_date' => $validatedData['fp_date'],
            'description' => $validatedData['description'],
        ]);

        // Simpan proyek
        $project->save();

        // Redirect ke halaman yang sesuai atau beri respons JSON
        return redirect()->route('project.lists')->with('success', 'Project created successfully!');
    }



    public function edit($id)
    {
        $project = ProjectList::findOrFail($id);
        $managers = User::where('type', 1)->orderBy('username')->get();
        $employees = User::where('type', 2)->orderBy('username')->get();

        return view('project.edit', compact('project', 'managers', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddProjectListRequest $request, $id)
    {

        $data = ProjectList::findOrFail($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Proyek tidak ditemukan');
        }

        // Mengonversi array user_ids menjadi string
        $userIds = $request->input('user_ids');
        $userIdsString = implode(',', $userIds);

        // Update atribut proyek yang ada
        $data->update([
            'name' => $request->input('name'),
            'po_number' => $request->input('po_number'),
            'user_id' => $request->input('user_id'),
            'user_ids' => $userIdsString,
            'invoice' => $request->input('invoice'),
            'invoice_date' => $request->input('invoice_date'),
            'pembayaran' => $request->input('pembayaran'),
            'vendor' => $request->input('vendor'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'payment_status' => $request->input('payment_status'),
            'payment' => $request->input('payment'),
            'bank' => $request->input('bank'),
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
