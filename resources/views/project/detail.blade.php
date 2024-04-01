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
                                {{ "Rp. " . number_format($project->payment, 0, ',', '.') }}
                            </p>
                            <h6 class="invoice-name">Pengeluaran Projek</h6>
                            <p class="invoice-details invoice-details-two">
                                {{ "Rp. " . number_format($totalExpense, 0, ',', '.') }}
                            </p>
    
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <h6 class="invoice-name">Project Name</h6>
                            <p class="invoice-details invoice-details-two text-info">
                                {{ $project->name }}
                            </p>
                            <h6 class="invoice-name">No. Kontak</h6>
                            <p class="invoice-details invoice-details-two">
                                {{ $project->po_number }}
                            </p>
                            <h6 class="invoice-name">Keterangan</h6>
                            <p class="invoice-details invoice-details-two">
                                {{ $project->description }}
                            </p>
                            <h6 class="invoice-name">Tanggal Mulai</h6>
                            <p class="invoice-details invoice-details-two">
                                {{ $project->start_date }}
                            </p>
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
                        <div class="col-md-4 col-sm-12 "><br><br><br><br><br><br><br><br><br><br>
                            <h6 class="invoice-name">Tanggal Berakhir</h6>
                            <p class="invoice-details invoice-details-two">
                                {{ $project->end_date }}
                            </p>
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
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <h6 class="invoice-name">Project Progress</h6>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">{{ $progress }}%</div>
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
                                <a href="#" class="btn btn-primary"><i class="fas fa-plus"> Tambah Tugas</i></a>
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
                                        <td class="fw-bolder text-info">
                                            
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
                                        <td class="center actions-hover actions-fade">
                                            {{-- <a href="{{ route('task.edit', ['tid' => $task->id]) }}"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('_task_del', ['id' => $task->id, 'pid' => $id]) }}" onclick="return confirm('Are you sure want to delete this task?')"><i class="fa fa-trash-o remove"></i></a> --}}
                                        </td>
                                    </tr>
                                </tbody>
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
                                <a href="#" class="btn btn-primary"><i class="fas fa-plus"> Tambah Pengeluaran</i></a>
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
                            <tbody>
                                @foreach($activities as $activity)
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
                                        {{-- <a href="{{ route('activity.edit', ['id' => $activity->id]) }}"><i class="fa fa-edit"></i></a>
                                        <a href="{{ route('_activity_del', ['id' => $activity->id, 'pid' => $id]) }}" onclick="return confirm('Are you sure want to delete this task?')"><i class="fa fa-trash-o remove"></i></a> --}}
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