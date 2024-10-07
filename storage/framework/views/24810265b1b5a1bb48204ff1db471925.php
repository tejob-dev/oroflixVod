
<?php $__env->startSection('title',__('Create Menu')); ?>
<?php $__env->startSection('breadcum'); ?>
  <div class="breadcrumbbar">
    <h4 class="page-title"><?php echo e(__('Create Menu')); ?></h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Create Menu')); ?></li>
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
  <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close" title="<?php echo e(__('Clsoe')); ?>">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  </div>
  <?php endif; ?>
    <div class="col-lg-12">
      <div class="card m-b-50">
        <div class="card-header">
          <a href="<?php echo e(url('/admin/menu')); ?>" class="float-right btn btn-primary-rgba mr-2" title="<?php echo e(__('Back')); ?>"><i
            class="feather icon-arrow-left mr-2"></i><?php echo e(__('Back')); ?></a>
          <h5 class="box-title"><?php echo e(__('Create Menu')); ?></h5>
        </div>
        <div class="card-body ml-2">
          <?php echo Form::open(['method' => 'POST', 'action' => 'MenuController@store', 'files' => true]); ?>

            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="name">
                    <?php echo e(__('Menu Name')); ?>:
                    <sup class="text-danger">*</sup>   
                    <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo e(__('Add project menu from here and must be select any one section otherwise no conetnt show in created menu. Menu show at header.')); ?>">
                      <i class="fa fa-info"></i>
                    </small>                  
                  </label>
                  <input value="<?php echo e(old('name')); ?>" autofocus required name="name" type="text" class="form-control"
                    placeholder="<?php echo e(__('Please Enter Menu Name')); ?>" />
                  <small class="text-danger"> <i class="fa fa-question-circle"></i> <?php echo e(__('Menu Contain Will Following Section. At lease One Section is Required.')); ?></small>
                </div>                
              </div>

              <div class="col-md-7">
              </div>                
                    
              <div class="col-md-4">
                <div class="form-group">
                  <label>
                      <input type="checkbox" value="1" class="custom_toggle" id="recent_added" name="section[1]" />
                      <label for="recent_added" class="material-checkbox"></label>
                    <?php echo e(__('Recently Added')); ?> 
                  </label>
                  <br>
                  <div style="display: none" class="section1">
                      <div class="form-group">
                        <label><?php echo e(__('Limit')); ?>:</label>
                        <input id="limit1" type="number" min="1" name="limit[1]" class="form-control">
                      </div>

                       <div class="form-group">
                        <label><?php echo e(__('View In')); ?>:</label>
                        <select name="view[1]" id="select1" class="form-control">
                          <option value="1"><?php echo e(__('Slider View')); ?></option>
                          <option value="0"><?php echo e(__('Grid View')); ?></option>
                        </select>
                      </div>
                  </div>
      
                  <div style="display: none" class="section1">                     
                       <div class="form-group">
                        <label><?php echo e(__('Order In')); ?>:</label>
                        <select name="order[1]" id="select1" class="form-control">
                          <option value="1"><?php echo e(__('DESC Order')); ?></option>
                          <option value="0"><?php echo e(__('ASC Order')); ?></option>
                        </select>
                      </div>
                  </div>
                </div>
              </div>

                    <div class="col-md-4">
                      <div class="form-group">
                    <label>
                        <input type="checkbox" value="2" class="custom_toggle" id="genre_added" name="section[2]" />
                        <label for="genre_added" class="material-checkbox"></label>
                      <?php echo e(__('Genre')); ?> 
                    </label>
                    <div style="display: none" class="section2">
                        <div class="form-group">
                          <label><?php echo e(__('Limit')); ?>:</label>
                          <input id="limit2" type="number" min="1" name="limit[2]" class="form-control">
                        </div>
      
                        <div class="form-group">
                          <label for="All Genre"><?php echo e(__('Select Genre')); ?></label> <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Please select these genre you want to show on home page')); ?>"></i><br/>
                          <select name="genre_id[]" id="" class="form-control select2" multiple="">
                             <?php if($all_genre): ?>
                              <?php $__currentLoopData = $all_genre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($genre->id); ?>"><?php echo e($genre->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          </select>
                        </div>
      
                         <div class="form-group">
                          <label><?php echo e(__('View In')); ?>:</label>
                          <select name="view[2]" id="select2" class="form-control">
                            <option value="1"><?php echo e(__('Slider View')); ?></option>
                            <option value="0"><?php echo e(__('Grid View')); ?></option>
                          </select>
                        </div>
                    </div>
                    <div style="display: none" class="section2">
                 
                      <div class="form-group">
                       <label><?php echo e(__('Order In')); ?>:</label>
                       <select name="order[2]" id="select2" class="form-control">
                         <option value="1"><?php echo e(__('DESC Order')); ?></option>
                         <option value="0"><?php echo e(__('ASC Order')); ?></option>
                       </select>
                     </div>
                 </div>
                      </div>
                    </div>
                 <br>

                 <div class="col-md-4">
                  <div class="form-group">
                 <label>
                    <input type="checkbox" value="3" class="custom_toggle" id="featured" name="section[3]" />
                    <label for="featured" class="material-checkbox"></label>
                  <?php echo e(__('Featured')); ?>

                </label>
             
                  <div style="display: none" class="section3">
                    <div class="form-group">
                      <label><?php echo e(__('Limit')); ?>:</label>
                      <input id="limit3" type="number" min="1" name="limit[3]" class="form-control">
                    </div>
  
                     <div class="form-group">
                      <label><?php echo e(__('View In')); ?>:</label>
                      <select name="view[3]" id="select3" class="form-control">
                       <option value="1"><?php echo e(__('Slider View')); ?></option>
                        <option value="0"><?php echo e(__('Grid View')); ?></option>
                      </select>
                    </div>
                </div>
  
                 <div style="display: none" class="section3">
                   
                     <div class="form-group">
                      <label><?php echo e(__('Order In')); ?>:</label>
                      <select name="order[3]" id="select3" class="form-control">
                        <option value="1"><?php echo e(__('DESC Order')); ?></option>
                        <option value="0"><?php echo e(__('ASC Order')); ?></option>
                      </select>
                    </div>
                </div>
                  </div>
                 </div>
                <br>
                <div class="col-md-4">
                  <div class="form-group">
                <label>
                    <input type="checkbox" value="4" class="custom_toggle" id="intrest" name="section[4]" />
                    <label for="intrest" class="material-checkbox"></label>
                  <?php echo e(__('Best On Intrest')); ?>

                </label>
             
                  <div style="display: none" class="section4">
                    <div class="form-group">
                      <label><?php echo e(__('Limit')); ?>:</label>
                      <input id="limit4" type="number" min="1" name="limit[4]" class="form-control">
                    </div>
  
                     <div class="form-group">
                      <label><?php echo e(__('View In')); ?>:</label>
                      <select name="view[4]" id="select4" class="form-control">
                        <option value="1"><?php echo e(__('Slider View')); ?></option>
                        <option value="0"><?php echo e(__('Grid View')); ?></option>
                      </select>
                    </div>
                </div>
  
                 <div style="display: none" class="section4">
                   
                     <div class="form-group">
                      <label><?php echo e(__('OrderIn')); ?>:</label>
                      <select name="order[4]" id="select4" class="form-control">
                       <option value="1"><?php echo e(__('DESC Order')); ?></option>
                        <option value="0"><?php echo e(__('ASC Order')); ?></option>
                      </select>
                    </div>
                </div>
                  </div>
                </div>
                <br/>
                <div class="col-md-4">
                  <div class="form-group">
                <label>
                    <input type="checkbox" value="5" class="custom_toggle" id="history" name="section[5]" />
                    <label for="history" class="material-checkbox"></label>
                  <?php echo e(__('Continue Watch')); ?>

                </label>
             
                  <div style="display: none" class="section5">
                    <div class="form-group">
                      <label><?php echo e(__('Limit')); ?>:</label>
                      <input id="limit5" type="number" min="1" name="limit[5]" class="form-control">
                    </div>
  
                     <div class="form-group">
                      <label><?php echo e(__('View In')); ?>:</label>
                      <select name="view[5]" id="select5" class="form-control">
                       <option value="1"><?php echo e(__('Slider View')); ?></option>
                        <option value="0"><?php echo e(__('Grid View')); ?></option>
                      </select>
                    </div>
                </div>
  
                <div style="display: none" class="section5">
                   
                    <div class="form-group">
                      <label><?php echo e(__('Order In')); ?>:</label>
                      <select name="order[5]" id="select5" class="form-control">
                        <option value="1"><?php echo e(__('DESC Order')); ?></option>
                        <option value="0"><?php echo e(__('ASC Order')); ?></option>
                      </select>
                    </div>
                </div>
                  </div>
                </div>
                <br/>
  
                <div class="col-md-4">
                  <div class="form-group">
                 <label>
                  <input type="checkbox" value="6" class="custom_toggle" id="language" name="section[6]" />
                    <label for="language" class="material-checkbox"></label>
                 <?php echo e(__('Languages')); ?>

                </label>
             
                  <div style="display: none" class="section6">
                    <div class="form-group">
                      <label><?php echo e(__('Limit')); ?>:</label>
                      <input id="limit6" type="number" min="1" name="limit[6]" class="form-control">
                    </div>
  
                     <div class="form-group">
                      <label><?php echo e(__('View In')); ?>:</label>
                      <select name="view[6]" id="select6" class="form-control">
                       <option value="1"><?php echo e(__('Slide View')); ?></option>
                        <option value="0"><?php echo e(__('Grid View')); ?></option>
                      </select>
                    </div>
                </div>
  
                <div style="display: none" class="section6">
                   
                    <div class="form-group">
                      <label><?php echo e(__('Order In')); ?>:</label>
                      <select name="order[6]" id="select6" class="form-control">
                        <option value="1"><?php echo e(__('DESC Order')); ?></option>
                        <option value="0"><?php echo e(__('ASC Order')); ?></option>
                      </select>
                    </div>
                </div>
                  </div>
                </div>

                <br/>
                <div class="col-md-4">
                  <div class="form-group">
                  <label>
                    <input type="checkbox" value="7" class="custom_toggle" id="pramotion" name="section[7]" />
                    <label for="pramotion" class="material-checkbox"></label>
                  <?php echo e(__('Movie Tv Series Pramotion')); ?>

                </label>
                  </div>
                </div>
                <br/>
                <div class="col-md-4">
                  <div class="form-group">
                <label>
                  <input type="checkbox" value="8" class="custom_toggle" id="blog" name="section[8]" />
                    <label for="blog" class="material-checkbox"></label>
                  <?php echo e(__('Blog')); ?>

                </label>
                  </div>
                </div>
  
                <br/>
                <div class="col-md-4">
                  <div class="form-group">
                 <label>
                  <input type="checkbox" value="9" class="custom_toggle" id="upcoming" name="section[9]" />
                    <label for="upcoming" class="material-checkbox"></label>
                  <?php echo e(__('Upcoming Movie')); ?>

                </label>
             
                  <div style="display: none" class="section9">
                    <div class="form-group">
                      <label><?php echo e(__('Limit')); ?>:</label>
                      <input id="limit9" type="number" min="1" name="limit[9]" class="form-control">
                    </div>
  
                     <div class="form-group">
                      <label><?php echo e(__('View In')); ?>:</label>
                      <select name="view[9]" id="select9" class="form-control">
                       <option value="1"><?php echo e(__('Slider View')); ?></option>
                        <option value="0"><?php echo e(__('Grid View')); ?></option>
                      </select>
                    </div>
                </div>
  
                 <div style="display: none" class="section9">
                   
                     <div class="form-group">
                      <label><?php echo e(__('Order In')); ?>:</label>
                      <select name="order[9]" id="select9" class="form-control">
                        <option value="1"><?php echo e(__('DESC Order')); ?></option>
                        <option value="0"><?php echo e(__('ASC Order')); ?></option>
                      </select>
                    </div>
                </div>
                  </div>
                </div>
                <br>
                <div class="col-md-4">
                  <div class="form-group">
                <label>
                  <input type="checkbox" value="10" class="custom_toggle" id="liveevent" name="section[10]" />
                    <label for="liveevent" class="material-checkbox"></label>
                  <?php echo e(__('Live Event')); ?>

                </label>
                  </div>
                </div>
                <br/>
                <div class="col-md-4">
                  <div class="form-group">
                <label>
                  <input type="checkbox" value="11" class="custom_toggle" id="audio" name="section[11]" />
                    <label for="audio" class="material-checkbox"></label>
                  <?php echo e(__('Audio')); ?>

                </label>
                  </div>
                </div>
                <br>
                
                <?php if($topsection == 1): ?>
                <div class="col-md-4">
                  <div class="form-group">
                 <label>
                    <input type="checkbox" value="12" class="custom_toggle" id="toprated" name="section[12]" />
                      <label for="toprated" class="material-checkbox"></label>
                    <?php echo e(__('Top Rated Section')); ?>

                  </label>
                  </div>
                </div>
                  <br/>
                <?php endif; ?>
            
                <div class="col-md-12">
                  <div class="form-group">
                    <button type="reset" class="btn btn-success-rgba" title="<?php echo e(__('Reset')); ?>"><?php echo e(__('Reset')); ?></button>
                    <button type="submit" class="btn btn-primary-rgba" title="<?php echo e(__('Create')); ?>"><i class="fa fa-check-circle"></i>
                      <?php echo e(__('Create')); ?></button>
                  </div>
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
    
  $('#recent_added').on('change',function(){
       
      if($(this).is(':checked')){
          $('.section1').show('fast');
          $('#limit1').attr('required','required');
          $('#order1').attr('required','required');
          $('#select1').attr('required','required');
      }else{
        $('.section1').hide('fast');
        $('#limit1').removeAttr('required');
         $('#order1').removeAttr('required','required');
        $('#select1').removeAttr('required');
      }
  });

  $('#genre_added').on('change',function(){
      if($(this).is(':checked')){
        $('.section2').show('fast');
        $('#limit2').attr('required','required');
         $('#order2').attr('required','required');
        $('#select2').attr('required','required');
      }else{
        $('.section2').hide('fast');
        $('#limit2').removeAttr('required');
         $('#order2').removeAttr('required','required');
        $('#select2').removeAttr('required');
      }
  });

  $('#featured').on('change',function(){
      if($(this).is(':checked')){
        $('.section3').show('fast');
        $('#limit3').attr('required','required');
         $('#order3').attr('required','required');
        $('#select3').attr('required','required');
      }else{
        $('.section3').hide('fast');
        $('#limit3').removeAttr('required');
         $('#order3').removeAttr('required','required');
        $('#select3').removeAttr('required');
      }
  });

  $('#intrest').on('change',function(){
      if($(this).is(':checked')){
        $('.section4').show('fast');
        $('#limit4').attr('required','required');
         $('#order4').attr('required','required');
        $('#select4').attr('required','required');
      }else{
        $('.section4').hide('fast');
        $('#limit4').removeAttr('required');
         $('#order4').removeAttr('required','required');
        $('#select4').removeAttr('required');
      }
  });

  $('#history').on('change',function(){
      if($(this).is(':checked')){
        $('.section5').show('fast');
        $('#limit5').attr('required','required');
         $('#order5').attr('required','required');
        $('#select5').attr('required','required');
      }else{
        $('.section5').hide('fast');
        $('#limit5').removeAttr('required');
         $('#order5').removeAttr('required','required');
        $('#select5').removeAttr('required');
      }
  });

  $('#language').on('change',function(){
      if($(this).is(':checked')){
        $('.section6').show('fast');
        $('#limit6').attr('required','required');
         $('#order6').attr('required','required');
        $('#select6').attr('required','required');
      }else{
        $('.section6').hide('fast');
        $('#limit6').removeAttr('required');
         $('#order6').removeAttr('required','required');
        $('#select6').removeAttr('required');
      }
  });



</script>
<script>
  (function($){
    $.noConflict();
     
  })(jQuery);    
</script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\NexthourWeb\resources\views/admin/menu/create.blade.php ENDPATH**/ ?>