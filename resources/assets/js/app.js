
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Toaster from 'v-toaster'
 

import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout: 5000})



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('message', require('./components/MessageComponent.vue'));
// var cuser=$('.mtext').data('id');


const app = new Vue({
    el: '#app',
    data: {
    message: '',
    nickname:'',
   
    userscount:0,
   
    

    chat:{
    	message:[],
    	user:[],
    	color:[],
    	time:[],
    	photourl:[],
    	txtcolors:[],
    	id:[],

    },
    typing:'',
   
 	 },
 	
 	 watch:{
		 	 	message(){
		 	Echo.private('chat')
		    .whisper('typing', {
		        name: this.nickname
		    });
 	 	}
 	 },
 	 

 	 methods: {
 	 
 	 	getnick(nicknametyping){
 	 		this.nickname=nicknametyping;
 	 		
 	 	},
 	
 	 	send(userimage) {
 	 	
 	 		
 	 		
 	 	
		if(this.message.length!=0){
			this.chat.message.push(this.message);
				this.chat.txtcolors.push('text-dark');
			this.chat.user.push('you');
			this.chat.color.push('success');
			this.chat.time.push(this.getTime());
			this.chat.id.push(1);
			// console.log(this.imageurl)
			this.chat.photourl.push("http://findmyitems.com/"+userimage);
			  this.scrollToEnd();

			  axios.post('/send', {
			    message: this.message,
			    chat:this.chat
			    
			  })
			  .then(response =>{
			  
			  })
			  .catch(error=>{
			    console.log(error);
			  });

			
			
			  this.message='';	
			}
	
		},
		getTime(){
			let time = new Date();
			let minuts=time.getMinutes();
			let minutestohuman='';
			minutestohuman+=(minuts<10)? '0'+minuts:minuts;
			return time.getHours()+':'+minutestohuman;
		},
		getOldMessages(){
			
			axios.post('/getoldmessage')
			.then(response=>{
				
				if(response.data!=''){
					this.chat=response.data;
					  // this.scrollToEnd();
				}
				setTimeout(this.scrollToEnd,100)
				
			})
			
		},
		scrollToEnd(){
			    $('.list-scrolling').animate({
  				scrollTop: $('.list-scrolling').get(0).scrollHeight});

			 // var container = this.$el.querySelector(".list-scrolling");
			 // console.log( container.scrollHeight)
    //  		 container.scrollTop = container.scrollHeight;
		},
	
 	 },
 	 mounted(){
 	
 	 	 var _this = this;
 	 	 this.getOldMessages();

 	 	// Echo.private('chat.'+cuser)
 	 	Echo.private('chat')
			 .listen('ChatEvent', (e) => {
			switch(e.role) {
			    case 'admin':
			        this.chat.txtcolors.push('text-danger')
			        break;
			    case 'moderator':
			        this.chat.txtcolors.push('text-info')
			        break;
			    default:
			        this.chat.txtcolors.push('text-dark')
			}

		    

		    	this.chat.id.push(e.id);
		    	this.chat.user.push(e.user);
		       this.chat.message.push(e.message);
		       this.chat.time.push(this.getTime());
		       this.chat.photourl.push("http://findmyitems.com/"+e.photourl);
		       	axios.post('/savesession',{
		       		chat:this.chat
		       	})
			.then(response=>{
				console.log(response);
				if(response.data!=''){
					this.chat=response.data;
				}
			})
		       this.scrollToEnd();
		       if(e.id=='1'){
		       	this.chat.color.push('danger');

		       }else {
		       	this.chat.color.push('warning');
		       }
		    })

		    .listenForWhisper('typing', (e) => {
		    
		    	if(e.name!=''){
		    		this.typing= e.name+' is typing...'
		    		
		    	}else {

		    		this.typing=''
		    	}

		    	    setTimeout(function() {
				        _this.typing = ''
				      }, 5000);
		       
		    });
		    Echo.join(`chat`)
			    .here((users) => {
			       this.userscount=users.length;
			    })
			    .joining((user) => {
			    
			    	
			          this.userscount+=1;
			          	this.$toaster.success(user.name+' is joined chat')
			  //        var permission= Notification.requestPermission(newMessage );
			  //        function newMessage(permission) {
			  //        	console.log("http://findmyitems.com/"+user.image)
					// 	    if( permission != "granted" ) return false;
					// 	   	var mailNotification = new Notification('info', {
					   
					//     body : user.name+" is joined chat",
					//     icon : "http://findmyitems.com/"+user.image
					// });
					// 	};
					
				
			    })
			    .leaving((user) => {
			        this.userscount-=1;
			        this.$toaster.error(user.name+' is living chat')
			          // var permission= Notification.requestPermission(newMessage );
			  //        function newMessage(permission) {
			  //        	// console.log("http://findmyitems.com/"+user.image)
					// 	    if( permission != "granted" ) return false;
					// 	   	var mailNotification = new Notification('info', {
					   
					//     body : user.name+" is living chat",
					//     icon : "http://findmyitems.com/"+user.image
					// });
					// 	};
			    });
 	 }
});

