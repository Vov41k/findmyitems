$('.sticked-botton a').on('click',function(e){
	e.preventDefault();
	var scrolldown=$(this).attr('href');

	if($(scrolldown).length==0){
		scrolldown="#no-login";
	}
	
	
	
	 $('html, body').animate({ scrollTop: $(scrolldown).offset().top-400}, 2500, 'linear');
});
var destinationButton=$('.sticked-botton a').attr('href');

$(document).on('scroll',function(){
		var sticky=$('.sticked-botton').offset().top;
		var scrollTop=$(window).scrollTop();
		var tab=$('#myTabContent').offset().top-50;
		var tabbutton=$('.message-last').offset().top-200;
		var myTabContenheight=$('#myTabContent').height();
		if(scrollTop>myTabContenheight*1.5){
			// console.log('yes')
		
                                                           
		// $('.scrollbuttontext span').css('transform','rotate(130deg)');
			// $('.scrollbuttontext').html('<span></span><span></span><span></span>'+'Top');
			$('.scrollbuttontext').children('span').addClass('arrowtop');
			$('.scrollbuttontext').attr('href','#myTab');
			$('.sticked-botton-text').html('Comments'+'<br>'+'Start');


		}else {
			
			$('.scrollbuttontext').children('span').removeClass('arrowtop');

			$('.scrollbuttontext').attr('href',destinationButton);
			$('.sticked-botton-text').html('Live'+'<br>'+'Your'+'<br>'+'Comment');
			// $('.scrollbuttontext span').removeClass('arrowtop');
		// 	$('.scrollbuttontext').html('<span></span><span></span><span></span>'+'Live'+ '<br>'+ 'Your'+ '<br>'+
  // 'Comments');
		}


		if(scrollTop>tab){

			
			$('.sticked-botton').addClass('sticky2');
		}else {
			$('.sticked-botton').removeClass("sticky2");
		}
	

});