<x-guest-layout>
    
    <div class="login-wrapper"> 
        <div class="container"> 
            <div class="card mx-auto" style="width: 30rem;"> 
                <div class="card-header"> 
                    <div class="panel-title-sign mt-xl text-left"> 
                        <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> VISDAT | Project Management System</h2> 
                    </div> 
                    <x-validation-errors class="mb-4" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                </div> 
                <div class="card-body"> 
                <div class="login-box animated fadeInDown"> 
                <!-- start: page --> 
                <section class="body-sign"> 
                    <div class="center-sign"> 
                        <div class="panel panel-sign"> 
                            <div class="panel-body"> 
                                <form action="" id="login-form" method="POST" action="{{ route('login') }}"> 
                                    @csrf
                                    <div class="form-group mb-lg"> 
                                        <label for="email">Email</label>
                                        <div class="input-group input-group-icon"> 
                                            <input id="email" name="email" type="email" class="form-control input-lg" :value="old('email')" required autofocus autocomplete="username"  /> 
                                            <span class="input-group-addon"> 
                                                <!-- <span class="icon icon-lg"> 
                                                    <i class="fa fa-user"></i> 
                                                </span> --> 
                                            </span> 
                                        </div> 
                                    </div> 

                                    <div class="form-group mb-lg"> 
                                        <div class="clearfix"> 
                                            <label class="pull-left">Password</label> 
                                        </div> 
                                        <div class="input-group input-group-icon"> 
                                            <input id="passwrod" name="password" type="password" class="form-control input-lg" required autocomplete="current-password" /> 
                                            <span class="input-group-addon"> 
                                            </span> 
                                        </div> 
                                    </div> 

                                    <div class="row"> 
                                        <div class="col-sm-8">
                                            <a href="pages-recover-password.html" class="pull-right">Lupa Password?</a> 
                                            {{-- <div class="checkbox-custom checkbox-default"> 
                                                <input id="remember" name="remember" type="checkbox"/> 
                                                <label for="remember">Ingat saya</label> 
                                            </div>  --}}
                                        </div> 
                                        <div class="col-sm-4 my-4 text-right"> 
                                            <button type="submit" name="submit" class="btn btn-login btn-outline-primary btn-block">Log In</button> 
                                        </div> 
                                    </div> 
                                </form> 
                            </div> 
                        </div> 
                        <p class="text-center mt-md mb-md">&copy; Copyright 2023. All rights reserved. By <a href="https://visualdata.co.id">Visual Data</a>.</p> 
                    </div> 
                </section> 
            </div> 
        </div>  
    </div> 

</x-guest-layout>