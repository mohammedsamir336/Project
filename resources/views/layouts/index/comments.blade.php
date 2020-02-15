
@if ( $comments > 0 )
<!--Section: Comments-->
 <section class="my-5" >
  <!-- Card header -->
  <div class="card-header border-0 font-weight-bold">{{$comments}} comments</div>
 @foreach ($comments_data  as $comments)
  <!-- check auth for the replies-->
  @guest
  <div class="md-form mt-4" id="reply{{$comments->id}}"  style="display:none;">
    <a href="{{route('login')}}" target=" _blank"><strong class="text-danger hov-cl10">Please login first !  </strong></a>
      </div>
  @endguest

   <div class="media d-block d-md-flex mt-4">
     <!--if users img-->
   @if ( $comments->users_id )
  <!-- To Check if img exist in public folder or not-->
     @if ( file_exists('img/users_img/'.$comments->users->img))
    <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="{{asset('img/users_img/'.$comments->users->img)}}"
      alt="Generic placeholder image">
      @else
      <!--strtoupper() for Uppercase first letter-->
   <!--<div class="msgw-Avatar msgw-Avatar--sm msgw-Avatar--black">{{strtoupper(substr($comments->users->name,0, 1))}}</div>-->
      <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="{{$comments->users->img}}"
        alt="Generic placeholder image">
      @endif

<!--if guest img-->
  @else
      <!--strtoupper() for Uppercase first letter and mb_substr for arabic name-->
  <!--<div class="msgw-Avatar msgw-Avatar--sm msgw-Avatar--black">{{strtoupper(mb_substr($comments->name,0,1,'utf-8'))}}</div>-->
      <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&length=1&rounded=true&bold=true&size=65&name={{$comments->name_comments}}"
        alt="Generic placeholder image">
  @endif
    <div class="media-body text-center text-md-left ml-md-3 ml-0">
      <h5 class="font-weight-bold mt-0">

        <a class="text-default hov-cl10">{{$comments->name_comments}}</a>
        <p class="hov-cl10 text-default">{{$comments->email_comments}}</p>
        <span class="hov-cl10 ">
      {{ $comments->created_at->format('M d ,Y') }}
        </span>
      <span class="m-rl-3 hov-cl10"> at {{ $comments->created_at->format('g:ia') }}
      </span>

<!-- reply button -->
        <a class="pull-right text-default">
          <div id="replybutton" class="btn4 like">
              <i class="fas fa-reply"></i>
              <!--give id to reply button to show and hide the correct input-->
    <span  id="replyb" onClick="$('#reply{{$comments->id}}').toggle();">Reply</span>
     </div>
        </a>
      </h5>

  <h5 class="font-weight-bold mt-1">{{$comments->text_comments}}</h5>

  <!-- delete comments by admin-->
  @auth('admin')
<a href="{{ url('del_comment'.$comments->id) }}"  class="text-danger">Delete</a>
   @endauth

@auth
<!-- delete auth comments-->
 @if (auth()->user()->id === $comments->users_id)
    <a href="{{ url('del_comment'.$comments->id) }}"  class="text-danger">Delete</a>
 @endif

  <!-- reply input of comments-->
  <form  action="reply={{$comments->id}}" method="post">
    @csrf
  <div class="md-form mt-4" id="reply{{$comments->id}}"  style="display:none;">
     <label for="quickReplyFormComment">Your Reply</label>
     <textarea  type="text" class="form-control md-textarea @error('reply') is-invalid @enderror" id="quickReplyFormComment" rows="3" name="reply" value="{{ old('reply') }}"  maxlength="255" required autocomplete="reply"></textarea>
     <div class="text-center my-4">
       <button class="btn btn-default btn-sm btn-rounded" type="submit">Send</button>
     </div>
   </div>
   </form>
@endauth

  <!-- reply-->
<section id="see{{$comments->id}}"  style="display:none;">
  @foreach($replies as $rep)
    @if($comments->id === $rep->reply_comments_id)
     @guest
     <!--  for reply on comments button -->
<div class="md-form mt-4" id="rep{{$rep->reply_id}}"  style="display:none;">
  <a href="{{route('login')}}" target=" _blank"><strong class="text-danger hov-cl10">Please login first !  </strong></a>
    </div>
     @endguest
      <div class="media d-block d-md-flex mt-4" >
        <!-- To Check if img exist in public folder or not-->
         @if ( file_exists('img/users_img/'.$rep->img))
        <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="{{asset('img/users_img/'.$rep->img)}}"
          alt="Generic placeholder image">
          @else
          <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&length=1&rounded=true&bold=true&size=45&name={{$rep->name_reply}}"
            alt="Generic placeholder image">
            @endif

        <div class="media-body text-center text-md-left ml-md-3 ml-0" >
          <h5 class="font-weight-bold mt-0">
            <a  class="text-default" href="#">{{$rep->name_reply}}</a>
            <p class="hov-cl10 text-default">{{$rep->email_reply}}</p>
            <!-- reply button-->
            <a class="pull-right text-default">
              <div id="replybutton" class="btn4 like">
                  <i class="fas fa-reply" id="replyb" onClick="$('#rep{{$rep->reply_id}}').toggle();"></i>
                  <!--give id to reply button to show and hide the correct input-->
                </div>
                </a>
  <strong class="font-weight-bold mt-1">{{$rep->reply}}</strong>

  <!-- delete reply by admin-->
  @auth('admin')
  <a href="{{ url('del_reply'.$rep->reply_id) }}" class="text-danger">Delete</a>
   @endauth

@auth
  <!-- delete auth reply-->
      @if (auth()->user()->id === $rep->reply_users_id)
  <br>
  <a href="{{ url('del_reply'.$rep->reply_id) }}" class="text-danger">Delete</a>
  <!-- reply button-->
  <a class="text-default" style=" margin-left:10px;" id="replyb" onClick="$('#rep{{$rep->reply_id}}').toggle();">
    Reply
   </a>
      @endif

    <!-- reply On reply  input-->
    <form  action="rep={{$comments->id}}={{$rep->reply_id}}" method="post">
      @csrf
    <div class="md-form mt-4" id="rep{{$rep->reply_id}}"  style="display:none;">
       <label for="quickReplyFormComment">Your Reply</label>
       <textarea  type="text" class="form-control md-textarea @error('reply') is-invalid @enderror" id="quickReplyFormComment" rows="3" name="reply" value="{{ old('reply') }}"  maxlength="255" required autocomplete="reply"></textarea>
       <div class="text-center my-4">
         <button class="btn btn-default btn-sm btn-rounded" type="submit">Post</button>
       </div>
     </div>
     </form>
@endauth

  <!--reply on reply template-->
    @foreach($reply as $re)
       @if($re->rep_rep_id === $rep->reply_id)

<div class="media d-block d-md-flex mt-4" >
   @if ( file_exists('img/users_img/'.$re->RepUsers->img))
 <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="{{asset('img/users_img/'.$re->RepUsers->img)}}"
   alt="Generic placeholder image">
   @else
   <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&length=1&rounded=true&bold=true&size=45&name={{$re->name_rep}}"
     alt="Generic placeholder image">
     @endif
 <div class="media-body text-center text-md-left ml-md-3 ml-0" >
   <h5 class="font-weight-bold mt-0">
     <a class="text-default" href="#">{{$re->name_rep}}</a>
     <p class="hov-cl10 text-default">{{$re->email_rep}}</p>
     <div class="tab01-head bocl12 flex-s-c ">
      Reply on :
      {{$rep->reply}}
     </div>
<strong class="font-weight-bold mt-3"style="margin-left:30px;">{{$re->reptext}}</strong>

<!-- delete On reply by admin-->
@auth('admin')
<a href="{{ url('del_rep'.$re->rep_id) }}" class="text-danger">Delete</a>
 @endauth

<!-- delete On reply -->
    @auth
      @if (auth()->user()->id === $re->rep_users_id)
<br>
<a href="{{ url('del_rep'.$re->rep_id) }}" class="text-danger">Delete</a>
      @endif
    @endauth
</div>
</div>
   @endif
@endforeach
    </div>
    </div>
@endif

@endforeach
  </section>


  <!--replys showHide-->
  <a class="pull-right " >
    <div id="replybutton" class="btn4 like">
      <!--  give id to reply button to show and hide the correct replies jquery in home_footer-->
  <span  data-id="{{$comments->id}}"class="reply text-default"  onClick="$('#see{{$comments->id}}').toggle();" >
 Replies
        @php
          $count = App\Reply::where('reply_comments_id', $comments->id)->count();
           echo "({$count})"
         @endphp
  </span>
   </div>
 </a>

 </div>
 </div>
@endforeach
<!--end foreach of comments-->
@else
<div class="card-header border-0 font-weight-bold">{{$comments}} comments</div>
@endif
<!--end if of count comments-->
<!-- Pagination -->
<nav class="d-flex justify-content-center mt-5">
    <ul class="pagination pagination-circle pg-teal mb-0">
{{$comments_data->links()}}
</ul>
  </nav>

@guest
  <!--  guest comments pagination -->
 <section class="my-5">
   <!-- Leave a reply -->
   <div class="card-header border-0 font-weight-bold">Leave a Comment (<a  class="hov-cl10" href="{{route('login')}}">logged in user</a>)</div>

<!-- check if the email It belongs to user if belongs to he most be login first
This method is safer (in comment in indexcontroller)-->
   @if (session('user'))
   @if ( file_exists('img/users_img/'. session('img') ))
   <nobr> <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto " src="{{asset('img/users_img/'. session('img') )}}"
      alt="Generic placeholder image">
   @else
   <nobr> <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto " src="{{ session('img') }}"
      alt="Generic placeholder image">
   @endif
     <div class="alert alert-danger m-t-20" role="alert">
   <h3> <!-- {{trans('message.success')}} -->
    *If you are {{ session('user') }} please (<a class="hov-cl10 text-default" href="{{route('login')}}">logged in </a>) first ! </h3></nobr>
  </div>
       @endif

   <!-- Default form comments -->
   <form class="px-1 mt-4" action="{{route('comment')}}" method="post">
            @csrf
            <!--posts id-->
         <input type="hidden" name="id_post" value="{{$posts->id}}">
     <!-- Comment -->
     <div class="md-form">
       <textarea type="text" id="contact-message" class="md-textarea form-control @error('text') is-invalid @enderror " rows="3" name="text"  maxlength="255" required autocomplete="text">
         {{ old('text') }}
        </textarea>
       <label for="contact-message">Your comment</label>
     </div>

     <!-- Name -->
     <div class="md-form mt-5">
       <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror " name="name" value="{{ old('name') }}" required autocomplete="name" >
       <label for="name" >{{ __('Name') }}</label>

       @error('name')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
     </div>

     <!-- Email -->
     <div class="md-form mt-5">
       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
       <label for="email" >{{ __('E-Mail Address') }}</label>

       @error('email')
           <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>
       @enderror
     </div>

     <div class="text-center mt-4">
       <button class="btn btn-default btn-rounded btn-md" type="submit">Send</button>
     </div>

   </form>
   <!-- Default form reply -->

 </section>
 <!-- if auth -->
 @else
 <!-- if auth (logged in user) -->
 <form class="px-1 mt-4" action="{{route('comment')}}" method="post">
          @csrf
          <!--posts id-->
  <input type="hidden" name="id_post" value="{{$posts->id}}">

<section class="my-5" id="comment">

 <div class="card-header border-0 font-weight-bold text-default">Hi {{Auth::user()->name}} <span class="text-dark">(Leave a Comment)</span></div>

  <div class="d-md-flex flex-md-fill px-1">
   <div class=" justify-content-center mr-md-5 mt-md-5 mt-4">
     <!--pathinfo(Auth::user()->img, PATHINFO_EXTENSION) == 'jpg'-->
     <!-- To Check if img exist in public folder or not-->
    @if ( file_exists('img/users_img/'.Auth::user()->img))
     <img class="card-img-100 z-depth-1 rounded-circle" src="{{asset('img/users_img/'.Auth::user()->img)}}"
       alt="avatar">
    @else
    <img class="card-img-100 z-depth-1 rounded-circle" src="{{Auth::user()->img}}"
      alt="avatar">
    @endif
   </div>
   <div class="md-form w-100">
     <textarea class="form-control md-textarea pt-0" id="exampleFormControlTextarea1" name="text"  rows="5"  maxlength="255" placeholder="{{trans('auth.Write something here...')}}" required>{{ old('text') }}</textarea>
   </div>
 </div>
 <div class="text-center">
   <button class="btn btn-default btn-rounded btn-md">Send</button>
 </div>

</section>
<!-- Reply section (logged in user) -->
</form>
@endguest
