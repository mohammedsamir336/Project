<?php echo $__env->make('layouts.index.home_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- give postsComposer variable user= Auth::user()-->
<title><?php echo e($user->email); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/addons/datatables.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/addons/datatables-select.min.css')); ?>">

<div class="px-4 m-t-61">

  <h5 class="my-4 dark-grey-text font-weight-bold m-l-20 "><u> <a class="hov-cl10" href="#">All comments: <?php echo e(count($user_comments)); ?></a></u></h5>
            <div class="table-responsive">
              <!-- Table -->
              <table class="table table-hover mb-0">

                <!-- Table head -->
                <thead>
                  <tr>
                    <th>

            <strong class="form-check-label th-lg " for="checkbox"><a>checkbox<i class="fas fa-sort ml-1"></i></a></strong>
                    </th>
                    <th class="th-lg"><a>Name<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a>Email<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a >Comments<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a >posts header<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a >Replies On Comment<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a >Action<i class="fas fa-sort ml-1"></i></a></th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody>
                  <form  method="get" action="<?php echo e(url('del_comment')); ?>" >

              <?php $__currentLoopData = $user_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <th scope="row">
                      <input class="form-check-input" type="checkbox" name="id[]" value="<?php echo e($comm->id); ?>" id="checkbox<?php echo e($comm->id); ?>">
                      <label class="form-check-label" for="checkbox<?php echo e($comm->id); ?>"></label>
                    </th>
                      <!-- if isset image in file -->
                <?php if( file_exists('img/users_img/'.$user->img)): ?>
                    <td><img class="card-img-50 z-depth-1 rounded-circle"  src="<?php echo e(asset('img/users_img/'.$user->img)); ?>" alt="user" width="30" height="30">
                      <?php echo e($comm->name_comments); ?></td>
                    <?php else: ?>
                  <td><img class="card-img-50 z-depth-1 rounded-circle" src="<?php echo e($user->img); ?>" alt="user" width="30" height="30">
                      <?php echo e($comm->name_comments); ?></td>
                  <?php endif; ?>
                    <td><?php echo e($comm->email_comments); ?></td>
                    <td><?php echo e($comm->text_comments); ?></td>
          <td><a href="read = <?php echo e($comm->posts_id()->first()->header); ?>"><?php echo e($comm->posts_id()->first()->header); ?></a></td>

            <td><?php echo e($user_reply_count); ?></td>

                  <td>
               <span class="table-remove"><a href="<?php echo e(url('del_comment'.$comm->id)); ?> "
                   class="btn btn-danger btn-rounded btn-sm my-0">Remove</a></span>
               </td>
                  </tr>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
                <!-- Table body -->
              </table>
              <!-- Table -->


            </div>

            <hr class="my-0">

            <!-- Bottom Table UI -->
            <div class="d-flex justify-content-between">

              <div class="m-t-20">
            <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0" name="del" >Delete check</button>
              </div>
              </form>
              <!-- Pagination -->

              <nav class="d-flex justify-content-center mt-5">
                  <ul class="pagination pagination-circle pg-teal mb-0">
              <?php echo e($user_comments->links()); ?>

              </ul>
                </nav>
              <!-- /Pagination -->

            </div>
            <!-- Bottom Table UI -->

          </div>
          <div class="m-t-40">

        
        <script type="text/javascript" src="<?php echo e(asset('js/addons/datatables.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('addons/datatables-select.min.js')); ?>"></script>
        <?php echo $__env->make('layouts.index.home_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/auth/user_comments.blade.php ENDPATH**/ ?>