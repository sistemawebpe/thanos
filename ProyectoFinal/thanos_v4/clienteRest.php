<?php
/*
$date=json_decode(file_get_contents("http://localhost:4000/distrito/1"));
print_r($date);
print()
*/

class CurlRequest
    {
        public function sendPost($nomDistrito)
        {
            $data = array("NomDistrito" => $nomDistrito);
            $ch = curl_init("http://localhost:4000/grabar");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            $response = curl_exec($ch);
            curl_close($ch);
            if(!$response) {
                return false;
            }else{
                return $response;
            }
        }

        public function sendPut()
        {
            //datos a enviar
            $data = array("a" => "a");
            //url contra la que atacamos
            $ch = curl_init("http://localhost/WebService/API_Rest/api.php");
            //a true, obtendremos una respuesta de la url, en otro caso, 
            //true si es correcto, false si no lo es
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //establecemos el verbo http que queremos utilizar para la petición
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            //enviamos el array data
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            //obtenemos la respuesta
            $response = curl_exec($ch);
            // Se cierra el recurso CURL y se liberan los recursos del sistema
            curl_close($ch);
            if(!$response) {
                return false;
            }else{
                var_dump($response);
            }
        }

        public function sendGet()
        {
            $data = array("a" => "a");
            $ch = curl_init("http://localhost:4000/EstacioneGrabar");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            $response = curl_exec($ch);
            curl_close($ch);
            if(!$response) {
                return false;
            }else{
                var_dump($response);
            }
        }

        public function sendDelete()
        {
            //datos a enviar
            $data = array("a" => "a");
            //url contra la que atacamos
            $ch = curl_init("http://localhost/WebService/API_Rest/api.php");
            //a true, obtendremos una respuesta de la url, en otro caso, 
            //true si es correcto, false si no lo es
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //establecemos el verbo http que queremos utilizar para la petición
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            //enviamos el array data
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            //obtenemos la respuesta
            $response = curl_exec($ch);
            // Se cierra el recurso CURL y se liberan los recursos del sistema
            curl_close($ch);
            if(!$response) {
                return false;
            }else{
                var_dump($response);
            }
        }
        public function grabarEstaciones($codDistrito,$NomEstacion,$Direccion,$Telefono,$gas84plus,$gas90plus,$gas95plus,$gas97plus,$gas98plus,$dbs_s50_uv)
        {
            $data = array(
                "codDistrito" => $codDistrito,
                "NomEstacion" => $NomEstacion,
                "Direccion" => $Direccion,
                "Telefono"  => $Telefono,
                "gas84plus" => $gas84plus,
                "gas90plus" => $gas90plus,
                "gas95plus" => $gas95plus,
                "gas97plus" => $gas97plus,
                "gas98plus" => $gas98plus,
                "dbs_s50_uv" => $dbs_s50_uv
            );

            $ch = curl_init("http://localhost:4000/EstacioneGrabar");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            $response = curl_exec($ch);
            curl_close($ch);
            if(!$response) {
                return false;
            }else{
                return $response;
            }
        }

        public function UpdateEstaciones($idEmpresa,$nombre,$telefono,$direccion,$idDist,$g84,$g90,$g95,$g97,$g98,$s50)
        {
            $data = array(
                "idEmpresa" => $idEmpresa,
                "NomEstacion" => $nombre,
                "Telefono"  => $telefono,
                "Direccion" => $direccion,
                "codDistrito" => $idDist,
                "gas84plus" => $g84,
                "gas90plus" => $g90,
                "gas95plus" => $g95,
                "gas97plus" => $g97,
                "gas98plus" => $g98,
                "dbs_s50_uv" => $s50
            );

            $ch = curl_init("http://localhost:4000/UpdateEstaciones");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            $response = curl_exec($ch);
            curl_close($ch);
            if(!$response) {
                return false;
            }else{
                return $response;
            }
        }

        public function EliminarEstacion($idEmpresa)
        {
            $data = array("idEmpresa" => $idEmpresa);

            $ch = curl_init("http://localhost:4000/EliminarEstaciones");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            $response = curl_exec($ch);
            curl_close($ch);
            if(!$response) {
                return false;
            }else{
                return $response;
            }
        }
        
        public function ConsultarEstacion($id)
        {
            $data = array("id" => $id);
            $ch = curl_init("http://localhost:4000/ConsultaEstacion/".$id);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            #curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            $response = curl_exec($ch);
            curl_close($ch);
            if(!$response) {
                return false;
            }else{
                return $response;
            }
        }

        public function Login($usuario,$clave)
        {
            $data = array("usuario" => $usuario,"clave"=>$clave);
            $ch = curl_init("http://localhost:4001/login");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
            $response = curl_exec($ch);
            curl_close($ch);
            if(!$response) {
                return false;
            }else{
                return $response;
            }
        }
    }

    #$resultado = $new ->sendPost("PuertoRico");
    #grabar estaciones
    #consultar estaciones
    #$resultado = $new ->ConsultarEstacion(2);
if ($_POST["txtAction"]=="GrabarEstacion"){
    $nombre=$_POST["txtNombre"];
    $telefono=$_POST["txtTelefono"];
    $direccion=$_POST["txtDireccion"];
    $idProv=$_POST["lstProvincias"];
    $g84=$_POST["g84"];
    $g90=$_POST["g90"];
    $g95=$_POST["g95"];
    $g97=$_POST["g97"];
    $g98=$_POST["g98"];
    $s50=$_POST["s50"];     
    $new = new CurlRequest();
    $resultado = $new ->grabarEstaciones($idProv,$nombre,$direccion,$telefono,$g84,$g90,$g95,$g97,$g98,$s50);
    print json_encode($resultado);
}

if ($_POST["txtAction"]=="GrabarEstacionModal"){
    $idEmpresa=$_POST["txtidEstacion"];
    $nombre=$_POST["txtNombre"];
    $telefono=$_POST["txtTelefono"];
    $direccion=$_POST["txtDireccion"];
    $idDist=$_POST["lstProvinciasModal"];
    $g84=$_POST["g84"];
    $g90=$_POST["g90"];
    $g95=$_POST["g95"];
    $g97=$_POST["g97"];
    $g98=$_POST["g98"];
    $s50=$_POST["s50"];     
    $new = new CurlRequest();
    $resultado = $new->UpdateEstaciones($idEmpresa,$nombre,$telefono,$direccion,$idDist,$g84,$g90,$g95,$g97,$g98,$s50);
    print json_encode($resultado);

}
if ($_POST["txtAction"]=="EliminarEstacion"){
    $idEmpresa=$_POST["idEstacion"];
    $new = new CurlRequest();
    $resultado = $new->EliminarEstacion($idEmpresa);
    print json_encode($resultado);
}
if ($_POST["txtAction"]=="login"){
    $usuario=$_POST["txtUsuario"];
    $clave=$_POST["txtClave"];
    $new = new CurlRequest();
    $resultado = $new->Login($usuario,$clave);
    print json_encode($resultado);
}
?>