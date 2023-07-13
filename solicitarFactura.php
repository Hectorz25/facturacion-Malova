<?php
/*recibo el valor del folio ingresado*/
	$serie=$_POST['serieSolicitar'];
	if($serie[0]==='F'){$db_name='matriz';$db_host = "177.244.28.110"; $db_user = "malova";}
	/*if($serie[0]==='P'){$db_name='prieto';$db_host = "177.244.28.90"; $db_user = "prieto";}
	if($serie[0]==='B'){$db_name='batiz';$db_host = "177.244.28.106"; $db_user = "batiz";}
	if($serie[0]==='Y'){$db_name='yarda';$db_host = "177.244.28.86"; $db_user = "yarda";}
	if($serie[0]==='O'){$db_name='obregon';$db_host = "177.244.28.98"; $db_user = "obregon";}
	if($serie[0]==='T')$db_name='centenario';{$db_host = "177.244.28.102"; $db_user = "centenario";}
	if($serie[0]==='M'){$db_name='madero';$db_host = "177.244.28.54"; $db_user = "madero";}
	if($serie[0]==='E'){$db_name='bombas';$db_host = "177.244.28.110"; $db_user = "malova";}
	if($serie[0]==='I'){$db_name='internet';$db_host = "177.244.28.110"; $db_user = "malova";}
	if($serie[0]==='N'){$db_name='noviembre';$db_host = "201.165.54.82"; $db_user = "noviembre";}*/
	if($serie==''){echo("<script>alert('No se encontró la serie de la Factura');</script>");}
	$db_pass = 'Malovin#8506P44$';      // MySQL Password
   	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

   	// Check connection
    if ($conn->connect_error) {
    die("No se pudo conectar a la base de datos: " . $conn->connect_error);
    }else{		
		//Recuperar Variables del formulario
		$fecha=$_POST['fechaSolicitar'];
		$serie=$_POST['serieSolicitar'];
		$folio=$_POST['folioSolicitar'];
		$email=$_POST['emailSolicitar'];
        $rfc=$_POST['rfcSolicitar'];
		$sql = "insert into solicitar_factura_online(fecha,serieFactura,folio,email,rfc) values ('$fecha','$serie','$folio','$email','$rfc');";	
/*Se regresa a la pagina anterior*/			
		if (mysqli_query($conn, $sql)) {
		echo("<script>console.log('Todo correcto!')</script>"); //BORRAR DESPUÉS
		//header("Location:https://tienda.malova.com.mx/");		
		}else{
        echo ('Error: ' . $sql . '' . mysqli_error($conn));
		echo("<script>console.log('Algo Salio Mal!')</script>"); //BORRAR DESPUÉS
		//header("Location:https://tienda.malova.com.mx/");
    	}
/*Se termina la conexión*/
    	$conn->close();	
	}
?>
	
	