<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: administrator.php');
      }
	$codCliente = intval($_GET['codCliente']);
    $total = floatval($_GET['total']);
    $iva = floatval($_GET['iva']);
    $totalFactura = floatval($_GET['totalFactura']);
    $year = date("Y");
    $num;

        $sqlFactura = "select factura.codigo from factura order by factura.codigo desc limit 1";
        $consultaFactura = mysqli_query($conexion, $sqlFactura); 
        $filaFactura = mysqli_fetch_array($consultaFactura);
        if(sizeof($filaFactura) >0){
             $num = $filaFactura['codigo'];
            $num++;
        }else{
            $num = 1;
        }

    $sql = 'insert into factura (codigo,fecha,cod_cliente,total,iva,total_a_pagar) values ('.$num.',"'.date("Y-m-d").'",'.$codCliente.','.$total.','.$iva.','.$totalFactura.')';
    $consulta = mysqli_query($conexion, $sql); 
    echo $num;


?>