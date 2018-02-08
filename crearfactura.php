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
            #btnCrearFactura {
                float:right;
            }
        </style>
    </head>

    <body>
        <?php
        include("menuusuarios.php");
    ?>
            <div class="container-fluid">
                <h1>Crear Factura</h1>
                <hr>
                <div class="row">
                    <div class="col-md-6" id="cont1">
                        <nav class="navbar navbar-default">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#">Datos Factura</a>
                            </div>
                            <div>
                                <ul class="nav navbar-nav">
                                    <li><a id="seleccionarCliente" href="#">Seleccionar Cliente</a></li>
                                    <li><a id="seleccionarProducto" href="#">Seleccionar Producto</a></li>
                                </ul>
                            </div>
                        </nav>
                        <h4 id="h4Cliente">Cliente:</h4>
                        <hr>
                        <h4 id="h4Productos">Productos:</h4>
                        <table id="tablaProductos" class="table table-hover">
                        </table>
                        <table class="table table-hover">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h4>Total</h4>
                                </td>
                                <td><span id="spanTotal">0.00€</span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h4>iva 21%</h4></td>
                                <td><span id="spanIva">0.00€</span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h4>Total Factura</h4></td>
                                <td><span id="spanTotalFactura">0.00€</span></td>
                            </tr>
                        </table>
                        <button class="btn btn-info" id="btnCrearFactura">Crear Factura</button>
                    </div>
                    <div id="cont2" class="col-md-6">
                    </div>
                </div>


            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script src="factura.js"></script>
    </body>

    </html>