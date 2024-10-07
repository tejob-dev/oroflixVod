@extends('layouts.master')
@section('title',__('Edit Block'))
@section('breadcum')
   <div class="breadcrumbbar">
        <h4 class="page-title">{{ __('Edit Slide') }}</h4>
        <div class="breadcrumb-list">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/admin')}}" title="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Slide') }}</li>
            </ol>
        </div>   
    </div>
@endsection
@section('maincontent')
<div class="contentbar">
  <div class="row">
    @if ($errors->any())  
  <div class="alert alert-danger" role="alert">
  @foreach($errors->all() as $error)     
  <p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close" title="{{ __('Close') }}">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      @endforeach  
  </div>
  @endif
    <div class="col-lg-12">
      <div class="card m-b-50">
        <div class="card-header">
          <a href="{{url('admin/customize/landing-page')}}" class="float-right btn btn-primary-rgba mr-2" title="{{ __('Back') }}"><i
            class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
          <h5 class="box-title">{{__('Edit Slide')}}</h5>
        </div>
        <div class="card-body ml-2">
          {!! Form::model($landing_page, ['method' => 'PATCH', 'action' => ['LandingPageController@update', $landing_page->id], 'files' => true]) !!}
            <div class="row">
              <div class="col-md-3">
                <div class="form-group text-dark{{ $errors->has('heading') ? ' has-error' : '' }}">
                  {!! Form::label('heading', __('Slide Heading')) !!} <sup class="text-danger">*</sup>
                  {!! Form::text('heading', null, ['class' => 'form-control', 'placeholder'=>__('Please Enter Heading')]) !!}
                  <small class="text-danger">{{ $errors->first('heading') }}</small>
                </div>
              </div>              
              <div class="col-md-3">
                <div class="pad_plus_border">
                  <div class="form-group text-dark{{ $errors->has('button') ? ' has-error' : '' }}">
                    {!! Form::label('button', __('Button Enable/Disable')) !!}
                    <label class="switch d-block">
                      {!! Form::checkbox('button', 1, $landing_page->button, ['class' => 'custom_toggle']) !!}
                      <span class="slider round"></span>
                    </label>
                    <div class="col-xs-12">
                      <small class="text-danger">{{ $errors->first('button') }}</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="bootstrap-checkbox form-group text-dark{{ $errors->has('button_link') ? ' has-error' : '' }}">
                  {!! Form::label('button_link', __('Button for Login or Register')) !!}
                  <div class="make-switch d-block">
                    {!! Form::checkbox('button_link', 1, ($landing_page->button_link == 'login' ? 1 : 0), ['class' => 'custom_toggle']) !!}
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger">{{ $errors->first('button_link') }}</small>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group text-dark{{ $errors->has('button_text') ? ' has-error' : '' }} button_text">
                  {!! Form::label('button_text', __('Button Heading')) !!}
                  {!! Form::text('button_text', null, ['class' => 'form-control', 'placeholder' => __('Please Enter Button Heading')]) !!}
                  <small class="text-danger">{{ $errors->first('button_text') }}</small>
                </div>
              </div>
              <div class="col-md-3">
                <div class="bootstrap-checkbox form-group text-dark{{ $errors->has('left') ? ' has-error' : '' }}">
                  {!! Form::label('checkbox', 'Image Position') !!}
                  <div class="make-switch d-block">
                    {!! Form::checkbox('left', 1, $landing_page->left, ['class' => 'custom_toggle']) !!}
                  </div>
                  <div class="col-md-12">
                    <small class="text-danger">{{ $errors->first('left') }}</small>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group text-dark{{ $errors->has('image') ? ' has-error' : '' }} input-file-block">
                  {!! Form::label('image', 'Slide Image') !!} <sup class="text-danger">*</sup>
                  {!! Form::file('image', ['class' => 'input-file', 'id'=>'image','accept'=>'image/*']) !!}
                  
                  <small class="text-danger">{{ $errors->first('image') }}</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group text-dark{{ $errors->has('detail') ? ' has-error' : '' }}">
                    {!! Form::label('detail', __('Detail')) !!}
                    {!! Form::textarea('detail', null, ['class' => 'form-control materialize-textarea', 'rows' => '1']) !!}
                    <small class="text-danger">{{ $errors->first('detail') }}</small>
                </div>
              </div>
            </div>              
              
            <div class="form-group">
              <button type="reset" class="btn btn-success-rgba" title="{{__('Reset')}}">{{__('Reset')}}</button>
              <button type="submit" class="btn btn-primary-rgba" title="{{ __('Update') }}"><i class="fa fa-check-circle"></i>
                {{ __('Update') }}</button>
            </div>
            {!! Form::close() !!}
            <div class="clear-both"></div>
            

      </div>
    </div>
  </div>
</div>
</div>
@endsection 
@section('script')
<script>
  $(function(){
    
    $('form').on('submit', function(event){
      $('.loading-block').addClass('active');
    });
  });

  $(".toggle-password2").click(function() {
    $.noConflict();
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
  });
  
</script>


    
@endsection