<?php
include("../config.php") ;
$description=$_POST['myrichtext'] ;
$problem=mysql_query("insert into tbl_problem(description)values('".$description."')") ;
$count=mysql_insert_id() ;
$data=mysql_query("select * from tbl_problem where problem_id=1") ;
while($query=mysql_fetch_array($data)){
          echo $query['description'] ;
	}
?>

