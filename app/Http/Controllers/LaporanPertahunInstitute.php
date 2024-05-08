<?php

namespace App\Http\Controllers;

use App\Models\InstituteDokumen;
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
        $dokumen = InstituteDokumen::where('id_inst', $id)->orderBy('id')->get();
        $paket = [
            "",
            "Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 1 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Konawe - Serpo SBU Sulawesi & IBT 2022-2025"
        ];
        $laporantahun = InstituteTahun::where('id_inst', $id)->orderBy('created_at')->get();
        // dd($laporantahun);


        return view('perusahaan.list_tahunan_perusahaan', compact('mitra', 'employees', 'paket', 'projek', 'laporantahun', 'dokumen'));
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

        $file           = $request->file('file_path');

        //mengambil nama file
        $nama_file      = $file->getClientOriginalName();

        //memindahkan file ke folder tujuan
        $file->move(public_path('PDF'), $nama_file);


        $upload = new InstituteDokumen();

        $upload->id_inst       = $request->input('id_inst');
        $upload->id_dokumen      = $request->input('id_dokumen');
        $upload->file_path       = $nama_file;
        $upload->license = $request->input('license');

        //menyimpan data ke database
        $upload->save();

        return back();
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
