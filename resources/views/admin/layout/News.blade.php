<!-- card new -->
<section id="News" class="signup-section">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title m-b-0">News</h4>
        </div>
        <ul class="list-style-none">
            @if ($news)
            @foreach ($news as $data)
            <li class="d-flex no-block card-body">

                <div>
                    <a href="#" class="m-b-0 font-medium p-0 text-dark collapsed" data-toggle="collapse" data-target="#collapseTwo{{$data->id}}" aria-expanded="false" aria-controls="collapseTwo{{$data->id}}">
                        <i class="fa fa-check-circle w-30px m-t-5"></i>
                        <span>{{$data->title}}</span>
                    </a>
                    <span class="text-muted ml-4" style="position:relative;left:10px">{{Str::words($data->text, 5, '...')}}</span>
                    <!--Str::limit($data->text, 30, '...')-->

                    <div id="collapseTwo{{$data->id}}" class="collapse" aria-labelledby="headingTwo{{$data->id}}">
                        <div class="card-body">
                            <span><a href="#" class="text-dark"> By: <b>{{$data->news_admins_id()->first()->name}}</b></a></span>
                            <span class="mb-3">{{$data->text}}</span>
                        </div>
                        <!--only superadmins and the admins how add the news can be delete it-->
                        @if (Auth::guard('admin')->user()->id == $data->admins_id || Auth::guard('admin')->user()->superadmin != 0)
                        <button class="btn btn-danger btn-rounded btn-sm my-0"><a href="{{url('/admin/DelNews'.$data->id)}}" class="btn btn-danger btn-rounded btn-sm my-0 text-dark">Delete</a></button>
                        @endif
                    </div>
                </div>
                <div class="ml-auto">
                    <div class="tetx-right">
                        <h5 class="text-muted ">{{$data->created_at->format('d')}}</h5>
                        <span class="text-muted font-16" style="position:relative;bottom:10px;">{{$data->created_at->format('M')}}</span>
                    </div>
                </div>
                <div class="border-top">

                </div>
            </li>
            <div class="border-top">
            </div>
            @endforeach
            @else
            <li class="d-flex no-block card-body">
                <span>No news found</span>
            </li>
            @endif
        </ul>
    </div>
</section>
