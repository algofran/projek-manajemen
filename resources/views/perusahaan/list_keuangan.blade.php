
@extends('layouts.layout') @section('content')
<div class="div">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-header fw-bolder fs-6 bg-danger bg-gradient text-white mb-4">
                    Lists Keuangan Projek
                </div>
                <div class="card card-table">
                    <div class="card-body">
        
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
                                            $prog= 0;
                                            $prog = ($project->PA/30) * 100;
                                            $prog = $prog > 0 ?  number_format($prog) : $prog;
                                                //dd($project->paket);
                                            if ($project->paket != 0){
                                                echo $paket_tag[$project->paket];
                                            } else {
                                            echo $project->keterangan;
                                            }
                                        @endphp
                                        </td>   
                                        <td>{{ $project->end_date }}</td>
                                       {{-- @php
                                           dd($project->prog);
                                       @endphp --}}
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="{{ $prog }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $prog }}%;">
                                                        {{ $prog }} %
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
                                                <a href="{{ route('_detail.keuangan', ['id' => $project->id]) }}" class="btn btn-sm bg-success-light me-2 ">
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
    
    </div>
    @endsection @section('script')
    <script>
        feather.replace();
    </script>
    @endsection