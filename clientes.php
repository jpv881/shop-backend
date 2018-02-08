<?php
	session_start();
   include('conexion.php');

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
  <link rel="stylesheet" type="text/css" href="lib/jqpagination/jqpagination.css">
	<meta charset="utf-8">
		<style>

		html, body {
    height: 100%;
		}
		.thumbnail{
			 width:25%;
			 margin-top: 15%;
    }

            body{
                padding-top:50px;
            }
						.container-fluid{
							background-image: url('http://wallpoper.com/images/00/45/05/47/green-background-2_00450547.jpg');
							min-height: 100%;
						}
            .pagination{
              position: absolute;
              bottom:10px;
              left:40%;
            }
            .form-group.has-feedback{
				position:absolute;
				top:70px;
				left:65%;
			}
			#btnBuscarCliente{
				position:absolute;
				top:70px;
				left:80%;
			}


		</style>
	</head>

	<body>
        <?php
        include("menuusuarios.php");
    ?>
		<div class="container-fluid">
		 <h1>Clientes</h1>
		 <div class="form-group has-feedback">
			<input type="text" id="inputBusqueda" class="form-control" placeholder="Buscar">
			<span class="glyphicon glyphicon-search form-control-feedback"></span>
		</div>	
		 <br>
        <div class="pagination">
        <a href="#" class="first" data-action="first">&laquo;</a>
        <a href="#" class="previous" data-action="previous">&lsaquo;</a>
        <input type="text" readonly="readonly" data-max-page="40" />
        <a href="#" class="next" data-action="next">&rsaquo;</a>
        <a href="#" class="last" data-action="last">&raquo;</a>
      </div>
		</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <script src="lib/jqpagination/jquery.jqpagination.js"></script>
 <script src="lib/jqpagination/jqpagination.js"></script>
 <script src="file.js"></script>
	</body>

	</html>
