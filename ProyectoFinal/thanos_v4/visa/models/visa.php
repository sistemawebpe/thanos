<?php

class VisaModels{

	
	#comprobando status de la compra
	public static function comprobarEstatusModel($datos,$tabla){
		$stmt = Conexion::conectarMysql()->prepare("SELECT total FROM $tabla WHERE reserva = :reserva");

		$stmt->bindParam(":reserva", $reserva, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	#llamando al monto a pagar para el formulario de visa
	public static function montoModel($ruc,$tabla){
		$stmt = Conexion::conectarMysql()->prepare("SELECT total,estado FROM $tabla WHERE ruc = :ruc");

		$stmt->bindParam(":ruc", $ruc, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	#recojiendo la moneda de la reserva
	public static function monedaModel($reserva,$tabla){
		$stmt = Conexion::conectarMysql()->prepare("SELECT codMonedaDestino FROM $tabla WHERE reserva = :reserva");

		$stmt->bindParam(":reserva", $reserva, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	#insertando la session
	public static function sessionModel($datos,$tabla){
		$stmt = Conexion::conectarMysql()->prepare("UPDATE $tabla SET session = :session, seguridad = :seguridad, llave = :llave WHERE ruc = :ruc");

		$stmt -> bindParam(":session", $datos["session"], PDO::PARAM_STR);
		$stmt -> bindParam(":seguridad", $datos["seguridad"], PDO::PARAM_STR);
		$stmt -> bindParam(":llave", $datos["llave"], PDO::PARAM_STR);
		$stmt -> bindParam(":ruc", $datos["ruc"], PDO::PARAM_STR);		
		

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
	}
	#llamando funcion para resumen de la compra
	public static function resumenModel($ruc,$tabla){

		$stmt = Conexion::conectarMysql()->prepare("SELECT * FROM $tabla WHERE ruc = :ruc");

		$stmt->bindParam(":ruc", $ruc, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

	}
}