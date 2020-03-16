</header>
<!--Main Navigation-->

<!--  SCRIPTS  -->
<!-- JQuery -->
<script type="text/javascript" src="<?php echo e(asset('js/jquery-3.4.1.min.js')); ?>"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo e(asset('js/mdb.min.js')); ?>"></script>

  <script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script>

//for country code
$(document).ready(function () {
    $("[name='country']").on("change", function () {
        $("[name='phone']").val($(this).find("option:selected").data("code"));
    });
});


  new WOW().init();

  //password show/hidden
  $('.toggle-password').on('click', function() {
    $(this).toggleClass('fa-eye fa-eye-slash');
    let input = $($(this).attr('toggle'));
    if (input.attr('type') == 'password') {
      input.attr('type', 'text');
    }
    else {
      input.attr('type', 'password');
    }
  });

  /*dropdown menu*/
$('.dropdown-toggle').dropdown();

         //check unique phone
      $(document).ready(function(){

       $('#phone').blur(function(){
        var error_phone = '';
        var phone = $('#phone').val();
        var _token = $('input[name="_token"]').val();
        //var filter = /^\d+$/;
        if(!phone)
        {
         $('#error_phone').html('<div class="css-hzwjmo"></div><div class="css-1j97nb6" ><?php echo e(trans("auth.Please enter a valid Phone Number In order to verify !")); ?></div>');
         $('#phone').addClass('has-error');
         $('#send').attr('disabled', 'disabled');
        }
        else
        {
         $.ajax({
          url:"<?php echo e(route('phone_available.check')); ?>",
          method:"POST",
          data:{phone:phone, _token:_token},
          success:function(result)
          {
           if(result == 'unique')
           {
            $('#error_phone').html('<div class="alert-success text-success"><?php echo e(trans("auth.Phone Available")); ?></div>');
            $('#phone').removeClass('has-error');
            $('#send').attr('disabled', false);
           }
           else
           {
            $('#error_phone').html('<div class="css-hzwjmo"></div><div class="css-1j97nb6" ><?php echo e(trans("auth.This Phone has been token")); ?></div>');
            $('#phone').addClass('has-error');
            $('#send').attr('disabled', 'disabled');
           }
          }
         })
     }
       });

      });


    //check unique email
   $(document).ready(function(){

    $('#email').blur(function(){
     var error_email = '';
     var email = $('#email').val();
     var _token = $('input[name="_token"]').val();
     var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
     if(!filter.test(email))
     {
      $('#error_email').html('<div class="css-hzwjmo"></div><div class="css-1j97nb6" ><?php echo e(trans("auth.Please enter a valid E-Mail Address In order to verify !")); ?></div>');
      $('#email').addClass('has-error');
      $('#send').attr('disabled', 'disabled');
     }
     else
     {
      $.ajax({
       url:"<?php echo e(route('email_available.check')); ?>",
       method:"POST",
       data:{email:email, _token:_token},
       success:function(result)
       {
        if(result == 'unique')
        {
         $('#error_email').html('<div class="alert-success text-success"><?php echo e(trans("auth.Email Available")); ?></div>');
         $('#email').removeClass('has-error');
         $('#send').attr('disabled', false);
        }
        else
        {
         $('#error_email').html('<div class="css-hzwjmo"></div><div class="css-1j97nb6" ><?php echo e(trans("auth.This Email has been token")); ?></div>');
         $('#email').addClass('has-error');
         $('#send').attr('disabled', 'disabled');
        }
       }
      })
  }
    });

   });

 /* for change required message for translate*/
   $('.requiredfield').on('change invalid', function() {
       var textfield = $(this).get(0);

       // 'setCustomValidity not only sets the message, but also marks
       // the field as invalid. In order to see whether the field really is
       // invalid, we have to remove the message first
       textfield.setCustomValidity('');

       if (!textfield.validity.valid) {
         textfield.setCustomValidity('<?php echo e(trans("auth.required")); ?>');
       }
   });

</script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/layouts/register/footer.blade.php ENDPATH**/ ?>