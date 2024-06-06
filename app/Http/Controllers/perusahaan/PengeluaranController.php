<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddMitraPengeluaranRequest;
use App\Models\InstitutePengeluaran;
use App\Models\InstituteProyeks;
use App\Models\User;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $project_id = InstituteProyeks::findOrFail($id);
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        $employees = User::where('type', '>', 0)->get();
        return view('perusahaan.add_pengeluaran', compact('stat', 'employees', 'project_id'));
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
    public function store(AddMitraPengeluaranRequest $request)
    {
        $validatedData = $request->validated();
        InstitutePengeluaran::create($validatedData);

        return redirect()->route('_detail.proyek', ['id' => $request->input('project_id')])->with('success', 'Task created successfully!');
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
    public function update(AddMitraPengeluaranRequest $request, $id)
    {

        $data = InstitutePengeluaran::findOrFail($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Proyek tidak ditemukan');
        }
        $validatedData = $request->validated();
        $data->update($validatedData);

        return redirect()->back()->with('success', 'Pengeluaran berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = InstitutePengeluaran::findOrFail($id);

        $project->delete();

        return redirect()->back()->with('success', 'Pengeluaran deleted successfully!');
    }
}
