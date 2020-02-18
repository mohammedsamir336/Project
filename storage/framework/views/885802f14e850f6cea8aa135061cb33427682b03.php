<li class="mega-menu-item">
  <a href="categ = Entertainment">Entertainment</a>

  <div class="sub-mega-menu">
    <div class="nav flex-column nav-pills" role="tablist">
      <a class="nav-link active" data-toggle="pill" href="#enter-1" role="tab">All</a>
      <a class="nav-link" data-toggle="pill" href="#enter-2" role="tab">Game</a>
      <a class="nav-link" data-toggle="pill" href="#enter-3" role="tab">Celebrity</a>
    </div>

    <div class="tab-content">
      <div class="tab-pane show active" id="enter-1" role="tabpanel">
        <div class="row">
          <?php $__currentLoopData = $Entertainment_Nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <div class="col-3">
            <!-- Item post -->
            <div>
              <a href="read = <?php echo e($posts->header); ?>" class="wrap-pic-w hov1 trans-03">
                <img class="size-a-15" src="<?php echo e(asset('indexfolder/images/'.$posts->img)); ?>" alt="IMG">
              </a>

              <div class="p-t-10">
                <h5 class="p-b-5">
                  <a href="read = <?php echo e($posts->header); ?> " class="f1-s-5 cl3 hov-cl10 trans-03">
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

      <div class="tab-pane" id="enter-2" role="tabpanel">
        <div class="row">

          <?php $__currentLoopData = $Games_Nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


          <div class="col-3">
            <!-- Item post -->
            <div>
              <a href="read = <?php echo e($game->header); ?>" class="wrap-pic-w hov1 trans-03">
                <img class="size-a-15" src="<?php echo e(asset('indexfolder/images/'.$game->img)); ?>" alt="IMG">
              </a>

              <div class="p-t-10">
                <h5 class="p-b-5">
                  <a href="read = <?php echo e($game->header); ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
                   <?php echo e($game->header); ?>

                  </a>
                </h5>

                <span class="cl8">
                  <a href="<?php echo e($game->cat); ?> = <?php echo e($game->type); ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
                     <?php echo e($game->type); ?>

                  </a>

                  <span class="f1-s-3 m-rl-3">
                    -
                  </span>

                  <span class="f1-s-3">
                <?php echo e($game->created_at->format('M d')); ?>

                  </span>
                </span>
              </div>
            </div>
          </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>

      <div class="tab-pane" id="enter-3" role="tabpanel">
        <div class="row">
          <?php $__currentLoopData = $Celebrity_Nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Celebrity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <div class="col-3">
            <!-- Item post -->
            <div>
              <a href="read = <?php echo e($Celebrity->header); ?>" class="wrap-pic-w hov1 trans-03">
                <img class="size-a-15" src="<?php echo e(asset('indexfolder/images/'.$Celebrity->img)); ?>" alt="IMG">
              </a>

              <div class="p-t-10">
                <h5 class="p-b-5">
                  <a href="<?php echo e($Celebrity->header); ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
                    <?php echo e($Celebrity->header); ?>

                  </a>
                </h5>

                <span class="cl8">
                  <a href="<?php echo e($Celebrity->cat); ?> = <?php echo e($Celebrity->type); ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
                  <?php echo e($Celebrity->type); ?>

                  </a>

                  <span class="f1-s-3 m-rl-3">
                    -
                  </span>

                  <span class="f1-s-3">
                <?php echo e($Celebrity->created_at->format('M d')); ?>

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
<?php /**PATH C:\xampp\htdocs\Project\resources\views\layouts\index\entertainment_nav.blade.php ENDPATH**/ ?>