@extends('layouts.layout')
@section('content')
<div class="div">
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="text-gradient text-danger">Dashboard</h3>
            </div>
            <div class="col text-end mb-3">
                <div class="dropdown">
                    <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        Tahun
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        @for ($year = date('Y'); $year >= 2012; $year--)
                            <li><a class="dropdown-item" href="{{ route('home', ['year' => $year]) }}">{{ $year }}</a></li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
        <!-- Tambahkan konten dashboard di sini -->
    </div>
    
    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-comman w-100 shadow">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Total Project</h6>
                            <h3>{{ $totalprojek }}</h3>
                        </div>
                        <div class="db-icon bg-info">
                            <i class="fa fa-tags"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-comman w-100 shadow">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Pending/OnHold</h6>
                            <h3>{{ $pending }}</h3>
                        </div>
                        <div class="db-icon bg-danger">
                            <i class="fa fa-undo"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-comman w-100 shadow">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>On-Progress</h6>
                            <h3>{{ $onprogress }}</h3>
                        </div>
                        <div class="db-icon bg-success">
                            <i class="feather-refresh-ccw"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-comman w-100 shadow">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Finished Project</h6>
                            <h3>{{ $finish }}</h3>
                        </div>
                        <div class="db-icon bg-purple">
                            <i class="fa fa-check-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @php
        dd($data);
    @endphp --}}
    
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="card card-chart shadow">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title">Revenue {{ $tahun }}</h5>
                        </div>
                        <ul role="tablist" class="nav nav-tabs card-header-tabs-primary justify-content-center">
                            <li class="nav-item">
                                <a href="#tab-7" data-bs-toggle="tab" class="nav-link active">Pendapatan</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab-8" data-bs-toggle="tab" class="nav-link">Pengeluaran</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card-body">
                   
                    <div class="tab-content pt-0">
                        <div role="tabpanel" id="tab-7" class="tab-pane fade show active">
                            <div id="chart"></div>
                        </div>
                        <div role="tabpanel" id="tab-8" class="tab-pane fade">
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
        <div class="col-xl-4">
            <div class="card flex-fill shadow">
                <div class="card-header d-flex align-items-center">
                    <div class="row">
                        <h3 class="card-title">Progress Activity</h3>
                    </div>
                </div>
                <div class="card flex-fill bg-white">
                    <div class="card-header">
                        <ul role="tablist" class="nav nav-tabs card-header-tabs-primary justify-content-center">
                            <li class="nav-item">
                                <a href="#tab-4" data-bs-toggle="tab" class="nav-link active">Serpo</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab-5" data-bs-toggle="tab" class="nav-link">Inconnet</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab-6" data-bs-toggle="tab" class="nav-link ">Telkom Akses</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content pt-0">
                            <div role="tabpanel" id="tab-4" class="tab-pane fade show active">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-danger fw-bold">Pending : {{$pendingserpo}}</li>
                                    <li class="list-group-item text-warning fw-bold">Progres : {{$progressserpo}}</li>
                                    <li class="list-group-item text-success fw-bold">Finish : {{$finishserpo}}</li>
                                </ul>
                            </div>
                            <div role="tabpanel" id="tab-5" class="tab-pane fade">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-danger fw-bold">Pending : {{$pendingiconnet}}</li>
                                    <li class="list-group-item text-warning fw-bold">Progres : {{$progressiconnet}}</li>
                                    <li class="list-group-item text-success fw-bold">Finish : {{$finishiconnet}}</li>
                                </ul>
                            </div>
                            <div role="tabpanel" id="tab-6" class="tab-pane fade">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-danger fw-bold">Pending : {{$pendingtelkom}}</li>
                                    <li class="list-group-item text-warning fw-bold">Progres : {{$progresstelkom}}</li>
                                    <li class="list-group-item text-success fw-bold">Finish : {{$finishtelkom}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-xl-4 col-sm-8 col-14 mx-auto">
            <div class="card bg-comman w-100 shadow equal-height">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Pending/On-Hold</h6>
                            <h3 class="text-bolder">{{ 'Rp.'. number_format($pendingonhold, 0, ',', '.') }}</h3>
                        </div>
                        <div class="db-icon bg-warning">
                            <i class="fa fa-wrench"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-8 col-14 mx-auto">
            <div class="card bg-comman w-100 shadow equal-height">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Jumlah yang Sudah Terbayar</h6>
                            <h3 class="text-bolder">{{ 'Rp.'. number_format($jumlahyangSudahTerbayar, 0, ',', '.') }}</h3>
                        </div>
                        <div class="db-icon bg-success">
                            <i class="fa fa-check-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-8 col-14 mx-auto">
            <div class="card bg-comman w-100 shadow equal-height">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Jumlah Yang Belum Terbayar</h6>
                            <h3 class="text-bolder">{{ 'Rp.'. number_format($jumlahYangBelumTerbayar, 0, ',', '.') }}</h3>
                        </div>
                        <div class="db-icon bg-danger">
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-8 col-14 mx-auto">
            <div class="card bg-comman w-100 shadow equal-height">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Total Project Expense</h6>
                            <h3 class="text-bolder">{{ 'Rp.'. number_format($totalProjectExpense, 0, ',', '.') }}</h3>
                        </div>
                        <div class="db-icon bg-secondary">
                            <i class="fa fa-undo"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-8 col-14 mx-auto">
            <div class="card bg-comman w-100 shadow equal-height">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Gross Project Profit</h6>
                            <h3 class="text-bolder">{{ 'Rp.'. number_format($grossProjectProfit, 0, ',', '.') }}</h3>
                        </div>
                        <div class="db-icon bg-info">
                            <i class="fa fa-tags"></i>
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

<script>
    var dataTotalPendapatanTelkom = <?php echo $dataTotalPendapatanTelkomJson; ?>;
    var dataTotalPendapatanSerpo = <?php echo $dataTotalPendapatanSerpoJson; ?>;
    var dataTotalPendapatanIconnet = <?php echo $dataTotalPendapatanIconnetJson; ?>;
    var databulan = <?php echo $databulanJson; ?>;

    var options = {
        series: [
            {
                name: "Telkom Akses",
                data: dataTotalPendapatanTelkom,
            },
            {
                name: "Serpo",
                data: dataTotalPendapatanSerpo,
            },
            {
                name: "Iconnet",
                data: dataTotalPendapatanIconnet,
            }
        ],
        chart: {
            height: 320,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        title: {
            text: 'Pendapatan Perusahaan Perbulan',
            align: 'left'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: databulan,
        },
        yaxis: {
            labels: {
                formatter: function(value) {
                    return value.toLocaleString("id", {
                        style: "currency",
                        currency: "IDR"
                    });
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>


<script>
    var dataTotalPengeluaranTelkom = <?php echo $dataTotalPengeluaranTelkomJson; ?>;
    var dataTotalPengeluaranSerpo = <?php echo $dataTotalPengeluaranSerpoJson; ?>;
    var dataTotalPengeluaranIconnet = <?php echo $dataTotalPengeluaranIconnetJson; ?>;
    var databulan = <?php echo $databulanJson; ?>;

    var options = {
        series: [
            {
                name: "Telkom Akses",
                data: dataTotalPengeluaranTelkom,
            },
            {
                name: "Serpo",
                data: dataTotalPengeluaranSerpo,
            },
            {
                name: "Iconnet",
                data: dataTotalPengeluaranIconnet,
            }
        ],
        chart: {
            height: 320,
            type: 'line',
            zoom: {
                enabled: false
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        title: {
            text: 'Pengeluaran Perusahaan Perbulan',
            align: 'left'
        },
        grid: {
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
        },
        xaxis: {
            categories: databulan,
        },
        yaxis: {
            labels: {
                formatter: function(value) {
                    return value.toLocaleString("id", {
                        style: "currency",
                        currency: "IDR"
                    });
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart2"), options);
    chart.render();
    
</script>

@endsection
