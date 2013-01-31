<html>
<head>
<title>AppBinder Software Private Limited</title>
</head>
<body>
<?php include("../config.php");
        $action=$_GET['action'] ;
        $problemId=$_GET['problem_id'] ;
        if($action=="Delete"){
        $result=mysql_query("delete from tbl_problem where problem_id='".$problemId."'") ;
        if($result=1){
              header("location:problemList.php?result=YES") ;
     	} else{
             header("location:problemList.php?result=NO") ;
			}
       }
    $query=mysql_query("select *from tbl_problem") ;
?>
<table border=1 width=100% height=100% cellpadding="0" cellspacing="0">
<tr><td height=5% align="right"><a href="text_editor.php"><input type="button" name="add" value="Add New"></a></td></tr>
<tr><td height=5% align="center">       
<?php
            $result=$_GET['result'] ;
if($result=="YES") {
				  echo  $message="Succesfully Deleted" ;
            } else if($result=="NO"){
                echo     $message="Problem not Deleted" ;
             }?></td></tr>
<tr><td valign="top">
	      <?php
           while($problem=mysql_fetch_array($query)){
            echo "problem No.".$problem['problem_id'] ;
                 echo"<a href=text_editor.php?action=Edit&problem_id=".$problem['problem_id']."><input type=button name=add value=Edit></a> <a href=problemList.php?action=Delete&problem_id=".$problem['problem_id']."><input type=button name=add value=Delete></a><a href=pdfDownload.php?problem_id=".$problem['problem_id']."><input type=button name=add value=PDF></a>";
                   echo $problem['description'] ;
		  }?>
</td></tr>
</table>
</body>
	
</html>
