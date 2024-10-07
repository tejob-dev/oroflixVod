
<?php $__env->startSection('title',__('Edit Language') . ''." - $langs->name"); ?>
<?php $__env->startSection('breadcum'); ?>
	<div class="breadcrumbbar">
      <h4 class="page-title"><?php echo e(__('Edit Language')); ?></h4>
      <div class="breadcrumb-list">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Edit Language')); ?></li>
          </ol>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar">
  <div class="row">
    <?php if($errors->any()): ?>  
  <div class="alert alert-danger" role="alert">
  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Close')); ?>">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          <a href="<?php echo e(url('admin/languages')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Back')); ?>"><i
              class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
          <h5 class="box-title"><?php echo e(__('Edit Language')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <?php echo Form::model($langs, ['method' => 'PATCH', 'action' => ['LanguageController@update', $langs->id]]); ?>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group<?php echo e($errors->has('local') ? ' has-error' : ''); ?>">
                  <?php echo Form::label('local', __('local')); ?>  <sup class="text-danger">*</sup>
                  <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('A locale is a set of parameters that defines the users language, region and any special variant preferences that the user wants to see in their user interface. Like: en')); ?>">
                    <i class="fa fa-info"></i>
                  </small>                 
                  <?php echo Form::text('local', null, ['class' => 'form-control', 'required' => 'required']); ?>

                  <small class="text-danger"><?php echo e($errors->first('local')); ?></small>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <?php echo Form::label('name', __('Name')); ?>  <sup class="text-danger">*</sup>
                    <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Enter language name. Like: English')); ?>">
                      <i class="fa fa-info"></i>
                    </small>                 
                    <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

                    <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                </div>
              </div>
              <div class="col-md-3">  
                <div class="form-group">
                  <label for=""><?php echo e(__('Set Default')); ?></label>
                  <br>
                  <label class="switch">
                         <input name="def" <?php echo e($langs->def==1 ? "checked" : ""); ?> type="checkbox" class="custom_toggle" id="logo_chk">
                    </label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for=""><?php echo e(__('RTL')); ?></label>
                  <br>
                  <label class="switch">
                         <input name="rtl" <?php echo e($langs->rtl==1 ? "checked" : ""); ?> type="checkbox" class="custom_toggle" id="logo_chk">
                    </label>
                </div>
              </div>
              <div class="col-md-3">              
                <div class="form-group">
                  <button type="reset" class="btn btn-success-rgba" title="<?php echo e(__('Reset')); ?>"><?php echo e(__('Reset')); ?></button>
                  <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
                    <?php echo e(__('Update')); ?></button>
                </div>
              </div>
                <?php echo Form::close(); ?>

                <div class="clear-both"></div>
            

      </div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
<script>
  (function($){
    $.noConflict();    
  })(jQuery);    
</script>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\NexthourWeb\resources\views/admin/language/edit.blade.php ENDPATH**/ ?>