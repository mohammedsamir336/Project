<!-- Entertainment  -->
<div class="p-b-20">
  <div class="how2 how2-cl1 flex-sb-c m-r-10 m-r-0-sr991">
    <h3 class="f1-m-2 cl12 tab01-title">
      Entertainment
    </h3>


    <a href="{{url('categ = Entertainment')}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
      View all
      <i class="fs-12 m-l-5 fa fa-caret-right"></i>
    </a>
  </div>

  <div class="row p-t-35">
      @if ($Entertainment_one)
      <div class="col-sm-6 p-r-25 p-r-15-sr991">
        <!-- Item post -->
        <div class="m-b-30">
          <a href="read = {{$Entertainment_one->header}}" class="wrap-pic-w hov1 trans-03">
            <img class="size-a-51" src="indexfolder/images/{{$Entertainment_one->img}}" alt="IMG">
          </a>

          <div class="p-t-20">
            <h5 class="p-b-5">
              <a href="read = {{$Entertainment_one->header}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                {{$Entertainment_one->header}}
              </a>
            </h5>

            <span class="cl8">
              <a href="{{$Entertainment_one->cat}} = {{$Entertainment_one->type}}" class="f1-s-4 cl8 hov-cl10 trans-03">
              {{$Entertainment_one->type}}
              </a>

              <span class="f1-s-3 m-rl-3">
                -
              </span>

              <span class="f1-s-3">
            {{ $Entertainment_one->created_at->format('M d') }}
              </span>
            </span>
          </div>
        </div>
      </div>

    <div class="col-sm-6 p-r-25 p-r-15-sr991">
      @foreach ($Entertainment_Nav  as $posts)

            @if ($posts->id != $Entertainment_one->id)


        <!-- Item post -->
        <div class="flex-wr-sb-s m-b-30">
          <a href="read = {{$posts->header}}" class="size-w-1 wrap-pic-w hov1 trans-03">
            <img class="size-a-33" src="indexfolder/images/{{$posts->img}}" alt="IMG">
          </a>

          <div class="size-w-2">
            <h5 class="p-b-5">
              <a href="read = {{$posts->header}}" class="f1-s-5 cl3 hov-cl10 trans-03">
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

      
      @endif
    @endforeach

    <!-- if not have Entertainment posts  -->
      @else
      <div class="col-sm-6 p-r-25 p-r-15-sr991">
      <span>it is no posts here...</span>
      </div>
      @endif

    </div>
  </div>
</div>
