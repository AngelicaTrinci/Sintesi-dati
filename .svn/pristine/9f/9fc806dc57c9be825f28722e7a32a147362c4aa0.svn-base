<?
// phpCodeGen - versione 14/09/2022
include_once("sintesi_dati_progetto.conf.php");
?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_DATABASE_QUERY);
include_once(CLASS_TERMINI_DI_CONSEGNA_INFO);
include_once(CLASS_DATABASE_RESULTS_INFO);
include_once(CLASS_SEARCH_UTILS);
?>
<?php 
// Class Representing the Termini_di_consegnaInfo table 
// and DML operations on it from the database

class termini_di_consegnaGenDAO { 

/** 
* @return returns the insert Id of the inserted Row or false on error PROVA  
* @param a populated instance of object - (Termini_di_consegnaInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Termini_di_consegnaInfo object 
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function createTermini_di_consegna($thisTermini_di_consegnaInfo) 
{ 

   // Building SQL Statement for Inserting New Termini_di_consegnaInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_TERMINI_DI_CONSEGNA; 
   $sql .= "(";
   if($thisTermini_di_consegnaInfo->getCodice()!=null){
      $notnull=true;
      $sql .= "".FIELD_TERMINI_DI_CONSEGNA_CODICE."";
   };
   if($thisTermini_di_consegnaInfo->getDescrizione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_TERMINI_DI_CONSEGNA_DESCRIZIONE."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisTermini_di_consegnaInfo->getCodice()!=null){
      $notnull=true;
      $sql .= "'".$thisTermini_di_consegnaInfo->getCodice()."'";
   };
   if($thisTermini_di_consegnaInfo->getDescrizione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisTermini_di_consegnaInfo->getDescrizione()."'";
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
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Termini_di_consegna Table. The SQL Query was : ".$sql);
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
* @param a populated instance of object - (Termini_di_consegnaInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Termini_di_consegnaInfo object 
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function createTermini_di_consegnaNoError($thisTermini_di_consegnaInfo) 
{ 

   // Building SQL Statement for Inserting New Termini_di_consegnaInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_TERMINI_DI_CONSEGNA; 
   $sql .= "(";
   if($thisTermini_di_consegnaInfo->getCodice()!=null){
      $notnull=true;
      $sql .= "".FIELD_TERMINI_DI_CONSEGNA_CODICE."";
   };
   if($thisTermini_di_consegnaInfo->getDescrizione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_TERMINI_DI_CONSEGNA_DESCRIZIONE."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisTermini_di_consegnaInfo->getCodice()!=null){
      $notnull=true;
      $sql .= "'".$thisTermini_di_consegnaInfo->getCodice()."'";
   };
   if($thisTermini_di_consegnaInfo->getDescrizione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisTermini_di_consegnaInfo->getDescrizione()."'";
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
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Termini_di_consegna Table. The SQL Query was : ".$sql);
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
* @param a populated instance of object - (Termini_di_consegnaInfo) 
* @desc Updates database table row from parameters of (Termini_di_consegnaInfo) object 
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function updateTermini_di_consegna($thisTermini_di_consegnaInfo,$thisSearchItems="") 
{ 

   // Building SQL Statement for Inserting New Termini_di_consegnaInfo 
  $i=0;   $sql = ""; 
   $sql .= "UPDATE ".TABLE_TERMINI_DI_CONSEGNA; 
   $sql .= " SET ";
   if($thisSearchItems=="S")
   if ($thisTermini_di_consegnaInfo->getCodice()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_TERMINI_DI_CONSEGNA_CODICE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_TERMINI_DI_CONSEGNA_CODICE." = '".$thisTermini_di_consegnaInfo->getCodice()."'"; 
      $i++;
  }
   if ($thisTermini_di_consegnaInfo->getDescrizione()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_TERMINI_DI_CONSEGNA_DESCRIZIONE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_TERMINI_DI_CONSEGNA_DESCRIZIONE." = '".$thisTermini_di_consegnaInfo->getDescrizione()."'"; 
      $i++;
  }
   $sql .= " WHERE ";
   $sql .= FIELD_TERMINI_DI_CONSEGNA_CODICE."  = '".$thisTermini_di_consegnaInfo->getCodice()."'";


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 

                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database. ");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do update on Termini_di_consegna SQL Query : ".$sql);
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
 return array("codice","descrizione");
}

function getKeys(){
 return array("codice");
}

/** 
* @return returns true if delete if successful or false if failure  
* @param A collection of searchItems of fields onTermini_di_consegnaInfo) 
* @desc Delete database table row from parameters of (Termini_di_consegnaInfo) object 
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function deleteTermini_di_consegna($thisTermini_di_consegnaInfo,$thisSearchItems="")
{ 

   // Building SQL Statement for Deleting  Termini_di_consegnaInfo 
   $sql = ""; 
   $sql .= "DELETE FROM ".TABLE_TERMINI_DI_CONSEGNA; 
   $sql .= " WHERE ";
   $sql .= FIELD_TERMINI_DI_CONSEGNA_CODICE." = '".$thisTermini_di_consegnaInfo->getCodice()."' "; 


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 
                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database.");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do delete on Termini_di_consegna SQL Query : ".$sql);
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
* @return returns a populated instance of (Termini_di_consegnaInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (Termini_di_consegnaInfo) object from a resultSet
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function searchTermini_di_consegna($searchItems="",$start="",$limit="",$fieldsToReturn="",
                                                  $sortByField="",$sortOrder="")
{ 

		$thisSearchUtils = new searchUtils();

		$thisSearchUtils->setSearchItems($searchItems);
		$thisSearchUtils->setStart($start);
		$thisSearchUtils->setLimit($limit);
		$thisSearchUtils->setFieldsToReturn($fieldsToReturn);
		$thisSearchUtils->setOrderByField($sortByField);
		$thisSearchUtils->setOrderDirection($sortOrder);
		$thisSearchUtils->setTable(TABLE_TERMINI_DI_CONSEGNA);
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
     $thisTermini_di_consegnaInfoArray = array(); 
     $thisTermini_di_consegnaInfo = new Termini_di_consegnaInfo();

     while (!$resultSet->EOF) 
     { 

           $thisTermini_di_consegnaInfo = $this->populateTermini_di_consegnaInfoFromResultSet($resultSet);
           $thisTermini_di_consegnaInfoArray[] = $thisTermini_di_consegnaInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisTermini_di_consegnaInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
     $thisDatabaseResultsInfo->setSortedBy($thisSearchUtils->getOrderByField());
     $thisDatabaseResultsInfo->setSortOrder($thisSearchUtils->getOrderDirection());

		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function 

/** 
* @return returns a populated instance of (Termini_di_consegnaInfo) which it populates from an sql Query 
* @param an sql Query 
* @desc Populates all matching fields of (Termini_di_consegnaInfo) object from a query
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function searchTermini_di_consegnaFromSql($sql="",$start="",$limit="")
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
     $thisTermini_di_consegnaInfoArray = array(); 
     $thisTermini_di_consegnaInfo = new Termini_di_consegnaInfo();

     while (!$resultSet->EOF) 
     { 

           $thisTermini_di_consegnaInfo = $this->populateTermini_di_consegnaInfoFromResultSet($resultSet);
           $thisTermini_di_consegnaInfoArray[] = $thisTermini_di_consegnaInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisTermini_di_consegnaInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function

/** 
* @return returns a populated instance of class (Termini_di_consegnaInfo) if found in db 
* @param a populated instance of object - (Termini_di_consegnaInfo) 
* @desc Searches and return a populated instance of (Termini_di_consegnaInfo) object 
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function getTermini_di_consegnaByPK($codice) 
{ 

   // Searches for the info object with the passed id 
   $searchItems[] = new searchItem(FIELD_TERMINI_DI_CONSEGNA_CODICE,$codice); 

   $dbResultsInfo =  $this->searchTermini_di_consegna($searchItems); 
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
                 $thisError->setProgramErrorMessage("Should get only one row of data. Program retreived more than row--> ".count($resultsArray)." Error Occured when trying to get Info by Id on Table -->Termini_di_consegna ID --> : ".$pkValue);
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
* @return returns a populated instance of (Termini_di_consegnaInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (Termini_di_consegnaInfo) object from a resultSet
* @generationDate 2025-11-13
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2025, Delta Informatica 
*/ 
function populateTermini_di_consegnaInfoFromResultSet($result) 
{ 

           $thisTermini_di_consegnaInfo = new Termini_di_consegnaInfo();

           $thisTermini_di_consegnaInfo->setCodice($result->fields[FIELD_TERMINI_DI_CONSEGNA_CODICE]); 
           $thisTermini_di_consegnaInfo->setDescrizione($result->fields[FIELD_TERMINI_DI_CONSEGNA_DESCRIZIONE]); 

           return $thisTermini_di_consegnaInfo;

} // End Function populate

} // end of termini_di_consegnaGenDAO Class

?>