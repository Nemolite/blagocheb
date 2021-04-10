
jQuery(document).ready(function() {

    jQuery('#btn_admin_custem').on('click',function(e){
      e.preventDefault();      
      let admin_custem = document.querySelector('#admin_custem');     
      let getDateForm = new FormData(admin_custem);   
    
    getDateForm.append("action", "admin_custem"); 
    jQuery.ajax({
        url:'/wp-admin/admin-ajax.php', 
        data:getDateForm,
        processData : false,
        contentType : false,              
        type:'POST', 
          success:function(data){
              alert(data);
          }
      });
      return false;
  });
});