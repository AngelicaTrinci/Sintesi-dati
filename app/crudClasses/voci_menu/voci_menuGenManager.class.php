<?php

	include_once("base.conf.php");

?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_VOCI_MENU_INFO);
include_once(CLASS_VOCI_MENU_GENDAO);
include_once(CLASS_VOCI_MENU_DAO);
include_once(CLASS_DATABASE_RESULTS_INFO);
?><?php 
// Class Representing the Voci_menuInfo table 
// and DML operations on it from the database
class voci_menuGenManager { 

/** 
* @return returns the insert Id of the inserted Row. DAO will throw exception if error  
* @param a populated instance of object - (Voci_menuInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Voci_menuInfo) object 
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function createVoci_menu($thisVoci_menuInfo) 
{ 

   // Instantiating new instance of Voci_menuDAO 
   $thisVoci_menuDAO = new Voci_menuDAO(); 
   return $thisVoci_menuDAO->createVoci_menu($thisVoci_menuInfo);
   

} 



/** 
* @return returns true if update if successful. DAO will throw exception if error  
* @param a populated instance of object - (voci_menu) 
* @desc Updates database table row from parameters of (Voci_menuInfo) object 
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function updateVoci_menu($thisVoci_menuInfo,$searchItems="") 
{ 

   // Instantiating new instance of Voci_menuDAO 
   $thisVoci_menuDAO = new Voci_menuDAO(); 
   return $thisVoci_menuDAO->updateVoci_menu($thisVoci_menuInfo,$searchItems);
   

} 



/** 
* @return returns true if delete if successful. DAO will throw exception if error  
* @param a populated instance of object - (Voci_menuInfo) 
* @desc Delete database table row from parameters of (Voci_menuInfo) object 
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function deleteVoci_menu($thisVoci_menuInfo,$searchItems="") 
{ 

   // Instantiating new instance of Voci_menuDAO 
   $thisVoci_menuDAO = new Voci_menuDAO(); 
   return $thisVoci_menuDAO->deleteVoci_menu($thisVoci_menuInfo,$searchItems);
   

} 



/** 
* @return returns a  (Voci_menuInfo) object if successul or else returns false 
* @param unique id of the object you want to get 
* @desc Searches the database for a (Voci_menuInfo) object  with the passed Id
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function getVoci_menuByPK($Id_voce) 
{ 

   // Instantiating new instance of Voci_menuDAO 
   $thisVoci_menuDAO = new Voci_menuDAO(); 
   return $thisVoci_menuDAO->getVoci_menuByPK($Id_voce);
   

} 



/** 
* @return returns an array  (Voci_menuInfo) object if successul or else returns false 
* @param no params 
* @desc Searches the database for a (Voci_menuInfo) object  with the passed Id
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function getAllVoci_menu($start="",$limit="",$sortBy="",$sortOrder="") 
{ 

   // Instantiating new instance of Voci_menuDAO 
   $thisVoci_menuDAO = new Voci_menuDAO(); 
   // this function returns an array of Voci_menuInfo(s) containing all rows in the database   
   return $thisVoci_menuDAO->searchVoci_menu("",$start,$limit,"",$sortBy,$sortOrder);
   

} 



/** 
* @return returns an array (Voci_menuInfo) object if successul or else returns false 
* @param field to search on, field Value 
* @desc Searches the database for a Voci_menuInfo object  with the passed field and value
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function searchVoci_menu($searchItems,$start="",$limit="",$fieldsToReturn="",$orderBy="",$orderDirection="") 
{ 

   // Instantiating new instance of Voci_menuInfoDAO 
   $thisVoci_menuDAO = new Voci_menuDAO(); 
   // this function returns an array of Voci_menuInfo(s) containing all rows in the database   
   return $thisVoci_menuDAO->searchVoci_menu($searchItems,$start,$limit,$fieldsToReturn,$orderBy,$orderDirection);
   

} 



} // end of voci_menuGenManager Class

?>