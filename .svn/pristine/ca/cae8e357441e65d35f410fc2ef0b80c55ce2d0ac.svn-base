<?php

	include_once("base.conf.php");

?>
<?php
include_once(CONFIG_FILE);
include_once(CLASS_DATABASE_QUERY);
include_once(CLASS_VOCI_MENU_INFO);
include_once(CLASS_DATABASE_RESULTS_INFO);
include_once(CLASS_SEARCH_UTILS);
?>
<?php 
// Class Representing the Voci_menuInfo table 
// and DML operations on it from the database

class voci_menuGenDAO { 

/** 
* @return returns the insert Id of the inserted Row or false on error PROVA  
* @param a populated instance of object - (Voci_menuInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Voci_menuInfo object 
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function createVoci_menu($thisVoci_menuInfo) 
{ 

   // Building SQL Statement for Inserting New Voci_menuInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_VOCI_MENU; 
   $sql .= "(";
   if($thisVoci_menuInfo->getId_voce()!=null){
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_ID_VOCE."";
   };
   if($thisVoci_menuInfo->getVoce()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_VOCE."";
   };
   if($thisVoci_menuInfo->getFile_php()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_FILE_PHP."";
   };
   if($thisVoci_menuInfo->getTipo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_TIPO."";
   };
   if($thisVoci_menuInfo->getId_voce_padre()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_ID_VOCE_PADRE."";
   };
   if($thisVoci_menuInfo->getPosizione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_POSIZIONE."";
   };
   if($thisVoci_menuInfo->getAttivo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_ATTIVO."";
   };
   if($thisVoci_menuInfo->getImmagine()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_IMMAGINE."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisVoci_menuInfo->getId_voce()!=null){
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getId_voce()."'";
   };
   if($thisVoci_menuInfo->getVoce()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getVoce()."'";
   };
   if($thisVoci_menuInfo->getFile_php()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getFile_php()."'";
   };
   if($thisVoci_menuInfo->getTipo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getTipo()."'";
   };
   if($thisVoci_menuInfo->getId_voce_padre()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getId_voce_padre()."'";
   };
   if($thisVoci_menuInfo->getPosizione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getPosizione()."'";
   };
   if($thisVoci_menuInfo->getAttivo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getAttivo()."'";
   };
   if($thisVoci_menuInfo->getImmagine()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getImmagine()."'";
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
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Voci_menu Table. The SQL Query was : ".$sql);
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
* @param a populated instance of object - (Voci_menuInfo) 
* @desc Inserts a new  row in the table populated from parameters of (Voci_menuInfo object 
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function createVoci_menuNoError($thisVoci_menuInfo) 
{ 

   // Building SQL Statement for Inserting New Voci_menuInfo) 
 $notnull=false;
   $sql = ""; 
   $sql .= "INSERT INTO ".TABLE_VOCI_MENU; 
   $sql .= "(";
   if($thisVoci_menuInfo->getId_voce()!=null){
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_ID_VOCE."";
   };
   if($thisVoci_menuInfo->getVoce()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_VOCE."";
   };
   if($thisVoci_menuInfo->getFile_php()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_FILE_PHP."";
   };
   if($thisVoci_menuInfo->getTipo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_TIPO."";
   };
   if($thisVoci_menuInfo->getId_voce_padre()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_ID_VOCE_PADRE."";
   };
   if($thisVoci_menuInfo->getPosizione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_POSIZIONE."";
   };
   if($thisVoci_menuInfo->getAttivo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_ATTIVO."";
   };
   if($thisVoci_menuInfo->getImmagine()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "".FIELD_VOCI_MENU_IMMAGINE."";
   };
   $sql .= " )"; 
   $sql .= " VALUES "; 
   $sql .= "(";
 $notnull=false;
   if($thisVoci_menuInfo->getId_voce()!=null){
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getId_voce()."'";
   };
   if($thisVoci_menuInfo->getVoce()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getVoce()."'";
   };
   if($thisVoci_menuInfo->getFile_php()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getFile_php()."'";
   };
   if($thisVoci_menuInfo->getTipo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getTipo()."'";
   };
   if($thisVoci_menuInfo->getId_voce_padre()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getId_voce_padre()."'";
   };
   if($thisVoci_menuInfo->getPosizione()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getPosizione()."'";
   };
   if($thisVoci_menuInfo->getAttivo()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getAttivo()."'";
   };
   if($thisVoci_menuInfo->getImmagine()!=null){
      if($notnull) $sql .= " , ";
      $notnull=true;
      $sql .= "'".$thisVoci_menuInfo->getImmagine()."'";
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
                 $thisError->setProgramErrorMessage("Error occured when trying to do insert on the Voci_menu Table. The SQL Query was : ".$sql);
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
* @param a populated instance of object - (Voci_menuInfo) 
* @desc Updates database table row from parameters of (Voci_menuInfo) object 
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function updateVoci_menu($thisVoci_menuInfo,$thisSearchItems="") 
{ 

   // Building SQL Statement for Inserting New Voci_menuInfo 
  $i=0;   $sql = ""; 
   $sql .= "UPDATE ".TABLE_VOCI_MENU; 
   $sql .= " SET ";
   if($thisSearchItems=="S")
   if ($thisVoci_menuInfo->getId_voce()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_ID_VOCE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_ID_VOCE." = '".$thisVoci_menuInfo->getId_voce()."'"; 
      $i++;
  }
   if ($thisVoci_menuInfo->getVoce()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_VOCE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_VOCE." = '".$thisVoci_menuInfo->getVoce()."'"; 
      $i++;
  }
   if ($thisVoci_menuInfo->getFile_php()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_FILE_PHP." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_FILE_PHP." = '".$thisVoci_menuInfo->getFile_php()."'"; 
      $i++;
  }
   if ($thisVoci_menuInfo->getTipo()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_TIPO." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_TIPO." = '".$thisVoci_menuInfo->getTipo()."'"; 
      $i++;
  }
   if ($thisVoci_menuInfo->getId_voce_padre()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_ID_VOCE_PADRE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_ID_VOCE_PADRE." = '".$thisVoci_menuInfo->getId_voce_padre()."'"; 
      $i++;
  }
   if ($thisVoci_menuInfo->getPosizione()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_POSIZIONE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_POSIZIONE." = '".$thisVoci_menuInfo->getPosizione()."'"; 
      $i++;
  }
   if ($thisVoci_menuInfo->getAttivo()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_ATTIVO." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_ATTIVO." = '".$thisVoci_menuInfo->getAttivo()."'"; 
      $i++;
  }
   if ($thisVoci_menuInfo->getImmagine()==null){
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_IMMAGINE." = NULL";      $i++;
    }else{
    if($i>0) $sql.=" , ";
      $sql .=  FIELD_VOCI_MENU_IMMAGINE." = '".$thisVoci_menuInfo->getImmagine()."'"; 
      $i++;
  }
   $sql .= " WHERE ";
   $sql .= FIELD_VOCI_MENU_ID_VOCE."  = '".$thisVoci_menuInfo->getId_voce()."'";


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 

                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database. ");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do update on Voci_menu SQL Query : ".$sql);
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
 return array("Id_voce","Voce","File_php","Tipo","Id_voce_padre","Posizione","Attivo","Immagine");
}

function getKeys(){
 return array("Id_voce");
}

/** 
* @return returns true if delete if successful or false if failure  
* @param A collection of searchItems of fields onVoci_menuInfo) 
* @desc Delete database table row from parameters of (Voci_menuInfo) object 
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function deleteVoci_menu($thisVoci_menuInfo,$thisSearchItems="")
{ 

   // Building SQL Statement for Deleting  Voci_menuInfo 
   $sql = ""; 
   $sql .= "DELETE FROM ".TABLE_VOCI_MENU; 
   $sql .= " WHERE ";
   $sql .= FIELD_VOCI_MENU_ID_VOCE." = '".$thisVoci_menuInfo->getId_voce()."' "; 


         // Executing Query 
         $thisDatabaseQuery = new databaseQuery(); 
         $thisDatabaseQuery->setSqlQuery($sql); 
         $result = $thisDatabaseQuery->executeQuery(); 

         // Query could not execute. There was an error 
         if ($result == false) { 
                 // if Error occured in Application, handle error. 
                 $thisError = new errorHandler();
                 $thisError->setUserErrorMessage("A fatal error has occured while this application was trying to do some operation on the database.");
                 $thisError->setProgramErrorMessage("Error Occured when trying to do delete on Voci_menu SQL Query : ".$sql);
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
* @return returns a populated instance of (Voci_menuInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (Voci_menuInfo) object from a resultSet
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function searchVoci_menu($searchItems="",$start="",$limit="",$fieldsToReturn="",
                                                  $sortByField="",$sortOrder="")
{ 

		$thisSearchUtils = new searchUtils();

		$thisSearchUtils->setSearchItems($searchItems);
		$thisSearchUtils->setStart($start);
		$thisSearchUtils->setLimit($limit);
		$thisSearchUtils->setFieldsToReturn($fieldsToReturn);
		$thisSearchUtils->setOrderByField($sortByField);
		$thisSearchUtils->setOrderDirection($sortOrder);
		$thisSearchUtils->setTable(TABLE_VOCI_MENU);
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
     $thisVoci_menuInfoArray = array(); 
     $thisVoci_menuInfo = new Voci_menuInfo();

     while (!$resultSet->EOF) 
     { 

           $thisVoci_menuInfo = $this->populateVoci_menuInfoFromResultSet($resultSet);
           $thisVoci_menuInfoArray[] = $thisVoci_menuInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisVoci_menuInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
     $thisDatabaseResultsInfo->setSortedBy($thisSearchUtils->getOrderByField());
     $thisDatabaseResultsInfo->setSortOrder($thisSearchUtils->getOrderDirection());

		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function 

/** 
* @return returns a populated instance of (Voci_menuInfo) which it populates from an sql Query 
* @param an sql Query 
* @desc Populates all matching fields of (Voci_menuInfo) object from a query
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function searchVoci_menuFromSql($sql="",$start="",$limit="")
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
     $thisVoci_menuInfoArray = array(); 
     $thisVoci_menuInfo = new Voci_menuInfo();

     while (!$resultSet->EOF) 
     { 

           $thisVoci_menuInfo = $this->populateVoci_menuInfoFromResultSet($resultSet);
           $thisVoci_menuInfoArray[] = $thisVoci_menuInfo;

           $resultSet->MoveNext(); 

     } // end while 

     $thisDatabaseResultsInfo->setResultsArray( $thisVoci_menuInfoArray);
     $thisDatabaseResultsInfo->setTotalNumberOfRows($thisDatabaseQuery->getTotalRows());
     $thisDatabaseResultsInfo->setStart($thisDatabaseQuery->getStart());
     $thisDatabaseResultsInfo->setLimit($thisDatabaseQuery->getLimit());
		return $thisDatabaseResultsInfo;

	} // End of if result != false 

}// End Function

/** 
* @return returns a populated instance of class (Voci_menuInfo) if found in db 
* @param a populated instance of object - (Voci_menuInfo) 
* @desc Searches and return a populated instance of (Voci_menuInfo) object 
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function getVoci_menuByPK($Id_voce) 
{ 

   // Searches for the info object with the passed id 
   $searchItems[] = new searchItem(FIELD_VOCI_MENU_ID_VOCE,$Id_voce); 

   $dbResultsInfo =  $this->searchVoci_menu($searchItems); 
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
                 $thisError->setProgramErrorMessage("Should get only one row of data. Program retreived more than row--> ".count($resultsArray)." Error Occured when trying to get Info by Id on Table -->Voci_menu ID --> : ".$pkValue);
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
* @return returns a populated instance of (Voci_menuInfo) which it populates from an ADODB ResultSet  
* @param an adodb ResultSet 
* @desc Populates all matching fields of (Voci_menuInfo) object from a resultSet
* @generationDate 2022-08-05
* @version 1.1
* @author Edoardo Pocci Delta Informatica <epocci@deltainf.it> 
* @copyright Copyright &copy; 2022, Delta Informatica 
*/ 
function populateVoci_menuInfoFromResultSet($result) 
{ 

           $thisVoci_menuInfo = new Voci_menuInfo();

           $thisVoci_menuInfo->setId_voce($result->fields[FIELD_VOCI_MENU_ID_VOCE]); 
           $thisVoci_menuInfo->setVoce($result->fields[FIELD_VOCI_MENU_VOCE]); 
           $thisVoci_menuInfo->setFile_php($result->fields[FIELD_VOCI_MENU_FILE_PHP]); 
           $thisVoci_menuInfo->setTipo($result->fields[FIELD_VOCI_MENU_TIPO]); 
           $thisVoci_menuInfo->setId_voce_padre($result->fields[FIELD_VOCI_MENU_ID_VOCE_PADRE]); 
           $thisVoci_menuInfo->setPosizione($result->fields[FIELD_VOCI_MENU_POSIZIONE]); 
           $thisVoci_menuInfo->setAttivo($result->fields[FIELD_VOCI_MENU_ATTIVO]); 
           $thisVoci_menuInfo->setImmagine($result->fields[FIELD_VOCI_MENU_IMMAGINE]); 

           return $thisVoci_menuInfo;

} // End Function populate

} // end of voci_menuGenDAO Class

?>