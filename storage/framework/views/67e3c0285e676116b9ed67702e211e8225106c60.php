<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?php echo e(config('app.name')); ?>-Welcome</title>

    <link rel="icon" href="<?php echo e(asset('img/m.png')); ?>" type="image/icon type">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="<?php echo e(asset('vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/grayscale.min.css')); ?>" rel="stylesheet">
    <style media="screen">
        /*waves*/
        .box {
            height: 80px;
            border-radius: 8px;
            position: relative;
            overflow: hidden;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            width: 260px;
            float: right;
        }

        .wave {
            opacity: .6;
            position: absolute;
            top: -186px;
            left: 50%;
            background:
                #000000;
            width: 500px;
            height: 500px;
            margin-left: -250px;
            margin-top: -250px;
            -webkit-transform-origin: 50% 48%;
            transform-origin: 50% 48%;
            border-radius: 43%;
            -webkit-animation: drift 3000ms infinite linear;
            animation: drift 3000ms infinite linear;
        }


        .wave.-two {
            -webkit-animation: drift 7000ms infinite linear;
            animation: drift 7000ms infinite linear;
            opacity: .4;
            background: #A9A9A9;


        }

        .wave.-three {
            -webkit-animation: drift 5000ms infinite linear;
            animation: drift 5000ms infinite linear;
        }

        .title {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            z-index: 1;
            line-height: 60px;
            text-align: center;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            color: #fff;
            text-transform: uppercase;
            font-size: 24px;
            text-indent: .3em;
            font-weight: 700;
        }

        @keyframes  drift {
            from {
                transform: rotate(0deg);
            }

            from {
                transform: rotate(360deg);
            }
        }

        /*waves*/

        nav {
            position: fixed;
            top: 0;
            box-shadow: none !important;
            border: none !important;
        }

        /*to to remove blue background and black text from input*/
        @-webkit-keyframes autofill {
            to {
                color: #ffffff;
                background: transparent;
            }
        }

        @keyframes  autofill {
            to {
                color: #ffffff;
                background: transparent;
            }
        }

        input:-webkit-autofill {
            -webkit-animation-name: autofill;
            animation-name: autofill;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

    </style>
</head>


<body id="page-top">
    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">

        <header>
            <div class="container"><a href="<?php echo e(route('home')); ?>">
                    <div class="box">
                        <div class="wave -one"></div>
                        <div class="wave -two"></div>
                        <div class="wave -three"></div>
                        <div class="title">MOHAMMED</div>
                    </div>
                </a>
        </header>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php if(Route::has('login')): ?>
                <?php if(auth()->guard()->check()): ?>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php echo e(route('home')); ?>">Home</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php echo e(route('login')); ?>">login</a>
                </li>
                <?php if(Route::has('register')): ?>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?php echo e(route('register')); ?>">sign up</a>
                </li>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>

    <!-- Header -->
    <main class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase">welcome</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5"> Mohammed Website created by <br>Mohammed Samir.</h2>
                <a href="<?php echo e(route('home')); ?>" class="btn btn-primary js-scroll-trigger">Get Started</a>
            </div>
        </div>
    </main>

    <!-- About Section -->
    <section id="about" class="about-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">Built with MDBootstrap</h2>
                    <p class="text-white-50"></p>
                </div>
            </div>
            <!-- Signup Section -->
            <section id="signup" class="signup-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-lg-8 mx-auto text-center">


                            <?php if(session('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <h3>
                                    <!-- <?php echo e(trans('message.success')); ?> --><?php echo e(session('success')); ?> </h3>

                            </div>
                            <script type="text/javascript">
                                alert("<?php echo e(session('success')); ?>");

                            </script>
                            <?php endif; ?>

                            <!-- check if the email It belongs to user if belongs to he most be login first
                This method is safer-->
                            <?php if(session('user')): ?>
                            <div class="alert alert-danger m-t-20" role="alert">
                                <h3>
                                    <!-- <?php echo e(trans('message.success')); ?> -->
                                    *If you are <?php echo e(session('user')); ?> please (<a class="hov-cl10 text-default" href="<?php echo e(route('login')); ?>">logged in </a>) first ! </h3>
                            </div>
                            <?php endif; ?>
                            <!--Section heading-->
                            <h2 class="font-weight-bold text-center h1 my-5" id="contact">Contact us</h2>
                            <!--Section description-->
                            <p class="text-center grey-text mb-5 mx-auto w-responsive"></p>

                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-8 col-xl-9">


                                    <form action="<?php echo e(route('contact')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <!--Grid row-->
                                        <?php if(auth()->guard()->guest()): ?>
                                        <div class="row">

                                            <!--Grid column-->
                                            <div class="col-md-6 ">
                                                <div class="md-form">
                                                    <!--autofocus-->
                                                    <input id="name" type="text" class="form-control  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> text-white" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name">
                                                    <label for="name" class="text-white"><?php echo e(__('Name')); ?></label>

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
                                            </div>
                                            <!--Grid column-->

                                            <!--Grid column-->
                                            <div class="col-md-6">
                                                <div class="md-form">
                                                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> text-white" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
                                                    <label for="email" class="text-white"><?php echo e(__('E-Mail Address')); ?></label>

                                                </div>
                                            </div>
                                            <!--Grid column-->

                                        </div>
                                        <!--Grid row-->
                                        <?php endif; ?>
                                        <!--Grid row-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="md-form ">
                                                    <input id="sub" type="text" class="form-control  text-white <?php $__errorArgs = ['sub'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="sub" value="<?php echo e(old('sub')); ?>" maxlength="21" required autocomplete="sub">
                                                    <label for="sub" class="text-white">Subject</label>
                                                    <?php $__errorArgs = ['sub'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <strong class="text-danger" role="alert">
                                                        <strong class=" h5"><?php echo e($message); ?></strong>
                                                    </strong>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Grid row-->

                                        <!--Grid row-->
                                        <div class="row">

                                            <!--Grid column-->
                                            <div class="col-md-12">

                                                <div class="md-form">
                                                    <textarea type="text" id="contact-message" class="md-textarea form-control <?php $__errorArgs = ['text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> text-white" rows="3" name="text" maxlength="255" required
                                                      autocomplete="text"><?php echo e(old('text')); ?></textarea>
                                                    <label for="contact-message" class="text-white">Your message</label>

                                                </div>

                                            </div>
                                        </div>
                                        <!--Grid row-->

                                        <div class="text-center text-md-left my-4">
                                            <button class="btn btn-light-blue btn-rounded">Send</button>
                                        </div>
                                </div>
                                <!--Grid column-->
                                </form>
                                <!--Grid column-->
                                <div class="col-md-4 col-xl-3">
                                    <ul class="contact-icons text-center list-unstyled">
                                        <li><i class="fas fa-map-marker fa-2x "></i>
                                            <p class=""> <strong>53 Mohammed Abdel Wahab Street, SHobra</strong> </p>
                                        </li>

                                        <li><i class="fas fa-phone fa-2x "></i>
                                            <p class=""><strong>+20 011 54 838 995</strong></p>
                                        </li>

                                        <li><i class="fas fa-envelope fa-2x "></i>
                                            <p class=""><strong> <a class="text-dark" href="mailto:mohammed_samir336@yahoo.com">mohammed_samir336@yahoo.com</a></strong></p>
                                        </li>
                                    </ul>
                                </div>
                                <!--Grid column-->

                            </div>




                            <!--Section: Contact v.2-->
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Section -->
            <section class="contact-section bg-black">
                <div class="container">

                    <div class="row">

                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card py-4 h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                                    <h4 class="text-uppercase m-0">Address</h4>
                                    <hr class="my-4">
                                    <div class="small text-black-50">53 Mohammed Abdel Wahab Street, SHobra</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card py-4 h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-envelope text-primary mb-2"></i>
                                    <h4 class="text-uppercase m-0">Email</h4>
                                    <hr class="my-4">
                                    <div class="small text-black-50">
                                        <a href="mailto:mohammed_samir336@yahoo.com">mohammed_samir336@yahoo.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card py-4 h-100">
                                <div class="card-body text-center">
                                    <i class="fas fa-mobile-alt text-primary mb-2"></i>
                                    <h4 class="text-uppercase m-0">Phone</h4>
                                    <hr class="my-4">
                                    <div class="small text-black-50">+20 (011) 5483-8995</div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="social d-flex justify-content-center">
                        <a href="<?php echo e(route('google')); ?>" class="mx-2">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                        <a href="<?php echo e(route('facebook')); ?>" class="mx-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="<?php echo e(route('github')); ?>" class="mx-2">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>

                </div>
            </section>

            <!-- Footer -->
            <footer class="bg-black small text-center text-white-50">
                <div class="container">
                    Copyright &copy;2019 - <?php echo e(now()->format('Y')); ?> - All rights reserved. mm336 Mohammed Samir
                </div>
            </footer>


        </div>
    </section>

    <!-- Projects Section -->



    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo e(asset('js/jquery-3.4.1.min.js')); ?>"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo e(asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/mdb.min.js')); ?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo e(asset('js/grayscale.min.js')); ?>"></script>

    <script type="text/javascript">
        //hide nav when scroll
        window.onscroll = function(e) {
            var scrollY = window.pageYOffset || document.documentElement.scrollTop;
            var nav = document.querySelector('nav');

            scrollY <= this.lastScroll ?
                nav.style.visibility = 'visible' :
                nav.style.visibility = 'hidden';

            this.lastScroll = scrollY;
        }

    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/welcome.blade.php ENDPATH**/ ?>