<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
    
                <div class="card-header fw-bolder fs-6 bg-info text-white">
                    Detail Projek
                </div>
    
            </div>
            <div class="mb-4">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        Report Detail Laporan Keuangan
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <li><a class="dropdown-item" href="{{ route('_detail.keuangan', ['id' => $project->id]) }}">All</a></li>
                        <li><a class="dropdown-item" href="{{ route('_detail.keuangan', ['id' => $project->id, 'type' => 'Biaya Opersional']) }}">Operasional</a></li>
                        <li><a class="dropdown-item" href="{{ route('_detail.keuangan', ['id' => $project->id, 'type' => 'Biaya Material']) }}">Material</a></li>
                        <li><a class="dropdown-item" href="{{ route('_detail.keuangan', ['id' => $project->id, 'type' => 'Biaya Tools']) }}">Tools</a></li>
                        <li><a class="dropdown-item" href="{{ route('_detail.keuangan', ['id' => $project->id, 'type' => 'Biaya Gaji']) }}">Gaji/Fees</a></li>  
                        <li><a class="dropdown-item" href="{{ route('_detail.keuangan', ['id' => $project->id,   'type' => 'Biaya Lainnya']) }}">Biaya Lainnya</a></li>  
                    </ul>
                    <div class="col-auto text-end float-end download-grp">
                        <a href="{{ route('download.pdf', ['id' => $project->id, 'type' => isset($type) ? $type : null]) }}" class="btn btn-danger me-2"><i class="fas fa-download"></i> PDF</a>
                        <a href="{{ route('download.exel', ['id' => $project->id, 'type' => isset($type) ? $type : null]) }}" class="btn btn-success me-2"><i class="fas fa-download"></i> Exel</a>
                    </div>  
                </div>
                  
               
            </div>
            <div class="card card-table">
                <div class="card-body my-3">
                    <div class="row container">
                        <div class="col-md-6 col-sm-4 col-12">                            
                            <h6 class="invoice-name">Project Manager</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white ">
                               {{ $manager->firstname.' '.$manager->lastname }}
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">Tgl.Mulai</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white">
                               {{ $project->start_date }}
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">Tgl.Berakhir</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white">
                               {{ $project->end_date }}
                            </p>
                        </div>
                    </div>
                    <div class="row container">
                        <div class="col-md-6 col-sm-4 col-12">                            
                            <h6 class="invoice-name">Project Name</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white px-3">
                                @php
                                    $paket_tag = [
                                    $project->keterangan,
                                    "Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025",
                                    "Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025",
                                    "Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025",
                                    "Papua 1 - Serpo SBU Sulawesi & IBT 2022-2025",
                                    "Papua 2 - Serpo SBU Sulawesi & IBT 2022-2025",
                                    "Konawe - Serpo SBU Sulawesi & IBT 2022-2025"
                                ];
                                @endphp
                               
                                {{ $paket_tag[$project->paket] }}
                                
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">Project Status</h6>
                        
                                        @php
                                        $status=$stat[$project->status];
                                        @endphp
                                    
                                        @switch($status)
                                            @case('Pending')
                                            <p class="justify-content-center bg-danger border rounded-pill d-flex text-white">{{ $status }}</p>
                                                @break
                                            
                                            @case('On-Progress')
                                            <p class="justify-content-center bg-warning border rounded-pill d-flex text-white">{{ $status }}</p>
                                            @break
                                            @case('On-Hold')
                                            <p class="justify-content-center bg-info border rounded-pill d-flex text-white">{{ $status }}</p>
                                            @break
                                            @case('Complete')
                                            <p class="justify-content-center bg-success border rounded-pill d-flex text-white">{{ $status }}</p>
                                            @break
                                            @case('Finish')
                                            <p class="justify-content-center bg-danger border rounded-pill d-flex text-white">{{ $status }}</p>
                                            @break
                                            @default
                                                <!-- Tindakan jika tidak ada kasus yang cocok -->
                                        @endswitch
                            
                        </div>
                        <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">Status Pembayaran</h6>
                            
                            @php
                            $payment=$pay[$project->payment];
                            @endphp

                        
                            @switch($payment)
                                @case('Belum Ditagih')
                                <p class="justify-content-center bg-danger border rounded-pill d-flex text-white">{{ $payment }}</p>
                                    @break
                                
                                @case('Sudah Ditagih')
                                <p class="justify-content-center bg-info border rounded-pill d-flex text-white">{{ $payment }}</p>
                                @break
                                @case('Sudah Terbayar')
                                <p class="justify-content-center bg-success border rounded-pill d-flex text-white">{{ $payment }}</p>
                                @break
                                
                                @default
                                    <!-- Tindakan jika tidak ada kasus yang cocok -->
                            @endswitch
                        </div>
                    </div>
                    <div class="row container">
                        {{-- <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">No.PO/Kontrak</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white">
                               hallo hallo
                            </p>
                        </div>
                        <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">Nilai Kontrak</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white">
                               hallo hallo
                            </p>
                        </div> --}}
                        <div class="col-md-3 col-sm-4 col-6">                            
                            <h6 class="invoice-name">Nama Bank</h6>
                            <p class="justify-content-center bg-secondary border rounded-pill d-flex text-white">
                               BCA
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
                                       
                                        {{-- <td class="text-end">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="{{ '#EditTask'.$task->id }}" class="d-flex btn btn-sm bg-danger-light me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="{{ route('_del.task', ['id' => $task->id]) }}" onclick="return confirm('Are you sure want to delete this task?')" class="btn btn-sm bg-success-light me-2 "> <i class="feather-trash-2"></i></i></a>
                                            </div>
                                            
                                        </td> --}}
                                    </tr>
                                </tbody>

                               
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
    
            
        </div>
    </div>
</x-app-layout>