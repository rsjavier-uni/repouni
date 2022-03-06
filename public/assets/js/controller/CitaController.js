class CitaController {
  constructor() {
  }
  static saveOrUpdate(libro_inv_id,cita_id,cita,token){
  	var BaseUrl= "http://"+location.host+"/repo-uni/public/";
  	  $.post(BaseUrl+'cita/saveOrUpdate', {
	      'libro_inv_id':libro_inv_id,
	      'cita_id':cita_id,
	      'cita':cita,
	      '_token':token
       }, 
	   function(response){ 
	   }); 
	 return true;
  }
  static edit(id){
  	var BaseUrl= "http://"+location.host+"/repo-uni/public/";
	$.ajax({ 
      url: BaseUrl+"cita/"+id+"/edit", 
      type: 'GET', 
      dataType:'JSON',
      success: function(response) { 
      	 $("#btnAddCita").attr('value', 'Actualizar');
         $('#txt_cita_id').val(response['id']);
         $('#txt_cita').val(response['cita']);
       } 
    }); 
 }
 static destroy(id){
 	var BaseUrl= "http://"+location.host+"/repo-uni/public/";
	var _token = $('#citaForm input[name="_token"]').val();
	$.ajax({ 
      url: BaseUrl+ "cita/"+id+"/destroy", 
      data: {'_token':_token}, 
      type: 'DELETE',
      dataType:'JSON',
      success: function(response) { 
       } 
    }); 
    return true;
}
  static refreshDataTable(libro_inv_id,token){
  	 var BaseUrl= "http://"+location.host+"/repo-uni/public/";
	  var datos = {'_token':token};
	      $.ajax({
	         url: BaseUrl + "cita/"+libro_inv_id+"/lists",
	         type:'GET',
	         dataType:'JSON',
	         success: function(data){
	             $('#citaTable').html(data['citaTable']); 
	     }
	  });
  }
  static clearForm(){
	$('#txt_cita_id').val('');
    $('#txt_cita').val('');
  }
}