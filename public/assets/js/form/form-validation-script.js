var Script = function () {
    $().ready(function() {
        $.validator.addMethod("regex",function (value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Please check your input."
    );
        $("#login-form").validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {                
                username: {
                    required: "El campo no puede estar vacio"
                },
                password: {
                    required: "El campo no puede estar vacio"
                },
            }
        });
        $("#usuarioForm").validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: 
                            {depends: function(element) {
                               return $('#txt_usuario_id').val() == '';
                            }
                   }
                },
                role: {
                    required: true
                },
                password_confirmation: {

                   required: 
                            {depends: function(element) {
                               return $('#txt_usuario_id').val() == '';
                            }
                   },
                    equalTo: "#txt_password"
                },
            },
            messages: {                
                username: {
                    required: "El campo no puede estar vacio"
                },
                password: {
                    required: "El campo no puede estar vacio"
                },
                role: {
                    required: "Seleccione una Opción"
                },
                password_confirmation: {
                    required: "El campo no puede estar vacio",
                    equalTo: "Ambas contraseñas deben de coincidir"
                },
            }
        });
        
         /*Form User Register Validation */

        $("#usuarioRegisterForm").validate({
            rules: {
                nombre: {
                    required: true
                },
                apellido: {
                   required: true
                },
                 email: {
                   required: true,
                   email: true
                },
                 ocupacion: {
                   required: true
                },
                organizacion:{
                    required: true
                },
                username:{
                    required: true
                }, 
                password:{
                 required: 
                            {depends: function(element) {
                               return $('#txt_usuario_reg_id').val() == '';
                            }
                  }
               },
               password_confirmation: {
                   equalTo: "#txt_password_user_reg"
               }
            },
            messages: {                
                nombre: {
                    required: "El campo no puede estar vacio"
                },
                apellido: {
                     required: "El campo no puede estar vacio"
                },
               email: {
                     required: "El campo no puede estar vacio",
                     email:"Dirección de Email no válida"
                },
                 direccion: {
                     required: "El campo no puede estar vacio"
                },
                 ocupacion: {
                     required: "Seleccione una Opción"
                },
                organizacion: {
                     required: "El campo no puede estar vacio"
                },
                 username: {
                     required: "El campo no puede estar vacio"
                },
                 password: {
                      required: "El campo no puede estar vacio"
                },
                password_confirmation: {
                	required: "El campo no puede estar vacio",
                     equalTo: "Ambas contraseñas deben de coincidir"
                }
            }
        });  
         /*Form Autor Validation */
        
        $("#autorForm").validate({
            rules: {
                nombre: {
                    required: true
                },
                apellido: {
                   required: true
                },
                 direccion: {
                   required: false
                },

                telefono: {
                   required: false,
                  regex: /[0-9]{3,4}\s[0-9]{6}$/
                },
                email:{
                    email: true
                }
            },
            messages: {                
                nombre: {
                    required: "El campo no puede estar vacio"
                },
                apellido: {
                     required: "El campo no puede estar vacio"
                },
               telefono: {
                     required: "El campo no puede estar vacio",
                     regex: "El Formato de número de teléfono no es correcto"

                },
                 direccion: {
                     required: "El campo no puede estar vacio"
                },
                email: "Direccion de email no valida",
            }
        });

      $('#investigacionForm').each(function () {
        $(this).validate({
            rules: {
                año: {
                    required: true,
                    number: true
                },
                titulo: {
                   required: true
                },
                'autores[]':{
                    required: true
                },
                area_id: {
                   required: true
                },
                descripcion: {
                   required: true
                },
                portada:{
                    required: 
                            {depends: function(element) {
                               return $('#txt_libroinv_id').val() == '';
                            }
                    },
                    accept: "image/jpeg, image/png"
                },
                 archivo:{
                    required: 
                            {depends: function(element) {
                               return $('#txt_libroinv_id').val() == '';
                            }
                    },
                    accept:"pdf"
                },
                 idioma:{
                    required: true
                },
                 categoria:{
                    required: true
                }
            },
            messages: {                
                año: {
                    required: "El campo no puede estar vacio",
                    number: "El campo debe ser numérico"
                },
                titulo: {
                     required: "El campo no puede estar vacio"
                },
                'autores[]': {
                     required: "El campo no puede estar vacio"
                },
                area_id: {
                     required: "El campo no puede estar vacio",
                     regex: "El Formato de numero de tel?fono no es correcto"
                },
                portada: {
                     required: "El campo no puede estar vacio",
                     accept:"Formato de imagen incorrecto"
                },
                descripcion: {
                     required: "El campo no puede estar vacio"
                },
                archivo: {
                     required: "El campo no puede estar vacio",
                     accept:"El archivo tiene que ser un pdf"
                },
                idioma: {
                     required: "El campo no puede estar vacio"
                },
                categoria: {
                     required: "El campo no puede estar vacio"
                }
            }
        });
       });
          $("#ajustesForm").validate({
            ignore: [],
            rules: {
                titulo_sitio: {
                    required: true
                },
                logo: {
                    accept: "image/jpeg, image/png"
                },
                path_img_upload: {
                   required: true,
                   regex: /[a-z A-Z 0-9]\/+/
                },
                path_document_upload: {
                   required: true,
                   regex: /[a-z A-Z 0-9]\/+/
                },
                elements_per_page:{
                    required: true,
                    digits: true,
                    min: 1
                },
                mail_to:{
                   required: true,
                   email:true
                }
            },
            messages: {                
                titulo_sitio: {
                    required: "El campo no puede estar vacio",            
                },
                logo: {
                     accept:"Formato de imagen incorrecto"
                },
                path_img_upload: {
                     required: "El campo no puede estar vacio",
                     regex: "Ruta no valida"
                },
                path_document_upload: {
                     required: "El campo no puede estar vacio",
                     regex: "Ruta no valida"
                },
                elements_per_page: {
                     required: "El campo no puede estar vacio",
                     digits:"El campo tiene que ser numerico",
                     min:"El campo tiene que ser mayor a 0"
                },
                mail_to: {
                     required: "El campo no puede estar vacio",
                     email:"Direccion de email no valida"   
                }
            }
        });
      $('#indiceForm').each(function () {
          $(this).validate({
             rules: {
                indice: {
                    required: true
                },
                 pagina: {
                    required: true,
                    digits: true
                }
             },
            submitHandler: function(form) { 
              libro_inv_id=$('#txt_libroinv_id').val();
	          indice_id=$('#txt_indice_id').val();
	          indice=$('#txt_indice').val(),
	          pagina=$('#txt_pag').val(),
	          token=$('#indiceForm input[name="_token"]').val();
             if (IndiceController.saveOrUpdate(libro_inv_id,indice_id,indice,pagina,token)){
             	$('#message-success').html("<div class='alert alert-success'><ul><li>El registro se ha actualizado correctamente</li></ul></div>");
                IndiceController.refreshDataTable(libro_inv_id,token);
                $("#btnAddIndice").attr('value', 'Agregar');
	            IndiceController.clearForm(); 
             }
	       }, 
            messages: {                
                indice: {
                    required: "El campo no puede estar vacio"
                },
                 pagina: {
                    required: "El campo no puede estar vacio",
                    digits: "El campo tiene que ser númerico"
                }
            }
        });
     });  
     $('#citaForm').each(function () {
        $(this).validate({
            rules: {
                cita: {
                    required: true
                }
            },
            submitHandler: function(form) { 
              libro_inv_id=$('#txt_libroinv_id').val();
	          cita_id=$('#txt_cita_id').val();
	          cita=$('#txt_cita').val(),
	          token=$('#citaForm input[name="_token"]').val();
             if (CitaController.saveOrUpdate(libro_inv_id,cita_id,cita,token)){
             	$('#message-success-cita').html("<div class='alert alert-success'><ul><li>El registro se ha actualizado correctamente</li></ul></div>");
                CitaController.refreshDataTable(libro_inv_id,token);
                $("#btnAddCita").attr('value', 'Agregar');
	            CitaController.clearForm(); 
             }
	       }, 
            messages: {                
                cita: {
                    required: "El campo no puede estar vacio"
                },
            }
        });
     });
        $("#contactForm").validate({
            rules: {
                nombre: {
                    required: true
                },
                email:{
                	required:true,
                	email:true
                },
                asunto:{
                	required: true
                },
                mensaje:{
                	required: true
                }
            },
            messages: {                
                nombre: {
                    required: "El campo no puede estar vacio"
                },
                 email: {
                    required: "El campo no puede estar vacio",
                    email:"Dirección de Email no válida"
                },
                 asunto: {
                    required: "El campo no puede estar vacio"
                },
                 mensaje: {
                    required: "El campo no puede estar vacio"
                }
            }
        });
        $("#areaForm").validate({
            rules: {
                area: {
                    required: true
                }
            },
            messages: {                
                area: {
                    required: "El campo no puede estar vacio"
                }
                 
            }
        });
        /* role Form Validation*/
        $("#roleForm").validate({
            rules: {
                name: {
                    required: true,
                    remote: {
                    url: 'http://'+location.host+"/repo-uni/public/role/unique",
                    type: "post",
                    data: {
                     '_token':$('input[name="_token"]').val(),
                     'name':$('#name').val(),
                     'id':$('#role_id').val(),
                      name: function() {
                         return $( "#name" ).val();
                      }
                     }
                    }
                },  
            },
            messages: {                
                name: {
                    required: "El campo no puede estar vacio",
                    remote:"El elemento rol ya esta en uso"
                }  
            }
        });
        /* From Registration Validation*/
         $("#registrationForm").validate({
            rules: {
                nombre: {
                    required: true
                },
                apellido: {
                   required: true
                },
                 email: {
                   required: true,
                   email: true
                },
                 ocupacion: {
                   required: true
                },
                organizacion:{
                    required: true
                }
             
            },
            messages: {                
                nombre: {
                    required: "El campo no puede estar vacio"
                },
                apellido: {
                     required: "El campo no puede estar vacio"
                },
               email: {
                     required: "El campo no puede estar vacio",
                     email:"Dirección de Email no válida"
                },
                 direccion: {
                     required: "El campo no puede estar vacio"
                },
                 ocupacion: {
                     required: "Seleccione una Opción"
                },
                organizacion: {
                     required: "El campo no puede estar vacio"
                }   
            }
        });
        /*Form User web site Validation */

        $("#userWebSiteForm").validate({
            rules: {
                nombre: {
                    required: true
                },
                apellido: {
                   required: true
                },
                 email: {
                   required: true,
                   email: true
                },
                 ocupacion: {
                   required: true
                },
                organizacion:{
                    required: true
                },
                username:{
                    required: true
                }, 
                password:{
                   equalTo: "#txt_password_conf_user"
               },
               password_confirmation: {
                   equalTo: "#txt_password_user"
               }
            },
            messages: {                
                nombre: {
                    required: "El campo no puede estar vacio"
                },
                apellido: {
                     required: "El campo no puede estar vacio"
                },
               email: {
                     required: "El campo no puede estar vacio",
                     email:"Dirección de Email no válida"
                },
                 direccion: {
                     required: "El campo no puede estar vacio"
                },
                 ocupacion: {
                     required: "Seleccione una Opción"
                },
                organizacion: {
                     required: "El campo no puede estar vacio"
                },
                 username: {
                     required: "El campo no puede estar vacio"
                },
                 password: {
                      equalTo: "Ambas contraseñas deben de coincidir"
                },
                password_confirmation: {
                     equalTo: "Ambas contraseñas deben de coincidir"
                }
            }
        });  

        // Programa validation
        $('#programaForm').each(function () {
            $(this).validate({
                rules: {
                    anho_acreditacion: {
                        required: true,
                        number: true
                    },
                    titulo: {
                       required: true
                    }
                },
                messages: {
                    anho_acreditacion: {
                        required: "El campo no puede estar vacio",
                        number: "El campo debe ser numérico"
                    },
                    titulo: {
                         required: "El campo no puede estar vacio"
                    }
                }
            });
           });
    });
}();