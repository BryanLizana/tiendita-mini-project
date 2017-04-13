$(document).ready(function () {

       cargar_list_cart();
    //       location.reload();
    // alert('hi');
        function add_response(response) {
                if (typeof response.count == 'undefined') {
                      response = {count:0,total:0};                    
                }
                // console.log(response);
                
                $(".id_items_list_car").html("[ "+ response.count +" ] Itemes in your cart");
      
                $(".total_cart_").html("$"+ response.total );
                // console.log(response);
        }

        function cargar_list_cart() {

            var url = $("#module_web_url").val();
            $.ajax({
            type: "POST",
            url: url+ "files/car_shop/",
            data:{list_car_number:"true"},
            dataType: "JSON",
            success: function (response) {

                add_response(response);
            }
        
            
            }).fail( function(e) {

                // alert( 'Error!!' );
                console.log(e);
            });

        }
   

    $(".add_to_car").click(function (e) { 
        e.preventDefault();
        //  console.log($( this ).data('prodetail'))
          var url = $("#module_web_url").val();

        $.ajax({
            type: "POST",
            url: url + "files/car_shop/",
            data: $( this ).data('prodetail'),
            dataType: "JSON",
            success: function (response) {
                add_response(response);
                  alert("Producto añadido¡¡");
            }
       
        
        }).fail( function(e) {

            // alert( 'Error!!' );
            console.log(e);
           });

    });
});