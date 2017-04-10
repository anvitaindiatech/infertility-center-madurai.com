/*
 * jQuery Simple Image Slider
 * Copyright 2012, Aswanthkumar
 * http://www.tours2health.com
 *
 * Free to use and abuse under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 */

var len,nxt;
window.onload=function() {
len=$("#slider li").size();
var t=setInterval(function(){ moveout();},5000);


};

function moveout(){
var curr=$('.active');
	nxt=curr.next();	
	if(nxt.html()==null){nxt=$('#slider li').eq(0);}
	// alert(nxt.html());
	
	$('.active').children('.sl-con').animate({left:'758px'},2000,function(){movein(curr); $(this).css('left','-758px');});
	nxt.children('.sl-con').animate({left:'0px'},2000,function(){nxt.addClass("active");});
}

function movein(curr){
// var curr=$('.active');
curr.removeClass("active");
curr.addClass("inactive"); 
}
