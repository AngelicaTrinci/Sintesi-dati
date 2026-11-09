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


class IBMiDb2DataSource extends DataSource
{
	var $SelectCommand;
	var $UpdateCommand;
	var $InsertCommand;
	var $DeleteCommand;
	
	var $_Link;
	
	function __construct($_link)
	{
		$this->_Link = $_link;
	}
	function GetError()
	{
		return db2_stmt_error();
	}
	function SetCharSet($_charset)
	{
		
	}	
	function Count()
	{
		$_count_command = "SELECT COUNT(*) FROM (".$this->SelectCommand.") AS TMP {where}";
		//error_log($_count_command);
		$_where = "";
		$_filters = $this->Filters;
		for($i=0;$i<sizeof($_filters);$i++)
		{
			$_where.=" and ".$this->GetFilterExpression($_filters[$i]);
		}
		if ($_where!="")
		{
			$_where = "WHERE ".substr($_where,5);
		}
		
		$_count_command = str_replace("{where}",$_where,$_count_command);
		//error_log($_count_command);
		$_result = db2_exec($this->_Link, $_count_command);
		return db2_fetch_array($_result)[0];
	}	
	
	function GetFields()
	{
		$_fields = array();
		$_result = db2_prepare($this->_Link, $this->SelectCommand);
		$_columns = db2_num_fields($_result);
		for($i=0; $i<$_columns; $i++){
			$_field = array("Name"=>db2_field_name($_result, $i),"Type"=>db2_field_type($_result, $i),"Not_Null"=>0);
			array_push($_fields,$_field);
		}
		return $_fields;
	}
	
	function GetData($_start=0,$_count=9999999)
	{
		//Return associate array of data
		
		$_tpl_select_command =  "{SelectCommand} {where} {orderby} {groupby} {limit}";
		
		//Filters
		$_where = "";
		$_filters = $this->Filters;
		for($i=0;$i<sizeof($_filters);$i++)
		{
			$_where.=" and ".$this->GetFilterExpression($_filters[$i]);
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
		$_limit = "FETCH FIRST ".($_start+$_count)." ROWS ONLY"; 		
		
		$_select_command = str_replace("{SelectCommand}",$this->SelectCommand,$_tpl_select_command);
		$_select_command = str_replace("{where}",$_where,$_select_command);
		$_select_command = str_replace("{orderby}",$_orderby,$_select_command);
		$_select_command = str_replace("{groupby}",$_groupby,$_select_command);
		$_select_command = str_replace("{limit}",$_limit,$_select_command);
		
		//echo $_select_command;
		$_result = db2_exec($this->_Link, $_select_command);
		$_rows = array();
		$_i=0;
		while ($_row = db2_fetch_assoc($_result)) 
		{
			if($_i>=$_start)
			{
                foreach ($_row as $_column => & $_value)
                    $_value = $this->getMappedValue($_value, $_column);
				array_push($_rows,$_row);				
			}
			$_i++;
		}

		return $_rows;
	}
	
	function GetAggregates($_arr)
	{
		$_tpl_select_command =  "SELECT {text} FROM ({SelectCommand}) AS TMP {where} {orderby} {groupby}";

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
				$_where.=" and ".$this->GetFilterExpression($_filters[$i]);
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
			
			$_result = db2_exec($this->_Link, $_select_command);
			$_agg_result = db2_fetch_assoc($_result);

		//-----
		}
        foreach ($_agg_result as $_column => & $_value)                
            $_value = $this->getMappedValue($_value, $_column);
		return $_agg_result;
	}

	/*
	function Insert($_associate_array)
	{
	    error_log(print_r($_associate_array, true));
		$_insert_commands = explode(";",$this->InsertCommand);
		foreach($_associate_array as $_key=>$_value)
		{
            $_value = $this->getInverseMappedValue($_value, $_key);
			for($i=0;$i<sizeof($_insert_commands);$i++)
			{
			    error_log($_insert_commands[$i]);
				$_insert_commands[$i] = preg_replace("/(@".$_key.")([\)\'\"]*[\s;,])/",preg_quote(addslashes($_value))."$2",$_insert_commands[$i]);
				//$_insert_commands[$i] = preg_replace("/(@".$_key.")([\)\'\"]*[\s;,])/",preg_quote(addslashes($_value))."$2",$_insert_commands[$i]);
				error_log($_insert_commands[$i]);
				$_insert_commands[$i] = preg_replace("/(@".$_key.")([\)\'\"]*$)/",preg_quote(addslashes($_value))."$2",$_insert_commands[$i]);
				//$_insert_commands[$i] = preg_replace("/(@".$_key.")([\)\'\"]*$)/",preg_quote(addslashes($_value))."$2",$_insert_commands[$i]);
				error_log($_insert_commands[$i]);
			}
			
		}
		foreach($_insert_commands as $_insert_command)
		{
		    error_log($_insert_command);
			if (db2_exec($this->_Link, $_insert_command)==false)
			{
				return false;
			}
		}
		return true;
	}
	*/

	function Insert($_associate_array)
	{
		$_insert_commands = explode(";",$this->InsertCommand);
		$_insert_values = array();
		
		//Find parameter order pr insert command
		for($i=0;$i<sizeof($_insert_commands);$i++)
		{
		    $_insert_values[$i] = array();
            foreach($_associate_array as $_key=>$_value)
            {
                $lastPos = 0;
                while (($lastPos=strpos($_insert_commands[$i], $_key, $lastPos)) !== false){
                    $_insert_values[$i][$_key] = $lastPos;
                    $lastPos = $lastPos + strlen($_key);
                }
            }
		}
		
		//Replace parameters with ?
		foreach($_associate_array as $_key=>$_value)
		{
            $_value = $this->getInverseMappedValue($_value, $_key);
			for($i=0;$i<sizeof($_insert_commands);$i++)
			{
				//$_insert_commands[$i] = preg_replace("/(@".$_key.")([\)\'\"]*[\s;,])/","? ",$_insert_commands[$i]);
				//$_insert_commands[$i] = preg_replace("/(@".$_key.")([\)\'\"]*$)/","? ",$_insert_commands[$i]);
				$_insert_commands[$i] = str_replace("@".$_key, "?", $_insert_commands[$i]);
			}
		}
		//echo sizeof($_update_commands);
		for($i=0;$i<sizeof($_insert_commands);$i++)
		{
			$values = array();
			asort($_insert_values[$i]);
			foreach ($_insert_values[$i] as $_key => $val)
			    array_push($values, $_associate_array[$_key]);
			$stmt = db2_prepare($this->_Link, $_insert_commands[$i]);
			if (db2_execute($stmt, $values)==false)
			{
				return false;
			}
		}
		return true;
	}
	
	/*
	function Update($_associate_array)
	{
	    error_log(print_r($_associate_array, true));
		$_update_commands = explode(";",$this->UpdateCommand);		
		foreach($_associate_array as $_key=>$_value)
		{
            $_value = $this->getInverseMappedValue($_value, $_key);
			for($i=0;$i<sizeof($_update_commands);$i++)
			{
				$_update_commands[$i] = preg_replace("/(@".$_key.")([\)\'\"]*[\s;,])/",preg_quote(addslashes($_value))."$2",$_update_commands[$i]);
				$_update_commands[$i] = preg_replace("/(@".$_key.")([\)\'\"]*$)/",preg_quote(addslashes($_value))."$2",$_update_commands[$i]);
			}
		}
		//echo sizeof($_update_commands);
		foreach($_update_commands as $_update_command)
		{
			error_log($_update_command);
			if (db2_exec($this->_Link, $_update_command)==false)
			{
				return false;
			}
		}
		return true;
	}
	*/
	function Update($_associate_array)
	{
		$_update_commands = explode(";",$this->UpdateCommand);
		$_update_values = array();
		
		//Find parameter order pr update command
		for($i=0;$i<sizeof($_update_commands);$i++)
		{
		    $_update_values[$i] = array();
            foreach($_associate_array as $_key=>$_value)
            {
                $lastPos = 0;
                while (($lastPos=strpos($_update_commands[$i], $_key, $lastPos)) !== false){
                    $_update_values[$i][$_key] = $lastPos;
                    $lastPos = $lastPos + strlen($_key);
                }
            }
		}
		
		//Replace parameters with ?
		foreach($_associate_array as $_key=>$_value)
		{
            $_value = $this->getInverseMappedValue($_value, $_key);
			for($i=0;$i<sizeof($_update_commands);$i++)
			{
				//$_update_commands[$i] = preg_replace("/(@".$_key.")([\)\'\"]*[\s;,])/","? ",$_update_commands[$i]);
				//$_update_commands[$i] = preg_replace("/(@".$_key.")([\)\'\"]*$)/","? ",$_update_commands[$i]);
				$_update_commands[$i] = str_replace("@".$_key, "?", $_update_commands[$i]);
			}
		}
		//echo sizeof($_update_commands);
		for($i=0;$i<sizeof($_update_commands);$i++)
		{
			$values = array();
			asort($_update_values[$i]);
			foreach ($_update_values[$i] as $_key => $val)
			    array_push($values, $_associate_array[$_key]);
			$stmt = db2_prepare($this->_Link, $_update_commands[$i]);
			if (db2_execute($stmt, $values)==false)
			{
				return false;
			}
		}
		return true;
	}
	
	function Delete($_associate_array)
	{
		$_delete_commands = explode(";",$this->DeleteCommand);
		
		foreach($_associate_array as $_key=>$_value)
		{
            $_value = $this->getInverseMappedValue($_value, $_key);
			for($i=0;$i<sizeof($_delete_commands);$i++)
			{
				$_delete_commands[$i] = preg_replace("/(@".$_key.")([\)\'\"]*[\s;,])/",preg_quote(addslashes($_value))."$2",$_delete_commands[$i]);
				$_delete_commands[$i] = preg_replace("/(@".$_key.")([\)\'\"]*$)/",preg_quote(addslashes($_value))."$2",$_delete_commands[$i]);
			}
		}
		foreach($_delete_commands as $_delete_command)
		{
		    //error_log($_delete_command);
			if (db2_exec($this->_Link, $_delete_command)==false)
			{
				return false;
			}
		}
		return true;
	}	
}

?>