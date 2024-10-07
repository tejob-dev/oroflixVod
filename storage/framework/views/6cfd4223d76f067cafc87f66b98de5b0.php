
<?php $__env->startSection('title',"$menu->name"); ?>
<?php $__env->startSection('main-wrapper'); ?>
<?php
 $age=0;
  $config=App\Config::first();
  if ($config->age_restriction==1) {
    if(Auth::user()){
      $user_id=Auth::user()->id;
      $user=App\User::findOrfail($user_id);
      $age=$user->age;
    }
  }else{
    $age=100;
  }
?>

  <!-- main wrapper  slider -->
  <section id="wishlistelement" class="main-wrapper">
    <div>
      <!-- banner -->
    <?php if(isset($banner) && count($banner) > 0): ?>
    <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($banner_data->position == 4): ?>
            <div class="banneadd-main-block">
                <a href="<?php echo e($banner_data->link); ?>" title="" target="__blank">
                    <?php
                        $imagePath = $banner_data->image ? 'images/banneradd/' . $banner_data->image : 'images/default-thumbnail.jpg';
                        $imageData = base64_encode(@file_get_contents($imagePath));
                        $src = $imageData ? 'data: ' . mime_content_type($imagePath) . ';base64,' . $imageData : null;
                    ?>
                    <img src="<?php echo e($src); ?>" class="img-fluid" alt="">
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
      <!--- end banner -->

      <?php if(isset($home_slides) && count($home_slides) > 0): ?>
        <div id="home-main-block" class="home-main-block">
          <div id="home-slider-one" class="home-slider-one owl-carousel">
            <?php $__currentLoopData = $home_slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($slide->active == 1): ?>
                <div class="slider-block ">
                  <div class="slider-image">
                    <?php if(isset($slide->slide_image)): ?>  
                      <?php if($slide->movie_id != null): ?>
                        <?php if(isset($auth) && getSubscription()->getData()->subscribed == true): ?>

                          <a href="<?php echo e(isset($slide->movie) && $slide->movie != NULL ? url('movie/detail', $slide->movie->slug) : '#'); ?>">
                            <?php if($slide->slide_image != null): ?>
                              <?php
                                $image = 'images/home_slider/movies/'. $slide->slide_image;
                                  // Read image path, convert to base64 encoding
                                  
                                $imageData = base64_encode(@file_get_contents($image));
                                if($imageData){
                                // Format the image SRC:  data:{mime};base64,{data};
                                $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                }else{
                                  $src = '';
                                  }
                              ?>
                              <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="slider-image">
                              <?php elseif($slide->movie->poster != null): ?>
                                <?php
                                    $image = 'images/movies/posters/'. $slide->movie->poster;
                                  // Read image path, convert to base64 encoding
                                  
                                  $imageData = base64_encode(@file_get_contents($image));
                                  if($src){
                                  // Format the image SRC:  data:{mime};base64,{data};
                                  $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                  }else{
                                    $src = '';
                                    }
                                ?>
                                <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="slider-image">
                              <?php endif; ?>
                          </a>
                        <?php else: ?>
                          <a href="<?php echo e(isset($slide->movie) && $slide->movie != NULL ? url('movie/guest/detail', $slide->movie->slug) : '#'); ?>">
                            <?php if($slide->slide_image != null): ?>
                              <?php
                                $image = 'images/home_slider/movies/'. $slide->slide_image;
                                  // Read image path, convert to base64 encoding
                                  
                                $imageData = base64_encode(@file_get_contents($image));
                                if($imageData){
                                  // Format the image SRC:  data:{mime};base64,{data};
                                  $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                }else{
                                    $src = '';
                                }
                              ?>
                              <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="slider-image">
                            <?php elseif($slide->movie->poster != null): ?>
                              <?php
                                $image = 'images/movies/posters/'. $slide->movie->poster;
                                  // Read image path, convert to base64 encoding
                                  
                                $imageData = base64_encode(@file_get_contents($image));
                                if($src){
                                  // Format the image SRC:  data:{mime};base64,{data};
                                  $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                }else{
                                    $src = '';
                                }
                              ?>
                              <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="slider-image">
                            <?php endif; ?>
                          </a>
                        <?php endif; ?>
                      <?php elseif($slide->tv_series_id != null): ?>
                        <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                          <a href="<?php echo e(isset($slide->tvseries->seasons[0]) && $slide->tvseries->seasons[0] != NULL ? url('show/detail', $slide->tvseries->seasons[0]->season_slug) : '#'); ?>">
                            <?php if($slide->slide_image != null): ?>
                              <img data-src="<?php echo e(url('images/home_slider/shows/'. $slide->slide_image)); ?>" class="img-responsive owl-lazy" alt="slider-image">
                            <?php elseif($slide->tvseries->poster != null): ?>
                              <img data-src="<?php echo e(url('images/tvseries/posters/'. $slide->tvseries->poster)); ?>" class="img-responsive owl-lazy" alt="slider-image">
                            <?php endif; ?>
                          </a>
                        <?php else: ?>
                          <a href="<?php echo e(isset($slide->tvseries->seasons[0]) && $slide->tvseries->seasons[0] != NULL ? url('show/guest/detail', $slide->tvseries->seasons[0]->season_slug) : '#'); ?>">
                            <?php if($slide->slide_image != null): ?>
                              <img data-src="<?php echo e(url('images/home_slider/shows/'. $slide->slide_image)); ?>" class="img-responsive owl-lazy" alt="slider-image">
                            <?php elseif($slide->tvseries->poster != null): ?>
                              <img data-src="<?php echo e(url('images/tvseries/posters/'. $slide->tvseries->poster)); ?>" class="img-responsive owl-lazy" alt="slider-image">
                            <?php endif; ?>
                          </a>
                        <?php endif; ?>
                      <?php else: ?>
                        <a href="#">
                          <?php if($slide->slide_image != null): ?>
                            <img data-src="<?php echo e(url('images/home_slider/'. $slide->slide_image)); ?>" class="img-responsive owl-lazy" alt="slider-image">
                          <?php endif; ?>
                        </a>
                      <?php endif; ?>
                    <?php endif; ?>
                    
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      <?php endif; ?>

<!-- banner -->
<?php if(isset($banner) && count($banner) > 0): ?>
    <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($banner_data->position == 1): ?>
            <div class="banneadd-main-block">
                <a href="<?php echo e($banner_data->link); ?>" title="" target="__blank">
                    <?php
                        $imagePath = $banner_data->image ? 'images/banneradd/' . $banner_data->image : 'images/default-thumbnail.jpg';
                        $imageData = base64_encode(@file_get_contents($imagePath));
                        $src = $imageData ? 'data: ' . mime_content_type($imagePath) . ';base64,' . $imageData : null;
                    ?>
                    <img src="<?php echo e($src); ?>" class="img-fluid" alt="">
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<!--- end banner -->

<!-- age modal -->
 <?php echo $__env->make('modal.agemodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--- end age modal -->

<!-- age warning modal -->
 <?php echo $__env->make('modal.agewarning', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end age warning modal -->


<?php if(count($menu->menusections)>0): ?>

<?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    foreach ($recent_data as $key => $item) {
       $d = \Request::getHost();
      $domain = str_replace("www.", "", $d);
      if (strstr($domain, 'localhost') ) {
        $ipaddress='43.251.92.73'; 
      }else{
      $ipaddress = $request->getClientIp();
      }
        $geoip = geoip()->getLocation($ipaddress);
        $usercountry = strtoupper($geoip->country);
      
        $rm =  App\Movie::join('videolinks','videolinks.movie_id','=','movies.id')
                     ->select('movies.id as id','movies.title as title','movies.type as type','movies.status as status','movies.genre_id as genre_id','movies.thumbnail as thumbnail','movies.live as live','movies.rating as rating','movies.duration as duration','movies.publish_year as publish_year','movies.maturity_rating as maturity_rating','movies.detail as detail','movies.trailer_url as trailer_url','videolinks.iframeurl as iframeurl','movies.slug as slug','movies.tmdb as tmdb','movies.is_custom_label as is_custom_label','movies.label_id as label_id')
                     ->where('movies.is_upcoming','!=' ,1)
                     ->where('movies.is_kids','!=' ,1)
                     ->where('movies.country', 'NOT like', '%'.$usercountry.'%')
                     ->where('movies.id',$item->movie_id)->first();
      
        $recentlyadded[] = $rm;

      
        if($section->order == 1){
          arsort($recentlyadded);
        }
       

        if(count($recentlyadded) == $section->item_limit){
            break;
            exit(1);
        }
    }
    if(count($recent_data)==0){
      $recentlyadded = [];
    }
    foreach ($recent_data as $key => $item) {

      $d = \Request::getHost();
      $domain = str_replace("www.", "", $d);
      if (strstr($domain, 'localhost') ) {
        $ipaddress='43.251.92.73'; 
      }else{
      $ipaddress = $request->getClientIp();
      }
        $geoip = geoip()->getLocation($ipaddress);
        $usercountry = strtoupper($geoip->country);
        
        $rectvs =  App\TvSeries::
                      join('seasons','seasons.tv_series_id','=','tv_series.id')
                      ->join('episodes','episodes.seasons_id','=','seasons.id')
                      ->join('videolinks','videolinks.episode_id','=','episodes.id')
                      ->select('seasons.id as seasonid','tv_series.genre_id as genre_id','tv_series.id as id','tv_series.type as type','tv_series.status as status','tv_series.thumbnail as thumbnail','tv_series.title as title','tv_series.rating as rating','seasons.publish_year as publish_year','tv_series.maturity_rating as age_req','tv_series.detail as detail','seasons.season_no as season_no','videolinks.iframeurl as iframeurl','seasons.season_slug as season_slug','seasons.trailer_url as trailer_url','seasons.tmdb as tmdb','tv_series.is_custom_label as is_custom_label','tv_series.label_id as label_id')
                      ->where('tv_series.country', 'NOT like', '%'.$usercountry.'%')
                      ->where('tv_series.id',$item->tv_series_id)->first();
          
        $recentlyadded[] = $rectvs;

        if($section->order == 1){
          arsort($recentlyadded);
        }
        
        if(count($recentlyadded) == $section->item_limit){
            break;
            exit(1);
        }

    }
  

    $recentlyadded = array_values(array_filter($recentlyadded));
    
?>
 
<?php if($section->section_id == 1 && $recentlyadded != NULL && count($recentlyadded) >0): ?>
  <div class="genre-prime-block genre-prime-block-one genre-paddin-top genre-top-slider">
    <div class="container-fluid">
         
       <h5 class="section-heading"><?php echo e(__('Recently Added')); ?></h5>
          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
            <a href="<?php echo e(route('showall',['menuid' => $menu->id, 'menuname' => $menu->name])); ?>" class="see-more"> <b><?php echo e(__('View All')); ?></b></a>
          <?php else: ?>
            <a href="<?php echo e(route('guestshowall',['menuid' => $menu->id, 'menuname' => $menu->name])); ?>" class="see-more"> <b><?php echo e(__('View All')); ?></b></a>
          <?php endif; ?>
      <!-- Recently added movies and tv shows in list view End-->
        <?php if($section->view == 1): ?>
          <div class="genre-prime-slider owl-carousel">
             <?php $__currentLoopData = $recentlyadded; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  if(isset($auth) && $auth != NULL){
                   if ($item->type == 'M') {
                    $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                      ['user_id', '=', $auth->id],
                                                                      ['movie_id', '=', $item->id],
                                                                    ])->first();
                    }
                  }

                  if(isset($auth) && $auth != NULL){

                    $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();

                    if (isset($gets1)) {
                      $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                  ['user_id', '=', $auth->id],
                                                                  ['season_id', '=', $gets1->id],
                        ])->first();

                    }

                  }
                  else{
                      $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();
                  }
                ?>

                <?php if($item->status == 1): ?>
                  <?php if($item->type == 'M'): ?>
                    <?php
                      if($item->thumbnail != NULL){
                        $image = public_path() . '/images/movies/thumbnails/'.$item->thumbnail;
                      }else{
                        $image = Avatar::create($item->title)->toBase64();
                      }
                      
                      // Read image path, convert to base64 encoding
                      
                      $imageData = base64_encode(@file_get_contents($image));
                      if($imageData){
                          $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                      }else{
                          $src = Avatar::create($item->title)->toBase64();
                      }
                    ?>
                    <?php if(hidedata($item->id,$item->type) != 1): ?>
                    <div class="genre-prime-slide">
                      <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>" data-pt-interactive="false">
                        <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                          <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                            <?php if($src): ?>
                              <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                            <?php endif; ?>
                          </a>
                           
                          <?php if(timecalcuate($auth->id,$item->id,$item->type) != 0): ?>
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e(timecalcuate($auth->id,$item->id,$item->type)); ?>%">
                            </div>
                          </div>
                          <?php endif; ?>
                        <?php else: ?>
                          <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                            <?php if($src): ?>
                              <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                            <?php endif; ?>
                          </a>
                        <?php endif; ?>
                        <?php if($item->is_custom_label == 1): ?>
                          <?php if(isset($item->label_id)): ?>
                            
                            <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                          <?php endif; ?>
                        <?php endif; ?>
                      </div>

                      <?php if($protip == 1): ?>

                      <div id="prime-mix-description-block<?php echo e($item->id); ?>" class="prime-description-block">
                        <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                        
                        <ul class="description-list">
                          <li><?php echo e(__('Tmdb rRting')); ?> <?php echo e($item->rating); ?></li>
                          <li><?php echo e($item->duration); ?> <?php echo e(__('Mins')); ?></li>
                          <li><?php echo e($item->publish_year); ?></li>
                          <li><?php echo e($item->maturity_rating); ?></li>
                         
                        </ul>
                        <div class="main-des">
                          <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <a href="<?php echo e(url('movie/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                          <?php else: ?>
                             <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                          <?php endif; ?>
                        </div>
                    

                        
                        <div class="des-btn-block">
                         
                          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <?php if($item->is_upcoming == 0): ?>
                            <?php if(checkInMovie($item) == true && isset($item->video_link)): ?>
                              <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                          
                                <?php if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null): ?>
                                
                                <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                </a>

                                <?php else: ?>
                                  <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                  </a>
                                <?php endif; ?>
                              <?php else: ?>
                              <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play play-btn-icon"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                
                              <?php endif; ?>
                           <div class="hide-icon">
                            <a onclick="hideforme('<?php echo e($item->id); ?>','<?php echo e($item->type); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                          </div>
                            <?php endif; ?>
                          <?php endif; ?>
                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                              <a class="iframe btn btn-default" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                            <?php endif; ?>
                          <?php else: ?>
                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                              <a class="iframe btn btn-default" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                            <?php endif; ?>
                          <?php endif; ?>
                          <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>
                            <?php if(isset($wishlist_check->added)): ?>
                              <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></button>
                            <?php else: ?>
                           
                              <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                            <?php endif; ?>
                          <?php elseif($catlog == 1): ?>
                            <?php if($auth): ?>
                              <?php if(isset($wishlist_check->added)): ?>
                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></button>
                              <?php else: ?>
                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                              <?php endif; ?>
                            <?php endif; ?>
                          <?php endif; ?>
                        </div>
                      </div>
                      <?php endif; ?>   
                    </div>
                    <?php endif; ?>
                  <?php elseif($item->type == 'T'): ?>
                      <?php
                           $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                          // Read image path, convert to base64 encoding
                          
                          $imageData = base64_encode(@file_get_contents($image));
                          if($imageData){
                              $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                          }else{
                              $src = Avatar::create($item->title)->toBase64();
                          }
                      ?>
                    <?php if(hidedata($gets1->id,$gets1->type) != 1): ?>
                     <div class="genre-prime-slide">
                        <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                              <?php if($src != null): ?>
                                
                                <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                              <?php endif; ?>
                            </a>
                          <div class="hide-icon">
                              <a onclick="hideforme('<?php echo e($gets1->id); ?>','<?php echo e($gets1->type); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                            </div>
                          <?php else: ?>
                            <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                              <?php if($item->thumbnail != null): ?>
                                <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                              <?php endif; ?>
                            </a>
                          <?php endif; ?>
                          <?php if($item->is_custom_label == 1): ?>
                            <?php if(isset($item->label_id)): ?>
                              <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                            <?php endif; ?>
                          <?php endif; ?>
                         
                        </div>
                        <?php if(isset($protip) && $protip == 1): ?>
                        <div id="prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                          <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                          
                          <ul class="description-list">
                            <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                            <li><?php echo e(__('season')); ?> <?php echo e($item->season_no); ?></li>
                            <li><?php echo e($item->publish_year); ?></li>
                            <li><?php echo e($item->age_req); ?></li>
                           
                          </ul>
                          <div class="main-des">
                            <?php if($item->detail != null || $item->detail != ''): ?>
                              <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                            <?php else: ?>
                              <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                            <?php endif; ?>
                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                              <a href="<?php echo e(url('show/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                            <?php else: ?>
                               <a href="<?php echo e(url('show/guest/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                            <?php endif; ?>
                          </div>
                         
                          <div class="des-btn-block">
                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                              <?php if(isset($gets1->episodes[0]) && checkInTvseries($item) == true && isset($gets1->episodes[0]->video_link)): ?>
                                <?php if($item->age_req == 'all age' || $age>=str_replace('+', '', $item->age_req)): ?>
                                  <?php if($gets1->episodes[0]->video_link['iframeurl'] !=""): ?>
                               
                                    <a href="#" onclick="playoniframe('<?php echo e($gets1->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($gets1->episodes[0]->seasons->tvseries->id); ?>','tv')" class="btn btn-play"><span class= "play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                    </a>

                                  <?php else: ?>
                                    <a href="<?php echo e(route('watchTvShow',$gets1->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                  <?php endif; ?>
                                <?php else: ?>
                                 <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                <?php endif; ?>
                              <?php endif; ?>
                              <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                <a href="<?php echo e(route('watchtvTrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                              <?php endif; ?>
                            <?php else: ?>
                               <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                <a href="<?php echo e(route('guestwatchtvtrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                              <?php endif; ?>
                            <?php endif; ?>
                            <?php if($catlog == 1 && getSubscription()->getData()->subscribed == true): ?>
                              <?php if(isset($gets1)): ?>
                                <?php if(isset($wishlist_check->added)): ?>
                                  <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('add to watchlist')); ?></a>
                                <?php else: ?>
                                  <?php if($gets1): ?>
                                    <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                    </a>
                                  <?php endif; ?>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php elseif($catlog ==1 && $auth): ?>

                              <?php if(isset($gets1)): ?>
                                <?php if(isset($wishlist_check->added)): ?>
                                  <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></a>
                                <?php else: ?>
                                  <?php if($gets1): ?>
                                    <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                    </a>
                                  <?php endif; ?>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </div>
                        </div>
                        <?php endif; ?>
                     </div>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endif; ?>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          </div>
        <?php endif; ?>
      <!-- Recently added movies and tv shows in list view End-->
        
      <!-- Recently Tvshows and movies in Grid view -->
        <?php if($section->view == 0): ?>
             <div class="genre-prime-block">
                <?php $__currentLoopData = $recentlyadded; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php
                     if(isset($auth) && $auth != NULL){


                       if ($item->type == 'M') {
                        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                          ['user_id', '=', $auth->id],
                                                                          ['movie_id', '=', $item->id],
                                                                        ])->first();
                      }
                       }

                       if(isset($auth) && $auth != NULL){

                          $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();

                          if (isset($gets1)) {


                            $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                        ['user_id', '=', $auth->id],
                                                                        ['season_id', '=', $gets1->id],
                              ])->first();


                            }

                          }
                          else{
                             $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();
                          }
                    ?>
                    <?php if($item->status == 1): ?>
                      <?php if($item->type == 'M'): ?>
                      <?php
                       $image = 'images/movies/thumbnails/'.$item->thumbnail;
                      // Read image path, convert to base64 encoding
                      
                      $imageData = base64_encode(@file_get_contents($image));
                      if($imageData){
                      // Format the image SRC:  data:{mime};base64,{data};
                      $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                      }else{
                          $src = Avatar::create($item->title)->toBase64();
                      }
                  ?>
                   <?php if(hidedata($item->id,$item->type) != 1): ?>
                  <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                    <div class="cus_img">
                      <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>">
                        <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                        <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                          <?php if($src): ?>
                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                          <?php endif; ?>
                        </a>
                        
                        <?php if(timecalcuate($auth->id,$item->id,$item->type) != 0): ?>
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e(timecalcuate($auth->id,$item->id,$item->type)); ?>%">
                            </div>
                          </div>
                          <?php endif; ?>
                        <?php else: ?>
                         <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                            <?php if($src): ?>
                              <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                            <?php endif; ?>
                          </a>

                        <?php endif; ?>
                        <?php if($item->is_custom_label == 1): ?>
                          <?php if(isset($item->label_id)): ?>
                            <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                          <?php endif; ?>
                       
                        <?php endif; ?>
                     
                      </div>

                      <?php if(isset($protip) && $protip == 1): ?>

                      <div id="prime-mix-description-block<?php echo e($item->id); ?>" class="prime-description-block">
                        <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                        
                        <ul class="description-list">
                          <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                          <li><?php echo e($item->duration); ?><?php echo e(__('Mins')); ?></li>
                          <li><?php echo e($item->publish_year); ?></li>
                          <li><?php echo e($item->maturity_rating); ?></li>
                          
                        </ul>
                        <div class="main-des">
                          <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <a href="<?php echo e(url('movie/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                          <?php else: ?>
                             <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                          <?php endif; ?>
                        </div>
                        
                        <div class="des-btn-block">
                          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                            <?php if($item->is_upcoming == 0): ?>
                              <?php if(checkInMovie($item) == true && isset($item->video_link)): ?>
                                <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                            
                                  <?php if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null): ?>
                                  
                                  <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                  </a>

                                  <?php else: ?>
                                    <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                    </a>
                                  <?php endif; ?>
                                <?php else: ?>
                                <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play play-btn-icon"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                  
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                              <a class="iframe btn btn-default" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                            <?php endif; ?>
                          <?php else: ?>
                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                              <a class="iframe btn btn-default" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                            <?php endif; ?>
                          <?php endif; ?>
                          <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>
                            <?php if(isset($wishlist_check->added)): ?>
                              <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('remove fromw atchlist') : __('Add to Watchlist')); ?></button>
                            <?php else: ?>
                           
                              <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                            <?php endif; ?>
                          <?php elseif($catlog == 1): ?>
                            <?php if($auth): ?>
                              <?php if(isset($wishlist_check->added)): ?>
                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></button>
                              <?php else: ?>
                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                              <?php endif; ?>
                            <?php endif; ?>
                          <?php endif; ?>
                        </div>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php elseif($item->type == 'T'): ?>
                    <?php
                       $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                      // Read image path, convert to base64 encoding
                      
                      $imageData = base64_encode(@file_get_contents($image));
                      if($imageData){
                      // Format the image SRC:  data:{mime};base64,{data};
                      $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                      }else{
                          $src = Avatar::create($item->title)->toBase64();
                      }
                    ?>
                     <?php if(hidedata($gets1->id,$gets1->type) != 1): ?>
                        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                            <div class="cus_img">
                            <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                               <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                  <?php if($src): ?>
                                    
                                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                  <?php endif; ?>
                                </a>
                               
                                <?php else: ?>
                                 <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                  <?php if($src): ?>
                                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                  <?php endif; ?>
                                </a>
                                <?php endif; ?>
                               <?php if($item->is_custom_label == 1): ?>
                                <?php if(isset($item->label_id)): ?>
                                  <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                                <?php endif; ?>
                              <?php endif; ?>
                            </div>
                            <?php if(isset($protip) && $protip == 1): ?>
                            <div id="prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                                <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                               
                                <ul class="description-list">
                                  <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                                  <li><?php echo e(__('Season')); ?> <?php echo e($item->season_no); ?></li>
                                  <li><?php echo e($item->publish_year); ?></li>
                                  <li><?php echo e($item->age_req); ?></li>
                                  
                                </ul>
                                <div class="main-des">
                                  <?php if($item->detail != null || $item->detail != ''): ?>
                                    <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                  <?php else: ?>
                                    <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                  <?php endif; ?>
                                  <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                    <a href="<?php echo e(url('show/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                  <?php else: ?>
                                     <a href="<?php echo e(url('show/guest/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                  <?php endif; ?>
                                </div>
                                 <div class="des-btn-block">
                                  <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                    <?php if(isset($gets1->episodes[0]) && checkInTvseries($item) == true && isset($gets1->episodes[0]->video_link)): ?>
                                      <?php if($item->age_req == 'all age' || $age>=str_replace('+', '', $item->age_req)): ?>
                                        <?php if($gets1->episodes[0]->video_link['iframeurl'] !=""): ?>
                                     
                                          <a href="#" onclick="playoniframe('<?php echo e($gets1->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($gets1->episodes[0]->seasons->tvseries->id); ?>','tv')" class="btn btn-play"><span class= "play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                          </a>

                                        <?php else: ?>
                                          <a href="<?php echo e(route('watchTvShow',$gets1->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                        <?php endif; ?>
                                      <?php else: ?>
                                       <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                      <a href="<?php echo e(route('watchtvTrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                                    <?php endif; ?>
                                  <?php else: ?>
                                    <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                      <a href="<?php echo e(route('guestwatchtvtrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                  <?php if($catlog == 1 && getSubscription()->getData()->subscribed == true): ?>
                                    <?php if(isset($gets1)): ?>
                                      <?php if(isset($wishlist_check->added)): ?>
                                        <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></a>
                                      <?php else: ?>
                                        <?php if($gets1): ?>
                                          <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                          </a>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                  <?php elseif($catlog ==1 && $auth): ?>

                                    <?php if(isset($gets1)): ?>
                                      <?php if(isset($wishlist_check->added)): ?>
                                        <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></a>
                                      <?php else: ?>
                                        <?php if($gets1): ?>
                                          <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                          </a>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                </div>
                              </div>
                              <?php endif; ?>    
                           
                          </div>
                        </div>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </div>
        <?php endif; ?>
      <!-- Recently Tvshows and movies in Grid view END-->

      </div>
  </div> 
<?php endif; ?>
  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
  <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
  <!-- Featured Movies and TvShows -->
    <?php
        $featuresitems = [];
        
        
        foreach ($menu_data as $key => $item) {

          $d = \Request::getHost();
      $domain = str_replace("www.", "", $d);
      if (strstr($domain, 'localhost') ) {
        $ipaddress='43.251.92.73'; 
      }else{
      $ipaddress = $request->getClientIp();
      }
        $geoip = geoip()->getLocation($ipaddress);
        $usercountry = strtoupper($geoip->country);
            
            $fmovie =  App\Movie::join('videolinks','videolinks.movie_id','=','movies.id')
                         ->select('movies.id as id','movies.title as title','movies.type as type','movies.status as status','movies.genre_id as genre_id','movies.thumbnail as thumbnail','movies.rating as rating','movies.duration as duration','movies.publish_year as publish_year','movies.maturity_rating as maturity_rating','movies.detail as detail','movies.trailer_url as trailer_url','movies.slug as slug','movies.tmdb as tmdb','movies.is_custom_label as is_custom_label','movies.label_id as label_id')
                          ->where('movies.is_upcoming','!=' ,1)
                          ->where('movies.is_kids','!=' ,1)
                          ->where('movies.country', 'NOT like', '%'.$usercountry.'%')
                         ->where('movies.id',$item->movie_id)->where('movies.featured', '1')->first();
              
            if($fmovie != NULL){
              $featuresitems[] = $fmovie;
            }
             

            if($section->order == 1){
              arsort($featuresitems);
            }

            if(count($featuresitems) == $section->item_limit){
                break;
                exit();
            }


        }
      

     
        
        foreach ($menu_data as $key => $item) {
          
          $d = \Request::getHost();
      $domain = str_replace("www.", "", $d);
      if (strstr($domain, 'localhost') ) {
        $ipaddress='43.251.92.73'; 
      }else{
      $ipaddress = $request->getClientIp();
      }
        $geoip = geoip()->getLocation($ipaddress);
        $usercountry = strtoupper($geoip->country);
        
           $ftvs = App\TvSeries::
                          join('seasons','seasons.tv_series_id','=','tv_series.id')
                          ->join('episodes','episodes.seasons_id','=','seasons.id')
                          ->join('videolinks','videolinks.episode_id','=','episodes.id')
                          ->select('seasons.id as seasonid','tv_series.genre_id as genre_id','tv_series.id as id','tv_series.type as type','tv_series.status as status','tv_series.thumbnail as thumbnail','tv_series.title as title','tv_series.rating as rating','seasons.publish_year as publish_year','tv_series.maturity_rating as age_req','tv_series.detail as detail','seasons.season_no as season_no','videolinks.iframeurl as iframeurl','seasons.season_slug as season_slug','seasons.trailer_url as trailer_url','seasons.tmdb as tmdb','tv_series.is_custom_label as is_custom_label','tv_series.label_id as label_id')
                          ->where('tv_series.is_kids','!=' ,1)
                          ->where('tv_series.country', 'NOT like', '%'.$usercountry.'%')
                          ->where('tv_series.id',$item->tv_series_id)->where('tv_series.featured','1')->first();

            if($ftvs != NULL){
              $featuresitems[] = $ftvs;
            }
            

            if($section->order == 1){
              arsort($featuresitems);
            }
            
            if(count($featuresitems) == $section->item_limit+1){
                break;
                exit();
            }

        }
      

        $featuresitems = array_values(array_filter($featuresitems));
        
    ?>

 
    <?php if($section->section_id == 3 && $featuresitems != NULL && count($featuresitems)>0): ?>
      <div class="genre-prime-block genre-prime-block-one genre-paddin-top">
         <div class="container-fluid">
              
              <h5 class="section-heading"><?php echo e(__('Featured')); ?></h5>

              
              <!-- Featured Tvshows and movies in List view -->
              <?php if($section->view == 1): ?>
                <div class="genre-prime-slider owl-carousel">
                   <?php $__currentLoopData = $featuresitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php
                       if(isset($auth) && $auth != NULL){


                         if ($item->type == 'M') {
                          $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                            ['user_id', '=', $auth->id],
                                                                            ['movie_id', '=', $item->id],
                                                                          ])->first();
                        }
                         }

                         if(isset($auth) && $auth != NULL){

                            $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();

                            if (isset($gets1)) {


                              $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                          ['user_id', '=', $auth->id],
                                                                          ['season_id', '=', $gets1->id],
                                ])->first();


                              }

                            }
                            else{
                               $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();
                            }
                      ?>

                      <?php if($item->status == 1): ?>
                        <?php if($item->type == 'M'): ?>
                        <?php
                           $image = 'images/movies/thumbnails/'.$item->thumbnail;
                          // Read image path, convert to base64 encoding
                        
                          $imageData = base64_encode(@file_get_contents($image));
                          if($imageData){
                          // Format the image SRC:  data:{mime};base64,{data};
                          $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                          }else{
                              $src = Avatar::create($item->title)->toBase64();
                          }
                        ?>
                          <?php if(hidedata($item->id,$item->type) != 1): ?>
                          <div class="genre-prime-slide">
                            <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>">
                              <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                              <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                <?php if($src): ?>
                                  <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                                <?php endif; ?>
                              </a>
                           
                              <?php if(timecalcuate($auth->id,$item->id,$item->type) != 0): ?>
                              <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e(timecalcuate($auth->id,$item->id,$item->type)); ?>%">
                                </div>
                              </div>
                              <?php endif; ?>
                              <?php else: ?>
                                <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                <?php if($src): ?>
                                  <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                                <?php endif; ?>
                              </a>
                              <?php endif; ?>
                              <?php if($item->is_custom_label == 1): ?>
                                <?php if(isset($item->label_id)): ?>
                                  <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                                <?php endif; ?>
                             
                              <?php endif; ?>
                             
                            </div>
                            <?php if(isset($protip) && $protip == 1): ?>
                            <div id="prime-mix-description-block<?php echo e($item->id); ?>" class="prime-description-block">
                                <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                               
                                <ul class="description-list">
                                  <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                                  <li><?php echo e($item->duration); ?> <?php echo e(__('Mins')); ?></li>
                                  <li><?php echo e($item->publish_year); ?></li>
                                  <li><?php echo e($item->maturity_rating); ?></li>
                                  
                                </ul>
                                <div class="main-des">
                                  <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                  <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                    <a href="<?php echo e(url('movie/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                  <?php else: ?>
                                     <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                  <?php endif; ?>
                                </div>
                              
                               
                                <div class="des-btn-block">
                                  <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                    <?php if($item->is_upcoming != 1): ?>
                                      <?php if(checkInMovie($item) == true && isset($item->video_link)): ?>
                                        <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                                          <?php if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null): ?>
                                      
                                            <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                            </a>
                                          <?php else: ?>
                                            <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                            </a>
                                          <?php endif; ?>
                                        <?php else: ?>
                                          <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                          </a>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                       <a class="iframe btn btn-default" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                    <?php endif; ?>
                                  <?php else: ?>
                                    <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                      <a class="iframe btn btn-default" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                    <?php endif; ?>
                                  <?php endif; ?>

                                  <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>
                                    <?php if(isset($wishlist_check->added)): ?>
                                      <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></button>
                                    <?php else: ?>
                                   
                                      <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                                    <?php endif; ?>
                                  <?php elseif($catlog ==1 && $auth): ?>
                                    <?php if(isset($wishlist_check->added)): ?>
                                      <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></button>
                                    <?php else: ?>
                                   
                                      <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('add t owatchlist')); ?></button>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                  
                                </div>
                               
                            </div>
                            <?php endif; ?>
                          </div>
                          <?php endif; ?>
                        <?php elseif($item->type == 'T'): ?>
                        
                        <?php
                           $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                          // Read image path, convert to base64 encoding
                        
                          $imageData = base64_encode(@file_get_contents($image));
                          if($imageData){
                          // Format the image SRC:  data:{mime};base64,{data};
                          $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                          }else{
                              $src = Avatar::create($item->title)->toBase64();
                          }
                        ?>

                        <?php if(hidedata($gets1->id,$gets1->type) != 1): ?>
                         <div class="genre-prime-slide">
                            <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                              <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                              <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                <?php if($src): ?>
                                  
                                  <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                              
                                <?php endif; ?>
                              </a>
                             <div class="hide-icon">
                                <a onclick="hideforme('<?php echo e($gets1->id); ?>','<?php echo e($gets1->type); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                              </div>
                              <?php else: ?>
                               <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                <?php if($src): ?>
                                  
                                  <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                              
                                <?php endif; ?>
                              </a>
                              <?php endif; ?>
                              <?php if($item->is_custom_label == 1): ?>
                                <?php if(isset($item->label_id)): ?>
                                  <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                                <?php endif; ?>
                              <?php endif; ?>
                              
                              </div>
                              <?php if(isset($protip) && $protip == 1): ?>
                              <div id="prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                                  <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                                 
                                  <ul class="description-list">
                                    <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                                    <li><?php echo e(__('Season')); ?> <?php echo e($item->season_no); ?></li>
                                    <li><?php echo e($item->publish_year); ?></li>
                                    <li><?php echo e($item->age_req); ?></li>
                                   
                                  </ul>
                                  <div class="main-des">
                                    <?php if($item->detail != null || $item->detail != ''): ?>
                                      <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                    <?php else: ?>
                                      <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                    <?php endif; ?>
                                    <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                      <a href="<?php echo e(url('show/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                    <?php else: ?>
                                       <a href="<?php echo e(url('show/guest/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                    <?php endif; ?>
                                  </div>
                                 
                                  <div class="des-btn-block">
                                    <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                      <?php if(isset($gets1->episodes[0]) && checkInTvseries($item) == true && isset($gets1->episodes[0]->video_link)): ?>
                                        <?php if($item->age_req == 'all age' || $age>=str_replace('+', '', $item->age_req)): ?>

                                          <?php if($gets1->episodes[0]->video_link['iframeurl'] !=""): ?>
                                       
                                            <a href="#" onclick="playoniframe('<?php echo e($gets1->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($gets1->episodes[0]->seasons->tvseries->id); ?>','tv')" class="btn btn-play"><span class= "play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                             </a>

                                          <?php else: ?>
                                            <a href="<?php echo e(route('watchTvShow',$gets1->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                          <?php endif; ?>
                                        <?php else: ?>
                                          <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                      <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                        <a href="<?php echo e(route('watchtvTrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                                      <?php endif; ?>
                                    <?php else: ?>
                                       <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                        <a href="<?php echo e(route('guestwatchtvtrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                                      <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($catlog== 0 && getSubscription()->getData()->subscribed == true): ?>
                                      <?php if(isset($gets1)): ?>
                                        <?php if(isset($wishlist_check->added)): ?>
                                          <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></a>
                                        <?php else: ?>
                                          <?php if($gets1): ?>
                                            <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                            </a>
                                          <?php endif; ?>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php elseif($catlog ==1 && $auth): ?>
                                      <?php if(isset($gets1)): ?>
                                        <?php if(isset($wishlist_check->added)): ?>
                                          <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></a>
                                        <?php else: ?>
                                          <?php if($gets1): ?>
                                            <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('add t owatchlist')); ?>

                                            </a>
                                          <?php endif; ?>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                  </div>
                                </div>
                              <?php endif; ?>
                         </div>
                        <?php endif; ?>
                        <?php endif; ?>
                      <?php endif; ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </div>
              <?php endif; ?>
              <!-- Featured Tvshows and movies in List view END -->

              <!-- Featured Tvshows and movies in Grid view -->
              <?php if($section->view == 0): ?>
                   <div class="genre-prime-block">
                      <?php $__currentLoopData = $featuresitems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php
                           if(isset($auth) && $auth != NULL){


                             if ($item->type == 'M') {
                              $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                                ['user_id', '=', $auth->id],
                                                                                ['movie_id', '=', $item->id],
                                                                              ])->first();
                            }
                             }

                             if(isset($auth) && $auth != NULL){

                                $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();

                                if (isset($gets1)) {


                                  $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                              ['user_id', '=', $auth->id],
                                                                              ['season_id', '=', $gets1->id],
                                    ])->first();


                                  }

                                }
                                else{
                                   $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();
                                }
                          ?>
                          <?php if($item->status == 1): ?>
                            <?php if($item->type == 'M'): ?>
                            <?php
                               $image = 'images/movies/thumbnails/'.$item->thumbnail;
                              // Read image path, convert to base64 encoding
                            
                              $imageData = base64_encode(@file_get_contents($image));
                              if($imageData){
                              // Format the image SRC:  data:{mime};base64,{data};
                              $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                              }else{
                                  $src = Avatar::create($item->title)->toBase64();
                              }
                            ?>
                            <?php if(hidedata($item->id,$item->type) != 1): ?>
                              <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                                  <div class="cus_img">
                                    <div class="genre-slide-image home-prime-slider progress-movie protip " data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>">
                                      <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                      <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                      <?php if($src): ?>
                                        <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                      
                                      <?php endif; ?>
                                    </a>
                                    <div class="hide-icon hide-icon-two">
                                      <a onclick="hideforme('<?php echo e($item->id); ?>','<?php echo e($item->type); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                                    </div>
                                    <?php if(timecalcuate($auth->id,$item->id,$item->type) != 0): ?>
                                    <div class="progress">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e(timecalcuate($auth->id,$item->id,$item->type)); ?>%">
                                      </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php else: ?>
                                     <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                      <?php if($src): ?>
                                        <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                      <?php else: ?>
                                        <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                      <?php endif; ?>
                                    </a>

                                    <?php endif; ?>
                                   <?php if($item->is_custom_label == 1): ?>
                                      <?php if(isset($item->label_id)): ?>
                                        <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                                      <?php endif; ?>
                                   
                                    <?php endif; ?>
                                   
                                  </div>
                                  <?php if(isset($protip) && $protip == 1): ?>
                                  <div id="prime-mix-description-block<?php echo e($item->id); ?>" class="prime-description-block">
                                    <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                                  
                                    <ul class="description-list">
                                      <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                                      <li><?php echo e($item->duration); ?> <?php echo e(__('Mins')); ?></li>
                                      <li><?php echo e($item->publish_year); ?></li>
                                      <li><?php echo e($item->maturity_rating); ?></li>
                                     
                                    </ul>
                                    <div class="main-des">
                                      <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                      <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                        <a href="<?php echo e(url('movie/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                      <?php else: ?>
                                         <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                      <?php endif; ?>
                                    </div>
                                    <div class="des-btn-block">
                                      <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                        <?php if($item->is_upcoming != 1): ?>
                                          <?php if(checkInMovie($item) == true && isset($item->video_link)): ?>
                                            <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                                              <?php if(isset($item->video_link['iframeurl']) && $item->video_link['iframeurl'] != null): ?>
                                          
                                                <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                </a>
                                              <?php else: ?>
                                                <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                </a>
                                              <?php endif; ?>
                                            <?php else: ?>
                                              <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                              </a>
                                            <?php endif; ?>
                                          <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                           <a class="iframe btn btn-default" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                        <?php endif; ?>
                                      <?php else: ?>
                                        <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                          <a class="iframe btn btn-default" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                        <?php endif; ?>
                                      <?php endif; ?>

                                      <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>
                                        <?php if(isset($wishlist_check->added)): ?>
                                          <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></button>
                                        <?php else: ?>
                                       
                                          <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                                        <?php endif; ?>
                                      <?php elseif($catlog ==1 && $auth): ?>
                                        <?php if(isset($wishlist_check->added)): ?>
                                          <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></button>
                                        <?php else: ?>
                                       
                                          <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                      
                                    </div> 
                                       
                                  </div>
                                   <?php endif; ?> 
                                
                                  </div>
                              </div>
                            <?php endif; ?>
                            <?php elseif($item->type == 'T'): ?>
                            <?php
                               $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                              // Read image path, convert to base64 encoding
                            
                              $imageData = base64_encode(@file_get_contents($image));
                              if($imageData){
                              // Format the image SRC:  data:{mime};base64,{data};
                              $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                              }else{
                                  $src = Avatar::create($item->title)->toBase64();
                              }
                            ?>

                            <?php if(hidedata($gets1->id,$gets1->type) != 1): ?>   
                              <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                                  <div class="cus_img">
                                  <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                                     <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                      <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                        <?php if($src): ?>
                                         
                                          <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                       
                                        <?php endif; ?>
                                      </a>
                                       <div class="hide-icon hide-icon-two">
                                        <a onclick="hideforme('<?php echo e($gets1->id); ?>','<?php echo e($gets1->type); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                                      </div>
                                      <?php else: ?>
                                       <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                        <?php if($src): ?>
                                          
                                          <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                        
                                        <?php endif; ?>
                                      </a>
                                      <?php endif; ?>
                                      <?php if($item->is_custom_label == 1): ?>
                                        <?php if(isset($item->label_id)): ?>
                                          <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                                        <?php endif; ?>
                                      <?php endif; ?>

                                  </div>
                                  <?php if(isset($protip) && $protip == 1): ?>
                                  <div id="prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                                    <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                                  
                                    <ul class="description-list">
                                      <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                                      <li><?php echo e(__('Season')); ?> <?php echo e($item->season_no); ?></li>
                                      <li><?php echo e($item->publish_year); ?></li>
                                      <li><?php echo e($item->age_req); ?></li>
                                   
                                    </ul>
                                    <div class="main-des">
                                      <?php if($item->detail != null || $item->detail != ''): ?>
                                        <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                      <?php else: ?>
                                        <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                      <?php endif; ?>
                                      <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                        <a href="<?php echo e(url('show/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                      <?php else: ?>
                                         <a href="<?php echo e(url('show/guest/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                      <?php endif; ?>
                                    </div>
                                    
                                    <div class="des-btn-block">
                                    <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                      <?php if(isset($gets1->episodes[0]) && checkInTvseries($item) == true && isset($gets1->episodes[0]->video_link)): ?>
                                        <?php if($item->age_req == 'all age' || $age>=str_replace('+', '', $item->age_req)): ?>

                                          <?php if($gets1->episodes[0]->video_link['iframeurl'] !=""): ?>
                                       
                                            <a href="#" onclick="playoniframe('<?php echo e($gets1->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($gets1->episodes[0]->seasons->tvseries->id); ?>','tv')" class="btn btn-play"><span class= "play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                             </a>

                                          <?php else: ?>
                                            <a href="<?php echo e(route('watchTvShow',$gets1->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                          <?php endif; ?>
                                        <?php else: ?>
                                          <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php endif; ?>

                                    <?php if($catlog== 0 && getSubscription()->getData()->subscribed == true): ?>
                                      <?php if(isset($gets1)): ?>
                                        <?php if(isset($wishlist_check->added)): ?>
                                          <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></a>
                                        <?php else: ?>
                                          <?php if($gets1): ?>
                                            <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                            </a>
                                          <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                          <a href="<?php echo e(route('watchtvTrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                                        <?php endif; ?>
                                      <?php else: ?>
                                         <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                          <a href="<?php echo e(route('guestwatchtvtrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php elseif($catlog ==1 && $auth): ?>
                                      <?php if(isset($gets1)): ?>
                                        <?php if(isset($wishlist_check->added)): ?>
                                          <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></a>
                                        <?php else: ?>
                                          <?php if($gets1): ?>
                                            <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                            </a>
                                          <?php endif; ?>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                  </div>
                                  <?php endif; ?>
                                  </div>
                                 
                                </div>
                              </div>
                            <?php endif; ?>
                            <?php endif; ?>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </div>
              <?php endif; ?>
              <!-- Featured Tvshows and movies in Grid view END-->
          </div>
      </div> 
    <?php endif; ?>  

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <!-- Featured Tv Shows and Movies end-->



 


  <!------------- because you watched ------------------->
    <?php if(Auth::user() && $auth != NULL && getSubscription()->getData()->subscribed == true): ?>

      <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
           
            $watchistory_last_movie=App\WatchHistory::where('user_id',$auth->id)->orderBy('id','DESC')->where('movie_id','!=',NULL)->take(5)->get();

            $watchistory_last_tv=App\WatchHistory::where('user_id',$auth->id)->orderBy('id','DESC')->where('tv_id','!=',NULL)->take(5)->get();

            $customGenreMovie = [];
            $customGenreTv = [];
            
            foreach ($watchistory_last_movie as $key => $w) {
               $movie_find_last = App\Movie::where('id','=',$w->movie_id)->where('is_kids',0)->first();
               
               if(isset($movie_find_last)){
                $customGenreMovie[] = $movie_find_last->genre_id;
               }
            }

            foreach ($watchistory_last_tv as $key => $k) {
               $tv_show = App\TvSeries::where('id','=',$k->tv_id)->where('is_kids',0)->first();
               if(isset($tv_show)){
                $customGenreTv[] = $tv_show->genre_id;
               }
            }
           

         

          $customGenreMovie =  array_unique($customGenreMovie);
          $customGenreTv =  array_unique($customGenreTv);

         
          
          $recom_block = collect();

          $customGenreMovie =  array_unique($customGenreMovie);
          $customGenreTv =  array_unique($customGenreTv);

         
         
          //Getting Recommnaded Movies based on genre


          foreach ($customGenreMovie as $key => $g) {
            $x = App\Movie::orderBy('id','DESC')->where('is_kids',0)->where('genre_id', $g )->take(50)->get();
             $recom_block->push($x);
             
          }
         
          //Getting Recommnaded Tv Series based on genre
           foreach ($customGenreTv as $key => $g) {
             $y =App\TvSeries::orderBy('id','DESC')->where('is_kids',0)->where('genre_id', $g )->take(50)->get();
             $recom_block->push($y);
          }

          
          $recom_block = $recom_block->flatten();

              
          ?>
           
          <?php if($section->section_id == 4 && $recom_block != NULL && count($recom_block)>0): ?>
            <div class="genre-prime-block genre-prime-block-one genre-paddin-top">
               <div class="container-fluid">
                   <?php
                   $watch = App\WatchHistory::OrderBy('id','DESC')->first();
                   
                   $movie = App\Movie::where('id',$watch->movie_id)->first();
                   $tv = App\TvSeries::where('id',$watch->tv_id)->first();
                   ?>
                   <?php if(isset($movie)): ?>
                    <h5 class="section-heading"><?php echo e(__('Because You Watched')); ?>: <?php echo e(isset($movie->title) ? ucfirst($movie->title) : ''); ?></h5>
                  <?php else: ?>
                      <h5 class="section-heading"><?php echo e(__('Because You Watched')); ?> : <?php echo e(isset($tv->title) ? ucfirst($tv->title) : ''); ?></h5>
                  <?php endif; ?>
                   

                    <!-- best in intrest  added movies and tv shows in list view End-->
                        <?php if($section->view == 1): ?>
                          <div class="genre-prime-slider owl-carousel">
                             <?php $__currentLoopData = $recom_block; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php
                                 if(isset($auth) && $auth != NULL){


                                   if ($item->type == 'M') {
                                    $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                                      ['user_id', '=', $auth->id],
                                                                                      ['movie_id', '=', $item->id],
                                                                                    ])->first();
                                  }
                                   }

                                   if(isset($auth) && $auth != NULL){

                                      $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();

                                      if (isset($gets1)) {


                                        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                                    ['user_id', '=', $auth->id],
                                                                                    ['season_id', '=', $gets1->id],
                                          ])->first();


                                        }

                                      }
                                      else{
                                         $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();
                                      }
                                ?>

                                <?php if($item->status == 1): ?>
                                  <?php if($item->type == 'M'): ?>
                                  <?php
                                       $image = 'images/movies/thumbnails/'.$item->thumbnail;
                                      // Read image path, convert to base64 encoding
                                      
                                      $imageData = base64_encode(@file_get_contents($image));
                                      if($imageData){
                                          $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                      }else{
                                          $src = Avatar::create($item->title)->toBase64();
                                      }
                                  ?>
                                   <?php if(hidedata($item->id,$item->type) != 1): ?>
                                    <div class="genre-prime-slide">
                                      <div class="genre-slide-image home-prime-slider  protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>">
                                        <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                        <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                          <?php if($src): ?>
                                            <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                                          <?php endif; ?>
                                        </a>
                                       
                                        <?php if(timecalcuate($auth->id,$item->id,$item->type) != 0): ?>
                                        <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e(timecalcuate($auth->id,$item->id,$item->type)); ?>%">
                                          </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php else: ?>
                                          <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                          <?php if($src): ?>
                                            <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                                         
                                          <?php endif; ?>
                                        </a>
                                        <?php endif; ?>
                                       <?php if($item->is_custom_label == 1): ?>
                                          <?php if(isset($item->label_id)): ?>
                                            <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                                          <?php endif; ?>
                                       
                                        <?php endif; ?>
                                      </div>
                                      <?php if(isset($protip) && $protip == 1): ?>
                                      <div id="prime-mix-description-block<?php echo e($item->id); ?>" class="prime-description-block">
                                        <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                                       
                                        <ul class="description-list">
                                          <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                                          <li><?php echo e($item->duration); ?> <?php echo e(__('Mins')); ?></li>
                                          <li><?php echo e($item->publish_year); ?></li>
                                          <li><?php echo e($item->maturity_rating); ?></li>
                                          
                                        </ul>
                                        <div class="main-des">
                                          <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                            <a href="<?php echo e(url('movie/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                          <?php else: ?>
                                             <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                          <?php endif; ?>
                                        </div>
                                       
                                         
                                        <div class="des-btn-block">
                                          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                            <?php if(checkInMovie($item) == true && isset($item->video_link)): ?>
                                              <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                                                <?php if(isset($item->video_link) && $item->video_link['iframeurl'] != null): ?>
                                            
                                                  <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                </a>

                                                <?php else: ?>
                                                  <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                  </a>
                                                <?php endif; ?>
                                              <?php else: ?>
                                                <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                </a>
                                              <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                              <a class="iframe btn btn-default" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                            <?php endif; ?>
                                          <?php else: ?>
                                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                              <a class="iframe btn btn-default" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                            <?php endif; ?>
                                          <?php endif; ?>
                                          
                                          <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>

                                            <?php if(isset($wishlist_check->added)): ?>
                                              <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') :__('Add to Watchlist')); ?></button>
                                            <?php else: ?>
                                           
                                              <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                                            <?php endif; ?>
                                          <?php elseif($catlog ==1 && $auth): ?>
                                            <?php if(isset($wishlist_check->added)): ?>
                                              <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') :__('Add to Watchlist')); ?></button>
                                            <?php else: ?>
                                              <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                                            <?php endif; ?>
                                          <?php endif; ?>
                                        </div>
                                      </div>
                                      <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                  <?php elseif($item->type == 'T'): ?>
                                 
                                    <?php
                                         $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                                        // Read image path, convert to base64 encoding
                                        
                                        $imageData = base64_encode(@file_get_contents($image));
                                        if($imageData){
                                            $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                        }else{
                                            $src = Avatar::create($item->title)->toBase64();
                                        }
                                    ?>
                                     <?php if(isset($gets1) && hidedata($gets1->id,$gets1->type) != 1): ?>
                                     <div class="genre-prime-slide">
                                        <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                                          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                          <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                            <?php if($item->thumbnail != null): ?>
                                              
                                              <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                                            
                                            <?php else: ?>
                                              <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                                            <?php endif; ?>
                                          </a>
                                          <div class="hide-icon">
                                            <a onclick="hideforme('<?php echo e($gets1->id); ?>','<?php echo e($gets1->type); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                                          </div>
                                          <?php else: ?>
                                           <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                            <?php if($item->thumbnail != null): ?>
                                              <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                                          
                                            <?php else: ?>
                                              <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                                            <?php endif; ?>
                                          </a>
                                          <?php endif; ?>  
                                          <?php if($item->is_custom_label == 1): ?>
                                            <?php if(isset($item->label_id)): ?>
                                              <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                                            <?php endif; ?>
                                          <?php endif; ?>
                                        </div>
                                        <?php if(isset($protip) && $protip == 1): ?>
                                        <div id="prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                                          <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                                          
                                          <ul class="description-list">
                                            <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                                            <li><?php echo e(__('Season')); ?> <?php echo e($item->season_no); ?></li>
                                            <li><?php echo e($item->publish_year); ?></li>
                                            <li><?php echo e($item->age_req); ?></li>
                                           
                                          </ul>
                                          <div class="main-des">
                                            <?php if($item->detail != null || $item->detail != ''): ?>
                                              <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                            <?php else: ?>
                                              <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                            <?php endif; ?>
                                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                              <a href="<?php echo e(url('show/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                            <?php else: ?>
                                               <a href="<?php echo e(url('show/guest/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                            <?php endif; ?>
                                          </div>
                                         
                                          <div class="des-btn-block">
                                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                              <?php if(isset($gets1->episodes[0]) && checkInTvseries($item) == true && isset($gets1->episodes[0]->video_link)): ?>
                                                <?php if($item->age_req == 'all age' || $age>=str_replace('+', '', $item->age_req)): ?>

                                                  <?php if($gets1->episodes[0]->video_link['iframeurl'] !=""): ?>
                                               
                                                    <a href="#" onclick="playoniframe('<?php echo e($gets1->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($gets1->episodes[0]->seasons->tvseries->id); ?>','tv')" class="btn btn-play"><span class= "play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                     </a>

                                                  <?php else: ?>
                                                    <a href="<?php echo e(route('watchTvShow',$gets1->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                                  <?php endif; ?>
                                                <?php else: ?>
                                                  <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                                <?php endif; ?>
                                              <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if($catlog ==0 && getSubscription()->getData()->subscribed == true): ?>
                                              <?php if(isset($gets1)): ?>
                                                <?php if(isset($wishlist_check->added)): ?>
                                                  <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('remove fromw atchlist') : __('Add to Watchlist')); ?></a>
                                                <?php else: ?>
                                                  <?php if($gets1): ?>
                                                    <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                                    </a>
                                                  <?php endif; ?>
                                                <?php endif; ?>
                                              <?php endif; ?>
                                            <?php elseif($catlog == 1 && $auth): ?>
                                              <?php if(isset($gets1)): ?>
                                                <?php if(isset($wishlist_check->added)): ?>
                                                  <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></a>
                                                <?php else: ?>
                                                  <?php if($gets1): ?>
                                                    <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                                    </a>
                                                  <?php endif; ?>
                                                <?php endif; ?>
                                              <?php endif; ?>
                                            <?php endif; ?>
                                          </div>
                                        </div>
                                        <?php endif; ?>
                                     </div>
                                     <?php endif; ?>
                                  <?php endif; ?>
                                <?php endif; ?>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            
                          </div>
                        <?php endif; ?>
                    <!-- best in intrest added movies and tv shows in list view End-->
                    
                     <!-- best in intrest Tvshows and movies in Grid view -->
                        <?php if($section->view == 0): ?>
                             <div class="genre-prime-block">
                                <?php $__currentLoopData = $recom_block; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php
                                     if(isset($auth) && $auth != NULL){


                                       if ($item->type == 'M') {
                                        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                                          ['user_id', '=', $auth->id],
                                                                                          ['movie_id', '=', $item->id],
                                                                                        ])->first();
                                      }
                                       }

                                       if(isset($auth) && $auth != NULL){

                                          $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();

                                          if (isset($gets1)) {


                                            $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                                        ['user_id', '=', $auth->id],
                                                                                        ['season_id', '=', $gets1->id],
                                              ])->first();


                                            }

                                          }
                                          else{
                                             $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();
                                          }
                                    ?>
                                    <?php if($item->status == 1): ?>
                                      <?php if($item->type == 'M'): ?>
                                      <?php
                                       $image = 'images/movies/thumbnails/'.$item->thumbnail;
                                      // Read image path, convert to base64 encoding
                                      
                                      $imageData = base64_encode(@file_get_contents($image));
                                      if($imageData){
                                      // Format the image SRC:  data:{mime};base64,{data};
                                      $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                      }else{
                                          $src = Avatar::create($item->title)->toBase64();
                                      }
                                  ?>
                                         <?php if(hidedata($item->id,$item->type) != 1): ?>
                                        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                                            <div class="cus_img">
                                              <div class="genre-slide-image home-prime-slider progress-movie protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>">
                                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                                  <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                                    <?php if($src): ?>
                                                      <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                                   
                                                    <?php endif; ?>
                                                  </a>
                                                 <div class="hide-icon hide-icon-two">
                                                    <a onclick="hideforme('<?php echo e($item->id); ?>','<?php echo e($item->type); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                                                  </div>
                                                  <?php if(timecalcuate($auth->id,$item->id,$item->type) != 0): ?>
                                                  <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e(timecalcuate($auth->id,$item->id,$item->type)); ?>%">
                                                    </div>
                                                  </div>
                                                  <?php endif; ?>
                                                <?php else: ?>
                                                  <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                                    <?php if($src): ?>
                                                      <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                                   
                                                    <?php endif; ?>
                                                  </a>

                                                <?php endif; ?>
                                                <?php if($item->is_custom_label == 1): ?>
                                                  <?php if(isset($item->label_id)): ?>
                                                    <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                                                  <?php endif; ?>
                                              
                                                <?php endif; ?>
                                             
                                            </div>
                                            <?php if(isset($protip) && $protip == 1): ?>
                                             <div id="prime-mix-description-block<?php echo e($item->id); ?>" class="prime-description-block">
                                                <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                                                
                                                <ul class="description-list">
                                                  <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                                                  <li><?php echo e($item->duration); ?> <?php echo e(__('Mins')); ?></li>
                                                  <li><?php echo e($item->publish_year); ?></li>
                                                  <li><?php echo e($item->maturity_rating); ?></li>
                                                 
                                                </ul>
                                                <div class="main-des">
                                                  <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                                  <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                                    <a href="<?php echo e(url('movie/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                                  <?php else: ?>
                                                     <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                                  <?php endif; ?>
                                                </div>
                                              
                                                <div class="des-btn-block">
                                                  <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                                    <?php if(checkInMovie($item) == true && isset($item->video_link)): ?>
                                                      <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                                                        <?php if($item->video_link['iframeurl'] != null): ?>
                                                    
                                                          <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                        </a>

                                                        <?php else: ?>
                                                          <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                          </a>
                                                        <?php endif; ?>
                                                      <?php else: ?>
                                                        <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                        </a>
                                                      <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                                      <a class="iframe btn btn-default" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                                    <?php endif; ?>
                                                  <?php else: ?>
                                                    <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                                      <a class="iframe btn btn-default" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                                    <?php endif; ?>
                                                  <?php endif; ?>
                                                  
                                                  <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>

                                                    <?php if(isset($wishlist_check->added)): ?>
                                                      <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') :__('Add to Watchlist')); ?></button>
                                                    <?php else: ?>
                                                   
                                                      <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                                                    <?php endif; ?>
                                                  <?php elseif($catlog ==1 && $auth): ?>
                                                    <?php if(isset($wishlist_check->added)): ?>
                                                      <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('remove fromw atchlist') :__('Add to Watchlist')); ?></button>
                                                    <?php else: ?>
                                                   
                                                      <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                                                    <?php endif; ?>
                                                  <?php endif; ?>
                                                </div>
                                              </div>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                      <?php elseif($item->type == 'T'): ?>
                                      <?php
                                       $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                                      // Read image path, convert to base64 encoding
                                      
                                      $imageData = base64_encode(@file_get_contents($image));
                                      if($imageData){
                                      // Format the image SRC:  data:{mime};base64,{data};
                                      $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                      }else{
                                          $src = Avatar::create($item->title)->toBase64();
                                      }
                                  ?>
                                        <?php if(isset($gets1) && hidedata($gets1->id,$gets1->type) != 1): ?>
                                        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                                            <div class="cus_img">
                                            <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                                               <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                                <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                                  <?php if($src): ?>
                                                    
                                                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                                  
                                                  <?php else: ?>
                                                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                                  <?php endif; ?>
                                                </a>
                                                 <div class="hide-icon hide-icon-two">
                                                  <a onclick="hideforme('<?php echo e($gets1->id); ?>','<?php echo e($gets1->type); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                                                </div>
                                                <?php else: ?>
                                                 <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                                  <?php if($src): ?>
                                                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                                  
                                                  <?php else: ?>
                                                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                                  <?php endif; ?>
                                                </a>
                                                <?php endif; ?>
                                              <?php if($item->is_custom_label == 1): ?>
                                                <?php if(isset($item->label_id)): ?>
                                                  <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                                                <?php endif; ?>
                                              <?php endif; ?>

                                            </div>
                                            <?php if(isset($protip) && $protip == 1): ?>
                                            <div id="prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                                              <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                                             
                                              <ul class="description-list">
                                                <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                                                <li><?php echo e(__('Season')); ?> <?php echo e($item->season_no); ?></li>
                                                <li><?php echo e($item->publish_year); ?></li>
                                                <li><?php echo e($item->age_req); ?></li>
                                              
                                              </ul>
                                              <div class="main-des">
                                                <?php if($item->detail != null || $item->detail != ''): ?>
                                                  <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                                <?php else: ?>
                                                  <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                                <?php endif; ?>
                                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                                  <a href="<?php echo e(url('movie/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                                <?php else: ?>
                                                   <a href="<?php echo e(url('movie/guest/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                                <?php endif; ?>
                                              </div>
                                              <div class="des-btn-block">
                                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                                  <?php if(isset($gets1->episodes[0]) && checkInTvseries($item) == true && isset($gets1->episodes[0]->video_link)): ?>
                                                    <?php if($item->age_req == 'all age' || $age>=str_replace('+', '', $item->age_req)): ?>

                                                      <?php if($gets1->episodes[0]->video_link['iframeurl'] !=""): ?>
                                                   
                                                        <a href="#" onclick="playoniframe('<?php echo e($gets1->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($gets1->episodes[0]->seasons->tvseries->id); ?>','tv')" class="btn btn-play"><span class= "play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                         </a>

                                                      <?php else: ?>
                                                        <a href="<?php echo e(route('watchTvShow',$gets1->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                                      <?php endif; ?>
                                                    <?php else: ?>
                                                      <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                                    <?php endif; ?>
                                                  <?php endif; ?>
                                                   <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                                    <a href="<?php echo e(route('watchtvTrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                                                  <?php endif; ?>
                                                <?php else: ?>
                                                   <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                                    <a href="<?php echo e(route('guestwatchtvtrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                                                  <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if($catlog ==0 && getSubscription()->getData()->subscribed == true): ?>
                                                  <?php if(isset($gets1)): ?>
                                                    <?php if(isset($wishlist_check->added)): ?>
                                                      <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></a>
                                                    <?php else: ?>
                                                      <?php if($gets1): ?>
                                                        <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                                        </a>
                                                      <?php endif; ?>
                                                    <?php endif; ?>
                                                  <?php endif; ?>
                                                <?php elseif($catlog == 1 && $auth): ?>
                                                  <?php if(isset($gets1)): ?>
                                                    <?php if(isset($wishlist_check->added)): ?>
                                                      <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></a>
                                                    <?php else: ?>
                                                      <?php if($gets1): ?>
                                                        <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                                        </a>
                                                      <?php endif; ?>
                                                    <?php endif; ?>
                                                  <?php endif; ?>
                                                <?php endif; ?>
                                              </div>
                                            </div>
                                            <?php endif; ?>
                                           
                                          </div>
                                        </div>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </div>
                        <?php endif; ?>
                    <!-- best in intrest Tvshows and movies in Grid view END-->

                </div>
            </div> 
          <?php endif; ?>
            
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

  <!----------- because you watched end ----------------->

   <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($section->section_id == 12  && $top_data != NULL): ?>
      <div class="top-ten-main-block">
        <div class="container-fluid">
          <?php if(isset($top_data->menu_data)): ?>
          <h5 class="section-heading"><?php echo e(__('Top Rated')); ?></h5>
             
            <div class="genre-prime-slider owl-carousel">
              <?php
                $i = 0;
              ?>
              <?php $__currentLoopData = $top_data->menu_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($item->movie) && $item->movie != NULL && views($item->movie)->unique()->count() >= $button->toprated_count ): ?> 
                 <?php if(hidedata($item->movie->id,$item->movie->type) != 1): ?>
                  <div class="genre-prime-slide">
                    <div class="genre-slide-image">
                      
                      <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                        <a href="<?php echo e(url('movie/detail',$item->movie->slug)); ?>">
                          <?php if(isset($item->movie->thumbnail)): ?>
                            <img src="<?php echo e(url('images/movies/thumbnails/'.$item->movie->thumbnail)); ?>" class="img-fluid" alt="">
                          <?php else: ?>
                            <img src="<?php echo e(url('images/default-thumbnail.jpg')); ?>" class="img-fluid" alt="">
                          <?php endif; ?>
                        </a>
                         <div class="hide-icon">
                          <a onclick="hideforme('<?php echo e($item->movie->id); ?>','<?php echo e($item->movie->type); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                        </div>
                        <?php else: ?>
                        <a href="<?php echo e(url('movie/guest/detail',$item->movie->slug)); ?>">
                          <?php if(isset($item->movie->thumbnail)): ?>
                            <img src="<?php echo e(url('images/movies/thumbnails/'.$item->movie->thumbnail)); ?>" class="img-fluid" alt="">
                          <?php else: ?>
                            <img src="<?php echo e(url('images/default-thumbnail.jpg')); ?>" class="img-fluid" alt="">
                          <?php endif; ?>
                        </a>

                      <?php endif; ?>
                      <div class="top-ten-heading"><?php echo e(++$i); ?>

                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                
                <?php elseif(isset($item->tvseries) && $item->tvseries != NULL && isset($item->tvseries->seasons[0]) && views($item->tvseries->seasons[0])->unique()->count() >= $button->toprated_count): ?>
                  <?php if(hidedata($item->tvseries->seasons[0]['id'],$item->tvseries->seasons[0]['type']) != 1): ?>
                  <div class="genre-prime-slide">
                    <div class="genre-slide-image">
                      <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                        <a href="<?php echo e(url('show/detail',$item->tvseries->seasons[0]->season_slug)); ?>">
                        <?php if(isset($item->tvseries->thumbnail)): ?>
                            <img src="<?php echo e(url('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)); ?>" class="img-fluid" alt="">
                          <?php else: ?>
                            <img src="<?php echo e(url('images/default-thumbnail.jpg')); ?>" class="img-fluid" alt="">
                          <?php endif; ?>
                        </a>
                        <div class="hide-icon">
                          <a onclick="hideforme('<?php echo e($item->tvseries->seasons[0]['id']); ?>','<?php echo e($item->tvseries->seasons[0]['type']); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                        </div>
                      <?php else: ?>
                        <a href="<?php echo e(url('show/detail',$item->tvseries->seasons[0]->season_slug)); ?>">
                          <?php if(isset($item->tvseries->thumbnail)): ?>
                            <img src="<?php echo e(url('images/tvseries/thumbnails/'.$item->tvseries->thumbnail)); ?>" class="img-fluid" alt="">
                          <?php else: ?>
                            <img src="<?php echo e(url('images/default-thumbnail.jpg')); ?>" class="img-fluid" alt="">
                          <?php endif; ?>
                        </a>

                      <?php endif; ?>
                      <div class="top-ten-heading"><?php echo e(++$i); ?>

                      </div>
                    </div>
                  </div>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <!------------- Continue Watch ------------------->
    <?php if(Auth::user() && getSubscription()->getData()->subscribed == true): ?>

      <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
              $historyadded = [];
             
              foreach ($watchistory as $key => $item) {
                
                  $rm =  App\Movie::
                              join('watch_histories','movies.id','=','watch_histories.movie_id')
                              ->join('menu_videos','menu_videos.movie_id','=','movies.id')
                              ->join('videolinks','videolinks.movie_id','=','movies.id')
                               ->select('movies.id as id','watch_histories.movie_id as movie_id','movies.title as title','movies.rating as rating','movies.duration as duration','movies.publish_year as publish_year','movies.maturity_rating as maturity_rating','movies.detail as detail','movies.trailer_url as trailer_url','videolinks.iframeurl as iframeurl','movies.status as status','movies.type as type','movies.thumbnail as thumbnail','movies.slug as slug','movies.tmdb as tmdb','movies.is_custom_label as is_custom_label','movies.label_id as label_id')
                                ->where('movies.is_upcoming','!=' ,1)
                               ->where('watch_histories.id',$item->id)->where('menu_videos.menu_id',$menu->id)->first();
                    
                  $historyadded[] = $rm;

                  
                  if($section->order == 1){
                    arsort($historyadded);
                  }
                 

                  if(count($historyadded) == $section->item_limit){
                      break;
                      exit(1);
                  }
              }
             

              foreach ($watchistory as $key => $item) {
                  
                  $rectvs =  App\TvSeries::
                                join('watch_histories','tv_series.id','=','watch_histories.tv_id')
                                   ->join('seasons','seasons.tv_series_id','=','tv_series.id')
                                ->join('episodes','episodes.seasons_id','=','seasons.id')
                                ->join('videolinks','videolinks.episode_id','=','episodes.id')
                               ->join('menu_videos','menu_videos.tv_series_id','=','tv_series.id')
                                ->select('seasons.id as seasonid','tv_series.genre_id as genre_id','tv_series.id as id','tv_series.type as type','tv_series.status as status','tv_series.thumbnail as thumbnail','tv_series.title as title','tv_series.rating as rating','seasons.publish_year as publish_year','tv_series.maturity_rating as age_req','tv_series.detail as detail','seasons.season_no as season_no','videolinks.iframeurl as iframeurl','seasons.tmdb as tmdb','tv_series.is_custom_label as is_custom_label','tv_series.label_id as label_id')
                                ->where('watch_histories.id',$item->id)->where('menu_videos.menu_id',$menu->id)->first();
                    
                  $historyadded[] = $rectvs;
                

                  if($section->order == 1){
                    arsort($historyadded);
                  }
                  
                  if(count($historyadded) == $section->item_limit){
                      break;
                      exit(1);
                  }

              }
              
              

              $historyadded = array_values(array_filter($historyadded));
              
          ?>
           
          <?php if($section->section_id == 5 && $historyadded != NULL && count($historyadded) >0): ?>
            <div class="genre-prime-block genre-prime-block-one genre-paddin-top">
               <div class="container-fluid">
                   
                    <h5 class="section-heading"><?php echo e(__('Continue Watching')); ?> </h5>
                    
                    <!-- Continue Watch  added movies and tv shows in list view End-->
                        <?php if($section->view == 1): ?>
                          <div class="genre-prime-slider owl-carousel">
                             <?php $__currentLoopData = $historyadded; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php
                                 if(isset($auth) && $auth != NULL){


                                   if ($item->type == 'M') {
                                    $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                                      ['user_id', '=', $auth->id],
                                                                                      ['movie_id', '=', $item->id],
                                                                                    ])->first();
                                  }
                                   }

                                   if(isset($auth) && $auth != NULL){

                                      $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();

                                      if (isset($gets1)) {


                                        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                                    ['user_id', '=', $auth->id],
                                                                                    ['season_id', '=', $gets1->id],
                                          ])->first();


                                        }

                                      }
                                      else{
                                         $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();
                                      }
                                ?>

                                <?php if($item->status == 1): ?>
                                  <?php if($item->type == 'M'): ?>
                                  <?php
                                       $image = 'images/movies/thumbnails/'.$item->thumbnail;
                                      // Read image path, convert to base64 encoding
                                      
                                      $imageData = base64_encode(@file_get_contents($image));
                                      if($imageData){
                                          $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                      }else{
                                          $src = Avatar::create($item->title)->toBase64();
                                      }
                                  ?>
                                     <?php if(hidedata($item->id,$item->type) != 1): ?>
                                    <div class="genre-prime-slide">
                                      <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>">
                                        <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                        <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                          <?php if($src): ?>
                                            <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="movie-image">
                                          <?php else: ?>
                                            <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="movie-image">
                                          <?php endif; ?>
                                        </a>
                                        <div class="hide-icon">
                                          <a onclick="hideforme('<?php echo e($item->id); ?>','<?php echo e($item->type); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                                        </div>
                                        <?php if(timecalcuate($auth->id,$item->id,$item->type) != 0): ?>
                                        <div class="progress">
                                          <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e(timecalcuate($auth->id,$item->id,$item->type)); ?>%">
                                          </div>
                                        </div>
                                        <?php endif; ?>
                                        <?php else: ?>
                                          <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                          <?php if($src): ?>
                                            <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="movie-image">
                                          <?php else: ?>
                                            <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="movie-image">
                                          <?php endif; ?>
                                        </a>
                                        <?php endif; ?>
                                        <?php if($item->is_custom_label == 1): ?>
                                          <?php if(isset($item->label_id)): ?>
                                            <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                                          <?php endif; ?>
                                      
                                        <?php endif; ?>
                                       
                                      </div>
                                      <?php if(isset($protip) && $protip == 1): ?>
                                      <div id="prime-mix-description-block<?php echo e($item->id); ?>" class="prime-description-block">
                                        <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                                        
                                        <ul class="description-list">
                                          <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                                          <li><?php echo e($item->duration); ?> <?php echo e(__('Mins')); ?></li>
                                          <li><?php echo e($item->publish_year); ?></li>
                                          <li><?php echo e($item->maturity_rating); ?></li>
                                         
                                        </ul>
                                        <div class="main-des">
                                          <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                            <a href="<?php echo e(url('movie/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                          <?php else: ?>
                                             <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                          <?php endif; ?>
                                        </div>
                                      
                                         
                                        <div class="des-btn-block">
                                          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                            <?php if(checkInMovie($item) == true && isset($item->video_link)): ?>
                                              <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                                                <?php if($item->video_link['iframeurl'] != null): ?>
                                            
                                                  <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                </a>

                                                <?php else: ?>
                                                  <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                  </a>
                                                <?php endif; ?>
                                              <?php else: ?>
                                                <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                </a>
                                              <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                              <a class="iframe btn btn-default" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                            <?php endif; ?>
                                          <?php else: ?>
                                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                              <a class="iframe btn btn-default" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                            <?php endif; ?>
                                          <?php endif; ?>
                                          
                                          <?php if($catlog ==0 && getSubscription()->getData()->subscribed == true): ?>

                                            <?php if(isset($wishlist_check->added)): ?>
                                              <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></button>
                                            <?php else: ?>
                                           
                                              <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                                            <?php endif; ?>
                                          <?php elseif($catlog ==1 && $auth): ?>
                                            <?php if(isset($wishlist_check->added)): ?>
                                              <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></button>
                                            <?php else: ?>
                                         
                                              <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                                            <?php endif; ?>
                                          <?php endif; ?>
                                        </div>
                                      </div>
                                      <?php endif; ?>
                                     
                                    </div>
                                    <?php endif; ?>
                                  <?php elseif($item->type == 'T'): ?>
                                      <?php
                                           $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                                          // Read image path, convert to base64 encoding
                                          
                                          $imageData = base64_encode(@file_get_contents($image));
                                          if($imageData){
                                              $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                          }else{
                                              $src = Avatar::create($item->title)->toBase64();
                                          }
                                      ?>
                                    <?php if(hidedata($gets1->id,$gets1->type) != 1): ?>
                                     <div class="genre-prime-slide">
                                        <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                                          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                          <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                            <?php if($item->thumbnail != null): ?>
                                              
                                              <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="tvseries-image">
                                            
                                            <?php else: ?>
                                              <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="tvseries-image">
                                            <?php endif; ?>
                                          </a>
                                          <div class="hide-icon">
                                            <a onclick="hideforme('<?php echo e($gets1->id); ?>','<?php echo e($gets1->type); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                                          </div>
                                          <?php else: ?>
                                           <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                            <?php if($item->thumbnail != null): ?>
                                              <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                                          
                                            <?php else: ?>
                                              <img data-src="<?php echo e($src); ?>" class="img-responsive owl-lazy" alt="genre-image">
                                            <?php endif; ?>
                                          </a>
                                          <?php endif; ?> 
                                          <?php if($item->is_custom_label == 1): ?>
                                            <?php if(isset($item->label_id)): ?>
                                              <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                                            <?php endif; ?>
                                          <?php endif; ?>
                                        
                                        </div>
                                        <?php if(isset($protip) && $protip == 1): ?>
                                        <div id="prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                                          <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                                          
                                          <ul class="description-list">
                                            <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                                            <li><?php echo e(__('Season')); ?> <?php echo e($item->season_no); ?></li>
                                            <li><?php echo e($item->publish_year); ?></li>
                                            <li><?php echo e($item->age_req); ?></li>
                                           
                                          </ul>
                                          <div class="main-des">
                                            <?php if($item->detail != null || $item->detail != ''): ?>
                                              <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                            <?php else: ?>
                                              <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                            <?php endif; ?>
                                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                              <a href="<?php echo e(url('show/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                            <?php else: ?>
                                               <a href="<?php echo e(url('show/guest/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                            <?php endif; ?>
                                          </div>
                                          
                                          <div class="des-btn-block">
                                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                              <?php if(isset($gets1->episodes[0]) && checkInTvseries($item) == true && isset($gets1->episodes[0]->video_link)): ?>
                                                <?php if($item->age_req == 'all age' || $age>=str_replace('+', '', $item->age_req)): ?>

                                                  <?php if($gets1->episodes[0]->video_link['iframeurl'] !=""): ?>
                                               
                                                    <a href="#" onclick="playoniframe('<?php echo e($gets1->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($gets1->episodes[0]->seasons->tvseries->id); ?>','tv')" class="btn btn-play"><span class= "play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                     </a>

                                                  <?php else: ?>
                                                    <a href="<?php echo e(route('watchTvShow',$gets1->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                                  <?php endif; ?>
                                                <?php else: ?>
                                                 <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                                <?php endif; ?>
                                              <?php endif; ?>
                                              <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                                <a href="<?php echo e(route('watchtvTrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                                              <?php endif; ?>
                                            <?php else: ?>
                                               <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                                <a href="<?php echo e(route('guestwatchtvtrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                                              <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>
                                              <?php if(isset($gets1)): ?>
                                                <?php if(isset($wishlist_check->added)): ?>
                                                  <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></a>
                                                <?php else: ?>
                                                  <?php if($gets1): ?>
                                                    <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                                    </a>
                                                  <?php endif; ?>
                                                <?php endif; ?>
                                              <?php endif; ?>
                                            <?php elseif($catlog ==1 && $auth): ?>
                                              <?php if(isset($gets1)): ?>
                                                <?php if(isset($wishlist_check->added)): ?>
                                                  <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('remove fromw atchlist') : __('Add to Watchlist')); ?></a>
                                                <?php else: ?>
                                                  <?php if($gets1): ?>
                                                    <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                                    </a>
                                                  <?php endif; ?>
                                                <?php endif; ?>
                                              <?php endif; ?>
                                            <?php endif; ?>
                                          </div>
                                        </div>
                                        <?php endif; ?>
                                     </div>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                <?php endif; ?>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                          </div>
                        <?php endif; ?>
                    <!-- continue Watch added movies and tv shows in list view End-->
                    
                     <!-- continue Watch Tvshows and movies in Grid view -->
                        <?php if($section->view == 0): ?>
                             <div class="genre-prime-block">
                                <?php $__currentLoopData = $historyadded; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php
                                     if(isset($auth) && $auth != NULL){


                                       if ($item->type == 'M') {
                                        $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                                          ['user_id', '=', $auth->id],
                                                                                          ['movie_id', '=', $item->id],
                                                                                        ])->first();
                                      }
                                       }

                                       if(isset($auth) && $auth != NULL){

                                          $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();

                                          if (isset($gets1)) {


                                            $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                                        ['user_id', '=', $auth->id],
                                                                                        ['season_id', '=', $gets1->id],
                                              ])->first();


                                            }

                                          }
                                          else{
                                             $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();
                                          }
                                    ?>
                                    <?php if($item->status == 1): ?>
                                      <?php if($item->type == 'M'): ?>
                                      <?php
                                       $image = 'images/movies/thumbnails/'.$item->thumbnail;
                                      // Read image path, convert to base64 encoding
                                      
                                      $imageData = base64_encode(@file_get_contents($image));
                                      if($imageData){
                                      // Format the image SRC:  data:{mime};base64,{data};
                                      $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                      }else{
                                          $src = Avatar::create($item->title)->toBase64();
                                      }
                                  ?>
                                   <?php if(hidedata($item->id,$item->type) != 1): ?>
                                   <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                                      <div class="cus_img">
                                        <div class="genre-slide-image home-prime-slider progress-movie protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?>">
                                        <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                          <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                            <?php if($src): ?>
                                              <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="movie-image">
                                            <?php else: ?>
                                              <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="movie-image">
                                            <?php endif; ?>
                                         </a>
                                         <div class="hide-icon hide-icon-two">
                                            <a onclick="hideforme('<?php echo e($item->id); ?>','<?php echo e($item->type); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                                          </div>
                                          <?php if(timecalcuate($auth->id,$item->id,$item->type) != 0): ?>
                                          <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo e(timecalcuate($auth->id,$item->id,$item->type)); ?>%">
                                            </div>
                                          </div>
                                        <?php endif; ?>
                                        <?php else: ?>
                                         <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                          <?php if($src): ?>
                                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="movie-image">
                                          <?php else: ?>
                                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="movie-image">
                                          <?php endif; ?>
                                        </a>

                                        <?php endif; ?>
                                       <?php if($item->is_custom_label == 1): ?>
                                          <?php if(isset($item->label_id)): ?>
                                            <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                                          <?php endif; ?>
                                        
                                        <?php endif; ?>
                                      </div>
                                      <?php if(isset($protip) && $protip == 1): ?>
                                       <div id="prime-mix-description-block<?php echo e($item->id); ?>" class="prime-description-block">
                                          <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                                          
                                          <ul class="description-list">
                                            <li><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></li>
                                            <li><?php echo e($item->duration); ?> <?php echo e(__('Mins')); ?></li>
                                            <li><?php echo e($item->publish_year); ?></li>
                                            <li><?php echo e($item->maturity_rating); ?></li>
                                           
                                          </ul>
                                          <div class="main-des">
                                            <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                              <a href="<?php echo e(url('movie/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                            <?php else: ?>
                                               <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                            <?php endif; ?>
                                          </div>
                                          <?php if($catlog==1 && getSubscription()->getData()->subscribed == true): ?>
                                          <?php if($withlogin==0 && $auth): ?>
                                            <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                               <a class="iframe btn btn-default" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                            <?php endif; ?>
                                            <?php else: ?>
                                             <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                               <a class="iframe btn btn-default" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                            <?php endif; ?>
                                            <?php endif; ?>

                                            <?php endif; ?>

                                           
                                          <div class="des-btn-block">
                                            <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                              <?php if(checkInMovie($item) == true): ?>
                                                <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                                                  <?php if($item->video_link['iframeurl'] != null): ?>
                                              
                                                    <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                  </a>

                                                  <?php else: ?>
                                                    <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                    </a>
                                                  <?php endif; ?>
                                                <?php else: ?>
                                                  <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                  </a>
                                                <?php endif; ?>
                                              <?php endif; ?>
                                              <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                                <a class="iframe btn btn-default" href="<?php echo e(route('watchTrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                              <?php endif; ?>
                                            <?php else: ?>
                                              <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                                <a class="iframe btn btn-default" href="<?php echo e(route('guestwatchtrailer',$item->id)); ?>"><?php echo e(__('Watch Trailer')); ?></a>
                                              <?php endif; ?>
                                            <?php endif; ?>
                                            
                                            <?php if($catlog ==0 && getSubscription()->getData()->subscribed == true): ?> 

                                              <?php if(isset($wishlist_check->added)): ?>
                                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></button>
                                              <?php else: ?>
                                             
                                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                                              <?php endif; ?>
                                            <?php elseif($catlog ==1 && $auth): ?>
                                              <?php if(isset($wishlist_check->added)): ?>
                                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></button>
                                              <?php else: ?>
                                           
                                                <button onclick="addWish(<?php echo e($item->id); ?>,'<?php echo e($item->type); ?>')" class="addwishlistbtn<?php echo e($item->id); ?><?php echo e($item->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?></button>
                                              <?php endif; ?>
                                            <?php endif; ?>
                                          </div>
                                        </div>
                                      <?php endif; ?>
                                      </div>
                                   </div>
                                   <?php endif; ?>
                                  <?php elseif($item->type == 'T'): ?>
                                    <?php
                                       $image = 'images/tvseries/thumbnails/'.$item->thumbnail;
                                      // Read image path, convert to base64 encoding
                                      
                                      $imageData = base64_encode(@file_get_contents($image));
                                      if($imageData){
                                      // Format the image SRC:  data:{mime};base64,{data};
                                      $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                      }else{
                                          $src = Avatar::create($item->title)->toBase64();
                                      }
                                    ?>
                                     <?php if(hidedata($gets1->id,$gets1->type) != 1): ?>
                                        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
                                            <div class="cus_img">
                                            <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>">
                                               <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                                <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                                  <?php if($src): ?>
                                                    
                                                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="genre-image">
                                                  <?php endif; ?>
                                                </a>
                                                <div class="hide-icon hide-icon-two">
                                                  <a onclick="hideforme('<?php echo e($gets1->id); ?>','<?php echo e($gets1->type); ?>')" title="<?php echo e(__('Hide this Movie')); ?>" class=""><i class="fa fa-eye-slash"></i></a>
                                                </div>
                                                <?php else: ?>
                                                 <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                                  <?php if($src): ?>
                                                    <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="tseries-image">
                                                  
                                                  <?php endif; ?>
                                                </a>
                                                <?php endif; ?>
                                                <?php if($item->is_custom_label == 1): ?>
                                                  <?php if(isset($item->label_id)): ?>
                                                    <span class="badge bg-info"><?php echo e($item->label->name); ?></span>
                                                  <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                            <?php if(isset($protip) && $protip == 1): ?>
                                            <div id="prime-mix-description-block<?php echo e($item->id); ?><?php echo e($item->type); ?>" class="prime-description-block">
                                              <h5 class="description-heading"><?php echo e($item->title); ?></h5>
                                              <div class="movie-rating"><?php echo e(__('Tmdb Rating')); ?> <?php echo e($item->rating); ?></div>
                                              <ul class="description-list">
                                                <li><?php echo e(__('Season')); ?> <?php echo e($item->season_no); ?></li>
                                                <li><?php echo e($item->publish_year); ?></li>
                                                <li><?php echo e($item->age_req); ?></li>
                                               
                                              </ul>
                                              <div class="main-des">
                                                <?php if($item->detail != null || $item->detail != ''): ?>
                                                  <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                                <?php else: ?>
                                                  <p><?php echo e(rtrim(str_limit($item->detail,300,'...'))); ?></p>
                                                <?php endif; ?>
                                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                                  <a href="<?php echo e(url('show/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                                <?php else: ?>
                                                   <a href="<?php echo e(url('show/guest/detail',$item->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                                <?php endif; ?>
                                              </div>
                                             
                                              <div class="des-btn-block">
                                                <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                                  <?php if(isset($gets1->episodes[0]) && checkInTvseries($item) == true && isset($gets1->episodes[0]->video_link)): ?>
                                                    <?php if($item->age_req == 'all age' || $age>=str_replace('+', '', $item->age_req)): ?>

                                                      <?php if($gets1->episodes[0]->video_link['iframeurl'] !=""): ?>
                                                     
                                                        <a href="#" onclick="playoniframe('<?php echo e($gets1->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($gets1->episodes[0]->seasons->tvseries->id); ?>','tv')" class="btn btn-play"><span class= "play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                        </a>

                                                      <?php else: ?>
                                                        <a href="<?php echo e(route('watchTvShow',$gets1->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                                      <?php endif; ?>
                                                    <?php else: ?>
                                                      <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                                    <?php endif; ?>
                                                  <?php endif; ?>
                                                   <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                                      <a href="<?php echo e(route('watchtvTrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                                                    <?php endif; ?>
                                                  <?php else: ?>
                                                     <?php if($gets1->trailer_url != null || $gets1->trailer_url != ''): ?>
                                                      <a href="<?php echo e(route('guestwatchtvtrailer',$gets1->id)); ?>" class="iframe btn btn-default"><?php echo e(__('Watch Trailer')); ?></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if($catlog == 0 && getSubscription()->getData()->subscribed == true): ?>
                                                  <?php if(isset($gets1)): ?>
                                                    <?php if(isset($wishlist_check->added)): ?>
                                                      <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></a>
                                                    <?php else: ?>
                                                      <?php if($gets1): ?>
                                                        <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('Add to Watchlist')); ?>

                                                        </a>
                                                      <?php endif; ?>
                                                    <?php endif; ?>
                                                  <?php endif; ?>
                                                <?php elseif($catlog ==1 && $auth): ?>
                                                  <?php if(isset($gets1)): ?>
                                                    <?php if(isset($wishlist_check->added)): ?>
                                                      <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e($wishlist_check->added == 1 ? __('Remove From Watchlist') : __('Add to Watchlist')); ?></a>
                                                    <?php else: ?>
                                                      <?php if($gets1): ?>
                                                        <a onclick="addWish(<?php echo e($gets1->id); ?>,'<?php echo e($gets1->type); ?>')" class="addwishlistbtn<?php echo e($gets1->id); ?><?php echo e($gets1->type); ?> btn-default"><?php echo e(__('add to watchlist')); ?>

                                                        </a>
                                                      <?php endif; ?>
                                                    <?php endif; ?>
                                                  <?php endif; ?>
                                                <?php endif; ?>
                                              </div>
                                             
                                            </div>
                                            <?php endif; ?>
                                           
                                          </div>
                                        </div>
                                        <?php endif; ?>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </div>
                        <?php endif; ?>
                    <!-- Continue watch Tvshows and movies in Grid view END-->

                </div>
            </div> 
          <?php endif; ?>
            
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

  <!----------- Continue watch end ----------------->



  <!------------- Movie Pormotion ------------------->


  <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  
  <?php if($section->section_id == 7 && $short_promo != NULL && count($short_promo)>0): ?>
  <div class="promotion-slider">
    <div class="container-fluid" >
      <div id="myCarousel" class="carousel slide home-dtl-slider" data-ride="carousel" style="background-image: url('<?php echo e(asset('/images/default-poster.jpg')); ?>')">
        <div class="overlay-bg"></div>
        <!-- Indicators -->
        
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <?php
          
              $homeblocks = [];
              foreach ($short_promo as $key => $item) {

                $d = \Request::getHost();
          $domain = str_replace("www.", "", $d);
          if (strstr($domain, 'localhost') ) {
            $ipaddress='43.251.92.73'; 
          }else{
          $ipaddress = $request->getClientIp();
          }
            $geoip = geoip()->getLocation($ipaddress);
            $usercountry = strtoupper($geoip->country);
          
                  $home_movie =  App\Movie::join('videolinks','videolinks.movie_id','=','movies.id')
                              ->join('home_blocks','home_blocks.movie_id','=','movies.id')
                              ->select('movies.id as id','movies.title as title','movies.type as type','movies.status as status','movies.genre_id as genre_id','movies.poster as poster','movies.rating as rating','movies.duration as duration','movies.publish_year as publish_year','movies.maturity_rating as maturity_rating','movies.detail as detail','movies.trailer_url as trailer_url','movies.slug as slug','movies.is_custom_label as is_custom_label','movies.label_id as label_id')
                                ->where('movies.is_upcoming','!=' ,1)
                                ->where('movies.is_kids','!=' ,1)
                                ->where('movies.country', 'NOT like', '%'.$usercountry.'%')
                              ->where('movies.id',$item->movie_id)->first();
                    
                  $homeblocks[] = $home_movie;

                

              }
            

              foreach ($short_promo as $key => $item) {
                $d = \Request::getHost();
          $domain = str_replace("www.", "", $d);
          if (strstr($domain, 'localhost') ) {
            $ipaddress='43.251.92.73'; 
          }else{
          $ipaddress = $request->getClientIp();
          }
            $geoip = geoip()->getLocation($ipaddress);
            $usercountry = strtoupper($geoip->country);
                $home_tvs = App\TvSeries::
                                join('seasons','seasons.tv_series_id','=','tv_series.id')
                                ->join('episodes','episodes.seasons_id','=','seasons.id')
                                ->join('videolinks','videolinks.episode_id','=','episodes.id')
                                ->join('home_blocks','home_blocks.tv_series_id','=','tv_series.id')
                                ->select('seasons.id as seasonid','tv_series.genre_id as genre_id','tv_series.id as id','tv_series.type as type','tv_series.status as status','tv_series.thumbnail as thumbnail','tv_series.title as title','tv_series.rating as rating','seasons.publish_year as publish_year','tv_series.maturity_rating as age_req','tv_series.detail as detail','seasons.season_no as season_no','videolinks.iframeurl as iframeurl','tv_series.poster as poster','seasons.trailer_url as trailer_url')
                                ->where('tv_series.country', 'NOT like', '%'.$usercountry.'%')
                                ->where('tv_series.id',$item->tv_series_id)->first();
                    
                  $homeblocks[] = $home_tvs;



              }

              $homeblocks = array_values(array_filter($homeblocks));

          ?>

          <?php $__currentLoopData = $homeblocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ki => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
              <?php
              if(isset($auth) && $auth != NULL){
                if ($item->type == 'M') {
                  $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                    ['user_id', '=', $auth->id],
                                                                    ['movie_id', '=', $item->id],
                                                                  ])->first();
                  }
                }

                if(isset($auth) && $auth != NULL){

                    $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();

                    if (isset($gets1)) {


                      $wishlist_check = \Illuminate\Support\Facades\DB::table('wishlists')->where([
                                                                  ['user_id', '=', $auth->id],
                                                                  ['season_id', '=', $gets1->id],
                        ])->first();


                      }

                    }
                    else{
                      $gets1 = App\Season::where('tv_series_id','=',$item->id)->first();
                    }
              ?>

                <div class="item <?php echo e($ki==0 ? "active" : ""); ?>">
                  <div class="row">
                    
                          <div class="col-md-6">
                            <?php if($item->status == 1): ?>
                              <?php if($item->type == 'M'): ?>
                                <?php
                                  $image = 'images/movies/posters/'.$item->poster;
                                  // Read image path, convert to base64 encoding
                                
                                  $imageData = base64_encode(@file_get_contents($image));
                                  if($imageData){
                                  // Format the image SRC:  data:{mime};base64,{data};
                                  $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                                  }else{
                                      $src = Avatar::create($item->title)->toBase64();
                                  }
                                ?>
                                <div class="slider-height">
                                
                                  <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                    <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                        <?php
                                          $url = str_replace("https://youtu.be/", "https://youtube.com/embed/", $item->trailer_url)
                                        ?>
                                        <iframe src="<?php echo e($url); ?>" height="350" width="100%"></iframe>
                                      <?php else: ?>
                                        <a href="<?php echo e(url('movie/detail',$item->slug)); ?>">
                                          <?php if($src): ?>
                                            <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="movie-image" style="width:100%">
                                          
                                          <?php endif; ?>
                                        </a>
                                    <?php endif; ?>              

                                  <?php else: ?>
                                  
                                    <?php if($item->trailer_url != null || $item->trailer_url != ''): ?>
                                      <?php
                                        $url = str_replace("https://youtu.be/", "https://youtube.com/embed/", $item->trailer_url)
                                      ?>
                                      <iframe src="<?php echo e($url); ?>" height="215" width="100%"></iframe>
                                    <?php else: ?>
                                      <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>">
                                        <?php if($src): ?>
                                          <img data-src="<?php echo e($src); ?>" class="img-responsive lazy" alt="movie-image" style="width:100%">
                                        
                                        <?php endif; ?>
                                      </a>
                                    <?php endif; ?>             
                                  <?php endif; ?>
                                </div>
                              <?php elseif($item->type === 'T'): ?>
                              <?php
                              $image = 'images/tvseries/posters/'.$item->poster;
                            // Read image path, convert to base64 encoding
                          
                            $imageData = base64_encode(@file_get_contents($image));
                            if($imageData){
                            // Format the image SRC:  data:{mime};base64,{data};
                            $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
                            }else{
                                $src = Avatar::create($item->title)->toBase64();
                            }
                          ?>
                                  
                                  <div class="slider-height">
                                    <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                      <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                        <?php if($item->poster): ?>
                                          <img src="<?php echo e(url('images/tvseries/posters/'.$item->poster)); ?>" class="img-responsive" alt="tvseries-image" style="width:100%">
                                          <?php else: ?>
                                          <img src="<?php echo e(url('images/default-poster.jpg')); ?>" class="img-responsive" alt="tvseries-image" style="width:100%">
                                        <?php endif; ?>
                                      </a>
                                    <?php else: ?>
                                      <a <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>>
                                        <?php if($src): ?>
                                          
                                        <img src="<?php echo e(url('images/tvseries/posters/'.$item->poster)); ?>" class="img-responsive" alt="tvseries-image" style="width:100%">
                                        
                                        <?php else: ?>
                                          <img src="<?php echo e(url('images/default-poster.jpg')); ?>" class="img-responsive" alt="tvseries-image" style="width:100%">
                                        <?php endif; ?>
                                      </a>                
                                    <?php endif; ?>
                                  </div>
                              <?php endif; ?>
                            <?php endif; ?>
                          </div>
                          <div class="col-md-6">
                            <?php if($item->status == 1): ?>
                              <?php if($item->type == 'M'): ?>
                                <div class="slider-height-dtl">
                                  <img src="<?php echo e(url('images/logo/'.$logo)); ?>" class="img-responsive" alt="<?php echo e($w_title); ?>">
                                    <h1><?php echo e($item->title); ?></h1><br/>
                                    <div class="row">
                                      <div class="des-btn-block des-in-list">
                                          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                            <?php if(checkInMovie($item) == true && isset($item->video_link)): ?>
                                              <?php if($item->maturity_rating == 'all age' || $age>=str_replace('+', '', $item->maturity_rating)): ?>
                                                <?php if($item->video_link['iframeurl'] != null): ?>
                                                  <a href="<?php echo e(route('watchmovieiframe',$item->id)); ?>"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                  </a>

                                                <?php else: ?>
                                                  <a href="<?php echo e(route('watchmovie',$item->id)); ?>" class="iframe btn btn-play"> <span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                  </a>
                                                <?php endif; ?>
                                              <?php else: ?>
                                                <a onclick="myage(<?php echo e($age); ?>)" class=" iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                                </a>
                                              <?php endif; ?>
                                            <?php endif; ?>
                                            
                                          <?php endif; ?>
                                        
                                          <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                            <a class="btn btn-default" href="<?php echo e(url('movie/detail',$item->slug)); ?>"><i class="fa fa-info-circle"></i> <?php echo e(__('more info')); ?></a>
                                          <?php else: ?>
                                            <a class="btn btn-default" href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>"><i class="fa fa-info-circle"></i> <?php echo e(__('more info')); ?></a>
                                          <?php endif; ?>
                                        </div>
                                      </div>
                                      <br/>
                                      <p><?php echo e(str_limit($item->detail,150,'...')); ?></p>
                                      <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                        <a href="<?php echo e(url('movie/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                      <?php else: ?>
                                        <a href="<?php echo e(url('movie/guest/detail',$item->slug)); ?>"><?php echo e(__('Read More')); ?></a>
                                      <?php endif; ?>
                                      <br/>
                                    
                                </div>
                              <?php elseif($item->type === 'T'): ?>
                                <div class="slider-height-dtl">
                              <img data-src="<?php echo e(url('images/logo/'.$logo)); ?>" class="img-responsive lazy" alt="<?php echo e($w_title); ?>">
                              <h1><?php echo e($item->title); ?></h1>
                              <br/>
                              <div>
                              <div class="des-btn-block des-in-list des-in-list-one">
                                  <?php if(isset($gets1->episodes[0]) &&  getSubscription()->getData()->subscribed == true && $auth && checkInTvseries($item) == true && isset($gets1->episodes[0]->video_link)): ?>
                                    <?php if($item->age_req == 'all age' || $age>=str_replace('+', '', $item->age_req)): ?>

                                      <?php if($gets1->episodes[0]->video_link['iframeurl'] !=""): ?>
                                      
                                        <a href="#" onclick="playoniframe('<?php echo e($gets1->episodes[0]->video_link['iframeurl']); ?>','<?php echo e($gets1->episodes[0]->seasons->tvseries->id); ?>','tv')" class="btn btn-play"><span class= "play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span>
                                        </a>

                                      <?php else: ?>
                                        <a href="<?php echo e(route('watchTvShow',$gets1->id)); ?>" class="iframe btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                      <?php endif; ?>
                                    <?php else: ?>
                                    <a onclick="myage(<?php echo e($age); ?>)" class=" btn btn-play"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text"><?php echo e(__('Play Now')); ?></span></a>
                                    <?php endif; ?>
                                  
                                  <?php endif; ?>
                                  <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                    <a class="btn btn-default" <?php if(isset($gets1)): ?> href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>" <?php endif; ?>><i class="fa fa-info-circle"></i> <?php echo e(__('more info')); ?></a>
                                  <?php else: ?>
                                    <a class="btn btn-default" <?php if(isset($gets1)): ?> href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>" <?php endif; ?>><i class="fa fa-info-circle"></i> <?php echo e(__('more info')); ?></a>

                                  <?php endif; ?>
                                </div>
                              </div>

                              <br/>
                              <p><?php echo e(str_limit($item->detail,150,'...')); ?></p>
                              <?php if($auth && getSubscription()->getData()->subscribed == true): ?>
                                <a href="<?php echo e(url('show/detail',$gets1->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                              <?php else: ?>
                                <a href="<?php echo e(url('show/guest/detail',$gets1->season_slug)); ?>"><?php echo e(__('Read More')); ?></a>
                              <?php endif; ?>
                              <br/>
                              
                            </div>
                              <?php endif; ?>
                            <?php endif; ?>
                          </div>
                  </div>
                </div>     
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
        </div>

      
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <i class="flaticon-left-arrow" aria-hidden="true"></i>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <i class="flaticon-right-arrow" aria-hidden="true"></i>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
  <?php endif; ?>
  
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <!----------- Movie Pormotion end ----------------->


  <!--------- upcoming Movie -------------->

       
    <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <?php if($section->section_id == 9 && isset($menu->menu_data) && $menu->menu_data != NULL && isset($upcomingitems->menu_data)): ?>
        <?php echo $__env->make('upcoming', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>  

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     

  <!--------- end upcoming Movie ----------->
<?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

   <?php if($section->section_id == 6): ?>

    <?php if(count($getallaudiolanguage) > 0): ?>
      <div class="genre-prime-block genre-prime-block-one genre-paddin-top genre-view-all">
        <div class="container-fluid">
          <h5 class="section-heading"><?php echo e(__('View All Languages')); ?></h5>
          <div class="genre-prime-slider owl-carousel">
           <?php $__currentLoopData = $getallaudiolanguage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="item">
                <div class="genre-prime-slide owls-item">
                 <?php if($auth && getSubscription()->getData()->subscribed == true): ?> 
                   <a href="<?php echo e(route('show.in.alang',$alang->id)); ?>">
                      <div class="protip text-center" data-pt-placement="outside">
                        <?php if($alang->image != NULL): ?>
                          <img data-src="<?php echo e(url('images/audiolanguage/'.$alang->image)); ?>" class="img img-responsive genreview owl-lazy">
                        <?php else: ?>
                          <img data-src="<?php echo e(url('/images/default-thumbnail.jpg')); ?>" class="img img-responsive genreview owl-lazy">
                        <?php endif; ?>
                      </div>
                      <div class="content">
                        <h1 class="content-heading"><?php echo e(ucfirst($alang->language)); ?></h1>
                      </div>
                    </a>
                  <?php else: ?>
                    <a href="<?php echo e(route('show.in.guest.alang',$alang->id)); ?>">
                     <div class="protip text-center" data-pt-placement="outside">
                    <?php if($alang->image != NULL): ?>
                      <img data-src="<?php echo e(url('images/audiolanguage/'.$alang->image)); ?>" class="img img-responsive genreview owl-lazy">
                      <?php else: ?>
                      <img data-src="<?php echo e(url('/images/default-thumbnail.jpg')); ?>" class="img img-responsive genreview owl-lazy">
                    <?php endif; ?>
                    </div>
                     <div class="content">
                      <h1 class="content-heading"><?php echo e(ucfirst($alang->language)); ?></h1>
                    </div>
                    </a>
                  <?php endif; ?>
               </div>
              </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>  
      </div>
    <?php endif; ?>


    
      
    <div class="genre-prime-block genre-prime-block-one genre-paddin-top mrg-btm">
        <div class="container-fluid border-bottom-none" id="post-data">
            <?php echo $__env->make('lang', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div> 
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if(isset($banner) && count($banner) > 0): ?>
    <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($banner_data->position == 3): ?>
            <div class="banneadd-main-block">
                <a href="<?php echo e($banner_data->link); ?>" title="" target="__blank">
                    <?php
                        $imagePath = $banner_data->image ? 'images/banneradd/' . $banner_data->image : 'images/default-thumbnail.jpg';
                        $imageData = base64_encode(@file_get_contents($imagePath));
                        $src = $imageData ? 'data: ' . mime_content_type($imagePath) . ';base64,' . $imageData : null;
                    ?>
                    <img src="<?php echo e($src); ?>" class="img-fluid" alt="">
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
       
  <?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($section->section_id == 2): ?>
      <?php if(count($menu->menugenreshow) > 0): ?>
        <?php echo $__env->make('selectgenre', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>
      <div class="genre-prime-block genre-prime-block-one genre-paddin-top">
        <div class="container-fluid" id="post-data">
          
          <?php if(count($getallgenre) > 0): ?>
          <div class="genre-view-all">
            <div class="">
              <h5 class="section-heading"><?php echo e(__('View All Genre')); ?></h5>
              <div class="genre-prime-slider owl-carousel">
                 <?php $__currentLoopData = $getallgenre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="item">
                    <div class="genre-prime-slide owls-item">
                        <?php if($auth && getSubscription()->getData()->subscribed == true): ?> 
                        <a href="<?php echo e(route('show.in.genre',$genre->id)); ?>">
                          <div class="protip text-center" data-pt-placement="outside">
                          <?php if($genre->image != NULL): ?>

                            <img data-src="<?php echo e(url('images/genre/'.$genre->image)); ?>" class="img img-responsive genreview owl-lazy">
                            <?php else: ?>
                            <img data-src="<?php echo e(url('/images/default-thumbnail.jpg')); ?>" class="img img-responsive genreview owl-lazy">
                          <?php endif; ?>
                          </div>
                           <div class="content">
                            <h1 class="content-heading"><?php echo e($genre->name); ?></h1>
                          </div>

                        </a>
                        <?php else: ?>
                          <a href="<?php echo e(route('show.in.guest.genre',$genre->id)); ?>">
                           <div class="protip text-center" data-pt-placement="outside">
                          <?php if($genre->image != NULL): ?>

                            <img data-src="<?php echo e(url('images/genre/'.$genre->image)); ?>" class="img img-responsive genreview owl-lazy">
                            <?php else: ?>
                            <img data-src="<?php echo e(url('/images/default-thumbnail.jpg')); ?>" class="img img-responsive genreview owl-lazy">
                          <?php endif; ?>
                          </div>
                           <div class="content">
                            <h1 class="content-heading"><?php echo e($genre->name); ?></h1>
                          </div>
                          </a>
                        <?php endif; ?>
                    </div>
                   
                  </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>  
          </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<!-- Blog Section -->
<?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if($section->section_id == 8): ?>
    <?php echo $__env->make('bloghome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if($section->section_id == 10): ?>
    <?php echo $__env->make('event', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!--------------------- Audio ------------------------->
<?php $__currentLoopData = $menu->menusections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php if($section->section_id == 11): ?>
   
      <?php echo $__env->make('audio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <!-- banner -->
<?php if(isset($banner) && count($banner) > 0): ?>
    <?php $__currentLoopData = $banner; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($banner_data->position == 2): ?>
            <div class="banneadd-main-block">
                <a href="<?php echo e($banner_data->link); ?>" title="" target="__blank">
                    <?php
                        $imagePath = $banner_data->image ? 'images/banneradd/' . $banner_data->image : 'images/default-thumbnail.jpg';
                        $imageData = base64_encode(@file_get_contents($imagePath));
                        $src = $imageData ? 'data: ' . mime_content_type($imagePath) . ';base64,' . $imageData : null;
                    ?>
                    <img src="<?php echo e($src); ?>" class="img-fluid" alt="">
                </a>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<!--- end banner -->
<!-------------------- end audio ---------------------->


        <!-- google adsense code -->
      <div class="container-fluid" id="adsense">
         <?php
            if (isset($ad) ) {
               if ($ad->ishome==1 && $ad->status==1) {
                  $code=  $ad->code;
                  echo html_entity_decode($code);
               }
            }
          ?>
      </div>
     
     
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>

<script>
 function playoniframe(url,id,type){
   $(document).ready(function(){
    var SITEURL = '<?php echo e(URL::to('')); ?>';
       $.ajax({
            type: "get",
            url: SITEURL + "/user/watchhistory/"+id+'/'+type,
            success: function (data) {
             console.log(data);
            },
            error: function (data) {
               console.log(data)
            }
        });
       
   
         
  
  });

        $.colorbox({ href: url, width: '100%', height: '100%', iframe: true });
    
      }
      
</script>
    
 <script>
 
      function myage(age){
        if (age==0) {
        $('#ageModal').modal('show'); 
      }else{
          $('#ageWarningModal').modal('show');
      }
    }
  
</script>

 
<script type="text/javascript">


function addWish(id, type) {
    //   app.addToWishList(id, type);
    $.ajax({
        type: 'POST',
        url: '<?php echo e(route('addtowishlist')); ?>',
        data: {"id": id, "type": type, "_token": "<?php echo e(csrf_token()); ?>"},
        success: function (data) {
            console.log(data);
        }
    });
    setTimeout(function() {
        $('.addwishlistbtn'+id+type).text(function(i, text){
          return text == "<?php echo e(__('Add to Watchlist')); ?>" ? "<?php echo e(__('Remove from Watchlist')); ?>" : "<?php echo e(__('Add to Watchlist')); ?>";
        });
      }, 100);
    }
  </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\NexthourWeb\resources\views/home.blade.php ENDPATH**/ ?>