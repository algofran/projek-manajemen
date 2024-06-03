@extends('layouts.layout') @section('content')
<div class="div">
  <div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">List Perusahaan</h3>
                        </div>

                        <div class="col-auto text-end float-end ms-auto download-grp">
                            {{-- <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a> --}}
                            <a href="" data-bs-toggle="modal" data-bs-target="#bank_details" class="btn btn-primary"><i class="fas fa-plus"> Tambah Perusahaan</i></a>
                        </div>
                    </div>
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
                                <th>Nama Perusahaan</th>
                                <th>Alamat</th>
                                <th>Keterangan</th>
                                <th>Mitra</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($perusahaan as $item)

                             <tr id="{{ $item->id }}">
                                <td>{{ $i++ }}</td>
                                <td>{{ $item->name }}</></td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->keterangan }}</td>
                                <td>

                                    <ul style="list-style-type:disc">
                                        @foreach ($mitra->where('id_inst', $item->id) as $data)
                                    <li>
                                        <a href="{{ route('mitra.menu', ['id' => $data->id, 'name' => $data->mitra]) }}" class="text-primary">{{ $data->mitra }}</a> 

                                        <a href="#" data-bs-toggle="modal" data-bs-target="{{ '#Editmitra'.$data->id }}" class="text-success mb-2 ms-2"><i class="far fa-edit me-1"></i></a>

                                        <a class="text-danger mb-2" href="{{ route('_del.mitra', ['id' => $data->id]) }}" onclick="return confirm('Are you sure want to delete this item?')"><i class="far fa-trash-alt"></i></a>


                                        <div class="modal custom-modal fade bank-details" id="{{ 'Editmitra'.$data->id }}" role="dialog">
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
                                                <form action="{{ route('_edit.mitra', $item->id) }}" method="post">
                                                    @csrf
                                        
                                                <div class="modal-body">  
                                                            <div class="col-md-10">
                                                                <input type="" class="form-control" placeholder="" value="{{ old('name',$data->id_inst) }}" name="id_inst" required="">
                                                            </div>
                                                    
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Mitra</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="mitra" class="form-control" value="{{ old('mitras', $data->mitra) }}" placeholder="" required="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Keterangan</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="keterangan" class="form-control" value="{{ old('keteragan', $data->keterangan) }}" placeholder="Ketarangan..." required="">
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
                                
                                    
                                    </li>
                                    
                                    @endforeach 
                                </ul>
                                
                                <a href="#" data-bs-toggle="modal" data-bs-target="{{ '#addmitra'.$item->id }}" class="btn-sm btn-info text-white"><i class="fas fa-plus"> tambah</i></a>
                                </td>
                                <td class="text-end">
                                    <div class="actions ">
                                        <div class="actions ">
                                            {{-- <a href="{{ route('_detail.proyek', ['id' => $item->id]) }}" class="btn btn-sm bg-success-light me-2 ">
                                                <i class="feather-eye"></i>
                                            </a> --}}
                                            <a href="#" data-bs-toggle="modal" data-bs-target="{{ '#Edititem'.$item->id }}" class="btn btn-sm bg-danger-light me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="{{ route('_del.institute', ['id' => $item->id]) }}" class="btn btn-sm bg-danger-light" onclick="return confirm('Are you sure want to delete this item?')">
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
                                                    <h4 class="mb-0">Edit Perusahaan</h4>
                                                </div>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('_update.institute', $item->id) }}" method="post">
                                                @csrf
                                    
                                            <div class="modal-body">
                                                
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-2">Name</label>
                                                        <div class="col-md-10">
                                                            <input type="text" class="form-control" placeholder="" value="{{ old('name',$item->name) }}" name="name" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-2">Id Institute</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="institute" class="form-control" value="{{ old('institute', $item->institute) }}"placeholder="" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-2">Alamat</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $item->alamat) }}" placeholder="Jumlah Aktivasi (alamat)..." required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-2">Keterangan</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="keterangan" class="form-control" value="{{ old('keteragan', $item->keterangan) }}" placeholder="Ketarangan..." required="">
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
                                <div class="modal custom-modal fade bank-details" id="{{ 'addmitra'.$item->id }}" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="form-header text-start mb-0">
                                                    <h4 class="mb-0">Add Mitra</h4>
                                                </div>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('_add.mitra') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_inst" value="{{ old('id_inst', $item->id) }}">
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-2">Mitra</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="mitra" class="form-control @error('mitra') is-invalid @enderror" value="{{ old('mitra') }}" required>
                                                            @error('mitra')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-form-label col-md-2">Keterangan</label>
                                                        <div class="col-md-10">
                                                            <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}">
                                                            @error('keterangan')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                
                                                <div class="modal-footer">
                                                    <div class="bank-details-btn">
                                                        <button type="submit" class="btn save-invoice-btn btn-primary">Save</button>
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
                            <h4 class="mb-0">Add Perusahaan</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('_add.perusahaan') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id_inst" value="{{ old('id_inst') }}">
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Nama</label>
                                <div class="col-md-10">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Id Institute</label>
                                <div class="col-md-10">
                                    <input type="text" name="institute" class="form-control @error('institute') is-invalid @enderror" value="{{ old('institute') }}" required>
                                    @error('institute')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Alamat</label>
                                <div class="col-md-10">
                                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" required>
                                    @error('alamat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Keterangan</label>
                                <div class="col-md-10">
                                    <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" value="{{ old('keterangan') }}" required>
                                    @error('keterangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
        
                        <div class="modal-footer">
                            <div class="bank-details-btn">
                                <button type="submit" class="btn save-invoice-btn btn-primary">Save</button>
                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                            </div>
                        </div>
                    </form>
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