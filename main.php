<?php
	session_start();
   include('conexion.php');

   if(is_null($_SESSION['user'])){
       header('Location: administrator.php');
       }
?>

	<!DOCTYPE html>
	<html>

	<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="lib/sweetalert/sweetalert.css">
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

		</style>
	</head>

	<body>
        <?php
        include("menuusuarios.php");
    ?>
		<div class="container-fluid">

		<center><div class="thumbnail">
			<img id ="im" src="img/shop.jpg"></img>
		</div></center>

		</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="lib/sweetalert/sweetalert.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <script src="file.js"></script>
	</body>

	</html>
