
@extends('layouts.layout') @section('content')
    <div class="div">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-header fw-bolder fs-6 bg-danger bg-gradient text-white mb-4">
                    Data Laporan
                </div>
                <div class="card card-table">
                    <div class="card-body">
        
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title"></h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('download.exel.penjualan') }}" class="btn btn-success me-2"><i class="fas fa-download"></i> Exel</a>
                                </div>
                            </div>
                        </div>
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                            <button type="button" class="btn-close me-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>Foto</th>
                                        <th>Admin</th>
                                        <th>Unit</th>
                                        <th>Jenis</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Updated_At</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection @section('script')
    <script>
        feather.replace();
    </script>
@endsection