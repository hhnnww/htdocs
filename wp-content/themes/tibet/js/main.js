
// A simple JS library that detects mobile devices. https://github.com/kaimallea/isMobile
!function(a){var b=/iPhone/i,c=/iPod/i,d=/iPad/i,e=/(?=.*\bAndroid\b)(?=.*\bMobile\b)/i,f=/Android/i,g=/(?=.*\bAndroid\b)(?=.*\bSD4930UR\b)/i,h=/(?=.*\bAndroid\b)(?=.*\b(?:KFOT|KFTT|KFJWI|KFJWA|KFSOWI|KFTHWI|KFTHWA|KFAPWI|KFAPWA|KFARWI|KFASWI|KFSAWI|KFSAWA)\b)/i,i=/IEMobile/i,j=/(?=.*\bWindows\b)(?=.*\bARM\b)/i,k=/BlackBerry/i,l=/BB10/i,m=/Opera Mini/i,n=/(CriOS|Chrome)(?=.*\bMobile\b)/i,o=/(?=.*\bFirefox\b)(?=.*\bMobile\b)/i,p=new RegExp("(?:Nexus 7|BNTV250|Kindle Fire|Silk|GT-P1000)","i"),q=function(a,b){return a.test(b)},r=function(a){var r=a||navigator.userAgent,s=r.split("[FBAN");return"undefined"!=typeof s[1]&&(r=s[0]),this.apple={phone:q(b,r),ipod:q(c,r),tablet:!q(b,r)&&q(d,r),device:q(b,r)||q(c,r)||q(d,r)},this.amazon={phone:q(g,r),tablet:!q(g,r)&&q(h,r),device:q(g,r)||q(h,r)},this.android={phone:q(g,r)||q(e,r),tablet:!q(g,r)&&!q(e,r)&&(q(h,r)||q(f,r)),device:q(g,r)||q(h,r)||q(e,r)||q(f,r)},this.windows={phone:q(i,r),tablet:q(j,r),device:q(i,r)||q(j,r)},this.other={blackberry:q(k,r),blackberry10:q(l,r),opera:q(m,r),firefox:q(o,r),chrome:q(n,r),device:q(k,r)||q(l,r)||q(m,r)||q(o,r)||q(n,r)},this.seven_inch=q(p,r),this.any=this.apple.device||this.android.device||this.windows.device||this.other.device||this.seven_inch,this.phone=this.apple.phone||this.android.phone||this.windows.phone,this.tablet=this.apple.tablet||this.android.tablet||this.windows.tablet,"undefined"==typeof window?this:void 0},s=function(){var a=new r;return a.Class=r,a};"undefined"!=typeof module&&module.exports&&"undefined"==typeof window?module.exports=r:"undefined"!=typeof module&&module.exports&&"undefined"!=typeof window?module.exports=s():"function"==typeof define&&define.amd?define("isMobile",[],a.isMobile=s()):a.isMobile=s()}(this);


/*
 * jQuery FlexSlider v2.6.3
 * Copyright 2012 WooThemes
 * Contributing Author: Tyler Smith
 */!function($){var e=!0;$.flexslider=function(t,a){var n=$(t);n.vars=$.extend({},$.flexslider.defaults,a);var i=n.vars.namespace,s=window.navigator&&window.navigator.msPointerEnabled&&window.MSGesture,r=("ontouchstart"in window||s||window.DocumentTouch&&document instanceof DocumentTouch)&&n.vars.touch,o="click touchend MSPointerUp keyup",l="",c,d="vertical"===n.vars.direction,u=n.vars.reverse,v=n.vars.itemWidth>0,p="fade"===n.vars.animation,m=""!==n.vars.asNavFor,f={};$.data(t,"flexslider",n),f={init:function(){n.animating=!1,n.currentSlide=parseInt(n.vars.startAt?n.vars.startAt:0,10),isNaN(n.currentSlide)&&(n.currentSlide=0),n.animatingTo=n.currentSlide,n.atEnd=0===n.currentSlide||n.currentSlide===n.last,n.containerSelector=n.vars.selector.substr(0,n.vars.selector.search(" ")),n.slides=$(n.vars.selector,n),n.container=$(n.containerSelector,n),n.count=n.slides.length,n.syncExists=$(n.vars.sync).length>0,"slide"===n.vars.animation&&(n.vars.animation="swing"),n.prop=d?"top":"marginLeft",n.args={},n.manualPause=!1,n.stopped=!1,n.started=!1,n.startTimeout=null,n.transitions=!n.vars.video&&!p&&n.vars.useCSS&&function(){var e=document.createElement("div"),t=["perspectiveProperty","WebkitPerspective","MozPerspective","OPerspective","msPerspective"];for(var a in t)if(void 0!==e.style[t[a]])return n.pfx=t[a].replace("Perspective","").toLowerCase(),n.prop="-"+n.pfx+"-transform",!0;return!1}(),n.ensureAnimationEnd="",""!==n.vars.controlsContainer&&(n.controlsContainer=$(n.vars.controlsContainer).length>0&&$(n.vars.controlsContainer)),""!==n.vars.manualControls&&(n.manualControls=$(n.vars.manualControls).length>0&&$(n.vars.manualControls)),""!==n.vars.customDirectionNav&&(n.customDirectionNav=2===$(n.vars.customDirectionNav).length&&$(n.vars.customDirectionNav)),n.vars.randomize&&(n.slides.sort(function(){return Math.round(Math.random())-.5}),n.container.empty().append(n.slides)),n.doMath(),n.setup("init"),n.vars.controlNav&&f.controlNav.setup(),n.vars.directionNav&&f.directionNav.setup(),n.vars.keyboard&&(1===$(n.containerSelector).length||n.vars.multipleKeyboard)&&$(document).bind("keyup",function(e){var t=e.keyCode;if(!n.animating&&(39===t||37===t)){var a=39===t?n.getTarget("next"):37===t?n.getTarget("prev"):!1;n.flexAnimate(a,n.vars.pauseOnAction)}}),n.vars.mousewheel&&n.bind("mousewheel",function(e,t,a,i){e.preventDefault();var s=0>t?n.getTarget("next"):n.getTarget("prev");n.flexAnimate(s,n.vars.pauseOnAction)}),n.vars.pausePlay&&f.pausePlay.setup(),n.vars.slideshow&&n.vars.pauseInvisible&&f.pauseInvisible.init(),n.vars.slideshow&&(n.vars.pauseOnHover&&n.hover(function(){n.manualPlay||n.manualPause||n.pause()},function(){n.manualPause||n.manualPlay||n.stopped||n.play()}),n.vars.pauseInvisible&&f.pauseInvisible.isHidden()||(n.vars.initDelay>0?n.startTimeout=setTimeout(n.play,n.vars.initDelay):n.play())),m&&f.asNav.setup(),r&&n.vars.touch&&f.touch(),(!p||p&&n.vars.smoothHeight)&&$(window).bind("resize orientationchange focus",f.resize),n.find("img").attr("draggable","false"),setTimeout(function(){n.vars.start(n)},200)},asNav:{setup:function(){n.asNav=!0,n.animatingTo=Math.floor(n.currentSlide/n.move),n.currentItem=n.currentSlide,n.slides.removeClass(i+"active-slide").eq(n.currentItem).addClass(i+"active-slide"),s?(t._slider=n,n.slides.each(function(){var e=this;e._gesture=new MSGesture,e._gesture.target=e,e.addEventListener("MSPointerDown",function(e){e.preventDefault(),e.currentTarget._gesture&&e.currentTarget._gesture.addPointer(e.pointerId)},!1),e.addEventListener("MSGestureTap",function(e){e.preventDefault();var t=$(this),a=t.index();$(n.vars.asNavFor).data("flexslider").animating||t.hasClass("active")||(n.direction=n.currentItem<a?"next":"prev",n.flexAnimate(a,n.vars.pauseOnAction,!1,!0,!0))})})):n.slides.on(o,function(e){e.preventDefault();var t=$(this),a=t.index(),s=t.offset().left-$(n).scrollLeft();0>=s&&t.hasClass(i+"active-slide")?n.flexAnimate(n.getTarget("prev"),!0):$(n.vars.asNavFor).data("flexslider").animating||t.hasClass(i+"active-slide")||(n.direction=n.currentItem<a?"next":"prev",n.flexAnimate(a,n.vars.pauseOnAction,!1,!0,!0))})}},controlNav:{setup:function(){n.manualControls?f.controlNav.setupManual():f.controlNav.setupPaging()},setupPaging:function(){var e="thumbnails"===n.vars.controlNav?"control-thumbs":"control-paging",t=1,a,s;if(n.controlNavScaffold=$('<ol class="'+i+"control-nav "+i+e+'"></ol>'),n.pagingCount>1)for(var r=0;r<n.pagingCount;r++){s=n.slides.eq(r),void 0===s.attr("data-thumb-alt")&&s.attr("data-thumb-alt","");var c=""!==s.attr("data-thumb-alt")?c=' alt="'+s.attr("data-thumb-alt")+'"':"";if(a="thumbnails"===n.vars.controlNav?'<img src="'+s.attr("data-thumb")+'"'+c+"/>":'<a href="#">'+t+"</a>","thumbnails"===n.vars.controlNav&&!0===n.vars.thumbCaptions){var d=s.attr("data-thumbcaption");""!==d&&void 0!==d&&(a+='<span class="'+i+'caption">'+d+"</span>")}n.controlNavScaffold.append("<li>"+a+"</li>"),t++}n.controlsContainer?$(n.controlsContainer).append(n.controlNavScaffold):n.append(n.controlNavScaffold),f.controlNav.set(),f.controlNav.active(),n.controlNavScaffold.delegate("a, img",o,function(e){if(e.preventDefault(),""===l||l===e.type){var t=$(this),a=n.controlNav.index(t);t.hasClass(i+"active")||(n.direction=a>n.currentSlide?"next":"prev",n.flexAnimate(a,n.vars.pauseOnAction))}""===l&&(l=e.type),f.setToClearWatchedEvent()})},setupManual:function(){n.controlNav=n.manualControls,f.controlNav.active(),n.controlNav.bind(o,function(e){if(e.preventDefault(),""===l||l===e.type){var t=$(this),a=n.controlNav.index(t);t.hasClass(i+"active")||(a>n.currentSlide?n.direction="next":n.direction="prev",n.flexAnimate(a,n.vars.pauseOnAction))}""===l&&(l=e.type),f.setToClearWatchedEvent()})},set:function(){var e="thumbnails"===n.vars.controlNav?"img":"a";n.controlNav=$("."+i+"control-nav li "+e,n.controlsContainer?n.controlsContainer:n)},active:function(){n.controlNav.removeClass(i+"active").eq(n.animatingTo).addClass(i+"active")},update:function(e,t){n.pagingCount>1&&"add"===e?n.controlNavScaffold.append($('<li><a href="#">'+n.count+"</a></li>")):1===n.pagingCount?n.controlNavScaffold.find("li").remove():n.controlNav.eq(t).closest("li").remove(),f.controlNav.set(),n.pagingCount>1&&n.pagingCount!==n.controlNav.length?n.update(t,e):f.controlNav.active()}},directionNav:{setup:function(){var e=$('<ul class="'+i+'direction-nav"><li class="'+i+'nav-prev"><a class="'+i+'prev" href="#">'+n.vars.prevText+'</a></li><li class="'+i+'nav-next"><a class="'+i+'next" href="#">'+n.vars.nextText+"</a></li></ul>");n.customDirectionNav?n.directionNav=n.customDirectionNav:n.controlsContainer?($(n.controlsContainer).append(e),n.directionNav=$("."+i+"direction-nav li a",n.controlsContainer)):(n.append(e),n.directionNav=$("."+i+"direction-nav li a",n)),f.directionNav.update(),n.directionNav.bind(o,function(e){e.preventDefault();var t;""!==l&&l!==e.type||(t=$(this).hasClass(i+"next")?n.getTarget("next"):n.getTarget("prev"),n.flexAnimate(t,n.vars.pauseOnAction)),""===l&&(l=e.type),f.setToClearWatchedEvent()})},update:function(){var e=i+"disabled";1===n.pagingCount?n.directionNav.addClass(e).attr("tabindex","-1"):n.vars.animationLoop?n.directionNav.removeClass(e).removeAttr("tabindex"):0===n.animatingTo?n.directionNav.removeClass(e).filter("."+i+"prev").addClass(e).attr("tabindex","-1"):n.animatingTo===n.last?n.directionNav.removeClass(e).filter("."+i+"next").addClass(e).attr("tabindex","-1"):n.directionNav.removeClass(e).removeAttr("tabindex")}},pausePlay:{setup:function(){var e=$('<div class="'+i+'pauseplay"><a href="#"></a></div>');n.controlsContainer?(n.controlsContainer.append(e),n.pausePlay=$("."+i+"pauseplay a",n.controlsContainer)):(n.append(e),n.pausePlay=$("."+i+"pauseplay a",n)),f.pausePlay.update(n.vars.slideshow?i+"pause":i+"play"),n.pausePlay.bind(o,function(e){e.preventDefault(),""!==l&&l!==e.type||($(this).hasClass(i+"pause")?(n.manualPause=!0,n.manualPlay=!1,n.pause()):(n.manualPause=!1,n.manualPlay=!0,n.play())),""===l&&(l=e.type),f.setToClearWatchedEvent()})},update:function(e){"play"===e?n.pausePlay.removeClass(i+"pause").addClass(i+"play").html(n.vars.playText):n.pausePlay.removeClass(i+"play").addClass(i+"pause").html(n.vars.pauseText)}},touch:function(){function e(e){e.stopPropagation(),n.animating?e.preventDefault():(n.pause(),t._gesture.addPointer(e.pointerId),T=0,c=d?n.h:n.w,f=Number(new Date),l=v&&u&&n.animatingTo===n.last?0:v&&u?n.limit-(n.itemW+n.vars.itemMargin)*n.move*n.animatingTo:v&&n.currentSlide===n.last?n.limit:v?(n.itemW+n.vars.itemMargin)*n.move*n.currentSlide:u?(n.last-n.currentSlide+n.cloneOffset)*c:(n.currentSlide+n.cloneOffset)*c)}function a(e){e.stopPropagation();var a=e.target._slider;if(a){var n=-e.translationX,i=-e.translationY;return T+=d?i:n,m=T,y=d?Math.abs(T)<Math.abs(-n):Math.abs(T)<Math.abs(-i),e.detail===e.MSGESTURE_FLAG_INERTIA?void setImmediate(function(){t._gesture.stop()}):void((!y||Number(new Date)-f>500)&&(e.preventDefault(),!p&&a.transitions&&(a.vars.animationLoop||(m=T/(0===a.currentSlide&&0>T||a.currentSlide===a.last&&T>0?Math.abs(T)/c+2:1)),a.setProps(l+m,"setTouch"))))}}function i(e){e.stopPropagation();var t=e.target._slider;if(t){if(t.animatingTo===t.currentSlide&&!y&&null!==m){var a=u?-m:m,n=a>0?t.getTarget("next"):t.getTarget("prev");t.canAdvance(n)&&(Number(new Date)-f<550&&Math.abs(a)>50||Math.abs(a)>c/2)?t.flexAnimate(n,t.vars.pauseOnAction):p||t.flexAnimate(t.currentSlide,t.vars.pauseOnAction,!0)}r=null,o=null,m=null,l=null,T=0}}var r,o,l,c,m,f,g,h,S,y=!1,x=0,b=0,T=0;s?(t.style.msTouchAction="none",t._gesture=new MSGesture,t._gesture.target=t,t.addEventListener("MSPointerDown",e,!1),t._slider=n,t.addEventListener("MSGestureChange",a,!1),t.addEventListener("MSGestureEnd",i,!1)):(g=function(e){n.animating?e.preventDefault():(window.navigator.msPointerEnabled||1===e.touches.length)&&(n.pause(),c=d?n.h:n.w,f=Number(new Date),x=e.touches[0].pageX,b=e.touches[0].pageY,l=v&&u&&n.animatingTo===n.last?0:v&&u?n.limit-(n.itemW+n.vars.itemMargin)*n.move*n.animatingTo:v&&n.currentSlide===n.last?n.limit:v?(n.itemW+n.vars.itemMargin)*n.move*n.currentSlide:u?(n.last-n.currentSlide+n.cloneOffset)*c:(n.currentSlide+n.cloneOffset)*c,r=d?b:x,o=d?x:b,t.addEventListener("touchmove",h,!1),t.addEventListener("touchend",S,!1))},h=function(e){x=e.touches[0].pageX,b=e.touches[0].pageY,m=d?r-b:r-x,y=d?Math.abs(m)<Math.abs(x-o):Math.abs(m)<Math.abs(b-o);var t=500;(!y||Number(new Date)-f>t)&&(e.preventDefault(),!p&&n.transitions&&(n.vars.animationLoop||(m/=0===n.currentSlide&&0>m||n.currentSlide===n.last&&m>0?Math.abs(m)/c+2:1),n.setProps(l+m,"setTouch")))},S=function(e){if(t.removeEventListener("touchmove",h,!1),n.animatingTo===n.currentSlide&&!y&&null!==m){var a=u?-m:m,i=a>0?n.getTarget("next"):n.getTarget("prev");n.canAdvance(i)&&(Number(new Date)-f<550&&Math.abs(a)>50||Math.abs(a)>c/2)?n.flexAnimate(i,n.vars.pauseOnAction):p||n.flexAnimate(n.currentSlide,n.vars.pauseOnAction,!0)}t.removeEventListener("touchend",S,!1),r=null,o=null,m=null,l=null},t.addEventListener("touchstart",g,!1))},resize:function(){!n.animating&&n.is(":visible")&&(v||n.doMath(),p?f.smoothHeight():v?(n.slides.width(n.computedW),n.update(n.pagingCount),n.setProps()):d?(n.viewport.height(n.h),n.setProps(n.h,"setTotal")):(n.vars.smoothHeight&&f.smoothHeight(),n.newSlides.width(n.computedW),n.setProps(n.computedW,"setTotal")))},smoothHeight:function(e){if(!d||p){var t=p?n:n.viewport;e?t.animate({height:n.slides.eq(n.animatingTo).innerHeight()},e):t.innerHeight(n.slides.eq(n.animatingTo).innerHeight())}},sync:function(e){var t=$(n.vars.sync).data("flexslider"),a=n.animatingTo;switch(e){case"animate":t.flexAnimate(a,n.vars.pauseOnAction,!1,!0);break;case"play":t.playing||t.asNav||t.play();break;case"pause":t.pause()}},uniqueID:function(e){return e.filter("[id]").add(e.find("[id]")).each(function(){var e=$(this);e.attr("id",e.attr("id")+"_clone")}),e},pauseInvisible:{visProp:null,init:function(){var e=f.pauseInvisible.getHiddenProp();if(e){var t=e.replace(/[H|h]idden/,"")+"visibilitychange";document.addEventListener(t,function(){f.pauseInvisible.isHidden()?n.startTimeout?clearTimeout(n.startTimeout):n.pause():n.started?n.play():n.vars.initDelay>0?setTimeout(n.play,n.vars.initDelay):n.play()})}},isHidden:function(){var e=f.pauseInvisible.getHiddenProp();return e?document[e]:!1},getHiddenProp:function(){var e=["webkit","moz","ms","o"];if("hidden"in document)return"hidden";for(var t=0;t<e.length;t++)if(e[t]+"Hidden"in document)return e[t]+"Hidden";return null}},setToClearWatchedEvent:function(){clearTimeout(c),c=setTimeout(function(){l=""},3e3)}},n.flexAnimate=function(e,t,a,s,o){if(n.vars.animationLoop||e===n.currentSlide||(n.direction=e>n.currentSlide?"next":"prev"),m&&1===n.pagingCount&&(n.direction=n.currentItem<e?"next":"prev"),!n.animating&&(n.canAdvance(e,o)||a)&&n.is(":visible")){if(m&&s){var l=$(n.vars.asNavFor).data("flexslider");if(n.atEnd=0===e||e===n.count-1,l.flexAnimate(e,!0,!1,!0,o),n.direction=n.currentItem<e?"next":"prev",l.direction=n.direction,Math.ceil((e+1)/n.visible)-1===n.currentSlide||0===e)return n.currentItem=e,n.slides.removeClass(i+"active-slide").eq(e).addClass(i+"active-slide"),!1;n.currentItem=e,n.slides.removeClass(i+"active-slide").eq(e).addClass(i+"active-slide"),e=Math.floor(e/n.visible)}if(n.animating=!0,n.animatingTo=e,t&&n.pause(),n.vars.before(n),n.syncExists&&!o&&f.sync("animate"),n.vars.controlNav&&f.controlNav.active(),v||n.slides.removeClass(i+"active-slide").eq(e).addClass(i+"active-slide"),n.atEnd=0===e||e===n.last,n.vars.directionNav&&f.directionNav.update(),e===n.last&&(n.vars.end(n),n.vars.animationLoop||n.pause()),p)r?(n.slides.eq(n.currentSlide).css({opacity:0,zIndex:1}),n.slides.eq(e).css({opacity:1,zIndex:2}),n.wrapup(c)):(n.slides.eq(n.currentSlide).css({zIndex:1}).animate({opacity:0},n.vars.animationSpeed,n.vars.easing),n.slides.eq(e).css({zIndex:2}).animate({opacity:1},n.vars.animationSpeed,n.vars.easing,n.wrapup));else{var c=d?n.slides.filter(":first").height():n.computedW,g,h,S;v?(g=n.vars.itemMargin,S=(n.itemW+g)*n.move*n.animatingTo,h=S>n.limit&&1!==n.visible?n.limit:S):h=0===n.currentSlide&&e===n.count-1&&n.vars.animationLoop&&"next"!==n.direction?u?(n.count+n.cloneOffset)*c:0:n.currentSlide===n.last&&0===e&&n.vars.animationLoop&&"prev"!==n.direction?u?0:(n.count+1)*c:u?(n.count-1-e+n.cloneOffset)*c:(e+n.cloneOffset)*c,n.setProps(h,"",n.vars.animationSpeed),n.transitions?(n.vars.animationLoop&&n.atEnd||(n.animating=!1,n.currentSlide=n.animatingTo),n.container.unbind("webkitTransitionEnd transitionend"),n.container.bind("webkitTransitionEnd transitionend",function(){clearTimeout(n.ensureAnimationEnd),n.wrapup(c)}),clearTimeout(n.ensureAnimationEnd),n.ensureAnimationEnd=setTimeout(function(){n.wrapup(c)},n.vars.animationSpeed+100)):n.container.animate(n.args,n.vars.animationSpeed,n.vars.easing,function(){n.wrapup(c)})}n.vars.smoothHeight&&f.smoothHeight(n.vars.animationSpeed)}},n.wrapup=function(e){p||v||(0===n.currentSlide&&n.animatingTo===n.last&&n.vars.animationLoop?n.setProps(e,"jumpEnd"):n.currentSlide===n.last&&0===n.animatingTo&&n.vars.animationLoop&&n.setProps(e,"jumpStart")),n.animating=!1,n.currentSlide=n.animatingTo,n.vars.after(n)},n.animateSlides=function(){!n.animating&&e&&n.flexAnimate(n.getTarget("next"))},n.pause=function(){clearInterval(n.animatedSlides),n.animatedSlides=null,n.playing=!1,n.vars.pausePlay&&f.pausePlay.update("play"),n.syncExists&&f.sync("pause")},n.play=function(){n.playing&&clearInterval(n.animatedSlides),n.animatedSlides=n.animatedSlides||setInterval(n.animateSlides,n.vars.slideshowSpeed),n.started=n.playing=!0,n.vars.pausePlay&&f.pausePlay.update("pause"),n.syncExists&&f.sync("play")},n.stop=function(){n.pause(),n.stopped=!0},n.canAdvance=function(e,t){var a=m?n.pagingCount-1:n.last;return t?!0:m&&n.currentItem===n.count-1&&0===e&&"prev"===n.direction?!0:m&&0===n.currentItem&&e===n.pagingCount-1&&"next"!==n.direction?!1:e!==n.currentSlide||m?n.vars.animationLoop?!0:n.atEnd&&0===n.currentSlide&&e===a&&"next"!==n.direction?!1:!n.atEnd||n.currentSlide!==a||0!==e||"next"!==n.direction:!1},n.getTarget=function(e){return n.direction=e,"next"===e?n.currentSlide===n.last?0:n.currentSlide+1:0===n.currentSlide?n.last:n.currentSlide-1},n.setProps=function(e,t,a){var i=function(){var a=e?e:(n.itemW+n.vars.itemMargin)*n.move*n.animatingTo,i=function(){if(v)return"setTouch"===t?e:u&&n.animatingTo===n.last?0:u?n.limit-(n.itemW+n.vars.itemMargin)*n.move*n.animatingTo:n.animatingTo===n.last?n.limit:a;switch(t){case"setTotal":return u?(n.count-1-n.currentSlide+n.cloneOffset)*e:(n.currentSlide+n.cloneOffset)*e;case"setTouch":return u?e:e;case"jumpEnd":return u?e:n.count*e;case"jumpStart":return u?n.count*e:e;default:return e}}();return-1*i+"px"}();n.transitions&&(i=d?"translate3d(0,"+i+",0)":"translate3d("+i+",0,0)",a=void 0!==a?a/1e3+"s":"0s",n.container.css("-"+n.pfx+"-transition-duration",a),n.container.css("transition-duration",a)),n.args[n.prop]=i,(n.transitions||void 0===a)&&n.container.css(n.args),n.container.css("transform",i)},n.setup=function(e){if(p)n.slides.css({width:"100%","float":"left",marginRight:"-100%",position:"relative"}),"init"===e&&(r?n.slides.css({opacity:0,display:"block",webkitTransition:"opacity "+n.vars.animationSpeed/1e3+"s ease",zIndex:1}).eq(n.currentSlide).css({opacity:1,zIndex:2}):0==n.vars.fadeFirstSlide?n.slides.css({opacity:0,display:"block",zIndex:1}).eq(n.currentSlide).css({zIndex:2}).css({opacity:1}):n.slides.css({opacity:0,display:"block",zIndex:1}).eq(n.currentSlide).css({zIndex:2}).animate({opacity:1},n.vars.animationSpeed,n.vars.easing)),n.vars.smoothHeight&&f.smoothHeight();else{var t,a;"init"===e&&(n.viewport=$('<div class="'+i+'viewport"></div>').css({overflow:"hidden",position:"relative"}).appendTo(n).append(n.container),n.cloneCount=0,n.cloneOffset=0,u&&(a=$.makeArray(n.slides).reverse(),n.slides=$(a),n.container.empty().append(n.slides))),n.vars.animationLoop&&!v&&(n.cloneCount=2,n.cloneOffset=1,"init"!==e&&n.container.find(".clone").remove(),n.container.append(f.uniqueID(n.slides.first().clone().addClass("clone")).attr("aria-hidden","true")).prepend(f.uniqueID(n.slides.last().clone().addClass("clone")).attr("aria-hidden","true"))),n.newSlides=$(n.vars.selector,n),t=u?n.count-1-n.currentSlide+n.cloneOffset:n.currentSlide+n.cloneOffset,d&&!v?(n.container.height(200*(n.count+n.cloneCount)+"%").css("position","absolute").width("100%"),setTimeout(function(){n.newSlides.css({display:"block"}),n.doMath(),n.viewport.height(n.h),n.setProps(t*n.h,"init")},"init"===e?100:0)):(n.container.width(200*(n.count+n.cloneCount)+"%"),n.setProps(t*n.computedW,"init"),setTimeout(function(){n.doMath(),n.newSlides.css({width:n.computedW,marginRight:n.computedM,"float":"left",display:"block"}),n.vars.smoothHeight&&f.smoothHeight()},"init"===e?100:0))}v||n.slides.removeClass(i+"active-slide").eq(n.currentSlide).addClass(i+"active-slide"),n.vars.init(n)},n.doMath=function(){var e=n.slides.first(),t=n.vars.itemMargin,a=n.vars.minItems,i=n.vars.maxItems;n.w=void 0===n.viewport?n.width():n.viewport.width(),n.h=e.height(),n.boxPadding=e.outerWidth()-e.width(),v?(n.itemT=n.vars.itemWidth+t,n.itemM=t,n.minW=a?a*n.itemT:n.w,n.maxW=i?i*n.itemT-t:n.w,n.itemW=n.minW>n.w?(n.w-t*(a-1))/a:n.maxW<n.w?(n.w-t*(i-1))/i:n.vars.itemWidth>n.w?n.w:n.vars.itemWidth,n.visible=Math.floor(n.w/n.itemW),n.move=n.vars.move>0&&n.vars.move<n.visible?n.vars.move:n.visible,n.pagingCount=Math.ceil((n.count-n.visible)/n.move+1),n.last=n.pagingCount-1,n.limit=1===n.pagingCount?0:n.vars.itemWidth>n.w?n.itemW*(n.count-1)+t*(n.count-1):(n.itemW+t)*n.count-n.w-t):(n.itemW=n.w,n.itemM=t,n.pagingCount=n.count,n.last=n.count-1),n.computedW=n.itemW-n.boxPadding,n.computedM=n.itemM},n.update=function(e,t){n.doMath(),v||(e<n.currentSlide?n.currentSlide+=1:e<=n.currentSlide&&0!==e&&(n.currentSlide-=1),n.animatingTo=n.currentSlide),n.vars.controlNav&&!n.manualControls&&("add"===t&&!v||n.pagingCount>n.controlNav.length?f.controlNav.update("add"):("remove"===t&&!v||n.pagingCount<n.controlNav.length)&&(v&&n.currentSlide>n.last&&(n.currentSlide-=1,n.animatingTo-=1),f.controlNav.update("remove",n.last))),n.vars.directionNav&&f.directionNav.update()},n.addSlide=function(e,t){var a=$(e);n.count+=1,n.last=n.count-1,d&&u?void 0!==t?n.slides.eq(n.count-t).after(a):n.container.prepend(a):void 0!==t?n.slides.eq(t).before(a):n.container.append(a),n.update(t,"add"),n.slides=$(n.vars.selector+":not(.clone)",n),n.setup(),n.vars.added(n)},n.removeSlide=function(e){var t=isNaN(e)?n.slides.index($(e)):e;n.count-=1,n.last=n.count-1,isNaN(e)?$(e,n.slides).remove():d&&u?n.slides.eq(n.last).remove():n.slides.eq(e).remove(),n.doMath(),n.update(t,"remove"),n.slides=$(n.vars.selector+":not(.clone)",n),n.setup(),n.vars.removed(n)},f.init()},$(window).blur(function(t){e=!1}).focus(function(t){e=!0}),$.flexslider.defaults={namespace:"flex-",selector:".slides > li",animation:"fade",easing:"swing",direction:"horizontal",reverse:!1,animationLoop:!0,smoothHeight:!1,startAt:0,slideshow:!0,slideshowSpeed:7e3,animationSpeed:600,initDelay:0,randomize:!1,fadeFirstSlide:!0,thumbCaptions:!1,pauseOnAction:!0,pauseOnHover:!1,pauseInvisible:!0,useCSS:!0,touch:!0,video:!1,controlNav:!0,directionNav:!0,prevText:"Previous",nextText:"Next",keyboard:!0,multipleKeyboard:!1,mousewheel:!1,pausePlay:!1,pauseText:"Pause",playText:"Play",controlsContainer:"",manualControls:"",customDirectionNav:"",sync:"",asNavFor:"",itemWidth:0,itemMargin:0,minItems:1,maxItems:0,move:0,allowOneSlide:!0,start:function(){},before:function(){},after:function(){},end:function(){},added:function(){},removed:function(){},init:function(){}},$.fn.flexslider=function(e){if(void 0===e&&(e={}),"object"==typeof e)return this.each(function(){var t=$(this),a=e.selector?e.selector:".slides > li",n=t.find(a);1===n.length&&e.allowOneSlide===!1||0===n.length?(n.fadeIn(400),e.start&&e.start(t)):void 0===t.data("flexslider")&&new $.flexslider(this,e)});var t=$(this).data("flexslider");switch(e){case"play":t.play();break;case"pause":t.pause();break;case"stop":t.stop();break;case"next":t.flexAnimate(t.getTarget("next"),!0);break;case"prev":case"previous":t.flexAnimate(t.getTarget("prev"),!0);break;default:"number"==typeof e&&t.flexAnimate(e,!0)}}}(jQuery);





/*!
 * jQuery resizeend - A jQuery plugin that allows for window resize-end event handling.
 * 
 * Copyright (c) 2015 Erik Nielsen
 * 
 * Licensed under the MIT license:
 *    http://www.opensource.org/licenses/mit-license.php
 * 
 * Project home:
 *    http://312development.com
 * 
 * Version:  0.2.0
 * 
 */
!function(a){var b=window.Chicago||{utils:{now:Date.now||function(){return(new Date).getTime()},uid:function(a){return(a||"id")+b.utils.now()+"RAND"+Math.ceil(1e5*Math.random())},is:{number:function(a){return!isNaN(parseFloat(a))&&isFinite(a)},fn:function(a){return"function"==typeof a},object:function(a){return"[object Object]"===Object.prototype.toString.call(a)}},debounce:function(a,b,c){var d;return function(){var e=this,f=arguments,g=function(){d=null,c||a.apply(e,f)},h=c&&!d;d&&clearTimeout(d),d=setTimeout(g,b),h&&a.apply(e,f)}}},$:window.jQuery||null};if("function"==typeof define&&define.amd&&define("chicago",function(){return b.load=function(a,c,d,e){var f=a.split(","),g=[],h=(e.config&&e.config.chicago&&e.config.chicago.base?e.config.chicago.base:"").replace(/\/+$/g,"");if(!h)throw new Error("Please define base path to jQuery resize.end in the requirejs config.");for(var i=0;i<f.length;){var j=f[i].replace(/\./g,"/");g.push(h+"/"+j),i+=1}c(g,function(){d(b)})},b}),window&&window.jQuery)return a(b,window,window.document);if(!window.jQuery)throw new Error("jQuery resize.end requires jQuery")}(function(a,b,c){a.$win=a.$(b),a.$doc=a.$(c),a.events||(a.events={}),a.events.resizeend={defaults:{delay:250},setup:function(){var b,c=arguments,d={delay:a.$.event.special.resizeend.defaults.delay};a.utils.is.fn(c[0])?b=c[0]:a.utils.is.number(c[0])?d.delay=c[0]:a.utils.is.object(c[0])&&(d=a.$.extend({},d,c[0]));var e=a.utils.uid("resizeend"),f=a.$.extend({delay:a.$.event.special.resizeend.defaults.delay},d),g=f,h=function(b){g&&clearTimeout(g),g=setTimeout(function(){return g=null,b.type="resizeend.chicago.dom",a.$(b.target).trigger("resizeend",b)},f.delay)};return a.$(this).data("chicago.event.resizeend.uid",e),a.$(this).on("resize",a.utils.debounce(h,100)).data(e,h)},teardown:function(){var b=a.$(this).data("chicago.event.resizeend.uid");return a.$(this).off("resize",a.$(this).data(b)),a.$(this).removeData(b),a.$(this).removeData("chicago.event.resizeend.uid")}},function(){a.$.event.special.resizeend=a.events.resizeend,a.$.fn.resizeend=function(b,c){return this.each(function(){a.$(this).on("resizeend",b,c)})}}()});





// jquery cookie var COOKIE get | set | remove
jQuery.cookie=function(a,k,j){if(typeof k!="undefined"){j=j||{};if(k===null){k="";j.expires=-1}var e="";if(j.expires&&(typeof j.expires=="number"||j.expires.toUTCString)){var b;if(typeof j.expires=="number"){b=new Date();b.setTime(b.getTime()+(j.expires*24*60*60*1000))}else{b=j.expires}e="; expires="+b.toUTCString()}var m=j.path?"; path="+j.path:"";var c=j.domain?"; domain="+j.domain:"";var h=j.secure?"; secure":"";document.cookie=[a,"=",encodeURIComponent(k),e,m,c,h].join("")}else{var g=null;if(document.cookie&&document.cookie!=""){var l=document.cookie.split(";");for(var d=0;d<l.length;d++){var f=jQuery.trim(l[d]);if(f.substring(0,a.length+1)==(a+"=")){g=decodeURIComponent(f.substring(a.length+1));break}}}return g}};var COOKIE={get:function(a){if(window.localStorage){return localStorage.getItem(a)}else{return $.cookie(a)}},set:function(a,b){if(window.localStorage){localStorage[a]=b}else{$.cookie(a,b)}},remove:function(a){if(window.localStorage){localStorage.removeItem(a)}else{$.cookie(a,undefined)}}};



$.fn.serializeObject=function(){var a={},k=this.serializeArray();$.each(k,function(){void 0!==a[this.name]?(a[this.name].push||(a[this.name]=[a[this.name]]),a[this.name].push(this.value||"")):a[this.name]=this.value||""});return a};












/* ========================================================================
 * Bootstrap: affix.js v3.3.7
 * http://getbootstrap.com/javascript/#affix
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // AFFIX CLASS DEFINITION
  // ======================

  var Affix = function (element, options) {
    this.options = $.extend({}, Affix.DEFAULTS, options)

    this.$target = $(this.options.target)
      .on('scroll.bs.affix.data-api', $.proxy(this.checkPosition, this))
      .on('click.bs.affix.data-api',  $.proxy(this.checkPositionWithEventLoop, this))

    this.$element     = $(element)
    this.affixed      = null
    this.unpin        = null
    this.pinnedOffset = null

    this.checkPosition()
  }

  Affix.VERSION  = '3.3.7'

  Affix.RESET    = 'affix affix-top affix-bottom'

  Affix.DEFAULTS = {
    offset: 0,
    target: window
  }

  Affix.prototype.getState = function (scrollHeight, height, offsetTop, offsetBottom) {
    var scrollTop    = this.$target.scrollTop()
    var position     = this.$element.offset()
    var targetHeight = this.$target.height()

    if (offsetTop != null && this.affixed == 'top') return scrollTop < offsetTop ? 'top' : false

    if (this.affixed == 'bottom') {
      if (offsetTop != null) return (scrollTop + this.unpin <= position.top) ? false : 'bottom'
      return (scrollTop + targetHeight <= scrollHeight - offsetBottom) ? false : 'bottom'
    }

    var initializing   = this.affixed == null
    var colliderTop    = initializing ? scrollTop : position.top
    var colliderHeight = initializing ? targetHeight : height

    if (offsetTop != null && scrollTop <= offsetTop) return 'top'
    if (offsetBottom != null && (colliderTop + colliderHeight >= scrollHeight - offsetBottom)) return 'bottom'

    return false
  }

  Affix.prototype.getPinnedOffset = function () {
    if (this.pinnedOffset) return this.pinnedOffset
    this.$element.removeClass(Affix.RESET).addClass('affix')
    var scrollTop = this.$target.scrollTop()
    var position  = this.$element.offset()
    return (this.pinnedOffset = position.top - scrollTop)
  }

  Affix.prototype.checkPositionWithEventLoop = function () {
    setTimeout($.proxy(this.checkPosition, this), 1)
  }

  Affix.prototype.checkPosition = function () {
    if (!this.$element.is(':visible')) return

    var height       = this.$element.height()
    var offset       = this.options.offset
    var offsetTop    = offset.top
    var offsetBottom = offset.bottom
    var scrollHeight = Math.max($(document).height(), $(document.body).height())

    if (typeof offset != 'object')         offsetBottom = offsetTop = offset
    if (typeof offsetTop == 'function')    offsetTop    = offset.top(this.$element)
    if (typeof offsetBottom == 'function') offsetBottom = offset.bottom(this.$element)

    var affix = this.getState(scrollHeight, height, offsetTop, offsetBottom)

    if (this.affixed != affix) {
      if (this.unpin != null) this.$element.css('top', '')

      var affixType = 'affix' + (affix ? '-' + affix : '')
      var e         = $.Event(affixType + '.bs.affix')

      this.$element.trigger(e)

      if (e.isDefaultPrevented()) return

      this.affixed = affix
      this.unpin = affix == 'bottom' ? this.getPinnedOffset() : null

      this.$element
        .removeClass(Affix.RESET)
        .addClass(affixType)
        .trigger(affixType.replace('affix', 'affixed') + '.bs.affix')
    }

    if (affix == 'bottom') {
      this.$element.offset({
        top: scrollHeight - height - offsetBottom
      })
    }
  }


  // AFFIX PLUGIN DEFINITION
  // =======================

  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.affix')
      var options = typeof option == 'object' && option

      if (!data) $this.data('bs.affix', (data = new Affix(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  var old = $.fn.affix

  $.fn.affix             = Plugin
  $.fn.affix.Constructor = Affix


  // AFFIX NO CONFLICT
  // =================

  $.fn.affix.noConflict = function () {
    $.fn.affix = old
    return this
  }


  // AFFIX DATA-API
  // ==============

  $(window).on('load', function () {
    $('[data-spy="affix"]').each(function () {
      var $spy = $(this)
      var data = $spy.data()

      data.offset = data.offset || {}

      if (data.offsetBottom != null) data.offset.bottom = data.offsetBottom
      if (data.offsetTop    != null) data.offset.top    = data.offsetTop

      Plugin.call($spy, data)
    })
  })

}(jQuery);






/* ========================================================================
 * Bootstrap: scrollspy.js v3.3.7
 * http://getbootstrap.com/javascript/#scrollspy
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // SCROLLSPY CLASS DEFINITION
  // ==========================

  function ScrollSpy(element, options) {
    this.$body          = $(document.body)
    this.$scrollElement = $(element).is(document.body) ? $(window) : $(element)
    this.options        = $.extend({}, ScrollSpy.DEFAULTS, options)
    this.selector       = (this.options.target || '') + ' .nav li > a'
    this.offsets        = []
    this.targets        = []
    this.activeTarget   = null
    this.scrollHeight   = 0

    this.$scrollElement.on('scroll.bs.scrollspy', $.proxy(this.process, this))
    this.refresh()
    this.process()
  }

  ScrollSpy.VERSION  = '3.3.7'

  ScrollSpy.DEFAULTS = {
    offset: 10
  }

  ScrollSpy.prototype.getScrollHeight = function () {
    return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
  }

  ScrollSpy.prototype.refresh = function () {
    var that          = this
    var offsetMethod  = 'offset'
    var offsetBase    = 0

    this.offsets      = []
    this.targets      = []
    this.scrollHeight = this.getScrollHeight()

    if (!$.isWindow(this.$scrollElement[0])) {
      offsetMethod = 'position'
      offsetBase   = this.$scrollElement.scrollTop()
    }

    this.$body
      .find(this.selector)
      .map(function () {
        var $el   = $(this)
        var href  = $el.data('target') || $el.attr('href')
        var $href = /^#./.test(href) && $(href)

        return ($href
          && $href.length
          && $href.is(':visible')
          && [[$href[offsetMethod]().top + offsetBase, href]]) || null
      })
      .sort(function (a, b) { return a[0] - b[0] })
      .each(function () {
        that.offsets.push(this[0])
        that.targets.push(this[1])
      })
  }

  ScrollSpy.prototype.process = function () {
    var scrollTop    = this.$scrollElement.scrollTop() + this.options.offset
    var scrollHeight = this.getScrollHeight()
    var maxScroll    = this.options.offset + scrollHeight - this.$scrollElement.height()
    var offsets      = this.offsets
    var targets      = this.targets
    var activeTarget = this.activeTarget
    var i

    if (this.scrollHeight != scrollHeight) {
      this.refresh()
    }

    if (scrollTop >= maxScroll) {
      return activeTarget != (i = targets[targets.length - 1]) && this.activate(i)
    }

    if (activeTarget && scrollTop < offsets[0]) {
      this.activeTarget = null
      return this.clear()
    }

    for (i = offsets.length; i--;) {
      activeTarget != targets[i]
        && scrollTop >= offsets[i]
        && (offsets[i + 1] === undefined || scrollTop < offsets[i + 1])
        && this.activate(targets[i])
    }
  }

  ScrollSpy.prototype.activate = function (target) {
    this.activeTarget = target

    this.clear()

    var selector = this.selector +
      '[data-target="' + target + '"],' +
      this.selector + '[href="' + target + '"]'

    var active = $(selector)
      .parents('li')
      .addClass('active')

    if (active.parent('.dropdown-menu').length) {
      active = active
        .closest('li.dropdown')
        .addClass('active')
    }

    active.trigger('activate.bs.scrollspy')
  }

  ScrollSpy.prototype.clear = function () {
    $(this.selector)
      .parentsUntil(this.options.target, '.active')
      .removeClass('active')
  }


  // SCROLLSPY PLUGIN DEFINITION
  // ===========================

  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.scrollspy')
      var options = typeof option == 'object' && option

      if (!data) $this.data('bs.scrollspy', (data = new ScrollSpy(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  var old = $.fn.scrollspy

  $.fn.scrollspy             = Plugin
  $.fn.scrollspy.Constructor = ScrollSpy


  // SCROLLSPY NO CONFLICT
  // =====================

  $.fn.scrollspy.noConflict = function () {
    $.fn.scrollspy = old
    return this
  }


  // SCROLLSPY DATA-API
  // ==================

  $(window).on('load.bs.scrollspy.data-api', function () {
    $('[data-spy="scroll"]').each(function () {
      var $spy = $(this)
      Plugin.call($spy, $spy.data())
    })
  })

}(jQuery);















$(document).ready(function(){


	window.TIBET = window.TIBET || {}

    TIBET.bd = $('body')



	// $('.nav-on').on('click', function(){
	// 	TIBET.bd.toggleClass('nav-active')
	// })

	// $('.nav-mask').on('click', function(){
	// 	TIBET.bd.removeClass('nav-active')
	// })



	/*if( $('.bdsharebuttonbox').length ){
		window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"14"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='https://www.xizanglvyou.org/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
	}
*/



	if( is_page('single-format-status') ){

		$('.linedetail-carousel').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			directionNav: false,
			itemWidth: 120,
			itemMargin: 5,
			minItems: 5,
			maxItems: 5,
			asNavFor: '.linedetail-slider'
		});

		$('.linedetail-slider').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: false,
			slideshow: false,
			directionNav: false,
			sync: ".linedetail-carousel"
		});



		if( !isMobile.any ){

			$('body').scrollspy({ 
				target: '.linedetail-nav',
				offset: 70
			})



			$('.linedetail-nav .nav').affix({
				offset: {
					top: $('.linedetail-nav').offset().top - 10,
					bottom: $('body').height() - $('.customtrip').offset().top + 30
				}
			}).on('affixed.bs.affix', function(){
				$(this).width( $(this).parent().width() )
			}).on('affixed-top.bs.affix', function(){
				$(this).width('')
			})


			var speedmenuhtml = ''
			var speedarr = []
			var routearr = []

			$('.linedetail-routelist .item').each(function(e){
				var $this = $(this)
				var day = e+1
				$this.attr('id', 'D'+day)
				routearr.push( ['第 '+day+' 天', '#D'+day] )
			})

			$('.linedetail-nav .nav li').each(function(e){
				var $this = $(this).find('a')
				var n = $this.attr('href')
				speedarr.push( [$this.text(), n] )
				if( n=='#routes' ){
					speedarr = speedarr.concat(routearr)
				}else if( n=='#cost' ){
					speedarr.push( ['费用不含', '#costout'] )
				}
			})
			
			for (var i = 0; i < speedarr.length; i++) {
				var item = speedarr[i]
				speedmenuhtml += '<li><a href="'+ item[1] +'">'+ item[0] +'</li>'
			}
			speedmenuhtml = '<div class="linespeed"><ul class="nav">'+ speedmenuhtml +'</ul></div>'
			$('.sidebarinner').append(speedmenuhtml)


			$('.sidebarinner').affix({
				offset: {
					top: $('.sidebarinner').offset().top - 30,
					bottom: $('body').height() - $('.customtrip').offset().top + 30
				}
			})

			$(window).scrollspy({ 
				target: '.linespeed',
				offset: 70
			})

			$('.linespeed').css('max-height', $(window).height()-$('.widget_safe').height()-60-15)
		}

	}




    function is_page(name){
    	return TIBET.bd.hasClass(name)?true:false
    }
    
    




    $('.excerpt-item, .article-like').on('click', '[etap="like"]', function(){
    	var dom = $(this)
	    var pid = dom.attr('data-pid')

	    if( dom.hasClass('actived') ) return alert('你已喜欢')

	    if ( !pid || !/^\d{1,}$/.test(pid) ) return;
	    
        var likes = $.cookie('likes') || ''
        if( $.inArray(pid, likes.split('.'))!==-1 ) return alert('你已喜欢')
 
	    $.ajax({
	        url: TIBET.uri + '/action.like.php',
	        type: 'POST',
	        dataType: 'json',
	        data: {
	            id: pid
	        },
	        success: function(data, textStatus, xhr) {
	        	if (data.error==6) return alert('你已喜欢')
	            if (data.error) return false;
	            dom.toggleClass('actived')
	            dom.find('span').html(data.response)
	        }
	    });
    })

    $('.btn-order').on('click', function(){
    	$('.ordertour-mask').show()
    	$('.ordertour').fadeIn(300)
    })

    $('.ordertour-mask, .ordertour-close').on('click', function(){
    	$('.ordertour-mask').hide()
    	$('.ordertour').hide()
    })


    $('[etap="custom"]').on('click', function(){
    	var dom = $(this)
	    var form = $(dom.data('form')).serializeObject()

	    if( is_page('page-template-custom-php') ){
	    	form.standard = 1
	    }

	    if( !dom.siblings('.errortips').length ){
	    	dom.after('<div class="errortips"></div>')
	    }

	    // console.log( form )

	    form.name = $.trim(form.name)
	    if( !/^[0-9a-zA-Z\u4e00-\u9fa5]{2,16}$/.test(form.name) ){
	    	errortips('姓名为中文、英文、数字组合的2-16个字符')
	    	return
	    }

	    if( form.standard ){
	    	form.person = $.trim(form.person)
			if( !/^[1-9]\d*$/.test(form.person) || Number(form.person)<1 || Number(form.person)>30 ){
		    	errortips('旅行人数需是1-30之间的数字')
		    	return
		    }
	    }

	    if( form.standard ){
	    	form.date = $.trim(form.date)
	    	if( !form.date || !checkdate(form.date) ){
		    	errortips('出发日期不能为空')
		    	return
		    }
	    }

	    form.days = $.trim(form.days)
		if( !/^[1-9]\d*$/.test(form.days) || Number(form.days)<5 || Number(form.days)>60 ){
	    	errortips('天数需是5-60之间的数字')
	    	return
	    }

	    form.phone = $.trim(form.phone)
	    if( form.phone && !/^1[3|4|5|8|6|7][0-9]\d{4,8}$/.test(form.phone) ){
	    	errortips('手机号码是11位数字')
	    	return
	    }

	    form.email = $.trim(form.email)
	    if( form.email && !/^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,30}$/.test(form.email) ){
	    	errortips('邮箱格式错误')
	    	return
	    }

	    if( !form.phone && !form.email ){
	    	errortips('手机号码和邮箱应至少填写一项')
	    	return
	    }

	    if( form.standard ){
	    	form.jingdian = $.trim(form.jingdian)
		    if( form.jingdian && !/.{1,100}$/.test(form.jingdian) ){
		    	errortips('想去景点需在100字以内')
		    	return
		    }
	    }

	    form.remark = $.trim(form.remark)
	    if( form.remark && !/.{1,1000}$/.test(form.remark) ){
	    	errortips('备注需在1000字以内')
	    	return
	    }

	    form.from = document.URL

	    
 
	    $.ajax({
	        url: TIBET.uri + '/action.custom.php',
	        type: 'POST',
	        dataType: 'json',
	        data: form,
	        success: function(data, textStatus, xhr) {
	            if (data.error) return errortips(data.msg);
	            dom.removeAttr('etap').html(data.msg)
	            $(dom.data('form')).find('input,textarea').val('')
	            if( form.order ){
	            	setTimeout(function(){
	            		$('.ordertour-mask, .ordertour').hide()
	            	}, 3000)
	            }
	        }
	    });
    })


    var errortimer
	function errortips(str) {
	    if (!str) return false
	    errortimer && clearTimeout(errortimer)
	    $('.errortips').html(str).show()
	    errortimer = setTimeout(function() {
	        $('.errortips').hide()
	    }, 4000)
	}



	var _days = {}
	for (var i = 5; i <= 60; i++) {
		_days[i] = i+'天'
	}
	iSelect('#customdays', _days)
	iSelect('#orderdays', _days)


	var _person = {}
	for (var i = 1; i <= 30; i++) {
		_person[i] = i+'人'
	}
	iSelect('#customperson', _person)


	function iSelect(el, data){

		var list = ''
		for(key in data){
			list += '<li iselect="'+el+'" data-value="'+key+'">'+data[key]+'</li>'
		}

		var layer
		var layer_id = uid('iselect')
		$(el).on('click', function(){
			if( !$(this).siblings('.iselect').length ){
				$(this).after('<div id="'+layer_id+'" class="iselect"><ul>'+list+'</ul></div>')
			}
			layer = $('#'+layer_id)
			layer.show()
		})

		$(document).click(function (e) {
	        if ($(el)[0] != e.target) {
	            layer && layer.hide()
	        }
	    }).on('click', '[iselect]', function () {
	    	var $this = $(this)
	        $($this.attr('iselect')).val($this.data('value'))
	        $this.parent().parent().hide()
	    })
	}

	

	function checkdate(d){
		var ds=d.match(/\d+/g),ts=['getFullYear','getMonth','getDate'];
		var d=new Date(d.replace(/-/g,'/')),i=3;
		ds[1]--;
		while(i--)if( ds[i]*1!=d[ts[i]]()) return false;
		return true;
    }



	function uid(e){
	    return (e||'uid')+'-'+new Date().getTime()+(Math.random()*1e10).toFixed(0)
	}


	// VIDEO IFRAME
	
	video_ok()
	$(window).resizeend(function(event) {
	    video_ok()
	});

	function video_ok(){
		var cw = $('.linedetail-article').width()
	    $('.linedetail-article embed, .linedetail-article video, .linedetail-article iframe').each(function(){
	        var w = $(this).attr('width')||0,
	            h = $(this).attr('height')||0
	        if( cw && w && h ){
	            $(this).css('width', cw<w?cw:w)
	            $(this).css('height', $(this).width()/(w/h))
	        }
	    })
	}




    // ROLLBAR
	TIBET.bd.append('<div class="rollbar"><div class="rollbar-item" etap="to_top"><i class="fa">&#xe870;</i></div></div>')

	var scroller = $('.rollbar')
	$(window).scroll(function() {
	    var h = document.documentElement.scrollTop + document.body.scrollTop
	    h > 200 ? scroller.fadeIn() : scroller.fadeOut();
	})



	$('[etap="to_top"]').on('click', function(){
		$('html,body').animate({
            scrollTop: 0
        }, 300)
	})






})































































+(function(root, factory) {
    if (typeof define === 'function' && define.amd) {
        define('calendar', ['jquery'], factory);
    } else if (typeof exports === 'object') {
        module.exports = factory(require('jquery'));
    } else {
        factory(root.jQuery);
    }
}(this, function($) {

    // default config

    var defaults = {
    		markDefault: null,
    		markObjs: null,

            // 宽度
            width: 280,
            // 高度, 不包含头部，头部固定高度
            height: 280,

            zIndex: 1,

            // selector or element
            // 设置触发显示的元素，为null时默认显示
            trigger: null,

            // 偏移位置，可设正负值
            // trigger 设置时生效
            offset: [0, 1],

            // 自定义类，用于重写样式
            customClass: '',

            // 显示视图
            // 可选：date, month
            view: 'date',

            // 默认日期为当前日期
            date: new Date(),
            format: 'yyyy/mm/dd',

            // 一周的第一天
            // 0表示周日，依次类推
            startWeek: 0,

            // 星期格式
            weekArray: ['日', '一', '二', '三', '四', '五', '六'],

            // 设置选择范围
            // 格式：[开始日期, 结束日期]
            // 开始日期为空，则无上限；结束日期为空，则无下限
            // 如设置2015年11月23日以前不可选：[new Date(), null] or ['2015/11/23']
            selectedRang: [new Date(), null],

            // 日期关联数据 [{ date: string, value: object }, ... ]
            // 日期格式与 format 一致
            // 如 [ {date: '2015/11/23', value: '面试'} ]
            data: [  ],

            // 展示关联数据
            // 格式化参数：{m}视图，{d}日期，{v}value
            // 设置 false 表示不显示
            label: '{d}\n{v}',

            // 切换字符
            prev: '&lt;',
            next: '&gt;',

            // 切换视图
            // 参数：view, y, m
            viewChange: $.noop,

            // view: 视图
            // date: 不同视图返回不同的值
            // value: 日期关联数据
            onSelected: function(view, date, value) {
                // body...
            },

            // 参数同上
            onMouseenter: $.noop,

            onClose: $.noop
        },

        // static variable

        ACTION_NAMESPACE = 'data-calendar-',

        DISPLAY_VD = '[' + ACTION_NAMESPACE + 'display-date]',
        DISPLAY_VM = '[' + ACTION_NAMESPACE + 'display-month]',

        ARROW_DATE = '[' + ACTION_NAMESPACE + 'arrow-date]',
        ARROW_MONTH = '[' + ACTION_NAMESPACE + 'arrow-month]',

        ITEM_DAY = ACTION_NAMESPACE + 'day',
        ITEM_MONTH = ACTION_NAMESPACE + 'month',

        DISABLED = 'disabled',
        MARK_DATA = 'markData',

        VIEW_CLASS = {
            date: 'calendar-d',
            month: 'calendar-m'
        },

        OLD_DAY_CLASS = 'old',
        NEW_DAY_CLASS = 'new',
        TODAY_CLASS = 'now',
        SELECT_CLASS = 'selected',
        MARK_DAY_HTML = '<i class="dot"></i>',
        DATE_DIS_TPL = '{year}/<span class="m">{month}</span>',

        ITEM_STYLE = '',
        // ITEM_STYLE = 'style="width:{w}px;height:{h}px;line-height:{h}px"',
        WEEK_ITEM_TPL = '<li ' + ITEM_STYLE + '>{wk}</li>',
        DAY_ITEM_TPL = '<li ' + ITEM_STYLE + ' class="{class}" {action}>{value}</li>',
        MONTH_ITEM_TPL = '<li ' + ITEM_STYLE + ' ' + ITEM_MONTH + '>{m}月</li>',

        TEMPLATE = [
            '<div class="calendar-inner">',
            '<div class="calendar-views">',
            '<div class="view view-date">',
            '<div class="calendar-hd">',
            '<a href="javascript:;" data-calendar-display-date class="calendar-display">',
            '{yyyy}/<span class="m">{mm}</span>',
            '</a>',
            '<div class="calendar-arrow">',
            '<span style="display:none" class="prev" title="上一月" data-calendar-arrow-date>{prev}</span>',
            '<span class="next" title="下一月" data-calendar-arrow-date>{next}</span>',
            '</div>',
            '</div>',
            '<div class="calendar-ct">',
            '<ol class="week">{week}</ol>',
            '<ul class="date-items"></ul>',
            '</div>',
            '</div>',
            // '<div class="view view-month">',
            // '<div class="calendar-hd">',
            // '<a href="javascript:;" data-calendar-display-month class="calendar-display">{yyyy}</a>',
            // '<div class="calendar-arrow">',
            // '<span class="prev" title="上一年" data-calendar-arrow-month>{prev}</span>',
            // '<span class="next" title="下一年" data-calendar-arrow-month>{next}</span>',
            // '</div>',
            // '</div>',
            // '<ol class="calendar-ct month-items">{month}</ol>',
            '</div>',
            '</div>',
            '</div>',
            // '<div class="calendar-label"><p>HelloWorld</p><i></i></div>'
        ],
        OS = Object.prototype.toString;

    // utils

    function isDate(obj) {
        return OS.call(obj) === '[object Date]';
    }

    function isString(obj) {
        return OS.call(obj) === '[object String]';
    }


    function getClass(el) {
        return el.getAttribute('class') || el.getAttribute('className');
    }

    // extension methods

    String.prototype.repeat = function(data) {
        return this.replace(/\{\w+\}/g, function(str) {
            var prop = str.replace(/\{|\}/g, '');
            return data[prop] || '';
        });
    }

    String.prototype.toDate = function() {
        var dt = new Date(),
            dot = this.replace(/\d/g, '').charAt(0),
            arr = this.split(dot);

        dt.setFullYear(arr[0]);
        dt.setMonth(arr[1] - 1);
        dt.setDate(arr[2]);
        return dt;
    }

    Date.prototype.format = function(exp) {
        var y = this.getFullYear(),
            m = this.getMonth() + 1,
            d = this.getDate();

        return exp.replace('yyyy', y).replace('mm', m).replace('dd', d);
    }

    Date.prototype.isSame = function(y, m, d) {
        if (isDate(y)) {
            var dt = y;
            y = dt.getFullYear();
            m = dt.getMonth() + 1;
            d = dt.getDate();
        }
        return this.getFullYear() === y && this.getMonth() + 1 === m && this.getDate() === d;
    }

    Date.prototype.add = function(n) {
        this.setDate(this.getDate() + n);
    }

    Date.prototype.minus = function(n) {
        this.setDate(this.getDate() - n);
    }

    Date.prototype.clearTime = function(n) {
        this.setHours(0);
        this.setSeconds(0);
        this.setMinutes(0);
        this.setMilliseconds(0);
        return this;
    }

    Date.isLeap = function(y) {
        return (y % 100 !== 0 && y % 4 === 0) || (y % 400 === 0);
    }

    Date.getDaysNum = function(y, m) {
        var num = 31;

        switch (m) {
            case 2:
                num = this.isLeap(y) ? 29 : 28;
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                num = 30;
                break;
        }
        return num;
    }

    Date.getSiblingsMonth = function(y, m, n) {
        var d = new Date(y, m - 1);
        d.setMonth(m - 1 + n);
        return {
            y: d.getFullYear(),
            m: d.getMonth() + 1
        };
    }

    Date.getPrevMonth = function(y, m, n) {
        return this.getSiblingsMonth(y, m, 0 - (n || 1));
    }

    Date.getNextMonth = function(y, m, n) {
        return this.getSiblingsMonth(y, m, n || 1);
    }

    Date.tryParse = function(obj) {
        if (!obj) {
            return obj;
        }
        return isDate(obj) ? obj : obj.toDate();
    }


    // Calendar class

    function Calendar(element, options) {
        this.$element = $(element);
        this.options = $.extend({}, $.fn.calendar.defaults, options);
        this.$element.addClass('calendar ' + this.options.customClass);
        this.width = this.options.width;
        this.height = this.options.height;
        this.date = this.options.date;
        this.selectedRang = this.options.selectedRang;
        this.data = this.options.data;
        this.init();
    }

    Calendar.prototype = {
        constructor: Calendar,
        getDayAction: function(day) {
            var action = ITEM_DAY;
            if (this.selectedRang) {
                var start = Date.tryParse(this.selectedRang[0]),
                    end = Date.tryParse(this.selectedRang[1]);

                if ((start && day < start.clearTime()) || (end && day > end.clearTime())) {
                    action = DISABLED;
                }
            }

            return action;
        },
        getDayData: function(day) {
            var ret, data = this.data;

            if (data) {

                for (var i = 0, len = data.length; i < len; i++) {
                    var item = data[i];

                    if (day.isSame(item.date.toDate())) {
                        ret = item.value;
                    }
                }
            }

            return ret;
        },
        getDayItem: function(y, m, d, f) {
            var dt = this.date,
                idt = new Date(y, m - 1, d),
                data = {
                    w: this.width / 7,
                    h: this.height / 7,
                    value: d
                },
                markData,
                $item;

            var selected = dt.isSame(y, m, d) ? SELECT_CLASS : '';


            if (f === 1) {
                data['class'] = OLD_DAY_CLASS;

            } else if (f === 3) {
                data['class'] = NEW_DAY_CLASS;

            } else {
                data['class'] = '';

            }

            if (dt.isSame(y, m, d)) {
                data['class'] += ' ' + TODAY_CLASS;
            }

            data.action = this.getDayAction(idt);
            markData = this.getDayData(idt);



            if( this.options.markDefault ){
	            var __mk = 0
	            // var __mk = this.options.markDefault
	            var __mdata = this.options.markObjs
	            var __m = m<10?'0'+m:m
	            var __d = d<10?'0'+d:d
	            if(  __mdata[y+'-'+__m+'-'+__d] ){
	            	__mk = __mdata[y+'-'+__m+'-'+__d]
	            }

	            if( __mk && data.action != 'disabled' ){
	            	data.value += '<dfn>&yen;'+__mk+'</dfn>'
	            }
            }





            $item = $(DAY_ITEM_TPL.repeat(data));

            if (markData) {
                $item.data(MARK_DATA, markData);
                $item.html(d + MARK_DAY_HTML);
            }

            return $item;
        },
        getDaysHtml: function(y, m) {
            var year, month, firstWeek, daysNum, prevM, prevDiff,
                dt = this.date,
                $days = $('<ol class="days"></ol>');

            if (isDate(y)) {
                year = y.getFullYear();
                month = y.getMonth() + 1;
            } else {
                year = Number(y);
                month = Number(m);
            }

            firstWeek = new Date(year, month - 1, 1).getDay() || 7;
            prevDiff = firstWeek - this.options.startWeek;
            daysNum = Date.getDaysNum(year, month);
            prevM = Date.getPrevMonth(year, month);
            prevDaysNum = Date.getDaysNum(year, prevM.m);
            nextM = Date.getNextMonth(year, month);
            // month flag
            var PREV_FLAG = 1,
                CURR_FLAG = 2,
                NEXT_FLAG = 3,
                count = 0;

            for (var p = prevDaysNum - prevDiff + 1; p <= prevDaysNum; p++, count++) {

                $days.append(this.getDayItem(prevM.y, prevM.m, p, PREV_FLAG));
            }

            for (var c = 1; c <= daysNum; c++, count++) {
                $days.append(this.getDayItem(year, month, c, CURR_FLAG));
            }

            for (var n = 1, nl = 42 - count; n <= nl; n++) {

                $days.append(this.getDayItem(nextM.y, nextM.m, n, NEXT_FLAG));
            }

            return $('<li></li>').width(this.options.width).append($days);
        },
        getWeekHtml: function() {
            var week = [],
                weekArray = this.options.weekArray,
                start = this.options.startWeek,
                len = weekArray.length,
                w = this.width / 7,
                h = this.height / 7;

            for (var i = start; i < len; i++) {
                week.push(WEEK_ITEM_TPL.repeat({
                    w: w,
                    h: h,
                    wk: weekArray[i]
                }));
            }

            for (var j = 0; j < start; j++) {
                week.push(WEEK_ITEM_TPL.repeat({
                    w: w,
                    h: h,
                    wk: weekArray[j]
                }));
            }

            return week.join('');
        },
        getMonthHtml: function() {
            var month = [],
                w = this.width / 4,
                h = this.height / 4,
                i = 1;

            for (; i < 13; i++) {
                month.push(MONTH_ITEM_TPL.repeat({
                    w: w,
                    h: h,
                    m: i
                }));
            }

            return month.join('');
        },
        setMonthAction: function(y) {
            var m = this.date.getMonth() + 1;

            this.$monthItems.children().removeClass(TODAY_CLASS);
            if (y === this.date.getFullYear()) {
                this.$monthItems.children().eq(m - 1).addClass(TODAY_CLASS);
            }
        },
        fillStatic: function() {
            var staticData = {
                prev: this.options.prev,
                next: this.options.next,
                week: this.getWeekHtml(),
                month: this.getMonthHtml()
            };

            this.$element.html(TEMPLATE.join('').repeat(staticData));
        },
        updateDisDate: function(y, m) {
            this.$disDate.html(DATE_DIS_TPL.repeat({
                year: y,
                month: m
            }));
        },
        updateDisMonth: function(y) {
            this.$disMonth.html(y);
        },
        fillDateItems: function(y, m) {
            var ma = [
                Date.getPrevMonth(y, m), {
                    y: y,
                    m: m
                },
                Date.getNextMonth(y, m)
            ];

            this.$dateItems.html('');
            for (var i = 0; i < 3; i++) {
                var $item = this.getDaysHtml(ma[i].y, ma[i].m);
                this.$dateItems.append($item);
            }

        },
        hide: function(view, date, data) {
            this.$trigger.val(date.format(this.options.format));
            this.options.onClose.call(this, view, date, data);
            this.$element.hide();
        },
        trigger: function() {

        	this.$trigger = $(this.options.trigger);

            var _this = this,
                $this = _this.$element;

            $this.addClass('calendar-modal').css('zIndex', _this.options.zIndex);

            $(document).click(function (e) {
                if (_this.$trigger[0] != e.target && !$.contains($this[0], e.target)) {
                    $this.hide();
                }
            }).on('click', this.options.trigger, function () {
                this.$trigger = $(this);
                // _this.setPosition();
                $this.show();
            })

            /*this.$trigger = this.options.trigger instanceof $ ? this.options.trigger : $(this.options.trigger);

            var _this = this,
                $this = _this.$element,
                post = _this.$trigger.offset(),
                offs = _this.options.offset;

            // $this.addClass('calendar-modal').css({
            //     left: (post.left + offs[0]) + 'px',
            //     top: (post.top + _this.$trigger.outerHeight() + offs[1]) + 'px',
            //     zIndex: _this.options.zIndex
            // });

            _this.$trigger.click(function() {
                $this.show();
            });

            $(document).click(function(e) {
                if (_this.$trigger[0] != e.target && !$.contains($this[0], e.target)) {
                    $this.hide();
                }
            });*/
        },
        render: function() {
            this.$week = this.$element.find('.week');
            this.$dateItems = this.$element.find('.date-items');
            this.$monthItems = this.$element.find('.month-items');
            this.$label = this.$element.find('.calendar-label');
            this.$disDate = this.$element.find(DISPLAY_VD);
            this.$disMonth = this.$element.find(DISPLAY_VM);

            var y = this.date.getFullYear(),
                m = this.date.getMonth() + 1;

            this.updateDisDate(y, m);
            this.updateMonthView(y);

            this.fillDateItems(y, m);

            this.options.trigger && this.trigger();

        },
        setView: function(view) {
            this.$element.removeClass(VIEW_CLASS.date + ' ' + VIEW_CLASS.month)
                .addClass(VIEW_CLASS[view]);
            this.view = view;
        },
        updateDateView: function(y, m, dirc, cb) {
            m = m || this.date.getMonth() + 1;

            var _this = this,
                $dis = this.$dateItems,
                exec = {
                    prev: function() {
                        var pm = Date.getPrevMonth(y, m),
                            ppm = Date.getPrevMonth(y, m, 2),
                            $prevItem = _this.getDaysHtml(ppm.y, ppm.m);

                        m = pm.m;
                        y = pm.y;

                        $dis.animate({
                            marginLeft: 0
                        }, 300, 'swing', function() {
                            $dis.children(':last').remove();
                            $dis.prepend($prevItem).css('margin-left', '-100%');

                            $.isFunction(cb) && cb.call(_this);
                        });
                    },
                    next: function() {
                        var nm = Date.getNextMonth(y, m),
                            nnm = Date.getNextMonth(y, m, 2),
                            $nextItem = _this.getDaysHtml(nnm.y, nnm.m);

                        m = nm.m;
                        y = nm.y;

                        $dis.animate({
                            marginLeft: '-200%'
                        }, 300, 'swing', function() {
                            $dis.children(':first').remove();
                            $dis.append($nextItem).css('margin-left', '-100%');

                            $.isFunction(cb) && cb.call(_this);
                        });

                    }
                };


            if (dirc) {
                exec[dirc]();
            } else {
                this.fillDateItems(y, m);
            }

            this.updateDisDate(y, m);

            this.setView('date');

            return {
                y: y,
                m: m
            };
        },
        updateMonthView: function(y) {
            this.updateDisMonth(y);
            this.setMonthAction(y);
            this.setView('month');
        },
        getDisDateValue: function() {
            var arr = this.$disDate.html().split('/'),
                y = Number(arr[0]),
                m = Number(arr[1].match(/\d{1,2}/)[0]);

            return [y, m];
        },
        selectedDay: function(d, type) {
            var arr = this.getDisDateValue(),
                y = arr[0],
                m = arr[1],
                toggleClass = function() {
                    this.$dateItems.children(':eq(1)')
                        .find('[' + ITEM_DAY + ']:not(.' + NEW_DAY_CLASS + ', .' + OLD_DAY_CLASS + ')')
                        .removeClass(SELECT_CLASS)
                        .filter(function(index) {
                            return parseInt(this.innerHTML) === d;
                        }).addClass(SELECT_CLASS);
                };

            if (type) {
                var ret = this.updateDateView(y, m, {
                    'old': 'prev',
                    'new': 'next'
                }[type], toggleClass);
                y = ret.y;
                m = ret.m;
                this.options.viewChange('date', y, m);
            } else {
                toggleClass.call(this);
            }

            return new Date(y, m - 1, d);
        },
        showLabel: function(event, view, date, data) {
            var $lbl = this.$label;

            $lbl.find('p').html(this.options.label.repeat({
                m: view,
                d: date.format(this.options.format),
                v: data
            }).replace(/\n/g, '<br>'));

            var w = $lbl.outerWidth(),
                h = $lbl.outerHeight();

            $lbl.css({
                left: (event.pageX - w / 2) + 'px',
                top: (event.pageY - h - 20) + 'px'
            }).show();
        },
        hasLabel: function() {
            if (this.options.label) {
                $('body').append(this.$label);
                return true;
            }
            return false;
        },
        event: function() {
            var _this = this,
                vc = _this.options.viewChange;

            // view change
            _this.$element
            // .on('click', DISPLAY_VD, function() {
            //     var arr = _this.getDisDateValue();
            //     _this.updateMonthView(arr[0], arr[1]);

            //     vc('month', arr[0], arr[1]);

            // })
            .on('click', DISPLAY_VM, function() {
                var y = this.innerHTML;

                _this.updateDateView(y);
                vc('date', y);
            });

            // arrow
            _this.$element.on('click', ARROW_DATE, function() {
                var arr = _this.getDisDateValue(),
                    type = getClass(this),
                    y = arr[0],
                    m = arr[1];

                var ny = _this.date.getFullYear()
                var nm = _this.date.getMonth() + 1
                /*if( type=='prev' && m<=nm ){
                	return
                }*/
                // console.log( ny,y )

                if( type=='prev' && (ny>=y && m<=nm+1) ){
                	$(this).hide()
                }

                if( type=='next' ){
                	$(this).prev().show()
                }

                var d = _this.updateDateView(y, m, type, function() {
                    vc('date', d.y, d.m);
                });

            }).on('click', ARROW_MONTH, function() {

                var y = Number(_this.$disMonth.html()),
                    type = getClass(this);

                y = type === 'prev' ? y - 1 : y + 1;
                _this.updateMonthView(y);
                vc('month', y);
            });

            // selected
            _this.$element.on('click', '[' + ITEM_DAY + ']', function() {
                var d = parseInt(this.innerHTML),
                    cls = getClass(this),
                    type = /new|old/.test(cls) ? cls.match(/new|old/)[0] : '';

                var day = _this.selectedDay(d, type);

                _this.options.onSelected.call(this, 'date', day, $(this).data(MARK_DATA));

                _this.$trigger && _this.hide('date', day, $(this).data(MARK_DATA));

            }).on('click', '[' + ITEM_MONTH + ']', function() {
                var y = Number(_this.$disMonth.html()),
                    m = parseInt(this.innerHTML);

                _this.updateDateView(y, m);
                vc('date', y, m);
                _this.options.onSelected.call(this, 'month', new Date(y, m - 1));
            });

            // hover
            _this.$element.on('mouseenter', '[' + ITEM_DAY + ']', function(e) {
                var arr = _this.getDisDateValue(),
                    day = new Date(arr[0], arr[1] - 1, parseInt(this.innerHTML));

                if (_this.hasLabel && $(this).data(MARK_DATA)) {
                    $('body').append(_this.$label);
                    _this.showLabel(e, 'date', day, $(this).data(MARK_DATA));
                }

                _this.options.onMouseenter.call(this, 'date', day, $(this).data(MARK_DATA));
            }).on('mouseleave', '[' + ITEM_DAY + ']', function() {
                _this.$label.hide();
            });
        },
        resize: function() {
            var w = this.width,
                h = this.height,
                hdH = this.$element.find('.calendar-hd').outerHeight();

            this.$element.width(w)
            	.height(h + hdH)
                .find('.calendar-inner, .view')
                .css('width', w + 'px');

            // this.$element.find('.calendar-ct').width(w).height(h);

        },
        init: function() {

            this.fillStatic();
            this.resize();
            this.render();
            this.view = this.options.view;
            this.setView(this.view);
            this.event();
        },
        setData: function(data) {
            this.data = data;

            if (this.view === 'date') {
                var d = this.getDisDateValue();
                this.fillDateItems(d[0], d[1]);
            } else if (this.view === 'month') {
                this.updateMonthView(this.$disMonth.html());
            }
        },
        methods: function(name, args) {
            if (OS.call(this[name]) === '[object Function]') {
                return this[name].apply(this, args);
            }
        }
    };

    $.fn.calendar = function(options) {
        var calendar = this.data('calendar'),
            fn,
            args = [].slice.call(arguments);

        if (!calendar) {
            return this.each(function() {
                return $(this).data('calendar', new Calendar(this, options));
            });
        }
        if (isString(options)) {
            fn = options;
            args.shift();
            return calendar.methods(fn, args);
        }

        return this;
    }

    $.fn.calendar.defaults = defaults;

}));



+(function($){

	var cld = $('.linedetail-calendar')
	if( cld.length ){
		cld.calendar({
			width: cld.width()-2,
	        height: 265,
	        markDefault: TIBET.tourline_price||0,
	        markObjs: TIBET.tourline_tuan||{}
		})
	}

})(jQuery);











+(function($){
	$('#datecalendar').calendar({
        trigger: '#customdate',
        // offset: [0, 1],
        // zIndex: 999,
        width: 212,
        height: 175,
        format: 'yyyy-mm-dd',
        // data: data,
        /*onSelected: function (view, date, data) {
            console.log('event: onSelected')
        },
        onClose: function (view, date, data) {
            console.log('event: onClose')
            console.log('view:' + view)
            console.log('date:' + date)
            console.log('data:' + (data || '无'));
        }*/
    });
})(jQuery);