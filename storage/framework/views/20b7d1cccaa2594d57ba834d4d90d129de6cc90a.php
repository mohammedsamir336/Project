<?php $__env->startComponent('mail::message'); ?>
# Introduction

Hi ...

Thank you for visit my website.

I hope to enjoy.

<?php $__env->startComponent('mail::button', ['url' => url('/')]); ?>
Go Home
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\Project\resources\views\TestMail\Message.blade.php ENDPATH**/ ?>