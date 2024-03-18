<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
    
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">SERPO</h3>
                            </div>
    
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                <a href="index.php?page=serpo_add" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
    
                            <a href="./index.php?page=serpo&tahun=true"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Tahun Ini</button></a>
                            <a href="./index.php?page=serpo"><button type="button" class="mb-xs mt-xs mr-xs btn btn-danger">Tagihan Aktif</button></a>
    
                        </div>
                    </div>
    
    
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
    
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Paket</th>
                                    <th>Periode</th>
                                    <th>Tagihan</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="">
                                        <div class="row">
                                            <div class="col">
                                                Konawe - Serpo SBU
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Sulawesi & IBT 2022-2025 </div>
                                        </div>
    
                                    </td>
                                    <td>Februari 2023</td>
                                    <td>Rp.100.000</td>
                                    <td>
                                        <span class="badge badge-success">Complate</span><br>
                                        <span class="badge badge-danger">On-Hold</span><br>
                                        <span class="badge badge-info">On-Progress</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Sudah Dibayar</span><br>
                                        <span class="badge badge-primary">Belum Ditagih</span><br>
                                        <span class="badge badge-info">Sudah Ditagih</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="actions ">
                                            <a href="javascript:;" class="btn btn-sm bg-success-light me-2 ">
                                                <i class="feather-eye"></i>
                                            </a>
                                            <a href="edit-sports.html" class="btn btn-sm bg-danger-light me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="edit-sports.html" class="btn btn-sm bg-danger-light">
                                                <i class="feather-trash-2"></i>
                                            </a>
    
    
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                Papua 2 - Serpo SBU
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                Sulawesi & IBT 2022-2025
                                            </div>
                                        </div>
                                    </td>
                                    <td>Februari 2023</td>
                                    <td>Rp.100.000</td>
                                    <td>
                                        <span class="badge badge-success">Complate</span><br>
                                        <span class="badge badge-danger">On-Hold</span><br>
                                        <span class="badge badge-info">On-Progress</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Sudah Dibayar</span><br>
                                        <span class="badge badge-primary">Belum Ditagih</span><br>
                                        <span class="badge badge-info">Sudah Ditagih</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="actions ">
                                            <a href="javascript:;" class="btn btn-sm bg-success-light me-2 ">
                                                <i class="feather-eye"></i>
                                            </a>
                                            <a href="edit-sports.html" class="btn btn-sm bg-danger-light me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="edit-sports.html" class="btn btn-sm bg-danger-light">
                                                <i class="feather-trash-2"></i>
                                            </a>
    
    
                                        </div>
                                    </td>
                                </tr>
    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>