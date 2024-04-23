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
                                                    <img src="assets/img/icons/invoices-icon5.png" alt="" class="me-2"> Download
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
                                @php
                                
                            @endphp
                                @foreach($projects as $project)
                                <tr>
                                   
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                    @php
                                    //dd($project->paket);
                                        if ($project->paket != 0){
                                            echo $paket_tag[$project->paket];
                                        } else {
                                        echo $project->keterangan;
                                        }
                                    @endphp
                                    </td>   
                                    <td>12-12-2002</td>
                                   {{-- @php
                                       dd($project->prog);
                                   @endphp --}}
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $project->prog }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $project->prog }}%;">
                                                    {{ $project->prog }} %
                                                </div>
                                            </div>
                                        </td>
                                    
                                    <td>
                                        @php
                                        $status = $stat[$project->status];
                                        @endphp
                                        @switch($status)
                                        @case('Pending')
                                            <span class="badge badge-danger">{{ $status }}</span>
                                            @break
                                        
                                        @case('On-Progress')
                                            <span class="badge badge-primary">{{ $status }}</span>
                                            @break
                                        
                                        @case('On-Hold')
                                            <span class="badge badge-warning">{{ $status }}</span>
                                            @break
                                        
                                        @case('Complete')
                                            <span class="badge badge-success">{{ $status }}</span>
                                            @break
                                        
                                        @case('Finish')
                                            <span class="badge badge-danger">{{ $status }}</span>
                                            @break
                                        
                                        @default
                                            <!-- Tindakan jika tidak ada kasus yang cocok -->
                                        @endswitch
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>