<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo e(config('app.name')); ?>-Page denied</title>

   <link rel="icon" href="<?php echo e(asset('img/m.png')); ?>" type="image/icon type">

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Muli:400" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">

	<!-- Font Awesome Icon -->
	<link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>" />

	<!-- Custom stlylesheet -->
  <link href="<?php echo e(asset('css/mdb.min.css')); ?>" rel="stylesheet" type="text/css">
	<link type="text/css" rel="stylesheet" href="<?php echo e(asset('erro/403style.css')); ?>" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
<style media="screen">
.nn {
 position: absolute;
 width: 100%;
 height: 100%;
 background-image: url('<?php echo e(asset('img/bbg.jpg')); ?>');
 background-size: cover;
}
</style>
</head>

<body>

	<div id="notfound">
		<div class="nn"></div>
		<div class="notfound">
			<div class="notfound-404">
				<h1 class="text-danger">403</h1>
			</div>
			<h2 class="text-danger">Page denied!! </h2>
      <p >Sorry.. You don't have authorization to view this page.</p>
			<form class="notfound-search">
				<input type="text" placeholder="Search...">
				<button type="button">Search</button>
			</form>
			<div class="notfound-social">
				<a href="<?php echo e(route('facebook')); ?>"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-pinterest"></i></a>
				<a href="<?php echo e(route('google')); ?>"><i class="fa fa-google-plus"></i></a>
			</div>
			<a href="<?php echo e(route('home')); ?>" class="text-secondary ">Back To Homepage</a>
		</div>
	</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<?php /**PATH C:\xampp\htdocs\mm336\mm\resources\views/errors/403.blade.php ENDPATH**/ ?>