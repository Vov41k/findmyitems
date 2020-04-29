
$(document).ready(function(){

	


	// $('.modal-backdrop').remove();
	// $('.modal1').addClass('height');
   var x=0;
   $('.nav1 .nav-item').on('click',function(){
   	$('.nav1 .nav-link').removeClass("active");
   	// $('.nav-link').removeClass("active");
   	$("a",this).addClass( "active" );
   })

$('#openNav').on('click',function(){
console.log($('#openNav').text());
// $('#openNav').toggleClass('toggleMarginbutton');
// $('#openNav').text('Close');
	$('.menu').toggleClass('showMenu');
	if($('#openNav').text()=='Close Menu'){
		$('#openNav').text('Open Menu')
	}else {
		$('#openNav').text('Close Menu');
	}
})



});

$('.small-image-link').on('click',function(e){
	e.preventDefault();
	var clickedSrc= $('img',this)[0].src;
	$('.modal-image')[0].src=clickedSrc;
})
$('.small-image img').on('mouseover',function(){
	// var active=$('.carousel-item img');
	var active=$('.carousel-inner .active');
	var clickedSrc=$(this)[0].src;
	active.children()[0].src=clickedSrc;
	//  //only with click without fade
	
	// console.log(active.children())
	//  active.fadeOut('fast', function () {
 //        active.children().attr('src', clickedSrc);
 //        active.fadeIn('fast');
 //    });
	// ///
	//////
// var x=active.children();
	

	// console.log(active.find('img'))
	// for(var i in active){
	// 	console.log(active[i])
	// 	// console.log(active[i])
	// 	if(active[i].src==clickedSrc){
	// 		// console.log(active[i].parent().get(0))
	// 	}
	// 	// console.log(active[i].src)
	// }


})
$('#carouselitem').carousel({
  interval: 2000
});

$('.carousel').carousel({
  interval: 8000
});

$('.collapse').collapse()




// $('.submit-button').on('click',function(e){
// 	e.preventDefault();
// 	$('.f').addClass('hide');
	
// 	setTimeout(height, 1000);
// 	function height(){
// 		$('.modal1').addClass('animate');
// 	}
// 	setTimeout(width, 3000);
// 	function width(){
// 		$('.modal1').addClass('width');
// 	}
// 	// $('.modal1').addClass('animate');
// 	setTimeout(close, 4000);
// 	function close(){
// 		$('.cl').trigger( "click" );
// 	}
	
// 	console.log('close');
// })
// 
$(document).on('scroll',function(){

	var scrollTop=$(window).scrollTop();

	var carousel=$('.carousel');
	if(carousel.length==0){
		 var container=$('.container-main').offset().top;
	}else {
		 var container=$('.carousel').offset().top;
	}




   









     var content=$('.content-bottom').offset().top;
       var main=$('.main').offset().top;
       if(scrollTop>main+400) {
       $('.header-bottom').addClass('scroll-menu');
       }else {
       	$('.header-bottom').removeClass('scroll-menu');
       }

       
    if(scrollTop>=container) {
    	// console.log('ok');
	$('.baner-left').fadeIn(4000)
	
} else {
$('.baner-left').css('display','none');
};
    // if($(window).scrollTop() >= $('.baner-left').offset().top + $('.baner-left').outerHeight() - window.innerHeight) {
    //       alert('ok');
    //       }
       
                      




})
$('.close').on('click',function(){

	$('.modal-backdrop').remove();
	  // $('.modal-2').modal({show: false});
	  // console.log($('.modal-backdrop'));
})


$('.replay-message').on('click',function(e){
	e.preventDefault();
	
	var id=$(this).attr('id');
	// $('.hiddenReplay').fadeOut();

	$('.replay'+id).fadeToggle("slow");
	   var destination = $('.replay'+id).offset().top-300;
	     
            $("html, body").animate({ scrollTop: destination }, 1100);
})


$('.close-replay').on('click',function(){
	$(this).parent().parent().parent().fadeToggle("slow");;
	// console.log(x);
})

$('.replay-message2').on('click',function(e){
	e.preventDefault();
	var id=$(this).data('attr');
	$('.replayMessage'+id).fadeToggle("slow");
	     var destination = $('.replayMessage'+id).offset().top-300;
	     
            $("html, body").animate({ scrollTop: destination }, 1100);
      
            // $('html').animate({ scrollTop: destination }, 1100);
      
        return false; 
	

})


$('.edit').on('click',function(e){
	console.log('ok');
	e.preventDefault();
	var id= $(this).data('attr');
	$('.update'+id).fadeToggle("slow");
	 var destination = $('.update'+id).offset().top-300;
	     
    $("html, body").animate({ scrollTop: destination }, 1100);
})

$('.editcomment').on('click',function(e){
	e.preventDefault();
	var id= $(this).data('attr');
	$('.updatecomment'+id).fadeToggle("slow");
	 var destination = $('.updatecomment'+id).offset().top-300;
	     
   $("html, body").animate({ scrollTop: destination }, 1100);
})


// $(function() {
//   $('a[href*=#]').on('click', function(e) {
//     e.preventDefault();
//     $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
//   });
// });
// 
// $('.sticked-botton a').on('click',function(e){
// 	e.preventDefault();


	
// 	 $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top-400}, 2500, 'linear');
// });
// var destinationButton=$('.sticked-botton a').attr('href');
// $(document).on('scroll',function(){
// 		var sticky=$('.sticked-botton').offset().top;
// 		var scrollTop=$(window).scrollTop();
// 		var tab=$('#myTabContent').offset().top-50;
// 		var tabbutton=$('.message-last').offset().top-200;
// 		var myTabContenheight=$('#myTabContent').height();
// 		if(scrollTop>myTabContenheight){
// 			// console.log('yes')
			
// 		// $('.scrollbuttontext span').css('transform','rotate(130deg)');
// 			// $('.scrollbuttontext').html('<span></span><span></span><span></span>'+'Top');
// 			$('.scrollbuttontext').children('span').addClass('arrowtop');
// 			$('.scrollbuttontext').attr('href','#myTab');


// 		}else {
			
// 			$('.scrollbuttontext').children('span').removeClass('arrowtop');
// 			$('.scrollbuttontext').attr('href',destinationButton);
// 			// $('.scrollbuttontext span').removeClass('arrowtop');
// 		// 	$('.scrollbuttontext').html('<span></span><span></span><span></span>'+'Live'+ '<br>'+ 'Your'+ '<br>'+
//   // 'Comments');
// 		}


// 		if(scrollTop>tab){

			
// 			$('.sticked-botton').addClass('sticky2');
// 		}else {
// 			$('.sticked-botton').removeClass("sticky2");
// 		}
	

// });
var $myCarousel = $('#carouselExampleControls');
function doAnimations(elems) {
  var animEndEv = 'webkitAnimationEnd animationend';

  elems.each(function () {
    var $this = $(this),

        $animationType = $this.data('animation');


    // Add animate.css classes to
    // the elements to be animated
    // Remove animate.css classes
    // once the animation event has ended
    $this.addClass($animationType).one(animEndEv, function () {
      $this.removeClass($animationType);
    });
  });
}

// Select the elements to be animated
// in the first slide on page load
var firstAnimatingElems = $myCarousel.find('.carousel-item:first')
  .find('[data-animation ^= "animated"]');

// Apply the animation using the doAnimations()function
doAnimations(firstAnimatingElems);


// Attach the doAnimations() function to the
// carousel's slide.bs.carousel event
$myCarousel.on('slide.bs.carousel', function (e) {
  // Select the elements to be animated inside the active slide
  var $animatingElems = $(e.relatedTarget)
    .find("[data-animation ^= 'animated']");
  doAnimations($animatingElems);
});




    

