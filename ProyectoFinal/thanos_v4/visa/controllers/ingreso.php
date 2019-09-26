<?php

class Ingreso{
    
    #login
    public function loginController(){
        if(isset($_POST["documento"])){
            if(preg_match('/^[a-zA-Z0-9]*$/',$_POST["reserva"]) &&
               preg_match('/^[a-zA-Z0-9]*$/',$_POST["documento"])){
                
                $datos = array("documento" => $_POST["documento"],
                               "reserva" => $_POST["reserva"]);
                $respuesta = IngresoModels::loginModel($datos,"empresa");
                
                $intentos = $respuesta["intentos"];
                $reservaActual = $_POST["reserva"];
                $maximoIntentos = 2;
                
                 if($intentos < $maximoIntentos){
                    if($respuesta["email"] == $_POST["documento"] && $respuesta["password"] == $_POST["reserva"]){
                       $intentos = 0;
                        $datosController = array("reservaActual" => $reservaActual, 
                                                 "actualizarIntentos" => $intentos);
                        $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "empresa");
                        
                        session_start();
                        $_SESSION["validar"] = true;
                        $_SESSION["reserva"] = $reservaActual;
                        echo "<script>location.href='inicio';</script>";
                        die();
                        
                        
                        
                    }
                    else{
                        ++$intentos;
                        $datosController = array("reservaActual" => $reservaActual, 
                                                 "actualizarIntentos" => $intentos);
                        $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "empresa");
                        
                        echo '<div class="alert alert-danger">Los datos ingresados no son correctos</div>';
                    }     
                }
                
                
                
                else {
                    $intentos = 0;
                    $datosController = array("reservaActual" => $reservaActual, 
                                                 "actualizarIntentos" => $intentos);
                    $respuestaActualizarIntentos = IngresoModels::intentosModel($datosController, "empresa");
                    
                    echo '<div class="alert alert-danger">Demuestre que no es un robot</div>';
                    
                }
            }
                
            
        }
        
    }
}
