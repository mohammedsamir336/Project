@include('layouts.index.home_header')
<!-- BEGIN SHAREAHOLIC CODE -->
<link rel="preload" href="https://cdn.shareaholic.net/assets/pub/shareaholic.js" as="script" />
<meta name="shareaholic:site_id" content="e13b8d7f4ff881210b314b12e8411b93" />
<script data-cfasync="false" async src="https://cdn.shareaholic.net/assets/pub/shareaholic.js"></script>
<!-- END SHAREAHOLIC CODE -->
<style media="screen">
.size-a-55 {
  width: 35%;
  min-height: 89px;
}

</style>

<title> {{$header}}</title>
<!-- Breadcrumb -->
<div id="ggg"class="container">
  <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
    <div class="f2-s-1 p-r-30 m-tb-6">
      <a href="{{route('home')}}" class="breadcrumb-item f1-s-3 cl9">
        Home
      </a>

      <span class="breadcrumb-item f1-s-3 cl9">
         {{$header}}


      </span>
    </div>

    <form class="" action="{{route('search')}}" method="get">

        <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
          <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45 text-dark" type="text" name="search" placeholder="Search" required>
          <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
            <i class="zmdi zmdi-search"></i>
          </button>
      </div>
    </form>
  </div>
</div>

<!-- Content -->
<section class="bg0 p-b-140 p-t-10">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8 p-b-30">
        <div class="p-r-10 p-r-0-sr991">
          <!-- Blog Detail -->
          <div class="p-b-70">
            <a href="{{$posts->cat}} = {{$posts->type}}" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
            {{$posts->type}}
            </a>

         <h6 class="f1-s-10 cl2 hov-cl10 trans-03  mt-3">
          {{ $posts->created_at->diffForHumans(null,true) }}
        </h6>

            <h3 class="f1-l-3 hov-cl10 cl2 p-b-16 p-t-33 respon2">
              {{$posts->header}}
            </h3>

            <div class="flex-wr-s-s p-b-40">
              <span class="f1-s-3 cl8 m-r-15">
                <a href="#" class="f1-s-2 cl8 hov-cl10 trans-03">
                  by {{$posts->author}}
                </a>

                <span class="m-rl-3">-</span>

                <span class="hov-cl10 ">
             {{ $posts->created_at->format('M d ,Y') }}
                </span>

      <span class="m-rl-3 hov-cl10"> at {{ $posts->created_at->format('g:ia') }}
      </span>
              </span>

              <span class="f1-s-3 cl8 m-r-15">
              {{$posts->view_count}}  <i class="fas fa-eye"></i>
              </span>

              <a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
                {{$comments}} <i class="fas fa-comment "></i>

              </a>
            </div>

            <div class="wrap-pic-max-w p-b-30">
              <img src="{{asset('indexfolder/images/'.$posts->img)}}" alt="IMG">
            </div>

            <div class="f1-s-11 cl6 p-b-25">
               {!!$posts->p1!!}
             </div>


            <div class="f1-s-11 cl6 p-b-25">
            {!!$posts->p2!!}
            </div>

      @if ($posts->videos_id)

      <h4 class="f1-l-3 hov-cl10 cl2 p-b-16 p-t-33 respon2 text-center">
        {{$posts->videos_id()->first()->title}}
      </h4>

        <div class="wrap-pic-w pos-relative">
        <img class="img-fluid z-depth-1 size-a-51 how1 " src="{{$posts->videos_id()->first()->video_img}}" >
          <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" alt="video"
              data-id="{{$posts->videos_id()->first()->id}}"  data-toggle="modal" data-target="#modal1" onclick="$('#ggg').toggleClass('LightsOutPage')">
      <span class="fab fa-youtube fa-lg text-danger"></span>
          </button>
          </div>
    <!-- Modal Video 01-->

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-lg-4 col-md-12 mb-4">

          <!--Modal: Name-->
          <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">

              <!--Content-->
              <div class="modal-content">

            <!--Body-->
            <div class="modal-body mb-0 p-0">

          <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
          {!!$posts->videos_id()->first()->video!!}
          </div>

        </div>


  <!--Footer-->
  <div class="modal-footer justify-content-center">
    <span class="mr-4">Spread the word!</span>
    <a type="button" class="btn-floating btn-sm btn-fb"><i class="fab fa-facebook-f"></i></a>
    <!--Twitter-->
    <a type="button" class="btn-floating btn-sm btn-tw"><i class="fab fa-twitter"></i></a>
    <!--Google +-->
    <a type="button" class="btn-floating btn-sm btn-gplus"><i class="fab fa-google-plus-g"></i></a>
    <!--Linkedin-->
    <a type="button" class="btn-floating btn-sm btn-ins"><i class="fab fa-linkedin-in"></i></a>

    <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>

      </div>

      </div>
    <!--/.Content-->

      </div>
       </div>

    </div>

      </div>
  @endif


      <div class="f1-s-11 cl6 p-b-25">
      {!!$posts->p3!!}
      </div>

            <!-- Tag -->
            <div class="flex-s-s p-t-12 p-b-15">
              <span class="f1-s-12 cl5 m-r-8">
                Tags:
              </span>

              <div class="flex-wr-s-s size-w-0">
                  <!-- Split Tag -->
                @foreach(explode(',',$posts->tag) as $row)
                <a href="{{asset('s?search='.$row)}}" class="f1-s-12 cl8 hov-link1 m-r-15">
                  <u>{{ $row }}</u>
                </a>
                @endforeach

              </div>
            </div>

            <!-- Share -->
            <div class="flex-s-s">
              <span class="f1-s-12 cl5 p-t-1 m-r-15">
                Share:
              </span>

              <div class="flex-wr-s-s size-w-0">
                <a href="https://www.facebook.com/sharer/sharer.php?u=http://127.0.0.1:8000/read%20=%20{{$posts->header}}&display=popup" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                  <i class="fab fa-facebook-f m-r-7"></i>
                  Facebook
                </a>

                <a href="https://twitter.com/intent/tweet?hashtags=awesome,sharing&text=My {{url()->full()}}&via=MyTwitterHandle" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                  <i class="fab fa-twitter m-r-7"></i>
                  Twitter
                </a>

             <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
             <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
             </div>

  <!-- floating button -->
  <div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_default_style" style="bottom:0px; right:0px;">
      <a class="a2a_button_facebook"></a>
      <a class="a2a_button_twitter"></a>
      <a class="a2a_button_pinterest"></a>
      <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
  </div>
              </div>
                <!-- like button -->
              <div class="a2a_kit a2a_default_style">
                <a class="a2a_button_facebook_like"></a>
            </div>
            <script async src="https://static.addtoany.com/menu/page.js"></script>
            </div>
          </div>

 @include('layouts.index.comments')

        </div>
      </div>


      <!-- Sidebar -->
      <div class="col-md-10 col-lg-4 p-b-30">
        <div class="p-l-10 p-rl-0-sr991 p-t-70">
          <!-- Category -->
          <div class="p-b-60">
            <div class="how2 how2-cl4 flex-s-c">
              <h3 class="f1-m-2 cl3 tab01-title">
                Category
              </h3>
            </div>

            <ul class="p-t-35">
              <li class="how-bor3 p-rl-4">
                <a href="{{url('categ = Entertainment')}}" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                Entertainment
                </a>
              </li>

              <li class="how-bor3 p-rl-4">
                <a href="{{url('categ = Fashion')}}" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
              Fashion
                </a>
              </li>

              <li class="how-bor3 p-rl-4">
                <a href="{{url('categ = Technology')}}" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                  Technology
                </a>
              </li>

              <li class="how-bor3 p-rl-4">
                <a href="{{url('categ = Life')}}" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                  Life Style
                </a>
              </li>

              <li class="how-bor3 p-rl-4">
                <a href="{{url('categ = Travel')}}" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                  Travel
                </a>
              </li>
            </ul>
          </div>

          <!-- Archive -->
          <div class="p-b-37">
            <div class="how2 how2-cl4 flex-s-c">
              <h3 class="f1-m-2 cl3 tab01-title">
                Archive
              </h3>
            </div>

            <ul class="p-t-32">

          <div class="" id="years1">
                @foreach ($years->take(3) as $y1)
                <li class="p-rl-4 p-b-19" >
                     <ul class="collapsible collapsible-accordion">
                       <li><a class="collapsible-header waves-effect arrow-r text-dark f1-s-10 text-uppercase cl2">
                            {{$y1->year}}</i></a>
                         <div class="collapsible-body m-t-7">
                           @foreach ($Archive as $archive)
                       @if ($y1->year == $archive->year)
                           <ul>
                             <!-- This because $archive->month 1,2,3 I have to put a zero before it -->
                             @if ($archive->month <= 9)
                             <li><a href="s?search={{$archive->year}}-0{{$archive->month}}" class="waves-effect text-default">{{$archive->month_name}}</a>
                             </li>
                             @else
                             <li><a href="s?search={{$archive->year}}-{{$archive->month}}" class="waves-effect text-default">{{$archive->month_name}}</a>
                             </li>
                           </ul>
                           @endif
                      @endif
                           @endforeach
                         </div>
                       </li>
                      </ul>
                     </li>
               @endforeach
             </div>
               <div id="years2" style="display:none;">
                 @foreach ($years as $y2)
                 <li class="p-rl-4 p-b-19">
                      <ul class="collapsible collapsible-accordion">
                        <li><a class="collapsible-header waves-effect arrow-r text-dark f1-s-10 text-uppercase cl2">
                             {{$y2->year}}</i></a>

                          <div class="collapsible-body m-t-7">
                      @foreach ($Archive as $archive)
                        @if ($y2->year == $archive->year)
                            <ul>
                              @if ($archive->month <= 9)
                              <li><a href="s?search={{$archive->year}}-0{{$archive->month}}" class="waves-effect text-default">{{$archive->month_name}}</a>
                              </li>
                              @else
                              <li><a href="s?search={{$archive->year}}-{{$archive->month}}" class="waves-effect text-default">{{$archive->month_name}}</a>
                              </li>
                            </ul>
                            @endif
                        @endif
                      @endforeach
                          </div>
                        </li>
                       </ul>
                      </li>
                @endforeach
              </div>
              <!-- check count of posts years to show seemore -->
          @if ( count($years) > 3)
   <li><a  onClick="$('#years2').toggle(); $('#years1').toggle();"
     class="collapsible-header waves-effect arrow-r text-default f1-s-10 text-uppercase cl2">
     See More</li></a>
          @endif
            </ul>
          </div>

          <!-- Popular Posts -->
          <div class="p-b-30">
            <div class="how2 how2-cl4 flex-s-c">
              <h3 class="f1-m-2 cl3 tab01-title">
                Popular Post
              </h3>
            </div>

            <ul class="p-t-35">
              @foreach ($Popular_posts  as $Popular)
            <li class="flex-wr-sb-s p-b-30">
              <div class="bg-img1 size-a-55 how1 pos-relative" style="background-image: url({{asset('indexfolder/images/'.$Popular->img)}});">
                <a href="read = {{$Popular->header}}" class="dis-block how1-child1 trans-03"></a>

               </div>

            <div class="size-w-11">
              <h6 class="p-b-4">
                <a href="read = {{$Popular->header}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                    {{$Popular->header}}
                </a>
              </h6>

              <span class="cl8 txt-center p-b-24">
                <a href="type = {{$Popular->type}}" class="f1-s-6 cl8 hov-cl10 trans-03">
                  {{$Popular->type}}
                </a>

                <span class="f1-s-3 m-rl-3">
                  -
                </span>

                <span class="f1-s-3">
                  {{ $Popular->created_at->format('M d') }}
                </span>
               <span class="f1-s-3 " style="padding: 10px;">  <i class="fas fa-eye"></i>
                 {{$Popular->view_count}}
               </span>
              </span>
            </div>
            </li>
            @endforeach
            </ul>
          </div>

          <!-- Tag -->
          <div>
            <div class="how2 how2-cl4 flex-s-c m-b-30">
              <h3 class="f1-m-2 cl3 tab01-title">
                Tags
              </h3>
            </div>

            <div class="flex-wr-s-s m-rl--5">
              <a href="{{url('s?search=Fashion')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Fashion
              </a>

              <a href="{{url('s?search=Life')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Lifestyle
              </a>

              <a href="{{url('s?search=Shoe')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Shoe
              </a>

              <a href="{{url('s?search=Beachs')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Beachs
              </a>

              <a href="{{url('?search=Financ')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Financ
              </a>

              <a href="{{url('s?search=Entertainment')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Entertainment
              </a>

              <a href="{{url('s?search=Music')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                Music
              </a>

              <a href="{{url('s?search=Culture')}}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
              Culture
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

   <script async src="https://static.addtoany.com/menu/page.js"></script>
@include('layouts.index.home_footer')
