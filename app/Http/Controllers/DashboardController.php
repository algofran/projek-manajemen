<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\InstituteProyek;
use App\Models\ProjectList;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalprojek = ProjectList::count() + InstituteProyek::count();
        $pending = ProjectList::where('status', 0)->count() + InstituteProyek::where('status', 0)->count();
        $onprogress = ProjectList::where('status', 1)->count() + InstituteProyek::where('status', 1)->count();
        $finish = ProjectList::where('status', 2)->count() + InstituteProyek::where('status', 2)->count();

        return view('dashboard', compact('totalprojek', 'pending', 'onprogress', 'finish'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
