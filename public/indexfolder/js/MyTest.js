

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

//for see replies
/*$(document).on('click', 'span[data-id]', function(){

   var id = $(this).attr('data-id');

  if ($('span[data-id]').html() != '<b>Close Replies</b>') {
     $('span[data-id]').html('<b>Close Replies</b>');
}else {
  $('span[data-id]').html('<b>See Replies</b>');

}
});*/

/*$(document).on('click', '#tt', function(){
  $('#vv').toggle();

});*/
/*$('.reply').on('click', function(){
/*  var hide = $('#hide').val();
  var see = $('.reply').attr('id', hide);
  var m = $('.gg').attr('id', hide);
 //$('.dd').append(m);
 $(m).toggle();
 alert(see);*/
 /*$('.reply').html('<b>Loading...</b>')
});*/

/*videos close*/
$('#modal1').on('hidden.bs.modal', function (e) {

  $('#modal1 iframe').attr("src", $("#modal1 iframe").attr("src"));
});


/*to Close video on nav bar videos this div here in footer*/
$('div[v-id]').on('hidden.bs.modal', function (e) {
  var id = $(this).attr('v-id');
  $('div[v-id] iframe').attr("src", $("div[v-id] iframe").attr("src"));
});


/*count videos viewer*/
$(document).on('click', 'button[data-id]', function (e) {

  var id = $(this).attr('data-id');

    load_data(id);

    function load_data(id )
    {
       $.ajax({
        url:"{{ route('video') }}",
        method:"GET",
        data:{id:id},
      success:function(data)
      {

      }
     })
    }
});

/* time clock in nav bar*/
function showTime() {
   var date = new Date(),
       cairo = new Date().toLocaleString({timeZone: "Africa/Cairo"});
      cairo = new Date(cairo);
   document.getElementById('date').innerHTML = cairo.toLocaleTimeString(/*'ar-EG'*/);
 }
 /*refresh time every a second*/
setInterval(showTime, 1000);


/*$(document).on('click', '#show', function lightsout() {

   //var id = $(this).attr('data-id');
   $('#show').toggleClass('visible');
 });*/




  /* googel translate*/

/* get cookie of google translate
  function getCookie() {
  var name = 'googtrans' + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return '';
} var g = getCookie('googtrans'); */

  /* lang*/
$('#ar').on('click',function () {
document.cookie = "googtrans=/en/ar; path=/";
 location.reload();
//$.cookie('googtrans', '/en/ar');
});
$('#en').on('click',function () {
document.cookie = "googtrans=/en/en;path=/";
location.reload();
});

  function googleTranslateElementInit() {
    new google.translate.TranslateElement(
      {
    pageLanguage: 'en',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE

          }, 'google_translate_element');
      }
