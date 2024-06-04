{{-- <!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head> --}}
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
          <ul>
              <li class="menu-title">
                  <span>Main Menu</span>
              </li>
              <li>
                  <a href="{{ route('home') }}"><i class="feather-grid"></i><span>Dashboard</span></a>
              </li>
              <li>
                  <a href="{{ route('events') }}"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
              </li>
              <li>
                  <a href="{{ route('project.menu') }}"><i class="fas fa-clipboard-list"></i> <span>Project Menu</span></a>
              </li>
              @php
                  $companies = App\Models\InstituteList::all();
              @endphp

              <li class="submenu">
                  <a href="#"><i class="fas fa-file-invoice-dollar"></i><span>Perusahaan<span class="menu-arrow"></span></span></a>
                  <ul class="nav nav-children">
                      <li>
                          <a href="{{ route('_list.perusahaan') }}"> 
                              Tambah Perusahaan
                          </a>
                      </li>
                       @foreach ($companies as $company)
                          <li>
                              <a href="{{ route('company.show', $company->id) }}">
                                  {{ $company->name }}
                              </a>
                          </li>
                      @endforeach 
                  </ul>
              </li>
              
              <li>
                  <a href="{{ route('list_penjualan') }}"><i class="fa fa-shopping-cart"></i><span>penjualan</span></a>
              </li>   


              <li>
                  <a href="{{ route('user') }}"><i class="fas fa-address-card"></i><span>pengguna</span></a>
              </li>
          </ul>
      </div>
  </div>
</div>

{{-- <script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/feather.min.js"></script>
<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/js/script.js"></script>
</body>

</html> --}}