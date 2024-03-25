<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblSerpos;
use App\Models\UserEmploye;

class SerpoExpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $i = 1;
        $stat = ["Pending", "On-Progress", "Complete"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];
        $paket_tag = [
            "",
            "Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 1 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Konawe - Serpo SBU Sulawesi & IBT 2022-2025"
        ];

        if ($request->has('tahun')) {
            $serpos = TblSerpos::where('periode', 'like', '%' . date('Y'))->orderBy('id', 'desc')->get();
        } else {
            $serpos = TblSerpos::where('payment', '<', 2)->orderBy('id', 'desc')->get();
        }

        return view('iconplus.lists_serpo', compact('i', 'stat', 'pay', 'paket_tag', 'serpos'));
    }
    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        //
    }

    public function inputserpo(Request $request)
    {
        $paket = $request->input('paket');
        $periode = $request->input('periode');
        $tagihan = $request->input('tagihan');
        $status = $request->input('status');
        $payment = $request->input('payment');
        $managers = UserEmploye::where('type', 1)->orderBy('firstname')->get();


        return view('iconplus.add_serpo', compact('paket', 'periode', 'tagihan', 'status', 'payment', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data formulir
        $request->validate([
            'paket' => 'nullable|integer',
            'periode' => 'nullable|string|max:255',
            'tagihan' => 'nullable|numeric',
            'status' => 'nullable|integer',
            'payment' => 'nullable|integer',
            'manager_id' => 'nullable|integer',
        ]);

        // Proses penyimpanan data ke database
        $serpo = new TblSerpos([
            'paket' => $request->input('paket'),
            'periode' => $request->input('periode'),
            'tagihan' => $request->input('tagihan'),
            'status' => $request->input('status'),
            'payment' => $request->input('payment'),
            'manager_id' => $request->input('manager_id'),
        ]);

        // Coba menyimpan data
        if ($serpo->save()) {
            // Redirect ke halaman index SERPO dengan pesan sukses
            return redirect()->route('lists_serpo')->with('success', 'Serpo berhasil dibuat!');
        } else {
            // Jika gagal menyimpan, set pesan gagal
            $errorMessage = 'Gagal membuat Serpo. Silakan coba lagi.';
            return redirect()->back()->with('error', $errorMessage)->withInput($request->except('password', 'password_confirmation'));
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
