<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
    
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">SERPO</h3>
                            </div>
    
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                <a href="{{ route('serpo.add') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>

                            </div>
                        </div>
                        <div class="col-md-6">
    
                            <a href="./index.php?page=serpo&tahun=true"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Tahun Ini</button></a>
                            <a href="./index.php?page=serpo"><button type="button" class="mb-xs mt-xs mr-xs btn btn-danger">Tagihan Aktif</button></a>
    
                        </div>
                    </div>
                    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    
    
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
    
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Paket</th>
                                    <th>Periode</th>
                                    <th>Tagihan</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($serpos as $serpo)
                                    @php
                                    $prog = ($serpo->PA / 30) * 100;
                                    $prog = $prog > 0 ? number_format($prog) : $prog;
                                    $tagIndex = $serpo->paket;
                                    $paket = isset($paket_tag[$tagIndex]) ? $paket_tag[$tagIndex] : "";
                                    @endphp
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td class="">
                                        {{ $paket }}
                                    </td>
                                    <td>{{ ucwords($serpo->periode) }}</td>
                                    <td>Rp. {{ number_format($serpo->tagihan, 0, ',', '.') }}</td>
                                    <td class="text-center">
                                        @php
                                        $status = $stat[$serpo->status];
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
                                        $bayar = $pay[$serpo->payment];
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
                                            <a href="{{ route('serpos.detail', ['pid' => $serpo->id]) }}" class="btn btn-sm bg-success-light me-2 ">
                                                <i class="feather-eye"></i>
                                            </a>
                                            <a href="{{ route('serpos.edit', ['id' => $serpo->id]) }}" class="btn btn-sm bg-danger-light me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="{{ route('_serpos.del', ['id' => $serpo->id, 'periode' => $serpo->periode]) }}" class="btn btn-sm bg-danger-light" onclick="return confirm('Are you sure want to delete this project?')">
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