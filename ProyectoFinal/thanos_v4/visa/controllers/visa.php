<?php

class Visa{

	#funcion para mostrar resumen de la compra y formulario de visa
	public function resumenController(){


        # PEDIR AUTORIZACION DE SEGURIDAD
            #usuario de testing
            $usuario = 'integraciones.visanet@necomplus.com';
            #clave de testing
            $clave = 'd5e7nk$M';
            #api de seguridad
            $urlSeguridad = 'https://apitestenv.vnforapps.com/api.security/v1/security';
            
            #empezando a llamar el api de seguridad
            $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL,$urlSeguridad);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                curl_setopt($ch, CURLOPT_USERPWD, "$usuario:$clave");
                $seguridad = curl_exec($ch);
                curl_close($ch);  
            
            

            $llave = "342062522";        
            #url api de sesion
            $urlSession = "https://apitestenv.vnforapps.com/api.ecommerce/v2/ecommerce/token/session/".$llave;

            #llamando al monto a Pagar
            $ruc = '20373697720';
            $monto = VisaModels::montoModel($ruc, "pago");
            
            foreach ($monto as $row => $item) {
                $monto = $item["total"];
            }
            #preparando data para la solicitar session
            $data = array("amount" => $monto,
              "channel" => "web",
              "antifraud" => array("clientIp" => "192.168.22.11",
                                   "merchantDefineData" => array("MDD1" => "web",
                                                                 "MDD2" => "Canl",
                                                                 "MDD3"=> "Canl")));
            #empezando a llamar el api de session
            $data_string = json_encode($data);
            $ch = curl_init($urlSession);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json',                                                                                
                'Authorization: '.$seguridad)                                                                       
            ); 

            $session = curl_exec($ch);
            curl_close($ch);
            $session = json_decode($session);

            

            $session = $session->sessionKey;

            #insertando la session obtenida en base de datos
            $ss = array("ruc" => $ruc,
                        "seguridad" =>$seguridad,
                        "session" => $session,
                        "llave" => $llave);
            
        
            VisaModels::sessionModel($ss,"pago");

            #llamando a toda la tabla de compra para mostrar el formulario
            $respuesta = VisaModels::resumenModel($ruc,"pago");
            
            #http://worldxchange.com.pe/appMEI/meireservas/modulocompra/pago
            #http://localhost:8080/modulocompra/pago
            foreach ($respuesta as $row => $item) {
                
                    echo '<h5 class="card-title">Datos</h5>
                        <p class="card-text"><b>Razon Social:</b> '.$item["razonsocial"].'</p>
                        <p class="card-text"><b>RUC:</b> '.$item["ruc"].'</p>
                        <p class="card-text"><b>Precio Total (PEN):</b> S/'.$item["total"].'</p>
                        <form action="http://localhost/UPC/thanos_v4/visa/pago" method="post">
                            <script 
                            src="https://static-content-qas.vnforapps.com/v2/js/checkout.js?qa=true"
                            data-sessiontoken="'.$item["session"].'"
                            data-channel="web"
                            data-merchantid="'.$item["llave"].'"
                            data-merchantlogo= "http://sistemaweb.pe/logo.png"
                            data-formbuttoncolor="#D80000"
                            data-purchasenumber="'.$item["id"].'"
                            data-amount="'.$item["total"].'"
                            data-expirationminutes="5"
                            data-cardholdername="'.$item["razonsocial"].'"
                            data-cardholderlastname="'.$item["ruc"].'"
                            data-cardholderemail="'.$item["email"].'"
                            data-timeouturl = "timeout.html"></script>
                        </form>';
                
                
                 
            }
        

	}
}