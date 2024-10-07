
<?php $__env->startSection('title',__('All Languages')); ?>
<?php $__env->startSection('breadcum'); ?>
    <div class="breadcrumbbar">
        <h4 class="page-title"><?php echo e(__('All Languages')); ?></h4>
        <div class="breadcrumb-list">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('All Languages')); ?></li>
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
                    <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal"
            data-target="#bulk_delete" title="<?php echo e(__('Delete Selected')); ?>"><i class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?> </button>
            <a href="<?php echo e(route('languages.create')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Add Language')); ?>"><i
                class="feather icon-plus mr-2"></i><?php echo e(__('Add Language')); ?> </a>
                    <h5 class="card-title"><?php echo e(__('All Languages')); ?></h5>
                    
                </div> 
                
                <div class="card-body">
                    <h4 class="card-title"><?php echo e(__('Default Language is ')); ?><?php echo e($dlangs[0]->name); ?></h5>
                    <div class="table-responsive">
                         <table id="languagetable" class="table table-borderd">

                            <thead>
                                <th> <?php echo e(__('#')); ?></th>
                                <th><?php echo e(__('Local')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Default')); ?></th>
                                <th><?php echo e(__('Actions')); ?></th>
                            </thead>

                            <tbody>
                                
                            </tbody>

                            <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                            <div class="delete-icon"></div>
                                        </div>
                                        <div class="modal-body text-center">
                                            <h4 class="modal-heading"><?php echo e(__('Are You Sure ?')); ?></h4>
                                            <p><?php echo e(__('Do you really want to delete selected item names here? This
                                                process
                                                cannot be undone.')); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                          <?php echo Form::open(['method' => 'POST', 'action' => 'LanguageController@bulk_delete', 'id' => 'bulk_delete_form']); ?>

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
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
   
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
  $(function () {
      jQuery.noConflict();
      var table;
      if($.fn.dataTable.isDataTable('#languagetable')){
        table = $('#languagetable').DataTable();
      }else{
        table = $('#languagetable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            scrollCollapse: true,
     
       
            ajax: "<?php echo e(route('languages.index')); ?>",
            columns: [
                {data: 'checkbox', name: 'checkbox',orderable: false, searchable: false},
                {data: 'local', name: 'local'},
                {data: 'name', name: 'name'},
                {data: 'def', name: 'def'},
                
                {data: 'action', name: 'action',searchable: false}
            
            ],
            dom : 'lBfrtip',
            buttons : [
            'csv','excel','pdf','print'
            ],
            order : [[0,'desc']]
        });
      }
    
    
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\NexthourWeb\resources\views/admin/language/index.blade.php ENDPATH**/ ?>