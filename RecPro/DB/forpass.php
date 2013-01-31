<?php 
include 'dbconfig.php';
	$sql = "SELECT email_id AS email_id FROM RecPro.tbl_user WHERE email_id='".mysql_real_escape_string($_POST['email_id'])."'";
			
			
			$result = mysql_query($sql);

			// echo $result;
			if(($row = mysql_fetch_assoc($result)) == true)
			{
				# Allows error suppression and validation in one shot
				/* This record already exists in the database, and its accessible in $row['email'] So now you can do as you please. For example: */
				// echo "The user already exists.";
					
				//Generate a RANDOM MD5 Hash for a password
				$random_password=md5(uniqid(rand()));
			 
				//Take the first 8 digits and use them as the password we intend to email the user
				$emailpassword=substr($random_password, 0, 8);
			 
				//Encrypt $emailpassword in MD5 format for the database
				echo $newpassword = md5($emailpassword);
				$emailid=$_POST['email_id'];
				$query="UPDATE `RecPro`.`tbl_user`
						SET
						password = '$newpassword'
						WHERE email_id='$emailid'";
				if(mysql_query($query)){
					//Email out the infromation
					$subject = "Your New Password for Appbinder.com | Careers";
					$message = "Your new password is as follows:
					----------------------------
					Password: $emailpassword
					----------------------------
					Please make note this information has been encrypted into our database 
					 
					This email was automatically generated."; 
					 
		          	if(!mail($emailid, $subject, $message))
		          	{
		             die (header('location:../forgotpassword.php?action=error'));
		         	 }
		         	 else{
		                header('location:../forgotpassword.php?action=sent');
		        	 } 
					 
				}
				else{
					header('location:../forgotpassword.php?action=error');
				}

			}
			else{
				header('location:../forgotpassword.php?action=noemail');
			}