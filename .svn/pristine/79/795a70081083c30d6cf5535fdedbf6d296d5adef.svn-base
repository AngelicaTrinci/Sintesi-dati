<?
// phpCodeGen - versione 14/09/2022
include_once("sintesi_dati_progetto.conf.php");
?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_DATABASE_QUERY);
include_once(CLASS_PM_TOSCOTEC_INFO);
include_once(CLASS_DATABASE_RESULTS_INFO);
include_once(CLASS_SEARCH_UTILS);
?>
<?php 
// Class Representing the Pm_toscotecInfo table 
// and DML operations on it from the database

class pm_toscotecGenDAO { 

/** 
* @return returns the insert Id of the inserted Row or false on error PROVA  
* @param a populated instance of object - (Pm_toscotecInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Pm_toscotecInfo object 
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function createPm_toscotec($thisPm_toscotecInfo) 
{ 

   // Building SQL Statement for Inserting New Pm_toscotecInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_PM_TOSCOTEC; 
   $sql .= "(";
   if($thisPm_toscotecInfo->getId()!=null){
      $notnull=true;
      $sql .= "".FIELD_PM_TOSCOTEC_ID."";
   };
   if($thisPm_toscotecInfo->getNome()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_PM_TOSCOTEC_NOME."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisPm_toscotecInfo->getId()!=null){
      $notnull=true;
      $sql .= "'".$thisPm_toscotecInfo->getId()."'";
   };
   if($thisPm_toscotecInfo->getNome()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisPm_toscotecInfo->getNome()."'";
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
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Pm_toscotec Table. The SQL Query was : ".$sql);
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
* @param a populated instance of object - (Pm_toscotecInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Pm_toscotecInfo object 
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function createPm_toscotecNoError($thisPm_toscotecInfo) 
{ 

   // Building SQL Statement for Inserting New Pm_toscotecInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_PM_TOSCOTEC; 
   $sql .= "(";
   if($thisPm_toscotecInfo->getId()!=null){
      $notnull=true;
      $sql .= "".FIELD_PM_TOSCOTEC_ID."";
   };
   if($thisPm_toscotecInfo->getNome()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_PM_TOSCOTEC_NOME."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisPm_toscotecInfo->getId()!=null){
      $notnull=true;
      $sql .= "'".$thisPm_toscotecInfo->getId()."'";
   };
   if($thisPm_toscotecInfo->getNome()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisPm_toscotecInfo->getNome()."'";
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
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Pm_toscotec Table. The SQL Query was : ".$sql);
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
* @param a populated instance of object - (Pm_toscotecInfo) 
* @desc Updates database table row from parameters of (Pm_toscotecInfo) object 
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function updatePm_toscotec($thisPm_toscotecInfo,$thisSearchItems="") 
{ 

   // Building SQL Statement for Inserting New Pm_toscotecInfo 
  $i=0;   $sql = ""; 
   $sql .= "UPDATE ".TABLE_PM_TOSCOTEC; 
   $sql .= " SET ";
   if($thisSearchItems=="S")
   if ($thisPm_toscotecInfo->getId()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_PM_TOSCOTEC_ID." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_PM_TOSCOTEC_ID." = '".$thisPm_toscotecInfo->getId()."'"; 
      $i++;
  }
   if ($thisPm_toscotecInfo->getNome()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_PM_TOSCOTEC_NOME." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_PM_TOSCOTEC_NOME." = '".$thisPm_toscotecInfo->getNome()."'"; 
      $i++;
  }
   $sql .= " WHERE ";
   $sql .= FIELD_PM_TOSCOTEC_ID."  = '".$thisPm_toscotecInfo->getId()."'";


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 

                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database. ");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do update on Pm_toscotec SQL Query : ".$sql);
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
 return array("Id","Nome");
}

function getKeys(){
 return array("Id");
}

/** 
* @return returns true if delete if successful or false if failure  
* @param A collection of searchItems of fields onPm_toscotecInfo) 
* @desc Delete database table row from parameters of (Pm_toscotecInfo) object 
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function deletePm_toscotec($thisPm_toscotecInfo,$thisSearchItems="")
{ 

   // Building SQL Statement for Deleting  Pm_toscotecInfo 
   $sql = ""; 
   $sql .= "DELETE FROM ".TABLE_PM_TOSCOTEC; 
   $sql .= " WHERE ";
   $sql .= FIELD_PM_TOSCOTEC_ID." = '".$thisPm_toscotecInfo->getId()."' "; 


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 
                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database.");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do delete on Pm_toscotec SQL Query : ".$sql);
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
* @return returns a populated instance of (Pm_toscotecInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (Pm_toscotecInfo) object from a resultSet
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function searchPm_toscotec($searchItems="",$start="",$limit="",$fieldsToReturn="",
                                                  $sortByField="",$sortOrder="")
{ 

		$thisSearchUtils = new searchUtils();

		$thisSearchUtils->setSearchItems($searchItems);
		$thisSearchUtils->setStart($start);
		$thisSearchUtils->setLimit($limit);
		$thisSearchUtils->setFieldsToReturn($fieldsToReturn);
		$thisSearchUtils->setOrderByField($sortByField);
		$thisSearchUtils->setOrderDirection($sortOrder);
		$thisSearchUtils->setTable(TABLE_PM_TOSCOTEC);
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
     $thisPm_toscotecInfoArray = array(); 
     $thisPm_toscotecInfo = new Pm_toscotecInfo();

     while (!$resultSet->EOF) 
     { 

           $thisPm_toscotecInfo = $this->populatePm_toscotecInfoFromResultSet($resultSet);
           $thisPm_toscotecInfoArray[] = $thisPm_toscotecInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisPm_toscotecInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
     $thisDatabaseResultsInfo->setSortedBy($thisSearchUtils->getOrderByField());
     $thisDatabaseResultsInfo->setSortOrder($thisSearchUtils->getOrderDirection());

		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function 

/** 
* @return returns a populated instance of (Pm_toscotecInfo) which it populates from an sql Query 
* @param an sql Query 
* @desc Populates all matching fields of (Pm_toscotecInfo) object from a query
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function searchPm_toscotecFromSql($sql="",$start="",$limit="")
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
     $thisPm_toscotecInfoArray = array(); 
     $thisPm_toscotecInfo = new Pm_toscotecInfo();

     while (!$resultSet->EOF) 
     { 

           $thisPm_toscotecInfo = $this->populatePm_toscotecInfoFromResultSet($resultSet);
           $thisPm_toscotecInfoArray[] = $thisPm_toscotecInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisPm_toscotecInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function

/** 
* @return returns a populated instance of class (Pm_toscotecInfo) if found in db 
* @param a populated instance of object - (Pm_toscotecInfo) 
* @desc Searches and return a populated instance of (Pm_toscotecInfo) object 
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function getPm_toscotecByPK($Id) 
{ 

   // Searches for the info object with the passed id 
   $searchItems[] = new searchItem(FIELD_PM_TOSCOTEC_ID,$Id); 

   $dbResultsInfo =  $this->searchPm_toscotec($searchItems); 
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
                 $thisError->setProgramErrorMessage("Should get only one row of data. Program retreived more than row--> ".count($resultsArray)." Error Occured when trying to get Info by Id on Table -->Pm_toscotec ID --> : ".$pkValue);
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
* @return returns a populated instance of (Pm_toscotecInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (Pm_toscotecInfo) object from a resultSet
* @generationDate 2025-11-18
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function populatePm_toscotecInfoFromResultSet($result) 
{ 

           $thisPm_toscotecInfo = new Pm_toscotecInfo();

           $thisPm_toscotecInfo->setId($result->fields[FIELD_PM_TOSCOTEC_ID]); 
           $thisPm_toscotecInfo->setNome($result->fields[FIELD_PM_TOSCOTEC_NOME]); 

           return $thisPm_toscotecInfo;

} // End Function populate

} // end of pm_toscotecGenDAO Class

?>