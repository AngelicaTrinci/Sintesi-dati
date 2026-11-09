<?php
//***************************************
// Written by Khanal, Aashis Binod
//***************************************
function str_replace_first($search, $replace, $subject) {
    $pos = stripos($subject, $search);
    if ($pos !== false) {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}

class SQLSRVDataSource extends DataSource
{
	var $SelectCommand;
	var $UpdateCommand;
	var $InsertCommand;
	var $DeleteCommand;
	var $_Orders;
	var $_Link;
	
	function __construct($_link)
	{
		$this->_Link = $_link;
	}
	function GetFilterExpression($_filter)//modifica classi griglia nuove
	{
            $_expression = "";
            $_value = $_filter->Value;
            switch($_filter->Expression)
            {
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
                    $_expression = "LIKE";
                    $_value = "%".$_value."%";
                    break;
                case "Not_Contain":
                    $_expression = "NOT LIKE";
                    $_value = "%".$_value."%";
                    break;
                case "Start_With":
                    $_expression = "LIKE";
                    $_value = $_value."%";
                    break;
                case "End_With":
                    $_expression = "LIKE";
                    $_value = "%".$_value;
                    break;
                default:
                    $_expression = $_filter->Expression;
                    break;
            }
            if( $_filter->Expression!=$_expression ){
                $_filter->Expression=$_expression;
                $_filter->Value= str_replace("'","''",stripslashes($_value));
            }
            return   $_filter; 
    }
	function Count()
	{
            $select_command=$this->SelectCommand;
             $posorder=stripos($select_command, " order by ");
                if($posorder>0)
                {
                    $select_command=  substr($select_command, 0,$posorder);
                }
            $_count_command = "SELECT COUNT(*) as count FROM (".$select_command.") AS _TMP {where}";
            $_where = "";
            $_filters = $this->Filters;
            
            for($i=0;$i<sizeof($_filters);$i++)
            {
                $_filters[$i]=$this->GetFilterExpression($_filters[$i]); //modifica classi griglia nuove
                $_value = $_filters[$i]->Value;
                $_value = "'".$_value."'";
                if($_filters[$i]->Value=="%%") $_value.=" OR ".$_filters[$i]->Field." IS NULL ";
                $_where.=" and (".$_filters[$i]->Field." ".$_filters[$i]->Expression." ".$_value.")";
            }
            if ($_where!="")
            {
                $_where = "WHERE ".substr($_where,5);
            }

            $_count_command = str_replace("{where}",$_where,$_count_command);
             //file_put_contents("getcount.sql", $_count_command);
             
            $_result = sqlsrv_query($this->_Link,$_count_command);
            $data 	 = sqlsrv_fetch_array($_result,SQLSRV_FETCH_ASSOC);
            return $data["count"];
		//return mssql_result($_result,0,0);
	}	
	
	function GetFields()
	{
            $_fields = array();
            if(stripos( $this->SelectCommand,"DISTINCT")<20&&stripos( $this->SelectCommand,"DISTINCT")>0){
                $select_command=str_replace_first("DISTINCT", "DISTINCT TOP 1", $this->SelectCommand);
                
            }else 
                $select_command=str_replace_first("SELECT", "SELECT TOP 1", $this->SelectCommand);
                
                /*$posorder=stripos($select_command, " order by ");
                if($posorder>0)
                {
                    $select_command=  substr($select_command, 0,$posorder);
                }*/
                //file_put_contents("getfields.sql", $_select_command);
		$_result = sqlsrv_query($this->_Link,$select_command);
		$data = sqlsrv_field_metadata($_result);
		//echo "<pre>";
		//print_r($data);
		foreach($data as $key=>$value) {
			$_field  = array("Name"=>$value['Name'],"Type"=>$value['Type'],"Not_Null"=>0);
			array_push($_fields,$_field);
		}
		return $_fields;
		/*while($_prop = sqlsrv_field_metadata($_result))
		{
			$_field = array("Name"=>$_prop['Name'],"Type"=>$_prop['Type'],"Not_Null"=>0);
			array_push($_fields,$_field);
		}
		return $_fields;*/
	}
	
	function GetData($_start=0,$_count=9999999)
	{
            //Return associate array of data

            $_tpl_select_command =  "SELECT {limit} *{row_number} FROM ({SelectCommand}) AS _TMP {where} {orderby} {groupby}";

            //Filters
            $_where = "";
		 $_row_number="";
            $_filters = $this->Filters;
            for($i=0;$i<sizeof($_filters);$i++)
            {
                $_filters[$i]=$this->GetFilterExpression($_filters[$i]); //modifica classi griglia nuove
                $_value = $_filters[$i]->Value;
                $_value = "'".$_value."'";
                 if($_filters[$i]->Value=="%%") $_value.=" OR ".$_filters[$i]->Field." IS NULL ";
                $_where.=" and (".$_filters[$i]->Field." ".$_filters[$i]->Expression." ".$_value.")";
            }
            if ($_where!="")
            {
                $_where = "WHERE ".substr($_where,5);
            }
            //Order
            $_orderby = "";
            $_orders = $this->Sorts;
            for($i=0;$i<sizeof($_orders);$i++)
            {
                $_orderby.=", ".$_orders[$i]->Field." ".$_orders[$i]->Order;
            }
            if ($_orderby!="")
            {
                $_orderby = "ORDER BY ".substr($_orderby,2);
            }
            $select_command=$this->SelectCommand;
            $posorder=stripos($select_command, " order by ");
            if($posorder>0)
            {
                $select_command=  substr($select_command, 0,$posorder);
                if($_orderby=="")
                    {
                        $_orderby=substr($this->SelectCommand, $posorder);
                    }
            }
           
            if($this->_Orders!="")
                        {
                    $_orderby = "ORDER BY ".$this->_Orders;
                        }
            //Group
            $_groupby = "";
            $_groups = $this->Groups;
            for($i=0;$i<sizeof($_groups);$i++)
            {
                $_groupby.=", ".$_groups[$i]->Field;
            }
            if ($_groupby!="")
            {
                $_groupby = "GROUP BY ".substr($_groupby,2);
            }
            //Limit
            $_limit = "TOP ".($_start+$_count); 		

            $_select_command = str_replace("{SelectCommand}",$select_command,$_tpl_select_command);
            $_select_command = str_replace("{where}",$_where,$_select_command);
            $_select_command = str_replace("{orderby}",$_orderby,$_select_command);
            $_select_command = str_replace("{groupby}",$_groupby,$_select_command);
            $_select_command = str_replace("{limit}",$_limit,$_select_command);
		 if($_orderby!="") $_row_number=",ROW_NUMBER() OVER($_orderby)";
		 $_select_command = str_replace("{row_number}",$_row_number,$_select_command);

            //file_put_contents("getdata.sql", $_select_command);
            $_result = sqlsrv_query($this->_Link,$_select_command);
            $_rows = array();
            $_i=0;

            while ($_row = sqlsrv_fetch_array($_result,SQLSRV_FETCH_ASSOC)) 
            {
                if($_i>=$_start) {
                    array_push($_rows,$_row);				
                }
                $_i++;
            }

            return $_rows;
	}
	function GetAggregates($_arr)
	{
		$_tpl_select_command =  "SELECT {text} FROM ({SelectCommand}) AS _TMP {where} {orderby} {groupby}";

		$_text = "";
		$_agg_result = array();
		foreach($_arr as $_aggregate)
		{
			if (strpos("||min|max|first|last|count|sum|avg|","|".strtolower($_aggregate["Aggregate"])."|")>0)
			{
				$_text .=  ", ".$_aggregate["Aggregate"]."(".$_aggregate["DataField"].") as ".$_aggregate["Key"];				
			}
		}
		if ($_text!="")
		{

			$_text = substr($_text,2);
			//Fill command and query
			//Filters
			$_where = "";
			$_filters = $this->Filters;
			for($i=0;$i<sizeof($_filters);$i++)
			{
				$_value = "'".$_filters[$i]->Value."'";
				$_where.=" and ".$_filters[$i]->Field." ".$_filters[$i]->Expression." ".$_value;
			}
			if ($_where!="")
			{
				$_where = "WHERE ".substr($_where,5);
			}
			//Order
			$_orderby = "";
			$_orders = $this->Sorts;
			for($i=0;$i<sizeof($_orders);$i++)
			{
				$_orderby.=", ".$_orders[$i]->Field." ".$_orders[$i]->Order;
			}
			if ($_orderby!="")
			{
				$_orderby = "ORDER BY ".substr($_orderby,2);
			}
                        if($this->_Orders!="")
                        {
                    $_orderby = "ORDER BY ".$this->_Orders;
                        }
			//Group
			$_groupby = "";
			$_groups = $this->Groups;
			for($i=0;$i<sizeof($_groups);$i++)
			{
				$_groupby.=", ".$_groups[$i]->Field;
			}
			if ($_groupby!="")
			{
				$_groupby = "GROUP BY ".substr($_groupby,2);
			}
			
			$_select_command = str_replace("{SelectCommand}",$this->SelectCommand,$_tpl_select_command);
			$_select_command = str_replace("{text}",$_text,$_select_command);
			$_select_command = str_replace("{where}",$_where,$_select_command);
			$_select_command = str_replace("{orderby}",$_orderby,$_select_command);
			$_select_command = str_replace("{groupby}",$_groupby,$_select_command);
			
			$_result = sqlsrv_query($this->_Link,$_select_command);
			$_agg_result = sqlsrv_fetch_array($_result,SQLSRV_FETCH_ASSOC);

		//-----
		}
		return $_agg_result;
	}
	function Insert($_associate_array)
	{
		$_insert_command = $this->InsertCommand;
		foreach($_associate_array as $_key=>$_value)
		{
			$_insert_command = str_replace("@".$_key,addslashes($_value),$_insert_command);
		}
		return sqlsrv_query($this->_Link,$_insert_command);// true|false
	}
	function Update($_associate_array)
	{
		$_update_command = $this->UpdateCommand;
		foreach($_associate_array as $_key=>$_value)
		{
			$_update_command = str_replace("@".$_key,addslashes($_value),$_update_command);
		}
		echo $_update_command;
		return sqlsrv_query($this->_Link,$_update_command);
	}
	function Delete($_associate_array)
	{
		$_delete_command = $this->DeleteCommand;
		foreach($_associate_array as $_key=>$_value)
		{
			$_delete_command = str_replace("@".$_key,addslashes($_value),$_delete_command);
		}
		return sqlsrv_query($this->_Link,$_delete_command);		
	}
}

?>