
<?php $__env->startSection('title',__('All Movies')); ?>
<?php $__env->startSection('breadcum'); ?>
  <div class="breadcrumbbar">
    <h4 class="page-title"><?php echo e(__('All Movies')); ?></h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>" title="<?php echo e(__('Dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
          <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Movies')); ?></li>
        </ol>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('maincontent'); ?>
<div class="contentbar permissionTable"> 
  <div class="row">
    <div class="col-md-12">
      <div class="card-header movie-create-heading">
        <div class="row">
          <div class="col-lg-4 col-4">
            <h5 class="card-title"><?php echo e(__('All Movie')); ?> 
                 <input class="grand_selectallm ml-3" type="checkbox">
                                        <?php echo e(__('Select All')); ?>

              </h5>
          </div>
          <div class="col-lg-8 col-8">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('movies.delete')): ?>
              <button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal"
              data-target="#bulk_delete" title="<?php echo e(__('Delete Selected')); ?>"><i class="feather icon-trash mr-2"></i> <?php echo e(__('Delete Selected')); ?> </button>
            <?php endif; ?>

            <?php if(Session::has('changed_language')): ?>
            <a href="<?php echo e(route('tmdb_movie_translate')); ?>" class="float-right btn btn-warning-rgba mr-2" title="<?php echo e(__('Translate All To')); ?>"><i
                class="fa fa-language mr-2"></i><?php echo e(__('Translate All To')); ?> <?php echo e(Session::get('changed_language')); ?> </a>
            <?php endif; ?>
            <button type="button" class="float-right btn btn-success-rgba mb-2 mr-2 " data-toggle="modal"
            data-target=".bd-example-modal-lg" title="<?php echo e(__('Import Movies')); ?>"><i class="fa fa-file-excel-o mr-2"></i> <?php echo e(__('Import Movies')); ?> </button>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('movies.create')): ?>
            <a href="<?php echo e(route('movies.create')); ?>" class="float-right btn btn-primary-rgba mb-2 mr-2" title="<?php echo e(__('Add Movie')); ?>"><i
                class="feather icon-plus mr-2"></i><?php echo e(__('Add Movie')); ?> </a>
            <?php endif; ?>
            
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
                        <?php echo Form::open(['method' => 'POST', 'action' => 'MovieController@bulk_delete', 'id' => 'bulk_delete_form']); ?>

                              <button type="reset" class="btn btn-secondary translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                              <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                          <?php echo Form::close(); ?>

                      </div>
                  </div>
              </div>
            </div>
            

            
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true"> 
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleLargeModalLabel"><?php echo e(__("Bulk Import Movies")); ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="col-md-12">
                          <a href="<?php echo e(url('files/Movies.xlsx')); ?>" class="float-right btn btn-success-rgba mr-2 mt-4"><i
                              class="fa fa-file-excel-o mr-2"></i><?php echo e(__('Download Example xls/csv File')); ?></a>
                  </div>
        
                  <div class="card-header">
                      <h6 class="card-title"><?php echo e(__('Choose your xls/csv File :')); ?></h6>
                      <form action="<?php echo e(url('/admin/import/movies')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo method_field('POST'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group<?php echo e($errors->has('file') ? ' has-error' : ''); ?> input-file-block col-md-12">
                          <?php echo Form::file('file', ['class' => 'input-file', 'id'=>'file']); ?>

                          <label for="file" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="<?php echo e(__('Choose your xls/csv File')); ?>">
                            <i class="icon fa fa-check"></i>
                            <span class="js-fileName"><?php echo e(__('Choose A File')); ?></span>
                          </label>
                          <small class="text-danger"><?php echo e($errors->first('file')); ?></small>
                          <button type="submit" class="float-right btn btn-danger-rgba mr-2 "><i class="feather icon-plus mr-2"></i> <?php echo e(__('Import')); ?> </button>
                        </div>
                          
                      </form>
                  </div> 
                      
                  <div class="modal-body">
                      <div class="box box-danger">
                          <div class="box-header">
                            <div class="box-title"><?php echo e(__('Instructions')); ?></div>
                          </div>
                          <div class="box-body table-responsive">
                            <h6><b><?php echo e(__('Follow the instructions carefully before importing the file.')); ?></b></h6>
                            <small><?php echo e(__('The columns of the file should be in the following order.')); ?></small>
                            <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th><?php echo e(__('Column No')); ?></th>
                                  <th><?php echo e(__('Column Name')); ?></th>
                                  <th><?php echo e(__('Required')); ?></th>
                                  <th><?php echo e(__('Description')); ?></th>
                                </tr>
                              </thead>
            
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td><b><?php echo e(__('title')); ?></b></td>
                                  <td><b><?php echo e(__('Yes')); ?></b></td>
                                  <td><?php echo e(__('Enter movie title / name')); ?></td>
                                </tr>
            
                                <tr>
                                  <td>2</td>
                                  <td> <b><?php echo e(__('is_upcoming')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__('upcoming movie (1 = enabled, 0 = disabled)')); ?></td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td> <b><?php echo e(__('upcoming_date')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__('If is_upcoming = 1 , then the pass upcoming date here')); ?></b></td>
                                </tr>
            
                                <tr>
                                  <td>4</td>
                                  <td> <b><?php echo e(__('is_custom_label')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("custom label (1 = enabled, 0 = disabled)")); ?></b></td>
                                </tr>
            
                                <tr>
                                  <td>5</td>
                                  <td> <b><?php echo e(__('label_id')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("If is_custom_label = 1 , then the pass label id here")); ?></b></td>
                                </tr>
          
                                <tr>
                                  <td>6</td>
                                  <td> <b><?php echo e(__('selecturl')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Enter actor's DOB")); ?></b></td>
                                </tr>
                                <tr>
                                  <td>7</td>
                                  <td> <b><?php echo e(__('iframeurl')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Enter actor's DOB")); ?></b></td>
                                </tr>
                                <tr>
                                  <td>8</td>
                                  <td> <b><?php echo e(__('ready_url')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Enter actor's DOB")); ?></b></td>
                                </tr>
                                <tr>
                                  <td>9</td>
                                  <td> <b><?php echo e(__('url_360')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__('Name your video eg: example.jpg')); ?> <b><?php echo e(__('(Video can be uploaded using Media Manager / Movie / URL 360 Tab.)')); ?></b></td>
                                </tr>
                                <tr>
                                  <td>10</td>
                                  <td> <b><?php echo e(__('url_480')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__('Name your video eg: example.jpg')); ?> <b><?php echo e(__('(Video can be uploaded using Media Manager / Movie / URL 480 Tab.)')); ?></b></td>
                                </tr>
                                <tr>
                                  <td>11</td>
                                  <td> <b><?php echo e(__('url_720')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__('Name your video eg: example.jpg')); ?> <b><?php echo e(__('(Video can be uploaded using Media Manager / Movie / URL 720 Tab.)')); ?></b></td>
                                </tr>
                                <tr>
                                  <td>12</td>
                                  <td> <b><?php echo e(__('url_1080')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__('Name your video eg: example.jpg')); ?> <b><?php echo e(__('(Video can be uploaded using Media Manager / Movie / URL 1080 Tab.)')); ?></b></td>
                                </tr>
                                <tr>
                                  <td>13</td>
                                  <td> <b><?php echo e(__('upload_video')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__('Name your video eg: example.jpg')); ?> <b><?php echo e(__('(Video can be uploaded using Media Manager / Movie uploads Tab.)')); ?></b></td>
                                </tr>
                                <tr>
                                  <td>14</td>
                                  <td> <b><?php echo e(__('a_language')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Multiple a_language id can be pass here separate by comma")); ?></b></td>
                                </tr>
                                <tr>
                                  <td>15</td>
                                  <td> <b><?php echo e(__('maturity_rating')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Enter movie maturity ratings (please write one of these :-  all age , 13+, 16+ or 18+)")); ?></b></td>
                                </tr>
                                <tr>
                                  <td>16</td>
                                  <td> <b><?php echo e(__('thumbnail')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__('Name your image eg: example.jpg')); ?> <b><?php echo e(__('(Image can be uploaded using Media Manager / Movies / thumbnail Tab.)')); ?></b></td>
                                </tr>
                                <tr>
                                  <td>17</td>
                                  <td> <b><?php echo e(__('poster')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__('Name your image eg: example.jpg')); ?> <b><?php echo e(__('(Image can be uploaded using Media Manager / Movies / poster Tab.)')); ?></b></td>
                                </tr>
                                <tr>
                                  <td>18</td>
                                  <td> <b><?php echo e(__('series')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Movie Series (1 = enabled, 0 = disabled)")); ?></b></td>
                                </tr>
                                <tr>
                                  <td>19</td>
                                  <td> <b><?php echo e(__('movie_id')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("If series = 1 , then movie id can be pass here .")); ?></b></td>
                                </tr>
                                <tr>
                                  <td>20</td>
                                  <td> <b><?php echo e(__('featured')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Movie featured (1 = enabled, 0 = disabled)")); ?></b></td>
                                </tr>
                                <tr>
                                  <td>21</td>
                                  <td> <b><?php echo e(__('subtitle')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Movie subtitle (1 = enabled, 0 = disabled)")); ?></b></td>
                                </tr>
                                <tr>
                                  <td>22</td>
                                  <td> <b><?php echo e(__('sub_lang')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("If subtitle = 1 , then enter subtitle language name here ")); ?></b></td>
                                </tr>
                                <tr>
                                  <td>23</td>
                                  <td> <b><?php echo e(__('sub_t')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("If subtitle = 1 , then enter subtitle files")); ?>  (<?php echo e(__('Name your file eg: example.txt')); ?> <b><?php echo e(__('(files can be uploaded using Media Manager / subtitle / Movies Tab.)')); ?> </b> )</td>
                                </tr>
                                
                                <tr>
                                  <td>26</td>
                                  <td> <b><?php echo e(__('keyword')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Enter movie meta keywords")); ?></td>
                                </tr>
                                <tr>
                                  <td>27</td>
                                  <td> <b><?php echo e(__('description')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Enter movie meta description")); ?></td>
                                </tr>
                                <tr>
                                  <td>28</td>
                                  <td> <b><?php echo e(__('menu')); ?></b> </td>
                                  <td><b><?php echo e(__('Yes')); ?></b></td>
                                  <td><?php echo e(__("Multiple menu id can be pass here separate by comma .")); ?></td>
                                </tr>
                                <tr>
                                  <td>29</td>
                                  <td> <b><?php echo e(__('director_id')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Multiple director id can be pass here separate by comma .")); ?></td>
                                </tr>
                                <tr>
                                  <td>30</td>
                                  <td> <b><?php echo e(__('actor_id')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Multiple actor id can be pass here separate by comma .")); ?></td>
                                </tr>
                                <tr>
                                  <td>31</td>
                                  <td> <b><?php echo e(__('genre_id')); ?></b> </td>
                                  <td><b><?php echo e(__('Yes')); ?></b></td>
                                  <td><?php echo e(__("Multiple genre id can be pass here separate by comma .")); ?></td>
                                </tr>
                                <tr>
                                  <td>32</td>
                                  <td> <b><?php echo e(__('duration')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Enter movie duration in minutes")); ?></td>
                                </tr>
                                <tr>
                                  <td>33</td>
                                  <td> <b><?php echo e(__('publish_year')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Enter movie publish year")); ?></td>
                                </tr>
                                <tr>
                                  <td>34</td>
                                  <td> <b><?php echo e(__('rating')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Enter movie rating")); ?></td>
                                </tr>
                                <tr>
                                  <td>35</td>
                                  <td> <b><?php echo e(__('released')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Enter movie released date")); ?></td>
                                </tr>
                                <tr>
                                  <td>36</td>
                                  <td> <b><?php echo e(__('detail')); ?></b> </td>
                                  <td><b><?php echo e(__('No')); ?></b></td>
                                  <td><?php echo e(__("Enter movie detail")); ?></td>
                                </tr>
            
                              </tbody>
                            </table>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
                        
      </div> 
      <div class="card-body permissionTable" >
        <section id="movies" class="movies-main-block">
          <div class="row">
            <?php if(isset($movies) && count($movies) > 0): ?>
            <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              if($item->thumbnail != NULL){
                $content = @file_get_contents(public_path() .'/images/movies/thumbnails/' . $item->thumbnail); 
                if($content){
                  $image = public_path() .'/images/movies/thumbnails/' . $item->thumbnail;
                }else{
                  $image = Avatar::create($item->title)->toBase64();
                }
              }else{
                $image = Avatar::create($item->title)->toBase64();
              }

              $imageData = base64_encode(@file_get_contents($image));
              if($imageData){
                  $src = 'data: '.mime_content_type($image).';base64,'.$imageData;
              } 
            ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <input class="permissioncheckbox form-check-card-input visibility-visible" form="bulk_delete_form" type="checkbox" value="<?php echo e($item->id); ?>" id="checkbox<?php echo e($item->id); ?>" name="checked[]">         
              <div class="card">
                <?php if($src != NULL): ?>
                <a href="<?php echo e(url('movie/detail', $item->slug)); ?>" target="__blank" title="<?php echo e($item->title); ?>"><img src="<?php echo e($src); ?>" class="card-img-top" alt="<?php echo e($item->title); ?>"></a>
                <?php endif; ?>
                <div class="overlay-bg"></div>
                <div class="dropdown card-dropdown">
                  <a class="btn btn-round btn-outline-primary pull-right dropdown-toggle" type="button" id="dropdownMenuButton-<?php echo e($item->id); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo e(__('Settings')); ?>"><i class="feather icon-more-vertical-"></i></a>
                  <div class="dropdown-menu pull-right" aria-labelledby="dropdownMenuButton-<?php echo e($item->id); ?>">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('movies.view')): ?>
                      <a class="dropdown-item" href="<?php echo e(url('movie/detail', $item->slug)); ?>" target="__blank" title="<?php echo e(__('View')); ?>"><i class="feather icon-monitor mr-2"></i><?php echo e(__('View')); ?></a>        
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('movies.edit')): ?>                                
                      <a class="dropdown-item" href="<?php echo e(route('movies.edit', $item->id)); ?>" title="<?php echo e(__('Edit')); ?>"><i class="feather icon-edit mr-2"></i> <?php echo e(__('Edit')); ?></a>     
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('movies.delete')): ?>                                 
                      <a type="button" class="dropdown-item" data-toggle="modal" data-target="#deleteModal<?php echo e($item->id); ?>" Title="<?php echo e(__('Delete')); ?>"><i class="feather icon-trash mr-2"></i> <?php echo e(__('Delete')); ?></a>
                    <?php endif; ?>
                      <a class="dropdown-item" href="<?php echo e(route('movies.link', $item->id)); ?>" title="<?php echo e(__('Add more links')); ?>"><i class="feather icon-link-2 mr-1"></i> <?php echo e(__('Add more links')); ?></a>
                  </div>
                </div>
                <div id="deleteModal<?php echo e($item->id); ?>" class="delete-modal modal fade card-dropdown-modal" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">×</button>
                          <div class="delete-icon"></div>
                      </div>
                      <div class="modal-body text-center">
                          <h4 class="modal-heading"><?php echo e(__('Are You Sure ?')); ?></h4>
                          <p><?php echo e(__('Do you really want to delete these records? This process cannot be undone.')); ?></p>
                      </div>
                      <div class="modal-footer">
                        <form method="POST" action="<?php echo e(route("movies.destroy", $item->id)); ?>">
                          <?php echo method_field('DELETE'); ?>
                          <?php echo csrf_field(); ?>
                          <button type="reset" class="btn btn-secondary translate-y-3" data-dismiss="modal"><?php echo e(__('No')); ?></button>
                          <button type="submit" class="btn btn-primary"><?php echo e(__('Yes')); ?></button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-header">
                <h5 class="card-title"><a href="<?php echo e(url('movie/detail', $item->slug)); ?>" target="__blank"><?php echo e($item->title); ?></a></h5>
                </div>
                <div class="card-body">
                  <div class="card-block row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <h6 class="card-body-sub-heading"><?php echo e(__('Year')); ?></h6>
                      <p><?php echo e(isset($item->publish_year) && $item->publish_year ? $item->publish_year : '-'); ?></p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <h6 class="card-body-sub-heading"><?php echo e(__('Length')); ?></h6>
                      <p><?php echo e(isset($item->duration) && $item->duration ? $item->duration : '-'); ?> Mins</p>
                    </div>                        
                  </div>
                  <div class="card-block card-block-ratings">
                    <h6 class="card-body-sub-heading"><?php echo e(__('Ratings')); ?></h6>
                    <?php
                    $rating = ($item->rating)/2;
                    ?>
                    
                    <div class="stars stars-example-css">
                      <?php for($rating = 1; $rating <= 5; $rating++): ?> <?php if($rating<=$item->rating/2): ?>
                          <i class='fa fa-star' style='color:#506FE4'></i>
                          <?php else: ?>
                          <i class='fa fa-star' style='color:#CCC'></i>
                          <?php endif; ?>
                      <?php endfor; ?>
                    </div>
                    <p><?php echo e($item->rating); ?>/10</p>
                  </div>
                  <div class="card-block">
                    <h6 class="card-body-sub-heading"><?php echo e(__('Genre')); ?></h6>
                    <?php
                      $genres = collect();
                        if (isset($item->genre_id)){
                          $genre_list = explode(',', $item->genre_id);
                          for ($i = 0; $i < count($genre_list); $i++) {
                            try {
                              $genre = App\Genre::find($genre_list[$i])->name;
                              $genres->push($genre);
                            } catch (Exception $e) {

                            }
                          }
                        }
                      ?>
                    <p>
                      <?php if(count($genres) > 0): ?>
                        <?php for($i = 0; $i < count($genres); $i++): ?>
                          <?php if($i == count($genres)-1): ?>
                          <a href="<?php echo e(url('video/detail/genre_search', trim($genres[$i]))); ?>" target="__blank"><?php echo e($genres[$i]); ?></a>
                          <?php else: ?>
                          <a href="<?php echo e(url('video/detail/genre_search', trim($genres[$i]))); ?>" target="__blank"> <?php echo e($genres[$i]); ?>,</a>
                          <?php endif; ?>
                          <?php endfor; ?>
                      <?php endif; ?>
                    </p>
                  </div>
                  <div class="card-block row">
                    <div class="col-xs-6 col-sm-6 col-md-6 movie-create-heading">
                      <h6 class="card-body-sub-heading"><?php echo e(__('Created By')); ?></h6>
                      <?php 
                      $username = App\User::find($item->created_by);
                      ?>
                      <p><?php echo e(isset($username) && $username != NULL ? $username->name :'user deleted'); ?></p>
                    </div>
                    <div class="col-xs-6 col-md-6 col-md-6">
                      <h6 class="card-body-sub-heading"><?php echo e(__('Status')); ?></h6>
                      <p class="status-btn">
                        <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->is_assistant == 1): ?>
                        <?php if($item->status == 1): ?>
                              <a href="javascript:void();" class='badge badge-pill badge-success' title="<?php echo e(__('Active')); ?>"><?php echo e(__('Active')); ?></a>
                          <?php else: ?>
                              <a href="javascript:void();" class='badge badge-pill badge-danger' title="<?php echo e(__('De Active')); ?>"><?php echo e(__('De Active')); ?></a>
                        <?php endif; ?>
                        <?php else: ?>
                        <?php if($item->status == 1): ?>
                              <a href="<?php echo e(route('quick.movie.status', $item->id)); ?>" class='badge badge-pill badge-success'  title="<?php echo e(__('Active')); ?>"><?php echo e(__('Active')); ?></a>
                          <?php else: ?>
                              <a href="<?php echo e(route('quick.movie.status', $item->id)); ?>" class='badge badge-pill badge-danger'  title="<?php echo e(__('De Active')); ?>"><?php echo e(__('De Active')); ?></a>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endif; ?>
                      </p>
                    </div>
                  </div>              
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12 pagination-block text-center">
              <?php echo $movies->appends(request()->query())->links(); ?>

            </div>
            <?php else: ?>   
            <div class="col-md-12 text-center">
              <h5><?php echo e(__("Let's start :)")); ?></h5>
              <small><?php echo e(__('Get Started by creating a movie! All of your movies will be displayed on this page.')); ?></small>
            </div>
            <?php endif; ?>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
   
<script src="<?php echo e(url('assets/js/custom/custom-barrating.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\NexthourWeb\resources\views/admin/movie/index.blade.php ENDPATH**/ ?>