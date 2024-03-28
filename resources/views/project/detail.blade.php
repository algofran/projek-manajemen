<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
    
                <div class="card-header fw-bolder fs-6 bg-info text-white">
                    Detail Penjualan
                </div>
    
            </div>
            <div class="card card-table">
    
                <div class="card-body justify-content-start mx-4 my-3">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class=" text-center">
                                <h6>Project Manager/Staff</h6>
                                <img src="assets/img/user.png" alt="" width="70">
                                <p>Leonardo</p>
                            </div><br>
                            <h6 class="invoice-name">Pendapatan Projek</h6>
                            <p class="invoice-details invoice-details-two">
                                Rp.2.000.000
                            </p>
                            <h6 class="invoice-name">Pengeluaran Projek</h6>
                            <p class="invoice-details invoice-details-two">
                                Rp.1.000.000
                            </p>
    
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <h6 class="invoice-name">Project Name</h6>
                            <p class="invoice-details invoice-details-two text-info">
                                Instalas WIFI/LAN UP
                            </p>
                            <h6 class="invoice-name">No. Kontak</h6>
                            <p class="invoice-details invoice-details-two">
                                -
                            </p>
                            <h6 class="invoice-name">Keterangan</h6>
                            <p class="invoice-details invoice-details-two">
                                Menunggu Renovasi Lantai 1
                            </p>
                            <h6 class="invoice-name">Tanggal Mulai</h6>
                            <p class="invoice-details invoice-details-two">
                                01 Jan 2024
                            </p>
                            <h6 class="invoice-name">Projek Status</h6>
                            <p class="invoice-details invoice-details-two btn-info btn-sm text-white">
                                On-Progress
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-12 "><br><br><br><br><br><br><br><br><br>
                            <h6 class="invoice-name">Tanggal Berakhir</h6>
                            <p class="invoice-details invoice-details-two">
                                01 Jan 2024
                            </p>
                            <h6 class="invoice-name">Status Pembayaran</h6>
                            <p class="invoice-details invoice-details-two btn-info btn-sm text-white">
                                Belum Dibayar
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <h6 class="invoice-name">Project Progress</h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-table">
                <div class="card-body">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Daftar Tugas</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="#" class="btn btn-primary"><i class="fas fa-plus"> Tambah Tugas</i></a>
                            </div>
    
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Penanggunjawab</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Konfir ke Lantai 2</td>
                                    <td>08736272632</td>
                                    <td>31 Dec 2024</td>
                                    <td>Abd Gaffar</td>
                                    <td>
                                        <span class="badge badge-success">Complate</span><br>
                                        <span class="badge badge-warning">On-Hold</span><br>
                                        <span class="badge badge-info">On-Progress</span><br>
                                        <span class="badge badge-danger">Finish</span>
                                    </td>
    
                                    <td class="text-end">
                                        <div class="actions ">
    
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
    
            <div class="card card-table">
                <div class="card-body">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Daftar Pengeluaran</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="#" class="btn btn-primary"><i class="fas fa-plus"> Tambah Pengeluaran</i></a>
                            </div>
    
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jenis Pengeluaran</th>
                                    <th>Keterangan</th>
                                    <th>Nama Pengguna</th>
                                    <th>Biaya</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>02 Jan 2024</td>
                                    <td>Biaya Material</td>
                                    <td>Pembelian Switch Cisco Catalyst 1000 48 Port GE</td>
                                    <td>Abd Gaffar</td>
                                    <td>Rp.20.000.000</td>
    
    
                                    <td class="text-end">
                                        <div class="actions ">
    
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