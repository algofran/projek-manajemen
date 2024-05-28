<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|numeric',
            'subject' => 'required|string',
            'user_id' => 'required|numeric',
            'date' => 'required|dat e',
            'cost' => 'required|numeric',
            'comment' => 'required|string',
        ]);

        $pengeluaran = new InstitutePengeluaran();
        $pengeluaran->project_id = $request->input('project_id');
        $pengeluaran->subject = $request->input('subject');
        $pengeluaran->user_id = $request->input('user_id');
        $pengeluaran->date = $request->input('date');
        $pengeluaran->cost = $request->input('cost');
        $pengeluaran->comment = $request->input('comment');
        $pengeluaran->save();

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
    public function update(Request $request, $id)
    {

        $iconnet = InstitutePengeluaran::findOrFail($id);
        $iconnet->update([
            'project_id' => $request->input('project_id'),
            'subject' => $request->input('subject'),
            'user_id' => $request->input('user_id'),
            'date' => $request->input('date'),
            'cost' => $request->input('cost'),
            'comment' => $request->input('comment'),
        ]);

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
