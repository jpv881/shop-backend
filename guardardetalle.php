<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: administrator.php');
      }
      
    $codFactura = $_GET['codf']; 
	$codCliente = $_GET['codc'];
    $precio = $_GET['preciop'];
    $cantidad = $_GET['cant'];
    $subtotal = $_GET['subtotal'];

    $sql = 'insert into detalle_factura (cod_factura,cod_producto,precio,cantidad,subtotal) values ('.$codFactura.','.$codCliente.','.$precio.','.$cantidad.','.$subtotal.')';
    $consulta = mysqli_query($conexion, $sql); 
 
?>
