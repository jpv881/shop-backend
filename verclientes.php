<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: login.php');
}
    $sql = "select * from cliente order by cliente.nombre";
    $consulta = mysqli_query($conexion, $sql); ?>

	<h1>Clientes</h1>
	<br>
	<div id="tablaCli" class="col-md-10" id="divCuerpo">
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
				<td>
					<h4>Editar</h4>
				</td>
				<td>
					<h4>Borrar</h4>
				</td>
			</tr>
			<?php

        while($fila = mysqli_fetch_array($consulta)){ ?>
				<tr>
					<td>
						<?php echo $fila['nombre'];?>
					</td>
					<td>
						<?php echo $fila['direccion'];?>
					</td>
					<td>
						<?php echo $fila['telefono'];?>
					</td>

					<td><span cod="<?php echo $fila['codigo'];?>" class="glyphicon glyphicon-pencil" style="color:black"></span></a>
					</td>
					<td><span cod="<?php echo $fila['codigo'];?>" class="glyphicon glyphicon-remove" style="color:red"></span></a>
					</td>
				</tr>


				<?php }
?>
		</table>
