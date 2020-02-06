<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Latest -->
<section class="bg0 p-t-50 p-b-90">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8 p-b-50">
        <div class="p-r-10 p-r-0-sr991">
          <div class="how2 how2-cl4 flex-s-c">
            <h3 class="f1-m-2 cl3 tab01-title">
              Latest Articles
            </h3>
          </div>

          <div class="p-b-40">

    <!-- LoadMore -->
         <div class="panel-body">
           @csrf
          <div id="post_data"></div>
         </div>
          </div>

        </div>
      </div>
  <!-- sideber 2 -->
      <div class="col-md-10 col-lg-4">
        <div class="p-l-10 p-rl-0-sr991 p-b-20">
          <!-- Video -->
          <div class="p-b-55">
            <div class="how2 how2-cl4 flex-s-c m-b-35">
              <h3 class="f1-m-2 cl3 tab01-title">
                Featured Video
              </h3>
            </div>

            <div>
              <div class="wrap-pic-w pos-relative">
                @if ($videos_home)

              <img class="img-fluid z-depth-1" src="{{$videos_home->video_img}}" >

                <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" alt="video"
                      data-id="{{$videos_home->id}}"  data-toggle="modal" data-target="#modal1" onclick="$('#videoHome').show();">
                 <span class="fab fa-youtube"></span>
                </button>
              </div>


             <div class="p-tb-16 p-rl-25 bg3">
                <h5 class="p-b-5 ">
                  <span class="f1-m-3 cl0 hov-cl10 trans-03 ">
                      <a href="{{asset('v?search='.$videos_home->title ?? '')}}" class="cl8 hov-cl10 text-white ">
                     {{Str::words($videos_home->title,4)}}
                      </a>
                  </span>
                </h5>
                <span class="cl15">

                  <a href="{{asset('s?search='.$videos_home->author ?? '')}}" class="f1-s-4 cl8 hov-cl10 trans-03">
                    by {{$videos_home->author ?? ''}}
                  </a>

                  <span class="f1-s-3 m-rl-3">
                    -
                  </span>

                  <span class="f1-s-3">
                  {{ $videos_home->created_at->format('M d') }}
                  </span>
                </span>

            </div>
              @endif
          </div>
        </div>
          <!-- Subscribe -->
          <div class="p-t-50">
            <div class="how2 how2-cl4 flex-s-c">
              <h3 class="f1-m-2 cl3 tab01-title">
                Stay Connected
              </h3>
            </div>

            <ul class="p-t-35">
              <li class="flex-wr-sb-c p-b-20">
                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                  <span class="fab fa-facebook-f"></span>
                </a>

                <div class="size-w-3 flex-wr-sb-c">
                  <span class="f1-s-8 cl3 p-r-20">
                    6879 Fans
                  </span>

                  <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                    Like
                  </a>
                </div>
              </li>

              <li class="flex-wr-sb-c p-b-20">
                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                  <span class="fab fa-twitter"></span>
                </a>

                <div class="size-w-3 flex-wr-sb-c">
                  <span class="f1-s-8 cl3 p-r-20">
                    568 Followers
                  </span>

                  <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                    Follow
                  </a>
                </div>
              </li>

              <li class="flex-wr-sb-c p-b-20">
                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                  <span class="fab fa-youtube"></span>
                </a>

                <div class="size-w-3 flex-wr-sb-c">
                  <span class="f1-s-8 cl3 p-r-20">
                    5039 Subscribers
                  </span>

                  <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                    Subscribe
                  </a>
                </div>
              </li>
            </ul>
          </div>

          <!-- Banner -->
        <div class="p-t-50">
          <div class="flex-c-s">
            <a href="#">
              <img class="max-w-full" src="{{asset('indexfolder/images/banner-03.jpg')}}" alt="IMG">
            </a>
          </div>
         </div>
          <!-- Tag -->
          <div class="p-t-50">
          <div class="p-b-55">
            <div class="how2 how2-cl4 flex-s-c m-b-30">
              <h3 class="f1-m-2 cl3 tab01-title">
                Tags
              </h3>
            </div>

            <div class="flex-wr-s-s m-rl--5">
              <a href="{{asset('s?search=Hotels')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Hotels
              </a>

              <a href="{{asset('s?search=Movies')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Movies
              </a>

              <a href="{{asset('s?search=Celebrity')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Celebrity
              </a>

              <a href="{{asset('s?search=Flight')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Flight
              </a>

              <a href="{{asset('s?search=Games')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Games
              </a>

              <a href="{{asset('s?search=Travel')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Travel
              </a>

              <a href="{{asset('s?search=Business')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Business
              </a>

              <a href="{{asset('s?search=Economy')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Economy
              </a>
            </div>
          </div>
         </div>
        </div>
      </div>


    </div>
  </div>
</section>

<!-- Modal Video 01-->

  <!-- Grid row -->
  <div class="row" id="videoHome" style="display:none">

    <!-- Grid column -->
    <div class="col-lg-4 col-md-12 mb-4">

      <!--Modal: Name-->
      <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">

          <!--Content-->
          <div class="modal-content">

            <!--Body-->
            <div class="modal-body mb-0 p-0">

              <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
              {!!$videos_home->video?? ''!!}

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




<script>
$(document).ready(function(){

 var _token = $('input[name="_token"]').val();

 load_data('', _token);

 function load_data(id="", _token)
 {
  $.ajax({
   url:"{{ route('loadmore.load_data') }}",
   method:"POST",
   data:{id:id, _token:_token},
   success:function(data)
   {
    $('#load_more_button').remove();
    $('#post_data').append(data);
   }
  })
 }

 $(document).on('click', '#load_more_button', function(){
  var id = $(this).data('id');
  $('#load_more_button').html('<b>Loading...</b>');
  load_data(id, _token);
 });

});
</script>
