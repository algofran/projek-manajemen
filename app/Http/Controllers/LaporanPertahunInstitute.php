<?php

namespace App\Http\Controllers;

use App\Models\InstituteProyek;
use App\Models\InstituteTahun;
use App\Models\InstituteTugas;
use App\Models\MitraIntitute;
use App\Models\TaskLists;
use App\Models\UserEmploye;
use Illuminate\Http\Request;

class LaporanPertahunInstitute extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $i = 1;
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];
        $employees = UserEmploye::where('type', '>', 0)->get();
        $mitra = MitraIntitute::findOrFail($id);
        $projek = InstituteProyek::where('id_inst', $id)
            ->orderBy('id', 'desc')
            ->get();
        $paket = [
            "",
            "Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 1 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Konawe - Serpo SBU Sulawesi & IBT 2022-2025"
        ];


        return view('perusahaan.list_tahunan_perusahaan', compact('mitra', 'employees', 'paket', 'projek'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        // dd($request);
        $institute = new InstituteTahun([
            'id_inst' => $request->input('id_inst'),
            'user_id' => $request->input('user_id'),
            'deskripsi' => $request->input('deskripsi'),
            'tahun' => $request->input('tahun'),
        ]);
        $institute->save();


        return redirect()->back()->with('success', 'Institute created successfully!');
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
