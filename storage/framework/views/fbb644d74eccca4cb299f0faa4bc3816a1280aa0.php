
<?php echo $__env->make('layouts.index.home_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<title><?php echo e(config('app.name')); ?></title>
<style media="screen">
#Trending{
	color: #33CFFF ;
}
</style>
<body class="animsition">


	<!-- Headline -->
	<div class="container">
		<div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
			<div class="f2-s-1 p-r-30 size-w-0 m-tb-6 flex-wr-s-c">
				<span class="text-uppercase cl2 p-r-8 ">
					Trending Now:
				</span>

				<span class="dis-inline-block cl6 slide100-txt pos-relative size-w-0" data-in="fadeInDown" data-out="fadeOutDown">
      <?php $__currentLoopData = $last_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Popular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	       <a href="read = <?php echo e($Popular->header); ?>" class="dis-inline-block slide100-txt-item animated visible-false " id="Trending">
	      		<?php echo e($Popular->header); ?>

	      	</a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</span>
			</div>
  <form class="mt-3" action="<?php echo e(route('search')); ?>" method="get">

			<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
				<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45 text-dark" type="text" name="search" placeholder="Search in posts" required>
				<button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
					<i class="zmdi zmdi-search"></i>
				</button>
			</div>
			</form>
		</div>
	</div>

	<?php echo $__env->make('layouts.index.top_posts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="card-body">
      <?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
      <?php echo e(session('status')); ?>

    </div>
      <?php endif; ?>

	<!-- Post -->
	<section class="bg0 p-t-70">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-8">
					<div class="p-b-20">

	  <?php echo $__env->make('layouts.index.posts.Entertainment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

						<!-- Other -->
						<div class="row">

				 	 <?php echo $__env->make('layouts.index.posts.business', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				     <?php echo $__env->make('layouts.index.posts.technology', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				 		    <?php echo $__env->make('layouts.index.posts.Lifestyle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                  <?php echo $__env->make('layouts.index.posts.fashion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					    	</div>

								  <?php echo $__env->make('layouts.index.posts.travel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					</div>
				</div>
		  <?php echo $__env->make('layouts.index.sidediv', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			</div>
		</div>
	</section>
	<!-- Banner -->
	<div class="container m-b-15">
    <!-- Banner -->
  	<div class="container">
  		<div class="flex-c-c">
  			<a >
  				<img class="max-w-full" src="img/mohammed.png" alt="IMG" id="banner">
  			</a>
  		</div>
  	</div>

		</div>
	</div>

 <?php echo $__env->make('layouts.index.posts.latest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.index.home_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\home.blade.php ENDPATH**/ ?>