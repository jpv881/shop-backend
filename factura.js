var total = 0;
var totalFactura = 0;
var iva = 21;
var precio = 0;
var num;

$(document.body).on("click", "#seleccionarCliente", function () {
    $("#cont2").children().remove();
    $.ajax({
        url: "seleccionarcliente.php",
        data: {


        },
        type: "GET",
        dataType: "html",

        success: function (data) {
            $("#cont2").children().remove();
            $("#cont2").append(data);


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
});

$(document.body).on("click", "#btnBuscarCliente", function () {

    if ($("#inputBuscarCliente").val().trim() == "") {
        swal("Error", "El campo búsqueda está vacío", "error");
    } else {
        $.ajax({
            url: "buscarclientesfactura.php",
            data: {
                str: $("#inputBuscarCliente").val().trim()

            },
            type: "GET",
            dataType: "html",

            success: function (data) {
                $("#cont2").children().remove();
                $("#cont2").append(data);

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



});

$(document.body).on("click", "#btnBuscarProducto", function () {

    if ($("#inputBuscarProducto").val().trim() == "") {
        swal("Error", "El campo búsqueda está vacío", "error");
    } else {
        $.ajax({
            url: "buscarproductosfactura.php",
            data: {
                str: $("#inputBuscarProducto").val().trim()

            },
            type: "GET",
            dataType: "html",

            success: function (data) {
                $("#cont2").children().remove();
                $("#cont2").append(data);

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



});

$(document.body).on("click", ".glyphicon.glyphicon-hand-right", function () {
    //console.log($(this).parent().parent().siblings().eq(0).children().html());


    if ($(this).attr("tipo") == "cliente") {
        $("#h4Cliente").children().remove();
        $("#h4Cliente").append('<span id="spanNombre" cod="' + $(this).attr("cod") + '"> ' + $(this).parent().parent().siblings().eq(0).children().html() + '</span>');
        $("#cont2").children().remove();
    } else if ($(this).attr("tipo") == "producto") {
        //$("#h4Productos").append('<span><img src="'+$(this).parent().parent().parent().children().eq(1).children().attr("src")+'"></span><span></span><span></span>');
        $("#tablaProductos").append('<tr class="trProducto"></tr>');
        $('.trProducto').last().html($(this).parent().parent().parent().html());
        $('.trProducto').last().children().first().children().children().removeClass("glyphicon glyphicon-hand-right").addClass("glyphicon glyphicon-remove");
        $('.trProducto').last().children().first().children().children().css("color", "red");
        partes = $('.trProducto').last().children().eq(3).html().split("€");
        p = parseFloat(partes[0]);
        p *= 100;
        precio += p;
        iva = (precio / 100) * 21;
        $("#spanTotal").html((precio / 100).toFixed(2) + "€");
        $("#spanIva").html((iva / 100).toFixed(2) + "€");
        totalFactura = +precio / 100 + +(iva / 100).toFixed(2);
        $("#spanTotalFactura").html(totalFactura.toFixed(2) + "€");

    }

});

$(document.body).on("click", "#seleccionarProducto", function () {
    $("#cont2").children().remove();
    $.ajax({
        url: "seleccionarproducto.php",
        data: {


        },
        type: "GET",
        dataType: "html",

        success: function (data) {
            $("#cont2").children().remove();
            $("#cont2").append(data);

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
});

$(document.body).on("click", "#btnCrearFactura", function () {
    if ($("#h4Cliente").children().html() == undefined) {
        swal("Error", "No se ha seleccionado un cliente.", "error");
    } else if ($('.trProducto').length < 1) {
        swal("Error", "No hay productos seleccionados.", "error");
    } else {
        $.ajax({
            url: "guardarfactura.php",
            data: {
                codCliente: $("#spanNombre").attr("cod"),
                total: $("#spanTotal").html().split("€")[0],
                iva: $("#spanIva").html().split("€")[0],
                totalFactura: $("#spanTotalFactura").html().split("€")[0]

            },
            type: "GET",
            dataType: "html",

            success: function (data) {        
                //guardado del detalle de la factura 
                codigos = [];
				repeticiones = [];
				precios = [];
                tam = $(".trProducto").length;
                num = data; //numero de factura

                for (var i = 0; i < tam; i++) {
                    $(".trProducto")[i];
                    //console.log($($(".trProducto")[i]).children().eq(0).children().children().attr("cod"));
                    existe($($(".trProducto")[i]).children().eq(0).children().children().attr("cod"),parseFloat($($(".trProducto")[i]).children().eq(3).html().split("€")));
                }
                
                for(var k=0;k<codigos.length; k++){
						$.ajax({
						url: "guardardetalle.php",
						data: {
							codf:parseInt(num),
							codc: codigos[k],
							preciop: precios[k],
							cant: repeticiones[k],
							subtotal: precios[k] * 100 * repeticiones[k] / 100

						},
						type: "GET",
						dataType: "html",

						success: function (data) {
							$("#cont2").children().remove();
							$("#cont2").append(data);

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
                
                function existe(cod,p){
					console.log(p);
					enc = false;
					for(var j=0;j<codigos.length || j<1 && !enc;j++){
						if(cod == codigos[j]){
							enc = true;
							pos = j;						
						}
					}
					if(enc){
						repeticiones[pos]++;
					}else{
						repeticiones.push(1);
						codigos.push(cod);
						precios.push(p);
					}
				}

                $("#cont2").children().remove();
                $("#spanNombre").remove();
                $(".trProducto").remove();
                $("#spanTotal").html("0.00€");
                $("#spanIva").html("0.00€");
                $("#spanTotalFactura").html("0.00€");
                total = 0;
                totalFactura = 0;
                precio = 0;


                swal("", "Factura Creada", "success");

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
});

$(document.body).on("click", ".glyphicon.glyphicon-remove", function () {
    $(this).parent().parent().parent().remove();
    partes = $(this).parent().parent().parent().children().eq(3).html().split("€");
    p = parseFloat(partes[0]);
    p *= 100;
    precio -= p;
    iva = (precio / 100) * 21;
    $("#spanTotal").html((precio / 100).toFixed(2) + "€");
    $("#spanIva").html((iva / 100).toFixed(2) + "€");
    totalFactura = +precio / 100 + +(iva / 100).toFixed(2);
    $("#spanTotalFactura").html(totalFactura.toFixed(2) + "€");
});

$(document.body).on("click",".glyphicon.glyphicon-eye-open",function(){
	console.log($(this).attr("cod"));
	$("#divFacturas").append('<div id ="divFactura" class="col-md-6">');
	    $.ajax({
        url: "verdetallefactura.php",
        data: {
			cod: $(this).attr("cod")

        },
        type: "GET",
        dataType: "html",

        success: function (data) {
			$("#divFactura").children().remove();
            $("#divFactura").append(data);


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
	});
	

