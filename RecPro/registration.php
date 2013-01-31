<?php include ('header.php');
      require ('DB/getformdata.php');

  if(isset($_SESSION['user_id'])){
    header('location:candidate.php');

  }

 
    ?>

    <div class="container-fluid">
      <div class="row-fluid" id="contents">
       <div class="span3"></div>
        
        <div class="span6" id="form" style="background-image: url(assets/img/Form_Bg.png)" >
           <div id="legend">
              <h2 >Register</h2>
            </div>
             <?php if(isset($_GET['action'])){
                    $check=$_GET['action'];
                 switch ($check){
                                  case "duplicate":
                                          echo"<div class='alert alert-error span10 offset1' id='exists'  >
                                             <p> Email address has already been registered. <a href='login.php'>Click here</a> to Login</p>
                                            </div>";
                                            break;
                                  case "err":
                                            
                                             echo"<div class='alert alert-error span10 offset1' id='exists'  >
                                             <p>Server Error</p>
                                            </div>";
                                            break;
                                

                   }} ?>
            <div class='alert alert-error span10 offset1' id="form_empty"  >
             <p>Please fill the required information!</p>
            </div>
            <div class="alert alert-error span10 offset1" id="incorrect_confirm" >
               <p>Confirm password is not correct.</p>
            </div>
            <div class='span10 offset4'>
             <p>All fields are mandatory.</p>
            </div>
            
            <div class="row-fluid">
             <div class="span4 offset1" id="loginimg">
                <br>
                <br>
                <br>
                <img src="assets/img/Register_Image.png">
              </div>
              <div class="span7 pull-left">

                <form  class="form " method="post"action="DB/register.php" onsubmit="return checkform();">
                  
                  <input type="hidden" name="user_id">
                  <div class="control-group" id="namediv">
                    <div class="controls">
                      <input type="text"  id="name" value='<?php if (isset($_COOKIE["name"])) { echo $_COOKIE["name"]; } ?>' name="name"  class="input-xlarge"onblur="checkcname();" placeholder="Name">
                    </div>
                  </div>
                  <div class="control-group" id="emaildiv">
                   
                    <div class="controls">
                    
                      <input type="text" id="email"value='<?php  if (isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>'  name="email_id"class="input-xlarge" onblur="checkemail();" placeholder="Email" >
                    </div>
                  </div>
                  <div class="control-group" id="passdiv">
                    
                    <div class="controls">
                      <input type="password" id="password" name="password" class="input-xlarge"onblur="checkpassword();"placeholder="Password(alteast 6 char)">
                    </div>
                  </div>
                  <div class="control-group" id="cpassdiv">
                    
                    <div class="controls">
                      <input type="password" id="cpassword" class="input-xlarge" onblur="confirmpass();" placeholder="Confirm Password">
                    </div>
                  </div>
                  <div class="control-group" >
                    <input type="hidden" name="create_date" >
                    <input type="hidden" name="update_date" >
                    <input type="hidden" name="Phone_no" value="">
                    <div class="controls">
                      <select name="qual_id">
                        <?php foreach ($quals as $key) {
                          
                         echo "<option value=".$key['qual_id']. ">".$key['description']."</option>";
                       }
                        ?>
                      </select>
                    </div>
                  </div>
                  
                  <div class="control-group">
                    <div class="controls">
                      <select name="reference_id">
                        <?php foreach ($refs as $rs) {
                          
                         echo "<option value=".$rs['reference_id']. ">".$rs['description']."</option>";
                       }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group row-fluid">
                      <div class="controls span4"> 
                         <button type="submit" id= "button" class="btn btn-large ">Submit</button>
                      </div>
                      <div class="span8">
                        <p class="">Already registered?
                        <a class="" href="login.php">Login here</a></p>
                      </div>
                  </div>
                </form>
              </div><!--span7-->

            </div><!--row-fluid-->
        </div><!--/span6-->
        <div class="span3">
        </div>
      </div><!--/row-->
      </div><!--containerfluid-->
      <br>
       <?php include 'footer.php';?>