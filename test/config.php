<?php
$db_server="localhost";
$user="root";
$pass="";

$con=mysql_connect($db_server,$user,$pass) OR die("ERROR:".mysql_error());

$database="test";

mysql_select_db($database) OR die("DB CONNECT ERROR:".mysql_error());
