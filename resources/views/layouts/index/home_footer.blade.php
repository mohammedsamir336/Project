<!-- Footer -->
<footer>
    <div class="bg2 p-t-40 p-b-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <a href="{{url('/')}}l">
                            <img class="max-s-full" src="{{asset('indexfolder/images/icons/logo-02.png')}}" alt="LOGO">
                        </a>
                    </div>

                    <div>
                        <p class="f1-s-1 cl11 p-b-16">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor magna eget elit efficitur, at accumsan sem placerat. Nulla tellus libero, mattis nec molestie at, facilisis ut turpis. Vestibulum dolor metus,
                            tincidunt eget odio
                        </p>

                        <p class="f1-s-1 cl11 p-b-16">
                            Any questions? Call us on (+01) 15 483 8995
                        </p>

                        <div class="p-t-15">
                            <a href="{{route('facebook')}}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-facebook-f"></span>
                            </a>

                            <a href="{{route('github')}}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-github"></span>
                            </a>

                            <a href="{{route('google')}}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-google-plus-g"></span>
                            </a>

                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-vimeo-v"></span>
                            </a>

                            <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                <span class="fab fa-youtube"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- This one for video_nav page-->
                @foreach ($videos_Nav as $videosnav)
                <!-- Modal Video 01-->
                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-lg-4 col-md-12 mb-4">
                        <!--Modal: Name-->
                        <div class="modal fade" v-id="{{$videosnav->id}}" id="modalmm{{$videosnav->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">

                                <!--Content-->
                                <div class="modal-content">

                                    <!--Body-->
                                    <div class="modal-body mb-0 p-0">

                                        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                                            {!!$videosnav->video!!}
                                        </div>

                                    </div>


                                    <!--Footer-->
                                    <div class="modal-footer justify-content-center">
                                        <span class="mr-4">Spread the word!</span>
                                        <a type="button" class="btn-floating btn-sm btn-fb"><i class="fab fa-facebook-f"></i></a>
                                        <!--Twitter-->
                                        <a type="button" class="btn-floating btn-sm btn-tw"><i class="fab fa-twitter"></i></a>
                                        <!--Google +-->
                                        <a type="button" class="btn-floating btn-sm btn-gplus"><i class="fab fa-google-plus-g"></i></a>
                                        <!--Linkedin-->
                                        <a type="button" class="btn-floating btn-sm btn-ins"><i class="fab fa-linkedin-in"></i></a>

                                        <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>

                                    </div>

                                </div>
                                <!--/.Content-->

                            </div>
                        </div>

                    </div>

                </div>
                @endforeach

                <div class="col-sm-6 col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <h5 class="f1-m-7 cl0">
                            Popular Posts
                        </h5>
                    </div>

                    <ul>
                        @foreach ($Popular_posts->take(3) as $Popular)
                        <li class="flex-wr-sb-s p-b-20">
                            <div class="bg-img1 size-a-19 how1 pos-relative" style="background-image: url({{asset('indexfolder/images/'.$Popular->img)}});">
                                <a href="read = {{$Popular->header}}" class="dis-block how1-child1 trans-03"></a>
                            </div>

                            <div class="size-w-5">
                                <h6 class="p-b-5">
                                    <a href="read = {{$Popular->header}}" class="f1-s-5 cl11 hov-cl10 trans-03">
                                        {{Str::words($Popular->header, 4)}}
                                    </a>
                                </h6>

                                <span class="f1-s-3 cl6">
                                    {{ $Popular->created_at->format('M d') }}
                                </span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-4 p-b-20">
                    <div class="size-h-3 flex-s-c">
                        <h5 class="f1-m-7 cl0">
                            Category
                        </h5>
                    </div>

                    <ul class="m-t--12">
                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="categ = Entertainment" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Entertainment ({{$count_Entertainment}})
                            </a>
                        </li>

                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="categ = Technology" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Technology ({{$count_Technology}})
                            </a>
                        </li>

                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="categ = Travel" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Travel ({{$count_Travel}})
                            </a>
                        </li>

                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="categ = Life" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Life Style ({{$count_Life}})
                            </a>
                        </li>

                        <li class="how-bor1 p-rl-5 p-tb-10">
                            <a href="categ = Business" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                Business ({{$count_Business}})
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Modal: fro facebook and twitter-->
    <div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content text-center">
          <!--Header-->
          <div class="modal-header d-flex justify-content-center">
            <p class="heading">Error</p>
          </div>

          <!--Body-->
          <div class="modal-body">

            <i class="fas fa-times fa-4x animated rotateIn"></i>
            <h1>The site must be uploaded to the host in order to log in with this service</h1>
          </div>

          <!--Footer-->
          <div class="modal-footer flex-center">
            <a href="" class="btn  btn-outline-danger">Yes</a>
            <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
      <!--Modal: fro facebook and twitter-->

    <div class="bg11">
        <div class="container size-h-4 flex-c-c p-tb-15">
            <span class="f1-s-1 cl0 txt-center">
                Copyright © {{now()->format('Y')}}

                <a href="{{route('contact')}}" class="f1-s-1 cl10 hov-link1">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright 2019 - {{now()->format('Y')}} All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib&mm336</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </span>
        </div>
    </div>
</footer>

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <img src="{{asset('img/top.png')}}" alt="">
    </span>
</div>




<script src="{{ asset('js/share.js') }}"></script>
<!-- googel translate-->
<script type="text/javascript" src="http://cdn.howcode.org/content/static/javascript/jquery.min.js"></script>
<script src="http://cdn.howcode.org/content/static/javascript/jquery.cookie.js"></script>
<script type="text/javascript" src="{{asset('//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit')}}"></script>
<!--===============================================================================================-->
<script src="{{ asset('indexfolder/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('indexfolder/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('indexfolder/vendor/bootstrap/js/popper.js') }}"></script>

<script src="{{ asset('indexfolder/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('indexfolder/js/main.js') }}"></script>
<!-- time function JavaScript -->
<script src="{{ asset('indexfolder/js/moment.js') }}"></script>

<script src="{{ asset('indexfolder/js/MyTest.js') }}"></script>

<script src="https://www.youtube.com/iframe_api"></script>
<!-- all my js code-->
<script src="{{ asset('indexfolder/js/MyTest.js') }}"></script>

<!-- change lang of allpage depend on locale colum in user table-->
@if(App::getLocale() == 'ar')
<script type="text/javascript">
    document.cookie = "googtrans=/en/ar; path=/";

</script>
@else
<script type="text/javascript">
    document.cookie = "googtrans=/en/en; path=/";

</script>
@endif
</body>

</html>
