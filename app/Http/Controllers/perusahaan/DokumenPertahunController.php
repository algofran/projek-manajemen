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
use Illuminate\Support\Facades\File;

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

        // Create folder based on year
        $tahun = $validatedData['tahun'];
        $folderPath = public_path("PDF{$tahun}");
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true);
        }

        InstituteTahun::create($validatedData);

        return redirect()->back()->with('success', 'Tahun baru berhasil ditambahkan!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddDokumenIntituteRequest $request)
    {

        $file = $request->file('file_path');
        $nama_file = $file->getClientOriginalName();

        // Ambil tahun dari dokumen terkait
        $id_dokumen = $request->input('id_dokumen');
        $dokumen = InstituteTahun::findOrFail($id_dokumen);
        $tahun = $dokumen->tahun;

        // Tentukan folder berdasarkan tahun
        $path = public_path("PDF/{$tahun}");

        // Pindahkan file ke folder tujuan
        $file->move($path, $nama_file);

        // Simpan informasi file ke database
        $upload = new InstituteDokumen();
        $upload->id_dokumen = $id_dokumen;
        $upload->file_path = "{$tahun}/{$nama_file}";
        $upload->license = $request->input('license');

        $upload->save();

        return back()->with('success', 'Dokumen berhasil diunggah.');
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

    public function destroy(string $id)
    {
        $hapus = InstituteDokumen::findOrFail($id);
        $file = public_path("PDF/{$hapus->file_path}");

        if (file_exists($file)) {
            @unlink($file);
        }
        $hapus->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
    }
}
