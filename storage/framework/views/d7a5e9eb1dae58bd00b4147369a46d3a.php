
<?php $__env->startSection('title', __('Profile')); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar">
          <h4 class="page-title"><?php echo e(__('Profile')); ?></h4>
          <div class="breadcrumb-list">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Profile')); ?></li>
              </ol>
          </div>  
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar">
  	<div class="row">
    	<div class="col-lg-12">
      		<div class="card m-b-50">
        		<div class="card-header">
          			<h5 class="box-title"><?php echo e(Auth::user()->name); ?> <?php echo e(__(' Profile')); ?></h5>
        		</div>
        		<div class="card-body ml-2">
					<div class="row">
			
						
      				</div>
    			</div>
				<div class="row mx-2">
					<!-- ======= Facebook Login start ========== -->
					<div class="col-md-6 col-lg-6 col-xl-6 mb-4">
						<div class="bg-info-rgba ml-6 mr-6 mb-6">
							<div class="card-header text-dark"><h5 class="mb-0"> <?php echo e(__('Change Email Address')); ?> : <?php echo e(Auth::user()->email); ?></h5>
              
                
              </div>
							<div class="payment-gateway-block">
                <?php echo Form::open(['method' => 'POST', 'action' => 'UserAccountController@update_profile']); ?>

									<div class="row mx-1 mt-3">
										<div class="col-md-12">
											<div class="form-group text-dark<?php echo e($errors->has('new_email') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('new_email', __('New Email')); ?> <sup class="text-danger">*</sup>
                        <?php echo Form::text('new_email', null, ['class' => 'form-control']); ?>

                        <small class="text-danger"><?php echo e($errors->first('new_email')); ?></small>
                      </div>
                      <div class="form-group text-dark<?php echo e($errors->has('current_password') ? ' has-error' : ''); ?>">
                        <?php echo Form::label('current_password',__('Current Password')); ?> <sup class="text-danger">*</sup>
                        <?php echo Form::password('current_password', ['class' => 'form-control']); ?>

                        <small class="text-danger"><?php echo e($errors->first('current_password')); ?></small>
                      </div>
										<div class="col-md-6 col-lg-6 col-xl-12 form-group">
											<button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
												<?php echo e(__('Update')); ?></button>
										</div>
									</div>
                  <?php echo Form::close(); ?>

							</div>
						</div>
					</div>
          </div>
						<!-- ======= Facebook Login end ========== -->

						<!-- ======= Google Login start ========== -->
						<div class="col-md-6 col-lg-6 col-xl-6 mb-4">
							<div class="bg-info-rgba ml-6 mr-6 mb-6">
								<div class="card-header text-dark"><h5 class="mb-0"><?php echo e(__('Change Password ')); ?></h5></div>
								<div class="payment-gateway-block">
                  <?php echo Form::open(['method' => 'POST', 'action' => 'UserAccountController@update_profile']); ?>

										<div class="row mx-1 mt-3">
											<div class="col-md-12">
												<div class="form-group text-dark<?php echo e($errors->has('current_password') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('current_password', __('Current Password')); ?> <sup class="text-danger">*</sup>
                          <?php echo Form::password('current_password', ['class' => 'form-control']); ?>

                          <small class="text-danger"><?php echo e($errors->first('current_password')); ?></small>
                        </div>
                        <div class="form-group text-dark<?php echo e($errors->has('new_password') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('new_password', __('New Password')); ?> <sup class="text-danger">*</sup>
                          <?php echo Form::password('new_password', ['class' => 'form-control']); ?>

                          <small class="text-danger"><?php echo e($errors->first('new_password')); ?></small>
                        </div>
											<div class="col-md-6 col-lg-6 col-xl-12 form-group">
												<button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
													<?php echo e(__('Update')); ?></button>
											</div>
										</div>
                    <?php echo Form::close(); ?>

								</div>
							</div>
						</div>
            </div>
						<!-- ======= Google Login end ========== -->

						<!-- ======= GITLAB Login start ========== -->
						<div class="col-md-6 col-lg-6 col-xl-6 mb-4">
							<div class="bg-info-rgba ml-6 mr-6 mb-6">
								<div class="card-header text-dark"><h5 class="mb-0"><?php echo e(__('Change Name')); ?></h5>
                </div>
								<div class="payment-gateway-block">
									<?php echo Form::open(['method' => 'POST', 'action' => 'UserAccountController@update_profile']); ?>

										<div class="row mx-1 mt-3">
											<div class="col-md-12">
												<div class="form-group text-dark<?php echo e($errors->has('current_name') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('current_name', __('Current Name')); ?> 
                          <?php echo Form::text('current_name',Auth::user()->name, ['class' => 'form-control','readonly']); ?>

                          <small class="text-danger"><?php echo e($errors->first('current_name')); ?></small>
                        </div>
                        <div class="form-group text-dark<?php echo e($errors->has('new_name') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('new_name', __('New Name')); ?> <sup class="text-danger">*</sup>
                          <?php echo Form::text('new_name',null, ['class' => 'form-control']); ?>

                          <small class="text-danger"><?php echo e($errors->first('new_name')); ?></small>
                        </div>
                        <div class="form-group text-dark<?php echo e($errors->has('current_password') ? ' has-error' : ''); ?>">
                          <?php echo Form::label('current_password',__('Current Password')); ?> <sup class="text-danger">*</sup>
                          <?php echo Form::password('current_password', ['class' => 'form-control']); ?>

                          <small class="text-danger"><?php echo e($errors->first('current_password')); ?></small>
                        </div>
											<div class="col-md-6 col-lg-6 col-xl-12 form-group">
												<button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
													<?php echo e(__('Update')); ?></button>
											</div>
										</div>
                    <?php echo Form::close(); ?>

								</div>
							</div>
						</div>
            </div>
						<!-- ======= GITLAB Login end ========== -->

						<!-- ======= Amazon Login start ========== -->
						<div class="col-md-6 col-lg-6 col-xl-6 mb-4">
							<div class="bg-info-rgba ml-6 mr-6 mb-6">
								<div class="card-header text-dark"><h5 class="mb-0"><?php echo e(__('Change Profile Image ')); ?></h5></div>
								<div class="payment-gateway-block">
									<?php echo Form::open(['method' => 'POST', 'action' => 'UserAccountController@update_profile','files' => true]); ?>

										<div class="row mx-1 mt-3">
											<div class="col-md-12">
												<div class="form-group text-dark<?php echo e($errors->has('image') ? ' has-error' : ''); ?> input-file-block">
                          <?php echo Form::label('image', __('Profile Image')); ?>

                          <?php echo Form::file('image', ['class' => 'input-file', 'id'=>'image']); ?>

                          <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
                        </div>
                      </div>
                      <?php if(Auth::user()->image != NULL): ?>
                        <div class="col-xs-6">
                          <img src="<?php echo e(asset('images/users/' . Auth::user()->image)); ?>" class="img-responsive img-thumbnail" width="130" height="100" alt="">
                        </div>
                      <?php endif; ?>
											<div class="col-md-6 col-lg-6 col-xl-12 form-group">
												<button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Update')); ?>"><i class="fa fa-check-circle"></i>
													<?php echo e(__('Update')); ?></button>
											</div>
										</div>
                    <?php echo Form::close(); ?>

								</div>
							</div>
						</div>
            </div>
						<!-- ======= Amazon Login end ========== -->
				</div>
            </div></div>
  			</div>
		</div>
	</div>

  

<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\NexthourWeb\resources\views/admin/profile.blade.php ENDPATH**/ ?>