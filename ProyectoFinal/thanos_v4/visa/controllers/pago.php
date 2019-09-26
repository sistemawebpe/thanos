<?php

class PagoController{

    public function processPagoVisa(){
        $datos = array("transactionToken" => $_POST["transactionToken"],
                                   "customerEmail" => $_POST["customerEmail"],
                                   "channel" => $_POST["channel"]);
        
        $reserva = '20373697720';
    
            #sesion soles
            $llave = "342062522";    
            #url api de sesion
            $urlSession = "https://apitestenv.vnforapps.com/api.authorization/v3/authorization/ecommerce/".$llave;
            #llamando al var seguridad
            $respuesta = PagoModels::datosModel($reserva,"pago");

            foreach ($respuesta as $row => $item) {
                $seguridad = $item["seguridad"];
                $total = $item["total"];
                $idcompra = $item["id"];
                $nombre = $item["razonsocial"];
            }
            
            #preparando data para la solicitar autorizacion
            
                $data = array("channel" => "web",
                          "captureType" => "manual",
                          "countable" => "true",
                          "order" => array("amount" => $total,
                                           "tokenId" => $datos["transactionToken"],
                                           "currency" => "PEN",
                                           "purchaseNumber" => $idcompra));
            
            
            
            #empezando a llamar el api de autorizacion
            $data_string = json_encode($data);
            $ch = curl_init($urlSession);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                  
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                'Content-Type: application/json',                                                                                
                'Authorization: '.$seguridad)                                                                       
            ); 

            $autorizacion = curl_exec($ch);
            curl_close($ch);
            $autorizacion = json_decode($autorizacion);

            $fecha = PagoModels::seleccionarFecha();
            $fechaHora = $fecha["DATE_ADD(NOW(), INTERVAL 2 HOUR)"];


            #$session = $session->sessionKey;
            if (isset($autorizacion->dataMap)) {
                #insertando logs de solicitud
                $purchase_number = $autorizacion->order->purchaseNumber;
                $autorizacion = $autorizacion->dataMap;
                $datos = array("ruc" => $reserva,
                               "estado" => 1,
                               "trace" => $autorizacion->ACTION_CODE,
                               "observacion" =>$autorizacion->ACTION_DESCRIPTION);
                
                $mon = "PEN";
                    
                    echo '<h5 class="card-title text-success text-center">La Compra se realizo correctamente</h5>
                        <p class="card-text"><b>Número de pedido:</b> '.$idcompra.'</p>
                        <p class="card-text"><b>Razon Social:</b> '.$nombre.'</p>
                        <p class="card-text"><b>Número de tarjeta:</b> '.$autorizacion->CARD.'</p>
                        <p class="card-text"><b>Fecha y hora:</b> '.$fechaHora.'</p>
                        <p class="card-text"><b>Importe:</b> '.$autorizacion->AMOUNT.'</p>
                        <p class="card-text"><b>Moneda:</b> '.$mon.'</p>
                        <p class="card-text"><b>Descripción:</b> '.$autorizacion->ACTION_DESCRIPTION.'</p>
                        <p class="card-text"><b>Recomendación:</b> Imprimir o guardar la información de su compra</p>
                        ';
                

                PagoModels::UpdateModel($datos,"pago");                
                /*$respuestaCorreo = PagoModels::datosEmail($_SESSION["reserva"],"MEIRerserva");
                foreach ($respuestaCorreo as $row => $item) {
                    $nomCliente = $item["nomCliente"];
                    $apeCliente = $item["apeCliente"];
                    $correo = $item['correo'];
                    $montoDeseado = $item['montoDeseado'];
                    $codMoneda = $item['codMoneda'];
                    $nomMoneda = $item['nomMoneda'];
                    $montoPagar = $item['montoPagar'];
                    $fechaEjecutada = $item['fechaEjecutada'];
                    $horaEjecutada = $item['horaEjecutada'];
                    $estado = $item['estado'];
                    $modulo = $item['modulo'];
                    $nomModulo = $item['nomModulo'];
                    $rangoHora = $item['rangoHora'];
                    $nomRangoHora = $item['nomRangoHora'];

                }
 
                echo "Prueba: ".$codReserva2." ".$nomCliente." ".$apeCliente." ".$_SESSION["MEIRerserva"];
                //CORREO:
        ini_set("SMTP","localhost");
        ini_set("smtp_port",25);
        //Correo a los supervisores:
        //$to = "margaritajmv@hotmail.com,victorwmv@hotmail.com,rvilla@worldxchange.com.pe";
        $to = "raulitoemp@hotmail.com";//,victorwmv@hotmail.com";
        $asunto = "SUPERVISOR:Pago realizado";
        $message = "Se ha realizado el pago de la una Reserva con siguientes datos:</br>
        Cliente:".$nomCliente." ".$apeCliente."</br>
        Monto: ".$montoDeseado."de ".$nomMoneda.".</br>
        Fecha elegida: ".$fechaReserva.".</br>
        Rango de Hora: ".$rangoHora.".</br>
        Modulo elegido: ".$nomModulo.".</br>";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: <atencionalcliente@worldxchange.com.pe>' . "\r\n";
        //$headers .= 'Cc: myboss@example.com' . "\r\n";
        mail($to,$asunto,$message,$headers);
        //FIN CORREO
        //correoUsuario:
        $to2 = $correo;
        $asunto2 = "Compra Realizada WorldXchange";
        $message2 = "Se ha realizado el pago de la una Reserva con siguientes datos:</br>
        Cliente:".$nomCliente." ".$apeCliente."</br>
        Monto: ".$montoDeseado."de ".$nomMoneda.".</br>
        Fecha elegida: ".$fechaReserva.".</br>
        Rango de Hora: ".$rangoHora.".</br>
        Modulo elegido: ".$nomModulo.".</br>
        Atentamente.</br>
        WorldXchange";
        mail($to2,$asunto2,$message2,$headers);    
        */
            }

            else {
                #actualizando logs
                echo '<h5 class="card-title text-danger text-center">Se presento un error en la compra</h5>
                        <p class="card-text"><b>Número de Pedido:</b> '.$idcompra.'</p>
                        <p class="card-text"><b>Fecha y hora:</b> '.$fechaHora.'</p>
                        <p class="card-text"><b>Descripción:</b> '.$autorizacion->data->ACTION_DESCRIPTION.'</p>
                        ';
                #insertando logs de solicitud
                $autorizacion = $autorizacion->data;
                $datos = array("ruc" => $reserva,
                               "estado" => 2,
                               "trace" => $autorizacion->ACTION_CODE,
                               "observacion" =>$autorizacion->ACTION_DESCRIPTION);
                
                PagoModels::deleteRegister($datos,"pago");
                /*$respuestaCorreo = PagoModels::datosEmail($_SESSION["reserva"],"MEIRerserva");
                foreach ($respuestaCorreo as $row => $item) {
                    $codReserva2 = $item["codReserva"];
                    $nomCliente = $item["nomCliente"];
                    $apeCliente = $item["apeCliente"];
                    $correo = $item['correo'];
                    $montoDeseado = $item['montoDeseado'];
                    $codMoneda = $item['codMoneda'];
                    $montoPagar = $item['montoPagar'];
                    $fechaEjecutada = $item['fechaEjecutada'];
                    $horaEjecutada = $item['horaEjecutada'];
                    $estado = $item['estado'];
                    $modulo = $item['modulo'];
                    $rangoHora = $item['rangoHora'];

                }*/
                /*
                echo "Prueba: ".$codReserva2." ".$nomCliente." ".$apeCliente." ".$_SESSION["reserva"];
                //CORREO:
        ini_set("SMTP","localhost");
        ini_set("smtp_port",25);
        //Correo a los supervisores:
        //$to = "margaritajmv@hotmail.com,victorwmv@hotmail.com,rvilla@worldxchange.com.pe";
        $to = "raulitoemp@hotmail.com";//,victorwmv@hotmail.com";
        $asunto = "SUPERVISOR:Pago realizado";
        $message = "Se ha realizado el pago de la una Reserva con siguientes datos:</br>
        Cliente:".$nombre." ".$apellido."</br>
        Monto: ".$cantidad."de ".$nomMoneda.".</br>
        Fecha elegida: ".$fechaReserva.".</br>
        Modulo elegido: ".$modulo.".</br>";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: <atencionalcliente@worldxchange.com.pe>' . "\r\n";
        //$headers .= 'Cc: myboss@example.com' . "\r\n";
        mail($to,$asunto,$message,$headers);
        //FIN CORREO
        //correoUsuario:
        $to2 = $correo;
        $asunto2 = "Compra Realizada WorldXchange";
        $message2 = "Estimado cliente".$nombre." ".$apellido."</br>
        Gracias por realizar una reserva de".$cantidad."de ".$nomMoneda." con nosotros.</br>
        Estamos procesando su solicitud.</br>
        Atentamente.</br>
        WorldXchange";
        mail($to2,$asunto2,$message2,$headers);  */  
                
                
            }
    }
}