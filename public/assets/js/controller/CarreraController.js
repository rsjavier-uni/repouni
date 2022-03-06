class CarreraController {
  constructor() {
  }
  static listsByFacultad(facultad_id){
  	var BASE="http://"+location.host+"/repo-uni/public/";
	   $.ajax({
	       url: BASE + "carrera/search",
	       data: {'facultad_id':facultad_id},
	       type:'GET',
	       dataType:'JSON',
	       success: function(data){
	       	$('#sltCarrera').empty();
	       	$.each(data, function(i, carrera) { 
			   $('#sltCarrera').append('<option value="'+carrera.id+'">'+carrera.carrera+'</option>'); 
			}); 
	      }
	  }); 
  }

}