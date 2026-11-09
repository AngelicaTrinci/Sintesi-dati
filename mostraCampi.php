<?php

ob_start();
include_once("base.conf.php");
include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);
include_once CLASS_DATABASE_QUERY;
include_once("include/utility.php");
ob_end_clean();

$thisTipoLogin=stripslashes(requestUtils::getRequestObject('TipoLogin'));
 
echo mostraCampi($thisTipoLogin);


function mostraCampi($thisTipoLogin){
    if($thisTipoLogin=="0"){
         $campo = [ "Campo" => "0" ]; 
         
    return json_encode($campo);
    
    }else if($thisTipoLogin=="1"){
          $campo = [ "Campo" => "1" ];
          
    return json_encode($campo);
    
    
    }else if($thisTipoLogin=="2"){
        
          $campo = [ "Campo" => "2" ];
          
          return json_encode($campo);
        
    }
    
    
}