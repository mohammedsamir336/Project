<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">Edit Video</span>
<title id="title">Edit Video</title>

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

            <form enctype="multipart/form-data" action="<?php echo e(route('admin.uploadVideo')); ?>" method="post">
                     <?php echo csrf_field(); ?>


            <!--  card -->
            <div class="card mb-4 post-title-panel">
              <div class="card-body">
                <div class="md-form mt-1 mb-0">
                  <input type="text" name="author" id="form2" class="form-control " value="<?php echo e($video->author); ?>" required>
                  <label class="form-check-label active" for="form2">Author</label>

                </div>
              </div>
            </div>
            <!--  card -->




            <!--  card -->
            <div class="card mb-4 post-title-panel">
              <div class="card-body">
                <div class="md-form mt-1 mb-0">
                  <input type="url" name="video" id="form4" class="form-control" value="<?php echo e($video->url); ?>" required>
                  <label class="form-check-label active" for="form4">Url video</label>
                    <!--  video id -->
                  <input type="hidden" name="video_id" value="<?php echo e($video->id); ?>">
                </div>
              </div>
            </div>
            <!--  card -->


            <!--  card -->
            <div class="card mb-4 post-title-panel">
              <div class="card-body">
                <div class="md-form mt-1 mb-0">
                  <input type="text" name="title" id="title" class="form-control" value="<?php echo e($video->title); ?>"required>
                  <label class="form-check-label active" for="title">video title</label>
                </div>
                <!--  check unique title -->
                <div class="css-0">
                  <div class="css-2viodn " id="error_title">

                </div>
                </div>
                  <!--  check unique title Ajax-->
      <input  id="test_title" type="hidden" name="titleTest" value="<?php echo e($video->title); ?>">
              </div>
            </div>
            <!--  card -->
            <?php echo $video->video; ?>


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

              <!-- append Card  -->
                  <div id="type" class="card-body card-body-cascade" >
                      <!-- post type fieldset  -->
                    <fieldset class="form-check mb-4" id="typefield"  >
                      <input  name="type" class="type form-check-input"  value="<?php echo e($video->type); ?>" checked  type="checkbox" id="type1">
                      <label class="form-check-label" for="type1" onclick="m();"><?php echo e($video->type); ?></label>
                    </fieldset>

                  </div>

                    <!-- Entertainment type Card  -->
                    <div class="card-body card-body-cascade" id="Entertainment" style="display:none;">
                      <fieldset class="form-check mb-4" id="typefield11">
                        <input  name="type" class="type form-check-input"  value="Celebrity" type="checkbox" id="color-11">
                        <label class="form-check-label" for="color-11" onclick="m();">Celebrity</label>
                      </fieldset>
                      <fieldset class="form-check mb-4"id="typefield12">
                        <input  name="type" class="type form-check-input"  value="Movies" type="checkbox" id="color-12">
                        <label class="form-check-label" for="color-12"onclick="m();">Movies</label>
                      </fieldset>
                      <fieldset class="form-check mb-4"id="typefield13">
                        <input name="type" class="type form-check-input" value="Music" type="checkbox" id="color-13" >
                        <label class="form-check-label" for="color-13" onclick="m();">Music</label>
                      </fieldset>
                      <fieldset class="form-check mb-4"id="typefield14">
                        <input name="type" class="type form-check-input" value="Games"type="checkbox" id="color-14">
                        <label class="form-check-label" for="color-14"onclick="m();">Games</label>
                      </fieldset>
                      <fieldset class="form-check mb-4"id="typefield15">
                        <input name="type" class="type form-check-input"  value="sport"type="checkbox" id="color-15">
                        <label class="form-check-label" for="color-15"onclick="m();">sport</label>
                      </fieldset>
                    </div>

                    <!-- Business type Card  -->
                    <div class="card-body card-body-cascade" id="Business" style="display:none;">

                      <fieldset class="form-check mb-4"id="typefield16">
                        <input name="type" class="type form-check-input" value="Economy"  type="checkbox" id="color-16">
                        <label class="form-check-label" for="color-16"onclick="m();">Economy</label>
                      </fieldset>
                      <fieldset class="form-check mb-4"id="typefield17">
                        <input name="type" class="type form-check-input"  value="Finance" type="checkbox" id="color-17" >
                        <label class="form-check-label" for="color-17"onclick="m();" >Finance</label>
                      </fieldset>
                      <fieldset class="form-check mb-4"id="typefield18">
                        <input name="type"class="type form-check-input" value="Money" type="checkbox" id="color-18" >
                        <label class="form-check-label" for="color-18" onclick="m();">Money</label>
                      </fieldset>
                    </div>

                    <!-- Technology type Card  -->
                    <div class="card-body card-body-cascade" id="Technology" style="display:none;">

                      <fieldset class="form-check mb-4"id="typefield19">
                        <input name="type" class="type form-check-input" value="Mobile"  type="checkbox" id="color-19">
                        <label class="form-check-label" for="color-19"onclick="m();">Mobile</label>
                      </fieldset>
                      <fieldset class="form-check mb-4"id="typefield20">
                        <input name="type" class="type form-check-input" value="Camera" type="checkbox" id="color-20">
                        <label class="form-check-label" for="color-20"onclick="m();">Camera</label>
                      </fieldset>
                      <fieldset class="form-check mb-4"id="typefield21">
                        <input name="type" class="type form-check-input"  value="Robots"type="checkbox" id="color-21" >
                        <label class="form-check-label" for="color-21" onclick="m();">Robots</label>
                      </fieldset>
                    </div>

                    <!-- Life Style type Card  -->
                    <div class="card-body card-body-cascade" id="Life" style="display:none;">

                      <fieldset class="form-check mb-4"id="typefield22">
                        <input  name="type" class="type form-check-input"  value="healthy"type="checkbox" id="color-22">
                        <label class="form-check-label" for="color-22"onclick="m();">healthy</label>
                      </fieldset>
                    </div>

                    <!-- Fashion type Card  -->
                    <div class="card-body card-body-cascade" id="Fashion" style="display:none;">

                      <fieldset class="form-check mb-4"id="typefield23">
                        <input  name="type" class="type form-check-input" value="Beauty" type="checkbox"   id="color-23">
                        <label class="form-check-label" for="color-23"onclick="m();">Beauty</label>
                      </fieldset>
                      <fieldset class="form-check mb-4"id="typefield24">
                        <input name="type" class="type form-check-input" value="Shoe" type="checkbox" id="color-24">
                        <label class="form-check-label" for="color-24"onclick="m();">Shoe</label>
                      </fieldset>
                    </div>


                    <!-- Travel type Card  -->
                    <div class="card-body card-body-cascade" id="Travel" style="display:none;">

                      <fieldset class="form-check mb-4"id="typefield25">
                        <input name="type" class="type form-check-input"  value="Hotels" type="checkbox" id="color-25">
                        <label class="form-check-label" for="color-25"onclick="m();">Hotels</label>
                      </fieldset>
                      <fieldset class="form-check mb-4"id="typefield26">
                        <input name="type" class="type form-check-input" value="Flight" type="checkbox" id="color-26">
                        <label class="form-check-label" for="color-26"onclick="m();">Flight</label>
                      </fieldset>
                      <fieldset class="form-check mb-4"id="typefield27">
                        <input name="type" class="type form-check-input"  value="Beachs" type="checkbox" id="color-27">
                        <label class="form-check-label" for="color-27" onclick="m();">Beachs</label>
                      </fieldset>
                      <fieldset class="form-check mb-4"id="typefield28">
                        <input name="type" class="type form-check-input" value="Culture"  type="checkbox" id="color-28">
                        <label class="form-check-label" for="color-28" onclick="m();">Culture</label>
                      </fieldset>
                    </div>


                </div>
                <!-- Card -->

                <!-- Card -->
                <div class="card card-cascade narrower">

                  <!-- Card category -->
                  <div class="view view-cascade gradient-card-header blue-gradient">
                    <h4 class="font-weight-500 mb-0">Categories</h4>
                  </div>
                  <!-- Card category -->

                  <!-- Card content -->
                  <div class="card-body card-body-cascade">

                    <fieldset class="form-check mb-4" id="field1">
                  <label><a id="check1" class=" form-check-label" for="color-1" onclick="e();$('#Entertainment').show();$('#type').hide(); ">Entertainment</a></label>
                    </fieldset>
                    <fieldset class="form-check mb-4"id="field2">
                      <label><a id="check2" class="form-check-label" for="color-2" onclick="e();$('#Business').show();$('#type').hide();">Business</a></label>
                    </fieldset>
                    <fieldset class="form-check mb-4" id="field3">
                      <label><a id="check3" class="form-check-label" for="color-3" onclick="e();$('#Technology').show();$('#type').hide(); ">Technology</a></label>
                    </fieldset>
                    <fieldset class="form-check mb-4"id="field4">
                      <label><a id="check4" class="form-check-label" for="color-4" onclick="e();$('#Life').show();$('#type').hide(); ">Life</a></label>
                    </fieldset>
                    <fieldset class="form-check mb-4"id="field5">
                      <label><a id="check5" class="form-check-label" for="color-5" onclick="e();$('#Fashion').show();$('#type').hide(); ">Fashion</a></label>
                    </fieldset>
                    <fieldset class="form-check mb-4"id="field6">
                      <label><a id="check6" class="form-check-label" for="color-6" onclick="e();$('#Travel').show();$('#type').hide();">Travel</a></label>
                    </fieldset>
                  </div>
                  <!-- Card content -->

                </div>
                <!-- Card -->


        <!-- Card content -->
          </div>
          <!-- Grid column -->
          <div class="mt-4">
            <button type="submit" class="btn btn-lg btn-block btn-outline-info" id="send">Update Video</button>
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


       /*show tope on click*/
    $(document).on('click', '#check1', function () {
      $('#Fashion').hide();
      $('#Business').hide();
      $('#Travel').hide();
      $('#Technology').hide();
      $('#Life').hide();

    });

    $(document).on('click', '#check2', function () {
      $('#Fashion').hide();
      $('#Entertainment').hide();
      $('#Travel').hide();
      $('#Technology').hide();
      $('#Life').hide();

    });

    $(document).on('click', '#check3', function () {
      $('#Fashion').hide();
      $('#Entertainment').hide();
      $('#Travel').hide();
      $('#Business').hide();
      $('#Life').hide();

    });

    $(document).on('click', '#check4', function () {
      $('#Fashion').hide();
      $('#Entertainment').hide();
      $('#Travel').hide();
      $('#Business').hide();
      $('#Technology').hide();

    });
    $(document).on('click', '#check5', function () {
      $('#Life').hide();
      $('#Entertainment').hide();
      $('#Travel').hide();
      $('#Business').hide();
      $('#Technology').hide();

    });
    $(document).on('click', '#check6', function () {
      $('#Life').hide();
      $('#Entertainment').hide();
      $('#Fashion').hide();
      $('#Business').hide();
      $('#Technology').hide();

    });


/*to select one check box category*/
    function e() {
      if($('.check').prop( 'checked', true ))
      {
        $('.check').prop( 'checked', false );
      }
    }

/*to select one check box type*/
    function m() {
      if($('.type').prop( 'checked', true ))
      {
        $('.type').prop( 'checked', false );
      }
    }



    /* check unique video title by Ajax */

        $(document).ready(function(){

         $('#title').blur(function(){
          var error_title = '';
          var title = $('#title').val();
          var _token = $('input[name="_token"]').val();
          var test_title = $('#test_title').val();
          if( test_title == title)
          {
           /*$('#error_title').html('<div class="css-hzwjmo"></div><div class="css-1j97nb6" >*Can not be empty !</div>');
           $('#title').addClass('has-error');*/
           $('#send').attr('disabled', false);
          }
          else
          {
           $.ajax({
            url:"<?php echo e(route('admin.title_available.check')); ?>",
            method:"POST",
            data:{title:title, _token:_token},
            success:function(result)
            {
             if(result == 'unique')
             {
              $('#error_title').html('<div class="alert-success text-success">*Title Available</div>');
              $('#title').removeClass('has-error');
              $('#send').attr('disabled', false);
             }
             else
             {
              $('#error_title').html('<div class="css-hzwjmo"></div><div class="css-1j97nb6" >*This Title has been token</div>');
              $('#title').addClass('has-error');
              $('#send').attr('disabled', 'disabled');
             }
            }
           })
       }
         });

        });


  </script>
</div>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/admin/videos/editvideo.blade.php ENDPATH**/ ?>