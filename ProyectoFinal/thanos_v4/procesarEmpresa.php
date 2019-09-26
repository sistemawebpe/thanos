
<?php
require_once("lib/nusoap.php");
$cliente = new nusoap_client("http://localhost/UPC/ServerSOAP/serverSOAP.php",false);
//$cliente = new nusoap_client("http://sistemaweb.pe/ServerSOAP/serverSOAP.php",false);

if($_POST["Action"]=="ListarEstaciones"){
    
    $codDistrito=$_POST["idDistrito"];
    $parametros = array('codDistrito'=>$codDistrito);
    $respuesta = $cliente->call("MiFuncion",$parametros);
    $xml = new SimpleXMLElement($respuesta);
    print json_encode($xml);
}

if($_POST["Action"]=="ListarDistrito"){
    $parametros = array('num1'=>0);
    $respuesta = $cliente->call("MostrarDistritos",$parametros);
    $xml = new SimpleXMLElement($respuesta);
    print json_encode($xml);
}
if($_POST["Action"]=="GrabarNuevaEstaciones"){
    print "grabado";
}

?>