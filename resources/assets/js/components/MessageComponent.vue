<template>
    <div >

    <li class="list-group-item  mt-3 break-world openbtn" v-on:click= "showblock()" :class='classNames'><img class="chatimage pr-2" :src="photo" /><slot></slot>
    <span class='time'>{{time}}</span>   </li>

   
     <small class='float-right p-1 rounded' :class='badgeClass'>{{user}}</small>
     <br>
     <a href="" v-if="showbtn" v-on:click.prevent="blockuser()" class='btn btn-danger mb-1'>block</a>


    </div>
     
</template>

<script>
    export default {
      
         data: function () {
            return {

              showbtn:false
            }
          },
        props:[
        'color',
        'user',
        'time',
        'photo',
        'txtcolor',
        'role',
        'id',
      
     
      

        ],
          mounted() {
          
          

        },
         methods: {
          showblock: function(){
            
           if((this.role=='admin')||(this.role=='moderator')){
                if(this.id=='1'){
                 this.showbtn=false
                 }else {
                 this.showbtn = !this.showbtn;
                
                 }
             
          }else {
            this.showbtn=false
         }

            
        },
            blockuser(){
           
           
                axios.post('/admin/block/user',{
                    nickname:this.user
                })
            .then(response=>{
                alert(this.user+' is '+ response.data);
                this.showbtn=false
              
            })

           
            }

         },
        computed: {

            classNames(){

           return 'list-group-item-'+this.color+ ' '+ this.txtcolor
            },
            badgeClass(){

                return 'badge-'+this.color
            }
        },
       
    }

</script>

