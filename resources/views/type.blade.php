@include('layouts.index.home_header')

<title> {{ config('app.name')}}-{{$type}}</title>

	<!-- Breadcrumb -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 m-tb-6">
				<a href="{{route('home')}}" class="breadcrumb-item f1-s-3 cl9">
					Home
				</a>

				<span class="breadcrumb-item f1-s-3 cl9 hov-cl10">
				<a href="{{url('categ = '.$cat)}}" class="breadcrumb-item f1-s-3 cl9">{{$cat}}</a>    <!--	Request::segment(1 or 2 or 3) can use it if url cat/type-->
				</span>

				<span class="breadcrumb-item f1-s-3 cl9 hov-cl10">
					{{$type}}
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

	<!-- Page heading -->
	<div class="container p-t-4 p-b-40">
		<h2 class="f1-l-1 cl2 hov-cl10">
			{{$type}} ({{count($data)}})
		</h2>
	</div>

	<!-- Feature post -->
	<section class="bg0">
		<div class="container">
			<div class="row m-rl--1">
				<div class="col-12 p-rl-1 p-b-2">
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
								<span class="f1-s-4 cl11">
									  {{$mostone->author}}
								</span>

								<span class="f1-s-3 cl11 m-rl-3">
									-
								</span>

								<span class="f1-s-3 cl11">
									  {{ $mostone->created_at->format('M d') }}
								</span>
							</span>
						</div>
					</div>
				</div>
	@foreach ($mintype as $mintype)
	 @if ($mintype->id != $mostone->id )
				<div class="col-sm-6 col-md-3 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url(indexfolder/images/{{$mintype->img}});">
						<a href="read = {{$mintype->header}}" class="dis-block how1-child1 trans-03"></a>

						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<a href="{{$mintype->cat}} = {{$mintype->type}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
								{{$mintype->type}}
							</a>

							<h3 class="how1-child2 m-t-14">
								<a href="read = {{$mintype->header}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
									  {{$mintype->header}}
								</a>
							</h3>
						</div>
					</div>
				</div>
				@endif
	@endforeach

			</div>
		</div>
	</section>

	<!-- Post -->
	<section class="bg0 p-t-110 p-b-25">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8 p-b-80">
					<div class="row">
							 @foreach ($data as $type)
						<div class="col-sm-6 p-r-25 p-r-15-sr991">
							<!-- Item -->
							<div class="p-b-53">
		              <div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url(indexfolder/images/{{$type->img}});">
		                <a href="read = {{$type->header}}" class="dis-block how1-child1 trans-03"></a>

		                <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
		                  <a href="{{$type->cat}} = {{$type->type}}" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
		                    {{$type->type}}
		                  </a>
		               </div>
		               </div>
								<div class="flex-col-s-c p-t-16">
									<h5 class="p-b-5 txt-center">
										<a href="read = {{$type->header}}" class="f1-m-3 cl2 hov-cl10 trans-03">
											  {{$type->header}}
										</a>
									</h5>

									<div class="cl8 txt-center p-b-17">
										<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										by  {{$type->author}}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											{{ $type->created_at->format('M d') }}
										</span>
									</div>

									<p class="f1-s-11 cl6 txt-center p-b-16">
										{{$type->p1}}
									</p>

									<a href="read = {{$type->header}}" class="f1-s-1 cl9 hov-cl10 trans-03">
										Read More
										<i class="m-l-2 fa fa-long-arrow-alt-right"></i>
									</a>
								</div>
							</div>

						</div>
				 @endforeach
					</div>

					<!-- Pagination -->
					<div class="flex-wr-c-c m-rl--7 p-t-28">
					 {{$data->links('vendor.pagination.mm336')}}
					</div>
				</div>

 @include('layouts.index.sidediv')

			</div>
		</div>
	</section>


@include('layouts.index.home_footer')
