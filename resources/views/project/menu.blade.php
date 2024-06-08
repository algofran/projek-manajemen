@extends('layouts.layout')
@section('content')
<div class="div">
  <div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-header fw-bolder fs-6 bg-danger text-white">
                Menu Project 
            </div>
        </div>
            <div class="row">
                
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="ms-4 mt-3">
                                    <h5 class="card-title">List Project</h5>
                                    <div class="db-icon bg-info mt-3">
                                        <i class="fa fa-table"></i>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="mt-3 d-grid gap-2 mx-auto">
                                <a href="{{ route('project.lists') }}" class="btn btn-outline-danger mx-4">+ KLIK</a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="ms-4 mt-3">
                                    <h5 class="card-title">Tambah Project</h5>
                                    <div class="db-icon bg-success mt-3">
                                        <i class="fa fa-plus-square"></i>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="mt-3 d-grid gap-2 mx-auto">
                                <a href="{{ route('project.add') }}" class="btn btn-outline-danger mx-4">+ KLIK</a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="ms-4 mt-3">
                                    <h5 class="card-title">Laporan Keuangan</h5>
                                    <div class="db-icon bg-purple mt-3">
                                        <i class="fa fa-tasks"></i>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="mt-3 d-grid gap-2 mx-auto">
                                    <a href="{{ route('keuangan_project')}}" class="btn btn-outline-danger mx-4">+ KLIK</a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-6">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="ms-4 mt-3">
                                    <h5 class="card-title">Laporan Tahunan</h5>
                                    <div class="db-icon bg-warning mt-3">
                                        <i class="fa fa-tasks"></i>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="mt-3 d-grid gap-2 mx-auto">
                                    <a href="{{ route('_laporan.tahun.project')}}" class="btn btn-outline-danger mx-4">+ KLIK</a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
<script>
    feather.replace();
</script>
@endsection
