<?php
class consultarProducto
{
	public function __construct()
	{
		$params= array('location' => 'http://localhost/UPC/soap/serverphp2.php',
						  'uri' => 'urm://localhost/UPC/soap/serverphp2.php',
						  'trace' => 1);
		$this->instance = new SoapClient(NULL, $params);
	}
	public function Consulta($id_array)
	{
		return $this->instance->__soapCall('Consulta',$id_array);
	}
	
}
$consultarProducto = new consultarProducto;


?>