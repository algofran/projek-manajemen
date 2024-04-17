<?php

namespace App\Http\Controllers;

use App\Models\MitraIntitute;
use Illuminate\Http\Request;

class MitraIntituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $perusahaan = MitraIntitute::where('id_inst', $id)->orderBy('id', 'asc')->get();;
        return view('perusahaan.menu_perusahaan', compact('perusahaan'));
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
    public function show(string $id, string $name)
    {
        $mitra = MitraIntitute::where('id', $id)->orderBy('id', 'asc')->get();
        return view('perusahaan.menu_mitra', compact('mitra'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MitraIntitute $mitraIntitute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MitraIntitute $mitraIntitute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MitraIntitute $mitraIntitute)
    {
        //
    }
}
