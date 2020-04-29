
$(document).ready(function() {
   
  

     
    $('#summernote').summernote({
        height: 200,
      
         
         callbacks: {
        onImageUpload : function(files, editor, welEditable) {

 
             for(var i = files.length - 1; i >= 0; i--) {
             
                
                     sendFile( files[i], this);
            }
        },
         // onMediaDelete : function($target, editor, $editable) {

         // //    alert('dd');
         // console.log($target)
         // // alert($target.context.dataset.filename); 
         // // DELETE FROM FORLDER    
         // //     
         //     $target.remove();
         //     }

    },
  
        toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather']],
        ['fontsize', ['fontsize']],
        ["fontname", ["fontname"]],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['insert', ['picture','link','video']],
        ['view', ['fullscreen', 'codeview']],
       
      ],
      
    });

      });
function sendFile(file, el) {
  
    var form = document.forms.namedItem("campaignForm"); // high importance!, here you need change "yourformname" with the name of your form
    var form_data = new FormData(form);
    form_data.append('file', file);

var url=$('.form-class').data('url');

  $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
$.ajax({
  
    data:form_data,
    type: "POST",
    url: url,
 
    cache: false,
  
    contentType: false,
    processData: false,


    success: function(data) {
        var image=data[1];
          
           var id=image.id;
           
                
                  var link="{{route('admin.deletenewsimage',':id')}}";
                  var link= link.replace(":id", id);    

        
    
       $('#summernote').summernote('editor.insertImage', 'http://findmyitems.com/'+image.image_url);
        var tr='<tr class="image'+image.id+'">'+
             '<td><img src="'+'http://findmyitems.com/'+image.image_url +'" alt="image" width="50vw" height="50vh"></td>'+
           
              '<td class="text-light">'+'http://findmyitems.com/'+image.image_url +'</td>'+
                '<td class="text-light">'+
                                "<form action="+link+" method='post'>"+
                                '<input type="hidden" name="_method" value="delete">'+
                                             // '{{method_field('DELETE')}}'+
                                        '<input type="hidden" name="_token" value="{{ csrf_token() }}">'+
                                        "<input type='submit' name='submit' value='Delete' class='btn btn-danger deleteimg' data-id="+image.id+">"+
                                '</form>'+
                 '</td>'+


        '</tr>';
       

                           
                        
    
                       
       $('.tbody').append(tr);

    }
});
}

$(document).ready(function(){
    $('body').on('click','.deleteimg',function(e){
        e.preventDefault();
        console.log('ok');
       var buttonid=$(e.target).attr('data-id');
       url=$(e.target).parent().attr('action');
       var token = $(this).data('token');

  
      
         $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
         $.ajax({
  
    // data:form_data,
    type: "DELETE",
    url: url,
    // data: {_method: 'delete', _token :token},
    cache: false,
  
    contentType:false,
    processData: false,


    success: function(data) {

        $(".image"+data).remove();
     

    }
});


    })
//    $('.deleteimg').on('click',function(e){
//     e.preventDefault();
//     alert('ok');
// }) 
})




