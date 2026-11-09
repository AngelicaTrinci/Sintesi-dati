<?
session_start();
include_once("sintesi_dati_progetto.conf.php");
include_once(CONFIG_FILE);
include_once(CLASS_REQUEST_UTILS);
require_once CLASS_UTENTI_MANAGER;
require_once CLASS_UTENTI_GRUPPI_ASSEGNATI_MANAGER;
include_once("include/autorizzazioni.php");

//require_once "autorizzazioni_applicativo.php";
//$autorizzazioni_applicativo = new Autorizzazioni_applicativo();
//var_dump( $autorizzazioni_applicativo );


class Autorizzazioni_applicativo{
    
    public $utente                   = false;
    public $nome                     = false;
    public $email                    = false;
    public $amministratore           = false;
    
    
    public function __construct() {
        
        $this->utente = $_SESSION[PREFISSO_SESSIONE."_utente_codice"];
        if( trim($this->utente)!="" && $this->utente!=0 && is_numeric($this->utente)){
            $thisUtenti_manager = new utentiManager();
            $thisUtenti_info = $thisUtenti_manager->getUtentiByPK($this->utente);
            if($thisUtenti_info && $thisUtenti_info->Attivo=="S" ){
                
                $this->nome = $thisUtenti_info->Nome." ".$thisUtenti_info->Cognome;
                $this->email = $thisUtenti_info->Email;
                
                if( $thisUtenti_info->Amministratore=="S" ){
                    $this->amministratore = true;
                }
                
                
            }
        }
        
    }
    
    public function check_gruppo( $Id_gruppo ){
        $thisUtenti_gruppi_assegnati_manager = new utenti_gruppi_assegnatiManager();
        $thisUtenti_gruppi_assegnati_info = $thisUtenti_gruppi_assegnati_manager->getUtenti_gruppi_assegnatiByPK($Id_gruppo, $this->utente);
        if( $thisUtenti_gruppi_assegnati_info ){
            return true;
        }
        return false;
    }
    
    
}