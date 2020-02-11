<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">Trash Videos</span>
<title id="title">Trash Videos</title>

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

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><u>Trash Videos</u> (<?php echo e($count); ?>)</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Video</th>
                                    <th>Type</th>
                                    <th>
                                        <nobr>View</nobr>
                                    </th>
                                    <th>
                                        <nobr>In Post</nobr>
                                    </th>
                                    <th>Add By</th>
                                    <th>deleted_at</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $Trash; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($data->id); ?></td>


                                    <td>
                                        <nobr><?php echo e($data->author); ?></nobr>
                                    </td>

                                    <td>
                                        <nobr><?php echo e($data->title); ?></nobr>
                                    </td>

                                    <td><?php echo $data->video; ?></td>

                                    <td><?php echo e($data->type); ?></td>

                                    <td><?php echo e($data->video_view_count); ?></td>

                                    <!-- know if video in post -->
                                    <td><?php
                                        $video_post = App\posts::where('del_videos_id',$data->id)->first();
                                        if ($video_post )
                                        {
                                        echo ' <a href="../../read = '.$video_post->header.'" class="dis-block how1-child1 trans-03">'.$video_post->header.'</a>';
                                        }else{
                                        echo "No";
                                        }
                                        ?>
                                    </td>


                                    <td>
                                        <?php if( file_exists('img/admin_img/'.$data->videos_admins_id()->first()->img)): ?>
                                        <nobr><a href="<?php echo e(url('admin/profile  '.$data->videos_admins_id()->first()->id)); ?>">
                                                <img class="card-img-50 z-depth-1 rounded-circle" src="<?php echo e(asset('img/admin_img/'.$data->videos_admins_id()->first()->img)); ?>" alt="admin" width="30" height="30">
                                                <?php echo e($data->videos_admins_id()->first()->name); ?></a></nobr>
                                        <?php else: ?>
                                        <nobr><a href="<?php echo e(url('admin/profile  '.$data->videos_admins_id()->first()->id)); ?>">
                                                <img class="card-img-50 z-depth-1 rounded-circle" src="<?php echo e($data->videos_admins_id()->first()->img); ?>" alt="admin" width="30" height="30">
                                                <?php echo e($data->videos_admins_id()->first()->name); ?></a></nobr>
                                        <?php endif; ?>

                                    </td>

                                    <td>
                                        <nobr><?php echo e($data->deleted_at->diffForHumans()); ?></nobr>
                                    </td>

                                    <td>
                                        <nobr> <span class="table-remove"><a href="<?php echo e(url('admin/restore/Video  '.$data->id)); ?>" class="btn btn-success btn-rounded btn-sm my-0">Restore video</a></span>

                                            <span class="table-remove"><a href="<?php echo e(url('admin/ForceDel'.$data->id)); ?>" class="btn btn-danger btn-rounded btn-sm my-0" style="margin-left:10px;">
                                                    Force Delete</a></span>
                                        </nobr>
                                    </td>
                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>


        </div>
    </div>
    <br>
    <br>
    <?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/admin/videos/TrashVideos.blade.php ENDPATH**/ ?>