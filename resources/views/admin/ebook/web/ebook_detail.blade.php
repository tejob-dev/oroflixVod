@extends('layouts.theme')

@if(isset($data))
@section('custom-meta')

@section('title',$ebooks->title.' | ')
<link rel="canonical" href="{{ url()->full() }}"/>
<meta name="robots" content="all">
<meta property="og:title" content="{{$data->title}}"/>

@endsection

@endsection

@section('title',"$title")

@endif
@section('main-wrapper')
<!-- Modal -->
@include('modal.agemodal')
<!-- Modal -->
@include('modal.agewarning')
<!-- main wrapper -->
  <section class="main-wrapper main-wrapper-single-movie-prime">
    <div class="background-main-poster-overlay">
      @if(isset($ebook))
            @if($ebook->banner != null)
              <div class="background-main-poster" style="background-image: url('{{url('images/ebook/'.$ebook->banner)}}');">
            @else
              <div class="background-main-poster" style="background-image: url('{{url('images/default-poster.jpg')}}');">
            @endif
        @endif
      </div>
      <div class="overlay-bg gredient-overlay-right"></div>
      <div class="overlay-bg"></div>
    </div>
    <div id="full-movie-dtl-main-block" class="full-movie-dtl-main-block">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="full-movie-dtl-block">
                <h2 class="section-heading">{{$ebook->title}}
                </h2>
                <div class="imdb-ratings-block">
                  <ul>
                  <li>{{$ebook->publication}}</li>
                    <li>{{$ebook->edition}}</li>

                    <li><i title="views" class="fa fa-eye"></i></li>

                      <li class="share-btn-icon">
                        <button id="share"><i title="Share" class="fa fa-share-alt" aria-hidden="true"></i></button>

                        <div class="tooltip" id="tooltip">
                          <a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                          <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                          <a href=""><i class="fa fa-telegram" aria-hidden="true"></i></a>
                          <a href=""><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        </div>

                        <!-- <input type="checkbox" id="check">
                        <label for=""><i title="Share" class="fa fa-share-alt" aria-hidden="true"></i></label>
                        <div class="icons">
                          <a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
                          <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
                          <a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                          <a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div> -->
                        <!-- <i title="Share" class="fa fa-share-alt" aria-hidden="true"></i> -->

                      </li>
                  </ul>
                </div>
                

                <div id="wishlistelement" class="screen-play-btn-block ">
                
                        <a href="{{ url('images/ebook/all_file/'.$ebook->all_file)}}"class="btn btn-play iframe"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{__('Read Now')}}</span>
                        </a>
                          
                     
                      
                    <a href="{{ url('images/ebook/files/'.$ebook->files)}}" class="watch-trailer-btn iframe btn btn-default">{{__('Watch Preview')}}</a>
                  
                 
                 

              </div>
              </div>
              
            </div>
  
           
        </div>

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


 @endsection

@section('custom-script')

<script>
  function playoniframe(url,id,type){
    $(document).ready(function(){
    var SITEURL = '{{URL::to('')}}';
       $.ajax({
            type: "get",
            url: SITEURL + "/user/watchhistory/"+id+'/'+type,
            success: function (data) {
             console.log(data);
            },
            error: function (data) {
               console.log(data)
            }
        });
      });       
     $.colorbox({ href: url, width: '100%', height: '100%', iframe: true });
    }
 </script>
<script>
  $('#selectseason').on('change',function(){
    var get = $('#selectseason').val();
    @if(Auth::check() && getSubscription()->getData()->subscribed == true )
    window.location.href = '{{ url('show/detail/') }}/'+get;
    @else
     window.location.href = '{{ url('show/guest/detail/') }}/'+get;
    @endif
  });
</script>
      
<script>

  function myage(age){
    if (age==0) {
        $('#ageModal').modal('show'); 
    }else{
          $('#ageWarningModal').modal('show');
    }
  }
      
</script>
  

<script type="text/javascript">
  $('.download').on('click',function(){
   
   var id    =  $(this).data('id');
   $.ajax({
      type : 'GET',
      url :  '{{ route("updateclick") }}',
      dataType : 'json',
      data : {id : id},
      success : function(data){
          console.log(data);
      }
   });
  });
</script>

<script type="text/javascript">
  function addWish(id, type) {
    //   app.addToWishList(id, type);
    $.ajax({
        type: 'POST',
        url: '{{route('addtowishlist')}}',
        data: {"id": id, "type": type, "_token": "{{ csrf_token() }}"},
        success: function (data) {
            console.log(data);
        }
    });
    setTimeout(function() {
        $('.addwishlistbtn'+id+type).text(function(i, text){
          return text == "{{__('Add to Watchlist')}}" ? "{{ __('Remove from Watchlist') }}" : "{{__('Add to Watchlist')}}";
        });
      }, 100);
    }
  </script>
@endsection