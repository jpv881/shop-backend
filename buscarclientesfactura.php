<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: administrator.php');
      }

	$str = $_GET['str'];
	$sql = 'select * from cliente where cliente.nombre like "%'.$str.'%" or cliente.direccion like"%'.$str.'%" or cliente.telefono like"%'.$str.'%"';
    $consulta = mysqli_query($conexion, $sql); ?>


    <div id="divCli">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Clientes</a>
            </div>
            <button id="btnBuscarCliente" class="btn btn-info" style="float:right; margin:9px"><span class="glyphicon glyphicon-search"></span></button>
            <input id ="inputBuscarCliente" type="text" placeholder="Buscar" style="margin:12px;float:right">
        </nav>
        <table class="table table-hover">
            <tr>
                <td></td>
                <td>
                    <h4>Nombre</h4>
                </td>
                <td>
                    <h4>Dirección</h4>
                </td>
                <td>
                    <h4>Teléfono</h4>
                </td>
                <td>
                    <h4>Fecha Alta</h4>
                </td>
            </tr>
            <?php

        while($fila = mysqli_fetch_array($consulta)){ 
			$newDate = date("d-m-Y", strtotime($fila['fechaalta']));
			?>
                <tr>
                    <td>
                        <a href="#"><span class="glyphicon glyphicon-hand-right"></span></a>
                    </td>
                    <td><strong><?php echo $fila['nombre'];?></strong></td>
                    <td><strong><?php echo $fila['direccion'];?></strong></td>
                    <td><strong><?php echo $fila['telefono'];?></strong></td>
                    <td><strong><?php echo $newDate;?></strong></td>
                </tr>


                <?php }
?>
        </table>
    </div>