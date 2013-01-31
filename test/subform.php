<?php 
	require_once("config.php");
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mobile=$_POST['mnum'];
	$city=$_POST['city'];
	$gender=$_POST['gender'];
	$check=$_POST['check'];
	$hobbies=implode(',',$check);
	
	$query="INSERT INTO `test`.`user` (`firstname`, `lastname`, `mobile`, `city`, `gender`, `hobbies`) VALUES ('$fname' , '$lname' , '$mobile' , '$city' , '$gender' , '$hobbies')";
	if (!mysql_query($query))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "1 record added";
		$id = mysql_insert_id();
		echo $id;
	header("Location: user_detail.php?id=$id");

?>