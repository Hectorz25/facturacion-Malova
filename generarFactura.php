<?php
/*recibo el valor del folio ingresado*/
if (isset($_POST['folioGenerar'])){
$folio=$_POST['folioGenerar'];
/*Busco que letra tiene an la 1ra posición y asigno el nombre de la base de datos dependiendo de la letra ingresada*/
if($folio[0]==='F'){$db_name='matriz';$db_host = "177.244.28.110"; $db_user = "malova";}
if($folio[0]==='P'){$db_name='prieto';$db_host = "177.244.28.90"; $db_user = "prieto";}
if($folio[0]==='B'){$db_name='batiz';$db_host = "177.244.28.106"; $db_user = "batiz";}
if($folio[0]==='Y'){$db_name='yarda';$db_host = "177.244.28.86"; $db_user = "yarda";}
if($folio[0]==='O'){$db_name='obregon';$db_host = "177.244.28.98"; $db_user = "obregon";}
if($folio[0]==='T'){$db_name='centenario';$db_host = "177.244.28.102"; $db_user = "centenario";}
if($folio[0]==='M'){$db_name='madero';$db_host = "177.244.28.54"; $db_user = "madero";}
if($folio[0]==='E'){$db_name='bombas';$db_host = "177.244.28.110"; $db_user = "malova";}
if($folio[0]==='I'){$db_name='internet';$db_host = "177.244.28.110"; $db_user = "malova";}
if($folio[0]==='N'){$db_name='noviembre';$db_host = "201.165.54.82"; $db_user = "noviembre";}
if($folio==''){echo("<script>alert('Revise que el ID Web esté escrito correctamente');</script>");}

$db_pass = 'Malovin#8506P44$';      // MySQL Password
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
	die("No se pudo conectar a la base de datos: " . $conn->connect_error);
}else{	
	//Recuperar Variables del formulario
	$fecha=$_POST['fechaGenerar'];
	$importe=$_POST['importeGenerar'];
	$folio=$_POST['folioGenerar'];
	$rfc=$_POST['rfcGenerar'];
	$razonSocial=$_POST['razonSocialGenerar'];
	$codigoPostal=$_POST['codigoPostalGenerar']; 	//Opcional
	$CFDI=$_POST['CFDIGenerar'];
	$fPago=$_POST['fPagoGenerar'];
	$email=$_POST['emailGenerar'];
	$regimen=$_POST['regimenGenerar'];
	/*Si el numero exterior está vacio, se le da el valor de "sin numero"*/
	
	$sql = "INSERT INTO general_factura_online 
	(fecha,importe,folio,rfc,razonSocial,direccion,exterior,interior,codigoPostal,ciudad,estado,municipio,colonia,CFDI,fPago,regimen,email,sucursal) VALUES 
	('$fecha',$importe,'$folio','$rfc','$razonSocial','',,'',$codigoPostal,'','','','','$CFDI','$fPago','$regimen','$email','$folio[0]');";	

	/*Se regresa a la pagina anterior*/	
	if (mysqli_query($conn, $sql)) {
		header("Location:https://ferreteriamalova.com.mx/facturacion");		
    }else{
        echo ('Error: ' . $sql . '' . mysqli_error($conn));
		header("Location:https://ferreteriamalova.com.mx/facturacion");
    }
	/*Se termina la conexión*/
    $conn->close();	
	}
}else{
	echo("<script>alert('Hubo un problema, por favor intente de nuevo.');</script>");
}		
?>
	
	