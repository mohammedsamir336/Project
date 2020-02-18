<li class="mega-menu-item">
  <a href="categ = Travel">Travel</a>

  <div class="sub-mega-menu">
    <div class="nav flex-column nav-pills" role="tablist">
      <a class="nav-link active" data-toggle="pill" href="#Travel-1" role="tab">All</a>
      <a class="nav-link" data-toggle="pill" href="#Travel-2" role="tab">Hotels</a>
    </div>

    <div class="tab-content">
      <div class="tab-pane show active" id="Travel-1" role="tabpanel">
        <div class="row">
          <?php $__currentLoopData = $Travel_Nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <div class="col-3">
            <!-- Item post -->
            <div>
              <a href="<?php echo e(url('read = '.$posts->header)); ?>" class="wrap-pic-w hov1 trans-03">
                <img  class="size-a-15" src="<?php echo e(asset('indexfolder/images/'.$posts->img)); ?>" alt="IMG">
              </a>

              <div class="p-t-10">
                <h5 class="p-b-5">
                  <a href="<?php echo e(url('read = '.$posts->header)); ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
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

  <div class="tab-pane" id="Travel-2" role="tabpanel">
    <div class="row">
      <?php $__currentLoopData = $Hotels_Nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Hotels): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <div class="col-3">
      <!-- Item post -->
       <div>
        <a href="<?php echo e(url('read = '.$Hotels->header)); ?>" class="wrap-pic-w hov1 trans-03">
          <img class="size-a-15" src="<?php echo e(asset('indexfolder/images/'.$Hotels->img)); ?>" alt="IMG">
        </a>

      <div class="p-t-10">
        <h5 class="p-b-5">
          <a href="read = <?php echo e($Hotels->header); ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
            <?php echo e($Hotels->header); ?>

          </a>
        </h5>

      <span class="cl8">
        <a href="<?php echo e($Hotels->cat); ?> = <?php echo e($Hotels->type); ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
      <?php echo e($Hotels->type); ?>

        </a>

      <span class="f1-s-3 m-rl-3">
        -
      </span>

      <span class="f1-s-3">
        <?php echo e($Hotels->created_at->format('M d')); ?>

      </span>
        </span>
      </div>
        </div>
      </div>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
  </div>
</li>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\layouts\index\travel_nav.blade.php ENDPATH**/ ?>