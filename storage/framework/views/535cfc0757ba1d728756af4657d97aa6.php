<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">               
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <div class="vertical-menu-detail">
                
                <div class="tab-content" id="v-pills-tabContent">

                   <div class="tab-pane fade active show" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard">

                    <ul class="vertical-menu">
                        <div class="logobar">
                            <a href="<?php echo e(url('/')); ?>" class="logo logo-large">
                                <img style="object-fit:scale-down;" src="<?php echo e(url('images/logo/'.$logo)); ?>"
                                    class="img-fluid" alt="logo">
                            </a>
                        </div>
                      
                        <li class="<?php echo e(Nav::isRoute('dashboard')); ?>">
                            <a class="nav-link" href="<?php echo e(url('/admin')); ?>">
                                <i class="feather icon-pie-chart text-secondary"></i>
                                <span><?php echo e(__('Dashboard')); ?></span>
                            </a>
                        </li>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['users.view','roles.view'])): ?>
                            <li class="header"><?php echo e(__('USERS')); ?></li>
                            <li class="<?php echo e(Nav::isResource('users')); ?><?php echo e(Nav::isResource('roles')); ?>">
                                <a href="javaScript:void();" class="menu"><i class="feather icon-users text-secondary"></i>
                                    <span><?php echo e(__('Users')); ?><div class="sub-menu truncate"><?php echo e(__('All Users, Roles And Permission')); ?></div></span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.view')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('users')); ?>"
                                            href="<?php echo e(url('/admin/users')); ?>"><?php echo e(__('All Users')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.view')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('roles')); ?>"
                                         href="<?php echo e(route('roles.index')); ?>"><?php echo e(__('Roles And Permission')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.view')): ?>
                        <li class="<?php echo e(Nav::isResource('user-requests')); ?>">
                                <a href="<?php echo e(url('/admin/user-requests')); ?>">
                                    <i class="ion ion-ios-menu text-secondary"></i><span><?php echo e(__('User Delete Requests')); ?></span>
                                </a>
                        </li>
                        <?php endif; ?>
                        <?php if(Module::find('Producer') && Module::find('Producer')->isEnabled()): ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check(['producer-content.manage','packageforproducer.view','pendingrequest.view'])): ?>
                                <li class="<?php echo e(Nav::isResource('paddedmovies')); ?> <?php echo e(Nav::isResource('paddedTvSeries')); ?> <?php echo e(Nav::isResource('paddedLiveTv')); ?>

                                <?php echo e(Nav::isResource('packageforproducer')); ?> <?php echo e(Nav::isResource('pendingrequest')); ?>">
                                    <a href="javaScript:void();" class="menu"><i class="feather icon-users text-secondary"></i>
                                    <span><?php echo e(__('Producer')); ?><div class="sub-menu truncate"><?php echo e(__('Producer Package, Producer Request, Added Movies, Added Tv Series, Added Live Tv, Payment Details, Payment Settings, Revenue Request')); ?></div></span><i class="feather icon-chevron-right"></i>
                                    </a>
                                    <ul class="vertical-submenu">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('packageforproducer.view')): ?>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('packageforproducer')); ?>"
                                             href="<?php echo e(url('/admin/packagesforproducer')); ?>"><?php echo e(__('Producer Package')); ?></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if($button->producer_approval==1): ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pendingrequest.view')): ?>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('pendingrequest')); ?> <?php echo e(Nav::isResource('paymentdetails')); ?> 
                                            <?php echo e(Nav::isResource('producerrevenue')); ?> "
                                            href="<?php echo e(url('/admin/pendingrequest')); ?>"><?php echo e(__('Producer Request')); ?></a>
                                        </li>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('paddedmovies')); ?>" 
                                            href="<?php echo e(route('addedmovies')); ?>"><?php echo e(__('Added Movies')); ?></a>
                                        </li>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('paddedTvSeries')); ?>" 
                                            href="<?php echo e(route('addedTvSeries')); ?>"><?php echo e(__('Added Tv Series')); ?></a>
                                        </li>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('paddedLiveTv')); ?>" 
                                            href="<?php echo e(route('addedLiveTv')); ?>"><?php echo e(__('Added Tv Channel')); ?></a>
                                        </li>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('paymentdetails')); ?>" 
                                            href="<?php echo e(url('/admin/payment-details')); ?>"><?php echo e(__('Payment Details')); ?></a>
                                        </li>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('producerrevenue')); ?>" 
                                            href="<?php echo e(url('/admin/producer-settings')); ?>"><?php echo e(__('Payment Settings')); ?></a>
                                        </li>
                                        <li>
                                            <a class="<?php echo e(Nav::isResource('producerrevenuerequest')); ?>" 
                                            href="<?php echo e(url('/admin/producer-revenue-request')); ?>"><?php echo e(__('Revenue Request')); ?></a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['menu.view','menu.create','menu.edit','menu.delete','package.view','package-feature.view'])): ?>
                            <li class="header"><?php echo e(__('MENU & PACKAGES')); ?></li>
                            <li class="<?php echo e(Nav::isResource('menu')); ?>">
                                <a href="<?php echo e(url('/admin/menu')); ?>">
                                    <i class="ion ion-ios-menu text-secondary"></i><span><?php echo e(__('Menu')); ?></span>
                                </a>
                            </li>
                            <li class="<?php echo e(Nav::isResource('packages')); ?><?php echo e(Nav::isResource('package_feature')); ?>">
                                <a href="javaScript:void();" class="menu"><i class="ion ion-md-paper text-secondary"></i>
                                <span><?php echo e(__('Packages')); ?><div class="sub-menu truncate"><?php echo e(__('Packages, Packages Features')); ?></div></span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package.view')): ?>
                                    <li>
                                         <a class="<?php echo e(Nav::isResource('packages')); ?>"
                                            href="<?php echo e(url('/admin/packages')); ?>"><?php echo e(__('Packages')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('package-feature.view')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('package_feature')); ?>"
                                         href="<?php echo e(url('/admin/package_feature')); ?>"><?php echo e(__('Packages Features')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['movies.view','tvseries.view','livetv.view','liveevent.view','audio.view'])): ?>
                        <li class="header"><?php echo e(__('CONTENT')); ?></li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('movies.view')): ?>
                        <li class="<?php echo e(Nav::isResource('movies')); ?>">
                            <a href="<?php echo e(url('/admin/movies')); ?>">
                                <i class="fa fa-file-movie-o text-secondary"></i></i><span><?php echo e(__('Movie')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tvseries.view')): ?>
                        <li class="<?php echo e(Nav::isResource('tvseries')); ?>">
                            <a href="<?php echo e(url('/admin/tvseries')); ?>">
                                <i class="ion ion-md-tv text-secondary"></i><span><?php echo e(__('Tv Series')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('livetv.view')): ?>
                        <li class="<?php echo e(Nav::isResource('livetv')); ?>">
                            <a href="<?php echo e(url('/admin/livetv')); ?>">
                                <i class="ion ion-ios-tv text-secondary"></i><span><?php echo e(__('Tv Chanel')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audio.view')): ?>
                        <li class="<?php echo e(Nav::isResource('audio')); ?>">
                            <a href="<?php echo e(url('/admin/audio')); ?>">
                                <i class="fa fa-music text-secondary"></i><span><?php echo e(__('Audio')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if(Auth::user()->is_assistant != 1): ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('liveevent.view')): ?>
                        <li class="<?php echo e(Nav::isResource('liveevent')); ?>">
                            <a href="<?php echo e(url('/admin/liveevent')); ?>">
                                <i class="ion ion-md-calendar text-secondary"></i><span><?php echo e(__('Live Event')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <li class="<?php echo e(Nav::isRoute('ebook')); ?>">
                            <a href="<?php echo e(route('ebook')); ?>">
                                <i class="fa fa-book text-secondary"></i><span><?php echo e(__('Ebook')); ?></span>
                            </a>
                        </li>
                        
                        <?php endif; ?>
                        <li class="<?php echo e(Nav::isResource('moviesreq')); ?>">
                            <a href="<?php echo e(url('/admin/movies-req')); ?>">
                                <i class="fa fa-file-movie-o text-secondary"></i></i><span><?php echo e(__('Requested Movies')); ?></span>
                            </a>
                        </li>
                        <?php if(Auth::user()->is_assistant != 1): ?>
                        <?php
                        $config = App\Config::first();
                        ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog.view')): ?>
                        <li class="<?php echo e(Nav::isRoute('blog')); ?>">
                            <a class="nav-link" href="<?php echo e(route('blog.index')); ?>">
                                <i class="ion ion-ios-list-box text-secondary"></i>
                                <span><?php echo e(__('Blog')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="<?php echo e(Nav::isRoute('certificate.index')); ?>">
                                <a href="javaScript:void();">
                                    <i class="feather icon-cpu text-secondary"></i>
                                    <span><?php echo e(__('OpenAi')); ?></span><span class="badge badge-danger">New</span>
                                    <i class="feather icon-chevron-right"></i> 
                                </a>                                
                                <ul class="vertical-submenu">
                                    <li class="">
                                        <a href="<?php echo e(url('admin/services')); ?>" class="menu">
                                            <span><?php echo e(__('Service')); ?></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="<?php echo e(url('user/openai')); ?>" class="menu">
                                            <span><?php echo e(__('User')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                                
                            </li>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['genre.view','actor.view','director.view','audiolanguage.view','label.view'])): ?>
                            <li class="<?php echo e(Nav::isResource('genres')); ?><?php echo e(Nav::isResource('directors')); ?> <?php echo e(Nav::isResource('actors')); ?><?php echo e(Nav::isResource('audio_language')); ?> <?php echo e(Nav::isResource('label')); ?>">
                                <a href="javaScript:void();" class="menu"><i class="ion ion-ios-options text-secondary"></i>
                                    <span><?php echo e(__('Content')); ?><div class="sub-menu truncate"><?php echo e(__('Genres, Directors, Actors, Audio Language, Label')); ?></div></span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('genre.view')): ?>
                                    <li>
                                         <a class="<?php echo e(Nav::isResource('genres')); ?>"
                                            href="<?php echo e(url('/admin/genres')); ?>"><?php echo e(__('Genres')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('actor.view')): ?>
                                    <li>
                                         <a class="<?php echo e(Nav::isResource('directors')); ?>"
                                            href="<?php echo e(url('/admin/directors')); ?>"><?php echo e(__('Directors')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('director.view')): ?>
                                    <li>
                                         <a class="<?php echo e(Nav::isResource('actors')); ?>"
                                            href="<?php echo e(url('/admin/actors')); ?>"><?php echo e(__('Actors')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audiolanguage.view')): ?>
                                    <li>
                                         <a class="<?php echo e(Nav::isResource('audio_language')); ?>"
                                            href="<?php echo e(url('/admin/audio_language')); ?>"><?php echo e(__('Audio Language')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('label.view')): ?>
                                    <li>
                                         <a class="<?php echo e(Nav::isResource('label')); ?>"
                                            href="<?php echo e(url('/admin/label')); ?>"><?php echo e(__('Label')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                        

                       

                       
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['coupon.view','notification.manage','affiliate.settings','pushnotification.settings','affiliate.history','comment-settings.comments','comment-settings.subcomments','fake.views'])): ?>
                            <li class="header"><?php echo e(__('MARKETING & FINANCE')); ?></li>
                            <li class="<?php echo e(Nav::isResource('coupons')); ?> <?php echo e(Nav::isResource('notification')); ?> <?php echo e(Nav::isRoute('admin.affilate.settings')); ?> 
                            <?php echo e(Nav::isRoute('admin.affilate.dashboard')); ?> <?php echo e(Nav::isRoute('admin.comment.index')); ?> <?php echo e(Nav::isRoute('admin.subcomment.index')); ?> 
                            <?php echo e(Nav::isResource('fakeViews')); ?>">
                                <a href="javaScript:void();" class="menu"><i class="socicon-itchio  text-secondary"></i>
                                    <span><?php echo e(__('Marketing')); ?><div class="sub-menu truncate"><?php echo e(__('Coupons, Notification, Affiliate Settings, Affiliate Reports, Comments, Sub Comments, Fake Views')); ?></div></span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon.view')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('coupons')); ?>"
                                            href="<?php echo e(url('/admin/coupons')); ?>"><?php echo e(__('Coupons')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('notification.manage')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('notification')); ?>"
                                         href="<?php echo e(route('notification.create')); ?>"><?php echo e(__('Notification')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('affiliate.settings')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('admin.affilate.settings')); ?>"
                                            href="<?php echo e(route('admin.affilate.settings')); ?>"><?php echo e(__('Affiliate Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('affiliate.history')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('admin.affilate.dashboard')); ?>"
                                         href="<?php echo e(route('admin.affilate.dashboard')); ?>"><?php echo e(__('Affiliate Reports')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comment-settings.comments')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('admin.comment.index')); ?>"
                                            href="<?php echo e(url('/admin/comments')); ?>"><?php echo e(__('Comments')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('comment-settings.subcomments')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('admin.subcomment.index')); ?>"
                                         href="<?php echo e(url('/admin/subcomments')); ?>"><?php echo e(__('Sub Comments')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('fake.views')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('fakeViews')); ?>"
                                            href="<?php echo e(url('/admin/fakeViews')); ?>"><?php echo e(__('Fake Views')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pushnotification.settings')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('admin.push.noti.settings')); ?>" 
                                        href="<?php echo e(route('admin.push.noti.settings')); ?>"><?php echo e(__('Push Notification')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                        
                            
                            <li class="<?php echo e(Nav::isRoute('device_history')); ?> <?php echo e(Nav::hasSegment('report')); ?> 
                            <?php echo e(Nav::isRoute('revenue.report')); ?> <?php echo e(Nav::isRoute('view.track')); ?>">
                                <a href="javaScript:void();"><i class="socicon-itchio text-secondary"></i>
                                    <span><?php echo e(__('Reports')); ?><div class="sub-menu truncate"><?php echo e(__('User Subscription, Stripe Reports, Stripe Reports, Revenue Reports, Revenue Reports')); ?></div></span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if(Auth::user()->is_assistant != 1 && App\PaypalSubscription::count()>0): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports.user-subscription')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('plan')); ?>" 
                                        href="<?php echo e(url('/admin/plan')); ?>"><?php echo e(__('User Subscription')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(env('STRIPE_SECRET') != ""): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports.stripe-report')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::hasSegment('report')); ?>" 
                                        href="<?php echo e(url('admin/report')); ?>"><?php echo e(__('Stripe Reports')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports.device-history')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('device_history')); ?>"
                                         href="<?php echo e(route('device_history')); ?>"><?php echo e(__('Device History')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports.revenue')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('revenue.report')); ?>"
                                        href="<?php echo e(url('admin/report_revenue')); ?>"><?php echo e(__('Revenue Reports')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports.viewtraker')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('view.track')); ?>" 
                                        href="<?php echo e(route('view.track')); ?>"><?php echo e(__('View Tracker')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['wallet.settings','wallet.history'])): ?>
                        <li class="<?php echo e(Nav::isRoute('admin.wallet.settings')); ?>">
                            <a class="nav-link" href="<?php echo e(route('admin.wallet.settings')); ?>">
                                <i class="ion ion-md-wallet text-secondary"></i>
                                <span><?php echo e(__('Wallet')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                       

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['front-settings.sliders','front-settings.sliders','front-settings.auth-customization','pages.view','front-settings.short-promo',
                        'front-settings.social-icon','faq.view','site-settings.style-settings','site-settings.copyrights','site-settings.termsandcondition','site-settings.privacy-policy',
                        'site-settings.refund-policy','site-settings.pwa','site-settings.color-option',])): ?>
                            <li class="header"><?php echo e(__('SETTING')); ?></li>
                            <li class="<?php echo e(Nav::isResource('home_slider')); ?> <?php echo e(Nav::isResource('landing-page')); ?> 
                            <?php echo e(Nav::isResource('auth-page-customize')); ?> <?php echo e(Nav::isRoute('social.ico')); ?> 
                            <?php echo e(Nav::isResource('home-block')); ?> <?php echo e(Nav::isResource('custom_page')); ?> <?php echo e(Nav::isResource('faqs')); ?>

                            <?php echo e(Nav::isRoute('admin.color.scheme')); ?> <?php echo e(Nav::isRoute('pwa.setting.index')); ?> <?php echo e(Nav::isRoute('term_con')); ?>

                            <?php echo e(Nav::isRoute('pri_pol')); ?> <?php echo e(Nav::isRoute('refund_pol')); ?> <?php echo e(Nav::isRoute('copyright')); ?> ">
                                <a href="javaScript:void();"><i class="fa fa-sliders text-secondary"></i>
                                    <span><?php echo e(__('Site-Customization')); ?><div class="sub-menu truncate"><?php echo e(__('Slider Settings, Landing Page, Custom Pages, Sign In Sign Up, Social Url Setting, Promotion Settings, Faq')); ?></div></span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.sliders')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('landing-page')); ?>"
                                         href="<?php echo e(url('admin/customize/landing-page')); ?>"><?php echo e(__('Landing Page')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.sliders')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('admin/appUiShorting')); ?>"
                                         href="<?php echo e(url('admin/appUiShorting')); ?>"><?php echo e(__('App Ui Shorting')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.sliders')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('banneradd')); ?>"
                                         href="<?php echo e(url('admin/banneradd')); ?>"><?php echo e(__('Banner')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pages.view')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('custom_page')); ?>"
                                         href="<?php echo e(url('/admin/custom_page')); ?>"><?php echo e(__('Custom Pages')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.auth-customization')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('auth-page-customize')); ?>"
                                            href="<?php echo e(url('admin/customize/auth-page-customize')); ?>"><?php echo e(__('Sign In Sign Up')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.social-icon')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('social.ico')); ?>"
                                         href="<?php echo e(route('social.ico')); ?>"><?php echo e(__('Social Url Setting')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.sliders')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('home_slider')); ?>"
                                            href="<?php echo e(url('/admin/home_slider')); ?>"><?php echo e(__('Slider Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq.view')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('faqs')); ?>"
                                            href="<?php echo e(url('/admin/faqs')); ?>"><?php echo e(__('Faq')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('front-settings.short-promo')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('home-block')); ?>"
                                            href="<?php echo e(url('/admin/home-block')); ?>"><?php echo e(__('Promotion Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.color-option')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('admin.color.scheme')); ?>" 
                                        href="<?php echo e(route('admin.color.scheme')); ?>"><?php echo e(__('Color Option')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.pwa')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('pwa.setting.index')); ?>" 
                                        href="<?php echo e(route('pwa.setting.index')); ?>"><?php echo e(__('PWA Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.termsandcondition')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('term_con')); ?>" 
                                        href="<?php echo e(url('admin/term&con')); ?>"><?php echo e(__('Terms Condition')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.privacy-policy')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('pri_pol')); ?>" 
                                        href="<?php echo e(url('admin/pri_pol')); ?>"><?php echo e(__('Privacy Policy')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.refund-policy')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('refund_pol')); ?>" 
                                        href="<?php echo e(url('admin/refund_pol')); ?>"><?php echo e(__('Refund Policy')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.style-settings')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('customstyles')); ?>" 
                                        href="<?php echo e(url('admin/custom-style-settings')); ?>"><?php echo e(__('Custom CSS & JS')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.copyrights')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('copyright')); ?>" 
                                        href="<?php echo e(url('admin/copyright')); ?>"><?php echo e(__('Copyright')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['site-settings.genral-settings','site-settings.seo','site-settings.api-settings',
                        'site-settings.social-login-settings','site-settings.chat-setting',
                        
                        'site-settings.player-setting','ads.view','googleads.view',
                        'site-settings.adsense',
                        'site-settings.language'])): ?>
                            <li class="<?php echo e(Nav::isResource('settings')); ?> <?php echo e(Nav::isResource('seo')); ?> <?php echo e(Nav::isResource('mail')); ?> <?php echo e(Nav::isRoute('chat.index')); ?> 
                            <?php echo e(Nav::isRoute('sociallogin')); ?>

                             <?php echo e(Nav::isRoute('adsense')); ?> <?php echo e(Nav::isRoute('player.set')); ?> <?php echo e(Nav::isRoute('ads')); ?>  
                            <?php echo e(Nav::hasSegment('blocker')); ?> <?php echo e(Nav::isResource('languages')); ?> <?php echo e(Nav::isRoute('google.ads')); ?> ">
                                <a href="javaScript:void();"><i class="ion ion-ios-settings text-secondary"></i>
                                    <span><?php echo e(__('Site-Setting')); ?><div class="sub-menu truncate"><?php echo e(__('General Settings, Seo Settings, API Settings, Mail Settings, Social Login Settings, Chat Settings, PWA Settings,  Adsense Settings, Terms Condition, Privacy Policy, Languages, Static Words, Currency')); ?></div></span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.genral-settings')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('settings')); ?>" 
                                        href="<?php echo e(url('admin/settings')); ?>"><?php echo e(__('General Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.seo')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('seo')); ?>" 
                                        href="<?php echo e(url('/admin/seo')); ?>"><?php echo e(__('Seo Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.api-settings')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('mail')); ?>" 
                                        href="<?php echo e(route('mail.getset')); ?>"><?php echo e(__('Mail Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.social-login-settings')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('sociallogin')); ?>" 
                                        href="<?php echo e(url('/admin/social-login')); ?>"><?php echo e(__('Social Login Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.chat-setting')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('chat.index')); ?>" 
                                        href="<?php echo e(route('chat.index')); ?>"><?php echo e(__('Chat Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                   
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.adsense')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('adsense')); ?>" 
                                        href="<?php echo e(url('/admin/adsensesetting')); ?>"><?php echo e(__('Adsense Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    
                                   
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.language')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('languages')); ?>" 
                                        href="<?php echo e(url('/admin/languages')); ?>"><?php echo e(__('Languages')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.currency')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('currency')); ?>" 
                                        href="<?php echo e(route('currency.index')); ?>"><?php echo e(__('Currency')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['site-settings.player-settings','ads.view','googlead.view'])): ?>
                            <li class="<?php echo e(Nav::isRoute('player.set')); ?> <?php echo e(Nav::isRoute('ads')); ?> <?php echo e(Nav::isRoute('google.ads')); ?>">
                                <a href="javaScript:void();"><i class="socicon-play text-secondary"></i>
                                    <span><?php echo e(__('Player Setting')); ?><div class="sub-menu truncate"><?php echo e(__('Player Customization, Advertise, Google Advertise')); ?></div></span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.player-setting')): ?>
                                    <li>
                                         <a class="<?php echo e(Nav::isRoute('player.set')); ?>" 
                                         href="<?php echo e(route('player.set')); ?>"><?php echo e(__('Player Customization')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('googleads.view')): ?>
                                    <li>
                                         <a class="<?php echo e(Nav::isRoute('google.ads')); ?>" 
                                         href="<?php echo e(route('google.ads')); ?>"><?php echo e(__('Google Advertise')); ?></a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if(Module::find('Advertise') && Module::find('Advertise')->isEnabled()): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ads.view')): ?>
                                    <li>
                                         <a class="<?php echo e(Nav::isRoute('ads')); ?>" 
                                         href="<?php echo e(url('admin/ads')); ?>"><?php echo e(__('Advertise')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php endif; ?>

                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['site-settings.manualpayment','manual-payment.view'])): ?>
                            <li class="<?php echo e(Nav::isResource('pgs')); ?> <?php echo e(Nav::isResource('manual.payment.gateway')); ?> <?php echo e(Nav::isResource('manual-payment')); ?>">
                                <a href="javaScript:void();"><i class="ion ion-md-wallet text-secondary"></i>
                                    <span><?php echo e(__('Payment Gateway')); ?><div class="sub-menu truncate"><?php echo e(__('Payment Gateway Settings, Manual Payment Gateway, Payment Transections')); ?></div></span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('app-settings.setting')): ?>
                                    <li>
                                         <a class="<?php echo e(Nav::isResource('appsettpgsings')); ?>" 
                                         href="<?php echo e(url('admin/paymentgatwaysettings')); ?>"><?php echo e(__('Payment Gateway Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manual-payment.view')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('manual.payment.gateway')); ?>" 
                                        href="<?php echo e(route('manual.payment.gateway')); ?>"><?php echo e(__('Manual Payment Gateway')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.manualpayment')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('manual-payment')); ?>" 
                                        href="<?php echo e(url('/admin/manual-payment')); ?>"><?php echo e(__('Payment Transections')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                           
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['app-settings.setting','app-settings.slider'])): ?>
                            <li class="<?php echo e(Nav::isResource('appsettings')); ?> <?php echo e(Nav::isResource('api')); ?> <?php echo e(Nav::isRoute('admob')); ?> <?php echo e(Nav::isResource('appslider')); ?> <?php echo e(Nav::isResource('upi')); ?>">
                                <a href="javaScript:void();"><i class="ion ion-ios-settings text-secondary"></i>
                                    <span><?php echo e(__('App Settings')); ?><div class="sub-menu truncate"><?php echo e(__('Settings, App Slider Settings')); ?></div></span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('app-settings.setting')): ?>
                                    <li>
                                         <a class="<?php echo e(Nav::isResource('appsettings')); ?>" 
                                         href="<?php echo e(url('admin/appsettings')); ?>"><?php echo e(__('Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.api-settings')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('api')); ?>" 
                                        href="<?php echo e(url('admin/api-settings')); ?>"><?php echo e(__('API Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('app-settings.slider')): ?>
                                    <li>
                                         <a class="<?php echo e(Nav::isResource('appslider')); ?>" 
                                         href="<?php echo e(url('admin/appslider')); ?>"><?php echo e(__('App Slider Settings')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if(Module::find('Upi') && Module::find('Upi')->isEnabled()): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isResource('upi')); ?>" href="<?php echo e(route('upi')); ?>">
                                            <?php echo e(__('UPI')); ?>

                                        </a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                           
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['media-manager.manage'])): ?>
                        <li class="<?php echo e(Nav::isRoute('media.manager')); ?>">
                            <a class="nav-link" href="<?php echo e(route('media.manager')); ?>">
                                <i class="ion ion-ios-images text-secondary"></i>
                                <span><?php echo e(__('Media Manager')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?>

                       

                        
                        <li class="header"><?php echo e(__('SUPPORT')); ?></li>
                        
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('producerurl.view')): ?>
                        <li class="<?php echo e(Nav::isResource('ProducerUrl')); ?>">
                            <a href="<?php echo e(url('/producer/url')); ?>">
                                <i class="ion ion-md-link text-secondary"></i><span><?php echo e(__('Profile')); ?></span>
                            </a>
                        </li>
                        <?php endif; ?> 

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['producer-payment.setting'])): ?>
                        <li class="<?php echo e(Nav::isResource('producer-payment')); ?> <?php echo e(Nav::isRoute('view.track')); ?> 
                        <?php echo e(Nav::isRoute('producer.revenue')); ?>">
                            <a href="javaScript:void();"><i class="ion ion-ios-settings text-secondary"></i>
                                <span><?php echo e(__('Producer Settings')); ?><div class="sub-menu truncate"><?php echo e(__('Payment Settings, View Tracker, Producer Revenue')); ?></div></span><i class="feather icon-chevron-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li>
                                    <a class="<?php echo e(Nav::isResource('producer-payment')); ?>" href="<?php echo e(url('/producer/payment-settings')); ?>"><?php echo e(__('Payment Settings')); ?></a>
                                </li>
                                <li>
                                    <a class="<?php echo e(Nav::isRoute('view.track')); ?>" href="<?php echo e(route('view.track')); ?>"><?php echo e(__('View Tracker')); ?></a>
                                </li>
                                <li>
                                    <a class="<?php echo e(Nav::isRoute('producer.revenue')); ?>" href="<?php echo e(url('producer/revenue')); ?>"><?php echo e(__('Producer Revenue')); ?></a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                        


                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['help.import-demo','help.db-backup','help.system-status','help.remove-public','help.clear-cache'])): ?>
                            <li class="<?php echo e(Nav::isRoute('admin.import.demo')); ?> <?php echo e(Nav::isRoute('addonmanger.index')); ?> <?php echo e(Nav::isRoute('admin.backup.settings')); ?> 
                            <?php echo e(Nav::isRoute('system.status')); ?> <?php echo e(Nav::isRoute('clear_cache')); ?> <?php echo e(Nav::isRoute('get.remove.public')); ?>">
                                <a href="javaScript:void();"><i class="ion ion-ios-settings text-secondary"></i>
                                    <span><?php echo e(__('Help And Support')); ?><div class="sub-menu truncate"><?php echo e(__('Database Backup, Import Demo,Add-On, System Status, Remove Public, Clear Cache')); ?></div></span><i class="feather icon-chevron-right"></i>
                                </a>
                                <ul class="vertical-submenu">
                                
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('help.db-backup')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('admin.backup.settings')); ?>"
                                         href="<?php echo e(route('admin.backup.settings')); ?>"><?php echo e(__('Database Backup')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('help.import-demo')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('admin.import.demo')); ?>" 
                                        href="<?php echo e(route('admin.import.demo')); ?>"><?php echo e(__('Import Demo')); ?></a>
                                    </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('addon-manager.manage')): ?>
                                <li>
                                    <a class="<?php echo e(Nav::isRoute('addonmanger.index')); ?>" 
                                     href="<?php echo e(route('addonmanger.index')); ?>">
                                        <span><?php echo e(__('Add-On')); ?></span>
                                    </a>
                                    </li>
                                <?php endif; ?>
                                   
                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('help.remove-public')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('get.remove.public')); ?>" 
                                        href="<?php echo e(route('get.remove.public')); ?>"><?php echo e(__('Remove Public')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('help.clear-cache')): ?>
                                    <li>
                                        <a class="<?php echo e(Nav::isRoute('clear_cache')); ?>" 
                                        href="<?php echo e(route('clear.cache')); ?>"><?php echo e(__('Clear Cache')); ?></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>

                        </ul> 
                    </div>
                    

                </div>
                
            </div>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div><?php /**PATH C:\laragon\www\NexthourWeb\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>