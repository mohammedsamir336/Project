<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

 <link rel="icon" href="<?php echo e(asset('img/m.png')); ?>" type="image/icon type">

  <title><?php echo e(config('app.name')); ?> - <?php echo e(trans('auth.Sign Up')); ?></title>


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet">

  <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

  <style>

  select {
      border: 0;
      -moz-appearance: none;
      -webkit-appearance: none;
      appearance:none;
  }
/*to to remove blue background and black text from input*/
  @-webkit-keyframes autofill {
to {
color: #666;
background: transparent; } }

@keyframes  autofill {
to {
color: #666;
background: transparent; } }

input:-webkit-autofill {
-webkit-animation-name: autofill;
animation-name: autofill;
-webkit-animation-fill-mode: both;
animation-fill-mode: both; }

  /*show pass*/
  :root {

  }


    html,
    body,
    header,
    .view {
      height: 100%;
    }

    @media (min-width: 851px) and (max-width: 1440px) {
      html,
      body,
      header,
      .view {
        height: 850px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }

    @media (min-width: 451px) and (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 1200px;
      }
    }

    @media (max-width: 450px) {
      html,
      body,
      header,
      .view {
        height: 1400px;
      }
    }

    .intro-2 {
      background: url("https://mdbootstrap.com/img/Photos/Others/forest1.jpg")no-repeat center center;
      background-size: cover;
    }

    .top-nav-collapse {
      background-color: #3f51b5 !important;
    }

    .navbar:not(.top-nav-collapse) {
      background: transparent !important;
    }

    @media (max-width: 768px) {
      .navbar:not(.top-nav-collapse) {
        background: #3f51b5 !important;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
        .navbar:not(.top-nav-collapse) {
            background: #3f51b5!important;
        }
    }

    .rgba-gradient {
      background: -webkit-linear-gradient(98deg, rgba(22, 91, 231, 0.5), rgba(255, 32, 32, 0.5) 100%);
      background: -webkit-gradient(linear, 98deg, from(rgba(22, 91, 231, 0.5)), to(rgba(255, 32, 32, 0.5)));
      background: linear-gradient(to 98deg, rgba(22, 91, 231, 0.5), rgba(255, 32, 32, 0.5) 100%);
    }

    .card {
      background-color: rgba(255, 255, 255, 0.85);
    }

    h6 {
      line-height: 1.7;
    }






    .form-elegant .font-small {
    font-size: 0.8rem;
    color: #A9A9A9;    }

    .form-elegant .z-depth-1a {
    -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
    box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25); }

    .form-elegant .z-depth-1-half,
    .form-elegant .btn:hover {
    -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
    box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15); }

  </style>

</head>

<body>

  <!--Main Navigation-->
  <header>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">

      <!-- Navbar brand -->


        <a class="navbar-brand" href="<?php echo e(route('welcome')); ?>"><strong> Mohammed </strong></a>

      <!-- Collapse button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Collapsible content -->
      <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-globe" aria-hidden="true"></i>
          <?php echo e(trans('auth.langues')); ?>

            </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?php echo e(language()->back('ar')); ?>"><img src="<?php echo e(asset('img\egypt-flag-icon-16.png')); ?>" alt=""> <span> العربية</span> </a>
               <div role="separator" class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo e(language()->back('en')); ?>"><img src="<?php echo e(asset('img\united-states-of-america-flag-icon-16.png')); ?>" alt=""> <span> English</span> </a>
              <div role="separator" class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><img src="<?php echo e(asset('img\france-flag-icon-16.png')); ?>" alt=""> <span> France</span> </a>
          </div>
          </li>


        </ul>
        <!-- Links -->



          <form class="form-inline" action="<?php echo e(route('search')); ?>" method="get">
          <div class="md-form my-0">
            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" required aria-label="Search">
          </div>
        </form>
      </div>
      <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->
    <?php echo $__env->yieldContent('content'); ?>
    <script type="text/javascript">
      $('.dropdown-toggle').dropdown()
    </script>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/layouts/register/header.blade.php ENDPATH**/ ?>