<?php 
require_once('config.php');
$id=$_GET['id'];
$result = mysql_query("SELECT * FROM `user` WHERE id=$id");
// print_r($result);
$row = mysql_fetch_array($result);
// print_r($row);
	
?>
<html>
<head><title>Main_Form</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
</head>
<body>
	<?php include('header.php'); ?>
<div class="container">
		<table class="table table-condensed">
		  <thead>
		    <tr>
		      <th>FirstName</th>
		      <th>LastName</th>
		      <th>Mobile</th>
		      <th>City</th>
		      <th>Gender</th>
		      <th>Hobbies</th>
		      <th>Edit</th>
		      <th>Delete</th>
		    </tr>
		  </thead>
		  
		  <tbody>
		    <tr>
		      <td><?php echo $row['firstname'];?></td>
		      <td><?php echo $row['lastname'];?></td>
		      <td><?php echo $row['mobile'];?></td>
		      <td><?php echo $row['city'];?></td>
		      <td><?php echo $row['gender'];?></td>
		      <td><?php echo $row['hobbies'];?></td>
		      <td><a href="edit.php?id=<?php echo $id;?>">Edit</a></td>
		      <td><button onclick="myfunc()">Delete</button></td>
		    </tr>
		  </tbody>
		</table>
<script type="text/javascript">
	function myfunc(){
		var chck=confirm('Are you sure?');
		if(chck){
			window.location= "delete.php?id=<?php echo $id;?>"
		}

	}
	</script>
</div>

</body>
</html>