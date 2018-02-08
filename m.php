<?php
	session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<style>
		ul#menu {
			padding: 0;
		}

		ul#menu li {
			display: inline;
		}

		ul#menu li a {
			background-color: black;
			color: white;
			padding: 10px 20px;
			text-decoration: none;
			border-radius: 4px 4px 4px 4px;
		}

		ul#menu li a:hover {
			background-color: orange;
    }

    .btnCerrar{
        float:right;

    }

    #nav{
			margin-right: 15px;
        }
	</style>
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
  </div>

  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div id="nav" class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ciclos <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="ciclos.php">Ver Ciclos</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="crearmodulo.php">Crear Módulo</a></li>
						<li><a href="crearcurso.php">Crear Curso</a></li>
						<li><a href="crearciclo.php">Crear Ciclo</a></li>

					</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Alumnos <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="alumnos.php">Ver Alumnos</a></li>
						<li><a href="alumnospdf2.php">Ver Alumnos PDF</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="crearalumno.php">Crear Alumno</a></li>


					</ul>
			</li>
	    <li><a  class="navbar-brand" href="profesores.php">Profesores</a></li>
			<li><a  class="navbar-brand" href="modulos.php">Módulos</a></li>
			<li><a  class="navbar-brand" href="matriculas.php">Matrículas</a></li>
	</ul>

        <form id="formMenu" method="POST" action="menu.php">
            <input  type="submit" class="btn btn-danger pull-right navbar-btn" value="Cerrar Sesión" name="cerrar">
        </form>
				<p class="navbar-text pull-right">Has iniciado sesión como <?php echo $_SESSION['user']; ?></p>
  </div>

</nav>


   <?php
      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['cerrar'])){
            session_destroy();
            unset ($_SESSION['user']);
            header('location:login.php');
    }
    }

    ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
