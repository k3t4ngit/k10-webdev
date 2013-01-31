<?php include 'header.php';

 $chck=true;
 // session_start();
  if(!isset($_SESSION['user_id'])){
    header('location:login.php');
  }
?>

    <div class="container-fluid">
      <div class="row-fluid">
        <?php include 'csbar.php';?>
        <div class="span6">
          <fieldset>
          <legend>Submit  </legend>
         
          <?php

            if (!isset($_GET['upload'])) {
              # code...
              $_GET['upload']="NULL";
            }

                $sts=new getstatus();
                $status=$sts->get_status($_SESSION['user_id']);
            
            if ($status['status']=="Submitted" ) 
            {
              
                  echo 
                     "<div class='alert alert-success' id='notice'>
                      <h4>Note :</h4>
                      <p>File Uploaded Succesfully!</p>
                    </div></div>";              
              }
              elseif ($_GET['upload']=="error")
              {
                  echo 
                      "<div class='alert alert-error' id='notice'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <h4>Note :</h4>
                        <p>Zip Files Only!</p>
                      </div>
                      <p>Submit the assigned problem's solution from here.</p>
                      <form  enctype='multipart/form-data' method='post' action='DB/get_sol_file.php'>
                         <input type='file' class='file' name='Browse'>
                         <br>
                         <br>
                         <button class='btn btn-large pull-left' id= 'button' type='Submit'>Submit</button>
                      </form>
                      <br></div><!--/span-->";
              }
              
            else{ ?>
          <p>Submit the assigned problem's solution from here.</p>
            <form method="post" action="DB/get_sol_file.php" enctype="multipart/form-data">
               <input type="file" class="file" name="Browse">
               <br>
               <br>
               <button class="btn btn-large pull-left" id= "button" type="Submit">Submit</button>
            </form>
            <br>
            <br>
            <br>
            <p>Maecenas eu erat at lectus hendrerit ullamcorper. Suspendisse sed justo vehicula leo tristique consectetur. Donec ut nulla lacus. Sed id ligula velit. Cras quis ligula sit amet mi tristique auctor ultricies in dui. Nulla magna elit, egestas ac ullamcorper sit amet, auctor a lectus. Fusce sollicitudin vulputate vestibulum. Vestibulum ac nunc erat. Nulla facilisi. Suspendisse ac porttitor dui. Praesent congue lacinia urna, ac semper metus suscipit in. Integer ut urna eget lacus semper vestibulum. Curabitur metus urna, volutpat a interdum at, egestas nec turpis. Aliquam fringilla accumsan rutrum. </p>
            <p>Maecenas eu erat at lectus hendrerit ullamcorper. Suspendisse sed justo vehicula leo tristique consectetur. Donec ut nulla lacus. Sed id ligula velit. Cras quis ligula sit amet mi tristique auctor ultricies in dui. Nulla magna elit, egestas ac ullamcorper sit amet, auctor a lectus. Fusce sollicitudin vulputate vestibulum. Vestibulum ac nunc erat. Nulla facilisi. Suspendisse ac porttitor dui. Praesent congue lacinia urna, ac semper metus suscipit in. Integer ut urna eget lacus semper vestibulum. Curabitur metus urna, volutpat a interdum at, egestas nec turpis. Aliquam fringilla accumsan rutrum. </p>
            <p>Maecenas eu erat at lectus hendrerit ullamcorper. Suspendisse sed justo vehicula leo tristique consectetur. Donec ut nulla lacus. Sed id ligula velit. Cras quis ligula sit amet mi tristique auctor ultricies in dui. Nulla magna elit, egestas ac ullamcorper sit amet, auctor a lectus. Fusce sollicitudin vulputate vestibulum. Vestibulum ac nunc erat. Nulla facilisi. Suspendisse ac porttitor dui. Praesent congue lacinia urna, ac semper metus suscipit in. Integer ut urna eget lacus semper vestibulum. Curabitur metus urna, volutpat a interdum at, egestas nec turpis. Aliquam fringilla accumsan rutrum. </p>
          </fieldset>
        </div><!--/span-->
       <?php }include('lsbar.php');?>
      </div><!--/row-->

  

      <?php include 'footer.php';?>