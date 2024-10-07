
<?php $__env->startSection('title',__('Dashboard')); ?>
<?php $__env->startSection('maincontent'); ?>
<?php $__env->startSection('breadcum'); ?>
<div class="breadcrumbbar">
  <h4 class="page-title"><?php echo e(__('Dashboard')); ?></h4>
  <div class="breadcrumb-list">
      <ol class="breadcrumb">          
          <li class="breadcrumb-item active"><?php echo e(__('Dashboard')); ?></li>
      </ol>
  </div>
</div>
<?php $__env->stopSection(); ?>
<div class="contentbar">
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard.states')): ?>
      <!-- Start row -->
      <div class="row">       
          <!-- Start col -->
          <div class="col-lg-12">
              <!-- Start row -->
              <div class="row">
                  <!-- Start col -->
                  <div class="col-lg-3 col-md-6 col-12">
                      <div class="card m-b-30 shadow-sm">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col-6">
                                      <h4 id="number1"><?php echo e($users_count); ?></h4>
                                      <p class="font-14 mb-0"><?php echo e(__('Users')); ?></p>
                                  </div> 
                              <div class="col-6 text-right">
                                  <a href="<?php echo e(url('admin/users')); ?>">
                                    <i class="text-info feather icon-users icondashboard" title="<?php echo e(__('Users')); ?>"></i>
                                  </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End col -->
                  <!-- Start col -->
                  <div class="col-lg-3 col-md-6 col-12">
                      <div class="card m-b-30 shadow-sm">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col-6">
                                      <h4 id="number2"><?php echo e($activeusers); ?></h4>
                                      <p class="font-14 mb-0"><?php echo e(__('Total Active Users')); ?></p>
                                  </div>
                                  <div class="col-6 text-right">
                                      <a href="<?php echo e(url('admin/users')); ?>">
                                        <i class="text-warning feather icon-user icondashboard" title="<?php echo e(__('Total Active Users')); ?>"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End col -->
                  <!-- Start col -->
                  <div class="col-lg-3 col-md-6 col-12">
                      <div class="card m-b-30 shadow-sm">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col-6">
                                      <h4 id="number3"><?php echo e($movies_count); ?></h4>
                                      <p class="font-14 mb-0"><?php echo e(__('Total Movies')); ?></p>
                                  </div>
                                  <div class="col-6 text-right">
                                      <a href="<?php echo e(url('admin/movies')); ?>">
                                        <i class="text-success feather icon-video icondashboard" title="<?php echo e(__('Total Movies')); ?>"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End col -->
                  <!-- Start col -->
                  <div class="col-lg-3 col-md-6 col-12">
                      <div class="card m-b-30 shadow-sm">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col-6">
                                      <h4 id="number4"><?php echo e($tvseries_count); ?></h4>
                                      <p class="font-14 mb-0"><?php echo e(__('Total TV Series')); ?></p>
                                  </div>
                                  <div class="col-6 text-right">
                                      <a href="<?php echo e(url('admin/tvseries')); ?>">
                                        <i class="ttext-primary feather icon-camera icondashboard" title="<?php echo e(__('Total TV Series')); ?>"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End col -->
                  <!-- Start col -->
                  <div class="col-lg-3 col-md-6 col-12 mt-md-3">
                      <div class="card m-b-30 shadow-sm">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col-7">
                                      <h4 id="number5"><?php echo e($livetv_count); ?></h4>
                                      <p class="font-14 mb-0"><?php echo e(__('Total TV Chanels')); ?></p>
                                  </div>
                                  <div class="col-5 text-right">
                                      <a href="<?php echo e(url('admin/livetv')); ?>">
                                        <i class="text-success feather icon-tv icondashboard" title="<?php echo e(__('Total TV Chanels')); ?>"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End col -->
                  <!-- Start col -->
                  <div class="col-lg-3 col-md-6 col-12 mt-md-3">
                      <div class="card m-b-30 shadow-sm">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col-6">
                                      <h4 id="number6"><?php echo e($package_count); ?></h4>
                                      <p class="font-14 mb-0"><?php echo e(__('Total Packages')); ?></p>
                                  </div>
                                  <div class="col-6 text-right">
                                      <a href="<?php echo e(url('admin/packages')); ?>">
                                        <i class="ttext-primary feather icon-shopping-bag icondashboard" title="<?php echo e(__('Total Packages')); ?>"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End col -->
                  <!-- Start col -->
                  <div class="col-lg-3 col-md-6 col-12 mt-md-3">
                      <div class="card m-b-30 shadow-sm">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col-6">
                                      <h4 id="number7"><?php echo e($coupon_count); ?></h4>
                                      <p class="font-14 mb-0"><?php echo e(__('Total Coupons')); ?></p>
                                  </div>
                                  <div class="col-6 text-right">
                                      <a href="<?php echo e(url('admin/coupons')); ?>">
                                        <i class="text-warning feather icon-percent icondashboard" title="<?php echo e(__('Total Coupons')); ?>"></i>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End col -->
                  <!-- Start col -->
                  <div class="col-lg-3 col-md-6 col-12 mt-md-3">
                      <div class="card m-b-30 shadow-sm">
                          <div class="card-body">
                              <div class="row align-items-center">
                                  <div class="col-6">
                                      <h4 id="number8"><?php echo e($genres_count); ?></h4>
                                      <p class="font-14 mb-0"><?php echo e(__('Total Genres')); ?></p>
                                  </div>
                                  <div class="col-6 text-right">
                                      <a href="<?php echo e(url('admin/genres')); ?>">
                                        <i class="text-info feather icon-radio icondashboard" title="<?php echo e(__('Total Genres')); ?>"></i>
                                      </a>
                                  </div>
                                  
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- End col -->
                  <!-- Start col -->
                  <div class="col-lg-3 col-md-6 col-12">
                    <div class="card m-b-30 shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h4 id="number9"><?php echo e($movieslw); ?></h4>
                                    <p class="font-14 mb-0"><?php echo e(__('Top 10 Movies')); ?></p>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="<?php echo e(url('admin/topmovies')); ?>">
                                      <i class="text-success feather icon-video icondashboard" title="<?php echo e(__('Top 10 Movies')); ?>"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                
              </div>
              <!-- End col -->                  
              <!-- Start row -->
            <div class="row">
                <!-- Start Active Subscribed User-->
                <div class="col-lg-12 col-xl-7">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0"><?php echo e(__('Active Subscribed Users in ' . date('Y'))); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo $activesubsriber->container(); ?>

                        </div>
                    </div>
                </div>
                <!-- End Active Subscribed User -->
                <!-- Start User Distribution -->
                <div class="col-lg-12 col-xl-5">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0"><?php echo e(__('User Distribution')); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo $piechart->container(); ?>

                        </div>
                    </div>
                </div>
                <!-- End User Distribution -->
            </div>
            <!-- End row -->
            <!-- Start Revenue Report -->
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">                                
                        <div class="row align-items-center">
                            <div class="col-9">
                                <h5 class="card-title mb-0"><?php echo e(__('Revenue Reports')); ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="devicetable" class="table table-borderd">
                          <thead>
                            <th> <?php echo e(__('#')); ?></th>
                            <th><?php echo e(__('Payment ID')); ?></th>
                            <th><?php echo e(__('User Name')); ?></th>
                            <th><?php echo e(__('Payment Method')); ?></th>
                            <th><?php echo e(__('Paid Amount')); ?></th>
                            <th><?php echo e(__('Subscription From')); ?></th>
                            <th><?php echo e(__('Subscription To')); ?></th>
                          </thead>
                            <?php if($revenue_report): ?>
                                <tbody>
                                    <?php $__currentLoopData = $revenue_report; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr id="item-<?php echo e($report->id); ?>">
                                        <td><?php echo e($key+1); ?></td>
                                        <td><?php echo e($report->payment_id); ?></td>
                                        <td><?php echo e(ucfirst($report->user_name)); ?></td>
                                        <td><?php echo e($report->method); ?></td>
                                        <td><i class="<?php echo e($currency_symbol); ?>" aria-hidden="true"></i><?php echo e($report->price); ?></td>
                                        <td><?php echo e($report->subscription_from); ?></td>
                                        <td><?php echo e($report->subscription_to); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            <?php endif; ?>
                        </table>                  
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <!-- End Revenue Report -->
              <!-- Start row -->
              <div class="row">
                <!-- Start Video Distributions -->
                <div class="col-lg-12 col-xl-5">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0"><?php echo e(__('Video Distributions')); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo $doughnutchart->container(); ?>

                        </div>
                    </div>
                </div>
                <!-- End Video Distributions -->
                <!-- Start Monthly Registered Users -->
                <div class="col-lg-12 col-xl-7">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0"><?php echo e(__('Monthly Registered Users in ' . date('Y'))); ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php echo $userchart->container(); ?>

                        </div>
                    </div>
                </div>
                <!-- End Monthly Registered Users -->
            </div>
            <!-- End row -->
            <!-- Start row -->
            <div class="row">
                <!-- Start Paypal Subscription -->
                <div class="col-lg-12 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <?php echo $revenue_chart->container(); ?>

                        </div>
                    </div>
                </div>
                <!-- End Paypal Subscription -->                
            </div>

<?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    
  $.fn.jQuerySimpleCounter = function( options ) {
      var settings = $.extend({
          start:  0,
          end:    100,
          easing: 'swing',
          duration: 400,
          complete: ''
      }, options );

      var thisElement = $(this);

      $({count: settings.start}).animate({count: settings.end}, {
      duration: settings.duration,
      easing: settings.easing,
      step: function() {
        var mathCount = Math.ceil(this.count);
        thisElement.text(mathCount);
      },
      complete: settings.complete
    });
  };

    $('#number1').jQuerySimpleCounter({end: <?php echo e($users_count); ?>,duration: 3000});
    $('#number2').jQuerySimpleCounter({end: <?php echo e($activeusers); ?>,duration: 3000});
    $('#number3').jQuerySimpleCounter({end: <?php echo e($movies_count); ?>,duration: 3000});
    $('#number4').jQuerySimpleCounter({end: <?php echo e($tvseries_count); ?>,duration: 3000});
    $('#number5').jQuerySimpleCounter({end: <?php echo e($livetv_count); ?>,duration: 3000});
    $('#number6').jQuerySimpleCounter({end: <?php echo e($package_count); ?>,duration: 3000});
    $('#number7').jQuerySimpleCounter({end: <?php echo e($coupon_count); ?>,duration: 3000});
    $('#number8').jQuerySimpleCounter({end: <?php echo e($genres_count); ?>,duration: 3000});
    $('#number9').jQuerySimpleCounter({end: <?php echo e($movieslw); ?>,duration: 3000});
    $('#number10').jQuerySimpleCounter({end: <?php echo e($seasonlw); ?>,duration: 3000});

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<?php echo $userchart->script(); ?>

<?php echo $activesubsriber->script(); ?>

<?php echo $piechart->script(); ?>

<?php echo $doughnutchart->script(); ?>

<?php echo $revenue_chart->script(); ?>

<script>
    console.clear();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\NexthourWeb\resources\views/admin/index.blade.php ENDPATH**/ ?>