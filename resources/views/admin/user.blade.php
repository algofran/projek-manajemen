@extends('layouts.admin-layout')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Users</li>
        </ol>
        <h5 class="font-weight-bolder mb-0">User Management</h5>
    </nav>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-1 p-3">
            <div class="card-header pb-3">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6>All Users</h6>
                    </div>
                    <div class="col-6 text-end">
                        <a class="btn bg-gradient-dark mb-0" href="#"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add User</a>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center m-0" id="dataTable3">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Firstname</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Lastname</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Since</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
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
                      return `
                      <a href="#" data-bs-toggle="modal" data-bs-target="{{ '#EditPenjualan'.${data} }}" class="btn btn-sm bg-danger-light me-2">
                     <i class="feather-edit"></i>
                     </a>
                    <a href="{{ route('_del.user', ['id' => ${data}]) }}" class="btn btn-sm bg-danger-light" onclick="return confirm('Are you sure want to delete this User?')">
                    <i class="feather-trash-2"></i>
                    </a>
                      `;
                  }
              }
            ]
        });
    });
</script>
@endsection