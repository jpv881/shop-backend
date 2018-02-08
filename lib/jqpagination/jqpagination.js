var num = null;
$(document).ready(function() {
	
	
	      $.ajax({
            url: "paginacionclientes.php",
            data: {
				page:1

            },
            type: "GET",
            dataType: "html",

            success: function (data) {
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

  $.ajax({
    url: "paginacion.php",
    data: {


    },
    type: "GET",
    dataType: "json",

    success: function(data) {
      num = data.num;
      console.log("num: " + num);

      $('.pagination').jqPagination({
        link_string: '/?page={page_number}',
        max_page: num,
        paged: function(page) {
			var p = page;
          //$('.log').prepend('<li>Requested page ' + page + '</li>');
                  $.ajax({
            url: "paginacionclientes.php",
            data: {
				page:p

            },
            type: "GET",
            dataType: "html",

            success: function (data) {
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
			//end
        }
      });
    },
    error: function(xhr, status, errorThrown) {
      alert("Sorry, there was a problem!");
      console.log("Error: " + errorThrown);
      console.log("Status: " + status);
      console.dir(xhr);
    },

    // Code to run regardless of success or failure
    complete: function(xhr, status) {
      //alert("The request is complete!");
    }

  });


});
