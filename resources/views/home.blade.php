
@include('layouts.index.home_header')

<title>{{ config('app.name')}}</title>
<style media="screen">
#Trending{
	color: #33CFFF ;
}
</style>
<body class="animsition">


	<!-- Headline -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
				<span class="text-uppercase cl2 p-r-8 ">
					Trending Now:
				</span>

				<span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
      @foreach ($Trending_posts  as $Popular)
	       <a href="read = {{$Popular->header}}" class="dis-inline-block slide100-txt-item animated visible-false" id="Trending">
	      		{{$Popular->header}}
	      	</a>
        @endforeach

				</span>
			</div>
  <form class="mt-3" action="{{route('search')}}" method="get">

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45 text-dark" type="text" name="search" placeholder="Search in posts" required>
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
			</form>
		</div>
	</div>

	@include('layouts.index.top_posts')

  <div class="card-body">
      @if (session('status'))
    <div class="alert alert-success" role="alert">
      {{ session('status') }}
    </div>
      @endif

	<!-- Post -->
	<section class="bg0 p-t-70">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					<div class="p-b-20">

	  @include('layouts.index.posts.Entertainment')

						<!-- Other -->
						<div class="row">

				 	 @include('layouts.index.posts.business')

				     @include('layouts.index.posts.technology')

				 		    @include('layouts.index.posts.Lifestyle')

                  @include('layouts.index.posts.fashion')

					    	</div>

								  @include('layouts.index.posts.travel')

					</div>
				</div>
		  @include('layouts.index.sidediv')

			</div>
		</div>
	</section>
	<!-- Banner -->
	<div class="container m-b-15">
    <!-- Banner -->
  	<div class="container">
  		<div class="flex-c-c">
  			<a >
  				<img class="max-w-full" src="img/mohammed.png" alt="IMG" id="banner">
  			</a>
  		</div>
  	</div>

		</div>
	</div>

 @include('layouts.index.posts.latest')

@include('layouts.index.home_footer')
</body>
