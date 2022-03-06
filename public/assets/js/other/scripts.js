function initializeJS() {

    //tool tips
    jQuery('.tooltips').tooltip();

    //popovers
    jQuery('.popovers').popover();

    //custom scrollbar
        //for html
    jQuery("html").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '6', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: '', zindex: '1000'});
        //for sidebar
    jQuery("#sidebar").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: ''});
        // for scroll panel
    jQuery(".scroll-panel").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: ''});
    
    //sidebar dropdown menu
    jQuery('#sidebar .sub-menu > a').click(function () {
        var last = jQuery('.sub-menu.open', jQuery('#sidebar'));        
        jQuery('.menu-arrow').removeClass('arrow_carrot-right');
        jQuery('.sub', last).slideUp(200);
        var sub = jQuery(this).next();
        if (sub.is(":visible")) {
            jQuery('.menu-arrow').addClass('arrow_carrot-right');            
            sub.slideUp(200);
        } else {
            jQuery('.menu-arrow').addClass('arrow_carrot-down');            
            sub.slideDown(200);
        }
        var o = (jQuery(this).offset());
        diff = 200 - o.top;
        if(diff>0)
            jQuery("#sidebar").scrollTo("-="+Math.abs(diff),500);
        else
            jQuery("#sidebar").scrollTo("+="+Math.abs(diff),500);
    });

    // sidebar menu toggle
    jQuery(function() {
        function responsiveView() {
            var wSize = jQuery(window).width();
            if (wSize <= 768) {
                jQuery('#container').addClass('sidebar-close');
                jQuery('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                jQuery('#container').removeClass('sidebar-close');
                jQuery('#sidebar > ul').show();
            }
        }
        jQuery(window).on('load', responsiveView);
        jQuery(window).on('resize', responsiveView);
    });

    jQuery('.toggle-nav').click(function () {
        if (jQuery('#sidebar > ul').is(":visible") === true) {
            jQuery('#main-content').css({
                'margin-left': '0px'
            });
            jQuery('#sidebar').css({
                'margin-left': '-180px'
            });
            jQuery('#sidebar > ul').hide();
            jQuery("#container").addClass("sidebar-closed");
        } else {
            jQuery('#main-content').css({
                'margin-left': '180px'
            });
            jQuery('#sidebar > ul').show();
            jQuery('#sidebar').css({
                'margin-left': '0'
            });
            jQuery("#container").removeClass("sidebar-closed");
        }
    });

    //bar chart
    if (jQuery(".custom-custom-bar-chart")) {
        jQuery(".bar").each(function () {
            var i = jQuery(this).find(".value").html();
            jQuery(this).find(".value").html("");
            jQuery(this).find(".value").animate({
                height: i
            }, 2000)
        })
    }

}
jQuery(document).ready(function(){
    initializeJS();
    $(":file").filestyle({buttonText: "Subir Archivo",buttonName: "btn-primary"});
    selectores();
    changeSltCategoria();
});

function showPassword(){
  if ($('#txt_password').is(':password')){
    $('#txt_password').attr('type', 'text');
    $('#txt_password_conf').attr('type', 'text');
  }else{
    $('#txt_password').attr('type', 'password');
    $('#txt_password_conf').attr('type', 'password');
  }
  
}

function selectores(){
	$("#slcAutor").select2({ placeholder: "Autor",allowClear: false});
}
function changeSltCategoria(){
	var cat=$('#sltCategoria').val();
	if (cat=="TFG"){
		$('#lb_categoria').removeClass("col-sm-2 control-label").addClass("col-sm-1 control-label");
		$('#div_categoria').show();
		
	}else{
		$('#lb_categoria').removeClass("col-sm-1 control-label").addClass("col-sm-2 control-label");
		$('#div_categoria').hide();
	}
}
function changeSltFacultad(){
	loadSltCarrera();
}
function loadSltCarrera(){
	var facultad_id=$('#sltFacultad').val();
	CarreraController.listsByFacultad(facultad_id);
}
function editIndiceForm(id){
	IndiceController.edit(id);
}
function editCitaForm(id){
	CitaController.edit(id);
}
function deleteIndiceRow(id){
	   var libro_inv_id=$('#txt_libroinv_id').val();
	   var _token = $('#indiceForm input[name="_token"]').val();
	   if (IndiceController.destroy(id)){
    	 $('#message-success').html("<div class='alert alert-success'><ul><li>El registro se ha eliminado correctamente</li> </ul></div>");
         IndiceController.refreshDataTable(libro_inv_id,_token); 
      }
}
function deleteCitaRow(id){
	var libro_inv_id=$('#txt_libroinv_id').val();
	   var _token = $('#citaForm input[name="_token"]').val();
	   if (CitaController.destroy(id)){
    	 $('#message-success-cita').html("<div class='alert alert-success'><ul><li>El registro se ha eliminado correctamente</li> </ul></div>");
         CitaController.refreshDataTable(libro_inv_id,_token); 
      }
}
function generateSlugInput(){
	var value=$("#name").val();
	var res=value.toLowerCase();
	$("#slug").val(res.replace(" ","-"));
}

