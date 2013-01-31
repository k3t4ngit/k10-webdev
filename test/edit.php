<?php 
require_once('config.php');
$id=$_GET['id'];
$result = mysql_query("SELECT * FROM `user` WHERE id=$id");
// print_r($result);
$row = mysql_fetch_array($result);
// print_r($row);
	
?>

	<?php include('header.php'); ?>
	<script type="text/javascript" src="validations.js"></script>
		<div class="container">
			<form name="myform" class=" form-horizontal span8" onsubmit="return checkform();" action="update.php" method="POST">
				<fieldset>
					<div class="control-group" id="fnameg">
				      <label class="control-label"  >FirstName :</label>
				      <div class="controls" >
				        <input type="text" name="fname" class="input-medium" onblur='checkfname();' value="<?php echo $row['firstname'];?>" id="fname" >
				      </div>
				    </div>
				    <div class="control-group" id="lnameg">
				      <label class="control-label" for="input01">LastName :</label>
				      <div class="controls">
				        <input type="text" class="input-medium" onblur='checklname();' id="lname" value="<?php echo $row['lastname'];?>" name="lname">
				      </div>
				    </div>
				    <div class="control-group" id="mnumg">
				      <label class="control-label" for="input01">Mobile No. :</label>
				      <div class="controls">
				        <input type="text" class="input-medium" onblur='checkmnum();'id="mnum" value="<?php echo $row['mobile'];?>"name="mnum">
				      </div>
				    </div>
				    <div class="control-group">
				      <label class="control-label" for="input01">City :</label>
				      	<div class="controls">
				      	<p>Current City :<?php echo $row['city'];?></p>
					      <select class="span2" name="city">
					      	<option value="Indore">Indore</option>
					      	<option value="Bhopal">Bhopal</option>
					      	<option value="Gwalior">Gwalior</option>
					      	<option value="Jabalpur">Jabalpur</option>
					      	<option value="">Indore</option>
					      </select>
					  	</div>
				    </div>
				    <div class="control-group">
						<label class="control-label">Gender :</label>
							<div class="controls">
								<label class="radio">
								<input id="optionsRadios1" type="radio" checked="" value="male" name="gender">
								Male
								</label>
								<label class="radio">
								<input id="optionsRadios2" type="radio" value="female" name="gender">
								Female
								</label>
							</div>
					</div>
				    <div class="control-group">
				      <label class="control-label" for="input01">Hobbies :</label>
				    	<div class="controls">
					      	<label class="checkbox">
					        	<input type="checkbox" class="input-medium" id="dance" value="Dancing" name="check[]">
					      		Dancing
					      	</label>
					      	<label class="checkbox">
					        	<input type="checkbox" class="input-medium" id="sing" value="Singing" name="check[]">
					      		Singing
					      	</label>
					      	<label class="checkbox">
					        	<input type="checkbox" class="input-medium" id="read" value="Reading" name="check[]">
					      		Reading
					      	</label>
					      	<label class="checkbox">
					        	<input type="checkbox" class="input-medium" id="play" value="Sports" name="check[]">
					      		Sports
					      	</label>
			     		 </div>
			   		</div>
			   		<div class="form-actions">
						<button class="btn btn-primary" type="submit">Save</button>
						<button class="btn">Cancel</button>
					</div>
					<input type="hidden" name="id" value="<?php echo $id;?>">
				</fieldset>
			</form>

		</div>

</body>

</html>