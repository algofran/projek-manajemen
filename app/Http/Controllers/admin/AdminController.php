<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\InstitutePengeluaran;
use App\Models\InstituteProyeks;
use App\Models\ProjectAktivitis;
use App\Models\ProjectList;
use App\Models\Sales;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalprojek = ProjectList::count() + InstituteProyeks::count();
        $pending = ProjectList::where('status', 1)->count() + InstituteProyeks::where('status', 0)->count();
        $onprogress = ProjectList::where('status', 2)->count() + InstituteProyeks::where('status', 1)->count();
        $finish = ProjectList::where('status', 3)->count() + InstituteProyeks::where('status', 2)->count();

        $pendingonhold = ProjectList::where('payment_status', 1)->sum('payment') + InstituteProyeks::where('status', 1)->sum('tagihan'); // Ganti 'nilai' dengan nama kolom yang ingin dijumlahkan
        $jumlahyangSudahTerbayar = ProjectList::where('payment_status', 3)->sum('payment') + InstituteProyeks::where('status', 3)->sum('tagihan') + Sales::where('status', 1)->sum('jual'); 
        $jumlahYangBelumTerbayar = ProjectList::where('payment_status', 1)->sum('payment') + InstituteProyeks::where('status', 1)->sum('tagihan') + Sales::where('status', 0)->sum('jual'); 
        $totalProjectExpense = ProjectAktivitis::sum('cost') + InstitutePengeluaran::sum('cost')  + Sales::sum('jual');
        $grossProjectProfit = ProjectList::where('payment_status', 3)->sum('payment') + ProjectList::where('payment_status', 1)->sum('payment') + ProjectList::where('payment_status', 1)->sum('payment') - InstituteProyeks::where('status', 1)->sum('tagihan') + InstituteProyeks::where('status', 3)->sum('tagihan') + InstitutePengeluaran::sum('cost') - Sales::where('status', 1)->sum('jual') + Sales::where('status', 0)->sum('jual') +Sales::sum('jual');
        // $grossProjectProfit = ProjectList::where('payment_status', 3)->sum('payment') + InstituteProyeks::where('status', 3)->sum('tagihan') + Sales::where('status', 1)->sum('jual') - ProjectList::where('payment_status', 1)->sum('payment') + InstituteProyeks::where('status', 1)->sum('tagihan') + Sales::where('status', 0)->sum('jual') ; 
        // dd($pendingonhold);

        return view('admin.home', compact('totalprojek', 'pending', 'onprogress', 'finish','pendingonhold','jumlahyangSudahTerbayar', 'jumlahYangBelumTerbayar','totalProjectExpense', 'grossProjectProfit'));
    }

    // public function list()
    // {
    //     $onhold = ProjectList::sum('nilai') + InstituteProyeks::sum('nilai'); // Ganti 'nilai' dengan nama kolom yang ingin dijumlahkan
    //     $jumlahyangSudahTerbayar = ProjectList::where('status', 1)->sum('nilai') + InstituteProyeks::where('status', 0)->sum('nilai');
    //     $jumlahYangBelumTerbayar = ProjectList::where('status', 2)->sum('nilai') + InstituteProyeks::where('status', 1)->sum('nilai');
    //     $totalProjectExpense = ProjectList::where('status', 3)->sum('nilai') + InstituteProyeks::where('status', 2)->sum('nilai');
    //     $grossProjectProfit = ProjectList::where('status', 4)->sum('nilai') + InstituteProyeks::where('status', 3)->sum('nilai');

    //     return view('admin.home', compact('onhold', 'jumlahyangSudahTerbayar', 'jumlahYangBelumTerbayar', 'totalProjectExpense', 'grossProjectProfit'));
    // }
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
