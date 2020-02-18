
<?php if( $comments > 0 ): ?>
<!--Section: Comments-->
 <section class="my-5" >
  <!-- Card header -->
  <div class="card-header border-0 font-weight-bold"><?php echo e($comments); ?> comments</div>
 <?php $__currentLoopData = $comments_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <!-- check auth for the replies-->
  <?php if(auth()->guard()->guest()): ?>
  <div class="md-form mt-4" id="reply<?php echo e($comments->id); ?>"  style="display:none;">
    <a href="<?php echo e(route('login')); ?>" target=" _blank"><strong class="text-danger hov-cl10">Please login first !  </strong></a>
      </div>
  <?php endif; ?>

   <div class="media d-block d-md-flex mt-4">
     <!--if users img-->
   <?php if( $comments->users_id ): ?>
  <!-- To Check if img exist in public folder or not-->
     <?php if( file_exists('img/users_img/'.$comments->users->img)): ?>
    <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="<?php echo e(asset('img/users_img/'.$comments->users->img)); ?>"
      alt="Generic placeholder image">
      <?php else: ?>
      <!--strtoupper() for Uppercase first letter-->
   <!--<div class="msgw-Avatar msgw-Avatar--sm msgw-Avatar--black"><?php echo e(strtoupper(substr($comments->users->name,0, 1))); ?></div>-->
      <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="<?php echo e($comments->users->img); ?>"
        alt="Generic placeholder image">
      <?php endif; ?>

<!--if guest img-->
  <?php else: ?>
      <!--strtoupper() for Uppercase first letter and mb_substr for arabic name-->
  <!--<div class="msgw-Avatar msgw-Avatar--sm msgw-Avatar--black"><?php echo e(strtoupper(mb_substr($comments->name,0,1,'utf-8'))); ?></div>-->
      <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&length=1&rounded=true&bold=true&size=65&name=<?php echo e($comments->name_comments); ?>"
        alt="Generic placeholder image">
  <?php endif; ?>
    <div class="media-body text-center text-md-left ml-md-3 ml-0">
      <h5 class="font-weight-bold mt-0">

        <a class="text-default hov-cl10"><?php echo e($comments->name_comments); ?></a>
        <p class="hov-cl10 text-default"><?php echo e($comments->email_comments); ?></p>
        <span class="hov-cl10 ">
      <?php echo e($comments->created_at->format('M d ,Y')); ?>

        </span>
      <span class="m-rl-3 hov-cl10"> at <?php echo e($comments->created_at->format('g:ia')); ?>

      </span>

<!-- reply button -->
        <a class="pull-right text-default">
          <div id="replybutton" class="btn4 like">
              <i class="fas fa-reply"></i>
              <!--give id to reply button to show and hide the correct input-->
    <span  id="replyb" onClick="$('#reply<?php echo e($comments->id); ?>').toggle();">Reply</span>
     </div>
        </a>
      </h5>

  <h5 class="font-weight-bold mt-1"><?php echo e($comments->text_comments); ?></h5>

  <!-- delete comments by admin-->
  <?php if(auth()->guard('admin')->check()): ?>
<a href="<?php echo e(url('del_comment'.$comments->id)); ?>"  class="text-danger">Delete</a>
   <?php endif; ?>

<?php if(auth()->guard()->check()): ?>
<!-- delete auth comments-->
 <?php if(auth()->user()->id === $comments->users_id): ?>
    <a href="<?php echo e(url('del_comment'.$comments->id)); ?>"  class="text-danger">Delete</a>
 <?php endif; ?>

  <!-- reply input of comments-->
  <form  action="reply=<?php echo e($comments->id); ?>" method="post">
    <?php echo csrf_field(); ?>
  <div class="md-form mt-4" id="reply<?php echo e($comments->id); ?>"  style="display:none;">
     <label for="quickReplyFormComment">Your Reply</label>
     <textarea  type="text" class="form-control md-textarea <?php $__errorArgs = ['reply'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="quickReplyFormComment" rows="3" name="reply" value="<?php echo e(old('reply')); ?>"  maxlength="255" required autocomplete="reply"></textarea>
     <div class="text-center my-4">
       <button class="btn btn-default btn-sm btn-rounded" type="submit">Send</button>
     </div>
   </div>
   </form>
<?php endif; ?>

  <!-- reply-->
<section id="see<?php echo e($comments->id); ?>"  style="display:none;">
  <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($comments->id === $rep->reply_comments_id): ?>
     <?php if(auth()->guard()->guest()): ?>
     <!--  for reply on comments button -->
<div class="md-form mt-4" id="rep<?php echo e($rep->reply_id); ?>"  style="display:none;">
  <a href="<?php echo e(route('login')); ?>" target=" _blank"><strong class="text-danger hov-cl10">Please login first !  </strong></a>
    </div>
     <?php endif; ?>
      <div class="media d-block d-md-flex mt-4" >
        <!-- To Check if img exist in public folder or not-->
         <?php if( file_exists('img/users_img/'.$rep->img)): ?>
        <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="<?php echo e(asset('img/users_img/'.$rep->img)); ?>"
          alt="Generic placeholder image">
          <?php else: ?>
          <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&length=1&rounded=true&bold=true&size=45&name=<?php echo e($rep->name_reply); ?>"
            alt="Generic placeholder image">
            <?php endif; ?>

        <div class="media-body text-center text-md-left ml-md-3 ml-0" >
          <h5 class="font-weight-bold mt-0">
            <a  class="text-default" href="#"><?php echo e($rep->name_reply); ?></a>
            <p class="hov-cl10 text-default"><?php echo e($rep->email_reply); ?></p>
            <!-- reply button-->
            <a class="pull-right text-default">
              <div id="replybutton" class="btn4 like">
                  <i class="fas fa-reply" id="replyb" onClick="$('#rep<?php echo e($rep->reply_id); ?>').toggle();"></i>
                  <!--give id to reply button to show and hide the correct input-->
                </div>
                </a>
  <strong class="font-weight-bold mt-1"><?php echo e($rep->reply); ?></strong>

  <!-- delete reply by admin-->
  <?php if(auth()->guard('admin')->check()): ?>
  <a href="<?php echo e(url('del_reply'.$rep->reply_id)); ?>" class="text-danger">Delete</a>
   <?php endif; ?>

<?php if(auth()->guard()->check()): ?>
  <!-- delete auth reply-->
      <?php if(auth()->user()->id === $rep->reply_users_id): ?>
  <br>
  <a href="<?php echo e(url('del_reply'.$rep->reply_id)); ?>" class="text-danger">Delete</a>
  <!-- reply button-->
  <a class="text-default" style=" margin-left:10px;" id="replyb" onClick="$('#rep<?php echo e($rep->reply_id); ?>').toggle();">
    Reply
   </a>
      <?php endif; ?>

    <!-- reply On reply  input-->
    <form  action="rep=<?php echo e($comments->id); ?>=<?php echo e($rep->reply_id); ?>" method="post">
      <?php echo csrf_field(); ?>
    <div class="md-form mt-4" id="rep<?php echo e($rep->reply_id); ?>"  style="display:none;">
       <label for="quickReplyFormComment">Your Reply</label>
       <textarea  type="text" class="form-control md-textarea <?php $__errorArgs = ['reply'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="quickReplyFormComment" rows="3" name="reply" value="<?php echo e(old('reply')); ?>"  maxlength="255" required autocomplete="reply"></textarea>
       <div class="text-center my-4">
         <button class="btn btn-default btn-sm btn-rounded" type="submit">Post</button>
       </div>
     </div>
     </form>
<?php endif; ?>

  <!--reply on reply template-->
    <?php $__currentLoopData = $reply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $re): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <?php if($re->rep_rep_id === $rep->reply_id): ?>

<div class="media d-block d-md-flex mt-4" >
   <?php if( file_exists('img/users_img/'.$re->RepUsers->img)): ?>
 <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="<?php echo e(asset('img/users_img/'.$re->RepUsers->img)); ?>"
   alt="Generic placeholder image">
   <?php else: ?>
   <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto mb-3" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&length=1&rounded=true&bold=true&size=45&name=<?php echo e($re->name_rep); ?>"
     alt="Generic placeholder image">
     <?php endif; ?>
 <div class="media-body text-center text-md-left ml-md-3 ml-0" >
   <h5 class="font-weight-bold mt-0">
     <a class="text-default" href="#"><?php echo e($re->name_rep); ?></a>
     <p class="hov-cl10 text-default"><?php echo e($re->email_rep); ?></p>
     <div class="tab01-head bocl12 flex-s-c ">
      Reply on :
      <?php echo e($rep->reply); ?>

     </div>
<strong class="font-weight-bold mt-3"style="margin-left:30px;"><?php echo e($re->reptext); ?></strong>

<!-- delete On reply by admin-->
<?php if(auth()->guard('admin')->check()): ?>
<a href="<?php echo e(url('del_rep'.$re->rep_id)); ?>" class="text-danger">Delete</a>
 <?php endif; ?>

<!-- delete On reply -->
    <?php if(auth()->guard()->check()): ?>
      <?php if(auth()->user()->id === $re->rep_users_id): ?>
<br>
<a href="<?php echo e(url('del_rep'.$re->rep_id)); ?>" class="text-danger">Delete</a>
      <?php endif; ?>
    <?php endif; ?>
</div>
</div>
   <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </section>


  <!--replys showHide-->
  <a class="pull-right " >
    <div id="replybutton" class="btn4 like">
      <!--  give id to reply button to show and hide the correct replies jquery in home_footer-->
  <span  data-id="<?php echo e($comments->id); ?>"class="reply text-default"  onClick="$('#see<?php echo e($comments->id); ?>').toggle();" >
 Replies
        <?php
          $count = App\Reply::where('reply_comments_id', $comments->id)->count();
           echo "({$count})"
         ?>
  </span>
   </div>
 </a>

 </div>
 </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!--end foreach of comments-->
<?php else: ?>
<div class="card-header border-0 font-weight-bold"><?php echo e($comments); ?> comments</div>
<?php endif; ?>
<!--end if of count comments-->
<!-- Pagination -->
<nav class="d-flex justify-content-center mt-5">
    <ul class="pagination pagination-circle pg-teal mb-0">
<?php echo e($comments_data->links()); ?>

</ul>
  </nav>

<?php if(auth()->guard()->guest()): ?>
  <!--  guest comments pagination -->
 <section class="my-5">
   <!-- Leave a reply -->
   <div class="card-header border-0 font-weight-bold">Leave a Comment (<a  class="hov-cl10" href="<?php echo e(route('login')); ?>">logged in user</a>)</div>

<!-- check if the email It belongs to user if belongs to he most be login first
This method is safer (in comment in indexcontroller)-->
   <?php if(session('user')): ?>
   <?php if( file_exists('img/users_img/'. session('img') )): ?>
   <nobr> <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto " src="<?php echo e(asset('img/users_img/'. session('img') )); ?>"
      alt="Generic placeholder image">
   <?php else: ?>
   <nobr> <img class="card-img-64 rounded-circle z-depth-1 d-flex mx-auto " src="<?php echo e(session('img')); ?>"
      alt="Generic placeholder image">
   <?php endif; ?>
     <div class="alert alert-danger m-t-20" role="alert">
   <h3> <!-- <?php echo e(trans('message.success')); ?> -->
    *If you are <?php echo e(session('user')); ?> please (<a class="hov-cl10 text-default" href="<?php echo e(route('login')); ?>">logged in </a>) first ! </h3></nobr>
  </div>
       <?php endif; ?>

   <!-- Default form comments -->
   <form class="px-1 mt-4" action="<?php echo e(route('comment')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <!--posts id-->
         <input type="hidden" name="id_post" value="<?php echo e($posts->id); ?>">
     <!-- Comment -->
     <div class="md-form">
       <textarea type="text" id="contact-message" class="md-textarea form-control <?php $__errorArgs = ['text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " rows="3" name="text"  maxlength="255" required autocomplete="text">
         <?php echo e(old('text')); ?>

        </textarea>
       <label for="contact-message">Your comment</label>
     </div>

     <!-- Name -->
     <div class="md-form mt-5">
       <input id="name" type="text" class="form-control  <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> " name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" >
       <label for="name" ><?php echo e(__('Name')); ?></label>

       <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
           <span class="invalid-feedback" role="alert">
               <strong><?php echo e($message); ?></strong>
           </span>
       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
     </div>

     <!-- Email -->
     <div class="md-form mt-5">
       <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">
       <label for="email" ><?php echo e(__('E-Mail Address')); ?></label>

       <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
           <span class="invalid-feedback" role="alert">
               <strong><?php echo e($message); ?></strong>
           </span>
       <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
     </div>

     <div class="text-center mt-4">
       <button class="btn btn-default btn-rounded btn-md" type="submit">Send</button>
     </div>

   </form>
   <!-- Default form reply -->

 </section>
 <!-- if auth -->
 <?php else: ?>
 <!-- if auth (logged in user) -->
 <form class="px-1 mt-4" action="<?php echo e(route('comment')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <!--posts id-->
  <input type="hidden" name="id_post" value="<?php echo e($posts->id); ?>">

<section class="my-5" id="comment">

 <div class="card-header border-0 font-weight-bold text-default">Hi <?php echo e(Auth::user()->name); ?> <span class="text-dark">(Leave a Comment)</span></div>

  <div class="d-md-flex flex-md-fill px-1">
   <div class=" justify-content-center mr-md-5 mt-md-5 mt-4">
     <!--pathinfo(Auth::user()->img, PATHINFO_EXTENSION) == 'jpg'-->
     <!-- To Check if img exist in public folder or not-->
    <?php if( file_exists('img/users_img/'.Auth::user()->img)): ?>
     <img class="card-img-100 z-depth-1 rounded-circle" src="<?php echo e(asset('img/users_img/'.Auth::user()->img)); ?>"
       alt="avatar">
    <?php else: ?>
    <img class="card-img-100 z-depth-1 rounded-circle" src="<?php echo e(Auth::user()->img); ?>"
      alt="avatar">
    <?php endif; ?>
   </div>
   <div class="md-form w-100">
     <textarea class="form-control md-textarea pt-0" id="exampleFormControlTextarea1" name="text"  rows="5"  maxlength="255" placeholder="<?php echo e(trans('auth.Write something here...')); ?>" required><?php echo e(old('text')); ?></textarea>
   </div>
 </div>
 <div class="text-center">
   <button class="btn btn-default btn-rounded btn-md">Send</button>
 </div>

</section>
<!-- Reply section (logged in user) -->
</form>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\layouts\index\comments.blade.php ENDPATH**/ ?>