<!-- Start Topbar Mobile -->
<div class="topbar-mobile">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="mobile-logobar">
                <a href="<?php echo e(url('/')); ?>" class="mobile-logo"><img src="<?php echo e(url('images/logo/'.$logo)); ?>" class="img-fluid" alt="logo"></a>
            </div>
            <div class="mobile-togglebar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <div class="topbar-toggle-icon">
                            <a class="topbar-toggle-hamburger" href="javascript:void();">
                                <img src="<?php echo e(url('assets/images/svg-icon/horizontal.svg')); ?>" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                <img src="<?php echo e(url('assets/images/svg-icon/verticle.svg')); ?>" class="img-fluid menu-hamburger-vertical" alt="verticle">
                             </a>
                         </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="menubar">
                            <a class="menu-hamburger" href="javascript:void();">
                                <img src="<?php echo e(url('assets/images/svg-icon/menu.svg')); ?>" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                <img src="<?php echo e(url('assets/images/svg-icon/close.svg')); ?>" class="img-fluid menu-hamburger-close" alt="close">
                             </a>
                         </div>
                    </li>                                
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
$nav_menus=App\Menu::all();
?>
<!-- Start Topbar -->
<div class="topbar">
    <!-- Start row -->
    <div class="row align-items-center">
        <!-- Start col -->
        <div class="col-md-12 align-self-center">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="togglebar">
                        <?php echo $__env->yieldContent('breadcum'); ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="infobar">
                        <ul>
                            <li class="list-inline-item">
                                <div class="languagebar">
                                    <?php if(isset($nav_menus) && count($nav_menus) > 0): ?>
                                    <a href="<?php echo e(isset($nav_menus[0]) ? route('home', $nav_menus[0]->slug) : '#'); ?>" target="_blank"><span class="live-icon"><?php echo e(__('Visit Site')); ?></span>&nbsp;<i class="feather icon-external-link" aria-hidden="true"></i></a>   
                                    <?php else: ?>
                                    <a data-toggle="modal" data-target="#myModal"><span class="live-icon" ><?php echo e(__('Visit Site')); ?></span>&nbsp;<i class="feather icon-external-link" aria-hidden="true"></i></a>
                                    <?php endif; ?>
                                </div>                                 
                            </li>
                            <li class="mt-2 mr-2 list-inline-item">        
                                <a href="#" class="menu-tigger infobar-icon"><img src="<?php echo e(url('assets/images/svg-icon/ai.png')); ?>" class="img-fluid"><span><?php echo e(__('Ai Tool')); ?></span></a>
                                <?php echo $__env->make('admin.openai.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            </li>


                            
                            <li class="list-inline-item">
                                <div class="languagebar">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="live-icon"><?php echo e(Session::has('changed_language') ? Session::get('changed_language') : ''); ?></span><span class="feather icon-chevron-down live-icon"></span></a>
                                        <div class="dropdown-menu animated flipInX" aria-labelledby="languagelink">
                                            <?php if(isset($lang) && count($lang) > 0): ?>
                                            <?php $__currentLoopData = $lang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a class="dropdown-item" href="<?php echo e(route('languageSwitch', $language->local)); ?>">
                                                <i class="feather icon-globe"></i>
                                                <?php echo e($language->name); ?> (<?php echo e($language->local); ?>)</a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        
                                        </div>
                                    </div>
                                </div>                                   
                            </li>
                            <li class="list-inline-item">
                                <div class="profilebar">
                                    <div class="dropdown">
                                        <?php if(Auth::user()->image == NULL): ?>
                                            <a class="dropdown-toggle" href="javascript:void();" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="<?php echo e(url('assets/images/users/profile.svg')); ?>" class="img-fluid" alt="profile"><span class="live-icon"><?php echo e(Auth::user()->name); ?></span><span class="feather icon-chevron-down live-icon"></span></a>
                                        <?php else: ?>
                                            <a class="dropdown-toggle" href="javascript:void();" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="<?php echo e(asset('images/users/' . Auth::user()->image)); ?>" class="img-fluid" alt="profile"><span class="live-icon"><?php echo e(Auth::user()->name); ?></span><span class="feather icon-chevron-down live-icon"></span></a>
                                        <?php endif; ?>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                            <div class="dropdown-item">
                                                <div class="profilename">
                                                <h5><?php echo e(Auth::user()->name); ?></h5>
                                                </div>
                                            </div>
                                            <div class="userbox">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="media dropdown-item">
                                                        <a href="<?php echo e(url('admin/profile')); ?>" class="profile-icon"><img src="<?php echo e(url('assets/images/svg-icon/crm.svg')); ?>" class="img-fluid" alt="user"><?php echo e(__('My Profile')); ?></a>
                                                    </li>
                                                                                                
                                                    <li class="media dropdown-item">
                                                        <a href="<?php echo e(route('custom.logout')); ?>" class="profile-icon"  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><img src="<?php echo e(url('assets/images/svg-icon/logout.svg')); ?>" class="img-fluid" alt="logout"><?php echo e(__('logout')); ?></a>

                                                        <form id="logout-form" action="<?php echo e(route('custom.logout')); ?>" method="GET" style="display: none;">
                                                            <?php echo e(csrf_field()); ?>

                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                   
                            </li>
                        </ul>
                    </div>
                </div>
            </div>            
        </div>
        <!-- End col -->
    </div> 
    <!-- End row -->
</div>
<div class="modal  fade show" id="myModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Visit Site</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            <?php echo e(__('Please Create minimum One menu to visit the site.')); ?>

            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
            </div>
            
        </div>
    </div>
</div>
<!-- Modal -->




<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<!-- End Topbar -->
<!-- Start Breadcrumbbar -->                    
<?php echo $__env->yieldContent('breadcum'); ?>
<!-- End Breadcrumbbar -->
<?php /**PATH C:\laragon\www\NexthourWeb\resources\views/layouts/topbar.blade.php ENDPATH**/ ?>