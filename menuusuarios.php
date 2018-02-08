<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        
        .btnCerrar {
            float: right;
        }
        
        #nav {
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
                    <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="clientes.php" id="menuVerClientes">Ver Clientes</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="crearcliente.php" id="crearCliente">Crear Cliente</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="verproductos.php">Ver Productos</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="crearproducto.php">Crear Producto</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Facturas <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="crearfactura.php">Crear Factura</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="verfacturas.php">Ver Facturas</a></li>
                    </ul>
                </li>
            </ul>

            <form id="formMenu" method="POST">
                <input type="submit" class="btn btn-danger pull-right navbar-btn" value="Cerrar Sesión" name="cerrar">
            </form>
            <p class="navbar-text pull-right">Has iniciado sesión como
                <?php echo $_SESSION['user']; ?>
            </p>
        </div>

    </nav>


    <?php
      if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['cerrar'])){
            session_destroy();
            unset ($_SESSION['user']);
            header('location:administrator.php');
    }
    }

    ?>


</body>

</html>
