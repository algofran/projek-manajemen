<div class="header">
  <div class="header-left bg-danger bg-gradient text-white">
      <a href="{{ route('home') }}" class="logo">
          {{-- <h2 class="">LOGO</h2> --}}
          <img src="{{ asset('assets/img/image.png' ) }}" class="" alt="Logo" width="80" height="40">
      </a>
      <a href="{{ route('home') }}" class="logo logo-small">
          <img src="{{ asset('assets/img/visdat.png' ) }}" alt="Logo" width="30" height="30">
          {{-- <h2 class="">LOGO</h2> --}}
      </a>
  </div>
  <div class="menu-toggle">
      <a class="bg-white" href="javascript:void(0);" id="toggle_btn">
          <i class="fas fa-bars text-danger"></i>
      </a>
  </div>
  {{-- <div class="top-nav-search">
      <form>
          <input type="text" class="form-control" placeholder="Search here">
          <button class="btn" type="submit"><i class="fas fa-search"></i></button>
      </form>
  </div> --}}
  <a class="mobile_btn bg-white" id="mobile_btn">
      <i class="fas fa-bars text-danger"></i>
  </a>

  <ul class="nav user-menu">


      <li class="nav-item dropdown noti-dropdown me-2">
          {{-- <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
              <img src="{{ asset('assets/img/icons/header-icon-05.svg ' ) }}" alt="">
          </a> --}}
          {{-- <div class="dropdown-menu notifications">
              <div class="topnav-dropdown-header">
                  <span class="notification-title">Notifications</span>
                  <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
              </div>
              <div class="noti-content">
                  <ul class="notification-list">
                      <li class="notification-message">
                          <a href="#">
                              <div class="media d-flex">
                                  <span class="avatar avatar-sm flex-shrink-0">
                                      <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/img/profiles/avatar-02.jpg ' ) }}">
                                  </span>
                                  <div class="media-body flex-grow-1">
                                      <p class="noti-details"><span class="noti-title">Carlson Tech</span> has
                                          approved <span class="noti-title">your estimate</span></p>
                                      <p class="noti-time"><span class="notification-time">4 mins ago</span>
                                      </p>
                                  </div>
                              </div>
                          </a>
                      </li>
                      <li class="notification-message">
                          <a href="#">
                              <div class="media d-flex">
                                  <span class="avatar avatar-sm flex-shrink-0">
                                      <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/img/profiles/avatar-11.jpg ' ) }}">
                                  </span>
                                  <div class="media-body flex-grow-1">
                                      <p class="noti-details"><span class="noti-title">International Software
                                              Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
                                      <p class="noti-time"><span class="notification-time">6 mins ago</span>
                                      </p>
                                  </div>
                              </div>
                          </a>
                      </li>
                      <li class="notification-message">
                          <a href="#">
                              <div class="media d-flex">
                                  <span class="avatar avatar-sm flex-shrink-0">
                                      <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/img/profiles/avatar-17.jpg' ) }}">
                                  </span>
                                  <div class="media-body flex-grow-1">
                                      <p class="noti-details"><span class="noti-title">John Hendry</span> sent
                                          a cancellation request <span class="noti-title">Apple iPhone
                                              XR</span></p>
                                      <p class="noti-time"><span class="notification-time">8 mins ago</span>
                                      </p>
                                  </div>
                              </div>
                          </a>
                      </li>
                      <li class="notification-message">
                          <a href="#">
                              <div class="media d-flex">
                                  <span class="avatar avatar-sm flex-shrink-0">
                                      <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/img/profiles/avatar-13.jpg' ) }}">
                                  </span>
                                  <div class="media-body flex-grow-1">
                                      <p class="noti-details"><span class="noti-title">Mercury Software
                                              Inc</span> added a new product <span class="noti-title">Apple
                                              MacBook Pro</span></p>
                                      <p class="noti-time"><span class="notification-time">12 mins ago</span>
                                      </p>
                                  </div>
                              </div>
                          </a>
                      </li>
                  </ul>
              </div>
              <div class="topnav-dropdown-footer">
                  <a href="#">View all Notifications</a>
              </div>
          </div> --}}
      </li>
      <li class="nav-item dropdown has-arrow new-user-menus">
        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
            <span class="user-img">
                @php
                    $user = Auth::user();
                    $role = $user->roles->first();
                @endphp
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
                <div class="user-text">
                    <h6>{{ $user->username }}</h6>
                    <p class="text-muted mb-0">{{ $role->name }}</p>
                </div>
            </span>
        </a>
        <div class="dropdown-menu">
            <div class="user-header">
               
                <div class="avatar avatar-sm">
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
                </div>
                <div class="user-text">
                    <h6>{{ $user->username }}</h6>
                    <p class="text-muted mb-0">
                            {{ $role->name }}
                            </p>
                            </div>
            </div>
            <a class="dropdown-item" href="{{ route('profile_user') }}">My Profile</a>
            <a class="dropdown-item border-radius-md" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="d-flex py-1">
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="font-weight-bold text-danger">&nbsp;&nbsp;Logout</span>
                        </h6>
                    </div>
                </div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    

  </ul>
</div>