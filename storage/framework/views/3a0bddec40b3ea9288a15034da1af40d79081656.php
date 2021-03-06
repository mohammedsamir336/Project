<!-- Life Style -->
<div class="col-sm-6 p-r-25 p-r-15-sr991 p-b-25">
  <div class="how2 how2-cl5 flex-sb-c m-b-35">
    <h3 class="f1-m-2 cl17 tab01-title">
      Life Style
    </h3>


    <a href="<?php echo e(url('categ = Life')); ?>" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
      View all
      <i class="fs-12 m-l-5 fa fa-caret-right"></i>
    </a>
  </div>

  <?php if($Life_one): ?>
    <!-- Main Item post -->
    <div class="m-b-30">
      <a href="read = <?php echo e($Life_one->header); ?>" class="wrap-pic-w hov1 trans-03">
        <img class="size-a-51"  src="indexfolder/images/<?php echo e($Life_one->img); ?>" alt="IMG">
      </a>

      <div class="p-t-20">
        <h5 class="p-b-5">
          <a href="read = <?php echo e($Life_one->header); ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
            <?php echo e($Life_one->header); ?>

          </a>
        </h5>

        <span class="cl8">
          <a href="<?php echo e($Life_one->cat); ?> = <?php echo e($Life_one->type); ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
          <?php echo e($Life_one->type); ?>

          </a>

          <span class="f1-s-3 m-rl-3">
            -
          </span>

          <span class="f1-s-3">
            <?php echo e($Life_one->created_at->format('M d')); ?>

          </span>
        </span>
      </div>
    </div>

    <?php $__currentLoopData = $Life_Nav->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <?php if($posts->id != $Life_one->id): ?>

    <!-- Item post -->
    <div class="flex-wr-sb-s m-b-30">
      <a href="read = <?php echo e($posts->header); ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
        <img class="size-a-33" src="indexfolder/images/<?php echo e($posts->img); ?>" alt="IMGDonec metus orci, malesuada et lectus vitae">
      </a>

      <div class="size-w-2">
        <h5 class="p-b-5">
          <a href="read = <?php echo e($posts->header); ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
            <?php echo e($posts->header); ?>

          </a>
        </h5>

        <span class="cl8">
          <a href="<?php echo e($posts->cat); ?> = <?php echo e($posts->type); ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
            <?php echo e($posts->type); ?>

          </a>

          <span class="f1-s-3 m-rl-3">
            -
          </span>

          <span class="f1-s-3">
              <?php echo e($posts->created_at->format('M d')); ?>

          </span>
        </span>
      </div>
    </div>
    
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <?php else: ?>
        <span>it is no posts here...</span>
      <?php endif; ?>
  </div>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\layouts\index\posts\lifestyle.blade.php ENDPATH**/ ?>