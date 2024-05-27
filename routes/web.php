<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\project\KeuanganProjectController;
use App\Http\Controllers\project\LaporanPertahunController;
use App\Http\Controllers\project\ProjectController;
use App\Http\Controllers\project\ProjectPengeluaranController;
use App\Http\Controllers\project\ProjectTugasController;
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

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

Route::group([
    'middleware' => ['auth'],
    'namespace'  => 'App\Http\Controllers\admin',
    'prefix'     => '/',
], function () {
    Route::get('/getUser', [UserController::class, 'getUser'])->name('admin.dataTable.getUser');
    Route::get('/', [AdminController::class, 'index'])->name('home');
    Route::resource('user', UserController::class)->only(['index', 'update', 'show', 'edit', 'store', 'destroy'])->names([
        'index' => 'user',
        'update'  => 'order.confirm',
        'show'  => 'order.view',
        'edit' => 'confirm',
        'store' => 'order.storepayment',
        'destroy' => 'user.destroy'
    ]);
});

Route::group([
    'middleware' => ['auth'],
    'namespace'  => 'App\Http\Controllers\project',
    'prefix'     => 'project/',
], function () {
    Route::get('/Menu_Project', [ProjectController::class, 'menu'])->name('project.menu');
    Route::get('/project_lists', [ProjectController::class, 'index'])->name('project.lists');
    Route::get('/add_project', [ProjectController::class, 'inputprojek'])->name('project.add');
    Route::post('/project_lists', [ProjectController::class, 'store'])->name('project.store');
    Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::get('/projects/{id}/delete', [ProjectController::class, 'destroy'])->name('_project.del');

    Route::get('/detail/{id}', [ProjectController::class, 'show'])->name('project.detail.show');

    Route::get('project_task/{id}', [ProjectTugasController::class, 'index'])->name('project.task');
    Route::post('/project_task', [ProjectTugasController::class, 'store'])->name('task.store');
    Route::get('/project_task/{id}/delete', [ProjectTugasController::class, 'destroy'])->name('_task.del');
    Route::post('task/{id}', [ProjectTugasController::class, 'update'])->name('task.update');
    Route::get('project_pengeluaran/{id}', [ProjectPengeluaranController::class, 'index'])->name('project.pengeluaran');
    Route::post('/project_pengeluaran', [ProjectPengeluaranController::class, 'store'])->name('pengeluaran.store');
    Route::get('/project_pengeluaran/{id}/delete', [ProjectPengeluaranController::class, 'destroy'])->name('_pengeluaran.del');
    Route::post('pengeluaran/{id}', [ProjectPengeluaranController::class, 'update'])->name('pengeluaran.update');

    Route::get('/list_keuangan_project', [KeuanganProjectController::class, 'index'])->name('keuangan_project');
    Route::get('/detail_keuangan_project/{id}', [KeuanganProjectController::class, 'show'])->name('_detail.keuangan_project');

    Route::get('/download-project-pdf/{id}/{type}', [KeuanganProjectController::class, 'downloadPDF'])->name('download.project.pdf');
    Route::get('/download-project-exel/{id}/{type}', [KeuanganProjectController::class, 'downloadExel'])->name('download.project.exel');

    Route::get('/Laporan_Keuangan_Pertahun', [LaporanPertahunController::class, 'index'])->name('_laporan.tahun.project');
    Route::post('/tambah_list_laporan_projek', [LaporanPertahunController::class, 'create'])->name('_add.list.laporan.projek');
    Route::post('/tambah_list_pdf_projek', [LaporanPertahunController::class, 'store'])->name('_add.pdf.laporan.projek');
    Route::get('/download_pdf_projek/{id}', [LaporanPertahunController::class, 'download'])->name('_download.pdf.laporan.projek');
    Route::get('/hapus_dokumen/{id}', [LaporanPertahunController::class, 'destroy'])->name('_del.pdf.laporan.projek');
});
