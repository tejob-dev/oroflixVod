
<?php $__env->startSection('title',__('All Packages')); ?>
<?php $__env->startSection('breadcum'); ?>
  <div class="breadcrumbbar">
                <h4 class="page-title"><?php echo e(__('Package')); ?></h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                      <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Package')); ?></li>
                    </ol>
                </div>  
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar"> 
    <div class="row">
        <div class="col-md-12">

            <div class="card m-b-50">
                <div class="card-header">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package.delete')): ?>
              <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal"
            data-target="#bulk_delete" title="<?php echo e(__('Delete Selected')); ?>"><i class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?> </button>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package.create')): ?>
            <a href="<?php echo e(route('packages.create')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Create Package')); ?>"><i
                class="feather icon-plus mr-2"></i><?php echo e(__('Create Package')); ?> </a>
            <?php endif; ?>
                    <h5 class="card-title"><?php echo e(__('All Packages')); ?></h5>
                    
                </div> 

                <div class="card-body">
                    <div class="table-responsive">
                         <table id="full_detail_table" class="table table-borderd">

                            <thead>
                                <th> <?php echo e(__('#')); ?></th>
                                <th> <?php echo e(__('ID')); ?></th>
                                <th><?php echo e(__('PACKAGE NAME')); ?></th>
                                <th><?php echo e(__('AMOUNT')); ?></th>
                                <th><?php echo e(__('INTERVAL')); ?></th>
                                <th><?php echo e(__('INTERVAL COUNT')); ?></th>
                                <th><?php echo e(__('TRIAL PERIOD')); ?></th>
                                <th><?php echo e(__('STATUS')); ?></th>
                                <th><?php echo e(__('ACTIONS')); ?></th>
                            </thead>

                            <?php if($packages): ?>
          <tbody id="sortable">
            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           

              <tr  class="sortable row1" data-id="<?php echo e($package->id); ?>">
                <td>
                  <div class="inline">
                    <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="<?php echo e($package->id); ?>" id="checkbox<?php echo e($package->id); ?>">
                    <label for="checkbox<?php echo e($package->id); ?>" class="material-checkbox"></label>
                  </div>
                </td>
                <td><?php echo e($key+1); ?></td>
                <td><?php echo e($package->name); ?></td>
                <td><?php if($package->amount != '0.00'): ?> <i class="<?php echo e($package->currency_symbol); ?>"></i><?php echo e($package->amount); ?> <?php else: ?> Free <?php endif; ?></td>
                <td><?php echo e($package->interval); ?></td>
                <td><?php echo e($package->interval_count); ?></td>
                <td>
                  <?php if($package->trial_period_days == NULL): ?>
                  0
                  <?php else: ?>
                  <?php echo e($package->trial_period_days); ?></td>
                  <?php endif; ?>
                <td>
                  <form action="<?php echo e(route('pkgstatus',$package->id)); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                  <?php if($package->status == 'active' || $package->status == 'upcoming'): ?>
                  <input type="hidden" value="inactive" name="status">
                  <button type="submit" class="btn btn-rounded btn-danger" title="<?php echo e(__('Deactivate')); ?>"><?php echo e(__('Deactivate')); ?></button>
                  <?php else: ?>
                  <input type="hidden" value="active" name="status">
                  <button type="submit" class="btn btn-rounded btn-success" title="<?php echo e(__('Activate')); ?>"><?php echo e(__('Activate')); ?></button>
                  <?php endif; ?>
                  </form>
                </td>
                <td>
                  <div class="admin-table-action-block">
                    <?php if($package->delete_status != 1): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package.edit')): ?>
                    <a class="btn btn-round btn-outline-primary" href="<?php echo e(route('packages.edit', $package->id)); ?>" data-original-title="<?php echo e(__('Restore Package')); ?>" ><i class="fa fa-pencil"></i></a>
                    <?php endif; ?>
                    
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package.delete')): ?>
                    <button data-toggle="modal" data-target="#deleteModal<?php echo e($package->id); ?>" class="btn btn-round btn-outline-danger"><i class="fa fa-trash"></i></button>
                    <?php endif; ?>
                  <?php else: ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package.edit')): ?>
                    <a class="btn btn-round btn-outline-primary" href="<?php echo e(route('packages.edit', $package->id)); ?>"> <i class="fa fa-pencil"></i></a>
                    <?php endif; ?>
                  <?php endif; ?>
                   
                  </div>
                </td>
              </tr>
              
              <!-- Delete Modal -->
              <div id="deleteModal<?php echo e($package->id); ?>" class="delete-modal modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <div class="delete-icon"></div>
                    </div>
                    <div class="modal-body text-center">
                      <h4 class="modal-heading"><?php echo e(__('Are You Sure ?')); ?></h4>
                      <p><?php echo e(__('Do you really want to delete selected item names here? This
                          process
                          cannot be undone.')); ?></p>
                  </div>
                    <div class="modal-footer">
                      <form method="POST" action="<?php echo e(route("packages.destroy", $package->id)); ?>">
                        <?php echo method_field("DELETE"); ?>
                        <?php echo csrf_field(); ?>
                        <button type="reset" class="btn btn-secondary translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Soft Delete Modal -->
              <div id="<?php echo e($package->id); ?>deleteModal" class="delete-modal modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <div class="delete-icon"></div>
                    </div>
                    <div class="modal-body text-center">
                      <h4 class="modal-heading"><?php echo e(__('Are You Sure ?')); ?></h4>
                      <p><?php echo e(__('Do you really want to delete selected item names here? This
                          process
                          cannot be undone.')); ?></p>
                  </div>
                    <div class="modal-footer">
                      <?php echo Form::open(['method' => 'DELETE', 'action' => ['PackageController@softDelete', $package->id]]); ?>

                      <button type="reset" class="btn btn-secondary translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                      <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                      <?php echo Form::close(); ?>

                    </div>
                  </div>
                </div>
              </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        <?php endif; ?>
        <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
          <div class="modal-dialog modal-sm">
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <div class="delete-icon"></div>
                  </div>
                  <div class="modal-body text-center">
                      <h4 class="modal-heading"><?php echo e(__('Are You Sure ?')); ?></h4>
                      <p><?php echo e(__('Do you really want to delete selected item names here? This
                          process
                          cannot be undone.')); ?></p>
                  </div>
                  <div class="modal-footer">
                    <?php echo Form::open(['method' => 'POST', 'action' => 'PackageController@bulk_delete', 'id' => 'bulk_delete_form']); ?>

                          <?php echo method_field('POST'); ?>
                          <button type="reset" class="btn btn-secondary translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                          <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                      <?php echo Form::close(); ?>

                  </div> 
              </div>
          </div>
      </div>
      </table>                                         
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(url('assets/plugins/tabledit/jquery.tabledit.js')); ?>"></script>     
    <script src="<?php echo e(url('assets/js/custom/custom-table-editable.js')); ?>"></script>
  
    <script>
      $(function(){
        $('#checkboxAll').on('change', function(){
          if($(this).prop("checked") == true){
            $('.material-checkbox-input').attr('checked', true);
          }
          else if($(this).prop("checked") == false){
            $('.material-checkbox-input').attr('checked', false);
          }
        });
      });
    </script>
  
    <script>
      $(function() {
        $('#cb3').change(function() {
          $('#status').val(+ $(this).prop('checked'))
        })
      })
    </script>
  
  <script>
      
      var sorturl = <?php echo json_encode(route('package_reposition')); ?>;
  
      </script>
  
      <script>
        $(function(){
          jQuery.noConflict();
          $('#checkboxAll').on('change', function(){
              if($(this).prop("checked") == true){
              $('.material-checkbox-input').attr('checked', true);
              }
              else if($(this).prop("checked") == false){
              $('.material-checkbox-input').attr('checked', false);
              }
          });

          $( "#full_detail_table" ).sortable({
            items: "tr",
            cursor: 'move',
            opacity: 0.6,
            update: function() {
              sendOrderToServer();
            }
          });
        });
  
  
      
  
      function sendOrderToServer() {
      var order = [];
      var token = $('meta[name="csrf-token"]').attr('content');
      $('tr.row1').each(function(index,element) {
          order.push({
          id: $(this).attr('data-id'),
          position: index+1
          });
      });
      $.ajax({
          type: "POST", 
          dataType: "json", 
          url: sorturl,
          data: {
              order: order,
          _token: token
          },
          success: function(response) {
              if (response.status == "success") {
              console.log(response);
              } else {
              console.log(response);
              }
          }
      });
      }
          
      </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\NexthourWeb\resources\views/admin/package/index.blade.php ENDPATH**/ ?>