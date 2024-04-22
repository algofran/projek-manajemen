<?php

namespace App\Http\Controllers;

use App\Models\InstitutePengeluaran;
use App\Models\UserEmploye;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $project_id = InstitutePengeluaran::findOrFail($id);
        // $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        // $employees = UserEmploye::where('type', '>', 0)->get();
        return view('perusahaan.list_keuangan');
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
