<?php

            // $connection=mysql_connect("69.167.138.87","appbinde_kec","password@1984");
            // $connection=mysql_connect("localhost","kec_detail","appbinder");
            // mysql_select_db("appbinde_kec",$connection);
        include("../DB/dbconfig.php") ;
        $description=$_POST['myrichtext'] ;
        $problemId=$_POST['problemId'] ;
        $sql="INSERT INTO RecPro.tbl_problem values ('','".$description."')";
        $rs=mysql_query($sql) or die(mysql_error());
        if ($rs) {
            $_SESSION['probIn'];
            header('location:../Admin/admin.php');
            # code...
        }
        else
        {
            echo "error : " .mysql_error();
        }

    ?>
