<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddDokumenIntituteRequest;
use App\Http\Requests\AddLaporanInstituteRequest;
use App\Models\InstituteDokumen;
use App\Models\InstituteMitra;
use App\Models\InstituteProyeks;
use App\Models\InstituteTahun;
use App\Models\User;
use Illuminate\Http\Request;

class DokumenPertahunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $i = 1;

        $employees = User::where('type', '>', 0)->get();
        $mitra = InstituteMitra::findOrFail($id);
        $tahun = $request->query('tahun');
        $projek = InstituteProyeks::where('id_inst', $id)
            ->orderBy('id', 'desc')
            ->get();
        $dokumen = InstituteDokumen::orderBy('id')->get();
        $paket = [
            "",
            "Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 1 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Konawe - Serpo SBU Sulawesi & IBT 2022-2025"
        ];
        // dd($laporantahun);

        if ($tahun) {
            $laporantahun = InstituteTahun::where('id_inst', $id)->where('tahun', $tahun)
                ->orderBy('created_at')
                ->get();
        } else {
            $laporantahun = InstituteTahun::where('id_inst', $id)->orderBy('created_at')->get();
            $tahun = 'null';
        }
        $listtahun = InstituteTahun::all();


        return view('perusahaan.list_tahunan_perusahaan', compact('mitra', 'employees', 'paket', 'projek', 'laporantahun', 'dokumen', 'tahun', 'listtahun'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(AddLaporanInstituteRequest $request)
    {

        $validatedData = $request->validated();
        InstituteTahun::create($validatedData);

        return redirect()->back()->with('success', 'Institute created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddDokumenIntituteRequest $request)
    {
        $file           = $request->file('file_path');
        $nama_file      = $file->getClientOriginalName();
        $file->move(public_path('PDF'), $nama_file);

        $upload = new InstituteDokumen();

        $upload->id_dokumen      = $request->input('id_dokumen');
        $upload->file_path       = $nama_file;
        $upload->license = $request->input('license');
        $upload->save();

        return back();
    }

    public function download($id)
    {
        $dokumen = InstituteDokumen::findOrFail($id);
        $file_path = public_path('PDF/') . $dokumen->file_path;

        if (file_exists($file_path)) {
            return response()->download($file_path);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
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
        $hapus = InstituteDokumen::findOrfail($id);
        $file = public_path('/PDF/') . $hapus->file_path;

        if (file_exists($file)) {
            @unlink($file);
        }
        $hapus->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
    }
}
