<li class="mega-menu-item">
  <a href="<?php echo e(url('categ = Business')); ?>"><nobr>Business</nobr></a>

  <div class="sub-mega-menu">
    <div class="nav flex-column nav-pills" role="tablist">
      <a class="nav-link active" data-toggle="pill"  href="#business-1" role="tab">All</a>
      <a class="nav-link" data-toggle="pill" href="#business-2" role="tab">Economy</a>
    </div>

    <div class="tab-content">
      <div class="tab-pane show active" id="business-1" role="tabpanel">
        <div class="row">
              <?php $__currentLoopData = $Business_Nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


          <div class="col-3">
            <!-- Item post -->
            <div>
              <a href="read = <?php echo e($posts->header); ?>" class="wrap-pic-w hov1 trans-03">
                <img class="size-a-15" src="<?php echo e(asset('indexfolder/images/'.$posts->img)); ?>" alt="IMG">
              </a>

              <div class="p-t-10">
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
          </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>

      <div class="tab-pane" id="business-2" role="tabpanel">
        <div class="row">
            <?php $__currentLoopData = $Economy_Nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Economy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <div class="col-3">
            <!-- Item post -->
            <div>
              <a href="read = <?php echo e($Economy->header); ?>" class="wrap-pic-w hov1 trans-03">
                <img src="<?php echo e(asset('indexfolder/images/'.$Economy->img)); ?>" alt="IMG">
              </a>

              <div class="p-t-10">
                <h5 class="p-b-5">
                  <a href="read = <?php echo e($Economy->header); ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
                    <?php echo e($Economy->header); ?>

                  </a>
                </h5>

                <span class="cl8">
                  <a href="<?php echo e($Economy->cat); ?> = <?php echo e($Economy->type); ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
                <?php echo e($Economy->type); ?>

                  </a>

                  <span class="f1-s-3 m-rl-3">
                    -
                  </span>

                  <span class="f1-s-3">
                    <?php echo e($Economy->created_at->format('M d')); ?>

                  </span>
                </span>
              </div>
            </div>
          </div>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</li>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/layouts/index/business_nav.blade.php ENDPATH**/ ?>