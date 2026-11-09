<?php

	include_once("base.conf.php");

?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_UTENTI_GRUPPI_ASSEGNATI_INFO);
include_once(CLASS_UTENTI_GRUPPI_ASSEGNATI_GENDAO);
include_once(CLASS_UTENTI_GRUPPI_ASSEGNATI_DAO);
include_once(CLASS_DATABASE_RESULTS_INFO);
?><?php 
// Class Representing the Utenti_gruppi_assegnatiInfo table 
// and DML operations on it from the database
class utenti_gruppi_assegnatiGenManager { 

/** 
* @return returns the insert Id of the inserted Row. DAO will throw exception if error  
* @param a populated instance of object - (Utenti_gruppi_assegnatiInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Utenti_gruppi_assegnatiInfo) object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function createUtenti_gruppi_assegnati($thisUtenti_gruppi_assegnatiInfo) 
{ 

   // Instantiating new instance of Utenti_gruppi_assegnatiDAO 
   $thisUtenti_gruppi_assegnatiDAO = new Utenti_gruppi_assegnatiDAO(); 
   return $thisUtenti_gruppi_assegnatiDAO->createUtenti_gruppi_assegnati($thisUtenti_gruppi_assegnatiInfo);
   

} 



/** 
* @return returns true if update if successful. DAO will throw exception if error  
* @param a populated instance of object - (utenti_gruppi_assegnati) 
* @desc Updates database table row from parameters of (Utenti_gruppi_assegnatiInfo) object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function updateUtenti_gruppi_assegnati($thisUtenti_gruppi_assegnatiInfo,$searchItems="") 
{ 

   // Instantiating new instance of Utenti_gruppi_assegnatiDAO 
   $thisUtenti_gruppi_assegnatiDAO = new Utenti_gruppi_assegnatiDAO(); 
   return $thisUtenti_gruppi_assegnatiDAO->updateUtenti_gruppi_assegnati($thisUtenti_gruppi_assegnatiInfo,$searchItems);
   

} 



/** 
* @return returns true if delete if successful. DAO will throw exception if error  
* @param a populated instance of object - (Utenti_gruppi_assegnatiInfo) 
* @desc Delete database table row from parameters of (Utenti_gruppi_assegnatiInfo) object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function deleteUtenti_gruppi_assegnati($thisUtenti_gruppi_assegnatiInfo,$searchItems="") 
{ 

   // Instantiating new instance of Utenti_gruppi_assegnatiDAO 
   $thisUtenti_gruppi_assegnatiDAO = new Utenti_gruppi_assegnatiDAO(); 
   return $thisUtenti_gruppi_assegnatiDAO->deleteUtenti_gruppi_assegnati($thisUtenti_gruppi_assegnatiInfo,$searchItems);
   

} 



/** 
* @return returns a  (Utenti_gruppi_assegnatiInfo) object if successul or else returns false 
* @param unique id of the object you want to get 
* @desc Searches the database for a (Utenti_gruppi_assegnatiInfo) object  with the passed Id
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function getUtenti_gruppi_assegnatiByPK($Id_gruppo,$Id_utente) 
{ 

   // Instantiating new instance of Utenti_gruppi_assegnatiDAO 
   $thisUtenti_gruppi_assegnatiDAO = new Utenti_gruppi_assegnatiDAO(); 
   return $thisUtenti_gruppi_assegnatiDAO->getUtenti_gruppi_assegnatiByPK($Id_gruppo,$Id_utente);
   

} 



/** 
* @return returns an array  (Utenti_gruppi_assegnatiInfo) object if successul or else returns false 
* @param no params 
* @desc Searches the database for a (Utenti_gruppi_assegnatiInfo) object  with the passed Id
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function getAllUtenti_gruppi_assegnati($start="",$limit="",$sortBy="",$sortOrder="") 
{ 

   // Instantiating new instance of Utenti_gruppi_assegnatiDAO 
   $thisUtenti_gruppi_assegnatiDAO = new Utenti_gruppi_assegnatiDAO(); 
   // this function returns an array of Utenti_gruppi_assegnatiInfo(s) containing all rows in the database   
   return $thisUtenti_gruppi_assegnatiDAO->searchUtenti_gruppi_assegnati("",$start,$limit,"",$sortBy,$sortOrder);
   

} 



/** 
* @return returns an array (Utenti_gruppi_assegnatiInfo) object if successul or else returns false 
* @param field to search on, field Value 
* @desc Searches the database for a Utenti_gruppi_assegnatiInfo object  with the passed field and value
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function searchUtenti_gruppi_assegnati($searchItems,$start="",$limit="",$fieldsToReturn="",$orderBy="",$orderDirection="") 
{ 

   // Instantiating new instance of Utenti_gruppi_assegnatiInfoDAO 
   $thisUtenti_gruppi_assegnatiDAO = new Utenti_gruppi_assegnatiDAO(); 
   // this function returns an array of Utenti_gruppi_assegnatiInfo(s) containing all rows in the database   
   return $thisUtenti_gruppi_assegnatiDAO->searchUtenti_gruppi_assegnati($searchItems,$start,$limit,$fieldsToReturn,$orderBy,$orderDirection);
   

} 



} // end of utenti_gruppi_assegnatiGenManager Class

?>