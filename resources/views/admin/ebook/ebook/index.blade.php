@extends('layouts.master')
@section('title',__('Ebooks'))
@section('breadcum')
	<div class="breadcrumbbar">
    <h4 class="page-title">{{ __('All Ebooks') }}</h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ __('Ebooks') }}</li>
        </ol>
    </div>
  </div>
@endsection
@section('maincontent')
<div class="contentbar"> 
  <div class="row">
    <div class="col-md-12">
      <div class="card-header movie-create-heading">
        <div class="row">
          <div class="col-lg-4 col-4">
            <h5 class="card-title">{{ __('All Ebooks') }}</h5>
          </div>
          <div class="col-lg-8 col-8">
           
           
            <a href="{{ route('ebook.create') }}" class="float-right btn btn-primary-rgba mb-2 mr-2"><i
                class="feather icon-plus mr-2"></i>{{ __("Add new ebook")}} </a>


            
          </div>
        </div>
                        
      </div> 
      <div class="card-body">
        <section id="movies" class="movies-main-block">
          <div class="row">
            @foreach($ebook as $item)
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                  <img src="{{ url('images/ebook/'.$item->thumbnali) }}" class="card-img-top" alt="...">
                <div class="overlay-bg"></div>
                <div class="dropdown card-dropdown">
                  <a class="btn btn-round btn-outline-primary pull-right dropdown-toggle" type="button" id="dropdownMenuButton-{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></a>
                  <div class="dropdown-menu pull-right" aria-labelledby="dropdownMenuButton-{{$item->id}}">
                      <a class="dropdown-item" href="{{url('account/ebook/detail/'.$item->id)}}" target="__blank"><i class="feather icon-monitor mr-2"></i>View</a>        
                                               
                      <a class="dropdown-item" href="{{url('admin/ebook/edit/'.$item->id)}}"><i class="feather icon-edit mr-2"></i> Edit</a>     
                                                
                      <a type="button" class="dropdown-item" data-toggle="modal" data-target="#deleteModal{{$item->id}}"><i class="feather icon-trash mr-2"></i> Delete</a>
                    
                  </div>
                </div>
                <div id="deleteModal{{$item->id}}" class="delete-modal modal fade card-dropdown-modal" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">×</button>
                          <div class="delete-icon"></div>
                      </div>
                      <div class="modal-body text-center">
                          <h4 class="modal-heading">Are You Sure ?</h4>
                          <p>Do you really want to delete these records? This process cannot be undone.</p>
                      </div>
                      <div class="modal-footer">
                        <form method="POST" action="{{url('admin/ebook/delete/'.$item->id)}}">
                          @method('POST')
                          @csrf
                          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">{{__('No')}}</button>
                          <button type="submit" class="btn btn-danger">{{__('Yes')}}</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-header">
                  <h5 class="card-title">{{$item->title}}</h5>
                </div>
                <div class="card-body">
                <div class="card-block row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <h6 class="card-body-sub-heading">{{__('Genre')}}</h6>
                      <p>{{$item->category_id?$item->category->name:''}}</p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                      <h6 class="card-body-sub-heading">{{__('Type')}}</h6>
                      @if($item->free=='Yes')
                              <a href="javascript:void();" class='badge badge-pill badge-success'>{{__('Free')}}</a>
                          @else
                              <a href="javascript:void();" class='badge badge-pill badge-danger'>{{__('Paid')}}</a>
                        @endif
                    </div>                        
                  </div>
                  <div class="card-block row">
                    <div class="col-xs-6 col-sm-6 col-md-6 movie-create-heading">
                      <h6 class="card-body-sub-heading">{{__('Publication Name')}}</h6>
                      <p> {{$item->publication}}</p>
                    </div>
                    <div class="col-xs-6 col-md-6 col-md-6">
                      <h6 class="card-body-sub-heading">{{__('Status')}}</h6>
                      <p class="status-btn">
                      @if($item->status=='1')
                              <a href="javascript:void();" class='badge badge-pill badge-success'>{{__('Active')}}</a>
                          @else
                              <a href="javascript:void();" class='badge badge-pill badge-danger'>{{__('De Active')}}</a>
                        @endif
                      </p>
                    </div>
                  </div>              
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </section>
      </div>
    </div>
  </div>
</div>
</div>
@endsection 
@section('script')
   
<script src="{{ url('assets/js/custom/custom-barrating.js') }}"></script>

@endsection