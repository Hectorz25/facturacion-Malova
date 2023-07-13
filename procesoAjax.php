<?php
$clave = $_POST['folioGenerar'];
  if ($clave!=''){
	$importe = 0;
	//Conexion a la base de datos  
	$db_pass = 'Malovin#8506P44$';// MySQL CREDENTIALS    
	$length = strlen($clave);
	if($length>=4){
		if($clave[0]==='F'){$db_name='matriz';$db_host = "177.244.28.110"; $db_user = "malova";}
		if($clave[0]==='P'){$db_name='prieto';$db_host = "177.244.28.90"; $db_user = "prieto";}
		if($clave[0]==='B'){$db_name='batiz';$db_host = "177.244.28.106"; $db_user = "batiz";}
		if($clave[0]==='Y'){$db_name='yarda';$db_host = "177.244.28.86"; $db_user = "yarda";}
		if($clave[0]==='O'){$db_name='obregon';$db_host = "177.244.28.98"; $db_user = "obregon";}
		if($clave[0]==='T'){$db_name='centenario'; $db_host = "177.244.28.102"; $db_user = "centenario";}
		if($clave[0]==='M'){$db_name='madero';$db_host = "177.244.28.54"; $db_user = "madero";}
		if($clave[0]==='E'){$db_name='bombas';$db_host = "177.244.28.110"; $db_user = "malova";}
		if($clave[0]==='I'){$db_name='internet';$db_host = "177.244.28.110"; $db_user = "malova";}
		if($clave[0]==='N'){$db_name='noviembre';$db_host = "201.165.54.82"; $db_user = "noviembre";}
		if($clave==''){echo("<script>alert('Revise que el ID Web esté escrito correctamente');</script>");}
	}
		$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
		$conn->set_charset("utf8");
		if ($conn->connect_error) {
		die("No se pudo conectar a la base de datos: " . $conn->connect_error);
		}
	  	// Se guarda el valor del folio del formulario en una variable
	  	$inpText = $_POST['folioGenerar'];
		//	$sql = "SELECT gev_idweb,gev_importe,gev_iva,gev_imp_siva,gev_fecha FROM general_venta WHERE gev_idweb = '$inpText'"; 

		  $sql = "SELECT fa.fecha, fa.factura, x.codigo, x.cantidad, x.imp_mov, (x.imp_mov * (x.iva/100)) as iva from general_entsal AS fa
		  CROSS JOIN JSON_TABLE(fa.concepto, '$[*]' COLUMNS (
		  codigo VARCHAR(25) PATH '$.sku',	  	        	 
		  cantidad DECIMAL(12,2) PATH '$.cantidad',
		  imp_mov DECIMAL(12,2) PATH '$.imp_mov',
		  iva DECIMAL (12,2) PATH '$.iva'))
		  AS X WHERE idweb = '$inpText';";
		$result = $conn->query($sql);
		if($result->num_rows >= 1) {
			while ($row = $result->fetch_assoc()){	
					// Se declara una variable para guardar lo que habia en el resultado en el campo 'importe' y 'fechaGuardada' 
					$importe += floatval($row['imp_mov'])+floatval($row['iva']);
					$fechaGuardada = $row['fecha'];
					$anioActual = date('Y');
					$mesActual = date('m');
					$fechaActual = $anioActual.$mesActual;
					//Solo se deja los primeros 6 caracteres de la fecha para validad el año y el mes de la fecha actual y la fecha guardada del ticket
					$fechaResumida = substr($fechaGuardada,0,-2);
					//Se valida si el año y el mes son iguales para poder facturar
				}
				$importe = round($importe,2);
				if($fechaResumida===$fechaActual){
					echo ("<script>actualizarImporte($importe);</script>");	
					return;
				}else{
					echo("<script>alert('Ticket fuera del perido de facturación');</script>");	 
					return;
				}
		}else{
			// Si no hubo resultados, se manda una alerta
			echo("<script>alert('Revise que el ID Web esté escrito correctamente');</script>");	 			 			
			return;
		}
	}else{
		echo("<script>alert('ID Web incompleto, por favor revise e intente de nuevo');</script>");
		return;
	}
	return;
?>