<!-- Fashion -->
<div class="col-sm-6 p-r-25 p-r-15-sr991 p-b-25">
  <div class="how2 how2-cl6 flex-sb-c m-b-35">
    <h3 class="f1-m-2 cl18 tab01-title">
      Fashion
    </h3>


    <a href="{{url('categ = Fashion')}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
      View all
      <i class="fs-12 m-l-5 fa fa-caret-right"></i>
    </a>
  </div>

@if ($Fashion_one)
<!-- Main Item post -->
<div class="m-b-30">
  <a href="read = {{$Fashion_one->header}}" class="wrap-pic-w hov1 trans-03">
    <img class="size-a-51"  src="indexfolder/images/{{$Fashion_one->img}}" alt="IMG">
  </a>

  <div class="p-t-20">
    <h5 class="p-b-5">
      <a href="read = {{$Fashion_one->header}}" class="f1-m-3 cl2 hov-cl10 trans-03">
        {{$Fashion_one->header}}
      </a>
    </h5>

    <span class="cl8">
      <a href="{{$Fashion_one->cat}} = {{$Fashion_one->type}}" class="f1-s-4 cl8 hov-cl10 trans-03">
      {{$Fashion_one->type}}
      </a>

      <span class="f1-s-3 m-rl-3">
        -
      </span>

      <span class="f1-s-3">
        {{ $Fashion_one->created_at->format('M d') }}
      </span>
    </span>
  </div>
</div>

@foreach ( $Fashion  as $posts)
    @if ($posts->id != $Fashion_one->id)

<!-- Item post -->
<div class="flex-wr-sb-s m-b-30">
   <a href="read = {{$posts->header}}" class="size-w-1 wrap-pic-w hov1 trans-03">
    <img class="size-a-33" src="indexfolder/images/{{$posts->img}}" alt="IMGDonec metus orci, malesuada et lectus vitae">
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
    <!-- if not have Fashion posts  -->
  @else
    <span>it is no posts here...</span>
  @endif

</div>
