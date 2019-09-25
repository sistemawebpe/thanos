<?php
include_once 'lib/nusoap.php';
$servicio = new soap_server();
function connect()
	{
		$con = mysql_connect('localhost','root','mysql');
		$db = mysql_select_db('jvillanueva',$con) or die ("Error en la base de datos");
		return $con;
	}
$con="";
$ns = "urn:miserviciowsdl";
$servicio->configureWSDL("MiPrimerServicioWeb",$ns);
$servicio->schemaTargetNamespace = $ns;

$servicio->register("MiFuncion", array('codDistrito' => 'xsd:integer'), array('return' => 'xsd:string'), $ns );

function MiFuncion($codDistrito){
    $con=connect();
    $d=mysql_query("SET NAMES utf8mb4", $con) or die(mysql_error());
	$sql="SELECT * FROM upc_estaciones WHERE codDistrito=$codDistrito";
    $query= mysql_query($sql);
    /*$xml="<?xml version='1.0'  encoding='UTF-8'?>";*/
    $xml="<estaciones>";
    while($row=mysql_fetch_array($query)){
         $xml=$xml."<estacion>
                        <NroEstacion>".$row["idEstacion"]."</NroEstacion>
                        <Nombre>".$row["NomEstacion"]."</Nombre>
                        <Direc>".$row["NomEstacion"]."</Direc>
                        <NTelf>".$row["Telefono"]."</NTelf>
                        <g85p>".$row["gas84plus"]."</g85p>
                        <g90p>".$row["gas90plus"]."</g90p>
                        <g95p>".$row["gas95plus"]."</g95p>
                        <g97p>".$row["gas97plus"]."</g97p>
                        <g98p>".$row["gas98plus"]."</g98p>
                        <gs50>".$row["dbs_s50_uv"]."</gs50>
                        <gs50>".$row["idEstacion"]."</gs50>
                     </estacion>";
    }                   
    $xml=$xml."</estaciones>"; 
	return $xml;
 //$resultadoSuma = $num1 + $num2;
 //$resultado = "El resultado de la suma de " . $num1 . "+" .$num2 . " es: " . $resultadoSuma;	
 //return $resultado;
 
}
$servicio->register("MostrarDistritos", array('num1' => 'xsd:integer'), array('return' => 'xsd:string'), $ns );
function MostrarDistritos($l){
    $con=connect();
    $d=mysql_query("SET NAMES utf8mb4", $con) or die(mysql_error());
	$sql="SELECT * FROM upc_distrito Where Estado='A'";
    $query= mysql_query($sql);
    /*$xml="<?xml version='1.0'  encoding='UTF-8'?>";*/
    $xml="<distritos>";
    while($row=mysql_fetch_array($query)){
         $xml=$xml."<distrito>
                        <idDistrito>".$row["codDistrito"]."</idDistrito>
                        <NDistrito>".$row["NomDistrito"]."</NDistrito>
                     </distrito>";
    }                   
    $xml=$xml."</distritos>"; 
	return $xml;
}
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service(file_get_contents("php://input"));;


?>