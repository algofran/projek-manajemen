<?php

namespace App\Http\Controllers;

use App\Models\InstituteProyek;
use App\Models\InstituteTugas;
use App\Models\TaskLists;
use App\Models\UserEmploye;
use Illuminate\Http\Request;

class LaporanPertahunInstitute extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $i = 1;
        $stat = ["Pending", "On-Progress", "On-Hold", "Complete", "Finish"];
        $pay = ["Belum Ditagih", "Sudah Ditagih", "Sudah Terbayar"];
        $tag = ["", "PT. PLN (PERSERO)", "PT. INDONESIA COMNET PLUS", "TELKOM AKSES", "RSWS/PEMDA/LAIN2"];
        $vendor_tag = ["", "PT. VISDAT TEKNIK UTAMA", "PT. CORDOVA BERKAH NUSATAMA", "CV. VISDAT TEKNIK UTAMA", "CV. VISUAL DATA KOMPUTER"];
        $managers = UserEmploye::where('type', 1)->orderBy('firstname')->get();

        if (isset($request->status)) {
            $projects = InstituteProyek::where('status', $request->status)->orderByDesc('end_date')->get();
        } else {
            $projects = InstituteProyek::whereYear('end_date', date('Y'))->orderByDesc('end_date')->get();
        }



        return view('perusahaan.list_tahunan_perusahaan', compact('projects', 'managers'));
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
