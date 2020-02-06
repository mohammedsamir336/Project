@include('layouts.index.home_header')

<title> {{ config('app.name')}}-videos</title>
<style media="screen">
    /*lightsout*/
    .visible {
        box-shadow: 0 0 0 10000px #000;
        position: relative;
    }

</style>
<!-- Breadcrumb -->
<div class="container">
    <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{route('home')}}" class="breadcrumb-item f1-s-3 cl9">
                Home
            </a>

            <span class="breadcrumb-item f1-s-3 cl9 hov-cl10">
                videos
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
        Videos ({{$video_count}})
    </h2>
</div>

@foreach ($vid_cat as $vid)

<!-- Feature video -->
<section id="video{{$vid->id}}" style="display:none;">
    <div class="container">
        <div class="row m-rl--1">
            <!-- 21:9 aspect ratio  -->
            <div class="embed-responsive embed-responsive-21by9">
                <figure class="content-media content-media--video">
                    {!!$vid->video!!}

                </figure>
            </div>
        </div>
    </div>
</section>
<section class="bg0" id="show"></section>
@endforeach

<!-- Post -->
<section class="bg0 p-t-70 p-b-55">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-80">
                <div class="row">
                    @foreach ($videos_cat as $video)
                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                        <!-- Item latest -->
                        <div class="m-b-45">

                            <div class="bg-img1 size-a-14 how1 pos-relative">
                                <div class="wrap-pic-w pos-relative">

                                    <img class="img-fluid z-depth-1 size-a-14 how1 " src="{{$video->video_img}}" >
                                    <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" alt="video" data-id="{{$video->id}}" onClick="var v = $('#video{{$video->id}}').html();
                          $('#show').html(v);" title="{{$video->title}}">
                                        <!-- to count view by Ajax -->
                                        <span class="fab fa-youtube fa-lg text-danger"></span>

                                    </button>

                                </div>
                            </div>

                            <div class="p-t-16">
                                <h5 class="p-b-5">
                                    <span class="f1-m-3 cl2 hov-cl10 trans-03">
                                        {{$video->title}}
                                    </span>
                                </h5>

                                <a class="f1-s-4 cl8 hov-cl10 trans-03" href="v?search={{ $video->type }}">{{ $video->type }}</a><br>

                                <span class="cl8">

                                    <a href="v?search={{$video->author}}" class="f1-s-4 cl8 hov-cl10 trans-03">
                                        by {{$video->author}}
                                    </a>

                                    <span class="f1-s-3 m-rl-3">
                                        -
                                    </span>


                                    <span class="f1-s-3 hov-cl10">
                                        {{ $video->created_at->format('M d') }}
                                    </span>
                                    <span class="f1-s-3 hov-cl10"> at {{ $video->created_at->format('g:ia') }}
                                    </span>
                                </span>
                                <span class="f1-s-3 cl8 m-l-15 ">
                                    {{$video->video_view_count}} <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <!-- download link-->
                            <a href="https://9xbud.com/{{$video->url}}" target="_blank" title="Download">
                                <button class="btn"><i class="fa fa-download"></i> Download video</button>
                            </a>
                        </div>
                    </div>
                    <!-- Modal Video 01-->

                    @endforeach
                </div>


                <!-- Pagination -->
                <div class=" flex-wr-s-c m-rl--7 p-t-15" style="position:relative;left:200px;">
                    {{$videos_cat->links('vendor.pagination.mm336')}}
                </div>
            </div>

            @include('layouts.index.sidediv')

        </div>
    </div>
</section>

@include('layouts.index.home_footer')
