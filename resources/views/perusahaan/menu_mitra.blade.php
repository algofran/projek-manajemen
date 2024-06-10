@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @foreach($mitra as $item)
            <div class="card card-table mb-4">
                <div class="card-header fw-bolder fs-6 bg-danger bg-gradient text-white">
                    Menu {{ $item->mitra }}
                </div>
            </div> <!-- End of card-table -->
                <div class="row mt-3">
                    <!-- List Mitra -->
                    <div class="col-12 col-lg-6 col-xl-6 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <a href="{{ route('list.proyeks', ['id' => $item->id]) }}">
                                        <div class="row">
                                            <div class="col-3 col-xl-2 col-md-2 col-lg-2">
                                                <div class="db-icon bg-info">
                                                    <i class="fa fa-table"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-xl-10 col-md-10 col-lg-10 my-auto">
                                                <h5 class="card-title">List {{ $item->mitra }}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <!-- Tambah Aktivitas -->
                    <div class="col-12 col-lg-6 col-xl-6 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <a href="{{ route('add.proyek', ['id' => $item->id]) }}">
                                        <div class="row">
                                            <div class="col-3 col-xl-2 col-md-2 col-lg-2">
                                                <div class="db-icon bg-success">
                                                    <i class="fa fa-plus-square"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-xl-10 col-md-10 col-lg-10 my-auto">
                                                <h5 class="card-title">Tambah Aktivitas</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                    <!-- Laporan Keuangan -->
                    <div class="col-12 col-lg-6 col-xl-6 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <a href="{{ route('keuangan', ['id' => $item->id]) }}">
                                        <div class="row">  
                                            <div class="col-3 col-xl-2 col-md-2 col-lg-2">
                                                <div class="db-icon bg-purple">
                                                    <i class="fa fa-plus-square"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-xl-10 col-md-10 col-lg-10 my-auto">
                                                <h5 class="card-title">Laporan Keuangan</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                         
                        </div>
                    </div>
                    <!-- Laporan Tahunan -->
                    <div class="col-12 col-lg-6 col-xl-6 mb-3">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <a href="{{ route('_laporan.tahun.perusahaan', ['id' => $item->id]) }}">
                                        <div class="row">
                                            <div class="col-3 col-xl-2 col-md-2 col-lg-2">
                                                <div class="db-icon bg-warning">
                                                    <i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-xl-10 col-md-10 col-lg-10 my-auto">
                                                <h5 class="card-title">Laporan Tahunan</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div> <!-- End of row -->
            
            @endforeach
        </div> <!-- End of col-sm-12 -->
    </div> <!-- End of row -->
</div> <!-- End of container -->
@endsection

@section('script')
<script>
    feather.replace();
</script>
@endsection
