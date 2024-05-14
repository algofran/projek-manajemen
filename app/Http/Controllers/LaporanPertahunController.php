<?php

namespace App\Http\Controllers;

use App\Models\DokumenTahun;
use App\Models\ListDokumen;
use App\Models\ProjectList;
use App\Models\TaskLists;
use App\Models\UserEmploye;
use Illuminate\Http\Request;

class LaporanPertahunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $i = 1;

        $employees = UserEmploye::orderBy('firstname')->get();
        $projects = ProjectList::orderBy('created_at')->get();
        $dokumen = DokumenTahun::orderBy('id')->get();

        $laporantahun = ListDokumen::orderBy('created_at')->get();
        return view('project.list_tahunan', compact('projects', 'dokumen', 'laporantahun', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $projek = new ListDokumen([
            'user_id' => $request->input('user_id'),
            'deskripsi' => $request->input('deskripsi'),
            'tahun' => $request->input('tahun'),
        ]);
        $projek->save();


        return redirect()->back()->with('success', 'projek dokumen list tahun created successfully!');
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
        $file->move(public_path('PDF_project'), $nama_file);


        $upload = new DokumenTahun();

        $upload->id_dokumen      = $request->input('id_dokumen');
        $upload->file_path       = $nama_file;
        $upload->license = $request->input('license');

        //menyimpan data ke database
        $upload->save();

        return back();
    }

    public function download($id)
    {
        // Cari dokumen berdasarkan id dokumen
        $dokumen = DokumenTahun::findOrFail($id);

        // Path lengkap ke file
        $file_path = public_path('PDF_project/') . $dokumen->file_path;

        // Pastikan file ada
        if (file_exists($file_path)) {
            // Download file
            return response()->download($file_path);
        } else {
            // File tidak ditemukan
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
        // Cari dokumen berdasarkan id dokumen
        $hapus = DokumenTahun::findOrfail($id);

        $file = public_path('/PDF_project/') . $hapus->file_path;

        // Pastikan dokumen ada
        if (file_exists($file)) {

            @unlink($file);
        }
        $hapus->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
    }
}
