<?php
	REQUIRE_ONCE ('dbconfig.php');
	include ('insert_array_mysql.php');
	session_start();
	class Register{

		public function registration()
		{
			$sql = "SELECT email_id AS email_id FROM tbl_user WHERE email_id='".mysql_real_escape_string($_POST['email_id'])."'";
			
			
			$result = mysql_query($sql);

			// echo $result;
			if(($row = mysql_fetch_assoc($result)) == True)
			{
			# Allows error suppression and validation in one shot
			/* This record already exists in the database, and its accessible in $row['email'] So now you can do as you please. For example: */
			// echo "The user already exists.";
		
			// $_SESSION['idexists']=$_POST['email_id'];
			$time = time() + 3600;
     		setcookie('name',$_POST['name'],$time,"/");
     		setcookie('email',$_POST['email_id'],$time,"/");
     	
			
			header('location:../registration.php?action=duplicate');
			}
			else{
				// print_r($row);
				$name=$_POST['name'];
				$email=$_POST['email_id'];
				$ref=$_POST['reference_id'];
				$qual=$_POST['qual_id'];
				$password=md5($_POST['password']);
				
				// print_r($_POST);
				$sql="INSERT INTO tbl_user (name, email_id, password, create_date, update_date, qual_id, reference_id ) VALUES ('$name', '$email', '$password', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$qual', '$ref')";
				$rs=mysql_query($sql) or die (mysql_error());
			
				if($rs){
					// print_r($rs);
					$_SESSION['login']=True;
					$sql="SELECT * FROM tbl_user WHERE email_id='".$email."' AND password = '".$password."'";
					$result=mysql_query($sql);
					
					$candidate=mysql_fetch_array($result,MYSQL_ASSOC);
					// print_r($candidate);
				
					if($candidate){
						print_r($candidate);
						$_SESSION=$candidate;
					
						header('location:../home.php');
					}
					
				}
				else{
					header('location:../registration.php/?action=err');
				}
			}
		}
	}

$obj=new Register();
$obj->registration();
?>