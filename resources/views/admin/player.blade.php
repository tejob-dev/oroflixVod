<div id="myDiv2" style="margin:auto;" >
<!--  <div class="close-btn-block text-right">
   <a class="close-btn" onclick="pause()"></a>
 </div> -->

</div>

<ul id="playlists1" style="display:none;">
   <li data-source="playlist2" data-playlist-name="MY HTML PLAYLIST 1" data-thumbnail-path="">
     <p class="fwduvp-categories-title"><span class="fwduvp-header">Title: </span>My HTML playlist 1</p>
     <p class="fwduvp-categories-type"><span class="fwduvp-header">Type: </span>HTML</p>
     <p class="fwduvp-categories-description"><span class="fwduvp-header">Description: </span>Created using html elements, videos are loaded and played from the server.</p>
   </li>




</ul>

 <!--  HTML playlist -->
<ul id="playlist2" style="display:none;">



                 @if(isset($season->episodes))
                   @if(count($season->episodes) > 0)

         @foreach($season->episodes as $key => $episode)
            <?php
                  $poster_link = $season->tvseries['poster'];
                  $slink = \Illuminate\Support\Facades\DB::table('videolinks')->where([
                                                                     ['episode_id', '=', $episode->id],

                                                                    ])->first();


                                                                     ?>

   <li  data-thumb-source="{{asset('images/tvseries/thumbnails/'.$episode->seasons->thumbnail)}}" data-video-source="{{$slink->ready_url}}" data-poster-source="{{asset('images/tvseries/posters/'.$poster_link)}}" data-downloadable="yes">
     <div data-video-short-description="">
       <div>
         <p class="fwduvp-thumbnail-title">{{$key+1}}. {{$episode->title}}</p>
         <p class="fwduvp-thumbnail-description">{{$episode->detail}}</p>
       </div>
     </div>
     <div data-video-long-description="">
       <div>
         <p class="fwduvp-video-title">ROYAL 3D COVERFLOW</p>
         <p class="fwduvp-video-main-description">Each video can contain a detailed description, the description can be formatted with CSS as you like. The description window and description button can be disabled individually for each video or globally for all videos.</p>
         <p class="fwduvp-link">For more information about this please follow <a href="http://www.webdesign-flash.ro/p/royal-3d-coverflow/" target="_blank">this link</a></p>
       </div>
     </div>
     <div data-add-popup="">
     <p data-image-path="content/images/img.jpg" data-time-start="00:00:01" data-time-end="00:00:10" data-link="http://www.webdesign-flash.ro" data-target="_blank"></p>
       <p data-image-path="content/images/img2.jpg" data-time-start="00:00:11" data-time-end="00:00:20" data-link="http://www.google.com" data-target="_blank"></p>
       <p data-google-ad-client="ca-pub-9227170916808685" data-google-ad-slot="7711195609" data-google-ad-width=400 data-google-ad-height=100 data-time-start="00:00:21" data-time-end="00:00:30"></p>
       <p data-google-ad-client="ca-pub-9227170916808685" data-google-ad-slot="7711195609" data-google-ad-width=400 data-google-ad-height=300 data-time-start="00:00:31" data-time-end="00:00:40"></p>
     </div>
   </li>


         @endforeach

   @endif
 @endif






   </ul>

   @section('custom-script')
     <script type="text/javascript">
       function playTest(id,type)
       {
        var lightboxIntervalId;
      //openLightboxWhenPageReady();
      function openLightboxWhenPageReady(){
        clearInterval(lightboxIntervalId);
        if(window["player2"]){
          window["player2"].showLightbox();
        }else{
          lightboxIntervalId = setInterval(openLightboxWhenPageReady, 100);
        }
      };

       player2.play();
       $('#myDiv2').show();
       }
     </script>
     <script>
     FWDUVPUtils.onReady(function(){

      new FWDUVPlayer({   
          //main settings
          instanceName:"player2",
          parentId:"myDiv2",
          playlistsId:"playlists1",
          mainFolderPath:"http://localhost/nexthour/public/content",
          skinPath:"minimal_skin_dark",
          displayType:"lightbox",
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
          useResumeOnPlay:"yes",
          showPreloader:"yes",
          preloaderBackgroundColor:"#000000",
          preloaderFillColor:"#FFFFFF",
          addKeyboardSupport:"yes",
          autoScale:"yes",
          showButtonsToolTip:"yes", 
          stopVideoWhenPlayComplete:"no",
          playAfterVideoStop:"no",
          autoPlay:"yes",
          autoPlayText:"Click To Unmute",
          loop:"no",
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
          showLogo:"yes",
          logoPath:"",
          hideLogoWithController:"yes",
          logoPosition:"topRight",
          logoLink:"http://www.webdesign-flash.ro/",
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
          
          showShareButton:"yes",
          showEmbedButton:"yes",
          showChromecastButton:"yes",
          googleAnalyticsTrackingCode:"",
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
          mainBackgroundImagePath:"http://localhost/nexthour/public/content/minimal_skin_dark/main-background.png",
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

           registerAPI();
         });

         //Register API (an setInterval is required because the player is not available until the youtube API is loaded).
      //Register API (an setInterval is required because the player is not available until the youtube API is loaded).
      var registerAPIInterval;
      function registerAPI(){
        clearInterval(registerAPIInterval);
        if(window.player2){
          player2.addListener(FWDUVPlayer.READY, readyHandler);
          player2.addListener(FWDUVPlayer.ERROR, errorHandler);
          player2.addListener(FWDUVPlayer.PLAY, playHandler);
          player2.addListener(FWDUVPlayer.PAUSE, pauseHandler);
          player2.addListener(FWDUVPlayer.STOP, stopHandler);
          player2.addListener(FWDUVPlayer.UPDATE, updateHandler);
          player2.addListener(FWDUVPlayer.UPDATE_TIME, updateTimeHandler);
          player2.addListener(FWDUVPlayer.UPDATE_VIDEO_SOURCE, updateVideoSourceHandler);
          player2.addListener(FWDUVPlayer.UPDATE_POSTER_SOURCE, updatePosterSourceHandler);
          player2.addListener(FWDUVPlayer.START_TO_LOAD_PLAYLIST, startToLoadPlaylistHandler);
          player2.addListener(FWDUVPlayer.LOAD_PLAYLIST_COMPLETE, loadPlaylistCompleteHandler);
          player2.addListener(FWDUVPlayer.PLAY_COMPLETE, playCompleteHandler);
          player2.addListener(FWDUVPlayer.SAFE_TO_SCRUB, safeToScrubb);
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
        //console.log("API -- video source update: " + player2.getVideoSource());
      }

      function updatePosterSourceHandler(e){
        //console.log("API -- video source update: " + player2.getPosterSource());
      }
      
      function startToLoadPlaylistHandler(e){
        //console.log("API -- start to load playlist: " + player2.getCurCatId());
      }
      
      function loadPlaylistCompleteHandler(e){
        //console.log("API -- playlist load complete: " + player2.getCurCatId());
      }
      
      function playCompleteHandler(e){
        //console.log("API -- play complete");
      }
      

      //API methods examples
      function play(){
        player2.play();
      }

      function playNext(){
        player2.playNext();
      }

      function playPrev(){
        player2.playPrev();
      }

      function playShuffle(){
        player2.playShuffle();
      }
      
      function pause(){
        player2.pause();
      }

      function stop(){
        player2.stop();
      }

      function scrub(percent){
        player2.scrub(percent);
      }

      function setVolume(percent){
        player2.setVolume(percent);
      }
      
      function share(){
        player2.share();
      }
      
      function download(){
        player2.downloadVideo();
      }

      function goFullScreen(){
        player2.goFullScreen();
      }
      
      function loadThumbnailsPreview(){
        player2.setThumbnailPreviewSource('content/thumbnails.vtt');
      }
      
      function showPlaylist(){
        player2.hidePlaylist();
      }
      
      function hidePlaylist(){
        player2.showPlaylist();
      }
      
      function safeToScrubb(){
        //player2.scrubbAtTime("00:00:05")
      }

      function loadPlaylist(playlistId){
        player2.loadPlaylist(playlistId);
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
        player2.updateHEXColors(randomColor, "#FFFFFF");
        //$('.classicDarkThumbnailTitle').css('color',randomColor);
        
        $("head").append('<style type="text/css"></style>');
        var new_stylesheet = $("head").children(':last');
        new_stylesheet.html('.classicDarkThumbnailTitle, .minimialDarkBold, .fwdChangeColor{color:' + randomColor + ';}');
        
        $(".ytbChangeColor").css("color", randomColor);
      }
     </script>
   @endsection