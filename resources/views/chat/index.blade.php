@extends('layouts.appmain')



@section('main')

<div class="main">
<div class="container container-main">
    
    <div class="contents">
        <div class="row">

          <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
           

          

            <!-- <div class="row bg-light p-4">
                  <div class="col-xl-12 col-sm-12 col-12"> -->

                    <div id="app" class="text-dark p4  ">
                       <h2 class="text-center text-light pt-4 pb-5">Chat <span class="badge badge-pill badge-danger">@{{userscount}}</span></h2>
                     
                      <div class="col-xl-12 h-25 appcontainer bg-light rounded chatscontent">
                        <div class="col-2 typing">
                            <div class="badge badge-pill badge-primary text-left">@{{typing}}</div>
                        </div>
                          <ul class="list-group text-left  list-scrolling mtext pr-2" data-id={{Auth::user()->id}}>

                           <!-- :txtcolor=chat.txtcolor[index] -->
                        

                          <message v-for='(value,index) in chat.message' :txtcolor=chat.txtcolors[index] :key="index" :color=chat.color[index]  :user='chat.user[index]' role='{{Auth::user()->role}}' :photo='chat.photourl[index]' :id=chat.id[index] :time='chat.time[index]'>@{{value}}</message>
                        </ul>
                      </div>
                      
                  <!-- @keyup.enter="setimage('{{Auth::user()->photo_url}}')"  -->
                    
                     @csrf
                    <input type="text" class="form-control mt-5 chatinput rounded" placeholder="insert text" v-model='message'  @keyup.enter="send('{{Auth::user()->photo_url}}')"   @keyup="getnick('{{Auth::user()->nickname}}')">
                    <br>
                    <input type="submit" class="btn btn-danger mb-3 btnsubmit"  value="Send" name="" @click="send('{{Auth::user()->photo_url}}')">

                    </div>

          </div>
         
              
        </div>

    </div>
    

</div>



</div>
  <script type="text/javascript" src="{{asset('js/app.js')}}" defer></script>
<script type="text/javascript" >
 
  // $(document).ready(function(){


  //   // $('.x1').click();

  // //   scrollb();
  // //   function scrollb(){
  // //     $('.list-scrolling').animate({
  // // scrollTop: $('.list-scrolling').get(0).scrollHeight});
  // //   var scrolling=  setInterval(scrollb,4000);
  //   })


// // $('.btnsubmit').on('click',function(){
// //       $('.list-scrolling').animate({
// //   scrollTop: $('.list-scrolling').get(0).scrollHeight});
// // })
// //   $('.chatinput').keydown(function() {
   
// //        $('.list-scrolling').animate({
// //   scrollTop: $('.list-scrolling').get(0).scrollHeight});
   
// // });
//     $('.list-scrolling').on('scroll',function(){
//          clearInterval(scrolling);
// })
// });

</script>

@endsection


