<?php

	include_once("base.conf.php");

?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_DATABASE_QUERY);
include_once(CLASS_UTENTI_TOKEN_ACCESSO_INFO);
include_once(CLASS_DATABASE_RESULTS_INFO);
include_once(CLASS_SEARCH_UTILS);
?>
<?php 
// Class Representing the Utenti_token_accessoInfo table 
// and DML operations on it from the database

class utenti_token_accessoGenDAO { 

/** 
* @return returns the insert Id of the inserted Row or false on error PROVA  
* @param a populated instance of object - (Utenti_token_accessoInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Utenti_token_accessoInfo object 
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function createUtenti_token_accesso($thisUtenti_token_accessoInfo) 
{ 

   // Building SQL Statement for Inserting New Utenti_token_accessoInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_UTENTI_TOKEN_ACCESSO; 
   $sql .= "(";
   if($thisUtenti_token_accessoInfo->getToken()!=null){
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_TOKEN."";
   };
   if($thisUtenti_token_accessoInfo->getId_utente()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_ID_UTENTE."";
   };
   if($thisUtenti_token_accessoInfo->getData_ora_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_DATA_ORA_CREAZIONE."";
   };
   if($thisUtenti_token_accessoInfo->getUtente_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_UTENTE_MODIFICA."";
   };
   if($thisUtenti_token_accessoInfo->getData_ora_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_DATA_ORA_MODIFICA."";
   };
   if($thisUtenti_token_accessoInfo->getInfo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_INFO."";
   };
   if($thisUtenti_token_accessoInfo->getAttivo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_ATTIVO."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisUtenti_token_accessoInfo->getToken()!=null){
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getToken()."'";
   };
   if($thisUtenti_token_accessoInfo->getId_utente()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getId_utente()."'";
   };
   if($thisUtenti_token_accessoInfo->getData_ora_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getData_ora_creazione()."'";
   };
   if($thisUtenti_token_accessoInfo->getUtente_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getUtente_modifica()."'";
   };
   if($thisUtenti_token_accessoInfo->getData_ora_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getData_ora_modifica()."'";
   };
   if($thisUtenti_token_accessoInfo->getInfo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getInfo()."'";
   };
   if($thisUtenti_token_accessoInfo->getAttivo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getAttivo()."'";
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
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Utenti_token_accesso Table. The SQL Query was : ".$sql);
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
* @param a populated instance of object - (Utenti_token_accessoInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Utenti_token_accessoInfo object 
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function createUtenti_token_accessoNoError($thisUtenti_token_accessoInfo) 
{ 

   // Building SQL Statement for Inserting New Utenti_token_accessoInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_UTENTI_TOKEN_ACCESSO; 
   $sql .= "(";
   if($thisUtenti_token_accessoInfo->getToken()!=null){
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_TOKEN."";
   };
   if($thisUtenti_token_accessoInfo->getId_utente()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_ID_UTENTE."";
   };
   if($thisUtenti_token_accessoInfo->getData_ora_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_DATA_ORA_CREAZIONE."";
   };
   if($thisUtenti_token_accessoInfo->getUtente_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_UTENTE_MODIFICA."";
   };
   if($thisUtenti_token_accessoInfo->getData_ora_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_DATA_ORA_MODIFICA."";
   };
   if($thisUtenti_token_accessoInfo->getInfo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_INFO."";
   };
   if($thisUtenti_token_accessoInfo->getAttivo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_UTENTI_TOKEN_ACCESSO_ATTIVO."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisUtenti_token_accessoInfo->getToken()!=null){
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getToken()."'";
   };
   if($thisUtenti_token_accessoInfo->getId_utente()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getId_utente()."'";
   };
   if($thisUtenti_token_accessoInfo->getData_ora_creazione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getData_ora_creazione()."'";
   };
   if($thisUtenti_token_accessoInfo->getUtente_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getUtente_modifica()."'";
   };
   if($thisUtenti_token_accessoInfo->getData_ora_modifica()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getData_ora_modifica()."'";
   };
   if($thisUtenti_token_accessoInfo->getInfo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getInfo()."'";
   };
   if($thisUtenti_token_accessoInfo->getAttivo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisUtenti_token_accessoInfo->getAttivo()."'";
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
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Utenti_token_accesso Table. The SQL Query was : ".$sql);
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
* @param a populated instance of object - (Utenti_token_accessoInfo) 
* @desc Updates database table row from parameters of (Utenti_token_accessoInfo) object 
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function updateUtenti_token_accesso($thisUtenti_token_accessoInfo,$thisSearchItems="") 
{ 

   // Building SQL Statement for Inserting New Utenti_token_accessoInfo 
  $i=0;   $sql = ""; 
   $sql .= "UPDATE ".TABLE_UTENTI_TOKEN_ACCESSO; 
   $sql .= " SET ";
   if($thisSearchItems=="S")
   if ($thisUtenti_token_accessoInfo->getToken()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_TOKEN." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_TOKEN." = '".$thisUtenti_token_accessoInfo->getToken()."'"; 
      $i++;
  }
   if ($thisUtenti_token_accessoInfo->getId_utente()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_ID_UTENTE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_ID_UTENTE." = '".$thisUtenti_token_accessoInfo->getId_utente()."'"; 
      $i++;
  }
   if ($thisUtenti_token_accessoInfo->getData_ora_creazione()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_DATA_ORA_CREAZIONE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_DATA_ORA_CREAZIONE." = '".$thisUtenti_token_accessoInfo->getData_ora_creazione()."'"; 
      $i++;
  }
   if ($thisUtenti_token_accessoInfo->getUtente_modifica()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_UTENTE_MODIFICA." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_UTENTE_MODIFICA." = '".$thisUtenti_token_accessoInfo->getUtente_modifica()."'"; 
      $i++;
  }
   if ($thisUtenti_token_accessoInfo->getData_ora_modifica()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_DATA_ORA_MODIFICA." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_DATA_ORA_MODIFICA." = '".$thisUtenti_token_accessoInfo->getData_ora_modifica()."'"; 
      $i++;
  }
   if ($thisUtenti_token_accessoInfo->getInfo()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_INFO." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_INFO." = '".$thisUtenti_token_accessoInfo->getInfo()."'"; 
      $i++;
  }
   if ($thisUtenti_token_accessoInfo->getAttivo()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_ATTIVO." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_UTENTI_TOKEN_ACCESSO_ATTIVO." = '".$thisUtenti_token_accessoInfo->getAttivo()."'"; 
      $i++;
  }
   $sql .= " WHERE ";
   $sql .= FIELD_UTENTI_TOKEN_ACCESSO_TOKEN."  = '".$thisUtenti_token_accessoInfo->getToken()."'";


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 

                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database. ");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do update on Utenti_token_accesso SQL Query : ".$sql);
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
 return array("Token","Id_utente","Data_ora_creazione","Utente_modifica","Data_ora_modifica","Info","Attivo");
}

function getKeys(){
 return array("Token");
}

/** 
* @return returns true if delete if successful or false if failure  
* @param A collection of searchItems of fields onUtenti_token_accessoInfo) 
* @desc Delete database table row from parameters of (Utenti_token_accessoInfo) object 
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function deleteUtenti_token_accesso($thisUtenti_token_accessoInfo,$thisSearchItems="")
{ 

   // Building SQL Statement for Deleting  Utenti_token_accessoInfo 
   $sql = ""; 
   $sql .= "DELETE FROM ".TABLE_UTENTI_TOKEN_ACCESSO; 
   $sql .= " WHERE ";
   $sql .= FIELD_UTENTI_TOKEN_ACCESSO_TOKEN." = '".$thisUtenti_token_accessoInfo->getToken()."' "; 


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 
                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database.");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do delete on Utenti_token_accesso SQL Query : ".$sql);
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
* @return returns a populated instance of (Utenti_token_accessoInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (Utenti_token_accessoInfo) object from a resultSet
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function searchUtenti_token_accesso($searchItems="",$start="",$limit="",$fieldsToReturn="",
                                                  $sortByField="",$sortOrder="")
{ 

		$thisSearchUtils = new searchUtils();

		$thisSearchUtils->setSearchItems($searchItems);
		$thisSearchUtils->setStart($start);
		$thisSearchUtils->setLimit($limit);
		$thisSearchUtils->setFieldsToReturn($fieldsToReturn);
		$thisSearchUtils->setOrderByField($sortByField);
		$thisSearchUtils->setOrderDirection($sortOrder);
		$thisSearchUtils->setTable(TABLE_UTENTI_TOKEN_ACCESSO);
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
     $thisUtenti_token_accessoInfoArray = array(); 
     $thisUtenti_token_accessoInfo = new Utenti_token_accessoInfo();

     while (!$resultSet->EOF) 
     { 

           $thisUtenti_token_accessoInfo = $this->populateUtenti_token_accessoInfoFromResultSet($resultSet);
           $thisUtenti_token_accessoInfoArray[] = $thisUtenti_token_accessoInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisUtenti_token_accessoInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
     $thisDatabaseResultsInfo->setSortedBy($thisSearchUtils->getOrderByField());
     $thisDatabaseResultsInfo->setSortOrder($thisSearchUtils->getOrderDirection());

		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function 

/** 
* @return returns a populated instance of (Utenti_token_accessoInfo) which it populates from an sql Query 
* @param an sql Query 
* @desc Populates all matching fields of (Utenti_token_accessoInfo) object from a query
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function searchUtenti_token_accessoFromSql($sql="",$start="",$limit="")
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
     $thisUtenti_token_accessoInfoArray = array(); 
     $thisUtenti_token_accessoInfo = new Utenti_token_accessoInfo();

     while (!$resultSet->EOF) 
     { 

           $thisUtenti_token_accessoInfo = $this->populateUtenti_token_accessoInfoFromResultSet($resultSet);
           $thisUtenti_token_accessoInfoArray[] = $thisUtenti_token_accessoInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisUtenti_token_accessoInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function

/** 
* @return returns a populated instance of class (Utenti_token_accessoInfo) if found in db 
* @param a populated instance of object - (Utenti_token_accessoInfo) 
* @desc Searches and return a populated instance of (Utenti_token_accessoInfo) object 
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function getUtenti_token_accessoByPK($Token) 
{ 

   // Searches for the info object with the passed id 
   $searchItems[] = new searchItem(FIELD_UTENTI_TOKEN_ACCESSO_TOKEN,$Token); 

   $dbResultsInfo =  $this->searchUtenti_token_accesso($searchItems); 
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
                 $thisError->setProgramErrorMessage("Should get only one row of data. Program retreived more than row--> ".count($resultsArray)." Error Occured when trying to get Info by Id on Table -->Utenti_token_accesso ID --> : ".$pkValue);
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
* @return returns a populated instance of (Utenti_token_accessoInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (Utenti_token_accessoInfo) object from a resultSet
* @generationDate 2022-04-01
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function populateUtenti_token_accessoInfoFromResultSet($result) 
{ 

           $thisUtenti_token_accessoInfo = new Utenti_token_accessoInfo();

           $thisUtenti_token_accessoInfo->setToken($result->fields[FIELD_UTENTI_TOKEN_ACCESSO_TOKEN]); 
           $thisUtenti_token_accessoInfo->setId_utente($result->fields[FIELD_UTENTI_TOKEN_ACCESSO_ID_UTENTE]); 
           $thisUtenti_token_accessoInfo->setData_ora_creazione($result->fields[FIELD_UTENTI_TOKEN_ACCESSO_DATA_ORA_CREAZIONE]); 
           $thisUtenti_token_accessoInfo->setUtente_modifica($result->fields[FIELD_UTENTI_TOKEN_ACCESSO_UTENTE_MODIFICA]); 
           $thisUtenti_token_accessoInfo->setData_ora_modifica($result->fields[FIELD_UTENTI_TOKEN_ACCESSO_DATA_ORA_MODIFICA]); 
           $thisUtenti_token_accessoInfo->setInfo($result->fields[FIELD_UTENTI_TOKEN_ACCESSO_INFO]); 
           $thisUtenti_token_accessoInfo->setAttivo($result->fields[FIELD_UTENTI_TOKEN_ACCESSO_ATTIVO]); 

           return $thisUtenti_token_accessoInfo;

} // End Function populate

} // end of utenti_token_accessoGenDAO Class

?>