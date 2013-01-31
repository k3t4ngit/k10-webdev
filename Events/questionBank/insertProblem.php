<?php

  // $connection=mysql_connect("69.167.138.87","appbinde_kec","password@1984");
            // $connection=mysql_connect("localhost","kec_detail","appbinder");
    //       mysql_select_db("appbinde_kec",$connection);
               include("../config.php") ;
        $description=$_POST['myrichtext'] ;
        $problemId=$_POST['problemId'] ;
       if(strlen($problemId) >=1){
             if(strlen($description)<=0){
               header("location:text_editor.php?currentPage=Rich_Editeor&insert=empty") ;
			} else{
                $problem=mysql_query("update tbl_problem set description='".$description."' where problem_id='".$problemId."'") ;
        if($problem=1){
            header("location:text_editor.php?currentPage=Rich_Editeor&insert=Updated") ;
			}
			else{
				header("location:text_editor.php?currentPage=Rich_Editeor&insert=NotUpdate") ;
            }
		}
     } else{
        if(strlen($description)<=0){
            header("location:text_editor.php?currentPage=Rich_Editeor&insert=empty") ;
			} else{
                $problem=mysql_query("insert into tbl_problem(description)values('".$description."')") ;
        if($problem=1){
            header("location:text_editor.php?currentPage=Rich_Editeor&insert=YES") ;
			}
			else{
				header("location:text_editor.php?currentPage=Rich_Editeor&insert=No") ;
            }
		}
	}
?>
