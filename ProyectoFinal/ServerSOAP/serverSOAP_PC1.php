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
$servicio->configureWSDL("U201711049",$ns);
$servicio->schemaTargetNamespace = $ns;

$servicio->register("ConvertirLitrosAGalones", array('litros' => 'xsd:integer'), array('return' => 'xsd:string'), $ns );
function ConvertirLitrosAGalones($litros){
        if ($litros>0){
            $UnGalon=3.7854118;
            $dato=$litros / $UnGalon;
            return $dato;            
        }else{
            return "0";
        }
	return $xml;
}
$servicio->register("RegistrarMerma", array('id' => 'xsd:integer','galones' => 'xsd:integer','justificacion'=>'xsd:string'), array('return' => 'xsd:string'), $ns );
function RegistrarMerma($id,$galones,$justificacion){
        $con=connect();
        $sql="INSERT INTO `combustible`(`idComb`,`CantidadGalones`,`justificacion`) VALUES (".$id.",".$galones.",'".$justificacion."')";
        $query= mysql_query($sql);
        return "Se grabo con exito";
}
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$servicio->service(file_get_contents("php://input"));;


?>