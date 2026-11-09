<?php

//***************************************************************************************
//  Example:
//  ...
//  $ds_con = mssql_connect('KALLESPC\SQLEXPRESS', 'sa', 'phpfi');
//  $ds = new MSSQLDataSource($ds_con);
//  $ds->SelectCommand = "SELECT * FROM customers";
//  ...
//  $grid->MasterTable->DataSource = $ds;
//  ...
//***************************************************************************************

function str_replace_first($search, $replace, $subject) {
    $pos = strpos($subject, $search);
    if ($pos !== false) {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }
return $subject;
}
class MSSQLDataSource extends DataSource
{
	var $SelectCommand;
	var $UpdateCommand;
	var $InsertCommand;
	var $DeleteCommand;
	var $orderBy;
	var $_Link;
        var $_Orders;
        var $CountCommand=null;
	
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
            }
            $_filter->Expression=$_expression;
             $_filter->Value=$_value;
            return    $_filter; 
    }
	function Count()
	{
		$_count_command = "SELECT COUNT(*) FROM (".$this->SelectCommand.") AS _TMP {where}";
               $_where = "";
		$_filters = $this->Filters;
		for($i=0;$i<sizeof($_filters);$i++)
		{
                    $_filters[$i]=$this->GetFilterExpression($_filters[$i]); //modifica classi griglia nuove
			$_value = $_filters[$i]->Value;
			$_value = "'".$_value."'";
			$_where.=" and ".$_filters[$i]->Field." ".$_filters[$i]->Expression." ".$_value;
		}
		if ($_where!="")
		{
			$_where = "WHERE ".substr($_where,5);
		}
		$_count_command = str_replace("{where}",$_where,$_count_command);
                
//file_put_contents('c:\logQuery.log', "COUNT= ".$_count_command, FILE_APPEND | LOCK_EX);
                //if($this->CountCommand==null||$_where!="")
                    $_result = mssql_query($_count_command,$this->_Link);
                //else $_result = mssql_query($this->CountCommand,$this->_Link);
		return mssql_result($_result,0,0);
	}	
	function GetFields()
	{
            if(strpos( $this->SelectCommand,"DISTINCT")<20&&strpos( $this->SelectCommand,"DISTINCT")>0)
                {
                $select_command=str_replace_first("DISTINCT", "DISTINCT TOP 5", $this->SelectCommand);
            
                }else 
            $select_command=str_replace_first("SELECT", "SELECT TOP 5", $this->SelectCommand);
            //file_put_contents('c:\logQuery.log', "GETFIELDS= ".$select_command, FILE_APPEND | LOCK_EX);
		
		$_fields = array();
		$_result = mssql_query($select_command,$this->_Link);
                while($_prop = mssql_fetch_field($_result))
		{
			$_field = array("Name"=>$_prop->name,"Type"=>$_prop->type,"Not_Null"=>0);
			array_push($_fields,$_field);
		}
		return $_fields;
	}
	
	function GetData($_start=0,$_count=9999999)
	{
		//Return associate array of data
		
		$_tpl_select_command =  "SELECT {limit} * FROM ({SelectCommand}) AS _TMP {where} {orderby} {groupby}";
		
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
		//Limit
		$_limit = "TOP ".($_start+$_count); 		
		
		$_select_command = str_replace("{SelectCommand}",$this->SelectCommand,$_tpl_select_command);
		$_select_command = str_replace("{where}",$_where,$_select_command);
		$_select_command = str_replace("{orderby}",$_orderby,$_select_command);
		$_select_command = str_replace("{groupby}",$_groupby,$_select_command);
		$_select_command = str_replace("{limit}",$_limit,$_select_command);
		
		//echo $_select_command;
		$_result = mssql_query($_select_command,$this->_Link);
                //file_put_contents('c:\logQuery.log', "GETDATA= ".$_select_command, FILE_APPEND | LOCK_EX);
		
		$_rows = array();
		$_i=0;
		while ($_row = mssql_fetch_assoc($_result)) 
		{
			if($_i>=$_start)
			{
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
			
			$_result = mssql_query($_select_command,$this->_Link);
                        //file_put_contents('c:\logQuery.log', "GETAGGREGATES= ".$_select_command, FILE_APPEND | LOCK_EX);
		
			$_agg_result = mssql_fetch_assoc($_result);

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
		return mssql_query($_insert_command,$this->_Link);// true|false
	}
	function Update($_associate_array)
	{
		$_update_command = $this->UpdateCommand;
		foreach($_associate_array as $_key=>$_value)
		{
			$_update_command = str_replace("@".$_key,addslashes($_value),$_update_command);
		}
		return mssql_query($_update_command,$this->_Link);
	}
	function Delete($_associate_array)
	{
		$_delete_command = $this->DeleteCommand;
		foreach($_associate_array as $_key=>$_value)
		{
			$_delete_command = str_replace("@".$_key,addslashes($_value),$_delete_command);
		}
		return mssql_query($_delete_command,$this->_Link);		
	}
}

?>