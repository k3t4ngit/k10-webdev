<?php
	REQUIRE_ONCE ('dbconfig.php');

	
	class Login{

		public function logincheck()
		{
			session_start();
			$passwd=md5($_POST['password']);
			$email=$_POST['email'];
			
			$sql="SELECT * FROM tbl_user WHERE email_id='".$email."' AND password = '".$passwd."'";
			$result=mysql_query($sql);
			
			$candidate=mysql_fetch_array($result,MYSQL_ASSOC);
			print_r($candidate);
		
			if($candidate){
				print_r($candidate);
				
				$_SESSION=$candidate;
				header('location:../home.php');
				// $_SESSION['cid']=$candidate['id'];
			}
			else{
				$_SESSION['incorrect']=true;
				// setcookie('email',$_POST['email']);
				
				header('location:../login.php');
			}
		}
	}

		$obj=new Login();
		$obj->logincheck();

	
?>