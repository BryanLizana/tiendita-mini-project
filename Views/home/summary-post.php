<?php 

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
    case 'clear_list_car':
        unset($_SESSION['list_car']);
        break;

    default:
           
        break;
    }     
} else {
    // $action_url = "https://www.paypal.com/cgi-bin/webscr?";
            $action_url = "https://www.sandbox.paypal.com/cgi-bin/webscr?";

            $post['cmd'] = "_cart";
            $post['upload'] = "1";
            $post['currency_code'] = "USD";
            $post['business'] = "juan_empresa@senati.com";
            $n = 1;
            if (isset($_SESSION['list_car'])) {
                # code...
                foreach ($_SESSION['list_car'] as $pro_id => $detail) {
                if ($detail['cant'] > 0) {
                    $post['item_name_'.$n] = $detail['name'];
                    $post['amount_'.$n] = $detail['price'];
                    $post['quantity_'.$n] = $detail['cant'];
                    
                $n++;
                }

            }
            }


            // $post['notify_url'] = ROOT_WEB.'home/thanks/';
            // $post['image_url'] = "http://2.bp.blogspot.com/-fZ_DGYozy8c/TVl4kRzphoI/AAAAAAAAAMU/Txa_dOkXnGA/s1600/Logotipo.png";
            $post['return'] = ROOT_WEB.'home/thanks/';
            $post['rm'] = "2";
            $post['cbt'] = "Regresar a Tiendita.com";
            $post['cancel_return'] = ROOT_WEB;


            //no redirect :(
            // // echo '<pre>'; var_dump( $post ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
            // $handle = curl_init($action_url);
            // curl_setopt($handle, CURLOPT_POST, true);
            // curl_setopt($handle, CURLOPT_POSTFIELDS, $post);
            // curl_setopt($handle, CURLOPT_FOLLOWLOCATION, true);

            // curl_exec($handle);
            ?> 
            <?php  if(isset($post['item_name_1']) &&  !empty($post['item_name_1'])):  ?>
            <form  method="POST" action="<?php echo $action_url ?>" id="dateForm">
                <?php foreach ($post as $key => $val): ?>
                    <input type="hidden" name="<?php echo $key ?>" value="<?php echo $val ?>">
                <?php endforeach ?>
                </form>

                <script type="text/javascript">
                    document.getElementById('dateForm').submit(); // SUBMIT FORM
                </script>
            <?php  endif;  ?>   

            <?php 
}

/*-------------Seccion : code fails--------------------*/ 
/*
    case 'visa_Card':
        // Store request params in an array
                   $action_url = "https://www.paypal.com/cgi-bin/webscr?";
            $action_url = "https://api-3t.sandbox.paypal.com/nvp/";

//             curl https://api-3t.sandbox.paypal.com/nvp \
//   -s \
//   --insecure \
//   -d USER=YourUserID \
//   -d PWD=YourPassword \
//   -d SIGNATURE=YourSignature \
//   -d METHOD=SetExpressCheckout \
//   -d VERSION=98 \
//   -d PAYMENTREQUEST_0_AMT=10 \
//   -d PAYMENTREQUEST_0_CURRENCYCODE=USD \
//   -d PAYMENTREQUEST_0_PAYMENTACTION=SALE \
//   -d cancelUrl=http://www.example.com/cancel.html \
//   -d returnUrl=http://www.example.com/success.html

                    // 'METHOD' => 'DoDirectPayment', 
                    // 'VERSION' => '53.0', 
                    
                    // 'USER' => 'juan_empresa_api1.senati.com', 
                    // 'PWD' => 'SSNJJRSQWNHQNX7M', 
                    // 'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31A98EJxTuFcxWjTkiBYJNpu98ctfQ', 
                    // 'PAYMENTREQUEST_n_PAYMENTACTION' => 'Sale',                   
                    // 'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
                    // 'CREDITCARDTYPE' => 'visa', 
                    // 'ACCT' => '4032030209311381',                        
                    // 'EXPDATE' => '042022',           
                    // 'CVV2' => '123', 
                    // 'FIRSTNAME' => 'Tester', 
                    // 'LASTNAME' => 'Testerson', 
                    // 'STREET' => '707 W. Bay Drive', 
                    // 'CITY' => 'Largo', 
                    // 'STATE' => 'FL',                     
                    // 'COUNTRYCODE' => 'US', 
                    // 'ZIP' => '33770', 
                    // 'AMT' => '1', 
                    // 'CURRENCYCODE' => 'USD', 
                    // 'L_NAME1' => 'Pera',
                    // 'L_AMT1' => '1',
                    // 'L_QTY1' => '1',                    
                    // 'ITEMAMT' => '1'

            $request_params = array
                    (
                    'METHOD' => 'SetExpressCheckout', 
                    'VERSION' => '98', 
                    
                    'USER' => 'juan_empresa_api1.senati.com', 
                    'PWD' => 'SSNJJRSQWNHQNX7M', 
                    'SIGNATURE' => 'AFcWxV21C7fd0v3bYYYRCpSSRl31A98EJxTuFcxWjTkiBYJNpu98ctfQ', 
                    'PAYMENTREQUEST_0_AMT' => '10',                   
                    'PAYMENTREQUEST_0_CURRENCYCODE' => 'USD',
                    'PAYMENTREQUEST_0_PAYMENTACTION' => 'SALE', 
                    'cancelUrl' =>ROOT_WEB,  
                    'returnUrl' =>ROOT_WEB                    

                    );


              
                    
                    ?> 
                    
                               
                       <?php  if(true):  ?>
                        <form  method="POST" action="<?php echo $action_url ?>" id="dateForm">
                            <?php foreach ($request_params as $key => $val): ?>
                                <input type="hidden" name="<?php echo $key ?>" value="<?php echo $val ?>">
                            <?php endforeach ?>
                            </form>

                            <script type="text/javascript">
                                document.getElementById('dateForm').submit(); // SUBMIT FORM
                            </script>
                        <?php  endif;  ?> 
                      <?php

                
              

                $nvp_string = '';
                foreach($request_params as $var=>$val)
                {
                    $nvp_string .= '&'.$var.'='.urlencode($val);    
                }


                $curl = curl_init();
                curl_setopt($curl, CURLOPT_VERBOSE, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($curl, CURLOPT_TIMEOUT, 30);
                curl_setopt($curl, CURLOPT_URL,'https://www.sandbox.paypal.com/cgi-bin/webscr');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);
                
                $result = curl_exec($curl);     
                curl_close($curl);
                echo '<pre>'; var_dump( $result ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
                // Parse the API response

        //         $result = "TIMESTAMP=2017%2d04%2d12T20%3a57%3a17Z&CORRELATIONID=59160065152d1&ACK=Failure&VERSION=56%2e0&BUILD=25237094&L_ERRORCODE0=10501&L_SHORTMESSAGE0=Invalid%20Configuration&L_LONGMESSAGE0=This%20transaction%20cannot%20be%20processed%20due%20to%20an%20invalid%20merchant%20configuration%2e&L_SEVERITYCODE0=Error&AMT=10000%2e00&CURRENCYCODE=USD";
        //         $nvp_response_array = parse_str($result);
        //         echo '<pre>'; var_dump( $nvp_response_array ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 

        // break;

        
/*
/*---------------------------------*/
