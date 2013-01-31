<?php 
include 'dbconfig.php';
// session_start();
class getstatus{
	function get_status($userid){

		$query="SELECT post_id from tbl_user_post where user_id=".$userid;
		$rs=mysql_query($query);
		$result=mysql_fetch_array($rs,MYSQL_ASSOC);
		$post_id=$result['post_id'];

		$sql="select (select description from tbl_status where status_id = tps.status_id) status, tps.status_date
		from tbl_post_status tps where tps.up_id 
		in (select up_id from tbl_user_post where user_id='$userid' and post_id='$post_id') order by tps.status_date desc limit 1";
		$rs=mysql_query($sql)or die(mysql_error());
		$result=mysql_fetch_array($rs,MYSQL_ASSOC) or mysql_error();
		return $result;
		
	}
	function get_refqual(){

		$sql="SELECT description from tbl_reference where reference_id=".$_SESSION['reference_id'];
		$rs=mysql_query($sql);
		$result=mysql_fetch_array($rs,MYSQL_ASSOC);
		$query="SELECT description from tbl_qualification where qual_id=".$_SESSION['qual_id'];
		$rslt=mysql_query($query);
		$qual=mysql_fetch_array($rslt,MYSQL_ASSOC);
		$refqual['ref']=$result['description'];
		$refqual['qual']=$qual['description'];
		return $refqual;
			# code...	
	}
	function get_time(){
		// session_start();
		$query="SELECT post_id from tbl_user_post where user_id=".$_SESSION['user_id'];
		$rs=mysql_query($query);
		$result=mysql_fetch_array($rs,MYSQL_ASSOC);
		$post_id=$result['post_id'];
		// echo $post_id;
		// echo $_SESSION['user_id'];
		$sql="select tps.status_date
		from tbl_post_status tps where tps.up_id 
		in (select up_id from tbl_user_post where user_id=".$_SESSION['user_id'].", post_id=".$post_id." and status_id = '2') order by tps.status_date desc limit 1 ";
		$rslt=mysql_query($sql) or die(mysql_error());
		$rs=mysql_fetch_array($rslt,MYSQL_ASSOC) or die(mysql_error());

		// print_r($rs);
	
	
		$date=new datetime($rs['status_date']);
		$date->add(new DateInterval('P2D'));
		$enddate= $date->format('Y-m-d H:i:s');
		// echo "end date : ".$enddate. "\n";
		date_default_timezone_set('Asia/Calcutta');
		$curdate=date("Y-m-d H:i:s ", time());
		// echo "current date : ".$curdate. "\n";
		$datetime2 = new DateTime($enddate);
		$datetime1 = new DateTime($curdate);
		$interval = $datetime1->diff($datetime2);
		// echo "Time left : ".$interval->format('%R%a day %H:%I:%S hours');
	 	
	 	$days=$interval->format('%R');
	 	// echo $days;
	 	
	 	if($days=="+"){
	 		// echo "yes";
	 		return $timeleft= $interval->format('%a day %H:%i:%s hours ');
	 	}

	 	else{
	 		// echo "no";
	 		return $timeleft=false;
	 	}
	 	
		
		
	}
	
	function get_user_post(){
		$sql="SELECT post_id from tbl_user_post where user_id=".$_SESSION['user_id'];
		$rs=mysql_query($sql);
		$result=mysql_fetch_array($rs,MYSQL_ASSOC);
		$query="SELECT code from tbl_post where post_id=".$result['post_id'];
		$rslt=mysql_query($query);
		$qual=mysql_fetch_array($rslt,MYSQL_ASSOC);
		return $qual['code'];
	}
	function get_problem($prob_id){
		
			$sql="SELECT * FROM RecPro.tbl_problem WHERE problem_id=".$prob_id;
	        $rs=mysql_query($sql) or die(mysql_error());
	        $prob=array();
	     	$result=mysql_fetch_array($rs,MYSQL_ASSOC);
	        return $result;
	     
	}
	function get_all_status(){
		// session_start();
		$userid=$_SESSION['user_id'];
		echo $userid;
		$query="SELECT post_id from tbl_user_post where user_id=".$userid;
		$rs=mysql_query($query);
		$result=mysql_fetch_array($rs,MYSQL_ASSOC);
		echo $post_id=$result['post_id'];

		$sql="select (select description from tbl_status where status_id = tps.status_id) status, tps.status_date
		from tbl_post_status tps where tps.up_id 
		in (select up_id from tbl_user_post where user_id='$userid' and post_id='$post_id') order by tps.status_date desc ";
		$rs=mysql_query($sql)or die(mysql_error());
		$allstatus=array();
		while($result=mysql_fetch_array($rs,MYSQL_ASSOC) or mysql_error())
		{
			$allstatus[]=$result;
		}
		return $allstatus;
	}
}
// $object= new getstatus();
// $object->get_all_status();