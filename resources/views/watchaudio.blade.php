<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{{__('Watch mMvie')}} - {{ $audio->title }}</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1, maximum-scale=1 user-scalable=no" />
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<link rel="stylesheet" type="text/css"  href="{{url('content/global.css')}}"/>
	<?php
	$cpy = App\PlayerSetting::first();
	$text = $cpy->cpy_text;
	$app_url = config('app.url');
	?>
	<style>
		
		.UVPSubtitle
		{
			font-family:Arial !important;
			text-align:center !important;
			color:{{$cpy->subtitle_color}}!important;
			text-shadow: 0px 0px 1px #000000 !important;
			font-size:{{$cpy->subtitle_font_size}}px!important;
			line-height:{{$cpy->subtitle_font_size}}px!important;
		    font-weight:600 !important;
			margin:0px !important;
			padding:0px !important;
			margin-left:20px !important;
			margin-right:20px !important;
			margin-bottom:12px !important;
		}
	</style>
	

	<script type="text/javascript">
		var cpy = "<?= $text ?>";
		var app_url = "<?= $app_url ?>";
	</script>
	<script src="https://webdesign-flash.ro/p/uvp/js/FWDSI.js"></script>
	<script type="text/javascript" src="{{ asset('java/FWDUVPlayer.js') }}"></script>
      <script type="text/javascript">
	 $(document).ready(function(){
	 	var SITEURL = '{{URL::to('')}}';
	 	 setInterval(function(){
	 		
	 		var tt = FWDUVPlayer.instaces_ar.length;
			var audio_id='{{$audio->id}}';
			var user_id='{{Auth::check() ? Auth::user()->id : $user}}'
			 var video;
			

		for(var i=0; i<tt; i++){
			video = FWDUVPlayer.instaces_ar[i];

			
			}

	 		 
	 	},5000);
         
	
  });
</script>

	<!-- Setup video player-->
	<script type="text/javascript">
		FWDUVPUtils.onReady(function(){

			new FWDUVPlayer({		
					//main settings
					instanceName:"player1",
					parentId:"myDiv",
					playlistsId:"playlists",
					mainFolderPath:"{{url('content')}}",
					skinPath:"{{$cpy->skin}}",
					displayType:"fullscreen",
					initializeOnlyWhenVisible:"no",
					useVectorIcons:"yes",
					fillEntireVideoScreen:"no",
					fillEntireposterScreen:"yes",
					goFullScreenOnButtonPlay:"no",
					playsinline:"yes",
					privateVideoPassword:"428c841430ea18a70f7b06525d4b748a",
					youtubeAPIKey:"",
					useHEXColorsForSkin:"no",
					normalHEXButtonsColor:"#FF0000",
					useDeepLinking:"yes",
					googleAnalyticsMeasurementId:"G-842HPC3W6L",
					@if($cpy->is_resume ==1)
					useResumeOnPlay:"yes",
					@else
					useResumeOnPlay:"no",
					@endif
					showPreloader:"yes",
					preloaderBackgroundColor:"#000000",
					preloaderFillColor:"#FFFFFF",
					addKeyboardSupport:"yes",
					autoScale:"yes",
					showButtonsToolTip:"yes", 
					stopVideoWhenPlayComplete:"no",
					playAfterVideoStop:"no",
					@if($cpy->auto_play ==1)
					autoPlay:"yes",
					@else
					autoPlay:"no",
					@endif
					autoPlayText:"Click To Unmute",
					@if($cpy->loop_video ==1)
					loop:"yes",
					@else
					loop:"no",
					@endif
					shuffle:"no",
					showErrorInfo:"yes",
					maxWidth:980,
					maxHeight:552,
					buttonsToolTipHideDelay:1.5,
					volume:.03,
					rewindTime:10,
					backgroundColor:"#000000",
					videoBackgroundColor:"#000000",
					posterBackgroundColor:"#000000",
					buttonsToolTipFontColor:"#5a5a5a",
					//logo settings
					@if($cpy->logo_enable ==1)
					showLogo:"yes",
					@else
					showLogo:"no",
					@endif
					logoPath:"",
					hideLogoWithController:"yes",
					logoPosition:"topRight",
					logoLink:"{{ config('app.url') }}",
					logoTarget: '_blank',
					logoPath:"",
					logoMargins:10,
					//playlists/categories settings
					showPlaylistsSearchInput:"yes",
					usePlaylistsSelectBox:"yes",
					showPlaylistsButtonAndPlaylists:"yes",
					showPlaylistsByDefault:"no",
					thumbnailSelectedType:"opacity",
					startAtPlaylist:0,
					buttonsMargins:15,
					thumbnailMaxWidth:350, 
					thumbnailMaxHeight:350,
					horizontalSpaceBetweenThumbnails:40,
					verticalSpaceBetweenThumbnails:40,
					inputBackgroundColor:"#333333",
					inputColor:"#999999",
					//playlist settings
					showPlaylistButtonAndPlaylist:"yes",
					playlistPosition:"right",
					showPlaylistByDefault:"yes",
					showPlaylistName:"yes",
					showSearchInput:"yes",
					showLoopButton:"yes",
					showShuffleButton:"yes",
					showPlaylistOnFullScreen:"no",
					showNextAndPrevButtons:"yes",
					showThumbnail:"yes",
					showOnlyThumbnail:"no",
					forceDisableDownloadButtonForFolder:"yes",
					addMouseWheelSupport:"yes", 
					startAtRandomVideo:"no",
					stopAfterLastVideoHasPlayed:"no",
					addScrollOnMouseMove:"no",
					randomizePlaylist:'no',
					folderVideoLabel:"VIDEO ",
					playlistRightWidth:310,
					playlistBottomHeight:380,
					startAtVideo:0,
					maxPlaylistItems:50,
					thumbnailWidth:71,
					thumbnailHeight:71,
					spaceBetweenControllerAndPlaylist:1,
					spaceBetweenThumbnails:1,
					scrollbarOffestWidth:8,
					scollbarSpeedSensitivity:.5,
					playlistBackgroundColor:"#000000",
					playlistNameColor:"#FFFFFF",
					thumbnailNormalBackgroundColor:"#1b1b1b",
					thumbnailHoverBackgroundColor:"#313131",
					thumbnailDisabledBackgroundColor:"#272727",
					searchInputBackgroundColor:"#000000",
					searchInputColor:"#999999",
					youtubeAndFolderVideoTitleColor:"#FFFFFF",
					folderAudioSecondTitleColor:"#999999",
					youtubeOwnerColor:"#888888",
					youtubeDescriptionColor:"#888888",
					mainSelectorBackgroundSelectedColor:"#FFFFFF",
					mainSelectorTextNormalColor:"#FFFFFF",
					mainSelectorTextSelectedColor:"#000000",
					mainButtonBackgroundNormalColor:"#212021",
					mainButtonBackgroundSelectedColor:"#FFFFFF",
					mainButtonTextNormalColor:"#FFFFFF",
					mainButtonTextSelectedColor:"#000000",
					//controller settings
					showController:"yes",
					showControllerWhenVideoIsStopped:"yes",
					showNextAndPrevButtonsInController:"no",
					showRewindButton:"yes",
					showPlaybackRateButton:"yes",
					showVolumeButton:"yes",
					showTime:"yes",
					showAudioTracksButton:"yes",
					showQualityButton:"yes",
					showInfoButton:"yes",
					showDownloadButton:"yes",
					
					 @if($cpy->share_opt ==1)
					 showShareButton:"yes",
					 @else
					 showShareButton:"no",
					 @endif
					showEmbedButton:"yes",
					@if($cpy->chromecast ==1)
					showChromecastButton:"yes",
					@else
					showChromecastButton:"no",
					@endif
					@if(isset($cpy->player_google_analytics_id))
					googleAnalyticsTrackingCode:"{{$cpy->player_google_analytics_id}}",
					@else
					googleAnalyticsTrackingCode:"",
					@endif
					show360DegreeVideoVrButton:"yes",
					showFullScreenButton:"yes",
					disableVideoScrubber:"no",
					showScrubberWhenControllerIsHidden:"yes",
					showMainScrubberToolTipLabel:"yes",
					showDefaultControllerForVimeo:"yes",
					repeatBackground:"yes",
					controllerHeight:42,
					controllerHideDelay:3,
					startSpaceBetweenButtons:7,
					spaceBetweenButtons:8,
					scrubbersOffsetWidth:2,
					mainScrubberOffestTop:14,
					timeOffsetLeftWidth:5,
					timeOffsetRightWidth:3,
					timeOffsetTop:0,
					volumeScrubberHeight:80,
					volumeScrubberOfsetHeight:12,
					timeColor:"#888888",
					showYoutubeRelAndInfo:"no",
					youtubeQualityButtonNormalColor:"#888888",
					youtubeQualityButtonSelectedColor:"#FFFFFF",
					scrubbersToolTipLabelBackgroundColor:"#FFFFFF",
					scrubbersToolTipLabelFontColor:"#5a5a5a",
					//advertisement on pause window
					aopwTitle:"Advertisement",
					aopwWidth:400,
					aopwHeight:240,
					aopwBorderSize:6,
					aopwTitleColor:"#FFFFFF",
					//subtitle
					subtitlesOffLabel:"Subtitle off",
					//popup add windows
					showPopupAdsCloseButton:"yes",
					//embed window and info window
					embedAndInfoWindowCloseButtonMargins:15,
					borderColor:"#333333",
					mainLabelsColor:"#FFFFFF",
					secondaryLabelsColor:"#a1a1a1",
					shareAndEmbedTextColor:"#5a5a5a",
					inputBackgroundColor:"#000000",
					inputColor:"#FFFFFF",
					//login
		            playIfLoggedIn:"no",
		            playIfLoggedInMessage:"Please <a href='https://google.com' target='_blank'>login</a> to play this video.",
					//audio visualizer
					audioVisualizerLinesColor:"#0099FF",
					audioVisualizerCircleColor:"#FFFFFF",
					//lightbox settings
					closeLightBoxWhenPlayComplete:"no",
					lightBoxBackgroundOpacity:.6,
					lightBoxBackgroundColor:"#000000",
					//sticky on scroll
					stickyOnScroll:"no",
					stickyOnScrollShowOpener:"yes",
					stickyOnScrollWidth:"700",
					stickyOnScrollHeight:"394",
					//sticky display settings
					showOpener:"yes",
					showOpenerPlayPauseButton:"yes",
					verticalPosition:"bottom",
					horizontalPosition:"center",
					showPlayerByDefault:"yes",
					animatePlayer:"yes",
					openerAlignment:"right",
					mainBackgroundImagePath:"{{url('content/minimal_skin_dark/main-background.png')}}",
					openerEqulizerOffsetTop:-1,
					openerEqulizerOffsetLeft:3,
					offsetX:0,
					offsetY:0,
					//playback rate / speed
					defaultPlaybackRate:1, //0.25, 0.5, 1, 1.25, 1.2, 2
					//cuepoints
					executeCuepointsOnlyOnce:"no",
					//annotations
					showAnnotationsPositionTool:"no",
					//ads
					openNewPageAtTheEndOfTheAds:"no",
					playAdsOnlyOnce:"no",
					adsButtonsPosition:"right",
					skipToVideoText:"You can skip to video in: ",
					skipToVideoButtonText:"Skip Ad",
					adsTextNormalColor:"#888888",
					adsTextSelectedColor:"#FFFFFF",
					adsBorderNormalColor:"#666666",
					adsBorderSelectedColor:"#FFFFFF",
					//a to b loop
					useAToB:"yes",
					atbTimeBackgroundColor:"transparent",
					atbTimeTextColorNormal:"#888888",
					atbTimeTextColorSelected:"#FFFFFF",
					atbButtonTextNormalColor:"#888888",
					atbButtonTextSelectedColor:"#FFFFFF",
					atbButtonBackgroundNormalColor:"#FFFFFF",
					atbButtonBackgroundSelectedColor:"#000000",
					//thumbnails preview
					thumbnailsPreviewWidth:196,
					thumbnailsPreviewHeight:200,
					thumbnailsPreviewBackgroundColor:"#000000",
					thumbnailsPreviewBorderColor:"#666",
					thumbnailsPreviewLabelBackgroundColor:"#666",
					thumbnailsPreviewLabelFontColor:"#FFF",
					// context menu
					showContextmenu:'yes',
					showScriptDeveloper:"yes",
					contextMenuBackgroundColor:"#1f1f1f",
					contextMenuBorderColor:"#1f1f1f",
					contextMenuSpacerColor:"#333",
					contextMenuItemNormalColor:"#888888",
					contextMenuItemSelectedColor:"#FFFFFF",
					contextMenuItemDisabledColor:"#444",
					// fingerprint stamp
					useFingerPrintStamp:"yes",
					frequencyOfFingerPrintStamp:3000,
					durationOfFingerPrintStamp:100
			});


		});
			
	</script>
</head>

<body style="background-color:#999999; padding:0px; margin:0px;">	
	
	<div id="myDiv" style="position:relative; left:1000px; top:5000px;"></div>
	
	<!--  Playlists -->
	<ul id="playlists" style="display:none;">
		
		<li data-source="trailer"
		 data-playlist-name="{{ $audio->title }}" data-thumbnail-path="{{asset('images/audio/thumbnails/'.$audio->thumbnail)}}" >
			<p class="fwduvp-categories-title"><span class="fwduvp-header">Title: {{ $audio->title }}</span></p>
			<p class="fwduvp-categories-description"><span class="fwduvp-header">Description: </span>{{ $audio->detail }}</p>
		</li>



	</ul>

	<ul id="trailer">
		


   
       

		<li
		
		data-thumb-source="{{asset('images/audio/thumbnails/'.$audio->thumbnail)}}" 
		@if(isset($audio->audiourl) && $audio->audiourl !="")
		
		
		
		data-video-source="{{ ($audio->audiourl) }}"
		@else
		data-video-source="{{ url('audio/'.$audio->upload_audio) }}"
		@endif data-poster-source="{{asset('images/audio/posters/'.$audio->poster)}}"  data-downloadable="no"  @if(isset($pass) && $pass !=NULL) data-is-private="yes" data-private-video-password="{{ $pass }}" @endif> 
		
		

			<div data-video-short-description="">
				<p class="fwduvp-categories-title"><span class="fwduvp-header">{{__('Title')}}: </span>{{ $audio->title }}</p>
				<p class="fwduvp-categories-description"><span class="fwduvp-header">{{__('Description')}}: </span>{{ $audio->detail }}</p>
			</div>
			<div>
				<p class="fwduvp-thumbnail-title">{{__('title')}}: </span>{{ $audio->title }}</p>
				<p class="fwduvp-thumbnail-description">{{__('description')}}: </span>{{ $audio->detail }}</p>
			</div>

			@php
				$googleads = App\GoogleAds::get();
			@endphp
			@if($googleads->count()>0)
				@foreach($googleads as $gads)
					<div data-add-popup="">
						<p data-google-ad-client="{{$gads->google_ad_client}}" data-google-ad-slot="{{$gads->google_ad_slot}}" data-google-ad-width="{{$gads->google_ad_width}}" data-google-ad-height="{{$gads->google_ad_height}}" data-time-start="{{$gads->google_ad_starttime}}" data-time-end="{{$gads->google_ad_endtime}}"></p>
					</div>
				@endforeach
			@endif
			
		</li>
	</ul>

</body>
</html>