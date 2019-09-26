
<?php
require_once("lib/nusoap.php");

//$cliente = new nusoap_client("http://192.168.137.59:8080/ws/servicio.php",false);
//$cliente = new nusoap_client("http://localhost/UPC/thanos_v3/serverSOAP.php",false);
$cliente = new nusoap_client("http://localhost/UPC/ServerSOAP/serverSOAP.php",false);

$num1 = 2;
$num2 = 5;

$parametros = array('num1'=>$num1,'num2'=>$num2);
$respuesta = $cliente->call("MiFuncion",$parametros);

//print($respuesta);
$xml = new SimpleXMLElement($respuesta);
print json_encode($xml);
//print($xml->estacion[1]->NroEstacion);
//$data=[];
/*foreach ($xml->estacion as $elemento){
    //$data[]=array('NroEstacion'=>$elemento->NroEstacion,'Nombre'=>$elemento->Nombre);
    array_push($data,$elemento->NroEstacion,$elemento->Nombre);
}
print json_encode($data);*/
/*
foreach ($xml->estacion as $elemento){
    print $elemento->NroEstacion."|".$elemento->Nombre."</br>";
}
*/
?>