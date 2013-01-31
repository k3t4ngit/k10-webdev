<div class="span3 ">
        <?php //print_r($_SESSION);?>
          <div class="well sidebar-nav bs-docs-sidebar">
            <ul class="nav nav-list bs-docs-sidenav ">
              <li class="nav-header"><h4>Details :</h4></li>
              <li class="divider"></li>
              <li >Name : <b><?php echo ucfirst($_SESSION['name']);?></b></li>
              <li class="divider"></li>
              <li>Email Id : <b><?php echo $_SESSION['email_id'];?></b></li>
              <li class="divider"></li>
             
              <li>Refered By : <b><?php echo $refqual['ref'];?></b></li>
              <li class="divider"></li>
              <li>Qualification : <b><?php echo $refqual['qual'];?></b></li>
            </ul>
          </div><!--/.well -->
              
              <?php
            
              if ($applychck==true) {
                 # code...
              
                $sts=new getstatus();
                $rs=$sts->get_status($_SESSION['user_id']); 
                if ($rs['status']=="Problem Assigned") 
                {

                        $time=new getstatus();
                        $timeleft=$time->get_time();
                        if (!$timeleft) {
                          echo " <div class='well sidebar-nav bs-docs-sidebar'>
                                     <ul class='nav nav-list bs-docs-sidenav'><li class='divider'></li><div class='alert alert-error'><p>Time expired!</p></div></ul>
                                </div><!--/.well -->";
                          # code...
                        }
                        else{
                        echo "<div class='well sidebar-nav bs-docs-sidebar'>
                                   <ul class='nav nav-list bs-docs-sidenav' > <li class='divider'></li><li>Time Left: <strong>".$timeleft."</strong></li></ul>
                              </div><!--/.well -->";
                      }
                }       
              }
           ?>

              
        
  
         <div class="well sidebar-nav bs-docs-sidebar">
          <ul class="nav nav-list bs-docs-sidenav ">
            <li class="nav-header"><h4>Social Networks :</h4></li>
            <li class="divider"></li>
            <li>Facebook :</li>
            <br>
              <div class="fb-like" data-href="https://www.facebook.com/AppBinder" data-send="false" data-width="200" data-show-faces="true" data-font="lucida grande"></div>        
            <br>
             <li class="divider"></li>
            <li>Google :</li>
          </ul>
        </div>
    </div><!--/span-->