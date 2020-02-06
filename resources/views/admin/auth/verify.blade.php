
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
<title> {{ config('app.name')}}-verify </title>
	<link rel="icon" href="{{ asset('img/m.png') }}" type="image/icon type">


  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">




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
background-color:rgba(33, 33, 33, 0.9);
color:#ffffff;
display:block;
font: 14px/1.3 Arial,sans-serif;
height:50px;
position:relative;
z-index:5;
}
h2{
margin-top: 30px;
text-align: center;
}
header h2{
font-size: 22px;
margin: 0 auto;
padding: 10px 0;
width: 80%;
text-align: center;
}
header a, a:visited {
text-decoration:none;
color:#fcfcfc;
}

@keyframes move-twink-back {
from {background-position:0 0;}
to {background-position:-10000px 5000px;}
}
@-webkit-keyframes move-twink-back {
from {background-position:0 0;}
to {background-position:-10000px 5000px;}
}
@-moz-keyframes move-twink-back {
from {background-position:0 0;}
to {background-position:-10000px 5000px;}
}
@-ms-keyframes move-twink-back {
from {background-position:0 0;}
to {background-position:-10000px 5000px;}
}

@keyframes move-clouds-back {
from {background-position:0 0;}
to {background-position:10000px 0;}
}
@-webkit-keyframes move-clouds-back {
from {background-position:0 0;}
to {background-position:10000px 0;}
}
@-moz-keyframes move-clouds-back {
from {background-position:0 0;}
to {background-position:10000px 0;}
}
@-ms-keyframes move-clouds-back {
from {background-position: 0;}
to {background-position:10000px 0;}
}

.stars, .twinkling, .clouds {
position:absolute;
top:0;
left:0;
right:0;
bottom:0;
width:100%;
height:100%;
display:block;
}

.stars {
background:#000 url(http://www.script-tutorials.com/demos/360/images/stars.png) repeat top center;
z-index:0;
}

.twinkling{
background:transparent url(http://www.script-tutorials.com/demos/360/images/twinkling.png) repeat top center;
z-index:1;

-moz-animation:move-twink-back 200s linear infinite;
-ms-animation:move-twink-back 200s linear infinite;
-o-animation:move-twink-back 200s linear infinite;
-webkit-animation:move-twink-back 200s linear infinite;
animation:move-twink-back 200s linear infinite;
}

.clouds{
background:transparent url(http://www.script-tutorials.com/demos/360/images/clouds3.png) repeat top center;
z-index:3;

-moz-animation:move-clouds-back 200s linear infinite;
-ms-animation:move-clouds-back 200s linear infinite;
-o-animation:move-clouds-back 200s linear infinite;
-webkit-animation:move-clouds-back 200s linear infinite;
animation:move-clouds-back 200s linear infinite;
}
</style>
  <!-- background -->
<div class="stars"></div>
<div class="twinkling"></div>
<div class="clouds">


  <div class="container-fluid text-center mt-5" style="position:fixed;left:250px;">

      <!-- Content -->
      <div class="text-white text-center d-flex align-items-center rgba-black py-5 px-4">
        <div>
          <h5 class="pink-text">
            <mdb-icon fas icon="chart-pie"></mdb-icon>
                {{ Auth::guard('admin')->user()->name }}
                   <br>
              {{ Auth::guard('admin')->user()->email }}
          </h5>

          @if (session('resent'))
              <div class="alert alert-success" role="alert">
                  {{ __('A fresh verification link has been sent to your email address.') }}
              </div>
          @endif

          <h3 class="card-title pt-2"><strong>{{ __('Verify Your Email Address') }}</strong></h3>
                {{ __('Admin Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('admin.verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>
                <br>
                <a class="nav-link js-scroll-trigger text-default" href="{{ route('admin.logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __(' Logout and Go Page Home') }}
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

      </div>

    </div>
  <!-- /Content -->

</div>
<!-- /background -->
