@extends('layouts.master')
@section('title',__('Create Advertisment'))
@section('breadcum')
  <div class="breadcrumbbar">
    <h4 class="page-title">{{ __('All Banners') }}</h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}" title="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ __('Create Banner') }}</li>
        </ol>
    </div>
  </div>
@endsection
@section('maincontent')
  <div class="contentbar">
    <div class="row">
      <div class="col-md-12">
        <div class="card m-b-50">
          <div class="card-header">
            @can('blog.view')
            <a href="{{url('admin/banneradd')}}" data-toggle="tooltip" data-original-title="{{__('Go Back')}}" class="float-right btn btn-primary-rgba mr-2" title="{{ __('Back') }}"><i class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a> 
            @endcan
            <h5 class="box-title">{{__('Create Banner')}}</h5>
          </div>
          <div class="card-body">
            {!! Form::open(['method' => 'POST', 'action' => 'BannerAdvertismentController@store', 'files' => true]) !!}
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                    {!! Form::label('link', __('Advertisment Link')) !!}
                    <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{__('Enter Advertisment Link ')}}">
                      <i class="fa fa-info"></i>
                    </small>
                    {!! Form::text('link', old('link'), ['class' => 'form-control', 'autofocus', 'autocomplete'=>'off','required', 'placeholder'=> __('Enter Advertisment Link')]) !!}
                    <small class="text-danger">{{ $errors->first('link') }}</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
                    {!! Form::label('image', __('Image')) !!}
                     <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{__('Upload Image Of Height 150px')}}">
                      <i class="fa fa-info"></i>
                    </small>
                    <span class="text-danger">*</span>
                    {!! Form::file('image', ['class' => 'input-file d-block','required', 'id'=>'image']) !!}
                    <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{__('Advertisment Image')}}">
                      <i class="icon fa fa-check"></i>
                      <span class="js-fileName">{{__('Choose A File')}}</span>
                    </label>
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                    {!! Form::label('position',__('Advertisment Position')) !!}
                    <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{__('Please Select Position')}}">
                      <i class="fa fa-info"></i>
                    </small>
                    {!! Form::select('position', array('' =>__('Select Positon'), '1' =>'After Slider','2' =>'Footer', '3' => 'Center', '4'=>'Before Slider'), null, ['class' => 'form-control select2']) !!}
                    <small class="text-danger">{{ $errors->first('position') }}</small>
                  </div>
                </div>                
                <div class="col-md-3">
                  <div class="form-group{{ $errors->has('detail_page') ? ' has-error' : '' }} switch-main-block">
                    {!! Form::label('detail_page', __('Detail Page')) !!}
                    <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{__('Please Select if you want to show Add on Detail Page')}}">
                      <i class="fa fa-info"></i>
                    </small>
                    <label class="switch d-block">                
                      {!! Form::checkbox('detail_page', 0, 0, ['class' => 'custom_toggle']) !!}
                      <span class="slider round"></span>
                    </label>
                    <div class="col-xs-12">
                      <small class="text-danger">{{ $errors->first('detail_page') }}</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }} switch-main-block">
                    {!! Form::label('is_active', __('Status')) !!}
                    <label class="switch d-block">                
                      {!! Form::checkbox('is_active', 1, 1, ['class' => 'custom_toggle']) !!}
                      <span class="slider round"></span>
                    </label>
                    <div class="col-xs-12">
                      <small class="text-danger">{{ $errors->first('is_active') }}</small>
                    </div>
                  </div>
                </div>                
                <div class="col-md-3">
                  <div class="form-group{{ $errors->has('column') ? ' has-error' : '' }} switch-main-block">
                    {!! Form::label('is_active', __('Select Column')) !!}
                    <label class="make-switch d-block">                
                      {!! Form::checkbox('column', 1, 1, ['class' => 'bootswitch', "data-on-text"=>__('One'), "data-off-text"=>__('Two'), "data-size"=>"small"]) !!}
                    </label>
                    <div class="col-xs-12">
                      <small class="text-danger">{{ $errors->first('column') }}</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="menu-block">
                    {!! Form::label(__('Please Select Menu')) !!}
                    <small class="text-danger">{{ $errors->first('menu') }}</small>
                    @if (isset($menus) && count($menus) > 0)
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-5 col-md-8 col-6">
                            {{__('All Menus')}}
                          </div>
                          <div class="col-lg-7 col-md-4 col-6 pad-0">
                            <div class="inline">
                              <input type="checkbox" class="filled-in material-checkbox-input all" name="menu[]" value="100" id="checkbox{{100}}" >
                              <label for="checkbox{{100}}" class="material-checkbox"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        @foreach ($menus as $menu)
                        <div class="row">
                          <div class="col-lg-5 col-md-8 col-6">
                            {{$menu->name}}
                          </div>
                          <div class="col-lg-7 col-md-4 col-6 pad-0">
                            <div class="inline">
                              <input type="checkbox" class="filled-in material-checkbox-input one" name="menu[]" value="{{$menu->id}}" id="checkbox{{$menu->id}}" >
                              <label for="checkbox{{$menu->id}}" class="material-checkbox"></label>
                            </div>     
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                    @endif
                  </div>
                </div>
                <div class="col-md-12">        
                  <div class="form-group">
                    <button type="reset" class="btn btn-success-rgba" title="{{ __('Reset') }}"></i> {{__('Reset')}}</button>
                    <button type="submit" class="btn btn-primary-rgba" title="{{ __('Create') }}"><i class="fa fa-check-circle"></i> {{__('Create')}}</button>
                  </div>
                </div>
                <div class="clear-both"></div>
              </div>  
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
 {{--  <script>
    $(document).ready(function(){

      $('.upload-image-main-block').hide();
      $('.for-custom-image input').click(function(){
        if($(this).prop("checked") == true){
          $('.upload-image-main-block').fadeIn();
        }
        else if($(this).prop("checked") == false){
          $('.upload-image-main-block').fadeOut();
        }
      });
    });
  </script> --}}
  <script>
    // when click all menu  option all checkbox are checked

    $(".all").click(function(){
      if($(this).is(':checked')){
        $('.one').prop('checked',true);
      }
      else{
        $('.one').prop('checked',false);
      }
    })
  </script>

  <script>
  (function($){
    $.noConflict();    
  })(jQuery);    
</script>  
  
@endsection