<?php

class Enlaces{
    
    #llamando enlaces desde el controlador
    public function enlaceController(){
        if(isset($_GET["action"])){
            $enlaces = $_GET["action"];
        }
        else{
            $enlaces = "index";
        }
        
        $respuesta = EnlacesModels::enlacesModel($enlaces);
        
        include $respuesta;
    }
}