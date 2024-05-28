<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use App\Models\InstituteList;
use App\Models\InstituteMitra;
use Illuminate\Http\Request;

class InstituteDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $i = 1;
        $perusahaan = InstituteList::orderBy('id')->get();
        $mitra = InstituteMitra::orderBy('mitra')->get();
        $name = $request->input('name');
        $institute = $request->input('institute');
        $alamat = $request->input('alamat');
        $keterangan = $request->input('keterangan');
        $id_inst = $request->input('id_inst');
        $mitras = $request->input('mitra');


        return view('perusahaan.list_perusahaan', compact('perusahaan', 'i', 'mitra', 'name', 'institute', 'alamat', 'keterangan', 'id_inst', 'mitras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


        $institute = new InstituteMitra([
            'id_inst' => $request->input('id_inst'),
            'mitra' => $request->input('mitra'),
            'keterangan' => $request->input('keterangan'),
        ]);

        $institute->save();

        return redirect()->back()->with('success', 'Institute created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'institute' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required|max:255',

        ]);

        $institute = new InstituteList([
            'name' => $request->input('name'),
            'institute' => $request->input('institute'),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
        ]);

        $institute->save();

        return redirect()->back()->with('success', 'Institute created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(InstituteList $instituteData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

        $institute = InstituteMitra::findOrFail($id);
        $institute->update([
            'id_inst' => $request->input('id_inst'),
            'mitra' => $request->input('mitra'),
            'keterangan' => $request->input('keterangan'),
        ]);

        return redirect()->back()->with('success', 'Institute berhasil diperbarui!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'institute' => 'required',
            'alamat' => 'required',
            'keterangan' => 'required|max:255',
        ]);

        $institute = InstituteList::findOrFail($id);
        $institute->update([
            'name' => $request->input('name'),
            'institute' => $request->input('institute'),
            'alamat' => $request->input('alamat'),
            'keterangan' => $request->input('keterangan'),
        ]);

        return redirect()->back()->with('success', 'Institute berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = InstituteList::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'institute delete successfully!');
    }

    public function hapus(string $id)
    {
        $task = InstituteMitra::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Mitra delete successfully!');
    }
}
