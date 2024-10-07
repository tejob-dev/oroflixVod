<!DOCTYPE html>
<html lang="en" <?php if(selected_lang()->rtl == 1): ?> dir="rtl" <?php endif; ?>>
<head>
  <title><?php echo e($w_title); ?></title>
  <meta charset="utf-8" />  
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta name="Description" content="<?php echo e($description); ?>" />
  <meta name="keyword" content="<?php echo e($w_title); ?>, <?php echo e($keyword); ?>">
  <meta name="MobileOptimized" content="320" />
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">  
  <link rel="icon" type="image/icon" href="<?php echo e(url('images/favicon/'.$favicon)); ?>"> <!-- favicon-icon -->
  <!-- theme style -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet"> <!-- google font -->
  <?php if(selected_lang()->rtl == 0): ?>
    <link href="<?php echo e(url('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
  <?php else: ?>
    <link href="<?php echo e(url('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
    <link href="<?php echo e(url('css/bootstrap.rtl.min.css')); ?>" rel="stylesheet" type="text/css"/><!-- bootstrap rtl css -->
  <?php endif; ?>
  <link href="<?php echo e(url('css/video_v6-js.css')); ?>" rel="stylesheet"> <!-- videojs css -->
  <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css"/> <!-- fontawsome css -->

    <?php echo NoCaptcha::renderJs(); ?>

  
    <?php
if(Schema::hasTable('color_schemes')){
  $color = App\ColorScheme::first();
}
?>
<?php if(isset($color)): ?>
<?php if($color->color_scheme == 'dark'): ?>

  <style type="text/css">
    
   :root {
   
    --body_bg_color: #111;
    --btn-prime_bg_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
    --footer_bg_color: <?php echo e($color->custom_footer_background_color != NULL ? $color->custom_footer_background_color : $color->default_footer_background_color); ?>;
    --background_black_bg_color: #111;
    --background_white_bg_color: #FFF;
    --background_dark-black_bg_color: #000;
    --back2top_bg_color: #DDD;
    --bg-success_bg_color: #198754;
    --blue_bg_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
    --light-blue_bg_color: #90DFFE;
    --watchhistory_remove_bg_color: #D9534F;
    --btn-default_bg_color: #515151;

    --blue_border_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
    --light-grey_border_color: #B1B1B1;
    --btn-prime_border_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
    --see-more_border_color: #B1B1B1;
    --btn-default_border_color: #515151;

    --text_blue_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
    --text_black_color: #111;
    --text_light_grey_color: #B1B1B1;
    --text_light_blue_color: <?php echo e($color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color); ?>;
    --text_grey_color: #949494;
    --text_white_color: #FFF;

    /*add more */
    --navigation_bg_color: <?php echo e($color->custom_navigation_color != NULL ? $color->custom_navigation_color : $color->default_navigation_color); ?>;
    --back2top_bg_color_on_hover:  <?php echo e($color->custom_back_to_top_bgcolor_on_hover != NULL ? $color->custom_back_to_top_bgcolor_on_hover : $color->default_back_to_top_bgcolor_on_hover); ?>;
    --back2top_color_on_hover: <?php echo e($color->custom_back_to_top_color_on_hover != NULL ? $color->custom_back_to_top_color_on_hover : $color->default_back_to_top_color_on_hover); ?>;
    
    }
  </style>
<?php else: ?>
  <style type="text/css">
   :root {
 
      --body_bg_color: #111;
      --btn-prime_bg_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
      --footer_bg_color: <?php echo e($color->custom_footer_background_color != NULL ? $color->custom_footer_background_color : $color->default_footer_background_color); ?>;
      --background_black_bg_color: #111;
      --background_white_bg_color: #FFF;
      --background_dark-black_bg_color: #000;
      --back2top_bg_color: #DDD;
      --bg-success_bg_color: #198754;
      --blue_bg_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
      --light-blue_bg_color: <?php echo e($color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color); ?>;
      --watchhistory_remove_bg_color: #D9534F;
      --btn-default_bg_color: #515151;

      --blue_border_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
      --light-grey_border_color: #B1B1B1;
      --btn-prime_border_color: <?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
      --see-more_border_color: #B1B1B1;
      --btn-default_border_color: <?php echo e($color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color); ?>;

      --text_blue_color:<?php echo e($color->custom_text_color != NULL ? $color->custom_text_color : $color->default_text_color); ?>;
      --text_black_color: #111;
      --text_light_grey_color: #B1B1B1;
      --text_light_blue_color: <?php echo e($color->custom_text_on_color != NULL ? $color->custom_text_on_color : $color->default_text_on_color); ?>;
      --text_grey_color: #949494;
      --text_white_color: #FFF;

      --white: #FFF;

      --navigation_bg_color: <?php echo e($color->custom_navigation_color != NULL ? $color->custom_navigation_color : $color->default_navigation_color); ?>;
      --back2top_bg_color_on_hover:  <?php echo e($color->custom_back_to_top_bgcolor_on_hover != NULL ? $color->custom_back_to_top_bgcolor_on_hover : $color->default_back_to_top_bgcolor_on_hover); ?>;
      --back2top_color_on_hover: <?php echo e($color->custom_back_to_top_color_on_hover != NULL ? $color->custom_back_to_top_color_on_hover : $color->default_back_to_top_color_on_hover); ?>;
    }
  </style>
<?php endif; ?>
<?php if($color->color_scheme == 'light'): ?>
  <?php if(selected_lang()->rtl == 0): ?>
    <link href="<?php echo e(url('css/style-light.css')); ?>" rel="stylesheet" type="text/css"/> 
  <?php else: ?>
    <link href="<?php echo e(url('css/style-light-rtl.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php endif; ?>
<?php else: ?>
  <?php if(selected_lang()->rtl == 0): ?>
    <link href="<?php echo e(url('css/style.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php else: ?>
    <link href="<?php echo e(url('css/style-rtl.css')); ?>" rel="stylesheet" type="text/css"/>
  <?php endif; ?>
<?php endif; ?>
<?php endif; ?>
  <link href="<?php echo e(asset('css/custom-style.css')); ?>" rel="stylesheet" type="text/css"/>
</head>
<body class="bg-black">
  <div class="signup__container container">
    <div class="row"> 
      <div class="col-sm-6 col-md-offset-2 col-md-4 pad-0">
        <div class="container__child signup__thumbnail" style="background-image: url(<?php echo e(asset('images/login/'.$auth_customize->image)); ?>);">
          <div class="thumbnail__logo">
            <?php if($logo != null): ?>
              <a href="<?php echo e(url('/')); ?>" title="<?php echo e($w_title); ?>"><img src="<?php echo e(asset('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>"></a>
            <?php endif; ?>
          </div>
          <div class="thumbnail__content text-center">
            <?php echo $auth_customize->detail; ?>

          </div>
          
          <div class="signup__overlay"></div>
        </div>
         <div class="signup-thumbnail">
          <?php if($logo != null): ?>
              <a href="<?php echo e(url('/')); ?>" title="<?php echo e($w_title); ?>"><img src="<?php echo e(asset('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>"></a>
            <?php endif; ?>  
        </div>
      </div>
      <div class="col-sm-6 col-md-4 pad-0">
        <div class="container__child signup__form">
          <form method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
              <label for="name"><?php echo e(__('Username')); ?>*</label>
              <input id="name" type="text" class="form-control" name="name" placeholder="<?php echo e(__('Enter Your Username')); ?>"value="<?php echo e(old('name')); ?>" required autofocus>
              <?php if($errors->has('name')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
              <?php endif; ?>
            </div>
            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
              <label for="email"><?php echo e(__('Email')); ?>*</label>
              <input id="email" type="text" class="form-control" name="email" placeholder="<?php echo e(__('Enter Your Email')); ?>" value="<?php echo e(old('email')); ?>" required autofocus>
              <?php if($errors->has('email')): ?>
                <span class="help-block">
                  <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
              <?php endif; ?>
            </div>
            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <label for="password"><?php echo e(__('Password')); ?>*</label>
              <input id="password" type="password" class="form-control" name="password" placeholder="<?php echo e(__('Enter Your Password')); ?>" value="<?php echo e(old('password')); ?>" required>
                <?php if($errors->has('password')): ?>
                  <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                  </span>
                <?php endif; ?>
            </div>
            <div class="form-group">
              <label for="password-confirm"><?php echo e(__('Confirm Password')); ?>*</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="<?php echo e(__('Enter Your Password Again')); ?>" required>
            </div>
            <div class="form-group">
              <label for="number"><?php echo e(__('Number')); ?>*</label>
              <input id="number" type="number" class="form-control" name="mobile" placeholder="<?php echo e(__('Enter Your Number')); ?>" required>
            </div>
            
            <?php if($af_system->enable_affilate == 1): ?>
              <div class="form-group<?php echo e($errors->has('refer_code') ? ' has-error' : ''); ?>">
                <label for="refercode"><?php echo e(__('Refer code')); ?></label>
                <input id="refer_code" type="text" class="form-control" name="refer_code" placeholder="<?php echo e(__('Enter Refer Code')); ?>" value="<?php echo e(app('request')->input('refercode') ?? old('refer_code')); ?>" >
                  <?php if($errors->has('refer_code')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('refer_code')); ?></strong>
                    </span>
                  <?php endif; ?>
              </div>
            <?php endif; ?>
          
            
              


            
            <br/>

            <div class="g-recaptcha mb-3"
                                                    data-sitekey="<?php echo e(config('services.recaptcha.site_key')); ?>"
                                                    data-callback='onSubmit' data-action='Create Account'>
                                                </div>

            <div class="m-t-lg">
              <input class="btn btn--form btn--form-login" type="submit" value=<?php echo e(__('Register')); ?> />
              <div class="social-login">
                <div class="row">
                
                  <div class="col-md-12">
                    <?php if($configs->fb_login==1): ?>
                <a href="<?php echo e(url('/auth/facebook')); ?>" class="btn btn--form btn--form-login fb-btn" title=<?php echo e(__('Register With Facebook')); ?>><i class="fa fa-facebook-f"></i> <?php echo e(__('Register With Facebook')); ?></a>
                <?php endif; ?>
                  <?php if($configs->google_login==1): ?>
                <a href="<?php echo e(url('/auth/google')); ?>" class="btn btn--form btn--form-login gplus-btn" title=<?php echo e(__('Register With Google')); ?>><i class="fa fa-google"></i> <?php echo e(__('Register With Google')); ?></a>
                <?php endif; ?>
                <?php if($configs->amazon_login==1): ?>
                <a href="<?php echo e(url('/auth/amazon')); ?>" class="btn btn--form btn--form-login amazon-btn" title=<?php echo e(__('Register With Amazon')); ?>><i class="fa fa-amazon"></i> <?php echo e(__('Register With Amazon')); ?></a>
                <?php endif; ?>
                  <?php if($configs->gitlab_login==1): ?>
                 <a style="background: linear-gradient(270deg, #48367d 0%, #241842 100%);" href="<?php echo e(url('/auth/gitlab')); ?>" class="btn btn--form btn--form-login" title=<?php echo e(__('Register With Gitlab')); ?>><i class="fa fa-gitlab"></i> <?php echo e(__('Register With Gitlab')); ?></a>
                 <?php endif; ?>                  </div>
                </div>
              </div>
              <a class="signup__link" href="<?php echo e(url('login')); ?>"><?php echo e(__('I am Already A Member')); ?></a>
            </div>
          </form>  
        </div>
      </div>
    </div>
  </div>
  <!-- Scripts -->
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
  <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script> <!-- bootstrap js -->
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.popover.js')); ?>"></script> <!-- bootstrap popover js -->
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.curtail.min.js')); ?>"></script> <!-- menumaker js -->
  <script type="text/javascript" src="<?php echo e(asset('js/jquery.scrollSpeed.js')); ?>"></script> <!-- owl carousel js -->
  <script type="text/javascript" src="<?php echo e(asset('js/custom-js.js')); ?>"></script>
</body>
</html><?php /**PATH C:\laragon\www\NexthourWeb\resources\views/auth/register.blade.php ENDPATH**/ ?>