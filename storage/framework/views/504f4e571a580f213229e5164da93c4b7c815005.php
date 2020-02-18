<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

 <title> <?php echo e(config('app.name')); ?> - <?php echo $__env->yieldContent('title'); ?> </title>

 <link rel="icon" href="<?php echo e(asset('img/m.png')); ?>" type="image/icon type">

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet">


<style media="screen">

body, html {
  height: 100%; }

body {
  background-image: url("https://mdbootstrap.com/wp-content/uploads/2019/02/back.jpg");
  background-position: center;
  background-repeat: no-repeat;
  -webkit-background-size: cover;
  background-size: cover; }

.mobile-box {
  width: 360px;
  height: 640px;
  color: #fff;
  text-align: center;
  -webkit-box-shadow: 0 27px 24px 0 rgba(0, 0, 0, 0.2), 0 40px 77px 0 rgba(0, 0, 0, 0.92) !important;
  box-shadow: 0 27px 24px 0 rgba(0, 0, 0, 0.2), 0 40px 77px 0 rgba(0, 0, 0, 0.92) !important; }

.view .bg-image {
  height: 100%; }

.view .gradient-mask {
  background: -webkit-linear-gradient(rgba(0, 47, 75, 0.8) 0%, rgba(220, 66, 37, 0.8) 100%);
  background: -o-linear-gradient(rgba(0, 47, 75, 0.8) 0%, rgba(220, 66, 37, 0.8) 100%);
  background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 47, 75, 0.8)), to(rgba(220, 66, 37, 0.8)));
  background: linear-gradient(rgba(0, 47, 75, 0.8) 0%, rgba(220, 66, 37, 0.8) 100%);
  /* Chrome10+,Safari5.1+ */
  /* Opera 11.10+ */
  /* IE10+ */
  /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#002f4b', endColorstr='#00000000', GradientType=0); }

.view a {
  color: #fff; }
  .view a:hover {
    color: #dfdfdf; }

.view input[type=text], .view input[type=password], .view input[type=email] {
  border-bottom: 1px solid #ffffff; }

.view .md-form input[type=text]:focus:not([readonly]), .view .md-form input[type=password]:focus:not([readonly]), .view .md-form input[type=email]:focus:not([readonly]) {
  border-bottom: 1px solid #bbdefb !important;
  -webkit-box-shadow: 0 1px 0 0 #bbdefb !important;
  box-shadow: 0 1px 0 0 #bbdefb !important; }

.view .md-form label {
  color: #ffffff }
  .view .md-form label.active {
    color: #bbdefb !important; }

    /*to to remove blue background and black text from input*/
      @-webkit-keyframes autofill {
    to {
    color: #ffffff ;
    background: transparent; } }

    @keyframes  autofill {
    to {
    color: #ffffff ;
    background: transparent; } }

    input:-webkit-autofill {
    -webkit-animation-name: autofill;
    animation-name: autofill;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both; }
/*end autofill*/

    span.field-icon {
      position: absolute;
      display: inline-block;
      cursor: pointer;
      right: 0.5rem;
      top: 0.7rem;
      color: $input-label-color;
      z-index: 2;
    }



</style>
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

           <span><?php echo e(__('Login')); ?></span>

           <div>
             <i class="fab fa-bluetooth-b"></i>
             <small>100%</small>
             <i class="fas fa-battery-full"></i>
           </div>

         </div>
         <!-- Navbar -->

         <a href="<?php echo e(route('home')); ?>" class="float-right font-weight-bold mr-4 mt-2">Skip
         </a>

         <?php if(session('message')): ?>
         <span class=" text-danger  ">  <strong ><?php echo e(session('message')); ?>

         </strong></span>
         <?php else: ?>
         <span class=" text-danger  ">  <strong ><?php echo e(session()->get('login')); ?>

         </strong></span>
           <?php endif; ?>

         <!-- Content -->
         <form method="POST" action="<?php echo e(route('login')); ?>">
          <?php echo csrf_field(); ?>

         <div class="mt-5 p-4 text-center animated fadeIn">



           <div class="md-form form-md">
         <input id="email-input" type="email" class="form-control text-white <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" >
         <label for="email-input" class="white-text"><?php echo e(__('E-Mail Address')); ?></label>

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
unset($__errorArgs, $__bag); ?>"  name="password" required autocomplete="current-password">
         <label for="input-pwd"  class="white-text"><?php echo e(__('Password')); ?></label>
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
            <?php echo e(__('Forgot Your Password?')); ?>

            </a></p>
            <?php endif; ?>


                      <div class="form-check my-4">
                  <input class="form-check-input" type="checkbox" name="remember" id="defaultCheck17" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                  <label class="form-check-label green-text font-weight" for="defaultCheck17">
                <?php echo e(__('Remember Me')); ?>

                  </label>

                      </div>
           <!-- Sign in button -->
           <button class="btn btn-outline-white btn-rounded btn-block my-4 waves-light z-depth-0" type="submit">Sign
             in</button>

            </form>
           <!-- Sign in button -->
           <button class="btn btn-outline-white btn-rounded btn-block my-4 waves-light z-depth-0" type="submit"><i
               class="fab fa-facebook-f mr-2"></i>Facebook</button>

           <!-- Register -->
           <p>Not a member?
             <a target="_blank" href="<?php echo e(route('register')); ?>" class="font-weight-bold blue-text ml-1"><?php echo e(__('Sign Up')); ?></a>
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


<?php echo $__env->make('layouts.login.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Project\resources\views\logtest.blade.php ENDPATH**/ ?>