@extends('layouts.master')
@section('title',__('Manage Episodes'))
@section('breadcum')
  <div class="breadcrumbbar">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __(' Manage Episodes') }}</li>
                    </ol>
                </div>    
    </div>
@endsection
@section('maincontent')
<div class="contentbar">
  <div class="row">
     {{-- vimeo API Modal Start --}}
    <div class="modal" id="myvimeoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{__("Search From Vimeo API")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if(is_null(env('VIMEO_ACCESS')))
            <p>{{__('Make Sure You Have Added Vimeo API KeyIn')}} <a href="{{url('admin/api-settings')}}">{{__('API Settings')}}</a></p>
            @endif

            <div class="modal-body">
                <div class="box box-danger">
                    <div class="box-header">
                        <div class="box-title">{{__('Instructions')}}</div>
                    </div>
                    <form action="" method="post" name="vimeo-yt-search" id="vimeo-yt-search">
                      <div class="input-group">
                        <input type="search" name="vimeo-search" id="vimeo-search" placeholder="{{__('Search')}}..." class="form-control" autocomplete="off">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button" id="vimeo-searchBtn">{{__('Search')}}</button>
                        </div>
                      </div>
                    </form>
                    <input type="hidden" id="vpageToken" value="">
                    <div class="btn-group mt-3 mb-4" role="group" aria-label="...">
                        <button type="button" id="vpageTokenPrev" value="" class="btn btn-default">{{__('Prev')}}</button>
                        <button type="button" id="vpageTokenNext" value="" class="btn btn-default">{{__('Next')}}</button>
                    </div>
                </div>
                <div id="vimeo-watch-content" class="vimeo-watch-main-col vimeo-card vimeo-card-has-padding">
                    <ul id="vimeo-watch-related" class="vimeo-video-list">
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

    {{----vimeo API ModalEnd --}}

{{-- youtube API Modal Start --}}
    <div class="modal" id="myyoutubeModal" tabindex="-1" role="dialog" aria-labelledby="myyoutubeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myyoutubeModalLabel">{{__("Search From Youtube API")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if(is_null(env('YOUTUBE_API_KEY')))
                <p>{{__('Make Sure You Have Added Youtube APIKey In')}} <a href="{{url('admin/api-settings')}}">{{__('API Settings')}}</a></p>
                @endif
                <div class="box box-danger">
                    <div class="box-header">
                        <div class="box-title">{{__('Instructions')}}</div>
                    </div>
                    <form action="" method="post" name="hyv-yt-search" id="hyv-yt-search">
                      <div class="input-group">
                        <input type="search" name="hyv-search" id="hyv-search" placeholder="{{__('Search')}}..." class="form-control" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="hyv-searchBtn">{{__('Search')}}</button>
                        </div>
                      </div>
                    </form>
                    <input type="hidden" id="vpageToken" value="">
                    <div class="mt-3">
                        <input type="hidden" id="pageToken" value="">
                        <div class="btn-group" role="group" aria-label="...">
                            <button type="button" id="pageTokenPrev" value="" class="btn btn-default">{{__('Prev')}}</button>
                            <button type="button" id="pageTokenNext" value="" class="btn btn-default">{{__('Next')}}</button>
                        </div>
                    </div>
                    <div id="hyv-watch-content" class="hyv-watch-main-col hyv-card hyv-card-has-padding">
                        <ul id="hyv-watch-related" class="hyv-video-list"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    {{----youtube API ModalEnd --}}

    

    <div class="col-lg-7 col-xl-7">
      <div class="card m-b-30">
        <div class="card-header">

          <button type="button" id="createButton" onclick="showCreateForm()" class="float-right btn btn-primary-rgba mr-2 "><i class="feather icon-plus mr-2"></i> {{ __('Add Episode') }} </button>
          
          <button type="button" class="float-right btn btn-success-rgba mr-2 " data-toggle="modal"
          data-target=".bd-example-modal-lg-2"><i class="fa fa-file-excel-o mr-2"></i> {{ __('Import  Episodes') }} </button>
  
          {{-- Impport Model Start --}}
          <div class="modal fade bd-example-modal-lg-2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleLargeModalLabel">{{__("Bulk Import Episodes")}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="col-md-12">
                            <div class="card-header">
                                <a href="{{ url('files/Episodes.xlsx') }}" class="float-right btn btn-success-rgba mr-2"><i
                                    class="fa fa-file-excel-o mr-2"></i>{{ __('Download Example xls/csv File') }}</a>
                            </div>
                        </div>
          
                        <div class="card-header">
                            <h6 class="card-title">{{ __('Choose your xls/csv File :') }}</h6>
                            <form action="{{ url('/admin/import/episode') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }} input-file-block col-md-12">
                                {!! Form::file('file', ['class' => 'input-file', 'id'=>'file']) !!}
                                <label for="file" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{__('Choose your xls/csv File')}}">
                                  <i class="icon fa fa-check"></i>
                                  <span class="js-fileName">{{__('Choose A File')}}</span>
                                </label>
                                <small class="text-danger">{{ $errors->first('file') }}</small>
            
                                <button type="submit" class="float-right btn btn-danger-rgba mr-2 "><i class="feather icon-plus mr-2"></i> {{__('Import')}} </button>
                              </div>
                                
                            </form>
                        </div> 
                        
                    <div class="modal-body">
                        <div class="box box-danger">
                            <div class="box-header">
                              <div class="box-title">{{__('Instructions')}}</div>
                            </div>
                            <div class="box-body table-responsive">
                              <h6><b>{{__('Follow the instructions carefully before importing the file.')}}</b></h6>
                              <small>{{__('The columns of the file should be in the following order.')}}</small>
                              <table class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <th>{{__('Column No')}}</th>
                                    <th>{{__('Column Name')}}</th>
                                    <th>{{__('Required')}}</th>
                                    <th>{{__('Description')}}</th>
                                  </tr>
                                </thead>
                
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td><b>{{__('season_id')}}</b></td>
                                    <td><b>{{__('Yes')}}</b></td>
                                    <td>{{__('Enter season id')}} <b>{{__('i.e')}}</b> {{$season->id}}</td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td><b>{{__('title')}}</b></td>
                                    <td><b>{{__('Yes')}}</b></td>
                                    <td>{{__('Enter episodes title / name')}}</td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td><b>{{__('episode_no')}}</b></td>
                                    <td><b>{{__('Yes')}}</b></td>
                                    <td>{{__('Enter episodes number')}}</td>
                                  </tr>
                
                                  <tr>
                                    <td>4</td>
                                    <td> <b>{{__('selecturl')}}</b> </td>
                                    <td><b>{{__('No')}}</b></td>
                                    <td>{{__("Enter actor's DOB")}}</b></td>
                                  </tr>
                                  <tr>
                                    <td>5</td>
                                    <td> <b>{{__('iframeurl')}}</b> </td>
                                    <td><b>{{__('No')}}</b></td>
                                    <td>{{__("Enter actor's DOB")}}</b></td>
                                  </tr>
                                  <tr>
                                    <td>6</td>
                                    <td> <b>{{__('ready_url')}}</b> </td>
                                    <td><b>{{__('No')}}</b></td>
                                    <td>{{__("Enter actor's DOB")}}</b></td>
                                  </tr>
                                  <tr>
                                    <td>7</td>
                                    <td> <b>{{__('url_360')}}</b> </td>
                                    <td><b>{{__('No')}}</b></td>
                                    <td>{{__('Name your video eg: example.jpg')}}
                                      <b>{{__('(Video can be uploaded using Media Manager / Movie / URL 360 Tab.)')}}</b></td>
                                  </tr>
                                  <tr>
                                    <td>8</td>
                                    <td> <b>{{__('url_480')}}</b> </td>
                                    <td><b>{{__('No')}}</b></td>
                                    <td>{{__('Name your video eg: example.jpg')}}
                                      <b>{{__('(Video can be uploaded using Media Manager / Movie / URL 480 Tab.)')}}</b></td>
                                  </tr>
                                  <tr>
                                    <td>9</td>
                                    <td> <b>{{__('url_720')}}</b> </td>
                                    <td><b>{{__('No')}}</b></td>
                                    <td>{{__('Name your video eg: example.jpg')}}
                                      <b>{{__('(Video can be uploaded using Media Manager / Movie / URL 720 Tab.)')}}</b></td>
                                  </tr>
                                  <tr>
                                    <td>10</td>
                                    <td> <b>{{__('url_1080')}}</b> </td>
                                    <td><b>{{__('No')}}</b></td>
                                    <td>{{__('Name your video eg: example.jpg')}}
                                      <b>{{__('(Video can be uploaded using Media Manager / Movie / URL 1080 Tab.)')}}</b></td>
                                  </tr>
                
                                  <tr>
                                    <td>11</td>
                                    <td> <b>{{__('a_language')}}</b> </td>
                                    <td><b>{{__('No')}}</b></td>
                                    <td>{{__("Multiple a_language id can be pass here seprate by comma")}}</b></td>
                                  </tr>
                
                                  <tr>
                                    <td>12</td>
                                    <td> <b>{{__('thumbnail')}}</b> </td>
                                    <td><b>{{__('No')}}</b></td>
                                    <td>{{__('Name your image eg: example.jpg')}}
                                      <b>{{__('(Image can be uploaded using Media Manager / Tvsereies/ Episode / thumbnail Tab.)')}}</b>
                                    </td>
                                  </tr>
                
                
                                  <tr>
                                    <td>13</td>
                                    <td> <b>{{__('duration')}}</b> </td>
                                    <td><b>{{__('No')}}</b></td>
                                    <td>{{__("Enter episodes duration in minutes")}}</td>
                                  </tr>
                
                                  <tr>
                                    <td>14</td>
                                    <td> <b>{{__('released')}}</b> </td>
                                    <td><b>{{__('No')}}</b></td>
                                    <td>{{__("Enter episodes released date")}}</td>
                                  </tr>
                                  <tr>
                                    <td>15</td>
                                    <td> <b>{{__('detail')}}</b> </td>
                                    <td><b>{{__('No')}}</b></td>
                                    <td>{{__("Enter episodes detail")}}</td>
                                  </tr>
                
                                </tbody>
                              </table>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
          </div>
          {{-- Import Model End --}}
          
          <a href="{{url('admin/tvseries', $season->tvseries->id)}}" class="float-right btn btn-primary-rgba mr-2"><i
            class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
          <h5 class="box-title">{{__('Manage Season')}} </h5>
          <h6>{{__('Of')}} {{$season->tvseries->title}} Season
                {{$season->season_no}}
                @if ($season->tmdb == 'Y')
                <span class="badge badge-pill badge-success">{!!$season->tmdb == 'Y' ? '<i class="fa fa-check-circle"></i> by tmdb' : ''!!}</span>
                @endif
            </span>
          </h6>
        </div>        
        <div class="card-body ml-2">
          <div id="createForm">
            {!! Form::open(['method' => 'POST', 'action' => 'TvSeriesController@store_episodes', 'files' => true]) !!}
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group text-dark{{ $errors->has('title') ? ' has-error' : '' }}">
                      {!! Form::label('title', __('Episode Title')) !!}
                      {!! Form::text('title', null, ['class' => 'form-control', 'min' => '1']) !!}
                      <small class="text-danger">{{ $errors->first('title') }}</small>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group text-dark{{ $errors->has('episode_no') ? ' has-error' : '' }}">
                      {!! Form::label('episode_no',__('Episode No.')) !!}
                      {!! Form::number('episode_no', null, ['class' => 'form-control', 'min' => '1']) !!}
                      <small class="text-danger">{{ $errors->first('episode_no') }}</small>
                    </div> 
                  </div>
                  <div class="col-md-4">
                    <div class="form-group text-dark{{ $errors->has('duration') ? ' has-error' : '' }}">
                      {!! Form::label('duration', __('Duration')) !!} 
                      {!! Form::text('duration', null, ['class' => 'form-control']) !!}
                      <small class="text-danger">{{ $errors->first('duration') }}</small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group text-dark">
                      {!! Form::label('', __('Choose Custom Thumbnail And Poster')) !!}
                      <label class="switch for-custom-image d-block">
                        {!! Form::checkbox('', 1, 0, ['class' => 'custom_toggle']) !!}
                        <span class="slider round"></span>
                      </label>
                    </div>                    
                  </div>
                  <div class="upload-image-main-block" style="display: none;">
                    <div class="row">
        
                      <div class="form-group text-dark{{ $errors->has('thumbnail') ? ' has-error' : '' }} input-file-block">
                        {!! Form::label('thumbnail',__('Thumbnail')) !!} 
                        {!! Form::file('thumbnail', ['class' => 'input-file', 'id'=>'thumbnail']) !!}
                        <label for="thumbnail" class="btn btn-danger js-labelFile" data-toggle="tooltip"
                          data-original-title="{{__('Thumbnail')}}">
                          <i class="icon fa fa-check"></i>
                          <span class="js-fileName">{{__('Choose A File')}}</span>
                        </label>
                        <p class="info">{{__('Choose Custom Thumbnail')}}</p>
                        <small class="text-danger">{{ $errors->first('thumbnail') }}</small>
                      </div>
        
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="pad_plus_border">
                      <div class="form-group text-dark{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                        {!! Form::label('subtitle', __('Subtitle')) !!}
                        <label class="switch d-block">
                          <input type="checkbox" class="custom_toggle" id="subtitle_check" name="subtitle">
                          <span class="slider round"></span>
                        </label>
                        <div class="col-xs-12">
                          <small class="text-danger">{{ $errors->first('subtitle') }}</small>
                        </div>
                      </div>
          
                    </div>
                  </div>
                  <div style="display: none;" class="subtitle-box">
                    <label>{{__('Subtitle')}}:</label>
                    <table class="table table-bordered" id="dynamic_field">
                      <tr>
                        <td>
                          <div class="form-group text-dark{{ $errors->has('sub_t') ? ' has-error' : '' }} input-file-block">
                            <input type="file" name="sub_t[]" />
                            <p class="info">{{__('Choose Subtitle File')}} ex. subtitle.srt, or. txt</p>
                            <small class="text-danger">{{ $errors->first('sub_t') }}</small>
                          </div>
                        </td>
        
                        <td>
                          <input type="text" name="sub_lang[]" placeholder="{{__('Subtitle Language')}}"
                            class="form-control name_list" />
                        </td>
                        <td><button type="button" name="add" id="add" class="btn btn-xs btn-success">
                            <i class="fa fa-plus"></i>
                          </button></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group text-dark{{ $errors->has('a_language') ? ' has-error' : '' }}">
                      {!! Form::label('a_language', __('Audio Languages')) !!}
                      <p class="inline info"> 
                      <div class="input-group">
                        {!! Form::select('a_language[]', $a_lans, null, ['class' => 'form-control select2', 'multiple']) !!}
                        <a href="#" class="add-audio-lang" data-toggle="modal" data-target="#AddLangModal" class="input-group-addon"><i class="feather icon-plus"></i></a>
                      </div>
                      <small class="text-danger">{{ $errors->first('a_language') }}</small>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4">
                        {{-- select to upload code start from here --}}
                        <div class="form-group text-dark{{ $errors->has('selecturl') ? ' has-error' : '' }}">
                          {!! Form::label('selecturls', __('Add Video')) !!}
                          {!! Form::select('selecturl', array('iframeurl' => __('Iframe URL And Embed URL'),
                          'youtubeapi' =>__('YouTubeApi'), 'vimeoapi' => __('VimeoApi'),'aws' => __('AWS Upload'),'bunny' => __('BUNNY Upload'),'wasabi' => __('WASABI Upload'),
                          'customurl'=>__('Custom URL Youtube URL Vimeo URL'),'multiqcustom' =>
                          __('Multi Quality Custom URL And URL Upload')), null, ['class' => 'form-control
                          select2','id'=>'selecturl']) !!}
                          <small class="text-danger">{{ $errors->first('selecturl') }}</small>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div id="ifbox" style="display: none;" class="form-group text-dark">
                          <label for="iframeurl">{{__('Iframe URL And Embed URL')}}: </label> <a data-toggle="modal"
                            data-target="#embdedexamp"><i class="fa fa-question-circle-o"> </i></a>
                          <input type="text" class="form-control" name="iframeurl" placeholder="">
                        </div>
                         @php
                          $config=App\Config::first();
                          $aws=$config->aws;
                          $bunny=$config->bunny;
                          $wasabi=$config->wasabi;
                        @endphp
                        @if($aws==1)
                         <div class="row">
                <div class="col-md-12">
                  <div id="awsUpload" style="display: none;" class="form-group text-dark">
                    <label for="">{{ __('AWSUpload') }}: </label>
                    <!-- =========== -->
                  <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">{{ __('Upload') }}</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="aws_upload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">{{ __('Choose file') }}</label>
                        </div>
                      </div>
                      <!-- =========== -->
                   {{--  @if($cate->aws_upload !="")
                      <label for="">{{ __('AWSFileName') }}:</label>
                      <input disabled value="{{ $cate->aws_upload }}" class="form-control">
                    @endif --}}
                  </div>
                </div>
              </div>
              @else
                          <small>{{__("if you haven't added AWS key. Set in")}} <a href="{{url('admin/api-settings')}}">{{__('API setting')}}</a> {{__('To Upload Videos to AWS')}}</small>
                        @endif
                        @if($bunny==1)
                         <div class="row">
                <div class="col-md-12">
                  <div id="bunnyUpload" style="display: none;" class="form-group text-dark">
                    <label for="">{{ __('BUNNYUpload') }}: </label>
                    <!-- =========== -->
                  <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">{{ __('Upload') }}</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="bunny_upload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">{{ __('Choose file') }}</label>
                        </div>
                      </div>
                      <!-- =========== -->
                   {{--  @if($cate->aws_upload !="")
                      <label for="">{{ __('AWSFileName') }}:</label>
                      <input disabled value="{{ $cate->aws_upload }}" class="form-control">
                    @endif --}}
                  </div>
                </div>
              </div>
              @else
                          <small>{{__("if you haven't added Bunny key. Set in")}} <a href="{{url('admin/api-settings')}}">{{__('API setting')}}</a> {{__('To Upload Videos to Bunny')}}</small>
                        @endif
                        @if($wasabi==1)
                         <div class="row">
                <div class="col-md-12">
                  <div id="wasabiUpload" style="display: none;" class="form-group text-dark">
                    <label for="">{{ __('WASABIUpload') }}: </label>
                    <!-- =========== -->
                  <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">{{ __('Upload') }}</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="wasabi_upload" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">{{ __('Choose file') }}</label>
                        </div>
                      </div>
                      <!-- =========== -->
                   {{--  @if($cate->aws_upload !="")
                      <label for="">{{ __('AWSFileName') }}:</label>
                      <input disabled value="{{ $cate->aws_upload }}" class="form-control">
                    @endif --}}
                  </div>
                </div>
              </div>
              @else
                          <small>{{__("if you haven't added Wasabi key. Set in")}} <a href="{{url('admin/api-settings')}}">{{__('API setting')}}</a> {{__('To Upload Videos to WASABI')}}</small>
                        @endif

                        <div style="display: none;" id="custom_url">
              
                          <p style="color: red" class="inline info">{{__('Upload Videos Not Support')}} !</p>
                          <br>
                          <p class="inline info">{{__('Openload Google Drive And Other URL Add Here')}}!</p>
                          <br><br>
                          <div class="row">
                            <div class="col-md-7">
                              <div class="form-group text-dark{{ $errors->has('url_360') ? ' has-error' : '' }}">
                                {!! Form::label('url_360', __('Video Url For 360 Quality')) !!}
                                <p class="inline info">
                                {!! Form::text('url_360', null, ['class' => 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('url_360') }}</small>
                              </div>
                            </div>
                            <div class="col-md-5">
                              {!! Form::label('upload_video', __('Upload Video In 360p')) !!} 
                                {{__('Choose A Video')}}</p>
                              <div class="input-group">
                                <input type="text" class="form-control" id="upload_video_360" name="upload_video_360">
                                <span class="input-group-addon midia-toggle-upload_video_360"
                                  data-input="upload_video_360">{{__('Choose A Video')}}</span>
                              </div>
                              <small class="text-danger">{{ $errors->first('upload_video_360') }}</small>
                            </div>
                          </div>
                          <div class="form-group{{ $errors->has('url_480') ? ' has-error' : '' }}">
                            <div class="row">
                              <div class="col-md-7">
                                {!! Form::label('url_480', __('Video Url For 480 Quality')) !!}
                                <p class="inline info"> 
                                {!! Form::text('url_480', null, ['class' => 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('url_480') }}</small>
                              </div>
                              <div class="col-md-5">
              
                                {!! Form::label('upload_video',__('Upload Video In 480p')) !!} - <p class="inline info">
                                  {{__('ChooseAVideo')}}</p>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="upload_video_480" name="upload_video_480">
                                  <span class="input-group-addon midia-toggle-upload_video_480"
                                    data-input="upload_video_480">{{__('Choose A Video')}}</span>
                                </div>
                                <small class="text-danger">{{ $errors->first('upload_video_480') }}</small>
              
                              </div>
                            </div>
              
                          </div>
                          <div class="form-group{{ $errors->has('url_720') ? ' has-error' : '' }}">
              
              
                            <div class="row">
              
                              <div class="col-md-7">
                                {!! Form::label('url_720', __('Video Url For 720 Quality')) !!}
                                <p class="inline info"> 
                                {!! Form::text('url_720', null, ['class' => 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('url_720') }}</small>
                              </div>
              
                              <div class="col-md-5">
                                {!! Form::label('upload_video', 'Upload Video In 720p') !!} - <p class="inline info">
                                  {{__('ChooseAVideo')}}</p>
                                <div class="input-group">
                                  <input type="text" class="form-control" id="upload_video_720" name="upload_video_720">
                                  <span class="input-group-addon midia-toggle-upload_video_720"
                                    data-input="upload_video_720">{{__('Choose A Video')}}</span>
                                </div>
                                <small class="text-danger">{{ $errors->first('upload_video_720') }}</small>
                              </div>
                            </div>
              
                          </div>
                          <div class="form-group{{ $errors->has('url_1080') ? ' has-error' : '' }}">
              
                            <div class="row">
                              <div class="col-md-7">
                                {!! Form::label('url_1080',__('Video Url For 1080 Quality')) !!}
                                <p class="inline info">
                                {!! Form::text('url_1080', null, ['class' => 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('url_1080') }}</small>
                              </div>
              
                              <div class="col-md-5">
                                {!! Form::label('upload_video', __('Upload Video In 1080p')) !!} 
                                <div class="input-group">
                                  <input type="text" class="form-control" id="upload_video_1080" name="upload_video_1080">
                                  <span class="input-group-addon midia-toggle-upload_video_1080"
                                    data-input="upload_video_1080">{{__('Choose A Video')}}</span>
                                </div>
                                <small class="text-danger">{{ $errors->first('upload_video_1080') }}</small>
                              </div>
              
                            </div>
              
                          </div>
                        </div>
              
              
                        <div class="modal fade" id="embdedexamp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                                <h6 class="modal-title" id="myModalLabel">{{__('Embded URL Examples')}}: </h6>
                              </div>
                              <div class="modal-body">
                                <p style="font-size: 15px;"><b>{{__('Youtube')}}:</b>
                                  {{__('YoutubeUrlLink')}} </p>
              
                                <p style="font-size: 15px;"><b>{{__('Google Drive')}}:</b>
                                  {{__('Google Drive Link')}}</p>
              
                                <p style="font-size: 15px;"><b>{{__('Openload')}}:</b>
                                  {{__('Openload Link')}} </p>
              
                                <p style="font-size: 15px;"><b>{{__('Note')}}:</b>
                                  {{__('Do Not Include')}} &lt;iframe&gt; {{__('Tag Before URL')}}</p>
                              </div>
              
                            </div>
                          </div>
                        </div>
              
                        {{-- youtube and vimeo url --}}
                        <div id="ready_url" style="display: none;"
                          class="form-group text-dark{{ $errors->has('ready_url') ? ' has-error' : '' }}">
                          <label id="ready_url_text"></label>
                          <p class="inline info"> 
                            <button type="button" onclick="encript()" id="encryptlink" class="btn btn-sm btn-info">{{__('Encrypt Link')}}</button>
                          {!! Form::text('ready_url', null, ['class' => 'form-control','id'=>'apiUrl']) !!}
                          <small class="text-danger">{{ $errors->first('ready_url') }}</small>
                        </div>
                        {{-- select to upload or add links code ends here --}}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="switch-field">
                      <div class="switch-title">{{__('Want TMDB Data And More Or Custom')}}?</div>
                      <input type="radio" id="switch_left" class="imdb_btn" name="tmdb" value="Y" checked />
                      <label for="switch_left">{{__('TMDB')}}</label>
                      <input type="radio" id="switch_right" class="custom_btn" name="tmdb" value="N" />
                      <label for="switch_right">{{__('Custom')}}</label>
                    </div>
                    <div id="custom_dtl" class="custom-dtl">
                      <div class="form-group text-dark{{ $errors->has('released') ? ' has-error' : '' }}">
                        {!! Form::label('released', __('Released')) !!} <p class="inline info">
                        {!! Form::date('released', null, ['class' => 'form-control']) !!}
                        <small class="text-danger">{{ $errors->first('released') }}</small>
                      </div>
                      <div class="form-group text-dark{{ $errors->has('detail') ? ' has-error' : '' }}">
                        {!! Form::label('detail', __('Description')) !!}
                        {!! Form::textarea('detail', null, ['class' => 'form-control materialize-textarea', 'rows' => '5']) !!}
                        <small class="text-danger">{{ $errors->first('detail') }}</small>
                      </div>
                    </div>
      
      
                    {!! Form::hidden('seasons_id', $season->id) !!}
                    {!! Form::hidden('tv_series_id', $season->tvseries->id) !!}
                  </div>
                  <div class="col-md-12 mt-4">
                    <div class="form-group text-dark  ">
                      <button type="reset" class="btn btn-success-rgba"> {{__('Reset')}}</button>
                      <button type="submit" class="btn btn-primary-rgba" id="send_form_actor">{{__('Create')}}</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                
            {!! Form::close() !!}
          </div>
          <div class="clear-both"></div>
        </div>
      </div>
    </div>
  <div class="col-lg-5 col-xl-5">
    <div class="card m-b-30">
        <div class="card-header">
        </div>
        <div class="card-body">
          <table class="table table-hover">
            <thead>
            <tr class="table-heading-row side-table">
              <th>#</th>
              <th>{{__('Title')}}</th>
              <th>{{__('By TMDB')}}</th>
              <th>{{__('Duration')}}</th>
              <th>{{__('Actions')}}</th>
            </tr>
            </thead>
            @if ($episodes)
              <tbody>
                <?php $i=0;?>
                @foreach ($episodes as $episode)
                @php $i++; @endphp
                <tr>
                  <td>
                    {{ $i }}
                  </td>
                  <td>
                    {{$episode->title}}
                  </td>
                  <td>
                    @if($episode->tmdb == 'Y')
                    <span class="badge badge-pill badge-success"><i class="fa fa-check-circle"></i></span>
                    @else
                    -
                    @endif
                  </td>
                  <td>
                    {{$episode->duration}} {{__('mins')}}
                  </td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false" title="{{ __('Action') }}">
                          <i class="feather icon-more-vertical-"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                        @can('tvseries.edit')
                          <a href="{{route('edit_episodes',['id'=>$season->id,'ep_id'=>$episode->id])}}" data-toggle="tooltip" data-original-title="{{__('Edit')}}" class="dropdown-item">
                            <i class="feather icon-edit mr-2"></i>{{ __("Edit") }}
                          </a>
                        @endcan
                        @can('tvseries.view')
                          <a href="{{route('episode.link', $episode->id)}}" data-toggle="tooltip" data-original-title="{{__('links')}}" class="dropdown-item">
                            <i class="fa fa-gears mr-2"></i>{{ __("Manage Episodes") }}
                          </a>
                        @endcan
                        @can('tvseries.delete')
                          <button type="button" data-toggle="modal" data-target="#delete{{$episode->id}}" class="dropdown-item">
                            <i class="feather icon-delete mr-2"></i>{{ __("Delete") }}
                          </button>
                        @endcan
                      </div>
                    </div>
                  </td>
                </tr>
                
                <!-- Delete Modal -->
                <div id="delete{{$episode->id}}" class="delete-modal modal fade" role="dialog">
                  <div class="modal-dialog modal-sm">
                      <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close"
                                  data-dismiss="modal">&times;</button>
                              <div class="delete-icon"></div>
                          </div>
                          <div class="modal-body text-center">
                              <h4 class="modal-heading">{{__('Are You Sure ?')}}</h4>
                              <p>{{__('Do you really want to delete selected item names here? This
                                  process
                                  cannot be undone.')}}</p>
                          </div>
                          <div class="modal-footer">
                            {!! Form::open(['method' => 'DELETE', 'action' => ['TvSeriesController@destroy_episodes',
                            $episode->id]]) !!}
                              <button type="reset" class="btn btn-secondary translate-y-3" data-dismiss="modal">{{__('No')}}</button>
                                  <button type="submit" class="btn btn-primary">{{__('Yes')}}</button>
                           {!! Form::close() !!}
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
              </tbody>
            @endif
          </table>
        </div>
    </div>
  </div>
</div>
<!-- Add Language Modal -->
<div id="AddLangModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('Add Language')}}</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      {!! Form::open(['method' => 'POST', 'action' => 'AudioLanguageController@store']) !!}
      <div class="modal-body">
        <div class="form-group{{ $errors->has('language') ? ' has-error' : '' }}">
          {!! Form::label('language', __('Language')) !!}
          {!! Form::text('language', null, ['class' => 'form-control', 'required' => 'required']) !!}
          <small class="text-danger">{{ $errors->first('language') }}</small>
        </div>
      </div>
      <div class="modal-footer">
        <div class="btn-group pull-right">
          <button type="reset" class="btn btn-success-rgba">{{__('Reset')}}</button>
          <button type="submit" class="btn btn-primary-rgba">{{__('Create')}}</button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection 
@section('script')
<script>
  $('.for-custom-image input').click(function () {
    if ($(this).prop("checked") == true) {
      $('.upload-image-main-block').fadeIn();
    } else if ($(this).prop("checked") == false) {
      $('.upload-image-main-block').fadeOut();
    }
  });
  $(document).ready(function () {

    $("#selecturl").select2({
      placeholder: "Add Video Through...",

    });
    $('#ifbox').show();
    $('#subtitle_section').show();
    $('#selecturl').change(function () {
      selecturl = document.getElementById("selecturl").value;
      if (selecturl == 'iframeurl') {
        $('#ifbox').show();
        $('#subtitle_section').show();
        $('#awsUpload').hide();
        $('#bunnyUpload').hide();
        $('#wasabiUpload').hide();
        $('#ready_url').hide();
        $('#custom_url').hide();

      } else if (selecturl == 'customurl') {
        $('#custom_url').hide();
        $('#ready_url_text').text('Enter Custom URL or Vimeo or Youtube URL');
        $('#ready_url').show();
        $('#ifbox').hide();
        $('#awsUpload').hide();
        $('#bunnyUpload').hide();
        $('#wasabiUpload').hide();
        $('#subtitle_section').show();
      } 
      else if (selecturl == 'aws') {
        $('#awsUpload').show();
        $('#ifbox').hide();
        $('#ready_url').hide();
        $('#bunnyUpload').hide();
        $('#wasabiUpload').hide();
        $('#custom_url').hide();
        $('#subtitle_section').show();
      }
      else if (selecturl == 'bunny') {
        $('#bunnyUpload').show();
        $('#ifbox').hide();
        $('#ready_url').hide();
        $('#awsUpload').hide();
        $('#wasabiUpload').hide();
        $('#custom_url').hide();
        $('#subtitle_section').show();
      }
      else if (selecturl == 'wasabi') {
        $('#wasabiUpload').show();
        $('#ifbox').hide();
        $('#ready_url').hide();
        $('#bunnyUpload').hide();
        $('#awsUpload').hide();
        $('#custom_url').hide();
        $('#subtitle_section').show();
      }
      else if (selecturl == 'youtubeapi') {
        $('#ready_url').show();
        $('#awsUpload').hide();
        $('#bunnyUpload').hide();
        $('#wasabiUpload').hide();
        $('#ifbox').hide();
        $('#subtitle_section').show();
        $('#ready_url_text').text('Import From Youtube API');
        $('#custom_url').hide();
      } 
      else if (selecturl == 'vimeoapi') {
        $('#ifbox').hide();
        $('#awsUpload').hide();
        $('#bunnyUpload').hide();
        $('#wasabiUpload').hide();
        $('#ready_url').show();
        $('#subtitle_section').show();
        $('#custom_url').hide();
        $('#ready_url_text').text('Import From Vimeo API');
      } else if (selecturl == 'multiqcustom') {
        $('#ifbox').hide();
        $('#awsUpload').hide();
        $('#ready_url').hide();
        $('#bunnyUpload').hide();
        $('#wasabiUpload').hide();
        $('#subtitle_section').show();
        $('#custom_url').show();
      }

    });

    var i = 1;
    $('#add').click(function () {
      i++;
      $('#dynamic_field').append('<tr id="row' + i +
        '" class="dynamic-added"><td><input type="file" name="sub_t[]"/></td><td><input type="text" name="sub_lang[]" placeholder="Subtitle Language" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
        i + '" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });

    $('#createForm').siblings().hide();
    // $('.custom-dtl').hide();
    // $('.custom_url').hide();
    var get = $('.TheCheckBox').val();
    if (get == 1) {

      $('.ready_url').show();
      $('.custom_url').hide();
    } else {

      $('.ready_url').hide();
      $('.custom_url').show();
    }
    $('.TheCheckBox').on('switchChange.bootstrapSwitch', function (event, state) {

      if (state == true) {

        $('.ready_url').show();
        $('.custom_url').hide();

      } else if (state == false) {

        $('.ready_url').hide();
        $('.custom_url').show();

      };

    });

    $('.subtitle_list').hide();
    $('.subtitle-file').hide();
    $('input[name="subtitle"]').click(function () {
      if ($(this).prop("checked") == true) {
        $('.subtitle_list').fadeIn();
        $('.subtitle-file').fadeIn();
      } else if ($(this).prop("checked") == false) {
        $('.subtitle_list').fadeOut();
        $('.subtitle-file').fadeOut();
      }
    });
  });
  let showCreateForm = () => {
    $('#createForm').show().siblings().hide();
  };
  let showForms = (id) => {
    let editForm = '#editForm' + id;
    $(editForm).show().siblings().hide();
    var custom_dtl = '#custom_dtl' + id;
    var custom_check = '#switch_right' + id;
    if ($(custom_check).is(':checked')) {
      $(custom_dtl).show();
    }

    var ifbtn = '#iframecheck2' + id;
    var rcbtn = '#TheCheckBox' + id;

    if ($(ifbtn).is(':checked')) {
      $('#urlbox2' + id).hide();
      $('#ifbox2' + id).show();
    } else {
      $('#urlbox2' + id).show();
      $('#ifbox2' + id).hide();
    }

    if ($(rcbtn).is(':checked')) {

      $('#ready_url' + id).show();
      $('#custom_url' + id).hide();
      $('#awsUpload' + id).hide();
      $('#bunnyUpload' + id).hide();
      $('#wasabiUpload' + id).hide();

    } else {
      $('#ready_url' + id).hide();
      $('#custom_url' + id).show();
      $('#awsUpload' + id).show();
      $('#bunnyUpload' + id).show();
      $('#wasabiUpload' + id).show();
    }

  };
  let hide_custom = (id) => {
    var custom_dtl = '#custom_dtl' + id;
    $(custom_dtl).hide();
  };
  let show_custom = (id) => {
    var custom_dtl = '#custom_dtl' + id;
    $(custom_dtl).show();
  };
</script>

<script>
  function epilink(id) {
    if ($('#iframecheck2' + id).is(':checked')) {
      $('#urlbox2' + id).hide();
      $('#ifbox2' + id).show();
    } else {
      $('#urlbox2' + id).show();
      $('#ifbox2' + id).hide();
    }
  }

  function changes(id) {
    if ($('#TheCheckBox' + id).is(':checked')) {

      $('#ready_url_check' + id).val(1);


    } else {

      $('#ready_url_check' + id).val(0);

    }
  }
</script>

<script>
  $(document).ready(function () {
    var videourl;
    youtubeApiCall();
    $("#pageTokenNext").on("click", function (event) {
      $("#pageToken").val($("#pageTokenNext").val());
      youtubeApiCall();
    });
    $("#pageTokenPrev").on("click", function (event) {
      $("#pageToken").val($("#pageTokenPrev").val());
      youtubeApiCall();
    });
    $("#hyv-searchBtn").on("click", function (event) {
      youtubeApiCall();
      return false;
    });
    jQuery("#hyv-search").autocomplete({
      source: function (request, response) {
        //console.log(request.term);
        var sqValue = [];
        jQuery.ajax({
          type: "POST",
          url: "http://suggestqueries.google.com/complete/search?hl=en&ds=yt&client=youtube&hjson=t&cp=1",
          dataType: 'jsonp',
          data: jQuery.extend({
            q: request.term
          }, {}),
          success: function (data) {
            console.log(data[1]);
            obj = data[1];
            jQuery.each(obj, function (key, value) {
              sqValue.push(value[0]);
            });
            response(sqValue);
          }
        });
      },
      select: function (event, ui) {
        setTimeout(function () {
          youtubeApiCall();
        }, 300);
      }
    });
  });

  function youtubeApiCall() {
    $.ajax({
        cache: false,
        data: $.extend({
          key: '{{env('YOUTUBE_API_KEY')}}',
          q: $('#hyv-search').val(),
          part: 'snippet'
        }, {
          maxResults: 15,
          pageToken: $("#pageToken").val()
        }),
        dataType: 'json',
        type: 'GET',
        timeout: 5000,
        url: 'https://www.googleapis.com/youtube/v3/search'
      })
      .done(function (data) {
        if (typeof data.prevPageToken === "undefined") {
          $("#pageTokenPrev").hide();
        } else {
          $("#pageTokenPrev").show();
        }
        if (typeof data.nextPageToken === "undefined") {
          $("#pageTokenNext").hide();
        } else {
          $("#pageTokenNext").show();
        }
        var items = data.items,
          videoList = "";
        $("#pageTokenNext").val(data.nextPageToken);
        $("#pageTokenPrev").val(data.prevPageToken);
        // console.log(items);
        $.each(items, function (index, e) {

          videourl = "https://www.youtube.com/watch?v=" + e.id.videoId;
          console.log(videourl);
          videoList = videoList +
            '<li class="hyv-video-list-item" ><div class="hyv-content-wrapper"><p  class="hyv-content-link" title="' +
            e.snippet.title + '"><span class="title">' + e.snippet.title +
            '</span><span class="stat attribution">by <span>' + e.snippet.channelTitle +
            '</span></span></p><button class="bn btn-info btn-sm inline" onclick=setVideoURl("' + videourl +
            '")>Add</button></div><div class="hyv-thumb-wrapper"><p class="hyv-thumb-link"><span class="hyv-simple-thumb-wrap"><img alt="' +
            e.snippet.title + '" src="' + e.snippet.thumbnails.default.url +
            '" height="90"></span></p></div></li>';


        });

        $("#hyv-watch-related").html(videoList);

      });
  }
</script>
<script type="text/javascript">
  function setVideoURl(videourls) {
    console.log(videourls);
    $('#apiUrl').val(videourls);
    $('#myyoutubeModal').modal("hide");
  }
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#selecturl').change(function () {
      $('#apiUrl').val('');
      var opval = $(this).val(); //Get value from select element
      if (opval == "youtubeapi") { //Compare it and if true
        $('#myyoutubeModal').modal("show"); //Open Modal
      }
    });
  });

</script>
{{-- vimeo api code --}}

<script>
  $(document).ready(function () {
    var videourl;
    vimeoApiCall();
    $("#vpageTokenNext").on("click", function (event) {
      $("#vpageToken").val($("#vpageTokenNext").val());
      vimeoApiCall();
    });
    $("#vpageTokenPrev").on("click", function (event) {
      $("#vpageToken").val($("#vpageTokenPrev").val());
      vimeoApiCall();
    });
    $("#vimeo-searchBtn").on("click", function (event) {
      vimeoApiCall();
      return false;
    });
    jQuery("#vimeo-search").autocomplete({
      source: function (request, response) {
        //console.log(request.term);
        var sqValue = [];
        var accesstoken = '{{env('VIMEO_ACCESS')}}';
        var myvimeourl = 'https://api.vimeo.com/videos?query=videos' + '&access_token=' + accesstoken +
          '&per_page=1';
        console.log(myvimeourl);
        jQuery.ajax({
          type: "GET",
          url: myvimeourl,
          dataType: 'jsonp',

          success: function (data) {
            console.log(data[1]);
            obj = data[1];
            jQuery.each(obj, function (key, value) {
              sqValue.push(value[0]);
            });
            response(sqValue);
          }
        });
      },
      select: function (event, ui) {
        setTimeout(function () {
          vimeoApiCall();
        }, 300);
      }
    });
  });

  function vimeoApiCall() {

    var accesstoken = '{{env('VIMEO_ACCESS')}}';
    var text = $("#vimeo-search").val();
    var next = $("#vpageTokenNext").val();
    console.log('jxhh' + next);
    var prev = $("#vpageTokenPrev").val();
    var myvimeourl = null;
    if (next != null && next != '') {
      myvimeourl = 'https://api.vimeo.com' + next;
    } else if (prev != null && prev != '') {
      myvimeourl = 'https://api.vimeo.com' + prev;
    } else {
      myvimeourl = 'https://api.vimeo.com/videos?query=' + text + '&access_token=' + accesstoken + '&per_page=5';
    }

    console.log('url' + myvimeourl);
    $.ajax({
        cache: false,

        dataType: 'json',
        type: 'GET',

        url: myvimeourl,

      })
      .done(function (data) {
        console.log(data);
        // alert('duhjf');
        if (data.paging.previous === null) {
          $("#vpageTokenPrev").hide();
        } else {
          $("#vpageTokenPrev").show();
        }
        if (data.paging.next === null) {
          $("#vpageTokenNext").hide();
        } else {
          $("#vpageTokenNext").show();
        }
        var items = data.data,
          videoList = "";

        $("#vpageTokenNext").val(data.paging.next);
        $("#vpageTokenPrev").val(data.paging.previous);
        console.log(items);
        $.each(items, function (index, e) {

          videourl = e.link;
          // console.log(videourl);
          videoList = videoList +
            '<li class="hyv-video-list-item" ><div class="hyv-thumb-wrapper"><p class="hyv-thumb-link"><span class="hyv-simple-thumb-wrap"><img alt="' +
            e.name + '" src="' + e.pictures.sizes[3].link +
            '" height="90"></span></p></div><div class="hyv-content-wrapper"><p  class="hyv-content-link">' + e
            .name + '<span class="title">' + e.description.substr(0, 105) +
            '</span><span class="stat attribution">by <span>' + e.user.name +
            '</span></span></p><button class="bn btn-info btn-sm inline" onclick=setVideovimeoURl("' + videourl +
            '")>Add</button></div></li>';


        });

        $("#vimeo-watch-related").html(videoList);

      });

  }
</script>
<script type="text/javascript">
  function setVideovimeoURl(videourls) {
    console.log(videourls);
    $('#apiUrl').val(videourls);
    $('#myvimeoModal').modal("hide");
  }
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#selecturl').change(function () {
      $('#apiUrl').val('');
      var opval = $(this).val(); //Get value from select element
      if (opval == "youtubeapi") { //Compare it and if true
        $('#myyoutubeModal').modal("show"); //Open Modal
      }
      if (opval == "vimeoapi") { //Compare it and if true
        $('#myvimeoModal').modal("show"); //Open Modal
      }
    });
  });
</script>
<script>
  $('#subtitle_check').on('change', function () {

    if ($('#subtitle_check').is(':checked')) {
      $('.subtitle-box').show('fast');
    } else {
      $('.subtitle-box').hide('fast');
    }

  });
</script>
<script>
  $(".midia-toggle-upload_video_360").midia({
    base_url: '{{url('')}}',
    dropzone : {
          acceptedFiles: '.mp4,.m3u8'
        },
    directory_name: 'tvshow_upload/url_360'
  });

  $(".midia-toggle-upload_video_480").midia({
    base_url: '{{url('')}}',
    dropzone : {
          acceptedFiles: '.mp4,.m3u8'
        },
    directory_name: 'tvshow_upload/url_480'
  });

  $(".midia-toggle-upload_video_720").midia({
    base_url: '{{url('')}}',
    dropzone : {
          acceptedFiles: '.mp4,.m3u8'
        },
    directory_name: 'tvshow_upload/url_720'
  });

  $(".midia-toggle-upload_video_1080").midia({
    base_url: '{{url('')}}',
    dropzone : {
          acceptedFiles: '.mp4,.m3u8'
        },
    directory_name: 'tvshow_upload/url_1080'
  });
</script>
<script type="text/javascript" src="{{url('js/encrypt.js')}}"></script> <!-- bootstrap js -->
<script>
  $('#apiUrl').on('change', function () {
    $apicurrentValue = $('#apiUrl').val();
    if ($apicurrentValue.includes('encrypt:')) {
      //console.log('true');
      $('#encryptlink').hide();
    } else {
      //console.log('false');
      $('#encryptlink').show();
    }
  });
</script>   
@endsection