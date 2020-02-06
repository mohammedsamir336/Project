@extends('layouts.login.header')
@section('title')
Admin Reset Password
@endsection
<style media="screen">

.intro-3 {
    background: url('https://mdbootstrap.com/img/Photos/Others/images/91.jpg');
   background-repeat: no-repeat; background-size: cover; background-position: center center;
    background-size: cover;
   }

</style>

@section('content')

<section class="view intro-3">

      <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">

            <div class="col-lg-4">


             <div id="section7">

              <div class="welcome" >

              <a href=""  id="login" class="btn btn-pink btn-rounded" data-toggle="modal" data-target="#modalLoginAvatar">
                {{ __('Reset Password') }}  </a>
               </div>

            </div>

            <!--Modal: Login with Avatar Form-->
            <div class="modal fade" id="modalLoginAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
              <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                <!--Content-->
                <div class="modal-content">

                  <!--Header-->
                  <div class="modal-header">
                    <img src="{{ asset('img/m.png') }}" alt="avatar" class="rounded-circle img-responsive">
                  </div>
                  <!--Body-->
                  <div class="text-center mb-1">
                 <h4 class="mt-1 mb-2 text-info">{{ __('Welcome Admin') }}</h4>
                    <h5 class="mt-1 mb-2">{{ __('Forgot Password?') }}</h5>
                 <p class="mt-5 mb-5">{{ __('You can reset your password here.') }}</p>
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

              <form method="POST" action="{{ route('admin.password.email') }}">
                            @csrf
                    <div class="md-form ml-0 mr-0 ">

                    <input id="form29" type="email" class="form-control form-control-sm ml-0 @error('email') is-invalid @enderror text-dark" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      <label data-error="wrong" data-success="right" for="form29" class="ml-0 text-dark">{{ __('E-Mail Address') }}</label>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>


                    <div class="text-center mt-4">
                      <button class="btn btn-purple btn-rounded">{{ __('Send Password Reset Link') }} <i class="fas fa-sign-in ml-1"></i></button>
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

@endsection
@extends('layouts.login.footer')
