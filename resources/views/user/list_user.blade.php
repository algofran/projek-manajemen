<x-app-layout>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
    
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">List User</h3>
                            </div>
    
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#bank_details" href="#" class="btn btn-primary">Tambah User <i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                       
                    </div>
    
    
                    <div class="table-responsive">
                        <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
    
                            <thead class="student-thread">
                                <tr>
                                    <th>No</th>
                                    <th>Employe Name</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $data)
                                <tr>
                                    <td>{{  $loop->iteration }}</td>
                                    <td>{{ ucwords($data->firstname.' '.$data->lastname) }}</td>
                                    <td>{{ $data->username}}</td>
                                    <td>{{ $role[$data->type] }}</td>
                                    <td class="text-end">
                                        <div class="actions ">
                                            
                                            <a href="#" data-bs-toggle="modal" data-bs-target="{{ '#EditPenjualan'.$data->id }}" class="btn btn-sm bg-danger-light me-2">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <a href="{{ route('_del.user', ['id' => $data->id]) }}" class="btn btn-sm bg-danger-light" onclick="return confirm('Are you sure want to delete this User?')">
                                                <i class="feather-trash-2"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal custom-modal fade bank-details" id="{{ 'EditPenjualan'.$data->id }}" role="dialog">
                                
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
                                            <form action="{{ route('update_user', $data->id) }}" method="post">
                                                @csrf
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">First Name</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" placeholder="Andi" value="{{ $data->firstname }}" name="firstname" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Last Name</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" placeholder="Amalia" value="{{ $data->lastname }}" name="lastname" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">User Name</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control" placeholder="Mell" value="{{ $data->username }}" name="username" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">User Authority</label>
                                                            <div class="col-md-10">
                                                                <select class="form-control form-select" name="type" required>
                            
                                                                    <option value="0" {{ $data->type == 0 ? 'selected' : '' }}>Administrator</option>
                                                                    <option value="1" {{ $data->type == 1 ? 'selected' : '' }}>Manager</option>
                                                                    <option value="2" {{ $data->type == 2 ? 'selected' : '' }}>Staff</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Password</label>
                                                            <div class="col-md-10">
                                                                <input type="password" name="password" class="form-control" value="" placeholder="******" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-form-label col-md-2">Konfirmasi Password</label>
                                                            <div class="col-md-10">
                                                                <input type="password" name="cpassword" class="form-control" value="" placeholder="******" required>
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
    
                            <form action="{{ route('add_user') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">First Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Andi" value="{{ old('firstname') }}" name="firstname" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Last Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Amalia" value="{{ old('lastname') }}" name="lastname" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">User Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Mell" value="{{ old('username') }}" name="username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">User Authority</label>
                                    <div class="col-md-10">
                                        <select class="form-control form-select" name="type" required>
    
                                            <option value="0" {{ old('type') == 0 ? 'selected' : '' }}>Administrator</option>
                                            <option value="1" {{ old('type') == 1 ? 'selected' : '' }}>Manager</option>
                                            <option value="2" {{ old('type') == 2 ? 'selected' : '' }}>Staff</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Password</label>
                                    <div class="col-md-10">
                                        <input type="password" name="password" class="form-control" value="{{ old('password') }}"placeholder="******" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-2">Konfirmasi Password</label>
                                    <div class="col-md-10">
                                        <input type="password" name="cpassword" class="form-control" value="{{ old('cpassword') }}"placeholder="******" required>
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