<?php
	session_start();
   include('conexion.php');

      if($_SESSION['user'] == null){
       header('Location: login.php');
}
    $sql = "select * from cliente";
    $consulta = mysqli_query($conexion, $sql); ?>

           <h1>Crear Clientes</h1>
           <hr>
           
            <form role="form" class="col-md-6">
                <div class="form-group">
                  <label>Nombre</label>
                  <input id="inNombre" type="text" class="form-control" required name="nombre">
                </div>
                <div class="form-group">
                  <label>Dirección</label>
                  <input id="inDireccion" type="text" class="form-control"  required name="direccion">
                </div>
                <div class="form-group">
                  <label>Teléfono</label>
                 <input id="inTelefono" type="text" class="form-control"  required name="telefono">
                </div>
                <button id="btnCrearCliente" class="btn btn-warning">Crear Cliente</button>
          </form>