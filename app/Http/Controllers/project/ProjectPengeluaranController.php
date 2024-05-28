<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
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
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
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
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|numeric',
            'subject' => 'required|string',
            'user_id' => 'required|numeric',
            'date' => 'required|date',
            'cost' => 'required|numeric',
            'comment' => 'required|string',
        ]);

        $pengeluaran = new ProjectAktivitis();
        $pengeluaran->project_id = $request->input('project_id');
        $pengeluaran->subject = $request->input('subject');
        $pengeluaran->user_id = $request->input('user_id');
        $pengeluaran->date = $request->input('date');
        $pengeluaran->cost = $request->input('cost');
        $pengeluaran->comment = $request->input('comment');
        $pengeluaran->save();

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
    public function update(Request $request, $id)
    {
        //dd($request);

        // Jika validasi gagal, kembali ke form dengan pesan kesalahan
        $pengeluaran = ProjectAktivitis::findOrFail($id);

        $pengeluaran->update([
            'project_id' => $request->input('project_id'),
            'comment' => $request->input('comment'),
            'subject' => $request->input('subject'),
            'user_id' => $request->input('user_id'),
            'date' => $request->input('date'),
            'cost' => $request->input('cost'),
        ]);
        return redirect()->back()->with('success', 'Pengeluaran berhasil diperbarui!');
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
