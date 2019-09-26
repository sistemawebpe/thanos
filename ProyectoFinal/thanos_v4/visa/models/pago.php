<?php

class PagoModels{

	public static function monedaModel($reserva,$tabla){
		$stmt = Conexion::conectarMysql()->prepare("SELECT codMonedaDestino FROM $tabla WHERE reserva = :reserva");

		$stmt->bindParam(":reserva", $reserva, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}
	
	public static function datosModel($reserva,$tabla){
		$stmt = Conexion::conectarMysql()->prepare("SELECT * FROM $tabla WHERE ruc = :reserva");

		$stmt->bindParam(":reserva", $reserva, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
	}

	public static function seleccionarFecha(){
		$stmt = Conexion::conectarMysql()->prepare("SELECT DATE_ADD(NOW(), INTERVAL 2 HOUR);");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();
	}

	public static function logModel($datos,$tabla){
		$stmt = Conexion::conectarMysql()->prepare("INSERT INTO $tabla (reserva,trace,observacion) VALUES (:reserva,:trace,:observacion)");

		$stmt->bindParam(":reserva", $datos["reserva"], PDO::PARAM_STR);
		$stmt->bindParam(":trace", $datos["trace"], PDO::PARAM_STR);
		$stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
	}

	public static function UpdateModel($datos,$tabla){
		$stmt = Conexion::conectarMysql()->prepare("UPDATE $tabla SET estado = :estado WHERE ruc = :reserva");

		$stmt->bindParam(":reserva", $datos["ruc"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
	}

	public static function deleteRegister($datos,$tabla){
		$stmt = Conexion::conectarMysql()->prepare("DELETE FROM $tabla WHERE ruc = :reserva");

		$stmt->bindParam(":reserva", $datos["reserva"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";
		}

		else{

			return "error";
		}

		$stmt->close();
	}
//agregado por remja:
	public static function datosEmail($reserva,$tabla){
		$stmt = Conexion::conectarMysql()->prepare("SELECT
nomCliente,apeCliente,correo,telefono,codMoneda,montoDeseado,fechaReserva
,CASE
    WHEN rangoHora = 1 THEN 'De 00:00 - 02:00'
WHEN rangoHora = 2 THEN 'De 02:00 - 04:00'
WHEN rangoHora = 3 THEN 'De 04:00 - 06:00'
WHEN rangoHora = 4 THEN 'De 06:00 - 08:00'
WHEN rangoHora = 5 THEN 'De 08:00 - 10:00'
WHEN rangoHora = 6 THEN 'De 10:00 - 12:00'
WHEN rangoHora = 7 THEN 'De 12:00 - 14:00'
WHEN rangoHora = 8 THEN 'De 14:00 - 16:00'
WHEN rangoHora = 9 THEN 'De 16:00 - 18:00'
WHEN rangoHora = 10 THEN 'De 18:00 - 20:00'
WHEN rangoHora = 11 THEN 'De 20:00 - 22:00'
WHEN rangoHora = 12 THEN 'De 22:00 - 23:59'
END as nomRangoHora
,rangoHora
,CASE
WHEN codMoneda = '000' THEN'Soles'
WHEN codMoneda = '001' THEN'D��lar USA'
WHEN codMoneda = '002' THEN'D��lar Canadiense'
WHEN codMoneda = '003' THEN'Libra Esterlina'
WHEN codMoneda = '004' THEN'Franco Suizo'
WHEN codMoneda = '005' THEN'Peso Chileno'
WHEN codMoneda = '006' THEN'Peso Mexicano'
WHEN codMoneda = '007' THEN'Peso Colombiano'
WHEN codMoneda = '008' THEN'Euro'
WHEN codMoneda = '009' THEN'Yens'
WHEN codMoneda = '010' THEN'D��lar Australiano'
WHEN codMoneda = '011' THEN'Peso Argentino'
WHEN codMoneda = '012' THEN'Peso Boliviano'
WHEN codMoneda = '013' THEN'Real'
END as nomMoneda
,codMoneda
,CASE
    WHEN modulo = 1 THEN 'Aduanas'
    WHEN modulo = 2 THEN 'Internacionales'
    WHEN modulo = 3 THEN 'Nacionales'
END as nomModulo
,modulo
,codigoReservaReal
FROM $tabla WHERE codigoReservaReal = :reserva");

		$stmt->bindParam(":reserva", $reserva, PDO::PARAM_STR);


		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();   
	}


}