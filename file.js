$(document.body).on("click","#menuVerClientes",function(){
		$(".pagination").show();
	});

$("#inputBusqueda").keyup(function(e){
	 var key = e.which;
	 console.log(key);
	if(key == 13){
		if($("#inputBusqueda").val().trim() == ""){
			swal("Error", "El campo búsqueda está vacío", "error");
		}else{
				      $.ajax({
            url: "buscarclientes.php",
            data: {
				str: $("#inputBusqueda").val().trim()

            },
            type: "GET",
            dataType: "html",

            success: function (data) {
				$(".pagination").hide();
			$("#divCli").remove();
            $(".container-fluid").append(data);

            },
            error: function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            },

            // Code to run regardless of success or failure
            complete: function (xhr, status) {
                //alert("The request is complete!");
            }

        });
		}
		
	} 
	});

function readURL(input) {
	console.log("loading");
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
		console.log(e.target.result.width);
      $('#im')
        .attr('src', e.target.result)
        .width(200);
        //.height(150);
    };
    reader.readAsDataURL(input.files[0]);
  }
}


//ver los clientes de la base de datos
/*$(document.body).on("click","#verClientes",function(){
    limpiarPantalla();

        $.ajax({
            url: "verclientes.php",
            data: {


            },
            type: "GET",
            dataType: "html",

            success: function (data) {
            $(".container-fluid").append(data);


            },
            error: function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            },

            // Code to run regardless of success or failure
            complete: function (xhr, status) {
                //alert("The request is complete!");
            }

        });
});*/

/*//crear clientes en la base de datos
$(document.body).on("click","#crearCliente",function(){
    limpiarPantalla();

        $.ajax({
            url: "formcrearclientes.php",
            data: {


            },
            type: "GET",
            dataType: "html",

            success: function (data) {
            $(".container-fluid").append(data);


            },
            error: function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            },

            // Code to run regardless of success or failure
            complete: function (xhr, status) {
                //alert("The request is complete!");
            }

        });
});*/

/*$(document.body).on("click","#btnCrearCliente",function(){
        $.ajax({
            url: "crearcliente.php",
            data: {
                nombre: $("#inNombre").val(),
                direccion: $("#inDireccion").val(),
                telefono: $("#inTelefono").val()

            },
            type: "GET",
            dataType: "json",

            success: function (data) {
				console.log(data.alert);


            if(data.error == "true"){
                swal("Error", "Ya existe un cliente con ese nombre", "error");
                 limpiarPantalla();
                $(".container-fluid").append(data.done);
            }else{
                swal("Éxito", "Cliente creado", "success");
                limpiarPantalla();
                $(".container-fluid").append(data.done);
            }

            },
            error: function (xhr, status, errorThrown) {
                alert("Sorry, there was a problem!");
                console.log("Error: " + errorThrown);
                console.log("Status: " + status);
                console.dir(xhr);
            },

            // Code to run regardless of success or failure
            complete: function (xhr, status) {
                //alert("The request is complete!");
            }

        });
});*/

function limpiarPantalla(){
    $(".container-fluid").children().remove();
};
