@extends('layouts.master')
@section('title',__('Edit Advertise'))
@section('breadcum')
	<div class="breadcrumbbar">
                <h4 class="page-title">{{ __('HOME') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{ __('Dashboard') }}</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ __('Edit Advertise') }}</li>
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
          <h5 class="box-title">{{__('Edit Advertise')}}</h5>
        </div>
        <div class="card-body ml-2">
            @if($ad->ad_location == "onpause" || $ad->ad_location=="popup")
				
				<h5 >{{__('EditAD:')}} {{ $ad->id }} | {{__('Location')}}: <span class="adl">{{ $ad->ad_location }}</span></h5>
				<br>
				<form enctype="multipart/form-data" action="{{ route('ad.update.solo',$ad->id) }}" method="POST">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group text-dark{{ $errors->has('ad_image') ? ' has-error' : '' }}">
                <label for="ad_image">@if($ad->ad_location == 'popup'){{__('Edit Popup Image')}} @else
                {{__('EditImage')}} @endif
                </label>
                <input name="ad_image" type="file" class="form-control">
                <span class="help-block">
                  <strong>{{ $errors->first('ad_image') }}</strong>
                </span>
              </div>
            </div>
            <div class="col-md-3">
              <label class= "text-dark" for="">Current Image:</label>
              <br>
              <img src="{{ asset('adv_upload/image/'.$ad->ad_image)}}" alt="" width="100px" class="img-responsive">
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class= "text-dark" for="ad_target">{{__('Edit Ad Target:')}}</label>
                <br>
                <input type="text" name="ad_target" class="form-control" placeholder="http://" value="{{ $ad->ad_target }} ">
              </div>
            </div>
          </div>
					<input type="submit"  value="{{__('Save')}}" class="btn btn-primary-rgba">
				</form>
				@elseif($ad->ad_location == "skip")
						
					<form action="{{ route('ad.update.video',$ad->id) }}" enctype="multipart/form-data" method="POST">
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						
						<br>	
            <div class="row">
						  @if($ad->ad_video !="no")
            
              <div class="col-md-6">
                <div class="form-group text-dark{{ $errors->has('ad_video') ? ' has-error' : '' }}">
                  <label class= "text-dark" for="ad_video">{{__('Change ADD Video:')}}</label>
                  <input type="file" class="form-control" name="ad_video">
                  <span class="help-block">
                    <strong>{{ $errors->first('ad_video') }}</strong>
                  </span>
                </div>
              </div>
              <div class="col-md-6">
                <label class= "text-dark" for="">{{__('Current Video')}}</label>
                <br>
                <video width="320" height="240" controls>

                  <source src="{{ asset('adv_upload/video/'.$ad->ad_video) }}" type="video/mp4">
                  
                </video>
              </div>
              @else
              <div class="col-md-6">
                <div class="form-group">
                  <div id="urlbox">
                    <label class= "text-dark" for="url">{{__('ADD URL:')}}</label>
                    <input type="text" class="form-control" name="ad_url" value="{{ $ad->ad_url }}">
                  </div>
                </div>
              </div>
						  @endif
              <div class="col-md-6">
                <div class="form-group">
                  <label class= "text-dark" for="ad_target">{{__('Edit Add Target:')}}</label>
                  <input type="text" class="form-control" value="{{ $ad->ad_target }}" name="ad_target" placeholder="http://">
                </div>
              </div>
              <div class="col-md-12">
                <input type="submit" class="btn btn-primary-rgba"/>
              </div>
            </div>
					</form>

				@endif
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