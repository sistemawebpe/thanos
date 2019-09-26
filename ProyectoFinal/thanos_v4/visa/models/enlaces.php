<?php

class EnlacesModels{
    
    #llamando enlaces desde el model
    public static function enlacesModel($enlaces){
        if($enlaces == "inicio" ||
          $enlaces == "ingreso" ||
          $enlaces == "visa"    ||
          $enlaces == "pago"    ||
          $enlaces == "salir"){
            $module = "views/modules/".$enlaces.".php";
        }
        else if($enlaces == "index"){
            $module = "views/modules/inicio.php";
        }
        
        else {
            $module = "views/modules/inicio.php";
        }
        
        
        return $module;
    }
}