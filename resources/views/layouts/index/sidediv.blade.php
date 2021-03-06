<style media="screen">
    .size-a-55 {
        width: 35%;
        min-height: 89px;
    }

</style>
<div class="col-md-10 col-lg-4">
    <div class="p-l-10 p-rl-0-sr991 p-b-20">
        <!--  -->
        <div>
            <!-- Popular Posts -->
            <div class="p-b-30">
                <div class="how2 how2-cl4 flex-s-c">
                    <h3 class="f1-m-2 cl3 tab01-title">
                        Most Popular
                    </h3>
                </div>

                <ul class="p-t-35">
                    @foreach ($Popular_posts as $Popular)
                    <li class="flex-wr-sb-s p-b-30">

                        <div class="bg-img1 size-a-13 how1 pos-relative" style="background-image: url({{asset('indexfolder/images/'.$Popular->img)}});">
                            <a  title="{{$Popular->header}}" href="read = {{$Popular->header}}" class="dis-block how1-child1 trans-03"></a>

                        </div>

                        <div class="size-w-11 ">
                            <h6 class="p-b-4">
                                <a href="read = {{$Popular->header}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                    {{Str::words($Popular->header, 4, '...')}}
                                </a>
                            </h6>

                            <span class="cl8 txt-center p-b-24">
                                <a href="{{$Popular->cat}} = {{$Popular->type}}" class="f1-s-6 cl8 hov-cl10 trans-03">
                                    {{$Popular->type}}
                                </a>

                                <span class="f1-s-3 m-rl-3">
                                    -
                                </span>

                                <span class="f1-s-3">
                                    {{ $Popular->created_at->format('M d') }}
                                </span>
                                <span class="f1-s-3 " style="padding: 10px;"> <i class="fas fa-eye"></i>
                                    {{$Popular->view_count}}
                                </span>
                            </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- banner -->
        <div class="flex-c-s p-t-8">
            <a href="#">
                <img class="max-w-full" src="{{asset('indexfolder/images/banner-02.jpg')}}" alt="IMG">
            </a>
        </div>
    </div>
</div>
