<!-- Menu desktop -->
<nav class="menu-desktop">
  <a class="logo-stick" href="<?php echo e(route('home')); ?>">
    <img src="<?php echo e(asset('img/mo.png')); ?>" alt="LOGO" >
  </a>

  <ul class="main-menu justify-content-center">
    <li class="main-menu-active">
      <a href="<?php echo e(route('home')); ?>"><nobr>Home</nobr></a>
      <ul class="sub-menu">
       <li><a href="<?php echo e(route('welcome')); ?>"><nobr>Welcome</nobr></a></li>
      </ul>
    </li>

<?php echo $__env->make('layouts.index.entertainment_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->make('layouts.index.lifestyle_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('layouts.index.travel_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <?php echo $__env->make('layouts.index.business_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('layouts.index.video_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <li>
    <a><nobr>Features</nobr></a>
    <ul class="sub-menu">
      <li><a href="<?php echo e(url('Technology = Mobile')); ?>">Mobile</a></li>
      <li><a href="<?php echo e(url('Business = Finance')); ?>">Finance</a></li>
      <li><a href="<?php echo e(url('Business = Economy')); ?>">Economy</a></li>
      <li><a href="<?php echo e(url('Business = Money')); ?>">Money</a></li>
      <li><a href="<?php echo e(url('Fashion = Beauty')); ?>">Beauty</a></li>
      <li><a href="<?php echo e(url('Entertainment = Music')); ?>">Music</a></li>
      <li><a href="<?php echo e(url('Entertainment = Games')); ?>">Games</a></li>
      <li><a href="<?php echo e(url('Entertainment = Sport')); ?>">Sport</a></li>
      <li><a href="<?php echo e(url('Fashion = Shoe')); ?>">Shoe</a></li>
      <li><a href="<?php echo e(url('Travel = Beachs')); ?>">Beachs</a></li>
      <li><a href="<?php echo e(url('Travel = Hotels')); ?>">Hotels</a></li>

    </ul>
  </li>


  <?php if(auth()->guard()->check()): ?>
  <li >
    <a class="hov-cl10"><nobr><?php echo e($user->email); ?></nobr></a>
    <ul class="sub-menu">
      <li><a href="p  <?php echo e($user->email); ?>"><i class="fa fa-user"></i> My Profile</a></li>
      <li><a href="<?php echo e(route('user_comments')); ?>"><i class="fas fa-comments"></i> My Comments</a></li>
      <li><a href="<?php echo e(route('user_contacts')); ?>"><i class="fa fa-envelope" ></i> My Messages</a></li>
      <li><a href="<?php echo e(route('setting')); ?>"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i> Settings</a></li>
      <li><a class="dropdown-item m-l-7" href="<?php echo e(route('logout')); ?>"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> <?php echo e(__('Logout')); ?>

        </a>

        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
      </li>

    </ul>
  </li>
     <?php endif; ?>

  </ul>
</nav>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\layouts\index\nav.blade.php ENDPATH**/ ?>