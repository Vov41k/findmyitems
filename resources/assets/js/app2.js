require('./bootstrap');

window.Vue = require('vue');


if (document.querySelector('#app2')) {
	var id=$('.homemsg').data('id');
	var countMsg=$('.counts').text();
	var numberMsg=Number(countMsg);
	
   const app = new Vue({
	el:'#app2',


	mounted(){

		    Echo.private('message.'+id)
 	 
		    .listen('SendMessageEvent', (e) => {
		    
		    	numberMsg+=1;
		    	$('.counts').text(numberMsg);
		    	        var permission= Notification.requestPermission(newMsg );
			         function newMsg(permission) {
			         	// console.log("http://findmyitems.com/"+user.image)
						    if( permission != "granted" ) return false;
						   	var notification = new Notification('New Message', {
					   
					    body : " New Msg from :"+e.user,
					    icon : "http://findmyitems.com/"+e.image,
					   
					});
						   	notification.onclick=function(){

						   	 window.location.href ='http://findmyitems.com/messages/show/'+e.messagereceivedId;
						   	  // notification.close();
						   		// /messages/read/{id}
						   	}

						};
		    
		    })
	}


});
}
