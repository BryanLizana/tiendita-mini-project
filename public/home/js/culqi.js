
var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9\+\/\=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/\r\n/g,"\n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}

var informacionURL;

var Culqi = {
    publicKey: "",
    singleCharge:"",
    useClasses: false,
    settings: function(venta) {

        var ventaCulqi = JSON.stringify(venta);
        
        try {

            // console.log("Config: " + venta.guardar);

        } catch (err) {
            
        }
        
        if(venta.imagen == "") {
            venta.imagen = "https://integ.culqi.com/LogoCulqi@2x.png"; 
            
        }

        if (venta.nombre == "") {
            venta.nombre = "Nombre del comercio";
        }

        if (venta.orden == "") {
            venta.orden = "Número de pedido";
        }

        if (venta.moneda == "") {
            venta.moneda = "PEN";
        }

        if (venta.monto == "") {
            venta.monto = "0";
        }

        if (venta.guardar == "") {
            Culqi.singleCharge = "sc";
        }

        if (venta.guardar == null) {
            Culqi.singleCharge = "sc";
        }
        
        if (venta.guardar == false) {

            Culqi.singleCharge = "sc";

        }

        if (venta.guardar == true) {

            Culqi.singleCharge = "mc";

        }

        //console.log(ventaCulqi);

        informacionURL = Base64.encode(ventaCulqi);

        Culqi.cargar();

    },
    cargar: function () {

        if (document.querySelector('.culqi_checkout') == null) {

            var product = "web";
            var url = "/api/v2/checkout/" + product + "/" + Culqi.singleCharge + "/" + Culqi.publicKey + "/" + informacionURL;
            iframe = document.createElement("IFRAME");

            iframe.setAttribute("src", "https://checkout.culqi.com" + url);

            iframe.setAttribute("id", "culqi_checkout_frame");
            iframe.setAttribute("name", "checkout_frame");
            iframe.setAttribute("class", "culqi_checkout");
            iframe.setAttribute("allowtransparency", "true");
            iframe.setAttribute("frameborder", "0");

            iframe.style.zIndex = 99999;
            iframe.style.display = "none";
            iframe.style.backgroundColor = "rgba(0,0,0,0)";
            iframe.style.border = "0px none trasparent";
            iframe.style.overflowX = "hidden";
            iframe.style.overflowY = "auto";
            iframe.style.margin = "0px";
            iframe.style.position = "fixed";
            iframe.style.visibility = "hidden";
            iframe.style.visibility = "collapse";
            iframe.style.left = "0px";
            iframe.style.top = "0px";
            iframe.style.width = "100%";
            iframe.style.height = "100%";
            iframe.style.backgroundPosition = "initial initial";
            iframe.style.backgroundRepeat = "initial initial";
            document.body.appendChild(iframe);

        } else {

            console.log("Ya existe un formulario, volviendo a cargar.");
            var element = document.getElementById("culqi_checkout_frame");
            if (element == null) {} else {
                element.parentNode.removeChild(element);
                Culqi.cargar()
            }

        }
    },
    open: function () {

        if (document.querySelector('.culqi_checkout') != null) {

            var culqiFrame = document.getElementById("culqi_checkout_frame");
            culqiFrame.style.visibility = "visible";
            culqiFrame.style.display = "block";

        }

    },
    init: function () {
        Culqi.settings({
            title: 'card_transport',
            currency: 'PEN',
            description: 'Polo/remera Culqi lover',
            amount: 100
        });
    },
    createToken: function() {

        if (Culqi.useClasses == false) {

            var obj = new Object();
            obj.email = document.getElementById("card[email]").value;
            obj.card_number  = document.getElementById("card[number]").value;
            obj.cvv = document.getElementById("card[cvv]").value;
            obj.expiration_year = document.getElementById("card[exp_year]").value;
            obj.expiration_month = document.getElementById("card[exp_month]").value;

            var jsonString= JSON.stringify(obj);

            var win = document.getElementById("culqi_checkout_frame").contentWindow;

            win.postMessage(jsonString, "*");

        } else if (Culqi.useClasses == true) {

            var email = document.getElementsByClassName("culqi-email");
            var card_number = document.getElementsByClassName("culqi-card");
            var cvv = document.getElementsByClassName("culqi-cvv");
            var expiration_year = document.getElementsByClassName("culqi-expy");
            var expiration_month = document.getElementsByClassName("culqi-expm");

            var obj = new Object();
            obj.email = email[0].value;
            obj.card_number  = card_number[0].value;
            obj.cvv = cvv[0].value;
            obj.expiration_year = expiration_year[0].value;
            obj.expiration_month = expiration_month[0].value;

            var jsonString= JSON.stringify(obj);

            var win = document.getElementById("culqi_checkout_frame").contentWindow;

            win.postMessage(jsonString, "*");
        }

    },
    close: function () {
        var element = document.getElementById("culqi_checkout_frame");
        if (element == null) {} else {
            element.parentNode.removeChild(element);
            Culqi.cargar()
        }
    }
};

document.onreadystatechange = function () {
    var state = document.readyState
    if (state == 'interactive') {

    } else if (state == 'complete') {

    }
}

function receiveMessage(event) {

    if (event.data == "checkout_cerrado") {

        // Culqi.respuesta = "checkout.Cerrado";
        // culqi(Culqi);

        Culqi.close();

    }  else {

        //console.log("Respuesta: " + event.data);

        try {

            var obj = event.data;

            // console.log( obj);

            //console.log("Objeto: " + Culqi.respuesta);

            if (obj["object"] == "token") {

                //complete pase

                ///need jquery
                

                console.log("La respuesta es un token.");             
                // Culqi.token = obj;                
                // Culqi.error = null;
                // console.log(Culqi.token);
                
                // Culqi.close();
                // culqi(Culqi); // si es un entornode producción 
                
           



            } else if (obj["object"] == "error") {


                ///error con la transacción
                console.log("La respuesta es un error.");

                Culqi.error = obj;
                
                Culqi.token = null;

                console.log(Culqi.error);

                Culqi.close();

                culqi(Culqi);

            }


              if (obj["object"] == "token") {
                var url = $("#module_web_url").val();
                $.ajax({
                    type: "POST",
                    url:  url + "home/thanks/",
                    data: {payment_status_card:"Completed",data:obj},
                    dataType: "JSON",
                    success: function (response) {
                        window.location.replace( url + "home/thanks/");
                    }
                }).fail( function(e) {

                    // alert( 'Error!!' );
                    console.log(e);
                });

            }
            console.log("Se completó el proceso de pago, respuesta enviada al comercio.");
        

        } catch(err) {

            console.log(err);

        }

    }
}
window.addEventListener("message", receiveMessage, false);