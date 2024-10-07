@extends('layouts.master')
@section('title',__('All Advertisments'))
@section('breadcum')
  <div class="breadcrumbbar">
    <h4 class="page-title">{{ __('All Banners') }}</h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}" title="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ __('Banner') }}</li>
        </ol>
    </div>
  </div>
@endsection
@section('maincontent')
  <div class="contentbar permissionTable">
    <div class="row">
      <div class="col-md-12">
        <div class="card-header movie-create-heading">
          <div class="row">
            <div class="col-lg-4 col-4">
              <h5 class="card-title">{{ __('All Banners') }} 
                <input class="grand_selectallm ml-3" type="checkbox">
                {{__('Select All') }}
              </h5>
            </div>
            <div class="col-lg-8 col-8">
              @can('banneradd.delete')
              <button type="button" class="float-right btn btn-danger-rgba" data-toggle="modal" data-target="#bulk_delete" title="{{ __('Delete Selected') }}"><i class="feather icon-trash mr-2"></i>  {{__('Delete Selected')}}</button>   
              @endcan
              @can('banneradd.create')
                <a href="{{route('banneradd.create')}}" class="float-right btn btn-primary-rgba mb-2 mr-2" title="{{ __('Create Post') }}"><i
                  class="feather icon-plus mr-2"></i>{{__('Create Post')}}</a>
              @endcan
              <!-- Delete Modal -->
             
              <!-- Modal -->
              <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" title="{{ __('Close') }}">&times;</button>
                      <div class="delete-icon"></div>
                    </div>
                    <div class="modal-body text-center">
                      <h4 class="modal-heading">{{__('Are You Sure')}}</h4>
                      <p>{{__('Delete Warning')}}</p>
                    </div>
                    <div class="modal-footer">
                      {!! Form::open(['method' => 'POST', 'action' => 'BlogController@bulk_delete', 'id' => 'bulk_delete_form']) !!}
                        <button type="reset" class="btn btn-secondary translate-y-3" data-dismiss="modal">{{__('No')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Yes')}}</button>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body permissionTable">
          <section id="movies" class="movies-main-block">      
            <div class="row">
              @if(isset($banneradd) && $banneradd->count() > 0)
              @foreach($banneradd as $item)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                  <input class="permissioncheckbox form-check-card-input visibility-visible" form="bulk_delete_form" type="checkbox" value="{{$item->id}}" id="checkbox{{$item->id}}" name="checked[]">
                  <div class="card-two card">
                    @if($item->image != NULL)
                    <img src="{{url('/images/banneradd/' . $item->image)}}" class="card-img-top" alt="...">
                    @else
                    <img src="{{Avatar::create($item->title)->toBase64()}}" class="card-img-top" alt="...">
                    @endif
                    <div class="overlay-bg"></div>
                    <div class="dropdown card-dropdown">
                      <a class="btn btn-round btn-outline-primary pull-right dropdown-toggle" type="button" id="dropdownMenuButton-{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather icon-more-vertical-"></i>
                      </a>
                      <div class="dropdown-menu pull-right" aria-labelledby="dropdownMenuButton-{{$item->id}}">
                      
                        @can('banneradd.edit')
                          <a class="dropdown-item" href="{{ route('banneradd.edit', $item->id)}}" title="{{ __('Edit') }}"><i class="feather icon-edit mr-2"></i>{{__('Edit')}}</a>
                        @endcan
                      
                        @can('banneradd.delete')
                        
                          <a type="button" class="dropdown-item" data-toggle="modal" data-target="#deleteModal{{$item->id}}" title="{{ __('Delete') }}"><i class="feather icon-trash mr-2"></i> {{__('Delete')}}</a>
                          
                        @endcan
                       
                      </div>
                    </div>
                    <div id="deleteModal{{$item->id}}" class="delete-modal modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" title="{{ __('Close') }}">&times;</button>
                            <div class="delete-icon"></div>
                          </div>
                          <div class="modal-body text-center">
                            <h4 class="modal-heading">{{__('Are You Sure')}}</h4>
                            <p>{{__('Delete Warning')}}</p>
                          </div>
                          <div class="modal-footer">
                            <form method="POST" action="{{route("banneradd.destroy", $item->id)}}">
                              @method('DELETE')
                              @csrf
                                <button type="reset" class="btn btn-secondary translate-y-3" data-dismiss="modal">{{__('No')}}</button>
                                <button type="submit" class="btn btn-primary">{{__('Yes')}}</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="card-block">
                        <h6 class="card-body-sub-heading">{{__('Link')}}</h6>
                        <p>{!! isset($item->link) && $item->link != NULL ? str_limit($item->link,100) : '-' !!}</p>
                      </div>
                      <div class="card-block">
                        <h6 class="card-body-sub-heading">{{__('Status')}}</h6>
                        @if($item->is_active == 1)
                          <p>{{__('Active')}}</p>
                        @else
                          <p>{{__('De Active')}}</p>
                        @endif
                      </div>
                      <div class="card-block">
                        <h6 class="card-body-sub-heading">{{__('Column')}}</h6>
                        @if($item->column == 1)
                          <p>{{__('One Column')}}</p>
                        @else
                          <p>{{__('Two Column')}}</p>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              <div class="col-md-12 pagination-block text-center">
                 {!! $banneradd->appends(request()->query())->links() !!}
              </div>
              @else
              <div class="col-md-12 text-center">
                <h5>{{__("Let's start :)")}}</h5>
                <small>{{__('Get Started by creating a actor! All of your advetisment will be displayed on this page.')}}<a href=""></a></small>
              </div>
              @endif
            </div>
          </section>
        </div>
      </div>
    </div>
    
    
  </div>
@endsection
@section('script')
  <script>
    $(function(){
      $('#checkboxAll').on('change', function(){
        if($(this).prop("checked") == true){
          $('.material-checkbox-input').attr('checked', true);
        }
        else if($(this).prop("checked") == false){
          $('.material-checkbox-input').attr('checked', false);
        }
      });
    });
  </script>

@endsection