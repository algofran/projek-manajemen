<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\IconnetExpController;
use App\Http\Controllers\InstituteDataController;
use App\Http\Controllers\InstitutePengeluaranController;
use App\Http\Controllers\InstituteProyekController;
use App\Http\Controllers\InstituteTagihanController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KeuanganProjectController;
use App\Http\Controllers\LaporanPertahunController;
use App\Http\Controllers\LaporanPertahunInstitute;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTugasController;
use App\Http\Controllers\SerpoExpController;
use App\Http\Controllers\ProjectPengeluaranController;
use App\Http\Controllers\MitraIntituteController;

use App\Http\Controllers\TelkomAksesController;
use App\Http\Controllers\UserEmployeController;
use App\Models\InstitutePengeluaran;
use App\Models\InstituteProyek;
use App\Models\InstituteTagihan;
use App\Models\InstituteTahun;
use App\Models\InstituteTugas;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Session;

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
    $companies = App\Models\InstituteData::all();
    session(['key' => 'value']);
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/events/show', [EventController::class, 'index'])->name('events');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');



    // Project Routes
    Route::get('/Menu_Project', [ProjectController::class, 'menu'])->name('menu.project');
    Route::get('/project_lists', [ProjectController::class, 'index'])->name('project.lists');
    Route::get('/add_project', [ProjectController::class, 'inputprojek'])->name('project.add');
    Route::post('/project_lists', [ProjectController::class, 'store'])->name('project.store');
    Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::get('/projects/{id}/delete', [ProjectController::class, 'destroy'])->name('_project.del');
    Route::get('detail/{id}', [ProjectController::class, 'show'])->name('project.detail');
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

    // Perusahaan

    Route::get('/perusahaan/{id}', [MitraIntituteController::class, 'index'])->name('company.show');
    Route::get('/mitra/{id}/{name}', [MitraIntituteController::class, 'show'])->name('mitra.menu');
    Route::get('/list/{id}', [MitraIntituteController::class, 'list'])->name('list.proyeks');
    Route::get('/add/{id}', [MitraIntituteController::class, 'create'])->name('add.proyek');
    Route::post('/tambah', [MitraIntituteController::class, 'store'])->name('add.store');
    Route::post('/edit/{id}', [MitraIntituteController::class, 'update'])->name('update');
    Route::get('/hapus_proyek/{id}', [MitraIntituteController::class, 'destroy'])->name('_del.proyek');
    Route::get('/detail_proyek/{id}', [InstituteProyekController::class, 'index'])->name('_detail.proyek');
    Route::get('/add_task/{id}', [InstituteTagihanController::class, 'index'])->name('_add.task');
    Route::post('/add_task', [InstituteTagihanController::class, 'store'])->name('_store.task');
    Route::get('/task/{id}/delete', [InstituteTagihanController::class, 'destroy'])->name('_del.task');
    Route::post('task/{id}/update', [InstituteTagihanController::class, 'update'])->name('_update.task');
    Route::get('task_pengeluaran/{id}', [InstitutePengeluaranController::class, 'index'])->name('_add.pengeluaran');
    Route::post('/task_pengeluaran', [InstitutePengeluaranController::class, 'store'])->name('_add.store');
    Route::get('/task_pengeluaran/{id}/delete', [InstitutePengeluaranController::class, 'destroy'])->name('_del.pengeluaran');
    Route::post('edit_pengeluaran/{id}', [InstitutePengeluaranController::class, 'update'])->name('_update.pengeluaran');

    Route::get('/list_keuangan/{id}', [KeuanganController::class, 'index'])->name('keuangan');
    Route::get('/detail_keuangan/{id}', [KeuanganController::class, 'show'])->name('_detail.keuangan');
    Route::get('/add_perusahaan', [InstituteDataController::class, 'index'])->name('_list.perusahaan');
    Route::post('/add_perusahaan', [InstituteDataController::class, 'store'])->name('_add.perusahaan');
    Route::get('/perusahaan/{id}/delete', [InstituteDataController::class, 'destroy'])->name('_del.institute');
    Route::post('/perusahaan/{id}/edit', [InstituteDataController::class, 'update'])->name('_update.institute');
    Route::post('/add_mitra', [InstituteDataController::class, 'create'])->name('_add.mitra');
    Route::get('perusahaan/delete/{id}/', [InstituteDataController::class, 'hapus'])->name('_del.mitra');
    Route::post('perusahaan/edit/{id}/', [InstituteDataController::class, 'edit'])->name('_edit.mitra');

    Route::get('/download-pdf/{id}/{type}', [KeuanganController::class, 'downloadPDF'])->name('download.pdf');
    Route::get('/download-exel/{id}/{type}', [KeuanganController::class, 'downloadExel'])->name('download.exel');

    Route::get('/Laporan_Keuangan_Pertahun_Perusahaan/{id}', [LaporanPertahunInstitute::class, 'index'])->name('_laporan.tahun.perusahaan');
    Route::post('/tambah_list_laporan', [LaporanPertahunInstitute::class, 'create'])->name('_add.list.laporan');
    Route::post('/tambah_list_pdf', [LaporanPertahunInstitute::class, 'store'])->name('_add.pdf.laporan');
    Route::get('/download_pdf_institute/{id}', [LaporanPertahunInstitute::class, 'download'])->name('_download.pdf.laporan');
    Route::get('/hapus/{id}', [LaporanPertahunInstitute::class, 'destroy'])->name('_del.pdf.laporan');


    //user


    Route::get('/list_user', [UserEmployeController::class, 'index'])->name('_list.user');
    Route::get('/hapus_user/{id}', [UserEmployeController::class, 'destroy'])->name('_del.user');
    Route::post('/list_user/add', [UserEmployeController::class, 'store'])->name('add_user');
    Route::post('/user/update/{id}', [UserEmployeController::class, 'update'])->name('update_user');





    // Route::get('/detail_proyek', function () {
    //     return view('perusahaan/_detail.proyek')->name('show.proyek');
    // });

    Route::get('/lists_penjualan', [PenjualanController::class, 'index'])->name('list_penjualan');
    Route::post('/lists_penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('/penjualan/{id}/edit', [PenjualanController::class, 'update'])->name('penjualan.edit');
    Route::get('/penjualan/{pid}/detail', [PenjualanController::class, 'detail'])->name('penjualan.detail');
    Route::post('/penjualan/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::get('/penjualan/{id}/delete', [PenjualanController::class, 'destroy'])->name('_penjualan.del');
    Route::get('/download-penjualan-exel', [PenjualanController::class, 'downloadExel'])->name('download.exel.penjualan');


    // Route::get('/lists_penjualan', [PenjualanController::class, 'index'])->name('sales.index');
    // Route::get('/sales/{id}/delete', [PenjualanController::class, 'destroy'])->name('sales.del');



});
