<?php
class server
{
	//private $con;
	public function __construct()
    {	
	 //$this->con = (is_null($this->con)) ? self::connect() : $this->con;
	}
	/*static function connect()
	{
		$con = mysql_connect('localhost','root','mysql');
		$db = mysql_select_db('jvillanueva',$con);
		return $con;
	}*/
	public function Vender($id_array)
	{
		$x="SE VENDIO:<br>";
		$x=$x."<hr>";
		$x=$x."Tacos - S/.12.00<br>";
		$x=$x."Pilas - &nbspS/.12.00<br>";
		$x=$x."Micas - S/.12.00<br>";
		return $x;
	}
	public function consulta($id_array)
	{
		$id=$id_array['idProducto'];
		
		return $id;
	}
	
}
$params = array('uri' => 'serverphp1.php');
$server = new SoapServer(NULL, $params);
$server->setClass('server');
$server->handle();
?>	