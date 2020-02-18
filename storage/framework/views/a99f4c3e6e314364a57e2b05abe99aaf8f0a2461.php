<?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- if new message toggle title  -->
<span id="page_name" style="display:none">Edit post</span>
<title id="title">Edit post </title>

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

            <form enctype="multipart/form-data" action="<?php echo e(route('admin.uploadPost')); ?>" method="post">
                     <?php echo csrf_field(); ?>
            <!--  card -->
            <div class="card mb-4 post-title-panel">
              <div class="card-body">
                <div class="md-form mt-1 mb-0">
                  <input type="text" id="header" name="header" class="form-control " value="<?php echo e($post->header); ?>" required>
                  <label class="form-check-label active" for="header">Post header</label>

                  <!--  check unique header -->
                  <div class="css-0">
                    <div class="css-2viodn " id="error_header">

                  </div>
                  </div>
                    <!--  check unique header Ajax-->
        <input  id="test_header" type="hidden" name="headerTest" value="<?php echo e($post->header); ?>">

                </div>
              </div>
            </div>
            <!--  card -->

            <!--  card -->
            <div class="card mb-4 post-title-panel">
              <div class="card-body">
                <div class="md-form mt-1 mb-0">
                  <input type="text" name="author" id="form2" class="form-control " value="<?php echo e($post->author); ?>" required>
                  <label class="form-check-label active" for="form2">Author</label>

                </div>
              </div>
            </div>
            <!--  card -->

            <!--  card -->
            <div class="card mb-4 post-title-panel">
              <div class="card-body">
                <div class="md-form mt-1 mb-0">
                  <input type="text" name="tag" id="form3" class="form-control" value="<?php echo e($post->tag); ?>" required>
                  <label class="form-check-label active" for="form3">Tag</label>

                </div>
              </div>
            </div>
            <!--  card -->

            <!--  card -->
            <div class="card mb-4">
           <span class="ml-2">p1</span>
           <textarea id="mytextarea"  name="p1" required><?php echo e($post->p1); ?></textarea>
            </div>
            <!--  card -->
            <div class="card mb-4">
            <span class="ml-2">p2</span>
          <textarea   name="p2" ><?php echo e($post->p2); ?></textarea>
            </div>

            <!--  card -->
            <div class="card mb-4">
              <span class="ml-2">p3</span>
          <textarea  name="p3" ><?php echo e($post->p3); ?></textarea>
            </div>

            <?php if($post->videos_id): ?>
            <!--  card -->
            <div class="card mb-4 post-title-panel">
              <div class="card-body">
                <div class="md-form mt-1 mb-0">
                  <input type="url" name="video" id="form4" class="form-control" value="<?php echo e($post->videos_id()->first()->url); ?>"required>
                  <label class="form-check-label active" for="form4">Url video</label>
                  <input type="hidden" name="video_id" value="<?php echo e($post->videos_id()->first()->id); ?>">
                  <?php echo $post->videos_id()->first()->video ?? ''; ?>

                </div>
              </div>
            </div>
            <!--  card -->


            <!--  card -->
            <div class="card mb-4 post-title-panel">
              <div class="card-body">
                <div class="md-form mt-1 mb-0">
                  <input type="text" name="title" id="title" class="form-control" value="<?php echo e($post->videos_id()->first()->title); ?>"required>
                  <label class="form-check-label active" for="title">video title</label>
                </div>
                <!--  check unique title -->
                <div class="css-0">
                  <div class="css-2viodn " id="error_title">

                </div>
                </div>
                  <!--  check unique title Ajax-->
      <input  id="test_title" type="hidden" name="titleTest" value="<?php echo e($post->videos_id()->first()->title); ?>">
              </div>
            </div>
            <!--  card -->
        <?php endif; ?>

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
                      <input  name="type" class="type form-check-input"  value="<?php echo e($post->type); ?>" checked  type="checkbox" id="type1">
                      <label class="form-check-label" for="type1" onclick="m();"><?php echo e($post->type); ?></label>
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
                    <fieldset class="form-check mb-4">
                    <input name="cat" class="check form-check-input " value="<?php echo e($post->cat); ?>" type="checkbox" checked="checked" id="cat-1">
                    <label  id="cat" class=" form-check-label" for="cat-1" onclick="e();$('#<?php echo e($post->cat); ?>').show();$('#type').hide(); "><?php echo e($post->cat); ?></label>
                    </fieldset>
                    <fieldset class="form-check mb-4" id="field1">
                    <input name="cat" class="check form-check-input "  value="Entertainment" type="checkbox" id="color-1">
                    <label  id="check1" class=" form-check-label" for="color-1" onclick="e();$('#Entertainment').show();$('#type').hide(); ">Entertainment</label>
                    </fieldset>
                    <fieldset class="form-check mb-4"id="field2">
                      <input name="cat" class="check form-check-input"  value="Business" type="checkbox" id="color-2">
                      <label id="check2" class="form-check-label" for="color-2" onclick="e();$('#Business').show();$('#type').hide();">Business</label>
                    </fieldset>
                    <fieldset class="form-check mb-4" id="field3">
                      <input name="cat" class="check form-check-input" value="Technology" type="checkbox" id="color-3">
                      <label id="check3" class="form-check-label" for="color-3" onclick="e();$('#Technology').show();$('#type').hide(); ">Technology</label>
                    </fieldset>
                    <fieldset class="form-check mb-4"id="field4">
                      <input name="cat" class="check form-check-input" value="Life" type="checkbox" id="color-4">
                      <label id="check4" class="form-check-label" for="color-4" onclick="e();$('#Life').show();$('#type').hide(); ">Life</label>
                    </fieldset>
                    <fieldset class="form-check mb-4"id="field5">
                      <input  name="cat" class="check form-check-input" value="Fashion"type="checkbox" id="color-5">
                      <label id="check5" class="form-check-label" for="color-5" onclick="e();$('#Fashion').show();$('#type').hide(); ">Fashion</label>
                    </fieldset>
                    <fieldset class="form-check mb-4"id="field6">
                      <input name="cat" class="check form-check-input" value="Travel" type="checkbox" id="color-6">
                      <label id="check6" class="form-check-label" for="color-6" onclick="e();$('#Travel').show();$('#type').hide();">Travel</label>
                    </fieldset>
                  </div>
                  <!-- Card content -->

                </div>
                <!-- Card -->
                     <!-- post id -->
              <input type="hidden" name="id" value="<?php echo e($post->id); ?>">

        <!-- Card content -->
          </div>
          <!-- Grid column -->


      <button type="submit" class="btn btn-lg btn-block btn-outline-info " id="send" style="position:relative;top:405px">
        Update post
      </button>
        </form>
      <div class="mt-4">
            <!-- image upload -->
            <div class="container" style=" position:relative;bottom:100px;">
              <img  id="post_img" src="<?php echo e(asset('indexfolder/images/'.$post->img)); ?>" class="hoverable" height="230" width="250" />

                      <!-- for show img after upload -->
                     <span  id="uploaded_image"></span>

                    <!-- for alert -->
             <div class="alert mt-3" id="message" style="display: none"></div>

          <p class="text-muted ml-4 mt-2"><small> photo will be changed automatically</small></p>

            <!-- Upload image -->
          <form enctype="multipart/form-data" id="upload_form" method="POST">
                <?php echo csrf_field(); ?>
          <div class="file-field">
          <button class="btn btn-info btn-rounded btn-sm waves-effect waves-light" style="margin-right:50px;">
           Upload New Photo
          <i class="fas fa-cloud-upload-alt mr-2" aria-hidden="true"></i>
          <input type="file" name="select_file" id="select_file" multiple>
           </button>
          </div>
          <input class="btn btn-success btn-rounded btn-sm waves-effect waves-light mt-5" type="submit" name="upload" id="upload"  value="Upload" style="position:relative;left:31px;position:relative;bottom:25px">
          <!-- for Image -->
          <input type="hidden" name="id" value="<?php echo e($post->id); ?>">
             </form>

          </div>

          </div>

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section:  -->

    </div>


<div class="mt-4">
<?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<script type="text/javascript" src="<?php echo e(asset('js/mdb.min.js')); ?>"></script>
   
  <script>

/* for textarea script in footer */
tinymce.init({
   selector: 'textarea',
     plugins: 'a11ychecker advcode casechange formatpainter linkchecker lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinydrive tinymcespellchecker',
     toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter insertfile pageembed permanentpen table',
     toolbar_drawer: 'floating',
     tinycomments_mode: 'embedded',
     tinycomments_author: 'Author name',
   });


/*if cat == cat of post hide the same box name*/
    $(document).ready(function(){
    if ( $('#cat').html() == $('#check1').html()) {
        $('#field1').hide();

    }
    if ( $('#cat').html() == $('#check2').html()) {
        $('#field2').hide( );

    }
    if ( $('#cat').html() == $('#check3').html()) {
        $('#field3').hide( );

    }
    if ( $('#cat').html() == $('#check4').html()) {
        $('#field4').hide( );

    }
    if ( $('#cat').html() == $('#check5').html()) {
        $('#field5').hide( );

    }
    if ( $('#cat').html() == $('#check6').html()) {
        $('#field6').hide( );

    }

  });

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

    $(document).on('click', '#cat', function () {
      $('#Life').hide();
      $('#Entertainment').hide();
      $('#Fashion').hide();
      $('#Business').hide();
      $('#Technology').hide();
      $('#Travel').hide();
      $('#<?php echo e($post->cat); ?>').show();


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


/*upload post Photo*/
    $(document).ready(function(){

     $('#upload_form').on('submit', function(event){
      event.preventDefault();
      $.ajax({
       url:"<?php echo e(route('admin.uploadPostimg')); ?>",
       method:"POST",
       data:new FormData(this),
       dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {

        $('#post_img').css('display', 'none');
        $('#message').css('display', 'block');
        $('#message').html(data.message);
        $('#message').addClass(data.class_name);
        $('#uploaded_image').html(data.uploaded_image);
       }
      })
     });

    });

/* check unique post header by Ajax */

    $(document).ready(function(){

     $('#header').blur(function(){
      var error_header = '';
      var header = $('#header').val();
      var _token = $('input[name="_token"]').val();
      var test_header = $('#test_header').val();
      if( test_header == header)
      {
       /*$('#error_header').html('<div class="css-hzwjmo"></div><div class="css-1j97nb6" >*invalid header !</div>');
       $('#header').addClass('has-error');*/
       $('#send').attr('disabled', false);
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
          $('#error_header').html('<div class="alert-success text-success">*Header Available</div>');
          $('#header').removeClass('has-error');
          $('#send').attr('disabled', false);
         }
         else
         {
          $('#error_header').html('<div class="css-hzwjmo"></div><div class="css-1j97nb6" >*This Header has been token</div>');
          $('#header').addClass('has-error');
          $('#send').attr('disabled', 'disabled');
         }
        }
       })
   }
     });

    });


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
<?php /**PATH C:\xampp\htdocs\Project\resources\views\admin\posts\edit.blade.php ENDPATH**/ ?>