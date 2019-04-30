$(function() {
    function swing() {
        $('.scroll-icon').animate({'bottom':'10px'},600).animate({'bottom':'15px'},600, swing);
    }
    swing();
});
var slides= $('.slider ul li');

var max = 3;
console.log(max);
var cnt = 1;
function slide(){
    $('.slider ul li').eq(cnt).animate({left:"0"},1000);
    $('.slider ul li').eq(cnt-1).animate({left:"-550px"},1000);
    cnt++;
    if(cnt > max){
        cnt = 0;
    }
    $('.slider ul li').eq(cnt).css({'left':550});
}
function Actionslide(){
    setInterval(function(){
        slide();
    },3200);
}

function pro(){
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("progress").style.width = scrolled + "%";
}

$(document).ready(function(){
    Actionslide();
    $('#p1').click(function(){
        $('html,body').animate({scrollTop : 0},1000);
        $('.nav-pro').animate({left:25},800);
    });
    $('#p2').click(function(){
        $('html,body').animate({scrollTop : 900},1000);
        $('.nav-pro').animate({left:175},800);
    });
    $('#p3').click(function(){
        $('html,body').animate({scrollTop : 2600},1000);
        $('.nav-pro').animate({left:325},800);
    });
    $('#p4').click(function(){
        $('html,body').animate({scrollTop : 4410},1000);
        $('.nav-pro').animate({left:475},800);
    });
    $('nav ul li a').click(function(e){
        e.preventDefault(); 
    });
});

$(window).scroll(function(){
    if($(this).scrollTop() >= 100){
        // $('header').animate({'height':'60px'},800);
        // $('.top-area').animate({'top':'0'},800);
        $('header').addClass("heaact");
        $('.top-area').addClass("topact");
    } else {
        $('header').removeClass("heaact");
        $('.top-area').removeClass("topact");
    }
    pro();
});

