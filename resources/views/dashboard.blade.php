<x-app-layout>
    <div class="div">
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6>Total Project</h6>
                                <h3>41</h3>
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
                                <h6>Pending/On-Hold</h6>
                                <h3>06</h3>
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
                                <h3>11</h3>
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
                                <h3>30</h3>
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
                            <div class="row">
                                <h5 class="card-title col-8">Upcoming Events</h5><br>
    
                                <ul class="chart-list-out student-ellips col-3">
                                    <li class="star-menus"><a href="#" data-bs-toggle="modal" data-bs-target="#my_event" class="btn btn-primary"><i class="feather-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#bank_details" class="db-widgets"><i class="fa fa-calendar text-black"> To Do List</i></a>
                            </div>
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
            <div class="col-xl-2 col-sm-6 col-12 text-center mx-auto">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="db-widgets justify-content-between align-items-center">
                            <div class="db-info">
                                <h6 class="text-dark">Pending/On-Hold</h6>
                                <div class="db-icon bg-white text-dark border border-dark mx-auto my-2">
                                    <i class="fa fa-exclamation-circle"></i>
                                </div>
                                <p>Rp.770.186.331</p>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 text-center mx-auto">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets justify-content-center align-items-center">
                            <div class="db-info mx-auto">
                                <h6 class="text-dark">Jumlah yang sudah terbayar</h6>
                                <div class="db-icon bg-white text-dark border border-dark mx-auto my-2">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                <p>Rp.26.070.000</p>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12 text-center mx-auto">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets justify-content-center align-items-center">
                            <div class="db-info mx-auto">
                                <h6 class="text-dark">Jumlah yang belum terbayar</h6>
                                <div class="db-icon bg-white text-dark border border-dark mx-auto my-2">
                                    <i class="fa fa-times"></i>
                                </div>
                                <p>Rp.694.116.331</p>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 text-center mx-auto">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets justify-content-center align-items-center">
                            <div class="db-info mx-auto">
                                <h6 class="text-dark">Total Project Expense</h6>
                                <div class="db-icon bg-white text-dark border border-dark mx-auto my-2">
                                    <i class="fa fa-clone"></i>
                                </div>
                                <p>Rp.582.164.331</p>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6 col-12 text-center mx-auto">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets justify-content-center align-items-center">
                            <div class="db-info mx-auto">
                                <h6 class="text-dark">Gross Project Profit</h6>
                                <div class="db-icon bg-white text-dark border border-dark mx-auto my-2">
                                    <i class="feather-dollar-sign"></i>
                                </div>
                                <p>Rp.582.164.331</p>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade bank-details" id="bank_details" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
    
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
        <div class="modal fade none-border" id="my_event">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Event</h4>
    
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer justify-content-center">
                        <form>
                            <div class="row">
    
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Time <span class="login-danger">*</span></label>
                                        <input type="time" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Date <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" type="text" placeholder="DD-MM-YYYY">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Desk <span class="login-danger">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>