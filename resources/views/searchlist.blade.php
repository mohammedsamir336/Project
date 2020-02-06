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
    posts List ({{count($data ?? [])}})
  </h2>
</div>

<!-- Post -->
<section class="bg0 p-b-55">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8 p-b-80">
        <div class="p-r-10 p-r-0-sr991">
          <div class="m-t--65 p-b-40">
            <!-- Item Blog -->
              @if (isset($data))
              @foreach ($data as $posts)
            <div class="flex-col-s-c how-bor2 p-t-65 p-b-40">
              <a href="{{$posts->cat}} = {{$posts->type}}" class="f1-s-10 cl2 text-uppercase txt-center hov-cl10 trans-03 p-b-40">
                {{$posts->type}}
              </a>

              <h5 class="p-b-17 txt-center">
                <a href="read = {{$posts->header}}" class="f1-l-1 cl2 hov-cl10 trans-03 respon2">
                  {{$posts->header}}
                </a>
              </h5>

              <div class="cl8 txt-center p-b-24">
                <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                  by {{$posts->author}}
                </a>

                <span class="f1-s-3 m-rl-3">
                  -
                </span>

                <span class="f1-s-3">
                  {{ $posts->created_at->format('M d, Y') }}
                </span>
              </div>

              <a href="read = {{$posts->header}}" class="wrap-pic-w hov1 trans-03 m-b-30">
                <img src="indexfolder/images/{{$posts->img}}" alt="IMG">
              </a>

              <p class="f1-s-11 cl6 txt-center p-b-22">
             {{$posts->p1}}
              </p>

              <a href="read = {{$posts->header}}" class="f1-s-1 cl9 hov-cl10 trans-03">
                Read More
                <i class="m-l-2 fa fa-long-arrow-alt-right"></i>
              </a>
            </div>
            @endforeach
        <!-- Pagination -->
        <div class="flex-wr-c-c m-rl--7 p-t-15 ">
       {{ $data->links('vendor.pagination.mm336') }}
        </div>
            @else
          <div class="alert alert-danger m-t-70" role="alert">
            {{ $message }}
          </div>
            @endif
          </div>

        </div>
      </div>

      @include('layouts.index.sidediv')
    </div>
  </div>
</section>

@include('layouts.index.home_footer')
