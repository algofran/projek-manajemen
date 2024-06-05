<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMitraProjekRequest;
use App\Http\Requests\AddMitraRequest;
use App\Models\InstituteMitra;
use App\Models\InstitutePengeluaran;
use App\Models\InstituteProyeks;
use App\Models\InstituteTask;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InstituteProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $perusahaan = InstituteMitra::where('id_inst', $id)->orderBy('id', 'asc')->get();;
        return view('perusahaan.menu_perusahaan', compact('perusahaan'));
    }

    public function show(string $id, string $name)
    {
        $mitra = InstituteMitra::where('id', $id)->orderBy('id', 'asc')->get();
        return view('perusahaan.menu_mitra', compact('mitra'));
    }

    public function list(string $id, Request $request)
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

        $paket = $request->input('paket');
        $periode = $request->input('periode');
        $sektor = $request->input('sektor');
        $PA = $request->input('PA');
        $tagihan = $request->input('tagihan');
        $keterangan = $request->input('keterangan');
        $status = $request->input('status');
        $payment = $request->input('payment');
        $managers = User::where('type', 1)->orderBy('firstname')->get();
        $mitra = InstituteMitra::findOrFail($id);


        if ($request->has('tahun')) {
            $proyeks = InstituteProyeks::where('periode', 'like', '%' . date('Y'))->orderBy('id', 'desc')->get();
        } else {
            $proyeks = InstituteProyeks::where('id_inst', $id)
                ->orderBy('id', 'desc')
                ->get();

            $list_proyeks = InstituteMitra::where('id_inst', $id)->orderBy('id', 'asc')->get();
            return view('perusahaan.list_proyek', compact('list_proyeks', 'i', 'stat', 'pay', 'proyeks', 'paket', 'periode', 'sektor', 'PA', 'tagihan', 'status', 'payment', 'managers', 'paket_tag', 'keterangan', 'mitra'));
        }
    }

    public function detail(string $id)
    {
        $i = 1;
        $stat = ["Pending", "On-Progress", "Complete"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];
        $tag = ["", "PT. PLN (PERSERO)", "PT. INDONESIA COMNET PLUS", "TELKOM AKSES", "RSWS/PEMDA/LAIN2"];
        $vendor_tag = ["", "PT. VISDAT TEKNIK UTAMA", "PT. CORDOVA BERKAH NUSATAMA", "CV. VISDAT TEKNIK UTAMA", "CV. VISUAL DATA KOMPUTER"];
        $subjectOptions = ["Biaya Operasional", "Biaya Material", "Biaya Tools", "Biaya Gaji", "Biaya Lainnya"];

        $project = InstituteProyeks::findOrFail($id);
        $project_id = $project->project_id;
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
        $mitra = InstituteMitra::where('id', $project_id)->pluck('mitra')->first();
        $activities = InstitutePengeluaran::where('project_id', $id)->orderBy('date', 'desc')->get();

        $project = InstituteProyeks::findOrFail($id);
        $tasks = InstituteTask::where('project_id', $id)->orderBy('id', 'asc')->get();
        $totalTasks = $tasks->count();
        $completedTasks = $tasks->where('status', 3)->count();
        $progress = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;

        $manager = User::findOrFail($project->manager_id);
        $employees = User::where('type', '>', 0)->get();
        $totalExpense = InstitutePengeluaran::where('project_id', $id)->sum('cost');

        $tprog = InstituteTask::where('project_id', $project->id)->count();
        $cprog = InstituteTask::where('project_id', $project->id)->where('status', 3)->count();
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
            $task->user = User::findOrFail($task->user_id);
        }
        foreach ($activities as $activiti) {
            $activiti->user = User::findOrFail($activiti->user_id);
        }

        $data = compact('end_date', 'project', 'tasks', 'activities', 'progress', 'manager', 'totalExpense', 'employees', 'subjectOptions');

        // return $data;
        return view('perusahaan.detail_proyek', ['id' => $id], compact('project', 'end_date', 'project', 'tasks', 'activities', 'progress', 'manager', 'totalExpense', 'employees', 'subjectOptions', 'mitra', 'paket_tag'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $mitra = InstituteMitra::findOrFail($id);
        $managers = User::where('type', 1)->orderBy('firstname')->get();

        return view('perusahaan.tambah_proyek', compact('mitra', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddMitraProjekRequest $request)
    {
        $validatedData = $request->validated();
        $data = InstituteProyeks::create($validatedData);

        if ($data->save()) {
            return redirect()->route('list.proyeks', ['id' => $request->input('id_inst')])->with('success', 'proyek berhasil dibuat!');
        } else {
            return redirect()->back()->with('error', 'Gagal Membuat Proyek');
        }
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
    public function update(AddMitraProjekRequest $request, $id)
    {
        $data = InstituteProyeks::findOrFail($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Proyek tidak ditemukan');
        }
        $validatedData = $request->validated();
        $data->update($validatedData);


        if ($data->update()) {
            return redirect()->route('list.proyeks', ['id' => $request->input('id_inst')])->with('success', 'proyek berhasil di Edit!');
        } else {
            $errorMessage = 'Gagal. Silakan coba lagi.';
            return redirect()->route('list.proyek')->with('error', $errorMessage)->withInput($request->except('password', 'password_confirmation'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = InstituteProyeks::findOrFail($id);

        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully!');
    }
}
