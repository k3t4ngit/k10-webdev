<?php 
	require_once('dbconfig.php');

	class sort{
		function sort_candidates($col,$value){
			$query="SELECT * FROM tbl_user WHERE $col='$value'";
			$res=mysql_query($query) or die(mysql_error());
			$final=array();
			while($rs=mysql_fetch_array($res,MYSQL_ASSOC))
			{
				
				$userid=$rs['user_id'];
				$qual_id=$rs['qual_id'];
				$ref_id=$rs['reference_id'];
				
				unset($rs['password']);
				$sql="SELECT Description FROM tbl_qualification WHERE qual_id='$qual_id'";
				$q=mysql_query($sql)or die(mysql_error());
				$query="SELECT Description FROM tbl_reference WHERE reference_id='$ref_id'";
				$r= mysql_query($query)or die(mysql_error());
				$ref=mysql_fetch_array($r,MYSQL_ASSOC);
				$qua=mysql_fetch_array($q,MYSQL_ASSOC);
				
				$query="SELECT post_id from tbl_user_post where user_id=".$userid;
				$rs1=mysql_query($query);
				$result=mysql_fetch_array($rs1,MYSQL_ASSOC);
				$post_id=$result['post_id'];

				$sql1="select (select description from tbl_status where status_id = tps.status_id) status, tps.status_date
				from tbl_post_status tps where tps.up_id 
				in (select up_id from tbl_user_post where user_id='$userid' and post_id='$post_id') order by tps.status_date desc limit 1";
				$rslt=mysql_query($sql1)or die(mysql_error());
				$status=mysql_fetch_array($rslt,MYSQL_ASSOC) or mysql_error();
				
	            $rs['status']=$status['status'];
				$rs['ref']=$ref['Description'];
				$rs['qual']=$qua['Description'];
				$final[]=$rs;
				
			}
			
			// print_r($final);
			$array['data']=$final;
			print_r(json_encode($array));
		}
	}

	if(!empty($_GET)){
		$col=$_GET['sortby'];
		$value=$_GET['value'];
		$sorter=new sort();
		$sorter->sort_candidates($col,$value);
	}
	else{
		echo "error :  pass ?sortby=reference_id&value=3";
	}