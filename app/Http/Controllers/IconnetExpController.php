<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IconnetExp;
use App\Http\Requests\StoreIconnetExpRequest;
use App\Http\Requests\UpdateIconnetExpRequest;
use App\Models\TblIconnets;
use App\Models\UserEmploye;

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


        $periode = $request->input('periode');
        $sektor = $request->input('sektor');
        $PA = $request->input('PA');
        $tagihan = $request->input('tagihan');
        $status = $request->input('status');
        $payment = $request->input('payment');
        $managers = UserEmploye::where('type', 1)->orderBy('firstname')->get();


        if ($request->has('tahun')) {
            $iconnets = TblIconnets::where('periode', 'like', '%' . date('Y'))->orderBy('id', 'desc')->get();
        } else {
            $iconnets = TblIconnets::where('payment', '<', 2)->orderBy('id', 'desc')->get();
        }

        return view('iconplus.lists_iconnet', compact('i', 'stat', 'pay', 'iconnets', 'periode', 'sektor', 'PA', 'tagihan', 'status', 'payment', 'managers'));
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
            'periode' => 'nullable|string|max:255',
            'sektor' => 'nullable|string|max:255',
            'PA' => 'nullable|integer',
            'target' => 'nullable|integer',
            'tagihan' => 'nullable|numeric',
            'status' => 'nullable|integer',
            'payment' => 'nullable|integer',
            'manager_id' => 'nullable|integer',
        ]);

        $iconnet = new TblIconnets([
            'periode' => $request->input('periode'),
            'sektor' => $request->input('sektor'),
            'PA' =>  $request->input('PA'),
            'target' => $request->input('target'),
            'tagihan' => $request->input('tagihan'),
            'status' => $request->input('status'),
            'payment' => $request->input('payment'),
            'manager_id' => $request->input('manager_id'),
        ]);

        if ($iconnet->save()) {
            return redirect()->route('icon_plus.lists_iconnet')->with('success', 'Iconnet berhasil dibuat!');
        } else {
            $errorMessage = 'Gagal membuat Iconnet. Silakan coba lagi.';
            return redirect()->route('icon_plus.lists_iconnet')->with('error', $errorMessage)->withInput($request->except('password', 'password_confirmation'));
        }
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'periode' => 'nullable|string|max:255',
            'sektor' => 'nullable|string|max:255',
            'PA' => 'nullable|integer',
            'target' => 'nullable|integer',
            'tagihan' => 'nullable|numeric',
            'status' => 'nullable|integer',
            'payment' => 'nullable|integer',
            'manager_id' => 'nullable|integer',
        ]);

        $iconnet = TblIconnets::findOrFail($id);
        $iconnet->update([
            'periode' => $request->input('periode'),
            'sektor' => $request->input('sektor'),
            'PA' =>  $request->input('PA'),
            'target' => $request->input('target'),
            'tagihan' => $request->input('tagihan'),
            'status' => $request->input('status'),
            'payment' => $request->input('payment'),
            'manager_id' => $request->input('manager_id'),
        ]);

        return redirect()->route('icon_plus.lists_iconnet')->with('success', 'Iconnet berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = TblIconnets::findOrFail($id);

        $project->delete();

        return redirect()->route('icon_plus.lists_iconnet')->with('success', 'Project deleted successfully!');
    }
}
