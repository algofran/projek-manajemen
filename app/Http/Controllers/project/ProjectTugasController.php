<?php

namespace App\Http\Controllers\project;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProjectTaskRequest;
use App\Models\ProjectList;
use App\Models\ProjectTask;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {
        $project_id = ProjectList::findOrFail($id);
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        $employees = User::where('type', '>', 0)->get();
        return view('project.task', compact('stat', 'employees', 'project_id'));
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
    public function store(AddProjectTaskRequest $request)
    {
        $validatedData = $request->validated();
        ProjectTask::create($validatedData);

        return redirect()->route('project.detail.show', ['id' => $request->input('project_id')])->with('success', 'Task created successfully!');
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

        $iconnet = ProjectTask::findOrFail($id);
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
        $task = ProjectTask::findOrFail($id);

        // Hapus proyek
        $task->delete();

        // Redirect ke halaman yang sesuai atau beri respons JSON
        return redirect()->back()->with('success', 'Task delete successfully!');
    }
}
