<?php

namespace App\Http\Controllers;

use App\Models\InstitutePengeluaran;
use App\Models\InstituteProyek;
use App\Models\UserEmploye;
use Illuminate\Http\Request;

class InstitutePengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $project_id = InstituteProyek::findOrFail($id);
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        $employees = UserEmploye::where('type', '>', 0)->get();
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
        $pengeluaran->id_inst = $request->input('project_id');
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
    public function show(InstitutePengeluaran $institutePengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InstitutePengeluaran $institutePengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InstitutePengeluaran $institutePengeluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InstitutePengeluaran $institutePengeluaran)
    {
        //
    }
}
