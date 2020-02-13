<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" href="<?php echo e(asset('img/m.png')); ?>" type="image/icon type">

    <!-- Custom CSS -->
    <link href="<?php echo e(asset('adminfolder/assets/libs/flot/css/float-chart.css')); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('adminfolder/dist/css/style.min.css')); ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style media="screen">
        /*to to remove blue background and black text from input*/
        @-webkit-keyframes autofill {
            to {
                color: #33B7FF;
                background: transparent;
            }
        }

        @keyframes  autofill {
            to {
                color: #33B7FF;
                background: transparent;
            }
        }

        input:-webkit-autofill {
            -webkit-animation-name: autofill;
            animation-name: autofill;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        /*password toggle*/
        span.field-icon {
            position: absolute;
            display: inline-block;
            cursor: pointer;
            right: 0.5rem;
            top: 0.7rem;
            color: $input-label-color;
            z-index: 2;
        }

        /*//////////////////////////////////////////////////////////////////
[ BUTTON BACK TO TOP ]*/
        .btn-back-to-top {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            position: fixed;
            width: 35px;
            height: 35px;
            bottom: -40px;
            right: 40px;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0.6;
            cursor: pointer;
            transition: all 0.4s;
            -webkit-transition: all 0.4s;
            -o-transition: all 0.4s;
            -moz-transition: all 0.4s;
        }

        .symbol-btn-back-to-top {
            font-size: 18px;
            color: white;
            line-height: 1em;
        }

        .btn-back-to-top:hover {
            opacity: 1;
        }

        @media (max-width: 575px) {
            .btn-back-to-top {
                bottom: 0px;
                right: 15px;
            }
        }

        .show-btn-back-to-top {
            bottom: 0;
        }

        /*[  End BUTTON BACK TO TOP ]*/


        /*scrollable contact menu
.scrollable-menu {
    height: auto;
    max-height: 307px;
    overflow-x: hidden;
}*/

        /*contact menu*/
        .dropdown-menu {
            top: 60px;
            right: 0px;
            left: unset;
            width: 460px;
            box-shadow: 0px 5px 7px -1px #c1c1c1;
            padding-bottom: 0px;
            padding: 0px;
        }

        .dropdown-menu:before {
            content: "";
            position: absolute;
            top: -20px;
            right: 12px;
            border: 10px solid #343A40;
            border-color: transparent transparent #343A40 transparent;
        }

        .head {
            padding: 5px 15px;
            border-radius: 3px 3px 0px 0px;
        }

        .footer {
            padding: 5px 15px;
            border-radius: 0px 0px 3px 3px;
        }

        .notification-box {
            padding: 10px 0px;
        }

        .bg-gray {
            background-color: #eee;
        }

        @media (max-width: 640px) {
            .dropdown-menu {
                top: 50px;
                left: -16px;
                width: 290px;
            }

            .nav {
                display: block;
            }

            .nav .nav-item,
            .nav .nav-item a {
                padding-left: 0px;
            }

            .message {
                font-size: 13px;
            }
        }

        /* End contact menu*/

        /*to Do List*/
        .ff {

            color: red;
            text-decoration: line-through;
        }


        /*first letter users name in circle*/
        .msgw-MessageHeader .msgw-Avatar {
            margin-right: .5rem;
            flex-grow: 0;
        }

        @media (min-width: 768px) .msgw-Avatar--sm {}

        .msgw-Avatar--sm {
            font-family: Helvetica Neue, Helvetica, Arial, Liberation Sans, Roboto, Noto, sans-serif;
            font-size: .75rem;
            letter-spacing: 0;
            width: 50px;
            line-height: 50px;
            border-radius: 47%;
            text-align: center;
            font-size: 41px;
            border: 2px solid #FF5410;


        }

        .msgw-Avatar--black {
            background-color: #FD451D;
        }

        .msgw-Avatar {

            border-radius: 100%;
            color: #fff;
            text-align: center;
            text-transform: uppercase;

        }

        /* end first letter users name in circle*/

    </style>
</head>

<body>
    <!-- for title if admin have  new message -->
    <span id="message_notif" style="display:none"></span>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="<?php echo e(route('home')); ?>" target="_blank">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo e(asset('img/m.png')); ?>" alt="homepage" class="light-logo" height="50" width="51" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="<?php echo e(asset('adminfolder/assets/images/logo-text.png')); ?>" alt="homepage" class="light-logo" />
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                      aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo e(url('/admin/profile  1')); ?>">
                                <span class="d-none d-md-block">About </span>

                            </a>

                        </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- contact -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-bell font-24"></i>
                                <?php if($notfiy > 0): ?>
                                <!-- $notfiy  count of Messages id result number of messages-->
                                <span id="result" class="badge badge-danger badge-pill"></span>
                            </a>

                            <?php endif; ?>



                            <ul class="dropdown-menu scrollable-menu">
                                <li class="head text-light bg-dark">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12">
                                            <span>Messages Not Read (<span id="notfiy"></span >)</span>
                                            <a href="<?php echo e(url('admin/message/AsRead')); ?>" class="float-right text-light">Mark all as read</a>
                                        </div>
                                </li>

                                <!-- $contact and $notfiy in App\Http\view\Composers -->
                                <?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- if Not read message background will be gray -->
                                <?php if($message->status): ?>
                                <li class="notification-box ">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3 col-3 text-center ">
                                            <!-- if users -->
                                            <?php if( $message->users_id ): ?>
                                            <?php if( file_exists('img/users_img/'.$message->users_id()->first()->img)): ?>
                                            <img class="w-50 rounded-circle" src="<?php echo e(asset('img/users_img/'.$message->users_id()->first()->img)); ?>" alt="avatar" height="51px">
                                            <?php else: ?>
                                            <!-- if img users from socialite -->
                                            <img class="w-50 rounded-circle" src="<?php echo e($message->users_id()->first()->img); ?>" alt="avatar" height="51px">
                                            <?php endif; ?>
                                            <!-- if Not guest -->
                                            <?php else: ?>
                                            <div class="msgw-Avatar msgw-Avatar--sm msgw-Avatar--black ml-4"><?php echo e(strtoupper(mb_substr($message->name,0,1,'utf-8'))); ?></div>

                                            <?php endif; ?>
                                        </div>

                                        <div class="col-lg-8 col-sm-8 col-8 ">
                                            <a href="<?php echo e(url('admin/message/read '.$message->id)); ?>"><strong class="text-info"><?php echo e($message->name); ?></strong>
                                                <div class="text-dark">
                                                    <?php echo e($message->sub); ?>

                                                </div>
                                                <small class="text-warning"><?php echo e($message->created_at->format('dD M Y h:sA')); ?>, <?php echo e($message->created_at->longAbsoluteDiffForHumans()); ?> <!-- diffForHumans(null,true,true) --></small>
                                            </a>
                                        </div>
                                    </div>
                                </li>


                                <?php else: ?>
                                <!-- if Not read message background will be gray -->
                                <li class="notification-box bg-gray">
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-3 col-3 text-center ">
                                            <!-- if users -->
                                            <?php if( $message->users_id ): ?>
                                            <?php if( file_exists('img/users_img/'.$message->users_id()->first()->img)): ?>
                                            <img class="w-50 rounded-circle" src="<?php echo e(asset('img/users_img/'.$message->users_id()->first()->img)); ?>" alt="avatar" height="51px">
                                            <?php else: ?>
                                            <!-- if img users from socialite -->
                                            <img class="w-50 rounded-circle" src="<?php echo e($message->users_id()->first()->img); ?>" alt="avatar" height="51px">
                                            <?php endif; ?>
                                            <!-- if Not users -->
                                            <?php else: ?>
                                            <div class="msgw-Avatar msgw-Avatar--sm msgw-Avatar--black ml-4"><?php echo e(strtoupper(mb_substr($message->name,0,1,'utf-8'))); ?></div>
                                            <?php endif; ?>

                                        </div>

                                        <div class="col-lg-8 col-sm-8 col-8 ">
                                            <a href="<?php echo e(url('admin/message/read '.$message->id)); ?>"><strong class="text-info"><?php echo e($message->name); ?></strong>
                                                <div class="text-dark">
                                                    <?php echo e($message->sub); ?>

                                                </div>
                                                <small class="text-warning"><?php echo e($message->created_at); ?>, <?php echo e($message->created_at->longAbsoluteDiffForHumans()); ?> <!-- diffForHumans(null,true,true) --></small>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <li class="footer bg-dark text-center">
                                    <a href="<?php echo e(route('admin.Contacts_Message')); ?>" class="text-light">View All</a>
                                </li>
                            </ul>
                        </li>



                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                            <!-- Message -->
                                            <a href="<?php echo e(route('admin.MyPlans')); ?>" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Event today</h5>
                                                        <span class="mail-desc">Just a reminder that event</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="<?php echo e(route('admin.setting')); ?>" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Settings</h5>
                                                        <span class="mail-desc">You can customize this template</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#" class="link border-top" data-toggle="modal" data-target="#modalContactForm">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-primary btn-circle"><i class="ti-user"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">News</h5>
                                                        <span class="mail-desc">You can add news here</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="<?php echo e(route('admin.adminsactives')); ?>" class="link border-top">
                                                <div class="d-flex no-block align-items-center p-10">
                                                    <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Luanch Admin</h5>
                                                        <span class="mail-desc">Just see the my new admins!</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="logo" style="display: none"></a>
                            <?php if( file_exists('img/admin_img/'.Auth::guard('admin')->user()->img)): ?>
                            <a id="nav_img" class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img id="navimg"
                                  src="<?php echo e(asset('img/admin_img/'.Auth::guard('admin')->user()->img)); ?>" alt="admin" class="rounded-circle" height="51" width="51" title="<?php echo e(Auth::guard('admin')->user()->name); ?>"></a>
                            <?php else: ?>
                            <a id="nav_img" class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img id="navimg"
                                  src="<?php echo e(Auth::guard('admin')->user()->img); ?>" alt="admin" class="rounded-circle" height="51" width="51" title="<?php echo e(Auth::guard('admin')->user()->name); ?>"></a>
                            <?php endif; ?>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="<?php echo e(url('/admin/profile  '.Auth::guard('admin')->user()->id)); ?>"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="<?php echo e(route('admin.MyPlans')); ?>"><i class="ti-wallet m-r-5 m-l-5"></i> My Plans</a>
                                <a class="dropdown-item" href="<?php echo e(route('admin.fullcalendar_index')); ?>"><i class="mdi mdi-calendar-check"></i> Add Plans</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('admin.setting')); ?>"><i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> <?php echo e(__('Logout')); ?></a>
                                <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                                <div class="dropdown-divider"></div>

                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <aside class="left-sidebar " data-sidebarbg="skin5" style="margin-top:37px;">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('admin.dashboard')); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                  class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="charts.html" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Charts</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">posts </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.posts')); ?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> All posts </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.TrashPosts')); ?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Trash posts </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.NewPost')); ?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> New post </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.VideoPost')); ?>" class="sidebar-link"><i class="fa fa-film" aria-hidden="true"></i><span class="hide-menu"> New post with video </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-play-circle" aria-hidden="true"></i><span class="hide-menu">Videos </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.videos')); ?>" class="sidebar-link"><i class="fa fa-play-circle" aria-hidden="true"></i><span class="hide-menu"> All Videos </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.TrashVideos')); ?>" class="sidebar-link"><i class="fa fa-play-circle" aria-hidden="true"></i><span class="hide-menu"> Trash videos </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.NewVideo')); ?>" class="sidebar-link"><i class="fa fa-play-circle" aria-hidden="true"></i><span class="hide-menu"> New videos </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.NewVideoInPost')); ?>" class="sidebar-link"><i class="fa fa-film" aria-hidden="true"></i><span class="hide-menu"> New video in post </span></a></li>


                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="hide-menu">Users </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.actives')); ?>" class="sidebar-link"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="hide-menu"> Actives </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.blocked')); ?>" class="sidebar-link"><i class="fa fa-user-times" aria-hidden="true"></i><span class="hide-menu"> Blocked </span></a></li>

                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Admins </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.adminsactives')); ?>" class="sidebar-link"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="hide-menu"> Actives </span></a></li>
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.adminsblocked')); ?>" class="sidebar-link"><i class="fa fa-user-times" aria-hidden="true"></i><span class="hide-menu"> Blocked </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu">Add Admins </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.AddAdmin')); ?>" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Normal Admin </span></a></li>
                                <?php if(Auth::guard('admin')->user()->superadmin): ?>
                                <li class="sidebar-item"><a href="<?php echo e(route('admin.AddSuperAdmin')); ?>" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span class="hide-menu"> Super Admin </span></a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- get notfiy  of new messages number from route function im web url message_notfiy -->
            <script>

               var source = new EventSource("<?php echo e(url('message_notfiy')); ?>");
               source.onmessage = function(event) {
                 document.getElementById("result").innerHTML = event.data;
                 document.getElementById("notfiy").innerHTML = event.data;
                 //message_notif for title
                 document.getElementById("message_notif").innerHTML = '(' + event.data + ')' + ' ' +'New Message...';
               };

             </script>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/admin/layout/header.blade.php ENDPATH**/ ?>