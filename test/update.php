<?php
require_once('config.php');
	$id=$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mobile=$_POST['mnum'];
	$city=$_POST['city'];
	$gender=$_POST['gender'];
	$check=$_POST['check'];
	$hobbies=implode(',',$check);
$query="UPDATE user SET firstname='$fname' , lastname='$lname' ,mobile='$mobile' ,city='$city' ,gender='$gender' , hobbies='$hobbies' WHERE id='$id' "; 
if (!mysql_query($query))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "1 record updated";
		header("Location: user_detail.php?id=$id");
?>