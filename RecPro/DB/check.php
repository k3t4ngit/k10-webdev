<?php 

	class check{

		function checkuser(){
			$sql="SELECT * FROM RecPro.tbl_user_post where user_id=".$_SESSION['user_id'];
			$check=mysql_query($sql);
			$r=mysql_fetch_array($check);

			// print_r($r);
			if ($r){
				return true;
				// echo "true";
			} 
			else{
				return false;
				
			}
			
		}
		function check_prob_assigned(){
			// session_start();
			include 'dbconfig.php';
			$query="SELECT up_id from tbl_user_post where user_id=".$_SESSION['user_id']; //get up_id for user
			$rs=mysql_query($query);
			$result=mysql_fetch_array($rs,MYSQL_ASSOC);
			$up_id=$result['up_id'];
			$sql="SELECT other from RecPro.tbl_post_status where up_id=".$up_id." and status_id=2";
			$resource=mysql_query($sql)or die(mysql_error());

			$rslt=mysql_fetch_array($resource,MYSQL_ASSOC);

			if (isset($rslt['other'])) {
				
				// echo "true";
				return true;
			}
			else{
				// return "false";
				return false;
			}
		}
		function check_submitted(){
			// session_start();
			include 'dbconfig.php';
			$query="SELECT up_id from tbl_user_post where user_id=".$_SESSION['user_id']; //get up_id for user
			$rs=mysql_query($query)or die(mysql_error());
		
			$result=mysql_fetch_array($rs,MYSQL_ASSOC);
			$up_id=$result['up_id'];
			$sql="SELECT *  FROM RecPro.tbl_post_status WHERE up_id='$up_id' AND status_id=3";
			$resource=mysql_query($sql) or die(mysql_error());
			$rslt=mysql_fetch_array($resource,MYSQL_ASSOC);
			if (empty($rslt)) {
				return true;
				# code...
			}
			else{
				return false;
			}
		}

	
	}
	// $obj=new check();
	// $obj->check_submitted();