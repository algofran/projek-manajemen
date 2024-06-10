@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-header fw-bolder fs-6 bg-danger bg-gradient text-white">
                    Menu Project
                </div>
            </div> <!-- End of card-table -->
            
                <div class="row mt-3">
                    <!-- List Project -->
                    <div class="col-12 col-lg-6 col-xl-6 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <a href="{{ route('project.lists') }}">
                                        <div class="ms-4 mt-3">
                                            <h5 class="card-title">List Project</h5>
                                            <div class="db-icon bg-info mt-3">
                                                <i class="fa fa-table"></i>
                                            </div>
                                        </div>
                                    </a>                                    
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <!-- Content if any -->
                            </div>
                        </div>
                    </div>
                    <!-- Tambah Project -->
                    <div class="col-12 col-lg-6 col-xl-6 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <a href="{{ route('project.add') }}">
                                        <div class="ms-4 mt-3">
                                            <h5 class="card-title">Tambah Project</h5>
                                            <div class="db-icon bg-success mt-3">
                                                <i class="fa fa-plus-square"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <!-- Content if any -->
                            </div>
                        </div>
                    </div>
                    <!-- Laporan Keuangan -->
                    <div class="col-12 col-lg-6 col-xl-6 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="row align-items-center">
                                        <a href="{{ route('keuangan_project') }}">
                                            <div class="ms-4 mt-3">
                                                <h5 class="card-title">Laporan Keuangan</h5>
                                                <div class="db-icon bg-purple mt-3">
                                                    <i class="fa fa-plus-square"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <!-- Content if any -->
                            </div>
                        </div>
                    </div>
                    <!-- Laporan Tahunan -->
                    <div class="col-12 col-lg-6 col-xl-6 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <a href="{{ route('_laporan.tahun.project') }}">
                                        <div class="ms-4 mt-3">
                                            <h5 class="card-title">Laporan Tahunan</h5>
                                            <div class="db-icon bg-warning mt-3">
                                                <i class="fa fa-tasks"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <!-- Content if any -->
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
