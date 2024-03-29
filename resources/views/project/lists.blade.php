<x-app-layout> 
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
    
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">List Project</h3>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                <a href="{{ route('project.add') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="btn btn-primary me-2">Active</div>
                                    <div class="btn btn-warning me-2">On-Hold</div>
                                    <div class="btn btn-success me-2">Complete</div>
                                    <div class="btn btn-danger me-2">Finish</div>
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
                                                <span class="badge badge-default">{{ $status }}</span>
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
                                        <div class="actions ">
                                            <a href="{{ route('project.detail', ['pid' => $project->id]) }}" class="btn btn-sm bg-success-light me-2 ">
                                                <i class="feather-eye"></i>
                                            </a>
                                            <a href="{{ route('project.edit', ['id' => $project->id]) }}" class="btn btn-sm bg-danger-light me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="{{ route('_project.del', ['id' => $project->id, 'status' => $project->status]) }}" class="btn btn-sm bg-danger-light" onclick="return confirm('Are you sure want to delete this project?')">
                                                <i class="feather-trash-2"></i>
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
</x-app-layout>