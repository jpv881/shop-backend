<?php
	session_start();
   include('conexion.php');
	 require_once 'lib/pdf/dompdf_config.inc.php';
	 
      if($_SESSION['user'] == null){
       header('Location: administrator.php');
	}
	
	$sql = "select * from factura where codigo = ".$_GET['cod'];
    $consulta = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_array($consulta);
    
    $sqlCliente = "select * from cliente where codigo = ".$fila['cod_cliente'];
    $consultaCliente = mysqli_query($conexion, $sqlCliente);
    $filaCliente = mysqli_fetch_array($consultaCliente);
    
    $sqlDetalle= "select * from detalle_factura where cod_factura = ".$_GET['cod'];
    $consultaDetalle = mysqli_query($conexion, $sqlDetalle);
    
    $codigo = $fila['codigo'];
    $fecha = $fila['fecha'];
    $nombreCliente = $filaCliente['nombre'];
    $direccionCliente = $filaCliente['direccion'];
    $telefonoCliente = $filaCliente['telefono'];
    $total = $fila['total'];
    $iva = $fila['iva'];
    $total_a_pagar = $fila['total_a_pagar'];


 
$html =
'<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div " style="border:solid; margin-top:20px">
	<div " style="padding-top:20px">
	<table style="width:90%">
		<tr>
		<td>
		<div>
			<div class="thumbnail"  style="max-width: 100px; margin-left:20px">
				<img src="img/botin2.jpg">
			</div>
		</div>
		</td>

		<td>		
		<div>
			<p><strong>Zapatos Online</strong></p>
			<p>Dirección: Calle Mayor-55<br>Población: Aldaia<br>Telf: 55555555</p>		
		</div>
		</td>

		<td>		
		<div>
			<p>Factura Nº: <strong>'.$codigo.'</strong></p>
			<p>Fecha: <strong>'.$fecha.'</strong></p>	
		</div>
		</td>

			</tr>
			</table>

	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<p>Cliente: <strong>'.$nombreCliente.'</strong><br>
			Dirección: <strong>'.$direccionCliente.'</strong><br>
			Teléfono: <strong>'.$telefonoCliente.'</strong></p>
		</div>
	</div>
	<hr>
	<table align="center" class="table table-hover" style="width:90%">
			<tr>
				<td>
					<p><strong>NOMBRE</strong></p>
				</td>
				<td>
					<p><strong>PRECIO</strong></p>
				</td>
				<td>
					<p><strong>CANTIDAD</strong></p>
				</td>
				<td>
					<p><strong>SUBTOTAL</strong></p>
				</td>
			</tr>';
			
				while($filaDetalle = mysqli_fetch_array($consultaDetalle)){ 
					$sqlProducto = "select * from producto where codigo = ".$filaDetalle['cod_producto'];
					$consultaProducto = mysqli_query($conexion, $sqlProducto);
					$filaProducto = mysqli_fetch_array($consultaProducto);
					$nombre = $filaProducto['nombre'];
					$precio = $filaDetalle['precio'];
					$cantidad = $filaDetalle['cantidad'];
					$subtotal = $filaDetalle['subtotal'];
		$html.='<tr>
					<td><p>'.$nombre.'</p></td>
					<td><p>'.$precio.'€</p></td>
					<td><p>'.$cantidad.'</p></td>
					<td><p>'.$subtotal.'€</p></td>
				</tr>'; 
				}			

	$html.=	'</table>
	<hr>
			<div class="row">
				<div class="col-md-8"></div>
				<div class="col-md-4">
					<p>Total: <strong>'.$total.'€</strong></p>
					<p>Total IVA: <strong>'.$iva.'€</strong></p>
					<p>Total factura: <strong>'.$total_a_pagar.'€</strong></p>
				</div>
			</div>		
</div>
</body>
</html>';

$mipdf = new DOMPDF();
$mipdf ->set_paper("A4", "portrait");
$mipdf ->load_html(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
$mipdf ->render();
$mipdf ->stream('Factura '.$_GET['cod'].'.pdf');

?>
