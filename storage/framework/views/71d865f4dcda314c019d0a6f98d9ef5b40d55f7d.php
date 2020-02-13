</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center">
    All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
  <span class="symbol-btn-back-to-top">
  <img src="<?php echo e(asset('img/top.png')); ?>" alt="sdfd">
  </span>
</div>

<!-- news modal-->


<div class="modal fade bg-dark" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-gray">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add News</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form class="" action="<?php echo e(route('admin.AddNews')); ?>" method="post">
  <?php echo csrf_field(); ?>
      <div class="modal-body mx-3">

        <div class="md-form mb-5">
          <i class="fas fa-tag prefix grey-text"></i>
          <input type="text" id="form32" name="title" class="form-control validate" required>
          <label data-error="wrong" data-success="right" for="form32">Title</label>
        </div>

        <div class="md-form mt-5">
          <i class="fas fa-pencil prefix grey-text"></i>
          <textarea type="text" id="form8" name="text" class="md-textarea form-control" rows="4"></textarea>
          <label data-error="wrong" data-success="right" for="form8">Text</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-unique btn-primary">Create <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
      </form>
    </div>
  </div>
</div>



<script src="<?php echo e(asset('adminfolder/assets/libs/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo e(asset('adminfolder/assets/libs/popper.js/dist/umd/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminfolder/assets/libs/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo e(asset('adminfolder/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminfolder/assets/extra-libs/sparkline/sparkline.js')); ?>"></script>
<!--Wave Effects -->
<script src="<?php echo e(asset('adminfolder/dist/js/waves.js')); ?>"></script>
<!--Menu sidebar -->
<script src="<?php echo e(asset('adminfolder/dist/js/sidebarmenu.js')); ?>"></script>
<!--Custom JavaScript -->
<script src="<?php echo e(asset('adminfolder/dist/js/custom.min.js')); ?>"></script>
<!-- this page js -->
<script src="<?php echo e(asset('adminfolder/assets/extra-libs/multicheck/datatable-checkbox-init.js')); ?>"></script>
<script src="<?php echo e(asset('adminfolder/assets/extra-libs/multicheck/jquery.multicheck.js')); ?>"></script>
<script src="<?php echo e(asset('adminfolder/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<!--This page JavaScript -->
<!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<script src="<?php echo e(asset('adminfolder/assets/libs/flot/excanvas.js')); ?>"></script>
<script src="<?php echo e(asset('adminfolder/assets/libs/flot/jquery.flot.js')); ?>"></script>
<script src="<?php echo e(asset('adminfolder/assets/libs/flot/jquery.flot.pie.js')); ?>"></script>
<script src="<?php echo e(asset('adminfolder/assets/libs/flot/jquery.flot.time.js')); ?>"></script>
<script src="<?php echo e(asset('adminfolder/assets/libs/flot/jquery.flot.stack.js')); ?>"></script>
<script src="<?php echo e(asset('adminfolder/assets/libs/flot/jquery.flot.crosshair.js')); ?>"></script>
<script src="<?php echo e(asset('adminfolder/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')); ?>"></script>
<script src="<?php echo e(asset('adminfolder/dist/js/pages/chart/chart-page-init.js')); ?>"></script>
<!-- for textarea  -->
<script src="https://cdn.tiny.cloud/1/eiexryt2aqizncsdcvb6d9sh66yy0yickrrv8ym0umvpee32/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>


    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();

    /*==================================================================
    [ Back to top ]*/
    try {
        var windowH = $(window).height()/2;

        $(window).on('scroll',function(){
            if ($(this).scrollTop() > windowH) {
                $("#myBtn").addClass('show-btn-back-to-top');
            } else {
                $("#myBtn").removeClass('show-btn-back-to-top');
            }
        });

        $('#myBtn').on("click", function(){
            $('html, body').animate({scrollTop: 0}, 300);
        });
    } catch(er) {console.log(er);}


/*To Do List / MyPlans*/
    /*task events */
    $(document).on('click', 'label[data-id]', function () {

      var id = $(this).attr('data-id');
        load_data(id);

        function load_data(id="")
        {
          $.ajax({
           url:"<?php echo e(route('admin.ToDoList_check')); ?>",
           method:"GET",
           data:{id:id},
          success:function(data)
          {
        window.location.reload();
          }
          })

        }

    });

    /*restore button */
    $(document).on('click', 'button[data-id]', function () {

      var id = $(this).attr('data-id');
        load_data(id);

        function load_data(id="")
        {
          $.ajax({
           url:"<?php echo e(route('admin.ToDoList_restore')); ?>",
           method:"GET",
           data:{id:id},
          success:function(data)
          {
            /*reload page*/
          //window.location = window.location.href.split("?")[0];
          window.location.reload();
          }
          })

        }

    });

    /*delete button */
    $(document).on('click', 'button[del-id]', function () {

      var id = $(this).attr('del-id');

        load_data(id);

        function load_data(id="")
        {
          $.ajax({
           url:"<?php echo e(route('admin.fullcalendar_destroy')); ?>",
           method:"GET",
           data:{id:id},
          success:function(data)
          {

        //  window.location.reload();
          }
          })

        }

    });

      /*toggle page title if admin have new message*/
    $(function() {
      var count = <?php echo e($notfiy); ?>;//  meesages count
      if (count > 0) {

        var cont = 0;
        setInterval(function () {
            if (cont % 2) {
                var title =  $('#message_notif').html();//in header blade
            } else {
                var title = $('#page_name').html();
            }
            cont++;
          document.title = title ;//change title name
        },1000);
      }
    });


</script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/admin/layout/footer.blade.php ENDPATH**/ ?>