<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">Trashed Posts</span>
<title id="title">ATrashed Posts </title>

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
            <form method="get" action="<?php echo e(url('admin/forceDelforceDel')); ?>">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><u>Trashed posts</u> (<?php echo e($count); ?>)</h5>
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
                                        <th>Author</th>
                                        <th>Header</th>
                                        <th>category</th>
                                        <th>View</th>
                                        <th>Video</th>
                                        <th>comments</th>
                                        <th>Add By</th>
                                        <th>deleted_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    <?php $__currentLoopData = $Trash; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>

                                        <th>
                                            <label class="customcheckbox" for="checkbox<?php echo e($data->id); ?>" onclick="if ($('#videocheckbox<?php echo e($data->id); ?>')
                                              .prop( 'checked', false )){
                                               $('#videocheckbox<?php echo e($data->id); ?>')
                                               .prop( 'checked', true )
                                               }else{$('#videocheckbox<?php echo e($data->id); ?>').prop( 'checked', false )};">
                                                <input type="checkbox" name="id[]" class="listCheckbox" value="<?php echo e($data->id); ?>" id="checkbox<?php echo e($data->id); ?>">
                                                <span class="checkmark"></span>
                                            </label>
                                            <?php if( $data->videos_id): ?>
                                            <!--  pass video id to restore video  and i checked this box if admin check post checkbox in onClick-->
                                            <label class="customcheckbox" for="videocheckbox<?php echo e($data->id); ?>" style="display:none;">
                                                <input type="checkbox" name="videos_id[]" class="listCheckbox" value="<?php echo e($data->videos_id); ?>" id="videocheckbox<?php echo e($data->id); ?>">
                                                <span class="checkmark"></span>
                                            </label>
                                            <?php endif; ?>
                                        </th>



                                        <td>
                                            <nobr><?php echo e($data->author); ?></nobr>
                                        </td>


                                        <td>
                                            <nobr><span class="text-lightgray"><?php echo e($data->header); ?></span></nobr>
                                        </td>

                                        <td><?php echo e($data->cat); ?></td>

                                        <td><?php echo e($data->view_count); ?></td>

                                        <?php if($data->videos_id): ?>
                                        <td class="text-success">Yes</td>
                                        <?php else: ?>
                                        <td class="text-danger">NO</td>
                                        <?php endif; ?>

                                        <!-- count comments -->
                                        <?php
                                        $count = \App\comments::where('posts_id',$data->id)->count();
                                        echo "<td>{$count}</td>"
                                        ?>

                                        <td>
                                            <?php if( file_exists('img/admin_img/'.$data->admins_id()->first()->img)): ?>
                                            <nobr><a href="<?php echo e(url('admin/profile  '.$data->admins_id()->first()->id)); ?>">
                                                    <img class="card-img-50 z-depth-1 rounded-circle" src="<?php echo e(asset('img/admin_img/'.$data->admins_id()->first()->img)); ?>" alt="admin" width="30" height="30">
                                                    <?php echo e($data->admins_id()->first()->name); ?></a></nobr>
                                            <?php else: ?>
                                            <nobr><a href="<?php echo e(url('admin/profile  '.$data->admins_id()->first()->id)); ?>">
                                                    <img class="card-img-50 z-depth-1 rounded-circle" src="<?php echo e($data->admins_id()->first()->img); ?>" alt="admin" width="30" height="30">
                                                    <?php echo e($data->admins_id()->first()->name); ?></a></nobr>
                                            <?php endif; ?>

                                        </td>

                                        <td>
                                            <nobr><?php echo e($data->deleted_at->longAbsoluteDiffForHumans()); ?></nobr>
                                        </td>

                                        <td>
                                            <nobr> <span class="table-remove"><a href="<?php echo e(url('admin/restore'.$data->id.'restore'.$data->videos_id)); ?>" class="btn btn-success btn-rounded btn-sm my-0">restore post</a></span>

                                                <span class="table-remove"><a href="<?php echo e(url('admin/forceDel'.$data->id.'forceDel'.$data->videos_id)); ?>" class="btn btn-danger btn-rounded btn-sm my-0" style="margin-left:10px;">Force Delete </a></span>
                                            </nobr>
                                        </td>
                                    </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>

                            </table>


                        </div>

                    </div>
                </div>
                <div>
                    <!-- send videos id -->

                    <button type="submit" class="btn btn-success btn-rounded btn-sm my-0" name="res">Restore check</button>
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
<?php /**PATH C:\xampp\htdocs\Project\resources\views/admin/posts/TrashPosts.blade.php ENDPATH**/ ?>