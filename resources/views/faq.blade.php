@extends('layouts.theme')
@section('title', __("FAQ's"))
@section('main-wrapper')
<div class="breadcrumb-main-block" style="background-image: url('images/b-2.jpg')">
    <div class="overlay-bg"></div>
    <div class="container-fluid">
      <div class="row">
        <h4 class="heading">Faq</h4>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page">Faq</li>
        </ol>
      </div>
    </div>
  </div>
<section id="main-wrapper" class="main-wrapper home-page user-account-section">
    <div class="container-fluid faq-main-block">
    <h4 class="heading">{{ __('Frequently Asked Questions') }}</h4>
    <ul class="bradcump">
        <li><a href="{{ url('account') }}">{{ __('Dashboard') }}</a></li>
        <li>/</li>
        <li>{{ __('FAQs') }}</li>
    </ul>
    <div class="panel-setting-main-block">
        <div id="accordion" class="myaccordion">
            @if(isset($faqs))
                @foreach($faqs as $key => $faq)
                    <div class="card">
                        <div class="card-header" id="heading{{$key}}">
                            <div class="mb-0">
                                <button class="accordion-button btn btn-link" 
                                        data-toggle="collapse"
                                        data-target="#collapse{{$key}}" 
                                        aria-expanded="@if($key === 0) true @else false @endif" 
                                        aria-controls="collapse{{$key}}">
                                    <i class="fa fa-plus"></i><i class="fa fa-minus"></i> {{$faq->question}}
                                </button>
                            </div>
                        </div>
                        <div id="collapse{{$key}}" 
                             class="collapse @if($key === 0) show @endif" 
                             aria-labelledby="heading{{$key}}"
                             data-parent="#accordion">
                            <div class="card-body">
                                {{$faq->answer}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Close all collapse elements except the first one by default
       // $('.collapse').not(':first').collapse('hide');
        
        $('.accordion-button').click(function() {
            // Get the target collapse element
            var target = $(this).data('target');
            
            // Check if the clicked button is for the first item
            var isFirstItem = $(this).parent().parent().index() === 0;
            
            // Close all other open collapse elements except the current one
            $('.collapse').not(target).collapse('hide');
            
            // If the current collapse element is already open, close it as well
            if ($(target).hasClass('show')) {
                $(target).collapse('hide');
            } else {
                // Toggle the clicked collapse element
                $(target).collapse('show');
            }
            
            // If the clicked button is for the first item, close it
            if (isFirstItem) {
                $('.collapse:first').collapse('hide');
            }
        });
    });
</script>





</section>
@endsection