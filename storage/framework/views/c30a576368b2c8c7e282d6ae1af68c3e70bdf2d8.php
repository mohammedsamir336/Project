<!-- Card -->
<div class="card">
    <div class="card-body">
        <a href="<?php echo e(route('admin.MyPlans')); ?>">
            <h4 class="card-title">To Do List</h4>
        </a>
        <div class="todo-widget scrollable" style="height:450px;">
            <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($data->checked): ?>
                <li class="list-group-item todo-item" data-role="task" id="Checked<?php echo e($data->id); ?>">
                    <div class="custom-control custom-checkbox">
                        <span class="ff todo-desc" style="position:relative;right:17px;"><?php echo e($data->title); ?></span>
                        <!-- today-->
                        <?php if($data->start->toDateString() == today()->toDateString()): ?>
                        <span class="ff badge badge-pill badge-danger float-right">today</span>
                        <!-- tomorrow-->
                        <?php elseif($data->start->toDateString() == now()->tomorrow()->toDateString()): ?>
                        <span class="ff badge badge-pill badge-primary float-right">Tomorrow</span>
                        <!-- yesterday-->
                        <?php elseif($data->start->toDateString() == now()->yesterday()->toDateString()): ?>
                        <span class="ff badge badge-pill badge-info float-right">Yesterday</span>
                        <!-- date with ago-->
                        <?php elseif($data->start->toDateString() < now()->toDateString()): ?>
                            <span class="ff badge badge-pill badge-danger float-right"><?php echo e($data->start->diffForHumans()); ?></span>
                            <?php else: ?>
                            <!-- date without ago-->
                            <span class="ff badge badge-pill badge-warning float-right"><?php echo e($data->start->diffForHumans(null,true)); ?></span>
                            <?php endif; ?>


                    </div>
                    <div class="ff item-date"> Start In: <?php echo e($data->start->format('dD m, Y')); ?>.<br>End In: <?php echo e($data->end->format('dD m, Y')); ?>.</div>
                    <div>
                        <button type="submit" data-id="<?php echo e($data->id); ?>" class="btn btn-success btn-rounded btn-sm my-0" name="res">Restore</button>
                        <button type="submit" onclick="$('#Checked<?php echo e($data->id); ?>').toggle();" del-id="<?php echo e($data->id); ?>" class="btn btn-danger btn-rounded btn-sm my-0" name="del"> Delete </button>
                    </div>
                </li>
                <?php else: ?>
                <!-- when UnCheckedbox-->
                <li class="list-group-item todo-item" data-role="task" id="UnChecked<?php echo e($data->id); ?>">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck<?php echo e($data->id); ?>">
                        <label class="custom-control-label todo-label" data-id="<?php echo e($data->id); ?>" for="customCheck<?php echo e($data->id); ?>">

                            <span class="todo-desc"><?php echo e($data->title); ?></span>
                            <!-- today-->
                            <?php if($data->start->toDateString() == today()->toDateString()): ?>
                            <span class="badge badge-pill badge-danger float-right">today</span>
                            <!-- tomorrow-->
                            <?php elseif($data->start->toDateString() == now()->tomorrow()->toDateString()): ?>
                            <span class="badge badge-pill badge-primary float-right">Tomorrow</span>
                            <!-- yesterday-->
                            <?php elseif($data->start->toDateString() == now()->yesterday()->toDateString()): ?>
                            <span class="badge badge-pill badge-info float-right">Yesterday</span>
                            <!-- date with ago-->
                            <?php elseif($data->start->toDateString() < now()->toDateString()): ?>
                                <span class="badge badge-pill badge-danger float-right"><?php echo e($data->start->diffForHumans()); ?></span>
                                <?php else: ?>
                                <!-- date without ago-->
                                <span class="badge badge-pill badge-warning float-right"><?php echo e($data->start->diffForHumans(null,true)); ?></span>
                                <?php endif; ?>

                        </label>
                    </div>
                    <div class="item-date"> Start In: <?php echo e($data->start->format('dD m, Y')); ?>.<br>End In: <?php echo e($data->end->format('dD m, Y')); ?>.</div>

                </li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\admin\layout\todolist.blade.php ENDPATH**/ ?>