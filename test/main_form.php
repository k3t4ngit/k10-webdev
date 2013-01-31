<?php 
require_once('config.php');

$result = mysql_query("SELECT Name FROM cities");
// print_r($result);

?>


	
		<?php include('header.php'); ?>
		<script type="text/javascript" src="validations.js"></script>
		<div class="container-fluid">	
				<form name="myform" class=" form-horizontal " onsubmit="return checkform();" action="subform.php" method="POST">
					<fieldset id="fld">
						<div class="control-group" id="fnameg">
					      <label class="control-label"  >FirstName :</label>
					      <div class="controls" >
					        <input type="text" name="fname" class="input-medium" onblur='checkfname();' id="fname" >
					      </div>
					    </div>
					    <div class="control-group" id="lnameg">
					      <label class="control-label" for="input01">LastName :</label>
					      <div class="controls">
					        <input type="text" class="input-medium" onblur='checklname();' id="lname" name="lname">
					      </div>
					    </div>
					    <div class="control-group" id="mnumg">
					      <label class="control-label" for="input01">Mobile No. :</label>
					      <div class="controls">
					        <input type="text" class="input-medium" onblur='checkmnum();'id="mnum" name="mnum">
					      </div>
					    </div>
					    <div class="control-group">
					      <label class="control-label" for="input01">City :</label>
					      	<div class="controls">
						      <select class="span2" name="city">
						      	<?php while($row = mysql_fetch_array($result)){?>
						      		<option value="<?php echo $row['Name'];?>"><?php echo $row['Name'];?></option>
									
								<?php }?>
						      	
						      </select>
						  	</div>
					    </div>
					    <div class="control-group">
							<label class="control-label">Gender :</label>
								<div class="controls">
									<label class="radio">
									<input id="optionsRadios1" type="radio"  value="male" name="gender">
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
							<button class="btn btn-primary" type="submit">Submit</button>
							<button class="btn">Cancel</button>
						</div>
					</fieldset>
				</form>
		</div>	
		</div>

</body>

</html>