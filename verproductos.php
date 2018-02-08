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

    $sql = "select * from  producto order by producto.tipo";
    $consulta = mysqli_query($conexion, $sql); 
		
		?>
            <div class="container-fluid">
                <h1>Productos</h1>
                <br>
                <div id="tablaCli" class="col-md-10" id="divCuerpo">
                    <table class="table table-hover">
                        <tr>
                            <td>
                            </td>
                            <td>
                                <h4>Imagen</h4>
                            </td>
                            <td>
                                <h4>Nombre</h4>
                            </td>
                            <td>
                                <h4>Precio</h4>
                            </td>
                            <td>
                                <h4>Stock</h4>
                            </td>
                            <td>
                                <h4>Descripción</h4>
                            </td>
                            <td>
                                <h4>Tipo</h4>
                            </td>
                            <td>
                                <h4>Activo</h4>
                            </td>
                        </tr>
                        <?php

        while($fila = mysqli_fetch_array($consulta)){ 
			$sqltipo = "select nombre from tipo where codigo = ".$fila['tipo'];
			$consultatipo = mysqli_query($conexion, $sqltipo); 
			$filatipo = mysqli_fetch_array($consultatipo);
            $cod = $fila['codigo'];
						?>
                            <tr>
                                <td>
                                    <a href="editarproducto.php?cod=<?php echo $cod; ?>"><span class="glyphicon glyphicon-pencil" style="color:brown"></span></a>
                                </td>
                                <td>
                                    <img src="<?php echo $fila['rutathumb'];?>">
                                </td>
                                <td>
                                    <?php echo $fila['nombre'];?>
                                </td>
                                <td>
                                    <?php echo $fila['precio']."€";?>
                                </td>
                                <td>
                                    <?php echo $fila['stock'];?>
                                </td>
                                <td>
                                    <?php echo $fila['descripcion'];?>
                                </td>
                                <td>
                                    <?php echo $filatipo['nombre'];?>
                                </td>
                                <td>
                                    <?php
                                        if($fila['activo']== 1){
                                            ?> <span class="glyphicon glyphicon-ok" style="color:green"></span> <?php
                                        }else{
                                             ?> <span class="glyphicon glyphicon-remove" style="color:red"></span> <?php
                                        }
                                    ?>
                                </td>
                            </tr>


                            <?php } ?>
                    </table>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>

    </html>