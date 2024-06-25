
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
          <ul>
              <li class="menu-title">
                  <span>Main Menu</span>
              </li>
              <li>
                  <a href="<?php echo e(route('home')); ?>"><i class="feather-grid"></i><span>Dashboard</span></a>
              </li>
              <li>
                  <a href="<?php echo e(route('project.menu')); ?>"><i class="fas fa-clipboard-list"></i> <span>Project Menu</span></a>
              </li>
              <?php
                  $companies = App\Models\InstituteList::all();
              ?>


              <li class="submenu">
                  <a href="#"><i class="fas fa-file-invoice-dollar"></i><span>Perusahaan<span class="menu-arrow"></span></span></a>
                  <ul class="nav nav-children">
                      <li>
                        <?php if(auth()->check() && auth()->user()->hasRole(['admin', 'manager'])): ?>
                        <a href="<?php echo e(route('_list.perusahaan')); ?>"> 
                            Tambah Perusahaan
                        </a>
                        <?php endif; ?>
                      </li>
                       <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li>
                              <a href="<?php echo e(route('company.show', $company->id)); ?>">
                                  <?php echo e($company->name); ?>

                              </a>
                          </li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </ul>
              </li>

              <li>
                <a href="<?php echo e(route('menurekap')); ?>"><i class="fas fa-calendar-day"></i> <span>Laporan Rekap</span></a>
            </li>
              
              <li>
                  <a href="<?php echo e(route('list_penjualan')); ?>"><i class="fa fa-shopping-cart"></i><span>penjualan</span></a>
              </li>   

              <?php if(auth()->check() && auth()->user()->hasRole(['admin','manager'])): ?>
              <li>
                <a href="<?php echo e(route('user')); ?>"><i class="fas fa-address-card"></i><span>pengguna</span></a>
            </li>
              <?php endif; ?>
              
              <li>
                <a href="<?php echo e(route('events.show')); ?>"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
            </li>
          </ul>
      </div>
  </div>
</div>

<?php /**PATH /var/www/resources/views/components/sidebar.blade.php ENDPATH**/ ?>