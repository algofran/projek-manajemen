@extends('layouts.layout') @section('content')
<div class="div">
  <div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-header fw-bolder fs-6 bg-danger bg-gradient text-white">
                Data Project 
            </div>
        </div>
        <div class="card card-table">
            <div class="card-body">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">List Project</h3>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-4">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-danger dropdown-toggle mt-4" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Status
                                            @if ($status == 'Pending'||$status == 'On-Progress'||$status == 'Finish')
                                            {{ $status }}
                                            @endif
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <li><a class="dropdown-item" href="{{ route('project.lists') }}">All</a></li>
                                            <li><a class="dropdown-item" href="{{ route('project.lists', ['status' => '1']) }}">Pending</a></li>
                                            <li><a class="dropdown-item" href="{{ route('project.lists', ['status' => '2']) }}">On-Progress</a></li>
                                            <li><a class="dropdown-item" href="{{ route('project.lists', ['status' => '3']) }}">Finish</a></li>
                                        </ul>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            @role(['admin', 'manager'])
                            <div class="col-auto text-end float-end download-grp">
                                <a href="{{ route('project.add') }}" class="btn btn-outline-danger"><i class="fas fa-plus"></i> Tambah</a>
                            </div>  
                            @endrole
                        </div>
                    </div>
                </div>
                

                <div class="table-responsive">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped" id="dataTable3">
                        <thead class="student-thread">
                            <tr>
                                
                                <th>No</th>
                                <th>Project</th>
                                <th>Manager</th>
                                <th>No.Kontak/PO</th>
                                <th>Progres</th>
                                <th>Status</th>
                                <th>Pembayaran</th>
                                <th class="text-end">Action</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                            <tr id="{{ $project->id }}">
                                <th class="text-center">{{ $loop->iteration }}</th>
                                <td>
                                    <p>{{ ucwords($project->name) }}</p>
                                    <p class="truncate text-danger">{{ $project->tag }}</p>
                                    <p class="truncate text-info">{{ $project->vendor_tag }}</p>
                                </td>
                                <td>
                                    @foreach ($managers->where('id', $project->user_id) as $data)
                                        {{ $data->firstname .' '.$data->lastname}}
                                    @endforeach
                                </td>
                                <td class="center">{{ $project->po_number }}</td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="{{ $project ? $project->progress : 0 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $project && $project->progress == 100 ? '100%' : ($project && $project->progress == 0 ? '0%' : $project->progress.'%') }}">
                                            {{ $project ? $project->progress : 0 }} %
                                        </div>
                                    </div>
                                    
                                </td>
                                <td class="text-center">
                                    @php
                                    $status = $project->status_label;
                                    @endphp
                                
                                    @switch($status)
                                        @case('Pending')
                                            <span class="badge badge-info">{{ $status }}</span>
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
                                
                                <td class="text-center">
                                    @php
                                    $bayar = $project->payment_label;
                                    @endphp
                                
                                    @switch($bayar)
                                        @case('Sudah Terbayar')
                                            <span class="badge badge-success">{{ $bayar }}</span>
                                            @break
                                        
                                        @case('Belum Ditagih')
                                            <span class="badge badge-danger">{{ $bayar }}</span>
                                            @break
                                        
                                        @case('Sudah Ditagih')
                                            <span class="badge badge-info">{{ $bayar }}</span>
                                            @break
                                        
                                        
                                        @default
                                            <!-- Tindakan jika tidak ada kasus yang cocok -->
                                    @endswitch
                                </td>
                                
                                <td class="text-end">
                                    <div class="actions">
                                        <a href="{{ route('project.detail.show', ['id' => $project->id]) }}" class="btn btn-sm bg-success-light me-2 ">
                                            <i class="feather-eye"></i>
                                        </a>
                                        @role(['admin', 'manager'])

                                        <a href="{{ route('project.edit', ['id' => $project->id]) }}" class="btn btn-sm bg-danger-light me-2">
                                            <i class="feather-edit"></i>
                                        </a>
                                        <a href="{{ route('_project.del', ['id' => $project->id, 'status' => $project->status]) }}" class="btn btn-sm bg-danger-light" onclick="return confirm('Are you sure want to delete this project?')">
                                            <i class="feather-trash-2"></i>
                                        @endrole
                                        </a>
                                        
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
</div>
@endsection @section('script')
<script>
    feather.replace();
</script>
@endsection