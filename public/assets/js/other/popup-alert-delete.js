

function openPopupDeleteUsuario(id){

    	var BASE="http://"+location.host+"/repo-uni/public/";

	      $.ajax({

	       url: BASE + "usuario/"+id+"/show",

	       type:'GET',

	       dataType:'JSON',

	       success: function(textResponse){

	       	  $('#username').html(textResponse['username']);

	       	  $("#form-delete").attr("action", BASE+"usuario/"+id+"/destroy");

	           

	      }

	});

}

function openPopupDeleteAutor(id){

    	var BASE="http://"+location.host+"/repo-uni/public/";

	      $.ajax({

	       url: BASE + "autor/"+id+"/show",

	       type:'GET',

	       dataType:'JSON',

	       success: function(textResponse){

	       	  $('#autor').html(textResponse['nombre']+' '+textResponse['apellido']);

	       	  $("#form-delete").attr("action", BASE+"autor/"+id+"/destroy");

	           

	      }

	});

}
function openPopupDeleteArea(id){

    	var BASE="http://"+location.host+"/repo-uni/public/";

	      $.ajax({

	       url: BASE + "area/"+id+"/show",

	       type:'GET',

	       dataType:'JSON',

	       success: function(textResponse){

	       	  $('#area').html(textResponse['area']);

	       	  $("#form-delete").attr("action", BASE+"area/"+id+"/destroy");

	           

	      }

	});
}

function openPopupDeleteLibroInv(id){

    	var BASE="http://"+location.host+"/repo-uni/public/";

	      $.ajax({

	       url: BASE + "investigacion/"+id+"/show",

	       type:'GET',

	       dataType:'JSON',

	       success: function(textResponse){

	       	  $('#titulo').html(textResponse['titulo']);

	       	  $("#form-delete").attr("action", BASE+"investigacion/"+id+"/destroy");

	           

	      }

	});

}
function openPopupDeleteRole(id){

    	var BASE="http://"+location.host+"/repo-uni/public/";

	      $.ajax({

	       url: BASE + "role/"+id+"/show",

	       type:'GET',

	       dataType:'JSON',

	       success: function(textResponse){

	       	  $('#role').html(textResponse['role']);

	       	  $("#form-delete").attr("action", BASE+"role/"+id+"/destroy");

	           

	      }

	});

}

