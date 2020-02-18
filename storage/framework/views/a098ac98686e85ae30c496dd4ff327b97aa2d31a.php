<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- if new message toggle title  -->
<title id="title" ><?php echo e(Auth::guard('admin')->user()->name); ?>-Dashboard</title>
<span id="page_name" style="display:none"><?php echo e(Auth::guard('admin')->user()->name); ?>-Dashboard</span>

    <div class="container-fluid">

      <!-- ============================================================== -->
      <!-- Sales Cards  -->
      <!-- ============================================================== -->
      <div class="row">
          <!-- Column -->
          <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                  <div class="box bg-cyan text-center">
                      <a href="<?php echo e(route('admin.dashboard')); ?>" target="_blank"><h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                      <h6 class="text-white">Dashboard</h6></a>
                  </div>
              </div>
          </div>
          <!-- Column -->
          <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                  <div class="box bg-success text-center">
                      <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                      <h6 class="text-white">Charts</h6>
                  </div>
              </div>
          </div>
           <!-- Column -->
          <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                  <div class="box bg-warning text-center">
                  <a href="<?php echo e(route('admin.posts')); ?>" target="_blank"><h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                      <h6 class="text-white">posts</h6></a>
                  </div>
              </div>
          </div>
          <!-- Column -->
          <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                  <div class="box bg-danger text-center">
                      <a href="<?php echo e(route('admin.actives')); ?>" target="_blank"><h1 class="font-light text-white"><i class="fa fa-user-circle" aria-hidden="true"></i></h1>
                      <h6 class="text-white">Users</h6></a>
                  </div>
              </div>
          </div>
          <!-- Column -->
          <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                  <div class="box bg-info text-center">
                      <a href="<?php echo e(route('admin.adminsactives')); ?>" target="_blank"><h1 class="font-light text-white"><i class="mdi mdi-account-key"></i></h1>
                      <h6 class="text-white">Admins</h6></a>
                  </div>
              </div>
          </div>
          <!-- Column -->
          <!-- Column -->
          <div class="col-md-6 col-lg-4 col-xlg-3">
              <div class="card card-hover">
                  <div class="box bg-danger text-center">
                    <a href="<?php echo e(route('admin.AddAdmin')); ?>" target="_blank">  <h1 class="font-light text-white"><i class="mdi mdi-alert"></i></h1>
                      <h6 class="text-white">Add Admins</h6></a>
                  </div>
              </div>
          </div>
          <!-- Column -->
          <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                  <div class="box bg-info text-center">
                      <h1 class="font-light text-white"><i class="mdi mdi-relative-scale"></i></h1>
                    <h6 class="text-white">Buttons</h6>
                  </div>
              </div>
          </div>
           <!-- Column -->
          <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                  <div class="box bg-cyan text-center">
                      <h1 class="font-light text-white"><i class="mdi mdi-pencil"></i></h1>
                      <h6 class="text-white">Elements</h6>
                  </div>
              </div>
          </div>
          <!-- Column -->
          <div class="col-md-6 col-lg-2 col-xlg-3">
              <div class="card card-hover">
                  <div class="box bg-success text-center">
                    <a target="_blank" href="<?php echo e(route('admin.fullcalendar_index')); ?>"> <h1 class="font-light text-white"><i class="mdi mdi-calendar-check"></i></h1>
                      <h6 class="text-white">Calnedar</h6></a>
                  </div>
              </div>
          </div>

          <!-- Column -->
      </div>
      <!-- ============================================================== -->


      <!-- Sales chart -->
      <!-- ============================================================== -->
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">

                      <div class="row">
                          <!-- column -->
                          <div class="col-lg-9">
                            <h1><?php echo e($chart1->options['chart_title']); ?></h1>
                                  <?php echo $chart1->renderHtml(); ?>

                          </div>
                          <div class="col-lg-3 m-t-5" >
                              <div class="row">
                                  <div class="col-6">
                                      <div class="bg-dark p-10 text-white text-center">
                                         <i class="fa fa-user m-b-5 font-16"></i>
                                         <h5 class="m-b-0 m-t-5"><?php echo e($total_users); ?></h5>
                                         <small class="font-light">Total Users</small>
                                      </div>
                                  </div>

                                   <div class="col-6">
                                      <div class="bg-dark p-10 text-white text-center">
                                        <i class="fa fa-user m-b-5 font-16"></i>
                                       <h5 class="m-b-0 m-t-5"><?php echo e($total_Admins); ?></h5>
                                       <small class="font-light">Total Admins</small>
                                      </div>
                                  </div>
                                  <div class="col-6 m-t-15">
                                      <div class="bg-dark p-10 text-white text-center">
                                        <i class="fa fa-globe m-b-5 font-16"></i>
                                         <h5 class="m-b-0 m-t-5"><?php echo e($online_users); ?></h5>
                                        <small class="font-light">Online Users</small>
                                      </div>
                                  </div>
                                  <div class="col-6">
                                     <div class="bg-dark p-10 text-white text-center">
                                       <i class="fa fa-globe m-b-5 font-16"></i>
                                        <h5 class="m-b-0 m-t-5"><?php echo e($online_Admins); ?></h5>
                                        <small class="font-light">Online Admins</small>
                                     </div>
                                 </div>
                                 <div class="col-6 m-t-15">
                                     <div class="bg-dark p-10 text-white text-center">
                                       <i class="fa fa-user m-b-5 font-16"></i>
                                        <h5 class="m-b-0 m-t-5"><?php echo e($New_users); ?></h5>
                                        <small class="font-light">New Users Today</small>
                                     </div>
                                 </div>
                                  <div class="col-6 m-t-15">
                                      <div class="bg-dark p-10 text-white text-center">
                                        <i class="fa fa-user m-b-5 font-16"></i>
                                         <h5 class="m-b-0 m-t-5"><?php echo e($New_admins); ?></h5>
                                         <small class="font-light">New Admins Today</small>
                                      </div>
                                  </div>

                                   <div class="col-6 m-t-15">
                                      <div class="bg-dark p-10 text-white text-center">
                                        <i class="mdi mdi-note-outline"></i>
                                         <h5 class="m-b-0 m-t-5"><?php echo e($total_posts); ?></h5>
                                         <small class="font-light">Total Posts</small>
                                      </div>
                                  </div>
                                  <div class="col-6 m-t-15">
                                      <div class="bg-dark p-10 text-white text-center">
                                        <i class="fa fa-play-circle" aria-hidden="true"></i>
                                        <h5 class="m-b-0 m-t-5"><?php echo e($total_videos); ?></h5>
                                        <small class="font-light">Total Videos</small>
                                      </div>
                                  </div>

                                  <div class="col-6 m-t-15">
                                      <div class="bg-dark p-10 text-white text-center">
                                        <i class="fa fa-table m-b-5 font-16"></i>
                                        <h5 class="m-b-0 m-t-5"><?php echo e($Visitors->visitors ??0); ?></h5>
                                        <small class="font-light">Vistors of Day</small>
                                      </div>
                                  </div>
                                  <div class="col-6 m-t-15">
                                      <div class="bg-dark p-10 text-white text-center">
                                      <i class="fa fa-sticky-note m-b-5 font-16"></i>
                                         <h5 class="m-b-0 m-t-5"><?php echo e($Projects_count); ?></h5>
                                         <small class="font-light">Projects Today</small>
                                      </div>
                                  </div>

                              </div>
                          </div>
                          <!-- column -->
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- ============================================================== -->
      <!-- Sales chart -->
      <!-- ============================================================== -->
      <div class="row">
          <!-- column -->
          <div class="col-lg-6">
      <?php echo $__env->make('admin.layout.latest_posts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.layout.todolist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Progress_Box-->
            <?php echo $__env->make('admin.layout.News', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
              <div class="col-lg-6">
                  <?php echo $__env->make('admin.layout.chat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('admin.layout.partner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      <?php echo $__env->make('admin.layout.toggle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- tabs-->


<?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
<?php echo $chart1->renderChartJsLibrary(); ?>

<?php echo $chart1->renderJs(); ?>


</script>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\admin\home.blade.php ENDPATH**/ ?>