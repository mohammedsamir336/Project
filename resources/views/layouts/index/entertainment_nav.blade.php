<li class="mega-menu-item">
  <a href="categ = Entertainment"><nobr>Entertainment</nobr></a>

  <div class="sub-mega-menu">
    <div class="nav flex-column nav-pills" role="tablist">
      <a class="nav-link active" data-toggle="pill" href="#enter-1" role="tab">All</a>
      <a class="nav-link" data-toggle="pill" href="#enter-2" role="tab">Game</a>
      <a class="nav-link" data-toggle="pill" href="#enter-3" role="tab">Celebrity</a>
    </div>

    <div class="tab-content">
      <div class="tab-pane show active" id="enter-1" role="tabpanel">
        <div class="row">
          @foreach ($Entertainment_Nav  as $posts)

          <div class="col-3">
            <!-- Item post -->
            <div>
              <a href="read = {{$posts->header}}" class="wrap-pic-w hov1 trans-03">
                <img class="size-a-15" src="{{asset('indexfolder/images/'.$posts->img)}}" alt="IMG">
              </a>

              <div class="p-t-10">
                <h5 class="p-b-5">
                  <a href="read = {{$posts->header}} " class="f1-s-5 cl3 hov-cl10 trans-03">
                    {{$posts->header}}
                  </a>
                </h5>

                <span class="cl8">
                  <a href="{{$posts->cat}} = {{$posts->type}}" class="f1-s-6 cl8 hov-cl10 trans-03">
                  {{$posts->type}}
                  </a>

                  <span class="f1-s-3 m-rl-3">
                    -
                  </span>

                  <span class="f1-s-3">
              {{ $posts->created_at->format('M d') }}
                  </span>
                </span>
              </div>
            </div>
          </div>

        @endforeach
        </div>
      </div>

      <div class="tab-pane" id="enter-2" role="tabpanel">
        <div class="row">

          @foreach ($Games_Nav as $game)


          <div class="col-3">
            <!-- Item post -->
            <div>
              <a href="read = {{$game->header}}" class="wrap-pic-w hov1 trans-03">
                <img class="size-a-15" src="{{asset('indexfolder/images/'.$game->img)}}" alt="IMG">
              </a>

              <div class="p-t-10">
                <h5 class="p-b-5">
                  <a href="read = {{$game->header}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                   {{$game->header}}
                  </a>
                </h5>

                <span class="cl8">
                  <a href="{{$game->cat}} = {{$game->type}}" class="f1-s-6 cl8 hov-cl10 trans-03">
                     {{$game->type}}
                  </a>

                  <span class="f1-s-3 m-rl-3">
                    -
                  </span>

                  <span class="f1-s-3">
                {{ $game->created_at->format('M d') }}
                  </span>
                </span>
              </div>
            </div>
          </div>

          @endforeach
        </div>
      </div>

      <div class="tab-pane" id="enter-3" role="tabpanel">
        <div class="row">
          @foreach ($Celebrity_Nav as $Celebrity)

          <div class="col-3">
            <!-- Item post -->
            <div>
              <a href="read = {{$Celebrity->header}}" class="wrap-pic-w hov1 trans-03">
                <img class="size-a-15" src="{{asset('indexfolder/images/'.$Celebrity->img)}}" alt="IMG">
              </a>

              <div class="p-t-10">
                <h5 class="p-b-5">
                  <a href="{{$Celebrity->header}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                    {{$Celebrity->header}}
                  </a>
                </h5>

                <span class="cl8">
                  <a href="{{$Celebrity->cat}} = {{$Celebrity->type}}" class="f1-s-6 cl8 hov-cl10 trans-03">
                  {{$Celebrity->type}}
                  </a>

                  <span class="f1-s-3 m-rl-3">
                    -
                  </span>

                  <span class="f1-s-3">
                {{ $Celebrity->created_at->format('M d') }}
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
