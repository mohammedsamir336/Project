<?php $__env->startSection('title'); ?>
Admin Reset Password
<?php $__env->stopSection(); ?>
<style media="screen">

.intro-3 {
    background: url('https://mdbootstrap.com/img/Photos/Others/images/91.jpg');
   background-repeat: no-repeat; background-size: cover; background-position: center center;
    background-size: cover;
   }

</style>

<?php $__env->startSection('content'); ?>

<section class="view intro-3">

      <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">

            <div class="col-lg-4">


             <div id="section7">

              <div class="welcome" >

              <a href=""  id="login" class="btn btn-pink btn-rounded" data-toggle="modal" data-target="#modalLoginAvatar">
                <?php echo e(__('Reset Password')); ?>  </a>
               </div>

            </div>

            <!--Modal: Login with Avatar Form-->
            <div class="modal fade" id="modalLoginAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                <!--Content-->
                <div class="modal-content">

                  <!--Header-->
                  <div class="modal-header">
                    <img src="<?php echo e(asset('img/m.png')); ?>" alt="avatar" class="rounded-circle img-responsive">
                  </div>
                  <!--Body-->
                  <div class="text-center mb-1">
                 <h4 class="mt-1 mb-2 text-info"><?php echo e(__('Welcome Admin')); ?></h4>
                    <h5 class="mt-1 mb-2"><?php echo e(__('Forgot Password?')); ?></h5>
                 <p class="mt-5 mb-5"><?php echo e(__('You can reset your password here.')); ?></p>
                    <div class="card-body">

                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

              <form method="POST" action="<?php echo e(route('admin.password.email')); ?>">
                            <?php echo csrf_field(); ?>
                    <div class="md-form ml-0 mr-0 ">

                    <input id="form29" type="email" class="form-control form-control-sm ml-0 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> text-dark" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
                      <label data-error="wrong" data-success="right" for="form29" class="ml-0 text-dark"><?php echo e(__('E-Mail Address')); ?></label>

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


                    <div class="text-center mt-4">
                      <button class="btn btn-purple btn-rounded"><?php echo e(__('Send Password Reset Link')); ?> <i class="fas fa-sign-in ml-1"></i></button>
                    </div>
                  </div>
              </form>
                </div>
                <!--/.Content-->
              </div>
            </div>
            <!--Modal: Login with Avatar Form-->
           </div>
                </div>
                  </div>
       </div>
         </div>
         </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.login.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.login.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Project\resources\views\admin\auth\passwords\email.blade.php ENDPATH**/ ?>