<?php
	session_start();
   include('conexion.php');

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
    

 
?>
<html>
<head>
</head>
<body>
<div class="col-md-12" style="border:solid; margin-top:20px">
	<div class="row" style="padding-top:20px">
		<div class="col-md-4">
			<div class="thumbnail"  style="max-width: 100px; margin-left:20px">
				<img src="img/botin2.jpg">
			</div>
		</div>
		<div class="col-md-4">

			<p><strong>Zapatos Online</strong></p>
			<p>Calle Mayor-55<br>Aldaia<br>Telf: 55555555</p>
			
		</div>
		<div class="col-md-4">
			<p>Factura Nº: <strong><?php echo $fila['codigo']; ?></strong></p>
			<p>Fecha: <strong><?php echo $fila['fecha']; ?></strong></p>		
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12">
			<p>Cliente: <strong><?php echo $filaCliente['nombre']; ?></strong><br>
			Dirección: <strong><?php echo $filaCliente['direccion']; ?></strong><br>
			Teléfono: <strong><?php echo $filaCliente['telefono']; ?></strong></p>
		</div>
	</div>
	<table class="table table-hover" style="border:solid">
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
			</tr>
			<?php 
				while($filaDetalle = mysqli_fetch_array($consultaDetalle)){ 
					$sqlProducto = "select * from producto where codigo = ".$filaDetalle['cod_producto'];
					$consultaProducto = mysqli_query($conexion, $sqlProducto);
					$filaProducto = mysqli_fetch_array($consultaProducto);?>
				<tr>
					<td><p><?php echo $filaProducto['nombre']; ?></p></td>
					<td><p><?php echo $filaDetalle['precio']; ?>€</p></td>
					<td><p><?php echo $filaDetalle['cantidad']; ?></p></td>
					<td><p><?php echo $filaDetalle['subtotal']; ?>€</p></td>
				</tr>
			<?php }
			?>

			</table>
			<div class="row">
				<div class="col-md-8"></div>
				<div class="col-md-4">
					<p>Total: <strong><?php echo $fila['total']; ?>€</strong></p>
					<p>Total IVA: <strong><?php echo $fila['iva']; ?>€</strong></p>
					<p>Total factura: <strong><?php echo $fila['total_a_pagar']; ?>€</strong></p>
				</div>
			</div>
			
</div>
</body>
</html>
