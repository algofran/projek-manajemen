<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\penjualan\PenjualanController;
use App\Http\Controllers\perusahaan\DokumenPertahunController;
use App\Http\Controllers\perusahaan\InstituteDataController;
use App\Http\Controllers\perusahaan\InstituteProjectController;
use App\Http\Controllers\perusahaan\KeuanganController;
use App\Http\Controllers\perusahaan\PengeluaranController;
use App\Http\Controllers\perusahaan\TaskProjectController;
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
    Route::get('/User_list', [UserController::class, 'index'])->name('user');
    Route::get('/hapus_user/{id}', [UserController::class, 'destroy'])->name('_del.user');
    Route::get('/Edit_user/{id}', [UserController::class, 'edit'])->name('_edituser');
    Route::post('/list_user/add', [UserController::class, 'store'])->name('add_user');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('update_user');
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

Route::group([
    'middleware' => ['auth'],
    'namespace'  => 'App\Http\Controllers\perusahaan',
    'prefix'     => 'perusahaan/',
], function () {
    Route::get('/add_perusahaan', [InstituteDataController::class, 'index'])->name('_list.perusahaan');
    Route::post('/add_perusahaan', [InstituteDataController::class, 'store'])->name('_add.perusahaan');
    Route::get('/perusahaan/{id}/delete', [InstituteDataController::class, 'destroy'])->name('_del.institute');
    Route::post('/perusahaan/{id}/edit', [InstituteDataController::class, 'update'])->name('_update.institute');
    Route::post('/add_mitra', [InstituteDataController::class, 'create'])->name('_add.mitra');
    Route::get('perusahaan/delete/{id}/', [InstituteDataController::class, 'hapus'])->name('_del.mitra');
    Route::post('perusahaan/edit/{id}/', [InstituteDataController::class, 'edit'])->name('_edit.mitra');

    Route::get('/perusahaan/{id}', [InstituteProjectController::class, 'index'])->name('company.show');
    Route::get('/mitra/{id}/{name}', [InstituteProjectController::class, 'show'])->name('mitra.menu');
    Route::get('/list/{id}', [InstituteProjectController::class, 'list'])->name('list.proyeks');
    Route::get('/add/{id}', [InstituteProjectController::class, 'create'])->name('add.proyek');
    Route::post('/tambah', [InstituteProjectController::class, 'store'])->name('add.store');
    Route::post('/edit/{id}', [InstituteProjectController::class, 'update'])->name('update');
    Route::get('/hapus_proyek/{id}', [InstituteProjectController::class, 'destroy'])->name('_del.proyek');
    Route::get('/detail_proyek/{id}', [InstituteProjectController::class, 'detail'])->name('_detail.proyek');
    Route::get('/add_task/{id}', [TaskProjectController::class, 'index'])->name('_add.task');
    Route::post('/add_task', [TaskProjectController::class, 'store'])->name('_store.task');
    Route::get('/task/{id}/delete', [TaskProjectController::class, 'destroy'])->name('_del.task');
    Route::post('task/{id}/update', [TaskProjectController::class, 'update'])->name('_update.task');
    Route::get('task_pengeluaran/{id}', [PengeluaranController::class, 'index'])->name('_add.pengeluaran');
    Route::post('/task_pengeluaran', [PengeluaranController::class, 'store'])->name('_add.store');
    Route::get('/task_pengeluaran/{id}/delete', [PengeluaranController::class, 'destroy'])->name('_del.pengeluaran');
    Route::post('edit_pengeluaran/{id}', [PengeluaranController::class, 'update'])->name('_update.pengeluaran');

    Route::get('/list_keuangan/{id}', [KeuanganController::class, 'index'])->name('keuangan');
    Route::get('/detail_keuangan/{id}', [KeuanganController::class, 'show'])->name('_detail.keuangan');
    Route::get('/download-pdf/{id}/{type}', [KeuanganController::class, 'downloadPDF'])->name('download.pdf');
    Route::get('/download-exel/{id}/{type}', [KeuanganController::class, 'downloadExel'])->name('download.exel');

    Route::get('/Laporan_Keuangan_Pertahun_Perusahaan/{id}', [DokumenPertahunController::class, 'index'])->name('_laporan.tahun.perusahaan');
    Route::post('/tambah_list_laporan', [DokumenPertahunController::class, 'create'])->name('_add.list.laporan');
    Route::post('/tambah_list_pdf', [DokumenPertahunController::class, 'store'])->name('_add.pdf.laporan');
    Route::get('/download_pdf_institute/{id}', [DokumenPertahunController::class, 'download'])->name('_download.pdf.laporan');
    Route::get('/hapus/{id}', [DokumenPertahunController::class, 'destroy'])->name('_del.pdf.laporan');
});

Route::group([
    'middleware' => ['auth'],
    'namespace'  => 'App\Http\Controllers\penjualan',
    'prefix'     => 'penjualan/',
], function () {
    Route::get('/lists_penjualan', [PenjualanController::class, 'index'])->name('list_penjualan');
    Route::post('lists_penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('{id}/edit', [PenjualanController::class, 'update'])->name('penjualan.edit');
    Route::get('{pid}/detail', [PenjualanController::class, 'detail'])->name('penjualan.detail');
    Route::post('{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::get('{id}/delete', [PenjualanController::class, 'destroy'])->name('_penjualan.del');
    Route::get('download-penjualan-exel', [PenjualanController::class, 'downloadExel'])->name('download.exel.penjualan');
});
