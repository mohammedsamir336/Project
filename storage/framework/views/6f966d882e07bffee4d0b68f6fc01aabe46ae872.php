<?php echo $__env->make('layouts.index.home_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<title><?php echo e($user->email); ?></title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet" type="text/css">
<style media="screen">
    #img {
        width: 61%;
        height: 250px;
    }

</style>

<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-10">


            <div class="card m-l-300 m-t-70">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item "> <a class="nav-link active " data-toggle="tab" href="#changepassword" role="tab"><span class="hidden-sm-up "></span> <span class="hidden-xs-down ">change password</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#photo" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down ">change photo</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down ">change profile</span></a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">

                    <div class="tab-pane  active" id="changepassword" role="tabpanel">
                        <div class="p-20">
                            <h2 class="text-center "><?php echo e(__('Reset Password')); ?></h2>

                            <form method="POST" action="<?php echo e(route('change_password')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="panel-body">

                                    <!-- if reset password success -->
                                    <?php if(session('success')): ?>
                                    <div class="alert alert-success m-t-30" role="alert">
                                        <?php echo e(session('success')); ?>

                                    </div>
                                    <?php endif; ?>


                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input id="old_password" type="password" class="form-control" placeholder="<?php echo e(__('old Password')); ?>" name="old_password" required autocomplete="old-password">

                                            <?php if(session('error')): ?>
                                            <span class="text-danger" role="alert">
                                                <?php echo e(session('error')); ?>

                                            </span>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('New Password')); ?>" name="password" required autocomplete="new-password">

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

                                    <div class="col-md-6">
                                        <div class="md-form mb-0">

                                            <input id="password-confirm" type="password" class="form-control" placeholder="<?php echo e(__('Confirm Password')); ?>" name="password_confirmation" required autocomplete="new-password">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="recover-submit" class="btn btn-info btn-rounded " value="<?php echo e(__('Reset Password')); ?>" type="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="tab-pane p-20" id="photo" role="tabpanel">
                        <div class="p-20">

                            <div class="col-lg-4 mb-4 m-l-30">
                                <?php if( file_exists('img/users_img/'.$user->img)): ?>
                                <img id="user_img" src="<?php echo e(asset('img/users_img/'.$user->img)); ?>" class=" rounded-circle hoverable" height="230" width="250" />
                                <?php else: ?>
                                <img id="user_img" src="<?php echo e($user->img); ?>" class=" rounded-circle hoverable" height="90" width="90" />
                                <?php endif; ?>
                                <!-- for show img after upload -->
                                <span class="z-depth-1 mb-3 mx-10" id="uploaded_image"></span>

                                <p class="text-muted "><small>Profile photo will be changed automatically</small></p>
                                <!-- for alert -->
                                <div class="alert" id="message" style="display: none"></div>

                                <div class="row flex-center">

                                    <form enctype="multipart/form-data" id="upload_form" method="POST">
                                        <?php echo csrf_field(); ?>

                                        <div class="file-field">
                                            <button class="btn btn-info btn-rounded btn-sm waves-effect waves-light">
                                                Upload New Photo
                                                <i class="fas fa-cloud-upload-alt mr-2" aria-hidden="true"></i>
                                                <input type="file" name="select_file" id="select_file" multiple>
                                            </button>
                                        </div>
                                        <input class="btn btn-success btn-rounded btn-sm waves-effect waves-light " type="submit" name="upload" id="upload" value="Upload" style="margin-left:50px;">
                                    </form>
                                </div>

                            </div>
                            <!-- Card content -->


                        </div>
                    </div>

                    <!-- Card -->
                    <div class="tab-pane p-20" id="profile" role="tabpanel">


                        <div style="margin-left:30px">

                            <!-- Edit Form -->
                            <form action="<?php echo e(route('change_profile')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <!-- First row -->

                                <div class="row">


                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form1" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Name')); ?>" required>

                                        </div>
                                    </div>
                                    <!-- Second column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form2" class="form-control <?php $__errorArgs = ['job'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="job" value="<?php echo e(old('job')); ?>" placeholder="<?php echo e(__('Your Job')); ?>">

                                        </div>
                                    </div>
                                </div>
                                <!-- First row -->

                                <!-- First row -->
                                <div class="row">
                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form81" class="form-control <?php $__errorArgs = ['birth'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="birth" value="<?php echo e(old('birth')); ?>" placeholder="<?php echo e(__('Birth Date')); ?>" onfocus="(this.type='date')"
                                              onblur="if(this.value==''){this.type='text'}">

                                        </div>
                                    </div>

                                    <!-- Second column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="url" id="form82" class="form-control <?php $__errorArgs = ['website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="website" value="<?php echo e(old('website')); ?>" placeholder="<?php echo e(__('Website Address')); ?>">

                                        </div>
                                    </div>
                                </div>
                                <!-- First row -->

                                <!-- Second row -->
                                <div class="row">

                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form76" class="form-control <?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="facebook" value="<?php echo e(old('facebook')); ?>" placeholder="<?php echo e(__('Facebook Address')); ?>">

                                        </div>
                                    </div>
                                    <!-- Second column -->

                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form77" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="<?php echo e(__('Phone number')); ?>" onfocus="(this.type='number')"
                                              onKeyPress="if(this.value.length == 17) return false;">
                                        </div>
                                    </div>
                                </div>
                                <!-- Second row -->

                                <!-- Third row -->
                                <div class="row">

                                    <!-- First column -->
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <textarea type="text" id="form78" class="md-textarea form-control <?php $__errorArgs = ['about'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="about" rows="3" maxlength="200">
                                            <?php echo e(old('about')); ?>

                                            </textarea>
                                            <label for="form78">About me</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Third row -->

                                <!-- Fourth row -->
                                <div class="row">
                                    <div class="col-md-12 text-center my-4">
                                        <span class="waves-input-wrapper waves-effect waves-light"><input type="submit" value="Update Profile" class="btn btn-info btn-rounded"></span>
                                    </div>
                                </div>
                                <!-- Fourth row -->

                            </form>
                            <!-- Edit Form -->

                        </div>
                        <!-- Card content -->

                    </div>
                    <!-- Card -->

                </div>
            </div>
        </div>
    </div>

</div>
<!-- Post -->
<section class="bg0 p-t-70 p-b-55">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-80">
                <div class="row">

                </div>

            </div>

        </div>
    </div>
</section>



<?php echo $__env->make('layouts.index.home_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    /*ajax upload Image*/
    $(document).ready(function() {

        $('#upload_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo e(route('uploadimg')); ?>",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#user_img').css('display', 'none');
                    $('#message').css('display', 'block');
                    $('#message').html(data.message);
                    $('#message').addClass(data.class_name);
                    $('#uploaded_image').html(data.uploaded_image);
                }
            })
        });

    });

</script>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\auth\user_setting.blade.php ENDPATH**/ ?>