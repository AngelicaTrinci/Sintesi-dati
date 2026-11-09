<?
// phpCodeGen - versione 14/09/2022
include_once("sintesi_dati_progetto.conf.php");
?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_TERMINI_DI_CONSEGNA_INFO);
include_once(CLASS_TERMINI_DI_CONSEGNA_GENDAO);
include_once(CLASS_TERMINI_DI_CONSEGNA_DAO);
include_once(CLASS_DATABASE_RESULTS_INFO);
?><?php 
// Class Representing the Termini_di_consegnaInfo table 
// and DML operations on it from the database
class termini_di_consegnaGenManager { 

/** 
* @return returns the insert Id of the inserted Row. DAO will throw exception if error  
* @param a populated instance of object - (Termini_di_consegnaInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Termini_di_consegnaInfo) object 
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function createTermini_di_consegna($thisTermini_di_consegnaInfo) 
{ 

   // Instantiating new instance of Termini_di_consegnaDAO 
   $thisTermini_di_consegnaDAO = new Termini_di_consegnaDAO(); 
   return $thisTermini_di_consegnaDAO->createTermini_di_consegna($thisTermini_di_consegnaInfo);
   

} 



/** 
* @return returns true if update if successful. DAO will throw exception if error  
* @param a populated instance of object - (termini_di_consegna) 
* @desc Updates database table row from parameters of (Termini_di_consegnaInfo) object 
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function updateTermini_di_consegna($thisTermini_di_consegnaInfo,$searchItems="") 
{ 

   // Instantiating new instance of Termini_di_consegnaDAO 
   $thisTermini_di_consegnaDAO = new Termini_di_consegnaDAO(); 
   return $thisTermini_di_consegnaDAO->updateTermini_di_consegna($thisTermini_di_consegnaInfo,$searchItems);
   

} 



/** 
* @return returns true if delete if successful. DAO will throw exception if error  
* @param a populated instance of object - (Termini_di_consegnaInfo) 
* @desc Delete database table row from parameters of (Termini_di_consegnaInfo) object 
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function deleteTermini_di_consegna($thisTermini_di_consegnaInfo,$searchItems="") 
{ 

   // Instantiating new instance of Termini_di_consegnaDAO 
   $thisTermini_di_consegnaDAO = new Termini_di_consegnaDAO(); 
   return $thisTermini_di_consegnaDAO->deleteTermini_di_consegna($thisTermini_di_consegnaInfo,$searchItems);
   

} 



/** 
* @return returns a  (Termini_di_consegnaInfo) object if successul or else returns false 
* @param unique id of the object you want to get 
* @desc Searches the database for a (Termini_di_consegnaInfo) object  with the passed Id
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function getTermini_di_consegnaByPK($codice) 
{ 

   // Instantiating new instance of Termini_di_consegnaDAO 
   $thisTermini_di_consegnaDAO = new Termini_di_consegnaDAO(); 
   return $thisTermini_di_consegnaDAO->getTermini_di_consegnaByPK($codice);
   

} 



/** 
* @return returns an array  (Termini_di_consegnaInfo) object if successul or else returns false 
* @param no params 
* @desc Searches the database for a (Termini_di_consegnaInfo) object  with the passed Id
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function getAllTermini_di_consegna($start="",$limit="",$sortBy="",$sortOrder="") 
{ 

   // Instantiating new instance of Termini_di_consegnaDAO 
   $thisTermini_di_consegnaDAO = new Termini_di_consegnaDAO(); 
   // this function returns an array of Termini_di_consegnaInfo(s) containing all rows in the database   
   return $thisTermini_di_consegnaDAO->searchTermini_di_consegna("",$start,$limit,"",$sortBy,$sortOrder);
   

} 



/** 
* @return returns an array (Termini_di_consegnaInfo) object if successul or else returns false 
* @param field to search on, field Value 
* @desc Searches the database for a Termini_di_consegnaInfo object  with the passed field and value
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function searchTermini_di_consegna($searchItems,$start="",$limit="",$fieldsToReturn="",$orderBy="",$orderDirection="") 
{ 

   // Instantiating new instance of Termini_di_consegnaInfoDAO 
   $thisTermini_di_consegnaDAO = new Termini_di_consegnaDAO(); 
   // this function returns an array of Termini_di_consegnaInfo(s) containing all rows in the database   
   return $thisTermini_di_consegnaDAO->searchTermini_di_consegna($searchItems,$start,$limit,$fieldsToReturn,$orderBy,$orderDirection);
   

} 



} // end of termini_di_consegnaGenManager Class

?>