<?php

use App\Http\Controllers\IconnetExpController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProjectController;

use App\Http\Controllers\SerpoExpController;

use App\Http\Controllers\TelkomAksesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // //Projek
    // Route::get('/project_lists', function () {
    //     return view('project/lists');

    // });
    // Route::get('/add_project', function () {
    //     return view('project/add');
    // });

    // //Icon Plus
    // Route::get('/lists_serpo', function () {
    //     return view('icon_plus/lists_serpo');
    // });
    // Route::get('/add_serpo', function () {
    //     return view('icon_plus/add_serpo');
    // });
    // Route::get('/lists_iconnet', function () {
    //     return view('icon_plus/lists_iconnet');
    // });
    // Route::get('/add_iconnet', function () {
    //     return view('icon_plus/add_iconnet');
    // });

    // //Telkom akses
    // Route::get('/lists_telkom', function () {
    //     return view('telkom_akses/lists_telkom');
    // });
    // Route::get('/add_telkom', function () {
    //     return view('telkom_akses/add_telkom');
    // });

    // //Keuangan
    // Route::get('/pengeluaran_projek', function () {
    //     return view('keuangan/pengeluaran_projek');
    // });
    // Route::get('/pengeluaran_serpo', function () {
    //     return view('keuangan/pengeluaran_serpo');
    // });
    // Route::get('/pengeluaran_iconnet', function () {
    //     return view('keuangan/pengeluaran_iconnet');
    // });
    // Route::get('/pengeluaran_telkom', function () {
    //     return view('keuangan/pengeluaran_telkom');
    // });

    // Route::get('/laporan', function () {
    //     return view('laporan/laporan');
    // });

    // Project Routes
    Route::get('/project_lists', [ProjectController::class, 'index'])->name('project.lists');
    Route::get('/add_project', [ProjectController::class, 'inputprojek'])->name('project.add');
    Route::post('/project_lists', [ProjectController::class, 'store'])->name('project.store');
    Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::get('/projects/{id}/delete', [ProjectController::class, 'destroy'])->name('_project.del');
    Route::get('detail/{id}', [ProjectController::class, 'show'])->name('project.detail');

    // SERPO Routes
    Route::get('/lists_serpo', [SerpoExpController::class, 'index'])->name('lists_serpo');
    Route::get('/add_serpo', [SerpoExpController::class, 'inputserpo'])->name('serpo.add');
    Route::post('/add_serpo', [SerpoExpController::class, 'store'])->name('serpo.store');
    Route::get('/serpos/{pid}/detail', [SerpoExpController::class, 'show'])->name('serpos.detail');
    Route::get('/serpo/{id}/edit', [SerpoExpController::class, 'edit'])->name('serpo.edit');
    Route::put('/serpo/{id}', [SerpoExpController::class, 'update'])->name('serpo.update');
    Route::get('/serpos/{id}/delete', [SerpoExpController::class, 'destroy'])->name('_serpos.del');

    Route::get('/lists_iconnet', [IconnetExpController::class, 'index'])->name('icon_plus.lists_iconnet');
    Route::post('/lists_iconnet', [IconnetExpController::class, 'store'])->name('iconnet.store');
    Route::get('/iconnet/{pid}/detail', [IconnetExpController::class, 'show'])->name('iconnet.detail');
    Route::post('/iconnet/{id}', [IconnetExpController::class, 'update'])->name('iconnet.update');
    Route::get('/iconnet/{id}/delete', [IconnetExpController::class, 'destroy'])->name('_iconnet.del');

    Route::get('/lists_telkom', [TelkomAksesController::class, 'index'])->name('list_telkomakses');
    Route::post('/lists_telkom', [TelkomAksesController::class, 'store'])->name('telkom.store');
    Route::get('/telkomakses/{pid}/detail', [TelkomAksesController::class, 'show'])->name('telkomakses.detail');
    Route::post('/telkom_akses/{id}', [TelkomAksesController::class, 'update'])->name('telkom.update');
    Route::get('/telkomakses/{id}/edit', [TelkomAksesController::class, 'edit'])->name('telkomakses.edit');
    Route::get('/telkomakses/{id}/delete', [TelkomAksesController::class, 'destroy'])->name('_telkom.del');

    Route::get('/lists_penjualan', [PenjualanController::class, 'index'])->name('list_penjualan');
    Route::post('/lists_penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('/penjualan/{id}/edit', [PenjualanController::class, 'update'])->name('penjualan.edit');
    Route::get('/penjualan/{pid}/detail', [PenjualanController::class, 'detail'])->name('penjualan.detail');
    Route::post('/penjualan/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::get('/penjualan/{id}/delete', [PenjualanController::class, 'destroy'])->name('_penjualan.del');

    // Route::get('/lists_penjualan', [PenjualanController::class, 'index'])->name('sales.index');
    // Route::get('/sales/{id}/delete', [PenjualanController::class, 'destroy'])->name('sales.del');
});
