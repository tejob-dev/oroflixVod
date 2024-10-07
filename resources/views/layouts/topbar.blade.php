<!-- Start Topbar Mobile -->
<div class="topbar-mobile">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="mobile-logobar">
                <a href="{{ url('/') }}" class="mobile-logo"><img src="{{url('images/logo/'.$logo)}}" class="img-fluid" alt="logo"></a>
            </div>
            <div class="mobile-togglebar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <div class="topbar-toggle-icon">
                            <a class="topbar-toggle-hamburger" href="javascript:void();">
                                <img src="{{ url('assets/images/svg-icon/horizontal.svg') }}" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                <img src="{{ url('assets/images/svg-icon/verticle.svg') }}" class="img-fluid menu-hamburger-vertical" alt="verticle">
                             </a>
                         </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="menubar">
                            <a class="menu-hamburger" href="javascript:void();">
                                <img src="{{ url('assets/images/svg-icon/menu.svg') }}" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                <img src="{{ url('assets/images/svg-icon/close.svg') }}" class="img-fluid menu-hamburger-close" alt="close">
                             </a>
                         </div>
                    </li>                                
                </ul>
            </div>
        </div>
    </div>
</div>
@php
$nav_menus=App\Menu::all();
@endphp
<!-- Start Topbar -->
<div class="topbar">
    <!-- Start row -->
    <div class="row align-items-center">
        <!-- Start col -->
        <div class="col-md-12 align-self-center">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="togglebar">
                        @yield('breadcum')
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="infobar">
                        <ul>
                            <li class="list-inline-item">
                                <div class="languagebar">
                                    @if (isset($nav_menus) && count($nav_menus) > 0)
                                    <a href="{{isset($nav_menus[0]) ? route('home', $nav_menus[0]->slug) : '#'}}" target="_blank"><span class="live-icon">{{ __('Visit Site') }}</span>&nbsp;<i class="feather icon-external-link" aria-hidden="true"></i></a>   
                                    @else
                                    <a data-toggle="modal" data-target="#myModal"><span class="live-icon" >{{ __('Visit Site')}}</span>&nbsp;<i class="feather icon-external-link" aria-hidden="true"></i></a>
                                    @endif
                                </div>                                 
                            </li>
                            <li class="mt-2 mr-2 list-inline-item">        
                                <a href="#" class="menu-tigger infobar-icon"><img src="{{ url('assets/images/svg-icon/ai.png')}}" class="img-fluid"><span>{{ __('Ai Tool') }}</span></a>
                                @include('admin.openai.topbar')

                            </li>
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Delete Account Request
</button> --}}

                            
                            <li class="list-inline-item">
                                <div class="languagebar">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="live-icon">{{Session::has('changed_language') ? Session::get('changed_language') : ''}}</span><span class="feather icon-chevron-down live-icon"></span></a>
                                        <div class="dropdown-menu animated flipInX" aria-labelledby="languagelink">
                                            @if (isset($lang) && count($lang) > 0)
                                            @foreach ($lang as $language)
                                            <a class="dropdown-item" href="{{ route('languageSwitch', $language->local) }}">
                                                <i class="feather icon-globe"></i>
                                                {{$language->name}} ({{$language->local}})</a>
                                            @endforeach
                                            @endif
                                        
                                        </div>
                                    </div>
                                </div>                                   
                            </li>
                            <li class="list-inline-item">
                                <div class="profilebar">
                                    <div class="dropdown">
                                        @if(Auth::user()->image == NULL)
                                            <a class="dropdown-toggle" href="javascript:void();" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{ url('assets/images/users/profile.svg') }}" class="img-fluid" alt="profile"><span class="live-icon">{{Auth::user()->name}}</span><span class="feather icon-chevron-down live-icon"></span></a>
                                        @else
                                            <a class="dropdown-toggle" href="javascript:void();" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{asset('images/users/' . Auth::user()->image)}}" class="img-fluid" alt="profile"><span class="live-icon">{{Auth::user()->name}}</span><span class="feather icon-chevron-down live-icon"></span></a>
                                        @endif
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                            <div class="dropdown-item">
                                                <div class="profilename">
                                                <h5>{{Auth::user()->name}}</h5>
                                                </div>
                                            </div>
                                            <div class="userbox">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="media dropdown-item">
                                                        <a href="{{url('admin/profile')}}" class="profile-icon"><img src="{{ url('assets/images/svg-icon/crm.svg') }}" class="img-fluid" alt="user">{{__('My Profile')}}</a>
                                                    </li>
                                                                                                
                                                    <li class="media dropdown-item">
                                                        <a href="{{ route('custom.logout') }}" class="profile-icon"  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><img src="{{ url('assets/images/svg-icon/logout.svg') }}" class="img-fluid" alt="logout">{{__('logout')}}</a>

                                                        <form id="logout-form" action="{{ route('custom.logout') }}" method="GET" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                   
                            </li>
                        </ul>
                    </div>
                </div>
            </div>            
        </div>
        <!-- End col -->
    </div> 
    <!-- End row -->
</div>
<div class="modal  fade show" id="myModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Visit Site</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            {{ __('Please Create minimum One menu to visit the site.')}}
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Close')}}</button>
            </div>
            
        </div>
    </div>
</div>
<!-- Modal -->


{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Account Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteForm" method="POST">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="deleteReason">Reason for Account Deletion:</label>
                        <textarea class="form-control" id="deleteReason" name="deleteReason" rows="4"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger request">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div id="successMessage" style="display: none;" class="alert alert-success"></div> --}}

@section('script')
@endsection
<!-- End Topbar -->
<!-- Start Breadcrumbbar -->                    
@yield('breadcum')
<!-- End Breadcrumbbar -->
