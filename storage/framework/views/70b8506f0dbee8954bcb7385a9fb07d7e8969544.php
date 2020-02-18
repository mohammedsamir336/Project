<?php $__env->startSection('index'); ?>
<div class="form-gap">
<form method="POST" action="<?php echo e(route('admin.password.request')); ?>">
    <?php echo csrf_field(); ?>

  <input type="hidden" name="token" value="<?php echo e($token); ?>">

<div class="div container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 mt-3">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <?php if(session('status')): ?>
                      <div class="alert alert-success" role="alert">
                          <?php echo e(session('status')); ?>

                      </div>
                  <?php endif; ?>
                  <h2 class="text-center">Admin <?php echo e(__('Reset Password')); ?></h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">

          <div class="form-group">
              <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                      <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($email ?? old('email')); ?>"  placeholder="<?php echo e(__('E-Mail Address')); ?>" required autocomplete="email" autofocus>

                      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="invalid-feedback" role="alert">
                              <strong><?php echo e($message); ?></strong>
                          </span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
           </div>
          <div class="form-group">
             <div class="input-group">
                  <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Password')); ?>" name="password" required autocomplete="new-password">

                      <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="invalid-feedback" role="alert">
                              <strong><?php echo e($message); ?></strong>
                          </span>
                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>

            <div class="form-group">
               <div class="input-group">

               <input id="password-confirm" type="password" class="form-control"  placeholder="<?php echo e(__('Confirm Password')); ?>" name="password_confirmation" required autocomplete="new-password">

                </div>
              </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary  " value="<?php echo e(__('Reset Password')); ?>" type="submit">
                      </div>


                  </div>

                </div>
              </div>
            </div>
          </div>
	</div>
</div>

  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.nav_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Project\resources\views\admin\auth\passwords\reset.blade.php ENDPATH**/ ?>