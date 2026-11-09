<?php

class MySQLDataSource_ottimizzata extends MySQLDataSource
{
        var $CountGrid=null;
        var $queryCount=null;
        
	/*function __construct($_link)
	{
		$this->_Link = $_link;
	}
        /*
    function Count()
	{
		$_count_command = "DELIMITER $$
 CREATE FUNCTION `regex_replace`( pattern VARCHAR(1000),replacement VARCHAR(1000),original VARCHAR(1000))

RETURNS VARCHAR(1000)
 DETERMINISTIC
 BEGIN
 DECLARE temp VARCHAR(1000);
 DECLARE ch VARCHAR(1);
 DECLARE replacement_2 varchar(1000);
 DECLARE i, onlyfirst INT;
 SET i = 1;
 SET onlyfirst = 0;
 SET temp = ”;
 IF original REGEXP pattern THEN 

 # Sergio Abreu begin
 # Set a flag to indicate that should leave after the first check,
 # concatenating the remaining original chars to the first replaced char.
 IF INSTR( pattern, ‘^’) = 1 THEN
 set pattern = SUBSTR(pattern,2);
 set onlyfirst = 1;
 END IF;
 # Sergio Abreu end

 loop_label: LOOP
 IF i>CHAR_LENGTH(original) THEN
 LEAVE loop_label;
 END IF;
 SET ch = SUBSTRING(original,i,1);
 IF NOT ch REGEXP pattern THEN
 SET temp = CONCAT(temp,ch);
 ELSE
 IF INSTR(replacement , ‘\$_’) > 0 THEN
 set replacement_2 = REPLACE( replacement, ‘\$_’, ch);
 ELSE
 set replacement_2 = replacement;
 END IF;
 SET temp = CONCAT(temp,replacement_2);
 END IF;
 SET i=i+1;

 # Sergio Abreu begin
 # To remove or replace just the first occurence.
 # It will concatenate the original remaining chars.
 IF onlyfirst = 1 THEN
 SET temp = CONCAT( temp, SUBSTR( original, i));
 LEAVE loop_label;
 END IF;
 # Sergio Abreu end

 END LOOP;
 ELSE
 SET temp = original;
 END IF;
 RETURN temp;
 END$$
 DELIMITER ;".
                "SELECT COUNT(*) FROM (".$this->SelectCommand.") AS _TMP {where}";
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
		$_result = mysql_query($_count_command,$this->_Link);
		$_count =  mysql_result($_result,0,0);
		mysql_free_result($_result);
		return $_count;
	}	
*/
        function GetFilterExpression($_filter)
	{
			$datasource=new DataSource();	
                        return $datasource->GetFilterExpression($_filter);
	}
    var $optimize_count=false;
    function Count()
	{
        if($this->optimize_count&&$this->CountGrid!==null) return $this->CountGrid;
        if($this->queryCount!==null)
            {
                $_result = mysql_query($this->queryCount);
		$_count =  mysql_result($_result,0,0);
		mysql_free_result($_result);
                if($this->optimize_count)
                    {
                    $this->CountGrid=$_count;
                    }
		return $_count;
            }
                $_count_command=$this->SelectCommand;
                if(strrpos($this->SelectCommand, "ORDER BY",-1)>0){
                    $_count_command =  substr($this->SelectCommand, 0,  strrpos($this->SelectCommand, "ORDER BY",-1));
                }
		$_count_command = "SELECT COUNT(*) FROM (".$_count_command.") AS _TMP {where}";
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
                //file_put_contents("getcount.sql", $_count_command);
		$_result = mysql_query($_count_command);
		$_count =  mysql_result($_result,0,0);
		mysql_free_result($_result);
                if($this->optimize_count)
                    {
                    $this->CountGrid=$_count;
                    }
		return $_count;
	}	
	function GetData($_start=0,$_count=9999999)
	{
		//Return associate array of data
		$_tpl_select_command =  "SELECT * FROM ({SelectCommand} ) AS _TMP {where} {orderby} {groupby} {limit}";
		
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
		$_limit = "LIMIT ".$_start." , ".$_count; 		
		
		$_select_command = str_replace("{SelectCommand}",$this->SelectCommand,$_tpl_select_command);
		$_select_command = str_replace("{where}",$_where,$_select_command);
		$_select_command = str_replace("{orderby}",$_orderby,$_select_command);
		$_select_command = str_replace("{groupby}",$_groupby,$_select_command);
		$_select_command = str_replace("{limit}",$_limit,$_select_command);
		
		//echo $_select_command." - ".$this->_Link;
                file_put_contents("getdata.sql", $_select_command);
		$_result = mysql_query($_select_command);
		$_rows = array();
		
		while ($_row = mysql_fetch_array($_result)) 
		{
			array_push($_rows,$_row);
		}
		return $_rows;
	}
function GetFields()
	{
		$_fields = array();
                if(strpos($this->SelectCommand," LIMIT ")>0)
                        $_result = mysql_query(" SELECT * FROM ( ".$this->SelectCommand.") AS _TMP LIMIT 0,1");
                else $_result = mysql_query($this->SelectCommand." LIMIT 0,1");
		while($_prop = mysql_fetch_field($_result))
		{
			$_field = array("Name"=>$_prop->name,"Type"=>$_prop->type,"Not_Null"=>$_prop->not_null);
			array_push($_fields,$_field);
		}
		return $_fields;
	}
}
?>
