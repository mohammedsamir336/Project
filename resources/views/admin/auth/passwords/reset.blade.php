@extends('layouts.nav_sidebar')

@section('index')
<div class="form-gap">
<form method="POST" action="{{ route('admin.password.request') }}">
    @csrf

  <input type="hidden" name="token" value="{{ $token }}">

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
                  <h2 class="text-center">Admin {{ __('Reset Password') }}</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">

          <div class="form-group">
              <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"  placeholder="{{ __('E-Mail Address') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
           </div>
          <div class="form-group">
             <div class="input-group">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
              </div>
            </div>

            <div class="form-group">
               <div class="input-group">

               <input id="password-confirm" type="password" class="form-control"  placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">

                </div>
              </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary  " value="{{ __('Reset Password') }}" type="submit">
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
@endsection
