<!-- card -->
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Super Admins (<?php echo e(count($super_admins)-1); ?>)</h4>
    </div>
    <div class="comment-widgets scrollable" style="max-height: 130px;">
        <?php $__currentLoopData = $super_admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- for hidden super admin 1 -->
        <?php if($data->id != 1 ): ?>
        <!-- Comment Row -->
        <div class="d-flex flex-row comment-row m-t-0">
            <?php if( file_exists('img/admin_img/'.$data->img)): ?>
            <div class="p-2"><img src="<?php echo e(asset('img/admin_img/'.$data->img)); ?>" alt="admin" width="50" class="rounded-circle"></div>

            <?php else: ?>
            <div class="p-2"><img src="<?php echo e($data->img); ?>" alt="admin" width="50" class="rounded-circle"></div>

            <?php endif; ?>

            <div class="comment-text w-100">
                <a href="<?php echo e(url('admin/profile  '.$data->id)); ?>">
                    <h6 class="font-medium"><?php echo e($data->name); ?></h6>
                </a>
                <span class="m-b-15 d-block"><?php echo e($data->email); ?> </span>
                <div class="comment-footer">
                    <?php if( !$data->online_at): ?>
                    <h6 class=" online-status status-available font-weight-bold blue-text mb-4 text-primary">online</h6>
                    <?php else: ?>
                    <i class="fas fa-circle text-danger"> Offline</i>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/admin/layout/partner.blade.php ENDPATH**/ ?>