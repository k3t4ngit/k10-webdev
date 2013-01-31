<?php include 'dbconfig.php';
	
	$post_id=$_POST['post_id'];
	$code=$_POST['code'];
	$description=$_POST['description'];
	$criteria=$_POST['criteria'];
	$query="UPDATE tbl_post set code=$code, criteria=$criteria, description=$description, open_date=CURRENT_TIMESTAMP WHERE post_id=$post_id";
	if(mysql_query($query)){
		header('location:manage_posts.php');
	}
	else{
		echo "error : ".mysql_error();
	}