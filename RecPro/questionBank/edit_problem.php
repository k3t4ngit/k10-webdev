<?php 
	
			include '../Admin/header.php';
			include '../Admin/dbconfig.php';
			$problem_id=$_GET['problem_id'];
			$sql="SELECT * FROM tbl_problem WHERE problem_id='$problem_id'";
   
	  		$rs=mysql_query($sql) or die(mysql_error());

	     	$result=mysql_fetch_array($rs,MYSQL_ASSOC);
	     	// print_r($result);

	     	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <title>Rich Text HTML Editor</title>
    <meta name="description" content="CLEditor is an open source jQuery plugin which provides a lightweight, full featured, cross browser, extensible, WYSIWYG HTML editor that can be easily added into any web site." />
    <meta name="keywords" content="jquery plugin, wysiwyg, html, editor, cross browser, lightweight, open source" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="jquery.cleditor.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.cleditor.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor()[0].focus();
      });
    </script>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-18352523-1']);
      _gaq.push(['_trackPageview']);
       (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
  </head>
  <body>
	  <!-- pdfgenration.php-->
	  <form action="../Admin/update_problem.php?problem_id=<?php echo $result['problem_id'];?>" method="POST">
  
		   <?php
       
      
        
        
			?>

        <textarea id="input"  name="myrichtext"><?php echo $result['description'];?></textarea>
        <input type="hidden" name="problem_id" value='<?php echo $result['problem_id'];?>'>
        <br>
        <input type="submit" name="submit" value="submit">
        <a href="../Admin/admin.php"><input type="button" value="Cancel"></a>


  </form>
 </body>
</html>
