@extends('layouts.theme')

@section('title', $liveevent->title)

@section('main-wrapper')
<section class="main-wrapper main-wrapper-single-movie-prime">
    <div class="background-main-poster-overlay">
        <div class="background-main-poster col-md-offset-4 col-md-6" style="background-image: url('{{ $liveevent->poster ? asset('images/events/posters/'.$liveevent->poster) : asset('images/default-poster.jpg') }}');"></div>
        <div class="overlay-bg gredient-overlay-right"></div>
        <div class="overlay-bg"></div>
    </div>
    <div id="full-movie-dtl-main-block" class="full-movie-dtl-main-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 small-screen-block">
                    <div class="full-movie-dtl-block">
                        <h2 class="section-heading">{{ $liveevent->title }}</h2></br>
                        <div class="">
                            <ul class="casting-headers">
                                <li>{{ __('Start Time') }} - <span class="events-count">{{ $liveevent->start_time ? date('M jS Y | h:i:s a', strtotime($liveevent->start_time)) : '-' }}</span></li><br/>
                                <li>{{ __('End Time') }} - <span class="events-count">{{ $liveevent->end_time ? date('M jS Y | h:i:s a', strtotime($liveevent->end_time)) : '-' }}</span></li></br>
                                <li>{{ __('Organized By') }} - <span class="events-count">{{ $liveevent->organized_by ?? '-' }}</span></li>
                            </ul>

                            <div id="wishlistelement" class="screen-play-btn-block">
                                @php
                                    date_default_timezone_set('Asia/Calcutta');
                                    $today_date = date('d jS Y | h:i:s');
                                    $start_date = date('d jS Y | h:i a', strtotime($liveevent->start_time));
                                    $end_date = date('d jS Y | h:i a', strtotime($liveevent->end_time));
                                @endphp
                                @if ($today_date >= $start_date && $today_date <= $end_date)
                                    @if ($liveevent->video_link['iframeurl'])
                                        @if (Auth::check() && Auth::user()->is_admin == '1')
                                            <a onclick="playoniframe('{{ $liveevent->iframeurl }}','{{ $liveevent->id }}','event')" class="btn btn-play play-btn-icon{{ $liveevent->id }}"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{ __('Play Now') }}</span></a>
                                        @else
                                            <a onclick="playoniframe('{{ $liveevent->iframeurl }}','{{ $liveevent->id }}','event')" class="btn btn-play play-btn-icon{{ $liveevent->id }}"><span class="play-btn-icon "><i class="fa fa-play"></i></span><span class="play-text">{{ __('Play Now') }}</span></a>
                                        @endif
                                    @else
                                        @if (Auth::check() && Auth::user()->is_admin == '1')
                                            <a href="{{ route('watchevent', $liveevent->id) }}" class="iframe btn btn-play play-btn-icon{{ $liveevent->id }}"><span class="play-btn-icon"><i class="fa fa-play"></i></span> <span class="play-text">{{ __('Play Now') }}</span></a>
                                        @else
                                            <a href="{{ url('/watch/event/'.$liveevent->id) }}" class="iframe btn btn-play play-btn-icon{{ $liveevent->id }}"><span class="play-btn-icon "><i class="fa fa-play"></i> <span class="play-text">{{ __('Play Now') }}</span></a>
                                        @endif
                                    @endif
                                @endif
                            </div>
                        </div>
                        <p>{{ $liveevent->description }}</p>
                    </div>
                </div>
                <div class="col-md-4 small-screen-block">
                    <div class="poster-thumbnail-block">
                        <img src="{{ $liveevent->thumbnail ? asset('images/events/thumbnails/'.$liveevent->thumbnail) : asset('images/default-thumbnail.jpg') }}" class="img-responsive" alt="genre-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-script')
<script>
    $(document).ready(function(){
        // Your existing JavaScript code here...
    });
</script>
@endsection