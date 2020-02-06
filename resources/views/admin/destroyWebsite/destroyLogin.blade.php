<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Error</title>


    <link rel="icon" href="{{ asset('img/m.png') }}" type="image/icon type">

    <!-- Custom CSS -->
    <link href="{{ asset('adminfolder/assets/libs/flot/css/float-chart.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('adminfolder/dist/css/style.min.css') }}" rel="stylesheet">
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

        @keyframes autofill {
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



    <div class="main-wrapper bg-dark">
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
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark" style="position:relative;bottom:20px">

            <div class="auth-box bg-dark  border-secondary" style="position:relative;bottom:100px">

                <h1 class="text-danger"> <b>Be careful that a system error occurs !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!</b> </h1>

                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    <h3 class="text-danger">
                      <!-- {{trans('message.success')}} -->{{ session('error') }} </h3>

                </div>
                @endif
                <div>
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="{{ asset('img/m.png') }}" alt="logo" width="50%" /></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" method="POST" action="{{ url('admin/destroy') }}">
                        @csrf

                        <div class="row p-b-30">
                            <div class="col-12">

                                <!-- email -->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon2"><i class="ti-email"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" aria-label="email"
                                      aria-describedby="basic-addon2" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon4"><a toggle="#input-pwd" href="#" class="fa fa-fw fa-eye field-icon toggle-password text-dark"></a></span>
                                    </div>

                                    <input id="input-pwd" type="password" class="form-control form-control-lg  @error('password') is-invalid @enderror" name="password" placeholder=" {{ __(' Password') }}" aria-label="password" required>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit"> {{ __('destroy') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <img src="{{asset('img/top.png')}}" alt="sdfd">
        </span>
    </div>

    <script src="{{ asset('adminfolder/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('adminfolder/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('adminfolder/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('adminfolder/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('adminfolder/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('adminfolder/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('adminfolder/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('adminfolder/dist/js/custom.min.js') }}"></script>
    <!-- this page js -->
    <script src="{{ asset('adminfolder/assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('adminfolder/assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('adminfolder/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="{{ asset('adminfolder/assets/libs/flot/excanvas.js') }}"></script>
    <script src="{{ asset('adminfolder/assets/libs/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('adminfolder/assets/libs/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('adminfolder/assets/libs/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('adminfolder/assets/libs/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('adminfolder/assets/libs/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('adminfolder/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('adminfolder/dist/js/pages/chart/chart-page-init.js') }}"></script>
    <!-- for textarea  -->
    <script src="https://cdn.tiny.cloud/1/eiexryt2aqizncsdcvb6d9sh66yy0yickrrv8ym0umvpee32/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>

        //password show/hidden
        $('.toggle-password').on('click', function() {
            $(this).toggleClass('fa-eye fa-eye-slash');
            let input = $($(this).attr('toggle'));
            if (input.attr('type') == 'password') {
                input.attr('type', 'text');
            } else {
                input.attr('type', 'password');
            }
        });

    </script>

</body>

</html>
