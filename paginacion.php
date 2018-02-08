<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: administrator.php');
       }
       $pags = 10;
       $sql = "select count(*) as num from cliente order by cliente.nombre";
       $consulta = mysqli_query($conexion, $sql);
       $fila = mysqli_fetch_array($consulta);
       $num = ceil($fila['num']/$pags);
       $answer['num'] = $num;
       echo json_encode($answer);

 ?>
