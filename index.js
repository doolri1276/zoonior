$(document).ready(function (){


  //메뉴 버튼 누르면 nav가 나타남.
	$('header #menu').click(function () {
		$('nav#mobile').fadeIn(400);
		$('div #black').fadeIn(600);
	});

  //nav 숨김
	$('div #black').click(function () {
		$('div #black').fadeOut(600);
		$('nav#mobile').fadeOut(400);
	});

  //hover효과
	// $('nav li a').on('mouseover',function(){
	// 	$(this).css('color','#CF1B26');
	// });

	// $('nav li a').on('mouseleave',function(){
	// 	$(this).css('color','');
	// });

	// $('nav .lists>li').on('mouseover',function(){
	// 	$(this).css('background-color','#CF1B26');
	// 	$(this).children().css('color','white');
	// });

	// $('nav .lists>li').on('mouseleave',function(){
	// 	$(this).css('background-color','');
	// 	$(this).children().css('color','');
	// });

	// $('nav #main_menu2>li a').on('mouseover',function(){
	// 	$(this).css('color','#CF1B26');
	// });

	// $('nav #main_menu2>li a').on('mouseleave',function(){
	// 	$(this).css('color','');
	// });

	$('nav #main_menu2 li a').on('click',function(){
		$('div #black').fadeOut(600);
		$('nav#mobile').fadeOut(400);
	});

	$('ul#main_menu2>li.comm').click(function(){
		
		$(this).children().slideToggle(400);

	});

	$('#main_menu2 li').on('mouseover',function(){
		if($(this).is('.comm')===false){
			$(this).css('background-color','#CF1B26');
			$(this).children().css('color','white');
		}
		
	});
		
	$('#main_menu2 li').on('mouseleave',function(){
		if($(this).is('.comm')===false){
			$(this).css('background-color','');
			$(this).children().css('color','');
		}
	});



	// $('nav #main_menu2 li.comm').on('click').function(){
	// 	alert('눌렸다.');
	// 	// $(this).children().slideToggle(600);
	// 	// $('nav li.comm>ul.lists').slideToggle(600);
	// };

	


	// $(window).resize(function(){

	// 	alert('resize');
	// 	//autoResize(getElementById('iframe'));
	// 	iframeLoaded();



	// });

	

});

// $(window).resize(function(){
// 		alert('resize!');
// 	});

// function autoResize(i){
// 	      var iframeHeight=(i).contentWindow.document.body.scrollHeight;
// 	      (i).height=iframeHeight+20;
// 	      //alert(iframeHeight+20+"");
// 	}

// 	function iframeLoaded(){
// 		var iFrameID=document.getElementById('iframe');

// 		if(iFrameID){
// 			iFrameID.height="";
// 			iFrameID.height=iFrameID.contentWindow.document.body.scrollHeight+"px";
// 			alert(iframeHeight+"  AHAHA");
// 		};
// 	}