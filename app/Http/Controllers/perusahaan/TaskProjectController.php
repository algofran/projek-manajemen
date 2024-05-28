<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use App\Models\InstituteProyeks;
use App\Models\InstituteTask;
use App\Models\User;
use Illuminate\Http\Request;

class TaskProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $project_id = InstituteProyeks::findOrFail($id);
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        $employees = User::where('type', '>', 0)->get();
        return view('perusahaan.add_task', compact('stat', 'employees', 'project_id'));
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
            'task' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'date_created' => 'required|date',
            'due_date' => 'required|date',
            'status' => 'required'
        ]);

        $task = new InstituteTask([
            'project_id' => $request->input('project_id'),
            'task' => $request->input('task'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'date_created' => $request->input('date_created'),
            'due_date' => $request->input('due_date'),
            'user_id' => $request->input('user_id'),
        ]);

        $task->save();

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
        $request->validate([
            'task' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'date_created' => 'required|date',
            'due_date' => 'required|date',
            'status' => 'required'
        ]);

        $iconnet = InstituteTask::findOrFail($id);
        $iconnet->update([
            'project_id' => $request->input('project_id'),
            'task' => $request->input('task'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'date_created' => $request->input('date_created'),
            'due_date' => $request->input('due_date'),
            'user_id' => $request->input('user_id'),
        ]);

        return redirect()->back()->with('success', 'Tugas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = InstituteTask::findOrFail($id);

        // Hapus proyek
        $task->delete();

        // Redirect ke halaman yang sesuai atau beri respons JSON
        return redirect()->back()->with('success', 'Task delete successfully!');
    }
}
