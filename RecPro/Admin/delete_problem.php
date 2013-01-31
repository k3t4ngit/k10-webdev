<?php
	include 'dbconfig.php';
	session_start();
	$id=$_GET['post_id'];
	$sql="DELETE FROM tbl_problem WHERE post_id= " .$id;
	if(mysql_query($sql)){
		$_SESSION['postdel']=true;
		header('location:../admin.php');
	}
	else{
		echo "error : " .mysql_error();
	}