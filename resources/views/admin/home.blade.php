@extends('layouts.layout')
@section('content')
<div class="div">
    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-comman w-100">
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
            <div class="card bg-comman w-100">
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
            <div class="card bg-comman w-100">
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
            <div class="card bg-comman w-100">
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

    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="card card-chart">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title">Revenue</h5>
                        </div>
                        <div class="col-6">
                            <ul class="chart-list-out">
                                <li><span class="circle circle-green"></span>Income</li>
                                <li><span class="circle-blue"></span>Expenses</li>
                                <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="apexcharts-area"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 d-flex">
            <div class="card flex-fill comman-shadow">
                <div class="card-header d-flex align-items-center">
                    <div class="row">
                        <h5 class="card-title">Upcoming Events</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div id="calendar-doctor" class="calendar-container"></div>
                    <div class="calendar-info calendar-info1">
                        <div class="upcome-event-date">
                            <h3>11 Jan</h3>
                            <span><i class="fas fa-ellipsis-h"></i></span>
                        </div>
                        <div class="calendar-details">
                            <p>08:00 am</p>
                            <div class="calendar-box normal-bg">
                                <div class="calandar-event-name">
                                    <h4>Botony</h4>
                                    <h5>Lorem ipsum sit amet</h5>
                                </div>
                                <span>08:00 - 09:00 am</span>
                            </div>
                        </div>
                        <div class="upcome-event-date">
                            <h3>10 Jan</h3>
                            <span><i class="fas fa-ellipsis-h"></i></span>
                        </div>
                        <div class="calendar-details">
                            <p>08:00 am</p>
                            <div class="calendar-box normal-bg">
                                <div class="calandar-event-name">
                                    <h4>Botony</h4>
                                    <h5>Lorem ipsum sit amet</h5>
                                </div>
                                <span>08:00 - 09:00 am</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
         <div class="col-xl-4 col-sm-8 col-14 mx-auto">
            <div class="card bg-comman w-100 equal-height">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Pending/On-Hold</h6>
                            <h3 class="text-bolder">{{ $pendingonhold }}</h3>
                        </div>
                        <div class="db-icon bg-warning">
                            <i class="fa fa-wrench"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-8 col-14 mx-auto">
            <div class="card bg-comman w-100 equal-height">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Jumlah yang Sudah Terbayar</h6>
                            <h3>{{ $jumlahyangSudahTerbayar }}</h3>
                        </div>
                        <div class="db-icon bg-success">
                            <i class="fa fa-check-square"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-8 col-14 mx-auto">
            <div class="card bg-comman w-100 equal-height">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Jumlah Yang Belum Terbayar</h6>
                            <h3>{{ $jumlahYangBelumTerbayar}}</h3>
                        </div>
                        <div class="db-icon bg-danger">
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-8 col-14 mx-auto">
            <div class="card bg-comman w-100 equal-height">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Total Project Expense</h6>
                            <h3>{{ $totalProjectExpense }}</h3>
                        </div>
                        <div class="db-icon bg-secondary">
                            <i class="fa fa-undo"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-8 col-14 mx-auto">
            <div class="card bg-comman w-100 equal-height">
                <div class="card-body">
                    <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6>Gross Project Profit</h6>
                            <h3>{{ $grossProjectProfit }}</h3>
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
@endsection
