<?php include 'header.php';
 

session_destroy();

  if(isset($_SESSION['user_id'])){
    header('location:candidate.php');
  }
?>
    <div class="container-fluid">
      <div class="row-fluid" id="contents">
        <div class="span3"></div>
        <div id="formbg">
          <div class="span6" id="form" style="background-image: url(assets/img/Form_Bg.png)">
            <div id="legend">
               <h2 >Login</h2>
                
            </div>
           <div class="row">
            <?php if(isset($_SESSION['incorrect'])){?>
                   <div class='alert alert-error span10 offset1' id="exists"  >
                     <p>Invalid credentials, please use correct emaill address and password</p>
                    </div>
            <?php }

              
            ?>
            
            
            
            
          </div>
            
            <div class="row">

             
              <div class="span4 offset1" id="loginimg">
                <img src="assets/img/Login_Image.png">
              </div>
              <div class="span7">
                <div class="alert alert-error span8" id="incorrect" >
                   <p id="incorrect_email">Enter valid email address.</p>
                
                   <p id="incorrect_password">Enter valid password.</p>
                </div>
                <form class="form " onsubmit ="return checklogin();"  action ="DB/logincheck.php" method="post">
                  
                  <div class="control-group" id="emaildiv">
                   
                    <div class="controls">
                      <input type="text" id="email"  name="email"class="input-xlarge"  onblur="checkemail();" placeholder="Email">
                    </div>
                  </div>
                  <div class="control-group" id="passdiv">
                    
                    <div class="controls">
                      <input type="password" id="password" name="password"class="input-xlarge"onblur="checkpassword()"placeholder="Password">
                    </div>
                  </div>
                  
        
                   <div class="control-group">
                      <div class="controls" id="login">
                        <a href="forgotpassword.php">Forgot Password?</a>
                       <button type="submit" id= "button" class="btn btn-large offset1">Login</button>
                        <br><br>
                        <p>Don't have credentials?&nbsp; <a class="offset1" href="registration.php"> Register Now!</a></p>
                      </div>
                  </div>
                </form>
              </div>
            </div><!--row-fluid-->
          </div><!--/span6-->
          <div class="span3">
          </div>
        </div><!--formbg-->
      </div><!--/row-->
    </div><!--/.fluid-container-->
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>

      <?php include 'footer.php';?>