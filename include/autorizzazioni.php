<?php
session_start();
include_once("base.conf.php");
include_once("utility.php");
include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);
include_once(CLASS_UTENTI_MANAGER);

if($_COOKIE["Token"]!=""){
    $tokenAttivo=getValore("SELECT Id_utente FROM utenti_token_accesso WHERE Token='".$_COOKIE["Token"]."' AND Attivo='S' ");
}else{
    $tokenAttivo="";
}

if($tokenAttivo==""){
$utente = login_richiesto();
$avatar = get_avatar( $utente );
}else{
    $idUser=getValore("SELECT Id_utente FROM utenti_token_accesso WHERE Token='".$_COOKIE["Token"]."'");
   $thisUtentiManager = new utentiManager();
    $utente= $thisUtentiManager->getUtentiByPK($idUser);
}


function login_richiesto(){
    $utenteTrovato=false;
    if($_SESSION[PREFISSO_SESSIONE."_utente_autenticato"]==true){
        // Utente autenticato
        $utenteTrovato=true;
    }
    else{
        // Utente non autenticato
        $utenteTrovato=false;
    }
    $thisUtentiManager = new utentiManager();
    $thisUtentiInfo = $thisUtentiManager->getUtentiByPK($_SESSION[PREFISSO_SESSIONE."_utente_codice"]);
    if($thisUtentiInfo == false){
        // Utente non trovato
        $utenteTrovato=false;
    }
    if($thisUtentiInfo->StatoUtente=="A"){
        // Utente non più attivo
        $utenteTrovato=false;
    }
    // Se non ho trovato un utente valido già loggato
    if($utenteTrovato==false){

        // Se
        if(basename($_SERVER['PHP_SELF']) != "login.php"){
            header("Location: login.php");
        }
    }
    // Se ho trovato un utente valido loggato
    if($utenteTrovato==true){
        // Se è stata richiesta la schermata di login passo alla schermata di default
        if(basename($_SERVER['PHP_SELF']) == "login.php"){
            header("Location: index.php");
        }
    }

    return($thisUtentiInfo);
    
}

function get_avatar( $utente ){
    
    $percorso = "../images/user.png";
    
//    $query = " select * from visitatori_foto where Id_utente = ? ";
//    $param = array( $utente->Id_utente );
//    $db = open_DatabaseQuery();
//    $rs = $db->executeDirectQueryPar($query, $param);
//    if( $rs ){
//        $rows = $rs->GetRows(-1);
//        foreach( $rows as $row ){
//            $percorso = $row["Percorso"];
//        }
//    }
    
    return $percorso;
    
}