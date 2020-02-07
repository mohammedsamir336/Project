<!-- Feature post -->
<section class="bg0">
  <div class="container">
    <div class="row m-rl--1">
      <div class="col-md-6 p-rl-1 p-b-2">
        <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url(<?php echo e(asset('indexfolder/images/'.$last_oneposts->img)); ?>);">
          <a href="read = <?php echo e($last_oneposts->header); ?>" class="dis-block how1-child1 trans-03"></a>

          <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
            <a href="<?php echo e($last_oneposts->cat); ?> = <?php echo e($last_oneposts->type); ?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
              <?php echo e($last_oneposts->type); ?>

            </a>

            <h3 class="how1-child2 m-t-14 m-b-10">
              <a href="read = <?php echo e($last_oneposts->header); ?>" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                <?php echo e($last_oneposts->header); ?>

              </a>
            </h3>

            <span class="how1-child2">
              <span class="f1-s-4 cl11">
                <?php echo e($last_oneposts->author); ?>

              </span>

              <span class="f1-s-3 cl11 m-rl-3">
                -
              </span>

              <span class="f1-s-3 cl11">
              <?php echo e($last_oneposts->created_at->format('M d')); ?>

              </span>
            </span>
          </div>
        </div>
      </div>

      <div class="col-md-6 p-rl-1">
        <div class="row m-rl--1">
          <?php $__currentLoopData = $last_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $last): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($last->id == $last_oneposts->id-1 ): ?>
          <div class="col-12 p-rl-1 p-b-2">
            <div class="bg-img1 size-a-4 how1 pos-relative" style="background-image: url(<?php echo e(asset('indexfolder/images/'.$last->img)); ?>);">
              <a href="read = <?php echo e($last->header); ?>" class="dis-block how1-child1 trans-03"></a>

              <div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                <a href="<?php echo e($last->cat); ?> = <?php echo e($last->type); ?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                <?php echo e($last->type); ?>

                </a>

                <h3 class="how1-child2 m-t-14">
                  <a href="read = <?php echo e($last->header); ?>" class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                    <?php echo e($last->header); ?>

                  </a>
                </h3>
              </div>
            </div>
          </div>
          <?php else: ?>
          <div class="col-sm-6 p-rl-1 p-b-2">
            <div class="bg-img1 size-a-5 how1 pos-relative" style="background-image: url(<?php echo e(asset('indexfolder/images/'.$last->img)); ?>);">
              <a href="read = <?php echo e($last->header); ?>" class="dis-block how1-child1 trans-03"></a>

              <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                <a href="<?php echo e($last->cat); ?> = <?php echo e($last->type); ?>" class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                  <?php echo e($last->type); ?>

                </a>

                <h3 class="how1-child2 m-t-14">
                  <a href="read = <?php echo e($last->header); ?>" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                    <?php echo e($last->header); ?>

                  </a>
                </h3>
              </div>
            </div>
          </div>
          <?php endif; ?>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php /**PATH C:\xampp\htdocs\mm336\mm\resources\views/layouts/index/top_posts.blade.php ENDPATH**/ ?>