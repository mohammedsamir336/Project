<!-- card new -->
<section id="News" class="signup-section">
<div class="card" >
    <div class="card-body">
        <h4 class="card-title m-b-0">News</h4>
    </div>
    <ul class="list-style-none">
      <?php if($news): ?>
      <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="d-flex no-block card-body">

           <div>
                <a href="#" class="m-b-0 font-medium p-0 text-dark collapsed" data-toggle="collapse" data-target="#collapseTwo<?php echo e($data->id); ?>" aria-expanded="false" aria-controls="collapseTwo<?php echo e($data->id); ?>">
                  <i class="fa fa-check-circle w-30px m-t-5"></i>
                  <span><?php echo e($data->title); ?></span>
                </a>
                <span class="text-muted ml-4" style="position:relative;left:10px" ><?php echo e(Str::words($data->text, 5, '...')); ?></span> <!--Str::limit($data->text, 30, '...')-->

                <div id="collapseTwo<?php echo e($data->id); ?>" class="collapse" aria-labelledby="headingTwo<?php echo e($data->id); ?>" >
                  <div class="card-body">
                    <span><a href="#" class="text-dark" > By: <b><?php echo e($data->news_admins_id()->first()->name); ?></a></b></span>
                    <span class="mb-3"><?php echo e($data->text); ?></span>
                  </div>
                  <!--only superadmins and the admins how add the news can be delete it-->
                  <?php if(Auth::guard('admin')->user()->id == $data->admins_id || Auth::guard('admin')->user()->superadmin != 0): ?>
                  <button  class="btn btn-danger btn-rounded btn-sm my-0" ><a href="<?php echo e(url('/admin/DelNews'.$data->id)); ?>" class="btn btn-danger btn-rounded btn-sm my-0 text-dark" >Delete</a></button>
                  <?php endif; ?>
                </div>
            </div>
            <div class="ml-auto">
                <div class="tetx-right">
                    <h5 class="text-muted "><?php echo e($data->created_at->format('d')); ?></h5>
                    <span class="text-muted font-16" style="position:relative;bottom:10px;"><?php echo e($data->created_at->format('M')); ?></span>
                </div>
            </div>
            <div class="border-top">

            </div>
        </li>
        <div class="border-top">
        </div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <li class="d-flex no-block card-body">
      <span>No news found</span>
      </li>
      <?php endif; ?>
    </ul>
</div>
</section >
<?php /**PATH C:\xampp\htdocs\mm336\mm\resources\views/admin/layout/News.blade.php ENDPATH**/ ?>