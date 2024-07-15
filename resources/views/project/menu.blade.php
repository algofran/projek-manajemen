@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header container py-3 bg-danger bg-gradient text-white rounded">
                <div class="row align-items-center">
                    <div class="col">
                        <p class="fw-bolder fs-6 text-white my-auto">Menu Projek</p>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:history.back()" style="text-decoration-line: underline; font-style: italic">Kembali</a></li>
                            <li class="breadcrumb-item text-white">Menu Projek</li>
                        </ul>
                    </div> 
                </div>
            </div>
            
                <div class="row mt-3">
                    <!-- List Project -->
                    <div class="col-12 col-lg-6 col-xl-6 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <a href="{{ route('project.lists') }}">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-3 col-lg-2 col-xl-2 col-md-2">
                                                    <div class="db-icon bg-info">
                                                        <i class="fa fa-table"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-lg-10 col-xl-10 col-md-10 my-auto">
                                                    <h5 class="card-title">Daftar Projek</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </a>                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Tambah Project -->
                    @role(['admin', 'manager'])      
                    <div class="col-12 col-lg-6 col-xl-6 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <a href="{{ route('project.add') }}">
                                        <div class="">
                                           
                                            
                                            <div class="row">
                                                <div class="col-3 col-lg-2 col-xl-2 col-md-2">
                                                    <div class="db-icon bg-success">
                                                        <i class="fa fa-plus-square"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-lg-10 col-xl-10 col-md-10 my-auto">
                                                    <h5 class="card-title">Tambah Projek</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                    @endrole
                    <!-- Laporan Keuangan -->
                    <div class="col-12 col-lg-6 col-xl-6 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="row align-items-center">
                                        <a href="{{ route('keuangan_project') }}">
                                            <div class="row">
                                                <div class="col-3 col-lg-2 col-xl-2 col-md-2">
                                                    <div class="db-icon bg-purple">
                                                        <i class="fa fa-plus-square"></i>
                                                    </div>
                                                </div>
                                                <div class="col-9 col-lg-10 col-xl-10 col-md-10 my-auto">
                                                    <h5 class="card-title">Laporan Keuangan</h5>
                                                </div>
                                               
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <!-- Laporan Tahunan -->
                    <div class="col-12 col-lg-6 col-xl-6 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <a href="{{ route('_laporan.tahun.project') }}">
                                        <div class="row">
                                            <div class="col-3 col-lg-2 col-xl-2 col-md-2">
                                                <div class="db-icon bg-warning">
                                                    <i class="fa fa-tasks"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-lg-10 col-xl-10 col-md-10 my-auto">
                                                <h5 class="card-title">Dokumen Projek</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End of row -->
            
        </div> <!-- End of col-sm-12 -->
    </div> <!-- End of row -->
</div> <!-- End of container -->
@endsection

@section('script')
<script>
    feather.replace();
</script>
@endsection
