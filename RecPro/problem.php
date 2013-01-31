<?php include 'header.php';
 include 'Admin/getproblems.php';

  $chck=true;
  if(!isset($_SESSION['user_id'])){
    header('location:login.php');
  }


?>

    <div class="container-fluid">
      <div class="row-fluid">
        <?php include 'csbar.php';?>
        <div class="span6">
          <fieldset>
          <legend>Problem Description <a href="questionBank/pdfDownload.php/?problem_id=<?php echo $_SESSION['prob_no'];?>"><button class="btn btn-large pull-right" id= "button">Download as PDF</button></a></legend>
          
          <?php 
            $object=new getstatus();
            $rs=$object->get_status($_SESSION['user_id']); 
            if ($rs['status']=="Problem Assigned") {
              # code...
           
                        $time=new getstatus();
                        $timeleft=$time->get_time();
                        
                        if($timeleft==false){
                         
          echo 
          "<div class='alert alert-error' id='notice'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <h4>Note :</h4>
            <p>The coutdown for 48 hours has been started.Please download the problem from the <a href='problem.php'>download </a> 
              page and submit it within the given time period or your application will be discarded.<br>
              <strong>
                
              </strong>
            </p>
          </div>";
         } else{

            echo 
           "<div class='alert alert-success' id='notice'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <h4>Note :</h4>
            <p>The coutdown for 48 hours has been started.Please download the problem from the <a href='problem.php'>download </a> 
              page and submit it within the given time period or your application will be discarded.<br>
              <strong>
               Time left :<strong>". $time->get_time()."</strong> 
              </strong>
            </p>
          </div>";
           }
         }
            
            $problem=$object->get_problem($_SESSION['prob_no']);
          ?>
          

          <p><?php echo $problem['description'];?></p>
         </fieldset> 
        </div><!--/span6-->

        <?php include('lsbar.php');?>
      </div><!--/row-->


      <?php include 'footer.php';?>