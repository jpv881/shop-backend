<?php
	session_start();
?>
<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<style>

		</style>
	</head>

	<body>
		<?php
include('conexion.php');
?>

			<div class="container" style="margin-top:10%">
				<div class="col-md-4">
					<center><img src="img/login.png"></center>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
  				<div class="panel-body">
					<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
						<div class="form-group">
							<label>Usuario</label>
							<input type="text" class="form-control" name="nombre" required>
						</div>
						<br>
						<div class="form-group">
							<label>Contraseña</label>
							<input class="form-control" type="password" name="pass" required>
						</div>
						<div class="form-group">
							<!--<small><a href="registrousuario.php">Nuevo Usuario</a></small>-->
						</div>
						<br>
						<input class="btn btn-success" type="submit" value="Acceder" name="sub">
					</form>
				</div>
			</div>
					<?php
						if($_SERVER['REQUEST_METHOD']=='POST'){
							$sql = "select * from usuarios where nombre = '".$_POST['nombre']."' and pass = '".md5($_POST['pass'])."'";
                            
							$consulta = mysqli_query($conexion, $sql);
							$fila = mysqli_fetch_array($consulta);

							if(sizeof($fila) > 0){
								header("Location: main.php");
                                echo $fila['nombre'];
                                $_SESSION['user'] = $fila['nombre'];
							}else{?>
								<strong style="color:red" >Datos incorrectos</strong>
							<?php }
						}

						?>
				</div>
				<div class="col-md-4">
				</div>
			</div>
	</body>

	</html>
