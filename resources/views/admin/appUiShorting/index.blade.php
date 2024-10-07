@extends('layouts.master')
@section('title', __('App Ui Shorting'))
@section('breadcum')
  <div class="breadcrumbbar">
    <h4 class="page-title">{{ __('All App Ui Shorting') }}</h4>
    <div class="breadcrumb-list">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/admin')}}" title="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ __('App Ui Shorting') }}</li>
        </ol>
    </div>
  </div>
@endsection
@section('maincontent')
<div class="contentbar">
  <div class="card">
    <div class="card-header">
      <!-- Tab buttons for site settings -->
      <h5>{{__('App Ui Shorting')}}</h5><br/>
  
      {{-- <p class="info">{{__('DragAnDrop')}}</p> --}}
    </div>
    <div class="content-block box-body content-block-two card-body">
      <table id="full_detail_table" class="table table-hover">
        <thead>
          <tr class="table-heading-row">
            <th class="text-center">#</th>
            <th class="text-center">{{__('App Menu Name')}}</th>
            <th class="text-center">{{__('Status')}}</th>
          </tr>
        </thead>
        @if ($appUiShorting)
          <tbody id="sortable">
            @foreach ($appUiShorting as $key => $aus)

            <tr class="sortable row1" data-id="{{ $aus->id }}">
                <td class="text-center">{{$key+1}}</td>
                <td class="text-center">{{$aus->name}}</td>
                <td class="text-center">
                    <form action="{{ Route('appmenustatus',$aus->id) }}" method="POST">
                      {{ csrf_field() }}
                    @if($aus->is_active == '1')
                    <input type="hidden" value="0" name="is_active">
                    <button type="submit" class="btn btn-sm btn-success">{{__('Active')}}</button>
                    @else
                    <input type="hidden" value="1" name="is_active">
                    <button type="submit" class="btn btn-sm btn-danger">{{__('Deactive')}}</button>
                    @endif
                    </form>
                </td>
              </tr>
              
              </div>

            @endforeach
          </tbody>
        @endif
      </table>
    </div>
  </div>
</div>
@endsection
@section('custom-script')
<script>
    $(function() {
      $('#cb3').change(function() {
        $('#is_active').val(+ $(this).prop('checked'))
      })
    })
  </script>
  <script>
 
 var sorturl = {!!json_encode(route('app_ui_reposition'))!!};

</script>
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


 $( "#full_detail_table" ).sortable({
   items: "tr",
   cursor: 'move',
   opacity: 0.6,
   update: function() {
       sendOrderToServer();
   }
 });

 function sendOrderToServer() {
   var order = [];
   var token = $('meta[name="csrf-token"]').attr('content');
   $('tr.row1').each(function(index,element) {
     order.push({
       id: $(this).attr('data-id'),
       position: index+1
     });
   });
   $.ajax({
     type: "POST", 
     dataType: "json", 
     url: sorturl,
     data: {
         order: order,
       _token: token
     },
     success: function(response) {
         if (response.status == "success") {
           console.log(response);
         } else {
           console.log(response);
         }
     }
   });
 }
    
</script>
@endsection