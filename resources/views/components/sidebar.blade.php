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
                  <a href=""><i class="fas fa-calendar-day"></i> <span>Events</span></a>
              </li>
              <li>
                  <a href="{{ route('project.menu') }}"><i class="fas fa-clipboard-list"></i> <span>Project Menu</span></a>
              </li>
              @php
                  $companies = App\Models\InstituteList::all();
              @endphp

              <li class="submenu">
                  <a href="#"><i class="fas fa-file-invoice-dollar"></i><span>Perusahaan</span> <span class="menu-arrow"></span></a>
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