<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">Read Message</span>
<title id="title">Read Message</title>
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-md-12">
        <div class="card card-body printableArea">
            <h3><b>Message</b> <span class="pull-right"></span></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">
                        <address>
                            <h3> &nbsp;<b class="text-danger"><?php echo e($message->sub); ?></b></h3>
                            <p class="text-muted m-l-5"><?php echo e($message->name); ?>

                                <br /><?php echo e($message->email); ?>

                                <?php if($message->users_id): ?>
                                <br /><a href="<?php echo e(url('p  '.$message->email)); ?>" class="text-success" target="_blank">User</a>
                                <?php else: ?>
                                <br />guest
                                <?php endif; ?>
                            </p>
                        </address>
                    </div>
                    <div class="pull-right text-right">
                        <address>
                            <h3>Text</h3>
                            <p class="text-muted m-l-30">
                                <?php echo e($message->text); ?>

                            </p>
                            <p class="m-t-30"><b>Date :</b> <i class="fa fa-calendar"></i> <?php echo e($message->created_at->format('dD M Y')); ?></p>
                        </address>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive m-t-40" style="clear: both;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>email</th>
                                    <th class="text-right">Name</th>
                                    <th class="text-right">Subtitles</th>
                                    <th class="text-right">Add By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"><?php echo e($message->id); ?></td>
                                    <td><?php echo e($message->email); ?></td>
                                    <td class="text-right"> <?php echo e($message->name); ?></td>
                                    <td class="text-right"><?php echo e($message->sub); ?></td>
                                    <?php if($message->users_id): ?>
                                    <td class="text-right"><a href="<?php echo e(url('p  '.$message->email)); ?>" class="text-success" target="_blank">User</a></td>
                                    <?php else: ?>
                                    <td class="text-right">guest</td>
                                    <?php endif; ?>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-right m-t-30 text-right">
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="text-right">
                        <form action="<?php echo e(url('admin/message/delete'.$message->id)); ?>" method="get">
                            <button type="submit" name="From_ReadMessage" class="btn btn-danger"> Delete Message </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/admin/Message_Read.blade.php ENDPATH**/ ?>