<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
    
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">List Keuangan</h3>
                            </div>
                            
                            <!-- <div class="row">
                                <div class="col">
                                    <div class="btn btn-primary me-2">Active</div>
                                    <div class="btn btn-warning me-2">On-Hold</div>
                                    <div class="btn btn-success me-2">Complete</div>
                                    <div class="btn btn-danger me-2">Finish</div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="card report-card">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="app-listing">
                                        <li>
                                            <div class="multipleSelection">
                                                <div class="selectBox">
                                                    <p class="mb-0"><i class="fas fa-user-plus me-1 select-icon"></i> Select User</p>
                                                    <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                                </div>
                                                <div id="checkBoxes">
                                                    <form action="#">
                                                        <p class="checkbox-title">Customer Search</p>
                                                        <div class="form-custom">
                                                            <input type="text" class="form-control bg-grey" placeholder="Enter Customer Name">
                                                        </div>
                                                        <div class="selectBox-cont">
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="username">
    <span class="checkmark"></span> Brian Johnson
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="username">
    <span class="checkmark"></span> Russell Copeland
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="username">
    <span class="checkmark"></span> Greg Lynch
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="username">
    <span class="checkmark"></span> John Blair
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="username">
    <span class="checkmark"></span> Barbara Moore
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="username">
     <span class="checkmark"></span> Hendry Evan
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="username">
    <span class="checkmark"></span> Richard Miles
    </label>
                                                        </div>
                                                        <button type="submit" class="btn w-100 btn-primary">Apply</button>
                                                        <button type="reset" class="btn w-100 btn-grey">Reset</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="multipleSelection">
                                                <div class="selectBox">
                                                    <p class="mb-0"><i class="fas fa-calendar me-1 select-icon"></i> Select Date</p>
                                                    <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                                </div>
                                                <div id="checkBoxes">
                                                    <form action="#">
                                                        <p class="checkbox-title">Date Filter</p>
                                                        <div class="selectBox-cont selectBox-cont-one h-auto">
                                                            <div class="date-picker">
                                                                <div class="form-custom cal-icon">
                                                                    <input class="form-control datetimepicker" type="text" placeholder="Form">
                                                                </div>
                                                            </div>
                                                            <div class="date-picker pe-0">
                                                                <div class="form-custom cal-icon">
                                                                    <input class="form-control datetimepicker" type="text" placeholder="To">
                                                                </div>
                                                            </div>
                                                            <div class="date-list">
                                                                <ul>
                                                                    <li><a href="#" class="btn date-btn">Today</a></li>
                                                                    <li><a href="#" class="btn date-btn">Yesterday</a></li>
                                                                    <li><a href="#" class="btn date-btn">Last 7 days</a></li>
                                                                    <li><a href="#" class="btn date-btn">This month</a></li>
                                                                    <li><a href="#" class="btn date-btn">Last month</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="multipleSelection">
                                                <div class="selectBox">
                                                    <p class="mb-0"><i class="fas fa-book-open me-1 select-icon"></i> Select Status</p>
                                                    <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                                </div>
                                                <div id="checkBoxes">
                                                    <form action="#">
                                                        <p class="checkbox-title">By Status</p>
                                                        <div class="selectBox-cont">
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="name">
    <span class="checkmark"></span> All Invoices
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="name">
    <span class="checkmark"></span> Paid
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="name">
    <span class="checkmark"></span> Overdue
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="name">
    <span class="checkmark"></span> Draft
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="name" checked>
    <span class="checkmark"></span> Recurring
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="name">
    <span class="checkmark"></span> Cancelled
    </label>
                                                        </div>
                                                        <button type="submit" class="btn w-100 btn-primary">Apply</button>
                                                        <button type="reset" class="btn w-100 btn-grey">Reset</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="multipleSelection">
                                                <div class="selectBox">
                                                    <p class="mb-0"><i class="fas fa-bookmark me-1 select-icon"></i> By Category</p>
                                                    <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                                </div>
                                                <div id="checkBoxes">
                                                    <form action="#">
                                                        <p class="checkbox-title">Category</p>
                                                        <div class="form-custom">
                                                            <input type="text" class="form-control bg-grey" placeholder="Enter Category Name">
                                                        </div>
                                                        <div class="selectBox-cont">
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="category">
    <span class="checkmark"></span> Advertising
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="category">
    <span class="checkmark"></span> Food
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="category">
    <span class="checkmark"></span> Marketing
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="category">
    <span class="checkmark"></span> Repairs
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="category">
    <span class="checkmark"></span> Software
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="category">
    <span class="checkmark"></span> Stationary
    </label>
                                                            <label class="custom_check w-100">
    <input type="checkbox" name="category">
    <span class="checkmark"></span> Travel
    </label>
                                                        </div>
                                                        <button type="submit" class="btn w-100 btn-primary">Apply</button>
                                                        <button type="reset" class="btn w-100 btn-grey">Reset</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="report-btn">
                                                <a href="#" class="btn">
                                                    <img src="assets/img/icons/invoices-icon5.png" alt="" class="me-2"> Generate report
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="app-listing">
                                <li>
                                    <div class="multipleSelection">
                                        <div class="selectBox">
                                            <p class="mb-0"><i class="fas fa-bookmark me-1 select-icon"></i> By Category</p>
                                            <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                        </div>
                                        <div id="checkBoxes">
                                            <form action="#">
                                                <p class="checkbox-title">Category</p>
                                                
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                    <input type="checkbox" name="category">
                                                    <span class="checkmark"></span> Advertising
                                                    </label>
                                                                                                                                                        <label class="custom_check w-100">
                                                    <input type="checkbox" name="category">
                                                    <span class="checkmark"></span> Food
                                                    </label>
                                                                                                                                                        <label class="custom_check w-100">
                                                    <input type="checkbox" name="category">
                                                    <span class="checkmark"></span> Marketing
                                                    </label>
                                                                                                                                                        <label class="custom_check w-100">
                                                    <input type="checkbox" name="category">
                                                    <span class="checkmark"></span> Repairs
                                                    </label>
                                                                                                                                                        <label class="custom_check w-100">
                                                    <input type="checkbox" name="category">
                                                    <span class="checkmark"></span> Software
                                                    </label>
                                                                                                                                                        <label class="custom_check w-100">
                                                    <input type="checkbox" name="category">
                                                    <span class="checkmark"></span> Stationary
                                                    </label>
                                                                                                                                                        <label class="custom_check w-100">
                                                    <input type="checkbox" name="category">
                                                    <span class="checkmark"></span> Travel
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn w-100 btn-primary">Apply</button>
                                                <button type="reset" class="btn w-100 btn-grey">Reset</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
    
    
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Project</th>
                                    <th>Tgl.Terakhir</th>
                                    <th>Progres</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td></td>
                                    <td>12-12-2002</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-success">Complate</span><br>
                                        <span class="badge badge-warning">On-Hold</span><br>
                                        <span class="badge badge-info">On-Progress</span><br>
                                        <span class="badge badge-danger">Finish</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="actions ">
                                            <a href="javascript:;" class="btn btn-sm bg-success-light me-2 ">
                                                <i class="feather-eye"></i>
                                            </a>
                                            {{-- <a href="edit-sports.html" class="btn btn-sm bg-danger-light me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="edit-sports.html" class="btn btn-sm bg-danger-light">
                                                <i class="feather-trash-2"></i>
                                            </a> --}}
    
    
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