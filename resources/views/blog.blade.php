@extends('layouts.theme')
@section('title', __('Our Blogs'))
@section('main-wrapper')
<div class="breadcrumb-main-block" style="background-image: url('{{ asset('images/b-2.jpg') }}')">
  <div class="overlay-bg"></div>
  <div class="container-fluid">
    <div class="row">
      <h4 class="heading">Blog</h4>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Blog</li>
      </ol>
    </div>
  </div>
</div>
<div class="genre-prime-block blog-page">
  <div class="container-fluid">
    <h5 class="section-heading">{{__('All Blogs')}}</h5>
    <div class="row">
      @if(isset($blogs))
      @foreach($blogs as $item)
      @php
        $imagePath = $item->image ? 'images/blog/' . $item->image : 'images/default-thumbnail.jpg';
        $imageData = base64_encode(@file_get_contents($imagePath));
        $src = $imageData ? 'data: ' . mime_content_type($imagePath) . ';base64,' . $imageData : null;
      @endphp
     
      <div class="col-lg-3 col-md-3 col-xs-6 col-sm-4">
        <div class="cus_img">
          <div class="genre-slide-image home-prime-slider protip" data-pt-placement="outside"
            data-pt-interactive="false" data-pt-title="#prime-next-item-description-block{{$item->id}}">

            <a href="{{url('account/blog/'.$item->slug)}}">
              @if(isset($src))
              <img data-src="{{ $src }}" class="img-responsive lazy" alt="{{$item->title}}">
              @endif
              <div class="overlay-bg"></div>
            </a>
            <div class="blog-text">
              <h4>{{$item->title}}</h4>
            </div>
          </div>
          @if(isset($protip) && $protip == 1)
          <div id="prime-next-item-description-block{{$item->id}}" class="prime-description-block">
            <div class="prime-description-under-block">
              <a href="{{url('account/blog/'.$item->slug)}}"><h5 class="description-heading">{{$item->title}}</h5></a>
              <ul class="description-list">
                <li><i class="fa fa-user"></i> {{$item->users->name}}</li>
                <li><i class="fa fa-clock-o"></i> {{date('F d, Y', strtotime($item->created_at))}} </li>
              </ul>
              <div class="main-des">
                <p>{!! str_limit($item->detail, '150') !!}</p>
                <a href="{{url('account/blog/'.$item->slug)}}">{{__('Read More')}}</a>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</div>
@endsection