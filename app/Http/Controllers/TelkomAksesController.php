<?php

namespace App\Http\Controllers;

use App\Models\TblTelkomakse;
use App\Models\UserEmploye;
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

        $periode = $request->input('periode');
        $keterangan = $request->input('keterangan');
        $PA = $request->input('PA');
        $tagihan = $request->input('tagihan');
        $status = $request->input('status');
        $payment = $request->input('payment');
        $managers = UserEmploye::where('type', 1)->orderBy('firstname')->get();

        if ($request->has('tahun')) {
            $telkomAkses = TblTelkomakse::where('periode', 'like', '%' . date('Y'))->orderBy('id', 'desc')->get();
        } else {
            $telkomAkses = TblTelkomakse::where('payment', '<', 2)->orderBy('id', 'desc')->get();
        }

        return view('telkom_akses.lists_telkom', compact('i', 'stat', 'pay', 'telkomAkses', 'periode', 'keterangan', 'PA', 'tagihan', 'status', 'payment', 'managers'));
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
            'keterangan' => 'nullable|string|max:255',
            'PA' => 'nullable|integer',
            'target' => 'nullable|integer',
            'tagihan' => 'nullable|numeric',
            'status' => 'nullable|integer',
            'payment' => 'nullable|integer',
            'manager_id' => 'nullable|integer',
        ]);

        $telkom = new TblTelkomakse([
            'periode' => $request->input('periode'),
            'keterangan' => $request->input('keterangan'),
            'PA' =>  $request->input('PA'),
            'target' => $request->input('target'),
            'tagihan' => $request->input('tagihan'),
            'status' => $request->input('status'),
            'payment' => $request->input('payment'),
            'manager_id' => $request->input('manager_id'),
        ]);

        if ($telkom->save()) {
            return redirect()->route('list_telkomakses')->with('success', 'Telkom Akses berhasil dibuat!');
        } else {
            $errorMessage = 'Gagal membuat Telkom Akses. Silakan coba lagi.';
            return redirect()->route('list_telkomakses')->with('error', $errorMessage)->withInput($request->except('password', 'password_confirmation'));
        }
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
            'periode' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'PA' => 'nullable|integer',
            'target' => 'nullable|integer',
            'tagihan' => 'nullable|numeric',
            'status' => 'nullable|integer',
            'payment' => 'nullable|integer',
            'manager_id' => 'nullable|integer',
        ]);

        $telkom = TblTelkomakse::findOrFail($id);
        $telkom->update([
            'periode' => $request->input('periode'),
            'keterangan' => $request->input('keterangan'),
            'PA' =>  $request->input('PA'),
            'target' => $request->input('target'),
            'tagihan' => $request->input('tagihan'),
            'status' => $request->input('status'),
            'payment' => $request->input('payment'),
            'manager_id' => $request->input('manager_id'),
        ]);

        return redirect()->route('list_telkomakses')->with('success', 'Telkom Akses berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $telkom = TblTelkomakse::findOrFail($id);

        $telkom->delete();

        return redirect()->route('list_telkomakses')->with('success', 'telkom deleted successfully!');
    }
}
