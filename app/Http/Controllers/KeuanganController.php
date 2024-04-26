<?php

namespace App\Http\Controllers;

use App\Models\InstitutePengeluaran;
use App\Models\InstituteProyek;
use App\Models\InstituteTugas;
use App\Models\UserEmploye;
use Illuminate\Http\Request;

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
        if ($type) {
            $tasks = InstitutePengeluaran::where('id_inst', $project->id)
                ->where('subject', $type)
                ->orderBy('date', 'asc')
                ->get();
        } else {
            $tasks = InstitutePengeluaran::where('id_inst', $project->id)
                ->orderBy('date', 'asc')
                ->get();
        }
        return view('perusahaan.detail_keuangan', compact('project', 'manager', 'tasks'));
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
