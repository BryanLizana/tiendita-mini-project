$(document).ready(function () {
 
    $(".more_producto").click(function (e) { 
        e.preventDefault();

          var url = $("#module_web_url").val();

         $.ajax({
            type: "POST",
            url:  url + "files/cant_pro/",
            data:{more_one_producto:$(this).data('proid')},
            dataType: "JSON",
            success: function (response) {

                add_response(response);
            }        
            
            }).fail( function(e) {

                // alert( 'Error!!' );
                console.log(e);
            });
    });

    $(".less_producto").click(function (e) { 
        e.preventDefault();
        var url = $("#module_web_url").val();
         $.ajax({
            type: "POST",
            url:  url + "files/cant_pro/",
            data:{less_one_producto:$(this).data('proid')},
            dataType: "JSON",
            success: function (response) {
                add_response(response);
            }       
            
            }).fail( function(e) {

                // alert( 'Error!!' );
                console.log(e);
            });
    });


    function add_response(response) {
            if (typeof response.pro_id == 'undefined') {
                    response = {pro_id:0,detail:0};                    
            }else{

                // console.log(response);
                var pro_id = response.pro_id;
                // $("[id=price_pro_"+pro_id+"]").html(  )
                var total_cant_price = Number(response.detail.price * response.detail.cant );
                $("[id=price_total_show"+pro_id+"]").html( "$"+ total_cant_price.toFixed(2)  );
                $("[id=total_compra_"+pro_id+"]").val(total_cant_price.toFixed(2));                
                $("[id=price_pro_"+pro_id+"]").html("$" +response.detail.price);
                $("[id=cant_pro_car_"+pro_id+"]").attr('placeholder',response.detail.cant  );               
            
            }       
            
            change_total();
    }


        function change_total() {
            var add = 0;
            $(".total_comp").each(function() {

            add += Number($(this).val());
            // console.log($.trim($(this).val(),"$"));
            //  console.log(add);
            });
            $("#price_total_all").text("$" + add.toFixed(2));

            $("#total_").val(add.toFixed(2) * 100 );
        }

});