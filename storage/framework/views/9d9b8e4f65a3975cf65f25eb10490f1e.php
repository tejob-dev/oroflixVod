<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(__('Admin')); ?> - <?php echo e($w_title); ?></title>
    <?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



</head>
<body class="vertical-layout"> 
<div id="containerbar">
   <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   

<div class="rightbar">
     <?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <!-- Start Contentbar -->             
        
    
        <?php echo $__env->yieldContent('maincontent'); ?>

         <!-- Start Footerbar -->
    <div class="footerbar">
        <footer class="footer">
            <p class="mb-0"> &copy; <?php echo e(date('Y')); ?> | <?php echo e(config('app.name')); ?> | <?php echo e(__('All Rights Reserved.')); ?></strong>
                <span class="pull-right"><b><?php echo e(__("Version")); ?> <?php echo e(config('app.version')); ?></p>
        </footer>
    </div>
       
  
  
    
    <!-- End Footerbar -->
</div>

</div>
 <?php echo $__env->make('layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->yieldContent('script'); ?>
</body>
</html><?php /**PATH C:\laragon\www\NexthourWeb\resources\views/layouts/master.blade.php ENDPATH**/ ?>