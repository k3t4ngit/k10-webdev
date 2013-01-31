

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
    <script type="application/javascript">
        
         
    </script>
   
    <div class="hero-unit">
      <div id="appbinder">
            <img src="../assets/img/AppBinder_Logo.png">
      </div>
    </div>
<div class="container-fluid">
      <div class="row-fluid">
        <div class="span3"></div>
        
        <div class="span6" >
            <legend>Create Event</legend>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Event No.</th>
                <th>Title</th>
                <th>Date</th>
              </tr>
            </thead>  
           
            <tbody>
            <?php $i=1;
            foreach($query as $row){;?>
              <tr>
                <td><?php echo $i;?></td>
               <td> <a href="eventdetails/?eventid=<?php echo $row->EventId;?>"><?php echo $row->Title;?></a></td>
                <td><?php echo $row->DT;?></td>
              </tr>
              <?php $i++; }?>
            </tbody>    
          </table>

        </div><!--/span
       <!--  <div class="span3">
        </div> -->
      </div><!--/row-->