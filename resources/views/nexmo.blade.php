<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
 <title> {{ config('app.name')}}-verify code </title>
	<link rel="icon" href="{{ asset('img/m.png') }}" type="image/icon type">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link href="{{ asset('css/grayscale.min.css') }}" rel="stylesheet">

  <style>

nav{
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
.div{
    position:relative;left: 400px;
    position:relative;top: 150px;
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
            <a class="nav-link js-scroll-trigger text-default" href="{{ route('welcome') }}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-default" href="{{ route('welcom_contact') }}">Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger text-default" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-default" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-globe" aria-hidden="true"></i>
          langues
            </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#"><img src="{{asset('img\egypt-flag-icon-16.png')}}" alt=""> <span> العربية</span> </a>
              <div role="separator" class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><img src="{{asset('img\united-states-of-america-flag-icon-16.png')}}" alt=""> <span> English</span> </a>
               <div role="separator" class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><img src="{{asset('img\france-flag-icon-16.png')}}" alt=""> <span> France</span> </a>

          </div>

          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="form-gap" data-jarallax='{"speed": 0.5}' style="background-image: url('https://mdbootstrap.com/img/Photos/Others/img (42).jpg');">

   <form method="POST" action="{{ route('nexmo') }}">
       @csrf

  <div class="div container">
	    <div class="row">
		     <div class="col-md-4 col-md-offset-4 mt-3">
              <div class="panel panel-default">
                 <div class="panel-body">
                   <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>

                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  @if (session('nexmo'))
                      <div class="alert alert-success" role="alert">
                          {{ session('nexmo') }}
                      </div>
                  @endif
                  <h2 class="text-center">Phone verify</h2>
                  <p>Please Enter Your Verfiy Code From SMS</p>
              <div class="panel-body">

                 <div class="form-group">
                  <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                      <input onKeyPress="if(this.value.length==4) return false;" id="code" type="number" class="form-control validate @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}"  placeholder="{{ __('Phone verfiy') }}" required autocomplete="code" autofocus >

                      @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                      <strong> <!-- {{trans('message.success')}} -->{{ session('error') }} <strong>
                       </div>

                          @endif
                          @error('code')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                         @enderror

                    </div>
                  </div>
                    <div class="form-group">
                      <a  href="nexmo/{{ auth()->user()->phone }}" >Request new code</a>
                    </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary  " value="{{ __('send verfiy') }}" type="submit">
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

        scrollY <= this.lastScroll
          ? nav.style.visibility = 'visible'
          : nav.style.visibility = 'hidden';

        this.lastScroll = scrollY ;
        }
        new WOW().init();
        $('.dropdown-toggle').dropdown()
  </script>
</body>
