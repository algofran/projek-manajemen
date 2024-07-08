@extends('layouts.layout')

@section('content')
<style>
.profile-image {
    position: relative;
    display: inline-block;
    width: 180px;
    height: 180px;
    overflow: hidden;
    border-radius: 50%;
    margin: auto;
}

.profile-image img {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 50%;
    object-fit: cover;
    transition: transform 0.3s;
}

.profile-image:hover img {
    transform: scale(1.05);
}

.profile-image .upload-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    opacity: 0;
    transition: opacity 0.3s;
    cursor: pointer;
}

.profile-image:hover .upload-overlay {
    opacity: 1;
}

.upload-overlay input {
    display: none;
}
</style>

<div class="container">
    {{-- <div class="page-header container py-3 bg-danger bg-gradient text-white rounded">
        <div class="row align-items-center">
            <div class="col">
                <p class="fw-bolder fs-6 text-white my-auto">Profil User</p>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:history.back()" style="text-decoration-line: underline; font-style: italic">Kembali</a></li>
                    <li class="breadcrumb-item text-white">Profil User</li>
                </ul>
            </div> 
        </div>
    </div> --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center py-3 rounded" style="background-color: rgb(230, 230, 230)">
                @php
                    $user = Auth::user();
                    @endphp
                <div class="profile-image mx-auto">
                    <img src="{{ $user->profile_image ? asset('storage/'.$user->profile_image) : asset('assets/image.png') }}" alt="Profile Image">
                    <div class="upload-overlay">
                        <label for="profile_image" class="btn btn-danger text-white btn-sm m-0">Change <i class="fa fa-camera" aria-hidden="true"></i></label>
                        <form action="{{ route('profile.uploadImage') }}" method="POST" enctype="multipart/form-data" style="display: none;">
                            @csrf
                            <input type="file" name="profile_image" id="profile_image" onchange="this.form.submit()">
                        </form>
                    </div>
                </div>
                <h4 class="user-name mt-3">{{ $user->firstname . ' ' . $user->lastname }}</h4>
                <h6 class="text-muted">{{ $user->username }}</h6>
            </div>

            <div class="tab-content profile-tab-cont mt-2">
                <div class="tab-pane fade show active" id="per_details_tab">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="">
                                <div class="row">
                                    <div class="col">Personal Details</div>
                                    <div class="col-auto ms-auto">
                                        <a href="{{ route('_edituser', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">Edit Profil</a>
                                    </div>
                                </div>
                            </h5>
                            <div class="row mb-3">
                                <p class="col-sm-3 text-muted mb-0">Username</p>
                                <p class="col-sm-9">{{ $user->username }}</p>
                            </div>
                            <div class="row mb-3">
                                <p class="col-sm-3 text-muted mb-0">Firstname</p>
                                <p class="col-sm-9">{{ $user->firstname }}</p>
                            </div>
                            <div class="row mb-3">
                                <p class="col-sm-3 text-muted mb-0">Lastname</p>
                                <p class="col-sm-9">{{ $user->lastname }}</p>
                            </div>
                            <div class="row mb-3">
                                <p class="col-sm-3 text-muted mb-0">Email ID</p>
                                <p class="col-sm-9">{{ $user->email }}</p>
                            </div>
                            <div class="row mb-3">
                                <p class="col-sm-3 text-muted mb-0">Number Phone</p>
                                <p class="col-sm-9">{{ $user->phone }}</p>
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
@endsection

@section('script')
<script>
    document.getElementById('profile_image').addEventListener('change', function() {
        this.form.submit();
    });
</script>
@endsection
