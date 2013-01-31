<?php include 'header.php';?>

    <div class="container-fluid">
      <div class="row-fluid">
        <?php include 'sbar.php';?>
        <div class="span6">
          <fieldset>
          <legend>Forget Password </legend> 
          <p>Please provide your registered email id.</p><br>
         <?php if (isset($_GET['action'])) {
           # code...
              if ($_GET['action']=="noemail") {?>
              <div class='alert alert-error' id='notice'>
                      <h4>Note :</h4>
                      <p> Provided email address is not registered. <a href="registration.php">Click here</a> to Register</p>
                    </div>
                
              <?php }
              elseif($_GET['action']=="error"){?>
                    <div class='alert alert-error' id='notice'>
                      <h4>Note :</h4><p>Server Error!</p>
                      
                    </div>
              <?php }
              elseif($_GET['action']=="error"){?>
                    <div class='alert alert-success' id='notice'>
                      <h4>Note :</h4>
                      <p>Password sent to your email id!.<br> Please<a href="login.php">Login</a> to continue</p>
                    </div>
              <?php }

         }?>
            <form class="form-horizontal" method="post" action="DB/forpass.php"> 
              <div class="control-group" id="emaildiv">
                <label class="control-label" for="inputEmail">Email</label>
                <div class="controls">
                  <input type="text" id="email" name="email_id" onblur="checkemail();"placeholder="Email">
                </div>
              </div>
              
            
               <div class="control-group">
                  <div class="controls">
                    <button type="submit" class="btn btn-large" id= "button">Send Password</button>&nbsp;&nbsp;
                    <a class="offset1"href="login.php">Back to Login</a>
                  </div>
              </div>
            </form>
          </fieldset>
        </div><!--/span-->
        <div class="span3">
        </div>
      </div><!--/row-->



      <?php include 'footer.php';?>