<?
require_once("base.conf.php");
require_once(CONFIG_FILE);
require_once(CLASS_REQUEST_UTILS);
require_once(CLASS_DATABASE_QUERY);
require_once("include/utility.php");

$query = new databaseQuery();
  $hash=password_hash("admin",PASSWORD_DEFAULT);
$str = "INSERT INTO UTENTI
               ( Nome, Cognome, Utente, Password, TipoLogin, Attivo, Amministratore ) 
        values ( ?, ?, ?, ?, ?, ?, ? )";
$par = array( "Amministratore", "", "admin", $hash, "1", "S", "S" );
$rs = $query->executeDirectQueryPar($str, $par);
if($rs){
    echo "utente inserito";
}

$str = "INSERT INTO voci_menu
               ( Voce, File_php, Tipo, Posizione, Attivo) 
        values ( ?, ?, ?, ?, ? )";
$par = array( "Voci menu", "viewVoci_menu.php", "P",10, "S" );
$rs = $query->executeDirectQueryPar($str, $par);
if($rs){
    echo "voce inserita";
}