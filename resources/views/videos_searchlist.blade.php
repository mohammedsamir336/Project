@include('layouts.index.home_header')
<title> {{ config('app.name')}}-{{$search ?? ''}}</title>
<!-- Breadcrumb -->
<div class="container">
  <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
    <div class="f2-s-1 p-r-30 m-tb-6">
      <a href="index.html" class="breadcrumb-item f1-s-3 cl9">
        Home
      </a>

      <span class="breadcrumb-item f1-s-3 cl9">
       Search
      </span>

      <span class="breadcrumb-item f1-s-3 cl9">
        {{$search ?? ''}}
      </span>
    </div>

    <form class="" action="{{route('search_videos')}}" method="get">

  			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
  				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45 text-dark" type="text" name="search" placeholder="Search in videos" required>
  				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
  					<i class="zmdi zmdi-search"></i>
  				</button>
  		</div>
  	</form>
  </div>
</div>

<!-- Page heading -->
<div class="container p-t-4 p-b-40">
  <h2 class="f1-l-1 cl2">
  Videos search List ({{count($data ?? [])}})
  </h2>
</div>

@foreach ($vid_cat as $vid)

<!-- Feature video -->
<section  id="video{{$vid->id}}" style="display:none;"  >
  <div class="container" >
    <div class="row m-rl--1">
      <!-- 21:9 aspect ratio  -->
  <div class="embed-responsive embed-responsive-21by9">
<figure class="content-media content-media--video" >
  {!!$vid->video!!}
</figure>
      </div>
    </div>
  </div>
</section>
<section class="bg0" id="show" ></section>
@endforeach

<!-- videos -->
<section class="bg0 p-t-70 p-b-55">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 col-lg-8 p-b-80">
      @if (isset($data))
      <div class="row">
        @foreach ($data as $videosearch)
        <div class="col-sm-6 p-r-25 p-r-15-sr991">
          <!-- Item latest -->
          <div class="m-b-45">

            <div class="bg-img1 size-a-14 how1 pos-relative" >
              <div class="wrap-pic-w pos-relative">

              <img class="img-fluid z-depth-1 size-a-14 how1 " src="{{$videosearch->video_img}}" >
                <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" alt="video"
                    data-id="{{$videosearch->id}}" onClick="var v = $('#video{{$videosearch->id}}').html();
                       $('#show').html(v);" >
                <!-- to count view by Ajax -->
   <span class="fab fa-youtube"></span>
                </button>

              </div>
             </div>

            <div class="p-t-16">
              <h5 class="p-b-5">
                <span  class="f1-m-3 cl2 hov-cl10 trans-03">
                  {{$videosearch->title}}
                </span>
              </h5>

          <a class="f1-s-4 cl8 hov-cl10 trans-03" href="v?search={{ $videosearch->type }}">{{ $videosearch->type }}</a><br>

              <span class="cl8">

                <a href="v?search={{$videosearch->author}}" class="f1-s-4 cl8 hov-cl10 trans-03">
                  by {{$videosearch->author}}
                </a>

                <span class="f1-s-3 m-rl-3">
                  -
                </span>

                <span class="f1-s-3 hov-cl10">
                  {{ $videosearch->created_at->format('M d') }}
                </span>
                <span class="f1-s-3 hov-cl10"> at {{ $videosearch->created_at->format('g:ia') }}
                </span>
              </span>
              <span class="f1-s-3 cl8 m-l-15 ">
              {{$videosearch->video_view_count}}  <i class="fas fa-eye"></i>
              </span>
            </div>
          </div>
        </div>
 @endforeach
      </div>
    <!-- Pagination -->
      <div class="flex-wr-c-c m-rl--7 p-t-15 ">
     {{ $data->links('vendor.pagination.mm336') }}
       </div>
     @else
<div class="row">
  <div class="col-sm-6 p-r-25 p-r-15-sr991">
    <div class="alert alert-danger " role="alert">
      {{ $message }}
    </div>
 </div>
</div>
  @endif
</div>


@include('layouts.index.sidediv')

  </div>
</div>
</section>

@include('layouts.index.home_footer')
