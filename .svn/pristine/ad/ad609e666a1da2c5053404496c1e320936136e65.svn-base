<?php

	include_once("base.conf.php");

?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_DATABASE_QUERY);
include_once(CLASS_UTENTI_GRUPPI_INFO);
include_once(CLASS_DATABASE_RESULTS_INFO);
include_once(CLASS_SEARCH_UTILS);
?>
<?php 
// Class Representing the Utenti_gruppiInfo table 
// and DML operations on it from the database

class utenti_gruppiGenDAO { 

/** 
* @return returns the insert Id of the inserted Row or false on error PROVA  
* @param a populated instance of object - (Utenti_gruppiInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Utenti_gruppiInfo object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function createUtenti_gruppi($thisUtenti_gruppiInfo) 
{ 

   // Building SQL Statement for Inserting New Utenti_gruppiInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_UTENTI_GRUPPI; 
   $sql .= "(";
   if($thisUtenti_gruppiInfo->getId_gruppo()!=null){
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_ID_GRUPPO."";
   };
   if($thisUtenti_gruppiInfo->getDescrizione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_DESCRIZIONE."";
   };
   if($thisUtenti_gruppiInfo->getNote()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_NOTE."";
   };
   if($thisUtenti_gruppiInfo->getUtente_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_UTENTE_CREAZIONE."";
   };
   if($thisUtenti_gruppiInfo->getData_ora_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_DATA_ORA_CREAZIONE."";
   };
   if($thisUtenti_gruppiInfo->getUtente_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_UTENTE_MODIFICA."";
   };
   if($thisUtenti_gruppiInfo->getData_ora_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_DATA_ORA_MODIFICA."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisUtenti_gruppiInfo->getId_gruppo()!=null){
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getId_gruppo()."'";
   };
   if($thisUtenti_gruppiInfo->getDescrizione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getDescrizione()."'";
   };
   if($thisUtenti_gruppiInfo->getNote()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getNote()."'";
   };
   if($thisUtenti_gruppiInfo->getUtente_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getUtente_creazione()."'";
   };
   if($thisUtenti_gruppiInfo->getData_ora_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getData_ora_creazione()."'";
   };
   if($thisUtenti_gruppiInfo->getUtente_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getUtente_modifica()."'";
   };
   if($thisUtenti_gruppiInfo->getData_ora_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getData_ora_modifica()."'";
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
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Utenti_gruppi Table. The SQL Query was : ".$sql);
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
* @param a populated instance of object - (Utenti_gruppiInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Utenti_gruppiInfo object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function createUtenti_gruppiNoError($thisUtenti_gruppiInfo) 
{ 

   // Building SQL Statement for Inserting New Utenti_gruppiInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_UTENTI_GRUPPI; 
   $sql .= "(";
   if($thisUtenti_gruppiInfo->getId_gruppo()!=null){
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_ID_GRUPPO."";
   };
   if($thisUtenti_gruppiInfo->getDescrizione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_DESCRIZIONE."";
   };
   if($thisUtenti_gruppiInfo->getNote()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_NOTE."";
   };
   if($thisUtenti_gruppiInfo->getUtente_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_UTENTE_CREAZIONE."";
   };
   if($thisUtenti_gruppiInfo->getData_ora_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_DATA_ORA_CREAZIONE."";
   };
   if($thisUtenti_gruppiInfo->getUtente_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_UTENTE_MODIFICA."";
   };
   if($thisUtenti_gruppiInfo->getData_ora_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_GRUPPI_DATA_ORA_MODIFICA."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisUtenti_gruppiInfo->getId_gruppo()!=null){
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getId_gruppo()."'";
   };
   if($thisUtenti_gruppiInfo->getDescrizione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getDescrizione()."'";
   };
   if($thisUtenti_gruppiInfo->getNote()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getNote()."'";
   };
   if($thisUtenti_gruppiInfo->getUtente_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getUtente_creazione()."'";
   };
   if($thisUtenti_gruppiInfo->getData_ora_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getData_ora_creazione()."'";
   };
   if($thisUtenti_gruppiInfo->getUtente_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getUtente_modifica()."'";
   };
   if($thisUtenti_gruppiInfo->getData_ora_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_gruppiInfo->getData_ora_modifica()."'";
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
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Utenti_gruppi Table. The SQL Query was : ".$sql);
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
* @param a populated instance of object - (Utenti_gruppiInfo) 
* @desc Updates database table row from parameters of (Utenti_gruppiInfo) object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function updateUtenti_gruppi($thisUtenti_gruppiInfo,$thisSearchItems="") 
{ 

   // Building SQL Statement for Inserting New Utenti_gruppiInfo 
  $i=0;   $sql = ""; 
   $sql .= "UPDATE ".TABLE_UTENTI_GRUPPI; 
   $sql .= " SET ";
   if($thisSearchItems=="S")
   if ($thisUtenti_gruppiInfo->getId_gruppo()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_ID_GRUPPO." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_ID_GRUPPO." = '".$thisUtenti_gruppiInfo->getId_gruppo()."'"; 
      $i++;
  }
   if ($thisUtenti_gruppiInfo->getDescrizione()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_DESCRIZIONE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_DESCRIZIONE." = '".$thisUtenti_gruppiInfo->getDescrizione()."'"; 
      $i++;
  }
   if ($thisUtenti_gruppiInfo->getNote()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_NOTE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_NOTE." = '".$thisUtenti_gruppiInfo->getNote()."'"; 
      $i++;
  }
   if ($thisUtenti_gruppiInfo->getUtente_creazione()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_UTENTE_CREAZIONE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_UTENTE_CREAZIONE." = '".$thisUtenti_gruppiInfo->getUtente_creazione()."'"; 
      $i++;
  }
   if ($thisUtenti_gruppiInfo->getData_ora_creazione()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_DATA_ORA_CREAZIONE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_DATA_ORA_CREAZIONE." = '".$thisUtenti_gruppiInfo->getData_ora_creazione()."'"; 
      $i++;
  }
   if ($thisUtenti_gruppiInfo->getUtente_modifica()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_UTENTE_MODIFICA." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_UTENTE_MODIFICA." = '".$thisUtenti_gruppiInfo->getUtente_modifica()."'"; 
      $i++;
  }
   if ($thisUtenti_gruppiInfo->getData_ora_modifica()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_DATA_ORA_MODIFICA." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_GRUPPI_DATA_ORA_MODIFICA." = '".$thisUtenti_gruppiInfo->getData_ora_modifica()."'"; 
      $i++;
  }
   $sql .= " WHERE ";
   $sql .= FIELD_UTENTI_GRUPPI_ID_GRUPPO."  = '".$thisUtenti_gruppiInfo->getId_gruppo()."'";


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 

                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database. ");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do update on Utenti_gruppi SQL Query : ".$sql);
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
 return array("Id_gruppo","Descrizione","Note","Utente_creazione","Data_ora_creazione","Utente_modifica","Data_ora_modifica");
}

function getKeys(){
 return array("Id_gruppo");
}

/** 
* @return returns true if delete if successful or false if failure  
* @param A collection of searchItems of fields onUtenti_gruppiInfo) 
* @desc Delete database table row from parameters of (Utenti_gruppiInfo) object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function deleteUtenti_gruppi($thisUtenti_gruppiInfo,$thisSearchItems="")
{ 

   // Building SQL Statement for Deleting  Utenti_gruppiInfo 
   $sql = ""; 
   $sql .= "DELETE FROM ".TABLE_UTENTI_GRUPPI; 
   $sql .= " WHERE ";
   $sql .= FIELD_UTENTI_GRUPPI_ID_GRUPPO." = '".$thisUtenti_gruppiInfo->getId_gruppo()."' "; 


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 
                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database.");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do delete on Utenti_gruppi SQL Query : ".$sql);
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
* @return returns a populated instance of (Utenti_gruppiInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (Utenti_gruppiInfo) object from a resultSet
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function searchUtenti_gruppi($searchItems="",$start="",$limit="",$fieldsToReturn="",
                                                  $sortByField="",$sortOrder="")
{ 

		$thisSearchUtils = new searchUtils();

		$thisSearchUtils->setSearchItems($searchItems);
		$thisSearchUtils->setStart($start);
		$thisSearchUtils->setLimit($limit);
		$thisSearchUtils->setFieldsToReturn($fieldsToReturn);
		$thisSearchUtils->setOrderByField($sortByField);
		$thisSearchUtils->setOrderDirection($sortOrder);
		$thisSearchUtils->setTable(TABLE_UTENTI_GRUPPI);
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
     $thisUtenti_gruppiInfoArray = array(); 
     $thisUtenti_gruppiInfo = new Utenti_gruppiInfo();

     while (!$resultSet->EOF) 
     { 

           $thisUtenti_gruppiInfo = $this->populateUtenti_gruppiInfoFromResultSet($resultSet);
           $thisUtenti_gruppiInfoArray[] = $thisUtenti_gruppiInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisUtenti_gruppiInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
     $thisDatabaseResultsInfo->setSortedBy($thisSearchUtils->getOrderByField());
     $thisDatabaseResultsInfo->setSortOrder($thisSearchUtils->getOrderDirection());

		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function 

/** 
* @return returns a populated instance of (Utenti_gruppiInfo) which it populates from an sql Query 
* @param an sql Query 
* @desc Populates all matching fields of (Utenti_gruppiInfo) object from a query
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function searchUtenti_gruppiFromSql($sql="",$start="",$limit="")
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
     $thisUtenti_gruppiInfoArray = array(); 
     $thisUtenti_gruppiInfo = new Utenti_gruppiInfo();

     while (!$resultSet->EOF) 
     { 

           $thisUtenti_gruppiInfo = $this->populateUtenti_gruppiInfoFromResultSet($resultSet);
           $thisUtenti_gruppiInfoArray[] = $thisUtenti_gruppiInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisUtenti_gruppiInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function

/** 
* @return returns a populated instance of class (Utenti_gruppiInfo) if found in db 
* @param a populated instance of object - (Utenti_gruppiInfo) 
* @desc Searches and return a populated instance of (Utenti_gruppiInfo) object 
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function getUtenti_gruppiByPK($Id_gruppo) 
{ 

   // Searches for the info object with the passed id 
   $searchItems[] = new searchItem(FIELD_UTENTI_GRUPPI_ID_GRUPPO,$Id_gruppo); 

   $dbResultsInfo =  $this->searchUtenti_gruppi($searchItems); 
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
                 $thisError->setProgramErrorMessage("Should get only one row of data. Program retreived more than row--> ".count($resultsArray)." Error Occured when trying to get Info by Id on Table -->Utenti_gruppi ID --> : ".$pkValue);
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
* @return returns a populated instance of (Utenti_gruppiInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (Utenti_gruppiInfo) object from a resultSet
* @generationDate 2022-03-22
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function populateUtenti_gruppiInfoFromResultSet($result) 
{ 

           $thisUtenti_gruppiInfo = new Utenti_gruppiInfo();

           $thisUtenti_gruppiInfo->setId_gruppo($result->fields[FIELD_UTENTI_GRUPPI_ID_GRUPPO]); 
           $thisUtenti_gruppiInfo->setDescrizione($result->fields[FIELD_UTENTI_GRUPPI_DESCRIZIONE]); 
           $thisUtenti_gruppiInfo->setNote($result->fields[FIELD_UTENTI_GRUPPI_NOTE]); 
           $thisUtenti_gruppiInfo->setUtente_creazione($result->fields[FIELD_UTENTI_GRUPPI_UTENTE_CREAZIONE]); 
           $thisUtenti_gruppiInfo->setData_ora_creazione($result->fields[FIELD_UTENTI_GRUPPI_DATA_ORA_CREAZIONE]); 
           $thisUtenti_gruppiInfo->setUtente_modifica($result->fields[FIELD_UTENTI_GRUPPI_UTENTE_MODIFICA]); 
           $thisUtenti_gruppiInfo->setData_ora_modifica($result->fields[FIELD_UTENTI_GRUPPI_DATA_ORA_MODIFICA]); 

           return $thisUtenti_gruppiInfo;

} // End Function populate

} // end of utenti_gruppiGenDAO Class

?>