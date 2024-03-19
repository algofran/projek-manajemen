<?php

namespace App\Http\Controllers;

use App\Models\TblTelkomakse;
use Illuminate\Http\Request;

class TelkomAksesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $i = 1;
        $stat = ["Pending", "On-Progress", "Complete"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];

        if ($request->has('tahun')) {
            $telkomAkses = TblTelkomakse::where('periode', 'like', '%' . date('Y'))->orderBy('id', 'desc')->get();
        } else {
            $telkomAkses = TblTelkomakse::where('payment', '<', 2)->orderBy('id', 'desc')->get();
        }

        return view('telkom_akses.lists_telkom', compact('i', 'stat', 'pay', 'telkomAkses'));
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
