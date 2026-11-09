<?php

ob_start();

include_once("base.conf.php");
include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);
include_once(CLASS_UTENTI_MANAGER);
require_once("include/utility.php");
ob_clean();
session_start();

$pwCorrente = $_REQUEST["passwordCorrente"];
$pw = $_REQUEST["password"];
$pw1 = $_REQUEST["password1"];
$user = $_SESSION[PREFISSO_SESSIONE . "_user_cambio_pw"];
$dominio = $_SESSION[PREFISSO_SESSIONE . "_dominio_cambio_pw"];

if (isset($_REQUEST["form"])) {



    if ($dominio != "") {
        $pwCorrenteDB = getValore("SELECT password FROM Utenti WHERE Utente='" . $user . "' AND Dominio='" . $dominio . "'");
    } else {
        $pwCorrenteDB = getValore("SELECT password FROM Utenti WHERE Utente='" . $user . "' AND (Dominio IS NULL)");
    }

    $esito = checkCampi("esito", $pwCorrente, $pw, $pw1, $user);

    if ($esito==false) {

        $hash = password_hash($pw, PASSWORD_DEFAULT);

        if ($dominio != "") {

            if (eseguiQuery2("UPDATE Utenti SET password='" . $hash . "', Data_password='" . date("Y-m-d") . "', Reset_password='N' WHERE Utente='" . $user . "' AND Dominio='" . $dominio . "'")) {
                $_SESSION[PREFISSO_SESSIONE . "_user_cambio_pw"] = "";
                $_SESSION[PREFISSO_SESSIONE . "_dominio_cambio_pw"] = "";
            }
        } else {

            if (eseguiQuery2("UPDATE Utenti SET password='" . $hash . "', Data_password='" . date("Y-m-d") . "', Reset_password='N' WHERE Utente='" . $user . "' AND (Dominio IS NULL)")) {
                $_SESSION[PREFISSO_SESSIONE . "_user_cambio_pw"] = "";
                $_SESSION[PREFISSO_SESSIONE . "_dominio_cambio_pw"] = "";
            }
        }
        
        $esito = ["esito" => "true"];
        echo json_encode($esito);
        
    } else {

        echo $esito;
    }
    
    
} else {


    $esito = checkCampi("Uguali", $pwCorrente, $pw, $pw1, $user);

    if ($esito != false) {
        echo $esito;
    }else{
        
         $esito = ["Uguali" => "true"];
         echo json_encode($esito);
         
    }
}

function checkCampi($mode, $pwCorrente, $pw, $pw1, $user) {

    $pwCorrenteDB = getValore("SELECT password FROM Utenti WHERE Utente='" . $user . "' AND (Dominio IS NULL)");

    if (!password_verify($pwCorrente, $pwCorrenteDB) && $pwCorrente != "") {  

        //sbagliata password corrente 
        
        $campo = [$mode => "noPwCorrente"];
    
    } else if ((password_verify($pw, $pwCorrenteDB))) {
        
        //password uguale a quella corrente

        $campo = [$mode => "pwCorrente"];
     
    } else if ($pw != $pw1 && $pw != "" && $pw1 != "") {
        
        //pw nuove diverse tra loro   

        $campo = [$mode => "N"];
      
    } else if ($pw == $pw1 && $pw != "" && $pw1 != "" && !(password_verify($pw, $pwCorrenteDB))) {
        
        //pw nuova diversa dalla corrente, 2 pw nuove non vuote e 2 pw uguali

        return false;

    }

    return json_encode($campo);
}
