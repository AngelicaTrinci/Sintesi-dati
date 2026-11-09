<?php
require_once (dirname(__FILE__) . '/HugeMySQLDataSource.php');
class HugeMySQLDataSource_ottimizzata extends HugeMySQLDataSource 
{
	function GetFields()
	{
		$_fields = array();
		$_result = mysql_query($this->SelectCommand." LIMIT 0,1",$this->_Link);
		while($_prop = mysql_fetch_field($_result))
		{
			$_field = array("Name"=>$_prop->name,"Type"=>$_prop->type,"Not_Null"=>$_prop->not_null);
			array_push($_fields,$_field);
		}
		return $_fields;
	}
}
?>
