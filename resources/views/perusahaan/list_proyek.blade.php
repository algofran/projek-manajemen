<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
    
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">List Proyeks {{ $mitra->mitra }}</h3>
                            </div>
    
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                {{-- <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a> --}}
                                <a href="{{ route('add.proyek', ['id' => $mitra->id]) }}" data-bs-toggle="modal" data-bs-target="#bank_details" class="btn btn-primary"><i class="fas fa-plus"> Tambah Project</i></a>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
    
                            <a href="./index.php?page=serpo&tahun=true"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Tahun Ini</button></a>
                            <a href="./index.php?page=serpo"><button type="button" class="mb-xs mt-xs mr-xs btn btn-danger">Tagihan Aktif</button></a>
    
                        </div> --}}
                    </div>
    
    
                    <div class="table-responsive">
                        @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
    
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Periode</th>
                                    <th>Sektor</th>
                                    <th>Jumlah PA</th>
                                    <th>Paket</th>
                                    <th>Keterangan</th>
                                    <th>Target</th>
                                    <th>Tagihan</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($proyeks as $item)
                                @php
                                
                                $prog= 0;
                                $prog = ($item->PA/30) * 100;
                                $prog = $prog > 0 ?  number_format($prog) : $prog;
                                $tagIndex = $item->paket;
                                $paket = isset($paket_tag[$tagIndex]) ? $paket_tag[$tagIndex] : "";
                                @endphp

                                 <tr id="{{ $item->id }}">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ ucwords($item->periode) }}</></td>
                                    <td>{{ $item->sektor }}</td>
                                    <td>{{ $item->PA }}</td>
                                    <td>{{ $paket }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>
                                        {{-- @php
                                            dd( $project );
                                        @endphp --}}
                                       
                                            
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $prog }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $prog }}%;">
                                                    {{ $prog }} %
                                                </div>
                                            </div>
                                        
                                    </td>
                                    <td>Rp. {{ number_format($item->tagihan, 0, ',', '.') }}</td>
                                    <td>
                                        @php
                                        $status = $stat[$item->status];
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
                                    <td>
                                        @php
                                        $bayar = $pay[$item->payment];
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
                                            <div class="actions ">
                                                <a href="{{ route('_detail.proyek', ['id' => $item->id]) }}" class="btn btn-sm bg-success-light me-2 ">
                                                    <i class="feather-eye"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="{{ '#Edititem'.$item->id }}" class="btn btn-sm bg-danger-light me-2">
                                                    <i class="feather-edit"></i>
                                                </a>
                                                <a href="{{ route('_del.proyek', ['id' => $item->id, 'periode' => $item->periode]) }}" class="btn btn-sm bg-danger-light" onclick="return confirm('Are you sure want to delete this item?')">
                                                    <i class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                    <div class="modal custom-modal fade bank-details" id="{{ 'Edititem'.$item->id }}" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="form-header text-start mb-0">
                                                        <h4 class="mb-0">Add item</h4>
                                                    </div>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('update', $item->id) }}" method="post">
                                                    @csrf
                                        
                                                <div class="modal-body">
                                                    <input type="" name="id_inst" value="{{ old('id_inst',$item->id_inst) }}">
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Periode</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" placeholder="Periode (Contoh : JANUARI 2024)..." value="{{ old('periode',$item->periode) }}" name="periode" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Sektor</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="sektor" class="form-control" value="{{ old('sektor', $item->sektor) }}"placeholder="Sektor/Area..." required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Jumlah PA</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="PA" class="form-control" value="{{ old('PA', $item->PA) }}" placeholder="Jumlah Aktivasi (PA)..." required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Keterangan</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="keterangan" class="form-control" value="{{ old('keteragan', $item->keterangan) }}" placeholder="Ketarangan..." required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Paket Serpo</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control mb-md" name="paket" required>
                                                                    <option value="">Pilih Paket Serpo</option>
                                                                    <option value="0" {{ old('paket', $item->paket) == 0 ? 'selected' : '' }}>Tidak Menggunakan Paket</option>
                                                                    <option value="1" {{ old('paket', $item->paket) == 1 ? 'selected' : '' }}>Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                                                    <option value="2" {{ old('paket', $item->paket) == 2 ? 'selected' : '' }}>Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                                                    <option value="3" {{ old('paket', $item->paket) == 3 ? 'selected' : '' }}>Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                                                    <option value="4" {{ old('paket', $item->paket) == 4 ? 'selected' : '' }}>Serpo URC Papua 1 - SBU Sulawesi & IBT 2022-2025</option>
                                                                    <option value="5" {{ old('paket', $item->paket) == 5 ? 'selected' : '' }}>Serpo URC Papua 2 - SBU Sulawesi & IBT 2022-2025</option>
                                                                    <option value="6" {{ old('paket', $item->paket) == 6 ? 'selected' : '' }}>Serpo URC Konawe - SBU Sulawesi & IBT 2022-2025</option>
                                                                    <!-- Tambahkan opsi lainnya di sini -->
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Tagihan</label>
                                                            <div class="col-md-10">
                                                                <input type="number" class="form-control" placeholder="Jumlah tagihan..." name="tagihan" value="{{ old('tagihan', $item->tagihan) }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Start Date</label>
                                                            <div class="col-md-10">
                                                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date', $item->start_date) }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">End Date</label>
                                                            <div class="col-md-10">
                                                                <input type="date" class="form-control" name="end_date" value="{{ old('end_date', $item->end_date) }}" required>
                                                            </div>
                                                        </div>
                                    
                            
                            
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Status Perkerjaan</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control form-select" name="status">
                            
                                                                    <option value="0" {{ old('status',$item->status) == 0 ? 'selected' : '' }}>Pending</option>
                                                                    <option value="1" {{ old('status',$item->status) == 1 ? 'selected' : '' }}>On-Progress</option>
                                                                    <option value="2" {{ old('status',$item->status) == 2 ? 'selected' : '' }}>Complete</option>
                            
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Status Pembayaran</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control form-select" name="payment" required>
                                                                    <option value="">Pilih Status Perkerjaan</option>
                                                                    <option value="0" {{ old('payment',$item->payment) == 0 ? 'selected' : '' }}>Belum Ditagih</option>
                                                                    <option value="1" {{ old('payment',$item->payment) == 1 ? 'selected' : '' }}>Proses Penagihan</option>
                                                                    <option value="2" {{ old('payment',$item->payment) == 2 ? 'selected' : '' }}>Sudah Terbayar</option>
                                                                </select>
                                                                @if ($errors->has('status'))
                                                                    <span class="text-danger">{{ $errors->first('status') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">item Manager</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control form-select" name="manager_id">
                                                                    <option value="">Pilih item Manager</option>
                                                                    @foreach ($managers as $manager)
                                                                    <option value="{{ $manager->id }}" {{ old('manager_id', $item->manager_id) == $manager->id ? 'selected' : '' }}>{{ ucwords($manager->username) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                </div>
                            
                                                <div class="modal-footer">
                                                    <div class="bank-details-btn">
                        
                                                        <button type="submit" class="btn save-invoice-btn btn-primary"> Save</button>
                                                            
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>  
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="modal custom-modal fade bank-details" id="bank_details" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="form-header text-start mb-0">
                                <h4 class="mb-0">Add item {{ $mitra->mitra }}</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('add.store') }}" method="post">
                            @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id_inst" value="{{ $mitra->id}}">
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Periode</label>
                                <div class="col-md-10">
                                    <input type="text" name="periode" class="form-control" value="{{ old('periode') }}" placeholder="Periode (Contoh : JANUARI 2024)..." required>
                                    @if ($errors->has('periode'))
                                        <span class="text-danger">{{ $errors->first('periode') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Sektor</label>
                                <div class="col-md-10">
                                    <input type="text" name="sektor" class="form-control" value="{{ old('sektor') }}" placeholder="Sektor/Area" required>
                                    @if ($errors->has('sektor'))
                                        <span class="text-danger">{{ $errors->first('sektor') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Keterangan</label>
                                <div class="col-md-10">
                                    <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}"placeholder="Keterangan.." required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Jumlah PA</label>
                                <div class="col-md-10">
                                    <input type="text" name="PA" class="form-control" value="{{ old('PA') }}" placeholder="Jumlah Aktivasi (PA)..." required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Paket Serpo</label>
                                <div class="col-md-10">
                                    <select class="form-control mb-md" name="paket">
                                        <option value="">Pilih Paket Untuk Serpo</option>
                                        <option value="0" {{ old('paket', $paket) == 0 ? 'selected' : '' }}>Tidak menggunkan paket</option>
                                        <option value="1" {{ old('paket', $paket) == 1 ? 'selected' : '' }}>Paket 2 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                        <option value="2" {{ old('paket', $paket) == 2 ? 'selected' : '' }}>Paket 3 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                        <option value="3" {{ old('paket', $paket) == 3 ? 'selected' : '' }}>Paket 7 - Serpo SBU Sulawesi & IBT 2022-2025</option>
                                        <option value="4" {{ old('paket', $paket) == 4 ? 'selected' : '' }}>Serpo URC Papua 1 - SBU Sulawesi & IBT 2022-2025</option>
                                        <option value="5" {{ old('paket', $paket) == 5 ? 'selected' : '' }}>Serpo URC Papua 2 - SBU Sulawesi & IBT 2022-2025</option>
                                        <option value="6" {{ old('paket', $paket) == 6 ? 'selected' : '' }}>Serpo URC Konawe - SBU Sulawesi & IBT 2022-2025</option>
                                        <!-- Tambahkan opsi lainnya di sini -->
                                    </select>
                                    @if ($errors->has('paket'))
                                        <span class="text-danger">{{ $errors->first('paket') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Tagihan</label>
                                <div class="col-md-10">
                                    <input type="number" name="tagihan" class="form-control" value="{{ old('tagihan') }}" placeholder="Jumlah tagihan..." required>
                                    @if ($errors->has('tagihan'))
                                        <span class="text-danger">{{ $errors->first('tagihan') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Start Date</label>
                                <div class="col-md-10">
                                    <input type="date" name="start_date" class="form-control" value="{{ old('start_date', now()->format('Y-m-d')) }}" required>
                                    @if ($errors->has('start_date'))
                                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">End Date</label>
                                <div class="col-md-10">
                                    <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                                    @if ($errors->has('end_date'))
                                        <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Status Perkerjaan</label>
                                <div class="col-md-10">
                                    <select class="form-control form-select" name="status" required>
                                        <option value="">Pilih Status Perkerjaan</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Pending</option>
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>On-Progress</option>
                                        <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Complete</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Status Pembayaran</label>
                                <div class="col-md-10">
                                    <select class="form-control form-select"  name="payment" required>
                                        <option value="">Pilih Status Pembayaran</option>
                                        <option value="0" {{ old('payment') == 0 ? 'selected' : '' }}>Belum Ditagih</option>
                                        <option value="1" {{ old('payment') == 1 ? 'selected' : '' }}>Proses Penagihan</option>
                                        <option value="2" {{ old('payment') == 2 ? 'selected' : '' }}>Sudah Terbayar</option>
                                    </select>
                                    @if ($errors->has('payment'))
                                        <span class="text-danger">{{ $errors->first('payment') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Manager</label>
                                <div class="col-md-10">
                                    <select class="form-control form-select" name="manager_id">
                                        <option>Pilih Manager</option>
                                       
                                            @foreach ($managers as $manager)
                                                <option value="{{ $manager->id }}">{{ ucwords($manager->username) }}</option>
                                            @endforeach
                                    </select>
                                </div>
                               
                            </div>
                        </div>
    
                        <div class="modal-footer">
                            <div class="bank-details-btn">

                                <button type="submit" class="btn save-invoice-btn btn-primary"> Save</button>
                                    
                                </a>
                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>


           
            
            {{-- <div class="modal custom-modal fade" id="save_invocies_details" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Submit item Details</h3>
                                <p>Are you sure want to save?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <form action="">
                                            @csrf
                                            <button type="submit" class="btn save-invoice-btn btn-primary" id="confirmSave">Save</button>
                                        </form>
                                        <!-- Tambahkan id untuk tombol "Save" -->
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn paid-cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            
            
        </div>
    </div>
</x-app-layout>