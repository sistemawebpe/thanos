<?php
include('cliente.php');
$id_array = array('Action'=>'vender');
//echo $client->getName($id_array);
echo "SERVICIO DE VENTAS Y CONSULTAS";
echo "<hr>";

$lista=$client->vender($id_array);

echo $lista;
?>


