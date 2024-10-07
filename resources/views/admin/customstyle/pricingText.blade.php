@extends('layouts.master')
@section('title',__('Pricing Text Setting'))
@section('breadcum')
	<div class="breadcrumbbar">
      <h4 class="page-title">{{ __('Currency') }}</h4>
      <div class="breadcrumb-list">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}" title="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Currency') }}</li>
          </ol>
      </div>      
    </div>
@endsection
@section('maincontent')
<div class="contentbar"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-50">
                <div class="admin-form-main-block mrg-t-40">
                    <div class="card-header">
                        <a href="{{url('admin/packages')}}" class="float-right btn btn-primary-rgba mr-2" title="{{ __('Back') }}"><i class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
                        <!--<h4 class="admin-form-text"><a href="{{url('admin/packages')}}" data-toggle="tooltip" data-original-title="{{__('Go Back')}}" class="btn-floating" title="{{__('Pricing Text Setting')}}"><i class="material-icons">reply</i></a>{{__('Pricing Text Setting')}}</h4>-->
                    </div>
                    <div class="card-body">
                        <div class="admin-form-block z-depth-1">
                          
                            {!! Form::model($pricingtexts, ['method' => 'POST', 'action' => 'CustomStyleController@pricingTextUpdate']) !!}
                             <div class="form-group{{ $errors->has('package_id') ? ' has-error' : '' }}">
                                <input type="hidden" name="package_id" value="{{$planid}}">
                             </div>
                             <div class="row">
                              @php
                               $title1=null;$title2=null;$title3=null;
                               $title4=null;$title5=null;$title6=null;
                               if (isset($pricingtexts) && count($pricingtexts)>0) {
                                 foreach ($pricingtexts as $key => $value) {
                                    $title1=$value->title1;
                                    $title2=$value->title2;
                                    $title3=$value->title3;
                                    $title4=$value->title4;
                                    $title5=$value->title5;
                                    $title6=$value->title6;
                                  }
                                }
                               @endphp
                                     
                                <div class="col-md-4">
                              {{-- title 1 --}}
                                <div class="form-group{{ $errors->has('title1') ? ' has-error' : '' }}">
                                    {!! Form::label('title1',__('title 1')) !!}
                                   
                                  {!! Form::text('title1',$title1, ['class' => 'form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('title1') }}</small>
                                </div>
                              </div>
                    
                                  <div class="col-md-4">
                                  {{-- title 2 --}}
                                    <div class="form-group{{ $errors->has('title2') ? ' has-error' : '' }}">
                                        {!! Form::label('title2', __('title 2')) !!}
                                      {!! Form::text('title2',$title2, ['class' => 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('title2') }}</small>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                  {{-- title 3 --}}
                                    <div class="form-group{{ $errors->has('title3') ? ' has-error' : '' }}">
                                        {!! Form::label('title3', __('title 3')) !!}
                                      {!! Form::text('title3',$title3, ['class' => 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('title3') }}</small>
                                    </div>
                                  </div>
                                   <div class="col-md-4">
                                  {{-- title 4 --}}
                                    <div class="form-group{{ $errors->has('title4') ? ' has-error' : '' }}">
                                        {!! Form::label('title4', __('title 4')) !!}
                                      {!! Form::text('title4',$title4, ['class' => 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('title4') }}</small>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                  {{-- title 5 --}}
                                    <div class="form-group{{ $errors->has('title5') ? ' has-error' : '' }}">
                                        {!! Form::label('title5', __('title 5')) !!}
                                      {!! Form::text('title5',$title5, ['class' => 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('title5') }}</small>
                                    </div>
                                  </div>
                                   <div class="col-md-4">
                                  {{-- title 6 --}}
                                    <div class="form-group{{ $errors->has('title6') ? ' has-error' : '' }}">
                                        {!! Form::label('title6', __('title 6')) !!}
                                      {!! Form::text('title6',$title6, ['class' => 'form-control']) !!}
                                        <small class="text-danger">{{ $errors->first('title6') }}</small>
                                    </div>
                                  </div>          
                                    
                        
                                  <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-success" title="{{__('Save')}}">{{__('Save')}}</button>
                                  </div>
                                 
                                  <div class="clear-both"></div>
                                </div>
                            {!! Form::close() !!}
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection