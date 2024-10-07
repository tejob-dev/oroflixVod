@if(isset($audio) && count($audio) > 0)
<div class="genre-prime-block">
  <div class="container-fluid">
    <h5 class="section-heading">Audio</h5>
    <div class="genre-prime-slider owl-carousel">
      @foreach($audio as $audios)
      @php
        $audioUrl = $auth && getSubscription()->getData()->subscribed ? url('audio/detail/'.$audios->id) : url('audio/guest/detail/'.$audios->id);
        $thumbnail = $audios->thumbnail ? asset('images/audio/thumbnails/'.$audios->thumbnail) : asset('images/default-thumbnail.jpg');
      @endphp

      <div class="genre-prime-slide">
        <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-title="#prime-mix-description-block-blog{{$audios->id}}">
          <a href="{{ $audioUrl }}">
            <img data-src="{{ $thumbnail }}" class="img-responsive owl-lazy" alt="audio-image">
          </a>
        </div>
        <div id="prime-mix-description-block-blog{{$audios->id}}" class="prime-description-block">
          <h5 class="description-heading">{{$audios['title']}}</h5>
          <div class="main-des">
            <p>{!! str_limit($audios->detail, 100) !!}</p>
          </div>
        </div>
      </div>

      @endforeach
    </div>
  </div>
</div>
@endif