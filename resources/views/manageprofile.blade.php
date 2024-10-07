@extends('layouts.theme')
@section('title',__('Manage Profile'))
@section('main-wrapper')

	<div class="container">
		<div class="manage-profile">
			<br>
			<div class="text-center">
				<h4>{{__('hey')}} {{ Auth::user()->name }} {{__('Select Personal Profile')}} {{ config('app.name') }}:</h4>
			</div>
			@if(!isset($result))
			 	<p>{{__('no profile available')}}</p>
			@endif
			<div align="center"><p id="msg"></p></div>
				<form action="{{ route('mus.pro.update',Auth::user()->id) }}" method="POST">
					<div class="row">
						<div class="col-md-6 col-md-offset-3"> 
							{{ csrf_field() }}			
							@if(isset($result->screen1))
								<div class="col-md-3 col-sm-4 col-xs-6 ">
									<div class="btm-20 manage-profile-block">
										<img class="imageprofile @if(Session::has('nickname')) {{ Session::get('nickname') == $result->screen1 ? "imgactive" : "" }} @endif" @if($result->screen_1_used == 'NO') onclick="changescreen('{{ $result->screen1 }}','{{ 1 }}')" @endif title="{{ $result->screen1 }}" src="{{ Avatar::create($result->screen1)->toBase64() }}" alt="">
								
									@if($result->screen_1_used != '' && $result->screen_1_used == 'YES')
										<br><br>
										<input class="screen2 form-control" name="screen1" type="text" value="{{ $result->screen1 }}" disabled>
										<div class="text-center">
											<br>
											<span class="label label-success">{{ __('Currently Active') }}</span>
										</div>
										@elseif($result->screen_1_used == 'NO')
										<br><br>
										<input class="screen2 form-control" name="screen1" type="text" value="{{ $result->screen1 }}" disabled>
										@else					
										<div class="text-center">
											<br>
											<span class="label label-success">{{ __('In-use') }}</span>
										</div>				
									@endif
									</div>
								</div>
							@endif
							@if(isset($result->screen2))
								<div class="col-md-3 col-sm-4 col-xs-6">
									<div class="btm-20 manage-profile-block">
										<img class="img-fluid imageprofile @if(Session::has('nickname')) {{ Session::get('nickname') == $result->screen2 ? "imgactive" : "" }} @endif" @if($result->screen_2_used == 'NO') onclick="changescreen('{{ $result->screen2 }}','{{ 2 }}')" @endif title="{{ $result->screen2 }}" src="{{ Avatar::create($result->screen2)->toBase64() }}" alt="{{ $result->screen2 }}" >
								
									@if($result->screen_2_used != '' && $result->screen_2_used == 'YES')
										<br><br>
										<input class="screen2 form-control" name="screen2" type="text" value="{{ $result->screen2 }}" disabled>
										<div class="text-center">
											<br>
											<span class="label label-success">{{ __('Currently Active') }}</span>
										</div>
										@elseif($result->screen_2_used == 'NO')
										<br><br>
										<input class="screen2 form-control" name="screen2" type="text" value="{{ $result->screen2 }}" disabled>
										@else
										<div class="text-center">
											<br>
											<span class="label label-success">{{ __('In-use') }}</span>
										</div>
									@endif				
									</div>
								</div>
							@endif
							@if(isset($result->screen3))
								<div class="col-md-3 col-sm-4 col-xs-6">
									<div class="btm-20 manage-profile-block">
										<img class="imageprofile @if(Session::has('nickname')) {{ Session::get('nickname') == $result->screen3 ? "imgactive" : "" }} @endif" @if($result->screen_3_used == 'NO') onclick="changescreen('{{ $result->screen3 }}','{{ 3 }}')" @endif title="{{ $result->screen3 }}" src="{{ Avatar::create($result->screen3)->toBase64() }}" alt="{{ $result->screen3 }}">
									@if($result->screen_3_used != '' && $result->screen_3_used == 'YES')
										<br><br>
										<input class="screen2 form-control" name="screen3" type="text" value="{{ $result->screen3 }}" disabled>
										<div class="text-center">
											<br>
											<span class="label label-success">{{ __('Currently Active') }}</span>
										</div>
										@elseif($result->screen_3_used == 'NO')
										<br><br>
										<input class="screen2 form-control" name="screen3" type="text" value="{{ $result->screen3 }}" disabled>
										@else
										<div class="text-center">
											<br>
											<span class="label label-success">{{ __('In-use') }}</span>
										</div>
									@endif
									</div>
								</div>
							@endif
							@if(isset($result->screen4))
								<div class="col-md-3 col-sm-4 col-xs-6">
									<div class="btm-20 manage-profile-block">
										<img class="imageprofile @if(Session::has('nickname')) {{ Session::get('nickname') == $result->screen4 ? "imgactive" : "" }} @endif" @if($result->screen_4_used == 'NO') onclick="changescreen('{{ $result->screen4 }}','{{ 4 }}')" @endif title="{{ $result->screen4 }}" src="{{ Avatar::create($result->screen4)->toBase64() }}" alt="{{ $result->screen4 }}">
									@if($result->screen_4_used != '' && $result->screen_4_used == 'YES')
										<br><br>
										<input class="screen2 form-control" name="screen4" type="text" value="{{ $result->screen4 }}" disabled>
										<div class="text-center">
											<br>
											<span class="label label-success">{{ __('currently active') }}</span>
										</div>
										@elseif($result->screen_4_used == 'NO')
										<br><br>
										<input class="screen2 form-control" name="screen4" type="text" value="{{ $result->screen4 }}" disabled>
										@else
										<div class="text-center">
											<br>
											<span class="label label-success">{{ __('In use') }}</span>
										</div>
									@endif
									</div>
								</div>
							@endif		
						</div>
					</div>
				</form>
				<div class="manage-profile-btn text-center">
				<a href="{{ route('mep',Auth::user()->id) }}" class="btn btn-success">{{__('Edit Profile Names')}}</a>
				</div>
			</div>
			
		</div>
	</div>

@endsection

@section('custom-script')
	<script>
		function changescreen(screen,count){

			$.ajax({
				type : 'GET',
				data : {screen : screen, count : count},
				url  : '{{ url('/changescreen/'.Auth::user()->id) }}',
				success : function(data){
					console.log(baseurl);
					$('#msg').html(data);
					setTimeout(function(){ 
						$(location).attr('href',baseurl)
					}, 700);


				}
			});
		}
	</script>
@endsection