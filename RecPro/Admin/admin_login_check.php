<?php
	session_start();
	if($_POST['email']=="admin"&& $_POST['password']=="password"){
		$_SESSION['logged_in']=true;
		header('location:admin.php');
	}
	else{
		header('location:adminlogin.php?action=false');
	}