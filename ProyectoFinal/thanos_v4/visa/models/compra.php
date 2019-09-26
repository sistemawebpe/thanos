<?php

class CompraModels{

	#llamando los precios de la reserva
	public static function compraModel($datos,$tabla){
		$smt = Conexion::conectarMysql()->prepare("SELECT montoPagar,montoDeseado,tipoCambio,codMonedaDestino FROM $tabla where codigoReservaReal = :reserva ");
        
        $smt -> bindParam(":reserva", $datos["reserva"], PDO::PARAM_STR);
        
        $smt->execute();
        return $smt->fetchAll();
        $smt->close();
	}

	#llamando los datos de la reserva
	public static function compraDatosModel($datos,$tabla){
		$smt = Conexion::conectarMysql()->prepare("SELECT nomCliente,apeCliente,correo,documento,telefono,montoPagar FROM $tabla where codigoReservaReal = :reserva ");
        
        $smt -> bindParam(":reserva", $datos["reserva"], PDO::PARAM_STR);
        
        $smt->execute();
        return $smt->fetchAll();
        $smt->close();
	}


	#insertando los datos de la compra
	public static function compraResumenModel($datos,$tabla){
		$stmt = Conexion::conectarMysql()->prepare("INSERT INTO $tabla (razonsocial,ruc,email,telefono,estado,total) VALUES (:razonsocial,:ruc,:email,:telefono,:estado,:total)");

		$stmt -> bindParam(":razonsocial", $datos["razonsocial"], PDO::PARAM_STR);		
		$stmt -> bindParam(":ruc", $datos["ruc"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt -> bindParam(":total", $datos["total"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();

	}

	#llamando estado de la reserva
	public static function estadoModel($datos,$tabla){
		$smt = Conexion::conectarMysql()->prepare("SELECT reserva,estado FROM $tabla where reserva = :reserva ");
        
        $smt -> bindParam(":reserva", $datos["reserva"], PDO::PARAM_STR);
        
        $smt->execute();
        return $smt->fetchAll();
        $smt->close();
	}
}