@include('layouts.index.home_header')
<title>{{$user->email}}</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet" type="text/css">
<style media="screen">
    #img {
        width: 61%;
        height: 250px;
    }

</style>

<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-10">


            <div class="card m-l-300 m-t-70">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item "> <a class="nav-link active " data-toggle="tab" href="#changepassword" role="tab"><span class="hidden-sm-up "></span> <span class="hidden-xs-down ">change password</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#photo" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down ">change photo</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down ">change profile</span></a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">

                    <div class="tab-pane  active" id="changepassword" role="tabpanel">
                        <div class="p-20">
                            <h2 class="text-center ">{{ __('Reset Password') }}</h2>

                            <form method="POST" action="{{ route('change_password') }}">
                                @csrf
                                <div class="panel-body">

                                    <!-- if reset password success -->
                                    @if (session('success'))
                                    <div class="alert alert-success m-t-30" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @endif


                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input id="old_password" type="password" class="form-control" placeholder="{{ __('old Password') }}" name="old_password" required autocomplete="old-password">

                                            @if (session('error'))
                                            <span class="text-danger" role="alert">
                                                {{ session('error') }}
                                            </span>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('New Password') }}" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="md-form mb-0">

                                            <input id="password-confirm" type="password" class="form-control" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="recover-submit" class="btn btn-info btn-rounded " value="{{ __('Reset Password') }}" type="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="tab-pane p-20" id="photo" role="tabpanel">
                        <div class="p-20">

                            <div class="col-lg-4 mb-4 m-l-30">
                                @if ( file_exists('img/users_img/'.$user->img))
                                <img id="user_img" src="{{asset('img/users_img/'.$user->img)}}" class=" rounded-circle hoverable" height="230" width="250" />
                                @else
                                <img id="user_img" src="{{$user->img}}" class=" rounded-circle hoverable" height="90" width="90" />
                                @endif
                                <!-- for show img after upload -->
                                <span class="z-depth-1 mb-3 mx-10" id="uploaded_image"></span>

                                <p class="text-muted "><small>Profile photo will be changed automatically</small></p>
                                <!-- for alert -->
                                <div class="alert" id="message" style="display: none"></div>

                                <div class="row flex-center">

                                    <form enctype="multipart/form-data" id="upload_form" method="POST">
                                        @csrf

                                        <div class="file-field">
                                            <button class="btn btn-info btn-rounded btn-sm waves-effect waves-light">
                                                Upload New Photo
                                                <i class="fas fa-cloud-upload-alt mr-2" aria-hidden="true"></i>
                                                <input type="file" name="select_file" id="select_file" multiple>
                                            </button>
                                        </div>
                                        <input class="btn btn-success btn-rounded btn-sm waves-effect waves-light " type="submit" name="upload" id="upload" value="Upload" style="margin-left:50px;">
                                    </form>
                                </div>

                            </div>
                            <!-- Card content -->


                        </div>
                    </div>

                    <!-- Card -->
                    <div class="tab-pane p-20" id="profile" role="tabpanel">


                        <div style="margin-left:30px">

                            <!-- Edit Form -->
                            <form action="{{route('change_profile')}}" method="post">
                                @csrf
                                <!-- First row -->

                                <div class="row">


                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form1" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') }}" placeholder="{{ __('Name') }}" required>

                                        </div>
                                    </div>
                                    <!-- Second column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form2" class="form-control @error('job') is-invalid @enderror" name="job" value="{{old('job') }}" placeholder="{{ __('Your Job') }}">

                                        </div>
                                    </div>
                                </div>
                                <!-- First row -->

                                <!-- First row -->
                                <div class="row">
                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form81" class="form-control @error('birth') is-invalid @enderror" name="birth" value="{{old('birth') }}" placeholder="{{ __('Birth Date') }}" onfocus="(this.type='date')"
                                              onblur="if(this.value==''){this.type='text'}">

                                        </div>
                                    </div>

                                    <!-- Second column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="url" id="form82" class="form-control @error('website') is-invalid @enderror" name="website" value="{{old('website') }}" placeholder="{{ __('Website Address') }}">

                                        </div>
                                    </div>
                                </div>
                                <!-- First row -->

                                <!-- Second row -->
                                <div class="row">

                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form76" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{old('facebook') }}" placeholder="{{ __('Facebook Address') }}">

                                        </div>
                                    </div>
                                    <!-- Second column -->

                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form77" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone') }}" placeholder="{{ __('Phone number') }}" onfocus="(this.type='number')"
                                              onKeyPress="if(this.value.length == 17) return false;">
                                        </div>
                                    </div>
                                </div>
                                <!-- Second row -->

                                <!-- Third row -->
                                <div class="row">

                                    <!-- First column -->
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <textarea type="text" id="form78" class="md-textarea form-control @error('about') is-invalid @enderror" name="about" rows="3" maxlength="200">
                                            {{old('about') }}
                                            </textarea>
                                            <label for="form78">About me</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Third row -->

                                <!-- Fourth row -->
                                <div class="row">
                                    <div class="col-md-12 text-center my-4">
                                        <span class="waves-input-wrapper waves-effect waves-light"><input type="submit" value="Update Profile" class="btn btn-info btn-rounded"></span>
                                    </div>
                                </div>
                                <!-- Fourth row -->

                            </form>
                            <!-- Edit Form -->

                        </div>
                        <!-- Card content -->

                    </div>
                    <!-- Card -->

                </div>
            </div>
        </div>
    </div>

</div>
<!-- Post -->
<section class="bg0 p-t-70 p-b-55">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-80">
                <div class="row">

                </div>

            </div>

        </div>
    </div>
</section>



@include('layouts.index.home_footer')
<script>
    /*ajax upload Image*/
    $(document).ready(function() {

        $('#upload_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('uploadimg') }}",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    $('#user_img').css('display', 'none');
                    $('#message').css('display', 'block');
                    $('#message').html(data.message);
                    $('#message').addClass(data.class_name);
                    $('#uploaded_image').html(data.uploaded_image);
                }
            })
        });

    });

</script>
