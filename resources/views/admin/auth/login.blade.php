@include('layouts.login.header')
<title> mohammed-Admin</title>



<!-- Grid container -->
 <div class="container my-5">

   <!--Grid row-->
   <div class="row d-flex justify-content-center">

     <!-- Mobile box -->
     <div class="mobile-box view">
       <img src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/6-col/img (122).jpg" class="bg-image"
         alt="smaple image">
       <div class="mask gradient-mask">

         <!-- Navbar -->
         <div class="mobile-navbar d-flex justify-content-between p-2">

           <div>
             <i class="fas fa-signal"></i>
             <i class="far fa-bell-slash"></i>
             <i class="fas fa-wifi"></i>
           </div>

           <span>{{ __('Admin') }}</span>

           <div>
             <i class="fab fa-bluetooth-b"></i>
             <small>100%</small>
             <i class="fas fa-battery-full"></i>
           </div>

         </div>
         <!-- Navbar -->

         <a href="{{route('home')}}" class="float-right font-weight-bold mr-4 mt-2">Home
         </a>


         <!-- Content -->
         <form method="POST" action="{{ route('admin.login') }}">
          @csrf

         <div class="mt-5 p-4 text-center animated fadeIn">

           <!-- check if blocked -->
           @if (session('message'))
           <span  class="invalid text-danger" role="alert" >
               <strong>*{{ session('message')}} </strong>
           </span>
             @endif

           <div class="md-form form-md">
         <input id="email-input" type="email" class="form-control text-white @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" >
         <label for="email-input" class="white-text">{{ __('E-Mail Address') }}</label>

         @error('email')
         <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
         </span>
         @enderror
           </div>
<br>
           <div class="md-form form-md">
         <input id="input-pwd" type="password" class="form-control text-white @error('password') is-invalid @enderror"  name="password" required autocomplete="current-password">
         <label for="input-pwd"  class="white-text">{{ __('Password') }}</label>
        <span toggle="#input-pwd" class="fa fa-fw fa-eye field-icon toggle-password text-dark"></span>

           @error('password')
           <span class="invalid-feedback" role="alert">
           <strong>{{ $message }}</strong>
           </span>
           @enderror

           @if (Route::has('admin.password.request'))
           <p class="font-small blue-text d-flex justify-content-end"><a class="blue-text ml-1" href="{{ route('admin.password.request') }}">
            {{ __('Forgot Your Password?') }}
            </a></p>
            @endif


          <div class="form-check my-4">
              <input class="form-check-input" type="checkbox" name="remember" id="defaultCheck17" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label green-text font-weight" for="defaultCheck17">
            {{ __('Remember Me') }}
              </label>

          </div>
                      <br>
           <!-- Sign in button -->
           <button class="btn btn-outline-white btn-rounded btn-block my-4 waves-light z-depth-0 " type="submit">Sign
             in</button>

            </form>
           <!-- Sign in button -->
           <hr>

         </div>
         <!-- Content -->

       </div>
     </div>
     <!-- Mobile box -->

   </div>
   <!--Grid row-->

 </div>
 <!-- Grid container -->





@include('layouts.login.footer')
