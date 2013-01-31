<?php require_once('dbconfig.php');
 class getdata
 {
	function getqual(){
		$sql="SELECT qual_id, description FROM `tbl_qualification`";
		$result=mysql_query($sql);
		// echo $result;
		$qual=array();
		while ($rs=mysql_fetch_array($result,MYSQL_ASSOC)) {
			# code...
			$qual[]=$rs;
		}
		return $qual;
	}
	function getref(){
		$sql="SELECT reference_id, description FROM `tbl_reference`";
		$result=mysql_query($sql);
		// echo $result;
		$ref=array();
		while ($rs=mysql_fetch_array($result,MYSQL_ASSOC)) {
			# code...
			$ref[]=$rs;
		}
		return $ref;
	}
	function getstat(){
		$sql="SELECT status_id, description FROM `tbl_status`";
		$result=mysql_query($sql);
		// echo $result;
		$stat=array();
		while ($rs=mysql_fetch_array($result,MYSQL_ASSOC)) {
			# code...
			$stat[]=$rs;
		}
		return $stat;
	}
}
$obj=new getdata();
$quals=$obj->getqual();
$refs=$obj->getref();
$stats=$obj->getstat();
