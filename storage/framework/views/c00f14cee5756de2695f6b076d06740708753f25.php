<?php echo $__env->make('layouts.login.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<title> mohammed-<?php echo e(trans('auth.Login')); ?></title>

<!-- Grid container -->
 <div class="container my-5">

   <!--Grid row-->
   <div class="row d-flex justify-content-center">

     <!-- Mobile box -->
     <div class="mobile-box view">
       <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/6-col/img (122).jpg" class="bg-image"
         alt="smaple image">
       <div class="mask gradient-mask">

         <!-- Navbar -->
         <div class="mobile-navbar d-flex justify-content-between p-2">

           <div>
             <i class="fas fa-signal"></i>
             <i class="far fa-bell-slash"></i>
             <i class="fas fa-wifi"></i>
           </div>

           <span><?php echo e(trans('auth.Login')); ?></span>

           <div>
             <i class="fab fa-bluetooth-b"></i>
             <small>100%</small>
             <i class="fas fa-battery-full"></i>
           </div>

         </div>
         <!-- Navbar -->

         <a href="<?php echo e(route('home')); ?>" class="float-right font-weight-bold mr-4 mt-2">
           <?php echo e(trans('auth.Skip')); ?>

         </a>


         <!-- Content -->
         <form method="POST" action="<?php echo e(route('login')); ?>">
          <?php echo csrf_field(); ?>

         <div class="mt-5 p-4 text-center animated fadeIn">
           <!-- check if blocked -->
           <?php if(session('message')): ?>
           <span  class="invalid text-danger" role="alert" >
               <strong>*<?php echo e(session('message')); ?> </strong>
           </span>
             <?php endif; ?>

           <div class="md-form form-md">
         <input id="email-input" type="email" class="form-control text-white <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> requiredfield"  name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" >
         <label for="email-input" class="white-text"><?php echo e(trans('auth.E-Mail Address')); ?></label>

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

           <div class="md-form form-md">
         <input id="input-pwd" type="password" class="form-control text-white <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> requiredfield"  name="password" required autocomplete="current-password">
         <label for="input-pwd"  class="white-text"><?php echo e(trans('auth.Password')); ?></label>
        <span toggle="#input-pwd" class="fa fa-fw fa-eye field-icon toggle-password text-dark"></span>
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

           <?php if(Route::has('password.request')): ?>
           <p class="font-small blue-text d-flex justify-content-end"><a class="blue-text ml-1" href="<?php echo e(route('password.request')); ?>">
            <?php echo e(trans('auth.Forgot Your Password?')); ?>

            </a></p>
            <?php endif; ?>


                      <div class="form-check my-4">
                  <input class="form-check-input" type="checkbox" name="remember" id="defaultCheck17" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                  <label class="form-check-label green-text font-weight" for="defaultCheck17">
                <?php echo e(trans('auth.Remember Me')); ?>

                  </label>

                      </div>
           <!-- Sign in button -->
           <button class="btn btn-outline-white btn-rounded btn-block my-4 waves-light z-depth-0" type="submit">
            <?php echo e(trans('auth.Sign in')); ?></button>

            </form>
           <!-- Sign in button -->
           <button class="btn btn-outline-white btn-rounded btn-block my-4 waves-light z-depth-0" type="submit"><i
               class="fab fa-facebook-f mr-2"></i><?php echo e(trans('auth.Facebook')); ?></button>

           <!-- Register -->
           <p><?php echo e(trans('auth.Not a member?')); ?>

             <a target="_blank" href="<?php echo e(route('register')); ?>" class="font-weight-bold blue-text ml-1"><?php echo e(trans('auth.Sign Up')); ?></a>
           </p>

           <hr>
           <div class="inline-ul text-center d-flex justify-content-center ">
             <a class="p-2 m-2 fa-lg li-ic" href="<?php echo e(route('facebook')); ?>"><i class="fab fa-facebook-f text-center white-text"> </i></a>
             <a class="p-2 m-2 fa-lg tw-ic" href="<?php echo e(route('github')); ?>"><i class="fab fa-github white-text"></i></a>
             <a class="p-2 m-2 fa-lg ins-ic" href="<?php echo e(route('google')); ?>"><i class="fab fa-google-plus-g  white-text"> </i></a>
           </div>

         </div>
         <!-- Content -->

       </div>
     </div>
     <!-- Mobile box -->




   </div>
   <!--Grid row-->

 </div>
 <!-- Grid container -->



<?php echo $__env->make('layouts.login.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Project\resources\views\auth\login.blade.php ENDPATH**/ ?>