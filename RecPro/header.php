
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Careers | AppBinder.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    
   <link rel="shortcut icon" href="assets/img/icon.png" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  
   
    <link rel="stylesheet" href="assets/css/jquery-ui.css" />

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/> -->
    <script type="text/javascript" src="assets/js/validations.js"></script>

    <script type="application/javascript">
   
      $(document).ready(function()
      {
        $("#form_empty").hide();
        $("#incorrect_email").hide();
        $("#incorrect_password").hide();
        $("#incorrect_confirm").hide();
        $("#incorrect").hide();
        $("#errorbox").hide();
        $("#notice").hide();
        $(".span6").hide();
        $(".span6").fadeIn(700,function()
        {
          $("#notice").slideDown(1000);
        });
      });</script>

       
  </head>
  <body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  <div id="header" >
    <div class="page-header ">
      <div class="container-fuild">
        <div class="row-fluid">
          <div class="span4">
            <img src="assets/img/Logo_with_text.png">
          </div> <!--span3-->
          <div class="span4"></div>
          <div class="span4" id="navigation">
          <?php 

            session_start();
              if(isset($_SESSION['user_id'])){
              include 'DB/get_status.php';
              include 'DB/check.php';
              $object=new check();
              $applychck=$object->checkuser();
              $obj=new getstatus();
              $refqual=$obj->get_refqual();
              
           
            ?>
            <div class="span12">
              <ul class="nav nav-pills pull-right">
                <?php 
                  
                if ($applychck==true) {?>
                  
                
                <li class=""><a href="candidate.php"><strong>Home</strong></a></li>
               <?php }
               else{?>
                <li class=""><a href="home.php"><strong>Home</strong></a></li>
                <?php }?>
                <li class=""><a href="logout.php"><strong>Logout</strong></a></li>
                
              </ul>
            </div>
           <br>
            <div id="status" class="span12 ">
              
             <strong class=""> Current Status : 

                    <?php if ($applychck==true) {
                        
                          $rs=$obj->get_status($_SESSION['user_id']);

                          // $postcode=$obj->get_user_post();
                          echo $rs['status']; //" for ".$postcode;
                          }
                          else{
                              echo "Not Applied";
                                }?> 

              </strong>
            </div>
              
            

           <?php }?>
          </div>
            
          </div><!--span8-->
        </div><!--row-->
      </div><!--container-fluid-->
    </div><!--pageheader-->     
  </div>
  
