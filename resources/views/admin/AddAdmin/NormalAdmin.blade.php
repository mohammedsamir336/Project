@include('admin.layout.header')
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">Add Admin</span>
<title id="title">Add Admin</title>



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

        <div class="auth-box bg-dark  border-secondary"style="position:relative;bottom:100px">
          @if (session('success'))
            <div class="alert alert-success" role="alert">
          <h3> <!-- {{trans('message.success')}} -->{{ session('success') }} </h3>

           </div>
              @endif
            <div>
                <div class="text-center p-t-20 p-b-20">
                    <span class="db"><img src="{{ asset('img/m.png') }}" alt="logo" width="50%" /></span>
                </div>
                <!-- Form -->
                <form class="form-horizontal m-t-20" method="POST" action="{{ url('admin/register') }}">
                    @csrf

                    <div class="row p-b-30">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                </div>
                                <input type="text" name="name" class="form-control form-control-lg  @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" aria-label="name" aria-describedby="basic-addon1" value="{{ old('name') }}" required>
                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon2"><i class="ti-email"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" aria-label="email" aria-describedby="basic-addon2" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text bg-info text-white" id="basic-addon3"><i class="fa fa-phone prefix"></i></span>
                          </div>
                          <input type="number"  class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone"
                           value="{{ old('phone') }}"  placeholder="{{ __('Phone') }}" aria-label="phone" aria-describedby="basic-addon3" required autocomplete="phone" >
                           @error('phone')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon4"><a toggle="#input-pwd" href="#" class="fa fa-fw fa-eye field-icon toggle-password text-dark" ></a></span>
                                </div>

                                <input id="input-pwd" type="password" class="form-control form-control-lg  @error('password') is-invalid @enderror" name="password" placeholder=" {{ __(' Password') }}"  aria-label="password"  required>

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info text-white" id="basic-addon5"><a toggle="#password-confirm" href="#" class="fa fa-fw fa-eye field-icon toggle-password text-dark" ></a></span>
                                </div>
                                <input id="password-confirm" type="password" name="password_confirmation" class="form-control form-control-lg " placeholder=" {{ __('Confirm Password') }}" aria-label="Password" aria-describedby="basic-addon1" required>
                            </div>

                        </div>
                    </div>
                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="p-t-20">
                                    <button   class="btn btn-block btn-lg btn-info" type="submit">  {{ __('Sign Up') }}</button>
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

@include('admin.layout.footer')
<script>

//password show/hidden
$('.toggle-password').on('click', function() {
  $(this).toggleClass('fa-eye fa-eye-slash');
  let input = $($(this).attr('toggle'));
  if (input.attr('type') == 'password') {
    input.attr('type', 'text');
  }
  else {
    input.attr('type', 'password');
  }
});
</script>
