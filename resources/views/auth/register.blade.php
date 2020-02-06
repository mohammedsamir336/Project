@include('layouts.register.header')

<style media="screen">

span.field-icon {
   position: absolute;
   display: inline-block;
   cursor: pointer;
   right: 0.5rem;
   top: 0.7rem;
   color: $input-label-color;
   z-index: 2;
 }

.select-container {
    position: relative;
    width: 170px;
}

select {
    border: 2px solid #eee;
    border-radius: 10px;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance:none;
    width: 100%;
    height: 35px;
    line-height: 35px;
    background: #0000;
    font-size: 14px;
    font-weight: 500;
    color: #333;
    text-transform: uppercase;
    outline:none;
    padding-left: 15px;
    transition: 0.5s;
    box-shadow: none !important;

}

select:focus, select:hover {
  box-shadow: 3px 3px 10px #eee
}

select:-moz-focusring {
    color: transparent;
    text-shadow: 0 0 0 #000;
}

select::-ms-expand {
    display: none;
}

.select-arrow {
    color: #333;
    left:161px;
    top: 11px;
    width:30px;
    position:absolute;
    display:block;
    z-index: 10;
    margin: 0 0 0 0;
    pointer-events:none;
}
/* alert div*/
.css-2viodn {
    width: 100%;
    display: block;
    box-sizing: border-box;
    margin-bottom: 0px;
}
.css-hzwjmo {
    width: 0px;
    height: 0px;
    margin-left: 6px;
    margin-bottom: 0px;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-bottom: 6px solid rgb(207, 60, 45);
}
.css-1j97nb6 {
    color: rgb(255, 255, 255);
    background-color: rgb(207, 60, 45);
    text-align: left;
    font-size: 0.875rem;
    line-height: 1rem;
    border-radius: 2px;
    padding: 0.25rem 0.5rem;
}

/*end alert div*/
</style>

<body>
<section class="view intro-2">
      <div class="mask rgba-gradient">
        <div class="container h-100 d-flex justify-content-center align-items-center">

          <!--Grid row-->
          <div class="row  pt-5 mt-3">

            <!--Grid column-->
            <div class="col-md-12">

              <div class="card">
                <div class="card-body">

                  <!--Grid row-->
                  <div class="row mt-5">

                    <!--Grid column-->
                    <div class="col-md-6 ml-lg-5 ml-md-3">

                      <!--Grid row-->
                      <div class="row pb-4">
                        <div class="col-2 col-lg-1">
                          <i class="fas fa-university indigo-text fa-lg"></i>
                        </div>
                        <div class="col-10">
                          <h4 class="font-weight-bold mb-4">

                            <strong>Safety</strong>
                          </h4>
                          <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores
                            nam, aperiam
                            minima assumenda deleniti hic.</p>
                        </div>
                      </div>
                      <!--Grid row-->

                      <!--Grid row-->
                      <div class="row pb-4">
                        <div class="col-2 col-lg-1">
                          <i class="fas fa-desktop deep-purple-text fa-lg"></i>
                        </div>
                        <div class="col-10">
                          <h4 class="font-weight-bold mb-4">
                            <strong>Technology</strong>
                          </h4>
                          <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores
                            nam, aperiam
                            minima assumenda deleniti hic.</p>
                        </div>
                      </div>
                      <!--Grid row-->

                      <!--Grid row-->
                      <div class="row pb-4">
                        <div class="col-2 col-lg-1">
                          <i class="fas fa-money-bill-alt purple-text fa-lg"></i>
                        </div>
                        <div class="col-10">
                          <h4 class="font-weight-bold mb-4">
                            <strong>Finance</strong>
                          </h4>
                          <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores
                            nam, aperiam
                            minima assumenda deleniti hic.</p>
                        </div>
                      </div>
                      <!--Grid row-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-5">

                      <!--Grid row-->
                      <div class="row pb-4 d-flex justify-content-center mb-4">

                        <h4 class="mt-3 mr-4">
                      <strong><a href="{{ route('login') }}">{{trans('auth.Login') }}</a> :</strong>
                        </h4>

                          <a class="p-2 m-2 fa-lg li-ic" href="{{route('facebook')}}">
                            <i class="fab fa-facebook-f text-center indigo-text"> </i>
                          </a>
                          <a class="p-2 m-2 fa-lg tw-ic" href="{{route('github')}}">
                            <i class="fab fa-github fa-lg indigo-text"></i>
                          </a>
                          <a class="p-2 m-2 fa-lg ins-ic" href="{{route('google')}}">
                            <i class="fab fa-google-plus-g  indigo-text"> </i>
                          </a>
                          <a class="p-2 m-2 fa-lg ins-ic">
                            <i class="fab fa-instagram fa-lg text-center indigo-text"> </i>
                          </a>
                      </div>
                      <!--/Grid row-->

                      <!--Body-->
                      <form method="POST" action="{{ route('register') }}">
                          @csrf
                          <div class="form-group" style="position:relative;left:250px">

                            <div class="select-container">
                              <span class="select-arrow fa fa-chevron-down"></span>
                              <select name="country" class="browser-default requiredfield" id="real" required  title="dsfsd">
                                @if(App::getLocale() == 'ar')
                                <option value="" dir="rtl">* {{trans('auth.Choose Country') }}...</option>
                                @else
                                <option value="">* {{trans('auth.Choose Country') }}...</option>
                                @endif
                                  <option data-code="+44" value="uk">{{trans('auth.United Kingdom') }}</option>
                                  <option data-code="+20" value="Egy">{{trans('auth.Egypt') }}</option>
                                  <option data-code="+49" value="ger">{{trans('auth.Gemany') }}</option>
                                  <option data-code="+33" value="fra">{{trans('auth.France') }}</option>
                                  <option data-code="+39" value="ita">{{trans('auth.Italy') }}</option>
                              </select>

                          </div>
                          </div>
                      <div class="md-form">
                        <i class="fas fa-user prefix"></i>
                       <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror requiredfield" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <label for="name">{{ trans('auth.Name') }}</label>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      <div class="md-form">
                        <i class="fas fa-envelope prefix"></i>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror requiredfield" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <label for="email">{{ trans('auth.E-Mail Address') }}</label>

                        <!--check unique email-->
                        <div class="css-0">
                          <div class="css-2viodn" id="error_email">

                        </div>
                        </div>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                        <div class="md-form">
                       <i class="fa fa-phone prefix"></i>
                       <input  id="phone" class="form-control  @error('phone') is-invalid @enderror requiredfield" name="phone"
                        value="{{ old('phone') }}"  placeholder="{{ trans('auth.Phone') }} " required autocomplete="phone" >


                       <!--check unique phone-->
                       <div class="css-0">
                         <div class="css-2viodn " id="error_phone">

                       </div>
                       </div>

                       @error('phone')
                           <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                           </span>
                       @enderror
                        </div>

                      <div class="md-form">
                        <i class="fas fa-lock prefix"></i>
                        <input id="input-pwd" type="password" class="form-control  @error('password') is-invalid @enderror requiredfield" name="password" required autocomplete="new-password">
                        <label data-error="wrong" data-success="right" for="input-pwd">{{ trans('auth.Password') }}</label>
                        <span toggle="#input-pwd" class="fa fa-fw fa-eye field-icon toggle-password text-dark"></span>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                        <div class="md-form">
                        <i class="fas fa-lock prefix"></i>
                          <input id="password-confirm" type="password" class="form-control requiredfield " name="password_confirmation" required autocomplete="new-password">
                          <label for="password-confirm">{{ trans('auth.Confirm Password') }}</label>
                         </div>

                      <div class="text-center">
                        <button class="btn btn-primary btn-rounded my-3" id="send">{{ trans('auth.Sign Up') }}
                        </button>
                      </div>
                    </form>

                    </div>
                    <!--Grid column-->

                  </div>
                  <!--Grid row-->

                </div>
              </div>

            </div>
            <!--Grid column-->

          </div>
          <!--Grid row-->
        </div>
      </div>
    </section>
    <!--Intro Section-->


@include('layouts.register.footer')
</body>
