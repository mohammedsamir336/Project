<!--  SCRIPTS  -->
  <!-- JQuery -->
  <script type="text/javascript" src="<?php echo e(asset('js/jquery-3.4.1.min.js')); ?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo e(asset('js/mdb.min.js')); ?>"></script>

  <script src="<?php echo e(asset('js/app.js')); ?>" ></script>


  <script>


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

//عشان لما يعمل اعادة ريلود للصفحة يدوس علي الزرار لوحدة
    jQuery(function(){
       jQuery('#login').click();
      // alert("Hello");
    });


    var subjects = [
    "Where's My Stuff?",
    "Cancel Items or Orders",
    "Returns & Refunds",
    "Shipping Rates & Information",
    "Change Your Payment Method",
    "Manage Your Account Information",
    "About Two-Step Verification",
    "Cancel Items or Orders",
    "Change Your Order Information",
    "Contact Third-Party Sellers",
    "More in Managing Your Orders"
    ];

    $('#form-autocomplete-2').mdbAutocomplete({
    data: subjects
    });




  </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/layouts/login/footer.blade.php ENDPATH**/ ?>