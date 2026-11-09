<?
// phpCodeGen - versione 14/09/2022
include_once("sintesi_dati_progetto.conf.php");
?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_DATABASE_QUERY);
include_once(CLASS_UTENTI_INFO);
include_once(CLASS_DATABASE_RESULTS_INFO);
include_once(CLASS_SEARCH_UTILS);
?>
<?php 
// Class Representing the UtentiInfo table 
// and DML operations on it from the database

class utentiGenDAO { 

/** 
* @return returns the insert Id of the inserted Row or false on error PROVA  
* @param a populated instance of object - (UtentiInfo) 
* @desc Inserts a new  row in the table populated from parameters of (UtentiInfo object 
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function createUtenti($thisUtentiInfo) 
{ 

   // Building SQL Statement for Inserting New UtentiInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_UTENTI; 
   $sql .= "(";
   if($thisUtentiInfo->getId_utente()!=null){
      $notnull=true;
      $sql .= "".FIELD_UTENTI_ID_UTENTE."";
   };
   if($thisUtentiInfo->getUtente_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_UTENTE_CREAZIONE."";
   };
   if($thisUtentiInfo->getData_ora_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_DATA_ORA_CREAZIONE."";
   };
   if($thisUtentiInfo->getUtente_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_UTENTE_MODIFICA."";
   };
   if($thisUtentiInfo->getData_ora_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_DATA_ORA_MODIFICA."";
   };
   if($thisUtentiInfo->getNome()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_NOME."";
   };
   if($thisUtentiInfo->getCognome()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_COGNOME."";
   };
   if($thisUtentiInfo->getEmail()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_EMAIL."";
   };
   if($thisUtentiInfo->getUtente()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_UTENTE."";
   };
   if($thisUtentiInfo->getDominio()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_DOMINIO."";
   };
   if($thisUtentiInfo->getPassword()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_PASSWORD."";
   };
   if($thisUtentiInfo->getObbligo_cambio_password()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_OBBLIGO_CAMBIO_PASSWORD."";
   };
   if($thisUtentiInfo->getReset_password()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_RESET_PASSWORD."";
   };
   if($thisUtentiInfo->getData_password()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_DATA_PASSWORD."";
   };
   if($thisUtentiInfo->getTipoLogin()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TIPOLOGIN."";
   };
   if($thisUtentiInfo->getAttivo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_ATTIVO."";
   };
   if($thisUtentiInfo->getAmministratore()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_AMMINISTRATORE."";
   };
   if($thisUtentiInfo->getInvia_mail_modifiche()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_INVIA_MAIL_MODIFICHE."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisUtentiInfo->getId_utente()!=null){
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getId_utente()."'";
   };
   if($thisUtentiInfo->getUtente_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getUtente_creazione()."'";
   };
   if($thisUtentiInfo->getData_ora_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getData_ora_creazione()."'";
   };
   if($thisUtentiInfo->getUtente_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getUtente_modifica()."'";
   };
   if($thisUtentiInfo->getData_ora_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getData_ora_modifica()."'";
   };
   if($thisUtentiInfo->getNome()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getNome()."'";
   };
   if($thisUtentiInfo->getCognome()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getCognome()."'";
   };
   if($thisUtentiInfo->getEmail()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getEmail()."'";
   };
   if($thisUtentiInfo->getUtente()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getUtente()."'";
   };
   if($thisUtentiInfo->getDominio()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getDominio()."'";
   };
   if($thisUtentiInfo->getPassword()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getPassword()."'";
   };
   if($thisUtentiInfo->getObbligo_cambio_password()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getObbligo_cambio_password()."'";
   };
   if($thisUtentiInfo->getReset_password()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getReset_password()."'";
   };
   if($thisUtentiInfo->getData_password()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getData_password()."'";
   };
   if($thisUtentiInfo->getTipoLogin()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getTipoLogin()."'";
   };
   if($thisUtentiInfo->getAttivo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getAttivo()."'";
   };
   if($thisUtentiInfo->getAmministratore()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getAmministratore()."'";
   };
   if($thisUtentiInfo->getInvia_mail_modifiche()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getInvia_mail_modifiche()."'";
   };
   $sql .= " )"; 

         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 

                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database.");
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Utenti Table. The SQL Query was : ".$sql);
                 $thisError->setErrorPage($_SERVER['PHP_SELF']);
                 //overiding application settings and quiting program on this error 
                 $thisError->setQuitProgram(true);
                 $thisError->handleError();
                 return false; 
         }
         // Query Execution was successful -- Return Insert Id
         else 
         {
         // Finding the Insert Id of the Inserted Row
         return $thisDatabaseQuery->returnLastInsertId(); 

         } 

} 

/** 
* @return returns the insert Id of the inserted Row or false on error PROVA  
* @param a populated instance of object - (UtentiInfo) 
* @desc Inserts a new  row in the table populated from parameters of (UtentiInfo object 
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function createUtentiNoError($thisUtentiInfo) 
{ 

   // Building SQL Statement for Inserting New UtentiInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_UTENTI; 
   $sql .= "(";
   if($thisUtentiInfo->getId_utente()!=null){
      $notnull=true;
      $sql .= "".FIELD_UTENTI_ID_UTENTE."";
   };
   if($thisUtentiInfo->getUtente_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_UTENTE_CREAZIONE."";
   };
   if($thisUtentiInfo->getData_ora_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_DATA_ORA_CREAZIONE."";
   };
   if($thisUtentiInfo->getUtente_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_UTENTE_MODIFICA."";
   };
   if($thisUtentiInfo->getData_ora_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_DATA_ORA_MODIFICA."";
   };
   if($thisUtentiInfo->getNome()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_NOME."";
   };
   if($thisUtentiInfo->getCognome()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_COGNOME."";
   };
   if($thisUtentiInfo->getEmail()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_EMAIL."";
   };
   if($thisUtentiInfo->getUtente()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_UTENTE."";
   };
   if($thisUtentiInfo->getDominio()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_DOMINIO."";
   };
   if($thisUtentiInfo->getPassword()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_PASSWORD."";
   };
   if($thisUtentiInfo->getObbligo_cambio_password()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_OBBLIGO_CAMBIO_PASSWORD."";
   };
   if($thisUtentiInfo->getReset_password()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_RESET_PASSWORD."";
   };
   if($thisUtentiInfo->getData_password()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_DATA_PASSWORD."";
   };
   if($thisUtentiInfo->getTipoLogin()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TIPOLOGIN."";
   };
   if($thisUtentiInfo->getAttivo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_ATTIVO."";
   };
   if($thisUtentiInfo->getAmministratore()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_AMMINISTRATORE."";
   };
   if($thisUtentiInfo->getInvia_mail_modifiche()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_INVIA_MAIL_MODIFICHE."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisUtentiInfo->getId_utente()!=null){
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getId_utente()."'";
   };
   if($thisUtentiInfo->getUtente_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getUtente_creazione()."'";
   };
   if($thisUtentiInfo->getData_ora_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getData_ora_creazione()."'";
   };
   if($thisUtentiInfo->getUtente_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getUtente_modifica()."'";
   };
   if($thisUtentiInfo->getData_ora_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getData_ora_modifica()."'";
   };
   if($thisUtentiInfo->getNome()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getNome()."'";
   };
   if($thisUtentiInfo->getCognome()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getCognome()."'";
   };
   if($thisUtentiInfo->getEmail()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getEmail()."'";
   };
   if($thisUtentiInfo->getUtente()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getUtente()."'";
   };
   if($thisUtentiInfo->getDominio()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getDominio()."'";
   };
   if($thisUtentiInfo->getPassword()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getPassword()."'";
   };
   if($thisUtentiInfo->getObbligo_cambio_password()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getObbligo_cambio_password()."'";
   };
   if($thisUtentiInfo->getReset_password()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getReset_password()."'";
   };
   if($thisUtentiInfo->getData_password()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getData_password()."'";
   };
   if($thisUtentiInfo->getTipoLogin()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getTipoLogin()."'";
   };
   if($thisUtentiInfo->getAttivo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getAttivo()."'";
   };
   if($thisUtentiInfo->getAmministratore()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getAmministratore()."'";
   };
   if($thisUtentiInfo->getInvia_mail_modifiche()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtentiInfo->getInvia_mail_modifiche()."'";
   };
   $sql .= " )"; 

         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 

                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database.");
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Utenti Table. The SQL Query was : ".$sql);
                 $thisError->setErrorPage($_SERVER['PHP_SELF']);
                 //overiding application settings and quiting program on this error 
                 $thisError->setQuitProgram(false);
                 $thisError->handleError();
                 return false; 
         }
         // Query Execution was successful -- Return Insert Id
         else 
         {
         // Finding the Insert Id of the Inserted Row
         return $thisDatabaseQuery->returnLastInsertId(); 

         } 

}

/** 
* @return returns true if update if successful or false if failure  
* @param a populated instance of object - (UtentiInfo) 
* @desc Updates database table row from parameters of (UtentiInfo) object 
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function updateUtenti($thisUtentiInfo,$thisSearchItems="") 
{ 

   // Building SQL Statement for Inserting New UtentiInfo 
  $i=0;   $sql = ""; 
   $sql .= "UPDATE ".TABLE_UTENTI; 
   $sql .= " SET ";
   if($thisSearchItems=="S")
   if ($thisUtentiInfo->getId_utente()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_ID_UTENTE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_ID_UTENTE." = '".$thisUtentiInfo->getId_utente()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getUtente_creazione()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_UTENTE_CREAZIONE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_UTENTE_CREAZIONE." = '".$thisUtentiInfo->getUtente_creazione()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getData_ora_creazione()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_DATA_ORA_CREAZIONE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_DATA_ORA_CREAZIONE." = '".$thisUtentiInfo->getData_ora_creazione()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getUtente_modifica()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_UTENTE_MODIFICA." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_UTENTE_MODIFICA." = '".$thisUtentiInfo->getUtente_modifica()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getData_ora_modifica()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_DATA_ORA_MODIFICA." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_DATA_ORA_MODIFICA." = '".$thisUtentiInfo->getData_ora_modifica()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getNome()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_NOME." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_NOME." = '".$thisUtentiInfo->getNome()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getCognome()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_COGNOME." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_COGNOME." = '".$thisUtentiInfo->getCognome()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getEmail()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_EMAIL." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_EMAIL." = '".$thisUtentiInfo->getEmail()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getUtente()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_UTENTE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_UTENTE." = '".$thisUtentiInfo->getUtente()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getDominio()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_DOMINIO." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_DOMINIO." = '".$thisUtentiInfo->getDominio()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getPassword()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_PASSWORD." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_PASSWORD." = '".$thisUtentiInfo->getPassword()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getObbligo_cambio_password()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_OBBLIGO_CAMBIO_PASSWORD." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_OBBLIGO_CAMBIO_PASSWORD." = '".$thisUtentiInfo->getObbligo_cambio_password()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getReset_password()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_RESET_PASSWORD." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_RESET_PASSWORD." = '".$thisUtentiInfo->getReset_password()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getData_password()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_DATA_PASSWORD." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_DATA_PASSWORD." = '".$thisUtentiInfo->getData_password()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getTipoLogin()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TIPOLOGIN." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TIPOLOGIN." = '".$thisUtentiInfo->getTipoLogin()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getAttivo()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_ATTIVO." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_ATTIVO." = '".$thisUtentiInfo->getAttivo()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getAmministratore()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_AMMINISTRATORE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_AMMINISTRATORE." = '".$thisUtentiInfo->getAmministratore()."'"; 
      $i++;
  }
   if ($thisUtentiInfo->getInvia_mail_modifiche()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_INVIA_MAIL_MODIFICHE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_INVIA_MAIL_MODIFICHE." = '".$thisUtentiInfo->getInvia_mail_modifiche()."'"; 
      $i++;
  }
   $sql .= " WHERE ";
   $sql .= FIELD_UTENTI_ID_UTENTE."  = '".$thisUtentiInfo->getId_utente()."'";


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 

                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database. ");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do update on Utenti SQL Query : ".$sql);
                 $thisError->setErrorPage($_SERVER['PHP_SELF']);
                 //overiding application settings and quiting program on this error 
                 $thisError->setQuitProgram(true);
                 $thisError->handleError();
                 return false; 
         }
         // Query Execution was successful
         else
          {
                 return true; 
         } 

   

} 

function getFields(){
 return array("Id_utente","Utente_creazione","Data_ora_creazione","Utente_modifica","Data_ora_modifica","Nome","Cognome","Email","Utente","Dominio","Password","Obbligo_cambio_password","Reset_password","Data_password","TipoLogin","Attivo","Amministratore","Invia_mail_modifiche");
}

function getKeys(){
 return array("Id_utente");
}

/** 
* @return returns true if delete if successful or false if failure  
* @param A collection of searchItems of fields onUtentiInfo) 
* @desc Delete database table row from parameters of (UtentiInfo) object 
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function deleteUtenti($thisUtentiInfo,$thisSearchItems="")
{ 

   // Building SQL Statement for Deleting  UtentiInfo 
   $sql = ""; 
   $sql .= "DELETE FROM ".TABLE_UTENTI; 
   $sql .= " WHERE ";
   $sql .= FIELD_UTENTI_ID_UTENTE." = '".$thisUtentiInfo->getId_utente()."' "; 


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 
                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database.");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do delete on Utenti SQL Query : ".$sql);
                 $thisError->setErrorPage($_SERVER['PHP_SELF']);
                 //overiding application settings and quiting program on this error 
                 $thisError->setQuitProgram(true);
                 $thisError->handleError();
                 return false; 
         }
         // Query Execution was successful
         else 
         {
                 return true; 
         } 

   

}

/** 
* @return returns a populated instance of (UtentiInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (UtentiInfo) object from a resultSet
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function searchUtenti($searchItems="",$start="",$limit="",$fieldsToReturn="",
                                                  $sortByField="",$sortOrder="")
{ 

		$thisSearchUtils = new searchUtils();

		$thisSearchUtils->setSearchItems($searchItems);
		$thisSearchUtils->setStart($start);
		$thisSearchUtils->setLimit($limit);
		$thisSearchUtils->setFieldsToReturn($fieldsToReturn);
		$thisSearchUtils->setOrderByField($sortByField);
		$thisSearchUtils->setOrderDirection($sortOrder);
		$thisSearchUtils->setTable(TABLE_UTENTI);
		$sql = $thisSearchUtils->getSearchSQL();

         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $thisDatabaseQuery->setStart($start);
         $thisDatabaseQuery->setLimit($limit); 
         $result = $thisDatabaseQuery->executeQuery(); 

          $thisDatabaseResultsInfo = new databaseResultsInfo(); 

		if ($result==false)
		{

			return $thisDatabaseResultsInfo;

		}
		else
		{

     // Getting ResultSet from Query
     $resultSet = $thisDatabaseQuery->getResultSet();
     $thisUtentiInfoArray = array(); 
     $thisUtentiInfo = new UtentiInfo();

     while (!$resultSet->EOF) 
     { 

           $thisUtentiInfo = $this->populateUtentiInfoFromResultSet($resultSet);
           $thisUtentiInfoArray[] = $thisUtentiInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisUtentiInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
     $thisDatabaseResultsInfo->setSortedBy($thisSearchUtils->getOrderByField());
     $thisDatabaseResultsInfo->setSortOrder($thisSearchUtils->getOrderDirection());

		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function 

/** 
* @return returns a populated instance of (UtentiInfo) which it populates from an sql Query 
* @param an sql Query 
* @desc Populates all matching fields of (UtentiInfo) object from a query
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function searchUtentiFromSql($sql="",$start="",$limit="")
{ 

         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $thisDatabaseQuery->setStart($start);
         $thisDatabaseQuery->setLimit($limit); 
         $result = $thisDatabaseQuery->executeQuery(); 

          $thisDatabaseResultsInfo = new databaseResultsInfo(); 

		if ($result==false)
		{

			return $thisDatabaseResultsInfo;

		}
		else
		{

     // Getting ResultSet from Query
     $resultSet = $thisDatabaseQuery->getResultSet();
     $thisUtentiInfoArray = array(); 
     $thisUtentiInfo = new UtentiInfo();

     while (!$resultSet->EOF) 
     { 

           $thisUtentiInfo = $this->populateUtentiInfoFromResultSet($resultSet);
           $thisUtentiInfoArray[] = $thisUtentiInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisUtentiInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function

/** 
* @return returns a populated instance of class (UtentiInfo) if found in db 
* @param a populated instance of object - (UtentiInfo) 
* @desc Searches and return a populated instance of (UtentiInfo) object 
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function getUtentiByPK($Id_utente) 
{ 

   // Searches for the info object with the passed id 
   $searchItems[] = new searchItem(FIELD_UTENTI_ID_UTENTE,$Id_utente); 

   $dbResultsInfo =  $this->searchUtenti($searchItems); 
   $resultsArray =  $dbResultsInfo->getResultsArray(); 

     // return false if no rows in resultSet 
    if (count($resultsArray)==0) 
    { 

           return false;	 

     } 
     // if getById returns more than 1 row.. there could be something wrong.. deal with it accordingly 
     else if (count($resultsArray)>1) 
     {  
                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 //NOTICE : Change to accomodate your business rules 
                 //overiding application settings emailing admin about this duplicate id issue and sending user the first id 
                 $thisError->setQuitProgram(true);
                 $thisError->setDisplayError(true);
                 $thisError->setEmailAdmin(true);
                 $thisError->setUserErrorMessage("An error  has occured while this application was trying to do some operation on the database. ");
                 $thisError->setProgramErrorMessage("Should get only one row of data. Program retreived more than row--> ".count($resultsArray)." Error Occured when trying to get Info by Id on Table -->Utenti ID --> : ".$pkValue);
                 $thisError->setErrorPage($_SERVER['PHP_SELF']);
                 $thisError->handleError();
                 return false; 
                 // return $resultsArray[0]; 
       } 
       // If resultset contains only one row by id.. then return that info object
      else if (count($resultsArray)==1) 
     { 
               return $resultsArray[0]; 
     } 
   

}

/** 
* @return returns a populated instance of (UtentiInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (UtentiInfo) object from a resultSet
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function populateUtentiInfoFromResultSet($result) 
{ 

           $thisUtentiInfo = new UtentiInfo();

           $thisUtentiInfo->setId_utente($result->fields[FIELD_UTENTI_ID_UTENTE]); 
           $thisUtentiInfo->setUtente_creazione($result->fields[FIELD_UTENTI_UTENTE_CREAZIONE]); 
           $thisUtentiInfo->setData_ora_creazione($result->fields[FIELD_UTENTI_DATA_ORA_CREAZIONE]); 
           $thisUtentiInfo->setUtente_modifica($result->fields[FIELD_UTENTI_UTENTE_MODIFICA]); 
           $thisUtentiInfo->setData_ora_modifica($result->fields[FIELD_UTENTI_DATA_ORA_MODIFICA]); 
           $thisUtentiInfo->setNome($result->fields[FIELD_UTENTI_NOME]); 
           $thisUtentiInfo->setCognome($result->fields[FIELD_UTENTI_COGNOME]); 
           $thisUtentiInfo->setEmail($result->fields[FIELD_UTENTI_EMAIL]); 
           $thisUtentiInfo->setUtente($result->fields[FIELD_UTENTI_UTENTE]); 
           $thisUtentiInfo->setDominio($result->fields[FIELD_UTENTI_DOMINIO]); 
           $thisUtentiInfo->setPassword($result->fields[FIELD_UTENTI_PASSWORD]); 
           $thisUtentiInfo->setObbligo_cambio_password($result->fields[FIELD_UTENTI_OBBLIGO_CAMBIO_PASSWORD]); 
           $thisUtentiInfo->setReset_password($result->fields[FIELD_UTENTI_RESET_PASSWORD]); 
           $thisUtentiInfo->setData_password($result->fields[FIELD_UTENTI_DATA_PASSWORD]); 
           $thisUtentiInfo->setTipoLogin($result->fields[FIELD_UTENTI_TIPOLOGIN]); 
           $thisUtentiInfo->setAttivo($result->fields[FIELD_UTENTI_ATTIVO]); 
           $thisUtentiInfo->setAmministratore($result->fields[FIELD_UTENTI_AMMINISTRATORE]); 
           $thisUtentiInfo->setInvia_mail_modifiche($result->fields[FIELD_UTENTI_INVIA_MAIL_MODIFICHE]); 

           return $thisUtentiInfo;

} // End Function populate

} // end of utentiGenDAO Class

?>