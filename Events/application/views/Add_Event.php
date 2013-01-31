

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
        fields = 1;
         function addimg()
          {
            
            
            if (fields != 10) 
              {

               document.getElementById("imginput").innerHTML += "<input type='file' value='Browse' name='img"+fields+"' /><br />";
                fields += 1;
                // alert(fields);
              } 
              else
              {
                document.getElementById("imginput").innerHTML += "<br />Only 10 upload fields allowed.";
                document.form.add.disabled=true;
              }
                document.getElementById('images').setAttribute("value",fields);

          }
         
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
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="index.php/welcome/addevent">
             <input type="hidden" name="EventId">
             <input type='hidden' id="images" name="nimg" value='1'>
             <div id="images">
             
             </div>
              <div class="control-group" >
                <label class="control-label" >Category</label>
                <div class="controls">
                  <select name="Category">
                    <option>Education</option>
                    <option>Entertainment</option>
                    <option>Regional</option>
                  </select>
                </div>
              </div>
              <div class="control-group" >
                <label class="control-label" >Sub Category</label>
                <div class="controls">
                  <select name="SubCategory">
                     <option>Education</option>
                    <!-- <option>Entertainment</option>
                    <option>Regional</option> -->
                  </select>
                </div>
              </div>
              <input type="hidden" name="Latitude">
              <input type="hidden" name="Longitude">
              <div class="control-group" id="namediv">
                <label class="control-label" >Title</label>
                <div class="controls">
                  <input type="text"  name="Title"  placeholder="Title">
                </div>
              </div>
              <div class="control-group" id="emaildiv">
                <label class="control-label" >Summary</label>
                <div class="controls">
                  <textarea type="text" name="Summary"   placeholder="Summary"></textarea>
                </div>
              </div>
              <div class="control-group" id="emaildiv">
                <label class="control-label" >Date / Time</label>
                <div class="controls">
                  <input type="text" name="DT"   placeholder="dd-mm-yyyy / mm:hh">
                  <p>dd-mm-yyyy / mm:hh</p>
                </div>
              </div>

              <div class="control-group" id="emaildiv">
                <label class="control-label" >Address</label>
                <div class="controls">
                  <textarea type="text" name="Address"   placeholder="Address"></textarea>
                </div>
              </div>
              <div class="control-group" id="emaildiv">
                <label class="control-label" >Description</label>
                <div class="controls">
                  <textarea type="text" name="Description"   placeholder="Description"></textarea>
                </div>
              </div>
              <div class="control-group" id="namediv">
                <label class="control-label" >Link</label>
                <div class="controls">
                  <input type="text"  name="Link"  placeholder="Link">
                </div>
              </div>
              <div class="control-group" id="emaildiv">
                <label class="control-label" >Image</label>
                <div class="controls" id="imginput">
                  <input type="file" value="Browse" name="img0">  <br>  
                </div>
                <div class="controls">
                <br><button class="btn btn-inverse" onclick="addimg();" type="button">Add More</button>
                </div>
              </div>
              <div class="control-group">
                  <div class="controls">
                    <br><button class="btn" type="submit">Upload</button>
                  </div>
              </div>
              
            </form>
        </div><!--/span
       <!--  <div class="span3">
        </div> -->
      </div><!--/row-->