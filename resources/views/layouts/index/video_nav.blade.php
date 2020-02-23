<li class="mega-menu-item">
  <a href="videos"><nobr>Videos</nobr></a>

  <div class="sub-mega-menu">
    <div class="nav flex-column nav-pills" role="tablist">
      <a class="nav-link active" data-toggle="pill" href="#video-1" role="tab">All</a>
    </div>

    <div class="tab-content">
      <div class="tab-pane show active" id="video-1" role="tabpanel">
        <div class="row">
          @foreach ($videos_Nav as $videosnav)
          <div class="col-3">
            <!-- Item post -->
            <div>
              <div class="wrap-pic-w pos-relative">

              <img class="img-fluid z-depth-1 " src="{{$videosnav->video_img}}" >

               <!-- Modal Video in home_footer to show videos-->
                <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" alt="video"
                      data-id="{{$videosnav->id}}"  data-toggle="modal" data-target="#modalmm{{$videosnav->id}}">
           <span class="fab fa-youtube "></span>
                </button>

              </div>

              <div class="p-t-10">
                <h5 class="p-b-5">
                  <a href="{{url('v?search='.$videosnav->title)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                  {{$videosnav->title}}
                  </a>
                </h5>

                <span class="cl8">
                  <a href="{{url('v?search='.$videosnav->type)}}" class="f1-s-6 cl8 hov-cl10 trans-03">
                    {{$videosnav->type}}
                  </a>

                  <span class="f1-s-3 m-rl-3">
                    -
                  </span>

                  <span class="f1-s-3">
              {{ $videosnav->created_at->format('M d') }}
                  </span>
                </span>
              </div>
            </div>
          </div>

    @endforeach


        </div>
      </div>
    </div>
  </div>
</li>
