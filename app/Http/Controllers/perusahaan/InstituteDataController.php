<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMitraRequest;
use App\Http\Requests\AddPerusahaanRequest;
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

        return view('perusahaan.list_perusahaan', compact('perusahaan', 'i', 'mitra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(AddMitraRequest $request)
    {
        $validatedData = $request->validated();
        InstituteMitra::create($validatedData);

        return redirect()->back()->with('success', 'Institute created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddPerusahaanRequest $request)
    {
        $validatedData = $request->validated();
        InstituteList::create($validatedData);

        return redirect()->back()->with('success', 'Institute created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(InstituteList $instituteData)
    {
        //
    }

    public function edit(AddMitraRequest $request, $id)
    {
        $data = InstituteMitra::findOrFail($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Proyek tidak ditemukan');
        }
        $validatedData = $request->validated();
        $data->update($validatedData);

        return redirect()->back()->with('success', 'Institute berhasil diperbarui!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddPerusahaanRequest $request, $id)
    {
        $data = InstituteList::findOrFail($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Proyek tidak ditemukan');
        }
        $validatedData = $request->validated();
        $data->update($validatedData);

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
