<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: administrator.php');
}
    $sql = "select * from factura";
    $consulta = mysqli_query($conexion, $sql); ?>

	    <!DOCTYPE html>
    <html>

    <head>
        <script src="lib/sweetalert/sweetalert.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="lib/sweetalert/sweetalert.css">
        <meta charset="utf-8">
        <style>
            html,
            body {
                height: 100%;
            }
            
            body {
                padding-top: 50px;
            }
            
            .container-fluid {
                background-image: url('http://wallpoper.com/images/00/45/05/47/green-background-2_00450547.jpg');
                min-height: 100%;
            }
            

        </style>
    </head>

    <body>
        <?php
        include("menuusuarios.php");
        ?>

	<div class="container-fluid">
		<div class="row" id="divFacturas">
			<div class="col-md-6">
		<table class="table table-hover">
			<tr>
				<td>
				</td>
				<td>
					<h4>Nº Factura</h4>
				</td>
				<td>
					<h4>Fecha</h4>
				</td>
				<td>
					<h4>Cliente</h4>
				</td>
				<td>
					<h4>Total</h4>
				</td>
				<td>
					<h4>Iva</h4>
				</td>
				<td>
					<h4>Total Factura</h4>
				</td>
				<td>
					<h4></h4>
				</td>
			</tr>
			<?php

        while($fila = mysqli_fetch_array($consulta)){ ?>
				<tr>
					<td><a href="#"><span class="glyphicon glyphicon-eye-open" cod="<?php echo $fila['codigo'];?>"></span></a></td>
					<td>
						<?php echo $fila['codigo'];?>
					</td>
					<td>
						<?php echo $fila['fecha'];?>
					</td>
					<td>
						<?php 
						  $sqlCliente = "select * from cliente where codigo= ".$fila['cod_cliente'];
						$consultaCliente = mysqli_query($conexion, $sqlCliente);
						$filaCliente = mysqli_fetch_array($consultaCliente);
						echo $filaCliente['nombre'];
						?>
					</td>

					<td><?php echo $fila['total'];?></td>
					<td><?php echo $fila['iva'];?></td>
					<td><?php echo $fila['total_a_pagar'];?></td>
					<td><a href="crearPDF.php?cod=<?php echo $fila['codigo'];?>"><span class="glyphicon glyphicon-cloud-download"></a></td>
				</tr>


				<?php }
				?>
		</table>
		</div>
		</div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
                <script src="factura.js"></script>
    </body>

    </html>
