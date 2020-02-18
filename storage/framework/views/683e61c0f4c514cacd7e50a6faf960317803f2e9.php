<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">Blocked users </span>
<title id="title">Blocked users </title>

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('adminfolder/assets/extra-libs/multicheck/multicheck.css')); ?>">
    <link href="<?php echo e(asset('adminfolder/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')); ?>" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><u>Users Blocked</u> (<?php echo e($count); ?>)</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th><nobr>Email verified</nobr></th>
                                <th>Phone</th>
                                <th><nobr>Phone verified</nobr></th>
                                <th>Profile</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($data->blocked_date): ?>
                              <tr>
                              <td><?php echo e($data->id); ?></td>

                                <?php if( file_exists('img/users_img/'.$data->img)): ?>
                                    <td><nobr><img class="card-img-50 z-depth-1 rounded-circle"  src="<?php echo e(asset('img/users_img/'.$data->img)); ?>" alt="user" width="30" height="30">
                                      <?php echo e($data->name); ?></nobr></td>
                                    <?php else: ?>
                                  <td><nobr><img class="card-img-50 z-depth-1 rounded-circle" src="<?php echo e(asset('img/m.png')); ?>" alt="user" width="30" height="30">
                                      <?php echo e($data->name); ?></nobr></td>
                                  <?php endif; ?>

                                  <td><?php echo e($data->email); ?></td>

                            <?php if($data->email_verified_at): ?>
                                <td>Yes</td>
                            <?php else: ?>
                                <td>No</td>
                            <?php endif; ?>

                        <td><?php echo e($data->phone); ?></td>

                          <?php if($data->phone_verified_at): ?>
                              <td>Yes</td>
                            <?php else: ?>
                              <td>No</td>
                            <?php endif; ?>

                  <td> <span class="table-remove"><a href="<?php echo e(url('p  '.$data->email)); ?>"
                       class="btn btn-warning btn-rounded btn-sm my-0" target="_blank">profile</a></span></td>

                <!--Time-->
                <td><?php echo e(now()->diffForHumans($data->blocked_date)); ?> Unblocked</td>

              <!--actives users-->
                         <td>
                           <form class="" action="<?php echo e(url('/admin/active')); ?><?php echo e($data->id); ?>" method="post">
                              <?php echo csrf_field(); ?>
                               <div >
                                 <button class="btn btn-success btn-rounded btn-sm my-0" type="submit" id="MaterialButton-addon<?php echo e($data->id); ?>">active</button>
                                    </div>
                              </form>
                          </td>
                           </tr>
                     <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>

                    </div>

                </div>
            </div>


        </div>
    </div>

  <?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\admin\users\Blocked.blade.php ENDPATH**/ ?>