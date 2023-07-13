<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Factura</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="./Styles.css">
</head>
<body onload="obtenerFecha();">
<!--Modal de generar factura-->
	<div class="modal hide fade in modal-centered" id="modalFactura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<div class="row col justify-content-center">
					<h4 class="modal-title" id="myModalLabel">Generar Factura</h4>
				</div>			  
			</div>
			<div class="modal-body">	
				
		<!--Formulario de la factura (Cuerpo)-->				
			<form id="facturacion" name="facturacion" action="generarFactura.php" onsubmit="return validarModalVacioFactura();" method="post">
				<div class="row">
					<div class="form-group col-md-2">
						<label for="fechaGenerar" class="sr-only">Fecha:</label>
						<input class="form-control" name="fechaGenerar" id="fechaGenerar" type="text" readonly="true" placeholder="Fecha">
					</div>
		
					<div class="form-group col-md-3 col-md-offset-3">
						<label for="importeGenerar" class="sr-only">Importe:</label>
						<input class="form-control" name="importeGenerar" id="importeGenerar" type="number" step="0.0001" readonly="true" placeholder="Importe">
					</div>
					
					<div class="form-group input-group col-md-7 col-md-offset-7">
						<label for="folioGenerar" class="sr-only">ID Web:</label>						
						<input type="text" name="folioGenerar" id="folioGenerar" class="form-control" placeholder="ID Web" autocomplete="off" data-toggle="popover" data-trigger="focus" title="Puede encontrar el folio en la parte inferior en su ticket de compra"  onkeyup="javascript:this.value=this.value.toUpperCase();">
 	 					<div class="input-group-append">
							<!--Boton de ayuda-->
							<button class="btn btn-outline-secondary" type="button" id="btnAyuda" name="btnAyuda" data-toggle="popover" data-trigger="focus" title="Puede encontrar el folio en su ticket de compra" onClick="ayuda();">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-question-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.57 6.033H5.25C5.22 4.147 6.68 3.5 8.006 3.5c1.397 0 2.673.73 2.673 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.355H7.117l-.007-.463c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.901 0-1.358.603-1.358 1.384zm1.251 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
								</svg>
							</button>
							<!--Boton de buscar-->
							<button type="button" name="buscarGenerar" id="buscarGenerar" value="Buscar" onclick="buscarFolio();" class="btn btn-outline-secondary">Buscar</button>
  						</div>
					</div>							
				</div>
					<!--Donde apareserá el mensaje de ayuda al presionar el botón-->
					<div id="responseAyuda"></div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="rfcGenerar" class="sr-only">RFC:</label>
						<input class="form-control" name="rfcGenerar" id="rfcGenerar" type="text" placeholder="RFC" onkeyup="javascript:this.value=this.value.toUpperCase();" readOnly=true required>
					</div>

					<div class="form-group col-md-6">
						<label for="razonSocialGenerar" class="sr-only">Nombre o Razón Social:</label>
						<input class="form-control" name="razonSocialGenerar" id="razonSocialGenerar" type="text" placeholder="Nombre o Razón Social" readOnly=true required>
					</div>
				</div>		
			
				<div class="row">						
					<div class="form-group col-md-6">
						<label for="codigoPostalGenerar" class="sr-only">Código Postal:</label>
						<input class="form-control" name="codigoPostalGenerar" id="codigoPostalGenerar" type="number" placeholder="Código Postal" readOnly=true required>
					</div>
					<div class="form-group col-md-6">
						<label for="emailGenerar" class="sr-only">E-mail:</label>
						<input class="form-control" name="emailGenerar" id="emailGenerar" type="email" placeholder="E-mail" readOnly=true required>
					</div>
				</div>
			
				<div class="row">	
					<div class="form-group col-md-4">
						<label class="sr-only"	for="regimenGenerar">Regimen Fiscal:</label>
							<select class="form-control" id="regimenGenerar" name="regimenGenerar"  disabled=true required>
								<option selected disabled value="">Regimen Fiscal</option>
								<option value="601">General de Ley Personas Morales</option>
								<option value="612">Personas Fisicas con Actividades Empresariales y Profesionales</option>
								<option value="621">Incorporación Fiscal</option>
								<option value="626">Regimen Simplificado de Confianza</option>
								<option value="620">Sociedades Cooperativas de Producción que optan por diferis sus ingresos</option>
								<option value="622">Actividades Agricolas, Ganareras, Silvicolas y Pesqueras</option>
								<option value="606">Arrendamiento</option>
								<option value="605">Sueldos y Salarios e Ingresos Asimilados a Salarios</option>
								<option value="628">Hidrocarburos</option>
								<option value="623">Opcional para Grupos de Sociedades</option>
								<option value="611">Ingresos por Dividendos (Socios y Accionistas)</option>
								<option value="624">Coordinados</option>
								<option value="614">Ingresos por Intereses</option>
								<option value="616">Sin Obligaciones Fiscales</option>
								<option value="630">Enajenación de Acciones en Bolsas Verdes</option>
								<option value="615">Regimen de los Ingresos por Obtención de Premios</option>
								<option value="603">Personas Morales con Fines no Lucrativos</option>
								<option value="609">Consolidación</option>
								<option value="607">Regimen ded Enajenación o Adquisición de Bienes</option>
								<option value="610">Residentes en el Extranjero sin Establecimiento Permanten en México</option>
								<option value="608">Demas Ingresos</option>
								<option value="629">De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales</option>
								<option value="625">De las Actividades Empresariales con Ingresos a travez de Plataforma</option>
							</select>
					</div>												
					<div class="form-group col-md-4">
						<label class="sr-only"	for="CFDIGenerar">Uso del CFDI:</label>
							<select class="form-control" id="CFDIGenerar" name="CFDIGenerar"  disabled=true required>
								<option selected disabled value="">Uso del CFDI</option>
								<option value="gastos generales">G03 Gastos Generales</option>
								<option value="adquisicion mercancia">G01 Adquisición Mercancia</option>
								<option value="por definir">P01 Por Definir</option>
								<option value="construcciones">I01 Construcciones</option>
								<option value="otras maquina y equipos">I08 Otras Maquina y Equipos</option>
							</select>
					</div>
					
					<div class="form-group col-md-4">
						<label class="sr-only"	for="fPagoGenerar">Forma de Pago:</label>
							<select class="form-control" id="fPagoGenerar" name="fPagoGenerar"  disabled=true required>
								<option selected disabled value="">Forma de Pago</option>
								<option value="efectivo">Efectivo</option>
								<option value="debito">Tarjeta Debito</option>
								<option value="credito">Tarjeta Crédito</option>
								<option value="vales">Cheque</option>
								<option value="transferencia">Transferencia</option>
								<option value="no identificado">No indentificado</option>
							</select>
					</div>
				</div>
				<!--Donde aparecerá el mensaje de formulario incompleto-->
					<div id="responseFactura"></div>
				<!--Footer de la ventana -->
					<div class="form-group float-right">
						<button type="button" class="btn btn-danger" onclick="newConsult();">Cancelar</button>
						<button type="submit" class="btn btn-success" id="btnEnviar" disabled>Enviar</button>
					</div>				
				</form>
			</div>
		  </div>
		</div>
	  </div>
	
<!--Modal de solicitar factura 	
	<div class="modal fade" id="modalSolicitarFactura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<div class="col-md-1"></div>
				<div class="col-md-10">
				<center>
				<h4 class="modal-title" id="myModalLabel2">Solicitar Factura</h4>
				</center>
				</div>
				<div class="col-md-1">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Cerrar" onClick="javascript:window.history.back();"><span aria-hidden="true">&times;</span></button>
				</div>
			</div>
			<div class="modal-body">									
			<form name="solicitar" action="solicitarFactura.php" onsubmit="return validarModalVacioSolicitarFactura()" method="post">
				<div class="row">
					<div class="form-group col-md-4">
						<label for="fechaSolicitar" class="sr-only">Fecha:</label>
						<input class="form-control" name="fechaSolicitar" id="fechaSolicitar" type="date" placeholder="Fecha" min="2020-01-01">
					</div>
					
					<div class="form-group col-md-4">
						<label class="sr-only"	for="serieSolicitar">Serie de Factura:</label>
							<select class="form-control" id="serieSolicitar" name="serieSolicitar">
								<option selected value="">Serie de Factura</option>
								<option value="F">F-Flores</option>
								<option value="P">P-Prieto</option>
								<option value="B">B-Batiz</option>
								<option value="Y">Y-Yarda</option>
								<option value="O">O-Obregón</option>
								<option value="T">T-Centenario</option>
								<option value="N">N-20 Noviembre</option>
								<option value="E">E-Evans</option>
								<option value="I">I-Internet</option>
								<option value="C">C-Madero</option>
							</select>
					</div>
				
					<div class="form-group col-md-4">
						<label for="folioSolicitar" class="sr-only">ID Web:</label>						
						<input type="number" name="folioSolicitar" id="folioSolicitar" class="form-control" placeholder="ID Web" autocomplete="off" >
					</div>
					
				</div>
                
                <div class="row">
                    <div class="form-group col-md-6">
						<label for="rfcSolicitar" class="sr-only">RFC:</label>
						<input class="form-control" name="rfcSolicitar" id="rfcSolicitar" type="text" placeholder="RFC">
				    </div>
                    
				    <div class="form-group col-md-6">
						<label for="emailSolicitar" class="sr-only">E-mail:</label>
						<input class="form-control" name="emailSolicitar" id="emailSolicitar" type="email" placeholder="E-mail">
				    </div>
                </div>
					
				<div id="responseSolicitarFactura"></div>
					<div class="form-group float-right">
						<button type="button" class="btn btn-danger" data-dismiss="modal" onClick="javascript:window.history.back();" >Cancelar</button>
						<button type="submit" class="btn btn-success">Solicitar</button>
					</div>
					
				</form>
			</div>
		  </div>
		</div>
	  </div>
	  -->
<!-- JS, Popper.js, and jQuery-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>	
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>	
<!--Javascripts -->
<script type="text/javascript" src="./javascript.js"></script>
<script>
function buscarFolio(){
	Folio($('#folioGenerar').val());
}
</script>
</body>
</html>
