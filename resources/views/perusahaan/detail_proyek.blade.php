<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
    
                <div class="card-header fw-bolder fs-6 bg-info text-white">
                    Detail Projek
                </div>
    
            </div>
            <div class="card card-table">
    
                <div class="card-body justify-content-start mx-4 my-3">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class=" text-center">
                                <h6>Project Manager/Staff</h6>
                                <img src="{{ asset('assets/img/user.png') }}" alt="" width="90">
                                <p>{{ $manager->firstname.' '.$manager->lastname }}</p>                   
                                
                            </div><br>
                            <h6 class="invoice-name">Pendapatan Projek</h6>
                            <p class="invoice-details invoice-details-two">
                                {{ "Rp. " . number_format($project->tagihan, 0, ',', '.') }}
                            </p>
                            <h6 class="invoice-name">Pengeluaran Projek</h6>
                            <p class="invoice-details invoice-details-two">
                                {{ "Rp. " . number_format($totalExpense, 0, ',', '.') }}
                            </p>
    
                        </div>
                        <div class="col-md-8 col-sm-12 ">
                            <h6 class="invoice-name">{{ $mitra }} Name</h6>
                            
                            <p class="invoice-details invoice-details-two text-info">
                                @php
                                    
                                    $tagIndex = $project->paket;
                                    $paket = isset($paket_tag[$tagIndex]) ? $paket_tag[$tagIndex] : $name;
                                @endphp
                                {{ $paket }}

                            </p>
                            <h6 class="invoice-name">Sektor/Area</h6>
                            
                            <p class="invoice-details invoice-details-two text-info">
                                {{ $project->sektor }}
                            </p>
                            
                            <h6 class="invoice-name">Periode</h6>
                            
                            <p class="invoice-details invoice-details-two text-info">
                                {{ $project->periode }}
                            </p>
                            
                            <div class="row">
                                <div class="col-4">
                                    <h6 class="invoice-name">Projek Status</h6>
                                    <p class="invoice-details invoice-details-two">
                                        @php
                                        $status = $project->status_label;
                                       
                                        @endphp
                                    
                                        @switch($status)
                                            @case('Pending')
                                                <button class="btn btn-danger btn-sm">{{ $status }}</button>
                                                @break
                                            
                                            @case('On-Progress')
                                                <button class="btn btn-info btn-sm text-light">{{ $status }}</button>
                                                @break
                                            
                                            @case('On-Hold')
                                                <button class="btn btn-warning btn-sm">{{ $status }}</button>
                                                @break
                                            
                                            @case('Complete')
                                                <button class="btn btn-success btn-sm">{{ $status }}</button>
                                                @break
                                            
                                            @case('Finish')
                                                <button class="btn btn-danger">{{ $status }}</button>
                                                @break
                                            
                                            @default
                                                <!-- Tindakan jika tidak ada kasus yang cocok -->
                                        @endswitch
                                    </p>
                                </div>
                                
                                <div class="col-5">
                                    <h6 class="invoice-name">Status Pembayaran</h6>
                                    <p class="invoice-details invoice-details-two ">
                                        @php
                                        $bayar = $project->payment_label;
                                        @endphp
                                    
                                        @switch($bayar)
                                            @case('Sudah Terbayar')
                                                <span class="btn btn-sm btn-success">{{ $bayar }}</span>
                                                @break
                                            
                                            @case('Belum Ditagih')
                                                <span class="btn btn-sm btn-danger">{{ $bayar }}</span>
                                                @break
                                            
                                            @case('Sudah Ditagih')
                                                <span class="btn btn-sm btn-info text-light">{{ $bayar }}</span>
                                                @break
                                            
                                            
                                            @default
                                                <!-- Tindakan jika tidak ada kasus yang cocok -->
                                        @endswitch
                                    </p>

                                </div>
                                <div class="col-3">
                                    <h6 class="invoice-name">Bank</h6>
                                    <p class="invoice-details invoice-details-two ">
                                        <span class="btn btn-sm btn-info text-white">BCA</span>
                                    </p>

                                </div>
                            </div>
                            <h6 class="invoice-name">Project Progress</h6>
                            @php
                                $prog = ($project->PA / 30) * 100;
                                $prog = $prog > 0 ? number_format($prog) : $prog;
                            @endphp
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $prog }}%;" aria-valuenow="{{ $prog }}" aria-valuemin="0" aria-valuemax="100">{{ $prog }}%</div>
                                    </div>
                            
                            
                        </div>
                        
                    </div>
                    
                    
                </div>
            </div>
            <div class="card card-table">
                <div class="card-body">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Daftar Tugas</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="{{ route('_add.task', ['id' => $project->id]) }}" class="btn btn-primary"><i class="fas fa-plus"> Tambah Tugas</i></a>
                            </div>
    
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Penanggunjawab</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                                @foreach($tasks as $task)
                                <tbody>
                                    <tr id="{{ $task->id }}">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class=" text-info">
                                            
                                                {{ ucwords($task->task) }}</></td>
                                            
                                        <td>
                                            {{ strip_tags($task->description) }}
                                        </td>
                                        <td>{{ date("d M Y", strtotime($end_date)) }}</td>
                                        <td>{{ ucwords($task->user->firstname . ' ' . $task->user->lastname) }}</td>
                                        <td>
                                            @switch($task->status)
                                                @case(1)
                                                    <span class="badge badge-warning">Pending</span>
                                                    @break
                                                @case(2)
                                                    <span class="badge badge-primary">On-Progress</span>
                                                    @break
                                                @case(3)
                                                    <span class="badge badge-success">Done</span>
                                                    @break
                                            @endswitch
                                        </td>
                                        <td class="text-end">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="{{ '#EditTask'.$task->id }}" class="btn btn-sm bg-danger-light me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="{{ route('_del.task', ['id' => $task->id]) }}" onclick="return confirm('Are you sure want to delete this task?')" class="btn btn-sm bg-success-light me-2 "> <i class="feather-trash-2"></i></i></a>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                </tbody>

                                <div class="modal custom-modal fade bank-details" id="{{ 'EditTask'.$task->id }}" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="form-header text-start mb-0">
                                                    <h4 class="mb-0">Edit Tugas</h4>
                                                </div>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('_update.task', $task->id) }}" method="post">
                                                @csrf
                                            <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="hidden" name="project_id" value="{{ $task->project_id }}">
                                                            <div class="form-group">
                                                                <label>Nama Pekerjaan</label>
                                                                <input type="text" class="form-control" name="task" required value="{{ $task->task }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Penanggung jawab</label><br>
                                                                <select class="form-control form-select" name="user_id">
                                                                    <option>Pilih Penanggunjawab</option>
                                                                    @foreach ($employees as $employee)
                                                                    <option value="{{ $employee->id }}"  {{ in_array($employee->id, explode(',', $task->user_id)) ? 'selected' : '' }}>{{ ucwords($employee->firstname.' '.$employee->lastname) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Jadwal Pelaksana</label>
                                                                <div class="col-md">
                                                                    <div class="input-group mb-3">
                                                                        <input type="date" class="form-control" placeholder="Mulai" name="date_created" required value="{{ $task->date_created }}">
                                                                        <span class="input-group-text">s/d</span>
                                                                        <input type="date" class="form-control" placeholder="Selesai" name="due_date" required value="{{ $task->due_date }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Project Status</label>
                                                                <div class="border">
                                                                    <select class="form-control form-select" name="status">
                                                                        <option value="0" {{ $task->status == 0 ? 'selected' : '' }}>Belum Dikerjakan</option>
                                                                        <option value="1" {{ $task->status == 0 ? 'selected' : '' }}>Sedang Dikerjakan</option>
                                                                        <option value="3" {{ $task->status == 0 ? 'selected' : '' }}>Sudah Selesai</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea rows="5" cols="5" class="form-control rounded border border-dark" name="description" required>{{ $task->description }}</textarea>
                                                    </div>
                                        </div>
                                        
                    
                                        <div class="modal-footer">
                                            <div class="bank-details-btn">
                
                                                <button type="submit" class="btn save-invoice-btn btn-primary"> Save</button>
                                                    
                                                </a>
                                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>  
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
    
            <div class="card card-table">
                <div class="card-body">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Daftar Pengeluaran</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="{{ route('_add.pengeluaran', ['id' => $project->id]) }}" class="btn btn-primary"><i class="fas fa-plus"> Tambah Pengeluaran</i></a>
                            </div>
    
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jenis Pengeluaran</th>
                                    <th>Keterangan</th>
                                    <th>Nama Pengguna</th>
                                    <th>Biaya</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            @foreach($activities as $activity)
                            <tbody>
                                <tr id="{{ $activity->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ date("d M Y", strtotime($activity->date)) }}</td>
                                    <td><b>{{ ucwords($activity->subject) }}</b></td>
                                    <td>
                                        <p class="truncate">{{ strip_tags($activity->comment) }}</p>
                                    </td>
                                    <td>{{ ucwords($activity->user->firstname . ' ' . $activity->user->lastname) }}</td>
                                    <td>{{ "Rp. " . number_format($activity->cost, 0, ',', '.') }}</td>
                                    <td class="center actions-hover actions-fade">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="{{ '#EditPengeluaran'.$activity->id }}" class="btn btn-sm bg-danger-light me-2">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('_pengeluaran.del', ['id' => $activity->id]) }}" onclick="return confirm('Are you sure want to delete this pengeluaran?')" class="btn btn-sm bg-success-light me-2 "> <i class="feather-trash-2"></i></i></a>
                                        </div>
                                       </td>
                                </tr>
                            </tbody>
                            
                            <div class="modal custom-modal fade bank-details" id="{{ 'EditPengeluaran'.$activity->id }}" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="form-header text-start mb-0">
                                                <h4 class="mb-0">Edit Pengeluaran</h4>
                                            </div>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('pengeluaran.update', $activity->id) }}" method="post">
                                            @csrf
                                            {{-- @method('PATCH') --}}
                                        <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="project_id" value="{{ $activity->project_id }}">
                                                        <div class="form-group">
                                                            <label>Project Status</label>
                                                            <div class="border">
                                                                <select class="form-control form-select" name="subject">
                                                                    @foreach($subjectOptions as $option)
                                                                    <option value="{{ $option }}" {{ $activity->subject == $option ? 'selected' : '' }}>{{ $option }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error('subject')
                                                            <span class="alert alert-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama Pengguna</label>
                                                            <select class="form-control form-select" name="user_id">
                                                                <option>Pilih Pengguna</option>
                                                                @foreach ($employees as $employee)
                                                                <option value="{{ $employee->id }}"  {{ in_array($employee->id, explode(',', $activity->user_id)) ? 'selected' : '' }}>{{ ucwords($employee->firstname.' '.$employee->lastname) }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('user_id')
    <span class="alert alert-danger">>{{ $message }}</span>
    @enderror
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Tanggal</label>
                                                            <div class="col-md">
                                                                <div class="input-group mb-3">
                                                                    <input type="date" class="form-control" name="date" value="{{ $activity->date }}" required>
                                                                </div>
                                                            </div>
                                                            @error('date')
    <span class="alert alert-danger">{{ $message }}</span>
    @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Activity Cost</label>
                                                            <input type="number" class="form-control" name="cost" value="{{ $activity->cost }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <textarea rows="5" cols="5" class="form-control rounded border border-dark" name="comment" required value="comment">{{ $activity->comment }}</textarea>
                                                        @error('comment')
                                                        <span class="alert alert-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                    </div>
                                    
                
                                    <div class="modal-footer">
                                        <div class="bank-details-btn">
            
                                            <button type="submit" class="btn save-invoice-btn btn-primary"> Save</button>
                                                
                                            </a>
                                            <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>  
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>