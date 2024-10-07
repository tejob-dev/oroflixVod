@extends('layouts.master')
@section('title',__('Edit Advertisment'))
@section('breadcum')
  <div class="breadcrumbbar">
    <h4 class="page-title">{{ __('All Banners') }}</h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}" title="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Banner') }}</li>
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
            @can('banneradd.view')
              <a href="{{url('admin/banneradd')}}" data-toggle="tooltip" data-original-title="{{__('GoBack')}}" class="float-right btn btn-primary-rgba mr-2" title="{{ __('Back') }}"><i class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a> 
            @endcan
            <h5 class="box-title">{{__('Edit Banner')}}</h5>
          </div>
          <div class="card-body">
            {!! Form::model($banneradd, ['method' => 'PATCH', 'action' => ['BannerAdvertismentController@update', $banneradd->id], 'files' => true]) !!}
            <div class="row">
              <div class="col-md-4">
                <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                    {!! Form::label('link', __('Advertisment Link')) !!} 
                    <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{__('Enter Advertisment Link ')}}">
                      <i class="fa fa-info"></i>
                    </small>
                    {!! Form::text('link', old('name'), ['class' => 'form-control','autocomplete'=>'off','required']) !!}
                    <small class="text-danger">{{ $errors->first('link') }}</small>
                </div> 
              </div>
              <div class="col-md-4">
                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
                  {!! Form::label('image', __('Image')) !!} 
                   <small class="badge badge-pill badge-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{__('Upload Image Of Height 150px')}}">
                      <i class="fa fa-info"></i>
                    </small>
                  {!! Form::file('image', ['class' => 'input-file d-block', 'id'=>'image']) !!}
                  <label for="image" class="btn btn-danger js-labelFile" data-toggle="tooltip" data-original-title="{{__('Image')}}">
                    <i class="icon fa fa-check"></i>
                    <span class="js-fileName">{{isset($banneradd->image) ? $banneradd->image :__('Choose A File')}}</span>
                  </label>
                  <small class="text-danger">{{ $errors->first('image') }}</small>
                </div> 
              </div>
              <div class="col-md-4">
                <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                  {!! Form::label('position',__('Advertisment Position')) !!}
                  <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="{{__('Please Select Addvertisment Position')}}"></i>
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
                    {!! Form::checkbox('detail_page', null, null, ['class' => 'custom_toggle']) !!}
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
                    {!! Form::checkbox('is_active', null, null, ['class' => 'custom_toggle']) !!}
                    <span class="slider round"></span>
                  </label>
                  <div class="col-xs-12">
                    <small class="text-danger">{{ $errors->first('is_active') }}</small>
                  </div>
                </div>  
              </div>
              
              <div class="col-md-3">
                <div class="form-group{{ $errors->has('column') ? ' has-error' : '' }} switch-main-block">
                  {!! Form::label('column', __('Select Column')) !!}
                  <label class="switch d-block">                
                    {!! Form::checkbox('column', null, null, ['class' => 'bootswitch', "data-on-text"=>__('One'), "data-off-text"=>__('Two'), "data-size"=>"small"]) !!}
                  </label>
                  <div class="col-xs-12">
                    <small class="text-danger">{{ $errors->first('column') }}</small>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="menu-block">
                  {!! Form::label(__('Please Select Menu')) !!}
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
                            <input @foreach($banneradd->banneradd_menu as $getbam) @if($getbam->menu_id == $menu->id) checked @endif @endforeach type="checkbox" class="filled-in material-checkbox-input one" name="menu[]" value="{{$menu->id}}" id="checkbox{{$menu->id}}">
                            <label for="checkbox{{$menu->id}}" class="material-checkbox"  ></label>
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
                  <button type="submit" class="btn btn-primary-rgba" title="{{ __('Update') }}">{{__('Update')}}</button>
                </div>
              </div>
            </div>
            <div class="clear-both"></div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
{{--   <script>
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

  <script type="text/javascript">
    $(document).ready(function(){
      var check = [];
    
    $('.one').each(function(index){

      if($(this).is(':checked')){
        check.push(1);
      }else{
        check.push(0);
      }

    });
   
    var flag = 1;

    if (jQuery.inArray(0, check) == -1) {
            flag = 1;

        } else {
            flag = 0;
        }

     if(flag == 0){
      $('.all').prop('checked',false);
     }else{
       $('.all').prop('checked',true);
     }

  });

    // if one checkbox is unchecked remove checked on all menu option

    $(".one").click(function(){
      if($(this).is(':checked'))
      {
       
        var checked = [];
       $('.one').each(function(){
        if($(this).is(':checked')){
          checked.push(1);
        }else{
          checked.push(0);
        }
       })
       
       var flag = 1;

    if (jQuery.inArray(0, checked) == -1) {
            flag = 1;

        } else {
            flag = 0;
        }

       if(flag == 0){
        $('.all').prop('checked',false);
       }else{
         $('.all').prop('checked',true);
       }
      }
      else{
        
        $('.all').prop('checked',false);
      }
    });

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