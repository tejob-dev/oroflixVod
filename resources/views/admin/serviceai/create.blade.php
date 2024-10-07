@extends('layouts.master')
@section('title',__('Create Service'))
@section('breadcum')
  <div class="breadcrumbbar">
    <h4 class="page-title">{{ __('Create Service') }}</h4>
      <div class="breadcrumb-list">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/admin')}}" title="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Create Service') }}</li>
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
            <p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close" title="{{ __('Close')}}">
                    <span aria-hidden="true" style="color:red;">&times;</span></button></p>
            @endforeach
        </div>
        @endif

        <!-- row started -->
        <div class="col-lg-12">
            <div class="card dashboard-card m-b-30">
                <!-- Card header will display you the heading -->
                <div class="card-header">
                    <a href="{{url('admin/services')}}" class="btn btn-primary-rgba float-right" title="{{ __('Back')}}"><i class="feather icon-arrow-left mr-2"></i>{{ __("Back")}}</a>
                    <h5 class="card-box"> {{ __('Add Service') }}</h5>
                </div>
                <!-- card body started -->
                <div class="card-body">
                    <!-- form start -->
                    <form action="{{action('ServiceController@store')}}" class="form" method="POST" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="user_id" value="{{ Auth::User()->id }}">
                        <!-- row start -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- card start -->
                                <div class="card">
                                    <!-- card body start -->
                                    <div class="card-body">
                                        <!-- row start -->
                                        <div class="row">

                                            <div class="col-md-12">
                                                <!-- row start -->
                                                <div class="row">
                                                    <!-- Heading -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="text-dark">{{ __('Service') }} : <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" value="{{ old('name') }}" autofocus=""
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                placeholder="{{ __('Enter Service Title') }}"
                                                                name="name" required="">
                                                            @error('heading')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- status -->
                                                    <div class="form-group col-md-3">
                                                        <label for="exampleInputDetails">{{ __('Status') }}:</label><br>
                                                        <input type="checkbox" class="custom_toggle" name="status"   checked />
                                                        <input type="hidden"  name="free" value="0" for="status" id="status">
                                                    </div>
                                                        <!-- create and close button -->
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button type="reset" class="btn btn-danger-rgba mr-1"><i
                                                                        class="fa fa-ban" title="{{ __('Reset')}}"></i> {{ __("Reset")}}</button>
                                                                <button type="submit" class="btn btn-primary-rgba"><i
                                                                        class="fa fa-check-circle" title="{{ __('Create')}}"></i>
                                                                    {{ __("Create")}}</button>
                                                            </div>
                                                        </div>
                                                    </div><!-- row end -->
                                                </div><!-- col end -->
                                            </div><!-- row end -->

                                        </div><!-- card body end -->
                                    </div><!-- card end -->
                                </div><!-- col end -->
                            </div><!-- row end -->
                    </form>
                    <!-- form end -->
                </div><!-- card body end -->
            </div><!-- col end -->
        </div>
    </div>
</div><!-- row end -->
<br><br>
@endsection
<!-- main content section ended -->
<!-- This section will contain javacsript start -->
<!-- This section will contain javacsript end -->
