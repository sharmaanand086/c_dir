console.log('working day');
$(document).ready(function(){  
      var imgcount;
$('.mysubmit').click(function(){
   // alert('asdfa');
   var videolink = $('#videolink').val();
if(videolink=='') {
	$('.feedback').text('Video link fields is requred..');
	setTimeout(function(){// wait for 5 secs(2)
                      	$('.feedback').fadeOut('slow');
                    }, 1000);
}else{
    $.ajax({
		type:'POST',
		url: surl+"Login/addvideolink",
		data:{videolink:videolink},
		success:function(data){
	           console.log(data);
	            
				     $('#successfade').text('Your video link added successfully. ');
				        setTimeout(function(){// wait for 5 secs(2)
                      	location.reload();
                    }, 500); 
				    
               
		},
		error:function(){

		}
	})
}
}); //end loop here for adding data 


$('body').on('click','.deletevdolnk',function(){
	//alert('asdfaf');
	var text = $(this).data('text');
	var id = $(this).data('id');
	if(text == "" || id == ""){
		$('.feedback').text('please chek the requred fields to update');

	}else{
		//ajax call here 
		$.ajax({
				type:'POST',
				url: surl+"Login/deletevdolnk",
				data:{
					 text:text,
					 id:id
				     },
				success:function($data){
				 if($data == true){
				      	$('.feedback').text('Video link successfully deleted ');
				    if($data == true)
				    { 	setTimeout(function(){// wait for 5 secs(2)
                      	location.reload();
                    }, 500); 
				    }
				 	$('.tr'+id).fadeOut('slow');
				 
				      //console.log($data);	
				 }else{
				 	$('#deletefade').text('you can not deleted video link ');
				 }
				},
				error:function(){
					console.log('error here');	
				}
			})

	}
});// end delete 

// ------------------------------------------------------------------for article upload---------------------------------------------------------------------------------------------

$( "#file-upload" ).change(function(e) {
     
     var fileName = e.target.files[0].name;
     var datea123= moment().format('Do MMMM YYYY, HH:mm');
     var form_data = new FormData();
     var datafile=e.target.files[0].size;
     fileExtension = fileName.replace(/^.*\./, '');
 
     if(fileExtension == 'doc' || fileExtension == 'pdf' || fileExtension == 'docx')
     {
          if(datafile > 2873372)
          {
            $('#deletefadearticle').html('File size larger than 2MB');
          }else
          {
            form_data.append("file", document.getElementById('file-upload').files[0]);
               $.ajax({
                url:surl+"Login/uploadarticle",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                $('#uploadfadearticle').html("<label class='text-success'>File Uploading...</label>");
                },   
                success:function(data)
                {
                        $('#uploadfadearticle').fadeOut();
                        $('#successfadearticle').html('File Successfully Uploaded');
                        setTimeout(function(){// wait for 5 secs(2)
                        	location.reload();
                    }, 1000);
                  
                }
                 
               });
          }
     }else{
        var msg = $('#deletefadearticle').html('Check your file format.');
        setTimeout(function(){// wait for 5 secs(2)
                      	$('#deletefadearticle').fadeOut('slow');
                    }, 1000);
     }

});
$('body').on('click','.delarticle',function(){
	//alert('asdfaf');
	var text = $(this).data('text');
	var id = $(this).data('id');
	if(text == "" || id == ""){
		$('.feedbackarticle').text('please chek the requred fields to update');

	}else{
		//ajax call here 
		$.ajax({
				type:'POST',
				url: surl+"Login/deleteArticle",
				data:{
					 text:text,
					 id:id
				     },
				success:function($data){
				 if($data == true){
				      	$('.successfadearticle').text('File successfully deleted ');
				    if($data == true)
				    { 	setTimeout(function(){// wait for 5 secs(2)
                      	location.reload();
                    }, 2000); 
				    }
				 	//$('.articl'+id).fadeOut('slow');
				 
				      //console.log($data);	
				 }else{
				 	$('#deletefadearticle').text('you can not deleted file ');
				 }
				},
				error:function(){
					console.log('error here');	
				}
			})

	}
});// end delete 
 
 
});//document ready ends
