<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
    
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Telkom Akses</h3>
                            </div>
    
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#bank_details" href="#" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
    
                            <a href="./index.php?page=serpo&tahun=true"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">Tahun Ini</button></a>
                            <a href="./index.php?page=serpo"><button type="button" class="mb-xs mt-xs mr-xs btn btn-danger">Tagihan Aktif</button></a>
    
                        </div>
                    </div>
    
    
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
    
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Periode</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah WO</th>
                                    <th>Target</th>
                                    <th>Tagihan</th>
                                    <th>Status</th>
                                    <th>Pembayaran</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($telkomAkses as $data)
                                @php
                                $prog = ($data->PA / 300) * 100;
                                $prog = $prog > 0 ? number_format($prog) : $prog;
                                @endphp
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ ucwords($data->periode) }}</td>
                                    <td>{{ $data->keterangan }}</td>
                                    <td>{{ $data->PA }}</td>
                                    <td>
                                        <div class="progress m-none mt-xs dark">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: {{ $prog }}%;">
                                                {{ $prog }} %
                                            </div>
                                        </div>
                                    </td>
                                    <td>Rp. {{ number_format($data->tagihan, 0, ',', '.') }}</td>
                                    <td>
                                        @php
                                        $status = $stat[$data->status];
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
                                    <td>
                                        @php
                                        $bayar = $pay[$data->payment];
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
                                            <a href="{{ route('telkomakses.detail', ['pid' => $data->id]) }}" class="btn btn-sm bg-success-light me-2 ">
                                                <i class="feather-eye"></i>
                                            </a>
                                            <a href="{{ route('telkomakses.edit', ['id' => $data->id]) }}" class="btn btn-sm bg-danger-light me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="{{ route('telkomakses.del', ['id' => $data->id, 'periode' => $data->periode]) }}" class="btn btn-sm bg-danger-light" onclick="return confirm('Are you sure want to delete this project?')">
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
            <div class="modal custom-modal fade bank-details" id="bank_details" role="dialog">
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
    
                            <form action="#">
    
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Periode</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Periode (Contoh : JANUARI 2024)..." required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Keterangan</label>
                                    <div class="col-md-10">
                                        <input type="text" name="keterangan" class="form-control" value="<?php echo isset($keterangan) ? $keterangan : '' ?>" placeholder="Keterangan..." required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Jumlah WO</label>
                                    <div class="col-md-10">
                                        <input type="text" name="PA" class="form-control" value="<?php echo isset($PA) ? $PA : '' ?>" placeholder="Jumlah Work Order (WO)..." required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Tagihan</label>
                                    <div class="col-md-10">
                                        <input type="number" class="form-control" placeholder="Jumlah tagihan...">
                                    </div>
                                </div>
    
    
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Status Perkerjaan</label>
                                    <div class="col-md-10">
                                        <select class="form-control form-select">
    
                                            <option>Pending</option>
                                            <option>On-Progress</option>
                                            <option>Complate</option>
    
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Status Pembayaran</label>
                                    <div class="col-md-10">
                                        <select class="form-control form-select">
    
                                            <option>Belum Ditagih</option>
                                            <option>Progress Pembayaran</option>
                                            <option>Sudah Bayar</option>
    
                                        </select>
                                    </div>
                                </div>
                        </div>
    
                        <div class="modal-footer">
                            <div class="bank-details-btn">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#save_invocies_details" class="btn save-invoice-btn btn-primary">
                                    Save
                                </a>
                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal custom-modal fade" id="save_invocies_details" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Submit Iconnet Details</h3>
                                <p>Are you sure want to save?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn paid-continue-btn">Save</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn paid-cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>