<?php 
	include 'dbconfig.php';
	if(isset($_GET['action'])){
		$check=$_GET['action'];
	}
	$obj= new status();
		switch ($check){
			case "APPLY":
								$status_id=1;
								$obj->user_apply($status_id);
								break;
			case "ASSIGN_PROBLEM":
								
								$status_id=2;
								$obj->user_problem_assign($status_id);
								break;
			case "SUBMIT":
								
								$status_id=3;
								$obj->user_prob_submit($status_id);
								break;
			
		}	
	class status{
		function user_apply($status_id){
			session_start();
			if(isset($_GET['post_id']))
			{
				$post_id=$_GET['post_id'];
			}
			else {
				
				$sql="SELECT post_id from tbl_user_post where user_id=".$_SESSION['user_id'];
				$rs=mysql_query($sql);
				$result=mysql_fetch_array($rs,MYSQL_ASSOC);
				$post_id=$result['post_id'];
			}
			date_default_timezone_set('Asia/Calcutta');
			$curdate=date("Y-m-d h:i:s ", time());
			$user=$_SESSION['user_id'];
			$query="INSERT INTO RecPro.tbl_user_post(user_id, post_id, apply_date) Values ('$user', '$post_id', CURRENT_TIMESTAMP )";
	

			
			if(mysql_query($query)){
				$up_id=mysql_insert_id();

				$sql="INSERT INTO RecPro.tbl_post_status (up_id, status_id, status_date, other) Values ('$up_id', '$status_id', CURRENT_TIMESTAMP, '')";
			
				if (mysql_query($sql)) {
					
					header('location:../../candidate.php');
					# code...
				}
				else {
					echo "error : ".mysql_error();
				
				}
			}
			else {
				echo "error : ".mysql_error();
				
			}
		}
		function user_problem_assign($status_id){
		
			$query0="SELECT * FROM RecPro.tbl_problem ORDER BY RAND() limit 1"; //getrandom problem 
			$getprob=mysql_query($query0);
			$problem=mysql_fetch_array($getprob);
			if (isset($problem['problem_id']))
			{	
				session_start();
				$prob_no=$problem['problem_id'];
				$query="SELECT up_id from tbl_user_post where user_id=".$_SESSION['user_id']; //get up_id for user
				$rs=mysql_query($query);
				$result=mysql_fetch_array($rs,MYSQL_ASSOC);
				$up_id=$result['up_id'];
				$sql="INSERT INTO RecPro.tbl_post_status (up_id, status_id, status_date, other) Values ('$up_id', '$status_id', CURRENT_TIMESTAMP, '$prob_no')"; //problem assigned
				if (mysql_query($sql)) {
				$_SESSION['prob_no']=$prob_no;
				header('location:../../problem.php');# code...
				}	
					else{
						if (mysql_errno()==1062) {
						 	# code...
						 	$query1="SELECT other from tbl_post_status WHERE status_id = 2 AND up_id=".$up_id;
						 	$rslt=mysql_query($query1) or die(mysql_error());
						 	$result=mysql_fetch_array($rslt);
						 	$_SESSION['prob_no']=$result['other'];
						 	header('location:../../problem.php');
						 } 
					}
				
			}
		}
		function user_prob_submit($status_id){
			session_start();
			$query="SELECT up_id from tbl_user_post where user_id=".$_SESSION['user_id']; //get up_id for user
			$rs=mysql_query($query);
			$result=mysql_fetch_array($rs,MYSQL_ASSOC);
			$up_id=$result['up_id'];
			echo $up_id;
		
			$sql="INSERT INTO RecPro.tbl_post_status (up_id, status_id, status_date) Values ('$up_id', '$status_id', CURRENT_TIMESTAMP)";
			if (mysql_query($sql)or die(mysql_error())) {
				
				header('location:../../submit.php?upload=done');
				# code...
			}
			else{
				if (mysql_errno()==1062) {
				 	# code...
				 
				 	header('location:../../submit.php?upload=done');
				 } 
			}
		}
	}

