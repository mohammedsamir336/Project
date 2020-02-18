<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">Create Videos Post</span>
<title id="title">Create Videos Post</title>

<!-- Material Design Bootstrap -->
<link rel="stylesheet" type="text/css" id="u0" href="https://mdbootstrap.com/previews/templates/admin-dashboard/js/vendor/tinymce/skins/lightgray/skin.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet" type="text/css">

<style type="text/css">
@-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes  chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
/* alert div*/
.css-2viodn {
    width: 100%;
    display: block;
    box-sizing: border-box;
    margin-bottom: 0px;
}
.css-hzwjmo {
    width: 0px;
    height: 0px;
    margin-left: 6px;
    margin-bottom: 0px;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-bottom: 6px solid rgb(207, 60, 45);
}
.css-1j97nb6 {
    color: rgb(255, 255, 255);
    background-color: rgb(207, 60, 45);
    text-align: left;
    font-size: 0.875rem;
    line-height: 1rem;
    border-radius: 2px;
    padding: 0.25rem 0.5rem;
}

/*end alert div*/
</style>

<div class="container">
      <!-- Section: Create Page -->
      <section class="my-5">


        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-lg-8">
            <form enctype="multipart/form-data" action="<?php echo e(route('admin.PutVideoInPost')); ?>" method="post">
                     <?php echo csrf_field(); ?>
            <!-- if post have video-->
            <?php if(session('errors')): ?>

            <button type="button" id="confirm" class="btn btn-default btn-lg btn-block roster-button active" data-toggle="modal" data-target="#confirm_model"  hidden data-id="jsmith22" >confirm</button>

            <div aria-labelledby="myModalLabel" class="modal fade" id="confirm_model" role="dialog" tabindex="-1">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Continue Employee</h4>
                  </div>
                  <div class="modal-body">
                    <p>*This post has video already !</p>
                    <p>Are you sure you want to continue?</p>
                  </div>
                  <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal"  type="button">Cancel</a>

                    <button  name="Continue" class="btn btn-danger"  type="submit" >Continue</button>
                  </div>
                </div>
                <!-- end modal-content -->
             </div>
              </div>
                <?php endif; ?>

           <!--  card -->
           <div class="card mb-4 post-title-panel">
             <div class="card-body">
               <div class="md-form mt-1 mb-0">
                 <input type="text" name="header" id="header" class="form-control " value="<?php echo e(old('header')); ?>" required>
                 <label class="form-check-label active" for="Header">Post Header</label>

               </div>

                  <!--  check unique header -->
                  <div class="css-0">
                   <div class="css-2viodn " id="error_header">

                  </div>
                  </div>
             </div>
           </div>
           <!--  card -->


            <!--  card -->
            <div class="card mb-4 post-title-panel">
              <div class="card-body">
                <div class="md-form mt-1 mb-0">

                  <input type="text" name="author" id="form2" class="form-control " value="<?php echo e($video->author); ?>" onfocus=" $(this).attr('disabled', true);" onblur="$(this).attr('disabled',false);">
                  <label class="form-check-label active" for="form2">Author</label>

                </div>
              </div>
            </div>
            <!--  card -->




            <!--  card -->
            <div class="card mb-4 post-title-panel">
              <div class="card-body">
                <div class="md-form mt-1 mb-0">
                  <input type="url" name="video" id="form4" class="form-control" value="<?php echo e($video->video); ?>" onfocus=" $(this).attr('disabled', true);" onblur="$(this).attr('disabled',false);">
                  <label class="form-check-label active" for="form4">Url video</label>

                </div>
              </div>
            </div>
            <!--  card -->


            <!--  card -->
            <div class="card mb-4 post-title-panel">
              <div class="card-body">
                <div class="md-form mt-1 mb-0">
                  <input type="text" name="title" id="title" class="form-control" value="<?php echo e($video->title); ?>" onfocus=" $(this).attr('disabled', true);" onblur="$(this).attr('disabled',false);" >
                  <label class="form-check-label active" for="title">video title</label>
                </div>
                <!--  check unique title -->
                <div class="css-0">
                  <div class="css-2viodn " id="error_title">

                </div>
                </div>

              </div>
            </div>
            <!--  card -->


          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-4">

            <!-- Card -->
            <div class="card card-cascade narrower mb-5">

              <!-- Card type -->
              <div class="view view-cascade gradient-card-header blue-gradient">
                <h4 class="font-weight-500 mb-0">Type</h4>
              </div>
              <!-- Card type -->


                    <!-- Entertainment type Card  -->
                    <div class="card-body card-body-cascade" id="Entertainment" >
                      <fieldset class="form-check mb-4" id="typefield11">
                        <input  name="type" class="type form-check-input" checked value="<?php echo e($video->type); ?>" type="checkbox" id="color-11" onchange="$(this).prop( 'checked', true ); ">
                        <label class="form-check-label" for="color-11"  ><?php echo e($video->type); ?></label>

                    </div>
                            <!-- get video id -->
                        <input type="hidden" name="id" value="<?php echo e($video->id); ?>">
                </div>
                <!-- Card -->

          </div>
          <!-- Grid column -->
          <div class="mt-4">
            <button name="create" type="submit" class="btn btn-lg btn-block btn-outline-info" id="send">Create Video</button>
          </div>
          </form>


        </div>
        <!-- Grid row -->

      </section>
      <!-- Section:  -->

    </div>


<div class="mt-4">
<?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<script type="text/javascript" src="<?php echo e(asset('js/mdb.min.js')); ?>"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  <script>

        /* check unique post header by Ajax */

            $(document).ready(function(){

             $('#header').blur(function(){
              var error_header = '';
              var header = $('#header').val();
              var _token = $('input[name="_token"]').val();

              if(!header)
              {
              $('#error_header').html('<div class="css-hzwjmo"></div><div class="css-1j97nb6" >*Can not be empty !</div>');
               $('#header').addClass('has-error');
               $('#send').attr('disabled', true);
              }
              else
              {
               $.ajax({
                url:"<?php echo e(route('admin.header_available.check')); ?>",
                method:"POST",
                data:{header:header, _token:_token},
                success:function(result)
                {
                  if(result == 'unique')
                  {
                   $('#error_header').html('<div class="css-hzwjmo"></div><div class="css-1j97nb6" >*Please enter existing header !</div>');
                   $('#header').removeClass('has-error');
                   $('#send').attr('disabled', true);
                  }
                  else
                  {
                   $('#error_header').html('<div class="alert-success text-success">*Correct Header</div');
                   $('#header').addClass('has-error');
                   $('#send').attr('disabled', false);
                  }
                }
               })
           }
             });

            });

            /*$("#send").on("click", function(){
                   return confirm("Do you want to delete this item?");
               });*/

               /* if post have video*/
               jQuery(function(){
                  jQuery('#confirm').click();
               });
  </script>
</div>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\admin\videos\PutVideoInPost.blade.php ENDPATH**/ ?>