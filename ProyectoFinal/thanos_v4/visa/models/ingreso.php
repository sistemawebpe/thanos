<?php 
require_once "conexion.php";

class IngresoModels{
    #login ingreso
    public static function loginModel($datosModel,$tabla){
        $smt = Conexion::conectarMysql()->prepare("SELECT documento, codigoReservaReal,intentos FROM $tabla where codigoReservaReal = :reserva ");
        
        $smt -> bindParam(":reserva", $datosModel["reserva"], PDO::PARAM_STR);
        
        $smt->execute();
        return $smt->fetch();
        $smt->close();
        
    }
    
    
    #actualizar intentos
    public static function intentosModel($datos, $tabla){
        $smt = Conexion::conectarMysql()->prepare("UPDATE $tabla SET intentos = :intentos WHERE codigoReservaReal = :reserva");
        
        $smt -> bindParam(":intentos", $datos["actualizarIntentos"], PDO::PARAM_INT);
        $smt -> bindParam(":reserva", $datos["reservaActual"], PDO::PARAM_STR);
        
        if($smt->execute()){
            return "ok";
        }
        else {
            return "error";
        }
    }
    
    
}