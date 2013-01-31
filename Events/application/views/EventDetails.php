

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Candidate Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- HTML5 s../him, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/validations.js"></script>
  </head>

  <body>
    
   
    <div class="hero-unit">
      <div id="appbinder">
            <img src="../assets/img/AppBinder_Logo.png">
      </div>
    </div>
<div class="container-fluid">
      <div class="row-fluid">
        <div class="span3"></div>
    
        <div class="span6" >
            <legend>Event Details</legend>
         
            
              <div class="control-group" >
                <label class="control-label" >Category</label>
                <div class="controls">
                  <p><?php echo $row->Category;?></p>
                </div>
              </div>
              
              
              <div class="control-group" id="namediv">
                <label class="control-label" >Title</label>
                <div class="controls">
                  <p><?php echo $row->Title;?></p>
                </div>
              </div>
              <div class="control-group" id="emaildiv">
                <label class="control-label" >Summary</label>
                <div class="controls">
                  <p><?php echo $row->Summary;?></p>
                </div>
              </div>
              <div class="control-group" id="emaildiv">
                <label class="control-label" >Date / Time</label>
                <div class="controls">
                  <p><?php echo $row->DT;?></p>
                  
                </div>
              </div>

              <div class="control-group" id="emaildiv">
                <label class="control-label" >Address</label>
                <div class="controls">
                  <p><?php echo $row->Address;?></p>
                </div>
              </div>
              <div class="control-group" id="emaildiv">
                <label class="control-label" >Description</label>
                <div class="controls">
                  <p><?php echo $row->Description;?></p>
                </div>
              </div>
              <div class="control-group" id="namediv">
                <label class="control-label" >Link</label>
                <div class="controls">
                  <p><?php echo $row->Link;?></p>
                </div>
              </div>
              <?php for($i=0;$i<=9;$i++){
                if(isset($row->img$i))
                {
                  ?>
                }
              } 
              <div class="control-group" id="emaildiv">
                <label class="control-label" >Images</label>
                <div class="controls" id="imginput">
                 <img src="<?php echo base_url();?>uploads/<?php echo $row->img0;?>"> 
                </div>
              </div>

             
        </div><!--/span
       <!--  <div class="span3">
        </div> -->
      </div><!--/row-->