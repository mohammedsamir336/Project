<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">Actives admins </span>
<title id="title">Actives admins</title>
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
                    <h5 class="card-title"><u>Admins Actives With Out super admins</u> (<?php echo e($count); ?>)</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>
                                        <nobr>Email verified</nobr>
                                    </th>
                                    <th>Phone</th>
                                    <th>Profile</th>
                                    <th>AddBy</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( !$data->blocked_date): ?>
                                <?php if( !$data->superadmin ): ?>
                                <tr>
                                    <td><?php echo e($data->id); ?></td>


                                    <td>
                                        <?php if( file_exists('img/admin_img/'.$data->img)): ?>
                                        <nobr><img class="card-img-50 z-depth-1 rounded-circle" src="<?php echo e(asset('img/admin_img/'.$data->img)); ?>" alt="admin" width="30" height="30">
                                            <?php echo e($data->name); ?></nobr>
                                        <?php else: ?>
                                        <nobr><img class="card-img-50 z-depth-1 rounded-circle" src="<?php echo e($data->img); ?>" alt="admin" width="30" height="30">
                                            <?php echo e($data->name); ?></nobr>
                                        <?php endif; ?>
                                    </td>

                                    <td><?php echo e($data->email); ?></td>

                                    <?php if($data->email_verified_at): ?>
                                    <td>Yes</td>
                                    <?php else: ?>
                                    <td>No</td>
                                    <?php endif; ?>

                                    <td><?php echo e($data->phone); ?></td>



                                    <td> <span class="table-remove"><a href="<?php echo e(url('admin/profile  '.$data->id)); ?>" class="btn btn-warning btn-rounded btn-sm my-0" target="_blank">profile</a></span>
                                    </td>

                                    <!--AddBY-->
                                    <td>
                                        <!-- to AddBY name-->
                                        <?php if($add_by = App\Admin::where('id',$data->add_by)->first()): ?>
                                        <?php if( file_exists('img/admin_img/'.$add_by->img)): ?>
                                        <nobr><a href="<?php echo e(url('admin/profile  '.$add_by->id)); ?>"><img class="card-img-50 z-depth-1 rounded-circle" src="<?php echo e(asset('img/admin_img/'.$add_by->img)); ?>" alt="admin" width="30" height="30">
                                                <?php echo e($add_by->name); ?></a></nobr>
                                        <?php else: ?>
                                        <nobr><a href="<?php echo e(url('admin/profile  '.$add_by->id)); ?>"><img class="card-img-50 z-depth-1 rounded-circle" src="<?php echo e($add_by->img); ?>" alt="admin" width="30" height="30">
                                                <?php echo e($add_by->name); ?></a></nobr>
                                        <?php endif; ?>

                                        <?php endif; ?>
                                    </td>
                                    <!--check if super admins-->
                                    <?php if( Auth::guard('admin')->user()->superadmin): ?>
                                    <!--block admins-->
                                    <td>
                                        <form class="" action="<?php echo e(url('/admin/adminsblock')); ?><?php echo e($data->id); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="md-form input-group mb-6">
                                                <input type="text" id="form81" class="form-control <?php $__errorArgs = ['block'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="block" value="<?php echo e(old('block')); ?>" placeholder="<?php echo e(__('Block admin')); ?>" onfocus="(this.type='date')"
                                                  onblur="if(this.value==''){this.type='text'}" aria-describedby="MaterialButton-addon<?php echo e($data->id); ?>" aria-label="Recipient's username" required>

                                                <div class="input-group-append">
                                                    <button class="btn btn-danger btn-rounded btn-sm my-0" type="submit" id="MaterialButton-addon<?php echo e($data->id); ?>">Block</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <?php else: ?>
                                    <!-- if  not super admins-->
                                    <td><strong class="text-danger">Not allowed to block admins!</strong></td>
                                    <?php endif; ?>
                                    <!--end if super admins-->
                                </tr>
                                <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\Project\resources\views\admin\admins_table\actives.blade.php ENDPATH**/ ?>