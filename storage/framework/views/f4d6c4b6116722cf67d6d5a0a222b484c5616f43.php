<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title> <?php echo e(config('app.name')); ?>-verify code </title>
    <link rel="icon" href="<?php echo e(asset('img/m.png')); ?>" type="image/icon type">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/grayscale.min.css')); ?>" rel="stylesheet">

    <style>
        nav {
            box-shadow: none !important;
            border: none !important;
        }

        /*nexmo page*/
        .double-nav .breadcrumb-dn {
            color: #fff;
        }

        .form-gap {

            width: 127vw;
            height: 785px;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .div {
            position: relative;
            left: 400px;
            position: relative;
            top: 150px;
        }

    </style>
</head>

<body class="fixed-sn navy-blue-skin ">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger text-default" href="<?php echo e(route('welcome')); ?>">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger text-default" href="<?php echo e(route('welcom_contact')); ?>">Contact</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger text-default" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                        <?php echo e(__('Logout')); ?>

                    </a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-default" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        langues
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#"><img src="<?php echo e(asset('img\egypt-flag-icon-16.png')); ?>" alt=""> <span> العربية</span> </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><img src="<?php echo e(asset('img\united-states-of-america-flag-icon-16.png')); ?>" alt=""> <span> English</span> </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><img src="<?php echo e(asset('img\france-flag-icon-16.png')); ?>" alt=""> <span> France</span> </a>

                    </div>

                </li>
            </ul>
        </div>
        </div>
    </nav>

    <div class="form-gap" data-jarallax='{"speed": 0.5}' style="background-image: url('https://mdbootstrap.com/img/Photos/Others/img (42).jpg');">

        <form method="POST" action="<?php echo e(route('nexmo')); ?>">
            <?php echo csrf_field(); ?>

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

                                    <?php if(session('nexmo')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo e(session('nexmo')); ?>

                                    </div>
                                    <?php endif; ?>

                                    <h2 class="text-center">Phone verify</h2>
                                    <p>Please Enter Your Verfiy Code From SMS</p>
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input onKeyPress="if(this.value.length==4) return false;" id="code" type="number" class="form-control validate <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="code" value="<?php echo e(old('code')); ?>"
                                                  placeholder="<?php echo e(__('Phone verfiy')); ?>" required autocomplete="code" autofocus>
                                                <?php if(session('error')): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>
                                                        <!-- <?php echo e(trans('message.success')); ?> --><?php echo e(session('error')); ?> <strong>
                                                </div>

                                                <?php endif; ?>
                                                <?php $__errorArgs = ['code'];
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
                                            <a href="nexmo/<?php echo e(auth()->user()->phone); ?>">Request new code</a>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary  " value="<?php echo e(__('send verfiy')); ?>" type="submit">
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

    <script type="text/javascript">
        $('.dropdown-toggle').dropdown()
        //hide nav when scroll
        window.onscroll = function(e) {
            var scrollY = window.pageYOffset || document.documentElement.scrollTop;
            var nav = document.querySelector('nav');

            scrollY <= this.lastScroll ?
                nav.style.visibility = 'visible' :
                nav.style.visibility = 'hidden';

            this.lastScroll = scrollY;
        }
        new WOW().init();
        $('.dropdown-toggle').dropdown()

    </script>
</body>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/nexmo.blade.php ENDPATH**/ ?>