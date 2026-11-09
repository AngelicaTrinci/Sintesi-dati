<?php
session_start();
include_once("base.conf.php");
include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);
include_once(CLASS_UTENTI_MANAGER);
require_once("include/utility.php");


$_SESSION[PREFISSO_SESSIONE."_utente_autenticato"] = false;
$_SESSION[PREFISSO_SESSIONE."_utente_codice"]="";
$_SESSION[PREFISSO_SESSIONE."_utente_img"]="";
$_SESSION[PREFISSO_SESSIONE."_amministratore"]="";
$_SESSION[PREFISSO_SESSIONE."_imponi_cambio_password"]="";
$_SESSION[PREFISSO_SESSIONE."_nome"]="";    
eseguiQuery2("DELETE FROM Utenti_token_accesso WHERE Token='".$_COOKIE["Token"]."'");

setcookie("Token", "", time() - 60);


header("Location: login.php");

