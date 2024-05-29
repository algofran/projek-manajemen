<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\InstituteProyeks;
use App\Models\ProjectList;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalprojek = ProjectList::count() + InstituteProyeks::count();
        $pending = ProjectList::where('status', 0)->count() + InstituteProyeks::where('status', 0)->count();
        $onprogress = ProjectList::where('status', 1)->count() + InstituteProyeks::where('status', 1)->count();
        $finish = ProjectList::where('status', 2)->count() + InstituteProyeks::where('status', 2)->count();

        return view('admin.home', compact('totalprojek', 'pending', 'onprogress', 'finish'));
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
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
