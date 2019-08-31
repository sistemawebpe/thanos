<?php
include('cliente2.php');
$idPro=$_GET["idProducto"];
$id_array = array('IdProducto'=>$idPro);
//echo $client->getName($id_array);
echo "CONSULTA";
echo "<hr>";

$lista=$consultarProducto->Consulta($id_array);

echo $lista;
?>


