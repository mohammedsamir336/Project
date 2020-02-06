<!-- Travel -->
<div class="tab01 p-b-20">
  <div class="tab01-head how2 how2-cl3 bocl12 flex-s-c m-r-10 m-r-0-sr991">
    <!-- Brand tab -->
    <h3 class="f1-m-2 cl14 tab01-title">
      Travel
    </h3>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">

      <li class="nav-item">
        <a class="nav-link" href="{{url('Travel = Hotels')}}">Hotels</a>
      </li>

      <li class="nav-item">
        <a class="nav-link"  href="{{url('Travele = Flight')}}" >Flight</a>
      </li>

      <li class="nav-item">
        <a class="nav-link"  href="{{url('Travel = Beachs')}}" >Beachs</a>
      </li>

      <li class="nav-item">
        <a class="nav-link"  href="{{url('Travel = Culture')}}" >Culture</a>
      </li>
    </ul>

    <!--  -->
    <a href="{{url('categ = Travel')}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
      View all
      <i class="fs-12 m-l-5 fa fa-caret-right"></i>
    </a>
  </div>


  <!-- Tab panes -->
  <div class="tab-content p-t-35">
    <!-- - -->
    <div class="tab-pane fade show active" id="tab3-1" role="tabpanel">
      <div class="row">
          @if ($Travel_one)
        <div class="col-sm-6 p-r-25 p-r-15-sr991">
          <!-- Item post -->
          <div class="m-b-30">
            <a href="read = {{$Travel_one->header}}" class="wrap-pic-w hov1 trans-03">
             <img class="size-a-51" src="indexfolder/images/{{$Travel_one->img}}" alt="IMG">
            </a>

            <div class="p-t-20">
              <h5 class="p-b-5">
                <a href="read = {{$Travel_one->header}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                  {{$Travel_one->header}}
                </a>
              </h5>

              <span class="cl8">
                <a href="{{$Travel_one->cat}} = {{$Travel_one->type}}" class="f1-s-4 cl8 hov-cl10 trans-03">
                  {{$Travel_one->type}}
                </a>

                <span class="f1-s-3 m-rl-3">
                  -
                </span>

                <span class="f1-s-3">
                    {{ $Travel_one->created_at->format('M d') }}
                </span>
              </span>
            </div>
          </div>
        </div>

        <div class="col-sm-6 p-r-25 p-r-15-sr991">
          @foreach ( $Travel_Nav  as $posts)
               @if ($posts->id != $Travel_one->id)

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
        </div>
  <!-- if not have Travel posts  -->
        @else
        <span>it is no posts here...</span>
        @endif
      </div>
    </div>
  </div>
</div>
