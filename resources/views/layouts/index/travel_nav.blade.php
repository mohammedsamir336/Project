<li class="mega-menu-item">
  <a href="categ = Travel"><nobr>Travel</nobr></a>

  <div class="sub-mega-menu">
    <div class="nav flex-column nav-pills" role="tablist">
      <a class="nav-link active" data-toggle="pill" href="#Travel-1" role="tab">All</a>
      <a class="nav-link" data-toggle="pill" href="#Travel-2" role="tab">Hotels</a>
    </div>

    <div class="tab-content">
      <div class="tab-pane show active" id="Travel-1" role="tabpanel">
        <div class="row">
          @foreach ($Travel_Nav  as $posts)

          <div class="col-3">
            <!-- Item post -->
            <div>
              <a href="{{url('read = '.$posts->header)}}" class="wrap-pic-w hov1 trans-03">
                <img  class="size-a-15" src="{{asset('indexfolder/images/'.$posts->img)}}" alt="IMG">
              </a>

              <div class="p-t-10">
                <h5 class="p-b-5">
                  <a href="{{url('read = '.$posts->header)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
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

  <div class="tab-pane" id="Travel-2" role="tabpanel">
    <div class="row">
      @foreach ($Hotels_Nav  as $Hotels)

      <div class="col-3">
      <!-- Item post -->
       <div>
        <a href="{{url('read = '.$Hotels->header)}}" class="wrap-pic-w hov1 trans-03">
          <img class="size-a-15" src="{{asset('indexfolder/images/'.$Hotels->img)}}" alt="IMG">
        </a>

      <div class="p-t-10">
        <h5 class="p-b-5">
          <a href="read = {{$Hotels->header}}" class="f1-s-5 cl3 hov-cl10 trans-03">
            {{$Hotels->header}}
          </a>
        </h5>

      <span class="cl8">
        <a href="{{$Hotels->cat}} = {{$Hotels->type}}" class="f1-s-6 cl8 hov-cl10 trans-03">
      {{$Hotels->type}}
        </a>

      <span class="f1-s-3 m-rl-3">
        -
      </span>

      <span class="f1-s-3">
        {{ $Hotels->created_at->format('M d') }}
      </span>
        </span>
      </div>
        </div>
      </div>

  @endforeach

    </div>
  </div>
</li>
