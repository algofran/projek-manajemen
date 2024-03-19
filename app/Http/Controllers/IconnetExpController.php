<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IconnetExp;
use App\Http\Requests\StoreIconnetExpRequest;
use App\Http\Requests\UpdateIconnetExpRequest;
use App\Models\TblIconnets;

class IconnetExpController extends Controller
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
            $iconnets = TblIconnets::where('periode', 'like', '%' . date('Y'))->orderBy('id', 'desc')->get();
        } else {
            $iconnets = TblIconnets::where('payment', '<', 2)->orderBy('id', 'desc')->get();
        }

        return view('icon_plus.lists_iconnet', compact('i', 'stat', 'pay', 'iconnets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIconnetExpRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(IconnetExpController $iconnetExp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IconnetExpController $iconnetExp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIconnetExpRequest $request, IconnetExpController $iconnetExp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IconnetExpController $iconnetExp)
    {
        //
    }
}
