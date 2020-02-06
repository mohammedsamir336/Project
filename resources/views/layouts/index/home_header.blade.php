<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">

   <link rel="icon" href="{{ asset('img/m.png') }}" type="image/icon type">

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<!--===============================================================================================-->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('indexfolder/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
  <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet" type="text/css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('indexfolder/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('indexfolder/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('indexfolder/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('indexfolder/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('indexfolder/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('indexfolder/css/util.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('indexfolder/css/main.css') }}">
<!--===============================================================================================-->


<style media="screen">
#banner{
 width:71%;
 height:101px;
 position: relative;left:150px;
}
#navbanner{
  width:95%;
 height:95px;
 margin-bottom: 20px;
}
/*to to remove blue background and black text from input*/
  @-webkit-keyframes autofill {
to {
color: #33B7FF ;
background: transparent; } }

@keyframes autofill {
to {
color: #33B7FF ;
background: transparent; } }

input:-webkit-autofill {
-webkit-animation-name: autofill;
animation-name: autofill;
-webkit-animation-fill-mode: both;
animation-fill-mode: both;
  }

/*password span*/
span.field-icon {
  position: absolute;
  display: inline-block;
  cursor: pointer;
  right: 0.5rem;
  top: 0.7rem;
  color: $input-label-color;
  z-index: 2;
}

#username{
  font-size: 13px;
}
.size-a-33 {
  width: 39%;
  min-height: 87px;
}

.size-a-51 {
  width: 90%;
  min-height: 270px;
}
/*for googel lang bar*/
.goog-te-banner-frame.skiptranslate{display:none!important;}
body{top:0px!important;}



  /*first letter users name in circle*/
.msgw-MessageHeader .msgw-Avatar {
  margin-right: .5rem;
  flex-grow: 0;
}
@media (min-width: 768px)
.msgw-Avatar--sm {

}
.msgw-Avatar--sm {
  font-family: Helvetica Neue,Helvetica,Arial,Liberation Sans,Roboto,Noto,sans-serif;
  font-size: .75rem;
  letter-spacing: 0;
   width: 37px;
   line-height: 37px;
   border-radius: 47%;
   text-align: center;
   font-size: 27px;
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
<body >

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="topbar">
				<div class="content-topbar container h-100">
					<div class="left-topbar" style="margin:0px 450px 0px 0px;">
						<span class="left-topbar-item flex-wr-s-c">
							<span title="	Egypt, Cairo">
								Egypt, Cairo
							</span>

              @if ( now()->format('a') == 'pm')

            <img class="m-b-1 m-rl-8" src="{{asset('indexfolder/images/icons/icon-night.png')}}" alt="IMG" title="night">
           @else

           <i class="fas fa-sun m-b-1 m-rl-8"></i>

            @endif
            <strong id="date" class="m-r-5">
                <!-- the time function in home_footer script	HI 58° LO 56° -->
            </strong>
             <strong>  - {{now()->locale('ar')->isoFormat('dddd Do MMM  OY')}}</strong>
						</span>


              <a href="{{route('welcom_contact')}}" class="left-topbar-item" title="Contact">
              {{ __('Contact') }}
              </a>

              @auth
               <a href="#" class="left-topbar-item" id="username" title=" {{Auth::user()->name}}">
                {{Auth::user()->name}}
               </a>

               @else
               <a href="{{ route('register') }}" class="left-topbar-item" title=" Register">
                 {{ __('Register') }}
               </a>


               <a href="#" class="left-topbar-item "   data-toggle="modal" data-target="#modalContactForm" title="Login">
                 {{ __('Login') }}
               </a>

               @endauth

               <!--input and form-->
               <div mdbModal #frame="mdbModal" class=" modal fade top" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                   <div class="modal-dialog form-dark" role="document">
                       <div class="card card-image modal-content"
     style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/Nature/6-col/img (122).jpg'); width: 30rem;">
                   <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">

                   <div class="modal-header text-center pb-4" >
         <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel">

       <i class="fas fa-user "></i>
           <a class="green-text font-weight-bold" id="login" href="{{ route('login') }}" title="Login">
             <strong> {{ __('Login') }}</strong>
           </a>

         </h3>
         <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close" (click)="frame.hide()">
           <span aria-hidden="true">&times;</span>
         </button>

       </div>
       <br>


          @if (session('message'))
          <span class=" text-danger  ">  <strong >{{ session('message')}}
          </strong></span>
          @else
          <span class=" text-danger  ">  <strong >{{session()->get('login')}}
          </strong></span>
            @endif

             <!--Body-->
       <form method="POST" action="{{ route('login') }}" class="mt-3">
        @csrf

   <div class="md-form pb-3 white-text " >
     <i class="fas fa-envelope prefix white-text"></i>
   <input id="email_login" type="email" class="form-control white-text @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" >
   <label for="email_login" class="white-text">{{ __('E-Mail Address') }}</label>

   @error('email')
   <span class="invalid-feedback" role="alert">
   <strong>{{ $message }}</strong>
   </span>
   @enderror
   </div>
     <!--Body-->

    <div class="md-form pb-3 white-text " >
     <i class="fas fa-lock prefix white-text"></i>
   <input id="input-pwd" type="password" class="form-control white-text @error('password') is-invalid @enderror"  name="password" required autocomplete="current-password">
   <label for="password"  class="white-text">{{ __('Password') }}</label>
   <span toggle="#input-pwd" class="fa fa-fw fa-eye field-icon toggle-password text-dark"></span>

     @error('password')
     <span class="invalid-feedback" role="alert">
     <strong>{{ $message }}</strong>
     </span>
     @enderror

     @if (Route::has('password.request'))
     <p class="font-small blue-text d-flex justify-content-end"><a class="blue-text ml-1" href="{{ route('password.request') }}">
      {{ __('Forgot Your Password?') }}
      </a></p>
      @endif

         <div class="form-check my-4">
     <input class="form-check-input" type="checkbox" name="remember" id="defaultCheck17" {{ old('remember') ? 'checked' : '' }}>
     <label class="form-check-label green-text font-weight" for="defaultCheck17">
   {{ __('Remember Me') }}
     </label>

         </div>
        </div>
       <!--Grid row-->

       <div class="row d-flex align-items-center mb-4">
                             <!--Grid column-->
         <div class="text-center mb-3 col-md-12">
         <a><button type="submit" id="btn-one" name="send" class="btn btn-success btn-lg btn-block btn-rounded" data-loading-text="Loading...">
           {{ __('Login')}}
         </button></a>
        </div>

                             <!--Grid column-->
       </div>
                           <!--Grid row-->
       <hr>
       <div class="inline-ul text-center d-flex justify-content-center ">
         <a class="p-2 m-2 fa-lg li-ic" href="{{route('facebook')}}"><i class="fab fa-facebook-f text-center white-text" title="facebook"> </i></a>
         <a class="p-2 m-2 fa-lg tw-ic" href="{{route('github')}}"><i class="fab fa-github white-text" title="github"></i></a>
         <a class="p-2 m-2 fa-lg ins-ic" href="{{route('google')}}"><i class="fab fa-google-plus-g  white-text" title="google"> </i></a>
       </div>
<hr>
 </form>
       <div class="font-small blue-text d-flex justify-content-end">
         <p class="font-small grey-text d-flex justify-content-end white-text">Not a member? <a href="{{ route('register') }}"
             class="blue-text ml-1"> Sign Up</a></p>
       </div>


       </div>
         </div>

          </div>
             </div>
					</div>
             <!--end login -->
					<div class="right-topbar">
            <li class="right-topbar">

              <a href="{{route('facebook')}}"title="facebook">
  							<span class="fab fa-facebook-f"></span>
  						</a>

  						<a href="#" title="twitter">
  							<span class="fab fa-twitter"></span>
  						</a>

              <a href="{{route('github')}}"title="github">
  							<span class="fab fa-github" ></span>
  						</a>

  						  <!--<a href="#">
  							<span class="fab fa-vimeo-v"></span>
  						</a>-->

              <a href="{{route('google')}}" title="google">
                <span class="fab fa-google-plus-g"></span>
              </a>
            <li class="nav-item dropdown">


              <!--lang and google translate in home_footer js -->
             <div id="google_translate_element" style="display:none"></div>
            <a  id="ar" href="{{ language()->back('ar') }}">العربية</a>
            <a  id="en" href="{{ language()->back('en') }}">English</a>

                <!-- <a class="nav-link dropdown-toggle left-topbar-item" href="" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">

            <i class="fa fa-globe" aria-hidden="true"></i>

            <img src="{{asset('img\united-states-of-america-flag-icon-16.png')}}" alt=""> <span> English</span>
              </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#"><img src="{{asset('img\egypt-flag-icon-16.png')}}" alt=""> <span> العربية</span> </a>
                <div role="separator" class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><img src="{{asset('img\france-flag-icon-16.png')}}" alt=""> <span> France</span> </a>
            </div>-->
            </li>
					</div>
				</div>
			</div>




			<!-- Header Mobile -->
			<div class="wrap-header-mobile">
				<!-- Logo moblie -->
				<div class="logo-mobile">
					<a href="{{ route('welcome') }}"><img src="{{asset('img/mo.png')}}" alt="IMG-LOGO" style="margin-bottom: 20px;" title="Mohammed Samir"></a>
				</div>

				<!-- Button show menu -->
				<div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>

			<!-- Menu Mobile -->
			<div class="menu-mobile">
				<ul class="topbar-mobile">
					<li class="left-topbar">
						<span class="left-topbar-item flex-wr-s-c">
							<span>
								EGYPT, Cairo
							</span>

              @if ( now()->format('a') == 'pm')

            <img class="m-b-1 m-rl-8" src="{{asset('indexfolder/images/icons/icon-night.png')}}" alt="IMG">
           @else

           <i class="fas fa-sun m-b-1 m-rl-8"></i>

            @endif

							<span>
								HI 58° LO 56°
							</span>
						</span>
					</li>


					<li class="left-topbar">
						<a href="#" class="left-topbar-item">
							{{ __('About') }}
						</a>

						<a href="{{route('contact')}}" class="left-topbar-item">
						{{ __('Contact') }}
						</a>

            @auth
             <a  href="#" class="left-topbar-item  h6">
              {{Auth::user()->name}}
             </a>

             @else
             <a href="{{ route('register') }}" class="left-topbar-item">
               {{ __('Register') }}
             </a>

             <a href="{{ route('login') }}" class="left-topbar-item">
               {{ __('Login') }}
             </a>
             @endauth

					</li>

					<li class="right-topbar">
            <a href="{{route('facebook')}}">
							<span class="fab fa-facebook-f"></span>
						</a>

						<a href="#">
							<span class="fab fa-twitter"></span>
						</a>

            <a href="{{route('github')}}">
							<span class="fab fa-github"></span>
						</a>

						<a href="#">
							<span class="fab fa-vimeo-v"></span>
						</a>

            <a href="{{route('google')}}">
              <span class="fab fa-google-plus-g"></span>
            </a>
					</li>

          <li class="nav-item dropdown">
            <div id="google_translate_element" ></div>
          <!--  <a class="nav-link dropdown-toggle left-topbar-item" href="" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">

          <img src="{{asset('img\united-states-of-america-flag-icon-16.png')}}" alt=""> <span> English</span>
            </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#"><img src="{{asset('img\egypt-flag-icon-16.png')}}" alt=""> <span> العربية</span> </a>
              <div role="separator" class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><img src="{{asset('img\france-flag-icon-16.png')}}" alt=""> <span> France</span> </a>
          </div>-->
          </li>

				</ul>

				<ul class="main-menu-m">
					<li>

						<span class="arrow-main-menu-m">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</span>
					</li>

					<li>
						<a href="#">News</a>
					</li>

					<li>
						<a href="#">Entertainment </a>
					</li>

					<li>
						<a href="#">Business</a>
					</li>

					<li>
						<a href="#">Travel</a>
					</li>

					<li>
						<a href="#">Life Style</a>
					</li>

					<li>
						<a href="#">Video</a>
					</li>


          @auth
          <li>
            <a >{{Auth::user()->email}}</a>
            <ul class="sub-menu">
              <li><a href="category-01.html">My Comments</a></li>
              <li><a href="category-02.html">My Contact</a></li>
              <li><a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form></li>

            </ul>
            <span class="arrow-main-menu-m">
              <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>

          </li>
            @endauth

				</ul>
			</div>

      <!--  -->
      <div class="wrap-logo container">
        <!-- Logo desktop -->
        <div class="logo">
          	<a href="{{ route('welcome') }}"><img  style="margin-bottom: 30px; width:65px;"src="{{ asset('img/mo.png')}}" alt="LOGO"  title="Mohammed Samir"></a>
        </div>

        <!-- Banner -->
        <div class="banner-header">
          <a><img class="max-w-full " src="{{asset('img/mohammed.png')}}" alt="IMG" id="navbanner"></a>
        </div>
      </div>



			<!--  -->
			<div class="wrap-main-nav">
				<div class="main-nav">

        @include('layouts.index.nav')

      	</div>
			</div>
		</div>
	</header>
