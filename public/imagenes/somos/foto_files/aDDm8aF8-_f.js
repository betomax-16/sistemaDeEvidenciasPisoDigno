if (self.CavalryLogger) { CavalryLogger.start_js(["av1wl"]); }

__d('UFIFeedbackContext.react',['React','UFICentralUpdates','UFIFeedbackTargets'],(function a(b,c,d,e,f,g){'use strict';var h,i,j=c('React').PropTypes;h=babelHelpers.inherits(k,c('React').Component);i=h&&h.prototype;function k(){var l,m;for(var n=arguments.length,o=Array(n),p=0;p<n;p++)o[p]=arguments[p];return m=(l=i.constructor).call.apply(l,[this].concat(o)),this.$UFIFeedbackContext1=null,this.state={contextArgs:this.props.contextArgs,feedback:null},m;}k.prototype.loadFeedbackTarget=function(l){if(!this.$UFIFeedbackContext1)this.$UFIFeedbackContext1=c('UFIFeedbackTargets').getFeedbackTarget(l,function(m){this.$UFIFeedbackContext1=null;this.setState({feedback:m});}.bind(this));};k.prototype.componentDidMount=function(){this.loadFeedbackTarget(this.state.contextArgs.ftentidentifier);this.ufiCentralUpdatesSubscriptions=[c('UFICentralUpdates').subscribe('feedback-updated',function(l,m){var n=this.state.contextArgs;if(n.ftentidentifier in m.updates)this.loadFeedbackTarget(n.ftentidentifier);}.bind(this))];};k.prototype.componentWillUnmount=function(){this.ufiCentralUpdatesSubscriptions.forEach(function(l){return l&&c('UFICentralUpdates').unsubscribe(l);});if(this.$UFIFeedbackContext1)c('UFIFeedbackTargets').unsubscribe(this.$UFIFeedbackContext1);};k.prototype.render=function(){if(this.state.feedback)return this.props.render(this.state.contextArgs,this.state.feedback);return null;};k.propTypes={contextArgs:j.object.isRequired,render:j.func.isRequired};k.contextTypes={stores:j.object};f.exports=k;}),null);
__d('UFIReactionsStandalone.react',['React','UFICentralUpdates','UFIConstants','UFIDispatcher','UFIDispatcherContext.react','UFIFeedbackContext.react','UFIReactionsLinkImpl.react','UFIReactionStore'],(function a(b,c,d,e,f,g){'use strict';var h,i;h=babelHelpers.inherits(j,c('React').Component);i=h&&h.prototype;j.prototype.componentWillMount=function(){this.$UFIReactionsStandalone1=new (c('UFIDispatcher'))();this.$UFIReactionsStandalone2={UFIReactionStore:new (c('UFIReactionStore'))(this.$UFIReactionsStandalone1)};c('UFICentralUpdates').handleUpdate(c('UFIConstants').UFIPayloadSourceType.INITIAL_SERVER,this.props.payload);};j.prototype.componentWillUnmount=function(){this.$UFIReactionsStandalone2={};this.$UFIReactionsStandalone1=null;};j.prototype.render=function(){return (c('React').createElement(c('UFIDispatcherContext.react'),{dispatcher:this.$UFIReactionsStandalone1,stores:this.$UFIReactionsStandalone2},c('React').createElement(c('UFIFeedbackContext.react'),{contextArgs:this.props.contextArgs,render:function k(l,m){return (c('React').createElement(c('UFIReactionsLinkImpl.react'),{contextArgs:l,nuxConfig:l.reactionsNuxConfig,reaction:m.viewerreaction,supportedReactions:m.supportedreactions}));}})));};function j(){h.apply(this,arguments);}f.exports=j;}),null);
__d('VideoScrubberPreviewComponent',['Map'],(function a(b,c,d,e,f,g){function h(i,j){'use strict';if(!j)throw new Error('VideoScrubberPreview Component config null.');this.$VideoScrubberPreviewComponent4=j;this.$VideoScrubberPreviewComponent5=i;this.$VideoScrubberPreviewComponent2=j.hasPreviewThumbnails;this.$VideoScrubberPreviewComponent3=h.getSpriteURIs(j.spriteIndexToURIMap);this.$VideoScrubberPreviewComponent6();}h.prototype.hasPreviewThumbnails=function(){'use strict';return this.$VideoScrubberPreviewComponent2;};h.prototype.$VideoScrubberPreviewComponent6=function(){'use strict';this.$VideoScrubberPreviewComponent5.registerOption('VideoScrubberPreviewComponent','scrubberPreviewSprites',this.getSprites.bind(this));this.$VideoScrubberPreviewComponent5.registerOption('VideoScrubberPreviewComponent','hasPreviewThumbnails',this.hasPreviewThumbnails.bind(this));this.$VideoScrubberPreviewComponent5.registerOption('VideoScrubberPreviewComponent','previewThumbnailInformation',this.getPreviewThumbnailInformation.bind(this));};h.prototype.getSprites=function(){'use strict';return this.$VideoScrubberPreviewComponent3;};h.prototype.getPreviewThumbnailInformation=function(){'use strict';if(this.hasPreviewThumbnails()){this.$VideoScrubberPreviewComponent4.imagesPerColumn=this.$VideoScrubberPreviewComponent4.maxImagesPerSprite/this.$VideoScrubberPreviewComponent4.imagesPerRow;}else this.$VideoScrubberPreviewComponent4.imagesPerColumn=0;return this.$VideoScrubberPreviewComponent4;};h.getSpriteURIs=function(i){'use strict';var j=new (c('Map'))();for(var k in i)if(i.hasOwnProperty(k))j.set(parseInt(k,10),i[k]);return j;};f.exports=h;}),null);
__d('VideoWithFallbackMode',['VideoPlayerLoggerEvent','VideoPlayerLoggerFallbackReasons','VideoPlayerReason'],(function a(b,c,d,e,f,g){function h(i,j){'use strict';this.$VideoWithFallbackMode1=i;if(this.$VideoWithFallbackMode1.isImplementationUnavailable()||this.$VideoWithFallbackMode1.getOption('SphericalVideoPlayer','isUnavailable')){this.$VideoWithFallbackMode2(c('VideoPlayerLoggerFallbackReasons').FLASH_UNAVAILABLE);return;}i.addListener('error',this.$VideoWithFallbackMode3.bind(this));if(j.fallbackTimeoutMs){var k=j.fallbackTimeoutMs;setTimeout(function(){if(this.$VideoWithFallbackMode1.isState('loading')){this.$VideoWithFallbackMode1.pause(c('VideoPlayerReason').FALLBACK_MODE);this.$VideoWithFallbackMode2(c('VideoPlayerLoggerFallbackReasons').TIMEOUT);}}.bind(this),k);}}h.prototype.$VideoWithFallbackMode3=function(){'use strict';if(this.$VideoWithFallbackMode1.isState('fallback'))return;if(this.$VideoWithFallbackMode1.isState('playing'))this.$VideoWithFallbackMode1.pause(c('VideoPlayerReason').FALLBACK_MODE);this.$VideoWithFallbackMode1.abortLoading();this.$VideoWithFallbackMode2(c('VideoPlayerLoggerFallbackReasons').FLASH_ERROR);};h.prototype.$VideoWithFallbackMode2=function(i){'use strict';this.$VideoWithFallbackMode1.setState('fallback');this.$VideoWithFallbackMode1.logEvent(c('VideoPlayerLoggerEvent').ENTERED_FALLBACK,{debug_reason:i});};f.exports=h;}),null);
__d('VideoWithFluentUFISupport',['UFIVideoPlayerRegistry'],(function a(b,c,d,e,f,g){function h(i){'use strict';c('UFIVideoPlayerRegistry').registerVideoPlayerController(i);}f.exports=h;}),null);
__d('VideoWithSpacePlayPause',['Event','Run','VideoPlayerReason'],(function a(b,c,d,e,f,g){var h=32;function i(j){'use strict';this.$VideoWithSpacePlayPause1=j;var k=c('Event').listen(window,'keypress',this.$VideoWithSpacePlayPause2.bind(this));c('Run').onLeave(function(){return k.remove();});}i.prototype.$VideoWithSpacePlayPause2=function(j){'use strict';if(this.$VideoWithSpacePlayPause1.isFullscreen()&&j.charCode==h)if(this.$VideoWithSpacePlayPause1.isState('playing')){this.$VideoWithSpacePlayPause1.pause(c('VideoPlayerReason').USER);}else this.$VideoWithSpacePlayPause1.play(c('VideoPlayerReason').USER);};f.exports=i;}),null);
__d('VideoAutoplayControllerBase',['Arbiter','DesktopHscrollUnitEventConstants','Event','VideoPlayerExperiments','VideoPlayerAbortLoadingExperiment','VideoPlayerReason','Visibility','destroyOnUnload','SubscriptionsHandler','throttle','setTimeoutAcrossTransitions','emptyFunction'],(function a(b,c,d,e,f,g){var h=3000;function i(l,m){var n=[];return function(){var o=Date.now();n.unshift(o);var p=0;while(n[++p]+m>o);n=n.slice(0,p);return n.length<=l;};}function j(l,m,n){var o=null;return function(){var p;for(var q=arguments.length,r=Array(q),s=0;s<q;s++)r[s]=arguments[s];if(m()){l.apply(undefined,r);return c('emptyFunction').thatReturnsFalse;}else if(!o)(function(){var t=setTimeout(function(){o=null;l.apply(undefined,r);},n);o=function u(){if(!o)return false;clearTimeout(t);o=null;return true;};})();return o;};}function k(l){'use strict';this.$VideoAutoplayControllerBase3=null;this.$VideoAutoplayControllerBase2=null;this.$VideoAutoplayControllerBase8=[];this.$VideoAutoplayControllerBase1=l;this.$VideoAutoplayControllerBase4=null;this.$VideoAutoplayControllerBase5=new (c('SubscriptionsHandler'))();c('destroyOnUnload')(function(){this.$VideoAutoplayControllerBase8=[];this.$VideoAutoplayControllerBase3=null;if(this.$VideoAutoplayControllerBase4){this.$VideoAutoplayControllerBase4.remove();this.$VideoAutoplayControllerBase4=null;}this.$VideoAutoplayControllerBase5.release();}.bind(this));if(c('VideoPlayerExperiments').autoplayMaxCallsPerWindow)this.$VideoAutoplayControllerBase6=j(function(m){var n=this.$VideoAutoplayControllerBase3;if(n)n.playWithoutUnmute(m);}.bind(this),i(c('VideoPlayerExperiments').autoplayMaxCallsPerWindow,c('VideoPlayerExperiments').autoplayThrottleWindow),c('VideoPlayerExperiments').autoplayThrottleDelay);this.$VideoAutoplayControllerBase7=c('emptyFunction').thatReturnsFalse;}k.prototype.getVideoUnits=function(){'use strict';return this.$VideoAutoplayControllerBase8;};k.prototype.setVideoUnits=function(l){'use strict';this.$VideoAutoplayControllerBase8=l;};k.prototype.addVideoUnit=function(l){'use strict';this.$VideoAutoplayControllerBase8.push(l);};k.prototype.getPlayingVideoUnit=function(){'use strict';return this.$VideoAutoplayControllerBase3;};k.prototype.setPlayingVideoUnit=function(l){'use strict';this.$VideoAutoplayControllerBase3=l;if(this.$VideoAutoplayControllerBase3)this.setupPlayingVideoUnitSubscriptions();};k.prototype.playVideo=function(l,m){'use strict';this.setPlayingVideoUnit(l);if(this.$VideoAutoplayControllerBase3){var n=this.$VideoAutoplayControllerBase6;if(n){this.$VideoAutoplayControllerBase7=n.call(this,m);}else this.$VideoAutoplayControllerBase3.playWithoutUnmute(m);}};k.prototype.setupPlayingVideoUnitSubscriptions=function(){'use strict';throw new Error('Should be overridden');};k.prototype.addSubscriberVideoUnit=function(){'use strict';if(!this.getVideoUnits().length){this.$VideoAutoplayControllerBase5.addSubscriptions(c('Event').listen(window,'resize',this.updateAutoplay.bind(this)),c('Event').listen(window,'blur',this.$VideoAutoplayControllerBase9.bind(this)),c('Event').listen(window,'focus',this.$VideoAutoplayControllerBase10.bind(this)),c('Visibility').addListener(c('Visibility').HIDDEN,this.$VideoAutoplayControllerBase9.bind(this)),c('Visibility').addListener(c('Visibility').VISIBLE,this.$VideoAutoplayControllerBase10.bind(this)),c('Arbiter').subscribe(c('DesktopHscrollUnitEventConstants').HSCROLL_ITEM_SHOWN_EVENT,this.updateAutoplay.bind(this)));if(!this.$VideoAutoplayControllerBase11())this.$VideoAutoplayControllerBase12();}};k.prototype.$VideoAutoplayControllerBase9=function(){'use strict';if(!this.$VideoAutoplayControllerBase2){this.$VideoAutoplayControllerBase2=this.getPlayingVideoUnit();this.pausePlayingVideo(c('VideoPlayerReason').PAGE_VISIBILITY);}};k.prototype.$VideoAutoplayControllerBase10=function(){'use strict';if(this.$VideoAutoplayControllerBase2){this.playVideo(this.$VideoAutoplayControllerBase2,c('VideoPlayerReason').PAGE_VISIBILITY);this.$VideoAutoplayControllerBase2=null;}};k.prototype.$VideoAutoplayControllerBase12=function(){'use strict';if(this.$VideoAutoplayControllerBase4)this.$VideoAutoplayControllerBase4.remove();this.$VideoAutoplayControllerBase4=c('Event').listen(window,'scroll',c('throttle')(this.updateAutoplay.bind(this),this.$VideoAutoplayControllerBase1));};k.prototype.$VideoAutoplayControllerBase11=function(){'use strict';return !!this.$VideoAutoplayControllerBase4;};k.prototype.getClosestVideoUnits=function(l){'use strict';return this.$VideoAutoplayControllerBase8.filter(function(m){return m.getDistanceToViewport()>=0;}).sort(function(m,n){return (m.getDistanceToViewport()-n.getDistanceToViewport());}).slice(0,l);};k.prototype.getVisibleUnits=function(){'use strict';var l=[];this.$VideoAutoplayControllerBase8.forEach(function(m){if(m.isVisible()){l.push(m);if(!m.wasVisible){m.wasVisible=true;m.logDisplayed();}}else m.wasVisible=false;});return l;};k.prototype.pausePlayingVideo=function(l){'use strict';var m=this.$VideoAutoplayControllerBase3;if(m){if(!this.$VideoAutoplayControllerBase7())m.pause(l);if(c('VideoPlayerAbortLoadingExperiment').canAbort&&!m.getIsInChannel())c('setTimeoutAcrossTransitions')(function(){if(!m.isState('playing'))m.abortLoading();},h);this.$VideoAutoplayControllerBase3=null;}};k.prototype.updateAutoplay=function(){'use strict';throw new Error('Should be overridden');};f.exports=k;}),null);
__d("XVideoAutoplayNuxAsyncController",["XController"],(function a(b,c,d,e,f,g){f.exports=c("XController").create("\/video\/autoplay\/nux\/",{});}),null);
__d("XVideoAutoplayNuxDismissAsyncController",["XController"],(function a(b,c,d,e,f,g){f.exports=c("XController").create("\/video\/autoplay\/nux\/dismiss\/",{});}),null);
__d("XVideoAutoplayNuxLogViewAsyncController",["XController"],(function a(b,c,d,e,f,g){f.exports=c("XController").create("\/video\/autoplay\/nux\/log\/view\/",{});}),null);
__d('VideoAutoplayControllerX',['csx','AsyncRequest','DOM','Event','Network','ifRequired','Run','SubscriptionsHandler','VideoAutoplayControllerBase','VideoPlayerExperiments','VideoPlayerPreloadExperiment','VideoPlayerReason','XVideoAutoplayNuxAsyncController','XVideoAutoplayNuxDismissAsyncController','XVideoAutoplayNuxLogViewAsyncController','destroyOnUnload','getViewportDimensions'],(function a(b,c,d,e,f,g,h){var i,j,k=null,l=500,m=false;function n(){return !c('VideoPlayerExperiments').delayAutoplayUntilAfterLoad||m;}i=babelHelpers.inherits(o,c('VideoAutoplayControllerBase'));j=i&&i.prototype;function o(){'use strict';j.constructor.call(this,l);this.$VideoAutoplayControllerX1=new (c('SubscriptionsHandler'))();this.$VideoAutoplayControllerX2=new (c('SubscriptionsHandler'))();this.$VideoAutoplayControllerX3=true;this.$VideoAutoplayControllerX4=true;this.$VideoAutoplayControllerX5=null;this.$VideoAutoplayControllerX6=null;this.$VideoAutoplayControllerX7=false;this.$VideoAutoplayControllerX8=null;this.$VideoAutoplayControllerX9=false;this.$VideoAutoplayControllerX10=false;this.$VideoAutoplayControllerX11=false;var p=c('XVideoAutoplayNuxAsyncController').getURIBuilder().getURI();new (c('AsyncRequest'))(p).setAllowCrossPageTransition().send();c('destroyOnUnload')(function(){this.$VideoAutoplayControllerX12();if(this===k)k=null;}.bind(this));c('Run').onAfterLoad(function(){m=true;if(c('VideoPlayerExperiments').delayAutoplayUntilAfterLoad)if(k)k.updateAutoplay();});}o.registerVideoUnit=function(p){'use strict';if(k==null)k=new o();k.addSubscriberVideoUnit();k.addVideoUnit(p);if(c('VideoPlayerExperiments').enforceOnlyOneVideoPlayingWithAudio)k.$VideoAutoplayControllerX13(p);k.$VideoAutoplayControllerX14();if(p.isVisible()&&n())k.updateAutoplay();if(k.shouldRestoreAllSubsequentStreamBufferSizes())k.restoreStreamBufferSize();};o.setShouldAutoplay=function(p){'use strict';if(k==null)k=new o();k.$VideoAutoplayControllerX3=p;k.$VideoAutoplayControllerX4=p;k.updateAutoplay();};o.prototype.$VideoAutoplayControllerX12=function(){'use strict';this.$VideoAutoplayControllerX1.release();this.$VideoAutoplayControllerX2.release();};o.setAutoplayNux=function(p,q){'use strict';if(k==null)return;k.$VideoAutoplayControllerX5=p;k.$VideoAutoplayControllerX6=q;k.$VideoAutoplayControllerX7=true;var r=c('DOM').find(q.getContentRoot(),"._5cqr");c('Event').listen(r,'click',function(){k.$VideoAutoplayControllerX15();});var s=c('DOM').scry(q.getContentRoot(),"._36gl")[0];if(s)c('Event').listen(s,'click',function(){k.$VideoAutoplayControllerX15();});};o.prototype.$VideoAutoplayControllerX15=function(){'use strict';this.$VideoAutoplayControllerX6.hide();this.$VideoAutoplayControllerX7=false;var p=c('XVideoAutoplayNuxDismissAsyncController').getURIBuilder().getURI();new (c('AsyncRequest'))(p).setAllowCrossPageTransition().send();};o.prototype.setupPlayingVideoUnitSubscriptions=function(){'use strict';if(this.getPlayingVideoUnit().addListener){this.$VideoAutoplayControllerX1.release();this.$VideoAutoplayControllerX1.engage();if(!this.getPlayingVideoUnit().isLooping())this.$VideoAutoplayControllerX1.addSubscriptions(this.getPlayingVideoUnit().addListener('finishPlayback',function(){this.setPlayingVideoUnit(null);}.bind(this)));this.$VideoAutoplayControllerX1.addSubscriptions(this.getPlayingVideoUnit().addListener('turnOffAutoplay',function(){this.setPlayingVideoUnit(null);}.bind(this)),this.getPlayingVideoUnit().addListener('pausePlayback',function(){this.$VideoAutoplayControllerX14();}.bind(this)),this.getPlayingVideoUnit().addListener('finishPlayback',function(){this.$VideoAutoplayControllerX14();}.bind(this)),c('Network').addListener('online',function(){this.$VideoAutoplayControllerX14();}.bind(this)),c('Network').addListener('offline',function(){this.$VideoAutoplayControllerX14();}.bind(this)));}};o.prototype.$VideoAutoplayControllerX14=function(){'use strict';if(c('VideoPlayerExperiments').webVideosBlockAutoplayWhenOffline)if(c('Network').isOnline()){this.$VideoAutoplayControllerX3=this.$VideoAutoplayControllerX4;}else{this.$VideoAutoplayControllerX4=this.$VideoAutoplayControllerX3;this.$VideoAutoplayControllerX3=false;return;}var p=this.getVideoUnits();for(var q=0;q<p.length;q++){var r=p[q].getVideoPlayerController();if(r!==null){if(r.getDataInsertionPosition()==='0'){this.$VideoAutoplayControllerX9=true;if(this.$VideoAutoplayControllerX10===false){r.restoreStreamBufferSize();r.once('beginPlayback',function(){this.$VideoAutoplayControllerX11=true;this.restoreStreamBufferSize();}.bind(this));this.$VideoAutoplayControllerX10=true;}}r.updateAutoplayRestrained();}}if(!this.$VideoAutoplayControllerX9)this.restoreStreamBufferSize();};o.prototype.shouldRestoreAllSubsequentStreamBufferSizes=function(){'use strict';if(!this.$VideoAutoplayControllerX9)return true;return this.$VideoAutoplayControllerX11;};o.prototype.restoreStreamBufferSize=function(){'use strict';var p=this.getVideoUnits();for(var q=0;q<p.length;q++){var r=p[q].getVideoPlayerController();if(r!==null)r.restoreStreamBufferSize();}};o.prototype.$VideoAutoplayControllerX13=function(p){'use strict';if(!p.addListener)return;var q=function(){var r=p.getVideoPlayerController();if(!r.isMuted()&&r.isState('playing')){if(this.$VideoAutoplayControllerX8&&this.$VideoAutoplayControllerX8!==p){var s=this.$VideoAutoplayControllerX8.getVideoPlayerController(),t=s.getOption('VideoWithLiveBroadcast','isLive');if(t){s.mute();}else s.pause(c('VideoPlayerReason').USER);}this.$VideoAutoplayControllerX8=p;}}.bind(this);this.$VideoAutoplayControllerX2.addSubscriptions(p.addListener('beginPlayback',q),p.addListener('changeVolume',q),p.addListener('unmuteVideo',q));};o.prototype.showAutoplayNUX=function(p){'use strict';if(this.$VideoAutoplayControllerX6&&!this.$VideoAutoplayControllerX6.isShown()){var q=p.getVideoPlayerController().getRootNode();c('DOM').prependContent(q,this.$VideoAutoplayControllerX5);this.$VideoAutoplayControllerX6.show();var r=c('XVideoAutoplayNuxLogViewAsyncController').getURIBuilder().getURI();new (c('AsyncRequest'))(r).setAllowCrossPageTransition().send();}this.$VideoAutoplayControllerX7=false;};o.getChannelVideos=function(){'use strict';if(k)return k.getVideoUnits().filter(function(p){return p.getIsInChannel();});return null;};o.prototype.updateAutoplay=function(){'use strict';if(!this.$VideoAutoplayControllerX3){this.pausePlayingVideo(c('VideoPlayerReason').AUTOPLAY);return;}var p=this.getVisibleUnits();this.getClosestVideoUnits(c('VideoPlayerPreloadExperiment').preloadVideosCount).forEach(function(t){return t.preload();});var q=p.length,r=null;if(q==1){r=p[0];r=r.isAutoplayable()?r:null;}else if(q>1){var s=c('getViewportDimensions')().height/2;p.forEach(function(t){if(!t.isAutoplayable())return;var u=t.getDOMPosition(),v=u.y+u.height/2,w=Math.abs(v-s);t.playPriority=w;if(!r||t.playPriority<r.playPriority)r=t;});}if(this.getPlayingVideoUnit()){if(r!=this.getPlayingVideoUnit()){this.pausePlayingVideo(c('VideoPlayerReason').AUTOPLAY);this.playVideo(r,c('VideoPlayerReason').AUTOPLAY);if(this.$VideoAutoplayControllerX7)this.showAutoplayNUX(r);}}else if(r){this.playVideo(r,c('VideoPlayerReason').AUTOPLAY);if(this.$VideoAutoplayControllerX7)this.showAutoplayNUX(r);}};f.exports=o;}),null);
__d('VideoAutoplayPlayerBase',['EventEmitter'],(function a(b,c,d,e,f,g){var h,i;h=babelHelpers.inherits(j,c('EventEmitter'));i=h&&h.prototype;function j(){'use strict';i.constructor.call(this);}j.prototype.isVisible=function(){'use strict';throw new Error('Should be overridden');};j.prototype.getDistanceToViewport=function(){'use strict';throw new Error('Should be overridden');};j.prototype.getVideoPlayerController=function(){'use strict';return null;};j.prototype.logDisplayed=function(){'use strict';throw new Error('Should be overridden');};j.prototype.playWithoutUnmute=function(k){'use strict';throw new Error('Should be overridden');};j.prototype.pause=function(k){'use strict';throw new Error('Should be overridden');};j.prototype.isAutoplayable=function(){'use strict';throw new Error('Should be overridden');};j.prototype.getDOMPosition=function(){'use strict';throw new Error('Should be overridden');};j.prototype.isLooping=function(){'use strict';throw new Error('Should be overridden');};j.prototype.isState=function(k){'use strict';throw new Error('Should be overridden');};f.exports=j;}),null);
__d("XVideoQualitySurveyController",["XController"],(function a(b,c,d,e,f,g){f.exports=c("XController").create("\/video\/quality_survey\/",{videoid:{type:"String"},__asyncDialog:{type:"Int"}});}),null);
__d('VideoPlayButton',['AsyncRequest','CSS','EventListener','VideoDisplayTimePlayButton','XVideoQualitySurveyController'],(function a(b,c,d,e,f,g){function h(i,j,k){'use strict';this.$VideoPlayButton1=i;this.$VideoPlayButton2=j;if(k){this.$VideoPlayButton3=k.hiddenAfterFinish;this.$VideoPlayButton4=k.hiddenWhilePaused;this.$VideoPlayButton5=!!k.hiddenInFallback;this.$VideoPlayButton6=k.spherical;}var l=c('VideoDisplayTimePlayButton').getClicked(this.$VideoPlayButton2);c('VideoDisplayTimePlayButton').unregister(this.$VideoPlayButton2);i.addListener('beginPlayback',this.$VideoPlayButton7.bind(this));i.addListener('finishPlayback',this.$VideoPlayButton8.bind(this));i.addListener('pausePlayback',this.$VideoPlayButton9.bind(this));i.addListener('buffering',this.$VideoPlayButton10.bind(this));i.addListener('buffered',this.$VideoPlayButton11.bind(this));i.addListener('stateChange',this.$VideoPlayButton12.bind(this));i.addListener('playRequested',this.$VideoPlayButton13.bind(this));i.addListener('VideoChannelController/exitChannel',this.$VideoPlayButton14.bind(this));i.addListener('clickVideo',this.$VideoPlayButton15.bind(this));c('EventListener').listen(this.$VideoPlayButton2,'click',this.$VideoPlayButton16.bind(this));if(k&&k.hiddenWhileLoading)c('CSS').show(this.$VideoPlayButton2);if(l)this.$VideoPlayButton16();}h.prototype.$VideoPlayButton12=function(){'use strict';if(this.$VideoPlayButton1.isState('fallback'))if(this.$VideoPlayButton5||this.$VideoPlayButton1.getIsInChannel()){c('CSS').hide(this.$VideoPlayButton2);}else c('CSS').show(this.$VideoPlayButton2);};h.prototype.$VideoPlayButton7=function(){'use strict';c('CSS').hide(this.$VideoPlayButton2);};h.prototype.$VideoPlayButton9=function(){'use strict';if(this.$VideoPlayButton4)return;c('CSS').show(this.$VideoPlayButton2);};h.prototype.$VideoPlayButton13=function(){'use strict';if(this.$VideoPlayButton1.isState('fallback'))return;c('CSS').hide(this.$VideoPlayButton2);};h.prototype.$VideoPlayButton14=function(){'use strict';if(this.$VideoPlayButton1.isState('paused')&&(!this.$VideoPlayButton4||this.$VideoPlayButton6)||this.$VideoPlayButton1.isState('finished')&&!this.$VideoPlayButton3)c('CSS').show(this.$VideoPlayButton2);};h.prototype.$VideoPlayButton8=function(){'use strict';var i=this.$VideoPlayButton1.getOption('Looping','isLooping');if(this.$VideoPlayButton3||this.$VideoPlayButton1.getIsInChannel()||i){c('CSS').hide(this.$VideoPlayButton2);}else c('CSS').show(this.$VideoPlayButton2);if(!this.$VideoPlayButton1.getIsInChannel()&&!this.$VideoPlayButton1.isAd()&&!this.$VideoPlayButton1.hasOption('WatchAndScroll','isActive')&&!this.$VideoPlayButton1.isMuted()){var j=c('XVideoQualitySurveyController').getURIBuilder().setString('videoid',this.$VideoPlayButton1.getVideoID()).getURI(),k=new (c('AsyncRequest'))().setURI(j);k.send();}};h.prototype.$VideoPlayButton10=function(){'use strict';c('CSS').hide(this.$VideoPlayButton2);};h.prototype.$VideoPlayButton11=function(){'use strict';c('CSS').hide(this.$VideoPlayButton2);};h.prototype.$VideoPlayButton16=function(){'use strict';this.$VideoPlayButton1.clickVideo();};h.prototype.$VideoPlayButton15=function(){'use strict';if(this.$VideoPlayButton1.isState('fallback'))return;c('CSS').hide(this.$VideoPlayButton2);};f.exports=h;}),null);
__d('VideoCTAEndscreen',['cx','Arbiter','AttachmentRelatedShareConstants','CSS','Event','Focus','SubscriptionsHandler','VideoCTALoggingConfig','VideoPlayerReason','VideoPlayerLoggerEvent','logVideosClickTracking'],(function a(b,c,d,e,f,g,h){function i(j,k){'use strict';this.$VideoCTAEndscreen1=j;this.$VideoCTAEndscreen2=k.endscreenElement;this.$VideoCTAEndscreen3=k.replayElement;this.$VideoCTAEndscreen4=k.ctaElement;this.$VideoCTAEndscreen5=k.isPausescreen;this.$VideoCTAEndscreen6=new (c('SubscriptionsHandler'))();this.$VideoCTAEndscreen6.addSubscriptions(c('Event').listen(this.$VideoCTAEndscreen3,'click',function(){return this.$VideoCTAEndscreen7();}.bind(this)),j.addListener('beginPlayback',function(){return this.$VideoCTAEndscreen8();}.bind(this)),j.addListener('VideoChannelController/exitChannel',function(){if(j.isState('finished'))this.$VideoCTAEndscreen9();}.bind(this)));if(this.$VideoCTAEndscreen4)this.$VideoCTAEndscreen6.addSubscriptions(c('Event').listen(this.$VideoCTAEndscreen4,'click',function(){return this.$VideoCTAEndscreen10();}.bind(this)));if(this.$VideoCTAEndscreen5){this.$VideoCTAEndscreen6.addSubscriptions(j.addListener('pausePlayback',function(){return this.$VideoCTAEndscreen11();}.bind(this)));}else this.$VideoCTAEndscreen6.addSubscriptions(j.addListener('finishPlayback',function(){return this.$VideoCTAEndscreen9();}.bind(this)));}i.prototype.$VideoCTAEndscreen7=function(){'use strict';var j={reason:c('VideoPlayerReason').USER};this.$VideoCTAEndscreen1.clickVideo();if(this.$VideoCTAEndscreen1.isState('paused')){if(c('VideoCTALoggingConfig').shouldLogUnpausedEvent)this.$VideoCTAEndscreen1.logEvent(c('VideoPlayerLoggerEvent').UNPAUSED,j);}else if(this.$VideoCTAEndscreen1.isState('finished'))this.$VideoCTAEndscreen1.logEvent(c('VideoPlayerLoggerEvent').REPLAYED,j);var k=this.$VideoCTAEndscreen1.getVideoNode();c('logVideosClickTracking')(k);c('Focus').set(k);};i.prototype.$VideoCTAEndscreen10=function(){'use strict';c('Arbiter').inform(c('AttachmentRelatedShareConstants').FBVIDEO_CLICK,{attachment:this.$VideoCTAEndscreen1.getRootNode(),fbvideo_id:this.$VideoCTAEndscreen1.getVideoID()});};i.prototype.$VideoCTAEndscreen9=function(){'use strict';if(!this.$VideoCTAEndscreen1.getIsInChannel())this.$VideoCTAEndscreen11();};i.prototype.$VideoCTAEndscreen11=function(){'use strict';c('CSS').addClass(this.$VideoCTAEndscreen2,"_1qbf");};i.prototype.$VideoCTAEndscreen8=function(){'use strict';c('CSS').removeClass(this.$VideoCTAEndscreen2,"_1qbf");};f.exports=i;}),null);
__d('VideoSpinner',['cx','CSS','EventListener'],(function a(b,c,d,e,f,g,h){function i(j,k){'use strict';this.$VideoSpinner2=k;this.$VideoSpinner1=j;this.$VideoSpinner3=false;j.addListener('beginPlayback',this.$VideoSpinner4.bind(this));j.addListener('finishPlayback',this.$VideoSpinner5.bind(this));j.addListener('pausePlayback',this.$VideoSpinner6.bind(this));j.addListener('playRequested',this.$VideoSpinner7.bind(this));j.addListener('buffering',this.$VideoSpinner8.bind(this));j.addListener('buffered',this.$VideoSpinner9.bind(this));j.addListener('stateChange',this.$VideoSpinner10.bind(this));j.addListener('clickVideo',this.$VideoSpinner11.bind(this));j.addListener('VideoSphericalOverlay/animationUpdate',this.$VideoSpinner12.bind(this));c('EventListener').listen(this.$VideoSpinner2,'click',this.$VideoSpinner13.bind(this));}i.prototype.$VideoSpinner12=function(j){'use strict';if(j){c('CSS').addClass(this.$VideoSpinner2,"_1st9");}else c('CSS').removeClass(this.$VideoSpinner2,"_1st9");};i.prototype.$VideoSpinner8=function(){'use strict';c('CSS').show(this.$VideoSpinner2);this.$VideoSpinner3=true;};i.prototype.$VideoSpinner9=function(){'use strict';c('CSS').hide(this.$VideoSpinner2);this.$VideoSpinner3=false;};i.prototype.$VideoSpinner4=function(){'use strict';if(this.$VideoSpinner3){c('CSS').show(this.$VideoSpinner2);}else c('CSS').hide(this.$VideoSpinner2);};i.prototype.$VideoSpinner6=function(){'use strict';c('CSS').hide(this.$VideoSpinner2);};i.prototype.$VideoSpinner7=function(){'use strict';c('CSS').hide(this.$VideoSpinner2);};i.prototype.$VideoSpinner5=function(){'use strict';c('CSS').hide(this.$VideoSpinner2);};i.prototype.$VideoSpinner10=function(){'use strict';if(this.$VideoSpinner1.isState('fallback'))c('CSS').hide(this.$VideoSpinner2);};i.prototype.$VideoSpinner11=function(){'use strict';if(this.$VideoSpinner1.isState('fallback'))return;if(this.$VideoSpinner3||this.$VideoSpinner1.isState('ready')||this.$VideoSpinner1.isState('loading'))c('CSS').show(this.$VideoSpinner2);};i.prototype.$VideoSpinner13=function(){'use strict';this.$VideoSpinner1.clickVideo();};f.exports=i;}),null);
__d('VideoWithLoopingPlayback',['VideoPlayerReason','setImmediate'],(function a(b,c,d,e,f,g){function h(i,j){'use strict';this.$VideoWithLoopingPlayback3=i;this.$VideoWithLoopingPlayback1=true;this.$VideoWithLoopingPlayback2=1;this.$VideoWithLoopingPlayback3.addListener('finishPlayback',function(){return this.$VideoWithLoopingPlayback4(j);}.bind(this));this.$VideoWithLoopingPlayback3.registerOption('Looping','isLooping',function(){return this.$VideoWithLoopingPlayback1;}.bind(this),function(k){return this.$VideoWithLoopingPlayback5(k);}.bind(this));}h.prototype.$VideoWithLoopingPlayback5=function(i){'use strict';this.$VideoWithLoopingPlayback1=i;};h.prototype.$VideoWithLoopingPlayback4=function(i){'use strict';var j=this.$VideoWithLoopingPlayback3.getOption('FeedAutoplay','isVisibleForAutoplay'),k=this.$VideoWithLoopingPlayback3.getOption('WatchAndScroll','isActive'),l=this.$VideoWithLoopingPlayback3.getIsInChannel();if((j||j===undefined)&&!k&&!l&&(this.$VideoWithLoopingPlayback2<i||i==-1)){c('setImmediate')(function(){return this.$VideoWithLoopingPlayback3.play(c('VideoPlayerReason').LOOP);}.bind(this));this.$VideoWithLoopingPlayback2++;}else this.$VideoWithLoopingPlayback3.setOption('Looping','isLooping',false);};f.exports=h;}),null);