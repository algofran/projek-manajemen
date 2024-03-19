<?php

use App\Http\Controllers\IconnetExpController;
use App\Http\Controllers\ProjectController;
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

    Route::get('/project_lists', [ProjectController::class, 'index'])->name('projec.lists');
    Route::get('/projects/{pid}/detail', [ProjectController::class, 'show'])->name('project.detail');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::get('/projects/{id}/delete', [ProjectController::class, 'destroy'])->name('_project.del');

    Route::get('/lists_iconnet', [IconnetExpController::class, 'index'])->name('icon_plus.lists_iconnet');
    Route::get('/projects/{pid}/detail', [IconnetExpController::class, 'show'])->name('project.detail');
    Route::get('/projects/{id}/edit', [IconnetExpController::class, 'edit'])->name('project.edit');
    Route::get('/projects/{id}/delete', [IconnetExpController::class, 'destroy'])->name('_project.del');

});

Route::resource('project', ProjectController::class)->only(['index', 'store', 'update', 'destroy'])->names([
    'index'   => 'lists',
    'store'   => 'addproject',
    'update'  => 'updateproject',
    'destroy' => 'deleteproject',
])->middleware('auth');
