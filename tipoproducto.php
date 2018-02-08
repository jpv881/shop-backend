<?php
	session_start();
   include('conexion.php');
	 $date = date("d-m-Y");

      if($_SESSION['user'] == null){
       header('Location: administrator.php');
} ?>

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
			.thumbnail{
				width:200px;	
			}
		</style>
	</head>

	<body>
		<?php
        include("menuusuarios.php");
    ?>
			<div class="container-fluid">
				<h1>Añadir Tipo De Producto</h1>
				<hr>
				<div class="col-md-8">
					<form role="form" class="col-md-6" method="POST">
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" class="form-control" required name="nombre">
						</div>
						<div class="form-group">
							<label>Descripción</label>
							<textarea class="form-control" name="descripcion" rows="3" name="descripcion"></textarea>
						</div>
						<button type="submit" class="btn btn-warning">Añadir Tipo</button>
					</form>
				</div>

				<?php
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$nombre = $_POST['nombre'];
				$descripcion = $_POST['descripcion'];

				 $sqlnombre = "select * from tipo where nombre = '".$nombre."'";
				 $consultanombre = mysqli_query($conexion, $sqlnombre);
				 $fila = mysqli_fetch_array($consultanombre);

			   if(sizeof($fila) >0){ ?>
	<script languaje="Javascript">
		swal("Error", "Ya existe un tipo de producto con ese nombre", "error");
	</script>
	<?php	}else{
				$sql = 'insert into tipo (nombre,descripcion) values ("'.$nombre.'","'.$descripcion.'")';
				$consulta = mysqli_query($conexion, $sql);
				mysqli_fetch_array($consulta);
					 ?>
		<script languaje="Javascript">
			swal({
				title: "Tipo creado",
				text: "",
				type: "success",
				showCancelButton: false,
				confirmButtonColor: "##86CCEB",
				confirmButtonText: "Aceptar",
				closeOnConfirm: false
			}, function () {
				window.location.href = 'http://www.javierperez.tk/servidor/tienda/crearproducto.php';
			});
		</script>
		<?php
					
				}
			}
    

?>

			</div>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
			<script src="file.js"></script>
	</body>

	</html>
