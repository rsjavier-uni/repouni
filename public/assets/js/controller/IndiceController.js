class IndiceController {
  constructor() {
  }
  static saveOrUpdate(libro_inv_id,indice_id,indice,pagina,token){
  	var BaseUrl= "http://"+location.host+"/repo-uni/public/";
  	  $.post(BaseUrl+'indice/saveOrUpdate', {
	      'libro_inv_id':libro_inv_id,
	      'indice_id':indice_id,
	      'indice':indice,
	      'pagina':pagina,
	      '_token':token
       }, 
	   function(response){ 
	   }); 
	 return true;
  }
  static edit(id){
  	var BaseUrl= "http://"+location.host+"/repo-uni/public/";
	$.ajax({ 
      url: BaseUrl+"indice/"+id+"/edit", 
      type: 'GET', 
      dataType:'JSON',
      success: function(response) { 
      	 $("#btnAddIndice").attr('value', 'Actualizar');
         $('#txt_indice_id').val(response['id']);
         $('#txt_indice').val(response['indice']);
         $('#txt_pag').val(response['pagina']);
       } 
    }); 
 }
 static destroy(id){
 	var BaseUrl= "http://"+location.host+"/repo-uni/public/";
	var _token = $('#indiceForm input[name="_token"]').val();
	$.ajax({ 
      url: BaseUrl+ "indice/"+id+"/destroy", 
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
	         url: BaseUrl + "indice/"+libro_inv_id+"/lists",
	         type:'GET',
	         dataType:'JSON',
	         success: function(data){
	             $('#indiceTable').html(data['indiceTable']); 
	     }
	  });
  }
  static clearForm(){
	$('#txt_indice_id').val('');
    $('#txt_indice').val('');
    $('#txt_pag').val('');
  }
}