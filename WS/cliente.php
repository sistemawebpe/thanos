<?php
class client
{
	public function __construct()
	{
		$params= array('location' => 'http://localhost/UPC/soap/serverphp1.php',
						  'uri' => 'urm://localhost/UPC/soap/serverphp1.php',
						  'trace' => 1);
		$this->instance = new SoapClient(NULL, $params);
	}
	public function vender($id_array)
	{
		return $this->instance->__soapCall('vender',$id_array);
	}
	
}
$client = new client;

?>