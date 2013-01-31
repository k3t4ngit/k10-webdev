<?php include 'dbconfig.php';
	
	$problem_id=$_POST['problem_id'];
	$description=$_POST['myrichtext'];
	$query="UPDATE tbl_problem set description='$description' WHERE problem_id='$problem_id'";
	if(mysql_query($query)){
		header('location:manage_posts.php');
	}
	else{
		echo "error : ".mysql_error();
	}