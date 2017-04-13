$(document).ready(function () {
 

    $("#pay_visa").click(function (e) { 

        // alert($("#total_").val());

            function culqi(Culqi) {

                if(Culqi.token) { // ¡Token creado exitosamente!
                    // Get the token ID:
                    var token = Culqi.token.id;
                    alert('Se ha creado un token:'.token);

                }else{ // ¡Hubo algún problema!
                    // Mostramos JSON de objeto error en consola
                    console.log(Culqi.error);
                    alert(Culqi.error.mensaje);
                }
            };



        e.preventDefault();
            // title = "Total ("+ title +" items )" ; 
            var total = $("#price_total_all").val();
            
           Culqi.publicKey = 'pk_test_cUYH78mAuLVvhrqU';
            Culqi.settings({
                title: "Pago de items",
                currency: 'USD',
                description: 'Total de items del carrito  <br>de compras actual',
                amount: $("#total_").val()
            });



        Culqi.open();
    });


});