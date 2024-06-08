@extends('layouts.login-layout')

@section('content')
    <section>
        <div class="page-header min-vh-100" style="background: linear-gradient(to bottom right, #bc0000, rgb(255, 255, 255))"
        >
            <div class="container">
                <div class="row">
                    <!-- Login Form -->
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-white">Welcome back</h3>
                                <p class="mb-0 text-white">Enter your email and password to sign in</p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" role="form">
                                    @csrf
                                    <label class="text-white">Email</label>
                                    <div class="mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" aria-label="Email" aria-describedby="email-addon">
                                        @error('email')
                                            <span class="invalid-feedback text-xs" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <label class="text-white">Password</label>
                                    <div class="mb-3">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" aria-label="Password" aria-describedby="password-addon">
                                        @error('password')
                                            <span class="invalid-feedback text-xs" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        
                                    </div>
                                    {{-- <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div> --}}
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-danger w-100 mt-4 mb-0">Sign in</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    {{-- Don't have an account?
                                    <a href="{{ route('register') }}" class="text-info text-gradient font-weight-bold">Sign up</a> --}}
                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link text-info text-gradient" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                </p>
                            </div>
                        </div>
                        <!-- End of  Login Form -->
                        <p class="text-white text-center">
                            Copyright © <script>
                                document.write(new Date().getFullYear())
                            </script> Andi Amalia Ramadani
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n10" style="background-image:url('{{ asset('assets/img/img-05.jpg') }}')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
