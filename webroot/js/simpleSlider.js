//
//
//	simpleSlide 1.6
//
//	website:http://www.simplesli.de/
//	author: David Drew
//	email:  david@ddrewdesign.com
//	
//
//	simpleSlide is a jQuery plugin that addresses the problem of lack of designer control over
//  their slideshow plugin. The philosophy was to create a plugin that would take care of the
//	mundane issues of instantiating a slideshow plugin, but make it easy for a designer to
//	manipulate the parts of the process that they would want control over, such as visual
//	treatment, integration and additional functionality.
//
//	Parameters
//	----------
//
//	simpleSlide is instantiated, at minimum, like this:
//	
//	simpleSlide();
//
//	Upon activating this function, simpleSlide goes into your DOM and finds several key
//	elements. The simpleSlide HTML structure (and key elements) will look like this:
//
//	<div class="simpleSlide-window" rel="group_name">
//		<div class="simpleSlide-tray" rel="group_name">
//			<div class="simpleSlide-slide" rel="group_name">
//				/* Individual slide content. If content is merely an image, simpleSlide will
//				 * automatically configure each slide to accommodate the slide. If you have
//				 * opted to create content that doesn't have an apparent width or height, it
//				 * it may be in your best interest to give this content a defined width and
//				 * height. You do not, however, need to define the "simpleSlide-slide" class'
//				 * width and height. The function will take care of that for you.
//				 */
//			</div>
//		</div>
//	</div>
//
//	The user may also instantiate a graphical representative element vis-a-vis the simpleSlide
//	status element. This element is entirely optional, and will or will not be placed based on the
//	user's desire to place the following elements into their HTML:
//
//	<div class="simpleSlideStatus-tray" rel="group_name">
//		<div class="simpleSlideStatus-window" rel="group_name"></div>
//	</div>
//	
//	Please visit http://www.simplesli.de and click on "features" for more configuration information.
//
//	It should be noted, however, that after simpleSlide() has processed this structure, each slide
//  will house an "alt" attribute with an integer as its value. This integer (counting up from '1')
//	represents that slide's "page" placement among the slides in the window. This is to help the
//	designer set up functionality that allows page jumping.
//
//	The buttons that control the slideshow may be used in whatever manner you wish, and anywhere
//	in the site's structure that you wish to place them. They only must have the same "rel" as
//	the window (and accompanying elements) you wish for them to control. simpleSlide() automatically
//	treats them as clickable regions. "jump-to" is special in that you also have to pass the
//	desired "jump-to" page through the "alt" attribute.
//	
//	<div class="left-button" rel="group_name"></div>
//	<div class="right-button" rel="group_name"></div>
//  <div class="jump-to" rel="group_name" alt="1"></div>
//
//	The user is also allowed several options that they may customize. They are instantiated like this:
//	
//	simpleSlide({
//		'status_width': 20,				// Integer. Sets the width of the status slideshow's window element.
//		'status_color_inside': '#000', 	// String. Sets color of status window element.
//		'status_color_outside': '#FFF', // String. Sets color of status tray element.
//		'set_speed': 500, 				// Integer. Sets speed of all animations. Represented in milliseconds.
//		'fullscreen' : 'false',			// String. 'true' sets slide window for full screen. For obvious reasons, cannot
//										   work with more than one simpleSlide window per page.
//		'swipe' : 'false', 				// String. 'true' turns on swipe functionality for touch devices.
//		'callback': 'function()'		// String. Sets callback to actuate after simpleSlide initial config.
//	});
//
//	If you have any further questions on the usage of simpleSlide, or suggestions on making it better,
//	please e-mail me at david@ddrewdesign.com, or visit http://www.ddrewdesign.com/contact/ to email me.
//	Thank you for using this plugin, and I hope you enjoy it. I had a blast making it.
//
// Auto transition functionality provided by Isioma Nnodum isioma.u.nnodum@gmail.com
// 

function simpleSlide(e){jQuery(function($){var b={'status_width':20,'status_color_inside':'#fff','status_color_outside':'#aaa','set_speed':500,'fullscreen':'false','swipe':'false','callback':'function()'};$.extend(b,e);$.ss_options=b;$('.simpleSlide-slide').css('opacity','0');$('.simpleSlide-tray').css('margin','0');$('.simpleSlide-window').prepend('<span id="ssLoading" style="color: #808080;font-family:Helvetica, Arial, sans-serif;font-size: 12px; margin: 10px 0 0 10px;display: block">Loading slides...</span>');var c=$('.simpleSlide-slide img').size();if(c>0){var d=new Array();var i=0;$('.simpleSlide-slide img').each(function(){d[i]=$(this).attr('src');i++});i=0;$(d).each(function(){var a=new Image();a.src=d[i];if(a.complete){c--;i++;if(c==0){ssInit()}}else{$(a).load(function(){c--;i++;if(c==0){ssInit()}})}})}else{ssInit()}})};function ssInit(){jQuery(function($){$('.simpleSlide-window').each(function(){if($.ss_options.fullscreen=='true'){$('body').css('overflow','hidden')}var a=$(this).html();var b=removeWhiteSpace(a);$(this).html(b);var c=$(this).find('.simpleSlide-slide').size();$(this).find('.simpleSlide-slide').css('display','block');var d=$(this).find('.simpleSlide-slide').first().outerHeight();if($.ss_options.fullscreen=='true'){fullScreen(this)};$(this).find('.simpleSlide-slide').css({'display':'inline','float':'left'});var e=$(this).find('.simpleSlide-slide').first().outerWidth();var f=$(this).attr('rel');if($.ss_options.fullscreen=='false'){$(this).css({'height':d,'width':e,'position':'relative'})};$(this).css('overflow','hidden');setTraySize(this,c,e);setSimpleSlideStatus(f,d,e,c);setPaging(this);$(this).find('#ssLoading').remove();if($.ss_options.swipe=='true'&&!$.browser.msie){simpleSwipe(this)};$(this).find('.simpleSlide-slide').animate({'opacity':'1'},300,"swing")});if(typeof($.ss_options.callback)=='function'){$.ss_options.callback.call(this)};function setPaging(a){var b=1;$(a).find('.simpleSlide-slide').each(function(){$(this).attr('alt',b);b++})};function fullScreen(a){var b=new Image();b.src=$(a).find('img').first().attr('src');var c=$(window).width()/$(window).height();var d=b.width/b.height;var e=$(window).height();var f=$(window).width();if(c>d){var g=(f/b.width)*b.height;var h=(g-e)/2;$(a).find('img').attr('width',f).attr('height',g).css('marginLeft',0);$(a).css({'marginLeft':0,'marginTop':'-'+h+'px','height':e+h});$(a).find('.simpleSlide-slide').css({'width':f,'height':g,'overflow':'hidden'})}else{var i=(e/b.height)*b.width;var j=(i-f)/2;$(a).find('img').attr('height',e).attr('width',i);$(a).find('img').css({'marginLeft':'-'+j+'px'});$(a).find('.simpleSlide-slide').css({'width':f,'height':e,'overflow':'hidden'});$(a).css({'marginTop':0,'height':e})};$(a).find('.simpleSlide-tray').css('marginLeft',0)};function setTraySize(a,b,c){var d=b*c;$(a).find('.simpleSlide-tray').css({'width':d+'px'});$(a).find('.simpleSlide-slide').css('display','inline-block')};function setSimpleSlideStatus(a,b,c,d){var e=$.ss_options.status_width/c;var f=e*b;$('.simpleSlideStatus-tray[rel="'+a+'"]').css({'width':$.ss_options.status_width*d,'height':f,'background-color':$.ss_options.status_color_outside});$('.simpleSlideStatus-window[rel="'+a+'"]').css({'width':$.ss_options.status_width,'height':f,'background-color':$.ss_options.status_color_inside});if(jQuery.support.opacity){$('.simpleSlideStatus-window .simpleSlideStatus-tray[rel="'+a+'"]').css({'opacity':'.5','background-color':$.ss_options.status_color_inside})};if(!jQuery.support.opacity){$('.simpleSlideStatus-window .simpleSlideStatus-tray[rel="'+a+'"]').css({'filter':'alpha(opacity=50)','background-color':$.ss_options.status_color_inside})}};$('.left-button, .right-button, .jump-to').live('click',function(){var a=$(this).attr('rel');if(!$('div.simpleSlide-tray[rel="'+a+'"]').is(':animated')){simpleSlideAction(this,a)}})})};function simpleSwipe(f){var g={threshold:{x:$(f).width()*.15,y:$(f).height()*.1},swipeLeft:function(){simpleSlideAction('.right-button',$(f).attr('rel'))},swipeRight:function(){simpleSlideAction('.left-button',$(f).attr('rel'))},preventDefaultEvents:true};var h=$.extend(g,h);if(!f)return false;return $(f).each(function(){var c=$(f);var d={x:0,y:0};var e={x:0,y:0};function touchStart(a){d.x=a.targetTouches[0].pageX;d.y=a.targetTouches[0].pageY};function touchMove(a){if(g.preventDefaultEvents){a.preventDefault()};e.x=a.targetTouches[0].pageX;e.y=a.targetTouches[0].pageY};function touchEnd(a){var b=d.y-e.y;if(b<g.threshold.y&&b>(g.threshold.y*-1)){changeX=d.x-e.x;if(changeX>g.threshold.x){g.swipeLeft()};if(changeX<(g.threshold.x*-1)){g.swipeRight()}}};function touchCancel(a){console.log('Canceling swipe gesture...')};f.addEventListener("touchstart",touchStart,false);f.addEventListener("touchmove",touchMove,false);f.addEventListener("touchend",touchEnd,false);f.addEventListener("touchcancel",touchCancel,false)})};function simpleSlideAction(p,q){jQuery(function($){var d=$.ss_options.set_speed;var e=$('.simpleSlide-window[rel="'+q+'"]').find('.simpleSlide-slide').size();var f=$('.simpleSlide-window[rel="'+q+'"]').innerWidth();var g=$('.simpleSlideStatus-window[rel="'+q+'"]').innerWidth();var h=g*e;var i=parseInt($('.simpleSlide-tray[rel="'+q+'"]').css('marginLeft'),10);var j=parseInt($('.simpleSlideStatus-tray .simpleSlideStatus-window[rel="'+q+'"]').css('marginLeft'),10);var k=parseInt($('.simpleSlideStatus-window .simpleSlideStatus-tray[rel="'+q+'"]').css('marginLeft'),10);if($(p).is('.jump-to')){var l=$(p).attr('alt');var m=(l-1)*(f*(-1));var n=(l-1)*(g*(-1));var o=(l-1)*(g);move(m,o,n)};if($(p).is('.left-button')){if(i==0){var m=i-((e-1)*f);var n=k-((e-1)*g);var o=j+((e-1)*g)}else{var m=i+f;var n=k+g;var o=j-g};move(m,o,n)};if($(p).is('.right-button')){if(i==(e-1)*(f*-1)){var m=0;var n=0;var o=0}else{var m=i-f;var n=k-g;var o=j+g};move(m,o,n)};function move(a,b,c){$('.simpleSlide-tray[rel="'+q+'"]').animate({'marginLeft':a},d,"swing");$('.simpleSlideStatus-window .simpleSlideStatus-tray[rel="'+q+'"]').animate({'marginLeft':c},d,"swing");$('.simpleSlideStatus-tray .simpleSlideStatus-window[rel="'+q+'"]').animate({'marginLeft':b},d,"swing")}})};function removeWhiteSpace(a){var b=a.replace(/[\r+\n+\t+]\s\s+/g,"");return b};


simpleSlide({'swipe':'true', 'set_speed': 1000});
			
var hovering = false; // flag that determines when hovering

$('.slideshow').live('mouseover mouseout', 
	function(event) {
		if(event.type == 'mouseover'){
			$(this).children('.left-button, .right-button').stop(true, true).fadeIn();
			hovering = true; // hovering
		}
		else {
			$(this).children('.left-button, .right-button').stop(true, true).fadeOut();
			hovering = false; // not hovering anymore
		}
	}
);
// Allow auto transition by simulating a right click

setInterval(function() { 
	
	if (!hovering) {
		$('.right-button').trigger('click');
	}
	
}, 6000);