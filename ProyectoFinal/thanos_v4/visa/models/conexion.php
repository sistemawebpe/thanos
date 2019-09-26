<?php

class Conexion{
    
    #conectandose a la base de datos mysql para sacar los usuarios
    public static function conectarMysql(){
        #conexion test
		$link = new PDO("mysql:host=localhost;dbname=api_pagos","root","mysql");
		#conexion prod
		#$link = new PDO("mysql:host=localhost;dbname=raulvill_db_MEI_WEB","raulvill_remja","727666remja");

		return $link;
	}
    
    
 
}