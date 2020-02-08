<li class="mega-menu-item">
  <a href="categ = Life">LifeStyle</a>

  <div class="sub-mega-menu">
    <div class="nav flex-column nav-pills" role="tablist">
      <a class="nav-link active" data-toggle="pill" href="#life-1" role="tab">healthy</a>
    </div>

    <div class="tab-content">
      <div class="tab-pane show active" id="life-1" role="tabpanel">
        <div class="row">
          <?php $__currentLoopData = $Life_Nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <div class="col-3">
            <!-- Item post -->
            <div>
              <a href="read = <?php echo e($posts->header); ?>" class="wrap-pic-w hov1 trans-03">
                <img  class="size-a-15" src="<?php echo e(asset('indexfolder/images/'.$posts->img)); ?>" alt="IMG">
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

</li>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/layouts/index/lifestyle_nav.blade.php ENDPATH**/ ?>