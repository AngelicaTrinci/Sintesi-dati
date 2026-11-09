<?php

	include_once("base.conf.php");

?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_UTENTI_GRUPPI_INFO);
include_once(CLASS_UTENTI_GRUPPI_GENDAO);
include_once(CLASS_UTENTI_GRUPPI_DAO);
include_once(CLASS_DATABASE_RESULTS_INFO);
?><?php 
// Class Representing the Utenti_gruppiInfo table 
// and DML operations on it from the database
class utenti_gruppiGenManager { 

/** 
* @return returns the insert Id of the inserted Row. DAO will throw exception if error  
* @param a populated instance of object - (Utenti_gruppiInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Utenti_gruppiInfo) object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function createUtenti_gruppi($thisUtenti_gruppiInfo) 
{ 

   // Instantiating new instance of Utenti_gruppiDAO 
   $thisUtenti_gruppiDAO = new Utenti_gruppiDAO(); 
   return $thisUtenti_gruppiDAO->createUtenti_gruppi($thisUtenti_gruppiInfo);
   

} 



/** 
* @return returns true if update if successful. DAO will throw exception if error  
* @param a populated instance of object - (utenti_gruppi) 
* @desc Updates database table row from parameters of (Utenti_gruppiInfo) object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function updateUtenti_gruppi($thisUtenti_gruppiInfo,$searchItems="") 
{ 

   // Instantiating new instance of Utenti_gruppiDAO 
   $thisUtenti_gruppiDAO = new Utenti_gruppiDAO(); 
   return $thisUtenti_gruppiDAO->updateUtenti_gruppi($thisUtenti_gruppiInfo,$searchItems);
   

} 



/** 
* @return returns true if delete if successful. DAO will throw exception if error  
* @param a populated instance of object - (Utenti_gruppiInfo) 
* @desc Delete database table row from parameters of (Utenti_gruppiInfo) object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function deleteUtenti_gruppi($thisUtenti_gruppiInfo,$searchItems="") 
{ 

   // Instantiating new instance of Utenti_gruppiDAO 
   $thisUtenti_gruppiDAO = new Utenti_gruppiDAO(); 
   return $thisUtenti_gruppiDAO->deleteUtenti_gruppi($thisUtenti_gruppiInfo,$searchItems);
   

} 



/** 
* @return returns a  (Utenti_gruppiInfo) object if successul or else returns false 
* @param unique id of the object you want to get 
* @desc Searches the database for a (Utenti_gruppiInfo) object  with the passed Id
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function getUtenti_gruppiByPK($Id_gruppo) 
{ 

   // Instantiating new instance of Utenti_gruppiDAO 
   $thisUtenti_gruppiDAO = new Utenti_gruppiDAO(); 
   return $thisUtenti_gruppiDAO->getUtenti_gruppiByPK($Id_gruppo);
   

} 



/** 
* @return returns an array  (Utenti_gruppiInfo) object if successul or else returns false 
* @param no params 
* @desc Searches the database for a (Utenti_gruppiInfo) object  with the passed Id
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function getAllUtenti_gruppi($start="",$limit="",$sortBy="",$sortOrder="") 
{ 

   // Instantiating new instance of Utenti_gruppiDAO 
   $thisUtenti_gruppiDAO = new Utenti_gruppiDAO(); 
   // this function returns an array of Utenti_gruppiInfo(s) containing all rows in the database   
   return $thisUtenti_gruppiDAO->searchUtenti_gruppi("",$start,$limit,"",$sortBy,$sortOrder);
   

} 



/** 
* @return returns an array (Utenti_gruppiInfo) object if successul or else returns false 
* @param field to search on, field Value 
* @desc Searches the database for a Utenti_gruppiInfo object  with the passed field and value
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function searchUtenti_gruppi($searchItems,$start="",$limit="",$fieldsToReturn="",$orderBy="",$orderDirection="") 
{ 

   // Instantiating new instance of Utenti_gruppiInfoDAO 
   $thisUtenti_gruppiDAO = new Utenti_gruppiDAO(); 
   // this function returns an array of Utenti_gruppiInfo(s) containing all rows in the database   
   return $thisUtenti_gruppiDAO->searchUtenti_gruppi($searchItems,$start,$limit,$fieldsToReturn,$orderBy,$orderDirection);
   

} 



} // end of utenti_gruppiGenManager Class

?>