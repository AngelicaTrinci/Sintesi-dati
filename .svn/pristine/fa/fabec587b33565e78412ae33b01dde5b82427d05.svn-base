<?php

	include_once("base.conf.php");

?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_DATABASE_QUERY);
include_once(CLASS_UTENTI_GRUPPI_ASSEGNATI_INFO);
include_once(CLASS_DATABASE_RESULTS_INFO);
include_once(CLASS_SEARCH_UTILS);
?>
<?php 
// Class Representing the Utenti_gruppi_assegnatiInfo table 
// and DML operations on it from the database

class utenti_gruppi_assegnatiGenDAO { 

/** 
* @return returns the insert Id of the inserted Row or false on error PROVA  
* @param a populated instance of object - (Utenti_gruppi_assegnatiInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Utenti_gruppi_assegnatiInfo object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function createUtenti_gruppi_assegnati($thisUtenti_gruppi_assegnatiInfo) 
{ 

   // Building SQL Statement for Inserting New Utenti_gruppi_assegnatiInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_UTENTI_GRUPPI_ASSEGNATI; 
   $sql .= "(";
   if($thisUtenti_gruppi_assegnatiInfo->getId_gruppo()!=null){
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_GRUPPO."";
   };
   if($thisUtenti_gruppi_assegnatiInfo->getId_utente()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_UTENTE."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisUtenti_gruppi_assegnatiInfo->getId_gruppo()!=null){
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppi_assegnatiInfo->getId_gruppo()."'";
   };
   if($thisUtenti_gruppi_assegnatiInfo->getId_utente()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppi_assegnatiInfo->getId_utente()."'";
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
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Utenti_gruppi_assegnati Table. The SQL Query was : ".$sql);
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
* @param a populated instance of object - (Utenti_gruppi_assegnatiInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Utenti_gruppi_assegnatiInfo object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function createUtenti_gruppi_assegnatiNoError($thisUtenti_gruppi_assegnatiInfo) 
{ 

   // Building SQL Statement for Inserting New Utenti_gruppi_assegnatiInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_UTENTI_GRUPPI_ASSEGNATI; 
   $sql .= "(";
   if($thisUtenti_gruppi_assegnatiInfo->getId_gruppo()!=null){
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_GRUPPO."";
   };
   if($thisUtenti_gruppi_assegnatiInfo->getId_utente()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_UTENTE."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisUtenti_gruppi_assegnatiInfo->getId_gruppo()!=null){
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppi_assegnatiInfo->getId_gruppo()."'";
   };
   if($thisUtenti_gruppi_assegnatiInfo->getId_utente()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppi_assegnatiInfo->getId_utente()."'";
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
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Utenti_gruppi_assegnati Table. The SQL Query was : ".$sql);
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
* @param a populated instance of object - (Utenti_gruppi_assegnatiInfo) 
* @desc Updates database table row from parameters of (Utenti_gruppi_assegnatiInfo) object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function updateUtenti_gruppi_assegnati($thisUtenti_gruppi_assegnatiInfo,$thisSearchItems="") 
{ 

   // Building SQL Statement for Inserting New Utenti_gruppi_assegnatiInfo 
  $i=0;   $sql = ""; 
   $sql .= "UPDATE ".TABLE_UTENTI_GRUPPI_ASSEGNATI; 
   $sql .= " SET ";
   if($thisSearchItems=="S")
   if ($thisUtenti_gruppi_assegnatiInfo->getId_gruppo()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_GRUPPO." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_GRUPPO." = '".$thisUtenti_gruppi_assegnatiInfo->getId_gruppo()."'"; 
      $i++;
  }
   if($thisSearchItems=="S")
   if ($thisUtenti_gruppi_assegnatiInfo->getId_utente()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_UTENTE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_UTENTE." = '".$thisUtenti_gruppi_assegnatiInfo->getId_utente()."'"; 
      $i++;
  }
   $sql .= " WHERE ";
   $sql .= FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_GRUPPO."  = '".$thisUtenti_gruppi_assegnatiInfo->getId_gruppo()."'";
   $sql .= " AND ";
   $sql .= FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_UTENTE."  = '".$thisUtenti_gruppi_assegnatiInfo->getId_utente()."'";


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 

                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database. ");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do update on Utenti_gruppi_assegnati SQL Query : ".$sql);
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
 return array("Id_gruppo","Id_utente");
}

function getKeys(){
 return array("Id_gruppo","Id_utente");
}

/** 
* @return returns true if delete if successful or false if failure  
* @param A collection of searchItems of fields onUtenti_gruppi_assegnatiInfo) 
* @desc Delete database table row from parameters of (Utenti_gruppi_assegnatiInfo) object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function deleteUtenti_gruppi_assegnati($thisUtenti_gruppi_assegnatiInfo,$thisSearchItems="")
{ 

   // Building SQL Statement for Deleting  Utenti_gruppi_assegnatiInfo 
   $sql = ""; 
   $sql .= "DELETE FROM ".TABLE_UTENTI_GRUPPI_ASSEGNATI; 
   $sql .= " WHERE ";
   $sql .= FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_GRUPPO." = '".$thisUtenti_gruppi_assegnatiInfo->getId_gruppo()."' "; 
   $sql .=" AND "; 
   $sql .= FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_UTENTE." = '".$thisUtenti_gruppi_assegnatiInfo->getId_utente()."' "; 


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 
                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database.");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do delete on Utenti_gruppi_assegnati SQL Query : ".$sql);
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
* @return returns a populated instance of (Utenti_gruppi_assegnatiInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (Utenti_gruppi_assegnatiInfo) object from a resultSet
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function searchUtenti_gruppi_assegnati($searchItems="",$start="",$limit="",$fieldsToReturn="",
                                                  $sortByField="",$sortOrder="")
{ 

		$thisSearchUtils = new searchUtils();

		$thisSearchUtils->setSearchItems($searchItems);
		$thisSearchUtils->setStart($start);
		$thisSearchUtils->setLimit($limit);
		$thisSearchUtils->setFieldsToReturn($fieldsToReturn);
		$thisSearchUtils->setOrderByField($sortByField);
		$thisSearchUtils->setOrderDirection($sortOrder);
		$thisSearchUtils->setTable(TABLE_UTENTI_GRUPPI_ASSEGNATI);
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
     $thisUtenti_gruppi_assegnatiInfoArray = array(); 
     $thisUtenti_gruppi_assegnatiInfo = new Utenti_gruppi_assegnatiInfo();

     while (!$resultSet->EOF) 
     { 

           $thisUtenti_gruppi_assegnatiInfo = $this->populateUtenti_gruppi_assegnatiInfoFromResultSet($resultSet);
           $thisUtenti_gruppi_assegnatiInfoArray[] = $thisUtenti_gruppi_assegnatiInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisUtenti_gruppi_assegnatiInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
     $thisDatabaseResultsInfo->setSortedBy($thisSearchUtils->getOrderByField());
     $thisDatabaseResultsInfo->setSortOrder($thisSearchUtils->getOrderDirection());

		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function 

/** 
* @return returns a populated instance of (Utenti_gruppi_assegnatiInfo) which it populates from an sql Query 
* @param an sql Query 
* @desc Populates all matching fields of (Utenti_gruppi_assegnatiInfo) object from a query
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function searchUtenti_gruppi_assegnatiFromSql($sql="",$start="",$limit="")
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
     $thisUtenti_gruppi_assegnatiInfoArray = array(); 
     $thisUtenti_gruppi_assegnatiInfo = new Utenti_gruppi_assegnatiInfo();

     while (!$resultSet->EOF) 
     { 

           $thisUtenti_gruppi_assegnatiInfo = $this->populateUtenti_gruppi_assegnatiInfoFromResultSet($resultSet);
           $thisUtenti_gruppi_assegnatiInfoArray[] = $thisUtenti_gruppi_assegnatiInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisUtenti_gruppi_assegnatiInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function

/** 
* @return returns a populated instance of class (Utenti_gruppi_assegnatiInfo) if found in db 
* @param a populated instance of object - (Utenti_gruppi_assegnatiInfo) 
* @desc Searches and return a populated instance of (Utenti_gruppi_assegnatiInfo) object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function getUtenti_gruppi_assegnatiByPK($Id_gruppo,$Id_utente) 
{ 

   // Searches for the info object with the passed id 
   $searchItems[] = new searchItem(FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_GRUPPO,$Id_gruppo); 

   $searchItems[] = new searchItem(FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_UTENTE,$Id_utente); 

   $dbResultsInfo =  $this->searchUtenti_gruppi_assegnati($searchItems); 
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
                 $thisError->setProgramErrorMessage("Should get only one row of data. Program retreived more than row--> ".count($resultsArray)." Error Occured when trying to get Info by Id on Table -->Utenti_gruppi_assegnati ID --> : ".$pkValue);
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
* @return returns a populated instance of (Utenti_gruppi_assegnatiInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (Utenti_gruppi_assegnatiInfo) object from a resultSet
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function populateUtenti_gruppi_assegnatiInfoFromResultSet($result) 
{ 

           $thisUtenti_gruppi_assegnatiInfo = new Utenti_gruppi_assegnatiInfo();

           $thisUtenti_gruppi_assegnatiInfo->setId_gruppo($result->fields[FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_GRUPPO]); 
           $thisUtenti_gruppi_assegnatiInfo->setId_utente($result->fields[FIELD_UTENTI_GRUPPI_ASSEGNATI_ID_UTENTE]); 

           return $thisUtenti_gruppi_assegnatiInfo;

} // End Function populate

} // end of utenti_gruppi_assegnatiGenDAO Class

?>