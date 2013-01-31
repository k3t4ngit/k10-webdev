<?php
	include 'dbconfig.php';
    session_start();
    print_r($_POST);
    // print_r($_SESSION);
    $userid=$_SESSION['user_id'];
    $name=$_POST['name'];
    $email=$_SESSION['email_id'];
    if(!$_POST['password']==""){
        $pass=$_POST['password'];
        $cpass=$_POST['cpassword'];
        if ($pass==$cpass) {
            $password=md5($_POST['password']);
        }
        else{
            echo "password not match";
            die(header('location:../profile.php?action=passerr'));
        }
        
    }else{
        $password=$_SESSION['password'];
    }
    $cdate=$_SESSION['create_date'];
   
    $phone_no=$_POST['phone_no'];
    $qualid=$_POST['qual_id'];
   
	$sql="UPDATE tbl_user SET name='".$name."', password='".$password."', create_date='".$cdate."', update_date=CURRENT_TIMESTAMP, phone_no='".$phone_no."', qual_id='".$qualid."' WHERE user_id =". $userid;
    echo $sql;
    if(mysql_query($sql)){
        header('location:../profile.php?action=done');

    }
    else{
            echo "error : " .mysql_error();
         // header('location:../profile.php?action=err');

    }
   
    