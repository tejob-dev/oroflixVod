@extends('layouts.master')
@section('title',__('All Advertise'))
@section('breadcum')
@php
         $ads = Modules\Advertise\Models\Ads::all();
    @endphp
  <div class="breadcrumbbar">
                <h4 class="page-title">{{ __('All Advertise') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('All Advertise') }}</li>
                    </ol>
                </div>
        
    </div>
@endsection
@section('maincontent')
<div class="contentbar">
<div class="row">
  
  <div class="col-lg-12">
      <div class="card m-b-30">
          <div class="card-header"><button type="button" class="float-right btn btn-danger-rgba mr-2 " data-toggle="modal"
            data-target="#bulk_delete"><i class="feather icon-trash mr-2"></i> {{ __('Delete Selected') }} </button>
              <a href="{{ route('ad.create') }}" class="float-right btn btn-primary-rgba mr-2"><i
                  class="feather icon-plus mr-2"></i>{{ __('Create Add') }}</a>
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
                                <h4 class="modal-heading">{{__('Are You Sure ?')}}</h4>
                                <p>{{__('Do you really want to delete selected item names here? This
                                    process
                                    cannot be undone.')}}</p>
                            </div>
                            <div class="modal-footer">
                              {!! Form::open(['method' => 'POST', 'action' => '\Modules\Advertise\Http\Controllers\AdvertiseController@bulk_delete', 'id' => 'bulk_delete_form']) !!}
                                    @method('POST')
                                    <button type="reset" class="btn btn-secondary translate-y-3" data-dismiss="modal">{{__('No')}}</button>
                                    <button type="submit" class="btn btn-primary">{{__('Yes')}}</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                <h5 class="card-title"> {{__("All Coupons")}}</h5>
          </div>
          
          <div class="card-body">
           
              <div class="table-responsive">
                <table id="roletable" class="table table-borderd responsive " style="width: 100%">

                    <thead>
                      <th>
                        <div class="inline">
                          <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                          <label for="checkboxAll" class="material-checkbox">#</label>
                        </div>
                      </th>
                      <th>{{__('Add Type')}}</th>
                      <th>{{__('Add Location')}}</th>
                      <th>{{__('Actions')}}</th>
                    </thead>
                
                    <tbody>
                <tbody>
                    @php $i=0; @endphp
                    @foreach($ads as  $ad)
                    @php $i++ @endphp
                    <tr>
                      <td>
                        <div class="inline">
                          <input type="checkbox" form="bulk_delete_form" class="filled-in material-checkbox-input" name="checked[]" value="{{$ad->id}}" id="checkbox{{$ad->id}}">
                          <label for="checkbox{{$ad->id}}" class="material-checkbox">{{ $i }}</label>
                        </div>
                      </td>
                      <td class="fl">{{ $ad->ad_type }}</td>
                      <td class="fl">{{ $ad->ad_location }}</td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-round btn-outline-primary" type="button"
                              id="CustomdropdownMenuButton1" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false" title="{{ __('Action') }}"><i
                                  class="feather icon-more-vertical-"></i></button>
                          <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                            <a href="{{ route('ad.edit',$ad->id) }}" class="dropdown-item"  data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="feather icon-edit mr-2"></i>{{ __("Edit") }}</a>
                            <form action="{{ route('ad.delete',$ad->id) }}" method="POST">
                              {{ csrf_field() }} 
                              {{ method_field('DELETE')}}
                              <button type="submit" title="{{__('Delete')}}" onclick="return confirm('Are you sure?')" class="dropdown-item btn btn-link"><i class="feather icon-delete mr-2"></i>{{ __("Delete") }}</button>
                              
                           </form>
                          </div>
                      </td>
                    </tr>

                    
                  </div>
                  @endforeach
                </tbody>
                </table>
            </div>
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