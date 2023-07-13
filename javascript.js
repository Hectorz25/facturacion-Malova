function obtenerFecha(){	
		var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth()+1).padStart(2, '0');
		var yyyy = String(today.getFullYear());
		
		today = yyyy + mm + dd;
		//console.log("Today: "+today);
		var today2= yyyy +"-"+ mm +"-"+ dd;
		if(today === "yyyymmdd"){
			document.getElementById("fechaGenerar").value = today;
			//document.forms["solicitar"]["fechaSolicitar"].value="";
			//document.forms["solicitar"]["fechaSolicitar"].max=today2;
		}else{
			document.getElementById("fechaGenerar").value = today;	
			//document.forms["solicitar"]["fechaSolicitar"].value=today2;
			//document.forms["solicitar"]["fechaSolicitar"].max=today2;
		}	
	}	
function validarModalVacioFactura(){
		var fecha = document.forms["facturacion"]["fechaGenerar"].value;
		var folio = document.forms["facturacion"]["folioGenerar"].value;
		var importe = document.forms["facturacion"]["importeGenerar"].value;
		var rfc = document.forms["facturacion"]["rfcGenerar"].value;
        var razonSocial = document.forms["facturacion"]["razonSocialGenerar"].value;
		var codigoPostal = document.forms["facturacion"]["codigoPostalGenerar"].value;
		var cfdi = document.forms["facturacion"]["CFDIGenerar"].value;
		var fPago = document.forms["facturacion"]["fPagoGenerar"].value;
		var regimenF = document.forms["facturacion"]["regimenGenerar"].value;
        var email = document.forms["facturacion"]["emailGenerar"].value;

		if (folio==''||fecha=='' || importe=='' || rfc=='' || razonSocial=='' || cfdi=='' || fPago=='' || email=='' || codigoPostal=='' || regimenF==''){
	/*Genera una alerta cuando algún campo del formulario de generar factura está vacio*/	
			$("#responseFactura").animate({
        		height: '+=72px'
    		}, 300);
  
  			$('<div class="alert alert-danger">' +
    		'<b>Alerta!</b> Aseg&uacute;rese de que los campos est&eacute;n llenos e intente de nuevo.</div>').hide().appendTo('#responseFactura').fadeIn(1000);
  
 			$(".alert").delay(3000).fadeOut(
  			"normal",
  			function(){
    			$(this).remove();
  			});
  			$("#responseFactura").delay(4000).animate({
        		height: '-=72px'
    		}, 300);
			return false;
			}else{
				alert("Presione aceptar y recibirá su factura en su correo en un lapso de 24hrs.");
				return;
			}
}
/*function validarModalVacioSolicitarFactura(){
		var fecha = document.forms["solicitar"]["fechaSolicitar"].value;
		var folio = document.forms["solicitar"]["folioSolicitar"].value;
		var serie = document.forms["solicitar"]["serieSolicitar"].value;
        var email = document.forms["solicitar"]["emailSolicitar"].value;
         var rfc  = document.forms["solicitar"]["rfcSolicitar"].value;

		if (fecha=='' || folio=='' || serie=='' || email=='' || rfc==''){
Genera una alerta cuando algún campo del formulario de solicitar factura está vacio	
			$("#responseSolicitarFactura").animate({
        		height: '+=72px'
    		}, 300);
  
  			$('<div class="alert alert-danger">' +
    		'<b>Alerta!</b> Aseg&uacute;rese de que los campos est&eacute;n llenos e intente de nuevo.</div>').hide().appendTo('#responseSolicitarFactura').fadeIn(1000);
  
 			$(".alert").delay(3000).fadeOut(
  			"normal",
  			function(){
    			$(this).remove();
  			});
  			$("#responseSolicitarFactura").delay(4000).animate({
        		height: '-=72px'
    		}, 300);
			return false;
			}else{
				alert("Presione aceptar y recibirá su factura en su correo en un lapso de 24hrs.");
			}	
}*/
function ayuda(){
			document.getElementById('folioGenerar').value="";
			document.getElementById('folioGenerar').disabled=false;
/*Genera una alerta cuando se presiona el boton de ayuda*/	
			$("#responseAyuda").animate({
        		height: '+=72px'
    		}, 300);
  
  			$('<div class="alert alert-warning text-center font-weight-bold">' +
    		'Puede encontrar su ID Web en la parte inferior de su ticket de compra.</div>').hide().appendTo('#responseAyuda').fadeIn(1000);
  
 			$(".alert").delay(3000).fadeOut(
  			"normal",
  			function(){
    			$(this).remove();
  			});
  			$("#responseAyuda").delay(4000).animate({
        		height: '-=72px'
    		}, 300);
/*Todos los campos se deshabilitan, sus valores vuelven a estar vacios y el folio deja de ser readonly*/		
	document.getElementById("folioGenerar").readOnly=false;
	document.getElementById("importeGenerar").value="";
	document.getElementById("rfcGenerar").readOnly=true;
	document.getElementById("rfcGenerar").value="";
	document.getElementById("razonSocialGenerar").readOnly=true;
	document.getElementById("razonSocialGenerar").value="";
	document.getElementById("direccionGenerar").readOnly=true;
	document.getElementById("direccionGenerar").value="";
	document.getElementById("exteriorGenerar").readOnly=true;
	document.getElementById("exteriorGenerar").value="";
	document.getElementById("interiorGenerar").readOnly=true;
	document.getElementById("interiorGenerar").value="";
	document.getElementById("codigoPostalGenerar").readOnly=true;
	document.getElementById("codigoPostalGenerar").value="";
	document.getElementById("ciudadGenerar").readOnly=true;
	document.getElementById("ciudadGenerar").value="";
	document.getElementById("estadoGenerar").readOnly=true;
	document.getElementById("estadoGenerar").value="";
	document.getElementById("municipioGenerar").readOnly=true;
	document.getElementById("municipioGenerar").value="";
	document.getElementById("coloniaGenerar").readOnly=true;
	document.getElementById("coloniaGenerar").value="";
	document.getElementById("CFDIGenerar").disabled=true;
	document.getElementById("CFDIGenerar").value="";
	document.getElementById("fPagoGenerar").disabled=true;
	document.getElementById("fPagoGenerar").value="";
	document.getElementById("emailGenerar").readOnly=true;
	document.getElementById("emailGenerar").value="";
	return false;	
}
function Folio(folioGenerar) {
/*Se guardan los datos que tiene el importe y el folio*/
     var parametros = {"folioGenerar":folioGenerar};
$.ajax({
/*Se llama a "procesoAjax.php" y se mandan los datos guardados en la variable parametros*/
    data:parametros,
    url:'procesoAjax.php',
    type: 'post',
    beforeSend: function () {
        $("#importeGenerar").html("Procesando, espere por favor");
    },
    success: function (response) {   
        $("#importeGenerar").html(response);
    }
});
return true;
}
function actualizarImporte(importe){
/*Se actualiza el valor del importe(esta función la llama la pagina "procesoAjax.php"), habilita todos los campo a exepción del campo folio, que pasa a ser readonly(disabled no, ya que no podría tener ningún valor)*/
	document.getElementById("importeGenerar").value=importe;
	document.getElementById("folioGenerar").readOnly=true;
	document.getElementById("rfcGenerar").readOnly=false;
	document.getElementById("razonSocialGenerar").readOnly=false;
	document.getElementById("codigoPostalGenerar").readOnly=false;
	document.getElementById("CFDIGenerar").disabled=false;
	document.getElementById("fPagoGenerar").disabled=false;
	document.getElementById("regimenGenerar").disabled=false;
	document.getElementById("emailGenerar").readOnly=false;
	document.getElementById("btnEnviar").disabled=false;
	document.getElementById("buscarGenerar").disabled=true;
	document.getElementById("btnAyuda").disabled=true;
}
//auto cargar modal
$(window).on('load',function(){
  $('#modalFactura').modal('show');
});

function newConsult(){
	document.getElementById("facturacion").reset();
	obtenerFecha();
	document.getElementById("folioGenerar").readOnly=false;
	document.getElementById("rfcGenerar").readOnly=true;
	document.getElementById("razonSocialGenerar").readOnly=true;
	document.getElementById("codigoPostalGenerar").readOnly=true;
	document.getElementById("CFDIGenerar").disabled=true;
	document.getElementById("fPagoGenerar").disabled=true;
	document.getElementById("regimenGenerar").disabled=true;
	document.getElementById("emailGenerar").readOnly=true;
	document.getElementById("btnEnviar").disabled=true;
	document.getElementById("buscarGenerar").disabled=false;
	document.getElementById("btnAyuda").disabled=false;
}