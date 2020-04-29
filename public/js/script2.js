
$(document).ready(function(){

  var userblocked=$('.userblocked1');
  userblocked.on('click',function(){

    var url1=$(this).data('action');
       $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
           $.ajax({
                    type: 'POST',
                    url: url1,
                  
                    // contentType: 'json',
                    cache: false,
                    processData: false,
                    success: function (data) {

                        if(data=='none'){
                          alert('Status cannot be changed');
                        }else {
                          alert(data);
                        }
                    }
                })



  })




	// var input=  $('input[name="role"]');
	// var input=$( "#selected" );
    var input=$( ".selectOption" );// 
    
	// var value=$( "#selected option:selected" ).val();
            input.change(function () {

            	var value=$(this).val();
            	alert('The user Role is '+value);
            	// var data=$('.formRole').serialize();
                var data= $(this,'.formRole') .serialize();// 
            	

            	// var url = $(this).data('action');
            	// console.log($(this).parent().parents('form')[0].action);
             // console.log($(this).parents('form')[0]);
            	 var url=$(this).parents('form')[0].action;
            	// console.log(url);

            	   $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            	     $.ajax({
                    type: 'PUT',
                    url: url,
                    data:data,
                    // contentType: 'json',
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);
                    }
                })
            	// var value=$(this).val();
            })


            $('.destinationUser').on('keyup',function(){
                var value=$(this).val();
                var url2=$(this).data('url');

                // console.log(value)
             
                   $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
             $.ajax({
                    type: 'POST',
                    url: url2,
                    data:{value:value},
                    // contentType: 'json',
                    cache: false,
                    // processData: false,
                    success: function (data) {
                        if(data.error){
                          $('.sndmsg').addClass('disabled').prop('disabled', true);
                        }else {
                          $('.sndmsg').removeClass('disabled').prop('disabled', false);
                        }
                        $('.showname').show();
                         $('.showname').css('display','flex');
                        $('.names  p' ).remove();

                   
                       for(var i in data){

                        if(data.error){
                           var li='<p class="nametofind alert-danger m-0">'+data.error+'</p>';


                        $('.names').append(li);
                        }else {
                            var li='<p class="nametofind">'+data[i]+'</p>';


                        $('.names').append(li);
                        }
                   
                       }
                    }
                })


})


	$('body').on('click','.nametofind',function(){
        value=$(this)[0].innerHTML;
              $('.destinationUser').val(value);
              $('.names  p' ).remove();
              $('.showname').hide();
})

})




$(document).ready(function(){
     $countmsg=$('.counts').text();
    $('.card2').on('click',function(){
    var that=$(this);
   var id=$(this).data('id');
   var url3=$(this).data('action');
  

                  $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }

                });
             $.ajax({
                    type: 'POST',
                    url: url3,
                    contentType: 'json',
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if(that.hasClass('card2')){
                             that.addClass('card').removeClass('card2');


                             that.find('.notreadmsg').removeClass('notreadmsg');
                    
                                $countmsg--;
                     $('.counts').text($countmsg);
                     that.stopPropagation();
                        }
                    
                     
                     

                        

                   
                    }
                })
})
})

