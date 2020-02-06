<!DOCTYPE html>
@include('layouts.index.home_header')
<style media="screen">
.content-media--video {
   background-color: #ddd;
   display: block;
   position: relative;
   padding: 0 0 56.25% 0;
}
.content-media--video iframe {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
#featured-video {
  transition: width .2s ease-in-out, height .2s ease-in-out, transform .38s ease-in-out;
}
/** Use .sticky */
#featured-video.is-sticky {
  position: fixed;
  top: 15px;
  left:500px;
  max-width: 280px;
  max-height: 158px;
  width: 280px;
  height: 158px;
}
@media screen and (min-width: 1120px) {
   #featured-video.is-sticky {
      transform: translateX(-80%);
   }
}
@media screen and (min-width: 1300px) {
   #featured-video.is-sticky {
      transform: translateX(-115%);
   }
}
</style>
<div class="site-content">
<div class="container">
 <header class="content-header">

   <!-- The YouTube video -->
    <figure class="content-media content-media--video" id="featured-media">
      <iframe class="content-media__object" id="featured-video" src="https://www.youtube.com/embed/SF4aHwxHtZ0?enablejsapi=1&rel=0&showinfo=0&controls=0" frameborder="0"></iframe>
    </figure>

 </header>
 <!-- Content Body -->
 <div class="content-body">
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>


   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

          </div>
        </div>
      </div>
    @include('layouts.index.home_footer')
<script type="text/javascript">
$(document).ready(function(){
  var $window = $( window ); // 1. Window Object.
 var $featuredMedia = $( "#featured-media" ); // 1. The Video Container.
 var $featuredVideo = $( "#featured-video" ); // 2. The Youtube Video.

 var player; // 3. Youtube player object.
 var top = $featuredMedia.offset().top; // 4. The video position from the top of the document;
 var offset = Math.floor( top + ( $featuredMedia.outerHeight() / 2 ) );
 window.onYouTubeIframeAPIReady = function() {
player = new YT.Player( "featured-video", {
   events: {
     "onStateChange": onPlayerStateChange
   }
} );
};
/**
 * Run when the Youtube video state (play, pause, etc.) is changed.
 *
 * @param {Object} event The Youtube Object Event.
 * @return {Void}
 */
function onPlayerStateChange( event ) {

   var isPlay  = 1 === event.data;
   var isPause = 2 === event.data;
   var isEnd   = 0 === event.data;

   if ( isPlay ) {
      $featuredVideo.removeClass( "is-paused" );
      $featuredVideo.toggleClass( "is-playing" );
   }

   if ( isPause ) {
      $featuredVideo.removeClass( "is-playing" );
      $featuredVideo.toggleClass( "is-paused" );
   }

   if ( isEnd ) {
      $featuredVideo.removeClass( "is-playing", "is-paused" );
   }
}
$window
.on( "resize", function() {
   top = $featuredMedia.offset().top;
   offset = Math.floor( top + ( $featuredMedia.outerHeight() / 2 ) );
} )

.on( "scroll", function() {
   $featuredVideo.toggleClass( "is-sticky",
     $window.scrollTop() > offset && $featuredVideo.hasClass( "is-playing" )
   );
} );



});
</script>


<!--<html>
	<head>
		<title>Translator</title>
		<script type="text/javascript" src="http://cdn.howcode.org/content/static/javascript/jquery.min.js"></script>
		<script src="http://cdn.howcode.org/content/static/javascript/jquery.cookie.js"></script>
		<style type="text/css">
		.goog-te-banner-frame.skiptranslate{display:none!important;}
		body{top:0px!important;}
		</style>
	</head>
	<body>
		<script type="text/javascript">
		$.cookie('googtrans', '/en/fr');
		</script>
		<div id="google_translate_element" style="display: none;"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="{{asset('translate.google.com/translate_a/element.js?cb=googleTranslateElementInit')}}"></script>
	This is a test website.
	</body>
</html>-->
<!--<style media="screen">
.msgw-MessageHeader .msgw-Avatar {
  margin-right: .5rem;
  flex-grow: 0;
}
@media (min-width: 768px)
.msgw-Avatar--sm {
  font-family: Helvetica Neue,Helvetica,Arial,Liberation Sans,Roboto,Noto,sans-serif;
  font-size: .75rem;
  letter-spacing: 0;
  font-weight: 700;
  line-height: 1.34;
  height: 1.5rem;
  line-height: 1.5rem;
  width: 1.5rem;
}
.msgw-Avatar--sm {
  font-family: Helvetica Neue,Helvetica,Arial,Liberation Sans,Roboto,Noto,sans-serif;
  font-size: .75rem;
  letter-spacing: 0;
  font-weight: 700;
  line-height: 1.34;
  height: 1.5rem;
  line-height: 1.5rem;
  width: 1.5rem;
}
.msgw-Avatar--black {
  background-color: #6f6f6f;
}
.msgw-Avatar {
  border-radius: 100%;
  color: #fff;
  text-align: center;
  text-transform: uppercase;
}
</style>

<div class="msgw-Avatar msgw-Avatar--sm msgw-Avatar--black">Y</div>-->
<style media="screen">
.msgw-MessageHeader .msgw-Avatar {
  margin-right: .5rem;
  flex-grow: 0;
}
@media (min-width: 768px)
.msgw-Avatar--sm {

}
.msgw-Avatar--sm {
  font-family: Helvetica Neue,Helvetica,Arial,Liberation Sans,Roboto,Noto,sans-serif;
  font-size: .90rem;
  letter-spacing: 0;
   width: 120px;
   line-height: 120px;
   border-radius: 50%;
   text-align: center;
   font-size: 65px;
   border: 2px solid #666;
}
.msgw-Avatar--black {
  background-color: #F24A26;
}
.msgw-Avatar {
  border-radius: 100%;
  color: #fff;
  text-align: center;
  text-transform: uppercase;
}
</style>

<div class="msgw-Avatar msgw-Avatar--sm msgw-Avatar--black">Y</div>
<img src="{{auth()->user()->img ?? ''}}" alt="">
<ui-avatar name="م"></ui-avatar>
<script src='https://unpkg.com/ui-avatar@0.0.3/dist/uiavatar.js'></script>
<script src='node_modules/ui-avatar/dist/ui-avatar.js'></script>
