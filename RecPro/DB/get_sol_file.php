<?php

	// print_r($_FILES);
	// die;
	session_start();
	$ext= pathinfo($_FILES['Browse']['name']);
	if($ext['extension']=='zip')
	{
		echo "yes";
		if(move_uploaded_file($_FILES["Browse"]["tmp_name"],"../Solutions/" . $_FILES["Browse"]["name"])){
     		header('location:update_status.php/?action=SUBMIT');
     		
		}
		else{
			
	
		 header('location:../submit.php?upload=error');
		}
	}
	else{
		
		// echo "Not Zip!";
		 header('location:../submit.php?upload=error');
	}

		
?>