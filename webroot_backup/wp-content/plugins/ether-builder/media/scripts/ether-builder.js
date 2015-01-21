var ether = ether || {};

var ua = navigator.userAgent.toLowerCase();
var isie = /msie/.test(ua);
var iev = parseFloat((ua.match(/.*(?:rv|ie)[\/: ](.+?)([ \);]|$)/) || [])[1]);

ether.ua = ether.ua || ua;
ether.isie = ether.isie || isie;
ether.iev = ether.iev || iev;
ether.prefix = ether.prefix || 'ether';


(function($)
{
	if(jQuery.easing.easeInQuad)
		return
	
	jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,a,c,b,d){return jQuery.easing[jQuery.easing.def](e,a,c,b,d)},easeInQuad:function(e,a,c,b,d){return b*(a/=d)*a+c},easeOutQuad:function(e,a,c,b,d){return-b*(a/=d)*(a-2)+c},easeInOutQuad:function(e,a,c,b,d){if((a/=d/2)<1)return b/2*a*a+c;return-b/2*(--a*(a-2)-1)+c},easeInCubic:function(e,a,c,b,d){return b*(a/=d)*a*a+c},easeOutCubic:function(e,a,c,b,d){return b*((a=a/d-1)*a*a+1)+c},easeInOutCubic:function(e,a,c,b,d){if((a/=d/2)<1)return b/2*a*a*a+c;return b/2*((a-=2)*a*a+2)+c},easeInQuart:function(e,a,c,b,d){return b*(a/=d)*a*a*a+c},easeOutQuart:function(e,a,c,b,d){return-b*((a=a/d-1)*a*a*a-1)+c},easeInOutQuart:function(e,a,c,b,d){if((a/=d/2)<1)return b/2*a*a*a*a+c;return-b/2*((a-=2)*a*a*a-2)+c},easeInQuint:function(e,a,c,b,d){return b*(a/=d)*a*a*a*a+c},easeOutQuint:function(e,a,c,b,d){return b*((a=a/d-1)*a*a*a*a+1)+c},easeInOutQuint:function(e,a,c,b,d){if((a/=d/2)<1)return b/2*a*a*a*a*a+c;return b/2*((a-=2)*a*a*a*a+2)+c},easeInSine:function(e,
	a,c,b,d){return-b*Math.cos(a/d*(Math.PI/2))+b+c},easeOutSine:function(e,a,c,b,d){return b*Math.sin(a/d*(Math.PI/2))+c},easeInOutSine:function(e,a,c,b,d){return-b/2*(Math.cos(Math.PI*a/d)-1)+c},easeInExpo:function(e,a,c,b,d){return a==0?c:b*Math.pow(2,10*(a/d-1))+c},easeOutExpo:function(e,a,c,b,d){return a==d?c+b:b*(-Math.pow(2,-10*a/d)+1)+c},easeInOutExpo:function(e,a,c,b,d){if(a==0)return c;if(a==d)return c+b;if((a/=d/2)<1)return b/2*Math.pow(2,10*(a-1))+c;return b/2*(-Math.pow(2,-10*--a)+2)+c},

	easeInCirc:function(e,a,c,b,d){return-b*(Math.sqrt(1-(a/=d)*a)-1)+c},easeOutCirc:function(e,a,c,b,d){return b*Math.sqrt(1-(a=a/d-1)*a)+c},easeInOutCirc:function(e,a,c,b,d){if((a/=d/2)<1)return-b/2*(Math.sqrt(1-a*a)-1)+c;return b/2*(Math.sqrt(1-(a-=2)*a)+1)+c},easeInElastic:function(e,a,c,b,d){e=1.70158;var f=0,g=b;if(a==0)return c;if((a/=d)==1)return c+b;f||(f=d*0.3);if(g<Math.abs(b)){g=b;e=f/4}else e=f/(2*Math.PI)*Math.asin(b/g);return-(g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f))+c},easeOutElastic:function(e,
	a,c,b,d){e=1.70158;var f=0,g=b;if(a==0)return c;if((a/=d)==1)return c+b;f||(f=d*0.3);if(g<Math.abs(b)){g=b;e=f/4}else e=f/(2*Math.PI)*Math.asin(b/g);return g*Math.pow(2,-10*a)*Math.sin((a*d-e)*2*Math.PI/f)+b+c},easeInOutElastic:function(e,a,c,b,d){e=1.70158;var f=0,g=b;if(a==0)return c;if((a/=d/2)==2)return c+b;f||(f=d*0.3*1.5);if(g<Math.abs(b)){g=b;e=f/4}else e=f/(2*Math.PI)*Math.asin(b/g);if(a<1)return-0.5*g*Math.pow(2,10*(a-=1))*Math.sin((a*d-e)*2*Math.PI/f)+c;return g*Math.pow(2,-10*(a-=1))*Math.sin((a*
	d-e)*2*Math.PI/f)*0.5+b+c},easeInBack:function(e,a,c,b,d,f){if(f==undefined)f=1.70158;return b*(a/=d)*a*((f+1)*a-f)+c},easeOutBack:function(e,a,c,b,d,f){if(f==undefined)f=1.70158;return b*((a=a/d-1)*a*((f+1)*a+f)+1)+c},easeInOutBack:function(e,a,c,b,d,f){if(f==undefined)f=1.70158;if((a/=d/2)<1)return b/2*a*a*(((f*=1.525)+1)*a-f)+c;return b/2*((a-=2)*a*(((f*=1.525)+1)*a+f)+2)+c},easeInBounce:function(e,a,c,b,d){return b-jQuery.easing.easeOutBounce(e,d-a,0,b,d)+c},easeOutBounce:function(e,a,c,b,d){return(a/=
	d)<1/2.75?b*7.5625*a*a+c:a<2/2.75?b*(7.5625*(a-=1.5/2.75)*a+0.75)+c:a<2.5/2.75?b*(7.5625*(a-=2.25/2.75)*a+0.9375)+c:b*(7.5625*(a-=2.625/2.75)*a+0.984375)+c},easeInOutBounce:function(e,a,c,b,d){if(a<d/2)return jQuery.easing.easeInBounce(e,a*2,0,b,d)*0.5+c;return jQuery.easing.easeOutBounce(e,a*2-d,0,b,d)*0.5+b*0.5+c}});
})(jQuery);

(function($)
{
	if(jQuery.mousewheel)
		return;
	
	(function(d){var b=["DOMMouseScroll","mousewheel"];if(d.event.fixHooks){for(var a=b.length;a;){d.event.fixHooks[b[--a]]=d.event.mouseHooks}}d.event.special.mousewheel={setup:function(){if(this.addEventListener){for(var e=b.length;e;){this.addEventListener(b[--e],c,false)}}else{this.onmousewheel=c}},teardown:function(){if(this.removeEventListener){for(var e=b.length;e;){this.removeEventListener(b[--e],c,false)}}else{this.onmousewheel=null}}};d.fn.extend({mousewheel:function(e){return e?this.on("mousewheel",e):this.trigger("mousewheel")},unmousewheel:function(e){return this.unbind("mousewheel",e)}});function c(j){var h=j||window.event,g=[].slice.call(arguments,1),k=0,i=true,f=0,e=0;j=d.event.fix(h);j.type="mousewheel";if(h.wheelDelta){k=h.wheelDelta/120}if(h.detail){k=-h.detail/3}e=k;if(h.axis!==undefined&&h.axis===h.HORIZONTAL_AXIS){e=0;f=-1*k}if(h.wheelDeltaY!==undefined){e=h.wheelDeltaY/120}if(h.wheelDeltaX!==undefined){f=-1*h.wheelDeltaX/120}g.unshift(j,k,f,e);return(d.event.dispatch||d.event.handle).apply(this,g)}})(jQuery);
})(jQuery);

(function($)
{
	if ( isie && iev < 9 || jQuery.swipe)
		return;
	
	(function(e){var o="left",n="right",d="up",v="down",c="in",w="out",l="none",r="auto",k="swipe",s="pinch",x="tap",i="doubletap",b="longtap",A="horizontal",t="vertical",h="all",q=10,f="start",j="move",g="end",p="cancel",a="ontouchstart" in window,y="TouchSwipe";var m={fingers:1,threshold:75,cancelThreshold:null,pinchThreshold:20,maxTimeThreshold:null,fingerReleaseThreshold:250,longTapThreshold:500,doubleTapThreshold:200,swipe:null,swipeLeft:null,swipeRight:null,swipeUp:null,swipeDown:null,swipeStatus:null,pinchIn:null,pinchOut:null,pinchStatus:null,click:null,tap:null,doubleTap:null,longTap:null,triggerOnTouchEnd:true,triggerOnTouchLeave:false,allowPageScroll:"auto",fallbackToMouseEvents:true,excludedElements:"button, input, select, textarea, a, .noSwipe"};e.fn.swipe=function(D){var C=e(this),B=C.data(y);if(B&&typeof D==="string"){if(B[D]){return B[D].apply(this,Array.prototype.slice.call(arguments,1))}else{e.error("Method "+D+" does not exist on jQuery.swipe")}}else{if(!B&&(typeof D==="object"||!D)){return u.apply(this,arguments)}}return C};e.fn.swipe.defaults=m;e.fn.swipe.phases={PHASE_START:f,PHASE_MOVE:j,PHASE_END:g,PHASE_CANCEL:p};e.fn.swipe.directions={LEFT:o,RIGHT:n,UP:d,DOWN:v,IN:c,OUT:w};e.fn.swipe.pageScroll={NONE:l,HORIZONTAL:A,VERTICAL:t,AUTO:r};e.fn.swipe.fingers={ONE:1,TWO:2,THREE:3,ALL:h};function u(B){if(B&&(B.allowPageScroll===undefined&&(B.swipe!==undefined||B.swipeStatus!==undefined))){B.allowPageScroll=l}if(B.click!==undefined&&B.tap===undefined){B.tap=B.click}if(!B){B={}}B=e.extend({},e.fn.swipe.defaults,B);return this.each(function(){var D=e(this);var C=D.data(y);if(!C){C=new z(this,B);D.data(y,C)}})}function z(a0,aq){var av=(a||!aq.fallbackToMouseEvents),G=av?"touchstart":"mousedown",au=av?"touchmove":"mousemove",R=av?"touchend":"mouseup",P=av?null:"mouseleave",az="touchcancel";var ac=0,aL=null,Y=0,aX=0,aV=0,D=1,am=0,aF=0,J=null;var aN=e(a0);var W="start";var T=0;var aM=null;var Q=0,aY=0,a1=0,aa=0,K=0;var aS=null;try{aN.on(G,aJ);aN.on(az,a5)}catch(ag){e.error("events not supported "+G+","+az+" on jQuery.swipe")}this.enable=function(){aN.on(G,aJ);aN.on(az,a5);return aN};this.disable=function(){aG();return aN};this.destroy=function(){aG();aN.data(y,null);return aN};this.option=function(a8,a7){if(aq[a8]!==undefined){if(a7===undefined){return aq[a8]}else{aq[a8]=a7}}else{e.error("Option "+a8+" does not exist on jQuery.swipe.options")}};function aJ(a9){if(ax()){return}if(e(a9.target).closest(aq.excludedElements,aN).length>0){return}var ba=a9.originalEvent?a9.originalEvent:a9;var a8,a7=a?ba.touches[0]:ba;W=f;if(a){T=ba.touches.length}else{a9.preventDefault()}ac=0;aL=null;aF=null;Y=0;aX=0;aV=0;D=1;am=0;aM=af();J=X();O();if(!a||(T===aq.fingers||aq.fingers===h)||aT()){ae(0,a7);Q=ao();if(T==2){ae(1,ba.touches[1]);aX=aV=ap(aM[0].start,aM[1].start)}if(aq.swipeStatus||aq.pinchStatus){a8=L(ba,W)}}else{a8=false}if(a8===false){W=p;L(ba,W);return a8}else{ak(true)}}function aZ(ba){var bd=ba.originalEvent?ba.originalEvent:ba;if(W===g||W===p||ai()){return}var a9,a8=a?bd.touches[0]:bd;var bb=aD(a8);aY=ao();if(a){T=bd.touches.length}W=j;if(T==2){if(aX==0){ae(1,bd.touches[1]);aX=aV=ap(aM[0].start,aM[1].start)}else{aD(bd.touches[1]);aV=ap(aM[0].end,aM[1].end);aF=an(aM[0].end,aM[1].end)}D=a3(aX,aV);am=Math.abs(aX-aV)}if((T===aq.fingers||aq.fingers===h)||!a||aT()){aL=aH(bb.start,bb.end);ah(ba,aL);ac=aO(bb.start,bb.end);Y=aI();aE(aL,ac);if(aq.swipeStatus||aq.pinchStatus){a9=L(bd,W)}if(!aq.triggerOnTouchEnd||aq.triggerOnTouchLeave){var a7=true;if(aq.triggerOnTouchLeave){var bc=aU(this);a7=B(bb.end,bc)}if(!aq.triggerOnTouchEnd&&a7){W=ay(j)}else{if(aq.triggerOnTouchLeave&&!a7){W=ay(g)}}if(W==p||W==g){L(bd,W)}}}else{W=p;L(bd,W)}if(a9===false){W=p;L(bd,W)}}function I(a7){var a8=a7.originalEvent;if(a){if(a8.touches.length>0){C();return true}}if(ai()){T=aa}a7.preventDefault();aY=ao();Y=aI();if(a6()){W=p;L(a8,W)}else{if(aq.triggerOnTouchEnd||(aq.triggerOnTouchEnd==false&&W===j)){W=g;L(a8,W)}else{if(!aq.triggerOnTouchEnd&&a2()){W=g;aB(a8,W,x)}else{if(W===j){W=p;L(a8,W)}}}}ak(false)}function a5(){T=0;aY=0;Q=0;aX=0;aV=0;D=1;O();ak(false)}function H(a7){var a8=a7.originalEvent;if(aq.triggerOnTouchLeave){W=ay(g);L(a8,W)}}function aG(){aN.unbind(G,aJ);aN.unbind(az,a5);aN.unbind(au,aZ);aN.unbind(R,I);if(P){aN.unbind(P,H)}ak(false)}function ay(bb){var ba=bb;var a9=aw();var a8=aj();var a7=a6();if(!a9||a7){ba=p}else{if(a8&&bb==j&&(!aq.triggerOnTouchEnd||aq.triggerOnTouchLeave)){ba=g}else{if(!a8&&bb==g&&aq.triggerOnTouchLeave){ba=p}}}return ba}function L(a9,a7){var a8=undefined;if(F()||S()){a8=aB(a9,a7,k)}else{if((M()||aT())&&a8!==false){a8=aB(a9,a7,s)}}if(aC()&&a8!==false){a8=aB(a9,a7,i)}else{if(al()&&a8!==false){a8=aB(a9,a7,b)}else{if(ad()&&a8!==false){a8=aB(a9,a7,x)}}}if(a7===p){a5(a9)}if(a7===g){if(a){if(a9.touches.length==0){a5(a9)}}else{a5(a9)}}return a8}function aB(ba,a7,a9){var a8=undefined;if(a9==k){aN.trigger("swipeStatus",[a7,aL||null,ac||0,Y||0,T]);if(aq.swipeStatus){a8=aq.swipeStatus.call(aN,ba,a7,aL||null,ac||0,Y||0,T);if(a8===false){return false}}if(a7==g&&aR()){aN.trigger("swipe",[aL,ac,Y,T]);if(aq.swipe){a8=aq.swipe.call(aN,ba,aL,ac,Y,T);if(a8===false){return false}}switch(aL){case o:aN.trigger("swipeLeft",[aL,ac,Y,T]);if(aq.swipeLeft){a8=aq.swipeLeft.call(aN,ba,aL,ac,Y,T)}break;case n:aN.trigger("swipeRight",[aL,ac,Y,T]);if(aq.swipeRight){a8=aq.swipeRight.call(aN,ba,aL,ac,Y,T)}break;case d:aN.trigger("swipeUp",[aL,ac,Y,T]);if(aq.swipeUp){a8=aq.swipeUp.call(aN,ba,aL,ac,Y,T)}break;case v:aN.trigger("swipeDown",[aL,ac,Y,T]);if(aq.swipeDown){a8=aq.swipeDown.call(aN,ba,aL,ac,Y,T)}break}}}if(a9==s){aN.trigger("pinchStatus",[a7,aF||null,am||0,Y||0,T,D]);if(aq.pinchStatus){a8=aq.pinchStatus.call(aN,ba,a7,aF||null,am||0,Y||0,T,D);if(a8===false){return false}}if(a7==g&&a4()){switch(aF){case c:aN.trigger("pinchIn",[aF||null,am||0,Y||0,T,D]);if(aq.pinchIn){a8=aq.pinchIn.call(aN,ba,aF||null,am||0,Y||0,T,D)}break;case w:aN.trigger("pinchOut",[aF||null,am||0,Y||0,T,D]);if(aq.pinchOut){a8=aq.pinchOut.call(aN,ba,aF||null,am||0,Y||0,T,D)}break}}}if(a9==x){if(a7===p||a7===g){clearTimeout(aS);if(V()&&!E()){K=ao();aS=setTimeout(e.proxy(function(){K=null;aN.trigger("tap",[ba.target]);if(aq.tap){a8=aq.tap.call(aN,ba,ba.target)}},this),aq.doubleTapThreshold)}else{K=null;aN.trigger("tap",[ba.target]);if(aq.tap){a8=aq.tap.call(aN,ba,ba.target)}}}}else{if(a9==i){if(a7===p||a7===g){clearTimeout(aS);K=null;aN.trigger("doubletap",[ba.target]);if(aq.doubleTap){a8=aq.doubleTap.call(aN,ba,ba.target)}}}else{if(a9==b){if(a7===p||a7===g){clearTimeout(aS);K=null;aN.trigger("longtap",[ba.target]);if(aq.longTap){a8=aq.longTap.call(aN,ba,ba.target)}}}}}return a8}function aj(){var a7=true;if(aq.threshold!==null){a7=ac>=aq.threshold}return a7}function a6(){var a7=false;if(aq.cancelThreshold!==null&&aL!==null){a7=(aP(aL)-ac)>=aq.cancelThreshold}return a7}function ab(){if(aq.pinchThreshold!==null){return am>=aq.pinchThreshold}return true}function aw(){var a7;if(aq.maxTimeThreshold){if(Y>=aq.maxTimeThreshold){a7=false}else{a7=true}}else{a7=true}return a7}function ah(a7,a8){if(aq.allowPageScroll===l||aT()){a7.preventDefault()}else{var a9=aq.allowPageScroll===r;switch(a8){case o:if((aq.swipeLeft&&a9)||(!a9&&aq.allowPageScroll!=A)){a7.preventDefault()}break;case n:if((aq.swipeRight&&a9)||(!a9&&aq.allowPageScroll!=A)){a7.preventDefault()}break;case d:if((aq.swipeUp&&a9)||(!a9&&aq.allowPageScroll!=t)){a7.preventDefault()}break;case v:if((aq.swipeDown&&a9)||(!a9&&aq.allowPageScroll!=t)){a7.preventDefault()}break}}}function a4(){var a8=aK();var a7=U();var a9=ab();return a8&&a7&&a9}function aT(){return !!(aq.pinchStatus||aq.pinchIn||aq.pinchOut)}function M(){return !!(a4()&&aT())}function aR(){var ba=aw();var bc=aj();var a9=aK();var a7=U();var a8=a6();var bb=!a8&&a7&&a9&&bc&&ba;return bb}function S(){return !!(aq.swipe||aq.swipeStatus||aq.swipeLeft||aq.swipeRight||aq.swipeUp||aq.swipeDown)}function F(){return !!(aR()&&S())}function aK(){return((T===aq.fingers||aq.fingers===h)||!a)}function U(){return aM[0].end.x!==0}function a2(){return !!(aq.tap)}function V(){return !!(aq.doubleTap)}function aQ(){return !!(aq.longTap)}function N(){if(K==null){return false}var a7=ao();return(V()&&((a7-K)<=aq.doubleTapThreshold))}function E(){return N()}function at(){return((T===1||!a)&&(isNaN(ac)||ac===0))}function aW(){return((Y>aq.longTapThreshold)&&(ac<q))}function ad(){return !!(at()&&a2())}function aC(){return !!(N()&&V())}function al(){return !!(aW()&&aQ())}function C(){a1=ao();aa=event.touches.length+1}function O(){a1=0;aa=0}function ai(){var a7=false;if(a1){var a8=ao()-a1;if(a8<=aq.fingerReleaseThreshold){a7=true}}return a7}function ax(){return !!(aN.data(y+"_intouch")===true)}function ak(a7){if(a7===true){aN.on(au,aZ);aN.on(R,I);if(P){aN.on(P,H)}}else{aN.unbind(au,aZ,false);aN.unbind(R,I,false);if(P){aN.unbind(P,H,false)}}aN.data(y+"_intouch",a7===true)}function ae(a8,a7){var a9=a7.identifier!==undefined?a7.identifier:0;aM[a8].identifier=a9;aM[a8].start.x=aM[a8].end.x=a7.pageX||a7.clientX;aM[a8].start.y=aM[a8].end.y=a7.pageY||a7.clientY;return aM[a8]}function aD(a7){var a9=a7.identifier!==undefined?a7.identifier:0;var a8=Z(a9);a8.end.x=a7.pageX||a7.clientX;a8.end.y=a7.pageY||a7.clientY;return a8}function Z(a8){for(var a7=0;a7<aM.length;a7++){if(aM[a7].identifier==a8){return aM[a7]}}}function af(){var a7=[];for(var a8=0;a8<=5;a8++){a7.push({start:{x:0,y:0},end:{x:0,y:0},identifier:0})}return a7}function aE(a7,a8){a8=Math.max(a8,aP(a7));J[a7].distance=a8}function aP(a7){return J[a7].distance}function X(){var a7={};a7[o]=ar(o);a7[n]=ar(n);a7[d]=ar(d);a7[v]=ar(v);return a7}function ar(a7){return{direction:a7,distance:0}}function aI(){return aY-Q}function ap(ba,a9){var a8=Math.abs(ba.x-a9.x);var a7=Math.abs(ba.y-a9.y);return Math.round(Math.sqrt(a8*a8+a7*a7))}function a3(a7,a8){var a9=(a8/a7)*1;return a9.toFixed(2)}function an(){if(D<1){return w}else{return c}}function aO(a8,a7){return Math.round(Math.sqrt(Math.pow(a7.x-a8.x,2)+Math.pow(a7.y-a8.y,2)))}function aA(ba,a8){var a7=ba.x-a8.x;var bc=a8.y-ba.y;var a9=Math.atan2(bc,a7);var bb=Math.round(a9*180/Math.PI);if(bb<0){bb=360-Math.abs(bb)}return bb}function aH(a8,a7){var a9=aA(a8,a7);if((a9<=45)&&(a9>=0)){return o}else{if((a9<=360)&&(a9>=315)){return o}else{if((a9>=135)&&(a9<=225)){return n}else{if((a9>45)&&(a9<135)){return v}else{return d}}}}}function ao(){var a7=new Date();return a7.getTime()}function aU(a7){a7=e(a7);var a9=a7.offset();var a8={left:a9.left,right:a9.left+a7.outerWidth(),top:a9.top,bottom:a9.top+a7.outerHeight()};return a8}function B(a7,a8){return(a7.x>a8.left&&a7.x<a8.right&&a7.y>a8.top&&a7.y<a8.bottom)}}})(jQuery);
})(jQuery);

Array.prototype.getRandom = Array.prototype.getRandom || function () {
    return this[Math.floor(this.length * Math.random())];
};

Array.prototype.forEach = Array.prototype.forEach || function(fun /*, thisArg */)
{
	"use strict";

	if (this === void 0 || this === null)
	
	throw new TypeError();

	var t = Object(this);
	var len = t.length >>> 0;
	
	if (typeof fun !== "function")
		throw new TypeError();

	var thisArg = arguments.length >= 2 ? arguments[1] : void 0;
	
	for (var i = 0; i < len; i++)
	{
		if (i in t)
			fun.call(thisArg, t[i], i, t);
	}
};

Array.isArray = Array.prototype.isArray || function (vArg) 
{
	return Object.prototype.toString.call(vArg) === "[object Array]";
};

(function($)
{
	$.fn.cattr = function(key, value, attribute, explicit_key)
	{
		attribute = attribute || 'className';

		var $object = $(this).eq(0);
		var attr_name = '';
		var attr_found;

		if (key != null)
		{
			var attributes = $object[0][attribute].split(' ');

			attributes.forEach(function (name)
			{
				var attr_data;
				var attr_key;

				if (attr_found)
					return;

				attr_data = name.split('-');

				if (explicit_key)
				{
					attr_key = name.indexOf(key) !== -1 && name.length !== key.length ? key : '';

					if (attr_key == key)
					{
						attr_name = name;
						attr_found = true;
					}
				} else
				{

					attr_key = attr_data[attr_data.length - 2] === '' ? attr_data.slice(0, attr_data.length - 2).join('-') : attr_data.slice(0, attr_data.length - 1).join('-');

					if (attr_key == key)
					{
						attr_name = name;
						attr_found = true;
					}
				}
				
			});
		}

		if (typeof value == 'undefined' || value == null)
		{
			return attr_name.substr(key.length+1);
		} else
		{
			if (attr_name != '')
			{
				$object[0][attribute] = $object[0][attribute].replace(attr_name, key + '-' + value);
			} else
			{
				$object[0][attribute] = $object[0][attribute] + ' ' + key + '-' + value;
			}
		}

		return this;
	};
})(jQuery);

(function($)
{
	var utils =
	{
		ua: function ()
		{
			return (ether ? ether.ua : ua);
		},

		isie: function ()
		{
			return (ether ? ether.isie : isie);
		},

		iev: function ()
		{
			return (ether ? ether.iev : iev);
		},

		reorder_array: function (array)
		{
			var result = [];

			array.forEach(function (elem)
			{
				if (elem)
				{
					result.push(elem);
				}
			})

			return result;
		},

		clean_arr: function (arr)
		{
			var result = [];

			arr.forEach(function (e)
			{
				e !== null && e !== undefined ? result.push(e) : '';
			});

			return result;
		},

		shallow_copy: function (from, to) 
		{
            var key;

            for (key in from) 
            {
                if (from.hasOwnProperty(key)) 
                {
                    to[key] = from[key];
                }
            }
        },

		obj_foreach: function (thisArg, obj, callback, depth) {
            var key;

            for (key in obj) 
            {
                if (obj.hasOwnProperty(key)) 
                {
                    callback.apply(thisArg, [obj[key], key]);
                    
                    if (depth && typeof obj[key] === 'object') 
                    {
                        obj_foreach(thisArg, obj[key], callback, depth);
                    }
                }
            }
        },

        prefix: function (name, join)
		{
			var prefix = prefix || (ether ? (ether.prefix || '') : '');

			return (typeof name !== 'string' ? this.prefix_arr(name, join || '') : (prefix !== '' ? prefix + '-' : '') + name);
		},

		prefix_arr: function (arr, join)
		{
			var result = '';

			arr.forEach(function (elem)
			{
				result += this.prefix(elem) + (join || '');
			}, this);
	
			return result;
		},

		prefix_class: function (name, prefix)
		{
			return '.' + this.prefix(name);
		},

		has_col_parent: function ($elem)
		{
			return $elem.parents('.' + this.prefix('crumb-wrap')).eq(0).length;
		},

		get_col_parent: function ($elem)
		{
			return $elem.parents('.' + this.prefix('crumb-wrap')).eq(0);
		},

		get_img_title: function ($elem)
		{
			return $elem.attr('title') || $elem.attr('alt');
		},

		is_widget: function ($elem)
		{
			return $elem.parent().hasClass(this.prefix('widget'));
		},

		is_image: function ($elem)
		{
			return $elem.prop('tagName') === 'IMG';
		},

		animate_dom: function ($elem, data, speed)
		{
			speed = (speed !== undefined ? speed : 500);
			$elem.stop(true, true).animate(data, speed);
		},

		extend_prototype: function (target, extend)
		{
			this.obj_foreach(this, extend, function (elem, key)
			{
				target.prototype[key] = extend[key];
			});
		},

		wrap_dom_groups: function ($proto_wrap, $elems, capacity)
		{
			var a;
			var count = $elems.length;
			var slice_to;
			var $wrap;

			capacity = capacity || count;

			for (a = 0; a < count; a += capacity)
			{
				$wrap = (typeof $proto_wrap === 'function' ? $proto_wrap() : $proto_wrap.clone(true, true));

				slice_to = a + ((a + capacity < count) ? capacity : count - a);

				$elems.slice(a, slice_to).wrapAll($wrap);
			}
		},

		clear_timeout: function (name)
		{
			this.timeout ? clearTimeout(this.timeout[name]) : '';
		},

		delay: function (name, timeout, fn, this_arg, args)
		{
			var self = this;

			args = args || [];

			this.timeout = this.timeout || {};
			this.timeout_id = this.timeout_id || {};

			clearTimeout(this.timeout[name]);

			this.timeout[name] = setTimeout(function ()
			{
				self.timeout_id[name] = (self.timeout_id[name] === undefined ? 0 : self.timeout_id[name] + 1);

				fn.apply(this_arg, args);
			}, timeout);
		},

		trim: function (s)
		{
			s = s.replace(/^\s+/, '');
			s = s.replace(/\s+$/, '');

			return s;
		}
	}

	ether.utils = ether.utils || utils;
})(jQuery);

(function($)
{
	var image_loader =
	{
		placeholder_img_data: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAMAAAAoyzS7AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjQwNkI5RDRFNjFBQzExRTE5MjJDRjRGMUM2MTdDODUyIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjQwNkI5RDRGNjFBQzExRTE5MjJDRjRGMUM2MTdDODUyIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NDA2QjlENEM2MUFDMTFFMTkyMkNGNEYxQzYxN0M4NTIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NDA2QjlENEQ2MUFDMTFFMTkyMkNGNEYxQzYxN0M4NTIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz4G1oNaAAAABlBMVEX///8AAABVwtN+AAAADElEQVR42mJgAAgwAAACAAFPbVnhAAAAAElFTkSuQmCC',

		on_image_load_end: function ($img, success_callback, error_callback)
		{
			var self = this;

			$img.each(function ()
			{
				$(this)
					.on('load', function ()
					{
						success_callback ? success_callback($(this)) : '';
					})
					.on('error', function ()
					{
						$(this)
							.unbind('error')
							.attr('src', self.placeholder_img_data);

						error_callback ? error_callback($(this)) : '';
					});
	
				if ((typeof this.complete != 'undefined' && this.complete) || (typeof this.naturalWidth != 'undefined' && this.naturalWidth > 0))
				{
					$(this)
						.trigger('load')
						.unbind('load');
				}
			});
		},

		on_images_load_end: function ($images, callback)
		{
			var count = $images.length;
			var all_images_loaded;	
			var count_locked;
			var loaded = 0;
			var error = 0;
			var add_ready = function (success)
			{
				success ? loaded += 1 : error += 1;

				if ((loaded === count && ! count_locked))
				{
					count_locked = true;
					all_images_loaded = true;

					callback ? callback() : '';
				}
			}

			if (count > 0)
			{
				this.on_image_load_end($images, function ()
				{
					add_ready(true);
				}, function ()
				{
					add_ready(false);
				});
			} else
			{
				callback ? callback() : '';
			}
		}
	}

	ether.image_loader = ether.image_loader || image_loader;
})(jQuery);

(function($)
{
	var utils = ether.utils;

	var css_generator =
	{	
		style_destination: (isie && iev < 9 ? 'body' : 'head'),
		styles_data: {
			all: {},
			ie7: {}
		},
		css: '',

		add_style_data: function (container, selector_name, rules)
		{
			selector_name = (typeof selector_name !== 'string' ? selector_name.join('') : selector_name);
			
			container = (typeof container === 'string' ? (this.styles_data[container] ? this.styles_data[container] : {}) : container);
			container[selector_name] = container[selector_name] || {};


			utils.obj_foreach(this, rules, function (elem, key)
			{
				container[selector_name][key] = elem;
			});

			return container;				
		},
		generate_ruleset: function (obj)
		{
			var result = '';
	
			utils.obj_foreach(null, obj, function (elem, selector)
			{
				var prop;
				
				result += selector + ' { \n';

				for(prop in elem)
				{
					result += '	' + prop + ': ' + elem[prop] + '; \n';
				}

				result += '} \n';
			});

	
			return result;
		},
		generate_styles: function ()
		{
			var cfg = this.cfg;
			var result = '';

			utils.obj_foreach(this, this.styles_data, function (elem, key)
			{
				result += this.generate_ruleset(elem)
			});

				
			return result;
		},
		update_css: function ()
		{
			var name = 'stylesheet';
			var selector = utils.prefix_class(name);

			this.css = this.generate_styles();
			
			this.css ? console.log('css:', this.css) : '';

			if (this.css && this.css !== '')
			{
				$(this.style_destination)
					.find(selector).remove().end()
					.append('<style class="' + utils.prefix(name) + '">' + this.css + '</style>');
			}
		}		
	}

	ether.css_generator = ether.css_generator || css_generator;
})(jQuery);

(function ($)
{
	var utils = ether.utils;

	var event_manager =
	{
		on: function (namespace, event, callback)
		{
			event = event.split(' ');

			event.forEach(function (evt)
			{

				$(document).on(evt + '.' + namespace, callback);
			})

			return this;
		},

		trigger: function (namespace, e, delegate, args)
		{


			$(document).trigger(e + '.' + namespace, args);

			return this;
		}
	}

	ether.event_manager = ether.event_manager || event_manager;

})(jQuery);


(function ($)
{
	var utils = ether.utils;

	var widget_manager = {
		widget: {},

		get_next_id: function (namespace)
		{
			this.widget[namespace] = this.widget[namespace] || [];

			return this.widget[namespace].length;
		},

		register: function (elem)
		{
			var namespace = elem.namespace;

			if (elem.id !== undefined && elem.id !== null)
			{
				return;
			}

			elem.id = this.get_next_id(namespace);

			this.widget[namespace] = this.widget[namespace] || [];

			this.widget[namespace].push(elem);

			return elem.id;
		}, 
		unregister: function (elem)
		{
			this.widget[elem.namespace] ? this.widget[elem.namespace][elem.id] ? delete this.widget[elem.namespace][elem.id] : '' : '';
		},

		get_elem: function (namespace, id)
		{
			var elem;

			if (id instanceof jQuery)
			{
				id = id.cattr(utils.prefix('id'));
			}

			elem = (this.widget[namespace] && this.widget[namespace][id] ? this.widget[namespace][id] : undefined);

			return elem;
		}
	}

	ether.widget_manager = widget_manager;
})(jQuery);

(function ($)
{
	var utils = ether.utils;
	var event_manager = ether.event_manager;
	var widget_manager = ether.widget_manager;

	var Ether_widget = function Ether_widget ()
	{
	}

	utils.extend_prototype(Ether_widget,
	{
		construct: function (cfg)
		{
			this.id = null;
			this.namespace = null;
			this.parent_widget = [];
			this.child_widget = [];
			this.cached_events = {};
			this.dom = {};
		},

		get_namespace: function (name)
		{
			return (name ? name + '.' : '') + this.namespace + '_' + this.id;
		},

		unbind_widgets: function ()
		{
			var self = this;

			this.parent_widget.forEach(function(parent)
			{
				parent.child_widget.forEach(function (child, id)
				{
					if (child.namespace === this.namespace && child.id === this.id)
					{
						delete parent.child_widget[id];
					}
				}, this);
			}, this);
		},

		bind_widget: function (elem, role)
		{
			role = role || 'parent';
			this[role + '_widget'].push(elem);
			elem[(role === 'parent' ? 'child' : 'parent') + '_widget'].push(this);

			this.trigger_cached_events();
			elem.trigger_cached_events();
		},

		get_widget: function (namespace, role, id)
		{
			var result = [];

			role = role || 'parent';

			this[role + '_widget'].forEach(function (elem)
			{
				if (elem.namespace === namespace)
				{
					result.push(elem);
				}
			});

			return (id !== undefined ? result[id] : result);
		},

		set_ready: function (state)
		{
			var old_state = this.ready;
			this.ready = state;

			old_state !== this.ready ? this.emit_event(this.get_namespace(), 'state_change', state) : '';
		},

		is_ready_widget: function ()
		{
			return this.ready;
		},

		are_ready_child_widgets: function (name)
		{
			var cfg = this.cfg;
			var result = true;
			var set = this.child_widget; 


			if (set && set.length)
			{
				set = (name ? this.get_widget(name, 'child') : set);

				set.forEach(function (elem)
				{
					! elem.is_ready_widget() ? result = false : '';
				});









			}


			return result;
		},

		notify_widget: function (namespace, event, args, role)
		{
			var result;
			var set = this[role + '_widget'];


			if ( ! set.length)
			{
				this.cached_events[event] = true;
			}

			this[role + '_widget'].forEach(function (elem)
			{

				elem.emit_event(elem.get_namespace(), event, args, true);
			});

			return result;
		},

		emit_event: function (namespace, event, args, stop_propagation)
		{
			namespace = namespace || this.get_namespace();


			event_manager.trigger(namespace, event, false, args);
			
			if (stop_propagation)
			{
				return;
			}

			this.notify_widget(namespace, event, args, 'child');
			this.notify_widget(namespace, event, args, 'parent');
		},

		trigger_cached_events: function ()
		{

			utils.obj_foreach(this, this.cached_events, function (elem, key)
			{

				this.emit_event(this.get_namespace(), key);
				delete this.cached_events[key];
			});
		},

		register: function ()
		{
			if (widget_manager.register(this) === undefined)
			{
				return;
			}
		},

		unregister: function ()
		{
			widget_manager.unregister(this);
		},

		get_dom: function (name, live, selector)
		{
			var result;
			var $elem = $(this.elem);

			if (live && $elem.find(utils.prefix_class(name + '-' + this.id)).length)
			{
				result = $elem.find(utils.prefix_class(name + '-' + this.id));
			}

			if (( ! result || ! result.length) && selector)
			{
				result = $elem.find(selector);
			}

			if ( ! result || ! result.length)
			{
				result = (this.has_set_dom(name) ? this.dom[name] : $());
			}

			return result;
		},

		has_set_dom: function (name)
		{
			return this.dom && this.dom[name] && this.dom[name].length;
		},

		set_dom: function (name, value, selector)
		{


			value = (value && value.length ? value : this.get_dom(name, true, selector));

			this.dom[name] = value;
		},

		unset_dom: function (name)
		{
			this.dom[name] = undefined;
		},

		unwrap_dom: function (name)
		{
			var $elem = this.get_dom(name);

			if ($elem.length)
			{
				$elem.children().unwrap();
				this.unset_dom(name);
			}
		},

		remove_dom: function (name, id)
		{
			if (this.get_dom(name).length)
			{
				if (id !== undefined)
				{
					this.get_dom(name).eq(id).remove();
					this.set_dom(name);
				} else
				{
					this.get_dom(name).remove();
					this.unset_dom(name);
				}
			} else
			{
				this.unset_dom(name);
			}
		},

		format_dom_data: function (d, args)
		{
			if ( ! d)
				return;

			d = (typeof d === 'function' ? d.apply(this, args) : d);
			d = (Array.isArray(d) ? d.join(' ') : d);


			return d;
		},

		set_dom_classes: function ($elem, data, args, deconstruct)
		{
			var data = this.format_dom_data(data, args);

			if ( ! data)
				return;

			$elem[deconstruct ? 'removeClass' : 'addClass'](data);
		},

		set_dom_attributes: function ($elem, attrs, args, deconstruct)
		{
			if ( ! attrs)
				return;
			
			utils.obj_foreach(this, attrs, function (attr, key)
			{
				attr.forEach(function (a)
				{
					var match;
					var source = $elem.attr(key) || '';
					var val = this.format_dom_data(a, args);
					match = (source.indexOf(val) !== -1 ? true : false);
					source = ! deconstruct ? source + (match ? '' : val) : source.replace(val, '');

					$elem.attr(key, source);
				}, this);
			});
		},

		set_dom_props: function (name, $elem, deconstruct, args)
		{
			var self = this;
			var data = (typeof name === 'string' ? this.get_dom_data(name) : name);

			$elem = $elem || $('<' + (data.tag || 'div') + '>');
			$elem.each(function (id)
			{
				var $self = $(this);
				args = [id].concat(args || []);

				if (data.classes)
				{
					data.classes.forEach(function (d)
					{
						self.set_dom_classes($self, d, args, deconstruct);
					});
				}

				if (data.attrs)
				{
					self.set_dom_attributes($self, data.attrs, args, deconstruct);
				}
			});

			return $elem;
		},

		deinit_dom_elem: function (name, method)
		{
			var $elem = this.get_dom(name);

			if ($elem.length)
			{
				this.set_dom_props(name, $elem, true);
				method ? method === 'remove' ? this.remove_dom(name) : this.unwrap_dom(name) : this.unset_dom(name);
			}
		},

		update_dom_elem: function (name, $elem, deconstruct, selector)
		{
			$elem = $elem || this.get_dom(name, true, selector);


			if ( ! $elem.length)
			{
				console.error('update dom elem: "' + name + '" does not exist');
				return;
			} else
			{
				this.set_dom_props(name, $elem, deconstruct);
				this.set_dom(name, undefined, selector);
			}			
		},

		load_dom_data: function (data)
	    {
	    	this.dom_data = this.dom_data || {};

	    	utils.obj_foreach(this, data, function (dom_data, elem_key)
	    	{
	    		var d;

	    		this.dom_data[elem_key] = this.dom_data[elem_key] || { classes: [], attrs: {}};
	    		d = this.dom_data[elem_key];

	    		utils.obj_foreach(this, dom_data, function (prop, prop_key)
	    		{
		    		switch (prop_key)
		    		{
		    			case 'classes':
		    			{
		    				d.classes.push(prop);
		    				break;
		    			}
		    			case 'attrs':
		    			{
		    				utils.obj_foreach(this, prop, function (val, key)
		    				{
		    					d.attrs[key] = (d.attrs[key] ? d.attrs[key] : []);
		    					d.attrs[key].push(val);
		    				});
		    				break;
		    			}
		    			default:
		    			{
		    				d[prop_key] = prop;
		    				break;
		    			}
		    		}
	    		});
	    	});
	    },

	    load_dom_constructors: function (data)
	    {
	    	this.dom_constructors = this.dom_constructors || {};

	    	$.extend(this.dom_constructors, data);
	    },

	    load_dom_constructor_callback: function (callback)
	    {
	    	callback ? this.dom_constructor_callback = callback : '';
	    },

		get_dom_data: function (name)
		{
			return this.dom_data[name];
		},

		get_selector: function (name)
		{
			return this.get_dom_data(name).selector;
		},

		get_constructor_state: function (name)
		{

			return this.constructor_states[name];
		},

	    has_dom_constructor: function (name)
	    {
	    	var cfg = this.cfg;
	    	
	    	cfg = (this.dom_constructors && this.dom_constructors[name] ? this.dom_constructors[name] : undefined);

			return cfg || undefined;
	    },

	    apply_constructor_callback: function (name, deconstruct, $elem)
	    {
	    	this.dom_constructor_callback && this.dom_constructor_callback[name] ? this.dom_constructor_callback[name].apply(this, arguments) : '';
	    },

		construct_dom: function (name, deconstruct, $elem)
		{
			var args;
			var prev_state;


			$elem = $elem || this.get_dom(name, true, this.get_selector(name));
			args = [name, deconstruct, $elem]; //mind updated $elem

			if ( ! this.has_dom_constructor(name))
			{
				return;
			}

			deconstruct ? this.apply_constructor_callback.apply(this, args) : '';
			this.dom_constructors[name].apply(this, args);
			deconstruct ? '' : this.apply_constructor_callback.apply(this, args);

			this.constructor_states = this.constructor_states || {};
			prev_state = this.constructor_states[name];
			this.constructor_states[name] = (deconstruct ? false : true);

			event_manager.trigger(this.get_namespace(), name + '_' + ( ! prev_state ? 'init' : prev_state === true && deconstruct ? 'deconstruct' : prev_state === this.get_constructor_state(name) ? 'update' : 'bork!!!'), undefined, [deconstruct]);
		},

		get: function (key)
		{
			return (key !== undefined ? this[key] !== undefined ? this[key] : this.cfg !== undefined ? this.cfg[key] : undefined : this);
		}
		
	});

	ether.Widget = ether.Widget || Ether_widget;
})(jQuery);


(function($)
{
	var utils = ether.utils;
	var image_loader = ether.image_loader;
	var event_manager = ether.event_manager;
	var widget_manager = ether.widget_manager;
	var Widget = ether.Widget;

	var DEFAULTS = {
		use_parent_wrap: undefined,
		align: 'none',
		wrap_width: 'auto',
		wrap_height: 'auto',
		wrap_height_ratio: 100,
		image_width: 'auto',
		image_height: 'auto',
		image_stretch_mode: 'auto',
		image_align_x: 'middle',
		image_align_y: 'middle',





	}

	var image_stretch_mode_re = new RegExp('\\b' + utils.prefix('image-stretch-mode-') + '\\w+\\b', 'g');
	var widget_align_re = new RegExp('\\b' + utils.prefix('align') + '\\w+\\b', 'g');

	var Media_widget = function (cfg)
	{
		$.extend(this, cfg || {});

		this.wrap_width = this.width || this.wrap_width;
		this.wrap_height = this.height || this.wrap_height;
		this.wrap_height_ratio = this.height_ratio || this.wrap_height_ratio;
	}

	Media_widget.prototype = new Widget();

	utils.extend_prototype(Media_widget, 
	{
		construct: function (cfg)
		{

			this.constructor.prototype.construct ? this.constructor.prototype.construct.apply(this) : '';

			this.namespace = 'media_widget';

			$.extend(this, cfg || {});
		},

		get_natural_size: function (src)
		{


		    var newImg = new Image();
		    var s;

		    newImg.src = src;

		    s = {
				height: newImg.height,
				width: newImg.width
			}


		    return s;
		},

		reset_image: function ($img)
		{
			$img
				.css({
					width: '',
					height: '',
					'margin-top': '',
					'margin-left': ''
				})
				.attr('width', 'auto')
				.attr('height', 'auto');

		},

		reset_wrap: function ($wrap)
		{
			$wrap.css({
				width: 'auto',
				height: 'auto'
			});


		},

		deinit_dynamic_title: function ($img)
		{
			this.dynamic_title.deinit();
			delete this.dynamic_title;
		},

		init_dynamic_title: function (cfg)
		{
			var options = {
				show_img_title: this.show_img_title,
				img_title_alignment_y: this.img_title_alignment_y,
				img_title_alignment_x: this.img_title_alignment_x,
				img_title_custom_class: this.img_title_custom_class
			}

			cfg ? jQuery.extend(options, cfg) : '';


			this.dynamic_title = ( ! this.dynamic_title ? this.$img.dynamicTitle(options) : this.dynamic_title);
		},

		set_title: function ($img)
		{
			this.dynamic_title ? this.dynamic_title.update() : '';
		},

		set_wrap: function ($wrap, $img, wrap_width, wrap_height, wrap_height_ratio, wrap_align, image_stretch_mode)
		{
			wrap_align = wrap_align || this.align;
			wrap_width = wrap_width || this.wrap_width;
			wrap_height = wrap_height || this.wrap_height;
			wrap_height_ratio = wrap_height_ratio || this.wrap_height_ratio;
			image_stretch_mode = image_stretch_mode || this.image_stretch_mode;

			this.reset_wrap($wrap);

			if (image_stretch_mode === 'auto')
			{
				wrap_width = 'auto';
				// wrap_height = 'auto';
			}

			if ((wrap_width === 'auto' || wrap_width.toString().indexOf('%') === -1) && this.image_width.toString().indexOf('%') !== -1)
			{
				wrap_width = this.image_width;
			}

			if (wrap_align === 'center' && wrap_width === 'auto')
			{
				wrap_width = this.image_width !== 'auto' ? this.image_width : this.image_height !== 'auto' ? this.image_height * (this.get_natural_size($img.attr('src')).width / this.get_natural_size($img.attr('src')).height) : this.get_natural_size($img.attr('src')).width;
			}







			$wrap.css({
				width: wrap_width
			});

			wrap_height = (wrap_height === 'constrain' ? $wrap.width() * parseInt(wrap_height_ratio) / 100 : wrap_height);

			$wrap.css({
				height: wrap_height
			});
		},

		set_image: function ($img, $wrap, stretch_mode, align_x, align_y)
		{
			$wrap = $wrap || $img.parent();
			stretch_mode = stretch_mode || this.image_stretch_mode;
			align_x = align_x || this.image_align_x;
			align_y = align_y || this.image_align_y;


			if (stretch_mode !== 'auto')
			{
				this.reset_image($img);
			}	
			this.fit_image($wrap, $img, stretch_mode);
			this.align_image($wrap, $img, align_x, align_y, stretch_mode);
		},

		fit_image: function ($wrap, $img, stretch_mode)
		{
			var wrap_w = $wrap.width();
			var wrap_h = $wrap.height();
			var s = this.get_natural_size($img.attr('src'));
			var img_w;
			var img_h;

			var img_ratio = s.width / s.height;
			var wrap_ratio = wrap_w / wrap_h;
			var img_to_wrap_ratio = wrap_ratio / img_ratio;


			img_w = undefined;
			img_h = undefined;

			switch (stretch_mode)
			{
				case 'x':
				{
					img_w = wrap_w;
					break; 
				}
				case 'y':
				{
					img_h = wrap_h;
					break;
				}
				case 'fill':
				{
					if (img_to_wrap_ratio >= 1)
					{
						img_w = wrap_w;
						img_h = wrap_w / img_ratio;
					} else
					{
						img_w = wrap_h * img_ratio;
						img_h = wrap_h;
					}

					break;
				}
				case 'fit':
				{
					// this is stretch fit!
					// img_w = wrap_w;
					// img_h = wrap_h;

					if (img_to_wrap_ratio < 1)
					{
						img_w = wrap_w;
						img_h = wrap_w / img_ratio;
					} else
					{
						img_w = wrap_h * img_ratio;
						img_h = wrap_h;
					}

					break;
				}
				case 'auto':
				{
					img_w = (this.image_width.toString().indexOf('%') !== -1 ? '100%' : this.image_width);
					img_h = this.image_height;
					break;
				}
			}


			img_w !== undefined ? $img.attr('width', img_w) : '';
			img_h !== undefined ? $img.attr('height', img_h) : '';

			return $img;
		},

		align_image: function ($wrap, $img, align_x, align_y, stretch_mode)
		{
			if (stretch_mode === 'auto' || stretch_mode === 'fit') //handle 'fit' centering via css
			// if (stretch_mode === 'auto')
				return;

			$wrap = $wrap || $img.parent();

			var wrap_h = $wrap.height();
			var wrap_w = $wrap.width();
			var img_w = $img.width();
			var img_h = $img.height();

			var w_delta = wrap_w - img_w;
			var h_delta = wrap_h - img_h;

			var img_styles = {};
			var img_style = '';


			img_styles['margin-left'] = [w_delta * (align_x === 'left' ? 0 : align_x === 'right' ? 1 : 0.5), true];
			img_styles['margin-top'] = [h_delta * (align_y === 'top' ? 0 : align_y === 'bottom' ? 1 : 0.5), true];			

			utils.obj_foreach(null, img_styles, function (elem, key)
			{
				img_style += key + ': ' + elem[0] + 'px' + (elem[1] ? ' !important' : '') + '; ';
			});

			$img.attr('style', ($img.attr('style') || '') + img_style);

			return $img;
		},

		has_media_wrap: function ($img)
		{
			if (
				this.$img && this.$img.length === 1 && this.$wrap || //single image
				$img.hasClass(utils.prefix('has-media-wrap')) && $img.parent().hasClass(utils.prefix('media-wrap')) || 
				$img.parent().hasClass(utils.prefix('widget')) && $img.parent().hasClass(utils.prefix('img')))// || //hackor for image widget

			{
				return true;
			}
		},

		init_media_dom: function ($img)
		{
			var $wrap = (this.use_parent_wrap || this.has_media_wrap($img) ? $img.parent() : $img.wrap('<span>').parent());

			this.$wrap = (this.$wrap ? this.$wrap.add($wrap) : $wrap);		

			this.update_media_dom($wrap, $img);


			
			return $img.parent();
		},

		update_media_dom: function ($wrap, $img, image_stretch_mode, custom_class, align, show_img_title)
		{
			$wrap = $wrap || this.$wrap;
			$img = $img || this.$img;
			image_stretch_mode = image_stretch_mode || this.image_stretch_mode;
			custom_class = custom_class || this.custom_class;
			align = align || this.align;
			show_img_title = show_img_title || this.show_img_title;

			$wrap.attr('class', ($wrap.attr('class') || '').replace(image_stretch_mode_re, ''));
			$wrap.attr('class', ($wrap.attr('class') || '').replace(widget_align_re, ''));

			$img
				.addClass(utils.prefix([
					'has-media-wrap',
					'id' + '-' + this.id,
				], ' '));

			$wrap
				.addClass(utils.prefix([
					'id' + '-' + this.id,
					'media-wrap-' + this.id,
					'media-wrap',
					'media-img',
					'image-stretch-mode-' + image_stretch_mode,
					'align' + align
				], ' '))
				.addClass(custom_class || '')
				.css({
					overflow: (image_stretch_mode !== 'auto' || show_img_title ? 'hidden' : 'visible') //auto instead of visible causes scrollbars on image_stretch_mode: 'auto'
				});

			$wrap.css('height', 20);
		},

		deinit_media_dom: function ($img)
		{
			$img
				.removeClass(utils.prefix('has-media-wrap'))
				.unwrap();
		},

		update: function (args, $img)
		{
			var self = this;

			$.extend(this, args || {});

			$img ? this.$img = this.$img.add($img) : ''; //non-uniform hack shall apply only for elements added after init!
			$img = $img || this.$img; 

			utils.delay(this.get_namespace() + '_' + 'update_timeout', 100, function ()
			{
				if (self.deinitialized)
				{
					return;
				}

				image_loader.on_image_load_end($img, function ($i)
				{
					var $wrap;

					if (self.deinitialized)
					{
						return;
					}

					$wrap = $i.parent();

					$wrap.addClass(self.custom_class || '');

					self.update_media_dom($wrap, $i);
					self.set_wrap($wrap, $i);
					self.set_image($i);
					self.set_title($i);
				});

				self.set_ready(true);
				self.emit_event(self.get_namespace(), 'media_widget_update', self);
			});
		},

		add_elem: function ($img)
		{
			$img = $img.filter('img').add($img.find('img'));
			
			this.$img = this.$img.add($img); //non-uniform hack shall apply only for elements added after init!
			this.init_media_dom($img);	
			this.update(undefined, $img);
		},

		init_events: function ()
		{
			var self = this;

			event_manager.on(this.get_namespace(), 'state_change', function (event, state)
			{
				state ? self.emit_event(self.get_namespace(), 'media_widget_init') : '';
			});

			if (this.on)
			{
				utils.obj_foreach(self, this.on, function (elem, key)
				{
					event_manager.on(self.get_namespace(), 'media_widget' + '_' + key, function (event)
					{
						elem();
					});
				});
			}
		},

		resize_callback: function ()
		{
			var self = this;

			utils.delay(self.get_namespace() + '_' + 'resize', 100, function ()
			{
				self.update();
			});
		},

		init_resize_callback: function ()
		{
			var self = this;

			$(window).on('resize.' + self.get_namespace(), function ()
			{
				self.resize_callback();
			});
		},

		deinit_resize_callback: function ()
		{
			$(window).off('resize.' + this.get_namespace());
		},

		init: function (cfg)
		{
			var self = this;
			
			this.construct(cfg);

			this.register();

			this.init_events();


			this.$img.each(function ()
			{
				self.init_media_dom($(this));				
			});

			this.init_dynamic_title();

			this.update(undefined, 0);

			this.init_resize_callback();



			return this;
		},

		deinit: function ()
		{
			var self = this;

			this.deinitialized = true;

			this.deinit_dynamic_title();

			this.$img.each(function ()
			{
				self.unset_image($(this));
			}, this);
			this.deinit_media_dom(this.$img);
			this.unbind_widgets() //redundant?
			this.unregister();
		},

		set: function (key, value)
		{


			this[key] = value;

			if (key === 'show_img_title' || key === 'img_title_alignment_y' || key === 'img_title_alignment_x' || key === 'img_title_custom_class')
			{
				! this.dynamic_title ? this.init_dynamic_title({key: value}) : this.dynamic_title[key] = value;
			}

			this.update();
		}
	});

	$.fn.mediaWidget = function (options) 
	{
		var options;
        var defaults;

        if (options)
        {

	        defaults = jQuery.extend(true, {}, DEFAULTS);
			options = $.extend(defaults, options);

	        options.elem_selector = $(this).selector;
	        options.$img = options.$img || $(this);
	        
			return new Media_widget(jQuery.extend(true, {}, options)).init();
		} else
		{
			return widget_manager.get_elem('media_widget', $(this));
		}
    }

	ether.Media_widget = ether.Media_widget || Media_widget;
})(jQuery);

(function($)
{
	var utils = ether.utils;
	var Widget = ether.Widget;
	var widget_manager = ether.widget_manager;

	var DEFAULTS = {

		show_img_title: false,
		img_title_alignment_y: 'bottom',
		img_title_alignment_x: 'middle',
		img_title_custom_class: ''
	}

	var Dynamic_title = function (cfg)
	{
		$.extend(this, cfg);

		this.show_img_title = this.show_img_title === true ? 'on-hover' : this.show_img_title;
	}

	Dynamic_title.prototype = new Widget();

	utils.extend_prototype(Dynamic_title, {
		construct: function (cfg)
		{
			this.constructor.prototype.construct ? this.constructor.prototype.construct.apply(this) : '';

			$.extend(this.cfg, cfg || {});

			this.namespace = 'dynamic_title';
		},

		has_only_img_child: function ($elem)
		{
			$elem.children().length === 1 && $elem.children().prop('tagName') === 'IMG';
		},

		has_title_elem: function ($elem)
		{
			return $elem.siblings(utils.prefix_class('img-title')).length;
		},

		append_title_elem: function ($parent, title)
		{
			if ( ! this.has_title_elem($parent))
			{
				this.$title = this.$title.add(
					$('<span class="' + utils.prefix('img-title') + '">' + title + '</span>')
						.appendTo($parent));
			}

			return $parent.children(utils.prefix_class('img-title'));
		},

		has_img_title_wrap: function ($elem)
		{
			return $elem.parent().hasClass(utils.prefix('img-title-wrap'));
		},

		init_img_title_wrap: function ($img)
		{
			var $wrap;

			$wrap = $img.parent();

			if ( ! this.has_img_title_wrap($img))
			{
				this.$wrap = this.$wrap.add($wrap);
				
				$wrap
					.addClass(utils.prefix('img-title-wrap'));
			}


			return $wrap;
		},

		deinit_img_title_wrap: function ($img)
		{
			$img.parent().removeClass(utils.prefix('img-title-wrap'));
		},

		init_title_structure: function ($img)
		{
			var title = utils.get_img_title($img) || '';




			this.init_img_title_wrap($img);	
			this.append_title_elem($img.parent(), title);
		},

		update: function ($img)
		{
			var self = this;

			$img = $img || this.$img;

			$img.each(function ()
			{
				self.update_title($(this));
			});
		},

		update_title: function ($img)
		{
			var $title = $img.siblings(utils.prefix_class('img-title'));
			var $wrap = $img.parent();

			var show_img_title = this.show_img_title;
			var img_title_alignment_y = this.img_title_alignment_y;
			var img_title_custom_class = this.img_title_custom_class;

			var title_height = $title.outerHeight();
			var title_pos_y_hidden = -title_height;
			var title_pos_y_visible = 0;


			if ( ! show_img_title)
			{


				$title.hide();
			} else
			{
				$title
					.addClass(img_title_custom_class || '')
					.css({
						opacity: (show_img_title === 'always' ? 1 : 0),
						top: (img_title_alignment_y === 'top' ? (show_img_title === 'always' ? title_pos_y_visible : title_pos_y_hidden) : 'auto'),
						bottom: (img_title_alignment_y === 'bottom' ? (show_img_title === 'always' ? title_pos_y_visible : title_pos_y_hidden) : 'auto'),
					});

				$title.text().length ? $title.show() : '';
			}

			$wrap.off('.' + this.get_namespace());

			if (show_img_title === 'on-hover' && $title.text().length)
			{
				$wrap
					.on('mouseenter' + '.' + this.get_namespace(), function ()
					{
						$title
							.stop(true, true).animate({
								opacity: 1,
								top: (img_title_alignment_y === 'top' ? title_pos_y_visible : 'auto'),
								bottom: (img_title_alignment_y === 'bottom' ? title_pos_y_visible : 'auto')
							}, 500);
					})
					.on('mouseleave' + '.' + this.get_namespace(), function ()
					{
						$title 
							.delay(250)
							.animate({
								opacity: 0,
								top: (img_title_alignment_y === 'top' ? title_pos_y_hidden : 'auto'),
								bottom: (img_title_alignment_y === 'bottom' ? title_pos_y_hidden : 'auto')
							}, 500);
					});
			}
		},

		add_elem: function ($img)
		{
			$img = $img.filter('img').add($img.find('img'));
			
			this.init_title_structure($img);
			this.update($img);
		},

		init: function (cfg)
		{
			var self = this;

			this.construct();

			this.register();

			this.$wrap = $();
			this.$title = $();

			this.$img.each(function ()
			{
				self.init_title_structure($(this));
			});

			this.update();

			this.set_ready(true);
			this.emit_event(self.get_namespace(), 'dynamic_title_update');


			return this;
		},

		deinit: function ()
		{

			this.deinit_img_title_wrap(this.$img);
			this.unbind_widgets() //redundant?
			this.unregister();
			this.$title.remove();
		},

		set: function (key, value, stop_update)
		{
			var self = this;


			key = (typeof key === 'string' ? {key: value} : key);

			utils.obj_foreach(this, key, function (value, key)
			{
				value !== null && value !== undefined ? self[key] = value : '';
			});

			this.update();
		}
	});

	$.fn.dynamicTitle = function (options) 
	{
		var options;
        var defaults;

        if (options)
        {
	        defaults = jQuery.extend(true, {}, DEFAULTS);
			options = $.extend(defaults, options);

	        options.elem_selector = $(this).selector;
	        options.$img = options.$img || $(this);
	        
			return new Dynamic_title(jQuery.extend(true, {}, options)).init();
		} else
		{

			return widget_manager.get_elem('dynamic_title', $(this));
		}
    }

	ether.Dynamic_title = ether.Dynamic_title || Dynamic_title;
})(jQuery);

(function ($)
{	
	var utils = ether.utils;
	var image_loader = ether.image_loader;
	var css_generator = ether.css_generator;
	var event_manager = ether.event_manager;
	var widget_manager = ether.widget_manager;
	var Widget = ether.Widget;

	var grid_manager = 
	{
		prefix: 'ether',
	    namespace: 'ether',
	    ROW_WRAP_MODE: {
	    	ROW: 0,
	    	GROUP: 1,
	    	ALL: 2
	    },

		default_framework: 'ether',
		FRAMEWORKS: 
		{





			'core':
			{
				row_wrap_mode: 2,
				dom_data:
				{
					elem:
					{
						classes: function () 
						{
							var classes = [
								'id' + '-' + this.id,
								'grid',
								'align' + this.cfg.align
							];

							return utils.prefix(classes, ' ');
						},

						attrs: 
						{
							'data-grid_slider_init': true,
							style: function ()
							{
								return 'width: ' + (typeof this.cfg.width === 'number' ? this.cfg.width + 'px' : this.cfg.width);
							}
						}
					},

					crumb: 
					{
						classes: function () 
						{
							return utils.prefix([
								'crumb' + '-' + this.id
							], ' ');
						}
					},

					'crumb-wrap':
					{
						
						classes: function (id)
						{
							var result = utils.prefix([
								'crumb-wrap' + '-' + this.id,
							], ' ');

							return result;
						},

						attrs: {}	
					},

					crumbs:
					{
						classes: function () 
						{
							var classes = utils.prefix([
								'crumbs' + '-' + this.id
							], ' ');

							return classes;
						},

						attrs: {}	
					},

					'crumb-group':
					{
						classes: function ()
						{
							return utils.prefix([
								'crumb-group' + '-' + this.id,
								'crumb-group',
								'col-group' //temp backward compatibility
							], ' ');
						}
					},

					'slider-window':
					{
						classes: function ()
						{
							return utils.prefix([
								'slider-window',
								'slider-window' + '-' + this.id
							], ' ');
						},

						attrs: {
							style: 'height: 20px; overflow: hidden;'
						}
					},

					'load-overlay':
					{
						classes: function ()
						{
							return utils.prefix([
								'load-overlay',
								'load-overlay' + '-' + this.id
							], ' ');
						}
					},

					'ctrl-wrap':
					{
						classes: function ()
						{
							var cfg = this.cfg;

							return utils.prefix([
								'ctrl-wrap' + '-' + this.id,
								'ctrl-style' + '-' + cfg.ctrl_style + (cfg.theme === 'light' ? '' : '-light'),
								'scroll-axis' + '-' + cfg.scroll_axis
							], ' ');
						},

						attrs:
						{
							style: 'z-index: 20;'
						}
					},

					'ctrl-arrows':
					{
						classes: function ()
						{
							return utils.prefix([
								'ctrl-car', //temp backward compatibility
								'ctrl-car' + '-' + this.id, //temp backward compatibility
								'ctrl-arrows',
								'ctrl-arrows' + '-' + this.id
							], ' ');
						},

						attrs:
						{
							style: function ()
							{
								var cfg = this.cfg;
								var top = 0, bottom = 0, left = 0, right = 0;

								cfg.ctrl_arrows_align_y === 'bottom' ? top = 'auto' : bottom = 'auto';
								cfg.ctrl_arrows_align_x === 'right' ? left = 'auto' : right = 'auto';

								return [
									'top: ' + top,
									'left: ' + left,
									' bottom: ' + bottom,
									'right: ' + right,
									'z-index: 20',
									'margin: ' + cfg.ctrl_arrows_spacing / 2 + 'px',
									''
								].join('; ');
							}
						}
					},

					'ctrl-arrow':
					{
						classes: function (id, dir)
						{
							return utils.prefix([
								'ctrl',
								'ctrl' + '-' + this.id,
								'ctrl' + '-' + (dir ? 'next' : 'prev')
							], ' ');
						},

						attrs: 
						{
							'data-shifttype': 'relative',
							'data-shiftdest': function (id, dir) 
							{
								return (dir ? 1 : -1);
							}
						}
					},

					'ctrl-pag':
					{
						classes: function ()
						{
							return utils.prefix([
								'ctrl-pag',
								'ctrl-pag' + '-' + this.id
							], ' ');
						},

						attrs:
						{
							style: function ()
							{
								var cfg = this.cfg;
								var top = 0, bottom = 0, left = 0, right = 0;

								cfg.ctrl_pag_align_y === 'bottom' ? top = 'auto' : bottom = 'auto';
								cfg.ctrl_pag_align_x === 'right' ? left = 'auto' : right = 'auto';

								return [
									'top: ' + top,
									'left: ' + left,
									' bottom: ' + bottom,
									'right: ' + right,
									'z-index: 20',
									'overflow: hidden',
									''
								].join('; ');
							}
						}
					},

					'ctrl-pag-crumb':
					{
						classes: function ()
						{
							return utils.prefix([
								'ctrl',
								'ctrl' + '-' + this.id,
								'ctrl-pag-crumb',
								'ctrl-pag-crumb' + '-' + this.id,
							], ' ');
						},

						attrs:
						{
							'data-shifttype': 'absolute',
							'data-shiftdest': function (id, dest)
							{
								return dest;
							},

							style: function ()
							{
								return 'top: 0; left: 0; ' + 'margin: ' + this.cfg.ctrl_pag_spacing / 2 + 'px; ';
							}
						}
					}
				}
			},

			'unsemantic': 
			{
				row_wrap_mode: 0,
				dom_data:
				{
					elem:
					{
						classes: function () 
						{
							var classes = [
								'unsemantic' + '-' + this.id,
							];

							return classes;
						}
					},

					'crumb-wrap':
					{
						selector: '> .grid-container > *',
						classes: function (id)
						{
							var result = [
								'column'
							];

							result.push('grid' + '-' + (100 / this.cfg.cols).toFixed(0));

							return result;
						}
					},

					crumbs:
					{
						selector: '> .grid-container',
						classes: function () 
						{
							var classes = [
								'grid-container'
							];

							return classes;
						},

					},

					crumb:
					{
						selector: '> .grid-container > * > *'
					}
				},

				grid_detector_data: 
				{
					row_filter: /\bgrid-container\b/,
					col_filter: /\bgrid-(\d+)\b/,
					depth: 3,
					count_fn: function ($row, $col)
					{
						var row_count = 1;
						var col_count = $col.length;

						return {
							rows: row_count,
							cols: col_count
						}
					}
				}
			},

			'semantic-ui': 
			{
				row_wrap_mode: 0,
				dom_data:
				{
					elem:
					{
						classes: function () 
						{
							var classes = [
								'semantic-ui' + '-' + this.id,
								'ui',
								'doubling',
								'grid',
								'column'
							];

							var col_marker;
							var c = this.cfg.cols;
							var markers = {1: 'one', 2: 'two', 3: 'three', 4: 'four', 5: 'five', 6: 'six', 7: 'seven', 8: 'eight', 9: 'nine', 10: 'ten', 11: 'eleven', 12: 'twelve', 13: 'thirteen', 14: 'fourteen', 15: 'fifteen', 16: 'sixteen'};

							if (typeof c === 'number')
							{
								col_marker = markers[c];
							}

							classes.push(col_marker);

							return classes;
						}
					},

					'crumb-group':
					{
						classes: function () 
						{
							var classes = [
								'ui',
								'doubling',
								'grid',
								'column'
							];
							var col_marker;
							var c = this.cfg.cols;
							var markers = {1: 'one', 2: 'two', 3: 'three', 4: 'four', 5: 'five', 6: 'six', 7: 'seven', 8: 'eight', 9: 'nine', 10: 'ten', 11: 'eleven', 12: 'twelve', 13: 'thirteen', 14: 'fourteen', 15: 'fifteen', 16: 'sixteen'};

							if (typeof c === 'number')
							{
								col_marker = markers[c];
							}

							classes.push(col_marker);

							return classes;
						}
					},

					'crumb-wrap':
					{
						selector: '> .row > .column',
						classes: function (id)
						{
							var result = [
								'column'
							];

							return result;
						}
					},

					crumbs:
					{
						selector: '> .row',
						classes: function () 
						{
							var classes = [
								'row'
							];

							return classes;
						},

					},

					crumb:
					{
						selector: '> .row > * > *'
					}
				},

				grid_detector_data: 
				{
					row_filter: /\brow\b/,
					col_filter: /\bcolumn\b/,
					depth: 3,
					count_fn: function ($row, $col)
					{
						var row_count = 1;
						var col_count = $col.length;

						return {
							rows: row_count,
							cols: col_count
						}
					}
				}
			},

			'skeleton':
			{
				row_wrap_mode: 0,
				dom_data:
				{
					elem:
					{
						classes: function () 
						{
							var classes = [
								'skeleton' + '-' + this.id,
								'container'
							];

							return classes;
						}
					},

					'crumb-wrap':
					{
						selector: '> .row > *',
						classes: function (id)
						{
							var result = [];
							var c = this.cfg.cols
							var col_marker = (c === 1 ? 'sixteen' : c === 2 ? 'eight' : c === 3 ? 'one-third' : c < 7 ? 'four' : c < 12 ? 'two' : 'one');

							result.push(col_marker);
							result.push(c === 3 || c === 1 ? 'column' : 'columns'); //good nig?


							return result;
						}
					},

					crumbs:
					{
						selector: '> .row',
						classes: function () 
						{
							var classes = [
								'row'
							];

							return classes;
						},

					},

					crumb:
					{
						selector: '> .row > * > *'
					}
				},

				callback:
				{
					crumbs: function (name, deconstruct, $elem)
					{
						var cfg = this.cfg;
						var a;

						if ( ! deconstruct)
						{
							this.get_dom('crumb-wrap').removeClass('alpha omega');
							for (a = 0; a < this.crumb_count; a += 1)
							{
								if (a % this.real_col_count === 0)
								{
									this.get_dom('crumb-wrap').eq(a).addClass('alpha');
								} else if (a % this.real_col_count === this.real_col_count - 1) 
								{
									this.get_dom('crumb-wrap').eq(a).addClass('omega');
								};
							}
						}
					}
				},

				grid_detector_data: 
				{
					row_filter: /\brow\b/,
					col_filter: /\bcolumn\b/,
					depth: 3,
					count_fn: function ($row, $col)
					{
						var row_count = 1;
						var col_count = $col.length;

						return {
							rows: row_count,
							cols: col_count
						}
					}
				}
			},

			'foundation': 
			{
				row_wrap_mode: 0,
				dom_data:
				{
					elem:
					{
						classes: function () 
						{
							var classes = [
								'foundation' + '-' + this.id
							];

							return classes;
						}
					},

					'crumb-wrap':
					{
						selector: '> .row > .columns',
						classes: function (id)
						{
							var result = [];
							var col_marker;
							var c = this.cfg.cols;

							if (typeof c === 'number')
							{
								col_marker = (c === 1 ? 12 : c === 2 ? 6 : c < 6 ? 4 : c < 10 ? 2 : 1);
							}						

							result.push('columns');
							result.push('medium-' + col_marker);
							result.push('large-' + col_marker);
							result.push('small-' + col_marker);

							return result;
						}
					},

					crumbs:
					{
						selector: '> .row',
						classes: function () 
						{
							var classes = [
								'row'
							];

							return classes;
						},

					},

					crumb:
					{
						selector: '> .row > * > *'
					}
				},

				grid_detector_data: 
				{
					row_filter: /\brow\b/,
					col_filter: /\bcolumns\b/,
					depth: 3,
					count_fn: function ($row, $col)
					{
						var row_count = 1;
						var col_count = $col.length;

						return {
							rows: row_count,
							cols: col_count
						}
					}
				}
			},

			'bootstrap': 
			{
				row_wrap_mode: 0,
				dom_data:
				{
					elem:
					{
						classes: function () 
						{
							var classes = [
								'bootstrap' + '-' + this.id
							];

							return classes;
						}
					},

					'crumb-wrap':
					{
						selector: '> .row > *',
						classes: function (id)
						{
							var result = [];
							var col_marker;
							var c = this.cfg.cols;

							if (typeof c === 'number')
							{
								col_marker = (c === 1 ? 12 : c === 2 ? 6 : c < 6 ? 4 : c < 10 ? 2 : 1);
							}							

							result.push('col-md-' + col_marker);

							return result;
						}
					},

					crumbs:
					{
						selector: '> .row',
						classes: function () 
						{
							var cfg = this.cfg;
							var classes = [
								'row'
							];

							return classes;
						},

					},

					crumb:
					{
						selector: '> .row > * > *'
					}
				},

				grid_detector_data: 
				{
					row_filter: /\brow\b/,
					col_filter: /\bcol-(\w+)-(\d+)\b/,
					depth: 3,
					count_fn: function ($row, $col)
					{
						var row_count = 1
						var col_count = $col.length;

						return {
							rows: row_count,
							cols: col_count
						}
					}
				}
			},

			'ether': 
			{
				cfg: 
				{
					mark_first_col: true
				},

				row_wrap_mode: 1,
				dom_data:
				{
					elem:
					{
						classes: function () 
						{
							var classes = [];

							isie && iev === 7 ? classes.push(utils.prefix('ie7-grid-fix')) : '';
							this.is_slider() ? classes.push(utils.prefix('slider')) : '';

							return classes;
						},

					},

					'crumb-wrap':
					{
						selector: '> .ether-cols > .ether-col',
						classes: function () 
						{
							return utils.prefix([
								'col'
							], ' ');
						}
					},

					crumbs:
					{
						selector: '> .ether-cols',
						classes: function () 
						{
							var cfg = this.cfg;
							var classes = [
								'cols',
								'cols' + '-' + cfg.cols,
								'rows' + '-' + cfg.rows,
								'spacing' + '-' + (cfg.col_spacing_enable === true ? 1 : 0)
							];

							return utils.prefix(classes, ' ');
						}
					},

					crumb:
					{
						selector: '> .ether-cols > .ether-col > *'
					}
				},

				callback:
				{
					crumb: function (name, deconstruct, $elem)
					{
						$elem = $elem || this.get_dom(name);

						if (iev !== 7)
						{
							return;
						}

						if ( ! deconstruct)
						{
							$elem.wrap('<div>').parent().addClass(utils.prefix([
								'ie7-inner-col-wrap',
								'ie7-inner-col-wrap' + '-' + this.id
							], ' '));

							this.set_dom(name, $(this.elem).find(utils.prefix_class('ie7-inner-col-wrap' + '-' + this.id)), this.get_selector(name));
						} else
						{
							$elem = $elem || $(this.elem).find(utils.prefix_class('ie7-inner-col-wrap' + '-' + this.id));

							$elem.children().length ? $elem.children().unwrap() : $elem.remove();

							this.set_dom(name, undefined, this.get_selector(name));
						}
					},

					crumbs: function (name, deconstruct, $elem)
					{
						var cfg = this.cfg;
						var a;
						var first_col = utils.prefix('first-col');
						var last_col = utils.prefix('last-col');

						if ( ! cfg.mark_first_col)
						{
							return;
						}

						if ( ! deconstruct)
						{
							this.get_dom('crumb-wrap').removeClass(first_col);
							this.get_dom('crumb-wrap').removeClass(last_col);
							
							for (a = 0; a < this.crumb_count; a += 1)
							{
								if (a % this.real_col_count === 0)
								{
									this.get_dom('crumb-wrap').eq(a).addClass(first_col);
								}

								if (a === this.real_col_count - 1 && iev < 9)
								{
									this.get_dom('crumb-wrap').eq(a).addClass(last_col)
								}
							}
						}
					}
				},

				grid_detector_data: 
				{
					row_filter: /\bether-cols\b/,
					col_filter: /\bether-col\b/,
					depth: 3,
					count_fn: function ($row, $col)
					{
						var row_count = $col.length / $row.attr('class').match(/\bether-cols-(\d)/)[1];
						var col_count = $col.length / row_count;

						return {
							rows: row_count,
							cols: col_count
						}
					}
				},				
				css_styles: function ()
				{
					var cfg = this.cfg;
					var selector_name;
					var rules;
					var id_suffix = '-' + this.id;

					if (this.has_custom_col_spacing())
					{
						selector_name = [
							cfg.elem_selector,
							utils.prefix_class('grid' + ' '),
							utils.prefix_class('crumbs' + id_suffix),
						];
						rules = {
							margin: -(cfg.col_spacing_size/2) + 'px'
						}
						css_generator.add_style_data('all', selector_name, rules);

						selector_name = [
							cfg.elem_selector,
							utils.prefix_class('grid' + ' '),
							utils.prefix_class('crumb-wrap' + id_suffix)
						];
						rules = {
							padding: (cfg.col_spacing_size/2) + 'px'
						}
						css_generator.add_style_data('all', selector_name, rules);
						
						if (isie && parseInt(iev) === 7)
						{
							selector_name = [
								cfg.elem_selector,
								utils.prefix_class('grid'),
								utils.prefix_class('ie7-grid-fix' + ' '),
								utils.prefix_class('crumb-wrap' + id_suffix)
							];
							rules = {

								padding: '0 !important'
							};
							css_generator.add_style_data('ie7', selector_name, rules);
							
							selector_name = [
								cfg.elem_selector,
								utils.prefix_class('grid' + ' '),
								utils.prefix_class('ie7-inner-col-wrap' + id_suffix)
							];
							rules = {
								margin: (cfg.col_spacing_size/2) + 'px !important'
							};
							css_generator.add_style_data('ie7', selector_name, rules);
						}
					}
				}
			}
		},

		grid_detector: function (row_filter, col_filter, depth, count_fn)
		{



			var row_count;
			var col_count;

			var $next;
			var $row;
			var $col;

			while (depth > 0)
			{
				if ( ! $row || ! $row.length)
				{
					$next = ($next ? $next.children() : $(this.elem));
					$row = $next.filter(function ()
					{
						return ($(this).attr('class') || '').match(row_filter);
					});
				} else if ( ! $col || ! $col.length)
				{
					$next = $next.eq(0).children();
					$col = $next.filter(function () {
						return $(this).attr('class').match(col_filter);
					});

					if ($col.length)
						break;
				}

				if( ! $next.length)
					break;

				depth -= 1;
			}

			if ($row && $row.length && $col && $col.length)
			{
				row_count = 1;
				col_count = $col.length;
			} else
			{
				return;
			}

			return count_fn($row, $col);
		},

		dom_constructors: 
		{
			elem: function (name, deconstruct, $elem)
			{
				if ( ! deconstruct)
				{
					this.update_dom_elem(name, $(this.elem))

					this['elem_width'] = $(this.elem).outerWidth();
					this['real_row_count'] = ($(window).width() < 580 ? 1 : this.cfg.rows); //limit row count on small screens. Affects slider only.
				} else
				{
					this.set_dom_props(name, $(this.elem), true)
				}
			},

			crumbs: function (name, deconstruct, $elem)
			{
				var $new_wrap = this.set_dom_props(name);

				if ( ! deconstruct)
				{
					if ( ! $elem.length)
					{
						utils.wrap_dom_groups($new_wrap, this.get_dom('crumb-wrap'), this.get_crumbs_capacity());
					}

					this.update_dom_elem(name);

					this['real_col_count'] = Math.round(this.elem_width / this.get_dom('crumb-wrap').outerWidth());
				} else
				{
					this.deinit_dom_elem(name, 'unwrap');
				}
			},

			'crumb-wrap': function (name, deconstruct, $elem)
			{
				var $new_wrap = this.set_dom_props(name);
				if ( ! deconstruct)
				{
					if ( ! $elem.length)
					{
						utils.wrap_dom_groups($new_wrap, this.get_dom('crumb'), 1);	
					} else if ($elem.length === 1 && ! $elem.hasClass(utils.prefix(name))) //only when adding an element after init
					{

						if (this.crumb_count === 2)
						{
							this.get_dom('crumb', true).filter(utils.prefix_class('phantom-crumb')).parent().remove();
							this.set_dom('crumb');
						}

						utils.wrap_dom_groups($new_wrap, $elem, 1);
					}

					this.update_dom_elem(name);
				} else
				{
					this.deinit_dom_elem(name, 'unwrap');
				}
			},

			crumb: function (name, deconstruct, $elem)
			{
				if ( ! deconstruct)
				{







					$elem = $elem.length ? $elem : this.get_dom(name, false, this.get_selector(name)).length ? this.get_dom(name, false, this.get_selector(name)) : $(this.elem).children(); 

					if ( ! $elem.length) //apply phantom crumb
					{
						$('<div>')
							.addClass(utils.prefix('phantom-crumb'))
							.appendTo($(this.elem)) 

						$elem = $(this.elem).children(utils.prefix_class('phantom-crumb'));
					}

					this.update_dom_elem(name, $elem);

					this.crumb_count = this.get_dom('crumb').length;
				} else
				{
					this.deinit_dom_elem(name);
				}
			},

			'crumb-group': function (name, deconstruct, $elem)
			{
				var cfg = this.cfg;
				var $new_wrap = this.set_dom_props(name);
				var capacity;

				if ( ! deconstruct)
				{
					if ( ! $elem.length)
					{


						if (this.row_wrap_mode = grid_manager.ROW_WRAP_MODE.ALL)
						{
							this.row_wrap_mode_default = this.row_wrap_mode //enable fallback to default (ALL) on crumb-group deconstruct
							this.row_wrap_mode = grid_manager.FRAMEWORKS[this.cfg.framework].row_wrap_mode;
							this.construct_dom('crumbs', true);
							this.construct_dom('crumbs');
						}

						capacity = (this.row_wrap_mode === grid_manager.ROW_WRAP_MODE.GROUP ? 1 : this.real_row_count);

						utils.wrap_dom_groups($new_wrap, this.get_dom('crumbs'), capacity);
					}

					this.update_dom_elem(name);

					this.crumb_group_count = this.get_crumb_group_count();
					this.view_pos = this.get_next_view_pos(this.view_pos || cfg.view_pos, 'relative', 0, cfg.loop, this.crumb_group_count);
					this.set_visible_crumb_group();

				} else
				{
					this.deinit_dom_elem(name, 'unwrap');

					if (this.row_wrap_mode_default)
					{
						this.row_wrap_mode = this.row_wrap_mode_default; //fallback to default (ALL)


					}
				}
			},

			'load-overlay': function (name, deconstruct, $elem)
			{
				if ( ! deconstruct)
				{
					if ( ! $elem.length)
					{
						$elem = this.set_dom_props(name);
						this.get_dom('slider-window').append($elem);
					}

					this.update_dom_elem(name);
				} else
				{
					this.deinit_dom_elem(name, 'remove');
				}
			},

			'slider-window': function (name, deconstruct, $elem)
			{
				if ( ! deconstruct)
				{
					if ( ! $elem.length)
					{
						$elem = this.set_dom_props(name);
						this.get_dom('crumb-group').wrapAll($elem);
					}

					this.update_dom_elem(name);
				} else
				{
					this.deinit_dom_elem(name, 'unwrap');
				}
			},

			'ctrl-wrap': function (name, deconstruct, $elem)
			{
				if ( ! deconstruct)
				{
					if ( ! $elem.length)
					{
						$elem = this.set_dom_props(name);
						$elem
							.appendTo($(this.elem))
							.hide();
					}

					this.update_dom_elem(name);
				} else
				{
					this.deinit_dom_elem(name, 'remove');
				}
			},

			'ctrl-arrows': function (name, deconstruct, $elem)
			{
				if ( ! deconstruct)
				{
					if ( ! $elem.length)
					{
						$elem = this.set_dom_props(name);
						$elem
							.appendTo(this.get_dom('ctrl-wrap'))
							.append(this.set_dom_props('ctrl-arrow', undefined, undefined, [0]))
							.append(this.set_dom_props('ctrl-arrow', undefined, undefined, [1]));
					}

					this.update_dom_elem(name);
				} else
				{
					this.deinit_dom_elem(name, 'remove');
				}
			},

			'ctrl-pag': function (name, deconstruct, $elem)
			{
				var count;

				if ( ! deconstruct)
				{
					if ( ! $elem.length)
					{
						$elem = this.set_dom_props(name);
						count = this.get_dom('crumb-wrap').length;

						$elem
							.appendTo(this.get_dom('ctrl-wrap'));

						for (a = 0; a < count; a += 1)
						{
							$elem.append(this.set_dom_props('ctrl-pag-crumb', undefined, undefined, [a]));
						}
					}

					this.update_dom_elem(name);
				} else
				{
					this.deinit_dom_elem(name, 'remove');
				}
			}
		},

		dom_constructors_init_order:
		{
			grid: function (mode)
			{
				var order =
				[
					'elem',
					'crumb',
					'crumb-wrap',
					'crumbs'
				];

				return mode ? order : order.reverse(); 
			},

			slider: function (mode)
			{
				var cfg = this.cfg;

				var order =
				[
					'crumb-group',
					'slider-window',
					'load-overlay'
				];

				cfg.ctrl ? order.push('ctrl-wrap') : '';
				cfg.ctrl_arrows ? order.push('ctrl-arrows') : '';
				cfg.ctrl_pag ? order.push('ctrl-pag') : '';

				return mode ? order : order.reverse();
			}
		},

		external_widgets:
		{
			media_widget: function () { return this.cfg.img_title || this.cfg.init_media_widget; },
		},

		external_widget_constructors:
		{
			media_widget: 
			{
				init: function ()
				{
					var cfg = this.cfg;
					var $img;

					if ( ! (cfg.init_media_widget || cfg.img_title))
						return;

					$img = ( ! cfg.media_selector ? (this.get_dom('crumb').length ? this.get_dom('crumb') : $(this.elem).children('img')) : $(this.elem).find(cfg.media_selector));
					
					$img = $img.filter('img').add($img.find('img'));

					if ( ! $img.length)
						return;

					this.bind_widget($img.mediaWidget({
						$img: $img, 
						use_parent_wrap: cfg.use_parent_wrap,
						wrap_width: cfg.media_width,
						wrap_height: cfg.media_height, //mind the name difference!
						wrap_height_ratio: cfg.media_height_ratio, //mind the name difference!
						image_stretch_mode: cfg.image_stretch_mode, 
						image_align_x: cfg.image_align_x, 
						image_align_y: cfg.image_align_y, 
						media_widget_custom_class: cfg.media_widget_custom_class,

						show_img_title: cfg.show_img_title, 
						img_title_alignment_y: cfg.img_title_alignment_y,
						img_title_custom_class: cfg.img_title_custom_class
					}), 'child');
				},

				update: function (data)
				{
					var cfg = this.cfg;
					var widget = this.get_widget('media_widget', 'child', 0);

					if ( ! (cfg.init_media_widget || cfg.img_title))
						return;

					! widget || ! widget.length ? grid_manager.external_widget_constructors.media_widget.init.apply(this) : widget.add_elem(data);
				},

				deinit: function ()
				{
					this.get_widget('media_widget', 'child').forEach(function (elem)
					{
						elem.deinit();
					});
				}
			}
		},

		scroll_axes: ['x', 'y', 'z'],
		scroll_axes_dir_map: 
		{
			'x': {x: 1, y: 0}, 
			'y': {x: 0, y: 1},

			'z': {x: 0, y: 0}
		},

		scroll_transitions: ['slide', 'slideIn', 'slideOut', 'switch', 'swap'],
		DEFAULTS:  
		{
			auto_detect_framework: false,
			framework: 'ether',
			dom_data: null, //use this for hardcoded grid with custom structrue when using a default framework //most likely won't be necessary; use a custom framework instead
			grid_hardcoded: false, //shortcut to framework auto detect //not yet incorporated

			width: 'auto',
			align: 'auto',

			init_grid: true,
			cols: 1,
			rows: 1,
			col_spacing_enable: true,
			col_spacing_size: 30,
			grid_height: 'auto', //
			grid_height_ratio: 100, //
			hide_grid_cell_overflow: false, //

			slider: false,
			advanced_responsive: true,
			random_order: false,
			view_pos: 0,
			scroll_axis: 'x',
			transition: 'slide',
			easing: 'swing',
			scroll_speed: 500,
			loop: false,
			scroll_on_mousewheel: false,
			shift_fade: false,

			ctrl: false,
			ctrl_arrows: false,
			ctrl_pag: false,
			ctrl_external: [],
			ctrl_arrows_pos_x: 'center',//
			ctrl_arrows_pos_y: 'top',//
			ctrl_arrows_align_x: 'center',
			ctrl_arrows_align_y: 'top',
			ctrl_arrows_spacing: 2,
			ctrl_arrows_pos_shift_x: 0,
			ctrl_arrows_pos_shift_y: 0,
			ctrl_arrows_full_width: false,
			ctrl_pag_pos_x: 'center',//
			ctrl_pag_pos_y: 'top',//
			ctrl_pag_align_x: 'center',
			ctrl_pag_align_y: 'top',
			ctrl_pag_spacing: 2,
			ctrl_pag_pos_shift_x: 0,
			ctrl_pag_pos_shift_y: 0,
			ctrl_always_visible: false,
			ctrl_padding: 8,
			ctrl_style: 0,
			ctrl_hide_delay: 1000,
			
			autoplay_enable: false,//
			autoplay: false,
			autoplay_interval: 3,
			autoplay_shift_dir: 1,
			autoplay_random_order: false,
			pause_autoplay_on_hover: true,

			init_media_widget: false,
			media_widget_custom_class: '',
			media_selector: null,
			media_height: 'auto',
			media_height_ratio: 100,
			image_stretch_mode: 'auto',
			image_align_x: 'middle',
			image_align_y: 'middle',

			gallery_img_title: false, //
			always_show_img_title: false, //
			img_title: false, 
			show_img_title: false,

			theme: 'light',

			elem_selector: null,
			elem: null,
	    },

	    elems: [],
	    get_framework: function (name)
	    {
	    	return (this.FRAMEWORKS[name] ? this.FRAMEWORKS[name] : this.FRAMEWORKS[this.default_framework]);
	    },

	    get_elem: function (namespace, id)
	    {
	    	widget_manager.get_elem(namespace, id);
	    }
	}
    ether.grid_manager = ether.grid_manager || grid_manager;

	var Grid_slider = function (cfg) 
	{
		var DEF = grid_manager.DEFAULTS;
		var diff = function (a, o1, o2)
		{
			o1 = o1 || cfg;
			o2 = o2 || DEF;


			return o1[a] !== undefined && o1[a] !== o2[a];
		}

		this.cfg = this.cfg || {};


		cfg.ctrl_arrows_align_x = cfg.ctrl_arrows_pos_x;
		cfg.ctrl_arrows_align_y = cfg.ctrl_arrows_pos_y;
		cfg.ctrl_pag_align_x = cfg.ctrl_pag_pos_x;
		cfg.ctrl_pag_align_y = cfg.ctrl_pag_pos_y;

		if (cfg.ctrl)
		{
			cfg.ctrl_arrows = true;
			cfg.ctrl_pag = true;
		} else
		{
			cfg.ctrl_arrows = cfg.ctrl_arrows || diff('ctrl_arrows_align_x') || diff('ctrl_arrows_align_y') || diff('ctrl_arrows_spacing') || diff('ctrl_arrows_pos_shift_x') || diff('ctrl_arrows_pos_shift_y') || cfg.ctrl_arrows_full_width;
			cfg.ctrl_pag = cfg.ctrl_pag || diff('ctrl_pag_align_x') || diff('ctrl_pag_align_y') || diff('ctrl_pag_spacing') || diff('ctrl_pag_pos_shift_x') || diff('ctrl_pag_pos_shift_y') || cfg.ctrl_pag_full_width;

			cfg.ctrl = cfg.ctrl_arrows || cfg.ctrl_pag;

		}

		cfg.slider = cfg.slider || cfg.ctrl;

		cfg.autoplay = (cfg.autoplay || cfg.autoplay_enable) || (cfg.autoplay_interval || cfg.autoplay_shift_dir) !== undefined;

		cfg.img_title = (cfg.img_title || cfg.gallery_img_title);
		cfg.show_img_title = (cfg.always_show_img_title ? 'always' : cfg.show_img_title || cfg.img_title);
		cfg.show_img_title = (cfg.show_img_title === true ? 'on-hover' : cfg.show_img_title);

		cfg.media_height_ratio = (cfg.grid_height_ratio !== 100 ? cfg.grid_height_ratio : cfg.media_height_ratio);
		cfg.media_height = (cfg.media_height_ratio !== 100 ? 'constrain' : (cfg.grid_height !== 'auto' ? cfg.grid_height : cfg.media_height));
		cfg.init_media_widget = cfg.init_media_widget || cfg.image_stretch_mode !== 'auto' || cfg.media_height !== 'auto' || cfg.image_align_x !== 'middle' || cfg.image_align_y !== 'middle' || cfg.media_height_ratio !== 100;
		cfg.media_width = cfg.image_stretch_mode && cfg.image_stretch_mode !== 'auto' ? '100%' : 'auto';

		cfg.col_spacing_size = (cfg.col_spacing_enable ? (cfg.col_spacing_size !== '' && cfg.col_spacing_size !== undefined ? cfg.col_spacing_size :  DEF.col_spacing_size) : 0);


		$.extend(this.cfg, cfg || {});
	}

	Grid_slider.prototype = new Widget();

	utils.extend_prototype(Grid_slider, {
		construct: function (cfg)
		{
			this.constructor.prototype.construct ? this.constructor.prototype.construct.apply(this) : '';

			$.extend(this.cfg, cfg || {});

			this.namespace = 'gridslider';
			this.elem = this.cfg.elem;
		},

		update_dom_elem: function (name, $elem, deconstruct, selector)
		{
			selector = selector || this.get_selector(name);
			this.constructor.prototype.update_dom_elem.apply(this, [name, $elem, deconstruct, selector]);
		},

		is_slider: function ()
		{
			return this.cfg.slider;
		},	
		is_in_view: function($elem)
		{
			var e_mid = $elem.offset().top + $elem.height() / 2;
			var w_start = $(window).scrollTop();
			var w_end = w_start + $(window).height();


			return ! (e_mid < w_start || e_mid > w_end);
		},


		load_framework: function (name)
		{
			var f = grid_manager.get_framework(name);
			var data = f.dom_data;
			var callback = f.callback;
			var css_styles = f.css_styles;
			var cfg = f.cfg;

			$.extend(this.cfg, cfg);

			this.frameworks ? this.frameworks.push(f) : this.frameworks = [f];

			this.load_dom_data(data);
			this.load_dom_constructor_callback(callback);
			this.generate_stylesheet_content(css_styles);
		},

		detect_starting_setup: function ()
		{
			var detected_framework;
			var detector_result;
			var finish_early;

			this.row_wrap_mode = grid_manager.ROW_WRAP_MODE.ALL;

			if ( ! this.cfg.auto_detect_framework)
				return;



			utils.obj_foreach(this, grid_manager.FRAMEWORKS, function (f, name)
			{
				var d, r;

				if (finish_early)
					return;
				d = f.grid_detector_data;
				r = d ? grid_manager.grid_detector.apply(this, [d.row_filter, d.col_filter, d.depth, d.count_fn]) : undefined;

				if (d && r)
				{
					detected_framework = name;
					detector_result = r;
					finish_early = true;
				}
			});

			if (detected_framework)
			{
				$.extend(true, this.cfg, detector_result);

				this.framework = detected_framework;				
				this.row_wrap_mode = grid_manager.FRAMEWORKS[detected_framework].row_wrap_mode;

			} else
			{

			}
		},

		is_structure_ready: function (type)
		{
			var result = true;
			var constructors = 
			{
				grid: ['elem', 'crumb', 'crumb-wrap', 'crumbs' ],
				slider: ['crumb-group', 'slider-window', 'load-overlay'],
				'slider-controls': ['ctrl-wrap', 'ctrl-pag', 'ctrl-arrows']
			}

			constructors[type].forEach(function (name)
			{

				! this.get_constructor_state(name) ? result = false : '';
			}, this);


			return result;
		},

		is_ready: function (type)
		{
			switch (type)
			{
				case 'slider-window':
				{












					return this.is_structure_ready('slider') && (this.are_ready_child_widgets('media_widget') || this.external_widget_init_states && this.external_widget_init_states['media_widget'] === 'deinit') && ( ! this.cfg.advanced_responsive || this.first_rewrap_crumb_group || this.first_advanced_responsiveness_check || ! this.cfg.init_media_widget && ! this.cfg.img_title);
				}
			}
		},

		set_load_overlay: function (state, speed)
		{
			speed = speed || this.cfg.scroll_speed

			this.get_dom('load-overlay')[(state ? 'fadeIn' : 'fadeOut')](speed);
		},

		set_slider_window_height: function (speed, force_reset)
		{
			var self = this;
			var cfg = this.cfg;

			if ( ! this.is_slider())
			{
				return;
			}


			speed = (speed !== undefined ? speed : cfg.scroll_speed);

			if ( ! this.slider_window_height_allow_reset && ! force_reset)
			{
				return;
			}

			this.get_dom('slider-window')
				.stop(true, false)
				.css({
					overflow: 'hidden'
				})
				.animate({
					height: this.get_elem_height()
				}, speed)
				.queue(function ()
				{
					$(this)
						.css({overflow: this.shift_in_progress ? 'hidden' : 'visible'})
						.dequeue();
					self.slider_window_height_allow_reset = true;
				});	
		},

		shift_elem: function (args)
		{
			var cfg = this.cfg;

			var start_pos = args.start_pos;
			var end_pos = args.end_pos;
			var start_opacity = args.start_opacity;
			var end_opacity = args.end_opacity;
			var $elem = args.$elem;
			var scroll_axis = args.scroll_axis;

			$elem.css({ 
				left: start_pos.x, 
				top: start_pos.y, 
				visibility: 'visible', 
				'z-index': 10, 
				opacity: (scroll_axis !== 'z' ? (cfg.shift_fade ? start_opacity : 1) : start_opacity)
			})
			.animate({ 
				left: end_pos.x, 
				top: end_pos.y, 
				opacity: (scroll_axis !== 'z' ? (cfg.shift_fade ? end_opacity : 1) : end_opacity)
			}, cfg.scroll_speed, cfg.easing, function ()
			{
				$(this).css({
					visibility: end_opacity ? 'visible' : 'hidden',
					'z-index': end_opacity ? 10 : -1
				});
			});
		},

		update_scroll_transition: function ()
		{
			this.scroll_transition = (this.cfg.transition === 'random' ? grid_manager.scroll_transitions.getRandom() : this.cfg.transition);
		},

		update_scroll_axis: function ()
		{
			this.scroll_axis = (this.cfg.scroll_axis === 'random' ? grid_manager.scroll_axes.getRandom() : this.cfg.scroll_axis);
		},

		is_shift_data_obj: function (obj)
		{
			return obj.start_pos !== undefined;
		},

		request_shift_data: function (elem_id, scroll_axis, scroll_transition)
		{
			var cfg = this.cfg;

			scroll_axis = scroll_axis || this.scroll_axis;
			scroll_transition = scroll_transition || this.scroll_transition;

			var pos_out =
			{
				x: this.shift_dir * (this.elem_width + cfg.col_spacing_size) * grid_manager.scroll_axes_dir_map[scroll_axis]['x'],
				y: this.shift_dir * (this.get_elem_height() + cfg.col_spacing_size) * grid_manager.scroll_axes_dir_map[scroll_axis]['y']
			}

			var pos_in = 
			{
				x: 0,
				y: 0
			}

			var start_pos = (elem_id === this.view_pos ? pos_out : pos_in);
			var end_pos = (elem_id === this.view_pos ? pos_in : pos_out);

			if (elem_id !== this.view_pos && (scroll_transition === 'switch' || scroll_transition === 'swap' || scroll_transition === 'shuffle'))	
			{
				start_pos.x *= -1;
				start_pos.y *= -1;
			}

			if (elem_id !== this.view_pos)
			{
				end_pos.x *= -1;
				end_pos.y *= -1;
			}

			$elem = this.get_dom('crumb-group').eq(elem_id);

			return {
				start_pos: start_pos,
				end_pos: end_pos,
				start_opacity: elem_id === this.view_pos ? 0 : 1,
				end_opacity: elem_id === this.view_pos ? 1 : 0,
				$elem: $elem,
				scroll_axis: scroll_axis
			}
		},

		update_shift_data: function ()
		{
			this.update_scroll_transition();
			this.update_scroll_axis();
		},

		on_shift_start: function ()
		{
			this.shift_in_progress = 1;
			event_manager.trigger(this.get_namespace(), 'apply_shift_start');
		},

		on_shift_end: function ()
		{
			this.shift_in_progress = 0;


			event_manager.trigger(this.get_namespace(), 'apply_shift_end');
		},

		apply_shift: function (dir)
		{	
			var self = this;
			var cfg = this.cfg;

			this.update_shift_data();

			this.on_shift_start();

			this.shift_elem(this.request_shift_data(this.prev_view_pos));
			this.shift_elem(this.request_shift_data(this.view_pos));

			this.set_slider_window_height();
			this.update_slider_controls(undefined, undefined, true);
	
			utils.delay('shift_timeout', cfg.scroll_speed, function ()
			{
				self.on_shift_end();
			});

			event_manager.trigger(this.get_namespace(), 'apply_shift');
		},

		get_shift_dir: function (view_pos, shift_type, shift_dest)
		{
			return (shift_type === 'absolute' ? (shift_dest > view_pos ? 1 : shift_dest < view_pos ? -1 : 0) : shift_dest);
		},

		is_marginal_view_pos: function ()
		{
			return (this.view_pos === this.crumb_group_count - 1 || this.view_pos === 0);
		},

		update_view_pos: function ()
		{
			if (this.view_pos === undefined || this.view_pos >= this.crumb_group_count)
			{
				this.init_shift('absolute', this.crumb_group_count - 1);
			} else
			{
				this.set_visible_crumb_group();
			}

		},

		get_next_view_pos: function (view_pos, shift_type, shift_dest, loop, count)
		{


			if (shift_type === 'relative')
			{
				view_pos += shift_dest;

				view_pos = view_pos < 0 ? loop ? count - 1 : 0 : view_pos >= count ? loop ? 0 : count - 1 : view_pos;
			} else if (shift_type === 'absolute')
			{
				view_pos = shift_dest;
			}

			return view_pos;
		},

		init_shift: function (shift_type, shift_dest, forced_loop)
		{
			var cfg = this.cfg;

			if (
				shift_type === 'absolute' && shift_dest === this.view_pos
				|| this.get_crumb_group_count() === 1
				|| this.shift_in_progress
			)
			{
				return false;
			}

			if (shift_type === 'relative' && cfg.random_order)
			{
				shift_type = 'absolute';
				shift_dest = Math.floor(Math.random() * this.crumb_group_count);
			}

			this.shift_dir = this.get_shift_dir(this.view_pos, shift_type, shift_dest);
			this.prev_view_pos = this.view_pos;
			this.view_pos = this.get_next_view_pos(this.view_pos, shift_type, shift_dest, cfg.loop || forced_loop, this.crumb_group_count);

			
			if (this.view_pos === this.prev_view_pos)
			{
				return false;	
			}

			this.apply_shift();
			this.resume_autoplay();//pending update
		},

		init_slider_mousewheel_support: function ()
		{
			var self = this;
			var cfg = this.cfg;

			$(this.elem)
				.on('mousewheel', function (event, delta, deltaX, deltaY)
				{
					var shift_dir;

					if (cfg.scroll_on_mousewheel)
					{
						shift_dir = (deltaY !== 0 && deltaY < 0 || deltaX !== 0 && deltaX > 0 ? 1 : -1);
						self.init_shift('relative', shift_dir);
						event.preventDefault();
					}
				});	
		},

		init_slider_swipe_support: function ()
		{
			if (
				(! isie || iev > 8)
				|| ! $(this.elem).swipe
			)
			{
				return;
			}

			$(this.elem)
				.swipe({
				     swipeLeft: function()
				     {
				     	this.init_shift('relative', 1);
				     },

				     swipeRight: function() {
				     	this.init_shift('relative', -1);
				     }
				});
		},

		init_external_controls: function ()
		{
			var self = this;
			var cfg = this.cfg;

			if (! cfg.ctrl_external)
				return;

			cfg.ctrl_external.forEach(function (data)
			{
				var $elem = data[0];
				var destination = data[1];
				var shifttype = (typeof destination === 'number' ? 'absolute' : 'relative');
				var destination = (typeof destination === 'number' ? destination : (destination === 'prev' ? '-1' : '1'));

				$elem
					.attr('data-shifttype', shifttype)
					.attr('data-shiftdest', destination)
					.on('click', function (e)
					{
						self.init_shift($(this).data('shifttype'), $(this).data('shiftdest'));
						self.set_slider_controls_wrap_visibility(true);
						e.preventDefault();
					});
			});
		},

		init_slider_functions: function ()
		{
			var cfg = this.cfg;
			var self = this;

			this.init_autoplay();	
			this.init_slider_swipe_support();
			this.init_slider_mousewheel_support();
			this.init_external_controls();
		},

		set_visible_crumb_group: function ()
		{
			this.get_dom('crumb-group')
				.css({
					'z-index': -1, visibility: 'hidden'
				})
				.eq(this.view_pos)
					.css({
						'z-index': 10, visibility: 'visible'
					});
		},

		get_elem_height: function (id)
		{
			id = id || this.view_pos;

			this.elem_height = ( ! this.is_slider() ? $(this.elem).outerHeight() : this.get_crumb_group_height(id));


			return this.elem_height;
		},

		get_crumbs_capacity: function ()
		{
			var mode = grid_manager.ROW_WRAP_MODE;

			var col_count = (this.is_slider() ? this.real_col_count : this.cfg.cols);
			var row_count = (this.is_slider() ? this.real_row_count : this.cfg.rows);

			var capacity = (this.row_wrap_mode === mode.ROW ? col_count : (this.row_wrap_mode === mode.GROUP ? col_count * row_count : this.get_dom('crumb-wrap').length));  //ignore responsiveness when not a slider


			return capacity;
		},

		get_crumb_group_height: function (id)
		{

			return this.get_dom('crumb-group').eq(id || this.view_pos).outerHeight(); //mind the responsiveness
		},

		get_crumb_group_count: function ()
		{
			return this.get_dom('crumb-group').length;
		},

		get_crumb_group_capacity: function ()
		{
			return this.real_row_count * this.real_col_count;
		},

		get_crumb_group_size: function (id)
		{
			return this.get_dom('crumb-group').eq(id).find(utils.prefix_class('crumb-wrap' + '-' + this.id)).length
		},

		is_over_capacity_crumb_group: function (id)
		{
			return this.get_crumb_group_size(id || 0) > this.get_crumb_group_capacity();
		},

		is_not_full_crumb_group: function (id)
		{
			return this.get_crumb_group_size(id || 0) > 0 && this.get_crumb_group_size(id || 0) < this.get_crumb_group_capacity()
		},

		is_empty_crumb_group: function (id)
		{
			return ! this.get_crumb_group_size(id || 0); //fix checking crumb groups nob
		},

		update_advanced_responsiveness: function ()
		{






			if ( 
				! this.cfg.advanced_responsive ||
				! this.are_ready_child_widgets('media_widget')) //dirt!
				return;

			this.cache_key_change('real_row_count', $(window).width() < 580 ? 1 : this.cfg.rows);
			this.is_key_changed('real_row_count') ? event_manager.trigger(this.get_namespace(), 'real_row_count_change', 0) : '';
			this.clear_key_change_cache(); 

			if (this.real_row_count > 1 && ($(window).height() / this.get_elem_height() < 1.25 || this.get_elem_height() / this.elem_width > 1.5))
			{
				this.cache_key_change('real_row_count', this.real_row_count > 1 ? this.real_row_count - 1 : this.real_row_count);
				this.is_key_changed('real_row_count') ? event_manager.trigger(this.get_namespace(), 'real_row_count_change', 0) : '';
				this.clear_key_change_cache(); 
			}

			if ( ! this.first_advanced_responsiveness_check)
			{
				this.first_advanced_responsiveness_check = true;
				event_manager.trigger(this.get_namespace(), 'first_advanced_responsiveness_check', 0);
			}
		},

		rewrap_crumb_group: function ()
		{
			var self = this;
			var update;



			this.get_dom('crumb-group').each(function (id)
			{
				if (update)
				{
					return;
				}


				if (self.is_over_capacity_crumb_group(id) || self.is_empty_crumb_group(id) || self.is_not_full_crumb_group(id) && id < self.get_crumb_group_count() - 1)
				{
					update = true;
				}
			});

			if ( ! update)
			{

				return;
			}


			this.get_dom('slider-window').css({
				overflow: 'hidden'
			});

			this.construct_dom('crumb-group', true);
			this.construct_dom('crumb-group');

			event_manager.trigger(this.get_namespace(), 'rewrap_crumb_group_end');

			if ( ! this.first_rewrap_crumb_group)
			{
				this.first_rewrap_crumb_group = true;
				event_manager.trigger(this.get_namespace(), 'first_rewrap_crumb_group_end');				
			}
		},

		set_slider_controls_wrap_visibility: function (type, speed, force_reset)
		{
			var self = this;
			var cfg = this.cfg;



			if ( ! cfg.ctrl || ! this.slider_controls_allow_reset && ! force_reset)// || ! this.is_structure_ready('slider-controls'))
			{
				return;
			}


			type = (this.crumb_group_count > 1 && type ? true : false);
			speed === undefined ? speed = cfg.scroll_speed : '';
			speed = 500


			utils.delay('controls_wrap_visibility_timeout',  type ? 1 : cfg.ctrl_hide_delay || 1000, function ()
			{
				self.get_dom('ctrl-wrap')
					.stop(true, true)
					['fade' + (type ? 'In' : 'Out')](
						speed,
						function () 
						{

							self.ctrl_visible = type;
							self.slider_controls_allow_reset = true;
						});
			});
		},

		slider_controls_have_equal_alignment: function ()
		{
			var cfg = this.cfg;
			
			return (cfg.ctrl_arrows_align_x === cfg.ctrl_pag_align_x && cfg.ctrl_arrows_align_y === cfg.ctrl_pag_align_y && ! cfg.ctrl_arrows_full_width);
		},

		get_slider_controls_width: function (type)
		{
			var cfg = this.cfg;

			return (type === 'pag' ? this[type].child_width * this.crumb_group_count : (cfg.ctrl_arrows_full_width ? this.elem_width - 2 * cfg.ctrl_padding : this[type].child_width * 2))
		},

		calculate_slider_controls_pos: function (type)
		{
			var cfg = this.cfg;
			var type_cfg = this[type];
			var elem_height = this.get_elem_height();

			if ( ! this.cfg['ctrl_' + type])// || ! this.is_structure_ready('slider-controls'))
			{
				return;
			}

			type_cfg['width'] = this.get_slider_controls_width(type);
		
			type_cfg.pos.left = (type_cfg.align.x === 'left' ? cfg.ctrl_padding : (type_cfg.align.x === 'right' ? 'auto' : this.elem_width / 2 - type_cfg['width'] / 2));
			type_cfg.pos.right = (type_cfg.align.x === 'right' ? cfg.ctrl_padding : (type_cfg.align.x === 'left' ? 'auto' : this.elem_width / 2 - type_cfg['width'] / 2));
			type_cfg.pos.top = (type_cfg.align.y === 'top' ? cfg.ctrl_padding : (type_cfg.align.y === 'bottom' ? 'auto' : this.elem_height / 2 - type_cfg['height'] / 2)) + (type_cfg.align.y === 'top' ? (type === 'pag' && type_cfg.align.y === 'top' && this.slider_controls_have_equal_alignment() ? this.arrows.height : 0) : '');
			type_cfg.pos.bottom = (type_cfg.align.y === 'bottom' ? cfg.ctrl_padding : (type_cfg.align.y === 'top' ? 'auto' : this.elem_height / 2 - type_cfg['height'] / 2)) + (type_cfg.align.y === 'bottom' ? (type === 'arrows' && type_cfg.align.y === 'bottom' && this.slider_controls_have_equal_alignment() ? this.pag.height : 0) : '');

		},

		update_slider_controls_type: function (type, speed)
		{	
			if ( ! this.cfg['ctrl_' + type])// || ! this.is_structure_ready('slider-controls'))
			{
				return;
			}

			speed = (speed === undefined ? this.cfg.scroll_speed : speed);

			this.calculate_slider_controls_pos(type);

			utils.animate_dom(this.get_dom('ctrl-' + type), {
				width: this[type].width + 1, //hackor
				height: this[type].height,
				top: this[type].pos.top,
				right: this[type].pos.right,
				bottom: this[type].pos.bottom,
				left: this[type].pos.left
			}, speed);

			this['update_slider_controls_' + type + '_dom_state']();
		},

		update_slider_controls_pag_dom_state: function ()
		{
			var self = this;
			var cfg = this.cfg;

			if ( ! cfg.ctrl_pag)// || ! this.is_structure_ready('slider-controls'))
			{
				return;
			}

			if (this.get_dom('ctrl-pag').length && this.get_dom('ctrl-pag').children().length < this.crumb_group_count)
			{

				this.construct_dom('ctrl-pag', true);
				this.construct_dom('ctrl-pag');
				this.update_slider_controls_type('pag', true);
			}

			this.get_dom('ctrl-pag')
				.children()
					.removeClass(utils.prefix('current'))
					.eq(this.view_pos).addClass(utils.prefix('current'))
					.end()
					.css({display: 'block'})
					.slice(this.crumb_group_count)
						.css({display: 'none'})
					.end()
				.end()
				.css({
					width: function ()
					{
						return self.pag.width;
					}
				});
		},

		update_slider_controls_arrows_dom_state: function ()
		{
			var cfg = this.cfg;

			var $ctrl_prev;
			var $ctrl_next;
	
			if (cfg.ctrl_arrows)// && ! cfg.loop && this.is_structure_ready('slider-controls'))
			{
				$ctrl_prev = this.get_dom('ctrl-arrows').children(utils.prefix_class('ctrl-prev'));
				$ctrl_next = this.get_dom('ctrl-arrows').children(utils.prefix_class('ctrl-next'));

				{
					$ctrl_next[this.view_pos === this.crumb_group_count - 1 ? 'addClass' : 'removeClass'](utils.prefix('disabled'));
					$ctrl_prev[this.view_pos === 0 ? 'addClass' : 'removeClass' ](utils.prefix('disabled'));
				}
			}
		},

		update_slider_controls: function (speed, force_reset, keep_visibility)
		{
			var cfg = this.cfg;



			if ( ! cfg.ctrl || ! this.is_slider() || ! this.slider_ctrl_initialized)// || ! this.is_structure_ready('slider-controls')) //check why not ready when slider ready
			{
				return false;
			}
			
			this.update_slider_controls_type('pag', speed);							
			this.update_slider_controls_type('arrows', speed);
			this.set_slider_controls_wrap_visibility(! keep_visibility ? this.cfg.ctrl_always_visible ? true : false : this.ctrl_visible, speed, force_reset);
		},

		init_slider_controls_data: function ()
		{
			var self = this;
			var cfg = this.cfg;

			if ( ! cfg.ctrl)// || ! this.is_structure_ready('slider-controls'))
			{
				return;
			}

			this.pag = this.pag || {};
			this.arrows = this.arrows || {};

			this.pag.child_width = this.get_dom('ctrl-pag').children().outerWidth() + cfg.ctrl_pag_spacing;
			this.pag.width = this.pag.child_width * this.crumb_group_count;
			this.pag.height = this.pag.child_width;
			this.pag.pos = {};

			this.arrows.child_width = this.get_dom('ctrl-arrows').children().outerWidth() + cfg.ctrl_arrows_spacing; //clean up names nitter
			this.arrows.width = (cfg.ctrl_arrows_full_width ? this.elem_width - 2 * cfg.ctrl_padding : this.arrows.child_width * 2); //clean up names nitter
			this.arrows.height = this.arrows.child_width + cfg.ctrl_arrows_spacing; //clean up names nitter
			this.arrows.pos = {};

			this.pag.align = 
			{
				x: cfg.ctrl_pag_align_x,
				y: cfg.ctrl_pag_align_y,
			},

			this.arrows.align =
			{
				x: cfg.ctrl_arrows_align_x,
				y: cfg.ctrl_arrows_align_y
			}
		},

		init_slider_controls_functions: function ()
		{
			var self = this;
			var cfg = this.cfg;

			if ( ! cfg.ctrl)// || ! this.is_structure_ready('slider-controls'))
			{
				return;
			}

			this.get_dom('ctrl-wrap').find(utils.prefix_class('ctrl' + '-' + this.id))
				.attr('unselectable', 'on')
				.css({
					'-ms-user-select':'none',
					'-moz-user-select':'none',
					'-webkit-user-select':'none',
					'user-select':'none'
				})
				.on('click', function()
				{
					this.onselectstart = function()
					{
						return false;
					}

					self.init_shift($(this).data('shifttype'), $(this).data('shiftdest'));


					return false;
				});
		},

		init_slider_controls_behaviour: function ()
		{
			var self = this;
			var cfg = this.cfg;
	
			if (cfg.ctrl_always_visible)
				return;


			$(this.elem)
				.on('mouseenter', function ()
				{
					self.set_slider_controls_wrap_visibility(true);
				})
				.on('mouseleave', function ()
				{
					self.set_slider_controls_wrap_visibility();
				});
		},

		init_slider_controls: function ()
		{
			var cfg = this.cfg;
	
			if ( ! cfg.ctrl)// || ! this.is_structure_ready('slider'))
			{
				return false;
			}


			this.slider_ctrl_initialized = true;

			this.init_slider_controls_data();
			this.init_slider_controls_behaviour();
			this.init_slider_controls_functions();
		},

		clear_key_change_cache: function (key)
		{
			var self = this;

			if (key)
			{

				key = key.replace('_change', '');
				delete this.changed_key_cache[key];
			} else
			{
				utils.obj_foreach(this, this.changed_key_cache, function (elem, key) { self.clear_key_change_cache(key); });
			}
		},

		cache_key_change: function (key, value)
		{
			var current;
			var set;

			this.changed_key_cache = this.changed_key_cache || {};

			set = ( ! Array.isArray(key) ? [[key, value]] : key);

			set.forEach(function (elem)
			{
				key = elem[0];
				value = elem[1];
				value = (typeof value === 'function' ? value.apply(this) : value);

				current = this[key];

				this[key] = value


				if ( ! this.changed_key_cache[key] && current !== this[key])// && current !== undefined) //assume first init when current === undefined and don't record change
				{

					this.changed_key_cache[key] = true;
				}
			}, this);
		},

		is_key_changed: function (key)
		{

			return this.changed_key_cache[key];
		},

		update_responsive_data: function ()
		{
			var self = this;
			var cfg = this.cfg;

			var a = [
				['elem_width', function () { return $(self.elem).outerWidth();}], //that good nig or use width() instead?
				['real_col_count', function () { return Math.round(self.elem_width / self.get_dom('crumb-wrap').outerWidth()); }],
				['real_row_count', function () { return ($(window).width() < 580 ? 1 : self.cfg.rows); }], //limit row count on small screens. Affects slider only.
				['crumb_group_capacity', function () { return self.get_crumb_group_capacity(); }], //assume responsiveness of the structure
			];

			self.cache_key_change(a);

			var events = [];
			utils.obj_foreach(self, self.changed_key_cache, function (elem, key)
			{
				events.push(key + '_change');
			});

			events.forEach(function (event)
			{
				event_manager.trigger(self.get_namespace(), event)
			});

			self.clear_key_change_cache(); 
		},

		has_custom_col_spacing: function ()
		{
			var cfg = this.cfg;

			return cfg.col_spacing_size !== grid_manager.DEFAULTS.col_spacing_size && cfg.col_spacing_enable;
		},

		is_empty_slider: function ()
		{
			return (this.is_slider() && ! this.get_dom('crumb-group').length);
		},

		add_element: function ($elem, id, callback, remove_source)
		{
			var $crumb = $elem.clone(true, true);
			var append = (id >= 0 ? 'before' : 'after');
			var $added;

			id = (id !== undefined ? id : -1);

			this.get_dom('slider-window').css({
				overflow: 'hidden'
			});

			$added = this.get_dom('crumb-wrap').eq(id)[append]($crumb)[append === 'before' ? 'prev' : 'next']();

			this.construct_dom('crumb', undefined, $added);
			this.construct_dom('crumb-wrap', undefined, $added);

			this.crumb_count = this.get_dom('crumb-wrap').length; //dirt!

			callback ? callback.apply(this) : '';
			remove_source ? $elem.remove() : '';

			event_manager.trigger(this.get_namespace(), 'add_crumb', false, [$added]);
		},

		add_elements: function ($add, start_id, remove_source, callback)
		{
			var self = this;
			var cfg = this.cfg;

			$add.each(function (id)
			{
				var insert_id = (start_id !== undefined ? start_id + id : -1)

				self.add_element($(this), insert_id);
			});

			callback ? callback.apply(this) : '';
			remove_source ? $add.remove() : '';
		},

		remove_element: function (id, callback)
		{
			if (this.get_dom('crumb-wrap').eq(id))
			{
				this.remove_dom('crumb-wrap', id, this.get_dom('crumbs'));

				this.crumb_count = this.get_dom('crumb-wrap').length;  //HHHM

				callback ? callback.apply(this) : '';

				event_manager.trigger(this.get_namespace(), 'remove_crumb');
			}
		},

		remove_elements: function (id, callback)
		{
			var self = this;
			var cfg = this.cfg;

			id = (typeof id === 'number' ? [id] : id);

			id.forEach(function (elem_id)
			{
				self.remove_element(elem_id);
			});	

			callback ? callback.apply(this) : '';
		},		
		pause_autoplay: function ()
		{
			var cfg = this.cfg;

			if ( ! this.autoplay_in_progress || ! cfg.autoplay_enable)
			{
				return;
			}


			this.autoplay_in_progress = false;

			utils.clear_timeout('autoplay_timeout');
		},		
		resume_autoplay: function ()
		{
			var self = this;
			var cfg = this.cfg;

			if ( this.autoplay_in_progress || ! cfg.autoplay_enable)
			{
				return;
			}


			utils.clear_timeout('autoplay');

			if (cfg.autoplay_enable)
			{
				this.autoplay_in_progress = true;

				utils.delay('autoplay_timeout', cfg.autoplay_interval * 1000, function ()
				{
					var shift_type = 'relative';
					var shift_dest = cfg.autoplay_shift_dir;

					if (cfg.autoplay_random_order)
					{
						shift_type = 'absolute';
						shift_dest = Math.floor(Math.random() * this.crumb_group_count);
					}

					self.init_shift(shift_type, shift_dest, true);
					self.autoplay_in_progress = false;
					self.resume_autoplay();
				});
			}
		},

		update_autoplay: function ()
		{

			this.is_in_view($(this.elem)) ? this.resume_autoplay() : this.pause_autoplay();
		},

		init_autoplay: function ()
		{
			var self = this;
			var cfg = this.cfg;

			if ( ! cfg.autoplay_enable)
			{
				return;
			}


			$(window)
				.on(self.get_namespace('load'), function ()
				{
					if (self.is_in_view($(self.elem)))
					{
						self.resume_autoplay();
					}
				})
				.on(self.get_namespace('blur'), function ()
				{
					self.pause_autoplay();
				})
				.on(self.get_namespace('focus'), function ()
				{
					self.resume_autoplay();
				})
				.on(self.get_namespace('scroll'), function ()
				{
					utils.delay('autoplay_scroll_timeout', 500, function ()
					{
						self.update_autoplay();	
					});
				});

			if (cfg.pause_autoplay_on_hover)
			{
				$(this.elem)
					.on(self.get_namespace('mouseenter'), function ()
					{
						self.pause_autoplay();
					})
					.on(self.get_namespace('mouseleave'), function ()
					{
						self.resume_autoplay();
					});
			}
		},

		generate_stylesheet_content: function (callback)
		{
			if ( ! callback)
				return;

			callback.apply(this);
			css_generator.update_css();
		},

		manage_external_widgets: function (action, args)
		{
			var self = this;
			var widgets = grid_manager.external_widgets;

			this.external_widget_init_states = this.external_widget_init_states || {};

			utils.obj_foreach(undefined, widgets, function (elem, key)
			{
				if (typeof elem === 'function' && elem.apply(self) || typeof elem === 'boolean' && elem)
				{

					grid_manager.external_widget_constructors[key][action].apply(self, args || []);
					self.external_widget_init_states[key] = action;
					event_manager.trigger(self.get_namespace(), 'manager' + '_' + key + '_' + action);
				}
			});
		},

		init_events: function ()
		{
			var self = this;

			event_manager.on(this.get_namespace(), 'slider_structure_init', function ()
			{
				self.update_view_pos();
				self.init_slider_controls();
				self.init_slider_functions();
			});

			event_manager.on(this.get_namespace(), 'slider_structure_init_crumb_group', function ()
			{
				self.update_view_pos();
			});

			event_manager.on(this.get_namespace(), 'crumb_group_capacity_change real_row_count_change, add_crumb remove_crumb', function ()
			{
				if ( ! self.is_structure_ready('slider'))
				{
					return false;
				}

				self.rewrap_crumb_group();
			});

			event_manager.on(this.get_namespace(), 'add_crumb', function ($elem)
			{
				self.manage_external_widgets('update', $elem);
			});

			event_manager.on(this.get_namespace(), 'media_widget_update', function ()
			{
				if ( ! self.is_structure_ready('slider'))
				{
					return;
				}

				self.update_advanced_responsiveness();
			});

			event_manager.on(this.get_namespace(), 'elem_width_change media_widget_update rewrap_crumb_group_end', function ()
			{
				if ( ! self.is_structure_ready('slider'))
				{
					return;
				}

				self.update_slider_controls(0); //slave
				self.set_slider_window_height(0); //slave
			});

			event_manager.on(this.get_namespace(), 'slider_structure_init media_widget_init first_rewrap_crumb_group_end first_advanced_responsiveness_check', function ()
			{
				self.is_ready('slider-window') ? event_manager.trigger(self.get_namespace(), 'slider_window_ready') : '';
			});

			event_manager.on(this.get_namespace(), 'slider_window_ready', function () 
			{







				image_loader.on_images_load_end($(self.elem).find('img'), function ()
				{
					if (self.first_slider_window_height_set)
					{
						return false;
					}

					self.first_slider_window_height_set = true;
					self.update_slider_controls(undefined, true); //master
					self.set_slider_window_height(undefined, true); //master
					self.set_load_overlay();
				});
			});

			$(window).on(self.get_namespace('resize'), function ()
			{
				utils.delay('update_responsive_data', 150, self.update_responsive_data, self);
				utils.delay('update_advanced_responsiveness', 150, self.update_advanced_responsiveness, self);








				self.get_dom('slider-window').css({
					overflow: 'hidden'
				});
			});
		},

		deinit_events: function ()
		{
			$(window).unbind(this.get_namespace('resize'));
		},

		set_structure: function (type, mode)
		{
			var order = grid_manager.dom_constructors_init_order[type].apply(this, [mode]);

			if (type === 'grid' && ! this.cfg.init_grid ||
				type === 'slider' && ! this.cfg.slider)
				return;

			order.forEach(function (elem)
			{
				this.construct_dom(elem, ! mode);	
			}, this);

			event_manager.trigger(this.get_namespace(), type + '_' + 'structure_init');
			this[type + '_' + 'structure_init'] = mode;

		},

		init: function (cfg)
		{
			var self = this;

			this.construct(cfg);

			this.register();


			this.init_events();
			
			this.detect_starting_setup();
			this.load_dom_constructors(grid_manager.dom_constructors);
			this.load_framework('core');
			this.load_framework(this.cfg.framework);

			this.set_structure('grid', true);
			this.set_structure('slider', true);

			this.manage_external_widgets('init');




			image_loader.on_images_load_end($(this.elem).find('img'), function ()
			{
				event_manager.trigger(self.get_namespace(), 'images_load_end');
			});
		},

		deinit: function ()
		{
			this.unregister();
			this.set_grid_structure(false);
			this.set_slider_structure(false);
		 	this.deinit_events();
		},		
		reinit: function ()
		{



		}
	});

	$.fn.ether_grid_slider = function (options) 
	{
		var options;
        var defaults;

        if (options)
        {
	        defaults = jQuery.extend(true, {}, grid_manager.DEFAULTS);
			options = $.extend(defaults, options);

	        options.elem_selector = $(this).selector;

			return this.each(function()
			{
				var self = this;

				options.elem = self;

				new Grid_slider(jQuery.extend(true, {}, options)).init();
			});
		} else
		{
			return widget_manager.get_elem('gridslider', $(this));
		}
    }

    $.fn.gridSlider = $.fn.ether_grid_slider; //temp backward compatibility
	ether.Grid_slider = ether.Grid_slider || Grid_slider;

})(jQuery);

(function ($)
{
	var utils = ether.utils;
	var widget_manager = ether.widget_manager;
	var Widget = ether.Widget;

	var DEFAULTS = {
		current_id: -1,
		constrain: true,
		type: 'tab',
		scroll_speed: 500
	};

	var Tab_widget = function Tab_widget (cfg)
	{
		$.extend(this, cfg || {});
	}

	Tab_widget.prototype = new Widget();

	utils.extend_prototype(Tab_widget, 
	{
		construct: function (cfg)
		{

			this.constructor.prototype.construct ? this.constructor.prototype.construct.apply(this) : '';

			this.namespace = this.type + '_' + 'widget';

			$.extend(this, cfg || {});
		},

		init_ctrl_container: function ()
		{
			var $elem = $('<div>')
				.addClass(utils.prefix([
					'block-ctrl',
					'block-ctrl' + '-' + this.id,
					'block-ctrl-style-1'
				], ' '));

			this.type === 'tab' ? $elem.insertBefore($(this.elem).children().eq(0)).append(this.get_dom('title')) : this.get_dom('title').wrap($elem.clone(true, true));

			this.set_dom('block-ctrl');

			return $elem;
		},

		init_content_container: function ()
		{
			var $elem = $('<div>')
				.addClass(utils.prefix([
					'block-content',
					'block-content' + '-' + this.id,
					'block-content-style-1'
				], ' '));

			this.type === 'tab' ? $elem.insertBefore($(this.elem).children().eq(0)).append(this.get_dom('content')) : this.get_dom('content').wrap($elem.clone(true, true));

			this.set_dom('block-content', $elem);

			return $elem;
		},

		init_content: function ()
		{
			var self = this;

			$(this.elem).addClass(utils.prefix('id' + '-' + this.id));

			this.set_dom('elem', $(this.elem));
			this.set_dom('title', $(this.elem).children(utils.prefix_class('title')));
			this.set_dom('content', $(this.elem).children(utils.prefix_class('content')));

			this.init_content_container();
			this.init_ctrl_container();

			this.get_dom('content')
				.hide()
			this.get_dom('title')
				.on('click', function ()
				{
					self.set_current(self.type === 'tab' ? $(this).index() : $(this).parent().index() / 2, true);
				});
		},

		get_slug_from_hash: function (parse)
		{

			var re = new RegExp(this.get_namespace() + '((?:_\\d+)+)', 'g');
			var slug = re.exec(document.location.hash);


			slug = slug ? parse ? this.parse_slug(slug[1]) : slug[1] : undefined;

			return slug;
		},

		parse_slug: function (slug)
		{
			return slug.split('_').slice(1);
		},

		to_slug: function (arr)
		{
			var result = utils.clean_arr(arr.slice()).join('_');

			return result.length > 0 ? '_' + result : '';
		},

		update_hash: function (id)
		{
			var re = new RegExp(this.get_namespace() + '((?:_\\d+)+)', 'g');
			var replacement = this.to_slug(id);


			replacement = (replacement === '' ? '' : this.get_namespace() + replacement);


			document.location.hash && document.location.hash.match(re) ? document.location.hash = document.location.hash.replace(re, replacement) : document.location.hash += replacement;
		},

		set_current: function (id, update_hash, speed)
		{
			if (id === undefined)
				return;

			id = (typeof id === 'number' ? [id] : id);
			id = this.constrain ? id.slice(0, 1) : id;


			id.forEach(function (i)
			{
				var prev_state = this.current_id[i] !== undefined;

				if (prev_state && this.constrain)
					return

				this.current_id[i] = ( ! prev_state ? i : undefined);

				
				this.update_dom_visibility(i, prev_state, this.constrain, speed);

			}, this);

			if (this.constrain)
			{
				this.current_id = []
				this.current_id[id] = id;
			}


			update_hash ? this.update_hash(this.current_id) : '';
		},

		update_dom_visibility: function (id, prev_state, constrain, speed)
		{
			speed = (speed !== undefined ? speed : this.scroll_speed);


			if ( ! constrain)
			{
				this.get_dom('content')
					.eq(id)
					.stop()
					.slideToggle(speed);
				this.get_dom('title')
					.eq(id)
					.toggleClass(utils.prefix('current'))
			} else if (constrain && ! prev_state)
			{
				this.get_dom('content')
					.stop()
					.slideUp(speed)
					.eq(id)
					.slideDown(speed)
				this.get_dom('title')
					.removeClass(utils.prefix('current'))
					.eq(id)
					.addClass(utils.prefix('current'))
			}
		},

		update_responsive: function ()
		{
			var $elem = $(this.elem);

			if (this.type === 'tab')
			{
				if ($elem.hasClass(utils.prefix('tabs-y')) && $elem.outerWidth() < 500)
				{
					$elem
						.removeClass(utils.prefix('tabs-y'))
						.addClass(utils.prefix([
							'tabs-x',
							'tabs-y-marker'
						], ' '));
				} else if ($elem.hasClass(utils.prefix('tabs-y-marker')) && $elem.outerWidth() >= 500)
				{

					$elem
						.removeClass(utils.prefix([
							'tabs-x',
							'tabs-y-marker'
						], ' '))
						.addClass(utils.prefix('tabs-y'));
				}
			}
		},

		on_history: function ()
		{
			var slug = this.get_slug_from_hash();
			var current_slug = this.to_slug(this.current_id);


			slug !== undefined && slug != current_slug ? this.set_current(this.parse_slug(slug)) : '';
		},

		reset_all: function ()
		{
			this.get_dom('title').removeClass(utils.prefix('current'));
			this.get_dom('content').hide();

			this.current_id = [];
		},

		init_constrain: function ()
		{


			this.constrain = true;

			this.constrain = this.get_dom('title').length > 1 ? this.constrain : false;
		},

		init: function (cfg)
		{
			var self = this;
			var hash_id;
			var current_id = this.current_id.slice();

			this.construct(cfg);

			this.register();
			this.init_content();

			this.reset_all();
			this.init_constrain();

			hash_id = this.get_slug_from_hash(true);

			this.set_current( hash_id && hash_id.length ? hash_id : current_id, false, 0);

			this.update_responsive();

			$(window)
				.on('popstate', function ()
				{
					self.on_history();
				})
				.on('resize', function ()
				{
					self.update_responsive();
				});

			return this;
		}
	});

	$.fn.etherTabs = function (options) 
	{
		var options;
        var defaults;

        if (options)
        {
	        defaults = jQuery.extend(true, {}, DEFAULTS);
			options = $.extend(defaults, options);

	        options.elem_selector = $(this).selector;

			return this.each(function()
			{
				var self = this;
				options.elem = self;
				new Tab_widget(jQuery.extend(true, {}, options)).init();
			});
		}  else
		{
			return widget_manager.get_elem('acc_widget', $(this)) || widget_manager.get_elem('tab_widget', $(this));
		}
    }

    ether.Tab_widget = ether.Tab_widget || Tab_widget;
})(jQuery);

(function($)
{
	var utils = ether.utils;
	var image_loader = ether.image_loader;

	var builder = 
	{
		init_media_widgets: function ()
		{
			var self = this;
			var $elem = $(utils.prefix_class('widget') + utils.prefix_class('img'));
			
			var width_re = /width:\s*(\d+(?:\w+|%))/;
			var height_re = /height:\s*(\d+(?:\w+|%))/;
			var align_re = new RegExp(utils.prefix('align') + '(\\w+)\\b');

			$elem.each(function ()
			{
				var $img = $(this).find('img');
				var wrap_width_match = ($img.parent().attr('style') || '').match(width_re);
				var image_width = $img.attr('width') || (wrap_width_match !== null ? wrap_width_match[1] : undefined);
				var wrap_height_match = ($img.parent().attr('style') || '').match(height_re);
				var image_height = $img.attr('height') || (wrap_height_match !== null ? wrap_height_match[1] : undefined);
				var align = ($(this).attr('class') || '').match(new RegExp(align_re));

				var img_title_alignment_y = $(this).cattr(utils.prefix('img-title-alignment-y'));
				var show_img_title = $(this).cattr(utils.prefix('show-img-title'), undefined, undefined, true);
				var img_title_custom_class = $(this).cattr(utils.prefix('img-title-custom-class'), undefined, undefined, true);

				img_title_alignment_y = (img_title_alignment_y === '' ? undefined : img_title_alignment_y);
				show_img_title = (show_img_title !== '' ? show_img_title : false);

				align = (align != null ? align[1] : undefined);

				var options =
				{
					$img: $img,
					align: align,
					image_width: image_width,
					image_height: image_height,
					image_stretch_mode: $(this).cattr(utils.prefix('image-stretch-mode')) || undefined,







					show_img_title: show_img_title, 
					img_title_alignment_y: img_title_alignment_y,
					img_title_custom_class: img_title_custom_class
				}


				options.$img.mediaWidget(options);
			});
		},

		init_tab_widgets: function ()
		{
			var self = this;
			var $elem = $(utils.prefix_class('multi')); //clean up this class

			if ( ! $elem.length)
				return;

			$elem.each(function()
			{
				var type = $(this).cattr(utils.prefix('type'));
				var constrain = ($(this).cattr('constrain') == 1 ? true : false);
				var current_id = [];

				$(this).find(
					utils.prefix_class('title') +
					utils.prefix_class('current')
				).each(function ()
				{
					var id = $(this).index() / 2;
					current_id[id] = id;
				});


				$(this).etherTabs({
					type: type === 'tabs' ? 'tab' : 'acc',
					constrain: constrain,
					current_id: current_id
				}).init();
			});
		},

		init_syntax_highlighter: function ()
		{
			if (typeof SyntaxHighlighter != 'undefined')
			{
				var sh_base_path = $('script[src*="shCore.js"]').attr('src').split('shCore.js')[0];

				function sh_path(data)
				{
					for (var i = 0; i < data.length; i++)
					{
						data[i] = data[i].replace('@', sh_base_path);
					}

					return data;
				}

				SyntaxHighlighter.autoloader.apply(null, sh_path
				([
					'applescript @shBrushAppleScript.js',
					'actionscript3 as3 @shBrushAS3.js',
					'bash shell @shBrushBash.js',
					'coldfusion cf @shBrushColdFusion.js',
					'cpp c @shBrushCpp.js',
					'c# c-sharp csharp @shBrushCSharp.js',
					'css @shBrushCss.js',
					'delphi pascal @shBrushDelphi.js',
					'diff patch pas @shBrushDiff.js',
					'erl erlang @shBrushErlang.js',
					'groovy @shBrushGroovy.js',
					'java @shBrushJava.js',
					'jfx javafx @shBrushJavaFX.js',
					'js jscript javascript @shBrushJScript.js',
					'perl pl @shBrushPerl.js',
					'php @shBrushPhp.js',
					'text plain @shBrushPlain.js',
					'py python @shBrushPython.js',
					'ruby rails ror rb @shBrushRuby.js',
					'sass scss @shBrushSass.js',
					'scala @shBrushScala.js',
					'sql @shBrushSql.js',
					'vb vbnet @shBrushVb.js',
					'xml xhtml xslt html @shBrushXml.js'
				]));

				SyntaxHighlighter.all();
			}
		},

		init_grid_slider_widget: function ()
		{
		    $(utils.prefix_class('grid')).each( function()
			{
				var props = {};

				var re_width = new RegExp('width:\\s*(.*?)(?:\\s*;|\\s*$)');
				var width = ($(this).attr('style') || '').match(re_width);
				var re_align = new RegExp(utils.prefix('align') + '(\\w+)\\b');
				var align = $(this).attr('class').match(re_align);

				var cols = $(this).cattr(utils.prefix('cols'));
				var rows = $(this).cattr(utils.prefix('rows'));
				var col_spacing_enable = $(this).cattr(utils.prefix('spacing'));
				var col_spacing_size = $(this).cattr(utils.prefix('spacing-size'));


				align = (align != null ? align[1] : 'auto');
				width = (width != null ? width[1] : undefined);
				align && ! width && (align === 'left' || align === 'right') ? width = '100%' : ''; //need this or sliders get 0 width when left/right aligned with no width

				cols = (cols === undefined || cols === '' ? $(this).find(utils.prefix_class('cols')).eq(0).cattr(utils.prefix('cols')) : cols);
				rows = (rows === undefined || rows === '' ? $(this).find(utils.prefix_class('cols')).eq(0).cattr(utils.prefix('rows')) : rows);
				col_spacing_enable = (col_spacing_enable === undefined || col_spacing_enable === '' ? $(this).find(utils.prefix_class('cols')).eq(0).cattr(utils.prefix('spacing')) : col_spacing_enable);
				col_spacing_enable = col_spacing_enable == 1;
				col_spacing_size = (col_spacing_size === undefined || col_spacing_enable === '' ? $(this).find(utils.prefix_class('cols')).eq(0).cattr(utils.prefix('spacing-size')) : col_spacing_size);

				$(this).removeClass(utils.prefix('cols'));
				$(this).removeClass(utils.prefix('cols' + '-' + cols));
				$(this).removeClass(utils.prefix('rows'));
				$(this).removeClass(utils.prefix('rows' + '-' + rows));
				$(this).removeClass(utils.prefix('spacing'));
				$(this).removeClass(utils.prefix('spacing-size'));

				props['grid_hardcoded'] = true;
				props['width'] = width;
				props['align'] = align;

				props['cols'] = parseInt(cols);
				props['rows'] = parseInt(rows);
				props['col_spacing_enable'] = col_spacing_enable;
				props['col_spacing_size'] = col_spacing_size;

				$(this).cattr(utils.prefix('autoplay')) !== '' ? props['autoplay_enable'] = $(this).cattr(utils.prefix('autoplay')) == 1 : ''; //inconsistent naming
				$(this).cattr(utils.prefix('autoplay-invert')) !== '' ? props['autoplay_shift_dir'] = $(this).cattr(utils.prefix('autoplay-invert')) == 1 ? 1 : -1 : ''; //inconsistent naming

				props['show_img_title'] = $(this).cattr(utils.prefix('show-img-title'), undefined, undefined, true);
				props['img_title_alignment_y'] = $(this).cattr(utils.prefix('img-title-alignment-y'));
				props['img_title_alignment_x'] = $(this).cattr(utils.prefix('img-title-alignment-x'));

				props['use_parent_wrap'] = $(this).hasClass(utils.prefix('use-parent-wrap'));

				for (var key in ether.grid_manager.DEFAULTS)
				{
					var attr = $(this).cattr(utils.prefix(key.replace(/_/g, '-')));

					if (attr !== '')
					{
						if (typeof parseInt(attr) === 'number' && ! isNaN(parseInt(attr)))
						{
							attr = parseInt(attr);
						}

						switch (key)
						{
							case 'slider':
							case 'ctrl_always_visible':
							case 'ctrl_arrows':
							case 'ctrl_arrows_full_width':
							case 'ctrl_pag':
							case 'autoplay_enable':
							case 'pause_autoplay_on_hover':
							case 'gallery_img_title':
							case 'hide_grid_cell_overflow':
							case 'scroll_on_mousewheel':
							case 'loop':
							case 'random_order':
							{
								attr = attr == 1;

								break;
							}
						}

						props[key] = attr;
					}
				};

				console.log(props);

				$(this).gridSlider(props);
			});
		},

		init_back_to_top_widget: function ()
		{
			$('.ether-back-to-top').click( function()
			{
				$('html,body').scrollTop(0);

			});
		},

		init_scrollspy_menu: function ()
		{
			var $scrollspy_menu = $('.ether-scrollspy a');

			var $scrollspy_elements = $scrollspy_menu.map( function()
			{
				var $item = $($(this).attr('href'));

				if ($item.length)
				{
					return $item;
				}
			});

			$scrollspy_menu.click( function(e)
			{
				var $target = $(this);
				var offset = $($(this).attr('href')).offset().top + $($(this).attr('href')).height();

				$('html, body').stop().animate({ scrollTop: offset }, 300, function()
				{
					$target.parent().siblings().removeClass('ether-current').end().addClass('ether-current');
				});

				return false;
			});

			var scrollspy_last_id;

			$(window).scroll( function()
			{
				var top = $(this).scrollTop();

				var current = $scrollspy_elements.map( function()
				{
					if ($(this).offset().top < top)
					{
						return this;
					}
				});

				if (current.length > 0)
				{
					current = current[current.length - 1];

					var id = current[0].id;

					$scrollspy_menu.parent().removeClass('ether-current').end().filter('[href=#' + id + ']').parent().addClass('ether-current');
				}
			});
		},

		init_lightbox: function ()
		{
			if (typeof $.fn.colorbox)
			{
				var cbox_rels = {};

				$('a[rel*=lightbox]').each( function()
				{
					var rel = $(this).attr('rel');

					if (typeof cbox_rels[rel] == 'undefined')
					{
						cbox_rels[rel] = true;
					}
				});

				for (var rel in cbox_rels)
				{
					rel = rel.replace('[', '\\[').replace(']', '\\]');

					if ( ! $('a[rel=' + rel + ']').eq(0).hasClass('cboxElement'))
					{
						$('a[rel=' + rel + ']').colorbox({ rel: rel, maxWidth: '80%', maxHeight: '80%', fixed: true });
					}
				}
			}
		},

		fix_ie7_grid: function ()
		{
			var self = this;
			var $elem;
			var ie7_class;

			if(iev > 7)
				return;

			$elem = $(utils.prefix('cols'));
			ie7_class = utils.prefix('ie7');

			$elem = $(utils.prefix('cols')).filter(function ()
			{
				return ! $(this).parents(utils.prefix('grid')).length;
			});

			$elem.find(utils.prefix_class('col')).each(function ()
			{
				var nested_cols;
				var current_col_width;
				var current_col_padding;

				if ( ! $(this).hasClass(ie7_class))
				{
					$(this)
						.addClass(ie7_class)
						.children().wrapAll('<div class="' + utils.prefix('ie7-padding-maker')+ '"></div>');
				}

				nested_cols = $(this).find('.ether-cols').eq(0);
				nested_cols = nested_cols.add(nested_cols.siblings('.ether-cols'));

				if (nested_cols.length > 0)
				{
					current_col_width = $(this).width();
					current_col_padding = parseInt($(this).css('padding-left'), 10);

					nested_cols.each(function ()
					{
						$(this).css({
							'width': current_col_width + 2 * current_col_padding,
							'margin-left': -current_col_padding
						});
					});
				}
			});

			$elem.each(function ()
			{
				if ($(this).hasClass(utils.prefix('cols')))
				{
					$(this).width('');
					$(this).width($(this).width() + parseInt($(this).find(utils.prefix_class('ie7-padding-maker')).css('padding-left'), 10) * 2);


				}
			});
		},

		fix_ltie9_grid: function ()
		{
			var self = this;
			var $elem;

			if (! isie || iev > 8)
				return;
			
			$elem = $(utils.prefix('cols')).filter(function ()
			{
				return ! $(this).parents(utils.prefix('grid')).length;
			});

			$elem.children('.ether-col').each(function ()
			{
				$(this).children().eq(-1)
					.addClass('last-child');
			});

			$(window).on('resize', function () 
			{
				self.fix_ie7_grid();
			});
		},

		init_msg_boxes: function ()
		{
			var $elem = $(utils.prefix_class('msg'));

			if ($elem.length > 0)
			{
				$('<div class="' + utils.prefix('ctrl-close') + '">close this window</div>')
					.appendTo($elem)
					.bind('click', function () {
						$(this).parent().hide(250);
					});

				$elem
					.bind('mouseenter', function () {
						$(this).children(utils.prefix_class('ctrl-close')).stop(true, true).fadeIn(250);
					})
					.bind('mouseleave', function () {
						$(this).children(utils.prefix_class('ctrl-close')).stop(true, true).fadeOut(250);
					});
			}
		},

		init_pricing_table: function ()
		{
			var $elem = $(utils.prefix_class('prc'));

			if ($elem.length > 0)
			{
				$elem.each(function () {
					var $prc = $(this);
					var $tr = $(this).find('tr');
					var $td = $(this).find('td');
					var $button_wrap = $(this).find(utils.prefix_class('prc-button'));
					var $button = $($button_wrap).children('a');
					var h = $button.height();
					var timeout = [];

					if (($(this)).hasClass(utils.prefix('prc-2'))) {
						$button.css({height: 0});
					}

					var width = 100 / $(this).find('tr').eq(0).children().length;
					$(this).find('tr').eq(0).children().each(function ()
					{
						$(this).css({width: width + '%'});
					});

					$td
						.bind('mouseenter', function () {
							var id = $(this).index();
							clearTimeout(timeout[id]);
							delete timeout[id];
							if ( ! $(this).hasClass(utils.prefix('prc-col-hover'))) {
								$tr.each(function () {
									$(this).find('td').eq(id).addClass(utils.prefix('prc-col-hover'));
								});
								if (($prc).hasClass(utils.prefix('prc-2'))) {
									$button_wrap.eq(id).find('a')
										.stop(true, true)
										.animate({height: h}, 250);
								}
							}

						})
						.bind('mouseleave', function () {
							var id = $(this).index();
							timeout[id] = setTimeout(function () {
								$tr.each(function () {
									$(this).find('td').eq(id).removeClass(utils.prefix('prc-col-hover'));
								});
								if (($prc).hasClass(utils.prefix('prc-2'))) {
									$button_wrap.eq(id).find('a')
										.stop(true, true)
										.animate({height: 0}, 250);
								}
							}, 250);
						});
				});
			}
		},

		init_video_widget: function ()
		{
			var $elem = $(utils.prefix_class('media-wrap') + utils.prefix_class('aligncenter'));

			$elem.each(function ()
			{
				$(this).width($(this).children().eq().width());
			});

			$(window).resize(function ()
			{
				$elem.each(function ()
				{
					$(this).width($(this).children().eq().width());
				});
			});
		},

		init_widgets: function ()
		{
			this.init_syntax_highlighter();
			this.init_media_widgets();
			this.init_grid_slider_widget();
			this.init_back_to_top_widget();
			this.init_scrollspy_menu();
			this.init_lightbox();
			this.init_tab_widgets();
			this.init_msg_boxes();
			this.init_pricing_table();
			this.init_video_widget();
		},

		init: function ()
		{
			this.init_widgets();
			this.fix_ltie9_grid();
			this.fix_ie7_grid();
		}
	}

	ether.builder = ether.builder || builder;

	$(function ()
	{
		builder.init();
	});
})(jQuery);


