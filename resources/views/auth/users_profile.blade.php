@include('layouts.index.home_header')
<title>{{$profile_data->email}}</title>


<div class="container my-5">
  <div class="row">
    <div class="col-md-8 col-lg-6 mx-auto">


      <!-- Section: Block Content -->
      <section>

        <!-- Card -->
        <div class="card testimonial-card">

            <!-- Background color -->
            <div class="card-up warning-color-dark p-3 white-text">
              <p class="font-weight-normal mb-0">{{$profile_data->name}}</p>
              <p class="small mb-0">{{$profile_data->job}}</p>
            </div>

            <!-- Avatar -->
         <div class="avatar mx-auto white">
              @if ( file_exists('img/users_img/'.$profile_data->users->img))
              <img src="{{asset('img/users_img/'.$profile_data->users->img)}}"  class="rounded-circle" height="117" width="117"  alt="Avatar">
            @else
            <img src="{{$profile_data->users->img}}"  class="rounded-circle"   alt="Avatar">        
            @endif
         </div>
            <!-- Content -->
            <div class="card-body px-3 py-4">
              <div class="row">
                <div class="col-4 text-center">
                  <p class="font-weight-bold mb-0">{{$comm_count}}</p>
                  <p class="small text-uppercase mb-0">Comments</p>
                </div>
                <div class="col-4 text-center border-left border-right">
                  @if ($profile_data->users->blocked_date)
                <i class="fas fa-circle text-danger"> blocked by Admin available at: {{$profile_data->users->blocked_date->diffForHumans()}}</i>
            <!-- check if email online in Illuminate\Foundation\Auth\AuthenticatesUsers attempt function
            give in admin/auth/logincontroller in logout the now()time to know when admin or user loggedOut
            and if he login updata the column will back to null -->
                @elseif ( !$profile_data->users->online_at)
                <p class="online-status status-available text-success mb-0" >  <i class="fa fa-circle text-success fa-xs" aria-hidden="true" style="font-size: 0.7rem;"></i> online</p>
                <p class="small text-uppercase mb-0">Status</p>
                  @else
                  <p class="online-status status-available text-danger m-t-9" ><i class="fas fa-circle text-danger" style="font-size: 0.7rem;"></i> Last login at: {{$profile_data->users->online_at->diffForHumans(null,true,true)}}</p>

                    @endif

                </div>
                <div class="col-4 text-center">
                  <p class="font-weight-bold mb-0">{{$contact_count}}</p>
                  <p class="small text-uppercase mb-0">Contacts</p>
                </div>
              </div>
            </div>
            <hr>
            <div class="profile-info m-l-21 m-t-25">
              <h4 class="heading"> <u>Info:</u></h4>
              <ul class="list-unstyled list-justify">
                <li class="m-t-10">A user since : <span class="m-r-150">{{$profile_data->users->created_at->format('dD M, Y h:sA')}}</span></li>
                @if ($profile_data->birth)
                <li class="m-t-10">Birth Date : <span class="m-r-150 ">{{$profile_data->birth->format('d M , Y')}}</span></li>
                @else
                <li class="m-t-10">Birth Date : <span class="m-r-150"></span></li>
                @endif
                <li class="m-t-10">Mobile : <span class="m-r-150">{{$profile_data->profile_phone}}</span></li>
                <li class="m-t-10">Website : <span><a href="{{$profile_data->Website}}" class="m-r-150">{{$profile_data->Website}}</a></span></li>
                <li class="m-t-10">Facebook : <span><a href="{{$profile_data->facebook}}" class="m-r-150">{{$profile_data->facebook}}</a></span></li>
              </ul>
            </div>
         <div class="m-b-95">
            <div class="profile-info m-l-21 m-t-25" >
              <h4 class="heading "><u>About:</u></h4>
              <p>{{$profile_data->about}}</p>
            </div>
          </div>
          <!--  never show this btn to any one-->
        @auth
         @if ($profile_data->users_id == $user->id)   <!--  $user in postsComposer-->
    <div class="text-center m-b-35"><a href="{{route('setting')}}" class="btn btn-info btn-lg">Change Profile</a></div>
         @endif
        @endauth
          </div>
          <!-- Card -->

      </section>
      <!-- Section: Block Content -->

    </div>
  </div>
</div>





  @include('layouts.index.home_footer')
  <script type="text/javascript">

  //password show/hidden
  $('.toggle-password').on('click', function() {
    $(this).toggleClass('fa-eye fa-eye-slash');
    let input = $($(this).attr('toggle'));
    if (input.attr('type') == 'password') {
      input.attr('type', 'text');
    }
    else {
      input.attr('type', 'password');
    }
  });

  //for see replies
  /*$(document).on('click', 'span[data-id]', function(){

     var id = $(this).attr('data-id');

    if ($('span[data-id]').html() != '<b>Close Replies</b>') {
       $('span[data-id]').html('<b>Close Replies</b>');
  }else {
    $('span[data-id]').html('<b>See Replies</b>');

  }
  });*/

  /*$(document).on('click', '#tt', function(){
    $('#vv').toggle();

  });*/
  /*$('.reply').on('click', function(){
  /*  var hide = $('#hide').val();
    var see = $('.reply').attr('id', hide);
    var m = $('.gg').attr('id', hide);
   //$('.dd').append(m);
   $(m).toggle();
   alert(see);*/
   /*$('.reply').html('<b>Loading...</b>')
  });*/

  /*videos close*/
  $('#modal1').on('hidden.bs.modal', function (e) {

    $('#modal1 iframe').attr("src", $("#modal1 iframe").attr("src"));
  });


  /*to Close video on nav bar videos*/
  $('div[v-id]').on('hidden.bs.modal', function (e) {
    var id = $(this).attr('v-id');
    $('div[v-id] iframe').attr("src", $("div[v-id] iframe").attr("src"));
  });


  /*count videos viewer*/
  $(document).on('click', 'button[data-id]', function (e) {

    var id = $(this).attr('data-id');

      load_data(id);

      function load_data(id )
      {
         $.ajax({
          url:"{{ route('video') }}",
          method:"GET",
          data:{id:id},
        success:function(data)
        {

        }
       })
      }
  });


  /* time clock in nav bar*/
  function showTime() {
     var date = new Date(),
         cairo = new Date().toLocaleString({timeZone: "Africa/Cairo"});
        cairo = new Date(cairo);
     document.getElementById('date').innerHTML = cairo.toLocaleTimeString('ar-EG');
   }
   /*refresh time every a second*/
  setInterval(showTime, 1000);


  </script>
