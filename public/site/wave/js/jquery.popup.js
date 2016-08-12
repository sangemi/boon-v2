/*********************************************************************************
 플러그인 : jquery.DB_popupWin2.js
 제작자 : 디자인블랙 , http://designblack.com
 업데이트 : 2014-09-29
 라이센스 : 무한라이센스
 기타 : 문서정보는 삭제 할 수 없습니다.
 *********************************************************************************/
!function(e){e.fn.popupWin2=function(i){
    var t={key:"",moveSpeed:300,openDelayTime:0,autoCloseTime:5e3,yGap:0,day:1,cookieName:"popupWin2",checkbox_id:""};return e.extend(t,i),this.each(function(){function i(){"hide"==e.cookie(t.cookieName)?(l.css({left:0,top:0+t.yGap,width:y.w,height:y.h}).hide(),m.hide()):(o(),l.css("visibility","visible")),d()}function o(){0==t.openDelayTime?a=setTimeout(c,t.autoCloseTime):(l.hide(),u=setTimeout(n,t.openDelayTime))}function n(){h(),a=setTimeout(c,t.autoCloseTime+t.moveSpeed)}function c(){l.animate({left:0,top:0+t.yGap,width:y.w,height:y.h},t.moveSpeed,function(){e(this).fadeOut(),1==t.checkbox_id.checked&&e.cookie(t.cookieName,"hide",{path:"/",expires:t.day})})}function h(){"none"==l.css("display")&&l.css({visibility:"visible",left:0,top:0+t.yGap,width:y.w,height:y.h}).fadeIn().animate({left:w.l,top:w.t,width:w.w,height:w.h},t.moveSpeed)}function d(){s.bind("mouseenter",function(){0==T&&clearTimeout(a)}),s.bind("mouseleave",function(){0==T&&(a=setTimeout(c,t.autoCloseTime))}),f.bind("click",function(){T=0,clearTimeout(a),c()}),p.bind("click",function(){T=1,h(),clearTimeout(a),clearTimeout(u)})}var a,u,s=e(this),p=s.find(".d_open"),l=s.find(".d_winBanner"),f=s.find(".d_close"),m=s.find(".d_checkBox"),T=0,y={l:s.position().left,t:s.position().top,w:s.width(),h:s.height()},w={l:l.position().left,t:l.position().top,w:l.width(),h:l.height()};i()})}

}(jQuery);


$('.popup_bl').click(function(){
    $(this).hide();
    $("#정통법소개").attr("tabindex", -1).focus();
});


$('.popup_bl').popupWin2({
    moveSpeed:200,
    openDelayTime:2000,    //오픈시딜레이
    autoCloseTime:3000,    //일정시간후 자동 닫힘(1000=1초)
    day:1,                 //1일 동안 열지않기
    cookieName:'popup_wave',    //쿠키이름(여러개를 셋팅할경우 이름을 달리해야함)
    checkbox_id:document.getElementById('d_check1')    //jquery-1.4 checked 버그회피
});