
<?php $__env->startSection('content'); ?>
<div class="div">
  <div class="row">
    <div class="col-sm-12">
        <div class="card-header fw-bolder fs-6 bg-danger bg-gradient text-white mb-4">
            List Pengguna
        </div>
        <div class="card card-table">
            <div class="card-body">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">List User</h3>
                        </div>

                        <div class="col-6 text-end">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#add_user" class="btn btn-outline-danger"> <i class="fas fa-plus"></i> Tambah Pengguna</a>
                        </div>
                    </div>
                
                </div>

                <div class="table-responsive">
                  <table class="table align-items-center m-0 dataTable table-striped star-student table-hover table-center mb-0" id="dataTable3">
                      <thead>
                        <tr>
                            <th class="text-secondary">Firstname</th>
                            <th class="text-secondary">Lastname</th>
                            <th class="text-secondary">Username</th>
                            <th class="text-secondary">Email</th>
                            <th class="text-secondary">Phone</th>
                            <th class="text-secondary">Role</th>
                            <th class="text-secondary">Since</th>
                            <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                            <th class="text-secondary text-end">Action</th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade bank-details" id="add_user" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="form-header text-start mb-0">
                            <h4 class="mb-0">Tambah User</h4>
                        </div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('add_user')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">First Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Andi" value="<?php echo e(old('firstname')); ?>" name="firstname" >
                                    <?php $__errorArgs = ['firstname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Last Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Amalia" value="<?php echo e(old('lastname')); ?>" name="lastname" >
                                    <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">User Name</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Mell" value="<?php echo e(old('username')); ?>" name="username" >
                                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Email</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="" value="<?php echo e(old('email')); ?>" name="email" >
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Phone</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="+62" value="<?php echo e(old('phone')); ?>" name="phone" >
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">User Authority</label>
                                <div class="col-md-10">
                                    <select class="form-control form-select <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="type" >
                                        <option value="0" <?php echo e(old('type') == 0 ? 'selected' : ''); ?>>Administrator</option>
                                        <option value="1" <?php echo e(old('type') == 1 ? 'selected' : ''); ?>>Manager</option>
                                        <option value="2" <?php echo e(old('type') == 2 ? 'selected' : ''); ?>>Staff</option>
                                    </select>
                                    <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Password</label>
                                <div class="col-md-10">
                                    <input type="password" name="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('password')); ?>" placeholder="******" >
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Konfirmasi Password</label>
                                <div class="col-md-10">
                                    <input type="password" name="password_confirmation" class="form-control" value="<?php echo e(old('password_confirmation')); ?>" placeholder="******" >
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <div class="bank-details-btn">
                            <button type="submit" class="btn save-invoice-btn btn-primary"> Save</button>  
                            <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-danger me-2">Cancel</a>
                        </div>
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
  $(document).ready( function () {
      $('#dataTable3').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url: "<?php echo e(route('admin.dataTable.getUser')); ?>",
              type: 'GET'
          },
          columns: [
              { data: 'firstname', name: 'firstname' },
              { data: 'lastname', name: 'lastname' },
              { data: 'username', name: 'username' },
              { data: 'email', name: 'email' },
              { data: 'phone', name: 'phone' },
              { data: 'role', name: 'role' },
              { data: 'since', name: 'since' },
              {
                  data: 'id', 
                  name: 'action',
                  orderable: false,
                  searchable: false,
                  render: function(data, type, row, meta){

                    var editUrl = '<?php echo e(route("_edituser", ":id")); ?>'.replace(':id', data);
                    editUrl = editUrl.replace(':id', data);
                    var deleteUrl = '<?php echo e(route("_del.user", ":id")); ?>';
                      deleteUrl = deleteUrl.replace(':id', data);
                      return `
                      <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                       <a href="${editUrl}" class="btn btn-sm bg-danger-light me-2">
                        <i class="feather-edit"></i>
                    </a>
                      <a href="${deleteUrl}" class="btn btn-sm bg-danger-light" onclick="return confirm('Are you sure want to delete this User?')">
                      <i class="feather-trash-2"></i>
                      </a>
                      <?php endif; ?>
                     
                          `;
                  }
                }
          ]
      });
  });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/users.blade.php ENDPATH**/ ?>