<?php 
	
		class fiziserviceAPI 
		{

			public function search(){
				// $stext=$_Post['txt'];
				// $slat=$_Post['lat'];
				// $slong=$_Post['long'];
				// $scat=$_Post['cat'];

				
			//connect  to the database 
				mysql_connect("localhost", "root",  "") or die ('I cannot connect to the database  because: ' . mysql_error());  
			//-select  the database to use 
				$mydb=mysql_select_db("Events"); 
				//-query  the database table 
				$sql="SELECT  EventId, Title, Summary, DT, Category, Latitude, Logitude, img0 FROM evedetails WHERE Title LIKE '%" . $stext .  "%' OR Latitude LIKE '%" . $slat ."%' OR Longitude LIKE '%" . $slong ."%'OR Category LIKE '%" . $scat ."%'"; 
				//-run  the query against the mysql query function 
				$result=mysql_query($sql); 
				print_r($result);
			}

		}