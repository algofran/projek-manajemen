@extends('layouts.layout') @section('content')
<div class="div">
    <div class="row">
        <div class="col-md-12">
            <div class="profile-header">
                <div class="row align-items-center">
                    @php
                    $user = Auth::user();
                    $role = $user->roles->first();
                @endphp
                    <div class="col-auto profile-image">
                        <a href="#">
                            @switch($role->id)
                    @case(1)
                        <img class="rounded-circle" src="{{ asset('assets/admin.png') }}" width="31" alt="Admin">
                        @break
                    @case(2)
                        <img class="rounded-circle" src="{{ asset('assets/user.png') }}" width="31" alt="User">
                        @break
                    @case(3)
                        <img class="rounded-circle" src="{{ asset('assets/manager.png') }}" width="31" alt="Manager">
                        @break
                    @default
                        <img class="rounded-circle" src="{{ asset('assets/default.png') }}" width="31" alt="User">
                @endswitch
                        </a>
                    </div>
                    <div class="col ms-md-n2 profile-user-info">
                        <h4 class="user-name mb-0">{{ $user->firstname.' '.$user->lastname }}</h4>
                        <h6 class="text-muted">{{ $user->username }}</h6>
                    </div>
                    <div class="col-auto profile-btn">
                        <a href="{{ route('_edituser', ['id' => $user->id]) }}" class="btn btn-danger">Edit</a>
                    </div>
                </div>
            </div>
            <div class="tab-content profile-tab-cont">

                <div class="tab-pane fade show active" id="per_details_tab">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        <span>Personal Details</span>
                                       
                                    </h5>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">username</p>
                                        <p class="col-sm-9">{{ $user->username }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Firstname</p>
                                        <p class="col-sm-9">{{ $user->firstname }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Lastname</p>
                                        <p class="col-sm-9">{{ $user->lastname }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email ID</p>
                                        <p class="col-sm-9"><a href="#" class="__cf_email__" data-cfemail="a1cbcec9cfc5cec4e1c4d9c0ccd1cdc48fc2cecc">{{ $user->email }}</a></p>
                                    </div>
                                    <div class="row">
                                        <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Number Phone</p>
                                        <p class="col-sm-9">{{ $user->phone }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </div>


                <div id="password_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Change Password</h5>
                            <div class="row">
                                <div class="col-md-10 col-lg-6">
                                    <form>
                                        <div class="form-group">
                                            <label>Old Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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