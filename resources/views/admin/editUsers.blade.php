
@extends('layouts.layout') @section('content')
<div class="div">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit User</h5>
                        <!-- Tampilkan pesan kesalahan jika ada -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
        
                        <!-- Tampilkan pesan sukses jika ada -->
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
        
                        <!-- Tampilkan pesan gagal jika ada -->
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                            <ul>
                                <li>Paket: {{ $paket }}</li>
                                <li>Periode: {{ $periode }}</li>
                                <li>Tagihan: {{ $tagihan }}</li>
                                <li>Status: {{ $status }}</li>
                                <li>Payment: {{ $payment }}</li>
                            </ul>
                        </div>
                        @endif
        
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update_user',$user->id) }}" method="post">
                            @csrf
                                            <div class="form-group row">
                                              <label class="col-form-label col-md-2">First Name</label>
                                              <div class="col-md-10">
                                                  <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}" required>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-form-label col-md-2">Last Name</label>
                                              <div class="col-md-10">
                                                  <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" required>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <label class="col-form-label col-md-2">Username</label>
                                              <div class="col-md-10">
                                                  <input type="text" class="form-control" name="username" value="{{ $user->username }}" required>
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                                <label class="col-form-label col-md-2">email</label>
                                                <div class="col-md-10">
                                                    <input type="email" class="form-control" placeholder="" value="{{ $user->email }}" name="email" required>
                                                </div>
                                            </div>
                        
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">Phone</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" placeholder="+62" value="{{ $user->phone }}" name="phone" required>
                                                </div>
                                            </div>
                                            @role(['admin', 'manager'])
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">User Authority</label>
                                                <div class="col-md-10">
                                                  <select class="form-control form-select" name="type" required>
                                                    <option value="0" {{ $user->type == 0 ? 'selected' : '' }}>Administrator</option>
                                                    <option value="1" {{ $user->type == 1 ? 'selected' : '' }}>Manager</option>
                                                    <option value="2" {{ $user->type == 2 ? 'selected' : '' }}>Staff</option>
                                                </select>
                                                </div>
                                            </div>
                                            @endrole
                                            @role ('user')
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-2">User Authority</label>
                                                <div class="col-md-10">
                                                    <input type="hidden" name="type" class="form-control" readonly value="{{ $user->type }}">
                                                    <input type="" class="form-control" readonly value="User">
                                                </div>
                                            </div>
                                            @endrole
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
                        
                            <footer class="panel-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                        <button class="btn btn-danger" type="reset">Cancel</button>
                                    </div>
                                </div>
                            </footer>
                        </form>
                        
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