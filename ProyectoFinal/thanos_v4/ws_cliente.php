<?php
class wsEstablecimiento
{
	public function __construct()
	{
		$params= array('location' => 'http://localhost/UPC/thanos/wsEstablecimiento.php',
						  'uri' => 'urm://http://localhost/UPC/thanos/wsEstablecimiento.php',
						  'trace' => 1);
		$this->instance = new SoapClient(NULL, $params);
	}
	
	public function listarEstablecimiento($parametros){
		return $this->instance->__soapCall('listaEstablecimiento',$parametros);
	}
}
$wsEstablecimiento = new wsEstablecimiento;

?>