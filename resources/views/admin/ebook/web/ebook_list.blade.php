@extends('layouts.theme')
@section('title',__('Ebooks'))
@section('main-wrapper')
<div class="genre-prime-block blog-page">
  <div class="container-fluid">
    <h5 class="section-heading">{{__('All Ebook')}}</h5>
    <div class="">
    @foreach($ebooks as $key => $item)
     
      <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
        <div class="cus_img">
          <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside"
            data-pt-interactive="false" data-pt-title="#prime-next-item-description-block{{$item->id}}">

            <a href="{{ url('account/ebook/detail/'.$item->id)}}">
              <img data-src="{{ url('images/ebook/'.$item->thumbnali) }}" class="img-responsive lazy" alt="{{$item->title}}">
            
            </a>
          </div>
          @if(isset($protip) && $protip == 1)
          <div id="prime-next-item-description-block{{$item->id}}" class="prime-description-block">
            <div class="prime-description-under-block">
              <a href="{{ url('account/ebook/detail/'.$item->id)}}"><h5 class="description-heading">{{$item->title}}</h5></a>
              <ul class="description-list">
                <li><i class="fa fa-user"></i> {{$item->user->name}}</li>
              <li><i class="fa fa-clock-o"></i> {{date ('F d,Y',strtotime($item->created_at))}} </li>
              </ul>
              <div class="main-des">
                <p>{!! str_limit($item->detail,'150') !!}</p>
                <a href="{{ url('account/ebook/detail/'.$item->id)}}" target="_blank" type="button" >{{__('Read More')}}</a>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>


</div>
@endsection