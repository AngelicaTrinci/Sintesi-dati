<?
// phpCodeGen - versione 14/09/2022
include_once("sintesi_dati_progetto.conf.php");
?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_UTENTI_INFO);
include_once(CLASS_UTENTI_GENDAO);
include_once(CLASS_UTENTI_DAO);
include_once(CLASS_DATABASE_RESULTS_INFO);
?><?php 
// Class Representing the UtentiInfo table 
// and DML operations on it from the database
class utentiGenManager { 

/** 
* @return returns the insert Id of the inserted Row. DAO will throw exception if error  
* @param a populated instance of object - (UtentiInfo) 
* @desc Inserts a new  row in the table populated from parameters of (UtentiInfo) object 
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function createUtenti($thisUtentiInfo) 
{ 

   // Instantiating new instance of UtentiDAO 
   $thisUtentiDAO = new UtentiDAO(); 
   return $thisUtentiDAO->createUtenti($thisUtentiInfo);
   

} 



/** 
* @return returns true if update if successful. DAO will throw exception if error  
* @param a populated instance of object - (utenti) 
* @desc Updates database table row from parameters of (UtentiInfo) object 
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function updateUtenti($thisUtentiInfo,$searchItems="") 
{ 

   // Instantiating new instance of UtentiDAO 
   $thisUtentiDAO = new UtentiDAO(); 
   return $thisUtentiDAO->updateUtenti($thisUtentiInfo,$searchItems);
   

} 



/** 
* @return returns true if delete if successful. DAO will throw exception if error  
* @param a populated instance of object - (UtentiInfo) 
* @desc Delete database table row from parameters of (UtentiInfo) object 
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function deleteUtenti($thisUtentiInfo,$searchItems="") 
{ 

   // Instantiating new instance of UtentiDAO 
   $thisUtentiDAO = new UtentiDAO(); 
   return $thisUtentiDAO->deleteUtenti($thisUtentiInfo,$searchItems);
   

} 



/** 
* @return returns a  (UtentiInfo) object if successul or else returns false 
* @param unique id of the object you want to get 
* @desc Searches the database for a (UtentiInfo) object  with the passed Id
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function getUtentiByPK($Id_utente) 
{ 

   // Instantiating new instance of UtentiDAO 
   $thisUtentiDAO = new UtentiDAO(); 
   return $thisUtentiDAO->getUtentiByPK($Id_utente);
   

} 



/** 
* @return returns an array  (UtentiInfo) object if successul or else returns false 
* @param no params 
* @desc Searches the database for a (UtentiInfo) object  with the passed Id
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function getAllUtenti($start="",$limit="",$sortBy="",$sortOrder="") 
{ 

   // Instantiating new instance of UtentiDAO 
   $thisUtentiDAO = new UtentiDAO(); 
   // this function returns an array of UtentiInfo(s) containing all rows in the database   
   return $thisUtentiDAO->searchUtenti("",$start,$limit,"",$sortBy,$sortOrder);
   

} 



/** 
* @return returns an array (UtentiInfo) object if successul or else returns false 
* @param field to search on, field Value 
* @desc Searches the database for a UtentiInfo object  with the passed field and value
* @generationDate 2026-01-29
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2026, Delta Informatica 
*/ 
function searchUtenti($searchItems,$start="",$limit="",$fieldsToReturn="",$orderBy="",$orderDirection="") 
{ 

   // Instantiating new instance of UtentiInfoDAO 
   $thisUtentiDAO = new UtentiDAO(); 
   // this function returns an array of UtentiInfo(s) containing all rows in the database   
   return $thisUtentiDAO->searchUtenti($searchItems,$start,$limit,$fieldsToReturn,$orderBy,$orderDirection);
   

} 



} // end of utentiGenManager Class

?>