	<?php
   include('conexion.php');
	$sql = "select * from tipo";
    $consulta = mysqli_query($conexion, $sql);
    $array = array();
$p = array();
    while($fila = mysqli_fetch_assoc($consulta)){ 
        //$array[]  = $fila['nombre'];
        //$producto = array("nombre"=>null,"precio"=>null,"ruta"=>null);
        //$array[]  = array("categoria"=>$fila['nombre'],"productos"=>array("nombre"=>null,"precio"=>null,"ruta"=>null));
        //$array[]  = array("categoria"=>$fila['nombre'],"productos"=>$productos);
        //$array[]  = array("categoria"=>$fila['nombre'],"producto"=>$producto);
        $sqlProductos = "select nombre,precio,rutaimagen from producto where tipo =".$fila['codigo'];	
        $consultaProductos = mysqli_query($conexion, $sqlProductos);

        while($filaProductos = mysqli_fetch_assoc($consultaProductos)){ 

            $producto[] = $filaProductos;
		} 
        
        $array[]  = array("categoria"=>$fila['nombre'],"producto"=>$producto);
		unset($producto);
	 } 
    
    $json = json_encode($array,JSON_UNESCAPED_UNICODE);
    echo $json;
?>