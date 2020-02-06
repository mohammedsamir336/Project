@include('layouts.login.header')

<title>Reset Password</title>



<style media="screen">

   /*to to remove blue background and black text from input*/
     @-webkit-keyframes autofill {
   to {
   color: #000000 ;
   background: transparent; } }

   @keyframes autofill {
   to {
   color: #3A91FF ;
   background: transparent; } }

   input:-webkit-autofill {
   -webkit-animation-name: autofill;
   animation-name: autofill;
   -webkit-animation-fill-mode: both;
   animation-fill-mode: both; }
   /*end autofill*/

#log{
  position: relative;top:300px;
}
</style>



<div class="container" id="log">
  <a id="login" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#modalLoginAvatar">
    {{ trans('auth.Reset Password') }} </a>
</div>

<section class="view intro-3">
      <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">

            <div class="col-lg-4">
            <!--Modal: Login with Avatar Form-->
            <div class="modal fade" id="modalLoginAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                <!--Content-->
                <div class="modal-content">

                  <!--Header-->
                  <div class="modal-header">
                 <a href="{{route('home')}}"  class="rounded-circle img-responsive"><img src="{{ asset('img/m.png') }}" alt="avatar" class="rounded-circle img-responsive" ></a>
                  </div>
                  <!--Body-->
                  <div class="text-center mb-1">

                    <h5 class="mt-1 mb-2">{{ trans('auth.Forgot Password?') }}</h5>
                 <p class="mt-5 mb-5">{{ trans('auth.You can reset your password here.') }}</p>
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

              <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                    <div class="md-form ml-0 mr-0 ">

                     <input id="form29" type="email" class="form-control form-control-sm ml-0 @error('email') is-invalid @enderror text-dark requiredfield" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      <label data-error="wrong" data-success="right" for="form29" class="ml-0 text-dark">{{ trans('auth.E-Mail Address') }}</label>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>


                    <div class="text-center mt-4">
                      <button class="btn btn-cyan btn-rounded my-3">{{ trans('auth.Send Password Reset Link') }} <i class="fa fa-sign-in ml-1"></i></button>
                    </div>
                  </div>
              </form>
                </div>
                <!--/.Content-->
              </div>
            </div>
            <!--Modal: Login with Avatar Form-->
           </div>
                </div>
                  </div>
       </div>
         </div>
         </section>


@include('layouts.login.footer')
