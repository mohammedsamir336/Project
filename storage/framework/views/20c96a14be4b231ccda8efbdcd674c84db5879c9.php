<?php echo $__env->make('layouts.index.home_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<title><?php echo e($profile_data->email); ?></title>


<div class="container my-5">
  <div class="row">
    <div class="col-md-8 col-lg-6 mx-auto">


      <!-- Section: Block Content -->
      <section>

        <!-- Card -->
        <div class="card testimonial-card">

            <!-- Background color -->
            <div class="card-up warning-color-dark p-3 white-text">
              <p class="font-weight-normal mb-0"><?php echo e($profile_data->name); ?></p>
              <p class="small mb-0"><?php echo e($profile_data->job); ?></p>
            </div>

            <!-- Avatar -->
         <div class="avatar mx-auto white">
              <?php if( file_exists('img/users_img/'.$profile_data->users->img)): ?>
              <img src="<?php echo e(asset('img/users_img/'.$profile_data->users->img)); ?>"  class="rounded-circle" height="117" width="117"  alt="Avatar">
            <?php else: ?>
            <img src="<?php echo e($profile_data->users->img); ?>"  class="rounded-circle"   alt="Avatar">        
            <?php endif; ?>
         </div>
            <!-- Content -->
            <div class="card-body px-3 py-4">
              <div class="row">
                <div class="col-4 text-center">
                  <p class="font-weight-bold mb-0"><?php echo e($comm_count); ?></p>
                  <p class="small text-uppercase mb-0">Comments</p>
                </div>
                <div class="col-4 text-center border-left border-right">
                  <?php if($profile_data->users->blocked_date): ?>
                <i class="fas fa-circle text-danger"> blocked by Admin available at: <?php echo e($profile_data->users->blocked_date->diffForHumans()); ?></i>
            <!-- check if email online in Illuminate\Foundation\Auth\AuthenticatesUsers attempt function
            give in admin/auth/logincontroller in logout the now()time to know when admin or user loggedOut
            and if he login updata the column will back to null -->
                <?php elseif( !$profile_data->users->online_at): ?>
                <p class="online-status status-available text-success mb-0" >  <i class="fa fa-circle text-success fa-xs" aria-hidden="true" style="font-size: 0.7rem;"></i> online</p>
                <p class="small text-uppercase mb-0">Status</p>
                  <?php else: ?>
                  <p class="online-status status-available text-danger m-t-9" ><i class="fas fa-circle text-danger" style="font-size: 0.7rem;"></i> Last login at: <?php echo e($profile_data->users->online_at->diffForHumans(null,true,true)); ?></p>

                    <?php endif; ?>

                </div>
                <div class="col-4 text-center">
                  <p class="font-weight-bold mb-0"><?php echo e($contact_count); ?></p>
                  <p class="small text-uppercase mb-0">Contacts</p>
                </div>
              </div>
            </div>
            <hr>
            <div class="profile-info m-l-21 m-t-25">
              <h4 class="heading"> <u>Info:</u></h4>
              <ul class="list-unstyled list-justify">
                <li class="m-t-10">A user since : <span class="m-r-150"><?php echo e($profile_data->users->created_at->format('dD M, Y h:sA')); ?></span></li>
                <?php if($profile_data->birth): ?>
                <li class="m-t-10">Birth Date : <span class="m-r-150 "><?php echo e($profile_data->birth->format('d M , Y')); ?></span></li>
                <?php else: ?>
                <li class="m-t-10">Birth Date : <span class="m-r-150"></span></li>
                <?php endif; ?>
                <li class="m-t-10">Mobile : <span class="m-r-150"><?php echo e($profile_data->profile_phone); ?></span></li>
                <li class="m-t-10">Website : <span><a href="<?php echo e($profile_data->Website); ?>" class="m-r-150"><?php echo e($profile_data->Website); ?></a></span></li>
                <li class="m-t-10">Facebook : <span><a href="<?php echo e($profile_data->facebook); ?>" class="m-r-150"><?php echo e($profile_data->facebook); ?></a></span></li>
              </ul>
            </div>
         <div class="m-b-95">
            <div class="profile-info m-l-21 m-t-25" >
              <h4 class="heading "><u>About:</u></h4>
              <p><?php echo e($profile_data->about); ?></p>
            </div>
          </div>
          <!--  never show this btn to any one-->
        <?php if(auth()->guard()->check()): ?>
         <?php if($profile_data->users_id == $user->id): ?>   <!--  $user in postsComposer-->
    <div class="text-center m-b-35"><a href="<?php echo e(route('setting')); ?>" class="btn btn-info btn-lg">Change Profile</a></div>
         <?php endif; ?>
        <?php endif; ?>
          </div>
          <!-- Card -->

      </section>
      <!-- Section: Block Content -->

    </div>
  </div>
</div>





  <?php echo $__env->make('layouts.index.home_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
          url:"<?php echo e(route('video')); ?>",
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
<?php /**PATH C:\xampp\htdocs\Project\resources\views\auth\users_profile.blade.php ENDPATH**/ ?>