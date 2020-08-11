$(document).ready(function(){  
      $('#username').change(function(){  
           var username = $('#username').val();  
           if(username != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>user/chekusername",  
                     method:"POST",  
                     data:{username:username},  
                     success:function(data){  
                          $('#message').html(data);  
                     }  
                });
                $.ajax({  
                     url:"<?php echo base_url(); ?>user/adduserbtn",  
                     method:"POST",  
                     data:{username:username},  
                     success:function(data){  
                          $('#adduser').html(data);  
                     }  
                });    
           }  
      });  
 });  