<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/feather/feather.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icons/flags/flags.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/alertify/alertify.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/select/select.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/select2/select2.css" /> --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        <!-- Styles -->
    @livewireStyles

</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="index.php?page=dashboard" class="logo">
                    <h2 class="">LOGO</h2>
                </a>
                <a href="index.php?page=dashboard" class="logo logo-small">
                    <!-- <img src="{{ asset('assets/img/logo-small.png ' ) }}" alt="Logo" width="30" height="30"> -->
                    <h2 class="">LOGO</h2>
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">


                <li class="nav-item dropdown noti-dropdown me-2">
                    <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/icons/header-icon-05.svg ' ) }}" alt="">
                    </a>
                    <div class="dropdown-menu notifications">
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
                    </div>
                </li>

                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list win-maximize">
                        <img src="{{ asset('assets/img/icons/header-icon-04.svg' ) }}" alt="">
                    </a>
                </li>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{ asset('assets/img/profiles/avatar-01.jpg') }}" width="31" alt="Soeng Souy">
                            <div class="user-text">
                                <h6>Leonardo</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{ asset('assets/img/profiles/avatar-01.jpg') }}" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>Leonardo</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profile.html">My Profile</a>
                        <a class="dropdown-item" href="inbox.html">Inbox</a>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}"
                                     @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </li>

            </ul>

        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>
                        <li>
                            <a href="{{ route('dashboard') }}"><i class="feather-grid"></i><span>Dashboard</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-clipboard-list"></i> <span> Project</span> <span class="menu-arrow"></span></a>
                            <ul class="nav nav-children ">
                                <li>
                                    <a href="/add_project">
                                        Add Project
                                    </a>
                                </li>
                                <li>
                                    <a href="/project_lists">
                                        Project List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('keuangan_project')}}">
                                        Laporan Keuangan
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ __('Dashboard') }}">
                                        Laporan Keuangan Pertahun
                                    </a>
                                </li>
        
                            </ul>
                        </li>
                        
                        @php
                            $companies = App\Models\InstituteData::all();
                        @endphp

                        <li class="submenu">
                            <a href="#"><i class="fas fa-file-invoice-dollar"></i><span>Perusahaan</span> <span class="menu-arrow"></span></a>
                            <ul class="nav nav-children">
                                @foreach ($companies as $company)
                                    <li>
                                        <a href="{{ route('company.show', $company->id) }}">
                                            {{ $company->name }}
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a href="">
                                        Laporan Keuangan
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="submenu">
                            <a href="#"><i class="fa fa-wifi"></i> <span>ICON PLUS</span> <span class="menu-arrow"></span></a>
                            <ul class="nav nav-children">
                                <li>
                                    <a href="../lists_serpo">
                                        SERPO
                                    </a>
                                </li>
                                <li>
                                    <a href="../lists_iconnet">
                                        Iconnet
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="../lists_telkom"><i class="feather-codepen"></i><span>Telkom Akses</span></a>
                        </li> --}}
                        {{-- <li class="submenu">
                            <a href="#"><i class="fas fa-file-invoice-dollar"></i><span>Keuangan</span> <span class="menu-arrow"></span></a>
                            <ul class="nav nav-children">
        
                                <li>
                                    <a href="pengeluaran_projek">
                                        Pengeluaran Project
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ __('pengeluaran_serpo') }}">
                                        Pengeluaran Serpo
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ __('pengeluaran_iconnet') }}">
                                        Pengeluaran Iconnet
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ __('pengeluaran_telkom') }}">
                                        Pengeluaran Telkom Akses
                                    </a>
                                </li>
        
                            </ul>
                        </li> --}}
                        <li>
                            <a href="{{ 'lists_penjualan' }}"><i class="fa fa-shopping-cart"></i><span>penjualan</span></a>
                        </li>
                        {{-- <li class="submenu">
                            <a href="#"><i class="fa fa-book"></i> <span> Laporan</span> <span class="menu-arrow"></span></a>
                            <ul class="nav nav-children">
                                <li>
                                    <a href="{{ __('laporan') }}">
                                        Material
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php?page=report_list&type=tools">
                                        Peralatan
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php?page=report_list&type=ops">
                                        Operasional
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php?page=report_list&type=others">
                                        Lain-lain
                                    </a>
                                </li>
        
                            </ul>
                        </li> --}}
                        <li class="submenu">
                            <a href="#"><i class="fas fa-address-card"></i> <span>Pengguna</span> <span class="menu-arrow"></span></a>
                            <ul class="nav nav-children">
                                <li>
                                    <a href="./index.php?page=user_baru">
                                        Tambah User
                                    </a>
                                </li>
                                <li>
                                    <a href="./index.php?page=users_list">
                                        Daftar Pengguna
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="page-wrapper">
            <div class="content container-fluid">
                {{ $slot }}
            </div>

            <footer>
                <p>Copyright © 2024 Universitas Dipa Makassar.</p>
            </footer>
            </div>
            </div>
            
            <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('assets/js/feather.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
            <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/alertify/alertify.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/alertify/custom-alertify.min.js') }}"></script>
            <script src="{{ asset('assets/js/moment.min.js') }}"></script>
            <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
            <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/fullcalendar/jquery.fullcalendar.js') }}"></script>

            <script src="{{ asset('assets/select/select.js') }}"></script>
            
            <script src="{{ asset('assets/js/script.js') }}"></script>
            @livewireScripts
            
            </body>
            
            </html>