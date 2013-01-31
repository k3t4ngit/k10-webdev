<?php include 'header.php';

  include('Admin/manage_post.php');
 
  $obj= new addpost();
  $rs=$obj->get_active_posts();
 


  if(!isset($_SESSION['user_id'])){
    header('location:login.php');
  }

  
?>
 <script>
    $(function() {
        $( "#accordion" ).accordion();
    });
    </script>
    <div class="container-fluid">
      <div class="row-fluid">
        <?php 
        include 'csbar.php';?>
        
        <div class="span6">
        <fieldset>
          <legend>Welcome <?php echo ucfirst($_SESSION['name']);?></legend>
         
          <h4>We have the following current openings :</h4><br>
          <div id="accordion">
            <?php foreach ($rs as $key ) {?>
            
            
              <p id="post"><b><?php echo $key['code'];?></b></p>
              <div id="pst">
               <?php if($applychck==true){?>
              <abbr title="Already Applied" class="initialism"> <button class="btn btn-large disabled pull-right" id= "button">Apply</button></a></abbr>  
              <?php }else{?>
                <abbr title="Apply Now" class="initialism"> <a href="DB/update_status.php/?action=APPLY&post_id=<?php echo $key['post_id'];?>"> <button class="btn btn-large pull-right" id= "button">Apply</button></a></abbr>
             <?php }
              ?>
              
                  <ul>
                    <li> Criteria :</li>
                      <p><?php echo $key['criteria'];?></p>
                    <li> Description :</li>
                        <p><?php echo $key['description'];?></p>
                  </ul> 
              </div>
              <?php }?>
          </div>
        </fieldset>
        </div><!--/span6-->
        
        <?php 
        include('lsbar.php');?>
       
      </div><!--/row-->
    </div><!--containerfluid-->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
      <?php include 'footer.php';?>