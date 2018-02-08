<?php
	session_start();
   include('conexion.php');
	 $date = date("d-m-Y");

      if($_SESSION['user'] == null){
       header('Location: administrator.php');
} 

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
				$sql = 'insert into tipos (nombre,descripcion) values ("'.$nombre.'","'.$descripcion.'")';
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
					header("Location: main.php");
				}



?>