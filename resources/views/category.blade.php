
@include('layouts.index.home_header')

<title> {{ config('app.name')}}-{{$header}}</title>

<!-- Breadcrumb -->
<div class="container">
  <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
    <div class="f2-s-1 p-r-30 m-tb-6">
      <a href="{{route('home')}}" class="breadcrumb-item f1-s-3 cl9">
        Home
      </a>

      <span class="breadcrumb-item f1-s-3 cl9 hov-cl10">
      {{$header}}
      </span>
    </div>

    <form class="" action="{{route('search')}}" method="get">

  			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
  				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45 text-dark" type="text" name="search" placeholder="Search in posts" required>
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
    {{$header}} ({{count($cat)}})
  </h2>
</div>

<!-- Feature post -->
<section class="bg0">
  <div class="container">
    <div class="row m-rl--1">
      <div class="col-md-6 p-rl-1 p-b-2">
        <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(indexfolder/images/{{$mostone->img}});">
          <a href="read = {{$mostone->header}}" class="dis-block how1-child1 trans-03"></a>

          <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
            <a href="{{$mostone->cat}} = {{$mostone->type}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
            {{$mostone->type}}
            </a>

            <h3 class="how1-child2 m-t-14 m-b-10">
              <a href="read = {{$mostone->header}}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                  {{$mostone->header}}
              </a>
            </h3>

            <span class="how1-child2">
              <span class="m-rl-3 cl11 hov-cl10">
                {{$mostone->author}}
              </span>

              <span class="f1-s-3 cl11 m-rl-3">
                -
              </span>

              <span class="f1-s-3 cl11 hov-cl10">
              {{ $mostone->created_at->format('M d') }}
              </span>
            </span>
          </div>
        </div>
      </div>

      <div class="col-md-6 p-rl-1">
        <div class="row m-rl--1">
       @foreach ($maxcat as $maxcat)
         @if ($maxcat->id != $mostone->id )
          <div class="col-sm-6 p-rl-1 p-b-2">
            <div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url(indexfolder/images/{{$maxcat->img}});">
              <a href="read = {{$maxcat->header}}" class="dis-block how1-child1 trans-03"></a>

              <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                <a href="{{$maxcat->cat}} = {{$maxcat->type}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                  {{$maxcat->type}}
                </a>

                <h3 class="how1-child2 m-t-14">
                  <a href="read = {{$maxcat->header}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                    {{$maxcat->header}}
                  </a>
                </h3>
              </div>
            </div>
          </div>
          @endif
        @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Post -->
<section class="bg0 p-t-70 p-b-55">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8 p-b-80">
        <div class="row">
          @foreach ($cat as $posts)
          <div class="col-sm-6 p-r-25 p-r-15-sr991">
            <!-- Item latest -->
            <div class="m-b-45">

              <div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url(indexfolder/images/{{$posts->img}});">
                <a href="read = {{$posts->header}}" class="dis-block how1-child1 trans-03"></a>

                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                  <a href="{{$posts->cat}} = {{$posts->type}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                    {{$posts->type}}
                  </a>
               </div>
               </div>

              <div class="p-t-16">
                <h5 class="p-b-5">
                  <a href="read = {{$posts->header}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                    {{$posts->header}}
                  </a>
                </h5>

                <span class="cl8">
                  <a href="#" class="m-rl-3 cl8 hov-cl10 trans-03">
                    by  {{$posts->author}}
                  </a>

                  <span class="f1-s-3 m-rl-3">
                    -
                  </span>

                  <span class="f1-s-3 hov-cl10">
                  {{ $posts->created_at->format('M d') }}
                  </span>
                  <span class="f1-s-3 hov-cl10"> at {{ $posts->created_at->format('g:ia') }}
                  </span>
                </span>
              </div>
            </div>
          </div>
   @endforeach
      </div>

        <!-- Pagination -->
        <div class=" flex-wr-s-c m-rl--7 p-t-15" style="position:relative;left:200px;">
         {{$cat->links('vendor.pagination.mm336')}}
        </div>
      </div>

      @include('layouts.index.sidediv')

    </div>
  </div>
</section>

@include('layouts.index.home_footer')
