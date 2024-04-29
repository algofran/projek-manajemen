<?php

namespace App\Http\Controllers;

use App\Models\MitraIntitute;
use App\Models\UserEmploye;
use App\Models\InstituteProyek;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
    public function list(string $id, Request $request)
    {
        $i = 1;
        $stat = ["Pending", "On-Progress", "Complete"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];
        $paket_tag = [
            "Tidak Menggunakan Paket",
            "Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 1 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Papua 2 - Serpo SBU Sulawesi & IBT 2022-2025",
            "Konawe - Serpo SBU Sulawesi & IBT 2022-2025"
        ];

        $paket = $request->input('paket');
        $periode = $request->input('periode');
        $sektor = $request->input('sektor');
        $PA = $request->input('PA');
        $tagihan = $request->input('tagihan');
        $keterangan = $request->input('keterangan');
        $status = $request->input('status');
        $payment = $request->input('payment');
        $managers = UserEmploye::where('type', 1)->orderBy('firstname')->get();
        $mitra = MitraIntitute::findOrFail($id);


        if ($request->has('tahun')) {
            $proyeks = InstituteProyek::where('periode', 'like', '%' . date('Y'))->orderBy('id', 'desc')->get();
        } else {
            $proyeks = InstituteProyek::where('id_inst', $id)
                ->orderBy('id', 'desc')
                ->get();
            // $proyeks = InstituteProyek::where('id_inst', $id)
            // ->when($id === 2, function ($query) {
            //     return $query->where('paket', '!=', 0);
            // })
            // ->when($id !== 2, function ($query) {
            //     return $query->where('paket', 0);
            // })
            // ->orderBy('id', 'desc')
            // ->get();
        }

        // dd($proyeks);

        $list_proyeks = MitraIntitute::where('id_inst', $id)->orderBy('id', 'asc')->get();
        return view('perusahaan.list_proyek', compact('list_proyeks', 'i', 'stat', 'pay', 'proyeks', 'paket', 'periode', 'sektor', 'PA', 'tagihan', 'status', 'payment', 'managers', 'paket_tag', 'keterangan', 'mitra'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id, Request $request)
    {
        $mitra = MitraIntitute::where('id', $id)->orderBy('id', 'asc')->get();
        $paket = $request->input('paket');
        $id_inst = $request->input('id_inst');
        $periode = $request->input('periode');
        $sektor = $request->input('sektor');
        $tagihan = $request->input('tagihan');
        $status = $request->input('status');
        $payment = $request->input('payment');
        $managers = UserEmploye::where('type', 1)->orderBy('firstname')->get();

        return view('perusahaan.tambah_proyek', compact('id', 'mitra', 'id_inst', 'paket', 'periode', 'sektor', 'tagihan', 'status', 'payment', 'managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'PA' => 'nullable|integer',
            'target' => 'nullable|integer',
            'tagihan' => 'nullable|numeric',
            'status' => 'nullable|integer',
            'payment' => 'nullable|integer',
            'manager_id' => 'nullable|integer',
        ]);

        $iconnet = new InstituteProyek([
            'id_inst' => $request->input('id_inst'),
            'periode' => $request->input('periode'),
            'paket' => $request->input('paket'),
            'sektor' => $request->input('sektor'),
            'keterangan' => $request->input('keterangan'),
            'PA' =>  $request->input('PA'),
            'target' => $request->input('target'),
            'tagihan' => $request->input('tagihan'),
            'start_date' => Carbon::now(),
            'end_date' => $request->input('end_date'),
            'status' => $request->input('status'),
            'payment' => $request->input('payment'),
            'manager_id' => $request->input('manager_id'),
        ]);

        if ($iconnet->save()) {
            return redirect()->route('list.proyeks', ['id' => $request->input('id_inst')])->with('success', 'proyek berhasil dibuat!');
        } else {
            $errorMessage = 'Gagal. Silakan coba lagi.';
            return redirect()->route('perusahaan.list_proyek')->with('error', $errorMessage)->withInput($request->except('password', 'password_confirmation'));
        }
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'PA' => 'nullable|integer',
            'target' => 'nullable|integer',
            'tagihan' => 'nullable|numeric',
            'status' => 'nullable|integer',
            'payment' => 'nullable|integer',
            'manager_id' => 'nullable|integer',
        ]);

        $iconnet = InstituteProyek::findOrFail($id);
        $iconnet->update([
            'id_inst' => $request->input('id_inst'),
            'periode' => $request->input('periode'),
            'paket' => $request->input('paket'),
            'sektor' => $request->input('sektor'),
            'keterangan' => $request->input('keterangan'),
            'PA' =>  $request->input('PA'),
            'target' => $request->input('target'),
            'tagihan' => $request->input('tagihan'),
            'start_date' => $iconnet->start_date,
            'end_date' => $request->input('end_date'),
            'status' => $request->input('status'),
            'payment' => $request->input('payment'),
            'manager_id' => $request->input('manager_id'),
        ]);

        if ($iconnet->save()) {
            return redirect()->route('list.proyeks', ['id' => $request->input('id_inst')])->with('success', 'proyek berhasil di Edit!');
        } else {
            $errorMessage = 'Gagal. Silakan coba lagi.';
            return redirect()->route('list.proyek')->with('error', $errorMessage)->withInput($request->except('password', 'password_confirmation'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = InstituteProyek::findOrFail($id);

        $project->delete();

        return redirect()->back()->with('success', 'Project deleted successfully!');
    }
}
