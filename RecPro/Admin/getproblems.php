<?php 
require 'dbconfig.php';
	class getproblems{
		function get_problems()
		{

			$sql="SELECT * FROM RecPro.tbl_problem WHERE 1";

	        $rs=mysql_query($sql) or die(mysql_error());
	        // echo $rs;
	        $prob=array();
	        // print_r($prob);
	        while ($result=mysql_fetch_array($rs,MYSQL_ASSOC) )
	        {

	        	$prob[]=$result;
	        	
	        }
	       	// print_r($prob);
	       	return $prob;

		} 
	}
$prob=new getproblems();
$prob->get_problems();