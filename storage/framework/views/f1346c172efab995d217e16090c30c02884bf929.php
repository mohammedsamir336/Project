<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title> <?php echo e(config('app.name')); ?>-verify </title>
    <link rel="icon" href="<?php echo e(asset('img/m.png')); ?>" type="image/icon type">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">




    <style media="screen">
        /* ==============================================================================================
SED Innovations
https://sed.am
https://mkrtchyan.ga
background
================================================================================================= */
        * {
            margin: 0;
            padding: 0;
        }

        header {
            background-color: rgba(33, 33, 33, 0.9);
            color: #ffffff;
            display: block;
            font: 14px/1.3 Arial, sans-serif;
            height: 50px;
            position: relative;
            z-index: 5;
        }

        h2 {
            margin-top: 30px;
            text-align: center;
        }

        header h2 {
            font-size: 22px;
            margin: 0 auto;
            padding: 10px 0;
            width: 80%;
            text-align: center;
        }

        header a,
        a:visited {
            text-decoration: none;
            color: #fcfcfc;
        }

        @keyframes  move-twink-back {
            from {
                background-position: 0 0;
            }

            to {
                background-position: -10000px 5000px;
            }
        }

        @-webkit-keyframes move-twink-back {
            from {
                background-position: 0 0;
            }

            to {
                background-position: -10000px 5000px;
            }
        }

        @-moz-keyframes move-twink-back {
            from {
                background-position: 0 0;
            }

            to {
                background-position: -10000px 5000px;
            }
        }

        @-ms-keyframes move-twink-back {
            from {
                background-position: 0 0;
            }

            to {
                background-position: -10000px 5000px;
            }
        }

        @keyframes  move-clouds-back {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 10000px 0;
            }
        }

        @-webkit-keyframes move-clouds-back {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 10000px 0;
            }
        }

        @-moz-keyframes move-clouds-back {
            from {
                background-position: 0 0;
            }

            to {
                background-position: 10000px 0;
            }
        }

        @-ms-keyframes move-clouds-back {
            from {
                background-position: 0;
            }

            to {
                background-position: 10000px 0;
            }
        }

        .stars,
        .twinkling,
        .clouds {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            display: block;
        }

        .stars {
            background: #000 url(http://www.script-tutorials.com/demos/360/images/stars.png) repeat top center;
            z-index: 0;
        }

        .twinkling {
            background: transparent url(http://www.script-tutorials.com/demos/360/images/twinkling.png) repeat top center;
            z-index: 1;

            -moz-animation: move-twink-back 200s linear infinite;
            -ms-animation: move-twink-back 200s linear infinite;
            -o-animation: move-twink-back 200s linear infinite;
            -webkit-animation: move-twink-back 200s linear infinite;
            animation: move-twink-back 200s linear infinite;
        }

        .clouds {
            background: transparent url(http://www.script-tutorials.com/demos/360/images/clouds3.png) repeat top center;
            z-index: 3;

            -moz-animation: move-clouds-back 200s linear infinite;
            -ms-animation: move-clouds-back 200s linear infinite;
            -o-animation: move-clouds-back 200s linear infinite;
            -webkit-animation: move-clouds-back 200s linear infinite;
            animation: move-clouds-back 200s linear infinite;
        }

    </style>
    <!-- background -->
    <div class="stars"></div>
    <div class="twinkling"></div>
    <div class="clouds">

<body>


    <!-- Links -->
    <ul class="navbar-nav mr-auto ml-5 mt">

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-globe" aria-hidden="true"></i>
                <?php echo e(trans('auth.langues')); ?>

            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?php echo e(language()->back('ar')); ?>"><img src="<?php echo e(asset('img\egypt-flag-icon-16.png')); ?>" alt=""> <span> العربية</span> </a>
                <div role="separator" class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo e(language()->back('en')); ?>"><img src="<?php echo e(asset('img\united-states-of-america-flag-icon-16.png')); ?>" alt=""> <span> English</span> </a>

            </div>
        </li>


    </ul>
    <!-- Links -->
    <div class="container-fluid text-center mt-5" style="position:fixed;left:250px;">

        <!-- Content -->
        <div class="text-white text-center d-flex align-items-center rgba-black py-5 px-4">
            <div>
                <h5 class="pink-text">
                    <mdb-icon fas icon="chart-pie"></mdb-icon>
                    <?php echo e(Auth::user()->name ?? ''); ?>

                    <br>
                    <?php echo e(Auth::user()->email ?? ''); ?>

                </h5>

                <?php $__errorArgs = ['Connection'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger" role="alert">
                    <span class="alert text-danger" role="alert">
                        <strong><?php echo e(trans('auth.your internet Connection has faild')); ?></strong>
                    </span>
                </div>
                <?php elseif(session('resent')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(trans('auth.A fresh verification link has been sent to your email address.')); ?>

                </div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>



                <!-- change direction of allpage-->
                <?php if(App::getLocale() == 'ar'): ?>
                <div class="" dir="rtl">
                    <?php endif; ?>
                    <h3 class="card-title pt-2"><strong><?php echo e(trans('auth.Verify Your Email Address')); ?></strong></h3>
                    <?php echo e(trans('auth.Before proceeding, please check your email for a verification link.')); ?>.
                    <?php echo e(trans('auth.If you did not receive the email')); ?>,
                    <form class="d-inline" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline"><?php echo e(trans('auth.click here to request another')); ?></button>.
                    </form>
                    <br>
                    <a class="nav-link js-scroll-trigger text-default" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <?php echo e(trans('auth.Logout and Go To Home Page')); ?>

                    </a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>

        </div>
        <!-- /Content -->

    </div>
    <!-- /background -->
    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo e(asset('js/jquery-3.4.1.min.js')); ?>"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo e(asset('js/mdb.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

    <script type="text/javascript">
        /*dropdown menu*/
        $('.dropdown-toggle').dropdown();

    </script>
</body>

</html>
</head>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/auth/verify.blade.php ENDPATH**/ ?>