<?php echo $__env->make('layouts.register.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style media="screen">

span.field-icon {
   position: absolute;
   display: inline-block;
   cursor: pointer;
   right: 0.5rem;
   top: 0.7rem;
   color: $input-label-color;
   z-index: 2;
 }

.select-container {
    position: relative;
    width: 170px;
}

select {
    border: 2px solid #eee;
    border-radius: 10px;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance:none;
    width: 100%;
    height: 35px;
    line-height: 35px;
    background: #0000;
    font-size: 14px;
    font-weight: 500;
    color: #333;
    text-transform: uppercase;
    outline:none;
    padding-left: 15px;
    transition: 0.5s;
    box-shadow: none !important;

}

select:focus, select:hover {
  box-shadow: 3px 3px 10px #eee
}

select:-moz-focusring {
    color: transparent;
    text-shadow: 0 0 0 #000;
}

select::-ms-expand {
    display: none;
}

.select-arrow {
    color: #333;
    left:161px;
    top: 11px;
    width:30px;
    position:absolute;
    display:block;
    z-index: 10;
    margin: 0 0 0 0;
    pointer-events:none;
}
/* alert div*/
.css-2viodn {
    width: 100%;
    display: block;
    box-sizing: border-box;
    margin-bottom: 0px;
}
.css-hzwjmo {
    width: 0px;
    height: 0px;
    margin-left: 6px;
    margin-bottom: 0px;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-bottom: 6px solid rgb(207, 60, 45);
}
.css-1j97nb6 {
    color: rgb(255, 255, 255);
    background-color: rgb(207, 60, 45);
    text-align: left;
    font-size: 0.875rem;
    line-height: 1rem;
    border-radius: 2px;
    padding: 0.25rem 0.5rem;
}

/*end alert div*/
</style>

<body>
<section class="view intro-2">
      <div class="mask rgba-gradient">
        <div class="container h-100 d-flex justify-content-center align-items-center">

          <!--Grid row-->
          <div class="row  pt-5 mt-3">

            <!--Grid column-->
            <div class="col-md-12">

              <div class="card">
                <div class="card-body">

                  <!--Grid row-->
                  <div class="row mt-5">

                    <!--Grid column-->
                    <div class="col-md-6 ml-lg-5 ml-md-3">

                      <!--Grid row-->
                      <div class="row pb-4">
                        <div class="col-2 col-lg-1">
                          <i class="fas fa-university indigo-text fa-lg"></i>
                        </div>
                        <div class="col-10">
                          <h4 class="font-weight-bold mb-4">

                            <strong>Safety</strong>
                          </h4>
                          <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores
                            nam, aperiam
                            minima assumenda deleniti hic.</p>
                        </div>
                      </div>
                      <!--Grid row-->

                      <!--Grid row-->
                      <div class="row pb-4">
                        <div class="col-2 col-lg-1">
                          <i class="fas fa-desktop deep-purple-text fa-lg"></i>
                        </div>
                        <div class="col-10">
                          <h4 class="font-weight-bold mb-4">
                            <strong>Technology</strong>
                          </h4>
                          <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores
                            nam, aperiam
                            minima assumenda deleniti hic.</p>
                        </div>
                      </div>
                      <!--Grid row-->

                      <!--Grid row-->
                      <div class="row pb-4">
                        <div class="col-2 col-lg-1">
                          <i class="fas fa-money-bill-alt purple-text fa-lg"></i>
                        </div>
                        <div class="col-10">
                          <h4 class="font-weight-bold mb-4">
                            <strong>Finance</strong>
                          </h4>
                          <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores
                            nam, aperiam
                            minima assumenda deleniti hic.</p>
                        </div>
                      </div>
                      <!--Grid row-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-5">

                      <!--Grid row-->
                      <div class="row pb-4 d-flex justify-content-center mb-4">

                        <h4 class="mt-3 mr-4">
                      <strong><a href="<?php echo e(route('login')); ?>"><?php echo e(trans('auth.Login')); ?></a> :</strong>
                        </h4>

                          <a class="p-2 m-2 fa-lg li-ic" href="<?php echo e(route('facebook')); ?>">
                            <i class="fab fa-facebook-f text-center indigo-text"> </i>
                          </a>
                          <a class="p-2 m-2 fa-lg tw-ic" href="<?php echo e(route('github')); ?>">
                            <i class="fab fa-github fa-lg indigo-text"></i>
                          </a>
                          <a class="p-2 m-2 fa-lg ins-ic" href="<?php echo e(route('google')); ?>">
                            <i class="fab fa-google-plus-g  indigo-text"> </i>
                          </a>
                          <a class="p-2 m-2 fa-lg ins-ic">
                            <i class="fab fa-instagram fa-lg text-center indigo-text"> </i>
                          </a>
                      </div>
                      <!--/Grid row-->

                      <!--Body-->
                      <form method="POST" action="<?php echo e(route('register')); ?>">
                          <?php echo csrf_field(); ?>
                          <div class="form-group" style="position:relative;left:250px">

                            <div class="select-container">
                              <span class="select-arrow fa fa-chevron-down"></span>
                              <select name="country" class="browser-default requiredfield" id="real" required  title="dsfsd">
                                <?php if(App::getLocale() == 'ar'): ?>
                                <option value="" dir="rtl">* <?php echo e(trans('auth.Choose Country')); ?>...</option>
                                <?php else: ?>
                                <option value="">* <?php echo e(trans('auth.Choose Country')); ?>...</option>
                                <?php endif; ?>
                                  <option data-code="+44" value="uk"><?php echo e(trans('auth.United Kingdom')); ?></option>
                                  <option data-code="+20" value="Egy"><?php echo e(trans('auth.Egypt')); ?></option>
                                  <option data-code="+49" value="ger"><?php echo e(trans('auth.Gemany')); ?></option>
                                  <option data-code="+33" value="fra"><?php echo e(trans('auth.France')); ?></option>
                                  <option data-code="+39" value="ita"><?php echo e(trans('auth.Italy')); ?></option>
                              </select>

                          </div>
                          </div>
                      <div class="md-form">
                        <i class="fas fa-user prefix"></i>
                       <input id="name" type="text" class="form-control  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> requiredfield" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus>
                        <label for="name"><?php echo e(trans('auth.Name')); ?></label>
                        <?php $__errorArgs = ['name'];
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

                      <div class="md-form">
                        <i class="fas fa-envelope prefix"></i>
                        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> requiredfield" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
                        <label for="email"><?php echo e(trans('auth.E-Mail Address')); ?></label>

                        <!--check unique email-->
                        <div class="css-0">
                          <div class="css-2viodn" id="error_email">

                        </div>
                        </div>

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

                        <div class="md-form">
                       <i class="fa fa-phone prefix"></i>
                       <input  id="phone" class="form-control  <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> requiredfield" name="phone"
                        value="<?php echo e(old('phone')); ?>"  placeholder="<?php echo e(trans('auth.Phone')); ?> " required autocomplete="phone" >


                       <!--check unique phone-->
                       <div class="css-0">
                         <div class="css-2viodn " id="error_phone">

                       </div>
                       </div>

                       <?php $__errorArgs = ['phone'];
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

                      <div class="md-form">
                        <i class="fas fa-lock prefix"></i>
                        <input id="input-pwd" type="password" class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> requiredfield" name="password" required autocomplete="new-password">
                        <label data-error="wrong" data-success="right" for="input-pwd"><?php echo e(trans('auth.Password')); ?></label>
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
                      </div>

                        <div class="md-form">
                        <i class="fas fa-lock prefix"></i>
                          <input id="password-confirm" type="password" class="form-control requiredfield " name="password_confirmation" required autocomplete="new-password">
                          <label for="password-confirm"><?php echo e(trans('auth.Confirm Password')); ?></label>
                         </div>

                      <div class="text-center">
                        <button class="btn btn-primary btn-rounded my-3" id="send"><?php echo e(trans('auth.Sign Up')); ?>

                        </button>
                      </div>
                    </form>

                    </div>
                    <!--Grid column-->

                  </div>
                  <!--Grid row-->

                </div>
              </div>

            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->
        </div>
      </div>
    </section>
    <!--Intro Section-->


<?php echo $__env->make('layouts.register.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\auth\register.blade.php ENDPATH**/ ?>