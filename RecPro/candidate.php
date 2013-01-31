<?php include 'header.php';

  $chck=true;
  // print_r($_SESSION);
  if(!isset($_SESSION['user_id'])){
    header('location:login.php');
  } 
?>

    <div class="container-fluid">
      <div class="row-fluid">
        <?php include 'csbar.php';?>
        
        <div class="span6">
          <fieldset>
          <legend>Welcome <?php echo ucfirst($_SESSION['name']);?></legend>
         

            <?php if ($applychck==true) {
               $object=new getstatus();
                $rs=$object->get_status($_SESSION['user_id']);

            if ($rs['status']=="Problem Assigned") {?>
              <div class="alert alert-success" id="notice">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>Note :</h4>
                <p>The coutdown for 48 hours has been started.Please download the problem from the <a href="problem.php">download </a> 
                  page and submit it within the given time period or your application will be discarded.<br>
                  <strong>
                    </strong>
                </p>
              </div>
            <?php } }?>
           <h5> Following are important instructions for further processing</h5><br/>
          <Ul>
              <li>You have applied successfully for e-recruitment process.</li>
              <li>Now a problem will be assigned to you according to your profile.</li>
              <li>You have to submit the solution of the problem back to this site in a given time period.</li>
              <li>Please note that a time period of 48 hours will be alloted as soon as the problem is assigned.</li>
              <li>The submission links will be closed if the time ran out.</li>
              <li>Complete the solution of assigned problem using any language and applying any methodology.</li>
                       

                       
                      
                         <li>Team will review the solution and then call you for further discussion.</li>
                         <li>Final interview will be conducted based on team discussion.</li>
          </ul>
                         <p><b>Note: All URLs are unique for each candidate and therefore it is mandatory to keep received email for sometime before deleting it.</b></p><br/>
        </fieldset>
        </div><!--/span-->
        
        <?php include('lsbar.php');?>
       
      </div><!--/row-->
    </div><!--containerfluid-->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
      <?php include 'footer.php';?>