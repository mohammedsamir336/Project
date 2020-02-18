<?php if($paginator->hasPages()): ?>
<nav class="d-flex justify-content-center mt-5">
  <ul class="pagination pagination-circle pg-teal mb-0">
            
            <?php if($paginator->onFirstPage()): ?>
            <li class="page-item disabled">
              <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>" mdbWavesEffect>&laquo;</a>
            </li>
            <?php else: ?>
                <li class="page-item">
                  <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>" mdbWavesEffect>
                  <span  aria-hidden="true">&laquo;</span>
                  <span class="sr-only text-dark">Previous</span>
                </a>
                </li>
            <?php endif; ?>

            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php if(is_string($element)): ?>
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link"><?php echo e($element); ?></span></li>
                <?php endif; ?>

                
                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($page == $paginator->currentPage()): ?>
                        <li class="page-item active" aria-current="page">
                          <a class="page-link hov-btn1"><?php echo e($page); ?></a>
                        </li>
                        <?php else: ?>
                            <li class="page-item">
                              <a class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7" href="<?php echo e($url); ?>">
                                <?php echo e($page); ?>

                              </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if($paginator->hasMorePages()): ?>
            <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                <span class="page-link" aria-hidden="true">&raquo;</span>
            </li>

            <?php else: ?>
            <li class="page-item">
                <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\vendor\pagination\default.blade.php ENDPATH**/ ?>