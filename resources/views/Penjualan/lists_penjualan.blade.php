<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
    
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Penjualan</h3>
                            </div>
    
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#bank_details" href="#" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                       
                    </div>
    
    
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
    
                            <thead class="student-thread">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Pembeli</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $data)
                                <tr>
                                    <td>{{ $data->tgl }}</td>
                                    <td>{{ ucwords($data->pembeli) }}</td>
                                    <td>{{ $data->keterangan }}</td>
                                    <td>Rp. {{ number_format($data->jual, 0, ',', '.') }}</td>
                                    <td>
                                        @php
                                        $bayar = $pay[$data->status];
                                        @endphp
                                        @switch($bayar)
                                            @case('Belum Terbayar')
                                                <span class="badge badge-danger">{{ $bayar }}</span>
                                                @break
                                            @case('Sudah Terbayar')
                                                <span class="badge badge-success">{{ $bayar }}</span>
                                                @break                                         
                                            @default
                                                <!-- Tindakan jika tidak ada kasus yang cocok -->
                                        @endswitch
                                    </td>
                                    <td class="text-end">
                                        <div class="actions ">
                                            <a href="{{ route('penjualan.detail', ['pid' => $data->idsales]) }}" class="btn btn-sm bg-success-light me-2 ">
                                                <i class="feather-eye"></i>
                                            </a>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="{{ '#EditPenjualan'.$data->idsales }}" class="btn btn-sm bg-danger-light me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="{{ route('_penjualan.del', ['id' => $data->idsales, 'periode' => $data->periode]) }}" class="btn btn-sm bg-danger-light" onclick="return confirm('Are you sure want to delete this Penjualan?')">
                                                <i class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal custom-modal fade bank-details" id="{{ 'EditPenjualan'.$data->idsales }}" role="dialog">
                                
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="form-header text-start mb-0">
                                                    <h4 class="mb-0">Add Telkom Akses</h4>
                                                </div>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="{{ route('penjualan.update', $data->idsales) }}" method="post">
                                                @csrf
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Tanggal</label>
                                                            <div class="col-md-10">
                                                                <input type="date" class="form-control" value="{{ old('tgl',$data->tgl) }}" name="tgl" data-date-format="yyyy-mm-dd" data-plugin-datepicker="" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Nama Pembeli</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" placeholder="Andi Amalia" value="{{ old('pembeli',$data->pembeli) }}" name="pembeli" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Keterangan</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan',$data->keterangan) }}"placeholder="Keterangan.." required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Harga Pembelian</label>
                                                            <div class="col-md-10">
                                                                <input type="number" class="form-control" placeholder="Biaya Pembelian..." name="beli" value="{{ old('beli',$data->beli) }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Harga Penjualam</label>
                                                            <div class="col-md-10">
                                                                <input type="number" class="form-control" placeholder="Harga Penjualan..." name="jual" value="{{ old('jual',$data->jual) }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Nama Pengguna</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control form-select" name="user" required>
                                                                    <option>Pilih Pengguna</option>                                          
                                                                    @foreach ($employees as $user)
                                                                    <option value="{{ $user->id }}" {{ old('user', $data->user) == $user->id ? 'selected' : '' }}>{{ ucwords($user->username) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Status Pembayaran</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control form-select" name="status" required>
                            
                                                                    <option value="0" {{ old('status',$data->status) == 0 ? 'selected' : '' }}>Belum Terbayar</option>
                                                                    <option value="1" {{ old('status',$data->status) == 1 ? 'selected' : '' }}>Sudah Terbayar</option>
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
                                <h4 class="mb-0">Add Penjualan</h4>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
    
                            <form action="{{ route('penjualan.store') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Tanggal</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" value="{{ old('tgl') }}" name="tgl" data-date-format="yyyy-mm-dd" data-plugin-datepicker="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Nama Pembeli</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Andi Amalia" value="{{ old('pembeli') }}" name="pembeli" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Keterangan</label>
                                    <div class="col-md-10">
                                        <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}"placeholder="Keterangan.." required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Harga Pembelian</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" placeholder="Biaya Pembelian..." name="beli" value="{{ old('beli') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Harga Penjualam</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" placeholder="Harga Penjualan..." name="jual" value="{{ old('jual') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Nama Pengguna</label>
                                    <div class="col-md-10">
                                        <select class="form-control form-select" name="user" required>
                                            <option>Pilih Pengguna</option>                                          
                                                @foreach ($employees as $employees)
                                                    <option value="{{ $employees->id }}">{{ ucwords($employees->username) }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Status Pembayaran</label>
                                    <div class="col-md-10">
                                        <select class="form-control form-select" name="status" required>
    
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Belum Terbayar</option>
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Sudah Terbayar</option>
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
            
        </div>
    </div>
</x-app-layout>