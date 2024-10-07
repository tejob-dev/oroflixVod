
<?php $__env->startSection('title','Wallet Setting'); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar">
    <h4 class="page-title"><?php echo e(__('Wallet')); ?></h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Wallet Settings')); ?></li>
        </ol>
    </div> 
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar">
  	<div class="row">
    	<div class="col-lg-12">
      		<div class="card m-b-30">
        		<div class="card-header">
          			<h5 class="box-title"><?php echo e(__('Wallet Settings')); ?></h5>
        		</div>

        <!-- ======= Facebook Login start ========== -->
					<div class="col-md-6 col-lg-6 col-xl-12">
						<div class="bg-info-rgba ml-6 mr-6 mb-6">
							<div class="card-header text-dark"><h4><?php echo e(__('Edit Wallet Setting ')); ?></h4></div>
								<div class="payment-gateway-block">
									<form action="<?php echo e(route('admin.update.wallet.settings')); ?>" method="POST">
										<?php echo e(csrf_field()); ?>

										<div class="form-group">
											<div class="row mx-2 my-4">
												<div class="col-md-12">
													<label for=""><?php echo e(__('Enable Wallet')); ?> </label>
                          <?php echo Form::checkbox('enable_wallet', 1, (isset($wallet) && $wallet->enable_wallet == 1 ? 1 : 0), ['class' => 'custom_toggle']); ?>

													<label for="fb_check"></label>
												</div>
											</div>
										</div>

                    <div class="col-md-6 col-lg-6 col-xl-12">
                      <div class="bg-primary ml-6 mr-6 mb-6">
                        <div class="card-header text-dark"><h4 class="text-white"><i class="feather icon-Settings" aria-hidden="true"></i> <?php echo e(__('ENABLE PAYMENT OPTIONS ON WALLET')); ?></h4></div>
                    </div>
                  </div>

										<div class="row mx-2 my-4">
											<div class="col-md-4">
                        <div class="form-group text-dark<?php echo e($errors->has('stripe_enable') ? ' has-error' : ''); ?>">
                          <h6 class="bootstrap-switch-label"><?php echo e(__('Enable Stripe Payment Gateway')); ?></h6>
                          <?php echo Form::checkbox('stripe_enable', 1, (isset($wallet) && $wallet->stripe_enable == 1 ? 1 : 0), ['class' => 'custom_toggle']); ?>

                        </div>
                        <small class="text-danger"><?php echo e($errors->first('stripe_enable')); ?></small>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group text-dark<?php echo e($errors->has('paytm_enable') ? ' has-error' : ''); ?>">
                          <h6 class="bootstrap-switch-label"><?php echo e(__('Enable Paytm')); ?></h6>
                          <?php echo Form::checkbox('paytm_enable', 1, (isset($wallet) && $wallet->paytm_enable == 1 ? 1 : 0), ['class' => 'custom_toggle']); ?>

                        </div>
                        <small class="text-danger"><?php echo e($errors->first('paytm_enable')); ?></small>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group text-dark<?php echo e($errors->has('paypal_enable') ? ' has-error' : ''); ?>">
                          <h6 class="bootstrap-switch-label"><?php echo e(__('Enable PayPal')); ?></h6>
                          <?php echo Form::checkbox('paypal_enable', 1, (isset($wallet) && $wallet->paypal_enable == 1 ? 1 : 0), ['class' => 'custom_toggle']); ?>

                        </div>
                        <small class="text-danger"><?php echo e($errors->first('paypal_enable')); ?></small>
                      </div>

											<div class="col-md-6 col-lg-6 col-xl-12 form-group">
												<button type="submit" class="btn btn-primary-rgba" title=" <?php echo e(__('Save')); ?>"><i class="fa fa-check-circle"></i>
												  <?php echo e(__('Save')); ?></button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
  			</div>
		  </div>
	  </div>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('wallet.history')): ?>
      <div class="row">
          <div class="col-md-12">
  
              <div class="card m-b-50">
                  <div class="card-header">
                      <h5 class="card-title"><?php echo e(__('Wallet Transactions')); ?></h5>
                  </div>   
                  <div class="card-body wallet-transaction-page">
                      <div class="table-responsive">
                           <table id="wallet_logs_table" class="table table-borderd">  
                              <thead>
                                  <th> <?php echo e(__('#')); ?></th>
                                  <th><?php echo e(__('User')); ?></th>
                                  <th><?php echo e(__('Type')); ?></th>
                                  <th><?php echo e(__('Amount')); ?></th>
                                  <th><?php echo e(__('Note')); ?></th>
                              </thead>  
                              <tbody>                                  
                              </tbody>  
                          </table>                  
                      </div>
                  </div>
              </div>
          </div>
      </div>
<?php endif; ?>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
<script>
$(function () {
  "use strict";
  jQuery.noConflict();
  var table;
  if($.fn.dataTable.isDataTable('#wallet_logs_table')){
    table = $('#wallet_logs_table').DataTable();  
  }else{
    table = $('#wallet_logs_table').DataTable({
      processing: true,
      serverSide: true,
      ajax: '<?php echo e(route("admin.wallet.settings")); ?>',
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable : false},
          {data : 'user', name : 'user'},
          {data : 'type', name : 'type'},
          {data : 'amount', name : 'amount'},
          {data : 'log', name : 'log'},
      ],
      dom : 'lBfrtip',
      buttons : [
        'csv','excel','pdf','print'
      ],
      order : [[0,'DESC']]
    });
  }
    
  
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\NexthourWeb\resources\views/admin/wallet/setting.blade.php ENDPATH**/ ?>