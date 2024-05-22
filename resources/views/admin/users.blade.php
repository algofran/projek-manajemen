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

                        <div class="col-auto text-end float-end ms-auto download-grp">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#bank_details" href="#" class="btn btn-primary">Tambah User <i class="fas fa-plus"></i></a>
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
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="modal custom-modal fade bank-details" id="bank_details" role="dialog">
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
        </div> --}}
        
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
              { data: 'since', name: 'since' }
          ]
      });
  });
</script>
@endsection
