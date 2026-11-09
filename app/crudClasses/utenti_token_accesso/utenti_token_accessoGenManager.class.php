<?php

	include_once("base.conf.php");

?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_UTENTI_TOKEN_ACCESSO_INFO);
include_once(CLASS_UTENTI_TOKEN_ACCESSO_GENDAO);
include_once(CLASS_UTENTI_TOKEN_ACCESSO_DAO);
include_once(CLASS_DATABASE_RESULTS_INFO);
?><?php 
// Class Representing the Utenti_token_accessoInfo table 
// and DML operations on it from the database
class utenti_token_accessoGenManager { 

/** 
* @return returns the insert Id of the inserted Row. DAO will throw exception if error  
* @param a populated instance of object - (Utenti_token_accessoInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Utenti_token_accessoInfo) object 
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function createUtenti_token_accesso($thisUtenti_token_accessoInfo) 
{ 

   // Instantiating new instance of Utenti_token_accessoDAO 
   $thisUtenti_token_accessoDAO = new Utenti_token_accessoDAO(); 
   return $thisUtenti_token_accessoDAO->createUtenti_token_accesso($thisUtenti_token_accessoInfo);
   

} 



/** 
* @return returns true if update if successful. DAO will throw exception if error  
* @param a populated instance of object - (utenti_token_accesso) 
* @desc Updates database table row from parameters of (Utenti_token_accessoInfo) object 
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function updateUtenti_token_accesso($thisUtenti_token_accessoInfo,$searchItems="") 
{ 

   // Instantiating new instance of Utenti_token_accessoDAO 
   $thisUtenti_token_accessoDAO = new Utenti_token_accessoDAO(); 
   return $thisUtenti_token_accessoDAO->updateUtenti_token_accesso($thisUtenti_token_accessoInfo,$searchItems);
   

} 



/** 
* @return returns true if delete if successful. DAO will throw exception if error  
* @param a populated instance of object - (Utenti_token_accessoInfo) 
* @desc Delete database table row from parameters of (Utenti_token_accessoInfo) object 
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function deleteUtenti_token_accesso($thisUtenti_token_accessoInfo,$searchItems="") 
{ 

   // Instantiating new instance of Utenti_token_accessoDAO 
   $thisUtenti_token_accessoDAO = new Utenti_token_accessoDAO(); 
   return $thisUtenti_token_accessoDAO->deleteUtenti_token_accesso($thisUtenti_token_accessoInfo,$searchItems);
   

} 



/** 
* @return returns a  (Utenti_token_accessoInfo) object if successul or else returns false 
* @param unique id of the object you want to get 
* @desc Searches the database for a (Utenti_token_accessoInfo) object  with the passed Id
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function getUtenti_token_accessoByPK($Token) 
{ 

   // Instantiating new instance of Utenti_token_accessoDAO 
   $thisUtenti_token_accessoDAO = new Utenti_token_accessoDAO(); 
   return $thisUtenti_token_accessoDAO->getUtenti_token_accessoByPK($Token);
   

} 



/** 
* @return returns an array  (Utenti_token_accessoInfo) object if successul or else returns false 
* @param no params 
* @desc Searches the database for a (Utenti_token_accessoInfo) object  with the passed Id
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function getAllUtenti_token_accesso($start="",$limit="",$sortBy="",$sortOrder="") 
{ 

   // Instantiating new instance of Utenti_token_accessoDAO 
   $thisUtenti_token_accessoDAO = new Utenti_token_accessoDAO(); 
   // this function returns an array of Utenti_token_accessoInfo(s) containing all rows in the database   
   return $thisUtenti_token_accessoDAO->searchUtenti_token_accesso("",$start,$limit,"",$sortBy,$sortOrder);
   

} 



/** 
* @return returns an array (Utenti_token_accessoInfo) object if successul or else returns false 
* @param field to search on, field Value 
* @desc Searches the database for a Utenti_token_accessoInfo object  with the passed field and value
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function searchUtenti_token_accesso($searchItems,$start="",$limit="",$fieldsToReturn="",$orderBy="",$orderDirection="") 
{ 

   // Instantiating new instance of Utenti_token_accessoInfoDAO 
   $thisUtenti_token_accessoDAO = new Utenti_token_accessoDAO(); 
   // this function returns an array of Utenti_token_accessoInfo(s) containing all rows in the database   
   return $thisUtenti_token_accessoDAO->searchUtenti_token_accesso($searchItems,$start,$limit,$fieldsToReturn,$orderBy,$orderDirection);
   

} 



} // end of utenti_token_accessoGenManager Class

?>