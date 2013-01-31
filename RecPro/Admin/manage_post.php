<?php 
	require_once('dbconfig.php');
	
	class addpost{

		function add_post()
		{
			$cd=$_POST['code'];
			$crit=$_POST['criteria'];
			$descri=$_POST['desc'];
			if(isset($_POST['active'])){
				$act=$_POST['active'];
			}
			else{
				$act="N";
			}
			$sql="INSERT INTO tbl_post (post_id, code, criteria, description, open_date, active) VALUES('', '$cd','$crit','$descri', NOW(),'$act')";
				if(mysql_query($sql)){
				$_SESSION['pa']=true;
				$_SESSION['code']=$cd;
				
				header('location:manage_posts.php');
			}
			else{
				echo "error : ".mysql_error();
			}
		}
		function get_posts()
		{
				$ps=array();
				$query="SELECT * FROM tbl_post WHERE 1";
				$row=mysql_query($query);
				while($rs=mysql_fetch_array($row,MYSQL_ASSOC)){
					
					$ps[]=$rs;
				}
				// print_r( $ps);
				return $ps;		
		}	
		function get_active_posts()
		{
			$ps=array();
				$query="SELECT * FROM tbl_post WHERE active='Y'";
				$row=mysql_query($query);
				while($rs=mysql_fetch_array($row,MYSQL_ASSOC)){
					
					$ps[]=$rs;
				}
				// print_r( $ps);
				return $ps;
		}		
		function get_post_details($post_id)
		{
			// echo $post_id;
			$sql="SELECT * FROM tbl_post WHERE post_id='$post_id'";
			$query=mysql_query($sql) or die(mysql_error());
			$prbdet=mysql_fetch_array($query,MYSQL_ASSOC);
			print_r( json_encode($prbdet));
		}
		function update_post($post_id)
		{
			
			$code=$_POST['code'];
			$description=$_POST['description'];
			$criteria=$_POST['criteria'];
			$query="UPDATE tbl_post set code=$code, criteria=$criteria, description=$description, open_date=CURRENT_TIMESTAMP WHERE post_id=$post_id";
			if(mysql_query($query))
			{
				$this->get_post_details($post_id);
			}
			else
			{
				echo "error : ".mysql_error();
			}
		}
		function delete_post($post_id)
		{
			
			$sql="DELETE FROM tbl_post WHERE post_id= " .$post_id;
			if(mysql_query($sql))
			{
				$_SESSION['postdel']=true;
				header('location:../manage_posts.php');
			}
			else
			{
				echo "error : " .mysql_error();
			}
		}
	}

	
	if (!empty($_GET))
	{
		$action=$_GET['action'];
		$post=new addpost();
		switch ($action) 
		{
			case 'edit':
				$post->get_post_details($_GET['post_id']);
				break;

			case 'update':
				$post->update_post($_GET['post_id']);
				break;

			case 'add':
				$post->add_post($_GET['post_id']);
				break;

			case 'delete':
				$post->delete_post($_GET['post_id']);
				break;
		}	
	}
	