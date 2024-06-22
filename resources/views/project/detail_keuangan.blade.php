@extends('layouts.layout') @section('content')
<div class="div">
    <div class="row">
        <div class="col-12">
            <div class="card card-table">
                <div class="card-header fw-bolder fs-6 bg-danger bg-gradient text-white">
                    Detail Keuangan Projek
                </div>
    
            </div>
            <div class="mb-4 row">
                <div class="dropdown">
                    <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        Report Detail
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><a class="dropdown-item" href="{{ route('_detail.keuangan_project', ['id' => $project->id]) }}">All</a></li>
                        <li><a class="dropdown-item" href="{{ route('_detail.keuangan_project', ['id' => $project->id, 'type' => 'Biaya Operasional']) }}">Operasional</a></li>
                        <li><a class="dropdown-item" href="{{ route('_detail.keuangan_project', ['id' => $project->id, 'type' => 'Biaya Material']) }}">Material</a></li>
                        <li><a class="dropdown-item" href="{{ route('_detail.keuangan_project', ['id' => $project->id, 'type' => 'Biaya Tools']) }}">Tools</a></li>
                        <li><a class="dropdown-item" href="{{ route('_detail.keuangan_project', ['id' => $project->id, 'type' => 'Biaya Gaji']) }}">Gaji/Fees</a></li>  
                        <li><a class="dropdown-item" href="{{ route('_detail.keuangan_project', ['id' => $project->id,   'type' => 'Biaya Lainnya']) }}">Biaya Lainnya</a></li>  
                    </ul>
                    <div class="col-auto text-end float-end download-grp">
                        <a href="{{ route('download.project.pdf', ['id' => $project->id, 'type' => isset($type) ? $type : null ]) }}" class="btn btn-danger me-2"><i class="fas fa-download"></i> PDF</a>
                        <a href="{{ route('download.project.exel', ['id' => $project->id, 'type' => isset($type) ? $type : null ]) }}" class="btn btn-success me-2"><i class="fas fa-download"></i> Exel</a>
                    </div>  
                </div>
            </div>
            <div class="card card-table">
                <div class="card-body my-3">
                    <div class="row container">
                        <div class="col-md-6 col-lg-6 col-sm-12 col-12">                            
                            <h6 class="invoice-name">Project Manager</h6>
                            <p class="justify-content-center bg-gradient bg-secondary border rounded-pill d-flex text-white ">
                               {{ $manager->firstname.' '.$manager->lastname }}
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-12 col-6">                            
                            <h6 class="invoice-name">Tgl.Mulai</h6>
                            <p class="justify-content-center bg-gradient bg-secondary border rounded-pill d-flex text-white">
                               {{ $project->start_date }}
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-12 col-6">                            
                            <h6 class="invoice-name">Tgl.Berakhir</h6>
                            <p class="justify-content-center bg-gradient bg-secondary border rounded-pill d-flex text-white">
                               {{ $project->end_date }}
                            </p>
                        </div>
                    </div>
                    <div class="row container">
                        <div class="col-md-6 col-sm-12 col-12">                            
                            <h6 class="invoice-name">Project Name</h6>
                            <p class="justify-content-center bg-gradient bg-secondary border rounded-pill d-flex text-white px-3">
                               {{ $project->name }}
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-12 col-6">                            
                            <h6 class="invoice-name">Project Status</h6>
                        
                                        @php
                                        $status=$project->status_label;
                                        @endphp
                                    
                                        @switch($status)
                                            @case('Pending')
                                            <p class="justify-content-center bg-gradient bg-info border rounded-pill d-flex text-white">{{ $status }}</p>
                                                @break
                                            
                                            @case('On-Progress')
                                            <p class="justify-content-center bg-gradient bg-warning border rounded-pill d-flex text-white">{{ $status }}</p>
                                            @break
                                            @case('On-Hold')
                                            <p class="justify-content-center bg-gradient bg-warning border rounded-pill d-flex text-white">{{ $status }}</p>
                                            @break
                                            @case('Complete')
                                            <p class="justify-content-center bg-gradient bg-success border rounded-pill d-flex text-white">{{ $status }}</p>
                                            @break
                                            @case('Finish')
                                            <p class="justify-content-center bg-gradient bg-denger border rounded-pill d-flex text-white">{{ $status }}</p>
                                            @break
                                            @default
                                                <!-- Tindakan jika tidak ada kasus yang cocok -->
                                        @endswitch
                            
                        </div>
                        <div class="col-md-3 col-sm-12 col-6">                            
                            <h6 class="invoice-name">Status Pembayaran</h6>
                            
                            @php
                            $payment=$project->payment_label;
                            @endphp
    
                        
                            @switch($payment)
                                @case('Belum Ditagih')
                                <p class="justify-content-center bg-gradient bg-danger border rounded-pill d-flex text-white">{{ $payment }}</p>
                                    @break
                                
                                @case('Sudah Ditagih')
                                <p class="justify-content-center bg-gradient bg-info border rounded-pill d-flex text-white">{{ $payment }}</p>
                                @break
                                @case('Sudah Terbayar')
                                <p class="justify-content-center bg-gradient bg-success border rounded-pill d-flex text-white">{{ $payment }}</p>
                                @break
                                
                                @default
                                    <!-- Tindakan jika tidak ada kasus yang cocok -->
                            @endswitch
                        </div>
                    </div>
                    <div class="row container">
                        <div class="col-md-3 col-sm-12 col-6">                            
                            <h6 class="invoice-name">No.PO/Kontrak</h6>
                            <p class="justify-content-center bg-gradient bg-secondary border rounded-pill d-flex text-white">
                               {{ $project->po_number }}
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-12 col-6">                            
                            <h6 class="invoice-name">Nilai Kontrak</h6>
                            <p class="justify-content-center bg-gradient bg-secondary border rounded-pill d-flex text-white">
                               {{ 'Rp. ' . number_format($project->payment, 0, ',', '.') }}
                            </p>
                        </div>
                       
                            <div class="col-md-3 col-sm-12 col-6">                            
                                <h6 class="invoice-name">Total Biaya</h6>
                                <p class="justify-content-center bg-success border rounded-pill d-flex text-white">
                                    {{ 'Rp ' . number_format($tasks->sum('cost'), 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="col-md-3 col-sm-12 col-6">                            
                                <h6 class="invoice-name">Nama Bank</h6>
                                <p class="justify-content-center bg-info border rounded-pill d-flex text-white">
                                   {{ $project->bank }}
                                </p>
                            </div>
                      
                        
                    </div>
                    
                </div>
            </div>
            <div class="card card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Jenis Aktivitas</th>
                                    <th>Keterangan</th>
                                    <th>Biaya</th>
                                    {{-- <th class="text-end">Action</th> --}}
                                </tr>
                            </thead>
                            {{-- @php
                            dd($tasks);
                        @endphp --}}
                                @foreach($tasks as $task)
                                <tbody>
                                   
                                    <tr id="">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class=" text-info">{{ date('d M Y', strtotime($task->date)) }}</td>
                                        <td>{{ ucwords($task->subject) }}</td>
                                        <td>{{ strip_tags($task->comment) }}</td>
                                        <td>{{ 'Rp. ' . number_format($task->cost, 0, ',', '.') }}</td>
                                       
                                    </tr>
                                </tbody>
    
                               
                                @endforeach
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