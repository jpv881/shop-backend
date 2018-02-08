<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: administrator.php');
      }
	$str = $_GET['str'];
	//$sql = 'select * from cliente where cliente.nombre like "%'.$str.'%" or cliente.direccion like"%'.$str.'%" or cliente.telefono like"%'.$str.'%" or cliente.fechaalta like "%'.$str.'%"';
    $sql = "select * from producto where producto.activo order by producto.nombre";
    $consulta = mysqli_query($conexion, $sql); ?>

    <div id="divCli">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Productos</a>
            </div>
            <button id="btnBuscarProducto" class="btn btn-info" style="float:right; margin:9px"><span class="glyphicon glyphicon-search"></span></button>
            <input id="inputBuscarProducto" type="text" placeholder="Buscar" style="margin:12px;float:right">
        </nav>
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
            </tr>
            <?php

        while($fila = mysqli_fetch_array($consulta)){ 
            $sqltipo = "select nombre from tipo where codigo = ".$fila['tipo'];
			$consultatipo = mysqli_query($conexion, $sqltipo); 
			$filatipo = mysqli_fetch_array($consultatipo);
			?>
                <tr>
                    <td>
                        <a href="#"><span class="glyphicon glyphicon-hand-right" cod="<?php echo $fila['codigo'];?>" tipo="producto"></span></a>
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
                </tr>


                <?php }
?>
        </table>
    </div>