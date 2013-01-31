 <div class="span3 ">
    <?php if ($applychck==true) {?>
    
          <div class="well sidebar-nav ">
            <ul class="nav nav-list ">
             <li class="nav-header"><h4>Improtant Links</h4></li>
             <li class="divider"></li>
             <li><a href="candidate.php">Instructions<i class=" icon-chevron-right pull-right"></i></a></li>
             <li class="divider"></li>
             <li><a href="DB/update_status.php/?action=ASSIGN_PROBLEM">The Problem<i class=" icon-chevron-right pull-right"></i></a></li>          
             <li class="divider"></li>
             <?php
                $objp=new check();
                $prob=$objp->check_prob_assigned();
                
                if(!$prob==false){
                        $time=new getstatus();
                        $timeleft=$time->get_time();
                        if($timeleft==false )
                        {?>
                                  <abbr title="You cannot Submit the Solution Now!" class="initialism">
                                    <li>Submit Solution<i class=" icon-chevron-right pull-right"></i></li>
                                  </abbr>
                              <?php }
                            
                        else{ ?>
                                <li><a href="submit.php"> Submit Solution<i class=" icon-chevron-right pull-right"></i></a></li>
                        <?php }

                }
                else{?>
                  <li></a><a href="submit.php"> Submit Solution<i class=" icon-chevron-right pull-right"></i></a></li>
             <?php } 
                ?>
             
            </ul>
          </div>
        <?php } 
        else {?>
        
          <div class="well sidebar-nav ">
            <ul class="nav nav-list ">
             <li class="nav-header"><h4>Important Links</h4></li>
             <li class="divider"></li>
            <abbr title="Please Apply to enable Important links." class="initialism">
             <li>Instructions<i class=" icon-chevron-right pull-right"></i></li>
            </abbr>
             <li class="divider"></li>
             <abbr title="Please Apply to enable Important links." class="initialism">
             <li> The Problem<i class=" icon-chevron-right pull-right"></i></li>
              <li class="divider"></li>
              </abbr>
             <abbr title="Please Apply to enable Important links." class="initialism">
             <li>Submit Solution<i class=" icon-chevron-right pull-right"></i></li>
       		   </abbr>
           </ul>
          </div><!--/.well -->
         </abbr> 
  <?php }?>
          <div class="well sidebar-nav ">
            <ul class="nav nav-list  ">          
             <li class="nav-header"><h4>Contact Us</h4></li>
             <li class="divider"></li>
              <li><strong>+91 (731) - 4020 - 708 </strong></li><br>
              <li class="nav-header"><h4>Address</h4></li>
              <li class="divider"></li>
              <li><address><strong>AppBinder Software Private Ltd.</strong><br>
              	102, Swastik Chamber,<br>
                9/1 Manoramaganj (Near Geeta Bhawan Square)<br>
                A.B. Road Indore (M.P.)<br>
                PIN code -452001 <br>
                India
                </address>
              </li>
            </ul>
          </div><!--/.well -->
        
    </div><!--/span-->