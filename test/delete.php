<?php 
require_once('config.php');
	$id=$_GET['id'];
	$query="DELETE FROm user WHERE id='$id'";
	if (!mysql_query($query))
		  {
		  die('Error: ' . mysql_error());
		  }
		  else{
		  	 include('header.php');
			echo "1 record Deleted!";

			?>
			<a href="main_form.php">Go Home!</a>
			<?php }
		// header("location: main_form.php");
?>