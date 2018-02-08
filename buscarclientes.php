<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: administrator.php');
      }
	$str = $_GET['str'];
	$sql = 'select * from cliente where cliente.nombre like "%'.$str.'%" or cliente.direccion like"%'.$str.'%" or cliente.telefono like"%'.$str.'%" or cliente.fechaalta like "%'.$str.'%"';
    $consulta = mysqli_query($conexion, $sql); ?>

	<div id="divCli">
		<div class="col-md-10" id="divCuerpo">
			<table class="table table-hover">
				<tr>
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
						<td><strong><?php echo $fila['nombre'];?></strong></td>
						<td><strong><?php echo $fila['direccion'];?></strong></td>
						<td><strong><?php echo $fila['telefono'];?></strong></td>
						<td><strong><?php echo $newDate;?></strong></td>
					</tr>


					<?php }
?>
			</table>
		</div>
