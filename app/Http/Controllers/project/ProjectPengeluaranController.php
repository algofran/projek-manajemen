<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProjectPengeluranRequest;
use App\Models\ProjectAktivitis;
use App\Models\ProjectList;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $project_id = ProjectList::findOrFail($id);
        $stat = ["", "Pending", "On-Progress", "Finish"];
        $employees = User::where('type', '>', 0)->get();
        return view('project.pengeluaran', compact('stat', 'employees', 'project_id'));
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
    public function store(AddProjectPengeluranRequest $request)
    {

        $validatedData = $request->validated();
        ProjectAktivitis::create($validatedData);

        return redirect()->route('project.detail.show', ['id' => $request->input('project_id')])->with('success', 'Pengeluaran created successfully!');
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
    public function update(AddProjectPengeluranRequest $request, $id)
    {
        $data = ProjectAktivitis::findOrFail($id);

        if (!$data) {
            return redirect()->back()->with('error', 'Proyek tidak ditemukan');
        }
        $validatedData = $request->validated();
        $data->update($validatedData);

        return redirect()->back()->with('success_pengeluaran', 'Pengeluaran berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = ProjectAktivitis::findOrFail($id);

        // Hapus proyek
        $task->delete();

        // Redirect ke halaman yang sesuai atau beri respons JSON
        return redirect()->back()->with('success', 'Pengeluaran delete successfully!');
    }
}
