<?php
class server
{
	private $con;
	public function __construct()
    {	
	 	$this->con = (is_null($this->con)) ? self::connect() : $this->con;
	}
	static function connect()
	{
		$con = mysql_connect('localhost','root','mysql');
		$db = mysql_select_db('jvillanueva',$con);
		return $con;
	}
	public function listaEstablecimiento($id_array)
	{
		$id = "1";
		mysql_query("SET NAMES utf8mb4", $this->con) or die(mysql_error());
		$sql="SELECT * FROM `upc_estaciones`";
		$query= mysql_query($sql, $this->con) or die(mysql_error());
		$arr=[];
		while($row=mysql_fetch_object($query)){
			$arr[]=$row;
		}
		return $arr;
		
	}
	
}
$params = array('uri' => 'wsEstablecimiento.php');
$server = new SoapServer(NULL, $params);
$server->setClass('server');
$server->handle();
?>	