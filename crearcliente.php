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
			
			.thumbnail {
				width: 25%;
				margin-top: 15%;
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
				<h1>Crear Clientes</h1>
				<hr>

				<form role="form" class="col-md-6" method="POST">
					<div class="form-group">
						<label>Nombre</label>
						<input id="inNombre" type="text" class="form-control" required name="nombre">
					</div>
					<div class="form-group">
						<label>Dirección</label>
						<input id="inDireccion" type="text" class="form-control" required name="direccion">
					</div>
					<div class="form-group">
						<label>Teléfono</label>
						<input id="inTelefono" type="text" class="form-control" required name="telefono">
					</div>
					<button id="btnCrearCliente" type="submit" class="btn btn-warning">Crear Cliente</button>
				</form>
				<?php
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$nombre = $_POST['nombre'];
				$direccion = $_POST['direccion'];
				$telefono = $_POST['telefono'];

				$sql1 = "select * from cliente where nombre = '".$nombre."'";

			   $consulta = mysqli_query($conexion, $sql1);
			   $fila = mysqli_fetch_array($consulta);

			   if(sizeof($fila) >0){ ?>
					<script languaje="Javascript">
						swal("Error", "Ya existe un cliente con ese nombre", "error");
					</script>
					<?php	}else{
				   //$newDate = date("d-m-Y", strtotime($fila['fechaalta']));
				   $date = date("d-m-Y");
				   $sql = "insert into cliente (nombre,direccion,telefono,fechaalta) values ('".$nombre."','".$direccion."','".$telefono."','".date('Y-m-d')."')";
					mysqli_query($conexion,$sql);
					mkdir("clientsfolder/".$nombre,0755);
					 ?>
						<script languaje="Javascript">
							swal({
								title: "Cliente creado",
								text: "",
								type: "success",
								showCancelButton: false,
								confirmButtonColor: "##86CCEB",
								confirmButtonText: "Aceptar",
								closeOnConfirm: false
							}, function () {
								window.location.href = 'main.php';
							});
						</script>
						<?php
					header("Location: main.php");
				}
			}
    

?>

			</div>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
			<script src="file.js"></script>
	</body>

	</html>
