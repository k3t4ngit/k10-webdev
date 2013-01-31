<?php include ('header.php');
      require ('DB/getformdata.php');

  ?>

    <div class="container-fluid">
      <div class="row-fluid" id="contents">
       <div class="span3"></div>
        
        <div class="span6" id="form" style="background-image: url(assets/img/Form_Bg.png)" >
           <div id="legend">
              <h2 >Profile</h2>
            </div>
            <?php if(isset($_GET['action'])){
                    $check=$_GET['action'];
                 switch ($check){
                                  case "passerr":
                                          echo"<div class='alert alert-error span10 offset1' id='exists'  >
                                             <p>Passwords not match!</p>
                                            </div>";
                                            
                                            break;
                                  case "done":
                                            
                                      echo"<div class='alert alert-success span10 offset1' id='exists'  >
                                             <p>Updated Successfully!</p>
                                          </div>";
                                            break;
                                  case "err":
                                            
                                             echo"<div class='alert alert-error span10 offset1' id='exists'  >
                                             <p>Server Error</p>
                                            </div>";
                                            break;
                                

                   }} ?>
            
            <div class="row-fluid">
             <div class="span4 offset1" id="loginimg">
                <br>
                <br>
                <br>
                <img src="assets/img/Register_Image.png">
              </div>
              <div class="span7 pull-left">
                <form  class="form " method="post"action="DB/update_profile.php" onsubmit="return checkupdate();">
                  
                  <input type="hidden" name="user_id">
                  <div class="control-group" id="namediv">
                    <div class="controls">
                      <input type="text" value="<?php echo $_SESSION['name'];?>" id="name" name="name"class="input-xlarge"onblur="checkcname();" placeholder="Name">
                    </div>
                  </div>
                  
                  <div class="control-group" id="passdiv">
                    
                    <div class="controls">
                      <input type="password" id="password" name="password" class="input-xlarge"onblur="checkpassword();"placeholder="Password">
                    </div>
                  </div>
                  <div class="control-group" id="cpassdiv">
                    
                    <div class="controls">
                      <input type="password" id="cpassword" name="cpassword" class="input-xlarge" onblur="confirmpass();" placeholder="Confirm Password">
                    </div>
                  </div>
                  <div class="control-group" id="mnumg">
                    <?php if(!$_SESSION['phone_no']==null){?>
                    <div class="controls">
                      <input type="text" id="mnum" name="phone_no"value="<?php echo $_SESSION['phone_no'];?>" class="input-xlarge" onblur="checkmnum();" placeholder="Phone Number">
                    </div> <?php } else{?>
                    <div class="controls">
                      <input type="text" id="mnum" name="phone_no" class="input-xlarge" onblur="checkmnum();" placeholder="Phone Number">
                    </div> 
                  </div> <?php }?>
                  <div class="control-group" >
                    <input type="hidden" name="create_date" >
                    <input type="hidden" name="update_date" >
                    
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
                      <div class="controls " id="">
                       <!-- <label class="checkbox">
                        <input type="checkbox"> Accept <a href="#">Terms and Conditions</a>
                      </label> -->
            
                       <button type="submit" id= "button" class="btn btn-large offset3 ">Update</button>
                </form>
                       &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <a href="home.php" ><button id="button" type="button" class="btn btn-large offset3 ">Cancel</button></a>
                      </div>
                  </div>
                

              </div><!--span7-->

            </div><!--row-fluid-->
        </div><!--/span6-->
        <div class="span3">
        </div>
      </div><!--/row-->
      </div><!--containerfluid-->
      <br>
       <?php include 'footer.php';?>