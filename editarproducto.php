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
            
            .thumbnail {
                max-width: 500px;
            }
        </style>
    </head>

    <body>
        <?php
        include("menuusuarios.php");
        include("resize-class.php");

				 $sql = "select codigo,nombre from tipo";
				 $consulta = mysqli_query($conexion, $sql);	
                
                $codigo = $_GET['cod'];
                $sqlproducto = "select * from producto where codigo = ".$codigo;
                $consultaproducto = mysqli_query($conexion, $sqlproducto);	
                $filaproducto = mysqli_fetch_array($consultaproducto);
                $nombreproducto = $filaproducto['nombre'];
                $precioproducto = $filaproducto['precio'];
                $stockproducto = $filaproducto['stock'];
                $descripcionproducto = $filaproducto['descripcion'];
                $rutaimagenproducto = $filaproducto['rutaimagen'];
                $rutaimagenmini = $filaproducto['rutathumb'];
                $tipoproducto = $filaproducto['tipo'];
                $activo = $filaproducto['activo'];

    ?>
            <div class="container-fluid">
                <h1>Editar Producto</h1>
                <hr>
                <div class="col-md-6">
                    <form role="form" class="col-md-10" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" required name="nombre" value="<?php echo $nombreproducto; ?>">
                        </div>
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" class="form-control" name="imagen" onchange="readURL(this);">
                        </div>
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="number" class="form-control" required name="precio" step="0.01" value="<?php echo $precioproducto; ?>">
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number" class="form-control" required name="stock" value="<?php echo $stockproducto; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tipo</label> <a href="tipoproducto.php"><span class="glyphicon glyphicon-plus"></span></a>
                            <select class="form-control" name="tipo">
                                <?php
									while($fila = mysqli_fetch_array($consulta)){ ?>
                                    <option <?php if($fila[ 'codigo']==$tipoproducto) echo "selected"; ?> value="
                                        <?php echo $fila['codigo']?>">
                                            <?php echo $fila['nombre']?>

                                    </option>
                                    <?php }
								?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control" name="descripcion" rows="3" name="descripcion">
                                <?php echo $descripcionproducto; ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Activo
                                <input value = "1" type="checkbox" class="form-control" name="activo" <?php if($activo==1) echo "checked";?>></label>
                        </div>
                        <button type="submit" class="btn btn-warning">Editar Producto</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <br>
                    <div class="thumbnail">
                        <img id="im" src="<?php echo $rutaimagenproducto; ?>" alt="Producto seleccionado">
                    </div>
                </div>
                <?php
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$nombre = $_POST['nombre'];
				$precio = $_POST['precio'];
				$stock = $_POST['stock'];
				$tipo = $_POST['tipo'];
				$ruta = "productos/".$_FILES['imagen']['name'];
				$rutathumb = "thumbnails/".$_FILES['imagen']['name'];
				$descripcion = $_POST['descripcion'];
				$nomim = $_FILES['imagen']['name'];
                if($_POST['activo']== "1"){
                    $act = 1;
                }else{
                    $act = 0;
                }
                // si no se cambia la imagen del producto al editar
                if($ruta == "productos/"){
                    //$sql = "insert into producto (nombre, precio, stock,descripcion,tipo,activo) values ('".$nombre."',".$precio.",".$stock.",'".$descripcion."','".$tipo."',".$act.")";
                    $sql = "update producto set nombre ='".$nombre."', precio = ".$precio." ,stock = ".$stock." ,descripcion = '".$descripcion."', tipo = ".$tipo.", activo = ".$act." where codigo = ".$codigo;
					$consulta = mysqli_query($conexion, $sql);
					mysqli_fetch_array($consulta);
					?>
                    <script languaje="Javascript">
                        swal({
                            title: "Producto Editado",
                            text: "",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "##86CCEB",
                            confirmButtonText: "Aceptar",
                            closeOnConfirm: false
                        }, function () {
                            window.location.href = 'verproductos.php';
                        });
                    </script>
                    <?php
                    //si cambia la imagen del producto
                }else{
                    unlink($rutaimagenproducto);
                    unlink($rutaimagenmini);
                    if(file_exists("productos/".$_FILES['imagen']['name'])){ ?>
                        <script languaje="Javascript">
                           swal("Error", "Ya existe una imagen con ese nombre", "error");
                        </script>
                        <?php }else{
					move_uploaded_file($_FILES['imagen']['tmp_name'],
					"productos/".$_FILES['imagen']['name']);
					
					// *** 1) Initialize / load image
					$resizeObj = new resize("productos/".$nomim); //la imagen tiene que estar en el directorio de este script
					 
					// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
					$resizeObj -> resizeImage(75, 50, 'crop');
					 
					// *** 3) Save image
					$resizeObj -> saveImage('thumbnails/'.$_FILES['imagen']['name'], 100);
					
					//$sql = "insert into producto (nombre, precio, stock,descripcion,rutaimagen,rutathumb,tipo,activo) values 					 ('".$nombre."',".$precio.",".$stock.",'".$descripcion."','".$ruta."','".$rutathumb."','".$tipo."',".$activo.")";
                    $sqlupdate2 = "update producto set nombre ='".$nombre."', precio = ".$precio." ,stock = ".$stock." ,descripcion = '".$descripcion."', tipo = ".$tipo.", activo = ".$act." ,rutaimagen = '".$ruta."', rutathumb = '".$rutathumb."' where codigo = ".$codigo;
					$consultaupdate2 = mysqli_query($conexion, $sqlupdate2);
					mysqli_fetch_array($consultaupdate2);
					?>
                            <script languaje="Javascript">
                                swal({
                                    title: "Producto Editado",
                                    text: "",
                                    type: "success",
                                    showCancelButton: false,
                                    confirmButtonColor: "##86CCEB",
                                    confirmButtonText: "Aceptar",
                                    closeOnConfirm: false
                                }, function () {
                                    window.location.href = 'verproductos.php';
                                });
                            </script>
                            <?php
				  }
                }


			}
    
?>

            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script src="file.js"></script>
    </body>

    </html>