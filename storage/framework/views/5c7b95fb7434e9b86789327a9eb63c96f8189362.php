<!-- Entertainment  -->
<div class="p-b-20">
  <div class="how2 how2-cl1 flex-sb-c m-r-10 m-r-0-sr991">
    <h3 class="f1-m-2 cl12 tab01-title">
      Entertainment
    </h3>


    <a href="<?php echo e(url('categ = Entertainment')); ?>" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
      View all
      <i class="fs-12 m-l-5 fa fa-caret-right"></i>
    </a>
  </div>

  <div class="row p-t-35">
      <?php if($Entertainment_one): ?>
      <div class="col-sm-6 p-r-25 p-r-15-sr991">
        <!-- Item post -->
        <div class="m-b-30">
          <a href="read = <?php echo e($Entertainment_one->header); ?>" class="wrap-pic-w hov1 trans-03">
            <img class="size-a-51" src="indexfolder/images/<?php echo e($Entertainment_one->img); ?>" alt="IMG">
          </a>

          <div class="p-t-20">
            <h5 class="p-b-5">
              <a href="read = <?php echo e($Entertainment_one->header); ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
                <?php echo e($Entertainment_one->header); ?>

              </a>
            </h5>

            <span class="cl8">
              <a href="<?php echo e($Entertainment_one->cat); ?> = <?php echo e($Entertainment_one->type); ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
              <?php echo e($Entertainment_one->type); ?>

              </a>

              <span class="f1-s-3 m-rl-3">
                -
              </span>

              <span class="f1-s-3">
            <?php echo e($Entertainment_one->created_at->format('M d')); ?>

              </span>
            </span>
          </div>
        </div>
      </div>

    <div class="col-sm-6 p-r-25 p-r-15-sr991">
      <?php $__currentLoopData = $Entertainment_Nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($posts->id != $Entertainment_one->id): ?>


        <!-- Item post -->
        <div class="flex-wr-sb-s m-b-30">
          <a href="read = <?php echo e($posts->header); ?>" class="size-w-1 wrap-pic-w hov1 trans-03">
            <img class="size-a-33" src="indexfolder/images/<?php echo e($posts->img); ?>" alt="IMG">
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

    <!-- if not have Entertainment posts  -->
      <?php else: ?>
      <div class="col-sm-6 p-r-25 p-r-15-sr991">
      <span>it is no posts here...</span>
      </div>
      <?php endif; ?>

    </div>
  </div>
</div>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\layouts\index\posts\Entertainment.blade.php ENDPATH**/ ?>