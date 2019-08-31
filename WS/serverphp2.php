<?php
class server
{
	public function __construct()
    {	
	 //$this->con = (is_null($this->con)) ? self::connect() : $this->con;
	}
	public function Consulta($id_array)
	{
		$id=$id_array['idProducto'];
		if($id==1){
            $resp=$id." Tacos S/ 12.00";
        }elseif($id==2){
            $resp=$id." Pilas S/ 14.00";
        }elseif($id==3){
            $resp=$id." Micas S/ 16.00";
        }else{
            $resp=$id." Producto no encontrado S/ 00.00";
        }
		return $resp;
	}
	
}
$params = array('uri' => 'serverphp2.php');
$server = new SoapServer(NULL, $params);
$server->setClass('server');
$server->handle();
?>	