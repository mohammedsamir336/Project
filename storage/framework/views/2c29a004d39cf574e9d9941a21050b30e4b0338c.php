<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">All Message</span>
<title id="title">All Message</title>

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

            <?php if(session('success')): ?>
            <div class="alert alert-success" role="alert">
                <h3>
                    <!-- <?php echo e(trans('message.success')); ?> --><?php echo e(session('success')); ?> </h3>

            </div>
            <?php endif; ?>
            <form method="get" action="<?php echo e(url('admin/message/delete')); ?>">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><u>All Message</u> (<?php echo e($count); ?>)</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <nobr><label for="checkAll">
                                                    <input type="checkbox" class="listCheckbox" value="" id="checkAll">
                                                    <span>check all</span>
                                                </label></nobr>
                                        </th>
                                        <th>id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subtitles</th>
                                        <th>
                                            <nobr>Add By<nobr>
                                        </th>
                                        <th>Status</th>
                                        <th>Time</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th>
                                            <label class="customcheckbox" for="checkbox<?php echo e($data->id); ?>">
                                                <input type="checkbox" name="id[]" class="listCheckbox" value="<?php echo e($data->id); ?>" id="checkbox<?php echo e($data->id); ?>">
                                                <span class="checkmark"></span>
                                            </label>
                                        </th>


                                        <td><?php echo e($data->id); ?></td>
                                        <td><?php echo e($data->name); ?></td>


                                        <td>
                                            <!-- if users -->
                                            <?php if( $data->users_id ): ?>
                                            <?php if( file_exists('img/users_img/'.$data->users_id()->first()->img)): ?>
                                            <nobr><a href="<?php echo e(url('p  '.$data->email)); ?>" target="_blank">
                                                    <img class="card-img-50 z-depth-1 rounded-circle" src="<?php echo e(asset('img/users_img/'.$data->users_id()->first()->img)); ?>" alt="img" width="30" height="30">
                                                    <?php echo e($data->email); ?></a></nobr>
                                            <?php else: ?>
                                            <!-- if img users from socialite -->
                                            <nobr><a href="<?php echo e(url('p  '.$data->email)); ?>" target="_blank">
                                                    <img class="card-img-50 z-depth-1 rounded-circle" src="<?php echo e($data->users_id()->first()->img); ?>" alt="img" width="30" height="30">
                                                    <?php echo e($data->email); ?></a></nobr>
                                            <?php endif; ?>
                                            <!-- if Not users -->
                                            <?php else: ?>
                                            <nobr><a>
                                                    <img class="card-img-50 z-depth-1 rounded-circle" src="<?php echo e(asset('img/m.png')); ?>" alt="img" width="30" height="30">
                                                    <?php echo e($data->email); ?></a></nobr>

                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <nobr><a href="<?php echo e(url('admin/message/read '.$data->id)); ?>" target="_blank"><?php echo e($data->sub); ?></a></nobr>
                                        </td>

                                        <!-- if users -->
                                        <?php if( $data->users_id ): ?>
                                        <td class="text-success">User</td>
                                        <?php else: ?>
                                        <td>guest</td>
                                        <?php endif; ?>

                                        <!-- status -->
                                        <?php if( $data->status ): ?>
                                        <td class="text-success">
                                            <nobr>It is read</nobr>
                                        </td>
                                        <?php else: ?>
                                        <td class="text-danger">
                                            <nobr><a href="<?php echo e(url('admin/message/AsRead'.$data->id)); ?>" class="btn btn-danger btn-rounded btn-sm my-0">Mark as read</a></nobr>
                                        </td>
                                        <?php endif; ?>


                                        <td>
                                            <nobr><?php echo e($data->created_at->longAbsoluteDiffForHumans()); ?></nobr>
                                        </td>

                                        <td>
                                            <nobr><span class="table-remove"><a href="<?php echo e(url('admin/message/delete'.$data->id)); ?>" class="btn btn-danger btn-rounded btn-sm my-0" style="margin-left:10px;">Force Delete </a></span>
                                            </nobr>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0" name="AllDel">Delete all</button>
                <button type="submit" class="btn btn-danger btn-rounded btn-sm my-0" name="del">Delete check</button>
        </div>
        </form>

    </div>
</div>
<br>
<br>
<?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
    $('#checkAll').click(function() {
        $('input:checkbox').prop('checked', this.checked);
    });

</script>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/admin/Contacts_Message.blade.php ENDPATH**/ ?>