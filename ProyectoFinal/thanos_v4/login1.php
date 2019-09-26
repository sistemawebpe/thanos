<?php

$con=mysql_connect("127.0.0.1", "root", "mysql") OR DIE("no se pudo conectar a la Base de Datos");
@mysql_select_db("thanos_usuarios") or die( "No se pudo escoger una DB");

$sql="SELECT nombCliente,apell_Cliente FROM upc_datacliente WHERE correo_cliente='".$_GET["login"]."'";
$res=mysql_query($sql) or die ("Error");
while($row=mysql_fetch_array($res)){
    $nombre=$row["nombCliente"]." ".$row["apell_Cliente"];
}
session_start();
$_SESSION["nombre"]=$nombre;
$_SESSION["correo"]=$_GET["login"];
header('Location: empresa.php');

?>