<?php
	require_once('dbconfig.php');
	include '../DB/get_status.php';
	class getcandidates{

		function get_candidate()
		{
				$sql="SELECT * FROM RecPro.tbl_user WHERE 1";
				$result=mysql_query($sql);
				// echo $result;
				$cand=array();
				while($candidate=mysql_fetch_array($result,MYSQL_ASSOC)){
	
					// print_r($candidate);
					$sql="SELECT Description FROM RecPro.tbl_qualification WHERE qual_id=".$candidate['qual_id'];
					$q=mysql_query($sql);
					$query="SELECT Description FROM RecPro.tbl_reference WHERE reference_id=".$candidate['reference_id'];
					$r= mysql_query($query);
					$ref=mysql_fetch_array($r,MYSQL_ASSOC);
					$qua=mysql_fetch_array($q,MYSQL_ASSOC);
					unset($candidate['password']);
					$obj=new getstatus();
	                $status=$obj->get_status($candidate['user_id']);
	        
	               
	                $candidate['status']=$status['status'];
                  	
					$candidate['ref']=$ref['Description'];
					$candidate['qual']=$qua['Description'];
					$cand[]=$candidate;
					// $candi=array_merge($cand,$qua);
					
					
				}
				
				// print_r($cand);
		
				return $cand;

		}			

			
		
	}
// $obj=new getcandidates();
// $obj->get_candidate();