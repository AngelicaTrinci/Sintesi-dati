<?php
//***************************************************************************************
//  Example:
//  ...
//  $ds = new PDODataSource(new PDO ("mssql:host=localhost;dbname=mydatabase","username","password"));
//  $ds->SelectCommand = "SELECT * FROM customers";
//  ...
//  $grid->MasterTable->DataSource = $ds;
//  ...
//***************************************************************************************

class PDOAS400DataSource extends DataSource {

    var $SelectCommand;
    var $UpdateCommand;
    var $InsertCommand;
    var $DeleteCommand;
    public $seperator;
    public $donotUpdateFields;
    public $donotInsertFields;
    var $_PDO;
    var $EventHandler=null;

    function __construct($_pdo) {
        $this->_PDO = $_pdo;
        $this->seperator = "+"; // alt+ 457                
    }

    function GetError() {
        return $this->_PDO->errorInfo();
    }

    function SetCharSet($_charset) {
        //Set in the pdo connection.
    }

    function Count() {
        $_count_command = "SELECT COUNT(*) FROM (" . $this->SelectCommand . ") AS TMP {where}";
        $_where = "";
        $_filters = $this->Filters;
        for ($i = 0; $i < sizeof($_filters); $i++) {
            $filter_exp=$this->GetFilterExpression($_filters[$i]);
            if($filter_exp!="")
                $_where.=" and " . $filter_exp;
        }
        if ($_where != "") {
            $_where = "WHERE " . substr($_where, 5);
        }
        $_count_command = str_replace("{where}", $_where, $_count_command);
        $_statement = $this->_PDO->prepare($_count_command);
        //file_put_contents("log.sql", $_count_command,FILE_APPEND);
        $_statement->execute();

        $_result = $_statement->fetch(PDO::FETCH_NUM);

        return $_result[0];
    }

    function GetFields() {
        $_fields = array();
        $_statement = $this->_PDO->prepare($this->SelectCommand." fetch first 5 row only ");
        //file_put_contents("log.sql", $this->SelectCommand." fetch first 5 row only ",FILE_APPEND);
        $_statement->execute();

        if($_row = $_statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
            foreach($_row as $n=>$field){
                $_field = array("Name" => $n, "Type" => "string", "Not_Null" => false);
                array_push($_fields, $_field);
            }
        }

        return $_fields;
    }

    function GetData($_start = 0, $_count = 9999999) {//Return associate array of data
        $_tpl_select_command = "";
        $_tpl_select_command =  "SELECT * FROM ({SelectCommand}) AS TMP {where} {orderby} {groupby} {limit}";
        $_where = "";
        $_filters = $this->Filters;
        for ($i = 0; $i < sizeof($_filters); $i++) {
            $filter_exp=$this->GetFilterExpression($_filters[$i]);
            if($filter_exp!="")
                $_where.=" and " . $filter_exp;
        }
        if ($_where != "") {
            $_where = "WHERE " . substr($_where, 5);
        }//Order
        
        $_orderby = "";
        $_orders = $this->Sorts;
        for ($i = 0; $i < sizeof($_orders); $i++) {
            $_orderby.=", " . $_orders[$i]->Field . " " . $_orders[$i]->Order;
        }
        if ($_orderby != "") {
            $_orderby = "ORDER BY " . substr($_orderby, 2);
        }//Group
        
        $_groupby = "";
        $_groups = $this->Groups;
        for ($i = 0; $i < sizeof($_groups); $i++) {
            $_groupby.=", " . $_groups[$i]->Field;
        }
        if ($_groupby != "") {
            $_groupby = "GROUP BY " . substr($_groupby, 2);
        }
        $_limit = "fetch first ".($_start+$_count)." row only "; 


        $_select_command = str_replace("{SelectCommand}", $this->SelectCommand, $_tpl_select_command);
        $_select_command = str_replace("{where}", $_where, $_select_command);
        $_select_command = str_replace("{orderby}", $_orderby, $_select_command);
        $_select_command = str_replace("{groupby}", $_groupby, $_select_command);
        $_select_command = str_replace("{limit}", $_limit, $_select_command);

        //echo $_select_command;
        $_statement = $this->_PDO->prepare($_select_command);
        file_put_contents("log.sql", $_select_command,FILE_APPEND);
        $_statement->execute();

        $_rows = array();
        $_i = 0;
        while ($_row = $_statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
            if ($_i >= $_start) {
                if($this->EventHandler != null)
                    $_row=$this->EventHandler->OnRowPreRender($_row,null);
                if(CHARSET=="UTF-8"){
                    foreach ($_row as $key=>$value)
                        {
                            $_row[$key]= utf8_encode($value);
                        }
                }
                array_push($_rows, $_row);
            }
            $_i++;
        }
        return $_rows;
    }

    function GetAggregates($_arr) {

        $_tpl_select_command = "SELECT {text} FROM ({SelectCommand}) AS TMP {where} {orderby} {groupby}";

        $_text = "";
        $_agg_result = array();
        foreach ($_arr as $_aggregate) {
            if (strpos("||min|max|first|last|count|sum|avg|", "|" . strtolower($_aggregate["Aggregate"]) . "|") > 0) {
                $_text .= ", " . $_aggregate["Aggregate"] . "(" . $_aggregate["DataField"] . ") as " . $_aggregate["Key"];
            }
        }


        if ($_text != "") {

            $_text = substr($_text, 2);
            //Fill command and query
            //Filters
            $_where = "";
            $_filters = $this->Filters;
            for ($i = 0; $i < sizeof($_filters); $i++) {
                $filter_exp=$this->GetFilterExpression($_filters[$i]);
                if($filter_exp!="")
                    $_where.=" and " . $filter_exp;
            }
            if ($_where != "") {
                $_where = "WHERE " . substr($_where, 5);
            }
            //Order
            $_orderby = "";
            $_orders = $this->Sorts;
            for ($i = 0; $i < sizeof($_orders); $i++) {
                $_orderby.=", " . $_orders[$i]->Field . " " . $_orders[$i]->Order;
            }
            if ($_orderby != "") {
                $_orderby = "ORDER BY " . substr($_orderby, 2);
            }
            //Group
            $_groupby = "";
            $_groups = $this->Groups;
            for ($i = 0; $i < sizeof($_groups); $i++) {
                $_groupby.=", " . $_groups[$i]->Field;
            }
            if ($_groupby != "") {
                $_groupby = "GROUP BY " . substr($_groupby, 2);
            }

            $_select_command = str_replace("{SelectCommand}", $this->SelectCommand, $_tpl_select_command);
            $_select_command = str_replace("{text}", $_text, $_select_command);
            $_select_command = str_replace("{where}", $_where, $_select_command);
            $_select_command = str_replace("{orderby}", $_orderby, $_select_command);
            $_select_command = str_replace("{groupby}", $_groupby, $_select_command);

            //echo $_select_command;

            $_statement = $this->_PDO->prepare($_select_command);
            $_statement->execute();

            $_agg_result = $_statement->fetch(PDO::FETCH_ASSOC);

            //-----
        }
        return $_agg_result;
    }


    /* =========================================================
     * $this->donotInsertFields is declared as public array
     * and instantiated at the calling page
      ========================================================== */
    function Insert($_associate_array) { //eCOS version
        $_insert_commands = explode(";", $this->InsertCommand);
        $paramArray = array();
        foreach ($_insert_commands as $_insert_command) {
            $_statement = $this->_PDO->prepare($this->InsertCommand);

            foreach ($_associate_array as $_key => $_value) {
                if (!in_array($_key, $this->donotInsertFields)) {
                    $paramArray[":" . $_key] = $_value;
                }
            }
            $_statement->execute($paramArray);
        }
        return true;
    } //eof insert

    /* =========================================================
     * $this->donotUpdateFields is declared as public array
     * and instantiated at the calling page
      ========================================================== */
    function Update($_associate_array) {
        $_update_commands = explode(";", $this->UpdateCommand);
        $paramArray = array();

        try {
            $_statement = $this->_PDO->prepare($this->UpdateCommand);

            foreach ($_associate_array as $_key => $_value) {
                if($this->donotUpdateFields){
                    if (!in_array($_key, $this->donotUpdateFields)) {
                        $paramArray[":" . $_key] = $_value;
                    }
                }
                else{
                    $paramArray[":" . $_key] = $_value;
                }
            }
            $_statement->execute($paramArray);
        } catch (PDOException $exc) {
            //echo $exc->getMessage();
            return false;
        }
        return true;
    }//

    function Delete($_associate_array) {
        $_delete_commands = explode(";", $this->DeleteCommand);

        foreach ($_associate_array as $_key => $_value) {
            for ($i = 0; $i < sizeof($_delete_commands); $i++) {
                $_delete_commands[$i] = str_replace("@" . $_key, addslashes($_value), $_delete_commands[$i]);
            }
        }
        foreach ($_delete_commands as $_delete_command) {
            $_statement = $this->_PDO->prepare($_delete_command);
            if ($_statement->execute() == false) {
                return false;
            }
        }
        return true;
    }

  function GetFilterExpression($_filter) {
      $_forza_ucase=false;
      $_expression = "";
      $_value = $_filter->Value;
      switch ($_filter->Expression) {
        case "Equal":
          $_expression = "=";
          break;
        case "Not_Equal":
          $_expression = "<>";
          break;
        case "Greater_Than":
          $_expression = ">";
          break;
        case "Less_Than":
          $_expression = "<";
          break;
        case "Greater_Than_Or_Equal":
          $_expression = ">=";
          break;
        case "Less_Than_Or_Equal":
          $_expression = "<=";
          break;
        case "Contain":
          if(empty($_filter->Value)){
              return "";
          }
          $_expression = "LIKE";
          $_value = "%" . $_value . "%";
          $_forza_ucase=true;
          break;
        case "Not_Contain":
          $_expression = "NOT LIKE";
          $_value = "%" . $_value . "%";
          $_forza_ucase=true;
          break;
        case "Start_With":
          $_expression = "LIKE";
          $_value = $_value . "%";
          $_forza_ucase=true;
          break;
        case "End_With":
          $_expression = "LIKE";
          $_value = "%" . $_value;
          $_forza_ucase=true;
          break;
      }

    if($_value!=""){  //ALE_20170713: Non applico i filtri vuoti
        if($_forza_ucase){
            $_s = "UCASE(" .$_filter->Field . ") " . $_expression . " UCASE('" . $_value . "')";
        }
        else{
            $_s = $_filter->Field . " " . $_expression . " '" . $_value . "'";
        }
  //      if (empty($_filter->Value))
  //        $_s ='('.$_s . ' or ' . $_filter->Field . " is null)";
    }
      
      return $_s;
    }
}
?>
