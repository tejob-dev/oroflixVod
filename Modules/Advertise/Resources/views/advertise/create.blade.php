@extends('layouts.master')
@section('title',__('Create Advertise'))
@section('breadcum')
    <div class="breadcrumbbar">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Create Advertise') }}</li>
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
  <p>{{ $error}}<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      @endforeach  
  </div>
  @endif
    <div class="col-lg-12">
      <div class="card m-b-50">
        <div class="card-header">
            <a href="{{ route('ads') }}" class="float-right btn btn-primary-rgba mr-2"><i
              class="feather icon-arrow-left mr-2"></i>{{ __('Back') }}</a>
          <h5 class="box-title">{{__('Create Advertise')}}</h5>
        </div>
        <div class="card-body ml-2">
            <form style="margin-top:-15px;" enctype="multipart/form-data" method="POST" action="{{ route('ad.store') }} ">
                <br>
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-dark" for="ad_location">{{__('Ad Location:')}}</label>
                            <select name="ad_location" id="test" class="form-control">
                                <option value="popup">{{__('Popup')}}</option>
                                <option value="onpause">{{__('On pause')}}</option>
                                <option id="skipad" value="skip">{{__('Skip Add')}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="s_img" class="form-group text-dark">
                            <div class="form-group text-dark{{ $errors->has('ad_image') ? ' has-error' : '' }}">
                                <label for="ad_image">{{__('Add Image')}}</label>
                                <input type="file" name="ad_image" class="form-control">
                                
                            </div>
                            <small class="text-danger">{{ $errors->first('ad_image') }}</small>
                        </div>
                    </div>
                    
                    <div style="display: none;"  id="type">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input  type="radio" value="upload" checked name="checkType" id="ch1"> {{__('Upload')}} 
                                <input  type="radio" value="url" name="checkType" id="ch2"> {{__('URL')}}
                            </div>            
                            <input style="display: none;" placeholder="http://" type="text" name="ad_url" id="ad_url">
                            <div id="s_video" style="display: none;" class="form-group text-dark">
                                <div class="form-group{{ $errors->has('ad_video') ? ' has-error' : '' }}">
                                    <label for="ad_image">{{__('Add Video')}}</label>
                                    <input type="file" name="ad_video" class="form-control">
                                    <span class="help-block">
                                    <strong>{{ $errors->first('ad_video') }}</strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class= "text-dark" for="">{{__('Enter Add Target:')}}</label>
                            <input type="text" class="form-control" placeholder="{{__('Enter Add Target URL:http://')}}" name="ad_target">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div id="forpopup1">
                                <label class= "text-dark" for="">{{__('Enter Start Time:')}}</label>
                                <input type="text" class="form-control" name="time" placeholder="ex. 00:00:10" >
                                <small class="text-danger">{{ $errors->first('time') }}</small>
                            </div>
                        </div>
                    </div>
                    <div style="display: none;" id="ad_hold_time">
                        <div class="col-md-12">                
                            <div class="form-group">        
                                <label class= "text-dark" for="ad_hold">{{__('Add Hold Time:')}}</label>
                                <input type="text" class="form-control" placeholder="eg. 5" name="ad_hold">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div id="forpopup">
                                <label class= "text-dark" for="">{{__('Enter EndT ime:')}}</label>
                                <input type="text" class="form-control" name="endtime" placeholder="ex. 00:00:20" >
                                <small class="text-danger">{{ $errors->first('endtime') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group text-dark">
                            <button type="reset" class="btn btn-success-rgba">{{__('Reset')}}</button>
                            <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                            {{ __('Create') }}</button>
                        </div>
                    </div>
                </div>
            </form>
                <div class="clear-both"></div>
            

      </div>
    </div>
  </div>
</div>
</div>
@endsection 
@section('script')
<script type="text/javascript">
    $('#test').change(function() {
if($(this).val() == 'skip')
{
    $('#s_video').show();
    $('#s_img').hide();
    $('#type').show();
    $('#forpopup1').show();
    $('#forpopup').hide();
    $('#ad_hold_time').show();
}

    else
{
    $('#s_video').hide();
    $('#s_img').show();
    $('#type').hide();
    $('#ad_hold_time').hide();

}

if($(this).val() == 'popup')
{
    $('#s_video').hide();
    $('#s_img').show();
    $('#forpopup1').show();
    $('#forpopup').show();
    $('#type').hide();
    $('#ad_hold_time').hide();
}

 if($(this).val() == 'onpause')
{
    $('#s_video').hide();
    $('#s_img').show();
    $('#forpopup').hide();
    $('#forpopup1').hide();
    $('#type').hide();
    $('#ad_hold_time').hide();
}
    
});

    $('#ch2').click(function(){
        $('#s_video').hide();
        $('#ad_url').show();
    });

    $('#ch1').click(function(){
        $('#s_video').show();
        $('#ad_url').hide();
    });

    


</script>

<script>
$(function() {
$('#toggle-event').change(function() {
  $('#url').val(+ $(this).prop('checked'))
})
})
</script>
    
@endsection