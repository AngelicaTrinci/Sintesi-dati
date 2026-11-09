<?
// phpCodeGen - versione 14/09/2022
include_once("sintesi_dati_progetto.conf.php");
?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_PM_TOSCOTEC_INFO);
include_once(CLASS_PM_TOSCOTEC_GENDAO);
include_once(CLASS_PM_TOSCOTEC_DAO);
include_once(CLASS_DATABASE_RESULTS_INFO);
?><?php 
// Class Representing the Pm_toscotecInfo table 
// and DML operations on it from the database
class pm_toscotecGenManager { 

/** 
* @return returns the insert Id of the inserted Row. DAO will throw exception if error  
* @param a populated instance of object - (Pm_toscotecInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Pm_toscotecInfo) object 
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function createPm_toscotec($thisPm_toscotecInfo) 
{ 

   // Instantiating new instance of Pm_toscotecDAO 
   $thisPm_toscotecDAO = new Pm_toscotecDAO(); 
   return $thisPm_toscotecDAO->createPm_toscotec($thisPm_toscotecInfo);
   

} 



/** 
* @return returns true if update if successful. DAO will throw exception if error  
* @param a populated instance of object - (pm_toscotec) 
* @desc Updates database table row from parameters of (Pm_toscotecInfo) object 
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function updatePm_toscotec($thisPm_toscotecInfo,$searchItems="") 
{ 

   // Instantiating new instance of Pm_toscotecDAO 
   $thisPm_toscotecDAO = new Pm_toscotecDAO(); 
   return $thisPm_toscotecDAO->updatePm_toscotec($thisPm_toscotecInfo,$searchItems);
   

} 



/** 
* @return returns true if delete if successful. DAO will throw exception if error  
* @param a populated instance of object - (Pm_toscotecInfo) 
* @desc Delete database table row from parameters of (Pm_toscotecInfo) object 
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function deletePm_toscotec($thisPm_toscotecInfo,$searchItems="") 
{ 

   // Instantiating new instance of Pm_toscotecDAO 
   $thisPm_toscotecDAO = new Pm_toscotecDAO(); 
   return $thisPm_toscotecDAO->deletePm_toscotec($thisPm_toscotecInfo,$searchItems);
   

} 



/** 
* @return returns a  (Pm_toscotecInfo) object if successul or else returns false 
* @param unique id of the object you want to get 
* @desc Searches the database for a (Pm_toscotecInfo) object  with the passed Id
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function getPm_toscotecByPK($Id) 
{ 

   // Instantiating new instance of Pm_toscotecDAO 
   $thisPm_toscotecDAO = new Pm_toscotecDAO(); 
   return $thisPm_toscotecDAO->getPm_toscotecByPK($Id);
   

} 



/** 
* @return returns an array  (Pm_toscotecInfo) object if successul or else returns false 
* @param no params 
* @desc Searches the database for a (Pm_toscotecInfo) object  with the passed Id
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function getAllPm_toscotec($start="",$limit="",$sortBy="",$sortOrder="") 
{ 

   // Instantiating new instance of Pm_toscotecDAO 
   $thisPm_toscotecDAO = new Pm_toscotecDAO(); 
   // this function returns an array of Pm_toscotecInfo(s) containing all rows in the database   
   return $thisPm_toscotecDAO->searchPm_toscotec("",$start,$limit,"",$sortBy,$sortOrder);
   

} 



/** 
* @return returns an array (Pm_toscotecInfo) object if successul or else returns false 
* @param field to search on, field Value 
* @desc Searches the database for a Pm_toscotecInfo object  with the passed field and value
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function searchPm_toscotec($searchItems,$start="",$limit="",$fieldsToReturn="",$orderBy="",$orderDirection="") 
{ 

   // Instantiating new instance of Pm_toscotecInfoDAO 
   $thisPm_toscotecDAO = new Pm_toscotecDAO(); 
   // this function returns an array of Pm_toscotecInfo(s) containing all rows in the database   
   return $thisPm_toscotecDAO->searchPm_toscotec($searchItems,$start,$limit,$fieldsToReturn,$orderBy,$orderDirection);
   

} 



} // end of pm_toscotecGenManager Class

?>