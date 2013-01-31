<?php 
	
			include 'header.php';
			include 'dbconfig.php';
			$sql="SELECT * FROM tbl_problem WHERE problem_id=".$_GET['problem_id'];
   
	  $rs=mysql_query($sql) or die(mysql_error());

	     	$result=mysql_fetch_array($rs,MYSQL_ASSOC);
	     	// print_r($result);

	     	?>
	        <form class="form-horizontal" action="update_post.php" method="post">
                  <legend>Edit Post</legend>
                  <div class="control-group">
                    <input type= "hidden" name="post_id"value="<?php echo $_GET['post_id'];?>">
                    <label class="control-label" for="inputEmail">Code</label>
                    <div class="controls">
                      <input type="text" id="inputEmail" value="<?php echo $result['code'];?>" name="code" placeholder="code">
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <label class="control-label" for="inputPassword">Descrption</label>
                    <div class="controls">
                      <textarea rows="3" name="description"><?php echo $result['description'];?></textarea>
                    </div>
                  </div>
                  
                      <button type="submit" value="submit"class="btn ">Save</button>
                      <a href="manage_posts.php"><button type="button" class="btn ">Cancel</button></a>
                    </div>
                  </div>
                  </form>
	     
                  