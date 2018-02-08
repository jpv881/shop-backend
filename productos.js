(function(){


var productos;

    $.ajax({
		async:false,
        url: "returnproductsjson.php",
        data: {


        },
        type: "GET",
        dataType: "json",

        success: function (data) {
            productos = data;



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
    
    var app = angular.module('store', []);
        app.controller('StoreController', function () {
        this.products = productos;

    });


})();
