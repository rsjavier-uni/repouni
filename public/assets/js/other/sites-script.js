jQuery(document).ready(function(){
    selectores();
});
function showPassword(){
  if ($('#txt_password_user').is(':password')){
    $('#txt_password_user').prop('type', 'text');
    $('#txt_password_conf_user').prop('type', 'text');
  }else{
    $('#txt_password_user').prop('type', 'password');
    $('#txt_password_conf_user').prop('type', 'password');
  }
  
}
function selectores(){
	var current_url=window.location.href
	if (current_url=="http://repositorio.uni.edu.py/repo-uni/public/sites"){
		$("#selectAñoHasta option:last").attr("selected", "selected");
	}
	
}
function searchLibroInvByArea(){
	var area_id=$('#slt_area').val();
	window.location.href = "../"+area_id+"/area";
}
function searchLibroInvByYear(){
	var añoSelected=$('#slc_año').val();
	window.location.href = añoSelected;
}
function checkLoginRegister(){
    var BASE="http://"+location.host+"/repo-uni/public/";
    $('#loginRegisterForm').validate({submitHandler: function(form) { 
       	$.post( BASE+'sites/login', {
       		 'username':$('#txt_username').val(),
              'password':$('#txt_password').val(),
              '_token':$('#loginRegisterForm input[name="_token"]').val()
              }, 
	       	  function(response){ 
	       	  	if (response==0){
	       	  		$('#message-success-login').html("<div style='font-size: 12px;' class='alert alert-danger'>Usuario o Contraseña Incorrecta</div>");
	       	  	  }else{
	       	  		if (response==1){
	       	  		 location.reload();
	       	  	    }
	       	  	  }	
	         } 
	        ); 
	      } 
	 }); 
}
function gotoPage(pagina){
	var src = $('#pdf_embed').attr('src');
    str=src.substring(0,src.indexOf("#page="));
    str = (str.length == 0)?src+'#page='+pagina:str+'#page='+pagina;
    $('#pdf_embed').attr('src',str); 
	$('#pdf_embed_view').html('<embed src="'+$('#pdf_embed').prop('src')+'" width="97%" height="550px" id="pdf_embed"></embed>');
}
