<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>{{__('Watch Episode')}} - {{ $episode->title }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1, maximum-scale=1 user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="{{url('content/global.css')}}" />
    <?php
    $cpy = App\PlayerSetting::first();
    $text = $cpy->cpy_text;
    $app_url = config('app.url');
    ?>
    <script type="text/javascript">
        var cpy = "<?= $text ?>";
        var app_url = "<?= $app_url ?>";
    </script>
	<script src="https://webdesign-flash.ro/p/uvp/js/FWDSI.js"></script>
    <script type="text/javascript" src="{{ asset('java/FWDUVPlayer.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var SITEURL = '{{URL::to('')}}';
            setInterval(function(){
                var tt = FWDUVPlayer.instaces_ar.length;
                var episode_id='{{$episode->id}}';
                var tv_id='{{$episode->seasons->tvseries->id}}';
                var user_id='{{Auth::check() ? Auth::user()->id : $user}}'
                var video;
                for(var i=0; i<tt; i++){
                    video = FWDUVPlayer.instaces_ar[i];
                    console.log(video);
                    $.ajax({
                        type: "get",
                        url: SITEURL + "/user/episode/time/"+video['curTime']+'/'+episode_id+'/'+user_id+'/'+tv_id +'/'+video['totalTime'],
                        success: function (data) {
                            console.log(data);
                        },
                        error: function (data) {
                            console.log(data)
                        }
                    });
                }
            },1000);
        });
    </script>
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

			var lightboxIntervalId;
			//openLightboxWhenPageReady();
			function openLightboxWhenPageReady(){
				clearInterval(lightboxIntervalId);
				if(window["player1"]){
					window["player1"].showLightbox();
				}else{
					lightboxIntervalId = setInterval(openLightboxWhenPageReady, 100);
				}
			};
			
			//Register API (an setInterval is required because the player is not available until the youtube API is loaded).
			var registerAPIInterval;
			function registerAPI(){
				clearInterval(registerAPIInterval);
				if(window.player1){
					player1.addListener(FWDUVPlayer.READY, readyHandler);
					player1.addListener(FWDUVPlayer.ERROR, errorHandler);
					player1.addListener(FWDUVPlayer.PLAY, playHandler);
					player1.addListener(FWDUVPlayer.PAUSE, pauseHandler);
					player1.addListener(FWDUVPlayer.STOP, stopHandler);
					player1.addListener(FWDUVPlayer.UPDATE, updateHandler);
					player1.addListener(FWDUVPlayer.UPDATE_TIME, updateTimeHandler);
					player1.addListener(FWDUVPlayer.UPDATE_VIDEO_SOURCE, updateVideoSourceHandler);
					player1.addListener(FWDUVPlayer.UPDATE_POSTER_SOURCE, updatePosterSourceHandler);
					player1.addListener(FWDUVPlayer.START_TO_LOAD_PLAYLIST, startToLoadPlaylistHandler);
					player1.addListener(FWDUVPlayer.LOAD_PLAYLIST_COMPLETE, loadPlaylistCompleteHandler);
					player1.addListener(FWDUVPlayer.PLAY_COMPLETE, playCompleteHandler);
					player1.addListener(FWDUVPlayer.SAFE_TO_SCRUB, safeToScrubb);
				}else{
					registerAPIInterval = setInterval(registerAPI, 100);
				}
			};

			//API event listeners examples
			function readyHandler(e){
				//console.log("API -- ready to use");
			}
			
			function errorHandler(e){
				console.log(e.error);
			}

			function playHandler(e){
				//console.log("API -- play");
			}

			function pauseHandler(e){
				//console.log("API -- pause");
			}

			function stopHandler(e){
				//console.log("API -- stop");
			}
			
			function updateHandler(e){
				//console.log("API -- update video, percent played: " + e.percent);
			}
			
			function updateTimeHandler(e){
				//console.log("API -- update time: " + e.currentTime + "/" + e.totalTime);
			}

			function updateVideoSourceHandler(e){
				//console.log("API -- video source update: " + player1.getVideoSource());
			}

			function updatePosterSourceHandler(e){
				//console.log("API -- video source update: " + player1.getPosterSource());
			}
			
			function startToLoadPlaylistHandler(e){
				//console.log("API -- start to load playlist: " + player1.getCurCatId());
			}
			
			function loadPlaylistCompleteHandler(e){
				//console.log("API -- playlist load complete: " + player1.getCurCatId());
			}
			
			function playCompleteHandler(e){
				//console.log("API -- play complete");
			}
			

			//API methods examples
			function play(){
				player1.play();
			}

			function playNext(){
				player1.playNext();
			}

			function playPrev(){
				player1.playPrev();
			}

			function playShuffle(){
				player1.playShuffle();
			}
			
			function pause(){
				player1.pause();
			}

			function stop(){
				player1.stop();
			}

			function scrub(percent){
				player1.scrub(percent);
			}

			function setVolume(percent){
				player1.setVolume(percent);
			}
			
			function share(){
				player1.share();
			}
			
			function download(){
				player1.downloadVideo();
			}

			function goFullScreen(){
				player1.goFullScreen();
			}
			
			function loadThumbnailsPreview(){
				player1.setThumbnailPreviewSource('content/thumbnails.vtt');
			}
			
			function showPlaylist(){
				player1.hidePlaylist();
			}
			
			function hidePlaylist(){
				player1.showPlaylist();
			}
			
			function safeToScrubb(){
				//player1.scrubbAtTime("00:00:05")
			}

			function loadPlaylist(playlistId){
				player1.loadPlaylist(playlistId);
			}
			
			function getRandomColor() {
				var letters = '0123456789ABCDEF';
				var color = '#';
				for (var i = 0; i < 6; i++ ) {
					color += letters[Math.floor(Math.random() * 16)];
				}
				return color;
			}
			
			function changeCanvasColors(){
				var randomColor = getRandomColor();
				player1.updateHEXColors(randomColor, "#FFFFFF");
				//$('.classicDarkThumbnailTitle').css('color',randomColor);
				
				$("head").append('<style type="text/css"></style>');
				var new_stylesheet = $("head").children(':last');
				new_stylesheet.html('.classicDarkThumbnailTitle, .fwduvp-header, .fwdChangeColor{color:' + randomColor + ';}');
				
				$(".ytbChangeColor").css("color", randomColor);
			}
		</script>
</head>
<body style="background-color:#999999; padding:0px; margin:0px;">  2
    <div id="myDiv" style="position:relative; left:1000px; top:5000px;"></div>
    <ul id="playlists" style="display:none;">
        <li data-source="episode" data-playlist-name="{{ $episode->seasons->tvseries->title }}" data-thumbnail-path="{{asset('images/tvseries/thumbnails/'.$episode->seasons->thumbnail)}}">
            <p class="fwduvp-categories-title"><span class="fwduvp-header">{{__('Title')}}: {{ $episode->seasons->title }}</span></p>
            <p class="fwduvp-categories-description"><span class="fwduvp-header">{{__('Description')}}: </span>{{ $episode->seasons->detail }}</p>
        </li>
    </ul>
    <ul id="episode">
        @php
        $pauseads = App\Ads::where('ad_location','=','onpause')->get();
        $pausead =  App\Ads::inRandomOrder()->where('ad_location','=','onpause')->first();
        $endtime='0';
        $user_id=Auth::check() ? Auth::user()->id : $user;
        $episode_id = $episode->id;
        $tv_id = $episode->seasons->tvseries->id;
        if($cpy->is_resume == 1){
            $filename = 'time.json';
            if(file_exists(storage_path() .'/app/time/tv/episode/'.$user_id.'/'.$episode_id.'/'.$filename)){
                $result = @file_get_contents(storage_path() .'/app/time/tv/episode/'.$user_id.'/'.$episode_id.'/'.$filename);
                $result = json_decode($result);
                $current_time = $result->current_time;
            }else{
                $current_time = '00:00:00';
            }
        }else{
            $current_time = '00:00:00';
        }
        @endphp
        @php
        $appconfig = \App\AppConfig::first();
        $config = \App\Config::first();
        @endphp
        <li @if($pauseads->count()>0 && (isset($remove_ads) && $remove_ads != 1)) data-advertisement-on-pause-source="{{ asset('adv_upload/image/'.$pausead->ad_image) }}" @endif data-thumb-source="{{asset('images/tvseries/thumbnails/'.$episode->seasons->thumbnail)}}" 
        @php
        $slink = \Illuminate\Support\Facades\DB::table('videolinks')->where([
            ['episode_id', '=', $episode->id],
        ])->first();
        @endphp
        @if(isset($slink->ready_url) && $slink->ready_url !="")
        @if($cpy->is_resume == 1 && isset($current_time) && $current_time != NULL) data-start-at-time="{{date('H:i:s',strtotime($current_time))}}" @endif
        data-video-source="{{ $slink->ready_url }}"
        @else
        @if($cpy->is_resume == 1 && isset($current_time) && $current_time != NULL) data-start-at-time="{{date('H:i:s',strtotime($current_time))}}" @endif
        data-video-source="[<?php if(isset($slink->url_360) && $slink->url_360 !=""){ ?>{source:'{{ $slink->url_360 }}', label:'360p'}, <?php } ?> <?php if(isset($slink->url_480) && $slink->url_480 !=""){ ?>{source:'{{ $slink->url_480 }}', label:'480p'}, <?php } ?> <?php if(isset($slink->url_720) && $slink->url_720 !=""){?>{source:'{{ $slink->url_720 }}', label:'hd720'}, <?php } ?> <?php if(isset($slink->url_1080) && $slink->url_1080 !=""){?> {source:'{{ $slink->url_1080 }}', label:'hd1080'}, <?php } ?>]" @endif data-poster-source="{{asset('images/tvseries/posters/'.$episode->seasons->tvseries->poster)}}" data-subtitle-soruce="[
					  		@foreach($movie->subtitles as $sub)
					  		{source:'{{ url('subtitles/'.$sub->sub_t) }}', label:'{{ $sub->sub_lang }}'},
					  		@endforeach
					  		]" data-start-at-subtitle="1" data-downloadable="yes"> 
        <div data-video-short-description="">
            <p class="fwduvp-categories-title"><span class="fwduvp-header">Title: </span>{{ $episode->title }}</p>
            <p class="fwduvp-categories-description"><span class="fwduvp-header">Description: </span>{{ $episode->detail }}</p>
        </div>
        @php
        $popupads = App\Ads::where('ad_location','=', 'popup')->get();
        $popupad = App\Ads::inRandomOrder()->where('ad_location','=','popup')->first();    
        @endphp
        @if($popupads->count()>0)
        <div data-add-popup="">
            <p data-image-path="{{ asset('adv_upload/image/'.$popupad->ad_image) }}" data-time-start="{{ $popupad->time }}" data-time-end="{{ $popupad->endtime }}" data-link="{{ $popupad->ad_target }}" data-target="_blank"></p>
        </div>
        @endif
        @if(isset($remove_ads) && $remove_ads != 1)
        @php
        $skipads = App\Ads::where('ad_location','=', 'skip')->get();
        $skipad = App\Ads::inRandomOrder()->where('ad_location','=','skip')->first();
        @endphp
        @if($skipads->count()>0)
        <ul data-ads="">
            <li @if($skipad->ad_video !="no") data-source="{{ asset('adv_upload/video/'.$skipad->ad_video) }}" @else data-source="{{ $skipad->ad_url }}" @endif data-time-start="{{ $skipad->time }}" data-time-to-hold-ads="{{ $skipad->ad_hold }}" data-thumbnail-source="{{asset('images/tvseries/thumbnails/'.$season->thumbnail)}}" data-link="{{ $skipad->ad_target }}" data-target="_blank"></li>
        </ul>
        @endif
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
        @endif
    </li>
</ul>
</body>
</html>