<div class="card">
    <div class="card-body">
        <h4 class="card-title">Latest Posts</h4>
    </div>
    <div class="comment-widgets scrollable">
        <!-- Comment Row -->
        <?php if($latest_posts): ?>
        <?php $__currentLoopData = $latest_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex flex-row comment-row m-t-0">
            <div class="p-2"><img src="<?php echo e(asset('indexfolder/images/'.$data->img)); ?>" alt="posts" width="50" class="rounded-circle"></div>
            <div class="comment-text w-100">
                <h6 class="font-medium"><?php echo e($data->header); ?></h6>
                <span class="m-b-15 d-block"><?php echo $data->p1; ?> </span>
                <div class="comment-footer">
                    <span class="text-muted float-right"><?php echo e($data->created_at->format('M d, Y')); ?></span>
                    <a href="<?php echo e(url('admin/edit  '.$data->header)); ?>" class="btn btn-cyan btn-sm">Edit</a>
                    <a href="<?php echo e(url('read = '.$data->header)); ?>" class="btn btn-success btn-sm" target="_blank">Show</a>
                    <a href="<?php echo e(url('admin/del'.$data->id.'del'.$data->videos_id)); ?>" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/admin/layout/latest_posts.blade.php ENDPATH**/ ?>