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
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/datatables/datatables.min.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/plugins/alertify/alertify.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fullcalendar/fullcalendar.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/select/select.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

    {{-- <link id="pagestyle" href="../assets-admin/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" /> --}}
    <script src="{{ asset('assets-admin/js/jquery-1.11.1.min.js') }}"
    crossorigin="anonymous"></script>
</head>

<body>
  @include('components.header')
  @include('components.sidebar')
    <div class="main-wrapper">
      <div class="page-wrapper">
            <div class="content container-fluid">
              @yield('content')
            </div>
            @include('components.footer')
        </div>
      </div> 
      @include('components.script')  
      @if (session()->has('alert'))
    <script>
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
          });
          Toast.fire({
            icon: "{{ session('alert') }}",
            title: "{{ session('message') }}"
          });
    </script>
  @endif
      @yield('script')    
  </body>  
</html>