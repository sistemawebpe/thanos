<?php
class wsEstablecimiento
{
	public function __construct()
	{
		$params= array('location' => 'http://192.168.137.59:8080/ws/servicio.php?wsdl',
						  'uri' => 'http://192.168.137.59:8080/ws/servicio.php?wsdl',
						  'trace' => 1);
		$this->instance = new SoapClient(NULL, $params);
	}
	
	public function listarEstablecimiento($parametros){
		return $this->instance->__soapCall('MiFuncion',($parametros));
	}
}
$wsEstablecimiento = new wsEstablecimiento;

?>