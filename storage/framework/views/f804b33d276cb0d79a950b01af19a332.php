<div class="header">
  <div class="header-left bg-danger bg-gradient text-white">
      <a href="<?php echo e(route('home')); ?>" class="logo">
          
          <img src="<?php echo e(asset('assets/img/image.png' )); ?>" class="" alt="Logo" width="80" height="40">
      </a>
      <a href="<?php echo e(route('home')); ?>" class="logo logo-small">
          <img src="<?php echo e(asset('assets/img/visdat.png' )); ?>" alt="Logo" width="30" height="30">
          
      </a>
  </div>
  <div class="menu-toggle">
      <a class="bg-white" href="javascript:void(0);" id="toggle_btn">
          <i class="fas fa-bars text-danger"></i>
      </a>
  </div>
  
  <a class="mobile_btn bg-white" id="mobile_btn">
      <i class="fas fa-bars text-danger"></i>
  </a>

  <ul class="nav user-menu">


      <li class="nav-item dropdown noti-dropdown me-2">
          
          
      </li>
      <li class="nav-item dropdown has-arrow new-user-menus">
        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
            <span class="user-img">
                <?php
                    $user = Auth::user();
                    $role = $user->roles->first();
                ?>
                <?php switch($role->id):
                    case (1): ?>
                        <img class="rounded-circle" src="<?php echo e(asset('assets/admin.png')); ?>" width="31" alt="Admin">
                        <?php break; ?>
                    <?php case (2): ?>
                        <img class="rounded-circle" src="<?php echo e(asset('assets/user.png')); ?>" width="31" alt="User">
                        <?php break; ?>
                    <?php case (3): ?>
                        <img class="rounded-circle" src="<?php echo e(asset('assets/manager.png')); ?>" width="31" alt="Manager">
                        <?php break; ?>
                    <?php default: ?>
                        <img class="rounded-circle" src="<?php echo e(asset('assets/default.png')); ?>" width="31" alt="User">
                <?php endswitch; ?>
                <div class="user-text">
                    <h6><?php echo e($user->username); ?></h6>
                    <p class="text-muted mb-0"><?php echo e($role->name); ?></p>
                </div>
            </span>
        </a>
        <div class="dropdown-menu">
            <div class="user-header">
               
                <div class="avatar avatar-sm">
                    <?php switch($role->id):
                    case (1): ?>
                        <img class="rounded-circle" src="<?php echo e(asset('assets/admin.png')); ?>" width="31" alt="Admin">
                        <?php break; ?>
                    <?php case (2): ?>
                        <img class="rounded-circle" src="<?php echo e(asset('assets/user.png')); ?>" width="31" alt="User">
                        <?php break; ?>
                    <?php case (3): ?>
                        <img class="rounded-circle" src="<?php echo e(asset('assets/manager.png')); ?>" width="31" alt="Manager">
                        <?php break; ?>
                    <?php default: ?>
                        <img class="rounded-circle" src="<?php echo e(asset('assets/default.png')); ?>" width="31" alt="User">
                <?php endswitch; ?>
                </div>
                <div class="user-text">
                    <h6><?php echo e($user->username); ?></h6>
                    <p class="text-muted mb-0">
                            <?php echo e($role->name); ?>

                            </p>
                            </div>
            </div>
            <a class="dropdown-item" href="<?php echo e(route('profile_user')); ?>">My Profile</a>
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
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
            </form>
        </div>
    </li>
    

  </ul>
</div><?php /**PATH /var/www/resources/views/components/header.blade.php ENDPATH**/ ?>