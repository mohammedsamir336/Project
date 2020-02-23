<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

   <link rel="icon" href="<?php echo e(asset('img/m.png')); ?>" type="image/icon type">

  <title> <?php echo e(config('app.name')); ?>-Oops! Page Not Found</title>
<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="<?php echo e(asset('erro/404style.css')); ?>" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<div id="notfound">
  <div class="notfound">
  		<div class="notfound-404">
  			<h1>Oops!</h1>
  		</div>
	<h2>404 - Page not found</h2>
	<p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
	<a href="<?php echo e(route('home')); ?>">Go To Homepage</a>
  </div>
  	</div>
<?php /**PATH C:\xampp\htdocs\Project\resources\views/errors/404.blade.php ENDPATH**/ ?>