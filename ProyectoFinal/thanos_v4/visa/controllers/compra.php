<?php

class Compra{
    

    #llamando precios para la compra
    public function datosCompraPrecioPedido(){

    	$reserva = array("reserva" => $_SESSION["reserva"]);

    	$respuesta = CompraModels::compraModel($reserva,"MEIRerserva");

    	foreach ($respuesta as $row => $item) {

        if ($item["codMonedaDestino"] == "000") {
          echo '<ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h6 class="my-0">Concepto de Compra</h6>
                        <small class="text-muted">Compra de Dólares</small>
                      </div>
                      <span class="text-muted">S/ '.substr($item["montoDeseado"],0,-4).'</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h6 class="my-0">Tipo de Cambio</h6>
                        <small class="text-muted">Cambio aplicado</small>
                      </div>
                      <span class="text-muted">S/ '.substr($item["tipoCambio"],0,-4).'</span>
                    </li>
                    
                    <li class="text-success list-group-item d-flex justify-content-between">
                      <span>Total (PEN)</span>
                      <strong>S/ '.substr($item["montoPagar"],0,-4).'</strong>
                    </li>
                  </ul>';
        }
        else {
          echo '<ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h6 class="my-0">Concepto de Compra</h6>
                        <small class="text-muted">Compra de moneda</small>
                      </div>
                      <span class="text-muted">$ '.substr($item["montoDeseado"],0,-4).'</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <div>
                        <h6 class="my-0">Tipo de Cambio</h6>
                        <small class="text-muted">Cambio aplicado</small>
                      </div>
                      <span class="text-muted">$ '.substr($item["tipoCambio"],0,-4).'</span>
                    </li>
                    
                    <li class="text-success list-group-item d-flex justify-content-between">
                      <span>Total (USD)</span>
                      <strong>$ '.substr($item["montoPagar"],0,-4).'</strong>
                    </li>
                  </ul>';
        }
    		
    	}
    }

    #llamando datos para la compra
    public function datosCompraPedido(){

        $reserva = array("reserva" => $_SESSION["reserva"]);

        $respuesta = CompraModels::compraDatosModel($reserva,"MEIRerserva");

        foreach ($respuesta as $row => $item) {
            echo '<div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="nombre">Nombres</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="'.$item["nomCliente"].'" required>
                        <div class="invalid-feedback">
                          Ingrese el campo obligatorio.
                        </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="apellido">Apellidos</label>
                        <input type="text" class="form-control" id="apellido"name="apellido" placeholder="" value="'.$item["apeCliente"].'" required>
                        <div class="invalid-feedback">
                          Ingrese el campo obligatorio.
                        </div>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="email">Email</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">@</span>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" placeholder="" value="'.$item["correo"].'" required>
                        <div class="invalid-feedback" style="width: 100%;">
                          Ingrese el campo obligatorio.
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        
                      <div class="col-md-6 mb-3">
                        <label for="documento">Documento</label>
                      <input type="text" class="form-control" id="documento" name="documento" placeholder="" value="'.$item["documento"].'" required>
                      <div class="invalid-feedback">
                        Ingrese el campo obligatorio.
                      </div>
                      </div>
                      
                      <div class="col-md-6 mb-3">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="" value="'.$item["telefono"].'" required>
                        <div class="invalid-feedback">
                          Ingrese el campo obligatorio.
                        </div>
                      </div>

                    </div>';
        }
    }


    #llamando a la compra
    public function compraController(){
        
          
        if (isset($_POST["ruc"])) {
          if (isset($_POST["terminos"])) {
            $data  = array("razonsocial" => $_POST["razonsocial"],
                                "ruc" => $_POST["ruc"],
                                "email" => $_POST["email"],
                                "telefono" => $_POST["telefono"],
                                "estado" => 0,
                                "total" => $_POST["total"]
                              );

            #insertando los datos de la compra
            $respuesta = CompraModels::compraResumenModel($data,"pago");
            if ($respuesta == "ok") {
              echo '<div class="alert alert-success">Los datos fueron correctos</div>';
              header('Location:visa');
            } 
            else{
              echo '<div class="alert alert-danger">Ocurrió un error, vuelva a intentarlo más tarde</div>';
            }
            
                
          } else {
            echo '<div class="alert alert-danger">Acepta los terminos y condiciones</div>';
          }
          
        }
         /* if (isset($_POST["documento"])) {
              if (isset($_POST["terminos"])) {
                $reserva = array("reserva" => $_SESSION["reserva"]);

                $respuesta = CompraModels::compraModel($reserva,"MEIRerserva");
                foreach ($respuesta as $row => $item) {
                    $montoPagar = substr($item["montoPagar"],0,-4);
                    $codMonedaDestino = $item["codMonedaDestino"];
                }

                #trayendo datos para insertar en bd
                $datos  = array("nombre" => $_POST["nombre"],
                                "apellido" => $_POST["apellido"],
                                "email" => $_POST["email"],
                                "documento" => $_POST["documento"],
                                "montoPagar" => $montoPagar,
                                "reserva"    => $_SESSION["reserva"],
                                "codMonedaDestino" => $codMonedaDestino
                              );
                
                #insertando los datos de la compra
                $respuesta = CompraModels::compraResumenModel($datos,"meicompra");
                
                $estado = CompraModels::estadoModel($datos,"meicompra");
                

                foreach ($estado as $row => $item) {
                  $estado = $item["estado"];
                }

                if ($estado == 1) {
                  echo '<div class="alert alert-danger">La reserva ya fue pagada anteriormente!</div>';
                } 
                
                else {

                  if ($respuesta == "ok") {
                    echo '<div class="alert alert-success">Los datos fueron correctos</div>';
                    header('Location:visa');
                  } 
                  else{
                    echo '<div class="alert alert-danger">Ya existe una solicitud de compra para esta reserva, por favor haga click <a href="visa" class="alert-link">aquí</a></div>';
                  }
                }
              } else {
                echo '<div class="alert alert-danger">Acepta los terminos y condiciones</div>';
              }

          }*/

    }

 
}
