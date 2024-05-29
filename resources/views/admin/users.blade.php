@extends('layouts.layout')
@section('content')
<div class="div">
  <div class="row">
    <div class="col-sm-12">
        <div class="card card-table">
            <div class="card-body">

                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">List User</h3>
                        </div>

                        <div class="col-6 text-end">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#add_user" class="btn btn-primary">Tambah User <i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                
                </div>

                <div class="table-responsive">
                  <table class="table align-items-center m-0 dataTable table-striped star-student table-hover table-center mb-0" id="dataTable3">
                      <thead>
                        <tr>
                            <th class="text-secondary">Firstname</th>
                            <th class="text-secondary">Lastname</th>
                            <th class="text-secondary">Username</th>
                            <th class="text-secondary">Email</th>
                            <th class="text-secondary">Phone</th>
                            <th class="text-secondary">Role</th>
                            <th class="text-secondary">Status</th>
                            <th class="text-secondary">Since</th>
                            <th class="text-secondary text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade bank-details" id="add_user" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="form-header text-start mb-0">
                            <h4 class="mb-0">Tambah User</h4>
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
                                <label class="col-form-label col-md-2">email</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" placeholder="" value="{{ old('email') }}" name="email" required>
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Phone</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="+62" value="{{ old('phone') }}" name="phone" required>
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
                                    <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}"placeholder="******" required>
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
</div>
@endsection

@section('script')
<script>
  $(document).ready( function () {
      $('#dataTable3').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url: "{{ route('admin.dataTable.getUser') }}",
              type: 'GET'
          },
          columns: [
              { data: 'firstname', name: 'firstname' },
              { data: 'lastname', name: 'lastname' },
              { data: 'username', name: 'username' },
              { data: 'email', name: 'email' },
              { data: 'phone', name: 'phone' },
              { data: 'role', name: 'role' },
              { data: 'status', name: 'status' },
              { data: 'since', name: 'since' },
              {
                  data: 'id', 
                  name: 'action',
                  orderable: false,
                  searchable: false,
                  render: function(data, type, row, meta){

                    var editUrl = '{{ route("_edituser", ":id") }}'.replace(':id', data);
                    editUrl = editUrl.replace(':id', data);
                    var deleteUrl = '{{ route("_del.user", ":id") }}';
                      deleteUrl = deleteUrl.replace(':id', data);
                      return `
                      <a href="${editUrl}" class="btn btn-sm bg-danger-light me-2">
                        <i class="feather-edit"></i>
                    </a>
                      <a href="${deleteUrl}" class="btn btn-sm bg-danger-light" onclick="return confirm('Are you sure want to delete this User?')">
                      <i class="feather-trash-2"></i>
                      </a>


                      <div class="modal custom-modal fade bank-details" id="editUser${data}" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="form-header text-start mb-0">
                                                <h4 class="mb-0">Tambah Pengguna</h4>
                                            </div>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="${editUrl}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                              <label class="col-form-label col-md-2">First Name</label>
                                              <div class="col-md-10">
                                                  <input type="text" class="form-control" name="firstname" value="${row.firstname}" required>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-form-label col-md-2">Last Name</label>
                                              <div class="col-md-10">
                                                  <input type="text" class="form-control" name="lastname" value="${row.lastname}" required>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-form-label col-md-2">Username</label>
                                              <div class="col-md-10">
                                                  <input type="text" class="form-control" name="username" value="${row.username}" required>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                                <label class="col-form-label col-md-2">email</label>
                                                <div class="col-md-10">
                                                    <input type="email" class="form-control" placeholder="" value="${row.email}" name="email" required>
                                                </div>
                                            </div>
                        
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">Phone</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" placeholder="+62" value="${row.phone}" name="phone" required>
                                                </div>
                                            </div>
                                          <div class="form-group row">
                                              <label class="col-form-label col-md-2">User Authority</label>
                                              <div class="col-md-10">
                                                  <select class="form-control form-select" name="type" required>
                                                      <option value="0" ${row.type == 0 ? 'selected' : ''}>Administrator</option>
                                                      <option value="1" ${row.type == 1 ? 'selected' : ''}>Manager</option>
                                                      <option value="2" ${row.type == 2 ? 'selected' : ''}>Staff</option>
                                                  </select>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-form-label col-md-2">Password</label>
                                              <div class="col-md-10">
                                                  <input type="password" name="password" class="form-control" placeholder="******">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-form-label col-md-2">Konfirmasi Password</label>
                                              <div class="col-md-10">
                                                  <input type="password" name="password_confirmation" class="form-control" placeholder="******">
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
                      `;
                  }
                }
          ]
      });
  });
</script>

@endsection